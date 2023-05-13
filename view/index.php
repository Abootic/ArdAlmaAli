<?php include_once("header.php");
require_once("../control-panel/admin/secFunction.php");
?>

<?php
// ============================ Views Counter =====================================

if(isset($_SERVER["REMOTE_ADDR"]))
{
   // echo $_SERVER["REMOTE_ADDR"];
    
   $sql="select * from home_views where ip_add=:ip";
                            $q=$con->prepare($sql);
                            $q->execute(array("ip"=>$_SERVER["REMOTE_ADDR"]));
                            if($q->rowcount()){
                                $sql="update home_views set number_of_views=number_of_views + 1 where ip_add=:ip";
                                $q=$con->prepare($sql);
                                $q->execute(array("ip"=>$_SERVER["REMOTE_ADDR"]));
                                if($q->rowcount()){
                                   // echo "<h2>View ++</h2>";
                                }
                               // else
                               // echo "<h2>Noo view</h2>";
                            }
                            else{
                                $sql="insert into home_views(ip_add, number_of_views) values(:ip, :num)";
                            $q=$con->prepare($sql);
                            $q->execute(array("ip"=>$_SERVER["REMOTE_ADDR"], "num"=> 1));
                            if($q->rowcount()){
                             //   echo "<h2>Done Added</h2>";
                            }
                          //  else
                           // echo "<h2>Noot add 2</h2>";
                        }
}
// ============================== end o views counter ===========================================

?>
<?php 
    if($chLang=='eng'){
	$sql="select title, description from slides";
    }
    else{
        $sql="select title_ar as title, description_ar as description  from slides";
    }

	$q=$con->prepare($sql);
	$q->execute();
    if($q->rowcount()>=3)
	    $n=$q->fetchall();
    else{
        $n=array(0=>["title"=>"ALABER", "description"=>"AL-aber pharma for medicine and medical supplies"],
        1=>["title"=>"ALABER", "description"=>"AL-aber pharma for medicine and medical supplies"],
        2=>["title"=>"ALABER", "description"=>"AL-aber pharma for medicine and medical supplies"]);
    }
