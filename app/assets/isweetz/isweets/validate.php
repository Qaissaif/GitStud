<?php session_start();
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");

if(isset($_POST["username"])){
	$name=$_POST["username"];
	$q_user="select * from users where username='$name'";
 	$result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
 	if ($row["username"]==$name)
	echo "false";
}
if(isset($_POST["email"])){
	$email=$_POST["email"];
	$q_user="select * from users where email='$email'";
 	$result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
 	if ($row["email"]==$email)
	echo "false";
}
if(isset($_POST["shop"])){
	$shop=$_POST["shop"];
	$q_user="select * from shops where name='$shop'";
 	$result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
 	if ($row["name"]==$shop)
	echo "false";

}
if(isset($_POST["product"])){
	$shop=$_SESSION["user_session"]["id"]+0;
	$q_user="select id from shops where user_id=$shop";
	$result_shop=mysql_query($q_user,$conn);
	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
	$shop_id=$row["id"]+0;
	
	$product=$_POST["product"];
	$q_user="select * from products where name='$product' and shop=$shop_id";
 	$result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
 	if ($row["name"]==$product)
	echo "false";
}


?>
