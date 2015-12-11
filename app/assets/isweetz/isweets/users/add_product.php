<?php session_start();
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");


$id=$_SESSION["user_session"]["id"]+0;

 $q_user="select * from shops where user_id=$id";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong query"); 
$row_user = mysql_fetch_array($result_user, MYSQL_ASSOC) ;
$name=strtolower($_POST['name']);
$price= $_POST['price']+0;
$medical1=0;
$medical2=0;
$medical3=0;

if(isset($_POST['medical1'])) {
		$medical1=1;
}if(isset($_POST['medical2'])) {
		$medical2=1;
}
if(isset($_POST['medical3'])) {
		$medical3=1;
}

$shop=$row_user['id']+0;
$shop_name=strtolower($row_user['name']);
$description=$_POST['description'];
$quantity=$_POST['quantity']+0;
$picture_url=$shop_name.'/'.$name.'.jpg';

$q_user="select * from products where name='$name' and shop=$shop";
 $result_shop=mysql_query($q_user,$conn);
 	$row = mysql_fetch_array($result_shop,MYSQL_ASSOC);
if($row["name"]==$name){
header("Location:/isweets/users/shop.php?info=product already added");
	exit;
}

 $q_user="insert into products(shop,price,name,description,picture_url,quantity,suger_free,saccharin,caffeine_free) values($shop,$price,'$name','$description','$picture_url',$quantity,'$medical1','$medical2','$medical3')";
if(!$result_user=mysql_query($q_user,$conn))
die("wrong 2query"); 

move_uploaded_file($_FILES["filer"]["tmp_name"], ".../pictures/".$picture_url);

header("Location:/isweets/collections/index.php?shop=$shop");
exit;

?>