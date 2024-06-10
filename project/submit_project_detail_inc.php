<?php 


$sql =mysqli_query($con,"SELECT * FROM submit_project WHERE id_submit_project= '".$_GET['sbt_id']."'");
		$rs = mysqli_fetch_array($sql);
		include "submit_project_tb.php";

?>
  <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="51%"><div align="left">หัวข้อเรื่อง</div>      </th>
      <th width="25%">นักศึกษาส่งงาน</th>
      <th width="12%">วันที่</th>
      <th width="12%">สถานะ</th>
    </tr>			
    <tr>
      <td><?php echo $sp_title; ?></td>
      <td><?php echo $sp_name; ?></td>
      <td align="center"><?php echo $sp_dates; ?></td>
      <td align="center"><?php echo $txt_sp_status; ?></td>
    </tr>
    <tr>
      <td colspan="4"><div style="padding:5px 12px; margin:2px; border:1px dashed #aaa; text-align:left; background:#fff; line-height:12px;"><?php echo $sp_detail; ?></div></td>
      </tr>
    <tr>
      <td colspan="4">
	  
<?php 
$sql =mysqli_query($con,"SELECT * FROM fileupload WHERE submit_project_id= '".$_GET['sbt_id']."'");
$numr=mysqli_num_rows($sql);
 
?>
 
  <h4>ไฟล์ที่แนบมา</h4>
  <ul class="w3-ul " style="background:#fff;">
<?php if($numr>0){
while($rs = mysqli_fetch_array($sql)){
$id_fileupload=$rs['id_fileupload'];
$submit_project_id=$rs['submit_project_id'];
$comment_id=$rs['comment_id'];
$f_name=$rs['f_name'];
$f_file_upoad=$rs['f_file_upoad'];
$f_file_type=$rs['f_file_type'];
$f_dates=$rs['f_dates'];
 
					
 ?>
    <li class="w3-bar">
	<?php if($_SESSION['sess_login_id']==$sbt_userid or $_SESSION['sess_login_user']=='admin'){ ?>
	<span onclick="fbtn_del()"  class="w3-bar-item w3-button w3-white w3-xlarge w3-right" style="margin-top: +0px;">×</span>
	<?php } ?>
      
	  
      <div class="w3-bar-item" style="padding-top: 13px;">
        <span>ดาวน์โหลดไฟล์:<a href="<?php echo $f_file_upoad; ?>"><span class="w3-tag w3-sand"> [ <?php echo $f_name; ?> ] </span></a></span>
      </div>
    </li>
 
<script language="javascript">
	function fbtn_del(){
	 if (confirm("ต้องการลบไฟล์  [ <?php echo $f_name; ?> ]  ออกใช่ไหม!") == true) {
	 window.location='fileupload_tb.php?del_id=<?=$id_fileupload?>';
	 }
	}
</script>
<?php }}else{ ?>
<div style="text-align:center;">ไม่มีข้อมูล</div>
<?php } ?>

  </ul>
 
 <?php 
 
$sql =mysqli_query($con,"SELECT * FROM comment WHERE submit_project_id=".$_GET['sbt_id']." ");
  $num_comment=mysqli_num_rows($sql);
 
?>
<a name="<?php echo $_GET['cmt_id']; ?>"></a>  

<?php if($num_comment>0){
		$rs = mysqli_fetch_array($sql);
		include "comment_tb.php";
 
		  $id_comment=$rs['id_comment'];
 ?>
  <h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> รายละเอียดข้อมูลตรวจงาน</h3> 
  
  <div style="padding:5px 12px; margin:2px; border:1px dashed #aaa; text-align:left; background:#fff; line-height:12px;">
  <?php echo $cmt_detail; ?>
  <hr />
  <p style="text-align:right; padding-right: 10px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> อาจารย์: <?php echo $c_name; ?> วันที่ : <?php echo $cmt_dates; ?></p>
  </div>

<?php 
$sql =mysqli_query($con,"SELECT * FROM fileupload WHERE comment_id= '".$id_comment."'");
$numr=mysqli_num_rows($sql);
 
?>
 
  <h4>ไฟล์ที่แนบมา</h4>
  <ul class="w3-ul " style="background:#fff;">
<?php if($numr>0){
while($rs = mysqli_fetch_array($sql)){
$id_fileupload=$rs['id_fileupload'];
$submit_project_id=$rs['submit_project_id'];
$comment_id=$rs['comment_id'];
$f_name=$rs['f_name'];
$f_file_upoad=$rs['f_file_upoad'];
$f_file_type=$rs['f_file_type'];
$f_dates=$rs['f_dates'];
 
					
 ?>
    <li class="w3-bar ">
	<?php if($_SESSION['sess_login_id']==$sbt_userid or $_SESSION['sess_login_user']=='admin'){ ?>
	<span onclick="fbtn_del()"  class="w3-bar-item w3-button w3-white w3-xlarge w3-right" style="margin-top: +0px;">×</span>
	<?php } ?>
      
	  
      <div class="w3-bar-item" style="padding-top: 13px;">
        <span>ดาวน์โหลดไฟล์:<a href="<?php echo $f_file_upoad; ?>"><span class="w3-tag w3-sand"> [ <?php echo $f_name; ?> ] </span></a></span>
      </div>
    </li>
 
<script language="javascript">
	function fbtn_del(){
	 if (confirm("ต้องการลบไฟล์  [ <?php echo $f_name; ?> ]  ออกใช่ไหม!") == true) {
	 window.location='fileupload_tb.php?del_id=<? echo $id_fileupload; ?>';
	 }
	}
</script>
<?php }}else{ ?>
<div style="text-align:center;">ไม่มีข้อมูล</div>
<?php } ?>

  </ul>

<?php } ?>
	  
	  
	  </td>
    </tr>
    <tr>
      <td colspan="4">
	  <div style="text-align:right;">
<?php
	switch($user_type){
		case'admin':
?>
 
<?php if($num_comment>0){ ?>
<a  class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('comment_edit').style.display='block'">แก้ไขข้อมูลตรวจงาน</a>
<?php }else{ ?>
<a  class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('comment_add').style.display='block'">ตรวจงาน</a>
<?php } ?>

 <a  class="w3-button w3-medium" href="comment_tb.php?del_id=<?php echo $id_comment; ?>"  onclick=" return confirm('ยืนยันลบข้อมูลตรวจงาน')"> ลบ</a>
 

 
	  
<?php 
		break;
		case'teacher':
		?>
 
		
<?php 
		break;
		case'student':
 
		?>
  
<?php
break;
}
?>
<a class="w3-button  w3-medium" onClick="(history.back())">  ย้อนกลับ</a>	  </div>	  </td>
      </tr>
  </table>
