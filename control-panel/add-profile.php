<?php include("control-header.php");?>
<?php
require("db.php");
require_once("admin/secFunction.php");

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
		if(!isset($sec_serrors)){
      $sql="insert into about_table(title_eng, title_ar, priority) values(:eng, :ar,:pr)";
      $q=$con->prepare($sql);
      $q->execute(array("eng"=>$_POST["title_eng"], "ar"=>$_POST["title_ar"], "pr"=>$_POST["priority"]));
      if($q->rowcount()){
        $q=$con->prepare("select max(id) from about_table");
        $q->execute();
        $last_id=$q->fetch()['max(id)'];
          for($item=1;$item<=(int)$_POST["items"];$item++){
            $sql="insert into about_sections(id, section_no, content_eng, content_ar, priority) values(:lid, :sec, :eng, :ar, :pr)";
            $q=$con->prepare($sql);
            $q->execute(array("lid"=>$last_id, "sec"=>$item, "eng"=>$_POST[$item."_eng"], "ar"=>$_POST[$item."_ar"], "pr"=>$_POST[$item."_priority"]));
            if($q->rowcount()){
              echo"";
            }

          }
        echo "تمت الأضافة";
      }
      else{
        $errArr['err']="<h4 class='alert alert-danger'>أدخل البيانات كاملة (مع بيانات العناصر)</h4>";
      }

		}
		else{
    $errArr['err']="<h4 class='alert alert-danger'>أدخل البيانات كاملة (مع بيانات العناصر)</h4>";
    }
//============================================================
  }
  else{
    $errArr['err']="<h4 class='alert alert-danger'>أدخل البيانات كاملة (مع بيانات العناصر)</h4>";
  }
	}//EndIf Of  the First if
	
?> 



  
  <!--############################################################################### 
  -->	




      
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

                  <div class="form-group mb-3">
                    <label
                      for="title_ar"
                      >العنوان بالعربي</label><br/>
                      <?php if(isset($serrors['title_ar'])) echo $serrors['title_ar'] ; ?>
                    <input
                      id="title_ar"
                      name="title_ar"
                      type="text"
                     value="<?php if(isset($_POST["title_ar"])) echo $_POST['title_ar'] ?>"
                      class="form-control validate"
                    />
                    </div>

                    <div class="form-group mb-3">
                    <label
                      for="title_eng"
                      >العنوان بالإنجليزي</label><br/>
                      <?php if(isset($serrors['title_eng'])) echo $serrors['title_eng'] ; ?>
                    <input
                      id="title_eng"
                      name="title_eng"
                      type="text"
                      value="<?php if(isset($_POST["title_eng"])) echo $_POST['title_eng'] ?>"
                      class="form-control validate"
                    />
                    </div>

                    <div class="form-group mb-3">
                    <label
                      for="priority"
                      > الترتيب</label><br/>
                    <input
                      id="priority"
                      name="priority"
                      type="number"
                      value="<?php if(isset($_POST["priority"])) echo $_POST['priority'] ?>"
                      class="form-control validate"
                    />
                    </div>

                    <center><h2>البيانات</h2></center>
          <?php
            if(!isset($_POST["num_of_items"]))
            {
          ?>
                    <div class="form-group mb-3">
                    <label
                      for="state"
                      >عدد العناصر</label><br/>
                      <?php if(isset($serrors['state'])) echo $serrors['state'] ; ?>
                    <input
                      id="state"
                      name="num_of_items"
                      type="number"
                      value="<?php if(isset($_POST["num_of_items"])) echo $_POST['num_of_items'] ?>"
                      class="form-control validate"
                    />
                    </div>
            <?php } ?>
              
            
            
              
          
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
                <input type="submit" class="btn btn-primary btn-block text-uppercase" name="serUpdate" value="Update" style="border-radius:50px;"/>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
     
    <?php
    /*
                  } // end if rowcount
                }// end foreach
            // =  ===================================================
          }// end if 3

        }// end if 2

    }// end if 1
    */
?>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2021</b> All rights reserved. 
            
            <a rel="nofollow noopener" href="index.php" class="tm-footer-link">Alaber</a>
          </p>
        </div>
      </footer>
    </div>
 <script src="../control-panel/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../control-panel/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  <script>
  function deleteChk(Id,Sid){

  var chkDel = window.confirm("You Will Delete This Offer?");
  if(chkDel === true){
  var page='?action=delete&id='+Id+'&sid='+Sid;
    window.location=page;
  }
  };

  </script>
  <script>
  function logoutChk(){
  var chklogout = window.confirm("Are You Sure To Logout?");
  if(chklogout === true)
    window.location="../store/logout.php";
  };

  </script>
  <script>
  var disMsg=document.getElementById("confdisplayMsg");
  disMsg.onclick= function(){
    disMsg.innerHTML="";
  };
  </script>
  <script>
  var disMsg1=document.getElementById("reqdisplayMsg");
  disMsg1.onclick= function(){
    disMsg1.innerHTML="";
  };
  </script>
  <script>
  //==========  changeLanguage function ===============
  function changeLanguage(lang){
    var langRq;
    if(window.XMLHttpRequest)          // chrom firefox safari ie+7
        langRq= new XMLHttpRequest();
    else      // ie -6
        langRq= new ActiveXObject("Microsoft.XMLHTTP");
    
    langRq.onreadystatechange = function(){
    
    if(this.readyState ===4 && this.status === 200){
      var res =this.responseText;
      if(res==="yes"){
        location.reload(true);
      }
    }
      
  }; //end of onreadystatechange function
  langRq.open("POST","login-control.php",true);
  langRq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  langRq.send("language="+lang);


  }// end of the main function (changeLanguage)

  </script>

  <script>
  // Function to Hide user Requests by Ajax
  function hideUserRequsts(tableId){
    document.getElementById(tableId).innerHTML="";
    //document.getElementById(tableId).innerHTML="";
    
  }// end of the main function (hideUserRequsts)
  </script>

  <script>
  hideUserRequsts("reqTable");
  hideUserRequsts("confTransTable");
  hideUserRequsts("transTable");
  </script>


  </body>
</html>