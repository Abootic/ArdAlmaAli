<?php
$dsn="mysql:host=localhost;dbname=ardalmaali;charset=utf8";
//id17210139_aber
$user="root";
$pass="";
$dbname="ardalmaali";
$option=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
$chLang="eng";

try{
$con=new PDO($dsn,$user,$pass,$option);
if(isset($_COOKIE["alaberlanguage"])){
	if($_COOKIE["alaberlanguage"]=="eng" or $_COOKIE["alaberlanguage"]=="ar"){
		$chLang=$_COOKIE["alaberlanguage"];
	}
}
//echo"My DB Is connected";
/*
$getLang=$con->prepare("select value from designetools where tool='language'");
$getLang->execute();
if($getLang->rowcount()){
	$chLang=$getLang->fetch()["value"];
	//echo $chLang;
}
*/
} // end of Try block

catch(PDOException $e)
{
	echo"dssssssssss";
	exit($e->getMessage());
	
}


?>