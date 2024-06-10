<?php
@session_start(); 
include"session.php";
@header('HTTP/1.1 200 OK');
include "connect.php";

include "function_page.php";
include "cke_date_func.php";
if(isset($_GET['sbt_stt']) and !empty($_GET['sbt_stt'])){
$sbt_id=$_GET['sbt_id'];
@mysqli_query($con,"Update submit_project  SET sp_status='".$_GET['sbt_stt']."' WHERE id_submit_project='".$sbt_id."'");		
 }
 
 
if(isset($_GET['stt_chk']) and !empty($_GET['stt_chk'])){
$chkid=$_GET['chkid'];


$sql=mysqli_query($con,"Update register_project  SET status='".$_GET['stt_chk']."' WHERE id_register_project='".$chkid."'");		
if($sql){
 
if($_GET['stt_chk']=='cancle'){
	$upstt='1';
}else{
	$upstt='2';
}
	if(!empty($chkid)){
	$sql2 =mysqli_query($con,"SELECT * FROM register_project_detail WHERE register_project_id= '".$chkid."'");
		while($rs = mysqli_fetch_array($sql2)){
		$rgtd_user_id=$rs['user_id'];
		@mysqli_query($con,"Update user  SET user_status='".$upstt."' WHERE id_user='".$rgtd_user_id."'");		
		}

 
}

exit("<script>(history.back());</script>");
}

}

 



?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo trim($txt_titlepage); ?></title>
 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		  //  var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);



		    $("#date1").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: d, minDate: '0', maxDate: '1Y', dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  
		    $("#date_edit").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: d, minDate: '0', maxDate: '1Y', dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			
		    $("#date2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			
			
			});
 
 
		</script>
		<style type="text/css">

			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		
			
label{
width: 100px; 
display: inline-block;
}
.ui-datepicker{  
    width:300px;  
    font-family:tahoma;  
    font-size:15px;  
}  
</style>

 </head>
<body>
<?php include "menu_sidebar.php"; ?>
<?php include "header.php"; ?>
<?php include "menu_top.php"; ?>
<main>
<div class="row">
  <div class="main">
 
	 
  <section>
    <h1> <strong><i class="fa fa-th-list" aria-hidden="true"></i> ส่งคำขอที่ปรึกษาโครงงาน</strong></h1>
<article>
 

<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>รายละเอียด</h3> 
</div>
</div>
<?php 
$sql =mysqli_query($con,"SELECT * FROM register_project WHERE id_register_project= '".$_GET['id']."'");
		$rs = mysqli_fetch_array($sql);
		include "register_project_tb.php";
?>
  <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="24%"><div align="left">ชื่อโครงงาน</div>      </th>
      <th width="18%">อาจารย์ที่ปรึกษา</th>
      <th width="15%">ปีการศึกษา</th>
      <th width="12%">สมาชิก</th>
      <th width="12%">วันที่</th>
      <th width="10%">สถานะ</th>
      </tr>			
    <tr>
      <td><?php echo $rgt_name; ?></td>
      <td><?php echo $rgt_admin_name; ?></td>
      <td align="center"><?php echo $opj_year; ?></td>
      <td align="center"><?php echo $rgt_number_std; ?> คน</td>
      <td align="center"><?php echo $rgt_dates; ?></td>
      <td align="center"><?php echo $txt_status; ?></td>
      </tr>
    <tr>
      <td colspan="6"><div style="padding:5px 12px; margin:2px; border:1px dashed #aaa; text-align:left; background:#fff; line-height:12px;"><?php echo $rgt_detail; ?></div></td>
      </tr>
    <tr>
      <td colspan="6">
	  
	  <h3>สมาชิกในกลุ่ม</h3>
	  
   <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="22%">รหัสนักศึกษา</th>
      <th width="34%"><div align="left">ชื่อ-นามสกุล</div>      </th>
      <th width="21%">เบอร์โทร</th>
      <th width="23%">อีเมล์</th>
      </tr>		
<?php
 
