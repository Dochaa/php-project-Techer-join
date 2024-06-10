<?php
@session_start(); 
@header('HTTP/1.1 200 OK');
include "lib/connect.php";
if(empty($_SESSION['sess_login_user']) and $_SESSION['sess_login_user']!='admin' and $_SESSION['sess_login_user']!='emp' ){
	exit("<script>alert(' สำหรับ admin เท่านั้น! ');window.location='index.php';</script>");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ส่วนผู้ดูแลระบบ</title>
<link rel="icon" type="image/x-icon" href="img/favicon.ico">
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
<?php //  include "main_inc.php"; ?>
<div class="main">
  <section>
  <article>
  
<?php
//------------------------------------- 
include $_GET['page'].".php";
//-------------------------------------
?>
 
	</article>
	</section>
 
  </div>
<?php  include "menu_right.php"; ?>
 
</div>
</main>
 <?php include "footer.php"; ?>
</body>
</html>
