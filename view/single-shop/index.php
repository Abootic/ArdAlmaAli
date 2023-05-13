<!doctype html>




<?php

error_reporting(0);

ini_set('display_errors', 0);

session_start();
include_once("../../control-panel/db.php");
$currPage="no";
//-================================ Language ====================
if($chLang=='eng'){
	$lang=array(
	"home"=>'Home', "cont"=>'Contact', "about"=>'About',"prod"=>'Products',
	"log"=>'Login',  "back"=>'Back', "serch"=>'Search',
 	"tit"=>'Alaber', "lang"=>'Language',"dir"=>'ltr', "align"=>'left', "brands"=>'suppliers', "ourC"=>'Our Company',
	"ourProduct"=>'products', "aboutUs"=>'ِAbout',"admin"=>'Admin',
	"ocData"=>'AL-aber pharma for medicine and medical supplies',
    "opData"=>'AL-aber pharma for medicine and medical supplies',
    "obData"=>'AL-aber pharma for medicine and medical supplies',
    "brand"=>'Our Suppliers',
    "see"=>'SEE',
    "read"=>'See More...'

 );
} // end of if
else if($chLang=='ar'){
	$lang=array(
	"home"=>'الرئيسية', "cont"=>'التواصل', "about"=>'العابر' ,"prod"=>'منتجاتنا',
	"log"=>'تسجيل الدخول', "back"=>'العودة', "serch"=>'بحث', 
 	"tit"=>'العابر للإستيراد', "lang"=>'اللغة',"dir"=>'rtl', "align"=>'right', "brands"=>'الموردين', "ourC"=>'شركتنا',
	 "ourProduct"=>'منتجاتنا', "aboutUs"=>'من نحن', "admin"=>'الأدمن',
	 "ocData"=>'شركة العابر لإستيراد الادوية والمعدات الطبية',
        "opData"=>'شركة العابر لإستيراد الادوية والمعدات الطبية',
        "obData"=>'شركة العابر لإستيراد الادوية والمعدات الطبية',
        "brand"=>'الموردين',
        "see"=>'فتح',
        "read"=>'المزيد...'
 );
} // end of else
 
 //============ End of changing language section ===================================
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $lang["tit"]; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/logo/2.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/2.ico">
   
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel='stylesheet' href='../carousel/aboutstyle.css'>
    <link rel='stylesheet' href='../carousel/footer.css'>

	
    
	<?php 
	$sql="select * from slides";
	$q=$con->prepare($sql);
	$q->execute();
	$n=$q->fetchall();
	//var_dump($n);
	$slide1 = $n[0]['img'];
	$slide2 = $n[1]['img'];
	$slide3 = $n[2]['img'];
	?>










		<link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  
 <body dir="<?php echo $lang["dir"]; ?>" align="<?php echo $lang["align"]; ?>">
    <!-- navbar -->
    <header dir="<?php echo $lang["dir"]; ?>" align="<?php echo $lang["align"]; ?>">
        <a href="../index.php" class="logo"><img src="assets/img/logo/logo1.png" alt="" style="width:200px;height:60px;"></a>
        
        	<li>
                 <i class="fas fa-ksa fa-fw"></i>
           		<?php 

					if($chLang=="eng"){
						echo "<a class=' lannggg' style='' onclick='changeLanguage(\"ar\");'>                   <i class='fa fa-fw fa-language name='find' style='color:white'></i> العربية </a>";
					}
					else{
						echo "<a class='lannggg' style='' onclick='changeLanguage(\"eng\");'>                   <i class='fa fa-fw fa-language name='find' style='color:white'></i> English</a>";
					}
				?>
			</li>
        
        
        <div class="menuToggle" onclick="toggleMenu();" ></div>
        <ul class="navigation">
            <li ><a   id= "<?php if($currPage == 'index.php') echo 'currentPage'; else echo 'nothing'; ?>" href="../index.php" onclick="toggleMenu();"><?php echo $lang["home"]; ?></a></li>
            <li><a  id= "<?php if($currPage == 'about.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="../about.php"><?php echo $lang["about"]; ?></a></li>
            <li><a  id= "<?php if($currPage == 'shop1.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="../shop1.php"><?php echo $lang["prod"]; ?></a></li>
            <li><a  id= "<?php if($currPage == 'contact.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="../contact.php"><?php echo $lang["cont"]; ?></a></li>
			<li><a  id= "<?php if($currPage == 'brands.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="../brands.php"><?php echo $lang["brands"]; ?></a></li>
			<li>
           		<?php 
					if($chLang=="eng"){
						echo "<a style='color:white' onclick='changeLanguage(\"ar\");'>عربية</a>";
					}
					else{
						echo "<a style='color:white' onclick='changeLanguage(\"eng\");'>English</a>";
					}
				?>
			</li>
			<?php 
				if(isset($_SESSION["admin_id"]) and ($_SESSION["admin_role"]==1 or $_SESSION["admin_role"]==2)){
					echo "<li><a href='../control-panel/admin/controlpanel/dashboard.php'>$lang[admin]</a></li>";
				}
			?>
			
			<li>
			<form action="search.php" method="post" dir="<?php if($chLang=='ar')echo 'ltr'?>">
                <div class="input-group mb-2">
                    <input type="text" name="search" class="form-control border-0"   placeholder="<?php echo  " " .$lang["serch"] . " "?>" style="padding:0rem 0rem; <?php if($chLang=='ar') echo 'text-align:right'?>" required>
                    <button name="find" type="submit" class="input-group-text  bg-white  border-0"   >
                        <i class="fa fa-fw fa-search" name="find" style="color:#1b75bc"></i>
                    </button>
                </div>
            </form>
			</li>
        </ul>
		
    </header>
    <!-- end navbar -->

		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="heading-section mb-5 pb-md-4">Carousel #10</h2>
					</div>
					<div class="col-md-12">
						<div class="slider-hero">
							<div class="featured-carousel owl-carousel">
								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/slider-1.jpg);">
											<div class="text text-center">
												<h2>Discover New Places</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/slider-2.jpg);">
											<div class="text text-center">
												<h2>Dream Destination</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/slider-3.jpg);">
											<div class="text text-center">
												<h2>Travel Exploration</h2>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="my-5 text-center">
			          <ul class="thumbnail">
			            <li class="active img"><a href="#"><img src="images/thumb-1.jpg" alt="Image" class="img-fluid"></a></li>
			            <li><a href="#"><img src="images/thumb-2.jpg" alt="Image" class="img-fluid"></a></li>
			            <li><a href="#"><img src="images/thumb-3.jpg" alt="Image" class="img-fluid"></a></li>
			          </ul>
			        </div>
						</div>
					</div>
				</div>
			</div>
		</section>



