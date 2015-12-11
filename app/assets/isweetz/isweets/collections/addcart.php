<?php session_start();
$id= $_SESSION['user_session']['id'];
$product_id=$_POST["product_id"];

if (isset($_POST["value"])){
	$_SESSION['user_cart_'.$id][$product_id]=$_POST["value"]+0;
	                	if(!( $conn= mysql_connect("localhost","root","123") ))
						die("connection error!");
					if (!mysql_select_db("isweets",$conn))
						die("error occurred! ");
 						$q="SELECT * FROM products where id=".$product_id;
					if(!$result=mysql_query($q,$conn))
						die("wrong query"); 
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					$price=$row["price"]*$_POST["value"];
					echo $price;
exit;
}
$_SESSION['user_cart_'.$id][$product_id]+=1;
echo "<p class='lead'>Done!</p>";
?>