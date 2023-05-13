<?php require_once "control-header.php";
require_once "admin/secFunction.php";
?>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['uname'])) {
        $serrors['uname'] = "<span class='alert alert-danger'>ادخل اسم المستخدم</span>";
    }

    if (!empty($_POST['passwd'])) {
        if (is_string($_POST['passwd']) && !is_numeric($_POST['passwd'])) {
            if (strlen($_POST['passwd']) < 8 or strlen($_POST['passwd']) > 32) {
                $serrors['passwd'] = "<span class='alert alert-danger'>يجب ان يكون طول الباسورد اكبر من 8 واقل من 32</span>";
            }
        } else {
            $serrors['passwd'] = "<span class='alert alert-danger'>يجب ان تكون كلمة السر حروف وارقام</span>";
        }
    } else {
        $serrors['passwd'] = "<p class='alert alert-danger'>يجب عليك ادخال كلمة السر الجديدة</p>";
    }

    if (empty($_POST['oldpass'])) {
        $serrors['oldpass'] = "<span class='alert alert-danger'> يجب عليك ادخال كلمة السر القديمة</span>";
    }

    if (empty($serrors)) {
       
        $user_name = $_POST['uname'];
        
        if (isset($_POST['oldpass']) && isset($_POST['passwd']) && isset($_SESSION['pass']) && isset($_SESSION["admin_uname"]) && $_SESSION["admin_role"] != 3) {
            if ($_POST['uname'] ==   $_SESSION["admin_uname"]) {
                if (password_verify($_POST['oldpass'], $_SESSION['pass'])) {
                    $sql = "update admin set passwd=:passwd where  state !=0 and uname=:uname and role !=1";
                    $q = $con->prepare($sql);
                    $q->execute(array("passwd" => password_hash($_POST["passwd"], PASSWORD_DEFAULT), "uname" => $_POST['uname']));
                    if ($q->rowcount()) {
                        $editpass['Edpass'] = "<span class='alert alert-success'> تم تعديل كلمة السر بنجاح</span>";
                       
                    } else {
                        $editpass['Edpass'] = "<span class='alert alert-danger'> حدث خطاء ما لم يتم تعديل كلمة السر يجب عليك  مراجعة المدير</span>";
                    }
                } //end if password_verify
                else {
                    $editpass['Edpass'] = "<span class='alert alert-danger'> كلمة السر القديمة غير صحيحة</span>";
                }
            } else {
                $editpass['Edpass'] = "<span class='alert alert-danger'>  لا يوجد حساب بهذا الاسم الرجاء التحقق من اسم حسابك " . @$user_name . " </span>";
            }
        }
    }
} //end server if

?>








    <div dir="rtl" align="right" class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-12 mx-auto tm-login-col">
                <div style="border-radius:15%;" class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="tm-block-title mb-4">مرحبا بك في صفحة تعديل كلمة السر</h2>
                            <?php if (isset($editpass['Edpass'])) {
    echo $editpass['Edpass'];
}
?>
                        </div>
    
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="#" method="post" class="tm-login-form">
                                <div id="oldpass" class="form-group">
                                    <label for="uname"> اسم المستخدمٍ </label><br />
                                    <?php if (isset($serrors["uname"])) {
    echo $serrors["uname"];
}
?>
                                    <input name="uname" type="text" class="form-control validate" id="uname" value=""
                                        placeholder="ادخل اسم المستخدمٍ   " />
                                </div>
                                <div id="oldpass" class="form-group">
                                    <label for="oldpassword">كلمة السر القديمة </label><br />
                                    <?php if (isset($serrors["oldpass"])) {
    echo $serrors["oldpass"];
}
?>
                                    <input name="oldpass" type="password" class="form-control validate" id="uname"
                                        value="" placeholder="ادخل كلمة السر القدمة " />
                                </div>

                                <div class="form-group mt-3">
                                    <label for="password">كلمة المرور الجديدة</label><br />
                                    <?php if (isset($serrors["passwd"])) {
    echo $serrors["passwd"];
}
?>
                                    <input name="passwd" type="password" class="form-control validate" id="passwd"
                                        value="" placeholder="يجب ان يكون على الاقل 8 رموز" />
                                </div>
                                <div class="form-group mt-4">
                                    <button name="login" value="تعديل" type="submit"
                                        style="border-radius:20%;width:20%;margin-right:40%;"
                                        class="form-control validate">
                                        تعديل
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?>