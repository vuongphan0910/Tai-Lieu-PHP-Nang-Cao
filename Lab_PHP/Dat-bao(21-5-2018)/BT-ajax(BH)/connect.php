<?php 
$link=mysqli_connect("localhost","root","") or die("Khong the ket noi den server!");
mysqli_select_db($link,"webtintuc") or die("Database khong ton tai!");
mysqli_query($link,"set names utf8");
?>