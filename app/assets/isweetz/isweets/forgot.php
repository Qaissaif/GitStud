<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
 </head>
 <body>
	
  <div class="container">
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
    <div class="row">

  		  <form action="send_email.php" method="post">
        <p><input type="text" name="username" class="form-control" placeholder="Username" required autofocus></p>
             <button class="btn btn-lg btn-success btn-block" id="submit" type="submit">Send email!</button>
      </form>
      </div>
      </div>
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>


</body>
</html>