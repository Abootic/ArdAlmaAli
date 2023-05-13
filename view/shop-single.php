<?php require_once("header.php");
require_once("../control-panel/admin/secFunction.php");
if($chLang=='eng'){
	$lang=array(
	"prodtype"=>'Product type', "powr"=>'Power', "siz"=>'Size',"desc"=>'Description',
	"ingrd"=>'Ingredients',  "made"=>'Made In',"name"=>"Name","catgry"=>"Category","comp"=>'Brand',"dir"=>'ltr', "align"=>'left'	
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
        "prodtype"=>'النوع', "powr"=>'القوة', "siz"=>'الحجم',"desc"=>'الوصف',
	"ingrd"=>'المكونات',  "made"=>'الصناعة',"name"=>"الاسم","catgry"=>"الفئة","comp"=>'الوكيل',"dir"=>'rtl', "align"=>'right'
        );
} // end of else

?>
    <!-- Open Content -->
    <br><br>
                <?php
				if(isset($_GET['idd'])){
				$decId=decript_id($_GET["idd"]);
				$sql="select *
				 from products where state=1 and  id=:id";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["id"=>$decId]);
				
			
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
                     	$sql="select id, name from companies where id=:id";
						$q=$con->prepare($sql);
						$q->execute(array("id"=>$company));
						if($q->rowcount()){
						    $compData=$q->fetch();
						   $compName=$compData["name"];
						}
						else{
						    $compName="";
						   
						}
                       
                       
                        $compid=encript_id($company);			// product company
                        $_SESSION["company"]=$company;
					    
					}
				    
				}
				    
				}
				?>	
				
<div class ="container">
    <div class="row justify-content-center">
        <div class ="col-lg-8 mt-3 ">
	<div id="carouselExampleIndicators" class="carousel slide mt-3 mb-5 shadow-lg " data-ride="carousel">
  <ol class="carousel-indicators" style="list-style: none; margin-bottom:0; bottom: -50px">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="opacity:1;width: 70px;
            height: 70px;
            background-color: #000;
            position: relative;
            margin: 10px;
            margin-bottom:0;
            border-radius: 50%;
            z-index:100000;">
          <img src="../control-panel/images/<?php echo$img1?>" class=""  alt="..." style="position: absolute;
            width: 100%;
            border-radius: 50%;
            height: 100%;
            top: 0;
            left: 0;">
        
    </li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" 
    style="opacity:1;
    width: 70px;
            height: 70px;
            background-color: #000;
            position: relative;
            margin: 10px;
     
            border-radius: 50%;
            z-index:100000;">
          <img src="../control-panel/images/<?php
      if($img2)
      echo$img2 ; else echo $img1;?>" class="" alt="..." style="position: absolute;
            width: 100%;
            border-radius: 50%;
            height: 100%;
            top: 0;
            left: 0;">
    </li>
    
  </ol>
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="../control-panel/images/<?php echo$img1?>" class="img-fluid d-block w-100 rounded" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../control-panel/images/<?php
      if($img2)
      echo$img2 ; else echo $img1;?>" class="img-fluid d-block w-100 rounded" alt="...">
    </div>
    
    </div>
  
     </div>
    </div>
  </div>
  
  
  <div class ="row ">
      <div class="col shadow-sm my-5 mx-3" style="border:  1px solid #1b75bc">
          <h1 class="h1"><?php echo$name; ?></h1>
          <p class="p"><?php echo  $description ?></p>
          <p><?php echo $ingredients?></p>
          <p><?php echo $compName?></p>
      </div>
  </div>
</div>

    <!-- End Article -->
    <!-- Start Footer -->
<?php require_once("footer.php")?>
    <!-- End Footer -->

    <!-- Start Script -->
