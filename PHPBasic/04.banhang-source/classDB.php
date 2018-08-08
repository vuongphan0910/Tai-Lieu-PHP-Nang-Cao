<?php
class db {	
	public $result = NULL;
	public $host="localhost";
	public $user="root";
	public $pass="root";
	public $database="banhang";
	public $folderHinh="/banhang/upload/sanpham/hinhchinh/";
	public $KyHieuTienTe="VNĐ";
	function __construct(){
		mysql_connect($this->host, $this->user, $this->pass);
		mysql_select_db($this -> database);
		mysql_query("set names 'utf8'"); 	 
	} 
	function getdata($sql) {
		$this->result = mysql_query( $sql ) or die (mysql_error());		
	}
	function fetchRow() {
		if (is_resource($this->result)) {
		   $row = mysql_fetch_assoc($this->result);
		   if (is_array($row))  return $row;    		
		}
		return FALSE;
	}

	public function ChungLoai($AnHien=1){
		$sql="SELECT idCL, TenCL from chungloai WHERE (AnHien=$AnHien or $AnHien=-1)			
			ORDER BY ThuTu";
		$kq = mysql_query($sql);
		return $kq;
	}//TheLoai	

	public function LoaiSP ($AnHien=1){
		$sql="	SELECT idLoai, TenLoai  FROM loaisp
				WHERE (AnHien=$AnHien or $AnHien=2) 
				ORDER BY Thutu";
		$kq = mysql_query($sql) or die(mysql_error());	
		return $kq;
	} //LoaiTin	
	
	function LoaiSPTrongChungLoai($idCL,$AnHien=1){
		settype($idCL, "int");	
		$sql = "SELECT idLoai, TenLoai FROM loaisp  WHERE (AnHien=$AnHien or $AnHien=2)  
		  AND	idCL=$idCL ORDER BY ThuTu ASC";
		$kq = mysql_query($sql) or die(mysql_error());	
		return $kq;
	}
	

	
} //class db
?>