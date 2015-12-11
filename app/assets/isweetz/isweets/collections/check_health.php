<?php session_start();
$gendar=$_POST["gendar"];
$weight=$_POST["weight"];
$height=$_POST["height"];
$show_id=$_POST['show_id'];
$age=$_POST["age"];
$cholesterol=$_POST["cholesterol"]+0;
$msg="";
if($_SESSION["user_session"]["cholesterol"]==1){
if($cholesterol<200){
	$msg="at least you can eat 500g of sweets per week";
}else if($cholesterol>=200){
	$msg="at least you can eat 250g of sweets per week";
}
}
$calc=0.0;
if ($gendar=="male"){

	$calc=66+(13.7 * $weight )+(5 * $height)-(6.8 * $age);
} else {
	$calc=655+(9.6 * $weight)+(1.8 * $height)-(4.7 * $age);
}
header("Location:/isweets/collections/show.php?id=".$show_id."&info_health=<p class='lead'>The amount of calories you should eat every day is ".$calc."</p><p class='lead'>".$msg."</p>");

?>
