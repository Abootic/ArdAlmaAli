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
        
        
        <div class="row">
            
            
            
                          <!--=============================================  Start  Medicin  products ============================================================== -->
				<?php
				$sql="select id,name,img1,category,company  from products where   state =1  and category=:category ";//get product from database
				//$sql="select p.id,p.name,p.img1,p.category,p.company, c.state  from products p, compaonies c where   p.state =1  and p.category=:category and c.state=1";
				
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
		$sql="select id, name from companies where id=:id";
						$q=$con->prepare($sql);
						$q->execute(array("id"=>$company));
						if($q->rowcount()){
						    $compData=$q->fetch();
						   $compId=$compData["id"];
						   $compName=$compData["name"];
						}
						else{
						    $compName="";
						    $compId="";
						}
						?>
						
						
						
						
						
            <div class="col-md-4 col-sm-12  px-4 mt-5 text-center  filter hdpe">
                <img src="../control-panel/images/<?php echo $img1;?>" class="  shadow-sm img-fluid" style ="" alt="Responsive"  >
                <h3 class="h3 text-center pt-2"><?php echo $name;?></h3>
                <p class="p px-2"style=""><?php echo $compName ?></p>
                <a class="btn btn-success text-center pt-2" href='<?php echo "shop-single.php?idd=$id1";?>'>view details</a>
                
            </div>
            <?php }}?>
            
            
            
            <!--=====================================================   Start Cosmetic products ======================================================= -->
            	<?php
				$sql="select id,name,img1,category,company from products where   state =1  and category=:category ";//get product from database
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
						$id1=encript_id($id);
						
						$sql="select id, name from companies where id=:id";
						$q=$con->prepare($sql);
						$q->execute(array("id"=>$company));
						if($q->rowcount()){
						    $compData=$q->fetch();
						   $compId=$compData["id"];
						   $compName=$compData["name"];
						}
						else{
						    $compName="";
						    $compId="";
						}
						?>
						
						
						
						
						
            <div class="col-md-4 col-sm-12  px-4 mt-5 text-center  filter sprinkle">
                <img src="../control-panel/images/<?php echo $img1;?>" class="  shadow-sm " width="100%" height="60%" alt="Responsive"  >
                <h3 class="h3 text-center pt-2"><?php echo $name;?></h3>
                <p class="p px-2"><?php echo $compName ?></p>
                <a class="btn btn-success text-center pt-2" href='<?php echo "shop-single.php?idd=$id1";?>'>view details</a>
                
            </div>
            <?php }}?>
            
            
            
            
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
						$sql="select id, name from companies where id=:id";
						$q=$con->prepare($sql);
						$q->execute(array("id"=>$company));
						if($q->rowcount()){
						    $compData=$q->fetch();
						   $compId=$compData["id"];
						   $compName=$compData["name"];
						}
						else{
						    $compName="";
						    $compId="";
						}
						?>
						
						
						
						
						
            <div class="col-md-4 col-sm-12  px-4 mt-5 text-center  filter spray">
                <img src="../control-panel/images/<?php echo $img1;?>" class="  shadow-sm " width="100%" height="60%" alt="Responsive"  >
                <h3 class="h3 text-center pt-2"><?php echo $name;?></h3>
                <p class="p px-2"><?php echo $compName ?></p>
                <a class="btn btn-success text-center pt-2" href='<?php echo "shop-single.php?idd=$id1";?>'>view details</a>
                
            </div>
            <?php }} ?>
            
            
            
            
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
						
						
						
						
						
            <div class="col-md-4 col-sm-12  px-4 mt-5 text-center filter  irrigation">
                <img src="../control-panel/images/<?php echo $img1;?>" class="  shadow-sm " width="100%" height="60%" alt="Responsive"  >
                <h3 class="h3 text-center pt-2"><?php echo $name;?></h3>
                <p class="p px-2"><?php echo $company ?></p>
                <a class="btn btn-success text-center pt-2" href='<?php echo "shop-single.php?idd=$id1";?>'>view details</a>
                
            </div>
            <?php }} ?>
            
            
        </div>
    </div>
         
         
<?php require_once("footer.php")?>
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