$sql_std=mysqli_query($con,"SELECT * FROM register_project_detail WHERE register_project_id= '".$id_register_project."'");
while($rs = mysqli_fetch_array($sql_std)){
$rgtd_user_id=$rs['user_id'];
 	$sql=mysqli_query($con,"SELECT * FROM user WHERE  id_user='".$rgtd_user_id."' ");
	$rs=mysqli_fetch_array($sql);
 
$id_user=$rs['id_user'];
$user_code=$rs['user_code'];
$user_name=$rs['user_name'];
$user_tel=$rs['user_tel'];
$user_email=$rs['user_email'];

 
?>
	  	
    <tr>
      <td><?php echo $user_code; ?></td>
      <td><?php echo $user_name; ?> </td>
      <td><?php echo $user_tel; ?></td>
      <td align="center"><?php echo $user_email; ?></td>
      </tr>
	  
<?php }  ?>
  </table>
	  
	  
        </td>
      </tr>
    <tr>
      <td colspan="6">
	  <div style="text-align:right;">
<?php
	switch($user_type){
		case'admin':
?>
 		<?php if($rgt_status=='off'){ ?>
	  <a  class="w3-button w3-medium" href="register_project_detail.php?stt_chk=on&chkid=<?php echo $id_register_project; ?>"  onclick=" return confirm('ยืนยันตอบรับคำขอเป็นที่ปรึกษาโครงงาน <?php echo $rgt_name; ?>')"> อนุมัติโครงงาน</a>
	  <a  class="w3-button w3-medium" href="register_project_detail.php?stt_chk=cancle&chkid=<?php echo $id_register_project; ?>" onClick=" return confirm('ยืนยัน ยกเลิกคำขอ โครงงาน <?php echo $rgt_name; ?>')"> ยกเลิกคำขอ</a>
		<?php } ?>
		
		
<?php if($rgt_status=='on'){ ?>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('submit_project_add').style.display='block'">ส่งงานความคืบหน้า</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('submit_project_chk').style.display='block'">รายการส่งงาน</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('submit_project_chk2').style.display='block'">ประวัติส่งงาน</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('schedule_add').style.display='block'">นัดสอบโครงงาน</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('schedule_list').style.display='block'">ข้อมูลนัดสอบ</a>
<?php } ?>

 		<?php if($rgt_status=='schedule'){ ?>
		<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('schedule_list').style.display='block'">ข้อมูลนัดสอบ</a>
		<?php } ?>
		
		


	  <?php if($_SESSION['sess_login_user']=="admin"){ ?>
	  <a  class="w3-button w3-medium" href="register_project_tb.php?del_id=<?php echo $id; ?>"  onclick=" return confirm('ลบข้อมูล ส่งคำขอโครงงาน ออกจากระบบ')"> ลบ</a>
	  <?php } ?>
	  
<?php 
		break;
		case'teacher':
		?>
 		<?php if($rgt_status=='off'){ ?>
	  <a  class="w3-button w3-medium" href="register_project_detail.php?stt_chk=on&chkid=<?php echo $id_register_project; ?>"  onclick=" return confirm('ยืนยันตอบรับคำขอเป็นที่ปรึกษาโครงงาน <?php echo $rgt_name; ?>')"> อนุมัติโครงงาน</a>
	  <a  class="w3-button w3-medium" href="register_project_detail.php?stt_chk=cancle&chkid=<?php echo $id_register_project; ?>" onClick=" return confirm('ยืนยัน ยกเลิกคำขอ โครงงาน <?php echo $rgt_name; ?>')"> ยกเลิกคำขอ</a>
		<?php } ?>
		
		
<?php 
		break;
		case'student':
 
		?>
		
		
		
<?php if($rgt_status=='on'){ ?>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('submit_project_add').style.display='block'">ส่งงานความคืบหน้า</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('submit_project_chk').style.display='block'">รายการส่งงาน</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('submit_project_chk2').style.display='block'">ประวัติส่งงาน</a>
<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('schedule_list').style.display='block'">ข้อมูลนัดสอบ</a>
<?php } ?>

 		<?php if($rgt_status=='schedule'){ ?>
		<a class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('schedule_list').style.display='block'">ข้อมูลนัดสอบ</a>
		<?php } ?>
		
		


<?php
break;
}
?>
	  
<a class="w3-button w3-medium" href="open_project_detail.php?id=<?php echo $rgt_open_project_id; ?>"  >ทะเบียนโครงงาน</a>	  
<a class="w3-button  w3-medium" onClick="(history.back())">  ย้อนกลับ</a>
	  
	  </div>	  </td>
      </tr>
  </table>
</div>
<br />


