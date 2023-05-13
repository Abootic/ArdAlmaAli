<?php
//require("../db.php");
$check=0;//integer var used in isClear() function to counts number of wrong characters
//Function to Refresh pages every time
function Refresh($page,$minutes){
	$minutes*=6666;
	echo "<meta http-equiv='refresh' content='$minutes; url=$page' />";
}
//############### change language #############
if($chLang=="eng"){
	$langSec=array(
	"now"=>'Now', "minute"=>'Minute(s)', "hour"=>'Hour(s)', "day"=>'Day(s)', "month"=>'Month(s)',
	"and"=>'and', "year"=>'More Than 1 Year(s)', "dntUse"=>'Do not use sympoles like', ""=>'', ""=>''
	);
}
else if($chLang=="ar"){
	$langSec=array(
	"now"=>'الاْن', "minute"=>'دقيقة', "hour"=>'ساعة', "day"=>'يوم', "month"=>'شهر',
	//"now"=>'الاْن', "minute"=>'دقيقة', "hour"=>'ساعة', "day"=>'يوم', "month"=>'شهر',
	"and"=>'و', "year"=>'سنة', "dntUse"=>'لا تستخدم احد هذه الاشكال', ""=>'', ""=>''
	);
}

//############### End of change language #############


//Function to calculate date
function diffMinutes($objDate){
	$d1=strtotime(date($objDate));
	$d2=time()+60*60;
	return floor(($d2-$d1)/60);
	
}
//$h=round(1410/60);
//echo "$h hours";
// function to print foe examble (since 2 days)
function calculateDate($addDate){
	global $langSec;
	$duration=diffMinutes($addDate);
	if($duration==0){
		return $langSec["now"];
	}else if($duration>0 and $duration<60){
		return "$duration $langSec[minute]";
	}
	else if($duration>=60 and $duration<1440){
		$h=round($duration/60);
		return "$h $langSec[hour]";
	}
	else if($duration>=1440 and $duration<43200){
		$d=round($duration/1440);
		return "$d $langSec[day]";
	}
	else if($duration>=43200 and $duration<518400){
		$m=round($duration/43200);
		$d=round(($duration%43200)/1440);
		if($d>0)
			return "$m $langSec[month] $langSec[and] $d $langSec[day]";
		else
			return "$m $langSec[month]";
	}
	else{
		return "$langSec[year]";
	}
}

// Function to hash id 
function encript_id($getid)
{
  return  @$hash_id=base64_encode($getid."MY_SECRET_STUFF");
}
// Function to unhash id 
function decript_id($decritid)
{
	@$id=base64_decode($decritid);

	return @$id=preg_replace(sprintf('/%s/',"MY_SECRET_STUFF"),'',$id);

}
// Function to Saitize User's Input

function Sanitize(&$arr){
	$arrChars=array("'","\\","\"","^","<",">","?","%",";","(",")","$","*","--","--","!","=","+");
	foreach($arr as $index=>$item){
		 $arr[$index]=str_replace($arrChars,'',$arr[$index]);
		$arr[$index]=strip_tags($arr[$index]);
		$arr[$index]=filter_var($arr[$index],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	}
}
//=============End
// Function to Saitize User's Input
function SanitizeGet(&$arr){
	$arrChars=array(" ","'","\\","\"","/","<",">","?","%",";","(",")","$","*","-","--","!","=","+",".","@","&","or",",","~","`","#");
	foreach($arr as $index=>$item){
		 $arr[$index]=str_replace($arrChars,'',$arr[$index]);
		$arr[$index]=strip_tags($arr[$index]);
		$arr[$index]=filter_var($arr[$index],FILTER_SANITIZE_STRING);
	}
}
//=============End 

// This fuction to HAshing user Password (String)

function HashPass($inputVar){
	@$co=10;
	@$inputVar = password_hash($inputVar,PASSWORD_DEFAULT);
	@$revers="";
	for($i=10;$i<20;$i++){
		$revers.=$inputVar[$i];
	}
	for($i=9;$i>=0;$i--){
		$inputVar[$co]=$revers[$i];
		$co++;
	}
	
	return $inputVar ;
}
// End fuction to test user input (String)


// This fuction to test user input (Numric)

function GetPass($inputVar,$pass){
	$co=10;
	$revers="";
	for($i=10;$i<20;$i++){
		$revers.=$pass[$i];
	}
	for($i=9;$i>=0;$i--){
		$pass[$co]=$revers[$i];
		$co++;
	}
	if(password_verify($inputVar,$pass))
			  {
				  return true;
				
			  }
			  else
				  return false;
}
// End fuction to test user input (Numric)

// Function to validate inputs
function isClear($inpArr,&$errArr,&$co){
	global $langSec;
		$arrChars=array("%","\\","\"","^","<",">","?","'",";","(",")","$","*","-","!","=","+");
		$errMsg="";
		foreach($arrChars as $char){
			$errMsg.=$char.' ';
		}
		foreach($inpArr as $index=>$item){
		str_replace($arrChars,'',$inpArr[$index],$co);
		 if($co>0){
			 $errArr[$index.'5']="<span style='color:red'><b>$langSec[dntUse]: $errMsg</b></span>";
			 $co=0;
		 }
		}  // end of foreach	 
}  // end of isClear() function 

// This fuction to test if the input exsist befor

function testExsist($tableName,$columName,$inputVar){
	global $link;
	$query="SELECT * FROM $tableName";
if(!($result = mysqli_query($link,$query))):
	  print("<p>Function Failed.  Could not execute query/p>");
	 

else:
	 while($row=mysqli_fetch_array($result) ){
			  $colHash=$row[$columName];
			  if(password_verify($inputVar,$colHash))
			  {
				  return true;
				
			  }
			  
	 }
	return false;
	 
endif; // End if ==========
}

// End fuction to test if the input exsist befor
?>
