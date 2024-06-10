<?php
function fcDate_eng59($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10,6); //ตัดข้อความ วันที่ออก 2012-08-05 17:35 >  13 ตุลาคม 2562 เวลา 16:34
	$date_array=explode("-",$txt);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$thai_m[$m];
	$y=$y;
	$displaydate_eng="$d $m $y เวลา $time";
	return $displaydate_eng;
}
function shw_time($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35 >  13 ตุลาคม 2562 เวลา 16:34
	$date_array=explode("-",$txt);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$thai_m[$m];
	$y=$y;
	$shwtime="$time";
	return $shwtime;
}
/* Function Date-Time*/
 $strendDate2=date("Y-m-d");
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
	"0"=>"",
	"1"=>"มกราคม",
	"2"=>"กุมภาพันธ์",
	"3"=>"มีนาคม",
	"4"=>"เมษายน",
	"5"=>"พฤษภาคม",
	"6"=>"มิถุนายน",	
	"7"=>"กรกฎาคม",
	"8"=>"สิงหาคม",
	"9"=>"กันยายน",
	"10"=>"ตุลาคม",
	"11"=>"พฤศจิกายน",
	"12"=>"ธันวาคม"					
);
function toexdate($date) {  // 04-09-2018 
	$extdate=explode("-",$date);
	$styear=$extdate[0];
	$stmonth=$extdate[1];
	$stday=$extdate[2] ;
	$intdate=date("$stday-$stmonth-$styear");
	return $intdate;
}
/* Function Date-Time*/
function getcurdate() {
	$curdate=date("Y-m-d");
	return $curdate;	
}
function getcurtime() {
	$curtime=date("H:i:s");
	return $curtime;
}
function tointdate($date) {
	$extdate=explode("-",$date);
	$stday=$extdate[0];
	$stmonth=$extdate[1];
	$styear=$extdate[2]+543;
	$intdate=date("$styear-$stmonth-$stday");
	return $intdate;
}
function sqltodate1($date) { // ex> 05/09/2561 > 2018-09-05 
	$extdate=explode("/",$date);
	$stday=$extdate[0];
	$stmonth=$extdate[1];
	$styear=$extdate[2]-543;
	$intdate= date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("$stmonth")+0 , date("$stday")+0, date("$styear")+0));
	return $intdate;
}
function sqltodate2($date) { // ex> 05/09/2561 > 2018-09-05  
	$extdate=explode("/",$date);
	$stday=$extdate[0];
	$stmonth=$extdate[1];
	$styear=$extdate[2]-543;
	$intdate= date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("$stmonth")+0 , date("$stday")+0, date("$styear")+0));
	return $intdate;
}
function shwdate($date) { // ex> 2018-09-05 >  08-03-2019
	$extdate=explode("-",$date);
	$stday=$extdate[2];
	$stmonth=$extdate[1];
	$styear=$extdate[0];
	$intdate= date("d-m-Y", mktime(date("H")+0, date("i")+0, date("s")+0, date("$stmonth")+0 , date("$stday")+0, date("$styear")+0));
	return $intdate;
}
function shwdate_time($date) { // ex> 2018-09-05 >  08-03-2019
	$extdate=explode("-",$date);
	$stday=$extdate[2];
	$stmonth=$extdate[1];
	$styear=$extdate[0];
	$intdate= date("d-m-Y : H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("$stmonth")+0 , date("$stday")+0, date("$styear")+0));
	return $intdate;
}
function shwinputdate($date) { // ex>  
	$extdate=explode("-",$date);
	$stday=$extdate[2];
	$stmonth=$extdate[1];
	$styear=$extdate[0]+543;
	$intdate= date("$stday/$stmonth/$styear");
	return $intdate;
}
function thai_date59($time){
	global $thai_day_arr,$thai_month_arr;
	$thai_date_return="วัน".$thai_day_arr[date("w",$time)];
	$thai_date_return.=	"ที่ ".date("j",$time);
	$thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
	$thai_date_return.=	" พ.ศ.".(date("Y",$time)+543);
	$thai_date_return.=	"  ".date("H:i")." น.";
	return $thai_date_return;
}
function Enddatediff($strendDate1,$strendDate2) { 
	if($strendDate1 < $strendDate2){exit();}} // 1 Hour =  60*60 28/4/2559
 function TimeDiff($strTime1,$strTime2) {
	return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	}
 $strendDate1=date("2024-03-03");
Enddatediff($strendDate1,$strendDate2);
$dateToday=date("Y-m-d");	
?>
<?php
//echo cutStr($prd_name,'17','...'); 	ฟังชั่นตัดคำ
 function cutStr($str, $maxChars='', $holder=''){

    if(strlen($str) > $maxChars ){
			$str = iconv_substr($str, 0, $maxChars,"UTF-8") . $holder;
	} 
	return $str;
} 
?>
<?php
function urlpage2($srturl) {  
			//---- url แบบมีขีดกลาง -------------
			$txtary=explode(" ",trim($srturl));
		 	$cx=count($txtary);
			for($ix=0; $ix<$cx; $ix++){
			$xx='-';
			echo $txtary[$ix]."$xx";
			}
			//---- url แบบมีขีดกลาง ------------ 
		}

 function urlpage($string){
	return preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-' ,str_replace('&', '-and-', $string));
    }
  function urlpageTh($string2){
		  $txtary=explode("-",trim($string2));
		 	$cx=count($txtary);
			for($ix=0; $ix<$cx; $ix++){
		//    $url22= $url22 .' '.$txtary[$ix];
			}
	//   return $url22;
 
    }
 ?>