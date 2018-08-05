<?php
class tintuc{
	
	function connect($host, $user, $pass,$db)
	{
		mysql_connect($host,$user,$pass);
		mysql_select_db($db);
		mysql_query("set names 'utf8'");
	}
	
	//Ham lay the loai:
	public function TheLoai($lang='vi' , $AnHien=1){
	$sql="SELECT idTL, TenTL from theloai
		 WHERE (AnHien=$AnHien or $AnHien=-1)
	 AND(lang='$lang' or '$lang'='') 
	 	 ORDER BY ThuTu";
	$kq = mysql_query($sql) or die(mysql_error());
	return $kq;
}


//Ham lay loai tin theo the loai:
function LoaiTinTrongTheLoai($idTL,$AnHien=1){
	settype($idTL, "int");	
	$sql = "SELECT idLT, Ten FROM loaitin  
		  WHERE idTL=$idTL AND (AnHien=$AnHien or $AnHien=-1)  
	  ORDER BY ThuTu ASC";
	$kq = mysql_query($sql) or die(mysql_error());	
	return $kq;}


}
?>