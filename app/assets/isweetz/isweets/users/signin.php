<?php session_start();
if(isset($_SESSION["user_session"]["id"])){
header("Location:/isweets/index.php");
die();
}
$id_username=$_POST['username'];
$id_password=$_POST['password'];
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");

 $q_user="SELECT * FROM users WHERE username='$id_username' and password = '$id_password'; ";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong query"); 
?>
<?php
$row_user = mysql_fetch_array($result_user, MYSQL_ASSOC) ;

if($row_user['id']!=""){
$_SESSION["user_session"]["id"]=$row_user['id'];
$_SESSION["user_session"]["user_name"]=$row_user['username'];
$_SESSION["user_session"]["type"]=$row_user['type'];
$_SESSION["user_session"]["diabetes"]=$row_user['diabetes'];
$_SESSION["user_session"]["blood_presure"]=$row_user['blood_presure'];
$_SESSION["user_session"]["cholesterol"]=$row_user['cholesterol'];
 if($_SESSION["user_session"]["type"]=="admin"){
 		header("Location:/isweets/users/admin.php");
 		die();
 }elseif ($_SESSION["user_session"]["type"]=="shop") {
 		header("Location:/isweets/users/shop.php");
 		die();
 }elseif ($_SESSION["user_session"]["type"]=="normal") {
 		header("Location:/isweets/collections/index.php");
 		die();
 }
}else
{
	header("Location:/isweets/index.php?info=Something wrong");

}
die();
 ?>