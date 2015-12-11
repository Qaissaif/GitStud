

<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              
            <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/isweets"><i class="fa fa-heartbeat fa-5x" style="color:#B35278"></i></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/isweets">Isweets</a></li>
              <li><a href="/isweets/collections">Browse Sweets</a></li>
              <li><a href="/isweets/about_us.php">About Us</a></li>
              <li><a href="/isweets/why_us.php">Why Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION["user_session"]["id"])){?>
            <li><a href="#" onclick="cart();"><i class="fa fa-shopping-cart fa-2x"></i></a></li>
            <?php }?>

                <?php if(!isset($_SESSION["user_session"]["user_name"])){ ?>
                <li><a href="/isweets/users/register.php">Get Started Today</a></li>
              <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Sign in</a>
            <div class="dropdown-menu" style="width:250px;padding: 15px;padding-bottom: 0px;">
              <form class="form" method="post" action="/isweets/users/signin.php" id="formLogin"> 
                <input name="username" class="form-control" id="username" type="text" placeholder="Username"> 
                <br>
                <input name="password" class="form-control" id="password" type="password" placeholder="Password"><br>

                <div class="row">
                <div class="col-lg-6">
                <button type="submit" class="btn btn-success">Sign in</button>
                </div>
                <div class="col-lg-6">
                <a href="/isweets/forgot.php">Forgot Password?</a>
                </div>
                </div>
              </form>
            </div>
          </li>
          <?php } else{ ?>

      <?php if($_SESSION['user_session']['type']=="admin"){ ?>

      <li class="dropdown">
              <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                Settings and Tools  
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a href="#">Hello ,<?php echo $_SESSION["user_session"]["user_name"] ?></a></li>
                <li role="presentation"><a href="/isweets/users/view.php">View Users</a></li>
                 <li><a href="/isweets/users/admin.php">Add New Shops</a></li>
                <li role="presentation" class="divider"></li>
                <li><a href="/isweets/users/signout.php">Sign out</a></li>
              </ul>
            </li>

      <?php } ?>
      <?php if($_SESSION['user_session']['type']=="shop") { ?>
            <li class="dropdown">
              <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                Settings and Tools  
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a href="#">Hello ,<?php echo $_SESSION["user_session"]["user_name"] ?></a></li>
                <li role="presentation"><a href="/isweets/users/view_products.php">View Products</a></li>
                <li><a href='/isweets/users/shop.php'>Add products</a></li>
                <li role="presentation" class="divider"></li>
                <li><a href="/isweets/users/signout.php">Sign out</a></li>
              </ul>
            </li>
      <?php }else {?>
       <li><a href="/isweets/users/signout.php">Sign out</a></li>
      <?php }?>
      

           <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <script>

      function cart(){
        $.ajax({
          url:"/isweets/collections/cart.php",
          success: function(data){
            if(data!="cart_empty"){
                    bootbox.dialog({
    message:data,
  title: "Cart",
  buttons: {
    success: {
      label: "Check Out!",
      className: "btn-danger",
      callback: function() {
        bootbox.dialog({
        message:"Select your pay way.",
        buttons: {
          checking: {
          label: "Credit card!",
          className: "btn-primary",
          callback: function() {
            window.location="/isweets/credit_card.php"
          }
          },    success: {
      label: "Regular way",
      className: "btn-primary",
      callback: function() {
        window.location="/isweets/cash.php"
      }
    }
  }
});
      }
    }
  }
});


}else{
  bootbox.alert("<p class='lead'>Cart is empty,please add some products.</p>")
}          }
        })

      }

      </script>