 
 <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		  //  var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);



		    $("#date1").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: d, minDate: '0', maxDate: '1m', dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
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

<!--
<input name="txtDate_start" id="date1" value="<?=$_POST['txtDate_start']?>" size="11" /> 


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


 	switch($user_type){
		case'admin':
		
 
		break;
		case'teacher':
 		
		break;
		case'student':
 
break;
}
?>
  -->