<?php
/*mysql_connect("localhost","root","") or die("Khong the ket noi den server!");
mysql_select_db("tintuc") or die("Database khong ton tai!");
mysql_query("set names utf8");*/


$link=mysqli_connect("localhost","root","") or die("Khong the ket noi den server!");
mysqli_select_db($link,"ck") or die("Database khong ton tai!");
mysqli_query($link,"set names utf8");
?>