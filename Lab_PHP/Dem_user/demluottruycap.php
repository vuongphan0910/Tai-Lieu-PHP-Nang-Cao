<?php

$link=mysql_connect('localhost','root','') or die (mysql_error());
mysql_select_db('test') or die (mysql_error());
mysql_query('set names utf8');


//Tang luot truy cap:
$sl="update counter set cnt=cnt+1";
mysql_query($sl);

//hien thi luot truy cap:

$kq=mysql_query("select cnt from counter");
$d=mysql_fetch_array($kq);

$chuoi=str_pad($d['cnt'],6,"0",STR_PAD_LEFT);
$luottruycap="";
for($i=0;$i<strlen($chuoi);$i++)
{
	$tam=substr($chuoi,$i,1);
	$luottruycap.="<img src='images/$tam.png'/>";
}

echo "Luot truy cap: ".$luottruycap;


?>