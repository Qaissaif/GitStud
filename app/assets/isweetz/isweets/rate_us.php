<?php session_start();

if(isset($_SESSION["user_session"]["id"])){
}else{;
header("Location:/isweets/index.php?info=Please sign in or sign up.");
}?>
<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
</script>

 </head>
 <body>
     <div class="container">
      <!-- Static navbar -->
      <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>
            <div class="row star">
         <div class="col-md-1">
         </div>
         <div class="col-md-2">
         <a href="#"><i id="1" class="fa fa-star-o fa-4x"></i></a>
         </div> 
         <div class="col-md-2">
         <a href="#"><i id="2" class="fa fa-star-o fa-4x"></i></a>
         </div>
          <div class="col-md-2">
         <a href="#"><i id="3" class="fa fa-star-o fa-4x"></i></a>
         </div> 
         <div class="col-md-2">
         <a href="#"><i id="4" class="fa fa-star-o fa-4x"></i></a>
         </div> 
         <div class="col-md-2">
         <a href="#"><i id="5" class="fa fa-star-o fa-4x"></i></a>
         </div>
      </div>
      </div>
      <div class="row">

        <div class="col-md-2">
                                    </div>

               <div class="col-md-5 center">
               <label class="text-align:center;">Any Comment</label>
         <br>
        <textarea class="form-control" id="comment" style="  width: 800px;height: 191px;" id="text"></textarea>
        </div>

        </div>
        <br>
    <div style="text-align:center;"> 
    <button type="button" class="btn btn-sweet" id="submit">Send
    </button>
        </div>


        <div>


      <script>

    var star=0;
        $("#submit").click(function(){
        $.ajax({
          method:"POST",
          url:"rated.php",
          data:{rate:star,comment:$("#comment").val()}
          
        });
        });
      $(".fa").click(function(){
       star=$(this)[0]['id'];
        $(".star").html("<h1 style='text-align:center;'>Thank You!<h1>")

      });
      $("#1").hover(function(){
       i=1;
        while(i!=2){
        $("#"+i).attr("class","fa fa-star fa-4x");
        i=i+1;
      }
    }
      ,function(){
              i=1;
        while(i!=2){
        $("#"+i).attr("class","fa fa-star-o fa-4x");
        i=i+1;
      }
      }
      );

 $("#2").hover(function(){
       i=1;
        while(i!=3){
        $("#"+i).attr("class","fa fa-star fa-4x");
        i=i+1;
      }
    }
      ,function(){
              i=1;
        while(i!=3){
        $("#"+i).attr("class","fa fa-star-o fa-4x");
        i=i+1;
      }
      }
      );

 $("#3").hover(function(){
       i=1;
        while(i!=4){
        $("#"+i).attr("class","fa fa-star fa-4x");
        i=i+1;
      }
    }
      ,function(){
              i=1;
        while(i!=4){
        $("#"+i).attr("class","fa fa-star-o fa-4x");
        i=i+1;
      }
      }
      );

 $("#4").hover(function(){
       i=1;
        while(i!=5){
        $("#"+i).attr("class","fa fa-star fa-4x");
        i=i+1;
      }
    }
      ,function(){
              i=1;
        while(i!=5){
        $("#"+i).attr("class","fa fa-star-o fa-4x");
        i=i+1;
      }
      }
      );

 $("#5").hover(function(){
       i=1;
        while(i!=6){
        $("#"+i).attr("class","fa fa-star fa-4x");
        i=i+1;
      }
    }
      ,function(){
              i=1;
        while(i!=6){
        $("#"+i).attr("class","fa fa-star-o fa-4x");
        i=i+1;
      }
      }
      );


      </script>
   
          </div>
   		<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>

		</body>

		<html>