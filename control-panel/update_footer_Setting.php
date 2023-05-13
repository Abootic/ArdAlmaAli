<?php require_once "control-header.php";
require_once "admin/secFunction.php";
?>

  <?php

global $address_eng;
global $address_ar;
global $email;
global $phone1;
global $phone2;
global $google_map;


if (isset($_GET['id'], $_GET['action'])) {
    SanitizeGet($_GET);

    @$id = decript_id($_GET['id']);
    if (is_numeric($id)) {
        $sql = "select  * from footer_section   where id=:id";
        $sq = $con->prepare($sql);
        $sq->execute(array("id" => $id));
        if ($sq->rowcount()) {
            foreach ($sq->fetchall() as $row) {
                @$address_eng= $row['address_eng'];
                 @$address_ar= $row['address_ar'];
                @$email= $row['email'];
                @$phone1= $row['phone_no'];
                @$phone2= $row['phone_sec'];
                @$google_map=$row["google_map"];
               

            }
        }
    }
}

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['update'])=="update") {
        //Service  Validation==============================

     ////Service Email Validation=========================================
  @$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  if (!filter_var(@$_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $serrors['email'] = "<span style='color:red'>يرجى كتابة الإيميل بشكل صحيح</span>";
  }

  //Service address Validation==============================7

  if (empty(@$_POST['address_eng'])) {
    $serrors['address_eng'] = "<span style='color:red'>يرجى كتابة العنوان</span>";
  }

  if (empty(@$_POST['address_ar'])) {

    $serrors['address_ar'] = "<span style='color:red'>يرجى كتابة العنوان</span>";

  }


  //Service Phone Validation==============================
  if (empty(@$_POST['phone1'])) {
    $serrors['phone'] = "<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
  }


    
  
            if (empty($errors)) {
                if (isset($_GET['id'])) {
                    @$id = decript_id($_GET['id']);
                      if (is_numeric($id)) { 
                    $sql1 = "update footer_section set address_eng=:address_eng, address_ar=:address_ar,email=:email,phone_no=:phone_no, phone_sec=:phone_sec, google_map=:map  where id=:id";
                    $q1 = $con->prepare($sql1);
     
                    $q1->execute(array(
           "address_eng" => $_POST["address_eng"],"address_ar" => $_POST["address_ar"],
           "email" => $_POST["email"],"phone_no"=>$_POST["phone1"], "phone_sec"=>$_POST["phone2"], "map"=>$_POST["google_map"], "id"=>$id));
                    if ($q1->rowcount()) {
                        $errArr['err'] = "<div class='col-12'> <h4 class='alert alert-success'>تم التعديل بنجاح </h4></div>";
                       
                    } else {
                        $errArr['err'] = "<h4 class='alert alert-danger'>تأكد من صحة كل البيانات تبع الجدول  ثم اعد المحاولة</h4>";
                    }
                } //end for
                }
            }
       
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
                                    <label for="address">العنوان بالإنجليزي </label>
                        <?php if (isset($errors['$address_eng'])) {
                    echo $errors['address_eng'];
                  }?>              <input id="location" name="address_eng" type="text" value="<?php if (isset($address_eng)){                echo $address_eng;                  }
                               ?>"
                     class="form-control validate" />
                               
                                          <label for="address">العنوان بالعربي </label> 
                       <?php if (isset($errors['$address_ar'])) {
                    echo $errors['address_ar'];
                  }?>                     <input id="location" name="address_ar" type="text" value="<?php if (isset($address_ar)){                echo $address_ar;                  }
                               ?>"
                     class="form-control validate" />
                                                                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">البريد الالكتروني</label><br />
                                    <?php if (isset($errors['email'])) {
                    echo $errors['email'];
                  }
                  ?>
                                    <input id="email" name="email" type="email" value="<?php if (isset($email)) {
                                                                        echo $email;
                                                                      }
                                                                      ?>" class="form-control validate" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">رقم الهاتف </label><br />
                                    <?php if (isset($errors['phone'])) {
                    echo $errors['phone'];
                  } ?>
                                    <input id="phone" name="phone1" type="tel" value="<?php if (isset($phone1)) { echo $phone1;
} ?>" class="form-control validate" />
                   
                   
                     <label for="address">هاتف اخر </label>
                   <input id="phone" name="phone2" type="tel" value="<?php if (isset($phone2)) { echo $phone2;
} ?>" class="form-control validate" /> 

 <label for="address">خرائط جوجل </label>

                                    <input id="location" name="google_map" type="text" value="<?php if (isset($google_map)){                echo $google_map;                  }

                               ?>"
                     class="form-control validate" />
                               
                                </div>

                                <!--==================================================================================================================-->





                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary btn-block text-uppercase" name="update"
                                        value="update" style="border-radius:50px;" />
                                </div>
                                
                            </form>
                        </div>
                    </div><!-- END PRODUCT ROW-->
                </div>
            </div>
        </div>
    </div>
<?php require_once "footer.php";
?>
    