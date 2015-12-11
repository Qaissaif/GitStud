<?php session_start(); 
if ($_SESSION["user_session"]["type"]!="admin"){
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
  		<form enctype="multipart/form-data" action="add_shop.php"  method="POST">
        <div class="col-lg-6">
         			<p><input type="text" id="signup-shop" name="name" class="form-control" placeholder="Shop name" autofocus></p>
         			<p><input type="text" id="signup-username" name="username" class="form-control" placeholder="Username" autofocus></p>
         			<p><input type="email" id="signup-email" name="email" class="form-control" placeholder="Email" autofocus></p>
         			<p><select id="address" name="location" class="form-control">
              <option value="irbid">Irbid</option>
              <option value="amman">Amman</option>
              <option value="zarqa">Zarqa</option>
              <option value="jarash">Jarash</option>
              <option value="mafraq">Mafraq</option>
              <option value="maan">Ma'an</option>
          </select></p>
         			<p><input type="password" id="signup-pass" name="password" class="form-control" placeholder="Password"></p>
         			<p><input type="text" id="signup-phone" name="phone_number" class="form-control" placeholder="Phone Number"></p>
         			<p><label>Upload a picture for the shop</label></p>
         			 <p>  <input type="file" name="filer" size="50" id="file" required />
         			 </p>

        <div class="col-lg-6">

        <button class="btn btn-lg btn-success btn-block" id="submit" type="submit">Add Shop !</button>
      </form>
</div>
<script>
      var signup = {
            formbox:$(".signup_form"),
    emailbox: $("#signup-email"),
    shopbox: $("#signup-shop"),
    passwordbox: $("#signup-pass"),
    usernamebox: $("#signup-username"),
    phonebox: $("#signup-phone"),
    valid: {"signup-email": false, "signup-pass": false, "signup-username": false, "signup-phone": false},
    showError: function(id, msg) {
      var error = $('<p>').addClass('error btn-danger').text(msg);
      error.insertBefore('#'+id);
    },
    resetValidation: function(id){
      $('#'+id).siblings('.error').remove();
      this.valid[id] = true;
    },
    resetAllValidation: function() {
      $('.error').remove();
      for (myvar in this.valid) {
        this.valid[myvar] = true;
      }
    },
    validateEmail: function() {
      var email = this.emailbox.val(),
        id = this.emailbox.attr('id'),
        pattern = /^[\w.%+-]+@([\w-]+\.)+[\w]{2,}$/i;
      if (email == ''|| email==null || email == "undefined") {
        this.showError(id, "Email is mandatory");
        this.valid[id] = false;
      } else if (!pattern.test(email)){
        this.showError(id, "Please use a valid e-mail address");
        this.valid[id] = false;
      } else {
        var that = this;
        $.ajax({
          type: 'POST',
          url: '/isweets/validate.php',
          data: {email: email}
        }).done(function(msg) {
          if(msg=="false"){
            that.valid[id] = false;
            that.showError(id, "Email already exists");

          }
        });
      }
    },
    validatePassword: function() {
      var password = this.passwordbox.val();
        id = this.passwordbox.attr('id');
      if (password == ''|| password==null || password == "undefined") {
        this.showError(id, "Password is mandatory");
        this.valid[id] = false;
      } else if (password.length < 6 ){
        this.showError(id, "Password is too short (Minimum 6 chars)");
        this.valid[id] = false;
      }
    },
    validateUsername: function(){
      var username = this.usernamebox.val();
        id = this.usernamebox.attr('id');
         var  pattern=/^[a-z]+$/;

      if (username == ''|| username==null || username == "undefined") {
        this.showError(id, "Username is mandatory");
        this.valid[id] = false;
      }else if (!pattern.test(username)){
        this.showError(id, "Please use a valid username");
        this.valid[id] = false;

      } else {
        var that = this;
        $.ajax({
          type: 'POST',
          url: '/isweets/validate.php',
          dataType: 'text',
          data: {username: username}}).done(function(msg) {
          if(msg=="false"){
           that.showError(id, "This username is already used.");
              that.valid[id] = false;

          }
        });
      }
    }, validateShop: function(){
      var shop = this.shopbox.val();
        id = this.shopbox.attr('id');
      var  pattern=/^[a-z]+$/;
      if (shop == ''|| shop==null || shop == "undefined") {
        this.showError(id, "shop name is mandatory");
        this.valid[id] = false;
      } else if (!pattern.test(shop)){
        this.showError(id, "Please use a valid shopname");
        this.valid[id] = false;

      } else {
        var that = this;
        $.ajax({
          type: 'POST',
          url: '/isweets/validate.php',
          dataType: 'text',
          data: {shop: shop}}).done(function(msg) {
          if(msg=="false"){
           that.showError(id, "This shop name is already used.");
              that.valid[id] = false;

          }
        });
      }
    },
    validatePhone: function() {
      var phone = this.phonebox.val();
        id = this.phonebox.attr('id');
        pattern=/[0-9]$/;

      if (phone == ''|| phone==null || phone == "undefined") {
        this.showError(id, "phone is mandatory");
        this.valid[id] = false;
      } else if (!pattern.test(phone)){
        this.showError(id, "Please use a valid phone number");
        this.valid[id] = false;
      } else if (phone.length < 10 ){
        this.showError(id, "phone is too short (Minimum 10 chars)");
        this.valid[id] = false;
      }
    },
    
  };
    $("#submit").click(function(e){
          signup.resetAllValidation();
          signup.validateShop();
          signup.validateEmail();
          signup.validatePhone();
          signup.validateUsername();
          signup.validatePassword();

    for (myvar in signup.valid) {
      if (! signup.valid[myvar]) {
        return false;
      }
    }
  });

  $("#signup-email").blur(function(){
    signup.resetValidation($(this).attr('id'));
    signup.validateEmail();
  });
  $("#signup-pass").blur(function(){
    signup.resetValidation($(this).attr('id'));
    signup.validatePassword();
  });
  $("#signup-username").blur(function(){
    signup.resetValidation($(this).attr('id'));
    signup.validateUsername();
  });
  $("#signup-phone").blur(function(){
    signup.resetValidation($(this).attr('id'));
    signup.validatePhone();
  });
  $("#signup-shop").blur(function(){
    signup.resetValidation($(this).attr('id'));
    signup.validateShop();
  });



</script>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
</body>
</html>