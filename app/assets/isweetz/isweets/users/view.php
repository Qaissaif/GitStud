<?php session_start();
if ($_SESSION["user_session"]["type"]!="admin"){
	header("Location:/isweets/index.php?info=You are not authrized to preform this action");
}
 ?>

<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
 </head>
 <body>
	
     <div class="container">

<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
<table class="table table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Location</th>
                  <th>Income</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

         <?php     
$id_pro=$_GET['id'];
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");
if (!mysql_select_db("isweets",$conn))
die("error occurred! ");
 $q="SELECT * FROM shops; ";

if(!$result=mysql_query($q,$conn))
die("wrong query");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $name=$row['name'];
  $location=$row['location'];
  $bought=$row['bought'];
  $id=$row["id"];
  $user_id=$row["user_id"];
  echo "<tr>";
  echo "<td>$name</td>";
  echo "<td>$location</td>";
  echo "<td>$bought</td>";
  echo "<td><a href='delete_shop.php?name=$name&shop=$id&user_id=$user_id' class='btn btn-primary'>Delete</a></td>";
  echo "</tr>";
}
      ?>       
              </tbody>
            </table>
</div>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
</body>
</html>