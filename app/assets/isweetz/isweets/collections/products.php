<?php 
$id_shop=$_GET['shop'];
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");

if (!mysql_select_db("isweets",$conn))
die("error occurred! ");
 $q="SELECT * FROM products WHERE shop=$id_shop; ";
if(!$result=mysql_query($q,$conn))
die("wrong query"); 
?>
  <a id="reserve" href="/isweets/reserve.php?shop=<?php echo $id_shop ?>" class="btn btn-info pull-right">Reserve</a>
<br>
<div class="btn-group" style="left: 33%;"role="group" aria-label="...">
  <button type="button" id="rg" class="btn btn-default active"  data-toggle="tooltip" data-placement="bottom" title="any thing here">All Products</button>
  <button type="button" id="sf" class="btn btn-default"  data-toggle="tooltip" data-placement="bottom" title="any thing here">Suger free</button>
  <button type="button" id="scc" class="btn btn-default"  data-toggle="tooltip" data-placement="bottom" title="any thing here">Saccharin</button>
  <button type="button" id="cf" class="btn btn-default"  data-toggle="tooltip" data-placement="bottom" title="any thing here">Caffeine free</button>
</div>
<br></br>
<div class="row text-center">       
<?php
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $shop=$row['shop'];
  $caffeine_free=$row["caffeine_free"];
  $suger_free=$row["suger_free"];
  $quantity=$row["quantity"];
  $saccharin=$row["saccharin"];
  $price=$row['price'];
  $url=$row['picture_url'];
  $description=$row['description'];
  $size=$row['size'];
  $name=ucwords($row['name']);
  $id=$row['id'];
      $sgf="";
          $sch="";
    $cff="";
  if($suger_free==1){
    $sgf="suger_free";
  }
   if($saccharin==1){
    $sch="saccharin";
  }
  if($caffeine_free==1){
    $cff="caffeine_free";
  }



     if($quantity<1){
      echo "<div class='col-sm-6 col-xs-12 all $sgf $sch $cff'>
            <img src='/isweets/pictures/$url' 'alt='Furniture Shoppe Stores' style='  height: 176px;
  width: 285px;'>

          <h3>$name <span style='color:red;'>Sorry this product is not available</span></h3>
          </div>";
     } else {
echo   "<div class='col-sm-6 col-xs-12 all $sgf $sch $cff'>
          <a href='show.php?id=$id'>
            <img src='/isweets/pictures/$url' 'alt='Furniture Shoppe Stores' style='  height: 176px;
  width: 285px;'>
          </a>
          <h3>$name</h3>
";


     echo   "</div>";
}}
?>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$( window ).load(function() {
  $(".saccharin").show();
  $(".suger_free").show();
  $(".caffeine_free").show();

});
$("#rg").click(function(){
$(".active").removeClass('active');
$("#rg").addClass("active");
$(".all").show();
});
$("#sf").click(function(){
  $(".active").removeClass('active');
  $("#sf").addClass("active");
   $(".all").hide();
  $(".saccharin").hide();
$(".caffeine_free").hide();
  $(".suger_free").show();


});
$("#cf").click(function(){
  $(".active").removeClass('active');
  $("#cf").addClass("active");
     $(".all").hide();

    $(".saccharin").hide();
$(".suger_free").hide();
    $(".caffeine_free").show();


});
$("#scc").click(function(){
  $(".active").removeClass('active');
  $("#scc").addClass("active");
     $(".all").hide();

  $(".caffeine_free").hide();
  $(".suger_free").hide();
  $(".saccharin").show();

});


</script>







