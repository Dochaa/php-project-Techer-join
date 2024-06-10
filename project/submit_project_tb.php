 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
$id=$_GET['del_id'];
 
		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM submit_project WHERE id_submit_project='".$id."'");
		if($sql){
			
			exit("<script>alert('บันทึกข้อมูลแล้ว');(history.back());</script>"); 
			exit("<script>window.location='register_project.php';</script>"); 
			} 
 }
 
 
if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='edit'){
@session_start(); 
include "connect.php";
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));

	if(!empty($_POST['id'])){
	$id=$_POST['id'];
	$status='1';
		$strCondition =  " id_submit_project='".$id."' ";
		$strCommand = "`user_id` = '".$_POST['user_id']."', 
									`sp_name` = '".$_POST['sp_name']."', 
									`sp_title` = '".$_POST['sp_title']."', 
									`sp_detail` = '".$_POST['sp_detail']."', 
									`sp_dates` = '".$DateTime."', 
									`sp_status` = '".$status."' ";
										
$sql=mysqli_query($con,"Update submit_project Set  $strCommand Where $strCondition ");

if($sql){
	$last_id =$id;
	include "inc-file.php";
	// Value  --------------------------------------------------------------------------------------//	
	$strField = "`id_fileupload`, `submit_project_id`, `comment_id`, `f_name`, `f_file_upoad`, `f_file_type`, `f_dates`";
 
				
				    $nfile =  count($Newfile_upload);
					$folderUpload = "upload/";
					$comment_id="";
				  if($nfile>0){
					for($f=0; $f<$nfile; $f++){
					// Value  --------------------------------------------------------------------------------------//					
						$strValue = " '0', 
						'".$last_id."', 
						'".$comment_id."', 
						'".$rename_file[$f]."', 
						'".$folderUpload.$Newfile_upload[$f]."', 
						'".$f_file_type."', 
						'".$DateTime."' "; 
				 @mysqli_query($con,"INSERT INTO fileupload  ($strField) VALUES ($strValue) ");
				@move_uploaded_file($FileTmp[$f], $folderUpload."/".iconv('UTF-8','windows-874',$Newfile_upload[$f]));
						}
					} 
					
				exit("<script>window.location='register_project_detail.php?id=".$_POST['rgt_id']."&link=submit_project_detail&sbt_id=".$id."#".$id."';</script>"); 		
				
									
					}else{
					echo "บันทึกข้อมูลไม่ได้ <br /> Update $Table Set  $strCommand Where $strCondition";exit();
					}

	
	}
 }
	// end edit  --------------------------------------------------------------------------------------//		
 
 
if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='add'){
@session_start(); 
include "connect.php";
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));

// Field  --------------------------------------------------------------------------------------//
	$strField = "`id_submit_project`, `register_project_id`, `user_id`, `sp_name`, `sp_title`, `sp_detail`, `sp_dates`, `sp_status`";
	
// Value  --------------------------------------------------------------------------------------//	
			$status='1';
 
			
			$strValue = "'0', 
						'".$_POST['register_project_id']."', 
						'".$_POST['user_id']."', 
						'".$_POST['sp_name']."', 
						'".trim($_POST['sp_title'])."', 
						'".$_POST['sp_detail']."', 
						'".$DateTime."', 
						'".$status."' "; 
	// Insert  --------------------------------------------------------------------------------------//		
 $sql=mysqli_query($con,"INSERT INTO submit_project ($strField) VALUES ($strValue) ");
	if($sql){
	$last_id = mysqli_insert_id($con);
	include "inc-file.php";
	// Value  --------------------------------------------------------------------------------------//	
	$strField = "`id_fileupload`, `submit_project_id`, `comment_id`, `f_name`, `f_file_upoad`, `f_file_type`, `f_dates`";
 
	
				    $nfile =  count($Newfile_upload);
					$folderUpload = "upload/";
					$comment_id="";
				  if($nfile>0){
					for($f=0; $f<$nfile; $f++){
					// Value  --------------------------------------------------------------------------------------//					
						$strValue = " '0', 
						'".$last_id."', 
						'".$comment_id."', 
						'".$rename_file[$f]."', 
						'".$folderUpload.$Newfile_upload[$f]."', 
						'".$f_file_type."', 
						'".$DateTime."' "; 
				 @mysqli_query($con,"INSERT INTO fileupload  ($strField) VALUES ($strValue) ");
				@move_uploaded_file($FileTmp[$f], $folderUpload."/".iconv('UTF-8','windows-874',$Newfile_upload[$f]));
						}
					} 
exit("<script>window.location='register_project_detail.php?id=".$_POST['register_project_id']."&link=submit_project_detail&sbt_id=".$last_id."#".$last_id."';</script>"); 		
			
	}else{
	echo("Error : " . mysqli_error($con));
	}
 }
 
 
if(empty($_POST['Sql'])){

$id_submit_project=$rs['id_submit_project'];
$register_project_id=$rs['register_project_id'];
$user_id=$rs['user_id'];
$sbt_userid=$rs['user_id'];
 $sp_name=$rs['sp_name'];
$sp_title=$rs['sp_title'];
$sp_detail=$rs['sp_detail'];
$sp_dates=shwinputdate($rs['sp_dates']);
$sp_status=$rs['sp_status'];



if($sp_status=='1'){
$txt_sp_status=' <span class="w3-tag w3-red">รอตรวจ</span> ';
}else if($sp_status=='2'){
$txt_sp_status=' <span class="w3-tag w3-green">ตรวจแล้ว</span> ';
}else if($sp_status=='3'){
$txt_sp_status=' <span class="w3-tag w3-sand">รับทราบ</span> ';
}

if(!empty($user_id)){
$sql4 =mysqli_query($con,"SELECT * FROM user WHERE id_user= '".$user_id."'");
$rs = mysqli_fetch_array($sql4);
$s_user=$rs['user_name'];
}

if(!empty($register_project_id)){
$sql4 =mysqli_query($con,"SELECT * FROM register_project WHERE id_register_project= '".$register_project_id."'");
$rs = mysqli_fetch_array($sql4);
$sp_register_project=$rs['name'];
}
 
}

?>
