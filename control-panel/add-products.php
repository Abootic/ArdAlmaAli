<?php include("control-header.php");
require_once("admin/secFunction.php");

?>
<?php
 #Start Validation for the form
	 if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			//Product NAME Validation
		    Sanitize($_POST);
			if(empty($_POST['name']))
	    	$errors['name']="<span style='color:red'><b> ادخل اسم المنتج </b></span>";
//==================================product company Validation==================================================
			if(empty($_POST['company']))
	    	$errors['company']="<span style='color:red'><b>ادخل الوكالة المصنعة   </b></span>";
//==================================product Category Validation=================================================
			if(empty($_POST['category']))
	    	$errors['category']="<span style='color:red'><b>ادخل فئة المنتج </b></span>";
//=================================image1 Validation============================================================
		$name=$_FILES["img1"]["name"];
		$type=$_FILES["img1"]["type"];
		$tmp=$_FILES["img1"]["tmp_name"];
		$size=$_FILES["img1"]["size"];
		$error=$_FILES["img1"]["error"];
		if(!empty($_FILES["img1"]["name"]))							//check the image if it not empty
		{
			$mytypes=array("png","jpg","jpeg","gif");
			$ext=explode(".",$name);
			$ext=strtolower(end($ext));
			$img1=uniqid();
			$img1.=".".$ext;
			$img1=str_replace(' ','',$img1);
			if(in_array($ext,$mytypes))                                     // check if the type of the image is valid the type are (png,jpg,gif,jpeg)
			{
				if($size<=2000000)
				{
					if(move_uploaded_file($tmp,"images/$img1"))               // check if the size of the image smaller or equal than 1MB
						echo "";
				}
				else
					{
						$errors['imgsize']="<span style='color:red'><b>حجم الصورة كبير  اكبر حجم 1 ميجا</b></span>";
					}
			}
			else{
			$errors['imgtype']="<span style='color:red'><b>نوع الصورة غير صحيح</b></span>";     
			}
		}
		else 
			{
			$errors['imgname']="<span style='color:red'><b>ادخل صورة</b></span>";
			}
//===================================image2 Validation================================================		
		$name=$_FILES["img2"]["name"];
		$type=$_FILES["img2"]["type"];
		$tmp=$_FILES["img2"]["tmp_name"];
		$size=$_FILES["img2"]["size"];
		$error=$_FILES["img2"]["error"];
		if(!empty($_FILES["img2"]["name"]))							//check the image if it not empty
		{
			$mytypes=array("png","jpg","jpeg","gif");
			$ext=explode(".",$name);
			$ext=strtolower(end($ext));
			$img2=uniqid();
			$img2.=".".$ext;
			$img2=str_replace(' ','',$img2);
			if(in_array($ext,$mytypes))                                     // check if the type of the image is valid the type are (png,jpg,gif,jpeg)
			{
				if($size<=1000000)
				{
					if(move_uploaded_file($tmp,"images/$img2"))               // check if the size of the image smaller or equal than 1MB
						echo "";
				}
				else
					{
					$Merrors['imgsize']="<span style='color:red'><b>حجم الصورة كبير  اكبر حجم 1 ميجا</b></span>";
					}
			}
			else{
			$Merrors['imgtype']="<span style='color:red'><b>نوع الصورة غير صحيح</b></span>";     
			}
		}
		else 
			{
			$Merrors['imgname']="<span style='color:red'><b>ادخل صورة</b></span>";
			}
//=================================================================================================================================================
		if(empty($errors))        //start  if 1 errors this  check if  there is no error in enntering data of products
			{ 														
				if(empty($Merrors))               	// start  if 2 for image2 and image1 check if there is no error in enntering data of products
					{ 														
					  $sql="insert into  products(img1,img2,name,description,ingredients,category,product_type,size,power,company,admin)
					  values(:img1,:img2,:name,:description,:ingredients,:category,:product_type,:size,:power,:company,:admin)";
					  $q=$con->prepare($sql);
					  $q->execute(array("img1"=>$img1,"img2"=>$img2,"name"=>$_POST["name"],"description"=>$_POST["description"],"ingredients"=>$_POST["ingredients"],
					  "category"=>$_POST["category"],"product_type"=>$_POST["product_type"],"size"=>$_POST["size"], "power"=>$_POST["power"],
					  "company"=>$_POST["company"],"admin"=>1));
					  if($q->rowcount()) // start if rowcount
					  {
						$errArr['err']= "<div class='col-12'> <h4 class='alert alert-success'> تم إضافة المنتج بنجاح </h4></div>";
						//echo "<meta http-equiv='refresh' content='5; url=products.php' />";
						} // end if rowcount
					  else
					  $errArr['err']="<h4 class='alert alert-danger'> لم تتم الإضافة! تأكد من صحة كل البيانات ثم اعد المحاولة</h4>";
					} //end if 2
//=======================================================================================================================================
					else{         // start else 1 this condation if  only adding one image 
					  $sql="insert into  products(img1,name,description,ingredients,category,product_type,size,power,company,admin)
					   values(:img1,:name,:description,:ingredients,:category,:product_type,:size,:power,:company,:admin)";
					  $q=$con->prepare($sql);
					  $q->execute(array("img1"=>$img1,"name"=>$_POST["name"],"description"=>$_POST["description"],"ingredients"=>$_POST["ingredients"],
					  "category"=>$_POST["category"],"product_type"=>$_POST["product_type"],"size"=>$_POST["size"], "power"=>$_POST["power"],
					  "company"=>$_POST["company"],"admin"=>$_SESSION["admin_id"]));
					  if($q->rowcount()) // start rowcount
					  {
						$errArr['err']= "<div class='col-12'> <h4 class='alert alert-success'> تم إضافة المنتج بنجاح </h4></div>";
						//echo "<meta http-equiv='refresh' content='5; url=products.php' />";
						} // end rowcount
					  else
					  $errArr['err']="<h4 class='alert alert-danger'> لم تتم الإضافة! تأكد من صحة كل البيانات ثم اعد المحاولة</h4>";
					} // end else 1
			} // end if 1
				else{
					$errArr['err']="<h4 class='alert alert-danger'>تأكد من صحة كل البيانات ثم اعد المحاولة</h4>";
			}
	 }
