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
    <h1> <strong><i class="fa fa-th-list" aria-hidden="true"></i> เปิดรับโครงงาน</strong></h1>
<article>
 
<!-- title top  ---------------------------------------------------->
 <div style="text-align:right; padding:5px;">
 <a class="w3-button  w3-round-large w3-dark-grey" href="javascript:void(0)"  onclick="document.getElementById('open_project_add').style.display='block'"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มข้อมูล</a> 
  <a class="w3-button  w3-round-large w3-dark-grey" href="javascript:void(0)"  onclick="document.getElementById('search').style.display='block'"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</a> 
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
 

 
 <!-- main  ---------------------------------------------------->
  </div>
<?php include "menu_right.php"; ?>
</div>
</main>
 <?php include "footer.php"; ?>
</body>
</html>

 <!--- -เพิ่มข้อมูล -------------------------------- --> 

  <div id="teacher_edit" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('teacher_edit').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>แก้ไขข้อมูลอาจารย์</h2>
      </header>
     <form  class="w3-container frm_login " method="post" action="login_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b>Username</b></label>
		<input class="w3-input w3-border w3-light-grey" id="username" type="text" name="user"  value="<?php echo $user; ?>" disabled="disabled" required>
		</p>
 
		<p>      
		<label class="w3-text-brown"><b>ชื่อ-นามสกุล</b></label>
		<input class="w3-input w3-border w3-sand" id="user_name" type="text" name="user_name" value="<?php echo $user_name; ?>" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>ที่อยู่</b></label>
		<input name="user_address" type="text" class="w3-input w3-border w3-sand" id="user_address" value="<?php echo $user_address; ?>" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>เบอร์โทร</b></label>
		<input name="user_tel" type="text" class="w3-input w3-border w3-sand" id="user_tel" value="<?php echo $user_tel; ?>" maxlength="10" required>
		</p>

		<p>      
		<label class="w3-text-brown"><b> อีเมล์</b></label>
		<input class="w3-input w3-border w3-sand" id="user_email" type="text" name="user_email" value="<?php echo $user_email; ?>"   required>
		</p>
		<p>          
		<label class="w3-text-brown"><b>รูปภาพ</b></label>
		<input name="FileUpload" type="file" id="FileUpload" class="w3-input w3-border w3-sand " />
		</p>
		 <p>
		<label class="w3-text-brown"><b>Note</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="user_note" cols="200" rows="10" class="frm500" id="ckediter1" >
			<?php echo $user_note; ?>
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
	<input type="hidden" name="user_type" value="teacher" />
	<input type="hidden" name="Sql" value="edit" />
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
	<input type="hidden" name="photo" value="<?php echo $user_photo; ?>" />
	<button class="w3-btn w3-brown " name="button" value="Insert">บันทึกข้อมูล</button>
	</p>
      </div>
	  </form>
      <footer class="w3-container modal-color-footer">
         <p> <?php echo $txt_footer; ?></p>
      </footer>
    </div>
  </div>
  
