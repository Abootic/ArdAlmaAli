<?php

if(!isset($_SESSION)){

session_start();
}
#error_reporting(0);
#ini_set('display_errors', 0);
//session_start();
if(!isset($_SESSION["admin_id"]))
die("<meta http-equiv='refresh' content='0; url=../../login.php' />");

require_once("../../db.php");
?>
<!DOCTYPE html>

<html>
<head> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/custom.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper" class="active">

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">لوحة التحكم</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
	<li>
	<a href="../../../view/index.php">الصفحة الرئيسية
	
	</a>
	
	</li>
	
	</li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
            <?php
                if(isset($_SESSION["admin_role"]))
                  if ($_SESSION["admin_role"]==1) {
                      echo"
                <li><a href='../../Owner_updatePass.php'><i class='fa fa-user fa-fw'></i>تعديل  كلمة السر</a>
                </li>";
                  }else{
                      echo" <li><a href='../../update_adminPass.php'><i class='fa fa-user fa-fw'></i>تعديل  كلمة السر</a> </li>";
                  }?>
                <li><a href='../../Update_Admin.php'><i class='fa fa-user fa-fw'></i>تعديل بياناتي</a> </li>
                <li class="divider"></li>
                <li><a onclick="logoutChk();" ><i class="fa fa-sign-out fa-fw"></i> تسجيل الخروج</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown href="../../logout.php"-->
    </ul>                


    <div class="navbar-default sidebar" role="navigation">                  
        <div class="sidebar-nav">
            <ul class="nav" id="side-menu">   
                <li>
                    <a href=""><i class="fa fa-dashboard fa-fw"></i> <span class="ttspan-fill">لوحة التحكم</span></a>
                </li>
					<li>
                    <a href="../../adminTable.php"><i class="fa fa-users fa-fw"></i> <span class="ttspan-fill">الادارة</span></a>
                </li>
				
				 <li>
                    <a href="../../companies.php"><i class="fa fa-dashboard fa-fw"></i> <span class="ttspan-fill">الموردون </span></a>
                </li>
				
				 <li>
                    <a href="../../products.php"><i class="fa fa-dashboard fa-fw"></i> <span class="ttspan-fill">المنتجات</span></a>
                </li>
				 
							<li>
                    <a href="../../contact.php"><i class="fa fa-tasks fa-fw"></i> <span class="ttspan-fill">التعليقات</span></a>
                </li>
				
				
							<li>
                    <a href="../../settings.php"><i class="fa fa-newspaper-o fa-fw"></i> <span class="ttspan-fill">اعدادات واجهة العرض</span></a>
                </li>
				
				
				
				<li>
                    <a href="../../slids.php"><i class="fa fa-newspaper-o fa-fw"></i> <span class="ttspan-fill">صور السلايد</span></a>
                </li>
				
							<li>
                    <a href="../../views.php"><i class="fa fa-comments fa-fw"></i> <span class="ttspan-fill">المشاهدات</span></a>
                </li>
            </ul>
        </div>
    </div>                             
</nav>  

<div id="page-wrapper">
    <div class="row" dir="rtl" align="right">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-dashboard'></i> لوحة التحكم</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
   
    <div class="row" >
  <!-- ################################## REQUESTS ####################################### -->
        <div class="col-lg-4 col-md-6 col-xs-10 col-sm-9">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-tasks fa-5x"></i>
							<h3>الموردون</h3>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h4> </h4>مورد</h4>
                            <h4>مفعل</h4>
                            <h4>موقوف</h4>
                            
							
                        </div>
						<div class="col-xs-2 text-right">
                            <h4>
                            <?php
                            // =================  number of all companies
								$sql="select id from companies where state in(0,1)";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
                            <?php
								$sql="select id from companies where state=1";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
                            <?php
								$sql="select id from companies where state=0";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>

						
                        </div>
						
                    </div>
                </div>
                <a href="../../companies.php">
                    <div class="panel-footer">
                        <span class="pull-left">التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

