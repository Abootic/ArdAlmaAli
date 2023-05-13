<?php
if(isset($_POST['language'])){
	if($_POST['language']=='eng'){
	   if(!isset($_COOKIE["alaberlanguage"])){
			setcookie("alaberlanguage","eng",time()+3600*24*60,"/");
			echo "yes";
	   }
		else if($_COOKIE["alaberlanguage"]!="eng"){
			setcookie("alaberlanguage","eng",time()+3600*24*60,"/");
			echo "yes";
		}
		else{
			echo "no";
		}
			
	}
	else if($_POST['language']=='ar'){
	   if(!isset($_COOKIE["alaberlanguage"])){
			setcookie("alaberlanguage","ar",time()+3600*24*60,"/");
			echo "yes";
	   }
		else if($_COOKIE["alaberlanguage"]!="ar"){
			setcookie("alaberlanguage","ar",time()+3600*24*60,"/");
			echo "yes";
		}
		else{
			echo "no";
		}
}
}// end if
?>