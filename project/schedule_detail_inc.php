
  <table width="100%" class="w3-table w3-bordered w3-table-all" >
    <tr>
      <th width="53%"><div align="left">หัวข้อเรื่อง</div>      </th>
      <th width="14%">วันที่นัดสอบ</th>
      <th width="14%">วันที่ประกาศ</th>
      <th width="19%">สถานะ</th>
    </tr>			
    <tr>
      <td><?php echo $sd_title; ?></td>
      <td align="center"><?php echo $sd_dates1; ?></td>
      <td align="center"><?php echo $sd_dates; ?></td>
      <td align="center"><?php echo $txt_sd_status; ?></td>
    </tr>
    <tr>
      <td colspan="4"><div style="padding:5px 12px; margin:2px; border:1px dashed #aaa; text-align:left; background:#fff; line-height:12px;"><?php echo $sd_detail; ?></div></td>
      </tr>
 
    <tr>
      <td colspan="4">
	  <div style="text-align:right;">
<?php
	switch($user_type){ 
		case'admin':
?>
 
 <a  class="w3-button w3-medium" href="schedule_tb.php?sd_stt=2&sd_id=<?php echo $id_schedule; ?>"  onclick=" return confirm('ยืนยันข้อมูล สอบผ่าน')"> สอบผ่าน</a>
 <a  class="w3-button w3-medium" href="schedule_tb.php?sd_stt=3&sd_id=<?php echo $id_schedule; ?>"  onclick=" return confirm('ยืนยันข้อมูล ไม่ผ่านรอสอบครั้งต่อไป')"> ไม่ผ่านรอสอบครั้งต่อไป</a>
<a  class="w3-button w3-medium" href="schedule_tb.php?sd_stt=4&sd_id=<?php echo $id_schedule; ?>"  onclick=" return confirm('ยืนยันข้อมูล โครงงานไม่ผ่าน')"> โครงงานไม่ผ่าน</a>
 
<?php if($sd_status==1){ ?>
<a  class="w3-button w3-medium" href="javascript:void(0)"  onclick="document.getElementById('schedule_edit').style.display='block'">แก้ไขข้อมูลนัดสอบ</a>
<?php } ?>
 


 <a  class="w3-button w3-medium" href="schedule_tb.php?del_id=<?php echo $id_schedule; ?>"  onclick=" return confirm('ยืนยันลบข้อมูล ')"> ลบ</a>
 

 
	  
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
