<?php 
	$cachedir='cache/';
	$cachetime=3600;
	$cacheext='cache';
	$page='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=$lang";
	$pathfile = $cachedir.md5($page).$cacheext;
	$file_created =(file_exists($pathfile))?filemtime($pathfile):0 ;
	if (time() - $cachetime < $file_created) {
    ob_start();
    readfile($pathfile);   //đọc 1 file và echo nội dung ra buffer    
    ob_end_flush();
    exit();
	}
	ob_start();


?>