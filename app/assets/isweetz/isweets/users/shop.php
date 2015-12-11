<?php session_start(); 
if ($_SESSION["user_session"]["type"]!="shop"){
	header("Location:/isweets/index.php?info=You are not authrized to preform this action");
}


?>

<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
 </head>
 <body>
	
  <div class="container">
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
    <div class="row">
  		  <form enctype="multipart/form-data" action="add_product.php" method="post">
            <div class="col-lg-6">
         			<p><input type="text" id="product" name="name" class="form-control" placeholder="Product name" required autofocus></p>
         			<p><input type="number" name="price" step="any" class="form-control" placeholder="Price" required autofocus></p>
              <p><input type="number" name="quantity" class="form-control" placeholder="Quantity" required autofocus></p>
         			<p><textarea type="text" name="description" class="form-control" placeholder="Description" required></textarea></p>
         			 
              <p> </b><input type="checkbox" name="medical1" value="1"><b>Suger free</b>
                  <input type="checkbox" name="medical2" value="1"> <b>Saccharin </b>
                   <input type="checkbox" name="medical3" value="1"> <b>Caffeine free</b></p>
              <p>  <input type="file" name="filer" size="50" id="file" required /></p>

             <button class="btn btn-lg btn-success btn-block" id="submit" type="submit">Add Product!</button>
        </div>
      </form>
      </div>
      </div>
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>

  
<script>

    function resetValidation(id){
      $('.error').remove();
    }
    function showError(id, msg) {
      var error = $('<p>').addClass('error btn-danger').text(msg);
      error.insertBefore('#'+id);
    }
    function validateProduct(){
      var temp=false;
      var product = $("#product").val();
        id = $("#product").attr('id');
        var  pattern=/^[a-zA-Z ]+$/;
        resetValidation(id);
      if (product == ''|| product==null || product == "undefined") {
        showError(id, "Product is mandatory");
        return false;
      } else if (!pattern.test(product)){
        showError(id, "Please use a valid product name");
        temp = false;
      }else {
        $.ajax({
          type: 'POST',
          url: '/isweets/validate.php',
          data: {product: product}}).done(function(msg) {
          if(msg=="false"){
           showError(id, "This product is already used.");
           temp=false;
          }else {
         temp=true;
          }
        });
      }
      return temp;
    }
    $("#product").blur(function(){
        validateProduct();
    });

    $("#submit").click(function(){
        if(validateProduct()){
           e.preventDefault();
        }
    });

</script>
</body>
</html>