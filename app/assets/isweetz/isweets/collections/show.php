<?php session_start(); ?>
<?php 

$id_pro=$_GET['id'];
if(!( $conn= mysql_connect("localhost","root","123") ))
die("connection error!");
if (!mysql_select_db("isweets",$conn))
die("error occurred! ");
 $q="SELECT * FROM products WHERE id=$id_pro; ";
if(!$result=mysql_query($q,$conn))
die("wrong query");



while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $shop=$row['shop'];
  $price=$row['price'];
  $url=$row['picture_url'];
  $description=$row['description'];
  $size=$row['size'];
  $name=$row['name'];
  $id=$row['id'];
}

?>

<html>
 <head>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/shared_style.php';?>
 </head>
 <body>
	
     <div class="container">

<?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/header.php';?>

		<div class="row featurette">
       
        	<div class="col-md-5">
         		<img data-holder-rendered="true" style="height: 200px;width:400px;" class="featurette-image img-responsive center-block" width="500" height="500" data-src="" src='/isweets/pictures/<?php echo $url ?>' > 
                <?php if(isset($_GET["info_health"])){?>
                <span style="color:green;font-weight:800;text-align:center;"><?php echo $_GET["info_health"] ?></span>
                <?php }?>
        	</div>
         	<div class="col-md-6">
         		<div class="col-md-6">
          			<h2 class=><?php echo ucwords($name); ?></h2>
          			<h2><span class="text-muted"><?php echo $price ?>JD per 250g</span></h2>
                <?php if ($_SESSION["user_session"]["type"]!="amdin" && $_SESSION["user_session"]["type"]!="shop") {?>
          			<button class="btn btn-sweet" onclick="addcart(<?php echo $id ?>,<?php echo $shop ?>);">Add to cart</button>
                              </div>
              <div class="col-md-6">
                <p>
                <form action="check_health.php"  method="POST">
                <input type="radio" name="gendar" value="male" checked> <b> Male </b> 
                <input type="radio" name="gendar" value="female"> <b> Female </b>
                <br>
                Height:
                <select class="form-control col-sm-2" name="height" id="expiry-month">
                <option value="135">130-140</option>
                <option value="145">141-150</option>
                <option value="155">151-160</option>
                <option value="165">161-170</option>
                <option value="175">171-180</option>
                <option value="185">181-190</option>
                <option value="195">191-200</option>

                </select>
                <br>
                Weight:
                    <select class="form-control col-sm-2" name="weight" id="expiry-month">
                <option value="43">40-45</option>
                <option value="48">46-50</option>
                <option value="58">56-60</option>
                <option value="63">61-65</option>
                <option value="68">66-70</option>
                <option value="73">71-75</option>
                <option value="78">76-80</option>
                <option value="83">81-85</option>
                <option value="87">86-90</option>
                <option value="93">91-95</option>
                <option value="97">96-100</option>
                <option value="103">101-105</option>
                <option value="107">106-110</option>
                <option value="113">111-115</option>
                <option value="117">116-120</option>
                <option value="123">121-125</option>
                <option value="127">126-130</option>
                <option value="133">131-135</option>
                <option value="137">136-140</option>
                <option value="143">141-145</option>
                                              </select>
                                              <br>
                                              Age:
                              <select class="form-control col-sm-2" name="age" id="expiry-month">
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
                <option value="60">60</option>
                <option value="61">61</option>
                <option value="62">62</option>
                <option value="63">63</option>
                <option value="64">64</option>
                <option value="65">65</option>
                <option value="66">66</option>
                <option value="67">67</option>
                <option value="68">68</option>
                <option value="69">69</option>                
                <option value="70">70</option>
                <option value="71">71</option>
                <option value="72">72</option>
                <option value="73">73</option>
                <option value="74">74</option>
                <option value="75">75</option>
                <option value="76">76</option>
                <option value="77">77</option>
                <option value="78">78</option>
                <option value="79">79</option>
                <option value="80">80</option>
                <option value="81">81</option>
                <option value="82">82</option>
                <option value="83">83</option>
                <option value="84">84</option>
                <option value="85">85</option>
                <option value="86">86</option>
                <option value="87">87</option>
                <option value="88">88</option>
                <option value="89">89</option>
                <option value="90">90</option>
                <option value="91">91</option>
                <option value="92">92</option>
                <option value="93">93</option>
                <option value="94">94</option>
                <option value="95">95</option>
                <option value="96">96</option>
                <option value="97">97</option>
                <option value="98">98</option>
                <option value="99">99</option>
                <option value="100">100</option>

              </select>

                <input type="hidden" name="show_id" value="<?php echo $id_pro ?>">
                <?php if($_SESSION["user_session"]["cholesterol"]==1){?>
                <input type="text" id="cholesterol" name="cholesterol" class="form-control" placeholder="Cholesterol record here" required>
                <?php }?>

                <button class="btn btn-lg btn-success btn-block" type="submit">Health Care!</button>

                </form>

                <i style="color:#B35278;font-size:1em;" class="fa fa-heart"></i>
                <i style="color:#B35278;font-size:2em;" class="fa fa-heart"></i>
                <i style="color:#B35278;font-size:3em;" class="fa fa-heart"></i>
                <i style="color:#B35278;font-size:4em;" class="fa fa-heart"></i>
                <i style="color:#B35278;font-size:5em;" class="fa fa-heart"></i>

                </p>
              </div>
            </div>
        </div>
        </div>
        <hr style="border-top-color:gray;">
        <div class="row-fluid featurette text-center">
            <p class="lead" style="color:#B35278;"><?php echo $description ?></p>
                         <?php if($_SESSION["user_session"]["diabetes"]==1){?>
            <p class="btn-sweet ">Its very important to know how to cope with illness if you have diabetes or know or care for somebody with diabetes. any illness or other type of stress will raise your blood pressure(glucose) levels, even if you are off your food or eating less, and increased glucose level can make you very oehydrated.</p>
            <?php }?>
             <?php if($_SESSION["user_session"]["blood_presure"]==1){?>
            <p class="btn-sweet">You have to make sure your blood pressure is under 140/90 mm hg , aim for healthy weight.If your overweight or obese, carrying this extra weight increases your risk of high blood pressure. To determine if you need to lose weight,find out your body mass index BMI. If your BMI is above healty range >25 or if your waist measurment is greater than 35 inches 'women' or 40 inche 'men' you exceeded abdominal weight and you may benefit from weight loss.</p>
            <?php }?>

        
        </div>
                <?php } else {
                  echo "<span>You cant add to your cart in superuser account.</span></div></div>";

                }
                  ?>


          <?php include  $_SERVER['DOCUMENT_ROOT'].'/isweets/footer.php';?>
    <script>

    function addcart(id,shop){
    	$.ajax({
  method: "POST",
  url: "addcart.php",
  data: {product_id:id,shop:shop}
	}).done(function(data) {
    bootbox.alert(data);
  	});
    }
    
    </script>

</body>
</html>