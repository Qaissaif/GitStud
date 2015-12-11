<?php session_start();

$id= $_SESSION['user_session']['id'];

 ?>
<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
 </head>
 <body>

<div class="container">

<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
  <form class="form-horizontal" role="form" action="buy.php" method="POST">
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card" placeholder="Debit/Credit Card Number" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" id="submit" class="btn btn-success">Pay Now</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
<script type="text/javascript">
  function resetValidation(id){
      $('.error').remove();
    }
    function showError(id, msg) {
      var error = $('<p>').addClass('error btn-danger').text(msg);
      error.insertBefore('#'+id);
    }
    function validateCard(){
        pattern=/^[0-9]{1,16}$/;
      var temp=true;
      var card = $("#card").val();
        id = $("#card").attr('id');
        resetValidation(id);
      if (card == ''|| card==null || card == "undefined") {
        showError(id, "Card number is mandatory");
        temp= false;
      } else if (!pattern.test(card)){
        showError(id, "Please use a valid credit number");
         temp= false;
      } else if (card.length <16){
        showError(id, "Credit card number is too short (Minimum 16 digit)");
       temp= false;
      }
      return temp;
    }

     function validateCvv(){
        pattern=/^[0-9]{1,3}$/;
      var temp=true;
      var cvv = $("#cvv").val();
        id = $("#cvv").attr('id');
        resetValidation(id);
      if (cvv == ''|| cvv==null || cvv == "undefined") {
        showError(id, "CVV number is mandatory");
        temp= false;
      } else if (!pattern.test(cvv)){
        showError(id, "Please use a valid CVV");
         temp= false;
      } else if (cvv.length <3){
        showError(id, "CVV number is too short (Minimum 3 digit)");
       temp= false;
      }
      return temp;
    }
    $("#card").blur(function(){
        validateCard();
    });
    $("#cvv").blur(function(){
      validateCvv();
    })

    $("#submit").click(function(){
        if(validateCard() && validateCvv()){
           e.preventDefault();
        }
        else{
          return false;
        }
    });

</script>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
</body>
</html>
