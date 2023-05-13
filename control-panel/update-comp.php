<?php include_once("control-header.php");?>
<?php
require("db.php");
require_once("admin/secFunction.php");

//===

?>
<?php
#PHP User Input Validation
	if($_SERVER["REQUEST_METHOD"]=="POST" and @$_POST["serUpdate"]=="تعديل"){	

    Sanitize($_POST);
	//Service Name Validation==============================
		if(empty(@$_POST['name']))
			$serrors['name']="<span style='color:red'>أدخل اسم الوكالة</span>";
				
	//Company website Validation=========================================
		if(empty(@$_POST['website']))
			$serrors['website1']="<span style='color:red'>أدخل عنوان موقع ويب الوكالة</span>";		

    //Company facebook Validation=========================================
  if(empty(@$_POST['facebook']))
  $serrors['facebook']="<span style='color:red'>ادخل رابط صفحة الفيسبوك</span>";	
	
	////Service Email Validation=========================================
		@$_POST['email']=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		if(!filter_var(@$_POST['email'],FILTER_VALIDATE_EMAIL))
			$serrors['email']="<span style='color:red'>يرجى كتابة الإيميل بشكل صحيح</span>";

		//Service Phone Validation==============================
		//if(empty(@$_POST['phone']))
		//	$serrors['phone']="<span style='color:red'>$langaddsr[insPhone]</span>";
		
		/////////////////////////
	//	if(!is_numeric(@$_POST['phone']) Or strlen($_POST['phone'])!=8 )//or strlen($_POST['sphone'])!=8 )
	//		$serrors['phone']="<span style='color:red'>$langaddsr[shPhone] </span>";
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
		//Service Logo Validation==============================================================================
	
		@$name=$_FILES['simg']['name'];
		@$type=$_FILES['simg']['type'];
		@$tmp=$_FILES['simg']['tmp_name'];
		@$size=$_FILES['simg']['size'];
		@$error=$_FILES['simg']['error'];
		
		
				
		if(!empty($name))
		{
			
			$mytypes=array("png","jpg","jpeg","gif");
			$ext=explode(".",$name);
			$ext=strtolower(end($ext));
			$namelogo=uniqid("[a-z]");
			$namelogo.='.'.$ext;
			if(in_array($ext,$mytypes)){
				
				if($size<=2000000)
				{
					if(move_uploaded_file($tmp,"images/$namelogo"))
						echo ""; 	
					
				}
				
				else
					
					{
						
						$serrorsImg['imgsize']="<span style='color:red'><b>حجم الصورة كبير جدا</b></span>";
						
					}
			}
			else{
				
			$serrorsImg['imgtype']="<span style='color:red'><b>نوع الصورة غير مناسب</b></span>";
				
			}
			
		}
		else
			
			{
				
			$serrorsImg['imgname']="<span style='color:red'><b>يرجى اختيار صورة</b></span>";
			}	
  //###########################################Data base Control
  /*
		if(!isset($serrors))
		{

		if(!isset($serrorsImg)){
			$sql="insert into manufact_comp(name, logo, website, email, phone, location) values(:nm, :lg, :ws, :ml, :ph, :lc)";
			$q=$con->prepare($sql);
			$q->execute(array("nm"=>$_POST["name"],"lg"=>$namelogo,"ws"=>$_POST["website"],"ml"=>$_POST["email"],"ph"=>$_POST["phone"],"lc"=>$_POST["location"] ));
		}
			if($q->rowcount()){
				$errArr['err']= "<div class='col-12'> <h4 class='alert alert-success'> $langaddsr[inserted] </h4></div>";
				echo "<meta http-equiv='refresh' content='0; url=$pageSelf' />";
			}	
			else
				$errArr['err']="<h4 class='alert alert-danger'>$langaddsr[wrong]</h4>";

		}
		else{
    $errArr['err']="<h4 class='alert alert-danger'>$langaddsr[tryAgine]</h4>";
    }
    */

//=========================================================
if(!isset($serrors))
		{

		if(!isset($serrorsImg)){
      $sql="update companies set name=:nm, logo=:lg, email=:ml, facebook_link=:fb, location=:lc, phone=:ph, website=:ws where id=:id";
			$q=$con->prepare($sql);
      $q->execute(array("nm"=>$_POST["name"],"lg"=>$namelogo,"ws"=>$_POST["website"],"ml"=>$_POST["email"],"fb"=>$_POST["facebook"], "ph"=>$_POST["phone"],"lc"=>$_POST["location"], "id"=>decript_id($_GET["id"]) ));
      if($q->rowcount()){
				$errArr['err']= "<div class='col-12'> <h4 class='alert alert-success'> تم تعديل البيانات </h4></div>";
			
			}
			else
				$errArr['err']="<h4 class='alert alert-danger'> 111هنالك خطأ في البيانات</h4>";
    }  // end if 
		else{
        $sql="update companies set name=:nm, email=:ml, facebook_link=:fb, location=:lc, phone=:ph, website=:ws where id=:id";
        $q=$con->prepare($sql);
        $q->execute(array("nm"=>$_POST["name"], "ws"=>$_POST["website"],"ml"=>$_POST["email"],"fb"=>$_POST["facebook"],"ph"=>$_POST["phone"],"lc"=>$_POST["location"], "id"=>decript_id($_GET["id"]) ));

			if($q->rowcount()){
				$errArr['err']= "<div class='col-12'> <h4 class='alert alert-success'> تم تعديل البيانات </h4></div>";
			
			}
			else
				$errArr['err']="<h4 class='alert alert-danger'>2هنالك خطأ في البيانات</h4>";
    }
		}
		else{
    $errArr['err']="<h4 class='alert alert-danger'>تأكد من صحة كل البيانات ثم اعد المحاولة</h4>";
    }
//============================================================

	}//EndIf Of  the First if
	
