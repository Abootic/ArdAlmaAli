    <?php require_once "control-header.php";

require_once "admin/secFunction.php";
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
            echo "<meta http-equiv='refresh' content='5; url=adminTable.php' />";
            break;
        case 'update2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للتعديل</h4>";
            echo "<meta http-equiv='refresh' content='5; url=adminTable.php' />";
            break;
        case 'delete2':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للحذف</h4>";
            echo "<meta http-equiv='refresh' content='5; url=adminTable.php' />";
            break;
        case 'unadd':
            @$premission['privlage'] = "<h4 class='alert alert-danger'>ليس لديك صلاحية للاضافة</h4><br><br><br>";
            echo "<meta http-equiv='refresh' content='5; url=adminTable.php' />";
            break;

    }
}
        if (isset($_GET['action'], $_GET['id'])) {
            switch ($_GET['action']) {
        case 'delete':
            SanitizeGet($_GET);
         
            @$id=decript_id($_GET['id']);
         
            if (is_numeric($id)) {
                $sql = "update admin set state=2 where id=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>   تم الحذف بنجاح  </h4>";
                    echo "<meta http-equiv='refresh' content='3; url=adminTable.php' />";
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم الحذف  </h4>";
                    echo "<meta http-equiv='refresh' content='3; url=adminTable.php' />";
                }
            }

            break;
        case 'active':
            SanitizeGet($_GET);
             @$id=decript_id($_GET['id']);
          
            if (is_numeric($id)) {
                $sql = "update admin set state=1 where id=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>تم التعديل بنجاح </h4>";
                    echo "<meta http-equiv='refresh' content='2; url=adminTable.php' />";
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم التعديل  </h4>";
                    echo "<meta http-equiv='refresh' content='2; url=adminTable.php' />";
                }
            }
            break;
        case 'inactive':
            SanitizeGet($_GET);
        
             @$id=decript_id($_GET['id']);
            if (is_numeric($id)) {
                $sql = "update admin set state=0 where id=:id";
                $q = $con->prepare($sql);
                $q->execute(array("id" => $id));
                if ($q->rowcount()) {
                    $edit['edit'] = "<h4 class='alert alert-success'>تم التعديل بنجاح </h4>";
                    echo "<meta http-equiv='refresh' content='5; url=adminTable.php' />";
                } else {
                    $edit['edit'] = "<h4 class='alert alert-danger'>لم يتم التعديل  </h4>";
                    echo "<meta http-equiv='refresh' content='5; url=adminTable.php' />";
                }
            }

            break;

    }
        } ?>


    <div class="container" dir="rtl" align="right">
        <!-- row -->
        <div class="row tm-content-row">





            <!--###################################################################-->
            <!-- row -->

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="col-12 tm-block-col">
                    <div class="col-12">
                        <?php

if (@$_SESSION["admin_role"] == 1) {
    ?>
                        <a class="btn btn-primary btn-block text-uppercase" href="add-Admin.php"
                            style="border-radius:50px;">إضافة
                            مدير جديدة </a>
                        <?php
} else {
        echo ' <a class="btn btn-primary btn-block text-uppercase" href="?action=unadd" style="border-radius:50px;">إضافة مدير جديدة </a>';
    } ?>

                    </div>
                    </br>
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title" align="center">الإدارة</h2>
                        <?php if (isset($premission['privlage'])) {
        echo @$premission['privlage'];
    } ?>
                        <?php if (isset($edit['edit'])) {
        echo $edit['edit'];
    } ?>

                       
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col"> اسم المستخدم</th>
                                    <th scope="col">البريد الالكتروني</th>

                                    <th scope="col">رقم الهاتف </th>
                                    <th scope="col"> الدور الوضيفي</th>
                                    <th scope="col"> تاريخ الاضافة</th>
                                    <th scope="col">اخر تعديل</th>
                                    <th scope="col">الحالة</th>


                                </tr>
                            </thead>
                            <tbody>

                                <tr style='border-top: 4px double gold;'>
                                    <?php
$sql = "select * from admin where state !=2";
        $q = $con->prepare($sql);
        $q->execute();
        if ($q->rowcount()) {
            foreach ($q->fetchall() as $row) {
                $id = $row['id'];

                $name = $row['name'];
                $admName = $row['uname'];

                $email = $row['email'];
                $phone = $row['phone'];

                $role = $row['role'];

                $add_date = $row['add_date'];
                $last_change = $row['last_change'];
                $state = $row['state'];

                echo "<tr style='border-top: 4px double #fff;'>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$admName</td>";
                echo "<td>$email</td>";
                //echo"<td>".$row['passwd']."</td>";
                echo "<td>$phone</td>";
                echo "<td> $role</td>";
                echo "<td>$add_date</td>";
                echo "<td>  $last_change</td>";
                echo "<td> $state</td>";
                echo "</tr>";
                echo "<tr>";
                @$id1=encript_id($id);

                //=================== State switch control ====================

                if ($_SESSION["admin_role"] == 1) {
                    if ($row['state'] == 1) {
                        echo "<td><a href='?action=inactive&id=$id1'><button class='btn-warning'>إيقاف </button> </a> </td>";
                    } else {
                        echo "<td><a href='?action=active&id=$id1'><button class='btn-success'> تفعيل</button> </a> </td>";
                    }
                    echo " <td><a href='Update_Admin.php?action=update&id=$id1'><button class='btn-warning'>تعديل</button> </a> </td>";
                    echo " <td><a onClick='deleteChk($id)'> <span id='$id' style='display:none;'>$id1</span><button class='btn-danger'>حذف</button></a></td>";
                    echo " <td><a href='Update_adminsRole.php?action=update&id=$id1'><button class='btn-warning'>  الصلاحية</button> </a> </td>";
                    echo " <td><a href='Owner_updatePass.php?action=update&id=$id1'><button class='btn-info'>  <i class='fa fa-key fa-fw'></i> كلمة السر</button> </a> </td>";
                } else {
                    if ($row['state'] == 1) {
                        echo "<td><a href='?action=stop2'><button class='btn-success'> إيقاف </button> </a> </td>";
                    } else {
                        echo "<td><a href='?action=stop2'><button class='btn-info'> تفعيل</button> </a> </td>";
                    }
                    echo "<td><a href='?action=update2'><button class='btn-warning'>تعديل</button> </a> </td>";
                    echo "<td><a href='?action=delete2'><button class='btn-danger' >حذف</button> </a> </td>";
                }

             
                echo " <td></td>";
                echo " <td></td>";
                echo " <td></td>";
                echo " <td></td>";
               
                
                echo "  </tr>";
            }
        } ?>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
    else  echo "<meta http-equiv='refresh' content='0; url=admin/controlpanel/dashboard.php' />";
   
}  ?>

        <?php require_once "footer.php";