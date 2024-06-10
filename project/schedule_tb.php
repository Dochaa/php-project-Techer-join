 <?php
if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
@session_start(); 
include "connect.php";
$id=$_GET['del_id'];
 $sql4 =mysqli_query($con,"SELECT * FROM schedule WHERE id_schedule= '".$id."'");
$rs = mysqli_fetch_array($sql4);
$register_project_id=$rs['register_project_id'];

		// DELETE  --------------------------------------------------------------------------------------//	
	 	$sql = mysqli_query($con,"DELETE FROM schedule WHERE id_schedule='".$id."'");
		if($sql){
			@mysqli_query($con,"Update register_project SET status='on' WHERE id_register_project='".$register_project_id."'");	
			exit("<script>(history.back());</script>"); 
			exit("<script>alert('บันทึกข้อมูลแล้ว');(history.back());</script>"); 
			exit("<script>window.location='register_project.php';</script>"); 
			} 
 }
 
if(isset($_GET['sd_stt']) and !empty($_GET['sd_stt'])){
	if(!empty($_GET['sd_id'])){
@session_start(); 
include "connect.php";

$sql4 =mysqli_query($con,"SELECT * FROM schedule WHERE id_schedule= '".$_GET['sd_id']."'");
$rs = mysqli_fetch_array($sql4);
$register_project_id=$rs['register_project_id'];
 
	
	
	$sql=mysqli_query($con,"Update schedule SET sd_status='".$_GET['sd_stt']."' WHERE id_schedule='".$_GET['sd_id']."'");	
			if($sql){
				if($_GET['sd_stt']=="2"){
				@mysqli_query($con,"Update register_project SET status='success' WHERE id_register_project='".$register_project_id."'");	
				}else if($_GET['sd_stt']=="3"){
				@mysqli_query($con,"Update register_project SET status='on' WHERE id_register_project='".$register_project_id."'");	
				}else if($_GET['sd_stt']=="4"){
				@mysqli_query($con,"Update register_project SET status='no_success' WHERE id_register_project='".$register_project_id."'");	
				
				
			$sql44 =mysqli_query($con,"SELECT * FROM register_project_detail WHERE register_project_id= '".$register_project_id."'");
				if(@mysqli_num_rows($sql44)>0){
				while($rs = mysqli_fetch_array($sql44)){
				$user_id=$rs['user_id'];
				@mysqli_query($con,"Update user SET user_status='1' WHERE id_user='".$user_id."'");	
				@mysqli_query($con,"Update register_project_detail SET status='2' WHERE user_id='".$user_id."'");	
				}}
		}}
 
	exit("<script>(history.back());</script>"); 
	}
 }
 
 

if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='edit'){
 
@session_start(); 
include "connect.php";
$arr_d = explode("/",$_POST['sd_dates1']);
$Y = $arr_d[2]+0;
$M = $arr_d[1];
$D = $arr_d[0];

  $sd_dates1= date("Y-m-d", mktime(date("".$H."")+0, date("".$I."")+0, date("s")+0, date("".$M."")+0 , date("".$D."")+0, date("".$Y."")+0));
$Dates = date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
 
	if(!empty($_POST['id_schedule'])){
	$id=$_POST['id_schedule'];
	$status='1';
		$strCondition =  " id_schedule='".$id."' ";
		$strCommand = "`admin_id` = '".$_POST['admin_id']."', 
									`sd_rgt_name` = '".$_POST['sd_rgt_name']."', 
									`sd_title` = '".$_POST['sd_title']."', 
									`sd_detail` = '".$_POST['sd_detail']."', 
									`sd_dates1` = '".$sd_dates1."', 
									`sd_dates` = '".$Dates."', 
									`sd_status` = '".$status."' ";
									
			// 	echo "Update schedule Set  $strCommand Where $strCondition ";					
							
  $sql=mysqli_query($con,"Update schedule Set  $strCommand Where $strCondition ");
	//	exit();	
if($sql){
	$last_id =$id;
 
					
				exit("<script>window.location='register_project_detail.php?id=".$_POST['register_project_id']."&link=schedule_detail&sd_id=".$id."#".$id."';</script>"); 		
				
									
					}else{
					echo "บันทึกข้อมูลไม่ได้ <br /> Update $Table Set  $strCommand Where $strCondition";exit();
					}

	
	}
 }
	// end edit  --------------------------------------------------------------------------------------//		
 
 
