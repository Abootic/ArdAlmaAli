<?php include_once("control-header.php");
include_once("admin/secFunction.php");
?>
		<span id="displayMsg"></span>
   <div class="container" dir="rtl" align="right">   
   <div class="col-12">
                <a class="btn btn-primary btn-block text-uppercase" href="add-profile.php" style="border-radius:50px;">إضافة عنصر جديد </a>
              </div>
</br>
        <!-- row -->
        <div class="row tm-content-row">
		
            <!--###################################################################-->
       
            <!-- row -->
<?php 
    $srch="%%";
    if(isset($_POST['find'])){
        Sanitize($_POST);
            $srch="%".$_POST['find']."%";
    }
    else{
        $srch="%";
    }
?>

<?php
            // ============ operations control ======================================
if(isset($_GET["action"]) and isset($_GET["id"]) and is_numeric(decript_id($_GET["id"]))){
    SanitizeGet($_GET);
    $_GET["id"]=decript_id($_GET["id"]);
    if(isset($_SESSION["admin_id"]) and ($_SESSION["admin_role"]==1 or $_SESSION["admin_role"]==2)){
        switch($_GET["action"]){
            case "stop": $sql="update about_table set state=0 where id=:id";
            $q=$con->prepare($sql);
            $q->execute(array("id"=>$_GET["id"]));
            if($q->rowcount()==1){
                $errArr['err']="<h4 class='alert alert-success'>تم ايقاف العنصر بنجاح</h4>";
            }
            else{
                $errArr['err']="<h4 class='alert alert-danger'>لم يتم الايقاف</h4>";
            }
             break;

             case "active": $sql="update about_table set state=1 where id=:id";
            $q=$con->prepare($sql);
            $q->execute(array("id"=>$_GET["id"]));
            if($q->rowcount()==1){
                $errArr['err']="<h4 class='alert alert-success'>تم تفعيل العنصر بنجاح</h4>";
            }
            else{
                $errArr['err']="<h4 class='alert alert-danger'>لم يتم التفعيل</h4>";
            }
             break;

             case "delete": $sql="update about_table set state=2 where id=:id";
            $q=$con->prepare($sql);
            $q->execute(array("id"=>$_GET["id"]));
            if($q->rowcount()==1){
                $errArr['err']="<h4 class='alert alert-success'>تم حذف العنصر بنجاح</h4>";
            }
            else{
                $errArr['err']="<h4 class='alert alert-danger'>لم يتم الحذف</h4>";
            }
             break;
        }
    }
}
else{
   // echo"<h1>no actions</h1>";
}
?>
            
       
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title" align="center">عناصر الواجهة</h2>
                        <?php if(isset($errArr['err'])) echo $errArr['err']; ?>
                        <form action="" method="POST" align="right">
					    <label style="color:white;">بحث بالإسم عن عنصر:  </label>
					    <input class="validate" type="text" name="find" />
					    <input class="validate" type="submit" name="search" value="بـحـث" />
                        <input class="validate" type="submit" name="search" value="الكل" />
					</form>
                     <!-- end search form -->
					 </br>
		
                        <table class="table">
                            <thead >
                                <tr >
								    <th scope="col">العنوان بالعربي </th>
                                    <th scope="col">العنوان بالإنجليزي</th>
                                    <th scope="col">الترتيب</th>
                                    <th scope="col">الحالة</th>
                                 
                                    
                                </tr>
                            </thead>
                            <tbody id="comments">
                            <?php
                                //$sql="select * from manufact_comp order by add_date desc";
                                $sql="select * from about_table where state in(0,1) and (title_eng like :srch or title_ar like :srch) order by priority asc";
								$q=$con->prepare($sql);
								$q->execute(array("srch"=>$srch));
								if($q->rowcount())
								{
									foreach($q->fetchall() as $row){
                                        
                                        $id=$row["id"];
                                        $title_eng=$row["title_eng"];
                                        $title_ar=$row["title_ar"];
                                        $priority=$row["priority"];
                                        $state=$row["state"];
                                        $id1=encript_id($id);
										
										
                                        echo "<tr style='border-top: 4px double white;'>";
                                        echo "<td><b>$title_ar </b> </td>";
                                        echo "<td><b>$title_eng </b> </td>";
                                        echo "<td><b>$priority </b> </td>";
										echo "<td><b>$state </b> </td>";
										
                                        echo "</tr>";
                                        echo "<tr>";
                            //=================== State switch control ====================
                            switch($state){
                                case 0 :
                                    echo "  <td><a href='?action=active&id=$id1'><button class='btn-success'>تفعيل</button> </a> </td>";
                                    echo" <td><a href='update-profile.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
                                    echo" <td><a href='?action=delete&id=$id1'><button class='btn-danger'>حذف</button> </a> </td>";
                                break;

                                case 1 :
                                    echo "  <td><a href='?action=stop&id=$id1'><button class='btn-warning'>إيقاف</button> </a> </td>";
                                    echo" <td><a href='update-profile.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
                                    echo" <td><a href='?action=delete&id=$id1'><button class='btn-danger'>حذف</button> </a> </td>";
                                break;

                               // case 2 :
                               // break;
                            }

                           echo "<td></td>";
                              echo"  </tr>";
                              
                                        }//
                                    }
                                    ?>
								
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	<?php
 include_once("footer.php");
 ?>
