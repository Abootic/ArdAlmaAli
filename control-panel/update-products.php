<?php include("control-header.php");
 require_once("admin/secFunction.php");
 ?>
<?php
 #Start Validation for the products data
	 if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["prodUpdate"]))
	 {
		 //Product NAME Validation
			    Sanitize($_POST);
			if(empty($_POST['name']))
	    	$errors['name']="<span style='color:red'><b>ادخل اسم المنتج</b></span>";
//==========================================product company Validation=========================================
			if(empty($_POST['company']))
	    	$errors['company']="<span style='color:red'><b>ادخل الوكالة المصنعة   </b></span>";
//===========================================product Category Validation========================================
			if(empty($_POST['category']))
	    	$errors['category']="<span style='color:red'><b>ادخل فئة المنتج </b></span>";
//===========================================check if there is no error in enntering data of products===========
 		if(empty($errors))        			 // start if 1      							
		{ 											
				 $sql="update  products set name=:name,description=:description,ingredients=:ingredients,product_type=:product_type,category=:category,size=:size,power=:power,company=:company where id=:id";
				 $q=$con->prepare($sql);
				 $q->execute(array("name"=>$_POST["name"],"description"=>$_POST["description"],"ingredients"=>$_POST["ingredients"],
				 "product_type"=>$_POST["product_type"], "category"=>$_POST["category"],"size"=>$_POST["size"], "power"=>$_POST["power"],
				 "company"=>$_POST["company"],"id"=>decript_id($_GET['id'])));
 				  if($q->rowcount()) 
				  {
					$errArr['err']="<h4 class='alert alert-success'>تم التعديل بنجاح</h4>";	  
				  }   
				  else{
					$errArr['err']="<h4 class='alert alert-danger'>يوجد خطأ في المدخلات'</h4>";
				  }
			}//end if  1
				else
					 $errArr['err']="<h4 class='alert alert-danger'> لم يتم التعديل! تأكد من صحة البيانات</h4>"; 
	} //end server form if
//===========================================Start image one form validation=================================================
	 
	if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["updateImage1"]))
	{
	////image1 Validation
	Sanitize($_POST);
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
					$M1errors['imgsize']="<span style='color:red'><b>حجم الصورة كبير  اكبر حجم 1 ميجا</b></span>";
					}
			}
			else{
				$M1errors['imgtype']="<span style='color:red'><b>نوع الصورة غير صحيح</b></span>";     
			}
		}
		else 
			{
			$M1errors['imgname']="<span style='color:red'><b>ادخل صورة</b></span>";
			}
//=====================================================================This is if you want only update image one ====================================================
		if(empty($M1errors)) // start if
		{
			$sql="update products set img1=:img1 where id=:id";
			$q=$con->prepare($sql);
			$q->execute(array("img1"=>$img1,"id"=>decript_id($_GET["id"])));
			if($q->rowcount())
				$errArr['err']="<h4 class='alert alert-success'>تم تعديل الصـــورة بنجاح</h4>";
			else
				$errArr['err']="<h4 class='alert alert-danger'> لم يتم التعديل! تأكد من صحة البيانات</h4>";
		} //// end if 
		else
				$errArr['err']="<h4 class='alert alert-danger'>تاكد من اختيار الصورة ثم اعد المحاولة</h4>";					 
	} /// end server image1 form if
//=============================================================Start image two form validation======================================
	
	 if($_SERVER["REQUEST_METHOD"]="POST" and isset($_POST["updateImage2"]))
	 {
		Sanitize($_POST);
 		//image2 Validation		
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
//==========================================this if want only update image two==========================================
			if(empty($Merrors)) // start if 
			{
				$sql="update products set img2=:img2 where id=:id";
				$q=$con->prepare($sql);
				$q->execute(array("img2"=>$img2,"id"=>decript_id($_GET["id"])));
				if($q->rowcount())
					$errArr['err']="<h4 class='alert alert-success'>تم تعديل الصـــورة بنجاح</h4>";
				else
					$errArr['err']="<h4 class='alert alert-danger'> لم يتم التعديل! تأكد من صحة البيانات</h4>";
			}// end if
			else 
					$errArr['err']="<h4 class='alert alert-danger'>تاكد من اختيار الصورة ثم اعد المحاولة</h4>";		
	 }// end server image two form if
//========================================================================================================================
	 ?>
