<?php
session_start();
if (isset($_SESSION['login_id'])==false) {
    $_SESSION['back'] = $_SERVER['REQUEST_URI'];
    header('location:dangnhap.php');
	exit();   
}
?>
