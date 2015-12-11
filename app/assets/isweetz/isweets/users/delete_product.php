<?php session_start();
if ($_SESSION["user_session"]["type"]!="shop"){
	header("Location:/isweets/index.php?info=You are not authrized to preform this action");
}     
$id_product=$_GET['product_id']+0;
$id_user=$_GET['user_id']+0;
$shop_name=$_GET['name_shop'];
$name=$_GET['product_name'];
unlink( $_SERVER['DOCUMENT_ROOT'].'/isweets/pictures/'.$name_shop.'/'.$name.'.jpg');
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");
if (!mysql_select_db("isweets",$conn))
die("error occurred! ");

$q="DELETE FROM products WHERE id=$id_product;";
 if(!$result=mysql_query($q,$conn))
  die("wrong query");

header("Location:/isweets/users/view_products.php?info=Done!");
exit;
      ?>    