<?php require_once("header.php");
    //require_once("../../../admin/secFunction.php");?>

<link rel="stylesheet" href="carousel/aboutstyle.css">

<?php
if ($chLang=='eng') {
    $lang=array(
    "contact"=>'Contact Us', "para"=>'Tell us all your suggestions and opinions ', "name"=>'Name',"email"=>'Email',
    "subj"=>'Subject',  "msg"=>'Message',"send"=>'SEND'
 );
} // end of if
elseif ($chLang=='ar') {
    $lang=array(
        "contact"=>'تواصل معنا', "para"=>'ارسل الينا كل تعليقاتك ومقترحاتك', "name"=>'الأسم',"email"=>'البريد الإلكتروني',
        "subj"=>'عنوان الرسالة',  "msg"=>'الرسالة', "send"=>'إرسال'
     );
} // end of else
 
 //============ End of changing language section ===================================
?>

<?php
function getIpAddress()
{
    $ipAddress = '';
    if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        // to get shared ISP IP address
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check for IPs passing through proxy servers
        // check if multiple IP addresses are set and take the first one
        $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipAddressList as $ip) {
            if (! empty($ip)) {
                // if you prefer, you can check for valid IP address here
                $ipAddress = $ip;
                break;
            }
        }
    } elseif (! empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } elseif (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (! empty($_SERVER['HTTP_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    } elseif (! empty($_SERVER['REMOTE_ADDR'])) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }
    $ipAddress1 = gethostbyname('www.google.com');


    return $ipAddress."and ipv4 is :" .$ipAddress1;
}



   

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (!empty($_POST['email'])) {
        if (!filter_var(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) {
            $erorrs['email']="<span class='alert alert-danger'>يجب كتابة بريد الكتروني صحيح </span>";
        }
    } else {
        $erorrs['email']="<span class='alert alert-danger'>اكتب بريدك الالكتروني</span>";
    }
    if (empty($_POST['subject'])) {
        $erorrs['subject']="<span class='alert alert-danger'>يجب كتابة عنوان الرسالة</span>";
    }
   

    if (!empty($_POST['message'])) {
        if (strlen($_POST['message'])>255) {
            $erorrs['message']="<span class='alert alert-danger'>يجب الا يكون محتوى الرسالة اكثر من 255 حرف </span>";
        }
    } else {
        $erorrs['message']="<span class='alert alert-danger'>يجب كتابة نص الرسالة</span>";
    }
    if (empty($erorrs)) {
        @$ip= getIpAddress();
        $ins_msg="insert into contacts(sender,title,msg,sender_ip) values(:m1,:m2,:m3,:m4)";
        $msg=$con->prepare($ins_msg);
        $msg->execute(array("m1"=>$_POST['email'],"m2"=>$_POST['subject'],"m3"=>$_POST['message'],"m4"=> $ip));
        if ($msg->rowcount()) {
            $send['send']="<span class='alert alert-success'>تم ارسال الرسالة بنجاح شكراَ لتواصلكم معنا</span>";
            echo"<meta http-equiv='refresh' content='5; url=contact.php' />";
        } else {
            $send['send']="<span class='alert alert-success'>المعذرة لم يتم ارسال الرسالة</span>";
        }
    }//end erorrs if
}//end server if


?>





















    <!-- Start Content Page -->
   <br><br>
    <section class="bg-light text-dark py-3">
        <div class="container-fluid">
            <div class="row  justify-content-md-center py-1">
                <div class="col-md-10 m-auto text-center">
                    <br>
                    <h1><?php echo $lang["contact"]; ?></h1>
                    <p>
                    <?php echo $lang["para"]; ?>
                    </p>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- Start Contact -->
    <section class="bg-light">
   <center> <?php if (isset($send['send'])) {
    echo $send['send'];
}?></center>
    <div class="container py-1 ">
        <div class="row py-2">
            <form class="col-md-9 m-auto" action="" method="post" role="form">
                <div class="row">
                    <!-- <div class="form-group col-md-6 mb-3">
                        <label for="inputname">// echo $lang["name"];?></label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="<?php echo $lang['name']; ?>">
                    </div> -->
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail"><?php echo $lang['email']; ?></label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="<?php echo $lang['email']; ?>">
                            <?php if (isset($erorrs['email'])) {
    echo  @$erorrs['email'];
}?>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="inputsubject"><?php echo $lang['subj']; ?></label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="<?php echo $lang['subj']; ?>">
                    <?php if (isset($erorrs['subject'])) {
    echo  @$erorrs['subject'];
}?>
                </div>
                <div class="mb-3">
                    <label for="inputmessage"><?php echo $lang['msg']; ?></label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="<?php echo $lang['msg']; ?>" rows="8"></textarea>
                    <?php if (isset($erorrs['message'])) {
    echo  @$erorrs['message'];
}?>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                       <center> <button type="submit" class="btn btn-success px-3"><?php echo $lang['send']; ?></button></center>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </section>
    <!-- End Contact -->




  <?php include_once("footer.php");?>