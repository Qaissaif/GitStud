<style>
.cuadro_intro_hover{
        padding: 0px;
    position: relative;
    overflow: hidden;
    height: 200px;
  }
  .cuadro_intro_hover:hover .caption{
    opacity: 1;
    transform: translateY(-150px);
    -webkit-transform:translateY(-150px);
    -moz-transform:translateY(-150px);
    -ms-transform:translateY(-150px);
    -o-transform:translateY(-150px);
  }
  .cuadro_intro_hover img{
    z-index: 4;
  }
  .cuadro_intro_hover .caption{
    position: absolute;
    top:150px;
    -webkit-transition:all 0.3s ease-in-out;
    -moz-transition:all 0.3s ease-in-out;
    -o-transition:all 0.3s ease-in-out;
    -ms-transition:all 0.3s ease-in-out;
    transition:all 0.3s ease-in-out;
    width: 100%;
  }
  .cuadro_intro_hover .blur{
    background-color: rgba(0,0,0,0.7);
    height: 300px;
    z-index: 5;
    position: absolute;
    width: 100%;
  }
  .cuadro_intro_hover .caption-text{
    z-index: 10;
    color: #fff;
    position: absolute;
    height: 300px;
    text-align: center;
    top:-20px;
    width: 100%;
  }

    </style>
    <hr style="border-top:3px solid #B35278;">
        <footer style="margin-top: 58px;">

            <div class="row-fluid">
                <div class="col-lg-12">


                  <div class="col-lg-3 col-md-6">
                <div class="container">
              <div class="col-lg-3 col-md-6">
                <h3>Contact Us:</h3>
        <p>Have a question or feedback? Contact me!</p>
        <p><a title="Contact me!"><i class="fa fa-envelope"></i> Contact</a></p>
        <p>Phone:+962799692011</p>
        <p>Email:isweetsInc@gmail.com</p>



      
      </div>

            <div class="col-lg-3 col-md-4">
            <h3>Follow:</h3>
      
      
<a href="" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg">
  <i class="fa fa-square-o fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x"></i>
</span>
Twitter</a>
<a href=""  target="_blank" title="Facebook"><i class="fa fa-facebook-official fa-2x"></i>
Facebook</a>
            </div>

   
      <div class="col-lg-3">
            <div class="cuadro_intro_hover " style="background-color:#cccccc;">
         
              <img src="/isweets/assets/images/bulb.jpg" class="img-responsive" alt="">
      
            <div class="caption">
              <div class="blur"></div>
              <div class="caption-text">
                <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">About us</h3>
                <p>Wanna Know more About us ?</p>
                <a class=" btn btn-info" href="/isweets/about_us.php"><span class="glyphicon glyphicon-plus">GO</span></a>
              </div>
            </div>
          </div>
        
      </div>
       <div class="col-lg-3">
            <div class="cuadro_intro_hover " style="background-color:#cccccc;">
           
              <img src="/isweets/assets/images/question.jpg" class="img-responsive" alt="">
         
            <div class="caption">
              <div class="blur"></div>
              <div class="caption-text">
                <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Why Us</h3>
                <p>check out why we come up with this!</p>
                <a class=" btn btn-info" href="#"><span class="glyphicon glyphicon-plus">GO</span></a>
              </div>
            </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>

      </div>
                      
        </footer>
    <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/info.php';?>

