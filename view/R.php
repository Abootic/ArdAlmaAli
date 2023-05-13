<?php include_once("header.php");

require_once("../control-panel/admin/secFunction.php");

?>
<?php
if($chLang=='eng'){
	$lang=array(
	"categ"=>'Categories', "all"=>'All Products', "med"=>'Medicin',"cost"=>'Cosmetics',
	"medEq"=>'Medical Equipment',  "other"=>'Others',"name"=>"Name","catgry"=>"Category","comp"=>'Brand'
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
        "categ"=>'الفئات', "all"=>'كل المنتجات', "med"=>'أدوية',"cost"=>'أدوات تجميل',
        "medEq"=>'معدات طبية',  "other"=>'أخرى',"name"=>"الاسم","catgry"=>"الفئة","comp"=>'الوكيل'
        );
} // end of else
?>



  <!-- Open Content -->
    <br><br><br>
                <?php
				if(isset($_GET['idd'])){
				
				$sql="select *
				 from products where state = 1 and  id=:id";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["id"=>@$_GET['idd']]);
				if($q->rowcount())
				{
				    
			
					foreach($q->fetchall() as $row)
					{
											// product images
                        $id=$row['id']; 	
						$img1=$row['img1'];					// product image1
						$img2=$row['img2'];					// product image2
						$name=$row['name'];					// product Name
						$description=$row['description'];	// product description
						$ingredients=$row['ingredients'];	// product ingredients
						$category=$row['category'];			// product category
						$product_type=$row['product_type'];	// product type 
						$power=$row['power']; 				// product power
						$size=$row['size']; 				// product power
                        $company=$row['company'];			// product company
                        $compid=encript_id($company);			// product company
                        $_SESSION["company"]=$company;
					    
					}
				    
				}
				    
				}
				?>		
				
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../control-panel/images/NajmAldeenAhmedSaeedAli60b04661e315a.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../control-panel/images/NajmAldeenAhmedSaeedAli60b04661e315a.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div


                
                <?php include_once("footer.php");?>