<?php include "control-header.php"; ?>
<?php
require "db.php";
require_once "admin/secFunction.php";

//===

/* =============================== */
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" and @$_POST["addComp"] == "إضافة") {

  Sanitize($_POST);
  //Service Name Validation==============================

  // //Kuraimi Account Validation=========================================
  //     if(empty($_POST['social_media']))
  //         $serrors['social_media']="<span style='color:red'>أدخل عنوان موقع ويب الوكالة</span>";

  ////Service Email Validation=========================================
  @$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  if (!filter_var(@$_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $serrors['email'] = "<span style='color:red'>يرجى كتابة الإيميل بشكل صحيح</span>";
  }

  //Service address Validation==============================7

  if (empty(@$_POST['address'])) {
    $serrors['address'] = "<span style='color:red'>يرجى كتابة رقم بلد المنشاء</span>";
  }

  //Service Phone Validation==============================
  if (empty(@$_POST['phone'])) {
    $serrors['phone'] = "<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
  }

  

  //###########################################Data base Control
  
  if (empty($serrors)) {
   
     
      $sql = "insert into footer_section(address,email,phone_no) values(:address, :email,:phone_no) ";
      $q = $con->prepare($sql);
      $q->execute(array("address" => $_POST["address"], "email" => $_POST["email"],"phone_no"=>$_POST['phone']));

      if ($q->rowcount()){
        $errArr['err'] = "<h4 class='alert alert-success'>تمت الاضافة بنجاح </h4>";
     
    
      } else {
       
      }
   
  } //end the     if sec_serrors
 
} //EndIf Of  the First if

?>



<!-- row -->
<div style="margin:2px" class="row tm-content-row" dir="rtl" align="right">

    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <?php if (isset($errArr['err'])) {
            echo $errArr['err'];
          }
          ?>
                    <div class="row">
                        <div align="center" class="col-12">
                            <h2 class="tm-block-title d-inline-block">اضافة البيانات الالكترونية</h2>
                        </div>
                        <div class="col-12"> </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <form action="#" method="post"  enctype="multipart/form-data" class="tm-edit-product-form">



                                <div class="form-group mb-3">
                                    <label for="address">بلد المنشاء </label>
                                    <input id="location" name="address" type="text" value="<?php if (isset($_POST['address'])) {
                                                                            echo $_POST['address'];
                                                                          }
                                                                          ?>" class="form-control validate" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">البريد الالكتروني</label><br />
                                    <?php if (isset($serrors['email'])) {
                    echo $serrors['email'];
                  }
                  ?>
                                    <input id="email" name="email" type="email" value="<?php if (isset($_POST['email'])) {
                                                                        echo $_POST['email'];
                                                                      }
                                                                      ?>" class="form-control validate" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">رقم الهاتف </label><br />
                                    <?php if (isset($serrors['phone'])) {
                    echo $serrors['phone'];
                  } ?>
                                    <input id="phone" name="phone" type="tel" value="<?php if (isset($_POST['phone'])) {
                                                                      echo $_POST['phone'];
                                                                    } ?>" class="form-control validate" />
                                </div>

                                <!--==================================================================================================================-->





                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary btn-block text-uppercase" name="addComp"
                                        value="إضافة" style="border-radius:50px;" />
                                </div>
                                
                            </form>
                        </div>
                    </div><!-- END PRODUCT ROW-->
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>