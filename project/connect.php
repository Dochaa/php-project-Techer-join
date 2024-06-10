<?php
// $base_url = 'http://localhost/project';

//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Bangkok");
$host="localhost";
$user="root";
$pass="root";
$dbname="db_project";
$con=mysqli_connect("$host","$user","$pass","$dbname");
@mysqli_query($con,"SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno()){
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$txt_head="ระบบสารสนเทศโครงงานโปรเจ็คนักศึกษา";
$txt_titlepage="ระบบสารสนเทศโปรเจ็ค";
$txt_footer="ระบบสารสนเทศโปรเจ็ค";

 ?>
 
