<?php

if(isset($_REQUEST['Sql']) && !empty($_REQUEST['Sql'])){

// ----------------------------------------------------------------------------------------//
	 $n = count($_FILES['FileUpload']['name']);
		if(!empty($n) && $n>0){	
			for($i=0; $i<$n; $i++){
				if(!empty($_FILES['FileUpload']['name'][$i])){
					$FileName = $_FILES['FileUpload']['name'][$i];
					$Filetype = $_FILES['FileUpload']['type'][$i];
					$FileSize = ($_FILES['FileUpload']['size'][$i]/ 1024);
					$FileUpLoadtmp = $_FILES['FileUpload']['tmp_name'][$i];
					$FileTmp[] = $_FILES['FileUpload']['tmp_name'][$i];
					
				if($FileUpLoadtmp){					 
					$Namefile = explode(".",$FileName);  
					$c = count($Namefile) - 1;  
					$lname = strtolower($Namefile [$c]); 
		 
			
					switch($Filetype){
					
						case 'image/gif':
						case 'image/jpeg':
						case 'image/jpg':
						case 'image/png':
						$numf = date("s");
						$file_name = "photo_".$numf."";
						$folderUpload = "upload";
						$f_file_type="f_img";
						break;
						
						case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': // .docx
						case 'application/msword':// .doc
						case 'application/vnd.ms-excel':
						case 'application/pdf':
						case 'application/octet-stream': //.rar .zip
						case 'text/plain': //.text
						case 'application/vnd.ms-powerpoint':
						
						$f_arr=explode(" ",trim($Namefile[0]));
						$file_name = implode("-",$f_arr);;
						
						$folderUpload = "upload";
						$f_file_type="f_file";
						
						break;
						
						default:
						 exit("<script>alert('ข้อมูลไฟล์ Upload ยังไม่รองรับไฟล์นี้ค่ะ!');(history.back());</script>");
						break;
					
					}
					
		 
						//	$numf = date("s");
						//	$Newfile[] = $Namefile[0].$numf."_".$i.".$lname"; //รวม ชื่อและนามสกลุดไฟล์เข้าด้วยกัน 
						//	echo $Newfile[0];
							
							$Newfile_upload[]=$file_name."-".$last_id.$i.".$lname";
							$rename_file[]=$file_name.".$lname";

						} }else{
						//echo "No file";
						/*	exit("<script>alert('กรุณาเลือกไฟล์ด้วยนะ!');(history.back());</script>"); */
						} } // end for
// ----------------------------------------------------------------------------------------//
		}else{
// ----------------------------------------------------------------------------------------//		

			if(!empty($img_file)){

				$Namefile = explode(".",$img_file); // เป็น array หาจำนวน จุด . ของชื่อตัวแปร์
				$c = count($Namefile) - 1; //นับจำนวน จุด "." ของชื่อตัวแปร์ 
				$File_lname = strtolower($Namefile [$c]); // หา นามสกุลไฟล์ ตัวสุดท้ายของ ตัวแปร์
				
						switch($File_lname){
					
									case 'gif':
									case 'jpeg':
									case 'jpg':
									case 'png':
									$folderUpload = "upload";
									break;
									
									default:
									 $folderUpload = "upload";
									break;
								
							}
					
					} // END FI img_file
		
		
		
		}
// ----------------------------------------------------------------------------------------//
}else{
// ----------------------------------------------------------------------------------------//

if(!empty($img_file)){

									$folderUpload = "upload";
									$photo = $folderUpload."/".$img_file;	
										 
					
					}else{
					
					$folderUpload = "images";
					$img_file = "photo.jpg";
					$photo = $folderUpload."/".$img_file;	
									 

					}// END FI img_file

}


 

?>