<?php include("control-header.php");?>
<?php
require("db.php");
require_once("admin/secFunction.php");
//var_dump($_POST);
 /* =============================== */
?>
<?php
#PHP User Input Validation
	if($_SERVER["REQUEST_METHOD"]=="POST" and @$_POST["serUpdate"]=="Update"){	

    $chLang="eng";
	Sanitize($_POST);
	//Service Name Validation==============================
		if(empty(@$_POST['title_ar']))
      $serrors['title_ar']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
      
      if(empty(@$_POST['title_eng']))
      $serrors['title_eng']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
      
     // if(empty(@$_POST['num_of_items']))
     // $serrors['num_of_items']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
      
      if(@$_POST["num_of_items"]>0){
        for($num=1;$num<=$_POST["num_of_items"];$num++){

          if(empty(@$_POST[$num.'ar']))
              $sec_serrors[$num.'ar']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";

          if(empty(@$_POST[$num.'eng']))
             $sec_serrors[$num.'eng']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";
        }
      }
    
//=========================================================
if(!isset($serrors))
		{
      $sql="update about_table set title_eng=:eng, title_ar=:ar, priority=:pr where id=:id";
      $q=$con->prepare($sql);
      $q->execute(array("eng"=>$_POST["title_eng"], "ar"=>$_POST["title_ar"], "pr"=>$_POST["priority"], "id"=>$_SESSION["item_id"]));
      if($q->rowcount()){
        $errArr['err1']="<h4 class='alert alert-success'>تم تعديل بيانات العنوان  </h4>";
      }
      else{
        $errArr['err1']="<h4 class='alert alert-danger'>لم يتم تعديل بيانات العنوان</h4>";
      }

		}
		else{
    $errArr['err']="<h4 class='alert alert-danger'>أدخل البيانات كاملة (مع بيانات العناصر)</h4>";
    }
//============================================================
	}//EndIf Of  the First if
	
?> 



  
  <!--############################################################################### 
  -->	


