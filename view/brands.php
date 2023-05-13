<?php include_once("header.php");
require_once("../control-panel/admin/secFunction.php");

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
 
 //============ End of changing language section ===================================
?>
	
    <!-- Close Top Nav -->
<br>
<br>
   


    <!-- Start Content -->
    <div class="container py-5">
  
                <div class="row">
				<?php	
				$sql="select logo,id,website,name from companies where state=1";//get product from database
				$q=$con->prepare($sql);
				$q->execute();
			
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
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
							 <?php echo"<a  href='brand-products.php?id=$id1'>"?>
                                <img class="card-img rounded-0 img-fluid" src="../control-panel/images/<?php echo $logo;?>" style='width:100%; height:20em;'></a>
                             
                            </div>
                            <div class="card-body">
                              <center>  <a href=<?php echo"brand-products.php?id=$id1"?> class="h2 text-decoration-none"><?php echo $name;?></a></center>
                               
                                
                               
                            </div>
                        </div>
                    </div>
				<?php 
				
				} // end foreach
				}  // end if rowcount

				?>
				
				
                </div>
                
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
<script>
function getPage(nm){
	
	window.location="All.php?name="+nm;
}
</script>
<?php include_once("footer.php");
   ?>