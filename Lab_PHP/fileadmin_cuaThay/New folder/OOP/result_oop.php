<?php 
	require_once "class_oop.php";
	$mysql= new DB_MySQL;
	$mysql->connect("localhost","computer","root","");
	$mysql->query("select * from sanpham ");
	while($d=$mysql->fetchRow())
	{
		echo $d['tensp']."<br/>";
	}
	$mysql->disconnect();

?>