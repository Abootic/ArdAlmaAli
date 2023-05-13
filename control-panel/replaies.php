<?php
 

require_once("control-header.php");
require_once("admin/secFunction.php");       
 ?>

<span id="displayMsg"></span>

<?php
/*
if(isset($_GET["action"])){
    $fptr= "images/icons/ic.jpg";
    if(!unlink($fptr)){
        echo "<h2>Can not delete this file</h2>";
    }
    else{
        echo "<h2>Deleted success</h2>";
    }
}
*/
?>
<!-- End Contact -->
<div class="container">


    <!--###################################################################-->
    <!-- row -->
    <div dir="rtl" align="right" class="row tm-content-row">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">  ردود الرسائل</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><b>رقم الرد</b></th>
                                <th scope="col"><b>رقم الرسالة</b></th>
                                <th scope="col"> <b>تأريخ الوصول</b></th>
                                <th scope="col"><b>رقم المدير الذي رد </b></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>   
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <tbody id="servicesTable">

                            <?php
                          
                                        $sql="select * from replies  order by id desc";
                                        $q=$con->prepare($sql);
                                        $q->execute();
                                        if ($q->rowcount()) {
                                            foreach ($q->fetchall() as $row) {
                                                $id=$row["id"];
                                                $contact_id=$row["contact_id"];
                                        
                                                $add_date=$row['add_date'];
                                                $admin=$row["admin"];
                                              
                                                echo "<tr style='border-top: 4px double white;'>";
                                                echo "<td><b>$id</b></td>";
                                                echo "<td><b> $contact_id</b></td>";
                                               // echo "<td><b>  $msg</b></td>";
                                            //    echo "<td><b> $location</b></td>";
                                                echo "<td><b> $add_date </b> </td>";
                                                echo "<td><b>$admin</b> </td>";
                                                echo "<td></td>";
                                                 echo "<td></td>";
                                                 echo "<td></td>";
                                                 echo "<td></td>";
                                                 echo "</tr>";

                                                 echo "<tr>";
                                                 echo "<td><a><button style='width:50px;' class='btn-success'>رد</button> </a></td> ";
                                                 //=================== State switch control ====================
                                         echo " <td><a href='?action=delete'> <button style='width:50px;' class='btn-danger'>حذف</button> </a> </td>";
                                         echo "<td></td>";
                                         echo "<td></td>";
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
    <!-- <script>
    $("document").ready(function() {
        $("#contact_section").hide();
        $("#replay").click(function() {
            $("#contact_section").toggle(true);

        });



    }); //end ready function
    </script> -->




    <!---================================================================   start switch               ---->
<!-- 
    <?php


        // if (isset($_GET['action'],$_GET['id'])) {
        //     switch ($_GET['action']) {
        //             case'edit':
                        
        //             break;
        //             case'edit':
        //             break;
                    

        //         }
        // }

        ?> -->
    <!---================================================================    end     switch          ---->

    <?php
        require_once("footer.php");
         ?>