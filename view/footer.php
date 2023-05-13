<!-- Start Footer -->
<?php
if($chLang=='eng'){
	$lang=array(
	  "further"=> 'Further Info',
	  "contactInfo"=> 'Contact Info',
	  "location"=> 'Location',
	  "home"=> 'Home',
	  "prod"=> 'Products',
	  "about"=> 'About us',
	  "suplier"=> 'suppliers',
      "contact"=> 'Contact',
	  "phone"=> 'Phone',
	  "mobile"=> 'Mobile',
	  "email"=> 'Email',
	  "contactUs"=> 'Contact Us',
	  "para"=> 'Our Company growing medical company will be your trustworthy partner  '
	  
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
       "further"=> 'معلومات أكثر',
	  "contactInfo"=> 'التواصل',
	  "location"=> 'الموقع',
	  "home"=> 'الرئيسية',
	  "prod"=> 'منتجات',
	  "about"=> 'من نحن',
      "suplier"=> 'الموردون',
	  "contact"=> 'تواصل',
	 
	  "phone"=> 'الهاتف',
	  "mobile"=> 'موبايل',
	  "email"=> 'إيميل',
	  "contactUs"=> 'تواصل بنا',
        "para"=> 'ستكون شركتنا المتنامية شريكك الجدير بالثقة'
        );
} // end of else
 ?>
<?php 
   require_once("../control-panel/db.php");
      ?>
                      <?php
      
     
global $email;
global $address;
global $phone;



  
        $sql="select email,address_eng,address_ar, phone_no, phone_sec, google_map from footer_section where state !=2";
        $sq = $con->prepare($sql);
        $sq->execute();
        if ($sq->rowcount()) {
         
            foreach ($sq->fetchall() as $row) {
                if($chLang=="eng")
                $address=$row["address_eng"];
                else
$address=$row["address_ar"];
               
                $phone1=$row["phone_no"];
             $phone2=$row["phone_sec"];
                $email=$row["email"];
                $map=$row["google_map"];

            }
        }
    

      
      ?>
      
      
      
<!-- Start Footer --> 
<div class="bg-success"   id="alaberfooter">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between  footercenter" >
            <div class="col-md-3 col-sm-12 pt-5 pr-5">
                <img src="assets/img/logo/12.png" class="img-fluid img-thumbnail" >
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
                <p><a href="index.php"><?php echo $lang['home'];?></a></p>
                <p><a href=""><?php echo $lang['about'];?></a></p>
                <p><a href="brands.php"><?php echo $lang['suplier'];?></a></p>
                <p><a href="contact.php"><?php echo $lang['contact'];?></a></p>
               
            </div>
            <div class="col-md-3 col-sm-12 pt-5">
                <h2 class="h2 pb-3"><?php echo $lang['contactInfo'];?></h2>
                <p><i class="fas fa-map-marker-alt"></i><span class="px-2"></span><?php if(isset($address)) echo  $address; ?></p>
                
                <p><i class="fas fa-phone-alt"></i><span class="px-2"></span><?php echo $lang['phone'].":";?><a class="text-decoration-none" href="tel:<?php if(isset($phone2)) echo $phone2; ?>">         <span>  <?php if(isset($phone2)) echo $phone2; ?></span></a><br>
                
                <i class="fas fa-mobile"></i>
                <span class="px-2"></span><?php echo $lang['mobile'].":";?><a class="text-decoration-none" href="tel:<?php if(isset($phone1)) echo $phone1; ?>">         <span>   <?php if(isset($phone1)) echo $phone1; ?></span></a>
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
                <iframe  src="<?php echo $map;?>"  width="90%" height="200" style="border-radius:10px;" allowfullscreen="" loading="lazy"></iframe></div>
                
            </div>
        </div>
    </div>
    
    
</div>
        <!-- End Footer --> 
     
<!-- Start Script --> 
<script src="assets/js/jquery-1.11.0.min.js"></script> 
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script><script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script> 
<script src="assets/js/templatemo.js"></script> 
 
 
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

</body> 
 
</html>
























