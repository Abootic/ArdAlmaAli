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
<br><br>
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
              <!--=============================================  Start  Medicin  products ============================================================== -->
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
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><span class='h6'><?php echo $lang['name'].": ";?></span><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $name;?></span></a>
                        <h6
                        <span class='h6'><?php echo $lang['catgry'].": "?></span>
                       <span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo  $category;?></span></h6>
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>" .                         "<span class='h6'>". $lang['comp'].": "."</span>".
                       "<span class='p' style='font-size:1.1rem;font-weight: 300 !important'>".  $names.": "."</span>"."</h6>";
								}
								
								echo"  
								</div>
								</div>
								</div>
			";
					}
				}
?>
<!--=====================================================   Start Cosmetic products ======================================================= -->
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
						$id1=encript_id($id);               // encripted_id
						?>
			            
		<div class="gallery_product col-md-3 filter sprinkle">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo  $lang['name'].": ";?><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $name;?></span></h6></a>
						<h6><?php echo $lang['catgry'].": "?><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $category;?></span></h6>
                           
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>".
					 "<span class='h6'>". $lang['comp'].": "."</span>".
                       "<span class='p' style='font-size:1.1rem;font-weight: 300 !important'>".  $names."</span>"."</h6>";
								}
								echo"  
								</div>
								</div>
								</div>
			";
				}
			}
?>
<!--========================================   Start Medical Equipment products ====================================================== -->
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
						$id1=encript_id($id);               // encripted_id
						?>
			            
		<div class="gallery_product col-md-3 filter spray">
            <div class="card mb-4 product-wap rounded-0">
                     <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo $lang['name'].": "?><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $name;?></span></h6></a>
                      
                            <h6><?php echo $lang['catgry'].": "?><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $category;?></span></h6>
                     
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>". "<span class='h6'>". $lang['comp'].": "."</span>".
                       "<span class='p' style='font-size:1.1rem;font-weight: 300 !important'>".  $names."</span>"."</h6>";
								}
								echo"  
								</div>
								</div>
								</div>
			";
								}
								}
								?>
<!-- =============================================  Start  Others  products ========================================================================= -->
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
						$id1=encript_id($id);               // encripted_id
		?>
			            
			<div class="gallery_product col-md-3 filter irrigation">           
				<div class="card mb-4 product-wap rounded-0">
                   <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo $lang['name'].": "?><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $name?></span></h6></a>
                        <h6><?php echo $lang['catgry'].": "?><span class='p' style="font-size:1.1rem;font-weight: 300 !important"><?php echo $category;?></span></h6>
                            
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								echo "<h6>". "<span class='h6'>". $lang['comp'].": "."</span>".
                       "<span class='p' style='font-size:1.1rem;font-weight: 300 !important'>".  $names."</span>"."</h6>";
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

<?php require_once("footer.php")?>
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