<?php  
    if(isset($_GET)) //start if 1
    {
        Sanitize($_GET);  
		$_GET["id"]=decript_id($_GET["id"]);                             // decript the  id that sent in the action 
        if(isset($_GET["action"]) and $_GET["action"]=="update") //start if 2
        {
          if(isset($_GET["id"]) and is_numeric($_GET["id"]))	//start if 3
          {
				$sql="select id,name,img1,img2,category,product_type,power,ingredients,
				description,company,size,add_date,last_change,admin,state 
				from products where id=:id";				//get product from database
				$q=$con->prepare($sql);
				$q->execute(array("id"=>$_GET["id"]));
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$img2=$row['img2'];					// product images
						$id=$row['id']; 					// product Id
						$name=$row['name'];				// product Name
						$description=$row['description'];	// product description
						$ingredients=$row['ingredients'];	// product ingredients
						$category=$row['category'];			// product category
						$product_type=$row['product_type'];		// product type 
						$power=$row['power']; 				// product power
						$size=$row['size']; 				// product size
						$company=$row['company'];				// product company
						
  ?>

<div style="margin:2px" class="row tm-content-row"  dir="rtl" align="right">
     <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
		  <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
            <div class="row">
              <div align="center" class="col-12">
                <h1 class="tm-block-title d-inline-block"  >تعديل منتج</h1>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="#" method="post" name="mainForm" enctype="multipart/form-data" class="tm-edit-product-form">
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
					  value="<?php echo $name?>"
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
                      
                    > <?php echo $description ; ?></textarea>
                  </div>
                 
				    <div class="form-group mb-3">
                          <label for="company">الوكالة</label ><br>
							<?php if(isset($errors["company"])) echo $errors["company"]; ?>
							<select 
							class="custom-select tm-select-accounts validate"
							name="company"
							id="company" >
							<?php
							  $sql="select name, id from companies";
							  $q=$con->prepare($sql);
							  $q->execute();
							  if( $q->rowcount())		
							  {
								  $sl="aa";
								  foreach($q->fetchall() as $row )
								  {
								  $id=$row["id"];
								  $name=$row["name"];
								  if($id==$company) 		// this  if for the id of the company that came from the select if it equal for id do selected in the option  
									$sl="selected";
								  else
								 $sl="";
								  echo"<option value='$id' $sl> $name </option>";}
							  }
							  ?>
							</select>
                        </div>
					
				    <div class="form-group mb-3">
                    <label
                      for="ingredient"
                      >  المكونــات 
					  </label>
                    <textarea                    
                      class="form-control validate tm-small prod"
                      rows="3"
					  name="ingredients"
					  id="ingredient"
                    > <?php echo $ingredients ; ?></textarea>
                  </div>
				  
				   <div class="row">
				
                      <div class="form-group mb-6 col-xs-12 col-sm-6">
                          <label
                            for="power"
                            >القوة
                          </label>
                          <input
                            id="ingredients"
                            name="power"
                            type="text"
                            class="form-control validate prod"
                            data-large-mode="true"
							value="<?php echo $power ; ?>"
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
                            class="form-control validate prod"
                            data-large-mode="true"
							value="<?php  echo $size?>"
                          />
						   </div>
                       </div>
						  
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="category"> فئة المنتج</label ><br>
						  <?php if(isset($errors["category"])) echo $errors["category"]; ?>
							<select 
							class="custom-select tm-select-accounts validate prod"
							name="category"
							id="category" >
							<?php  // this if the select retrive the category Medicin
							if($category=="Medicin") {			
							echo"
								<option value='Medicin' >Medicin</option>
								<option value='Cosmetic' >Cosmetic</option>
								<option value='Medical Equipment'>Medical Equipment</option>
								<option value='Other'>Other</option>";
							}
																// this if the select retrive the category Cosmetic
							 else if($category=="Cosmetic") {
							echo"
								<option value='Cosmetic' >Cosmetic</option>
								<option value='Medicin'>Medicin</option>
								<option value='Medical Equipment'>Medical Equipment</option>
								<option value='Other'>Other</option>";
							 }
																// this if the select retrive the category Medical Equipment
							else if($category=="Medical Equipment") {
							echo"
								<option value='Medical Equipment'>Medical Equipment</option>
								<option value='Medicin'>Medicin</option>
								<option value='Cosmetic' >Cosmetic</option>
								<option value='Other'>Other</option>";
							}
															// this if the select retrive the category other
							else if($category=="Other") 
							{
							echo"
								<option value='Other'>Other</option>
								<option value='Medicin'>Medicin</option>
								<option value='Cosmetic' >Cosmetic</option>
								<option value='Medical Equipment'>Medical Equipment</option>
								";
							}
							else{
								
								echo"
								<option value='Medicin'>Medicin</option>
								<option value='Cosmetic' >Cosmetic</option>
								<option value='Medical Equipment'>Medical Equipment</option>
								<option value='Other'>Other</option>";
							}
							?> 
							</select>
                        </div>
				
					<div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="product_type">
						  نوع المنتج
						  </label >                        
                          <input
                            id="type"
                            name="product_type"
                            type="text"
                            class="form-control validate prod"
                            data-large-mode="true"
							value="<?php  echo $product_type?>"
                          />
						   </div>
                        </div>
						<br><br><br>
			 <div class="form-group mb-3">
			 <input type="submit" class="btn btn-primary btn-block text-uppercase" name="prodUpdate" value="تعديل منتج" style="border-radius:50px;"/>
              </div>
           </form><!--  end main form for update product data-->
          </div>
		<div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
<!-- ============================== Start update image one form=================================================================-->	
			<form action="#" method="post" name="img1Form" enctype="multipart/form-data" class="tm-edit-product-form">
			  <div class="col-xl-8 col-lg-8 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
				 <div class="form-group mb-3">
                <br> <label for="logo"> الصـــورة 
                  </label><br/>
                    <?php if(isset($M1errors['imgname'])) echo $M1errors["imgname"] ?>
					<?php if(isset($M1errors['imgtype'])) echo $M1errors["imgtype"] ?>
					<?php if(isset($M1errors['imgsize'])) echo $M1errors["imgsize"] ?>
				  </div>
                  <img  src="images/<?php echo $img1;?>" alt="صورة المنتج" class="img-fluid d-block mx-auto"  onclick="document.getElementById('fileInput').click();" style="border:2px double gold; border-radius:50px;width:100%;height:300px;"/>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" name="img1" style="display:none;" />
                  <input
                    type="submit"
					name="updateImage1"
                    class="btn btn-primary btn-block mx-auto"
                    value="تعديل الصـــورة"
					style="border-radius:50px;"
                  />
					</div>
				</div>
				</form><!-- end image 1 form update-->
				
<!-- ============================== Start update image two form=================================================================-->	

				<form action="#" method="post" name="img2Form" enctype="multipart/form-data" class="tm-edit-product-form">
				<div class="col-xl-8 col-lg-8 col-md-12 mx-auto mb-4">
				<div class="tm-product-img-edit mx-auto">
				 <div class="form-group mb-3">
                <br> <label for="logo">الصورة الاضافية 
                  </label><br/>
					<?php if(isset($Merrors['imgname'])) echo $Merrors['imgname']?>
					<?php if(isset($Merrors['imgtype'])) echo $Merrors["imgtype"] ?>
					<?php if(isset($Merrors['imgsize'])) echo $Merrors["imgsize"] ?>
				  </div>
				  <?php if($img2==null) {?>
				     <img src="images/icons/camadd1.jpg" alt="صورة المنتج" class="img-fluid d-block mx-auto"  onclick="document.getElementById('image2').click();" style="border:2px double gold; border-radius:50px;width:100%;height:300px;"/>
				  <?php } else{?>
                  <img src="images/<?php echo $img2;?>" alt="صورة المنتج" class="img-fluid d-block mx-auto"  onclick="document.getElementById('image2').click();" style="border:2px double gold; border-radius:50px;width:100%;height:300px;"/>
				  <?php }?>
			 </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="image2" type="file" name="img2" multiple style="display:none;" />
                  <input
                    type="submit"
					name="updateImage2"
                    class="btn btn-primary btn-block mx-auto"
                    value="تعديل الصورة الاضافية"
					style="border-radius:50px;"
                  />
				</div>
			</div>
		</form><!-- end image 1 form update-->
	</div>
		<!-- ====================================================================================================================-->
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
<?php
                  } // end if rowcount
                }	// end foreach
          }		// end if 3
        }	// end if 2
    }// end if 1
?>
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