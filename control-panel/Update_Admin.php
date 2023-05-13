<?php require_once "control-header.php";
require_once "admin/secFunction.php";
?>

  <?php

global $name;
global $admName;
global $email;
global $phone;

if (isset($_GET['id'], $_GET['action']) or 1==1) {
  //  SanitizeGet($_GET);

   // @$id = decript_id($_GET['id']);
    if (is_numeric($_SESSION["admin_id"])) {
        $sql = "select name,uname,email,phone from admin where id=:id";
        $sq = $con->prepare($sql);
        $sq->execute(array("id" => $_SESSION["admin_id"]));
        if ($sq->rowcount()) {
            foreach ($sq->fetchall() as $row) {
                @$name = $row['name'];
                @$admName = $row['uname'];
                @$email = $row['email'];
                @$phone = $row['phone'];

            }
        }
    }
}

?>
  <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    SanitizeGet($_GET);
    Sanitize($_POST);

    if (empty($_POST['name'])) {
        $erorrs['name'] = "<h4 class='alert alert-danger'>اكتب اسمك</h4>";
    }
    if (empty($_POST['adm_name'])) {
        if (preg_match('/^[a-z0-9-_. ]*$/i', $_POST['admin_name'])) {
        } else {
            $erorrs['admin_name'] = "<h4 class='alert alert-danger'>تحقق من اسمك الالكتروني </h4>";
        }

        $erorrs['adm_name'] = "<h4 class='alert alert-danger'>اكتب الاسم الالكتروني </h4>";
    }

    if (!empty($_POST['email'])) {
        if (!filter_var(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) {
            $erorrs['email'] = "<h4 class='alert alert-danger'>تحقق من بريدك الالكتروني</h4>";
        }
    } else {
        $erorrs['email'] = "<h4 class='alert alert-danger'>اكتب بريدك الاكتروني </h4>";
    }

    if (!empty($_POST['phone'])) {
        if (!is_numeric($_POST['phone'])) {
            $errors['phone'] = "<h4 class='alert alert-danger' > يجب ان تدخل ارقام </h4>";
        }
    } else {
        $errors['phone'] = "<h4 class='alert alert-danger'>اكتب رقم الهاتف</h4>";
    }
   

    if (empty($erorrs)) {
        if (isset($_GET['id'])) {
          @$id = decript_id($_GET['id']);
            if (is_numeric($id)) {
                $sql = "update admin set name=:name,uname=:uname,email=:email,phone=:phone where id=:id";
                $update = $con->prepare($sql);
                $update->execute(array("name" => $_POST['name'], "uname" => $_POST['adm_name'], "email" => $_POST['email'], "phone" => $_POST['phone'], "id" => @$id));
                if ($update->rowcount()) {
                    $errArr['err'] = "<h4 class='alert alert-success' > تم التعديل بنجاح.$langaddsr[updated] </h4>";
                   
                } else {
                    $errArr['err'] = "<h4 class='alert alert-danger'  >لم يتم التعديل</h4>";
                }

            }

        }

    } else {
        $errArr['err'] = "<h4 class='alert-danger'>يجب تعبئة الحقول كلها</h4>";
    }
}

// //EndIf Of  the First if
?>


  <!-- Start row -->
  <div style="margin:2px" class="row tm-content-row" dir="rtl" align="right">

      <div class="container tm-mt-big tm-mb-big">
          <div class="row">
              <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                  <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                      <?php if (isset($errArr['err'])) {
    echo $errArr['err'];
}?>
                      <div class="row">
                          <div align="center" class="col-12">
                              <h2 class="tm-block-title d-inline-block">تعديل بيانات الموظف</h2>
                          </div>
                          <div class="col-12"> </div>
                      </div>
                      <div class="row tm-edit-product-row">
                      <div class="col-2"> </div>
                          <div class="col-xl-8 col-lg-8 col-md-8">
                              <form action="#" method="post" enctype="multipart/form-data" class="tm-edit-product-form">




                                  <div class="form-group mb-3">
                                      <label for="name">الإسم الكامل</label><br />

                                      <input id="name" name="name" type="text" value="<?php if (isset($name)) {
    echo @$name;
}?>" class="form-control validate" /><?php if (isset($erorrs['name'])) {
    echo $erorrs['name'];
}?>
                                  </div>



                                  <div class="form-group mb-3">
                                      <label for="admin_name">اسم المستخدم </label><br />

                                      <input id="adm_name" name="adm_name" type="text" value="<?php if (isset($admName)) {
    echo @$admName;
}?>" class="form-control validate" /> <?php if (isset($erorrs['adm_name'])) {
    echo $erorrs['adm_name'];
}?>

                                  </div>

                                  <div class="form-group mb-3">
                                      <label for="email">البريد الالكتروني</label><br />

                                      <input id="email" name="email" type="email" value="<?php if (isset($email)) {
    echo @$email;
}?>" class="form-control validate" /> <?php if (isset($erorrs['email'])) {
    echo $erorrs['email'];
}?>
                                  </div>


                                  <div class="form-group mb-3">
                                      <label for="phone">رقم الهاتف </label><br />

                                      <input id="phone" name="phone" type="tel" value="<?php if (isset($phone)) {
    echo $phone;
}?>" class="form-control validate" /> <?php if (isset($erorrs['phone'])) {
    echo $erorrs['phone'];
}?>
                                  </div>



                          </div>



                          <div class="col-12">

                              <button type='submit' id='edit_btn' class='btn btn-primary btn-block text-uppercase'
                                  name='serUpdate' value='' style='border-radius:50px;'>تعديل</button>
                          </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End row -->







  <?php require_once "footer.php";?>