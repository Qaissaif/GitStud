<?php session_start(); 
 $id=$_SESSION['user_session']['id']+0;
 $flag=false;
if (isset($_SESSION['user_cart_'.$id])){
                  foreach ($_SESSION['user_cart_'.$id] as $key => $val){
                    $flag=true;
                  }
                }
  if($flag==false){
  echo "cart_empty";
  exit;
  }
?>
	<div id="cart" class="row-fluid">
	<table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>price</th>
                  <th>Quantity</th>
                  <th>Remove/</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $total_price=0;
                $id=$_SESSION['user_session']['id']+0;
                 if (isset($_SESSION['user_cart_'.$id])){
                foreach ($_SESSION['user_cart_'.$id] as $key => $val){
                	$id_product=$key+0;
                	if(!( $conn= mysql_connect("localhost","root","123") ))
						die("connection error!");
					if (!mysql_select_db("isweets",$conn))
						die("error occurred! ");
 						$q="SELECT * FROM products where id=".$id_product;
					if(!$result=mysql_query($q,$conn))
						die("wrong query"); 
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					$name=$row["name"];
					$price=$row["price"]*$val;
					$total_price=$total_price+$price
                	?>
                <tr id="<?php echo $id_product ?>">
                  <td><?php echo $name; ?></td>
                  <td <?php echo "id=price_".$id_product; ?> ><?php echo $price; ?></td>
                  <td><input min=1 type="number" class="quantity" <?php echo "value=".$val ?> ></td>
                  <td><?php echo "<a href='/isweets/collections/remove_cart.php?id=$id_product'> " ?>Remove</a></td>
                </tr>
                <?php }}?>
              </tbody>
            </table>
	</div>
	<script>
	$(".quantity").bind('keyup mouseup', function () {
		var id = $(this).closest("tr").attr("id");
			$.ajax({
  method: "POST",
  url: "/isweets/collections/addcart.php",
  data: {product_id:id,value:$(this).val()}
	}).done(function(msg) {
		$("#price_"+id).text(msg);
		$("#total").text(msg);

  	});

	});  
	</script>