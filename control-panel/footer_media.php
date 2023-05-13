<?php include "control-header.php"; ?>
<?php
require "db.php";
require_once "admin/secFunction.php";

//===

/* =============================== */
?>
<?php
function Sanitize1(&$arr){
	$arrChars=array("'","\\","\"","^","<",">","?","%",";","(",")","$","*","--","!","=","+");
	foreach($arr as $index=>$item){
		 $arr[$index]=str_replace($arrChars,'',$arr[$index]);
		$arr[$index]=strip_tags($arr[$index]);
		$arr[$index]=filter_var($arr[$index],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	}
}
//=============End
// Function to Saitize User's Input

//=============End 
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['addComp'])=="إضافة") {
        Sanitize1($_POST);
        //Service  Validation==============================


       
                if (empty(@$_POST['social_media'])) {
                    $errors['social_media'] = "<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
                }

                if (empty($_POST['name_of_website'])) {
                    $errors['name_of_website'] = "<span style='color:red'>   يرجى اختيار نوع الصفحة </span>";
                }
  if (empty($_POST['logo'])) {
                    $errors['logo'] = "<span style='color:red'>   يرجى اختيار نوع الشعار </span>";
                }
   
        
            
          
            
 
            //###########################################Data base Control
    
  
            if (empty($errors)) {
    
               
    
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
      

      
                    $sql1 = "insert into footer_socialmedia(social_media,name_of_website,logo)  values(:social_media,:name_of_website,:logo)";
                    $q1 = $con->prepare($sql1);
     
                   $q1->execute(array( "social_media" => $_POST["social_media"], "name_of_website" => $_POST["name_of_website"],"logo"=>$_POST['logo']));
                  
         
                    if ($q1->rowcount()) {
                        $errArr['err'] = "<div class='col-12'> <h4 class='alert alert-success'> تم إضافة الفوتر  بنجاح </h4></div>";
                       
                    } else {

                        
                       
                        $errArr['err'] = "<h4 class='alert alert-danger'>تأكد من صحة البيانات ثم أعد المحاولة </h4>";
                    }
                } //end for
            
       
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
                            <form action="" method="post"  enctype="multipart/form-data" class="tm-edit-product-form">



              
                                <div class="data-section"
                                    style="border-radius:5px;background-color:#0ef9ce;padding:10px;">
                                    <center>
                                        <h3> صفحات التواصل الاجتماعي</h3>
                                    </center>
                                </div>
                                <!--====================================================================================================================================-->

                                <!--=========================================================================================================================================-->

                               
                                <!--end of the image col-->
                                <!--=========================================================================================================================================-->
                                <br>
 <div class="form-group mb-3">
<h4 style="color:#fff" for="logo">نوع الشعار</h4>
<select name="logo" style=" direction: ltr;" size="1"
    class="form-select form-control validate">
    <?php if (isset($_POST['logo'])) {
$logo = $_POST['logo'];
echo "<option  value='$logo'>$logo</option>";
} else {
?>

    <option value="fab fa-facebook-f fa-lg fa-fw"> Facebook</option>
    <?php
} ?>
    <option value="fab fa-instagram fa-lg fa-fw">instagram</option>
    <option value="fab fa-whatsapp fa-lg fa-fw"> WhatsApp</option>
    <option value="fab fa-twitter fa-lg fa-fw"> Twitter</option>
</select>
<?php if (isset($errors['logo'])) {
echo $errors['logo'];
}
?>
</div>
                             

                                <!--end image col section-->
                                <!--============================================================================================================================================-->

                                <div class="form-group mb-3">
                                    <h4 for="logo" style="color:#fff;">نوع الصفحة</h4>

                                    <select name="name_of_website" style=" direction: ltr;" size="1"
                                        class="form-select form-control validate">
                                        <?php if (isset($_POST['name_of_website'])) {
                                $option = $_POST['name_of_website'];
                                echo "<option  value='$option'>$option</option>";
                              } else {
                              ?>

                                        <option value="facebook"> Facebook</option>
                                        <?php
                              } ?>
                                        <option value="instagram">instagram</option>
                                        <option value="Twitter"> Twitter</option>
                                        <option value="whatsapp"> Whatsapp</option>
                                    </select>
                                    <?php if (isset($errors['name_of_website'])) {
                              echo $errors['name_of_website'];
                            }
                            ?>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="social_media">الموقع الإلكتروني </label><br>

                                    <input id="website" name="social_media" type="text"
                                        value="<?php if (isset($_POST['social_media'])) {
                                              echo $_POST['social_media'];                                                        } ?>"
                                        class="form-control validate" />
                                    <?php if (isset($errors['social_media'])) {
                              echo $errors['social_media'];
                            } ?>
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