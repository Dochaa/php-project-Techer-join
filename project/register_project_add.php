<?php
@session_start(); 
include"session.php";
@header('HTTP/1.1 200 OK');
include "connect.php";

include "function_page.php";
include "cke_date_func.php";
if(empty( $_SESSION['sess_rgt_open_project_id'])){
unset($_SESSION['sess_rgt_name']);
unset($_SESSION['sess_rgt_detail']);
unset($_SESSION['sess_rgt_open_project_id']);
unset($_SESSION['sess_id']);
exit("<script>alert('error: ขั้นตอนการลงทะเบียนไม่ถูกต้อง!');(history.back());</script>");
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
 </head>
<body>
<?php include "menu_sidebar.php"; ?>
<?php include "header.php"; ?>
<?php include "menu_top.php"; ?>
<main>
<div class="row">
  <div class="main">
 
 <form method="post" action="register_project_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
  <section>
    <h1> <strong><i class="fa fa-th-list" aria-hidden="true"></i> ลงทะเบียนโครงงาน</strong></h1>
<article>
 
<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>รายละเอียดข้อมูลเปิดรับที่ปรึกษาโครงงาน</h3> 
</div>
</div>
 <?php 
 
 
 		$sql =mysqli_query($con,"SELECT * FROM open_project WHERE id_open_project= '". $_SESSION['sess_rgt_open_project_id']."'");
		$rs = mysqli_fetch_array($sql);
		include "open_project_tb.php";
 
 ?> 
  <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="10%"><div align="left">ปีการศึกษา</div> </th>
      <th width="22%">อาจารย์ที่ปรึกษา</th>
      <th width="12%">เปิดรับ</th>
      <th width="10%">ส่งคำขอ</th>
      <th width="10%">อนุมัติ</th>
      <th width="12%">วันที่</th>
      <th width="10%">สถานะ</th>
      </tr>			
    <tr>
      <td><?php echo $opj_year; ?>  </td>
      <td><?php echo $opj_name; ?></td>
      <td align="center"><?php echo $opj_number; ?></td>
      <td align="center"><?php echo $number_regster; ?></td>
      <td align="center"><?php echo $number_approve; ?></td>
      <td align="center"><?php echo $opj_dates; ?></td>
      <td align="center"><?php echo $opj_status; ?></td>
      </tr>
    <tr>
      <td colspan="7"><div style="padding:5px 12px; margin:2px; border:1px dashed #aaa; text-align:left; background:#fff; line-height:12px;"><?php echo $opj_detail; ?></div></td>
      </tr>
 
  </table>

</div>

<br />

 <div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3><strong>ลงทะเบียนโครงงาน</strong></h3> 
</div>
</div>
 
   <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th align="left"><?php echo $_SESSION['sess_rgt_name'] ; ?></th>
      </tr>			
    <tr>
      <td><div style="padding:5px 12px; margin:2px; border:1px dashed #aaa; text-align:left; background:#fff; line-height:12px;"><?php echo $_SESSION['sess_rgt_detail'] ; ?></div></td>
      </tr>
    <tr>
      <td>
	  <h3>สมาชิกในกลุ่ม</h3>
	  
   <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="10%">รหัสนักศึกษา</th>
      <th width="10%"><div align="left">ชื่อ-นามสกุล</div>      </th>
      <th width="22%">เบอร์โทร</th>
      <th width="12%">อีเมล์</th>
      <th width="10%">&nbsp; </th>
      </tr>		
<?php
 

 if(count($_SESSION['sess_id'])>0){ 

for($i=0; $i<count($_SESSION['sess_id']); $i++){
 	$sql=mysqli_query($con,"SELECT * FROM user WHERE  id_user='".$_SESSION['sess_id'][$i]."' ");
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
      <td align="center">
	  <?php if($_SESSION['sess_login_id']!=$id_user){ ?>
	  <a  style="text-decoration:none;" href="register_project_tb.php?del_sess_id=<?php echo $id_user; ?>"><span class="w3-tag w3-blue-grey">  ลบ </span></a> 
	  <?php } ?>	  </td>
      </tr>
	  
<?php }} ?>  
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
  </table>

	   
	  
	  </td>
      </tr>
    <tr>
      <td>	 
	  <div style="text-align:right;">
	  <input type="hidden" name="Sql" value="confirm_rgt" />
	  <input type="button" name="Submit" class="w3-button"  value="เพิ่มสมาชิก" onClick="window.location='register_project_user.php';" />
	  <input type="Submit" name="Submit" class="w3-button"  value="บันทึกข้อมูล" onClick=" return confirm('ยืนยันส่งคำขอที่ปรึกษาโครงงาน')" />
	  <input type="button" name="Submit" class="w3-button"  value="ยกเลิก" onClick="window.location='register_project_tb.php?Sql=cancle_rgt';" />
 
 
  </div>	   </td>
      </tr>
  </table>
 
 
</div>
 
</article>
</section>
 
 </form>

 
 <!-- main  ---------------------------------------------------->
  </div>
<?php include "menu_right.php"; ?>
</div>
</main>
 <?php include "footer.php"; ?>
</body>
</html>
 