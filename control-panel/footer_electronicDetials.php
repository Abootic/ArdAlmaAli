<?php include_once("control-header.php");
include_once("admin/secFunction.php");
?>
<?php 
include_once("db.php");
if (isset($_SESSION["admin_role"])){
    if (@$_SESSION["admin_role"]==1 or @$_SESSION["admin_role"]==2) {
        ?>

<?php

 
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'stop2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للايقاف</h4>";
            //echo "<meta http-equiv='refresh' content='5; url=footer_electronicDetials.php' />";
            break;
        case 'update2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للتعديل</h4>";
            //echo "<meta http-equiv='refresh' content='5; url=footer_electronicDetials.php' />";
            break;
        case 'delete2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للحذف</h4>";
            //echo "<meta http-equiv='refresh' content='5; url=footer_electronicDetials.php' />";
            break;
        case 'unadd':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للاضافة</h4><br><br><br>";
           // echo "<meta http-equiv='refresh' content='5; url=footer_electronicDetials.php' />";
            break;

    }
}
        if (isset($_GET['action'], $_GET['id'])) {
            switch ($_GET['action']) {
        case 'delete':
            SanitizeGet($_GET);
         
            @$id=$_GET['id'];
         
            if (is_numeric($id)) {
                $sql = "update footer_section set state=2 where id=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>   تم الحذف بنجاح  </h4>";
                  //  echo "<meta http-equiv='refresh' content='3; url=footer_electronicDetials.php' />";
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم الحذف  </h4>";
                   // echo "<meta http-equiv='refresh' content='3; url=footer_electronicDetials.php' />";
                }
            }

            break;
        case 'active':
            SanitizeGet($_GET);
             @$id=decript_id($_GET['id']);
          
            if (is_numeric($id)) {
                $sql = "update footer_section set state=1 where id=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>تم التعديل بنجاح </h4>";
                   // echo "<meta http-equiv='refresh' content='2; url=update_footer_Setting.php' />";
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم التعديل  </h4>";
                   // echo "<meta http-equiv='refresh' content='2; url=update_footer_Setting.php' />";
                }
            }
            break;
        case 'inactive':
            SanitizeGet($_GET);
        
             @$id=decript_id($_GET['id']);
            if (is_numeric($id)) {
                $sql = "update footer_section set state=0 where id=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>تم التعديل بنجاح </h4>";
                   // echo "<meta http-equiv='refresh' content='5; url=footer_electronicDetials.php' />";
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم التعديل  </h4>";
                   // echo "<meta http-equiv='refresh' content='5; url=footer_electronicDetials.php' />";
                }
            }

            break;

    }
        } ?>

        <span id="displayMsg"></span>




        <div class="container" dir="rtl" align="right">
    <center><strong style="color:#fff;">االمعلومات الالكترونية</strong></center>
			
            <!--###################################################################-->
            <!-- row -->
            <div class="row tm-content-row">
       
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="col-12 tm-block-col">
                    <!--
                <div class="col-12">
                <a class="btn btn-primary btn-block text-uppercase" 
                href="footer_Setting.php" style="border-radius:50px;">إضافة البيانات الالكترونية جديدة </a>
         
              </div>
              -->
</br>
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    
						
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col"><b>الشعار</b></th> -->
                                     <?php
                                  $sql="select * from footer_section where id =(select max(id) from footer_section where state =1)";
								$q=$con->prepare($sql);
							    $q->execute();
								if($q->rowcount())
								{
								    foreach($q->fetchall() as $row){
							?>
                                    <th scope="col"><b>id</b></th>
                                   
                                    <th scope="col">   العنوان بالعربي</th>
                                      <th scope="col"> العنوان بالإنجليزي </th>
                        <th scope="col">رقم الهاتف </th>
                                 
                            <th scope="col"> هاتف اخر </th>
                       
                               <th scope="col">الايميل</th>
                                  
                                 
                                
                                </tr>
                            </thead>
                            <tbody id="servicesTable">
                               
                 <?php         		
                                       
                                        $id=$row["id"];
                                        $id1=encript_id($id);
										$loc_eng=$row["address_eng"];
					
					$loc_ar=$row["address_ar"];
                                        
                                         $phone1=$row["phone_no"];
                                         $phone2=$row["phone_sec"];
										 $email=$row["email"];
									
                                  
                                       
										$active=$row["state"];
										
										echo "<tr style='border-top: 4px double white;'>";
									
                                        //echo "<td><b>$id </b> </td>";
                                       
										echo "<td><a href='' style='color:white;'> $id </a></td>";
										echo "<td><b> 	$loc_ar </b> </td>";
                              
                   echo  "<td><b> 	$loc_eng </b> </td>";          
                                        echo "<td><b>$phone1 </b> </td>";
                                           echo "<td><b>$phone2 </b> </td>";
                                        
                                        echo "<td><b>  $email </b> </td>";
                                     
                                      
                                    
                                     
                                      
										echo "</tr>";
										
										
										//echo "<td><b><b>ACTIONS:</b></b></td>";
                                        echo "<tr>";
                            //=================== State switch control ====================
                            if ($_SESSION["admin_role"] == 1 or $_SESSION["admin_role"]==2) {
                                if ($row['state'] == 1) {
                                    echo "<td><a href='?action=inactive&id=$id1'><button class='btn-warning'>الغاء تفعيل</button> </a> </td>";
                                } else {
                                    echo "<td><a href='?action=active&id=$id1'><button class='btn-success'> تفعيل</button> </a> </td>";
                                }
                                echo " <td><a href='update_footer_Setting.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
                                echo " <td><a onClick='deleteChk($id)'> <span id='$id' style='display:none;'>$id1</span><button class='btn-danger'>حذف</button></a></td>";
                               
                            } else {
                                if ($row['state'] == 1) {
                                    echo "<td><a href='?action=stop2'><button class='btn-success'> الغاء تفعيل</button> </a> </td>";
                                } else {
                                    echo "<td><a href='?action=stop2'><button class='btn-info'> تفعيل</button> </a> </td>";
                                }
                                echo "<td><a href='?action=update2'><button class='btn-warning'>تعديل</button> </a> </td>";
                                echo "<td><a href='?action=delete2'><button class='btn-danger' >حذف</button> </a> </td>";
                            }
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                           // echo "<td></td>";
                            //echo "<td></td>";
                         //   echo "<td></td>";
                            
                           // echo "<td></td>";
                            
                              echo"  </tr>";
                              
                                        }// end foreach
                                    } // end if 
                                    ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
    }
   // else  //echo "<meta http-equiv='refresh' content='0; url=admin/controlpanel/dashboard.php' />";
   
}  ?>


<?php
 include_once("footer.php");
 ?>

