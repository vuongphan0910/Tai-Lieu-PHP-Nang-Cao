<?php 
	session_start();
	if(!isset($_SESSION['login_id'])) include "formdangnhap.php";
	else include "chao.php";

?>