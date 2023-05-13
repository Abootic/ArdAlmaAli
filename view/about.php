<?php include_once("header.php");?>
    <br>
    <!-- <link rel="stylesheet" href="carousel/aboutstyle.css"> -->

   
<br>
    <div class="about-image" style="background-size:100% 100%;margin-top:16px;background-image:url(assets/img/images/b.jpg);width:100%; height:450px;background-repeat: no-repeat;background-position: center;">
		<br><br><h1 class="h1" style="opacity:1;color:#b8feff;text-align:left;letter-spacing:5px;">ABOUT US</h1>
	</div>

    <?php
$sql="select * from about_table where state=1 order by priority asc";
$q=$con->prepare($sql);
$q->execute();
if($q->rowcount())
{
    $chk_section=0;
    $showFirst=1;
    foreach($q->fetchall() as $row){

        $id=$row["id"];
        if($chLang=="eng")
            $title=$row["title_eng"];
        else
            $title=$row["title_ar"];
        $priority=$row["priority"];
        $state=$row["state"];
    
    
        
    
    if($chk_section==0){
        $chk_section=1;
?>

    <section class="bg-white text-dark py-1">
        <div class="container">
            <div class="row  justify-content-md-center py-1">
                <?php 
                if($chLang=="eng")
                    echo "<div class='col-md-10 m-auto vl '>";
                else
                    echo "<div class='col-md-10 m-auto vj '>";
                 ?>
                    
                    <h1 class="h2"><?php echo $title;?> 
                    <b id="<?php echo 'sh'.$id?>" onclick="showSec('<?php echo $id;?>')" style="display:<?php if($showFirst==1) echo 'none';else echo 'inline';?>"><i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i></b>
                    <b id="<?php echo 'hd'.$id?>" onclick="hideSec('<?php echo $id;?>')" style="display:<?php if($showFirst==1) echo 'inline';else echo 'none';?>"><i class="pull-right fa fa-fw fa-chevron-circle-up mt-1"></i></b>
					</h1>
                 
                        <ul id="<?php echo $id;?>" style="display:<?php if($showFirst==1) echo '';else echo 'none';?>">

                        <?php
          $sql="select * from about_sections where id =:id and state=1 order by priority asc";
          $q=$con->prepare($sql);
          $q->execute(array("id"=>$id));
          if($q->rowcount())
          {            
            foreach($q->fetchall() as $row){
              $sec_id=$row["id"];
              $section_no=$row["section_no"];
              if($chLang=="eng")
                $content=$row["content_eng"];
              else
                $content=$row["content_ar"];
              $sec_priority=$row["priority"];
              $sec_state=$row["state"];
              echo "<li>$content</li>";
            } // end foreach
        }// end if
       ?>
                        </ul>
                    
                </div>
                
            </div>
        </div>
    </section>

    <?php
    }// end if chk
    else{
        $chk_section=0;
        ?>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="bg-light text-dark py-1">
        <div class="container">
            <div class="row  justify-content-md-center py-1">
			<?php 
                if($chLang=="eng")
                    echo "<div class='col-md-10 m-auto vl '>";
                else
                    echo "<div class='col-md-10 m-auto vj '>";
                 ?>
			
                <h1 class="h2"><?php echo $title;?> 
                    <b id="<?php echo 'sh'.$id?>" onclick="showSec('<?php echo $id;?>')" style="display:<?php if($showFirst==1) echo 'none';else echo 'inline';?>"><i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i></b>
                    <b id="<?php echo 'hd'.$id?>" onclick="hideSec('<?php echo $id;?>')" style="display:<?php if($showFirst==1) echo 'inline';else echo 'none';?>"><i class="pull-right fa fa-fw fa-chevron-circle-up mt-1"></i></b></h1>
                        <ul id="<?php echo $id;?>" style="display:<?php if($showFirst==1) echo '';else echo 'none';?>">
                <?php
          $sql="select * from about_sections where id =:id and state=1 order by priority asc";
          $q=$con->prepare($sql);
          $q->execute(array("id"=>$id));
          if($q->rowcount())
          {            
            foreach($q->fetchall() as $row){
              $sec_id=$row["id"];
              $section_no=$row["section_no"];
              if($chLang=="eng")
                $content=$row["content_eng"];
              else
                $content=$row["content_ar"];
              $sec_priority=$row["priority"];
              $sec_state=$row["state"];
              echo "<li>$content</li>";
            } // end foreach
        }// end if
       ?>
                </ul>
            </div>
        </div>
    </section>
   

    <?php
    }

    $showFirst++;
        } // end foreach
        
        }// end if 
        ?>
    <!-- mission section
    <section class="bg-dark text-white py-5">
    <section class="container ">
        <div class="row justify-content-md-center py-3">
            <div class="col-md-10 vl">
                <h1 class="h1">MISSION</h1>
                <ul>
                    <li>
                        We at AL-Aber pharma dedicate ourselves to helping patients by developing and provide innovative products and customer services approaches.
                        over the next 5 years, we will achieve and sustain the premier postion among the top tool distrubutor in Yemen.
                        We at AL-Aber pharma dedicate ourselves to helping patients by developing and provide innovative products and customer services approaches.
                        over the next 5 years, we will achieve and sustain the premier postion among the top tool distrubutor in Yemen.
                    </li>
                </ul>
            </div>
            
        </div>
    </section>
    </section>  -->
<!-- 
    <section class="bg-white text-dark py-5">
    <section class="container ">
    <div class="row justify-content-md-center py-3">

            <div class="col-md-6 col-lg-3 py-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Delivery Services</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 py-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 py-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promotion</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 py-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
    </section>
    </section>
    </div> -->
    



    <?php include_once("footer.php");?>

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

<script> // ===================== func to hide a section in about =================
function hideSec(sid){
    var hh=document.getElementById(sid);
    hh.style.display="none";

    var pls=document.getElementById("sh"+sid);
    pls.style.display="inline";
    var ms=document.getElementById("hd"+sid);
    ms.style.display="none";
}
</script>

<script> // ===================== func to show a section in about =================
function showSec(sid){
    var hh=document.getElementById(sid);
    hh.style.display="";
    var pls=document.getElementById("sh"+sid);
    pls.style.display="none";
    var ms=document.getElementById("hd"+sid);
    ms.style.display="inline";
}
</script>

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
</body>

</html>