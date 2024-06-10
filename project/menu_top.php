





<?php
 if(!empty($_SESSION['sess_login_id'])){
		$sql=mysqli_query($con,"Select * From login Where id_login='".$_SESSION['sess_login_id']."' ");
		// echo @mysqli_num_rows($sql);
		if(@mysqli_num_rows($sql)==1){
			$rs=mysqli_fetch_array($sql);
			$id_login = $rs['id_login'];
			$user_type = $rs['type'];
			$login_user=$rs['user'];
			include "login_tb.php";
			unset($sql);
			}
 
		//--------------------------------------------------------------------------------------
	switch($user_type){
		case'admin':
 
?>
 <nav class="navbar" > 
	<div class="w3-content">
	<button class="w3-button w3-black w3-left" id="menu_top_Sidebar" style="font-size:24px;" onClick="w3_open()">&#9776;</button>
 	<a href="index.php" ><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
	<div id="menu_top">
 

	
<a  href="javascript:void(0)"  onclick="document.getElementById('open_project_add').style.display='block'"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
 <a href="register_project.php"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 	   <a href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
	   <a href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน </a>

 
	<div class="dropdown">
	  <button class="dropbtn"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i> ข้อมูลผู้ใช้ระบบ</button>
	  <div class="dropdown-content" style="background:#aaa;">
	    <a href="user_teacher.php" class="right"><i class="fa fa-user-circle-o" aria-hidden="true"></i> ข้อมูลอาจารย์</a>
	  <a href="user_student.php"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลนักศึกษา</a>
 
	  </div>
	</div>
 
<!--
	
	<div class="dropdown">
	  <button class="dropbtn"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i> เปิดรับโครงงาน</button>
	  <div class="dropdown-content" style="background:#aaa;">
	   <a  href="javascript:void(0)"  onclick="document.getElementById('open_project_add').style.display='block'"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มข้อมูล</a>
	   <a href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
	   <a href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน </a>
	  </div>
	</div>
	
	<div class="dropdown">
	  <button class="dropbtn"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i> โครงงานนักศึกษา</button>
	  <div class="dropdown-content" style="background:#aaa;">
	    <a href="#" class="right"><i class="fa fa-list" aria-hidden="true"></i> ข้อมูลเปิดรับโครงงาน</a>
	   <a href="#"><i class="fa fa-list" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
	   <a href="#"><i class="fa fa-list" aria-hidden="true"></i> ข้อมูลนัดสอบโครงงาน </a>
	  </div>
	</div>
 --> 
	 
	 
	  <div class="dropdown right" style="float:right;">
	  <button class="dropbtn"><i class="fa fa-cog" aria-hidden="true"></i> <b>Login:</b> <?php echo $login_user; ?></button>
	  <div class="dropdown-content" style="background:#aaa;">
	  <a href="profile.php?id=<?php echo $_SESSION['sess_login_id']; ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลส่วนตัว</a>
	  <a  href="javascript:void(0)"  onclick="document.getElementById('repass').style.display='block'"><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
	  <a href="logout.php" class="right"><i class="fa fa-lock" aria-hidden="true"></i> ออกจากระบบ</a>
	  </div>
	</div>
	
	</div>
	</div>
</nav>
<?php 
		break;
		case'teacher':
		?>
 <nav class="navbar" > 
	<div class="w3-content">
	<button class="w3-button w3-black w3-left" id="menu_top_Sidebar" style="font-size:24px;" onClick="w3_open()">&#9776;</button>
 	<a href="index.php" ><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
	<div id="menu_top">
 
 
<a  href="javascript:void(0)"  onclick="document.getElementById('open_project_add').style.display='block'"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
<a href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
<a href="open_project.php?opt_stt=std"><i class="fa fa-graduation-cap" aria-hidden="true"></i> โครงงานนักศึกษา</a>
<a href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน</a>
 

	 
	 
	  <div class="dropdown right" style="float:right;">
	  <button class="dropbtn"><i class="fa fa-cog" aria-hidden="true"></i> <b>Login:</b> <?php echo $login_user; ?></button>
	  <div class="dropdown-content" style="background:#aaa;">
	  <a href="profile.php?id=<?php echo $_SESSION['sess_login_id']; ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลส่วนตัว</a>
	  <a  href="javascript:void(0)"  onclick="document.getElementById('repass').style.display='block'"><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
	  <a href="logout.php" class="right"><i class="fa fa-lock" aria-hidden="true"></i> ออกจากระบบ</a>
	  </div>
	</div>
	<div style="clear:both;"></div>
	</div>
	</div>
</nav>
		
		
		
<?php 
		break;
		case'student':
		echo $_SESSION['sess_login_id'];
	 	
	
if($user_status==2){ 
$sql2 =mysqli_query($con,"SELECT * FROM register_project_detail WHERE status='1' and user_id= '".$_SESSION['sess_login_id']."'");
$rs = mysqli_fetch_array($sql2);
$register_project_id=$rs['register_project_id'];
}
	
 
		?>
 <nav class="navbar" > 
	<div class="w3-content">
	<button class="w3-button w3-black w3-left" id="menu_top_Sidebar" style="font-size:24px;" onClick="w3_open()">&#9776;</button>
 	<a href="index.php" ><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
	<div id="menu_top">
 
 <?php if($user_status==2){ ?>
  <a href="#"  onClick=" return alert('ไม่สามารถลงทะเบียนโครงานซ่ำได้!')"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 <?php }else{ ?>
  <a href="register_project.php"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>
 <?php } ?> 

 
<a href="open_project.php"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ข้อมูลโครงงาน</a>
 <?php if($user_status==2){ ?>
<a href="register_project_detail.php?id=<?php echo $register_project_id; ?>"><i class="fa fa-graduation-cap" aria-hidden="true"></i> โครงงานนักศึกษา</a>
 <?php }else{ ?>
  <a href="#"  onClick=" return alert('ลงทะเบียนโครงงานก่อนนะ!')"><i class="fa fa-graduation-cap" aria-hidden="true"></i> โครงงานนักศึกษา</a>
 <?php } ?> 



<a href="schedule.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน</a>
 

	 
	 
	  <div class="dropdown right" style="float:right;">
	  <button class="dropbtn"><i class="fa fa-cog" aria-hidden="true"></i> <b>Login:</b> <?php echo $login_user; ?></button>
	  <div class="dropdown-content" style="background:#aaa;">
	  <a href="profile.php?id=<?php echo $_SESSION['sess_login_id']; ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> ข้อมูลส่วนตัว</a>
	  <a  href="javascript:void(0)"  onclick="document.getElementById('repass').style.display='block'"><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
	  <a href="logout.php" class="right"><i class="fa fa-lock" aria-hidden="true"></i> ออกจากระบบ</a>
	  </div>
	</div>
	<div style="clear:both;"></div>
	</div>
	</div>
</nav>
<?php
break;
}}else{ // and switch ?>
		

<nav class="navbar"> 
	<div class="w3-content">
	<button class="w3-button w3-black w3-left" id="menu_top_Sidebar" style="font-size:24px;" onClick="w3_open()">&#9776;</button>
 	<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก </a>
	<div id="menu_top">
<a href="schedule_show.php"><i class="fa fa-th-large" aria-hidden="true"></i> นัดสอบโครงงาน </a>
<a  href="#" onClick=" return alert('เข้าระบบก่อนนะ!')"><i class="fa fa-plus-square" aria-hidden="true"></i> เปิดรับโครงงาน</a>
<a  href="#" onClick=" return alert('เข้าระบบก่อนนะ!')"><i class="fa fa-plus-square" aria-hidden="true"></i> ลงทะเบียนโครงงาน</a>


	  <a href="javascript:void(0)" class="right" onclick="document.getElementById('frm_add').style.display='block'"><i class="fa fa-user-circle" aria-hidden="true"></i> ลงทะเบียนนักศึกษา</a>
	  <a href="javascript:void(0)" class="right" onclick="document.getElementById('login_user').style.display='block'"><i class="fa fa-unlock-alt" aria-hidden="true"></i>  เข้าระบบ</a>
 
 
 

<div style="clear:both;"></div>
	</div>
	</div>
</nav>






 <!--- -เพิ่มข้อมูล -------------------------------- --> 

  <div id="frm_add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('frm_add').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>เพิ่มข้อมูลนักศึกษา</h2>
      </header>
     <form  class="w3-container frm_login " method="post" action="login_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b>Username</b></label>
		<input class="w3-input w3-border w3-sand" id="username" type="text" name="user"  required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>Password</b></label>
		<input class="w3-input w3-border w3-sand" id="pass" type="text" name="pass"  required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>รหัสนักศึกษา</b></label>
		<input class="w3-input w3-border w3-sand" id="user_code" type="text" name="user_code" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>ชื่อ-นามสกุล</b></label>
		<input class="w3-input w3-border w3-sand" id="user_name" type="text" name="user_name" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>ที่อยู่</b></label>
		<input name="user_address" type="text" class="w3-input w3-border w3-sand" id="user_address"  required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>เบอร์โทร</b></label>
		<input name="user_tel" type="text" class="w3-input w3-border w3-sand" id="user_tel" maxlength="10" required>
		</p>

		<p>      
		<label class="w3-text-brown"><b> อีเมล์</b></label>
		<input class="w3-input w3-border w3-sand" id="user_email" type="text" name="user_email"   required>
		</p>
		<p>          
		<label class="w3-text-brown"><b>รูปภาพ</b></label>
		<input name="FileUpload" type="file" id="FileUpload" class="w3-input w3-border w3-sand " />
		</p>
		 <p>
		<label class="w3-text-brown"><b>Note</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="user_note" cols="200" rows="10" class="frm500" id="ckediter1_std_add" >
			 -
		</textarea>

		<script>

		    // CKEDITOR.replace('txtDescription1');
			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.replace( 'ckediter1_std_add', {
			//	uiColor: '#14B8C4',
 
				
				toolbar: [
					[ 'Source', 'Format', 'FontSize',  'Image',  'TextColor', 'BGColor', 'Bold', 'Italic','Underline', '-',  'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					[ 'Undo', 'Redo'  ]
				//	[ 'Image', 'TextColor', 'BGColor' ]
				]
			});

		</script>
	</p>

		
	<p style="text-align:right;">
	<input type="hidden" name="user_type" value="student" />
	<input type="hidden" name="Sql" value="add" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>

 <div id="login_user" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onclick="document.getElementById('login_user').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>ลงชื่อเข้าระบบ</h2>
      </header>
     <form  class="w3-container frm_login " method="post" action="login_chk.php" enctype="multipart/form-data" name="frm_login"  id="frm_login">
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b>Username</b></label>
		<input class="w3-input w3-border w3-sand" id="user" type="text" name="user" required></p>
		<p>      
		<label class="w3-text-brown"><b>Password</b></label>
		<input class="w3-input w3-border w3-sand" id="pass" type="password" name="pass" required></p>
	<p style="text-align:right;">
	<button class="w3-btn w3-brown " name="button" value="login">เข้าระบบ</button>
	</p>
      </div>
	  </form>
	<hr />
      <footer class="w3-container modal-color-footer">
        <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
  
  <?php } // end if sess_login  ?>
  
  
  
 <!--- -เพิ่มข้อมูล -------------------------------- --> 

  <div id="open_project_add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('open_project_add').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>เพิ่มข้อมูลเปิดรับโครงงานนักศึกษา</h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="open_project_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b>ปีการศึกษา</b></label>

		<select  name="year" id="year" class="w3-input w3-border w3-sand" required>
		<option value="" selected="selected">---------เลือกข้อมูล---------</option>
				<?php
			$y=date("Y");
			$yy=date("Y")+1;
			for($d=$y; $d<=$yy; $d++){
					if($exp_year==$d){
						echo "<option value=".sprintf("%04d",$d+543)." selected='selected'> ".sprintf("%04d",($d+543))."</option>";
						}else{
						echo "<option value=".sprintf("%04d",$d+543)."> ".sprintf("%04d",($d+543))."</option>";
						}
					}
				?>
		</select>
 
		</p>
		<p>      
		<label class="w3-text-brown"><b>จำนวนโครงงานที่เปิดรับ</b></label>
		<input name="number"  id="number"  type="number" class="w3-input w3-border w3-sand" required>
		</p>
 
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="detail" cols="200" rows="10" class="frm500" id="ckediter1" >
			 -
		</textarea>

		<script>

		    // CKEDITOR.replace('txtDescription1');
			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.replace( 'ckediter1', {
			//	uiColor: '#14B8C4',
 
				
				toolbar: [
					[ 'Source', 'Format', 'FontSize',  'Image',  'TextColor', 'BGColor', 'Bold', 'Italic','Underline', '-',  'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					[ 'Undo', 'Redo'  ]
				//	[ 'Image', 'TextColor', 'BGColor' ]
				]
			});

		</script>
	</p>

		
	<p style="text-align:right;">
	<input type="hidden" name="name" value="<?php echo $user_name; ?>" /> 
	<input type="hidden" name="admin_id" value="<?php echo $id_login; ?>" />  
	<input type="hidden" name="Sql" value="add" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>

  
  
  
   <div id="search" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onclick="document.getElementById('search').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>ค้นหาข้อมูล</h2>
      </header>
     <form  class="w3-container " method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data" name="search"  id="search">
	  <div class="w3-container">
		<p>      
		<input class="w3-input w3-border w3-sand " id="Search" type="text" name="Search" placeholder=""  required>
		</p>
<p style="text-align:right;">
 <button class="w3-btn w3-brown " name="button" value="search">ค้นหา</button>
 </p>
      </div>
	  </form>
	<hr />
      <footer class="w3-container modal-color-footer">
        <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
  
   <!--- -repass -------------------------------- --> 
 <div id="repass" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onclick="document.getElementById('repass').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>เปลี่ยนรหัสผ่าน</h2>
      </header>
     <form  class="w3-container frm_login " method="post" action="login_tb.php" enctype="multipart/form-data" name="form3"  id="form3" onSubmit="return chk_pass();">
 <script language="javascript">
function chk_pass(){
	if(document.form3.txt_oldpass.value==""){
		alert("กรุณากรอก รหัสผ่านเดิม ด้วยนะ");
		document.form3.txt_oldpass.focus();
		return false;
	}
	else if(document.form3.txt_newpass.value=="") {
		alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
		document.form3.txt_newpass.focus();
		return false;
	}
	else if(document.form3.txt_repass.value=="") {
		alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
		document.form3.txt_repass.focus();
		return false;
	}
	else if((document.form3.txt_newpass.value)!=(document.form3.txt_repass.value )){
		alert("กรุณากรอก รหัสผ่านให้เหมือนกัน ด้วยนะ");
		return false;		
	}
	else {
	return true;
	}

}
</script>
	  <div class="w3-container">
 		<p>      
		<label class="w3-text-brown"><b>รหัสผ่านเดิม</b></label>
		<input class="w3-input w3-border w3-sand" id="txt_oldpass" type="password" name="txt_oldpass" placeholder="" required></p>
		<p>      
		<label class="w3-text-brown"><b>รหัสผ่านใหม่</b></label>
		<input class="w3-input w3-border w3-sand" id="txt_newpass" type="password" name="txt_newpass" placeholder="" required></p>
		<p>      
		<label class="w3-text-brown"><b>รหัสผ่านใหม่อีกครั้ง</b></label>
		<input class="w3-input w3-border w3-sand" id="txt_repass" type="password" name="txt_repass" placeholder="" required></p>

		
	<p style="text-align:right;">
	<input type="hidden" name="Sql" value="repass" />
	<button class="w3-btn w3-brown " name="button" value="repass">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
 <!--- end-repass -------------------------------- --> 
  