<?php require_once "control-header.php";
require_once "admin/secFunction.php";

?>

<!-- <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> -->

<style>
.box {
    box-shadow: 0 4px 8px rgba(32, 31, 32, 0.133), inset 0 0 8px rgba(32, 31, 32, 0.133);
    background-color: #028f75;
}
</style>




<!--======================================================================================================-->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['title'])) {
        $errors['title'] = "<h4 class='alert alert-danger'>من فضلك اكتب عنوان الصورة</h4>";
    }
    if (empty($_POST['description'])) {
        $errors['description'] = "<h4 class='alert alert-danger'>من فضلك اكتب تفاصيل الصورة</h4>";
    }
    if (empty($_POST['title_ar'])) {
        $errors['title_ar'] = "<h4 class='alert alert-danger'>من فضلك اكتب عنوان الصورة</h4>";
    }
    if (empty($_POST['description_ar'])) {
        $errors['description_ar'] = "<h4 class='alert alert-danger'>من فضلك اكتب تفاصيل الصورة</h4>";
    }


    ////image1 Validation
    Sanitize($_POST);
    $name = $_FILES["img1"]["name"];
    $type = $_FILES["img1"]["type"];
    $tmp = $_FILES["img1"]["tmp_name"];
    $size = $_FILES["img1"]["size"];
    $error = $_FILES["img1"]["error"];
    if (!empty($_FILES["img1"]["name"]))                            //check the image if it not empty
    {
        $mytypes = array("png", "jpg", "jpeg", "gif");
        $ext = explode(".", $name);
        $ext = strtolower(end($ext));
        $img1 = uniqid();
        $img1 .= "." . $ext;
        $img1 = str_replace(' ', '', $img1);
        if (in_array($ext, $mytypes))                                     // check if the type of the image is valid the type are (png,jpg,gif,jpeg)
        {
            if ($size <= 2000000) {
                if (move_uploaded_file($tmp, "images/slids/$img1"))               // check if the size of the image smaller or equal than 1MB
                    echo "";
            } else {
                $errors['imgsize'] = "<span style='color:red'><b>حجم الصورة كبير  اكبر حجم 1 ميجا</b></span>";
            }
        } else {
            $errors['imgtype'] = "<span style='color:red'><b>نوع الصورة غير صحيح</b></span>";
        }
    } else {
        $errors['imgname'] = "<span style='color:red'><b>ادخل صورة</b></span>";
    }
    //=====================================================================This is if you want only update image one ====================================================
    if (empty($errors)) // start if
    {
       
        $sql = "update slides set img=:img,title=:title,description=:description,title_ar=:title_ar,
        description_ar=:description_ar where id=:id";
        $q = $con->prepare($sql);
        $q->execute(array("img" => $img1,"title"=>$_POST['title'], "description"=>$_POST['description'],"title_ar"=>$_POST['title_ar'],"description_ar"=>$_POST['description_ar'],"id" => decript_id($_GET["id"])));
        if ($q->rowcount())
            $errArr['err'] = "<center><h4 class='alert alert-success'>تم تعديل الصـــورة بنجاح</h4></center>";
        else
            $errArr['err'] = "<center><h4 class='alert alert-danger'> لم يتم التعديل! تأكد من صحة البيانات</h4></center>";
    } //// end if 
    else
        $errArr['err'] = "<center><h4 class='alert alert-danger'>تاكد من اختيار الصورة ثم اعد المحاولة</h4></center>";
} /// end server image1 form if
?>
<!--=======================================================================================================-->

