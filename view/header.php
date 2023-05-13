<?php

error_reporting(0);

ini_set('display_errors', 0);

session_start();
include_once("../control-panel/db.php");

			
$currPage="no";
//-================================ Language ====================
if($chLang=='eng'){
	$lang=array(
	"home"=>'Home', "cont"=>'Contact', "about"=>'About us',"prod"=>'Products',
	"log"=>'Login',  "back"=>'Back', "serch"=>'Search',
 	"tit"=>'Alaber', "lang"=>'Language',"dir"=>'ltr', "align"=>'left', "brands"=>'suppliers', "ourC"=>'Our Company',
	"ourProduct"=>'products', "aboutUs"=>'ِAbout',"admin"=>'Admin',
	"ocData"=>'AL-aber pharma for medicine and medical supplies',
    "opData"=>'AL-aber pharma for medicine and medical supplies',
    "obData"=>'AL-aber pharma for medicine and medical supplies',
    "brand"=>' Partners',
    "see"=>'SEE',
    "read"=>'See More...'

 );
} // end of if
else if($chLang=='ar'){
	$lang=array(
	"home"=>'الرئيسية', "cont"=>'التواصل', "about"=>'من نحن' ,"prod"=>'منتجاتنا',
	"log"=>'تسجيل الدخول', "back"=>'العودة', "serch"=>'بحث', 
 	"tit"=>'العابر للإستيراد', "lang"=>'اللغة',"dir"=>'rtl', "align"=>'right', "brands"=>'الموردون', "ourC"=>'شركتنا',
	 "ourProduct"=>'منتجاتنا', "aboutUs"=>'من نحن', "admin"=>'الأدمن',
	 "ocData"=>'شركة العابر لإستيراد الادوية والمعدات الطبية',
        "opData"=>'شركة العابر لإستيراد الادوية والمعدات الطبية',
        "obData"=>'شركة العابر لإستيراد الادوية والمعدات الطبية',
        "brand"=>'شركائنا',
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

    <link rel="apple-touch-icon" href="assets/img/logo/2.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/2.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel='stylesheet' href='carousel/footer.css'>

	<?php
		$currentPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		$currPage=$currentPageName;
		if($currentPageName == "index.php"){
			echo "<link rel='stylesheet' href='carousel/style.css'>";
		}
		else{
			
			echo "<link rel='stylesheet' href='carousel/aboutstyle.css'>";
		}
	?>
     <!-- css for vanbar and slider 
     <link rel="stylesheet" href="carousel/style.css"> 
     css for hea of about page -->

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
	<style>
	    .lannggg {
	        text-decoration:none;
	        color:#fff ;
	        border: 2px solid #fff ;
	        border-radius:12px;
	        padding:3px;
	    }
	      .lannggg:hover{
	         color:#fff !important;
	        background-color:#000 !important;
	        }

	    #currentPage{
	        
	        color: #fff !important
	        
	    }
		header ul{
			margin:10px 0px 0px 0px;
		}
		@media (max-width: 991px) {
			header ul{
				margin-top: 0px;
			}
		}
		.slidee:nth-child(1){
			background-image: url('../control-panel/images/slids/<?php echo $slide1;?>')
		}
		
		.slidee:nth-child(2){
			background-image: url('../control-panel/images/slids/<?php echo $slide2;?>')
		}
		.slidee:nth-child(3){
			background-image: url('../control-panel/images/slids/<?php echo $slide3;?>')
		}

		.dft-link-style{
			color:#fff;
			text-decoration:none;
		}
		.brand-img-size{
			min-height:90px;
			max-height:100px;
			min-width:60px;
			max-width:70px;"
		}
	</style>

	<!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
</head>

<body dir="<?php echo $lang["dir"]; ?>" align="<?php echo $lang["align"]; ?>">
    <!-- navbar -->
    <header dir="<?php echo $lang["dir"]; ?>" align="<?php echo $lang["align"]; ?>">
        <a href="index.php" class="logo"><img src="assets/img/logo/13.png" alt="" style="width:200px;height:60px;"></a>
        
        	<li>
                 <i class="fas fa-ksa fa-fw"></i>
           		<?php 

					if($chLang=="eng"){
						echo "<a class=' lannggg' style='' onclick='changeLanguage(\"ar\");'>                  العربية </a>";
					}
					else{
						echo "<a class='lannggg' style='' onclick='changeLanguage(\"eng\");'>                 English</a>";
					}
				?>
			</li>
        
        
        <div class="menuToggle" onclick="toggleMenu();" ></div>
        <ul class="navigation" >
            <li ><a   id= "<?php if($currPage == 'index.php') echo 'currentPage'; else echo 'nothing'; ?>" href="index.php" onclick="toggleMenu();"><?php echo $lang["home"]; ?></a></li>
            <li><a  id= "<?php if($currPage == 'about.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="about.php"><?php echo $lang["about"]; ?></a></li>
            <li><a  id= "<?php if($currPage == 'shop1.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="shop1.php"><?php echo $lang["prod"]; ?></a></li>

			<li><a  id= "<?php if($currPage == 'brands.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="brands.php"><?php echo $lang["brands"]; ?></a></li>
			<li><a  id= "<?php if($currPage == 'contact.php') echo 'currentPage'; else echo 'nothing'; ?>"  href="contact.php"><?php echo $lang["cont"]; ?></a></li>
			<li>
           		<?php 
					if($chLang=="eng"){
						echo "<a style='color:white' onclick='changeLanguage(\"ar\");'>العربية</a>";
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