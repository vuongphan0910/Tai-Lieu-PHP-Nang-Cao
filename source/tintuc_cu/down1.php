<?php 
	session_start();
	require_once "classdb.php";
	$d = new db;
	$idDL=$_GET['idDL']; settype($idDL,"int");
	if ($idDL<=0)
	exit();
	$sql = "SELECT url FROM download WHERE idDL=$idDL";
	$download = mysql_query($sql) or die(mysql_error());
	$row_download = mysql_fetch_assoc($download);
	$filename = $row_download['url'];
	$url = 'download/'.$filename;
	$mimetype="application/force-download";//mime_content_type($url);
	$filesize = filesize($url);
	header("Content-Type: $mimetype");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Length: " . $filesize);
	set_time_limit(0);
	$file = fopen($url,"rb");//php doc file nhi phan
	if ($file) {
		while(!feof($file)) {	
		print(fread($file, 1024*8));//doc tu  $file 32kb đổ vào buffer
		flush();//rồi sau đó đổ về trình duyệt để trống buffer
		if(isset($_SESSION['login_id'])==false)	
	sleep(2); //hạn chế tốc độ down chậm hơn 2s
	}
		fclose($file);
	}
	$sql="UPDATE download SET SoLanDown=SoLanDown+1 WHERE idDL=$idDL";
	mysql_query($sql) or die (mysql_error());




?>