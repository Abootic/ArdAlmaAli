<?php require_once("control-header.php");
require_once("admin/secFunction.php");
?>


<?php
if(isset($_SESSION["admin_role"]))
if(@$_SESSION["admin_role"]==1) {//start if 1


    if (@$_SESSION['state']==1) { //start if 2
    
?>
<!--=========================================================================================================-->
<?php
if (isset($_GET["id"])) //start if 1
{
    global $uname;
    Sanitize($_GET);
  @$_GET["id"] = decript_id($_GET["id"]);                             // decript the  id that sent in the action 
    if (isset($_GET["action"]) and $_GET["action"] == "update") //start if 2
    {
        if (isset($_GET["id"]) and is_numeric($_GET["id"]))    //start if 3
        {
            $sql="select uname from admin where id=:id";
            $q = $con->prepare($sql);
            $q->execute(array("id" => $_GET["id"]));
            if ($q->rowcount()) {
                foreach ($q->fetchall() as $row) {
                  @$uname=$row['uname'];
                }
            }
           
        }
    }//else exit;
}
?>
<!--=========================================================================================================-->
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (empty($_POST['uname'])) {
        $serrors['uname']="<h4 class='alert alert-danger'>ادخل اسم المستخدم</h4>";
    }
    if (!empty($_POST['passwd'])) {
        if (is_string($_POST['passwd']) && !is_numeric($_POST['passwd'])) {
            if (strlen($_POST['passwd'])<8 or strlen($_POST['passwd'])>32) {
                $serrors['passwd']="<h4 class='alert alert-danger'>يجب ان يكون طول الباسورد اكبر من 8 واقل من 32</h4>";
            }
        } else {
            $serrors['passwd']="<h4 class='alert alert-danger'>يجب ان تكون كلمة السر حروف وارقام</h4>";
            exit;
        }   
    } else {
        $serrors['passwd']="<h4 class='alert alert-danger'>يجب عليك ادخال كلمة السر الجديدة</h4>";
       exit;
    }





    if (empty($serrors)) {
        @$username=@$_POST['uname'];
        if (isset($_POST['passwd'])&& isset($_SESSION['pass']) && $_SESSION["admin_role"]==1) {
            $sql="update admin set passwd=:passwd where  state !=0 and uname=:uname";
            $q=$con->prepare($sql);
            $q->execute(array("passwd"=>password_hash($_POST["passwd"], PASSWORD_DEFAULT),"uname"=>$_POST['uname']));
            if ($q->rowcount()) {
                $editpass['Edpass']="<span class='alert alert-success'> تم تعديل كلمة السر بنجاح</span>";
              
            } else {
                $editpass['Edpass']="<span class='alert alert-danger'>     تأكد من اسم المستخدم ليوجد مستخدم بهذا الاسم     "  .@$username."@</span>";
             }
        }else   exit; 
    }else { $editpass['Edpass']="<h4 class='alert alert-danger'> تأكد من اسم المستخدم او كلمة السر</h4>";}
}//end server if


?>







<div dir="rtl" align="right" class="container tm-mt-big tm-mb-big">
<div class="row">
    <div class="col-12 mx-auto tm-login-col">
        <div style="border-radius:15%;" class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="tm-block-title mb-8">مرحبا بك في صفحة  تعديل كلمة السر</h2>
                   
                    <?php if (isset($editpass['Edpass'])) {
    echo " <br>".$editpass['Edpass'];
}?>
                </div>
 
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <form action="#" method="post" class="tm-login-form">
                    <div id="oldpass" class="form-group">
                            <label for="uname">  اسم المستخدمٍ </label><br />
                            <?php if (isset($serrors["uname"])) {
    echo $serrors["uname"];
}?>
                            <input name="uname" type="text" class="form-control validate" id="uname" value="<?php if(isset($uname)) echo @$uname;?>"
                                placeholder="ادخل اسم المستخدمٍ   " />
                        </div>
                       
                        <div class="form-group mt-3">
                            <label for="password">كلمة المرور الجديدة</label><br />
                            <?php if (isset($serrors["passwd"])) {
    echo $serrors["passwd"];
}?>
                            <input name="passwd" type="password" class="form-control validate" id="passwd" value=""
                                placeholder="يجب ان يكون على الاقل 8 رموز" />
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
}//end if 2
else  exit;

}//end if 11
else {
    die("<meta http-equiv='refresh' content='0; url=admin/controlpanel/dashboard.php>");
    
}//end else

?>
<?php require_once("footer.php");?>