<!-- Start Footer -->
<?php
if($chLang=='eng'){
	$lang=array(
	  "further"=> 'Further Info',
	  "contactInfo"=> 'Contact Info',
	  "location"=> 'Location',
	  "home"=> 'Home',
	  "prod"=> 'Products',
	  "about"=> 'About',
	  "contact"=> 'Contact',
	  "suplier"=> 'Suppliers',
	  "phone"=> 'Phone',
	  "mobile"=> 'Mobile',
	  "email"=> 'Email',
	  "contactUs"=> 'Contact Us',
	  "para"=> 'A Group Of Pharmacists With More Than 20 Years Of Experience '
	  
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
       "further"=> 'معلومات أكثر',
	  "contactInfo"=> 'التواصل',
	  "location"=> 'الموقع',
	  "home"=> 'الرئيسية',
	  "prod"=> 'منتجات',
	  "about"=> 'العابر',
	  "contact"=> 'تواصل',
	  "suplier"=> 'الموردين',
	  "phone"=> 'الهاتف',
	  "mobile"=> 'موبايل',
	  "email"=> 'إيميل',
	  "contactUs"=> 'تواصل بنا',
        "para"=> 'مجموعة من الصيادلة التي تضم أكثر من 20 سنه من الخبرة '
        );
} // end of else
 ?>

                      <?php
      
     
global $email;
global $address;
global $phone;



  
        $sql="select email,address, phone_no from footer_section where state !=2";
        $sq = $con->prepare($sql);
        $sq->execute();
        if ($sq->rowcount()) {
         
            foreach ($sq->fetchall() as $row) {
                $address=$row["address"];
               
                $phone=$row["phone_no"];
             
                $email=$row["email"];

            }
        }
    

      
      ?>
      
      
      
<!-- Start Footer --> 
<div class="bg-success"  id="alaberfooter">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between  footercenter" >
            <div class="col-md-3 col-sm-12 pt-5 pr-5">
                <img src="../assets/img/logo/3.jpg" class="img-fluid img-thumbnail" >
                <p class="pt-3"><?php echo $lang['para'];?></p>
           <ul class="pt-3 px-0">
               <?php 
global $website_name;
global  $social_media;
global $logo;

