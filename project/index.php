<?php
@session_start(); 
@header('HTTP/1.1 200 OK');
include "connect.php";

include "function_page.php";
include "cke_date_func.php";
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
  <section>
<article>
    <h1> <strong>โครงงานโปรเจ็คนักศึกษา</strong></h1>
<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>ข้อมูลเปิดรับที่ปรึกษาโครงงาน</h3> 
</div>
</div>

 
 
<?php
 $tbname="open_project";
 
if(!empty($_POST['Search'])){
	if(is_numeric($id_item) ) { 
		$keyword = number_format($_POST['Search']); //ทำให้เป็นตัวเลขจำนวนเต็ม
		} else { 
		$keyword = trim($_POST['Search']); //ตัดซ่องวางของสตริง
		}
 
$q="SELECT * FROM open_project  where(year LIKE '%".$keyword."%' or name LIKE '%".$keyword."%')  order by id_open_project asc";
}else{
if(!empty($_GET['opt_stt'])){
$q="SELECT * FROM open_project  where  status='on' and  admin_id='".$_SESSION['sess_login_id']."' order by id_open_project asc";
}else{
$q="SELECT * FROM open_project  where status='on'  order by id_open_project asc";
}


}
 
$qr=mysqli_query($con,$q);  
$total=mysqli_num_rows($qr);   
$e_page=50; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

if(!isset($_GET['s_page'])){     
    	$_GET['s_page']=0;     
		
		}else{     
    		$chk_page=$_GET['s_page'];       
 			   $_GET['s_page']=$_GET['s_page']*$e_page;     
		}  
			   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
	$qr=mysqli_query($con,$q);
	  
	if(mysqli_num_rows($qr)>=1){     
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
		}else{     
    $plus_p=($chk_page*$e_page);         //$plus_p มีค่าอยู่ที่ 100
	}    
	 
$total_p=ceil($total/$e_page);     
$before_p=($chk_page*$e_page)+1;    //$before_p มีค่าอยู่ที่ 50
?> 
<?php 
if(@mysqli_num_rows($qr)>0){
?>
  <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="4%" class="w3-hide-small w3-hide-medium"  style="text-align:center;">ลำดับ</th>
      <th width="10%"><div align="left">ปีการศึกษา</div>      </th>
      <th width="22%">อาจารย์ที่ปรึกษา</th>
      <th width="12%">เปิดรับ</th>
      <th width="10%">ส่งคำขอ</th>
      <th width="10%">อนุมัติ</th>
      <th width="12%">วันที่</th>
      <th width="10%">สถานะ</th>
      <th width="10%" class="w3-hide-small w3-hide-medium"><div align="center">  ข้อมูล </div></th>
      </tr>
<?php 
				// for($i=1;$i<=50;$i++){ 
			  for($i=1;$i<=mysqli_num_rows($qr);$i++){ 
				$rs=mysqli_fetch_array($qr); 
				
			 	include $tbname."_tb.php";
 
					?>
					

					
					
    <tr>
      <td class="w3-hide-small w3-hide-medium" style="text-align:center;"><?php echo $i; ?></td>
      <td><?php echo $opj_year; ?>  </td>
      <td><?php echo $opj_name; ?></td>
      <td align="center"><?php echo $opj_number; ?></td>
      <td align="center"><?php echo $number_regster; ?></td>
      <td align="center"><?php echo $number_approve; ?></td>
      <td align="center"><?php echo $opj_dates; ?></td>
      <td align="center"><?php echo $opj_status; ?></td>
      <td class="w3-hide-small w3-hide-medium">
	  <div align="center"><a  style="text-decoration:none;" href="open_project_detail.php?id=<?php echo $id; ?>"> <span class="w3-tag w3-blue-grey"> ข้อมูล </span></a> </div></td>
      </tr>
<?php } ?> 
  </table>
<?php // if($total > $e_page){ ?>
<div class="browse_page" style="padding: 10px;">
<?php     
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
   page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
?>
</div>
<?php // } ?>

<?php } else { ?>
 <div class="non_data"><h3>ไม่มีข้อมูล</h3></div>
 <?php } ?>
<div style="clear:both;"></div>
</div>
</article>
</section>
 
  </div>
<?php include "menu_right.php"; ?>
</div>
</main>
 <?php include "footer.php"; ?>
</body>
</html>
