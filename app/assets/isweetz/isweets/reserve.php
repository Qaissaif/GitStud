<?php session_start(); ?>
<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
 </head>
 <body>
 <style>
.bootstrap-datetimepicker-widget ul{
    margin-left: -39px !important;
}
 </style>
	
     <div class="container">

<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';
$shop_ids=$_GET["shop"];
?>
<form action="add_reservation.php" method="post">
 <label>Please pick your time that you want to show up in.</label> 
<div class="row">
<div class="col-xs-6">
  <div id="datetimepicker3" class="input-append">
  <input data-format="MM/dd/yyyy" name='time' value="<?php echo date("m/d/20y"); ?>" id="time" class="form-control" type="text">    <span class="add-on">
      <a href="#" data-time-icon="icon-time" data-date-icon="icon-calendar"><i class="fa fa-calendar fa-2x" style="float:right;"></i>
      </a>
    </span>
  </input>
  </div>
  <br><br>
   <b>Number of people</b><input class="form-control" value='1' type="number" name="people">
   <input type="checkbox" name="kunafa" value="1"><b> Kunafa</b></br>
     <input type="checkbox" name="coffee" value="1"><b> Coffee</b> </br>
    <input type="checkbox" name="choco" value="1"><b> Chocolate</b>  </br>
   <input type="checkbox" name="water" value="1"><b> Water</b>  </br>
    <input type="checkbox" name="soft" value="1"> <b> Softdrinks</b> </br>
    <input type="hidden" value="<?php echo $shop_ids; ?>" name="shop">
  <button id="submit" class="btn btn-sweet pull-right">Submit</button>
  </form>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker3').datetimepicker({
      language: 'en',
      pick12HourFormat: true
    });
  });

</script>

</div>
</div>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>

</body>
</html>