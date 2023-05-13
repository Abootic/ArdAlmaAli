<?php  // including header and security functions ==============================================================

    include_once("control-header.php");

    include_once("admin/secFunction.php");
?>

<?php // search control ======================================================================
    $srch="%%";  // for default search value
    if(isset($_POST['find'])){
        Sanitize($_POST);
        $srch="%".$_POST['find']."%";
        unset($_POST);
    }
    else{
        $srch="%";
    }
?>

<?php //  Actions control ==========================================================================
    if(isset($_GET["action"]) and isset($_GET["id"])){
        SanitizeGet($_GET);
        if(is_numeric(decript_id($_GET["id"]))){
            $_GET["id"]=decript_id($_GET["id"]); 
            if(isset($_SESSION["admin_id"]) and ($_SESSION["admin_role"]==1 or $_SESSION["admin_role"]==2)){
                switch($_GET["action"]){
                    case "stop": $sql="update companies set state=0 where id=:id";
                        $q=$con->prepare($sql);
                        $q->execute(array("id"=>$_GET["id"]));
                        if($q->rowcount()==1){
                            $errArr['err']="<h4 class='alert alert-success'>تم ايقاف العنصر رقم $_GET[id] بنجاح</h4>";
                        }
                        else{
                            $errArr['err']="<h4 class='alert alert-danger'>لم يتم الايقاف </h4>";
                        }
                    break;
                    // end case stop ======================
    
                    case "active": $sql="update companies set state=1 where id=:id";
                        $q=$con->prepare($sql);
                        $q->execute(array("id"=>$_GET["id"]));
                        if($q->rowcount()==1){
                            $errArr['err']="<h4 class='alert alert-success'>تم تفعيل العنصر رقم $_GET[id] بنجاح</h4>";
                        }
                        else{
                            $errArr['err']="<h4 class='alert alert-danger'>لم يتم التفعيل </h4>";
                        }
                    break;
                     // end case active ======================
    
                    case "delete":
                        $sql="update companies set state=2 where id=:id";
                        $q=$con->prepare($sql);
                        $q->execute(array("id"=>$_GET["id"]));
                        if($q->rowcount()==1){
                            $errArr['err']="<h4 class='alert alert-success'>تم حذف العنصر رقم $_GET[id] بنجاح</h4>";
                        }
                        else{
                            $errArr['err']="<h4 class='alert alert-danger'>لم يتم الحذف </h4>";
                        }
                    break;
                     // end case delete ======================
                }
            }
            else{
                $errArr['err']="<h4 class='alert alert-danger'>ليس لديك الصلاحيات لإجراء هذه العملية</h4>";
                //echo "<meta http-equiv='refresh' content='5; url=companies.php' />";
            }
        }// end if is_numeric
        else{
            $errArr['err']="<h4 class='alert alert-danger'>البيانات المرسلة غير صحيحة</h4>";
            //echo "<meta http-equiv='refresh' content='5; url=companies.php' />";
        }
    }
    else{
     //   echo"<h1>no actions</h1>";
    }

?>

<!-- begining of the main content ======================================================================================= -->
<div class="container" dir="rtl" align="right">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="col-12 tm-block-col">
                <div class="col-12">
                    <a class="btn btn-primary btn-block text-uppercase" href="add-comp.php" style="border-radius:50px;">إضافة مورد جديد </a>
                </div>
                <!-- end div -->
                </br>
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <?php if(isset($errArr['err'])) echo $errArr['err'] ; ?>
                    <h2 class="tm-block-title" align="center">
                   الموردون</h2>
                    <form action="" method="POST" align="right">
					    <label style="color:white;">بحث بالإسم عن مورد:  </label>
					    <input class="validate" type="text" name="find" />
					    <input class="validate" type="submit" name="search" value="بـحـث" />
                        <input class="validate" type="submit" name="search" value="الكل" />
					</form>
                     <!-- end search form -->
					 </br>
						
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><b>الشعار</b></th>
                                   
                                    <th scope="col"><b>الاسم</b></th>
                                   
                                    <th scope="col">موقع الويب</th>
                                    <th scope="col">الإيميل</th>
                                    <th scope="col">الهاتف</th>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">تأريخ الإضافة</th>
                                    <th scope="col">أخر تعديل</th>
                                    
								<!--
                                    <th scope="col">&nbsp;</th>
								-->
                                </tr>
                            </thead>
                            <tbody>
                               
                            <?php
                                //$sql="select * from manufact_comp order by add_date desc";
                                $sql="select * from companies where state in(0,1) and name like :srch order by id asc";
								$q=$con->prepare($sql);
								$q->execute(array("srch"=>$srch));
								if($q->rowcount())
								{
									foreach($q->fetchall() as $row){
                                        $logo=$row["logo"];
                                        $id=$row["id"];
                                        $id1=encript_id($id);
										$name=$row["name"];
                                        $website=$row["website"];
                                        $location=$row["location"];
										$email=$row["email"];
										$phone=$row["phone"];
                                        $date=$row["add_date"];
                                        $change=$row["last_change"];
										$active=$row["state"];
										
										echo "<tr style='border-top: 4px double white;'>";
										echo " <td><a href='brand-products.php?brand=$id'> <img src='images/$logo' alt='not found' width='60px'  height='60px' style='border:1px double white; border-radius:50%;' /> </a></td>";
                                        //echo "<td><b>$id </b> </td>";
                                       
										echo "<td><a href='brand-products.php?brand=$id' style='color:white;'><b>$name </b> </a></td>";
										echo "<td><b><a href='$website' style='color:white;'>$website <a/></b> </td>";
                                        echo "<td><b>$email </b> </td>";
                                        echo "<td><b>$phone </b> </td>";
                                        echo "<td><b>$location </b> </td>";
										$dd=calculateDate($date);
                                        echo "<td><b>$dd </b> </td>";
                                        echo "<td><b>$change </b> </td>";
										echo "</tr>";
										
										echo "<tr>";
										//echo "<td><b><b>ACTIONS:</b></b></td>";

                            //=================== State switch control ====================
                            switch($active){
                                case 0 : echo "  <td><a href='?action=active&id=$id1'><button class='btn-success'>تفعيل</button> </a> </td>";
                                echo" <td><a href='update-comp.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
                                echo" <td><a onclick='deleteChk($id)'><span id='$id' style='display:none;'>$id1</span><button class='btn-danger'>حذف</button> </a> </td>";
                                    break;

                                case 1 : echo "  <td><a href='?action=stop&id=$id1'><button class='btn-warning'>إيقاف</button> </a> </td>";
                                    echo" <td><a href='update-comp.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
                                    echo" <td><a onclick='deleteChk($id)'><span id='$id' style='display:none;'>$id1</span><button class='btn-danger'>حذف</button> </a> </td>";
                                    break;

                                case 2 : break;
                            }
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                              echo"  </tr>";
                              
                                        }// end foreach
                                    } // end if 
                                    ?>


                            </tbody>
                        </table> 
                        <!-- end table -->
                </div>
                <!-- end div -->
            </div>
            <!-- end div --> 
        </div>
        <!-- end div -->
    </div>
    <!-- end div -->
</div>
<!-- end div -->



<?php  // including footer =======================================================================================
    include_once("footer.php");
?>