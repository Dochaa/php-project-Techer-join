 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
$id=$_GET['del_id'];
 
		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM register_project WHERE id_register_project='".$id."'");
		if($sql){
			exit("<script>window.location='register_project.php';</script>"); 
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
 
 
if(isset($_GET['del_sess_id']) and !empty($_GET['del_sess_id'])){
@session_start();  
 			$del_sess_id = $_GET['del_sess_id'];
			for($i=0; $i<count($_SESSION['sess_id']);$i++) {

					if($_SESSION['sess_id'][$i]==$del_sess_id){
					unset($_SESSION['sess_id'][$i]);
					}
			
			} // จบ for
			// ลบ session 
 
			exit("<script>window.location='register_project_add.php';</script>"); 
			
  }
  
  
if(isset($_REQUEST['Sql']) and !empty($_REQUEST['Sql']) and $_REQUEST['Sql']=='cancle_rgt'){
@session_start(); 
unset($_SESSION['sess_rgt_name']);
unset($_SESSION['sess_rgt_detail']);
unset($_SESSION['sess_rgt_open_project_id']);
unset($_SESSION['sess_id']);
 exit("<script>window.location='register_project.php';</script>"); 
 }
 
 if(isset($_REQUEST['Sql']) and !empty($_REQUEST['Sql']) and $_REQUEST['Sql']=='sess_register'){
@session_start(); 
include "connect.php";
$Dates=date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0)); 
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
 
 
 
 
 
 if(!empty($_POST['name'])){
 $_SESSION['sess_rgt_name'] = $_POST['name'];
 }
 if(!empty($_POST['detail'])){
 $_SESSION['sess_rgt_detail'] = $_POST['detail'];
 }
  if(!empty($_POST['open_project_id'])){
 $_SESSION['sess_rgt_open_project_id'] = $_POST['open_project_id'];
 }

 
 if(!empty($_GET['std_id'])){
 $sess_id=$_GET['std_id'];
 }else{
 $sess_id=$_SESSION['sess_login_id'];
 }
 
if(count($_SESSION['sess_id'])=="0"){ 
	 $check=1;
}else if (!in_array($sess_id, $_SESSION['sess_id'])){
	 $check=1;
}

if($check==1){
		$_SESSION['sess_id'][]=$sess_id; 
		}
 
exit("<script>window.location='register_project_add.php';</script>"); 
 }
 
 
if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='confirm_rgt'){
 
 
   $_SESSION['sess_rgt_open_project_id'];
 
 
$sql =mysqli_query($con,"SELECT * FROM open_project WHERE id_open_project= '".$_SESSION['sess_rgt_open_project_id']."'");
$rs = mysqli_fetch_array($sql);
  $opj_admin_id=$rs['admin_id'];
 

	// Field  --------------------------------------------------------------------------------------//
		$strField = " `id_register_project`, `open_project_id`, `admin_id`, `name`, `detail`, `dates`, `status`";
		
	// Value  --------------------------------------------------------------------------------------//	
				$status='off';
				$strValue = " '0', 
							'".$_SESSION['sess_rgt_open_project_id']."', 
							'".$opj_admin_id."', 
							'".$_SESSION['sess_rgt_name']."', 
							'".$_SESSION['sess_rgt_detail']."', 
							'".$Dates."', 
							'".$status."' "; 
		// Insert  --------------------------------------------------------------------------------------//		
		$sql=mysqli_query($con,"INSERT INTO register_project ($strField) VALUES ($strValue) ");
	
		if($sql){

			$last_id = mysqli_insert_id($con);
			$status='1';
			for($i=0;$i<count($_SESSION['sess_id']);$i++){
			
				$sql2 =mysqli_query($con,"SELECT * FROM user WHERE id_user= '".$_SESSION['sess_id'][$i]."'");
				$rs = mysqli_fetch_array($sql2);
				$user_name=$rs['user_name'];

				$sql2 = mysqli_query($con,"INSERT INTO register_project_detail VALUES
						('0', 
						'".$last_id."', 
						'".$_SESSION['sess_id'][$i]."', 
						'".$user_name."',
						'".$status."')");
				@mysqli_query($con,"Update user SET user_status='2' WHERE id_user='".$_SESSION['sess_id'][$i]."'");		
		
			}
			
unset($_SESSION['sess_rgt_name']);
unset($_SESSION['sess_rgt_detail']);
unset($_SESSION['sess_rgt_open_project_id']);
unset($_SESSION['sess_id']);
 exit("<script>window.location='register_project.php';</script>"); 
			
		}			 

 }
 
 
$id=$id_register_project=$rs['id_register_project'];
$rgt_open_project_id=$rs['open_project_id'];
$rgt_admin_id=$rs['admin_id'];
 $rgt_name=$rs['name'];
$rgt_detail=$rs['detail'];
$rgt_dates=$rs['dates'];
$rgt_dates=shwinputdate($rs['dates']);
$rgt_status=$rs['status'];
 

if($rgt_status=='on'){
$txt_status=' <span class="w3-tag w3-green">อนุนมัติแล้ว</span> ';
}else if($rgt_status=='off'){
$txt_status=' <span class="w3-tag w3-red">รออนุมัติ</span> ';
}else if($rgt_status=='cancle'){
$txt_status=' <span class="w3-tag w3-dark-grey">ไม่อนุมัติ</span> ';
}else if($rgt_status=='schedule'){
$txt_status=' <span class="w3-tag w3-deep-orange">นัดสอบ</span> ';
}else if($rgt_status=='success'){
$txt_status=' <span class="w3-tag w3-indigo">ผ่านแล้ว</span> ';
}else if($rgt_status=='no_success'){
$txt_status=' <span class="w3-tag w3-dark-grey">ไม่ผ่าน</span> ';
}

 
if(!empty($id_register_project)){
$sql2 =mysqli_query($con,"SELECT * FROM register_project_detail WHERE register_project_id= '".$id_register_project."'");
$rgt_number_std=mysqli_num_rows($sql2);
$rs = mysqli_fetch_array($sql2);

$id_register_project_detail=$rs['id_register_project_detail'];
$register_project_id=$rs['register_project_id'];
$rgtd_user_id=$rs['user_id'];
$rgtd_name=$rs['name'];
$rgtd_status=$rs['status'];
 
}
 

if(!empty($rgt_open_project_id)){
$sql3 =mysqli_query($con,"SELECT * FROM open_project WHERE id_open_project= '".$rgt_open_project_id."'");
$rs = mysqli_fetch_array($sql3);

$id=$id_open_project=$rs['id_open_project'];
$opj_admin_id=$rs['admin_id'];
$opj_name=$rs['name'];
$opj_number=$rs['number'];
$opj_year=$rs['year'];
 
 
 
 
}

if(!empty($rgt_admin_id)){
$sql4 =mysqli_query($con,"SELECT * FROM user WHERE id_user= '".$rgt_admin_id."'");
$number_std=mysqli_num_rows($sql4);
$rs = mysqli_fetch_array($sql4);
$rgt_admin_name=$rs['user_name'];
 
 
}

 
?>
