<?php session_start();
  $id=$_SESSION['user_session']['id']+0;
  $time= $_POST["time"];
  list($month, $day, $year) = split('[/.-]', $time);
  $time=$year."-".$month."-".$day;
  $people= $_POST["people"]+0;
  $shop=$_POST["shop"]+0;
  $kunafa=0;
  $coffee=0;
  $choco=0;
  $water=0;
  $soft=0;
  $price=0;
if(isset($_POST['kunafa'])) {
  $price=$price+1;
$kunafa=1;
}if(isset($_POST['coffee'])) {
   $price=$price+2;
  $coffee=1;
}if(isset($_POST['choco'])) {
   $price=$price+1;
  $choco=1;
}if(isset($_POST['water'])) {
   $price=$price+0.50;
$water=1;
}if(isset($_POST['soft'])) {
   $price=$price+0.50;
  $soft=1;
}

$price=$people*($price+3);


          if(!( $conn= mysql_connect("localhost","root","123") ))
            die("connection error!");
          if (!mysql_select_db("isweets",$conn))
            die("error occurred!");
            $q="SELECT * FROM reservation where date='$time' and shop_id=$shop";
          if(!$result=mysql_query($q,$conn))
            die("wrong query"); 
          $row = mysql_fetch_array($result, MYSQL_ASSOC);
          if ($row)
           header("Location:/isweets/reserve.php?shop=$shop&info=time is not available");
         else{
          $q="INSERT INTO `isweets`.`reservation` (`date`, `people`, `kunafe`, `coffee`, `chocolate`, `water`, `softdrink`, `shop_id`) VALUES ('$time',$people, $kunafa,$coffee,$choco,$water,$soft,$shop);";
                    if(!$result=mysql_query($q,$conn))
                                  die("wrong query"); 
                     header("Location:/isweets/index.php?shop=$shop&info=Price is $price:JD , We are waiting for you...");


         }


 ?>