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
 

<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>รายละเอียดข้อมูลเปิดรับที่ปรึกษาโครงงาน</h3> 
</div>
</div>
 <?php 
 		$sql =mysqli_query($con,"SELECT * FROM open_project WHERE id_open_project= '".$_GET['id']."'");
		$rs = mysqli_fetch_array($sql);
		include "open_project_tb.php";
 
 ?> 
  <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="10%"><div align="left">ปีการศึกษา</div>      </th>
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
    <tr>
      <td colspan="7">
	  
	  
	  <div style="text-align:right;">

	  
<?php
	switch($user_type){
		case'admin':
?>
	  <a  class="w3-button w3-medium" href="open_project_detail.php?id=<?php echo $id; ?>&stt=off"> ข้อมูลรออนุมัติโครงงาน</a>
	  <a  class="w3-button w3-medium" href="open_project_detail.php?id=<?php echo $id; ?>&stt=on"> ข้อมูลอนุมัติโครงงานแล้ว</a>
	  
	  <a class="w3-button w3-medium" href="javascript:void(0)" onClick="document.getElementById('open_project_edit').style.display='block'">  แก้ไข</a>
	  <?php if($_SESSION['sess_login_user']=="admin"){ ?>
	  <a  class="w3-button w3-medium" href="open_project_tb.php?del_id=<?php echo $id; ?>"  onclick=" return confirm('ลบข้อมูลออกจากระบบ')"> ลบ</a>
	  <?php } ?>
 
<?php 
		break;
		case'teacher':
		?>
<?php if($_SESSION['sess_login_id']==$opj_admin_id){ ?>
	  <a  class="w3-button w3-medium" href="open_project_detail.php?id=<?php echo $id; ?>&stt=off"> ข้อมูลรออนุมัติโครงงาน</a>
	  <a  class="w3-button w3-medium" href="open_project_detail.php?id=<?php echo $id; ?>&stt=on"> ข้อมูลอนุมัติโครงงานแล้ว</a>
	  <a class="w3-button w3-medium" href="javascript:void(0)" onClick="document.getElementById('open_project_edit').style.display='block'">  แก้ไข</a>
	   <a  class="w3-button w3-medium" href="open_project_tb.php?del_id=<?php echo $id; ?>"  onclick=" return confirm('ลบข้อมูลออกจากระบบ')"> ลบ</a>
<?php } ?>
		
		
<?php 
		break;
		case'student':
 
		?>
  
<?php
break;
}
?>
 
	   <a class="w3-button  w3-medium" onClick="(history.back())">  ย้อนกลับ</a>
	  </div>	
	  </td>
      </tr>
  </table>
 
  
</div>


<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>ข้อมูลลงทะเบียนโครงงาน</h3> 
</div>
</div>
 
<?php
 $tbname="register_project";
 
if(!empty($_POST['Search'])){
	if(is_numeric($id_item) ) { 
		$keyword = number_format($_POST['Search']); //ทำให้เป็นตัวเลขจำนวนเต็ม
		} else { 
		$keyword = trim($_POST['Search']); //ตัดซ่องวางของสตริง
		}
 
$q="SELECT * FROM register_project  where(name LIKE '%".$keyword."%')  order by id_register_project asc";
}else{
	
	if(!empty($_GET['stt'])){
	$q="SELECT * FROM register_project  where status='".$_GET['stt']."' and open_project_id='".$id."'  order by id_register_project asc";
	}else{
 	$q="SELECT * FROM register_project  where open_project_id='".$id."' order by id_register_project asc";
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
      <th width="26%"><div align="left">ชื่อโครงงาน</div>      </th>
      <th width="14%">จำนวนนักศึกษา</th>
      <th width="15%">วันที่</th>
      <th width="15%">สถานะ</th>
      <th width="13%" class="w3-hide-small w3-hide-medium"><div align="center"> รายละเอียด </div></th>
      </tr>
<?php 
				// for($i=1;$i<=50;$i++){ 
			  for($i=1;$i<=mysqli_num_rows($qr);$i++){ 
				$rs=mysqli_fetch_array($qr); 
				
			 	include "register_project_tb.php";
 
					?>
					

					
					
    <tr>
      <td class="w3-hide-small w3-hide-medium" style="text-align:center;"><?php echo $i; ?></td>
      <td><?php echo $rgt_name; ?>  </td>
      <td><?php echo $rgt_number_std; ?> คน </td>
      <td align="center"><?php echo $rgt_dates; ?></td>
      <td align="center"><?php echo $txt_status; ?></td>
      <td class="w3-hide-small w3-hide-medium"><div align="center"><a  style="text-decoration:none;" href="register_project_detail.php?id=<?php echo $id_register_project; ?>"> <span class="w3-tag w3-blue-grey"> รายละเอียด </span></a> </div></td>
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

<!--- -modal -------------------------------- --> 

  <div id="open_project_edit" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container modal-color-header"> 
        <span onClick="document.getElementById('open_project_edit').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>เพิ่มข้อมูลเปิดรับโครงงานนักศึกษา</h2>
      </header>
     <form  class="w3-container frm1 " method="post" action="open_project_tb.php" enctype="multipart/form-data" name="frm1"  id="frm1">
 
	  <div class="w3-container">
		<p>      
		<label class="w3-text-brown"><b>ปีการศึกษา</b> </label>

		<select  name="year" id="year" class="w3-input w3-border w3-sand" required>
		<option value="" selected="selected">---------เลือกข้อมูล---------</option>
				<?php
			$y=date("Y");
			$yy=date("Y")+1;
			for($d=$y; $d<=$yy; $d++){
					if($opj_year==$d+543){
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
		<input name="number"  id="number"  type="number" class="w3-input w3-border w3-sand" value="<?php echo $opj_number; ?>" required>
		</p>
		<p>      
		<label class="w3-text-brown"><b>สถานะ</b></label>

		<select  name="status" id="status" class="w3-input w3-border w3-sand" required>
		<option value="" >---------เลือกข้อมูล---------</option>
				<?php
				$Array_txt = array("เปิดรับโครงงาน", "ปิดรับโครงงาน");
				$Array_vl = array("on", "off");
				for($i=0; $i < count($Array_txt); $i++){
						$arName = $Array_txt[$i];
						$arVL = $Array_vl[$i];
					if($chk_status==$arVL){
							echo "<option value=".$arVL." selected=\"selected\" >- ".$arName."</option>";
						}else{
							echo "<option value=".$arVL.">- ".$arName."</option>";
						}
				}
 
				?>
		</select>
 
		</p>
		 <p>
		<label class="w3-text-brown"><b>รายละเอียด</b></label>
		<script src="ckediter/ckeditor.js"></script>
	  		<!-- Sample 1  -->
		<textarea name="detail" cols="200" rows="10" class="frm500" id="ckediter2" >
			 <?php echo $opj_detail; ?>
		</textarea>
		<script>
			CKEDITOR.replace( 'ckediter2', {
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

	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />  
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
  