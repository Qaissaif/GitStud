<?php session_start(); 

$medical1=0;
$medical2=0;
$medical3=0;

if(isset($_POST['medical1'])) {
$medical1=1;
}if(isset($_POST['medical2'])) {
	$medical2=1;
}if(isset($_POST['medical3'])) {
	$medical3=1;
}
$phone_number=$_POST['phone_number'];
$password=$_POST['password'];
$location=$_POST['address'];
$name=$_POST['username'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];

if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");

$q_user="select * from users where username='$name'";
 $result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
if($row["username"]==$name){
	header("Location:/isweets/users/register.php?info=name used");
	exit;
}


$q_user="insert into users(email,username,password,address,phone_number,type,diabetes,blood_presure,cholesterol) values('$email','$name','$password','$location','$phone_number','normal',$medical1,$medical2,$medical3)";

if(!$result_user=mysql_query($q_user,$conn)){
die("wrong query"); 
}else
{
$q_user="select * from users where username='$name'";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong query"); 

$row_user = mysql_fetch_array($result_user, MYSQL_ASSOC) ;
$_SESSION["user_session"]["id"]=$row_user['id'];
$_SESSION["user_session"]["user_name"]=$name;
$_SESSION["user_session"]["type"]='normal';
$_SESSION["user_session"]["diabetes"]=$row_user['diabetes'];
$_SESSION["user_session"]["blood_presure"]=$row_user['blood_presure'];
$_SESSION["user_session"]["cholesterol"]=$row_user['cholesterol'];

}
 $_SESSION["ipaddress"][$_SERVER['REMOTE_ADDR']]=date('Y-m-d H:i:s');

header("Location:/isweets/collections/index.php?info=Thank You, Now you can use more features like health sweet control");
die();
?>