//===========================================================================================================================================
 ?>
 <div style="margin:2px" class="row tm-content-row" dir="rtl" align="right">
     <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
		  <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
            <div class="row">
              <div align="center" class="col-12">
                <h1 class="tm-block-title d-inline-block"  >إضافة منتج جديد</h1>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="#" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >أسم المنتج
                    </label><br>
					 <?php if(isset($errors["name"])) echo $errors["name"]; ?>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                    />
					</div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >الوصف</label
                    >
                    <textarea                    
                      class="form-control validate tm-small prod"
                      rows="5"
					  name="description"
                    ></textarea>
                  </div>
     		    <div class="form-group mb-3">
                          <label for="company">الوكالة</label >
						  <?php if(isset($errors["company"])) echo $errors["company"]; ?>
							<select 
							class="custom-select tm-select-accounts form-control validate"
							name="company"
							id="company" >
							<?php
							  $sql="select id,name from companies";
							  $comp=$con->prepare($sql);
							  $comp->execute();
							  if( $comp->rowcount())
							  {
								  foreach($comp->fetchall() as $row )
								  {
								  $id=$row["id"];
								  $name=$row["name"];
								 echo"<option value='$id'>$name</option>";
								  }
							  }
							  ?>
							</select>
                        </div>			
				    <div class="form-group mb-3">
                    <label
                      for="ingredients" > المكونــات
				    </label>
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="3"
					  name="ingredients"
					  id="ingredients"
                    ></textarea>
                  </div>
				   <div class="row">
                      <div class="form-group mb-6 col-xs-12 col-sm-6">
                          <label
                            for="power"
                            >القوة
                          </label>
                          <input
                            id="power"
                            name="power"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
						 />
						</div>
					<div class="form-group mb-6 col-xs-12 col-sm-6">
                          <label
                            for="size"
                            >الحجم
                          </label>
                          <input
                            id="size"
                            name="size"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
						</div>		
                       </div>		  
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="category"> فئة المنتج</label >
						  <?php if(isset($errors["category"])) echo $errors["category"]; ?>
							<select 
							class="custom-select tm-select-accounts form-control validate"
							name="category"
							id="category" >
							<option value='Medicin'>Medicin</option>
							<option value='Cosmetic' >Cosmetic</option>
							<option value='Medical Equipment'>Medical Equipment</option>
							<option value='Other'>Other</option>
							</select>
                        </div> 
						<div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="product_type">نوع المنتج</label >
						 <input
                            id="product_type"
                            name="product_type"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />	
                        </div>
				  </div>
				</div>         
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
			  <div class="col-xl-8 col-lg-8 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
				 <div class="form-group mb-3"><br>
                 <label for="logo"> الصـــورة 
                  </label><br/>
                    <?php if(isset($errors['imgname'])) echo $errors["imgname"] ?>
					<?php if(isset($errors['imgtype'])) echo $errors["imgtype"] ?>
					<?php if(isset($errors['imgsize'])) echo $errors["imgsize"] ?>
				  </div>
                  <img src="images/icons/camadd1.jpg" alt="صورة المنتج" class="img-fluid d-block mx-auto" style="border:2px double gold; border-radius:50px;"/>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" name="img1" style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="إضافة صورة"
					style="border-radius:50px;"
                    onclick="document.getElementById('fileInput').click();"
                  />
					</div>
				</div>
			<div class="col-xl-8 col-lg-8 col-md-12 mx-auto mb-4">
                <div class="custom-file mt-3 mb-3">
                  <input id="image2" type="file" name="img2" multiple style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="إضافة صور اضافية"
					style="border-radius:50px;"
                    onclick="document.getElementById('image2').click();"
                  />
				<?php if(isset($Merrors['imgtype'])) echo $Merrors["imgtype"] ?>
				<?php if(isset($Merrors['imgsize'])) echo $Merrors["imgsize"] ?>
				</div>
			</div>
          </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary btn-block text-uppercase" name="add-product" value="إضافة المنتج"  style="border-radius:50px;"/>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
	
<script>
//==========  changeLanguage function ===============
function changeLanguage(lang){
		var langRq;
		if(window.XMLHttpRequest)          // chrom firefox safari ie+7
			 langRq= new XMLHttpRequest();
		else      // ie -6
			 langRq= new ActiveXObject("Microsoft.XMLHTTP");
		langRq.onreadystatechange = function(){
		if(this.readyState ===4 && this.status === 200){
			var res =this.responseText;
			if(res==="yes"){
				location.reload(true);
			}
		}
	}; //end of onreadystatechange function
	langRq.open("POST","login-control.php",true);
	langRq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	langRq.send("language="+lang);
	
	
}// end of the main function (changeLanguage)

</script>
<?php
 include_once("footer.php");
 ?>