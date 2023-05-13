<?php include_once("control-header.php");
include_once("admin/secFunction.php");
?>
<?php 
if (isset($_SESSION["admin_role"])){
    if (@$_SESSION["admin_role"]==1) {
        ?>

<?php

 
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'stop2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للايقاف</h4>";
           
            break;
        case 'update2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للتعديل</h4>";
          
            break;
        case 'delete2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للحذف</h4>";
            
            break;
        case 'unadd':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للاضافة</h4><br><br><br>";
            
            break;

    }
}
        if (isset($_GET['action'], $_GET['id'])) {
            switch ($_GET['action']) {
        case 'delete':
            SanitizeGet($_GET);
         
            
          @$id=decript_id($_GET['id']);
            if (is_numeric($id)) {
                $sql = "update footer_socialmedia set state=2 where  section_no=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>   تم الحذف بنجاح  </h4>";
                  
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم الحذف  </h4>";
                   
                }
            }

            break;
        case 'active':
            SanitizeGet($_GET);
             @$id=decript_id($_GET['id']);
          
            if (is_numeric($id)) {
                $sql = "update footer_socialmedia set state=1 where  section_no=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>تم التعديل بنجاح </h4>";
                   
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم التعديل  </h4>";
                    
                }
            }
            break;
        case 'inactive':
            SanitizeGet($_GET);
        
             @$id=decript_id($_GET['id']);
            if (is_numeric($id)) {
                $sql = "update footer_socialmedia set state=0 where section_no=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>تم التعديل بنجاح </h4>";
                    
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم التعديل  </h4>";
                    
                }
            }

            break;

    }
        } ?>

        <span id="displayMsg"></span>


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
	langRq.open("POST","../store/login-control.php",true);
	langRq.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	langRq.send("language="+lang);
	
	
}// end of the main function (changeLanguage)
</script>


        <div class="container" dir="rtl" align="right">
    
			
            <!--###################################################################-->
            <!-- row -->
            <div class="row tm-content-row">
       
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="col-12 tm-block-col">
                <div class="col-12">
               
                <a class="btn btn-primary btn-block text-uppercase" href="footer_media.php" style="border-radius:50px;">إضافة الصفحات التواصل الاجتماعي  الجديدة </a>
              </div>
</br>
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        
                        <h2 class="tm-block-title" align="center">صفحات مواقع التواصل الاجتماعي
                        </h2>
                     
					 
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col"><b>الشعار</b></th> -->
                                   
                                    <th scope="col"><b>id</b></th>
                                   
                                    <th scope="col"> رابط موقع الويب </th>
                                    <th scope="col">اسم الموقع</th>
                                    <th scope="col">الشعار</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">الحدث</th>
                                
                                </tr>
                            </thead>
                            <tbody id="servicesTable">
                               
                            <?php
                                  $sql="select * from footer_socialmedia where state !=2";
								$q=$con->prepare($sql);
							    $q->execute();
								if($q->rowcount())
								{
									foreach($q->fetchall() as $row){
                                        // $logo=$row["logo"];
                                        $id=$row["section_no"];
                                        $id1=encript_id($id);
									//	$location=$row["address"];
                                        $website=$row["social_media"];//the url of  	social_media pages like facebook and instagram etc.
                                        $name_of_website=$row["name_of_website"];
                                        $logo=$row['logo'];
                                        // $phone=$row["phone_no"];
										// $email=$row["email"];
									
                                      // $date=$row["add_date"];
                                       
										$active=$row["state"];
										
										echo "<tr style='border-top: 4px double white;'>";
									
                                        //echo "<td><b>$id </b> </td>";
                                       
										echo "<td><a href='' style='color:white;'> $id </a></td>";
										echo "<td><strong><a href='$website' style='color:white;'>$website <a/></strong> </td>";
                                        echo "<td><strong> $name_of_website </strong> </td>";
                                      
                                        echo" <td><strong>$logo</strong></td>";
                                        echo "<td> </td>";
                                        echo "<td> </td>";
                                        echo "<td> </td>";
                                   
                                       
										echo "</tr>";
										
										
										//echo "<td><b><b>ACTIONS:</b></b></td>";
                                        echo "<tr>";
                            //=================== State switch control ====================
                            if ($_SESSION["admin_role"] == 1) {
                                if ($row['state'] == 1) {
                                    echo "<td><a href='?action=inactive&id=$id1'><button class='btn-warning'>الغاء تفعيل</button> </a> </td>";
                                } else {
                                    echo "<td><a href='?action=active&id=$id1'><button class='btn-success'> تفعيل</button> </a> </td>";
                                }
                                echo " <td><a href='update_footer_media.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
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
                            echo "<td></td>";
                            
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
   // else  echo "<meta http-equiv='refresh' content='0; url=admin/controlpanel/dashboard.php' />";
   
}  ?>


<?php
 include_once("footer.php");
 ?>

