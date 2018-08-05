<?php
$link=mysql_connect("localhost","root","")
or die("Khong The ket noi");
mysql_select_db("webtintuc",$link);
mysql_query("SET NAMES 'utf8'");
?>
