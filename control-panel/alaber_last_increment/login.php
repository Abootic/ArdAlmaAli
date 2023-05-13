<?php
// including pages ======================
session_start();
require_once("db.php");
require_once("admin/secFunction.php");

// ========================================================
//============= validating user login ===============================
if ($_SERVER["REQUEST_METHOD"]=="POST" and @$_POST["login"]=="Login") {
    $chLang="eng";
    Sanitize($_POST);
    //Service Name Validation==============================
    if (empty(@$_POST['uname'])) {
        $serrors['uname']="<span style='color:red'>يرجى ادخال اسم المستخدم</span>";
    }
    //elseif(strlen($_POST["uname"])<6)
    //$serrors['uname']="<span style='color:red'>يجب ان يحتوي على 6 رموز على الاقل!</span>";
      
    //Kuraimi Account Validation=========================================
    if (empty(@$_POST['passwd'])) {
        $serrors['passwd']="<span style='color:red'>يرجى ادخال كلمة المرور </span>";
    }
    //else if(strlen($_POST["passwd"])<8)
    //  $serrors['passwd']="<span style='color:red'>يجب ان يحتوي على 8 رموز على الاقل!</span>";

    // ============ check from database and set session values ========================
    if (!isset($serrors)) {
        $sql="select id, name, uname, passwd, role, state from admin where uname=:un and state =1 ";
        $q=$con->prepare($sql);
        $q->execute(array("un"=>$_POST["uname"]));
        if ($q->rowcount()==1) {
            foreach ($q->fetchall() as $row) {
                $pw=$row["passwd"];
                $_SESSION['pass']=$row["passwd"];
                 if(password_verify($_POST['passwd'],$row["passwd"]))
                {
                $_SESSION["admin_id"]=$row["id"];
                $_SESSION["admin_role"]=$row["role"];
                $_SESSION["admin_uname"]=$row["uname"];
                $_SESSION["state"]=$row["state"];
              
                echo"<meta http-equiv='refresh' content='0; url=admin/controlpanel/dashboard.php' />";
                }

      else{
        $errArr['err']= "<div class='col-12'> <h4 class='alert alert-danger'> كلمة المرور غير صحيحة </h4></div>";
      }
            } // end foreach
        }// end if rowcount
        else {
            $errArr['err']= "<div class='col-12'> <h4 class='alert alert-danger'> اسم المستخدم الذي ادخلته غير صحيح </h4></div>";
        }// end else
    } // end if no error
else {
    //echo"<h3>check your data</h3>";
} // end else
}// end first if // check post

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>تسجيل الدخول</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
  
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
   .nav-link{
    background-color: #028f75;
   }

   .tm-block-col{
    background-color: #30ebb0;
   }

   .tm-edit-product-row,#frm{
    background-color: #028f75;
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
    </style>
  </head>

  <body>
    <div>
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
                            <a class="nav-link" href="../View/index.php">
                                <i class="fas fa-caret-square-o-up"></i>
                               الخروج الى الموقع
                            </a>
                        </li>

                    </ul>
   
                </div>
            </div>
        </nav>
    </div>

    <div  dir="rtl" align="right"  class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div style="border-radius:15%;" class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">مرحبا بك في صفحة تسجيل الدخول</h2>
              </div>
              <?php if (isset($errArr["err"])) {
    echo $errArr["err"] ;
}?>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="#" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">اسم المستخدم</label><br/>
                    <?php if (isset($serrors["uname"])) {
    echo $serrors["uname"];
}?>
                    <input
                      name="uname"
                      type="text"
                      class="form-control validate"
                      id="uname"
                      value=""
                      placeholder="يجب ان يكون على الاقل 6 رموز"
                      
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">كلمة المرور</label><br/>
                    <?php if (isset($serrors["passwd"])) {
    echo $serrors["passwd"];
}?>
                    <input
                      name="passwd"
                      type="password"
                      class="form-control validate"
                      id="passwd"
                      value=""
                      placeholder="يجب ان يكون على الاقل 8 رموز"
                      
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                    name="login"
                    value="Login"
                      type="submit"
                      style="border-radius:20%;width:20%;margin-right:40%;"
                      class="form-control validate"
                    >
                      دخول
                    </button>
                  </div>
                  <center>
                  <a style="color:white;" href="Myinfo.php">
                    نسيت كلمة السر ؟
                  </a>
                  </center>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
 include_once("footer.php");
 ?>