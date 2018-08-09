<?php
	$cachedir = 'cache/'; 
	$cacheext = 'cache'; 
	$page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=$lang"; 
	$pathfile = $cachedir . md5($page) . '.' . $cacheext; 
	$fp = fopen($pathfile, 'w'); 
	fwrite($fp, $str);
	fclose($fp); 
	ob_end_flush(); 



 ?>