<?php  
    if(isset($_GET))
    {
        Sanitize($_GET);             // if 1
        if(isset($_GET["action"]) and $_GET["action"]=="update") // if 2
        {
          if(isset($_GET["id"]) and is_numeric(decript_id($_GET["id"])))// if 3
          {
            $_GET["id"]=decript_id($_GET["id"]);
            $sql="select * from about_table where id =:id";
								$q=$con->prepare($sql);
								$q->execute(array("id"=>$_GET["id"]));
								if($q->rowcount())
								{
                  global $old_id;
                  global $old_value;
									foreach($q->fetchall() as $row){
                    
                    $id=$row["id"];
										$title_eng=$row["title_eng"];
                    $title_ar=$row["title_ar"];
                    $priority=$row["priority"];
                    $state=$row["state"];
                  //  if(!isset($_SESSION["item_id"]) and !isset($_SESSION["old_value"])){
                      $_SESSION["item_id"]=$id;
                      $_SESSION["old_value"]=$title_eng;
                  //  }
  ?>

      
    <!-- row -->
        <div style="margin:2px" class="row tm-content-row" dir="rtl" align="right">

      <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <?php if(isset($errArr['err1'])) echo $errArr['err1'] ; ?>
          <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
            <div class="row">
              <div align="center" class="col-12">
                <h2  class="tm-block-title d-inline-block">تعديل بيانات واجهة العرض</h2>
              </div>
        <div class="col-12"> 			</div>
            </div>
            <div class="row tm-edit-product-row">
            <div class="col-xl-2 col-lg-2 col-md-12">
            </div>
              <div class="col-xl-8 col-lg-8 col-md-12">
                <form action="#" method="post" enctype="multipart/form-data" class="tm-edit-product-form">

                  <div class="form-group mb-3">
                    <label
                      for="title_ar"
                      >العنوان بالعربي</label><br/>
                      <?php if(isset($serrors['title_ar'])) echo $serrors['title_ar'] ; ?>
                    <input
                      id="title_ar"
                      name="title_ar"
                      type="text"
                      value="<?php echo $title_ar ; ?>"
                      class="form-control validate"
                    />
                    </div>

                    <div class="form-group mb-3">
                    <label
                      for="title_eng"
                      >العنوان بالإنجليزي</label><br/>
                      <?php if(isset($serrors['title_eng'])) echo $serrors['title_eng'] ; ?>
                    <input
                    dir="ltr" align="left"
                      id="title_eng"
                      name="title_eng"
                      type="text"
                      value="<?php echo $title_eng ; ?>"
                      class="form-control validate prod"
                    />
                    </div>

                    <div class="form-group mb-3">
                    <label
                      for="priority"
                      > الترتيب</label><br/>
                      <?php if(isset($serrors['priority'])) echo $serrors['priority'] ; ?>
                    <input
                      id="priority"
                      name="priority"
                      type="number"
                      value="<?php echo $priority ; ?>"
                      class="form-control validate"
                    />
                    </div>
                    <center><h2>البيانات</h2></center>
          
       <?php
          $sql="select * from about_sections where id =:id";
          $q=$con->prepare($sql);
          $q->execute(array("id"=>$id));
          if($q->rowcount())
          {
            $num_items=$q->rowcount();
            echo" <input name='items' type='hidden' value='$num_items' />";
            foreach($q->fetchall() as $row){
              $sec_id=$row["id"];
              $section_no=$row["section_no"];
              $content_eng=$row["content_eng"];
              $content_ar=$row["content_ar"];
              $sec_priority=$row["priority"];
              $sec_state=$row["state"];

       ?>
                
                <div class="data-section" style="border-radius:5px;background-color:#0ef9ce;padding:10px;">
               <center> <h3> العنصر <?php echo $section_no; ?> 
               <b id="<?php echo 'sh'.$section_no?>" onclick="showSec('<?php echo $section_no;?>')" style="display:<?php echo 'inline';?>"><i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i></b>
                    <b id="<?php echo 'hd'.$section_no?>" onclick="hideSec('<?php echo $section_no;?>')" style="display:<?php echo 'none';?>"><i class="pull-right fa fa-fw fa-chevron-circle-left mt-1"></i></b>
                 
               </h3></center>
               <div id="<?php echo $section_no;?>" style="display:<?php echo 'none';?>">
                  <div id="<?php echo 'sec'.$section_no?>"> <!-- start sec no content div -->
                  <div class="form-group mb-3">
                    <label
                      for="content"
                      > بالعربي </label><br/>
                      <?php if(isset($serrors['content'])) echo $serrors['content'] ; ?>
                      <textarea id="<?php echo $section_no.'_ar'; ?>" name="<?php echo $section_no.'_ar'; ?>" rows="3"  dir="rtl" align="right"
                       class="form-control validate"><?php echo $content_ar; ?></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="content"
                      >بالانجليزي </label><br/>
                      <?php if(isset($serrors['content'])) echo $serrors['content'] ; ?>
                      <textarea id="<?php echo $section_no.'_eng'; ?>" name="<?php echo $section_no.'_eng'; ?>" rows="3"  
                       class="form-control validate prod"><?php echo $content_eng; ?></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="priority"
                      > الترتيب</label><br/>
                      <?php if(isset($serrors['priority'])) echo $serrors['priority'] ; ?>
                    <input
                      id="<?php echo $section_no.'_priority'; ?>"
                      name="<?php echo $section_no.'_priority'; ?>"
                      type="number"
                      value="<?php echo $sec_priority ; ?>"
                      class="form-control validate"
                    />
                  </div>

                  <div class="form-group mb-3">
                          <label for="prodtype">الحالة</label >
                      <select 
                      class="custom-select tm-select-accounts form-control validate"
                      name="<?php echo $section_no.'_state'; ?>"
                      id="<?php echo $section_no.'_state'; ?>" >
                      <option value='1' <?php if($sec_state==1) echo 'selected';?> > فعال </option>
                      <option value='0' <?php if($sec_state==0) echo 'selected';?> > موقف </option>
                      </select>
                      <?php if(isset($errors["type"])) echo $errors["type"]; ?>
                   </div>
                   
               </div> <!-- end sec no contenr div -->
                  <center> <buttun onclick="updSec('<?php echo $section_no;?>','<?php echo $sec_id;?>')" id="<?php echo 'secBtn'.$section_no?>" class="btn validate" value="sec">تعديل</buttun></center>
                 </div>
                 </div> 
                </br>
        
          <?php
            }// end foreach
          } //  end if
          
          ?>    
        </div>
        
        <script>
//==========  Refreshing function ===============
function updSec(secNo,secId){
  console.log(secNo,secId);
		var tableBody=document.getElementById("sec"+secNo);
		var refreshRq;
		if(window.XMLHttpRequest)          // chrom firefox safari ie+7
			 refreshRq= new XMLHttpRequest();
		else      // ie -6
			 refreshRq= new ActiveXObject("Microsoft.XMLHTTP");
		
       var eng=document.getElementById(secNo+"_eng").value;
        var ar=document.getElementById(secNo+"_ar").value;
        var st=document.getElementById(secNo+"_state").value;
        var pr=document.getElementById(secNo+"_priority").value;
		refreshRq.onreadystatechange = function(){
			if(this.readyState>=1 && this.readyState<4){
        console.log(secNo,secId,eng,ar,pr,st);
				document.getElementById("sec"+secNo).innerHTML="";
				document.getElementById("secBtn"+secNo).innerHTML="جاري التعديل..."+"<img src='images/icons/loader.gif' width='25px' height='25px' alt='.'/>";
			}
		
		else if(this.readyState ===4 && this.status === 200){
			document.getElementById("secBtn"+secNo).innerHTML="تعديل";
			var res =this.responseText;
			tableBody.innerHTML=res;
		}
			
	}; //end of onreadystatechange function
	refreshRq.open("POST","update-sections.php",true);
	refreshRq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	refreshRq.send("updateSection=yes&secId="+secId+"&secNo="+secNo+"&eng="+eng+"&ar="+ar+"&pr="+pr+"&st="+st);
	
}// end of the main function (Refreshing)

</script>     
        
             
              <div class="col-12">
                <input type="submit" class="btn btn-primary btn-block text-uppercase" name="serUpdate" value="Update" style="border-radius:50px;"/>
              </div>
            </form>
            <form action="add-items.php" method="post">
        <div class="form-group mb-3">
                    <label
                      for="priority"
                      > إضافة عناصر جديدة</label><br/>
                      <?php if(isset($serrors['priority'])) echo $serrors['priority'] ; ?>
                    <input
                      id="priority"
                      name="num_of_items"
                      type="number"
                      value=""
                      class="form-controls validates"
                    />
                    <input name="sec_id" type="hidden" value="<?php echo $id;?>" />
                    <input type="submit" name="add_items" value="إضافة"/>
                  </div>

                 
        </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
     
    <?php
                  } // end if rowcount
                }// end foreach
            // =  ===================================================
          }// end if 3

        }// end if 2

    }// end if 1
?>

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
<script>
function hideErrMsg(){
var disMsg=document.getElementById("errMsg");
//console.log("FFFFFFFFFFFF");
	//disMsg.onclick= function(){
		disMsg.innerHTML="";
//	};
}
</script>
  <?php
    include_once("footer.php");
?>
   