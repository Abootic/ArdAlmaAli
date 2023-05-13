<?php require_once("header.php");
    //require_once("../../../admin/secFunction.php");?>


<?php
if ($chLang=='eng') {
    $lang=array(
    "contact"=>'Contact Us', "para"=>'We are pleased to contact us and your inquiries by simply filling out the form below', "name"=>'Name',"email"=>'Email',
    "subj"=>'Subject',  "msg"=>'Message',"send"=>'SEND', "address"=>'Address', "phone"=>'Phone'
 );
} // end of if
elseif ($chLang=='ar') {
    $lang=array(
        "contact"=>'تواصل بنا', "para"=>'يسعدنا تواصلكم وتلقي إستفساراتكم من خلال تعبئة النموذج ادناه', "name"=>'الإسم',"email"=>'البريد الإلكتروني',
        "subj"=>'عنوان الرسالة',  "msg"=>'الرسالة', "send"=>'إرسال',
        "address"=> 'العنوان' ,"phone"=>'الهاتف'
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
            $erorrs['email']="<span class='alert' style='background-color:inherit; color:red'>يجب كتابة بريد الكتروني صحيح </span>";
        }
    } else {
        $erorrs['email']="<span class='alert' style='background-color:inherit; color:red'>اكتب بريدك الالكتروني</span>";
    }
    if (empty($_POST['subject'])) {
        $erorrs['subject']="<span class='alert' style='background-color:inherit; color:red'>يجب كتابة عنوان الرسالة</span>";
    }
   

    if (!empty($_POST['message'])) {
        if (strlen($_POST['message'])>255) {
            $erorrs['message']="<span class='alert' style='background-color:inherit; color:red'>يجب الا يكون محتوى الرسالة اكثر من 255 حرف </span>";
        }
    } else {
        $erorrs['message']="<span class='alert' style='background-color:inherit; color:red'>يجب كتابة نص الرسالة</span>";
    }
    if (empty($erorrs)) {
        @$ip= getIpAddress();
        $ins_msg="insert into contacts(sender,title,msg,sender_ip) values(:m1,:m2,:m3,:m4)";
        $msg=$con->prepare($ins_msg);
        $msg->execute(array("m1"=>$_POST['email'],"m2"=>$_POST['subject'],"m3"=>$_POST['message'],"m4"=> $ip));
        if ($msg->rowcount()) {
            $send['send']="تم ارسال الرسالة بنجاح شكراَ لتواصلكم معنا";
            //echo"<meta http-equiv='refresh' content='5; url=contact.php#contactform' />";
        } else {
            $send['send']="المعذرة لم يتم إرسال الرسالة"
      ;  }
    }//end erorrs if
}//end server if

?>

<?php 
   require_once("../control-panel/db.php");
      ?>
                      <?php
      
     
global $email;
global $address;
global $phone;



  
        $sql="select email,address_eng,address_ar, phone_no, phone_sec, google_map from footer_section where state !=2";
        $sq = $con->prepare($sql);
        $sq->execute();
        if ($sq->rowcount()) {
         
            foreach ($sq->fetchall() as $row) {
                if($chLang=="eng")
                $address=$row["address_eng"];
                else
$address=$row["address_ar"];
               
                $phone1=$row["phone_no"];
             $phone2=$row["phone_sec"];
                $email=$row["email"];
                $map=$row["google_map"];

            }
        }
    

      
      ?>
      
      
      
<br><br><br>
<div class="container   ">
    
    
    <div class="row  p-3 " id="contact">
        
        
        <div class="col-12 text-center pt-4 ">
            <h1 style="color:#1b75bc; font-weight:bold"><?php echo $lang["contact"]; ?></h1>
            <p>                    <?php echo $lang["para"]; ?></p>
        </div>
        </div>
        
 <div class=" row p-3 " >
        <div class="col-sm-12 col-md-12 p-3 mt-5 mb-5 border-top border-info border-3 shadow-lg" id="contactform">
            <?php if (isset($send['send'])) {?>
            
    <script>alert("<?php echo $send['send']; ?>")</script>
    <?php }?>
   <form method="post" action="contact.php#contactform">
                <p>
                <label><?php echo $lang['name']; ?></label>
                <input type="text" name="name" class="form-control" style="display:block;border:none;border-bottom:1px solid #ccc;width:100%">
                </p>
                <p>
                <label><?php echo $lang['email']; ?></label>
                <input type="email" name="email" class="form-control" style="display:block;border:none;border-bottom:1px solid #ccc;width:100%">
                <?php if (isset($erorrs['email'])) {
    echo  @$erorrs['email'];
}?>
                </p>
                <p>
                <label><?php echo $lang['subj']; ?></label>
                <input type="text" name="subject" class="form-control" style="display:block;border:none;border-bottom:1px solid #ccc;width:100%">
                                    <?php if (isset($erorrs['subject'])) {
    echo  @$erorrs['subject'];
}?>
                </p>
                <p>
                <label><?php echo $lang['msg']; ?></label>
                 <textarea rows='4' name="message" class="form-control" style="display:block;border:none;border-bottom:1px solid #ccc;width:100%"></textarea>
                                     <?php if (isset($erorrs['subject'])) {
    echo  @$erorrs['message'];
}?>
                </p>
                <button class="btn btn-success" type="submit"><?php echo $lang['send']; ?></button>
            </form>
        </div>
        
    </div>
    
        <div class=" row p-3">
            <div class="col-lg-12 col-md-4 col-sm-12  p-3  mt-5 border-top border-info border-3 shadow-lg">
   <dvi style="width:70%" class="float-lg-start flex-grow-1">
        <iframe  src="
https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3847.8249254990865!2d44.18656651467408!3d15.33174668934012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603dbf553314511%3A0xe26a669d2ab8ff26!2z2KfZhNi52KfYqNixINmE2YTYp9iz2KrZitix2KfYrw!5e0!3m2!1sen!2s!4v1635375979699!5m2!1sen!2s
        "  width="100%" height="360" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </dvi>
            <div class="float-lg-end">
            <ul>
                <i class="fas fa-map-marker-alt fa-lg" style="color:#1b75bc">
                    
                </i>
                <span class="mx-2" style="font-weight:900;font-size:30px;margin-right:0"><?php echo $lang["address"]; ?></span>
                
                <p></p>
                <address class="mx-4 my-2" style=" font-weight: normal;font-size:30px;margin-right:15">
<?php if(isset($address)) echo  $address; ?>
                    
                </address>
                <br>
                <i class="fas fa-envelope fa-lg"style="color:#1b75bc">
                </i>
                 <span class="mx-2"style="font-weight:900;font-size:30px"><?php echo $lang["email"]; ?></span>
                    
                    <p></p>
                    <span class="mx-5 my-4" style=" font-weight: normal; margin-left:10">
                        
<?php if(isset($email)) echo  $email; ?>
                    </span>
                <br><br>
                
                <i class="fas fa-phone-alt fa-lg"style="color:#1b75bc">
                </i>
                  <span class="mx-2"style="font-weight:900;font-size:30px"><?php echo $lang["phone"]; ?></span>
                    <p></p>
                    <span class="mx-4 my-4" style=" font-weight: normal; margin-right:10">
                        
<?php if(isset($phone1)) echo  $phone1;?>
                    </span>
            </ul>
            </div>
        <!--<div class="col-lg-8 col-md-8 col-sm-12  p-3 mt-5  shadow-lg" style="float:left">-->
        <!--<div class="col-12 col-md-8 mt-5 " >-->
     
        
        
        </div>
       </div>
       
</div>


<?php include_once("footer.php");?>