if(isset($_POST['Sql']) and !empty($_POST['Sql']) and $_POST['Sql']=='add'){
@session_start(); 
include "connect.php";

$arr_d = explode("/",$_POST['sd_dates1']);
$Y = $arr_d[2]+0;
$M = $arr_d[1];
$D = $arr_d[0];

$sd_dates1= date("Y-m-d", mktime(date("".$H."")+0, date("".$I."")+0, date("s")+0, date("".$M."")+0 , date("".$D."")+0, date("".$Y."")+0));
$Dates = date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));

// Field  --------------------------------------------------------------------------------------//
	$strField = "`id_schedule`, `admin_id`, `register_project_id`, `sd_rgt_name`, `sd_title`, `sd_detail`, `sd_dates1`, `sd_dates`, `sd_status`";
	
// Value  --------------------------------------------------------------------------------------//	
			$status='1';
 
			
			$strValue = "'0', 
						'".$_POST['admin_id']."', 
						'".$_POST['register_project_id']."', 
						'".$_POST['sd_rgt_name']."', 
						'".trim($_POST['sd_title'])."', 
						'".$_POST['sd_detail']."', 
						'".$sd_dates1."', 
						'".$Dates."', 
						'".$status."' "; 
// echo "INSERT INTO schedule ($strField) VALUES ($strValue) ";
	// Insert  --------------------------------------------------------------------------------------//		
 $sql=mysqli_query($con,"INSERT INTO schedule ($strField) VALUES ($strValue) ");
 //exit();
	if($sql){
	$last_id = mysqli_insert_id($con);
	 
	 	@mysqli_query($con,"Update register_project SET status='schedule' WHERE id_register_project='".$_POST['register_project_id']."'");		
		exit("<script>window.location='register_project_detail.php?id=".$_POST['register_project_id']."&link=schedule_detail&sd_id=".$last_id."#".$last_id."';</script>"); 		
			
	}else{
	echo("Error : " . mysqli_error($con));
	}
 }
 
 
if(empty($_POST['Sql'])){
 

$id_schedule=$rs['id_schedule'];
$admin_id=$rs['admin_id'];
$register_project_id=$rs['register_project_id'];
$sd_rgt_name=$rs['sd_rgt_name'];
$sd_title=$rs['sd_title'];
$sd_detail=$rs['sd_detail'];
 
$sd_dates1=shwinputdate($rs['sd_dates1']);
$sd_dates=shwinputdate($rs['sd_dates']);
$sd_status=$rs['sd_status'];

$arr_d = explode("-",$rs['sd_dates1']);
 $Y = $arr_d[0];
$M = $arr_d[1];
 $D = $arr_d[2];

 $sd_dates_edit= date("d/m/Y", mktime(date("".$H."")+0, date("".$I."")+0, date("s")+0, date("".$M."")+0 , date("".$D."")+0, date("".$Y."")+0));

if($sd_status=='1'){
$txt_sd_status=' <span class="w3-tag w3-red">รอสอบ</span> ';
}else if($sd_status=='2'){
$txt_sd_status=' <span class="w3-tag w3-green">สอบผ่าน</span> ';
}else if($sd_status=='3'){
$txt_sd_status=' <span class="w3-tag w3-sand">รอสอบครั้งต่อไป</span> ';
}else if($sd_status=='4'){
$txt_sd_status=' <span class="w3-tag w3-dark-grey">โครงงานไม่ผ่าน</span> ';
}

if(!empty($admin_id)){
$sql4 =mysqli_query($con,"SELECT * FROM user WHERE id_user= '".$admin_id."'");
$rs = mysqli_fetch_array($sql4);
$sd_user_name=$rs['user_name'];
}

if(!empty($register_project_id)){
$sql4 =mysqli_query($con,"SELECT * FROM register_project WHERE id_register_project= '".$register_project_id."'");
$rs = mysqli_fetch_array($sql4);
$open_project_id=$rs['open_project_id'];
$sd_register_project=$rs['name'];
 
if(!empty($open_project_id)){
$sql44=mysqli_query($con,"SELECT * FROM open_project WHERE id_open_project= '".$open_project_id."'");
$rs = mysqli_fetch_array($sql44);
$sd_year=$rs['year'];
}



}
 
}

?>
