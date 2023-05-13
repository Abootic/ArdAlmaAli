<?php require_once("control-header.php");
        require_once("admin/secFunction.php");
        ?>


<!-- <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> -->

<style>
.box,
.box1 {
    box-shadow: 0 4px 8px rgba(32, 31, 32, 0.133), inset 0 0 8px rgba(32, 31, 32, 0.133);
    margin-top: 5px;
    background-color: #028f75;
}
</style>

<!--======================================================================================================-->

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if (isset($_POST['sub'])) {
                if (empty($_POST['title'])) {
                    $errors['title']="<span class='alert alert-danger'><b>Please Type The Title...</b></span>";
                }
                if (empty($_POST['description'])) {
                    $errors['description']="<span class='alert alert-danger'><b>Please Type The Description...</b></span>";
                }
            
                
                if (!empty($_FILES["files"]["name"])) {
                    $mytypes=array("png","jpg","jpeg","gif");
                    $ext=explode(".", $_FILES['files']['name']);
                    $ext=strtolower(end($ext));
                    $rand=rand(1000, 1000000).".".$ext;
            
                    if (in_array($ext, $mytypes)) {
                        if ($_FILES["files"]["size"]<=2000000) {
                            if (move_uploaded_file($_FILES["files"]["tmp_name"], "images/slids/$rand")) {
                            }//end 3 nested if
                        else {
                            $errors['files']="<span class='alert alert-danger'><b>Maximum size:2M</b></span>";
                        }//end else for nestsed 3if
                        }//end the the nested 1 if
                    else {
                        $errors['files']="<span class='alert alert-danger'><b>Maximum size:2M</b></span>";
                    }
                    }//end nested 1 if
                else {
                    $errors['files']="<span class='alert alert-danger'><b>Invalid Type</b></span>";
                }//end else for nested 2if
                }//end 1 if
            else {
                $errors['files']="<span class='alert alert-danger><b>Choose File</b></span>";
            }
                if (empty($errors)) {
                    $insert_intoslids="insert into slide_images(img,title,description) values(:i1,:i2,:i3)";
                    $slids=$con->prepare($insert_intoslids);
                    // for($x=0 ;$x<=count($rand);$x++)
                    $slids->execute(array("i1"=>$rand,"i2"=>$_POST['title'],"i3"=>$_POST['description']));
                    if ($slids->rowcount()) {
                        echo "<span class='alert alert-info>تم اضافة السلايد</span>";
                        echo "<meta http-equiv='refresh' content='5; url=SLIDER.php' />";
                    }//end rowcount if
                    else {
                        echo "<span class='alert alert-danger>لم يتم اضافة السلايد </span>";
                    }
                }//end if empty errors
            }
        }//end the main if server post
?>
<!--=======================================================================================================-->


<BR>
<BR>



<div class="container">

    <div class="row box">
        <!---start box roen row-->
        <?php
                    $select="select * from slides LIMIT 3";
                    $slid1=$con->prepare($select);
                    $slid1->execute();
                    if ($slid1->rowcount()) {
                        foreach ($slid1->fetchall() as $s) {
                            $id=$s['id'];
                            $img=$s['img'];
                            $tilte=$s['title'];
                            $desc=$s['description'];
                            @$id1=encript_id($id);
                        
                            echo"<div class='col-md-4'>";
                            echo"<div  class='thumbnail box' style='background-color:#fff;'>";
                            echo"<img class=' img-responsive' style='width:250px;height:270px;' src='images/slids/$img' alt='$img'\>";
                            echo"<p class='pi-text'>
							<h6 style='color:#000;font-family:sans-serif;'  dir='rtl' align='right'>العنوان : $tilte </h6>
							<p  style='color:#000;font-family:sans-serif;'  dir='rtl' align='right'> الوصف : $desc</p>
							<span><a href='update_slides.php?action=update&id=$id1' class='btn btn-success btn-block text-uppercase' style='border-style:solid;border-radius:5px;'>
							تعديل</a></span>
							
							</p>";
                            
                            echo"</div>";
                            echo"</div>";
                        }
                    }

                    ?>



        <button class='btn btn-success btn-block text-uppercase' style='border-style:solid;border-radius:5px;'
            onClick="displaySlide()">
            اضافة اسلايد</button>

    </div>
    <!--end the mac row  -->
</div>
<!--========================                    =========================================================== -->
<div id="section" class="row box">
    <!--start the mac row  -->

    <div class="col-md-4"> </div>
    <div class="col-md-6 ">
        <!--start the mac col  -->
        </br>
        <p style='font-size:35px;font-family:Arial;'>Add Slides</p>
        <div class="row">
            <!-- bod row start-->
            <form action="" method="post" enctype="multipart/form-data">
              
                <div class="col-md-12">
                    <div class="form-group validate label-floating ">
                        <label class="control-label" style="color:#fff;"> Titel :</label>
                        <input style="background-color:#fff;color:#000;" name="title" type="text"
                            value="<?php if (isset($title)) {
                        echo @$title;
                    }?>" class="form-control"
                            placeholder="Type The Title..." />
                        <?php if (isset($errors['title'])) {
                        echo $errors['title'];
                    }?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group validate label-floating">
                        <span for="description" style="color:#fff;"> Description :</span>
                        <textarea class="form-control" style="background-color:#fff;color:#000;" col-5
                            name="description" placeholder="Type your Admin Name..."
                            required><?php if (isset($desc)) {
                        echo @$desc;
                    }?></textarea>
                        <?php if (isset($errors['description'])) {
                        echo $errors['description'];
                    }?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group label-floating validate">
                        <input type="file" name="files" style="display:none;" id="fileToUpload" multiple
                            accept="image/*" />
                        <input type="button" class=" validate btn btn-primary btn-block mx-auto" value="Choose Image"
                            onclick="document.getElementById('fileToUpload').click();">
                        <?php if (isset($errors['files'])) {
                        echo $errors['files'];
                    }?>


                        <input type="submit" class="btn btn-primary btn-block mx-auto validate" value="تعديل الصورة"
                            name="submit">

                    </div>
                </div>





            </form>
        </div><!-- bod row end-->

        <div class="col-md-4">

        </div>
    </div>
    <!--end the mac col  -->
</div>
<!--end the mac row  -->
<BR>
<BR>
<style>
    #section{display:none;}
    </style>
<script>
    
function displaySlide() {
    var myClock_slid = document.getElementById('section');
    var displaySetting = myClock_slid.style.display;
    var clockButton = document.getElementById('clockButton');
    myClock_slid.style.display = 'none';
    if (displaySetting == 'block') {
        // clock is visible. hide it
        myClock_slid.style.display = 'none';
        // change button text
        //clockButton.innerHTML = 'Show clock';
    } else {
        // clock is hidden. show it
        myClock_slid.style.display = 'block';
        // change button text
        // clockButton.innerHTML = 'Hide clock';
    }
}
</script>

<?php require_once("footer.php");?>