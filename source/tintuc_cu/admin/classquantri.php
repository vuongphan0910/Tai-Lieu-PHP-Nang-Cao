<?php
	require_once"../classDB.php";
	class quantritin extends db {
		function DangNhap(){
				$u=$_POST['u'];
				$p=md5($_POST['p']);
				if (get_magic_quotes_gpc()== false)
				{
					$u=mysql_real_escape_string($u);
					$p=mysql_real_escape_string($p);

					}
				$sql="select * from users where Username='$u' and Password = '$p'";
				$kq=mysql_query($sql) or die (mysql_error());
				if(mysql_num_rows($kq)==1){
						$row=mysql_fetch_assoc($kq);
						$_SESSION['id']=$row['idUser'];
						$_SESSION['hoten']=$row['HoTen'];
						$_SESSION['user']=$row['Username'];
						$_SESSION['level']=$row['idGroup'];
						
						if (isset($_POST['nho'])== true){
							 setcookie("un", $_POST['u'], time() + 60*60*24*7 );
							 setcookie("pw", $_POST['p'], time() + 60*60*24*7 );
						} else {
							 setcookie("un", $_POST['u'], time() -1);
							 setcookie("pw", $_POST['p'], time() -1);
						}
						
						if (strlen($_SESSION['back'])>0){
							$back = $_SESSION['back']; 
						   unset($_SESSION['back']);
							header("location:$back");
						} else header("location: main.php");
							} else header("location:login.php");

					
					
					}//function
					
					function CheckLogin() {
									session_start();
									if (isset($_SESSION['id'])== false){
										  $_SESSION['error'] = 'Bạn chưa đăng nhập';
										  $_SESSION['back'] = $_SERVER['REQUEST_URI'];
										   header('location:login.php'); 
										   exit();
									 }elseif ($_SESSION['level']!=1){
										  $_SESSION['error'] = 'Bạn không có quyền xem trang này';
										  
										  $_SESSION['back'] = $_SERVER['REQUEST_URI'];
										  
										  header('location:login.php');
										  exit();
									 }
								}//function
								
													
					public function ThemLoaiTin(){
						//Tiếp nhận dữ liệu
						$Ten = $_POST['Ten'];
						$ThuTu = $_POST['ThuTu'];
						$AnHien = $_POST['AnHien'];
						$idTL = $_POST['idTL'];
						$Lang = $_POST['lang'];
						
						//Kiểm tra dữ liệu
						settype($AnHien,"int");
						settype($ThuTu,"int");
						settype($idTL,"int");
						$Ten = trim(strip_tags($Ten));
						$Lang = trim(strip_tags($Lang));
						if (get_magic_quotes_gpc()== false)	{
							$Ten = mysql_real_escape_string($Ten);
						}
						$Ten_KhongDau= $this->changeTitle($Ten);
							$sql1="select * from loaitin where Ten='$Ten'";
							$kq=mysql_query($sql1) or die (mysql_error());
							if(mysql_num_rows($kq)!=0)
							{
							 $loi= 'Loại Tin Đã Tồn Tại';
							exit();
							}
							else
						{
						$sql="INSERT INTO loaitin (Ten,Ten_KhongDau, ThuTu, AnHien,idTL,lang) 
							VALUES ('$Ten','$Ten_KhongDau',$ThuTu, $AnHien,$idTL,'$Lang')";//Chèn dữ liệu vào database
						mysql_query($sql) or die (mysql_error());
					}
					}
					
					public function CapNhatLoaiTin($idLT){
						//Tiếp nhận dữ liệu
						$Ten = $_POST['Ten'];
						$ThuTu = $_POST['ThuTu'];
						$AnHien = $_POST['AnHien'];
						$idTL = $_POST['idTL'];
						$Lang = $_POST['lang'];
						//Kiểm tra dữ liệu
						settype($AnHien,"int");
						settype($ThuTu,"int");
						settype($idTL,"int");
						$Ten = trim(strip_tags($Ten));
						$Lang = trim(strip_tags($Lang));
						if (get_magic_quotes_gpc()== false)	{
							$Ten = mysql_real_escape_string($Ten);
						}
						$Ten_KhongDau= $this->changeTitle($Ten);
						//Chèn dữ liệu vào database
						$sql="UPDATE  loaitin SET Ten='$Ten',Ten_KhongDau='$Ten_KhongDau', ThuTu=$ThuTu,    			AnHien=$AnHien,idTL=$idTL,lang='$Lang' where idLT=$idLT"; 
							
						$kq=mysql_query($sql) or die (mysql_error());
					}
					function XoaLoaiTin($idLT)
					{
						settype ($idLT,"int");
						$sql="Delete From loaitin where idLT=$idLT";
						$kq=mysql_query($sql) or die (mysql_error());
						
												
						}//end function xoaloaitin
						function XoaTin($idTin)
					{
						settype ($idTin,"int");
						$sql="Delete From tin where idTin=$idTin";
						$kq=mysql_query($sql) or die (mysql_error());
						
												
						}
					function DemTinTrongLoaiTin($idLT)
					{
						$sql="select count(idLT) as Sotin From tin where idLT=$idLT";
						$kq= mysql_query($sql) or die (mysql_error());
						$row_kq= mysql_fetch_assoc($kq);
						$sotin=$row_kq['Sotin'];
						return $sotin;
						
						}
									
					function DemLoaiTinTrongTheLoai($idTL)
					{
						$sql="select count(idTL) as Sotheloai From loaitin where idTL=$idTL";
						$kq= mysql_query($sql) or die (mysql_error());
						$row_kq= mysql_fetch_assoc($kq);
						$sotheloai=$row_kq['Sotheloai'];
						return $sotheloai;
						
						}	
						function XoaTheLoaiTin($idTL)
					{
						settype ($idTL,"int");
						$sql="Delete From theloai where idTL=$idTL";
						$kq=mysql_query($sql) or die (mysql_error());
						
												
						}			
				function chitietloaitin($idLT)
				{
					$sql="select * from loaitin where idLT =$idLT";
					$kq=mysql_query($sql) or die (mysql_error());
					return $kq;
					
					}
					//*************/
					function chitiettheloaitin($idTL)
				{
					$sql="select * from theloai where idTL =$idTL";
					$kq=mysql_query($sql) or die (mysql_error());
					return $kq;
					
					}
					public function ThemTheLoaiTin(){
						//Tiếp nhận dữ liệu
						$TenTL = $_POST['TenTL'];
						$ThuTu = $_POST['ThuTu'];
						$AnHien = $_POST['AnHien'];
						$Lang = $_POST['lang'];
						//Kiểm tra dữ liệu
						settype($AnHien,"int");
						settype($ThuTu,"int");
						$TenTL = trim(strip_tags($TenTL));
						$Lang = trim(strip_tags($Lang));
						if (get_magic_quotes_gpc()== false)	{
							$TenTL = mysql_real_escape_string($TenTL);
						}
						$TenTL_KhongDau= $this->changeTitle($TenTL);
						//Chèn dữ liệu vào database
						$sql="INSERT INTO theloai (TenTL,TenTL_KhongDau, ThuTu, AnHien,lang) 
							VALUES ('$TenTL','$TenTL_KhongDau',$ThuTu, $AnHien,'$Lang')";
						mysql_query($sql) or die (mysql_error());
					}//end them the loai tin
					
					
					
					
					////////******************//////////////
					public function CapNhatTheLoaiTin($idTL){
						//Tiếp nhận dữ liệu
						$TenTL = $_POST['TenTL'];
						$ThuTu = $_POST['ThuTu'];
						$AnHien = $_POST['AnHien'];
						
						$Lang = $_POST['lang'];
						//Kiểm tra dữ liệu
						settype($AnHien,"int");
						settype($ThuTu,"int");
						
						$TenTL = trim(strip_tags($TenTL));
						$Lang = trim(strip_tags($Lang));
						if (get_magic_quotes_gpc()== false)	{
							$TenTL = mysql_real_escape_string($TenTL);
						}
						$TenTL_KhongDau= $this->changeTitle($TenTL);
						//Chèn dữ liệu vào database
						$sql="UPDATE  theloai SET TenTL='$TenTL',TenTL_KhongDau='$TenTL_KhongDau', ThuTu=$ThuTu,    			AnHien=$AnHien,lang='$Lang' where idTL=$idTL"; 
							
						$kq=mysql_query($sql) or die (mysql_error());
					}////**************////END CAPNHATTHELOAITIN
					
					
					function ListLoaitTin($idTL=-1,&$totalRow,$pageNum=1,$pageSize=5)
					{
						
						$startRow= ($pageNum-1)*$pageSize;
						
						settype($idTL,"int");
						$sql="SELECT idLT, Ten, loaitin.AnHien, loaitin.ThuTu, TenTL,loaitin.lang
						FROM loaitin, theloai
						WHERE loaitin.idTL=theloai.idTL AND (loaitin.idTL=$idTL OR $idTL=-1) 
						
						LiMit $startRow,$pageSize";///*ORDER BY loaitin.ThuTu ASC*/
						$kq = mysql_query($sql) or die (mysql_error());
						$sql="select count(*) as sodong 
								 FROM loaitin, theloai
						WHERE loaitin.idTL=theloai.idTL AND (loaitin.idTL=$idTL OR $idTL=-1) 
						";
						$rs=mysql_query($sql) or die (mysql_error());
						$row_rs=mysql_fetch_assoc($rs);
						$totalRow=$row_rs['sodong'];
						return $kq; 	

						
						}	
						
						
						function ListTheLoaiTin($idTL=-1,&$totalRow,$pageNum=1,$pageSize=5)
					{
						
						$startRow= ($pageNum-1)*$pageSize;
						
						settype($idTL,"int");
						$sql="SELECT *
						FROM  theloai
						WHERE idTL=$idTL OR $idTL=-1
						
						LiMit $startRow,$pageSize";
						$kq = mysql_query($sql) or die (mysql_error());
						$sql="select count(*) as sodong 
								 FROM  theloai
						WHERE idTL=$idTL OR $idTL=-1
						";//ORDER BY ThuTu ASC
						$rs=mysql_query($sql) or die (mysql_error());
						$row_rs=mysql_fetch_assoc($rs);
						$totalRow=$row_rs['sodong'];
						return $kq; 	

						
						}	
						
						
						function ListUsers(){
							
							
							
						}
						
	function ListTin($idTL,$idLT,$lang='vi',&$totalRow,$pageNum=1,$pageSize=5)
		{
						$startRow =($pageNum-1)* $pageSize;
						 $sql ="select idTin,tin.lang,TieuDe,TomTat,urlHinh,SoLanXem,Ngay,TinNoiBat,tin.AnHien,TenTL,Ten
						from tin,theloai,loaitin
						where tin.idTL=theloai.idTL and tin.idLT=loaitin.idLT and (tin.idTL=$idTL or $idTL=-1) And (tin.idLT=$idLT or 	$idLT=-1) And (tin.lang='$lang' or '$lang' ='')
						Order By tin.idTin DESC
						Limit $startRow,$pageSize";
						
						$kq = mysql_query($sql) or die (mysql_error());
						$sql="select count(*) as sodong
						from tin,theloai,loaitin 
							where tin.idTL=theloai.idTL and tin.idLT=loaitin.idLT and (tin.idTL=$idTL or $idTL=-1) And (tin.idLT=$idLT or $idLT=-1) And (tin.lang='$lang' or '$lang' ='')
						Order By tin.idTin DESC
						";//ORDER BY ThuTu ASC
						$rs=mysql_query($sql) or die (mysql_error());
						$row_rs=mysql_fetch_assoc($rs);
						$totalRow=$row_rs['sodong'];
						return $kq;
												
						
						}//end function listtin	
						
						function ThemTin()
						{
							
							$lang = $_POST['lang'];
							$TieuDe =$_POST['TieuDe'];
							$TomTat = $_POST['TomTat'];
							$urlHinh= $_POST['urlHinh'];
							$Ngay=$_POST['Ngay'];
							$AnHien = $_POST['AnHien'];
							$NoiBat=$_POST['NoiBat'];
							$idTL =$_POST['idTL'];
							$idLT=$_POST['idLT'];
							$idUser =$_SESSION['id'];
							$Content =$_POST['Content'];
							settype($AnHien,"int");
							settype ($NoiBat,"int");
							settype($idTL,"int");
							settype($idLT,"int");
							$lang = trim(strip_tags($lang));
							$TieuDe= trim (strip_tags($TieuDe));
							$TomTat= trim(strip_tags($TomTat));
							$urlHinh=trim(strip_tags($urlHinh));
							$Ngay = trim(strip_tags($Ngay));
							if (get_magic_quotes_gpc()== false) {
							$lang = mysql_real_escape_string($lang);
							$TieuDe = mysql_real_escape_string($TieuDe);
							$TomTat = mysql_real_escape_string($TomTat);
							$Content= mysql_real_escape_string($Content);
							$urlHinh = mysql_real_escape_string($urlHinh);
							$Ngay = mysql_real_escape_string($Ngay);
 							
							$Ngay_arr = explode("/",$Ngay); // array(17,11,2010)
							if (count($Ngay_arr)==3) {
								$d = $Ngay_arr[0]; //17
								$m = $Ngay_arr[1]; //11
								$y = $Ngay_arr[2]; //2010
								if (checkdate($m,$d,$y)==false) $Ngay = date("Y-m-d H:i:s");
								else $gio=date('H:i:s'); 
									$Ngay = $y."-".$m."-".$d."-"."-".$gio;
							} else $Ngay=date("Y-m-d H:i:s");
							$TieuDe_KhongDau = $this->changeTitle($TieuDe);
							 $sql="INSERT INTO tin 
								  (TieuDe, TieuDe_KhongDau,TomTat, urlHinh, Ngay, lang, idTL, idLT,
								   idUser, AnHien,   TinNoiBat,Content) 
								  VALUES ('$TieuDe','$TieuDe_KhongDau','$TomTat','$urlHinh','$Ngay',
								   '$lang',
								   $idTL, $idLT, $idUser, $AnHien, $NoiBat,
									'$Content')";
							mysql_query($sql) or die(mysql_error());
							/*$sql="update tin set sotin = sotin+1 where idloai=$idLT";
							mysql_query($sql) or die(mysql_error());*/
							}
																				
						}//end them tin
					
						function ChinhTin($idTin)
						{
							
							$lang = $_POST['lang'];
							$TieuDe =$_POST['TieuDe'];
							$TomTat = $_POST['TomTat'];
							$urlHinh= $_POST['urlHinh'];
							$Ngay=$_POST['Ngay'];
							$AnHien = $_POST['AnHien'];
							$NoiBat=$_POST['NoiBat'];
							$idTL =$_POST['idTL'];
							$idLT=$_POST['idLT'];
							$idUser =$_SESSION['id'];
							$Content =$_POST['Content'];
							settype($AnHien,"int");
							settype ($NoiBat,"int");
							settype($idTL,"int");
							settype($idLT,"int");
							$lang = trim(strip_tags($lang));
							$TieuDe= trim (strip_tags($TieuDe));
							$TomTat= trim(strip_tags($TomTat));
							$urlHinh=trim(strip_tags($urlHinh));
							$Ngay = trim(strip_tags($Ngay));
							if (get_magic_quotes_gpc()== false) {
							$lang = mysql_real_escape_string($lang);
							$TieuDe = mysql_real_escape_string($TieuDe);
							$TomTat = mysql_real_escape_string($TomTat);
							$Content= mysql_real_escape_string($Content);
							$urlHinh = mysql_real_escape_string($urlHinh);
							$Ngay = mysql_real_escape_string($Ngay);
 							
							$Ngay_arr = explode("/",$Ngay); // array(17,11,2010)
							if (count($Ngay_arr)==3) {
								$d = $Ngay_arr[0]; //17
								$m = $Ngay_arr[1]; //11
								$y = $Ngay_arr[2]; //2010
								if (checkdate($m,$d,$y)==false) $Ngay = date("Y-m-d H:i:s");
								else
									$gio=date('H:i:s'); 
									$Ngay = $y."-".$m."-".$d."-".$gio;
									
							} else $Ngay=date("Y-m-d H:i:s");
							$TieuDe_KhongDau = $this->changeTitle($TieuDe);
							 $sql="UPDATE tin SET
						  TieuDe = '$TieuDe', TieuDe_KhongDau='$TieuDe_KhongDau',TomTat='$TomTat', urlHinh='$urlHinh', Ngay='$Ngay', lang='$lang', idTL=$idTL, idLT=$idLT, idUser=$idUser, AnHien=$AnHien,   TinNoiBat=$NoiBat,Content='$Content'
						  where idTin = $idTin"; 
						  
							mysql_query($sql) or die(mysql_error());	}													
						}//end them tin
						
						function ChiTietTin($idTin){
								settype($idTin,"int");
							$sql="select * from tin where idTin = $idTin" ;
							$kq = mysql_query($sql) or die (mysql_error());
							return $kq;
						}
						
					function AnHienTin($idTin){
							
							settype($idTin,"int");
							if($idTin<=0)
							return -1;
							$sql="select AnHien From tin where idTin = $idTin";
							$rs=mysql_query($sql) or die (mysql_error());
							$row_rs= mysql_fetch_row($rs);
							$AnHien = $row_rs[0];
							if($AnHien==1)
							$AnHien=0;
							else $AnHien=1;
							$sql = "UPDATE tin set AnHien = '$AnHien' where idTin=$idTin";
							mysql_query($sql) or die (mysql_error());
							return "img/AnHien_{$AnHien}.jpg";
							
						
						
						
						}	
						
						function NoiBatTin($idTin){
							settype ($idTin,"int");
							if($idTin<=0)
							return -1;
							$sql="select TinNoiBat From tin where idTin = $idTin";
							$rs=mysql_query($sql) or die (mysql_error());
							$row_rs= mysql_fetch_row($rs);
							$NoiBat = $row_rs[0];
							if($NoiBat==1)
							$NoiBat=0;
							else $NoiBat=1;
							$sql = "UPDATE tin set TinNoiBat = '$NoiBat' where idTin=$idTin";
							mysql_query($sql) or die (mysql_error());
							return "img/NoiBat_{$NoiBat}.jpg";
							
							
							
							
							}
			
			function pagesLink($baseURL,$totalRow,$pageNum=1,$pageSize=5)
			{
					if($totalRow<=0)
					return "";
					$totalPages = ceil($totalRow/$pageSize);//ceil làm tròn len
					if($totalPage<=1)
					return "";
					$firstLink="";
					$prevLink="";
					$lastLink="";
					$nextLink="";
					if($pageNum>1)
					{
						$firstLink="<a href='$baseURL'>Trang đầu</a>";
						$prevPage=$pageNum-1;
						$prevLink="<a href='$baseURL&pageNum=$prevPage'>Trang Trước</a>";
						
						}
					if ($pageNum<$totalPages)
					{
						$lastLink="<a href='$baseURL&pageNum=$totalPages'>Trang Cuối</a>";
						$nextPage=$pageNum+1;
						$nextLink="<a href='$baseURL&pageNum=$nextPage'>Trang Kế</a>";
						
					}
				return $firstLink.$prevLink.$nextLink.$lastLink;
				
				}//end function pagesLink
			
				function ThemDownload(){ 
					  $dir = "../download/";
					  $kieuFile=array('image/gif','image/jpeg','image/pjpeg','audio/mpeg','video/x-ms-wmv');//kiểu file
					  $maxsize = 200*1024*1024; //200MB 
					
					  $type = $_FILES['file']["type"];//['file'] name tag file download_them
					  $size = $_FILES['file']["size"]; //Tinh bang byte
					  $name = strip_tags($_FILES['file']["name"]);
					  $tmp_name = $_FILES['file']["tmp_name"];
					
					  if (in_array($type,$kieuFile)==false) die ("Kiểu file không chấp nhận");
					  if ($size > $maxsize) die ("Kích thước file quá lớn");
					  if (file_exists($dir.$name)) die($name." đã có rồi");//có thể bỏ dòng này để ghi đè      
					
					  $url = $dir . $name; //dir:folader
					  move_uploaded_file($tmp_name, $url);//tiếp nhận dữ lieu54 từ trình duyệt,di chuyển từ vi trí tạm sang foldwer chứa downlaod
					
					  $TenFile = trim(strip_tags($_POST['tenfile']));
					  $MoTa = trim(strip_tags($_POST['mota']));
					  if (get_magic_quotes_gpc()==false) {
						 $TenFile = mysql_real_escape_string($TenFile);	
						 $MoTa = mysql_real_escape_string($MoTa);	
						 $name = mysql_real_escape_string($name);	
					  }
					  $sql="INSERT INTO download SET MoTa='$MoTa',TenFile='$TenFile',Ngay=Now(), url='$name'";
					  mysql_query($sql);
					}//function
					function ListDownLoad(){
						
								$sql="select * from download";
								$kq=mysql_query($sql);
								return $kq;
						
						}

							
			}//class
						
		 
		
	
?>
