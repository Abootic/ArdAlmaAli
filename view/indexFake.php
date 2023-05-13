<?php include_once("header.php");?>

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
                <a href="#"><img src="assets/img/images/s3.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h2 text-center mt-3 mb-3"><?php echo $lang["aboutUs"]?></h2>
                <p class="text-center"> <?php echo $lang["ocData"]?></p>
                <p class="text-center"><a href="about.php" class="btn btn-success"><?php echo $lang["read"]?></a></p>
            </div>
            <div class="col-12 col-md-2"></div>
            <!-- our broduct in home page-->
            <div class="col-12 col-md-5 px-2 py-2">
                <a href="#"><img src="assets/img/images/home3.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h2 text-center mt-3 mb-3"><?php echo $lang["ourProduct"]?></h2>
                <p class="text-center"> <?php echo $lang["opData"]?></p>
                <p class="text-center"><a href="shop1.php" class="btn btn-success"><?php echo $lang["read"]?></a></p>
            </div>
        </div>
    </section>
    

     <!-- our Brands -->
     <?php 
                                    $sql="select max(id) from companies where state=1 ";//get brands from database
                                    $preProd=$con->prepare($sql);
                                    $preProd->execute();
                                    if($preProd->rowcount())
                                    $maxId=$preProd->fetch()["max(id)"];
                                    $lastId=0;
                        ?>
 <section class="bg-light text-dark py-1">
    <div class="container">
        <div class="row text-left py-3">
           <!-- <div class="col-md-10  vl m-auto">-->
<?php 
                if($chLang=="eng")
                    echo "<div class='col-md-10  vl m-auto'>";
                else
                    echo "<div class='col-lg- vj '>";
                 ?>
                <h1 class="h1"><?php echo $lang["brand"]?></h1>
                <!-- <p>
                
                </p> -->
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                    
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                <?php 
                                if($lastId==$maxId){
                                    $lastId=0;
                                }
                                    $sql="select logo,id,website,name from companies where state=1 and id>$lastId order by id asc limit 4";//get brands from database
                                    $preProd=$con->prepare($sql);
                                    $preProd->execute();
                                
                                    if($preProd->rowcount()==4)
                                    {
                                        $s1Imgs=$preProd->fetchall();
                                        $lastId1=$s1Imgs[3]["id"];
                                    }
                                    else if($preProd->rowcount()==3)
                                    {
                                        $s1Imgs=$preProd->fetchall();
                                        $s1Imgs[3]=$s3Imgs[3];
                                        $lastId1=$s1Imgs[2]["id"];
                                    }
                                    else if($preProd->rowcount()==2)
                                    {
                                        $s1Imgs=$preProd->fetchall();
                                        $s1Imgs[2]=$s3Imgs[2];
                                        $s1Imgs[3]=$s3Imgs[3];
                                        $lastId1=$s1Imgs[1]["id"];
                                    }
                                    else if($preProd->rowcount()==1)
                                    {
                                        $s1Imgs=$preProd->fetchall();
                                        $s1Imgs[1]=$s3Imgs[1];
                                        $s1Imgs[2]=$s3Imgs[2];
                                        $s1Imgs[3]=$s3Imgs[3];
                                        $lastId1=$s1Imgs[0]["id"];
                                    }
                                    else{
                                        $s1Imgs=$s3Imgs;
                                        $lastId1=$lastId;
                                    }
                                    $lastId=$lastId1;
            
                                ?>
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img  class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s1Imgs[0]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s1Imgs[1]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s1Imgs[2]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s1Imgs[3]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item ">
                                <?php 
                                if($lastId==$maxId){
                                    $lastId=0;
                                }
                                    $sql="select logo,id,website,name from companies where state=1 and id>$lastId order by id asc limit 4";//get brands from database
                                    $preProd=$con->prepare($sql);
                                    $preProd->execute();
                                
                                    if($preProd->rowcount()==4)
                                    {
                                        $s2Imgs=$preProd->fetchall();
                                        $lastId2=$s2Imgs[3]["id"];
                                    }
                                    else if($preProd->rowcount()==3)
                                    {
                                        $s2Imgs=$preProd->fetchall();
                                        $s2Imgs[3]=$s1Imgs[3];
                                        $lastId2=$s2Imgs[2]["id"];
                                    }
                                    else if($preProd->rowcount()==2)
                                    {
                                        $s2Imgs=$preProd->fetchall();
                                        $s2Imgs[2]=$s1Imgs[2];
                                        $s2Imgs[3]=$s1Imgs[3];
                                        $lastId2=$s2Imgs[1]["id"];
                                    }
                                    else if($preProd->rowcount()==1)
                                    {
                                        $s2Imgs=$preProd->fetchall();
                                        $s2Imgs[1]=$s1Imgs[1];
                                        $s2Imgs[2]=$s1Imgs[2];
                                        $s2Imgs[3]=$s1Imgs[3];
                                        $lastId2=$s2Imgs[0]["id"];
                                    }
                                    else{
                                        $s2Imgs=$s1Imgs;
                                        $lastId2=$lastId;
                                    }
                                    
                                    $lastId=$lastId2;
                                ?>
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img  class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s2Imgs[0]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s2Imgs[1]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s2Imgs[2]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s2Imgs[3]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                <?php 
                                if($lastId==$maxId){
                                    $lastId=0;
                                }
                                    $sql="select logo,id,website,name from companies where state=1 and id>$lastId order by id asc limit 4";//get brands from database
                                    $preProd=$con->prepare($sql);
                                    $preProd->execute();
                                
                                    if($preProd->rowcount()==4)
                                    {
                                        $s3Imgs=$preProd->fetchall();
                                        $lastId3=$s3Imgs[3]["id"];
                                    }
                                    else if($preProd->rowcount()==3)
                                    {
                                        $s3Imgs=$preProd->fetchall();
                                        $s3Imgs[3]=$s1Imgs[0];
                                        $lastId3=$s3Imgs[2]["id"];
                                    }
                                    else if($preProd->rowcount()==2)
                                    {
                                        $s3Imgs=$preProd->fetchall();
                                        $s3Imgs[2]=$s1Imgs[1];
                                        $s3Imgs[3]=$s1Imgs[2];
                                        $lastId3=$s3Imgs[1]["id"];
                                    }
                                    else if($preProd->rowcount()==1)
                                    {
                                        $s3Imgs=$preProd->fetchall();
                                        $s3Imgs[1]=$s1Imgs[0];
                                        $s3Imgs[2]=$s1Imgs[1];
                                        $s3Imgs[3]=$s1Imgs[2];
                                        $lastId3=$s3Imgs[0]["id"];
                                    }
                                    else{
                                        $s3Imgs=$s1Imgs;
                                        $lastId3=$lastId;
                                    }
                                    
                                    $lastId=$lastId3;
                                ?>
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img  class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s3Imgs[0]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s3Imgs[1]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s3Imgs[2]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img brand-img-size" src="../control-panel/images/<?php echo $s3Imgs[3]['logo'];?>" alt="Brand Logo"></a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->
                            </div>
                            <!--End Slides-->
                            
                        </div>
                        <br>
                        <p class="text-center"><a href="brands.php" class="btn btn-success"><?php echo $lang["read"]?></a></p>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
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