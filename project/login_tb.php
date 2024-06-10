 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
$ID=$_GET['del_id'];

		$sql2 =mysqli_query($con,"SELECT * FROM login WHERE id_login= '".$ID."'");
		$rs2 = mysqli_fetch_array($sql2);
		$stt=$rs2['type'];

		$sql =mysqli_query($con,"SELECT * FROM user WHERE id_user= '".$ID."'");
		$rs = mysqli_fetch_array($sql);
 
	 	@unlink("photo/".$rs['user_photo']);
		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM login WHERE id_login='".$ID."'");
		if($sql){
		@mysqli_query($con,"DELETE FROM user WHERE id_user='".$ID."'");
		if($stt=='teacher'){
			exit("<script>window.location='user_teacher.php';</script>"); 
			}else{
			exit("<script>window.location='user_student.php';</script>"); 
			}
		
		} 
 }
 
 
if($_POST){
@session_start(); 
include "connect.php";
$Dates=date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0)); 
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
}



 
if(isset($_POST['Sql']) and !empty($_POST['Sql'])){
 		$FileName 	= $_FILES['FileUpload'] ['name'];
		$Filetype 		= $_FILES['FileUpload'] ['type'];
		$FileSize 		= $_FILES['FileUpload'] ['size'];
		$FileUpLoadtmp = $_FILES['FileUpload'] ['tmp_name'];	
			if($FileUpLoadtmp){					 
				$array_last = explode(".",$FileName); // เป็น array หาจำนวน จุด . ของชื่อตัวแปร์		
				$c = count($array_last) - 1; //นับจำนวน จุด "." ของชื่อตัวแปร์ 
				$lname = strtolower($array_last [$c]); // หา นามสกุลไฟล์ ตัวสุดท้ายของ ตัวแปร์
				$NewFileupload = date("U"); 
				$NewFile = $NewFileupload.".$lname"; //รวม ชื่อและนามสกลุดไฟล์เข้าด้วยกัน 
				}
 }
 
 
if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='add'){
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

if(!empty($_POST['user_type'])){
$type=$_POST['user_type'];
}else{
$type="student";
}

$strValueLogin = " '0', 
					'".htmlentities($_POST['user'], ENT_QUOTES, 'UTF-8')."', 
					'".htmlentities($_POST['pass'], ENT_QUOTES, 'UTF-8')."', 
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
									$user_status='1';
									$address = "".htmlentities($_POST['user_address'], ENT_QUOTES, 'UTF-8')."";
									
									$strValue = "'".$last_id."', 
												'".htmlentities($_POST['user_name'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_address'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_tel'], ENT_QUOTES, 'UTF-8')."', 
												'".htmlentities($_POST['user_email'], ENT_QUOTES, 'UTF-8')."', 
												'".$_POST['user_note']."', 
												'".$NewFile."', 
												'".$user_status."', 
												'".$DateTime."' "; 
							// Insert  --------------------------------------------------------------------------------------//		
						 	$sql4=mysqli_query($con,"INSERT INTO user ($strField) VALUES ($strValue) ");
						
							if($sql4){
							
							$last_id = mysqli_insert_id($con);
								if($lname=="gif" or $lname=="jpg" or $lname=="jpeg" or $lname=="png"){
									@move_uploaded_file($FileUpLoadtmp, "photo/".$NewFile);					
									}	
							
							if($_SESSION['sess_login_user']=='admin'){
							exit("<script>alert('บันทึกข้อมูลแล้ว');(history.back());</script>"); 
							}else{
							exit("<script>alert('บันทึกข้อมูลแล้ว login เข้าระบบได้เลยนะ');window.location='index.php';</script>"); 
							}
							
							
							}}

} // end if isset insert
 
 
 if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='edit'){
 
if(!empty($_POST['id'])){

$id=$_POST['id'];
		$strCondition =  " id_user='".$id."' ";
 
		$strCommand = "`user_name` = '".$_POST['user_name']."', 
								`user_code` = '".trim($_POST['user_code'])."', 
									`user_address` = '".trim($_POST['user_address'])."', 
									`user_tel` = '".$_POST['user_tel']."', 
									`user_email` = '".$_POST['user_email']."', 
									`user_note` = '".$_POST['user_note']."' ";
		
			$sql=mysqli_query($con,"Update user Set  $strCommand Where $strCondition ");
	 
			if($sql){	
			
						if($lname=="gif" or $lname=="jpg" or $lname=="jpeg" or $lname=="png"){
		
									if(move_uploaded_file($FileUpLoadtmp, "photo/".$NewFile)){ 
										 @unlink("photo/".$_POST['photo']);
										 @mysqli_query($con,"UPDATE user SET user_photo='".$NewFile."' WHERE id_user='".$id."'");
									}else{
										echo "NO sucsess <br />";
						}}
			
			
				exit("<script>(history.back());</script>");
				 exit("<script>window.location='#';</script>");	
				}else{
				echo "บันทึกข้อมูลไม่ได้ <br /> Update $Table Set  $strCommand Where $strCondition";exit();
				}


}
 
 
 
 } // end if isset edit
 
if(!empty($_POST['Sql']) and $_POST['Sql']=='repass'){
include "session.php"; 
include "connect.php";

if(strlen($_POST['txt_newpass'])<4){
		exit("<script>alert('รหัสผ่านไม่ควรน้อยกว่า 4 ตัวอักษร !');(history.back());</script>"); 
		}
$TABLE='login';
$sql=mysqli_query($con,"Select * FROM $TABLE WHERE pass='".htmlentities($_POST['txt_oldpass'])."' AND id_login='".$_SESSION['sess_login_id']."'");
	if(@mysqli_num_rows($sql)==1){
		$sql=mysqli_query($con,"Update $TABLE SET pass='".htmlentities($_POST['txt_newpass'])."' WHERE id_login='".$_SESSION['sess_login_id']."'");
			if($sql){
				 exit("<script>alert('ทำรายการสำเร็จ');window.location='profile.php?id=".$_SESSION['sess_login_id']."';</script>");	
				}else{
				echo "บันทึกข้อมูลไม่ได้ <br /> Update $TABLE SET pass='".htmlentities(md5($_POST['txt_newpass']))."' WHERE id_login='".$_SESSION['sess_login_id']."";exit();
				/*	exit("<script>alert('เปลี่ยนรหัสผ่านไม่ได้!');(history.back());</script>"); */
				}
	}else{
	exit("<script>alert('error : รหัสผ่านไม่ถูกต้อง!');(history.back());</script>");
	}
}
 

		
		
$id_login=$rs['id_login'];
$user=$rs['user'];
$pass=$rs['pass'];
$type=$rs['type'];
$count=$rs['count'];
$status=$rs['status'];
$date=$rs['date'];

if(!empty($id_login)){
unset($sql);
$sql =mysqli_query($con,"SELECT * FROM user WHERE id_user= '".$id_login."'");
$rs = mysqli_fetch_array($sql);

$id_user=$rs['id_user'];
$login_name=$rs['user_name'];
$user_code=$rs['user_code'];
$user_name=$rs['user_name'];
$user_address=$rs['user_address'];
$user_tel=$rs['user_tel'];
$user_email=$rs['user_email'];
$user_note=$rs['user_note'];
$user_photo=$rs['user_photo'];
$user_status=$rs['user_status'];
if($user_status=='1'){
$user_rgt_status=' <span class="w3-tag w3-green">ว่าง</span> ';
}else{
$user_rgt_status=' <span class="w3-tag w3-red">ไม่ว่าง</span> ';
}
$user_date=shwinputdate($rs['user_date']);
}






 
?>
