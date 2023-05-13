<?php include_once("header.php");
require_once("../control-panel/admin/secFunction.php");

?>
<?php
if($chLang=='eng'){
	$lang=array(
	"categ"=>'Categories', "all"=>'All Products', "med"=>'Medicin',"cost"=>'Cosmetics',
	"medEq"=>'Medical Equipment',  "other"=>'Others', "prods"=>'PRODUCTS',
    "web"=>'Website:', "phone"=>'Phone:', "email"=>'Email:', "fb"=>'Facebook:', "loc"=>'Location:',
	"other"=>'Others',"name"=>"Name","catgry"=>"Category","comp"=>'Brand'
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
        "categ"=>'الفئات', "all"=>'كل المنتجات', "med"=>'أدوية',"cost"=>'أدوات تجميل',
        "medEq"=>'معدات طبية',  "other"=>'أخرى', "prods"=>'المنتجـات',
        "web"=>'موقع الويب:', "phone"=>'الهاتف:', "email"=>'البريد الإلكتروني:', "fb"=>'الفيسبوك:', "loc"=>'الموقع:',"other"=>'أخرى',"name"=>"الاسم","catgry"=>"الفئة","comp"=>'الوكيل'
        );
} // end of else
?>
<br>
<br>
    <!-- Open Content -->
    <section class="">
        <div class="container pb-0">
            <div class="row justify-content-center">
                <?php
				if(isset($_GET['id'])){
					SanitizeGet($_GET);
				$_GET["id"]=decript_id($_GET["id"]);
				$sql="select id, name,logo,email,website,facebook_link,location,phone
				 from companies where state =1 and  id=:id";//get brand from database
				$q=$con->prepare($sql);
				$q->execute(array("id"=>@$_GET['id']));
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
                        $id=$row['id']; 	
						$logo=$row['logo'];					// company image1
						$name=$row['name'];					// company Name
						$email=$row['email'];	// company email
						$website=$row['website'];	// company website 
						$phone=$row['phone'];			// company tel number
						$facebook=$row['facebook_link'];	// company facebook page
						$location=$row['location']; 				// geographical location
				?>			
				
               
                <!-- col end -->
                <div class="col-lg-6 mt-5" >
                    <div class="card">
                        <div class="card-body">
						<?php echo"   <img class='card-img img-fluid' src='../control-panel/images/$logo' style='width:100%; height:300px;max-height:295px;'>";?>
                            <h1 class="h2" align="center"><?php echo $name?></h1>                           
                             <ul class="list-inline">
                              

                                <li class="list-inline-item">
                                    <h5><?php echo $lang["web"]?></h5>
                                </li>
								<li class="list-inline-item">
								 <p ><a class="dft-link-style" href="<?php echo $website; ?>"><?php echo $website; ?></a></p>
                                </li>
                                <br>

                                 <?php if($phone!=null){?> <li class="list-inline-item">
                                    <h5><?php echo $lang["phone"]?></h5>
                                </li>
								<li class="list-inline-item">
							        <p ><a class="dft-link-style" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                                </li>
                                <br><?php }?>

                                <li class="list-inline-item">
                                    <h5><?php echo $lang["loc"]?></h5>
                                </li>
								<li class="list-inline-item">
								 <p ><?php echo $location; ?></p>
                                </li>
                                <br>

                                <li class="list-inline-item">
                                    <h5><?php echo $lang["fb"]?></h5>
                                </li>
								<li class="list-inline-item">
								<p ><a class="dft-link-style" href="<?php echo $facebook; ?>"><?php echo $facebook; ?></a></p>
                                </li>
                                <br>
                               
                                <li class="list-inline-item">
                                    <h5><?php echo $lang["email"]?></h5>
                                </li>
								<li class="list-inline-item">
                                <p ><a class="dft-link-style" href="mailto:<?php echo $email; ?>" ><?php echo $email; ?></a></p>
                                </li>
                            </ul>
							
                           
                        </div>
                    </div>
				</div><?php 
					}//END foreach
				}// end if rowcount
				
			}//end if isset
			?>
            </div>
        </div>
    </section>
    <!-- Close Content -->
