 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
$id=$_GET['del_id'];
 
		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM comment WHERE id_comment='".$id."'");
		if($sql){
			exit("<script>(history.back());</script>"); 
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
		$strCondition =  " id_comment='".$id."' ";
		$strCommand = "`admin_id` = '".$_POST['admin_id']."', 
									`c_name` = '".$_POST['c_name']."', 
									`cmt_detail` = '".$_POST['cmt_detail']."', 
									`cmt_dates` = '".$DateTime."', 
									`cmt_status` = '".$status."' ";
										
$sql=mysqli_query($con,"Update comment Set  $strCommand Where $strCondition ");

if($sql){
	$last_id =$id;
	include "inc-file.php";
	// Value  --------------------------------------------------------------------------------------//	
	$strField = "`id_fileupload`, `submit_project_id`, `comment_id`, `f_name`, `f_file_upoad`, `f_file_type`, `f_dates`";
 
				
				    $nfile =  count($Newfile_upload);
					$folderUpload = "upload/";
					$ss_id="";
				  if($nfile>0){
					for($f=0; $f<$nfile; $f++){
					// Value  --------------------------------------------------------------------------------------//					
						$strValue = " '0', 
						'".$ss_id."', 
						'".$last_id."', 
						'".$rename_file[$f]."', 
						'".$folderUpload.$Newfile_upload[$f]."', 
						'".$f_file_type."', 
						'".$DateTime."' "; 
				 @mysqli_query($con,"INSERT INTO fileupload  ($strField) VALUES ($strValue) ");
				@move_uploaded_file($FileTmp[$f], $folderUpload."/".iconv('UTF-8','windows-874',$Newfile_upload[$f]));
						}
					} 
					
	exit("<script>window.location='register_project_detail.php?id=".$_POST['rgt_id']."&link=submit_project_detail&sbt_id=".$_POST['submit_project_id']."&cmt_id=".$last_id."#".$last_id."';</script>"); 	
				
									
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
	$strField = "`id_comment`, `submit_project_id`, `admin_id`, `c_name`, `cmt_detail`, `cmt_dates`, `cmt_status`";
	
// Value  --------------------------------------------------------------------------------------//	
			$status='1';
 
			
			$strValue = "'0', 
						'".$_POST['submit_project_id']."', 
						'".$_POST['admin_id']."', 
						'".$_POST['c_name']."', 
						'".$_POST['cmt_detail']."', 
						'".$DateTime."', 
						'".$status."' "; 
	// Insert  --------------------------------------------------------------------------------------//		
 $sql=mysqli_query($con,"INSERT INTO comment  ($strField) VALUES ($strValue) ");
	if($sql){
	$last_id = mysqli_insert_id($con);
	@mysqli_query($con,"Update submit_project  SET sp_status='2' WHERE id_submit_project='".$_POST['submit_project_id']."'");		
	
	
	include "inc-file.php";
	// Value  --------------------------------------------------------------------------------------//	
	$strField = "`id_fileupload`, `submit_project_id`, `comment_id`, `f_name`, `f_file_upoad`, `f_file_type`, `f_dates`";
 
	
				    $nfile =  count($Newfile_upload);
					$folderUpload = "upload/";
					$ss_id="";
				  if($nfile>0){
					for($f=0; $f<$nfile; $f++){
					// Value  --------------------------------------------------------------------------------------//					
						$strValue = " '0', 
						'".$ss_id."', 
						'".$last_id."', 
						'".$rename_file[$f]."', 
						'".$folderUpload.$Newfile_upload[$f]."', 
						'".$f_file_type."', 
						'".$DateTime."' "; 
				 @mysqli_query($con,"INSERT INTO fileupload  ($strField) VALUES ($strValue) ");
				@move_uploaded_file($FileTmp[$f], $folderUpload."/".iconv('UTF-8','windows-874',$Newfile_upload[$f]));
						}
					} 

	exit("<script>window.location='register_project_detail.php?id=".$_POST['rgt_id']."&link=submit_project_detail&sbt_id=".$_POST['submit_project_id']."&cmt_id=".$last_id."#".$last_id."';</script>"); 	
	}else{
	echo("Error : " . mysqli_error($con));
	}
 }
 
 
if(empty($_POST['Sql'])){
	$strField = "`id_comment`, `submit_project_id`, `admin_id`, `c_name`, `cmt_detail`, `cmt_dates`, `cmt_status`";
$id_comment=$rs['id_comment'];
$submit_project_id=$rs['submit_project_id'];
$admin_id=$rs['admin_id'];
$c_name=$rs['c_name'];
$cmt_detail=$rs['cmt_detail'];
$cmt_status=$rs['cmt_status'];
$cmt_dates=shwinputdate($rs['cmt_dates']);
 
 
 
}

?>
