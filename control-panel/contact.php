<?php require_once("control-header.php");
        require_once("admin/secFunction.php");
        //require_once("admin/secFunction.php");

 Sanitize($_POST);
            SanitizeGet($_GET);
?>

   <!---================================================================   start switch               ---->

   <?php


if (isset($_GET['action'],$_GET['id'])) {
    switch ($_GET['action']) {
            case'delete':
     @$id=decript_id($_GET['id']);
    if (is_numeric($id)) {
        $sql = "update contacts set state=2 where id=:id";
        $q = $con->prepare($sql);
        $q->execute(array("id" => $id));
        if ($q->rowcount()) {
            $del['del'] = "<h4 class='alert alert-success'>   تم الحذف بنجاح  </h4>";
            //echo "<meta http-equiv='refresh' content='3; url=Contact.php' />";
        } else {
            $del['del'] = "<h4 class='alert alert-danger'>لم يتم الحذف  </h4>";
            //echo "<meta http-equiv='refresh' content='3; url=Contact.php' />";
        }

    }
                
            break;
            case'edit':
            break;
            

        }
}

?>
<!---================================================================    end     switch          ---->







            <!-- Start Contact -->
        <?php
            if (isset($_GET)) {
                //Sanitize($_GET);             // if 1
                if (isset($_GET["action"]) and $_GET["action"]=="reply") { // if 2
                if (isset($_GET["id"])) {// if 3
                   @$reply_id=decript_id($_GET['id']);
                    if (is_numeric($reply_id)) {
                        $sql="select * from contacts where id =:id";
                        $q=$con->prepare($sql);
                        $q->execute(array("id"=>$reply_id));
                        if ($q->rowcount()) {
                            foreach ($q->fetchall() as $row) {
                                $id=$row["id"];
                                $email=$row["sender"];
                                $title=$row["title"];
                                $msg=$row["msg"];
                                $date=$row["add_date"];
                                $active=$row["state"]; ?>

            <section dir="rtl" align="right">
           
            <div class="container py-5">
            <?php if(isset($rep['sending'])){echo $rep['sending'];}?>
            <?php if(isset( $del['del'] )){echo  $del['del']; }?>
           
                <div id="frm" class="row py-5">
                
                    <form action=""  class="col-md-9 m-auto"  role="form">
                        <div  id="contact_section">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputname">من :</label>
                                <input type="text" style="background-color:#fff;border-radius:10px; color:#000;" class="form-control mt-1" id="email" value="Najmtic@gmail.com" name="emailFrom" placeholder="alabyer@gmail.com" dir="ltr" align="left">
                            </div>
                          
                        </div>
                     
                  

                        <div class="form-group col-md-12 mb-3">
                            <label for="inputmessage">الرسالة </label>
                            <textarea 
                            style="background-color:#fff;border-radius:10px; color:#000;"
                            class="form-control mt-1" 
                            id="message" 
                            name="message" 
                            placeholder="Message" 
                            rows="5">  <?php echo $msg; ?>                                 </textarea>
                        </div>
                    
                        
                        
                    <center>
                            <div class="form-group col-md-12 mt-3">
                           
           <a   style="background-color:#fff;border-radius:15%;width:100px;margin-right:40%;color:black;font-weight:bold;" class="btn btn"  
href="mailto:<?php if(isset($email)) echo $email; ?>">
                                رد</a>
                           
                            </div>
                             </center>
                    
                        </div>
                    </form>
                </div>
            </div>
            </section>
            <?php
                            }// end
                        }//
                    }
                }//end is_numric
                }
            }
            ?>
            <!-- End Contact -->
                <div class="container"  >
            
                    
                    <!--###################################################################-->
                    <!-- row -->
                    <div dir="rtl" align="right" class="row tm-content-row">
            
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                        <div class="col-12 tm-block-col">
                            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                                <h2 class="tm-block-title">  الرسائل</h2>
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><b>Id</b></th>
                                            <th scope="col"><b>المرسل</b></th>
                                            <th scope="col"> الموضوع</th>
                                            <th scope="col"> عنوان المرسل</th>
                                            <th scope="col"> تأريخ الوصول</th>
                                            <th scope="col">حالة الرسالة</th>

                                            
                                    
                                        
                                        </tr>
                                    </thead>
                                    <tbody id="servicesTable">
                                    
                                    <?php
                                        //$sql="select * from manufact_comp order by add_date desc";
                                        $sql="select * from contacts  where state!=2   order by add_date desc";
                                        $q=$con->prepare($sql);
                                        $q->execute();
                                        if ($q->rowcount()) {
                                            foreach ($q->fetchall() as $row) {
                                                $id=$row["id"];
                                                $email=$row["sender"];
                                                $title=$row["title"];
                                                $location=$row['sender_ip'];
                                                $msg=$row["msg"];
                                                $date=$row["add_date"];
                                                $active=$row["state"];
                                                
                                                
                                            
                                                //echo "<td><b>$id </b> </td>";
                                                echo "<tr style='border-top: 4px double #fff;'>";
                                                echo "<td><b>$id</b></td>";
                                                
                                                echo "<td><b>$email</b></td>";
                                                echo "<td><b>$title</b></td>";
                                                echo "<td><b> $location</b></td>";
                                                // echo "<td><b>$msg</b></td>";
                                                
                                                echo "<td><b>$date </b> </td>";
                                                echo "<td><b>$active </b> </td>";
                                                
                                                echo "</tr>";
                                                echo "<tr>";
                                
                                 
                                           
                                                @$id1=encript_id($id);
                                                //echo "<td><b><b>ACTIONS:</b></b></td>";
                                                echo "<td><a href='?action=reply&id=$id1'><button style='width:50px;' class='btn-success'>رد</button> </a></td> ";
                                                //=================== State switch control ====================
                                                
                                       // echo "<td><a href='?action=accept&id=$id1'><button style='width:50px;' class='btn-danger'>replay</button> </a> </td>";
                                
                                        echo " <td><a onClick='deleteChk($id)'> <span id='$id' style='display:none;'>$id1</span><button style='width:50px;' class='btn-danger'>حذف</button> </a> </td>";
                                           

                                        //  echo " <td> <a href='?action=accept&id=1'><button style='width:50px;' class='btn-success'>تفاصيل</button> </a></td> ";
                                        // // echo" <a href='update-comp.php?action=update&id=$id'><button style='width:50px;' class='btn-success'>تعديل</button> </a> ";
                                        //     echo" <td><a href='?action=stop&id=1'><button style='width:50px;' class='btn-danger'>حذف</button> </a> </td>";
                                           

                                        
                                    
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                  echo "<td></td>";
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
      	
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script>
        
        $("document").ready(function(){
        $("#contact_section").hide();
        $("#replay").click(function(){
        $("#contact_section").toggle( true );

        });



        });//end ready function
            </script>




     
        <?php
        include_once("footer.php");
         ?>