<br>
<br><br>
    <!-- Start Content #################################################################################################################-->
   <div class="container py-0">
        <div class="row mb-2">
           
            <div class="col-lg-12 flt" align="center">
                 <h2 align="center"><?php echo $lang["prods"]?></h2>
                <button class="btn  filter-button filter-active" data-filter="all"><?php echo $lang["all"]?></button>
               <button class="btn  filter-button" data-filter="hdpe"><?php echo $lang["med"]?></button>
                <button class="btn  filter-button" data-filter="sprinkle"><?php echo $lang["cost"]?></button>
                <button class="btn  filter-button" data-filter="spray"><?php echo $lang["medEq"]?></button>
                <button class="btn  filter-button" data-filter="irrigation"><?php echo $lang["other"]?></button>
            </div>
        </div>
        <br>
        
         <div class="row mt-2">
		 
              <!----------------   Start  Medicin  products ------------------------------------------------ -->
				<?php
				
				$sql="select id,name,img1,category,company  from products 
				where   state =1  and category=:category and company=:company";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Medicin","company"=>$_GET['id']]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
						$id1=encript_id($id);               // encripted_id
						?>
						
		<div class="gallery_product col-md-3 filter hdpe">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>
                        
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo $lang['name'].": ". $name;?></h6></a>
                        <h6><?php echo $lang['catgry'].": ".$category?></h6>
                       
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>".$lang['comp'].": ".$names."</h6>";
								}
								
								echo"  
								</div>
								</div>
								</div>
			";
								}
								}
				
								?>
								<!----------------   Start Cosmetic products ------------------------------------------------ -->
				<?php
				$sql="select id,name,img1,category,company  from products 
				where   state =1  and category=:category  and company=:company";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Cosmetic","company"=>$_GET['id']]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
                        $id1=encript_id($id);     
						
				
						?>
			            
		<div class="gallery_product col-md-3 filter sprinkle">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo  $lang['name'].": ".$name;?></h6></a>
						<h6><?php echo $lang['catgry'].": ".$category?></h6>
                           
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>".$lang['comp'].": ".$names."</h6>";
								}
								echo"  
								</div>
								</div>
								</div>
			";
								}
								}
								?>
							<!----------------   Start Medical Equipment products ------------------------------------------------ -->
				<?php
				$sql="select id,name,img1,category,company  from products 
				where   state =1  and category=:category and company=:company";//get product from database
				$q=$con->prepare($sql);
				$q->execute(array("category"=>"Medical Equipment","company"=>$_GET['id']));
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
                        $id1=encript_id($id);     
						
				
						?>
			            
		<div class="gallery_product col-md-3 filter spray">
            <div class="card mb-4 product-wap rounded-0">
                     <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo $lang['name'].": ".$name;?></h6></a>
                      
                            <h6><?php echo $lang['catgry'].": ".$category?></h6>
                     
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>".$lang['comp'].": ".$names."</h6>";
								}
								echo"  
								</div>
								</div>
								</div>
			";
								}
								}
								?>
							<!----------------   Start  Others  products ------------------------------------------------ -->
				<?php
				$sql="select id,name,img1,category,company  from products 
				where   state =1  and category=:category and company=:company";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Other","company"=>$_GET["id"]]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
                        $id1=encript_id($id);     
						
				
						?>
			            
			<div class="gallery_product col-md-3 filter irrigation">            
				<div class="card mb-4 product-wap rounded-0">
                   <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo $lang['name'].": ".$name;?></h6></a>
                        <h6><?php echo $lang['catgry'].": ".$category?></h6>
                            
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>".$lang['comp'].": ".$names."</h6>";
								}
								echo"  
								</div>
								</div>
								</div>
			";
								}
								}
								?>
			
           </div>
				<?php //}?>  
     
    </div>
    <!-- End Content -->
        
    
<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>


<!-- script for header -->
<script type="text/javascript">
    window.addEventListener('scroll',function(){
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
        
    });

    function toggleMenu(){
        const menuToggle = document.querySelector('.menuToggle');
        const navigation = document.querySelector('.navigation');
        navigation.classList.toggle('active');
        menuToggle.classList.toggle('active');
    }
</script>


<script>

$(document).ready(function(){

$(".filter-button").click(function(){
    $(".filter-button").removeClass('filter-active');
    $(this).addClass('filter-active');
    var value = $(this).attr('data-filter');
    
    if(value == "all")
    {
        //$('.filter').removeClass('hidden');
        $('.filter').show('1000');
    }
    else
    {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.'+value).hide('3000');
        $('.filter').filter('.'+value).show('3000');
        
    }
});

if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});

</script>
<?php include_once("footer.php"); ?>