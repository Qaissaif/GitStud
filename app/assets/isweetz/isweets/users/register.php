<?php session_start();
if(date('Y-m-d H:i:s', strtotime("+15 minutes", strtotime($_SESSION["ipaddress"][$_SERVER['REMOTE_ADDR']])))>date("Y-m-d H:i:s")){
header("Location:/isweets/index.php?info=You cant signup");
exit;
}else{
   $_SESSION["ipaddress"][$_SERVER['REMOTE_ADDR']]="";
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
  		<form class="signup_form">
        <div class="col-lg-6">
                <h4>Email address</h4>
              <p><input type="email" id="signup-email" class="form-control" placeholder="Email address"  autofocus></p>

                <h4>Username</h4>
              <p><input type="text" id="signup-username"  class="form-control" placeholder="Username" autofocus></p>

          			<h4>Password</h4>
         			<p><input type="password" id="signup-pass"  class="form-control" placeholder="Password"></p>
          		
        </div>
        <div class="col-lg-6">
        
          <h4>Address</h4>
          <p>  
          <select id="address" class="form-control">

              <option value="irbid">Irbid</option>
              <option value="amman">Amman</option>
              <option value="zarqa">Zarqa</option>
              <option value="jarash">Jarash</option>
              <option value="mafraq">Mafraq</option>
              <option value="maan">Ma'an</option>
          </select>
</p>
            <h4>Phone Number</h4>
            <p><input type="text" id="signup-phone" name="phone_number" class="form-control" placeholder="00962"></p>
  <h4>Medical Issues</h4>

          	<h5> <b>I have?  </b><input type="checkbox" id="medical1" value="diabetes">  <b>Diabetes , </b>
 			      <input type="checkbox" id="medical2" value="bloodpresure"> <b> Blood presure , </b>
 			       <input type="checkbox" id="medical3" value="cholesterol"> <b> Cholesterol </b></h5>
          	        </div>
      </div>

      </form>
              <button class="btn btn-lg btn-success btn-block" id="signup-submit">Get Some Sweets !</button>
              <br>
              <span style="  color: red;
  font-family: cursive;">Info:Do to your concerns we would like to inform you that all your medical records will be safely unshared.</span>
</div>
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
      <script>
          var signup = {
            formbox:$(".signup_form"),
    emailbox: $("#signup-email"),
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
      var  pattern=/^[a-z]+$/;
      id = this.usernamebox.attr('id');
      if (username == ''|| username==null || username == "undefined") {
        this.showError(id, "Username is mandatory");
        this.valid[id] = false;
      }else if (!pattern.test(username)){
        this.showError(id, "Please use a valid username");
        this.valid[id] = false;
      }else {
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
    $("#signup-submit").click(function(e){
          signup.resetAllValidation();
          signup.validateEmail();
          signup.validatePhone();
          signup.validateUsername();
          signup.validatePassword();

    for (myvar in signup.valid) {
      if (! signup.valid[myvar]) {
        e.preventDefault();
        return false;
      }
    }
    $.ajax({
          type: 'POST',
          url: '/isweets/users/registerform.php',
          data: {
            phone_number: $('#signup-phone').val(),
            email: $("#signup-email").val(),
            password: $("#signup-pass").val(),
            address:$("#address").val(),
            username: $("#signup-username").val(),
            medical1:$("#medical1:checked").val(),
            medical2:$("#medical2:checked").val(),
            medical3:$("#medical3:checked").val()
          }
        }).done(function() {
      bootbox.dialog({
    message:"Thank you.",
  title: "Successfully registered on isweets",
  buttons: {
    success: {
      label: "Get Sweets!",
      className: "btn-success",
      callback: function() {
        window.location="/isweets/collections";
      }
    }
  }
});

        });

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


      </script>
</body>
</html>