<?php

$phone_number=$_POST['phone_number'];
$password=$_POST['password'];
$location=$_POST['location'];
$name=strtolower($_POST['name']);;
$username=strtolower($_POST['username']);
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");


 $q_user="select * from shops where name='$name'";
 $result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
if($row["name"]==$name){
	header("Location:/isweets/users/admin.php?info=Shop name used");
	exit;
}

 $q_user="select * from users where username='$username'";
 $result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
if($row["username"]==$username){
header("Location:/isweets/users/admin.php?info=username name used");
	exit;
}


 $q_user="insert into users(email,username,password,address,phone_number,type) values('$email','$username','$password','$location','$phone_number','shop')";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong query4"); 

 $q_user="select * from users where username='$username'";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong query4"); 
$row = mysql_fetch_array($result_user,MYSQL_ASSOC);
$new_id=$row["id"]+0;
$q_user="insert into shops(name,location,user_id) values('$name','$location',$new_id)";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong query3"); 


move_uploaded_file($_FILES["filer"]["tmp_name"], ".../pictures/$name.jpg");
mkdir(".../pictures/$name", 0700);
header("Location:/isweets/collections/index.php?info=Shop added");
exit;

?>