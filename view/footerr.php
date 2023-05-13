<!-- Start Footer -->
<?php
if($chLang=='eng'){
	$lang=array(
	  "further"=> 'Further Info', "home"=> 'Home',
	  "prod"=> 'Our Products',
	  "about"=> 'About Us'
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
        "further"=> 'معلومات اكثر',
        "home"=> 'الرئيسية',
        "prod"=> 'منتجاتنا',
        "about"=> 'من نحن'
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
<footer class="bg-success" id="tempaltemo_footer"> 
            <div class="container"> 
                 
                <div class="row"> 
     
                    <div class="col-md-6 pt-1"> 
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo"><img src="assets/img/logo/3.jpg" style="width:250px;height:80px;border-radius:10px;"></h2> 
                        <ul class="list-unstyled text-white footer-link-list">
                            <li>
                                
                               <address> <i class="fas fa-map-marker-alt fa-fw"></i> <?php if(isset($address)) echo  $address; ?></address>
                            </li>
                            <li>
                                <i class="fa fa-fax fa-fw"></i>
                <a class="text-decoration-none" href="tel:<?php if(isset($phone)) echo $phone; ?>">         <span>+967   <?php if(isset($phone)) echo $phone; ?></span></a>
                            </li>
           
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a href="mailto:<?php if(isset($email)) echo $email; ?>" class="text-decoration-none" ><?php if(isset($email)) echo   $email; ?></a>
                            </li>
                        </ul>
                    </div> 
     
                    <div class="col-md-6 pt-5"> 
                        <h2 class="h2 text-white border-bottom pb-3 border-light"><?php echo $lang['further'];?></h2> 
                        <ul class="list-unstyled text-light footer-link-list"> 
                            <li><a class="text-decoration-none" href="index.php"><?php echo $lang['home'];?></a></li> 
                            <li><a class="text-decoration-none" href="about.php"><?php echo $lang['about'];?></a></li> 
                            <li><a class="text-decoration-none" href="shop1.php"><?php echo $lang['prod'];?></a></li> 
                             
                        </ul> 
                    </div> 
 
                    
                </div> 
<!--==============================================================================================================-->               
     



                <div class="row text-light justify-content-md-center  mb-4"> 
                    <div class="col-12 mb-3"> 
                        <div class="w-100 my-3 border-top border-light"></div> 
                    </div> 
                    <div class="col-md-auto"> 
                    <ul class="list-inline text-left footer-icons"> 
                  <?php 
global $website_name;
global  $social_media;
global $logo;

$sql1="select * from footer_socialmedia where state !=2 and name_of_website!='whatsapp' ";
$sq1 = $con->prepare($sql1);
$sq1->execute();
if ($sq1->rowcount()) {
 
    foreach ($sq1->fetchall() as $rows) {
        $social_media=$rows["social_media"];
       
        $website_name=$rows["name_of_website"];
     
        $logo=$rows["logo"];

       echo "<li class='list-inline-item border border-light rounded-circle text-center' style='margin:10px'> 
        <a class='text-light text-decoration-none' target='_blank' href='$social_media'>
<i class='$logo'> </i></a>
        
        </li>"; 
    }
}
$sqlwtsapp="select * from footer_socialmedia where state !=2 and name_of_website='whatsapp' ";
$sq1watsapp = $con->prepare($sqlwtsapp);
$sq1watsapp->execute();
if ($sq1watsapp->rowcount()) {
 
    foreach ($sq1watsapp->fetchall() as $rowahtspp) {
        $Whatspp=$rowahtspp['name_of_website'];
        $logoApp=$rowahtspp['logo'];
        $social_whatsapp=$rowahtspp['social_media'];
        
         echo "<li class='list-inline-item border border-light rounded-circle text-center' style='margin:10px'> 
        <a class='text-light text-decoration-none' target='_blank' href=https://api.whatsapp.com/send?phone=$social_whatsapp'>
<i class='$logoApp'> </i></a>
       
        </li>"; 
           }

}


?>
                     
                   
                        </ul> 
                    </div> 
                </div> 
                <!--==============================================================================================================-->               
            </div> 
     
            <div class="w-100 bg-black py-3"> 
                <div class="container"> 
                    <div class="row pt-2"> 
                        <div class="col-12"> 
                        <center> 
                            <p class="text-left text-light"> 
                                Copyright &copy; 2021 alaber pharma  
                                | Designed by <a rel="sponsored" href="" target="_blank">alnajm-techno</a> 
                            </p> 
                        </center> 
                        </div> 
                    </div> 
                </div> 
            </div> 
     
        </footer> 
        <!-- End Footer --> 
     
<!-- Start Script --> 
<script src="assets/js/jquery-1.11.0.min.js"></script> 
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script> 
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
</script> 
</body> 
 
</html>
























