<?php session_start();


           $id=$_SESSION['user_session']['id']+0;
                 if (isset($_SESSION['user_cart_'.$id])){
                foreach ($_SESSION['user_cart_'.$id] as $key => $val){
                  $id_product=$key+0;
                  if(!( $conn= mysql_connect("localhost","root","123") ))
            die("connection error!");
          if (!mysql_select_db("isweets",$conn))
            die("error occurred! ");
            $q="SELECT * FROM products where id=".$id_product;
          if(!$result=mysql_query($q,$conn))
            die("wrong query"); 
          $row = mysql_fetch_array($result, MYSQL_ASSOC);
          $name=$row["name"];
          $quantity=$row["quantity"]-$val;
          $quantity_1=$val;
          $shop=$row["shop"];
          $price=$row["price"]*$val;
          $total_price=$total_price+$price;
          $q2="update shops set bought=$total_price WHERE id=$shop";
          $result=mysql_query($q2,$conn);
          $q1="update products set quantity=$quantity WHERE id=$id_product";
          $result=mysql_query($q1,$conn);
          $q="insert into payments(product_shop_id,product_name,bought,quantity) values($id_product,'$name',$price,$quantity_1)";
          $result=mysql_query($q,$conn);
               }
           }

          unset($_SESSION['user_cart_'.$id]);
                       header("Location:/isweets/collections/index.php?info=<h1>We will call you in 30 minutes</h1><p class='lead'>Thank you.</p>")

 ?>