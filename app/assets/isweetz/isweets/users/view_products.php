<?php session_start();
if ($_SESSION["user_session"]["type"]!="shop"){
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
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

         <?php    


if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");
if (!mysql_select_db("isweets",$conn))
die("error occurred! ");
$id_user=$_SESSION["user_session"]["id"]+0;
$q="SELECT * FROM shops where user_id=$id_user ";
if(!$result=mysql_query($q,$conn))
die("wrong query");
$row_shop= mysql_fetch_array($result, MYSQL_ASSOC);
$id_shop=$row_shop['id'];
$shop_name=$row_shop['name'];

$q="SELECT * FROM products where shop=$id_shop ";
if(!$result=mysql_query($q,$conn))
die("no products");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $name=$row['name'];
  $price=$row['price'];
  $quantity=$row['quantity'];
  $id=$row["id"];
  echo "<tr>";
  echo "<td>$name</td>";
  echo "<td>$price</td>";
  echo "<td>$quantity</td>";
  echo "<td><a href='delete_product.php?shop=$id_shop&name_shop=$shop_name&product_id=$id&product_name=$name' class='btn btn-primary'>Delete</a></td>";
  echo "</tr>";
  }
      ?>       
              </tbody>
            </table>
</div>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
</body>
</html>