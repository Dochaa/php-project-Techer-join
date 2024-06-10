<?php
@session_start(); 
include "connect.php";
$start_date=date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0)); 
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
if(!empty($_POST['user']) and !empty($_POST['pass']) and $_POST['button']=='login'){

$sql=mysqli_query($con,"select * from login Where user='".htmlentities($_POST['user'])."' And pass='".htmlentities($_POST['pass'])."'");
	// echo	$num=@mysqli_num_rows($sql); 
			if(@mysqli_num_rows($sql)==1){
				$rs = mysqli_fetch_array($sql);
				$login_id=$rs['id_login'];
				}else{
				exit("<script>alert('Username หรือ Password ไม่ถูกต้อง!');(history.back());</script>");
				}

}


if(!empty($login_id) and !empty($login_id)){
$TABLE='login';
$sql=mysqli_query($con,"select * from $TABLE Where id_login='".htmlentities($login_id)."' ");
	// echo	$num=@mysqli_num_rows($sql); 
			if(@mysqli_num_rows($sql)==1){
				$rs = mysqli_fetch_array($sql);
				$loginID=$rs['id_login'];
				$loginUser=$rs['user'];
		 		$typeLogin = $rs['type'];
				$statusLogin = $rs['status']; 
				$count = ($rs['count']+1);
				
				if($statusLogin=="on"){
					@mysqli_query($con,"update $TABLE set count='".$count."', date='".$DateTime."' Where id_$TABLE='".$loginID."'");
				
					switch($typeLogin){
						case 'admin':
							$_SESSION['sess_login_id'] = $loginID;
							$_SESSION['sess_login_user'] = $typeLogin;
							$_SESSION['sess_user_id'] = session_id();
							exit("<script>alert('ยินดีต้อนรับ ".$_SESSION['sess_login_user']." เข้าระบบ');window.location='index.php';</script>"); 

						break;
						case 'teacher':
							$_SESSION['sess_login_id'] = $loginID;
							$_SESSION['sess_login_user'] = $typeLogin;
							$_SESSION['sess_user_id'] = session_id();
							exit("<script>alert('ยินดีต้อนรับ ".$_SESSION['sess_login_user']." เข้าระบบ');window.location='index.php';</script>"); 
 
						break;
						case 'student':
							$_SESSION['sess_login_id'] = $loginID;
							$_SESSION['sess_login_user'] = $typeLogin;
							$_SESSION['sess_user_id'] = session_id();
							exit("<script>alert('ยินดีต้อนรับ ".$_SESSION['sess_login_user']." เข้าระบบ');window.location='index.php';</script>"); 
 
						break;
						
						exit("ไม่พบข้อมูล $typeLogin");

					}
				
				}else if($statusLogin=="off"){
				exit("<script>alert('ถูกปิดการใช้งานชั่วคราว!');(history.back());</script>");
				}else if($statusLogin=="cancel"){
				exit("<script>alert('ยกเลิกบัญชีผู้ใช้งาน!');(history.back());</script>");
				}else{
				exit("ไม่พบข้อมูล $statusLogin");
				}
				
			}else{
			exit("<script>alert('Username หรือ Password ไม่ถูกต้อง!');(history.back());</script>");
			}
 
}else{
echo "none";
}

if(isset($_POST['button']) and !empty($_POST['button']) and $_POST['button']=='Insert'){
// Field  --------------------------------------------------------------------------------------//
$strFieldLogin = " 
`id_login` ,
`user` ,
`pass` ,
`type` ,
`count` ,
`status` ,
`date` ";

$count = 0;
$statusLogin = "on"; // on , off, cancel
$type="student";

$strValueLogin = " '0', 
					'".htmlentities($_POST['user'], ENT_QUOTES, 'UTF-8')."', 
					'".htmlentities(md5($_POST['pass']), ENT_QUOTES, 'UTF-8')."', 
						'".$type."',
						'".$count."', 
						'".$statusLogin."', 
						'".$DateTime."' "; 

 		//ดึงข้อมูลในตาราง มาตรวจว่ามีข้อมูล่ซ่ำกันหรือไม่
		 $sql=mysqli_query($con,"SELECT * FROM login WHERE user='".htmlentities($_POST['user'], ENT_QUOTES, 'UTF-8')."'");
		if(@mysqli_num_rows($sql)>0){
			exit("<script>alert('ชื่อ Login เข้าระบบ ".htmlentities($_POST['user'], ENT_QUOTES, 'UTF-8')." ถูกใช้งานแล้ว!');(history.back());</script>"); 
			exit();
			} 
//เพิ่มข้อมูลลงในตาราง 
			 $sql2=mysqli_query($con,"INSERT INTO login ($strFieldLogin) VALUES ($strValueLogin)");
				if($sql2){	
				 $last_id = mysqli_insert_id($con);
						// Field  --------------------------------------------------------------------------------------//
							$strField = " `id_user`, `user_name`, `user_address`, `user_tel`, `user_email`, `user_note`, `user_photo`, `user_status`, `user_date` ";
							
						// Value  --------------------------------------------------------------------------------------//	
									$user_status='';
									$address = "".htmlentities($_POST['user_address'], ENT_QUOTES, 'UTF-8')."";
									
									$strValue = "'".$last_id."', 
												'".htmlentities($_POST['user_name'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_address'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_tel'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_email'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_note'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_photo'], ENT_QUOTES, 'UTF-8')."', 
												'".$user_status."', 
												'".$DateTime."' "; 
							// Insert  --------------------------------------------------------------------------------------//		
						 	$sql4=mysqli_query($con,"INSERT INTO user ($strField) VALUES ($strValue) ");
						
							if($sql4){
							exit("<script>alert('บันทึกข้อมูลแล้ว login เข้าระบบได้เลยนะ');window.location='index.php';</script>"); 
							}}

} // end if isset insert

?> 