<a name="<?php echo $_GET['sd_id']; ?>"></a>
 <?php 
 if(!empty($_GET['sd_id'])){
 $sql =mysqli_query($con,"SELECT * FROM schedule WHERE id_schedule= '".$_GET['sd_id']."'");
 }else{
 $sql =mysqli_query($con,"SELECT * FROM schedule WHERE  sd_status='1' and register_project_id	= '".$_GET['id']."'");
 }
 

$numsd=mysqli_num_rows($sql);
		$rs = mysqli_fetch_array($sql);
		include "schedule_tb.php";
?>
<?php if($numsd==1){ ?>


<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>นัดสอบโครงงาน</h3> 
</div>
</div>

<?php include "schedule_detail_inc.php"; ?>

</div>

<?php } ?>
<!--end schedule_detail -->
 

 

<?php if($_GET['link']=="submit_project_detail"){ ?>
<a name="<?php echo $_GET['sbt_id']; ?>"></a>
<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>รายละเอียดการส่งงาน</h3> 
</div>
</div>

<?php include "submit_project_detail_inc.php"; ?>

</div>
<?php } ?>
<!--end submit_project_detail -->

</article>
</section>
 

 
 <!-- main  ---------------------------------------------------->
  </div>
<?php include "menu_right.php"; ?>
</div>
</main>
 <?php include "footer.php"; ?>
</body>
</html>


<!--- -modal -------------------------------- --> 

  <div id="submit_project_chk" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="width: 70%;">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('submit_project_chk').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>โครงงาน <?php echo $rgt_name; ?></h2>
      </header>
 
 		<?php include "submit_project_list_inc.php"; ?>
	 
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>

<!--- -modal -------------------------------- --> 

  <div id="submit_project_chk2" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="width: 70%;">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('submit_project_chk2').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>โครงงาน <?php echo $rgt_name; ?></h2>
      </header>
 
 		<?php include "submit_project_list2_inc.php"; ?>
	 
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
<!--- -modal -------------------------------- --> 


