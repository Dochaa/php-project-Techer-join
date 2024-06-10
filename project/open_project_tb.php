 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
$id=$_GET['del_id'];
 
 $sql1 =mysqli_query($con,"SELECT * FROM open_project WHERE id_open_project= '".$id."'");
 if(@mysqli_num_rows($sql1)>0){
$rs = mysqli_fetch_array($sql1);
$admin_id=$rs['admin_id'];
}
 
		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM open_project WHERE id_open_project='".$id."'");
		if($sql){
		

		$sql1 =mysqli_query($con,"SELECT * FROM register_project WHERE open_project_id= '".$id."' and admin_id= '".$admin_id."'  ");
		if(@mysqli_num_rows($sql1)>0){
		$rs = mysqli_fetch_array($sql1);
		$id_register_project=$rs['id_register_project'];
		
		}
		
		
			$sql44 =mysqli_query($con,"SELECT * FROM register_project_detail WHERE register_project_id= '".$id_register_project."'");
				if(@mysqli_num_rows($sql44)>0){
				while($rs = mysqli_fetch_array($sql44)){
				$user_id=$rs['user_id'];
				@mysqli_query($con,"Update user SET user_status='1' WHERE id_user='".$user_id."'");	
				@mysqli_query($con,"Update register_project_detail SET status='2' WHERE user_id='".$user_id."'");	
				}}
		
		@mysqli_query($con,"DELETE FROM register_project WHERE id_register_project='".$id_register_project."'");
		@mysqli_query($con,"DELETE FROM register_project_detail WHERE register_project_id='".$id_register_project."'");
		
			exit("<script>window.location='open_project.php';</script>"); 
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
							$strField = " `id_open_project`, `admin_id`, `name`, `number`, `year`, `detail`, `dates`, `status`";
							
						// Value  --------------------------------------------------------------------------------------//	
									$status='on';
									$strValue = " '0', 
												'".$_POST['admin_id']."', 
												'".$_POST['name']."', 
												'".$_POST['number']."', 
												'".$_POST['year']."', 
												'".$_POST['detail']."', 
												'".$Dates."', 
												'".$status."' "; 
							// Insert  --------------------------------------------------------------------------------------//		
						 	$sql=mysqli_query($con,"INSERT INTO open_project ($strField) VALUES ($strValue) ");
						
							if($sql){
							
							$last_id = mysqli_insert_id($con);
							exit("<script>window.location='open_project.php';</script>"); 
 							}else{
							echo("Error : " . mysqli_error($con));
							}

} // end if isset insert
 
 
 if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='edit'){
	if(!empty($_POST['id'])){
	$id=$_POST['id'];
		$strCondition =  " id_open_project='".$id."' ";
		$strCommand = "`number` = '".$_POST['number']."', 
									`year` = '".trim($_POST['year'])."', 
									`status` = '".$_POST['status']."', 
									`detail` = '".$_POST['detail']."', 
									`dates` = '".$Dates."' ";
										
				$sql=mysqli_query($con,"Update open_project Set  $strCommand Where $strCondition ");
					if($sql){	
					 exit("<script>window.location='open_project_detail.php?id=".$id."';</script>");	
						exit("<script>(history.back());</script>");
						
						}else{
						echo "บันทึกข้อมูลไม่ได้ <br /> Update $Table Set  $strCommand Where $strCondition";exit();
						}
	}
 } // end if isset edit
 
 
		
$id=$id_open_project=$rs['id_open_project'];
$opj_admin_id=$rs['admin_id'];
$opj_name=$rs['name'];
$opj_number=$rs['number'];
$opj_year=$rs['year'];
$opj_detail=$rs['detail'];
$opj_dates=shwinputdate($rs['dates']);
$chk_status=$rs['status'];
$opj_status=$rs['status'];

if($opj_status=='on'){
//	$opj_status=' <a  style="text-decoration:none;" href="open_project_detail.php?id='.$id.' "><span class="w3-tag w3-green">เปิด</span></a> ';
$opj_status=' <span class="w3-tag w3-green">เปิด</span> ';
}else{
	$opj_status=' <span class="w3-tag w3-red">ปิด</span> ';
}

if(!empty($id_open_project)){
$sql =mysqli_query($con,"SELECT * FROM register_project WHERE  status in('off', 'cancle') and open_project_id= '".$id_open_project."'");
$number_regster=mysqli_num_rows($sql);
}

if(!empty($id_open_project)){
$sql =mysqli_query($con,"SELECT * FROM register_project WHERE status in('on', 'success','schedule','no_success')  and open_project_id= '".$id_open_project."'");
$number_approve=mysqli_num_rows($sql);
}
 





 
?>