<!-- ###################################  PRODUCTS  ###################################### -->		
			<div class="col-lg-4 col-md-6 col-xs-10 col-sm-9">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
						   <i class="fa fa-newspaper-o fa-5x"></i>
						   <h3>المنتجات</h3>
							
                        </div>
                        <div class="col-xs-8 text-right">
                            <h4>منتج</h4>
                            <h4>فعال</h4>
                            <h4>موقوف</h4>
							<h4>&nbsp;</h4>
                        </div>
						<div class="col-xs-2 text-right">
                        <h4>
                            <?php
                            // =================  number of all products
								$sql="select id from products where state in(0,1)";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
                            <?php
                            // =================  number of active products
								$sql="select id from products where state =1";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
                            <?php
                            // =================  number of stopped products
								$sql="select id from products where state =0";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
							<h4>&nbsp;</h4>
                        </div>
						
                    </div>
                </div>
                <a href="../../products.php">
                    <div class="panel-footer">
                        <span class="pull-left">التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
   <!-- ################################## USERS  ####################################### -->
   <div class="col-lg-4 col-md-6 col-xs-10 col-sm-9">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-users fa-5x"></i>
							<h3>الادارة</h3>
							<div></div>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h4>كل الموضفين</h4>
                            <h4>مدير عام</h4>
                            <h4>مدخل بيانات</h4>
							<h4>&nbsp;</h4>
                        </div>
						<div class="col-xs-2 text-right">
						
                        <h4>
                            <?php
                            // =================  number of all admins
								$sql="select id from admin where state in(0,1)";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
                            <?php
                            // =================  number of all admins
								$sql="select id from admin where state in(0,1) and role=1";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
                            <?php
                            // =================  number of all admins
								$sql="select id from admin where state in(0,1) and role =2";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
							<h4>&nbsp;</h4>
                        </div>
						
                    </div>
                </div> <a href="../../adminTable.php"> 
                    <div class="panel-footer">
                        <span class="pull-left">التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
   <!-- #################################  Views RECORDS  ######################################## -->
	<div class="col-lg-4 col-md-6 col-xs-10 col-sm-9">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
						   <i class="fa fa-eye fa-5x"></i>
							<h4>المشاهدات</h4>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h4>مشاهدة</h4>
                            <h4>زائر</h4>
                            <h4>عن الشركة</h4>
							<h4>المنتجات</h4>
                        </div>
						<div class="col-xs-2 text-right">
                        <h4>
                            <?php
                            // =================  number of all views
								$sql="select number_of_views from home_views";
								$q=$con->prepare($sql);
                                $q->execute();
                                if($q->rowcount()){
                                    $numOfViews=0;
                                    foreach($q->fetchall() as $rows){
                                        $numOfViews+=$rows["number_of_views"];
                                    }
                                   echo $numOfViews;
                                }

                                
							?>
						    </h4>
							
							
                            <h4>
                            <?php
                            // =================  number of all views
								$sql="select ip_add from home_views";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
						    </h4>
							
							
                            <h4>
							0							
							</h4>
							
							 <h4>
							0							
							</h4>
                        </div>
						
                    </div>
                </div>
                <a href="../../views.php">
                    <div class="panel-footer">
                        <span class="pull-left">عرض التفاصيل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
						
	<!-- ######################################################################### -->					

	<!-- ####################################  Contacts  ##################################### -->
	
	<div class="col-lg-4 col-md-6 col-xs-10 col-sm-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                        <i class="fa fa-comments fa-5x"></i>
							  <h4>التعليقات</h4>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h4>تعليق</h4>
                            <h4>جديد</h4>
                            <h4>تم الرد عليه</h4>
                            <h4>متجاهل</h4>
                        </div>
						<div class="col-xs-2 text-right">
                            <h4>
                            <?php
                            // =================  number of all contacts
								$sql="select id from contacts";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>
							</h4>
							
							
                            <h4>
							<?php
                            // =================  number of all contacts
								$sql="select id from contacts where state=1";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>							</h4>
							
							
                            <h4>
							<?php
                            // =================  number of all contacts
								$sql="select id from contacts where state=2";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>								
							</h4>
							
							 <h4>
                             <?php
                            // =================  number of all contacts
								$sql="select id from contacts where state=0";
								$q=$con->prepare($sql);
								$q->execute();
								echo $q->rowcount();
							?>								
							</h4>
							
							
                        </div>
						
                    </div>
                </div>
                <a href="../../contact.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
  
	
		<!-- #################################  COMMENTS  ######################################## -->					
    </div>
    <!-- /.row -->
</div>         
</div>
<script>
function logoutChk(){
	var chklogout = window.confirm("هل تريد الخروج فعلا؟");
	if(chklogout === true)
		window.location="../../logout.php";
	
};

</script>
<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>