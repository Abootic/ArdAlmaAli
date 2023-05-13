<?php include_once("header.php");

require_once("../control-panel/admin/secFunction.php");

?>
<?php
if($chLang=='eng'){
	$lang=array(
	"categ"=>'Categories', "all"=>'All ', "prod"=>'Products',"comps"=>'Brands',"name"=>"Name","catgry"=>"Category","comp"=>'Brand','srch'=>"no result for your search"
 );
} // end of if
else if($chLang=='ar'){
    $lang=array(
        "categ"=>'الفئات', "all"=>'الكل ', "prod"=>'المنتجات',"comps"=>'الوكلاء',"name"=>"الاسم","catgry"=>"الفئة","comp"=>'الوكيل','srch'=>"لا توجد نتيجة للبحث"
        );
} // end of else
?>
<br><br>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row mb-2">
            <div class="col-lg-12 flt" align="center">
                <button class="btn  filter-button filter-active" data-filter="all"><?php echo $lang["all"]?></button>
               <button class="btn  filter-button" data-filter="hdpe"><?php echo $lang["prod"]?></button>
                <button class="btn  filter-button" data-filter="sprinkle"><?php echo $lang["comps"]?></button>
              
            </div>
        </div>
        <br>
         <div class="row ">
              <!--=============================================  Start  search products ============================================================== -->
				<?php
		if($_SERVER["REQUEST_METHOD"]=="POST")
		 {
					$search=$_POST['search'];
					
							
			if(isset($_POST['find'],$_POST['search'])){
				$sql="select id,name,img1,category,company  from products 
				where name like '%$search%' and state=1   ";//get product from database
				$q=$con->prepare($sql);
				$q->execute();
			
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
						
			<div class="gallery_product col-md-4 filter hdpe">
            <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
					<?php echo"<a  href='shop-single.php?idd=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $img1;?>" style='width:100%; height:18em;'>
						</a>
                        
                    </div>
                    <div class="card-body">
                        <a href=<?php echo"shop-single.php?idd=$id1"?> class="h3 text-decoration-none"><h6><?php echo $lang["name"].": ".$name;?></h6></a>
                           <h6> <?php  echo $lang["catgry"].": ".$category?></h6>
                           
                        <?php $sql="select name from companies where id=:company";
								$q=$con->prepare($sql);
								$q->execute(["company"=>$company]);
								if($q->rowcount())//start if rowcount company
								{   
									$row= $q->fetch();
										$names= $row["name"];
								 echo "<h6>".$lang["comp"].": ".$names."</h6>";
								}
								
								echo"  
								</div>
								</div>
								</div>
			";
				}}				
?>
<!--=====================================================  start search for companies  ======================================================= -->
				<?php
				$sql="select logo,id,website,name from companies where name like '%$search%'  and state=1 ";//get product from database
				$q=$con->prepare($sql);
				$q->execute();
				//var_dump($company);
				//var_dump($search);
				
				if($q->rowcount())
				{
					foreach($q->fetchall() as $row)
					{
						$logo=$row['logo'];					// product images
						$id=$row['id'];					// product images
						$website=$row['website'];
                        $name=$row['name'];				// product Name
						$id1=encript_id($id);               // encripted_id

						?>
			            
		<div class="gallery_product col-md-4 filter sprinkle">
            <div class="card mb-4 product-wap rounded-0" >
                    <div class="card rounded-0">
					<?php echo"<a  href='brand-products.php?id=$id1'>";?>
                        <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $logo;?>" style='width:100%; height:18em;'>
						</a>    
                    </div>
                    <div class="card-body"style="margin-bottom:43px;">
                              <center>  <a href=<?php echo"brand-products.php?id=$id1"?> class="h2 text-decoration-none"><h4><?php echo $lang["comp"].": ".$name;?></h4></a></center>
                               
                                
                               
                    </div>
			</div>
	</div>
			<?php 
						//} // end if rowcount for product
					//}//end foreach for product
				} //end foreach for companies
			} //end if rowcount for companies
			else
					{
						echo"<center><h3 >".$lang['srch']."</h3></center>";
						//echo "<meta http-equiv='refresh' content='5; url=index.php' />";
					}
		} // end if for isset search
		
	} // end if for server request
				
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
