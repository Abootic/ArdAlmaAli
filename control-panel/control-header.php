<?php
if(!isset($_SESSION)){
session_start();
}
#error_reporting(0);
#ini_set('display_errors', 0);
//session_start();
if(!isset($_SESSION["admin_id"]))
die("<meta http-equiv='refresh' content='0; url=login.php' />");
?>
<!DOCTYPE html>
<?php
require_once("db.php");
?>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لوحة التحكم</title>
	
	 <link href="css/bootstrap1.min.css" rel="stylesheet" />
    <link href="css/font-awesome1.min.css" rel="stylesheet" />
	<link href="css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
	
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
    #028f75
    #30ebb0
	-->
    <style>
    .navbar{
        background-color:#028f75;
    }
  .validate{
    background-color:#fff;
    border-radius:10px;
     color:#000;
   }
   .validate:focus{
    background-color:#fff;
    border-radius:10px;
     color:#000;
   }
   body,#home{
    background-color: white;
    font-size: 1.1rem !important; 
   }

   footer, .tm-footer,.btn-primary{
    background-color: #028f75;
   }
   .btn-danger,.btn-success,.btn-warning{
    
    border-color:white;
    font-size:120%;
    color:white;
    font-weight:bold;
   }
   .btn-warning{
       background-color:#a77422;
   }
   .nav-link, .dropdown-menu{
    background-color: #028f75;
   }
   /*
   @media (max-width: 1000px) {
   .nav-link, .dropdown-menu{
    border-left:5px solid #ffd700;
    border-right:5px solid #ffd700;
    border-bottom:2px double #ffd700;
   }
   }
   */

   .tm-edit-product-row,#frm{
    background-color: #028f75;
   }
   #frm{
       width:80%;
       margin-right:10%;
       border-radius:5%;
       
   }
   .tm-bg-primary-dark{
    background-color: #028f75;
   }
   table,tbody,thead,tr,td,.tm-bg-primary-dark, .tm-block, .tm-block-taller, .tm-block-scroll{
    background-color: #028f75;
   }
   
   .tm-block-scroll{
    background-color: #028f75;
   }

   .prod{
       text-align:left;
       direction:ltr;
   }

   .gold-border, .validate{
    border:2px double gold;
   }

    </style>
</head>

<body id="reportsPage" align="rtl">
    <div class="" id="home" align="rtl">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
            <img src="images/3.jpg" style="width:40%; height:70%; border-radius:20px;" />
                <a class="navbar-brand" href="index.php">
                
                    
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                       
                        
                        <li class="nav-item">
                            <a class="nav-link" href="admin/controlpanel/dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                لوحة التحكم
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../view/index.php">
                                <i class="fas fa-caret-square-o-up"></i>
                               الخروج الى الموقع
                            </a>
                        </li>
						

                <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="far fa-file-alt"></i>
                  <span> الصفحات <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" style="width:100%;" href="companies.php">الوكلاء</a>
                  <a class="dropdown-item" href="products.php">المنتجات</a>
                  <a class="dropdown-item" href="adminTable.php">الموضفين</a>
                  <a class="dropdown-item" href="contact.php">التعليقات</a>
                  <a class="dropdown-item" href="views.php">المشاهدات</a>
                  <a class="dropdown-item" href="settings.php">الاعدادات</a>
                  <!--
                  <a class="dropdown-item" href="footer_table_websites_media.php">صفحات مواقع التواصل الاجتماعي</a> 
             <a class="dropdown-item" href="footer_electronicDetials.php"> معلومات الالكترونية عنا </a>  
             -->
                </div>
              </li>
                    



              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
<!--        setting pages         -->
<i class="fa fa-cog" aria-hidden="true"></i>
                  <span> البيانات الشخصية  </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <center> 
               <a href='Update_Admin.php'  class='dropdown-item' ><i class='fa fa-user fa-fw'></i> تعديل بياناتي</a></center>
                  

                  <?php
                if(isset($_SESSION["admin_role"]))
                  if ($_SESSION["admin_role"]==1) {
                      echo"
                <a href='Owner_updatePass.php'  class='dropdown-item'><i class='fa fa-key fa-fw fixed-width '></i>تعديل  كلمة السر</a>
                ";
                  }else{
                      echo" <a href='update_adminPass.php'  class='dropdown-item'><i class='fa fa-key fa-fw fixed-width '></i>تعديل  كلمة السر</a> ";
                  }?>
                
          

                  
                </div>
              </li>
                    



						<li class='nav-item'><!--<a class='nav-link' style='color:white;' onclick='changeLanguage("eng");'><i class="fas fa-american-sign-language-interpreting"></i>English</a></li>						<li class="nav-item">
                          --> <a class="nav-link" > 
						  <button onclick="logoutChk();" class="btn-danger"><i class="fas "></i>تسجيل الخروج</button></a>
                        </li>
                   
				
                    </ul>
   
                </div>
            </div>
        </nav>

<script>
function logoutChk(){
	var chklogout = window.confirm("هل تريد الخروج من الموقع فعلا؟");
	if(chklogout === true)
		window.location="logout.php";
	
};

</script>

