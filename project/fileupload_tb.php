 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
		$id = $_GET['del_id'];
		$sql =mysqli_query($con,"SELECT * FROM fileupload WHERE id_fileupload = '".$id."'");
		$rs = mysqli_fetch_array($sql);
			$id_fileupload=$rs['id_fileupload'];
			$submit_project_id=$rs['submit_project_id'];
			$s_file_upoad=$rs['s_file_upoad'];
	 		@unlink($s_file_upoad);
 
 
		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM fileupload WHERE id_fileupload ='".$id."'");
		if($sql){
			exit("<script>(history.back());</script>"); 
			exit("<script>alert('บันทึกข้อมูลแล้ว');(history.back());</script>"); 
			exit("<script>window.location='register_project.php';</script>"); 
			} 
 }
 
 ?>