?>
    <!-- end navbar -->
    <!-- <link rel="stylesheet" tyep="text/css" href="carousel/style.css">    -->
    <!-- slider -->
    <div class="slider">
        <div class="slides">
            <div class="slidee" >
                <div class="slide-data">
                    <h1><?php echo $n[0]['title']; ?></h1>
                    <p><?php echo $n[0]['description']; ?></p>
                    <button onclick="window.location.href='#zzz'">Get Started</button>
                </div>
            </div>
            <div class="slidee">
                <div class="slide-data">
                <h1><?php echo $n[1]['title']; ?></h1>
                    <p><?php echo $n[1]['description']; ?></p>
                    <button onclick="window.location.href='#zzz'">Get Started</button>
                </div>
            </div>
            <div class="slidee">
               <div class="slide-data">
                <h1><?php echo $n[2]['title']; ?></h1>
                    <p><?php echo $n[2]['description']; ?></p>
                    <button onclick="window.location.href='#zzz'">Get Started</button>
                </div>
            </div>
        </div>

        <button class="arrows prev" onclick="<?php 
    if($chLang=='eng') echo 'plusslide(-1)'; else echo 'plusslide(1)'; ?>" >
            <span><i class="fas fa-angle-left"></i></span>
        </button>
        <button class="arrows next" onclick="<?php 
    if($chLang=='eng') echo 'plusslide(1)'; else echo 'plusslide(-1)'; ?>">
            <span><i class="fas fa-angle-right"></i></span>
        </button>

        <div class="dots">
            <span onclick="currentslide(1)"></span>
            <span onclick="currentslide(2)"></span>
            <span id='zzz' onclick="currentslide(3)"></span>
        </div>
    </div>
    <!-- end slider -->
 

    <!-- this section is upper under the slider in the mind of the home page-->
    <section id='zzzz' class="container py-3">
        <!-- small paragraph about company   -->
        <div id='zz' class="row text-left mt-2">
            <?php 
                if($chLang=="eng")
                    echo "<div class='col-lg- vl '>";
                else
                    echo "<div class='col-lg- vj '>";
                 ?>
                <h1 class="h1 "><?php echo $lang["ourC"]?></h1>
                <p class="ml-5 mr-5 ">
                <?php echo $lang["ocData"]?>
                
                </p>
                                <p class=""><a href="about.php" class="btn btn-success"><?php 
                 if($chLang=="eng"){
       echo $lang["read"];}else{ echo "اقرأ"." ".$lang["read"];}
       ?></a></p>
            </div>
        </div>
        <!-- End about company-->
        <div class="row">
            <!-- about us in home page-->
            <div class="col-12 col-md-5 px-2 py-2">
                <a href="#"><img src="assets/img/images/1.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h2 text-center mt-3 mb-3"><?php echo $lang["aboutUs"]?></h2>
                <p class="text-center"> <?php echo $lang["ocData"]?></p>
                <p class="text-center"><a href="about.php" class="btn btn-success"><?php echo $lang["read"]?></a></p>
            </div>
            <div class="col-12 col-md-2"></div>
            <!-- our broduct in home page-->
            <div class="col-12 col-md-5 px-2 py-2">
                <a href="#"><img src="assets/img/images/2.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h2 text-center mt-3 mb-3"><?php echo $lang["ourProduct"]?></h2>
                <p class="text-center"> <?php echo $lang["opData"]?></p>
                <p class="text-center"><a href="shop1.php" class="btn btn-success"><?php echo $lang["read"]?></a></p>
            </div>
        </div>
    </section>
    <style>
    .marquee{ 
        width: 80%;       
        overflow: hidden;
        border:1px solid #ccc;
    }
    .brandSlider{
     
        display: flex;
        list-style: none;
        animation: scrollingSlider 20s linear  infinite;
        
    }
    .barndSliderItem{
        height: 250px;
        width: 250px;
        margin-left: 10px;
        
    }
    .brandSliderContainer{
        width: 90%;
    
        overflow: hidden;
    }

    @keyframes scrollingSlider {
        0% {transform: translateX(100%);}
        100% {transform: translateX(-3000px);}
        

        
    }
    </style>
     <!-- our Brands -->
 <section class="bg-light text-dark py-1">
        <div class="row text-left py-3">
           <!-- <div class="col-md-10  vl m-auto">-->
<?php 
                if($chLang=="eng")
                    echo "<div class='col-md-10  vl m-auto'>";
                else
                    echo "<div class='col-lg- vj '>";
                 ?>
                <h1 class="h1"><?php echo $lang["brand"]?></h1>
            </div>
                        <center dir="ltr">
                                <div class="brandSliderContainer">
                                <div class="brandSlider">
                                <?php
                                $sql="select logo,id,website,name from companies where state=1 order by id asc";//get brands from database
                                $preProd=$con->prepare($sql);
                                $preProd->execute();

                                if($preProd->rowcount())
                                {
                                    $allBrands=$preProd->fetchall();
                                    //$allBrands= array_merge($allBrands, $allBrands);
                                    //echo count($allBrands);
                                    foreach($allBrands as $img){
                                        $id1=encript_id($img["id"]); 
                                        echo "
                                        <a href='brand-products.php?id=$id1'><img  class='barndSliderItem' src='../control-panel/images/$img[logo]' alt='Brand Logo'></a>";
                                    }
                                    //echo "</div>";
                                }
                                ?>
                                </div>
                            </div>
                        </center>
                        
                         <p class="text-center"><a href="brands.php" class="btn btn-success"><?php echo $lang["read"]?></a></p>
</section>
<!--End Brands-->

<?php include_once("footer.php");?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>

    
    <!-- scritp for header -->
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
    <!-- script for slider -->
    <script src="carousel/courser.js"></script>
   
</body>

</html>