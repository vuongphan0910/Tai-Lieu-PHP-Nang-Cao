
<?php 
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	require "lang_$lang.php";
	include "CacheFile_Begin.php";
	include "home.php";
	//setcookie('lang' , $lang , time()+60*60*24*30,'/tintuc/');
	$str=ob_get_clean();
	$str = str_replace("{Site_Title}" , Site_Title , $str);
	$str = str_replace("{Homnay}" , Homnay , $str);
	$str = str_replace("{HomNay_JS}" , HomNay_JS , $str);
	
	$str = str_replace("{Homepage}" , Homepage , $str);
	$str = str_replace("{TinXemNhieu}" , TinXemNhieu , $str);
	$str = str_replace("{TinNoiBat}" , TinNoiBat, $str);
	
	$str = str_replace("{Timkiem_NC}" , Timkiem_NC , $str);
	$str = str_replace("{TuKhoa}" , TuKhoa , $str);
	$str = str_replace("{Tim_btnvalue}" , Tim_btnvalue , $str);
	
	$str = str_replace("{Ketquatimkiem}" , Ketquatimkiem , $str);
	$str = str_replace("{Timduoc}" , Timduoc , $str);
	$str = str_replace("{Ngaydang}" , Ngaydang , $str);
	$str = str_replace("{Solanxem}" , Solanxem , $str);
	
	$str = str_replace("{Poll_Caption}" ,Poll_Caption, $str);
	
	$str = str_replace("{Newer}" , Newer , $str);
	$str = str_replace("{OlderNews}" , OlderNews , $str);
	$str = str_replace("{chitiet}" , chitiet , $str);
	
	echo $str;
	include "CacheFile_End.php";

?>