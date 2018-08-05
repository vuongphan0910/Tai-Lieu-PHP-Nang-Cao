<?php
include("lib.php");
$tin=new tintuc;
$tin->connect("localhost","root","","tintuc");
$lang="en"; //$lang=$_GET['lang'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body { font-family: Times New Roman; font-size:16; Text-align:center }
#container { margin: auto; width: 960px; text-align: left;}
#header{	height:150px; border:solid 1px #033; 
		background: no-repeat url(banner/banner1.jpg) }
#thanhmenu{height:50px; background-color:#004080;  margin-top:5px;}
#main1{ height:300px; margin-top:3px;  }
#main1_1{ float:left; width:460px;background-color:#9CF;height:300px}
#main1_2{ float:left; width:240px; margin-left:5px; height:300px; background-color:#CCC;}
#main1_3{	float:left; width:250px; margin-left:5px; 
			height:300px; background-color: #CCCC99;}
#quangcao{height:90px; clear:left; margin-top:3px;background-color:#6CC;}
#main2_1 {width:660px; float:left; min-height:600px;
		background-color: #669999;}

#main2_2 {	width:300px; float:left; min-height:600px;
			background-color: #369;}

#footer{	height:150px; clear:both; text-align:center; 
		color:#FFFF33; background-color:#036; }

</style>
</head>

<body>
<div id="container">
	<div id="header"> </div>
   <div id="thanhmenu"><?php include("menu/menu.php");?></div>
 	<div id="main1">
   	<div id="main1_1"><?php include("tinnoibat.php");?></div>
		<div id="main1_2"><?php include("tinxemnhieu.php");?></div>
		<div id="main1_3">  </div>
	</div>
	<div id="quangcao"> </div>
	<div id="main2">
		<div id="main2_1"><?php 
		if(isset($_GET['key']))
		{
			switch($_GET['key'])
			{
				case "ctt": include("chitiettin.php");break;
			}
		}
		else include("tinmoi.php"); ?></div>
        <div id=main2_2>    		
            <div id="loihayydep"> </div>
		   <div id="divtimkiem"> </div>
            <div id="divbinhchon"> </div>
	   <div id="quangcao2"> </div>
	   	</div>
	</div>
<div id="footer">  </div>
</div> <!-- container -->

</body>
</html>