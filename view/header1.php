<?php
require_once("../control-panel/db.php");
//-================================ Language ====================
if($chLang=='eng'){
	$lang=array(
	"home"=>'Home', "cont"=>'Contact', "about"=>'About Us',"prod"=>'Products',
	"log"=>'Login',  "back"=>'Back', "serch"=>'Search', "brand"=>'Our Brands',
 "tit"=>'Alaber Pharma', "lang"=>'Language',"dir"=>'ltr', "align"=>'left'

 );
} // end of if
else if($chLang=='ar'){
	$lang=array(
	"home"=>'الصفحة الرئيسية', "cont"=>'تواصل معنا', "about"=>'عن الشركة' ,"prod"=>'منتجاتنا',
	"log"=>'تسجيل الدخول', "back"=>'العودة', "serch"=>'بحث', "brand"=>'وكلاؤنا', 
 "tit"=>'العابر للإستيراد', "lang"=>'اللغة',"dir"=>'rtl', "align"=>'right'
 );
} // end of else
 
 //============ End of changing language section ===================================
 
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../control-panel/db.php");?>
<head>
<title><?php echo $lang["tit"]; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/2.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
<!-- </head> -->

<body dir="<?php echo $lang["dir"]; ?>" align="<?php echo $lang["align"]; ?>">
    <!-- navbar -->
    <!-- Start Top Nav -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark   shadow"  style="background-color: #3bbfcc">
        <div class="container  d-flex justify-content-between align-items-center  " >
            

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                
            <img src="assets/img/logo/logo1.png" alt="" style="width:150px;height:60px;"/>
            </a>

            <button class="navbar-toggler  border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
                
            </button>

            <div class="align-self-center nn  nnn collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav" style="width:100%">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php" onclick="toggleMenu();" style="color:white;"><?php echo $lang["home"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php" style="color:white;"><?php echo $lang["about"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php" style="color:white;"><?php echo $lang["prod"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="brands.php" style="color:white;"><?php echo $lang["brand"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php" style="color:white;"><?php echo $lang["cont"]; ?></a>
                        </li>
                        <?php 
									if($chLang=="eng"){
										echo "<li class='nav-item'><a style='color:white;' onclick='changeLanguage(\"ar\");'>عربية</a></li>";
									}
									else{
										echo "<li class='nav-item'><a style='color:white;' onclick='changeLanguage(\"eng\");'>English</a></li>";
									}
								?>
                    </ul>   
                </div>
                <div class="navbar  align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text" >
                                <i class="fa fa-fw fa-search" ></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </nav>

    <script>
//==========  changeLanguage function ===============
function changeLanguage(lang){
		var langRq;
		if(window.XMLHttpRequest)          // chrom firefox safari ie+7
			 langRq= new XMLHttpRequest();
		else      // ie -6
			 langRq= new ActiveXObject("Microsoft.XMLHTTP");
		
		langRq.onreadystatechange = function(){
		
		if(this.readyState ===4 && this.status === 200){
			var res =this.responseText;
			if(res==="yes"){
				location.reload(true);
			}
		}
			
	}; //end of onreadystatechange function
	langRq.open("POST","lang-control.php",true);
	langRq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	langRq.send("language="+lang);
	
	
}// end of the main function (changeLanguage)

</script>