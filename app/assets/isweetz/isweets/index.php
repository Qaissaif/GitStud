<?php session_start();?>

<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
</script>

 </head>
 <body>
 
     <div class="container">
      <!-- Static navbar -->
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="top:-20px">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <div class="container">
            <div class="carousel-caption">
            <h1>Isweets</h1>
             <p><strong>We would like to offer you an easy way to order delicious Sweets with medical concerns that has never been done before , </br> with the ability of ordering , putting ranges of your medical issues, and reserving.</strong></p>

              <p><a class="btn btn-lg btn-sweet" href="users/register.php" role="button">Get Started Today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1><strong>Rate us</strong></h1>
              <p><strong>We would be honored if you use it , and let us know what you think of it.</strong></p>
              <p><a class="btn btn-lg btn-sweet" href="rate_us.php" role="button">Learn More</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1><strong>One more for good measure.</strong></h1>
              <p><strong>We hope it will lighten you up for all the delicious Sweets you can need and eat for all your occasions</strong></p>
              <p><a class="btn btn-lg btn-sweet" href="collections" role="button">Browse Sweets</a></p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.carousel -->
   <div style="text-align:center;"> 
   <div class="btn-group" role="group">
    <button type="button" class="btn btn-sweet dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
     Choose a Shop
      <span class="caret"></span>
    </button>
    <?php 

if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");


 $q_user="select * from shops";
 $result=mysql_query($q_user,$conn);?>

    <ul class="dropdown-menu" role="menu">
       <?php 
 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $name=ucwords($row['name']);
  $id=$row["id"];
  echo " <li><a href='/isweets/collections/index.php?shop=$id'>$name</a></li>";
}
     ?>
    </ul>
  </div>
    </div>
          </div>
   		<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>

		</body>

		<html>