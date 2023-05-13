<?php include_once("control-header.php");?>
<?php
require("db.php");
require_once("admin/secFunction.php");
 /* =============================== */
?>
<?php
#PHP User Input Validation
	if($_SERVER["REQUEST_METHOD"]=="POST" and @$_POST["add_items"]=="إضافة"){	
        Sanitize($_POST);
        $_SESSION["sec_id"]=$_POST["sec_id"];
        $_SESSION["items"]=$_POST["num_of_items"];
    $chLang="eng";
    }

    if($_SERVER["REQUEST_METHOD"]=="POST" and @$_POST["addItems"]=="إضافة"){

	Sanitize($_POST);
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
		if(!isset($sec_serrors)){
           // var_dump($_SESSION);
            $q=$con->prepare("select max(section_no) from about_sections where id=:id");
            $q->execute(array("id"=>$_SESSION["sec_id"]));
            $last_id=$q->fetch()['max(section_no)'];

            if(!$last_id>0)
                $last_id=0;

            $last_id++;
          for($item=1;$item<=(int)$_POST["items"];$item++){
            $sql="insert into about_sections(id, section_no, content_eng, content_ar, priority) values(:lid, :sec, :eng, :ar, :pr)";
            $q=$con->prepare($sql);
            $q->execute(array("lid"=>$_SESSION["sec_id"], "sec"=>$last_id, "eng"=>$_POST[$item."_eng"], "ar"=>$_POST[$item."_ar"], "pr"=>$_POST[$item."_priority"]));
            if($q->rowcount()){
                $last_id++;
             // echo"Item Added";
            }

          }
      //  echo "تمت الأضافة";
      }
      else{
        $errArr['err']="<h4 class='alert alert-danger'>أدخل البيانات كاملة (مع بيانات العناصر)</h4>";
      }

		}
		else{
    $errArr['err']="<h4 class='alert alert-danger'>أدخل البيانات كاملة (مع بيانات العناصر)</h4>";
    }
//============================================================
	}//EndIf Of  the First if
	
?> 
<!-- row -->
<div style="margin:2px" class="row tm-content-row" dir="rtl" align="right">

<div class="container tm-mt-big tm-mb-big">
<div class="row">
  <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
    <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
      <div class="row">
        <div align="center" class="col-12">
          <h2  class="tm-block-title d-inline-block">إضافة عنصر جديد</h2>
        </div>
  <div class="col-12"> 			</div>
      </div>
      <div class="row tm-edit-product-row">
      <div class="col-xl-2 col-lg-2 col-md-12">
      </div>
        <div class="col-xl-8 col-lg-8 col-md-12">
          <form action="#" method="post" enctype="multipart/form-data" class="tm-edit-product-form">

<?php
        if(isset($_POST["num_of_items"]))
        if(is_numeric($_POST["num_of_items"]))
          if($_POST["num_of_items"]>=1)
            {
             echo" <input name='items' type='text' value='$_POST[num_of_items]' />";
             for($num=1;$num<=$_POST["num_of_items"];$num++){
       ?>
                
                <div class="data-section" style="border-radius:5px;background-color:#0ef9ce;padding:10px;">
               <center> <h3> العنصر <?php echo $num; ?></h3></center>
                  <div class="form-group mb-3">
                    <label
                      for="content"
                      > بالعربي </label><br/>
                      <?php if(isset($sec_serrors[$num.'ar'])) echo $sec_serrors[$num.'ar'] ; ?>
                      <textarea id="content" name="<?php echo $num.'_ar'; ?>" rows="3"  dir="ltr" align="left"
                       class="form-control validate"></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="content"
                      >بالانجليزي </label><br/>
                      <?php if(isset($sec_serrors[$num.'eng'])) echo $sec_serrors[$num.'eng'] ; ?>
                      <textarea id="content" name="<?php echo $num.'_eng'; ?>" rows="3"  dir="ltr" align="left"
                       class="form-control validate"></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="priority"
                      > الترتيب</label><br/>
                    <input
                      id="priority"
                      name="<?php echo $num.'_priority'; ?>"
                      type="number"
                      value="<?php echo $num ; ?>"
                      class="form-control validate"
                    />
                  </div>

                  
                   
                </div>
                </br>
        
          <?php
            }// end foreach
        
          } //  end if
          
          ?>
    </div>
        
          
        
             
        <div class="col-12">
          <input type="submit" class="btn btn-primary btn-block text-uppercase" name="addItems" value="إضافة" style="border-radius:50px;"/>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php include_once("footer.php"); ?>