$sql1="select * from footer_socialmedia where state !=2";
$sq1 = $con->prepare($sql1);
$sq1->execute();
if ($sq1->rowcount()) {
 
    foreach ($sq1->fetchall() as $rows) {
        $social_media=$rows["social_media"];
       
        $website_name=$rows["name_of_website"];
     
        $logo=$rows["logo"];
        if($website_name == "whatsapp"){
             echo "<a target='_blank' href='https://api.whatsapp.com/send?phone=$social_media' class='px-2' style='color:#1b75bc'><i class='$logo fa-2x' style='background: white;
  border-radius: 5px;
  height: 1em;
  width: 1em;
  line-height:1em'>
        
</i></a>
        
        "; 
        }else{
            echo "<a target='_blank' href='$social_media' class='px-2' style='color:#1b75bc'><i class='$logo fa-2x' style='background: white;
  border-radius: 5px;
  height: 1em;
  width: 1em;
  line-height:1em'>
        
</i></a>
        
        "; 
        }
      
    }
}


?>
                     
               <!--<a href="" class="px-2">
               <i class=" fab fa-facebook-square fa-2x" style=""></i></a>
               <a href="" class="px-2">
               <i class=" fab fa-instagram-square fa-2x" style=""></i></a>
               <a href="" class="px-2">
               <i class=" fab fa-whatsapp-square fa-2x" style=""></i></a>-->
           </ul>
            </div>
            <div class="col-md-3 col-sm-12 pt-5 ">
                <h2 class="h2 pb-3"><?php echo $lang['further'];?></h2>
                <p><a href="../index.php"><?php echo $lang['home'];?></a></p>
                <p><a href="../about.php"><?php echo $lang['about'];?></a></p>
                <p><a href=" ./contact.php"><?php echo $lang['contact'];?></a></p>
                <p><a href="../brands.php"><?php echo $lang['suplier'];?></a></p>
            </div>
            <div class="col-md-3 col-sm-12 pt-5">
                <h2 class="h2 pb-3"><?php echo $lang['contactInfo'];?></h2>
                <p><i class="fas fa-map-marker-alt"></i><span class="px-2"></span><?php if(isset($address)) echo  $address; ?></p>
                
                <p><i class="fas fa-phone-alt"></i><span class="px-2"></span><?php echo $lang['phone'].":";?><a class="text-decoration-none" href="tel:<?php if(isset($phone)) echo $phone; ?>">         <span>+967   <?php if(isset($phone)) echo $phone; ?></span></a><br>
                <span class="px-3"></span><?php echo $lang['mobile'].":";?><a class="text-decoration-none" href="tel:<?php if(isset($phone)) echo $phone; ?>">         <span>+967   <?php if(isset($phone)) echo $phone; ?></span></a>
                </p>
                
                <p>
                    <i class="fas fa-envelope"></i>
                    <span class="px-2"></span>
                   <?php echo $lang['email'].":";?>                                 <a href="mailto:<?php if(isset($email)) echo $email; ?>" class="text-decoration-none" ><?php if(isset($email)) echo   $email; ?></a>
                </p>
            </div>
        <div class="col-md-3 col-sm-12 pt-5">
                
                <h2 class="h2 px-2 " style="display: inline"><?php echo $lang['location'];?>
                </h2>
                <div class="pt-3" style="border-radius: 10px">
                <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1923.7271143456578!2d44.185820437928456!3d15.351867089960693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603db7638de355d%3A0xc1fab2461bfe6dd2!2z2LXZitiv2YTZitipINin2YTYudix2LTZig!5e0!3m2!1sar!2s!4v1629154005153!5m2!1sar!2s"  width="90%" height="200" style="border-radius:10px;" allowfullscreen="" loading="lazy"></iframe></div>
                
            </div>
        </div>
    </div>
    
    
</div>
        <!-- End Footer --> 
     
<!-- Start Script --> 
<script src="../assets/js/jquery-1.11.0.min.js"></script> 
<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script> 
<script src="../assets/js/bootstrap.bundle.min.js"></script> 
<script src="../assets/js/templatemo.js"></script> 
 
 
<!-- script for header --> 
<script type="text/javascript"> 
    window.addEventListener('scroll',function(){ 
        const header = document.querySelector('header'); 
        header.classList.toggle("sticky", window.scrollY > 0); 
         
    }); 
 
    function toggleMenu(){ 
        const menuToggle = document.querySelector('.menuToggle'); 
        const navigation = document.querySelector('.navigation'); 
        navigation.classList.toggle('active'); 
        menuToggle.classList.toggle('active'); 
    } 
    
    $(window).on("load , resize",function () {
    var viewportWidth = $(window).width();
    if (viewportWidth < 1000) {
            $(".footercenter").addClass("text-center");
    }
});
</script> 

<!--    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>-->
  </body>
</html>