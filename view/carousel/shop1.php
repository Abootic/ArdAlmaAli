<?php include_once("header.php");?>
<?php
if($chLang=='eng'){
	$lang=array(
	"categ"=>'Categories', "all"=>'All Products', "med"=>'Medicin',"cost"=>'Cosmetics',
	"medEq"=>'Medical Equipment',  "other"=>'Others'
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
        "categ"=>'الفئات', "all"=>'كل المنتجات', "med"=>'أدوية',"cost"=>'أدوات تجميل',
        "medEq"=>'معدات طبية',  "other"=>'أخرى'
        );
} // end of else
?>
<br>
<br>

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row mb-2">
            <div class="col-lg-12 flt" align="center">
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
				where   state =1  and category=:category ";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Medicin"]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
						
				
						?>
						
			<div class="gallery_product col-md-3 filter hdpe">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
                               
								<?php echo"<li><a class='btn btn-success text-white mt-2' href='shop-single.php?idd=$id'><i class='far fa-eye'></i></a></li>";?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $name;?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li><?php echo$category?></li>
                            <li class="pt-2">
                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                            </li>
                        </ul>
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo"<p class='text-center mb-0'> $names</p>";
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
				where   state =1  and category=:category ";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Cosmetic"]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
						
				
						?>
			            
		<div class="gallery_product col-md-3 filter sprinkle">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
								<?php echo"<li><a class='btn btn-success text-white mt-2' href='shop-single.php?idd=$id'><i class='far fa-eye'></i></a></li>";?>
                            
							</ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $name;?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li><?php echo$category?></li>
                            <li class="pt-2">
                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                            </li>
                        </ul>
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo"<p class='text-center mb-0'> $names</p>";
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
				where   state =1  and category=:category ";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Medical Equipment"]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
						
				
						?>
			            
		<div class="gallery_product col-md-3 filter spray">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
								<?php echo"<li><a class='btn btn-success text-white mt-2' href='shop-single.php?idd=$id'><i class='far fa-eye'></i></a></li>";?>
                            
							</ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $name;?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li><?php echo$category?></li>
                            <li class="pt-2">
                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                            </li>
                        </ul>
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo"<p class='text-center mb-0'> $names</p>";
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
				where   state =1  and category=:category ";//get product from database
				$q=$con->prepare($sql);
				$q->execute(["category"=>"Other"]);
			
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$img1=$row['img1'];					// product images
						$id=$row['id'];					// product images
						$category=$row['category'];
						$name=$row['name'];				// product Name
						$company=$row['company'];				// product Name
						
				
						?>
			            
			<div class="gallery_product col-md-3 filter irrigation">            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
								<?php echo"<li><a class='btn btn-success text-white mt-2' href='shop-single.php?idd=$id'><i class='far fa-eye'></i></a></li>";?>
                            
							</ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $name;?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li><?php echo$category?></li>
                            <li class="pt-2">
                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                            </li>
                        </ul>
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo"<p class='text-center mb-0'> $names</p>";
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
     
    </div>
    <!-- End Content -->
        <!-- Start Footer -->
        <footer class="bg-success" id="tempaltemo_footer">
            <div class="container">
                
                <div class="row">
    
                    <div class="col-md-6 pt-1">
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo"><img src="assets/img/logo/3.jpg" style="width:250px;height:80px;border-radius:10px;"></h2>
                        <ul class="list-unstyled text-white footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                123 Consectetur at ligula 10660
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="col-md-6 pt-5">
                        <h2 class="h2 text-white border-bottom pb-3 border-light">Further Info</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="#">Home</a></li>
                            <li><a class="text-decoration-none" href="#">About Us</a></li>
                            <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                            
                        </ul>
                    </div>
    
                </div>
    
                <div class="row text-light justify-content-md-center  mb-4">
                    <div class="col-12 mb-3">
                        <div class="w-100 my-3 border-top border-light"></div>
                    </div>
                    <div class="col-md-auto  ">
                        <ul class="list-inline text-left footer-icons">
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-whatsapp fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    
            <div class="w-100 bg-black py-3">
                <div class="container">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="text-left text-light">
                                Copyright &copy; 2021 alabeer pharma 
                                | Designed by <a rel="sponsored" href="" target="_blank">alnajm-techno</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    
        </footer>
        <!-- End Footer -->
    
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
</body>

</html>