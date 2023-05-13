<?php
include_once("../db.php");
$host="localhost";
/*
$db=new DbConnect();
$pdo= $db->db();
$host=DbConnect::DB_HOST;
$user=DbConnect::DB_USER;
$dbn=DbConnect::DB_NAME;
$pass=DbConnect::DB_PASSWORD;
*/
$bkp= $dbname . date("Y-m-d-H-i-s") . ".sql";
$cmd= "mysqldump -u $user --password=$pass $dbname > $bkp";

if(isset($_POST["submit"])){
    if(@$_POST["backup"]=="yes"){
        //$sql = "SELECT * INTO OUTFILE /tmp/bdbkp.sql FROM companies";  
     $filename = "backup-" . date("d-m-Y") . ".sql";
     //$mime = "application/x-gzip";
     //header( "Content-Type: " . $mime );
     //header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
     //$cmd = "mysqldump -u $user --password=$pass $dbname > $filename";
     exec($cmd);
     //passthru( $cmd );
        
       //echo "<h3> $res</h3>";
       
       echo "<h3> backed success</h3>";
      // else   echo "<h3> not done</h3>";
    }
    else{
        echo "<h3> not backed</h3>";
    }
}
?>

<html>
<h3> <?php echo " "; ?></h3>

<form action="" method="post">
Want backup? <input type="text" name="backup" value="yes" id="backup" />
<input type="submit" name="submit" value="send" />
</form>
</html>