<?php session_start();
$id= $_SESSION['user_session']['id'];
$product_id=$_GET["id"];
$_SESSION['user_cart_'.$id][$product_id];
unset($_SESSION['user_cart_'.$id][$product_id]);

header("Location:/isweets/index.php?info=done");


?>