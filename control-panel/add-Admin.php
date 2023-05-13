<?php require_once "control-header.php";
require_once "admin/secFunction.php";
?>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Sanitize($_POST);
    if (empty($_POST['name'])) {
        $erorrs['name'] = "<h5 class='alert alert-danger'>من فضلك اكتب اسمك!</h5>";
    }
    if (empty($_POST['adm_name'])) {
        $erorrs['adm_name'] = "<span class='alert alert-danger'>من فضلك ادخل اسمك الالكتروني</span>";
    }

    if (!empty($_POST['pass'])) {
        if (is_string($_POST['pass']) && !is_numeric($_POST['pass'])) {
            if (strlen($_POST['pass']) < 8 or strlen($_POST['pass']) > 32) {
                $errors['pass'] = "<h5 class='alert alert-danger'>يجب ان يكون طول الباسورد اكبر من 8 واقل من 32</h5>";

            }
        } else {
            $errors['pass'] = "<h5 class='alert alert-danger'>يجب ان تكون كلمة السر حروف وارقام</h5>";
        }
    } else {
        $erorrs['pass'] = "<h5 class='alert alert-danger'>من فضلك ادخل كلمة السر</h5>";
    }

    if (!empty($_POST['email'])) {
        if (!filter_var(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) {
            $erorrs['email'] = "<h5 class='alert alert-danger'>يجب التحقق من الايميل ! </h5>";
        }

    } else {
        $erorrs['email'] = "<h5 class='alert alert-danger'>   من فضلك ادخل البريد الالكترزني</h5>";
    }

    if (!empty($_POST['phone'])) {
        if (!is_numeric($_POST['phone'])) {
            $errors['phone'] = "<h5 class='alert alert-danger'>يجب ادخال ارقام فقط في هذا الحقل</h5>";
        }
    } else {
        $errors['phone'] = "<h5 class='alert alert-danger'>من فضلك ادخل رقمك </h5>";
    }
    if (empty($_POST['role'])) {
        $errors['role'] = "<h5 class='alert alert-danger' >   من فضلك اختار الدور الوضيفي  </h5>";
    }

    if (empty($erorrs)) {

        $sql = "select uname from admin where uname =:uname";
        $q = $con->prepare($sql);
        $q->execute(array("uname" => $_POST['adm_name']));
        if ($q->rowcount()) {
            echo "dd";
            $erorr_exist['uname'] = "<h5 class='alert alert-danger' >هذا الاسم الالكتروني موجود مسبقاً </h5>";
        } else {
            $sql = "select email from admin where email =:email";
            $q = $con->prepare($sql);
            $q->execute(array("email" => $_POST['email']));
            if ($q->rowcount()) {
                $erorr_exist['email'] = "<h5 class='alert alert-danger' >    هذا البريد الالكتروني موجود مسبقاً   </h5>";
            } else {
                $sql = "insert into admin(name,uname,passwd,email,phone,role) values(:name,:uname,:passwd,:email,:phone,:role)";
                $q = $con->prepare($sql);
                $q->execute(array(
                    "name" => $_POST['name'], "uname" => $_POST['adm_name'],
                    "passwd" => password_hash($_POST['pass'], PASSWORD_DEFAULT), "email" => $_POST['email'], "phone" => $_POST['phone'], "role" => $_POST['role'],
                ));
                if ($q->rowcount()) {

                    $errArr['err'] = "<h4 class='alert alert-success'> تم تسجيل المدير الجديد بنجاح </h4>";

                   // echo "<meta http-equiv='refresh' content='3; url=adminTable.php' />";
                } else {

                    $errArr['err'] = "<h4 class='alert alert-danger'>لم يتم تسجيل المدير الجديد</h4>";
                }
            }
        }
    } else {
        print_r($erorrs);
        $errArr['err'] = "<h4 class='alert alert-danger'>يجب عليك تعبئة الحقول كامل</h4>";

        // //EndIf Of  the First if
    }
}
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
                            <h2 class="tm-block-title d-inline-block">إضافة مدير جديد</h2>
                        </div>
                        <div class="col-12"> </div>
                    </div>
                    <div class="row tm-edit-product-row">
                    <div class="col-2"> </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                                <div class="form-group mb-3">
                                    <label for="name">اسم المدير</label><br />
                                    <?php if (isset($erorrs['name'])) {
    echo $erorrs['name'];
}?>
                                    <input id="name" name="name" type="text" value="<?php if (isset($_POST['name'])) {
    echo $_POST['name'];
}?>" class="form-control validate" />
                                    <?php if (isset($erorrs['name'])) {
    echo $erorrs['name'];
}?>
                                </div>



                                <div class="form-group mb-3">
                                    <label for="website">اسم المدير الالكتروني </label><br />
                                    <?php if (isset($erorrs['adm_name'])) {
    echo $erorrs['adm_name'];
}?>

                                    <input id="adm_name" name="adm_name" type="text" value="<?php if (isset($_POST['adm_name'])) {
    echo $_POST['adm_name'];
}?>" class="form-control validate" />
                             
                                <?php if(isset( $erorr_exist['uname'] )){echo  $erorr_exist['uname'] ;}?>
                                </div> 
                                <div class="form-group mb-3">
                                    <label for="password">كلمة السر </label>
                                    <input id="password" name="pass" type="password" value="<?php if (isset($_POST['pass'])) {
    echo $_POST['pass'];
}?>" class="form-control validate" />
 <?php if (isset($errors['pass'])) {echo $errors['pass'];}?>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">البريد الالكتروني</label><br />
                                    <?php if (isset($erorrs['email'])) {
    echo $erorrs['email'];
}?>

                                    <input id="email" name="email" type="email" value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
}?>" class="form-control validate" />
 <?php if(isset( $erorr_exist['email'] )){echo  $erorr_exist['email'] ;}?>
                                </div>
                               


                                <div class="form-group mb-3">
                                    <label for="phone">رقم الهاتف </label><br />
                                    <?php if (isset($erorrs['phone'])) {
    echo $erorrs['phone'];
}?>
                                    <input id="phone" name="phone" type="text" value="<?php if (isset($_POST['phone'])) {
    echo $_POST['phone'];
}?>" class="form-control validate" />
                                </div>
                                <div class="form-group mb-12">
                                    <label for="role">الصلاحيات </label><br />

                                    <select name="role" class="form-select form-control validate" size="1" aria-label="size 3 select example">

                                        <option value="1"> مالك</option>
                                        <option value="2" selected>مدخل بيانات</option>
                                        <option value="3">لم يحدد </option>
                                    </select>

                                </div>

                        </div>




                        <div class="col-12">
                            <input type="submit" class="btn btn-primary btn-block text-uppercase" name="addAdmin" value="اضافة" style="border-radius:50px;" />
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