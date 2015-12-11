<?php session_start();
if ($_SESSION["user_session"]["type"]!="admin"){
	header("Location:/isweets/index.php?info=You are not authrized to preform this action");
}     
$id_shop=$_GET['shop']+0;
$id_user=$_GET['user_id']+0;
$name=$_GET['name'];
array_map('unlink', glob($_SERVER['DOCUMENT_ROOT']."/isweets/pictures/".$name."/*"));
rmdir($_SERVER['DOCUMENT_ROOT']."/isweets/pictures/".$name);
unlink( $_SERVER['DOCUMENT_ROOT'].'/isweets/pictures/'.$name.'.jpg');
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");
if (!mysql_select_db("isweets",$conn))
die("error occurred! ");
 $q="DELETE FROM shops WHERE id=$id_shop;";
 if(!$result=mysql_query($q,$conn))
  die("wrong query");
$q="DELETE FROM products WHERE shop=$id_shop;";
 if(!$result=mysql_query($q,$conn))
  die("wrong query");

$q="DELETE FROM users WHERE id=$id_user;";
 if(!$result=mysql_query($q,$conn))
  die("wrong query");
header("Location:/isweets/users/view.php?info=Done!");
exit;
      ?>    