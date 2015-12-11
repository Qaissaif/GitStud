<?php session_start(); 

if(isset($_SESSION["user_session"]["id"])){
}else{;
header("Location:/isweets/index.php?info=Please sign in or sign up.");
}

?>
<html>
 <head>

<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>

 </head>
 <body>
     <div class="container">
      <!-- Static navbar -->
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
      <?php if(!$_GET['shop']){ ?>
      <?php 
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");
if (!mysql_select_db("isweets",$conn))
die("error occurred! ");
 $q="SELECT * FROM shops; ";
if(!$result=mysql_query($q,$conn))
die("wrong query"); 
?>
<div class="row text-center">       
<?php
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $name=ucwords($row['name']);
  $id=$row['id'];


echo   "<div class='col-sm-4 col-xs-12'>
          <a href='index.php?shop=$id'>
            <img src='/isweets/pictures/$name.jpg' alt='Furniture Shoppe Stores' style='  height: 176px;
  width: 285px;'>
          </a>
          <h3>$name</h3>
          <h4>$description<h4>
        </div>";
}
?>
</div>
      <?php }else{ 
        include $_SERVER['DOCUMENT_ROOT'].'/isweets/collections/products.php';
        ?> 
      <?php } ?>
      </div>
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
		</body>
		<html>