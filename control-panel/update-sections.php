<?php
require_once("db.php");
//sleep(2);
if(isset($_POST["updateSection"]))
    {
        if(empty(@$_POST['ar']))
            $sec_serrors['ar']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";

        if(empty(@$_POST['eng']))
            $sec_serrors['eng']="<span style='color:red'>يرجى تعبئة هذا الحقل</span>";

    if(!isset($sec_serrors)){

        $sql="update about_sections set content_eng=:eng, content_ar=:ar, priority=:pr, state=:st where id=:id and section_no=:sec";
        $q=$con->prepare($sql);
        $q->execute(array("id"=>$_POST["secId"], "sec"=>$_POST["secNo"], "eng"=>$_POST["eng"], "ar"=>$_POST["ar"], "pr"=>$_POST["pr"], "st"=>$_POST["st"]));
        if($q->rowcount()){
          //$errArr['err']="<h4 class='alert alert-success'>تم تعديل البيانات التابعة للمحتوى</h4>";
        //  echo "<h4 class='alert alert-success'>تم تعديل البيانات التابعة للمحتوى</h4>";
        ?>
         <?php
          $sql="select * from about_sections where id =:id and section_no=:sec";
          $q=$con->prepare($sql);
          $q->execute(array("id"=>$_POST["secId"], "sec"=>$_POST["secNo"]));
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

            }
          }
          echo "<span onclick='hideErrMsg()' id='errMsg'><h4 class='alert alert-success'>تم تعديل البيانات التابعة للمحتوى</h4></span>";
       ?>
          <div class="form-group mb-3">
                    <label
                      for="content"
                      > بالعربي </label><br/>
                      <?php if(isset($sec_serrors['ar'])) echo $sec_serrors['ar'] ; ?>
                      <textarea id="<?php echo $section_no.'_ar'; ?>" name="<?php echo $section_no.'_ar'; ?>" rows="3"  dir="rtl" align="right"
                       class="form-control validate"><?php echo $content_ar; ?></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="content"
                      >بالانجليزي </label><br/>
                      <?php if(isset($sec_serrors['eng'])) echo $sec_serrors['eng'] ; ?>
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
        
        <?php
        }
        else{
         // $errArr['err']="<h4 class='alert alert-danger'>لم يتم تعديل بيانات المحتوى</h4>";
         echo "<span onclick='hideErrMsg()' id='errMsg'><h4 class='alert alert-danger'>لم يتم تعديل بيانات المحتوى</h4></span>";
          
         
        }
    } else{
        //$errArr['err']="<h4 class='alert alert-danger'>لم يتم تعديل بيانات المحتوى</h4>";
         // echo "<h4 class='alert alert-danger'>لم يتم تعديل بيانات المحتوى</h4>";
        // <?php
        $sql="select * from about_sections where id =:id and section_no=:sec";
        $q=$con->prepare($sql);
        $q->execute(array("id"=>$_POST["secId"], "sec"=>$_POST["secNo"]));
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

          }
        }
        echo "<span onclick='hideErrMsg()' id='errMsg'><h4 class='alert alert-danger'>لم يتم تعديل بيانات المحتوى</h4></span>";
     ?>
        <div class="form-group mb-3">
                  <label
                    for="content"
                    > بالعربي </label><br/>
                    <?php if(isset($sec_serrors['ar'])) echo $sec_serrors['ar'] ; ?>
                    <textarea id="<?php echo $section_no.'_ar'; ?>" name="<?php echo $section_no.'_ar'; ?>" rows="3"  dir="rtl" align="right"
                     class="form-control validate"><?php echo $content_ar; ?></textarea>
                </div>

                <div class="form-group mb-3">
                  <label
                    for="content"
                    >بالانجليزي </label><br/>
                    <?php if(isset($sec_serrors['eng'])) echo $sec_serrors['eng'] ; ?>
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
   <?php
      }
}
?>