<!--- -modal -------------------------------- --> 

  <div id="schedule_list" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="width: 70%;">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('schedule_list').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>ข้อมูลนัดสอบโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
 
 		<?php include "schedule_list_inc.php"; ?>
	 
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
<!--- -modal -------------------------------- --> 



 
<!--- -modal -------------------------------- --> 
<?php $modal_id="submit_project_eidt"; ?>
  <div id="<?php echo $modal_id; ?>" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('<?php echo $modal_id; ?>').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>แก้ไขข้อมูลส่งงานโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="submit_project_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b> โครงงาน</b> </label>
		<input name="rgt_name"  id="rgt_name"  type="text" class="w3-input w3-border w3-light-grey" value="<?php echo $rgt_name; ?>" disabled="disabled" required>
		</p>
		
		<p>      
		<label class="w3-text-brown"><b> ชื่อหัวข้อ</b></label>
		<input name="sp_title"  id="sp_title"  type="text" class="w3-input w3-border w3-sand" value="<?php echo $sp_title; ?>" required>
		</p>
 
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="sp_detail" cols="200" rows="10" class="frm500" id="ckd_<?php echo $modal_id; ?>" >
			<?php echo $sp_detail; ?>
		</textarea>
		<script>
			CKEDITOR.replace( 'ckd_<?php echo $modal_id; ?>', {
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
  <div class="control-group" id="imgUpload4">
    <div class="controls" id="firstUpload4">
	<p>
	<!-- 
	<label class="w3-text-brown"><b> คำอธิบายเกี่ยวกับไฟล์</b></label>
		<input name="file_name[]"  id="file_name"  type="text" class="w3-input w3-border w3-sand" value="-" required>
		-->
		<label class="control-label"> ไฟล์อัพโหลด </label>
		<input type="file" class="w3-input w3-border w3-sand btn" style="width: 300px;" name="FileUpload[]">
		</p>
    </div>
  </div>
  
   
	<div class="control-group">
	<label class="control-label" style="width: 150px;"> เพิ่มไฟล์อัพโหลด </label>
    <div class="controls">
	 <button type="button" class="btn" id="btn_add4">+</button>
	<button type="button" class="btn" id="btn_remove4">-</button>
    </div>
  	</div>
<hr />

	<p style="text-align:right;">
	
	<input type="hidden" name="rgt_id" value="<?php echo $_GET['id']; ?>" />  
	<input type="hidden" name="id" value="<?php echo $_GET['sbt_id']; ?>" /> 
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['sess_login_id']; ?>" />  
	<input type="hidden" name="sp_name" value="<?php echo $login_name; ?>" />  
	
	<input type="hidden" name="Sql" value="edit" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
 <script type="text/javascript">  
	
    $(function(){  
        $("#btn_add4").click(function(){  
			if($("#imgUpload4 div").length<10){  
                 $("#imgUpload4 ").append($("#firstUpload4").clone());  
            }else{  
                alert("Upload file ได้ครั้งละไม่เกิน 10 รายการ");  
            }  
        });  
		
        $("#btn_remove4").click(function(){  
            if($("#imgUpload4 div").length>1){  
                $("#imgUpload4 div:last").remove();  
            }else{  
                alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");  
            }  
        });           
    });  
    </script> 
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
  
<!--- end -modal -------------------------------- --> 

 
<!--- -modal -------------------------------- --> 
<?php 
$sql =mysqli_query($con,"SELECT * FROM submit_project WHERE id_submit_project= '".$_GET['sbt_id']."'");
		$rs = mysqli_fetch_array($sql);
		include "submit_project_tb.php";
		
?>
  <div id="comment_add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('comment_add').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>ตรวจงานโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="comment_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b> หัวข้องานที่ตรวจ </b> </label>
		<input name="sp_title"  id="sp_title"  type="text" class="w3-input w3-border w3-light-grey" value="<?php echo $sp_title; ?>" disabled="disabled" required>
		</p>
 
		 <p>
		<label class="w3-text-brown"><b>รายละเอียดการตรวจงาน</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="cmt_detail" cols="200" rows="10" class="frm500" id="ckd_comment_add" >
			  -
		</textarea>
		<script>
			CKEDITOR.replace( 'ckd_comment_add', {
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
  <div class="control-group" id="imgUpload3">
    <div class="controls" id="firstUpload3">
	<p>
		<label class="control-label"> ไฟล์อัพโหลด </label>
		<input type="file" class="w3-input w3-border w3-sand btn" style="width: 300px;" name="FileUpload[]">
		</p>
    </div>
  </div>
  
   
	<div class="control-group">
	<label class="control-label" style="width: 150px;"> เพิ่มไฟล์อัพโหลด </label>
    <div class="controls">
	 <button type="button" class="btn" id="btn_add3">+</button>
	<button type="button" class="btn" id="btn_remove3">-</button>
    </div>
  	</div>
<hr />

	<p style="text-align:right;">
	<input type="hidden" name="rgt_id" value="<?php echo $_GET['id']; ?>" />  
	<input type="hidden" name="submit_project_id" value="<?php echo $submit_project_id; ?>" />  
	<input type="hidden" name="admin_id" value="<?php echo $_SESSION['sess_login_id']; ?>" />  
	<input type="hidden" name="c_name" value="<?php echo $login_name; ?>" /> 
	
	<input type="hidden" name="Sql" value="add" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
 <script type="text/javascript">  
	
    $(function(){  
        $("#btn_add3").click(function(){  
			if($("#imgUpload3 div").length<10){  
                 $("#imgUpload3 ").append($("#firstUpload3").clone());  
            }else{  
                alert("Upload file ได้ครั้งละไม่เกิน 10 รายการ");  
            }  
        });  
		
        $("#btn_remove3").click(function(){  
            if($("#imgUpload3 div").length>1){  
                $("#imgUpload3 div:last").remove();  
            }else{  
                alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");  
            }  
        });           
    });  
    </script> 
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>

 
<!--- end -modal -------------------------------- --> 
 
<!--- -modal -------------------------------- --> 
<?php $modol_edit="comment_edit"; ?>
  <div id="<?php echo $modol_edit; ?>" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('<?php echo $modol_edit; ?>').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>ตรวจงานโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="comment_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b> หัวข้องานที่ตรวจ </b> </label>
		<input name="sp_title"  id="sp_title"  type="text" class="w3-input w3-border w3-light-grey" value="<?php echo $sp_title; ?>" disabled="disabled" required>
		</p>
 
 
		 <p>
		<label class="w3-text-brown"><b>รายละเอียดการตรวจงาน</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="cmt_detail" cols="200" rows="10" class="frm500" id="ckd_<?php echo $modol_edit; ?>" ><?php echo $cmt_detail; ?></textarea>
		<script>
			CKEDITOR.replace( 'ckd_<?php echo $modol_edit; ?>', {
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
  <div class="control-group" id="imgUpload2">
    <div class="controls" id="firstUpload2">
	<p>
		<label class="control-label"> ไฟล์อัพโหลด </label>
		<input type="file" class="w3-input w3-border w3-sand btn" style="width: 300px;" name="FileUpload[]">
		</p>
    </div>
  </div>
  
   
	<div class="control-group">
	<label class="control-label" style="width: 150px;"> เพิ่มไฟล์อัพโหลด </label>
    <div class="controls">
	 <button type="button" class="btn" id="btn_add2">+</button>
	<button type="button" class="btn" id="btn_remove2">-</button>
    </div>
  	</div>
<hr />

	<p style="text-align:right;">
	<input type="hidden" name="rgt_id" value="<?php echo $_GET['id']; ?>" />  
	<input type="hidden" name="submit_project_id" value="<?php echo $_GET['sbt_id']; ?>" />  
	<input type="hidden" name="id" value="<?php echo $id_comment; ?>" />  
	<input type="hidden" name="admin_id" value="<?php echo $_SESSION['sess_login_id']; ?>" />  
	<input type="hidden" name="c_name" value="<?php echo $login_name; ?>" /> 
	
	<input type="hidden" name="Sql" value="edit" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
 <script type="text/javascript">  
	
    $(function(){  
        $("#btn_add2").click(function(){  
			if($("#imgUpload2 div").length<10){  
                 $("#imgUpload2 ").append($("#firstUpload2").clone());  
            }else{  
                alert("Upload file ได้ครั้งละไม่เกิน 10 รายการ");  
            }  
        });  
		
        $("#btn_remove2").click(function(){  
            if($("#imgUpload2 div").length>1){  
                $("#imgUpload2 div:last").remove();  
            }else{  
                alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");  
            }  
        });           
    });  
    </script>  
<!--- end -modal -------------------------------- --> 
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>


 
 

<!--- -modal -------------------------------- --> 

  <div id="submit_project_add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('submit_project_add').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>ส่งงานความคืบหน้าโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="submit_project_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b> โครงงาน</b> </label>
		<input name="rgt_name"  id="rgt_name"  type="text" class="w3-input w3-border w3-light-grey" value="<?php echo $rgt_name; ?>" disabled="disabled" required>
		</p>
		
		<p>      
		<label class="w3-text-brown"><b> ชื่อหัวข้อ</b></label>
		<input name="sp_title"  id="sp_title"  type="text" class="w3-input w3-border w3-sand" value="" required>
		</p>
 
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="sp_detail" cols="200" rows="10" class="frm500" id="submit_projectadd" >
			  -
		</textarea>
		<script>
			CKEDITOR.replace( 'submit_projectadd', {
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
  <div class="control-group" id="imgUpload1">
    <div class="controls" id="firstUpload1">
	<p>
		<label class="control-label"> ไฟล์อัพโหลด </label>
		<input type="file" class="w3-input w3-border w3-sand btn" style="width: 300px;" name="FileUpload[]">
		</p>
    </div>
  </div>
  
   
	<div class="control-group">
	<label class="control-label" style="width: 150px;"> เพิ่มไฟล์อัพโหลด </label>
    <div class="controls">
	 <button type="button" class="btn" id="btn_add1">+</button>
	<button type="button" class="btn" id="btn_remove1">-</button>
    </div>
  	</div>
<hr />

	<p style="text-align:right;">
	
	<input type="hidden" name="register_project_id" value="<?php echo $_GET['id']; ?>" /> 
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['sess_login_id']; ?>" />  
	<input type="hidden" name="sp_name" value="<?php echo $login_name; ?>" />  
	
	<input type="hidden" name="Sql" value="add" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
 <script type="text/javascript">  
	
    $(function(){  
        $("#btn_add1").click(function(){  
			if($("#imgUpload1 div").length<10){  
                 $("#imgUpload1 div").append($("#firstUpload1").clone());  
            }else{  
                alert("Upload file ได้ครั้งละไม่เกิน 10 รายการ");  
            }  
        });  
		
        $("#btn_remove1").click(function(){  
            if($("#imgUpload1 div").length>1){  
                $("#imgUpload1 div:last").remove();  
            }else{  
                alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");  
            }  
        });           
    });  
    </script>  

      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
  
<!--- end -modal -------------------------------- --> 
 




<!--- -modal -------------------------------- --> 
<?php $modal_id="schedule_add"; ?>
  <div id="<?php echo $modal_id; ?>" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('<?php echo $modal_id; ?>').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>นัดสอบโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="schedule_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b> ชื่อโครงงาน</b> </label>
		<input name="rgt_name"  id="rgt_name"  type="text" class="w3-input w3-border w3-light-grey" value="<?php echo $rgt_name; ?>" disabled="disabled" required>
		</p>
		
		<p>      
		<label class="w3-text-brown"><b> ชื่อหัวข้อ</b></label>
		<input name="sd_title"  id="sd_title"  type="text" class="w3-input w3-border w3-sand" value="" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b> วันที่นัดสอบ</b> </label>
		<input name="sd_dates1"  id="date1"  type="text" class="w3-input w3-border w3-sand" value="" required>
		</p>
		
		
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="sd_detail" cols="200" rows="10" class="frm500" id="ckd_<?php echo $modal_id; ?>" >
			<?php echo $sp_detail; ?>
		</textarea>
		<script>
			CKEDITOR.replace( 'ckd_<?php echo $modal_id; ?>', {
			//	uiColor: '#14B8C4',
				toolbar: [
					[ 'Source', 'Format', 'FontSize',  'Image',  'TextColor', 'BGColor', 'Bold', 'Italic','Underline', '-',  'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					[ 'Undo', 'Redo'  ]
				//	[ 'Image', 'TextColor', 'BGColor' ]
				]
			});

		</script>
 
<hr />

	<p style="text-align:right;">
	
	<input type="hidden" name="register_project_id" value="<?php echo $_GET['id']; ?>" /> 
	<input type="hidden" name="admin_id" value="<?php echo $_SESSION['sess_login_id']; ?>" />  
	<input type="hidden" name="sd_rgt_name" value="<?php echo $rgt_name; ?>" /> 
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
  
<!--- end -modal -------------------------------- --> 

<!--- -modal -------------------------------- --> 
<?php $modal_id="schedule_edit"; ?>

  <div id="<?php echo $modal_id; ?>" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('<?php echo $modal_id; ?>').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>แก้ไขข้อมูล นัดสอบโครงงาน <?php echo $rgt_name; ?></h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="schedule_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b> ชื่อโครงงาน</b> </label>
		<input name="rgt_name"  id="rgt_name"  type="text" class="w3-input w3-border w3-light-grey" value="<?php echo $rgt_name; ?>" disabled="disabled" required>
		</p>
		
		<p>      
		<label class="w3-text-brown"><b> ชื่อหัวข้อ</b></label>
		<input name="sd_title"  id="sd_title"  type="text" class="w3-input w3-border w3-sand" value="<?php echo $sd_title; ?>" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b> วันที่นัดสอบ</b> </label>
		<input name="sd_dates1"  id="date_edit"  type="text" class="w3-input w3-border w3-sand" value="<?php echo $sd_dates_edit; ?>" required>
		</p>
		
		
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="sd_detail" cols="200" rows="10" class="frm500" id="ckd_<?php echo $modal_id; ?>" >
			<?php echo $sd_detail; ?>
		</textarea>
		<script>
			CKEDITOR.replace( 'ckd_<?php echo $modal_id; ?>', {
			//	uiColor: '#14B8C4',
				toolbar: [
					[ 'Source', 'Format', 'FontSize',  'Image',  'TextColor', 'BGColor', 'Bold', 'Italic','Underline', '-',  'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					[ 'Undo', 'Redo'  ]
				//	[ 'Image', 'TextColor', 'BGColor' ]
				]
			});

		</script>
 
<hr />

	<p style="text-align:right;">
 
	<input type="hidden" name="admin_id" value="<?php echo $_SESSION['sess_login_id']; ?>" />  
	<input type="hidden" name="id_schedule" value="<?php echo $id_schedule; ?>" />  
	<input type="hidden" name="sd_rgt_name" value="<?php echo $rgt_name; ?>" /> 
	<input type="hidden" name="register_project_id" value="<?php echo $_GET['id']; ?>" />  
 
	<input type="hidden" name="Sql" value="edit" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
  
<!--- end -modal -------------------------------- --> 

 