?> 



  <!--
  <form action="#" method="POST" style="background-color:white;opacity:1;width:80%" id="rejectPopup">
          <div class="row form-group" >
                <div class="col-md-2">
                </div>
                  <div class="col-md-8">
                    <label style="color:black;" for="message">رسالة الرفض</label>
                                        <textarea style="background-color:white; color:blue;" name="detail" id="message" cols="25" rows="5" class="form-control" placeholder="Message"></textarea>
                    
                  </div>
                </div>	
          <div class="form-group text-center">
                  <input type="submit" name="SendMessage" value="Send" class="btn btn-primary"/>
                </div>
        </form>	
  -->
  <!--############################################################################### 
  -->	


<?php  
    if(isset($_GET))
    {
        Sanitize($_GET);
        //$_GET["id"]=decript_id($_GET["id"])   ;       // if 1
        if(isset($_GET["action"]) and $_GET["action"]=="update") // if 2
        {
          if(isset($_GET["id"]) and is_numeric(decript_id($_GET["id"])))// if 3
          {
            $_GET["id"]=decript_id($_GET["id"]); 
            $sql="select * from companies where id =:id";
								$q=$con->prepare($sql);
								$q->execute(array("id"=>$_GET["id"]));
								if($q->rowcount())
								{
									foreach($q->fetchall() as $row){
                    $logo=$row["logo"];
                    $id=$row["id"];
										$name=$row["name"];
                    $website=$row["website"];
                    $facebook=$row["facebook_link"];
                    $location=$row["location"];
										$email=$row["email"];
										$phone=$row["phone"];
										$active=$row["state"];
  ?>

      
    <!-- row -->
        <div style="margin:2px" class="row tm-content-row" dir="rtl" align="right">

      <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
            <div class="row">
              <div align="center" class="col-12">
                <h2  class="tm-block-title d-inline-block">تعديل بيانات الوكالة</h2>
              </div>
        <div class="col-12"> 			</div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="#" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >اسم الوكالة</label><br/>
                      <?php if(isset($serrors['name'])) echo $serrors['name'] ; ?>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      value="<?php echo $name ; ?>"
                      class="form-control validate"
                    />
                    </div>
          
                
          
          <div class="form-group mb-3">
                    <label
                      for="website"
                      >الموقع الإلكتروني </label><br/>
                      <?php if(isset($serrors['website1'])) echo $serrors['website1'] ; ?>
                    <input
                      id="website"
                      name="website"
                      type="text"
                      value="<?php echo $website; ?>"
                      class="form-control validate"
                    />
              </div>

              <div class="form-group mb-3">
                    <label
                      for="facebook"
                      >رابط الفيسبوك </label><br/>
                      <?php if(isset($serrors['facebook'])) echo $serrors['facebook'] ; ?>
                    <input
                      id="facebook"
                      name="facebook"
                      type="text"
                      value="<?php echo $facebook; ?>"
                      class="form-control validate"
                    />
           </div>
        
          <div class="form-group mb-3">
                    <label
                      for="location"
                      >العنوان                    </label>
                    <input
                      id="location"
                      name="location"
                      type="text"
                        value="<?php echo $location ; ?>"
                      class="form-control validate"
                    />
                  </div>
          <div class="form-group mb-3">
                    <label
                      for="email"
                      >البريد الالكتروني</label><br/>
                      <?php if(isset($serrors['email'])) echo $serrors['email'] ; ?>
                    <input
                      id="email"
                      name="email"
                      type="email"
                      value="<?php echo $email; ?>"
                      class="form-control validate"
                    />
                            </div>
          
          
          <div class="form-group mb-3">
                    <label
                      for="phone"
                      >رقم الهاتف </label><br/>
                      <?php if(isset($serrors['phone'])) echo $serrors['phone'] ; ?>
                    <input
                      id="phone"
                      name="phone"
                      type="text"
                      value="<?php echo $phone; ?>"
                      class="form-control validate"
                    />
                            </div>
                          
              </div>
        
          
        
              <div class="col-xl-4 col-lg-4 col-md-6 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
                <div class="form-group mb-3">
                <br> <label for="logo"> الصـــورة 
                  </label><br/>
                      <?php if(isset($serrorsImg['imgsize'])) echo $serrorsImg['imgsize'] ; ?>
                      <?php if(isset($serrorsImg['imgtype'])) echo $serrorsImg['imgtype'] ; ?>
                      <?php if(isset($serrorsImg['imgname'])) echo $serrorsImg['imgname'] ; ?>
                  </div>
                  <img src="images/<?php echo $logo;?>" style="border:2px double gold; border-radius:50px;" alt="Service Logo" class="img-fluid d-block mx-auto" onclick="document.getElementById('simg').click();">
                  
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="simg" type="file" name="simg" style="display:none;" />
                  
                                              </div>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary btn-block text-uppercase" name="serUpdate" value="تعديل" style="border-radius:50px;"/>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
     
    <?php
                  } // end if rowcount
                }// end foreach
            // =  ===================================================
          }// end if 3

        }// end if 2

    }// end if 1
?>
   <?php
 include_once("footer.php");
 ?>