<?php
require_once "classDB.php";
class sanpham extends db{
	function SanPhamBanChay($sosp = 10){				
		$sql="SELECT * 	FROM sanpham WHERE AnHien = 1 
			ORDER BY SoLanMua DESC 
			LIMIT 0,$sosp";
		$kq = mysql_query($sql) or die (mysql_error());		
		return $kq;		
	}	
	function SanPhamMoi($sosp = 10){				
		$sql="SELECT * FROM sanpham  WHERE AnHien = 1 
			ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";	
		$kq = mysql_query($sql) or die(mysql_error());	
		return $kq;		
	}		

	function ChiTietSanPham($idSP)  {
		settype($idSP, "int");
		$sql="	SELECT idSP, TenSP, MoTa, NgayCapNhat, urlHinh, SoLanMua, sanpham.AnHien, 
				sanpham.idLoai, TenLoai, sanpham.idCL, TenCL
				FROM  sanpham, loaisp, chungloai
				WHERE idSP = $idSP AND sanpham.idLoai=loaisp.idLoai  AND loaisp.idCL=chungloai.idCL";
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq;
	}
	function ChiTietLoaiSP($idLoai) {
		settype($idLoai, "int");
		$sql = "SELECT idLoai, TenLoai, loaisp.idCL, TenCL
				FROM loaisp, chungloai
				WHERE idLoai = $idLoai AND loaisp.idCL = chungloai.idCL";		
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq;		
	} 	
	function SPMoiTrongChungLoai($idCL,$from, $count){
		$sql = "SELECT * FROM sanpham 
				WHERE AnHien =1 AND idCL = $idCL 
				ORDER BY NgayCapNhat DESC LIMIT $from,$count";
		$kq=mysql_query($sql) or die (mysql_error());		
		return $kq;				
	}	
	function DaTraTien($idDH){
		$sql="UPDATE donhang SET DaTraTien=1 WHERE idDH=$idDH";
		mysql_query($sql) or die(mysql_error());
	}
		
} //class sanpham

?>