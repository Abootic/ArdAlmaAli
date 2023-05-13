<?php include_once("control-header.php");
?>
		<span id="displayMsg"></span>


   <div class="container" dir="rtl" align="right">   
        <!-- row -->
        <div class="row tm-content-row">
		
            <!--###################################################################-->
            <!-- row -->
            
       
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title" >المشاهدات </h2>
		
                        <table class="table">
                            <thead >
                                <tr >
								    <th scope="col">الرقم التسلسلي </th>
                                    <th scope="col">IP Address</th>
                                    
                                    <th scope="col"> المشاهدات</th>
                                    
                                   
                                   
                                    
                                    
                                </tr>
                            </thead>
                            <tbody id="views">
                            <?php
                                //$sql="select * from manufact_comp order by add_date desc";
                                $sql="select * from home_views";
								$q=$con->prepare($sql);
								$q->execute();
								if($q->rowcount())
								{
                             // echo "<tr style='border-top: 4px double white;'>";
                             
                    $uq=0;
                                    $tot=0;
									foreach($q->fetchall() as $row){
                                        $uq++;
                                        $tot+=$row["number_of_views"];
                                    echo "<tr style='border-top: 4px double white;'>";   
                                  echo "<td>$uq </b></td>";
								echo "<td><b>$row[ip_add]</b> </td>";
                                        echo "<td><b> $row[number_of_views] </b> </td>";
                                  
                    echo "</tr>";
                                               
										 }// end of foreach
                                    } // end if
										
										echo "<tr style='border-top: 4px double white;'>";
                                        echo "<td><b>المجموع الكلي  </b> </td>";
										echo "<td><b>$uq </b> </td>";
                                        echo "<td><b> $tot </b> </td>";
                                        echo "</tr>";
                                       
                                    ?>
								
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	<!--<meta http-equiv='refresh' content='33330; url=comments-control.php' />   --> 
  <?php
 include_once("footer.php");
 ?>