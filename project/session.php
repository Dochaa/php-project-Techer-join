<?php 
session_start();
if(!isset($_SESSION['sess_login_id']) && !isset($_SESSION['sess_user_id']) ){
	exit("<script>alert('Login เข้าระบบก่อนนะ');window.location='index.php';</script>");
	}
 ?>