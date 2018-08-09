<?php 
	require_once "classDB.php";
	class tin extends db{
			function TinXemNhieu($lang='vi',$sotin=10){
					$sql ="Select idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem,TieuDe_KhongDau From tin where AnHien=1 and 
					(lang='$lang' or '$lang'='')
					Order By SoLanXem DESC LIMIT 0,$sotin";
					$kq=mysql_query($sql) or die (mysql_error());
					return $kq;	
			}//end tinxemnhieu
		
		function TinNoiBat($lang ='vi', $sotin = 10){		
			$sql="select * from tin where AnHien = 1 And TinNoiBat=1 And(lang='$lang' or '$lang' ='') 
			order by idTin DESC Limit 0,$sotin ";		
			$kq = mysql_query($sql) or die(mysql_error());
			return $kq;		
			}
		
			function LayBinhChonNgauNhien(){
						$sql="SELECT idBC, MoTa FROM binhchon ORDER BY rand() LIMIT 0,1";
						$kq = mysql_query($sql) or die (mysql_error());
						return $kq; 
						}

			function CacPhuongAnTrongCauHoi($idBC){
					settype($idBC,"int");	
					$sql= "select * from phuongan where idBC=$idBC";
					$kq=mysql_query($sql);
					return $kq;
				
				}
			function CapNhatSoLanChonPA($idPA){
				settype($idPA,"int");
				$sql="UPDATE phuongan SET SoLanChon=SoLanChon+1 where idPA=$idPA";
				$kq=mysql_query($sql);
					
				
				}	
			function TongSoLanChon($idBC){
				$sql="Select sum(SoLanChon) from phuongan where idBC =$idBC";
				$kq=mysql_query($sql);
				$row_kq=mysql_fetch_row($kq);
				return $row_kq[0];
				
				}
			function LayCauHoi($idBC){
				
					$sql="select * from binhchon where idBC=$idBC";
					$kq=mysql_query($sql);
					return $kq;
					
				
				}	
			function TinMoiTrongTheLoai($idTL,$startRow, $count){
						$sql="SELECT idTin, TieuDe,TieuDe_KhongDau,TomTat,urlHinh 
						FROM tin  WHERE AnHien =1 AND idTL = $idTL 
						ORDER BY idTin DESC  LIMIT $startRow , $count";
						$kq = mysql_query($sql) or die (mysql_error());		
						return $kq; 
					}
				function ChiTietTin($idTin)  {
							settype($idTin, "int");
							$sql="SELECT idTin, TieuDe, TomTat, Ngay, urlHinh, Content, SoLanXem,TieuDe_KhongDau, 
							TinNoiBat, tin.AnHien, tin.idLT, Ten, tin.idTL, TenTL
							FROM  tin, loaitin, theloai
							WHERE tin.idLT=loaitin.idLT  AND loaitin.idTL=theloai.idTL AND idTin=$idTin";
							$kq = mysql_query($sql) or die(mysql_error());
							return $kq; }
					function CapNhatSolanXemTin($idTin){
							settype($idTin,"int");
							$sql = "UPDATE tin SET SolanXem = SoLanXem+1 WHERE idTin = $idTin";
							mysql_query($sql) or die(mysql_error());
						}
					function TinCuCungLoai($idTin, $lang ='vi', $sotin = 5){		
								$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem,TieuDe_KhongDau  FROM  tin 
								WHERE AnHien = 1 AND idTin<$idTin AND ( lang ='$lang' or '$lang'='' )
								AND idLT = (SELECT idLT FROM tin WHERE idTin = $idTin)
								ORDER BY idTin DESC  LIMIT 0, $sotin";		
								$kq = mysql_query($sql) or die(mysql_error());
								return $kq;	}
				function TinMoiCungLoai($idTin, $lang ='vi', $sotin = 5){		
								$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem,TieuDe_KhongDau  FROM  tin 
								WHERE AnHien = 1 AND idTin>$idTin AND ( lang ='$lang' or '$lang'='' )
								AND idLT = (SELECT idLT FROM tin WHERE idTin = $idTin)
								ORDER BY idTin DESC  LIMIT 0, $sotin";		
								$kq = mysql_query($sql) or die(mysql_error());
								return $kq;
				}
				
				function TinTrongLoai($idLT,&$totalRow,$pageNum=1,$pageSize=5){
							$startRow= ($pageNum-1)*$pageSize;
						$sql="select idTin,TieuDe,TieuDe_KhongDau,TomTat,urlHinh,Ngay,SoLanXem
							  From tin 
							  Where AnHien=1 and idLT = $idLT
							  OrDer By idTin DESC LiMit $startRow,$pageSize";
						$kq= mysql_query($sql) or die(mysql_error());
						$sql="select count(*) as sodong 
							   From tin 
							  Where AnHien=1 and idLT = $idLT
								  
						";
						$rs=mysql_query($sql) or die (mysql_error());
						$row_rs=mysql_fetch_assoc($rs);
						$totalRow=$row_rs['sodong'];
						return $kq;
					
					
					}
					function TinNoiBatTrongLoai($lang ='vi', $sotin =5,$idLT){	
							settype($idLT,"int");	
							$sql="select * from tin where AnHien = 1 And TinNoiBat=1
							 And(lang='$lang' or '$lang' ='') And idLT = $idLT
							order by idTin DESC Limit 0,$sotin ";		
							$kq = mysql_query($sql) or die(mysql_error());
							return $kq;	
							settype($idLT,"int");
					
							}
				function ChiTietLoaiTin($idLT){
					settype($idLT,"int");
					$sql="SElect idLT , Ten,loaitin.idLT, TenTL,Ten_KhongDau
						  From loaitin,theloai
						  Where loaitin.idTL=theloai.idTL and idLT =$idLT";
						  
					$kq= mysql_query($sql) or die (mysql_error());
					return $kq;
					
					}
				function TimKiem($tukhoa,&$totalRow,$pageNum=1,$pageSize=5,$lang='vi'){
					
					$startRow=($pageNum-1)*$pageSize;
					$tukhoa=trim(strip_tags($tukhoa));
					if(get_magic_quotes_gpc()==false){
						$tukhoa=mysql_real_escape_string($tukhoa);
					}
						/*if($tukhoa==""){
								$back=$_SERVER['PHP_SELF'];
								header("location:$back");
							}*/
					$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, Ten,
							 TenTL,TieuDe_KhongDau,tin.lang,theloai.lang,loaitin.lang
						  FROM tin, loaitin, theloai
						  Where tin.AnHien=1 And tin.idLT=loaitin.idLT And tin.idTL=theloai.idTL
						  And(TieuDe like '%$tukhoa%' or TomTat like '%$tukhoa%')  And(tin.lang='$lang' or '$lang' ='')
						  And(theloai.lang='$lang' or '$lang' ='') And(loaitin.lang='$lang' or '$lang' ='')
						  OrDer By idTin DESC LiMit $startRow,$pageSize";/**/
					$kq=mysql_query($sql) or die (mysql_error());
					$sql="select count(*)
						  from tin,loaitin,theloai
						  Where tin.AnHien=1 And tin.idLT=loaitin.idLT And tin.idTL=theloai.idTL
						  And(TieuDe like '%$tukhoa%' or TomTat like '%$tukhoa%' ) And(tin.lang='$lang' or '$lang' ='')
						  And(theloai.lang='$lang' or '$lang' ='') And(loaitin.lang='$lang' or '$lang' ='') ";
					$rs = mysql_query($sql) or die (mysql_error());
					$row_rs=mysql_fetch_row($rs);
					$totalRow=$row_rs[0];
					return $kq;
					
					}//end timkiemlike '%$tukhoa%'RegExp '$tukhoa'
					
				function getTitle($view=''){
						if($view=='') return "{Site_Title}";
						else if ($view=='search'){
								$tukhoa=$_GET['tukhoa'];
								return "Tìm Kiếm Thông Tin | ".$tukhoa;
							
							} //return "Tìm Kiếm Thông Tin";
						else if ($view=='register') return "Đăng Ký Thành Viên";
						else if ($view=='news') {
							$TieuDe_KhongDau=$_GET['TieuDe_KhongDau'];
							$kq=mysql_query("SELECT TieuDe FROM tin WHERE TieuDe_KhongDau='$TieuDe_KhongDau'")
							or die (mysql_error());
							if(mysql_num_rows($kq)<=0)return "{Site_Title}";
							$row_kq=mysql_fetch_row($kq);
							return $row_kq[0];
						}
						if ($view=='cat'){
							$Ten_KhongDau=$_GET['Ten_KhongDau'];;
							$kq=mysql_query("SELECT Ten FROM loaitin WHERE Ten_KhongDau='$Ten_KhongDau'")
							or die (mysql_error());
							if(mysql_num_rows($kq)<=0)
							return "{Site_Title}";
							$row_kq=mysql_fetch_row($kq);
							return $row_kq[0];	
						}
					
					}	//end function getTitle
					
				function LayidTin($TieuDe_KhongDau){
						
						$sql="select idTin From tin where TieuDe_KhongDau ='$TieuDe_KhongDau'";
						$kq = mysql_query($sql) or die (mysql_error());
						$row_kq=mysql_fetch_assoc($kq);
						return $row_kq['idTin'];
					}
					function TimkiemNangCao($thoigian,&$totalRow,$pageNum=1,$pageSize=5){
							
							$startRow=($pageNum-1)*$pageSize;
							$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, Ten, TenTL,TieuDe_KhongDau
						  FROM tin, loaitin, theloai
						  Where tin.AnHien=1 And tin.idLT=loaitin.idLT And tin.idTL=theloai.idTL
						  And DATE(Ngay) ='$thoigian' LiMit $startRow,$pageSize
						   "; 
						  $kq=mysql_query($sql) or die (mysql_error());
						  $sql="select count(*)
							  from tin,loaitin,theloai
							  Where tin.AnHien=1 And tin.idLT=loaitin.idLT And tin.idTL=theloai.idTL
						  		And DATE(Ngay) ='$thoigian'";
							$rs = mysql_query($sql) or die (mysql_error());
							$row_rs=mysql_fetch_row($rs);
							$totalRow=$row_rs[0];
							return $kq;
							
							
						
						
						}
					function LayidLT($Ten_KhongDau){
							$sql="select idLT from loaitin where Ten_KhongDau='$Ten_KhongDau'";
							$kq=mysql_query($sql) or die (mysql_error());
							$row_kq=mysql_fetch_assoc($kq);
							return $row_kq['idLT'];
						
						}
					


		
		}//end class tinOrDer By idTin DESC

?>
