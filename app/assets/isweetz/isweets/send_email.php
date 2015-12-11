<?php


require('PHPMailer-master/PHPMailerAutoload.php');
$username=$_POST["username"];
  if(!( $conn= mysql_connect("localhost","root","123") ))
            die("connection error!");
          if (!mysql_select_db("isweets",$conn))
            die("error occurred! ");
            $q="SELECT * FROM users where username='$username'";
          if(!$result=mysql_query($q,$conn))
            die("wrong query"); 
          $row = mysql_fetch_array($result, MYSQL_ASSOC);
          $emails=$row["email"];
          $password=$row["password"];

if($row){
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "isweetsinc@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "isweets123456789";

//Set who the message is to be sent from
$mail->setFrom('isweetsinc@gmail.com');

//Set who the message is to be sent to
$mail->addAddress($emails);

//Set the subject line
$mail->Subject = 'Password verification';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("Your Password is :"+$password);

//Replace the plain text body with one created manually
$mail->AltBody = 'Hello there';
if ($x=!$mail->send()) {
	echo"<script>window.location = '/isweets/index.php?info=Somthing wrong!';</script>";	
} else {
		echo"<script>window.location = '/isweets/index.php?info=Your password has been sent to your email.';</script>";
}
}else{
	echo"<script>window.location = '/isweets/index.php?info=Somthing wrong with your username';</script>";
}


?>

