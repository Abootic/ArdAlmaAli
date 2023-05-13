<?php include("control-header.php");
require_once("admin/secFunction.php");
$srch="%%";
	if(isset($_POST['find'])){
		Sanitize($_POST);
			$srch="%".$_POST['find']."%";
	}
	else{
		$srch="%";
	}

if(isset($_GET['action'],$_GET['id']))
				  {
					SanitizeGet($_GET);
					$_GET["id"]=decript_id($_GET["id"]);
					if(is_numeric($_GET["id"]) and ($_SESSION["admin_role"]==1 or $_SESSION["admin_role"]==2)){ 
					 switch($_GET['action']) 
					 {
						 case "stop":
						 $sql="update products set state=0 where id=:id";
						 $q=$con->prepare($sql);
						 $q->execute(array("id"=>$_GET['id']));
						 if($q->rowcount()){
							   $errArr['err']="<h4 class='alert alert-success'>تم الايقاف</h4>";

						 }
						  else{
							   $errArr['err']="<h4 class='alert alert-danger'>فشل</h4>";

						  }
						 break;
						 case "active":
						 $sql="update products set state=1 where id=:id";
						 $q=$con->prepare($sql);
						 $q->execute(array("id"=>$_GET['id']));
						 if($q->rowcount()){
						  $errArr['err']="<h4 class='alert alert-success'>تم التفعيل</h4>";
						 }
						  else{
						  $errArr['err']="<h4 class='alert alert-danger'>فشل</h4>";
						  }
						 break;
						 case "delete":
						 $sql="update products set state=2 where id=:id";
						 $q=$con->prepare($sql);
						 $q->execute(array("id"=>$_GET['id']));
						 if($q->rowcount()){
								$errArr['err']="<h4 class='alert alert-success'>تم الحذف</h4>";
						 }
						  else{
							$errArr['err']="<h4 class='alert alert-danger'>فشل</h4>";
						  }
						 break;
						 default:
						 echo"ERROR";
						 break;
					 }
				  }
				  else{
					$errArr['err']="<h4 class='alert alert-danger'>ليس لديك الصلاحيات لإجراء هذه العملية</h4>";
				
				 }
				}
				 
							 ?>
		
<!--=================================================================================================================-->
            <!-- container -->
			<div class="container" dir="rtl" align="right">
        <!-- row -->
        <div class="row tm-content-row">		
			<div class="col-12">
                <a class="btn btn-primary btn-block text-uppercase" href="add-products.php" style="border-radius:50px;">إضافة منتج جديد </a>
				<br><br>
		    </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="col-12 tm-block-col" dir="rtl" algin="right">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
					 <div align="center" class="col-12">
					 <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
                        <h2 class="tm-block-title"  >جميع المنتجات </h2>
						</div>
						<form action="" method="POST" align="right">
					 <label style="color:white;">بحث بالإسم عن منتج:  </label>
					 <input class="validate" type="text" name="find" />
					 <input class="validate" type="submit" name="search" value="بـحـث" />
					 </form></br>
						
						<table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">الصورة</th>
                                    <th scope="col">رقم المنتج</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الفئة</th>
                                    <th scope="col">النوع</th>
                                    <th scope="col">القوة</th>
                                    <th scope="col">الحجم</th>
                                    <th scope="col">الوكالة</th>
                                    <th scope="col">تاريخ الاضافة</th>
                                    <th scope="col">اخر تعديل</th>
                                    <th scope="col">الادمن</th>
                                </tr>
                            </thead>
<!--==========================================================================================================================================-->
                            <tbody>
				<?php
				$sql="select id,name,img1,category,product_type,power,company,size,add_date,last_change,admin,state 
				from products where state !=2 and name like :srch order by add_date desc";//get product from database
				$q=$con->prepare($sql);
				$q->execute(array("srch"=>$srch));
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id']; 					// product Id
						$id1=encript_id($id);               // encripted_id
						$name=$row['name'];				// product Name
						$category=$row['category'];			// product category
						$product_type=$row['product_type'];		// product type 
						$power=$row['power']; 				// product power
						$size=$row['size']; 				// product size
						$company=$row['company'];				// product company
						$add_date=$row['add_date'];			// product added date
						$last_change=$row['last_change'];	// product last_change
						$admin=$row['admin'];				// admin How added the product
						$state=$row['state'];				// product state
						$last_change=calculateDate($last_change);
						$add_date=calculateDate($add_date);
						echo"<tr style='border-top: 4px double white;'>
									<td> <img src='images/$img1'  width='60px'  height='60px' style='border:1px double white; border-radius:50%;' /> </td>
									<td><b>$id </b> </td>
									<td><b>$name </b> </td>
									<td><b>$category </b> </td>
									<td><b>$product_type </b> </td>
									<td><b>$power </b> </td>
									<td><b>$size </b> </td>";
								$sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$name= $row["name"];
								}
											echo"<td><b>$name </b> </td>";
											echo"<td><b>$add_date </b> </td>
											<td><b>$last_change </b> </td>
											<td><b>$admin 	</b> </td>
											";
												echo "<tr>";
												
//======================================================= State switch control =======================================================================
									switch($state){
										case 0 : echo "  <td><a href='?action=active&id=$id1'><button class='btn-success'>تفعيل</button> </a> </td>";
										echo" <td><a href='update-products.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
										echo" <td><a onclick='deleteChk($id)'><span id='$id' style='display:none'>$id1</span><button class='btn-danger'>حذف</button> </a> </td>";
											break;
										case 1 : echo "  <td><a href='?action=stop&id=$id1'><button class='btn-warning'>إيقاف</button> </a> </td>";
											echo" <td><a href='update-products.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
											echo" <td><a onclick='deleteChk($id)'><span id='$id' style='display:none'>$id1</span><button class='btn-danger'>حذف</button> </a> </td>";
											break;
										case 2 : break;
									}
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo"  </tr>";
							}
						}
						?>
						 
										 </tbody>
								</table>
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
	langRq.open("POST","../store/login-control.php",true);
	langRq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	langRq.send("language="+lang);
	
	
}// end of the main function (changeLanguage)
</script>

<?php
 include_once("footer.php");
 ?>