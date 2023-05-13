<?php require_once "control-header.php";
require_once "admin/secFunction.php";
?>

  <?php

global $social_media;
global $name_of_website;
global $logo;
function Sanitize1(&$arr){
	$arrChars=array("'","\\","\"","^","<",">","?","%",";","(",")","$","*","--","!","=");
	foreach($arr as $index=>$item){
		 $arr[$index]=str_replace($arrChars,'',$arr[$index]);
		$arr[$index]=strip_tags($arr[$index]);
		$arr[$index]=filter_var($arr[$index],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	}
}
//=============End
// Function to Saitize User's Input
function SanitizeGet1(&$arr){
	$arrChars=array(" ","'","\\","\"","/","<",">","?","%",";","(",")","$","*","--","!","=",".","@","&","or",",","~","`","#");
	foreach($arr as $index=>$item){
		 $arr[$index]=str_replace($arrChars,'',$arr[$index]);
		$arr[$index]=strip_tags($arr[$index]);
		$arr[$index]=filter_var($arr[$index],FILTER_SANITIZE_STRING);
	}
}

if (isset($_GET['id'], $_GET['action'])) {
    SanitizeGet1($_GET);

    @$id = decript_id($_GET['id']);
    if (is_numeric($id)) {
        $sql = "select  * from footer_socialmedia   where section_no=:id";
        $sq = $con->prepare($sql);
        $sq->execute(array("id" => $id));
        if ($sq->rowcount()) {
            foreach ($sq->fetchall() as $row) {
                @$social_media = $row['social_media'];
                @$name_of_website = $row['name_of_website'];
                @$logo = $row['logo'];
               

            }
        }
    }
}

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['update'])=="update") {
        //Service  Validation==============================

       
 
        Sanitize1($_POST);
       
             
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
                if (isset($_GET['id'])) {
                    @$id = decript_id($_GET['id']);
                      if (is_numeric($id)) { 
                    $sql1 = "update footer_socialmedia set social_media=:social_media,name_of_website=:name_of_website,logo=:logo where section_no=:id";
                    $q1 = $con->prepare($sql1);
     
                    $q1->execute(array(
           "social_media" => $_POST["social_media"],
           "name_of_website" => $_POST["name_of_website"],"logo"=>$_POST['logo'],"id"=>$id));
                    if ($q1->rowcount()) {
                        $errArr['err'] = "<div class='col-12'> <h4 class='alert alert-success'> تم التعديل بنجاح </h4></div>";
                       
                    } else {
                        $x= array(      "social_media" => $_POST["social_media"],
           "name_of_website" => $_POST["name_of_website"],"logo"=>$_POST['logo'],"id"=>$id);
                        print_r($x);
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
                                        <div class="form-group mb-3">
  <label for="social_media">صورة  </label><br/>
<select name="logo" style=" direction: ltr;" size="1"
    class="form-select form-control validate">
    <?php if (isset($logo,$name_of_website)) {
$option1 = $logo;
echo "<option  value='$option1'>$name_of_website</option>";
} 
?>

    <option value="fab fa-facebook-f fa-lg fa-fw"> Facebook</option>

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
  <label for="social_media">نوع الموقع  </label><r />
                                    <select name="name_of_website" style=" direction: ltr;" size="1"
                                        class="form-select form-control validate">
                                        <?php if (isset($name_of_website)) {
                                $option = $name_of_website;
                                echo "<option  value='$option'>$option</option>";
                              } 
                              ?>

                                        <option value="facebook"> Facebook</option>
                                   
                                        <option value="instagram">instagram</option>
                                        <option value="facebook"> WhatsApp</option>
                                        <option value="facebook"> Twitter</option>
                                    </select>
                                    <?php if (isset($errors['name_of_website'])) {
                              echo $errors['name_of_website'];
                            }
                            ?>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="social_media">الموقع الإلكتروني </label><br />

                                    <input id="website" name="social_media" type="text"
                                        value="<?php if (isset($social_media)) {
                                              echo $social_media;                                                       } ?>"
                                        class="form-control validate" />
                                    <?php if (isset($errors['social_media'])) {
                              echo $errors['social_media'];
                            } ?>
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

    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2020</b> All rights reserved.

                <a rel="nofollow noopener" href="index.php" class="tm-footer-link">Wedding Online</a>
            </p>
        </div>
    </footer>
</div>

<script src="../control-panel/js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="../control-panel/js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
function deleteChk(Id, Sid) {

    var chkDel = window.confirm("You Will Delete This Offer?");
    if (chkDel === true) {
        var page = '?action=delete&id=' + Id + '&sid=' + Sid;
        window.location = page;
    }
};
</script>
<script>
function logoutChk() {
    var chklogout = window.confirm("Are You Sure To Logout?");
    if (chklogout === true)
        window.location = "../store/logout.php";
};
</script>
<script>
var disMsg = document.getElementById("confdisplayMsg");
disMsg.onclick = function() {
    disMsg.innerHTML = "";
};
</script>
<script>
var disMsg1 = document.getElementById("reqdisplayMsg");
disMsg1.onclick = function() {
    disMsg1.innerHTML = "";
};
</script>
<script>
//==========  changeLanguage function ===============
function changeLanguage(lang) {
    var langRq;
    if (window.XMLHttpRequest) // chrom firefox safari ie+7
        langRq = new XMLHttpRequest();
    else // ie -6
        langRq = new ActiveXObject("Microsoft.XMLHTTP");

    langRq.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            var res = this.responseText;
            if (res === "yes") {
                location.reload(true);
            }
        }

    }; //end of onreadystatechange function
    langRq.open("POST", "login-control.php", true);
    langRq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    langRq.send("language=" + lang);


} // end of the main function (changeLanguage)
</script>

<script>
// Function to Hide user Requests by Ajax
function hideUserRequsts(tableId) {
    document.getElementById(tableId).innerHTML = "";
    //document.getElementById(tableId).innerHTML="";

} // end of the main function (hideUserRequsts)
</script>

<script>
hideUserRequsts("reqTable");
hideUserRequsts("confTransTable");
hideUserRequsts("transTable");
</script>


</body>

</html>