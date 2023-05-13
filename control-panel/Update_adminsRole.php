<?php require_once("control-header.php");
require_once("admin/secFunction.php");
?>


<?php
if(isset($_SESSION["admin_role"]))
if (@$_SESSION["admin_role"]==1) {//start if 1


    if (@$_SESSION['state']==1) { //start if 2
    
?>


<?php


if ($_SERVER["REQUEST_METHOD"]=="POST") {
   
    if (empty($_POST['role'])) {
        $errors['role'] = "<h5 class='alert alert-danger' >   من فضلك اختار الدور الوضيفي  </h5>";
    }
    if(empty($errors)){
        if (isset($_GET['id'], $_GET['action'])) {
            SanitizeGet($_GET);
           @$id = decript_id($_GET['id']);
           if (is_numeric($id)) {
                $sql = "update admin set role=:role where id=:id and role !=1";
               $q = $con->prepare($sql);
               $q->execute(array("role"=>$_POST['role'],"id" => @$id));
               if ($q->rowcount()) {
                   $errArr['err'] = "<h4 class='alert alert-success' > تم التعديل بنجاح</h4>";
                   
               } else {
                   $errArr['err'] = "<h4 class='alert alert-danger'  >لم يتم التعديل</h4>";
               }
           }
        }
    }    
}
?>
<div dir="rtl" align="right" class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-12 mx-auto tm-login-col">
            <div style="border-radius:15%;" class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="tm-block-title mb-8">مرحبا بك في صفحة تعديل الدور الوضيفي </h2>
                        <?php if(isset($errArr['err'])){echo $errArr['err'];} ?>

                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <form action="#" method="post" class="tm-login-form">

                            <div class="form-group mb-12">
                                <label for="role">الصلاحيات </label><br />

                                <select name="role" class="form-select form-control validate" size="1"
                                    aria-label="size 3 select example">
                                    <option value="3"></option>
                                    <option value="1"> مالك </option>
                                    <option value="2"> مدخل بيانات </option>
                                    <option value="3"> لم يحدد </option>
                                </select>

                            </div>

                            <div class="form-group mt-4">
                                <button name="login" value="تعديل" type="submit"
                                    style="border-radius:20%;width:20%;margin-right:40%;" class="form-control validate">
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







<?php
}
}

?>
<?php require_once("footer.php");?>