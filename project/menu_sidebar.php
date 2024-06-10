 <!-- Sidebar -->
<div class="w3-overlay w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" id="myOverlay"> </div>
<div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5; width: 250px;" id="mySidebar">
 

 
  
  
<?php
if(!empty($_SESSION['sess_login_id']) and !empty($_SESSION['sess_login_user'])){
		$sql=mysqli_query($con,"Select * From login Where id_login='".$_SESSION['sess_login_id']."' ");
		// echo @mysqli_num_rows($sql);
		if(@mysqli_num_rows($sql)==1){
			$rs=mysqli_fetch_array($sql);
			$id_login = $rs['id_login'];
			$user_type = $rs['type'];
			$login_user=$rs['user'];
			unset($sql);
			}
		//--------------------------------------------------------------------------------------
	switch($user_type){
		case'admin':
?>
  <button class="w3-bar-item w3-button w3-large" onClick="w3_close()" style="background:#333; color:#fff;"><i class="fa fa-compress" aria-hidden="true"></i>  Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
  <a href="schedule_show.php" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน</a>
  <a href="#" onClick=" return alert('เข้าระบบก่อนนะ!')" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
<a  href="#" onClick=" return alert('เข้าระบบก่อนนะ!')" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 
<a  class="w3-bar-item w3-button" id="sid_button" href="javascript:void(0)"  onclick="document.getElementById('open_project_add').style.display='block'"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
<a class="w3-bar-item w3-button" id="sid_button" href="register_project.php"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
<a class="w3-bar-item w3-button" id="sid_button" href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
<a class="w3-bar-item w3-button" id="sid_button" href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน </a>
 
<a class="w3-bar-item w3-button" id="sid_button" href="user_teacher.php" class="right"><i class="fa fa-user-circle-o" aria-hidden="true"></i> ข้อมูลอาจารย์</a>
<a class="w3-bar-item w3-button" id="sid_button" href="user_student.php"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลนักศึกษา</a>

	  <a class="w3-bar-item w3-button" id="sid_button" href="profile.php?id=<?php echo $_SESSION['sess_login_id']; ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลส่วนตัว</a>
	  <a class="w3-bar-item w3-button" id="sid_button"  href="javascript:void(0)"  onclick="document.getElementById('repass').style.display='block'"><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
	  <a class="w3-bar-item w3-button" id="sid_button" href="logout.php" class="right"><i class="fa fa-lock" aria-hidden="true"></i> ออกจากระบบ</a>

<?php 
		break;
		case'teacher':
		?>
<a class="w3-bar-item w3-button" id="sid_button"  href="javascript:void(0)"  onclick="document.getElementById('open_project_add').style.display='block'"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
<a class="w3-bar-item w3-button" id="sid_button" href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
<a class="w3-bar-item w3-button" id="sid_button" href="open_project.php?opt_stt=std"><i class="fa fa-graduation-cap" aria-hidden="true"></i> โครงงานนักศึกษา</a>
<a class="w3-bar-item w3-button" id="sid_button" href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน</a>

	  <a class="w3-bar-item w3-button" id="sid_button" href="profile.php?id=<?php echo $_SESSION['sess_login_id']; ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลส่วนตัว</a>
	  <a class="w3-bar-item w3-button" id="sid_button"  href="javascript:void(0)"  onclick="document.getElementById('repass').style.display='block'"><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
	  <a class="w3-bar-item w3-button" id="sid_button" href="logout.php" class="right"><i class="fa fa-lock" aria-hidden="true"></i> ออกจากระบบ</a>

<?php 
		break;
		case'student':
if($user_status==2){ 
$sql2 =mysqli_query($con,"SELECT * FROM register_project_detail WHERE user_id= '".$_SESSION['sess_login_id']."'");
$rs = mysqli_fetch_array($sql2);
$register_project_id=$rs['register_project_id'];
}
?>
 <?php if($user_status==2){ ?>
  <a class="w3-bar-item w3-button" id="sid_button" href="#"  onClick=" return alert('ไม่สามารถลงทะเบียนโครงานซ่ำได้!')"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 <?php }else{ ?>
  <a class="w3-bar-item w3-button" id="sid_button" href="register_project.php"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 <?php } ?> 

 
<a class="w3-bar-item w3-button" id="sid_button" href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
 <?php if($user_status==2){ ?>
<a class="w3-bar-item w3-button" id="sid_button" href="register_project_detail.php?id=<?php echo $register_project_id; ?>"><i class="fa fa-graduation-cap" aria-hidden="true"></i> โครงงานนักศึกษา</a>
 <?php }else{ ?>
  <a class="w3-bar-item w3-button" id="sid_button" href="#"  onClick=" return alert('ลงทะเบียนโครงงานก่อนนะ!')"><i class="fa fa-graduation-cap" aria-hidden="true"></i> โครงงานนักศึกษา</a>
 <?php } ?> 
<a class="w3-bar-item w3-button" id="sid_button" href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน</a>

	  <a class="w3-bar-item w3-button" id="sid_button" href="profile.php?id=<?php echo $_SESSION['sess_login_id']; ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลส่วนตัว</a>
	  <a class="w3-bar-item w3-button" id="sid_button"  href="javascript:void(0)"  onclick="document.getElementById('repass').style.display='block'"><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
	  <a class="w3-bar-item w3-button" id="sid_button" href="logout.php" class="right"><i class="fa fa-lock" aria-hidden="true"></i> ออกจากระบบ</a>

<?php
break;
}}else{ // and switch ?>

  <button class="w3-bar-item w3-button w3-large" onClick="w3_close()" style="background:#333; color:#fff;"><i class="fa fa-compress" aria-hidden="true"></i>  Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
  <a href="schedule_show.php" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน</a>
  <a href="#" onClick=" return alert('เข้าระบบก่อนนะ!')" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
<a  href="#" onClick=" return alert('เข้าระบบก่อนนะ!')" class="w3-bar-item w3-button" id="sid_button"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 
  
 <?php  if(empty($_SESSION['sess_login_user'])){ ?>
	  <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="document.getElementById('login_add').style.display='block'"><i class="fa fa-user-circle" aria-hidden="true"></i> ลงทะเบียนนักศึกษา</a>
	  <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="document.getElementById('login_user').style.display='block'"><i class="fa fa-unlock-alt" aria-hidden="true"></i>  เข้าระบบ</a>
<?php } ?>

<?php } // end if sess_login  ?>
  
 
  
</div>




<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>