<?php
@session_start(); 
include"session.php";
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
    <h1> <strong><i class="fa fa-th-list" aria-hidden="true"></i> ลงทะเบียนโครงงาน</strong></h1>
<article>
  <!-- title top  ---------------------------------------------------->
 <div style="text-align:right; padding:5px;">
 <?php if(!empty($_SESSION['sess_rgt_name'])){ ?>
 <a class="w3-button  w3-round-large w3-dark-grey" href="register_project_add.php"><i class="fa fa-th-list" aria-hidden="true"></i> ทำรายการต่อ</a> 
 <?php } ?>
 
 
 <a class="w3-button   w3-round-large w3-dark-grey" onClick="(history.back())"><i class="fa fa-reply" aria-hidden="true"></i> ย้อนกลับ</a>
</div>
<!-- end title top  ---------------------------------------------------->
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


$q="SELECT * FROM open_project  where status='on'  order by id_open_project asc";


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
      <th width="10%"><div align="left">ปีการศึกษา</div>      </th>
      <th width="22%">อาจารย์ที่ปรึกษา</th>
      <th width="12%">เปิดรับ</th>
      <th width="8%">ส่งคำขอ</th>
      <th width="10%">อนุมัติ</th>
      <th width="12%">วันที่</th>
      <th width="10%">สถานะ</th>
      <th width="12%" class="w3-hide-small w3-hide-medium"><div align="center">ลงทะเบียน</div></th>
      </tr>
<?php 
				// for($i=1;$i<=50;$i++){ 
			  for($i=1;$i<=mysqli_num_rows($qr);$i++){ 
				$rs=mysqli_fetch_array($qr); 
				
			 	include $tbname."_tb.php";
 
					?>
					

 <!--- -เพิ่มข้อมูล -------------------------------- --> 

  <div id="open_project_add<?php echo $id; ?>" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('open_project_add<?php echo $id; ?>').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>แบบฟอร์มลงทะเบียนโครงงาน</h2>
      </header>
     <form  class="w3-container frm_login " method="post" action="register_project_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
 
  

 
		<p>      
		<label class="w3-text-brown"><b>ชื่อโครงงาน</b></label>
		<input name="name" type="text" class="w3-input w3-border w3-sand" id="name" value="<?php echo $_POST['name']; ?>"  required>
		</p>
 
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="detail" cols="200" rows="10" class="frm500" id="ckediter<?php echo $id; ?>" >
			<?php echo $_POST['detail']; ?>
		</textarea>

		<script>
 
			CKEDITOR.replace( 'ckediter<?php echo $id; ?>', {
				
				toolbar: [
					[ 'Source', 'Format', 'FontSize',  'Image',  'TextColor', 'BGColor', 'Bold', 'Italic','Underline', '-',  'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					[ 'Undo', 'Redo'  ]
				//	[ 'Image', 'TextColor', 'BGColor' ]
				]
			});

		</script>
	</p>

		<p>      
		<label class="w3-text-brown"><b>ปีการศึกษา</b></label>
		<input name="opj_year" type="text" class="w3-input w3-border w3-light-grey" id="opj_year" value="<?php echo $opj_year; ?>" disabled="disabled"  required>
		</p>

		<p>      
		<label class="w3-text-brown"><b>อาจารย์ที่ปรึกษา</b></label>
		<input name="opj_name" type="text" class="w3-input w3-border w3-light-grey" id="opj_name" value="<?php echo $opj_name; ?>" disabled="disabled"  required>
		</p>
		
	<p style="text-align:right;">
	<input type="hidden" name="open_project_id" value="<?php echo $id; ?>" />
	<input type="hidden" name="Sql" value="sess_register" />
	
	<button class="w3-btn w3-brown " name="button" value="Insert">ทำรายการต่อไป</button>
	</p>
      </div>
	  </form>
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>

					
					
    <tr>
      <td><?php echo $opj_year; ?>  </td>
      <td><?php echo $opj_name; ?></td>
      <td align="center"><?php echo $opj_number; ?></td>
      <td align="center"><?php echo $number_regster; ?></td>
      <td align="center"><?php echo $number_approve; ?></td>
      <td align="center"><?php echo $opj_dates; ?></td>
      <td align="center"><?php echo $opj_status; ?></td>
      <td class="w3-hide-small w3-hide-medium">
	  <div align="center">
	  
<?php
	switch($user_type){
		case'admin':
?>
 <a  href="javascript:void(0)"  onclick="document.getElementById('open_project_add<?php echo $id; ?>').style.display='block'"><span class="w3-tag w3-blue-grey">  ลงทะเบียน </span></a> 
 
<?php 
		break;
		case'teacher':
		?>
 
 <a  class="w3-button w3-medium" href="#"  onclick=" return confirm('เฉพาะนักศึกษา')"> - </a>
		
<?php 
		break;
		case'student':
 
		?>
 <a  href="javascript:void(0)"  onclick="document.getElementById('open_project_add<?php echo $id; ?>').style.display='block'"><span class="w3-tag w3-blue-grey">  ลงทะเบียน </span></a> 
<?php
break;
}
?>
	  
	  
 
	   
	  </div></td>
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
 

 
 <!-- main  ---------------------------------------------------->
  </div>
<?php include "menu_right.php"; ?>
</div>
</main>
 <?php include "footer.php"; ?>
</body>
</html>


  