<?php
if (isset($_GET)) //start if 1
{
    Sanitize($_GET);
    $_GET["id"] = decript_id($_GET["id"]);                             // decript the  id that sent in the action 
    if (isset($_GET["action"]) and $_GET["action"] == "update") //start if 2
    {
        if (isset($_GET["id"]) and is_numeric($_GET["id"]))    //start if 3
        {

            $sql = "select * from slides where id=:id";
            $q = $con->prepare($sql);
            $q->execute(array("id" => $_GET["id"]));
            if ($q->rowcount()) {
                foreach ($q->fetchall() as $row) {
                    $title = $row['title'];
                    $desc = $row["description"];
                    $title_ar =$row[ "title_ar"];
                    $desc_ar = $row["description_ar"];
                    $img1 =$row["img"];




?>


<section class="container box">


    <div class="row box">
        <!---start box roen row-->
        <form action="" method="post" enctype="multipart/form-data">
            </br>
            <?php if (isset(  $errArr['err'] )) {echo   $errArr['err'];} ?>
            </br>
            <center>
                <h1 style='font-size:35px;font-family:Arial;color:#fff;'>اضافة صور العرض</h1>
            </center>
            <!--==============================================================================================================================--->
            <div class="col-md-4 ">
                <div class="tm-product-img-edit mx-auto">
                    <div class="form-group mb-3">
                        <label for="logo">الصورة</label>
                        <br>
                        <?php if (isset($errors['files'])) {
                                                echo $errors['files'];
                                            } ?>
                        <?php if (isset($errors['imgname'])) echo $errors["imgname"] ?>
                        <?php if (isset($errors['imgtype'])) echo $errors["imgtype"] ?>
                        <?php if (isset($errors['imgsize'])) echo $errors["imgsize"] ?>
                    </div>

                    <img src="images/slids/<?php echo $img1; ?>" alt="صورة المنتج" class="img-fluid d-block mx-auto"
                        onclick="document.getElementById('fileToUpload').click();"
                        style="border:2px double gold; border-radius:50px;width:100%;height:300px;" />
                </div>

                <div class="custom-file mt-3 mb-3">
                    <input type="file" name="img1" style="display:none;" id="fileToUpload" multiple accept="image/*" />
                    <input type="button" class=" validate btn btn-primary btn-block mx-auto" value="Choose Image"
                        onclick="document.getElementById('fileToUpload').click();">


                </div>
            </div>
            <!--==============================================================================================================================--->
            <div class="col-md-3 "></div>
            <!--==============================================================================================================================--->
            <div class="col-md-5 ">
                <!--============================================================================================================-->
                <div class="form-group mb-3" dir="rtl" align="right">
                    <label for="title"> العنوان</label>
                    <br>
                    <input class="form-control validate" name="title" type="text" value="<?php if (isset($title)) {
                                                                                                                    echo @$title;
                                                                                                                } ?>"
                        class="form-control" placeholder="Type The Title..." />
                    <?php if (isset($errors['title'])) {
                                            echo $errors['title'];
                                        } ?>
                </div>


                <div class="form-group mb-3" dir="rtl" align="right">
                    <label class="control-label"> الوصف</label>
                    <textarea class="form-control validate tm-small prod" rows="5" name="description"
                        placeholder=" Typr The Description..." required>
                                        <?php if (isset($desc)) {
                                            echo @$desc;
                                        } ?></textarea>
                    <?php if (isset($errors['description'])) {
                                            echo $errors['description'];
                                        } ?>
                </div>
                <!--==============================================================================================================================--->
                <div class="form-group mb-3" dir="rtl" align="right">
                    <label for="title"> العنوان بالعربي</label>
                    <br>
                    <input class="form-control validate" name="title_ar" type="text" value="<?php if (isset($title_ar)) {
                                                                                                                    echo @$title_ar;
                                                                                                                } ?>"
                        class="form-control" placeholder="  اكتب العنوان..." />
                    <?php if (isset($errors['title_ar'])) {
                                            echo $errors['title_ar'];
                                        } ?>
                </div>


                <div class="form-group mb-3" dir="rtl" align="right">
                    <label class="control-label"> الوصف بالعربي</label>
                    <textarea class="form-control validate tm-small " style="text-align:right;" rows="5"
                        name="description_ar" placeholder="اكتب التفاصايل ..." required>
                                        <?php if (isset($desc_ar)) {
                                            echo @$desc_ar;
                                        } ?></textarea>
                    <?php if (isset($errors['description_ar'])) {
                                            echo $errors['description_ar'];
                                        } ?>
                </div>
                <!--==============================================================================================================================--->
            </div>

            <!-- end of form col-->


            <div>
                <input type="submit" class="btn btn-primary btn-block mx-auto validate" value="تعديل الصورة"
                    name="submit">

            </div>






        </form>
    </div>
    <!---end box roen row-->



</section>
<!--end container-->
<?php
                }
            }
        }
    }
}



require_once("footer.php");
?>