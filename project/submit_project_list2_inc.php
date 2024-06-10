<div class="w3-card-4">
<div class="w3-container w3-teal">
<div  class="title-center">
  <h3>ส่งความคืบหน้าโครงงาน</h3> 
</div>
</div>
 
<?php
 
 
 	$q="SELECT * FROM submit_project  where id_submit_project not in('".$_GET['sbt_id']."') and sp_status   in('3') and register_project_id='".$id_register_project."' order by id_submit_project asc";
 
 
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
      <th width="6%" class="w3-hide-small w3-hide-medium"  style="text-align:center;">ลำดับ</th>
      <th width="41%"><div align="left">ชื่อหัวข้อเรื่อง</div>      </th>
      <th width="24%">ชื่อผู้ส่งงาน</th>
      <th width="10%">วันที่</th>
      <th width="9%">สถานะ</th>
      <th width="10%" class="w3-hide-small w3-hide-medium"><div align="center"> ตรวจงาน </div></th>
    </tr>
<?php 
				// for($i=1;$i<=50;$i++){ 
			  for($i=1;$i<=mysqli_num_rows($qr);$i++){ 
				$rs=mysqli_fetch_array($qr); 
				
			 	include "submit_project_tb.php";
 
					?>
					

					
					
    <tr>
      <td class="w3-hide-small w3-hide-medium" style="text-align:center;"><?php echo $i; ?></td>
      <td><?php echo $sp_title; ?>  </td>
      <td><?php echo $s_user; ?> </td>
      <td align="center"><?php echo $sp_dates; ?></td>
      <td align="center"><?php echo $txt_sp_status; ?></td>
      <td class="w3-hide-small w3-hide-medium">
	  <div align="center">


<?php
	switch($user_type){
		case'admin':
?>
<?php if($sp_status==1){ ?>
<a  style="text-decoration:none;" href="register_project_detail.php?id=<?php echo $id_register_project; ?>&link=submit_project_detail&sbt_id=<?php echo $id_submit_project; ?>#<?php echo $id_submit_project; ?>"> <span class="w3-tag w3-blue-grey"> ตรวจงาน </span></a> 
<?php }else if($sp_status==2 or $sp_status==3){ ?>
<a  style="text-decoration:none;" href="register_project_detail.php?id=<?php echo $id_register_project; ?>&link=submit_project_detail&sbt_id=<?php echo $id_submit_project; ?>#<?php echo $id_submit_project; ?>"> <span class="w3-tag w3-blue-grey"> รายละเอียด </span></a> 
<?php } ?>

<?php 
		break;
		case'teacher':
		?>
		
<?php if($sp_status==1){ ?>
<a  style="text-decoration:none;" href="register_project_detail.php?id=<?php echo $id_register_project; ?>&link=submit_project_detail&sbt_id=<?php echo $id_submit_project; ?>#<?php echo $id_submit_project; ?>"> <span class="w3-tag w3-blue-grey"> ตรวจงาน </span></a> 
<?php }else if($sp_status==2 or $sp_status==3){ ?>
<a  style="text-decoration:none;" href="register_project_detail.php?id=<?php echo $id_register_project; ?>&link=submit_project_detail&sbt_id=<?php echo $id_submit_project; ?>#<?php echo $id_submit_project; ?>"> <span class="w3-tag w3-blue-grey"> รายละเอียด </span></a> 
<?php } ?>
		
<?php 
		break;
		case'student':
 
		?>
  
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
 //  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
?>
</div>
<?php // } ?>

<?php } else { ?>
 <div class="non_data"><h3>ไม่มีข้อมูล</h3></div>
 <?php } ?>
<div style="clear:both;"></div>
</div>
 