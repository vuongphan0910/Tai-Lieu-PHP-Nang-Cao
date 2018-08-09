<?php
    session_start(); 
    require_once("classDB.php"); $d=new db;
    $u=$_POST['username'];
	   $p=$_POST['password'];
    $u=trim(strip_tags($u)); 
	$p=trim(strip_tags($p));
    if (get_magic_quotes_gpc()==false){
        $u=mysql_real_escape_string($u);
        $p=mysql_real_escape_string($p);
    }
    $sql="SELECT * FROM users WHERE username='$u' AND password =md5('$p') ";
    $user = mysql_query($sql) or die (mysql_error());		
    if (mysql_num_rows($user)==1) {//Thành công	
          $row_user = mysql_fetch_assoc($user);
          $_SESSION['login_id'] = $row_user['idUser'];
          $_SESSION['login_user'] = $row_user['Username'];
          $_SESSION['login_group'] = $row_user['idGroup'];
          $_SESSION['login_HoTen'] = $row_user['HoTen'];
    } 
    include "userinfo.php";
?>