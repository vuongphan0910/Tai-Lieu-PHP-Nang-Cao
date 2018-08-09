<?php 
	require_once "classDB.php";
	class user extends db{
		function DangKyThanhVien(&$loi){			
					$thanhcong = true;
						$username = $_POST['username'];
					  	$matkhau = $_POST['matkhau'];
						$hoten = $_POST['hoten'];  		
						$email = $_POST['email'];
						$ngaysinh = $_POST['ngaysinh']; 
						$gioitinh = $_POST['gioitinh'];
						$golaimatkhau = $_POST['golaimatkhau'];
								
						$username = trim(strip_tags($username));
						$matkhau = trim(strip_tags($matkhau));
						$golaimatkhau = trim(strip_tags($golaimatkhau));
						$hoten = trim(strip_tags($hoten));
						$email = trim(strip_tags($email));
						$ngaysinh = trim(strip_tags($ngaysinh));
						$ngaydk = date("Y-m-d H:i:s");
						settype($gioitinh,"int");
						if (get_magic_quotes_gpc()==false) {
							$username = mysql_real_escape_string($username);
							$matkhau = mysql_real_escape_string($matkhau);
							$golaimatkhau = mysql_real_escape_string($golaimatkhau);
							$hoten = mysql_real_escape_string($hoten);
							$email = mysql_real_escape_string($email);
							$ngaysinh = mysql_real_escape_string($ngaysinh);			
                                      }
									  ///////////////Kiem tra user/////
						if ($username == NULL){
							$thanhcong = false; $loi['username']= "<br>Chưa nhập username"; 
							} elseif (strlen($username)<3 ){
							$thanhcong = false; $loi['username']="<br>Username>=3 ký tự";
							} elseif ($this->CheckUsername($username)==false) { 
								$thanhcong = false;  $loi['username'] = "<br>Username đã có người dùng";
							}
						if ($hoten == NULL){$thanhcong = false; $loi['hoten']= "<br>Chưa nhập họ tên";}
						//kiêm tra email
						if ($email == NULL){$thanhcong = false;$loi['email'] = "<br>Chưa nhập email"; }
						elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
							$thanhcong = false; $loi['email']="<br>Bạn nhập email không đúng";
						}elseif ($this->CheckEmail($email)==false) { 
							$thanhcong = false; $loi['email'] = "<br>Email này đã có người dùng";
						}
						//kiêm tra ngaysinh
						$ngaysinh_arr = explode("/",$ngaysinh); // array(17,11,1990)
						if ($ngaysinh == NULL) { 
						$thanhcong = false; $loi['ngaysinh'] = "<br>Bạn chưa nhập ngày sinh"; }
						elseif (count($ngaysinh_arr)==3) {
							$d = $ngaysinh_arr[0]; //17
							$m = $ngaysinh_arr[1]; //11
							$y = $ngaysinh_arr[2]; //1990
							if (checkdate($m,$d,$y)==true) 
							$ns = $y."-".$m."-".$d;
							else  {$thanhcong = false; $loi['ngaysinh'] = "<br>Ngày sinh không hợp lệ";}
						} else {	$thanhcong = false; $loi['ngaysinh'] = "<br>Ngày sinh không hợp lệ"; }
						//kiêm tra mật khẩu và gõ lại mật khẩu
						if ($matkhau == NULL) {
						$thanhcong = false; $loi['matkhau'] = "<br>Chưa nhập mật khẩu";
						}elseif (strlen($matkhau)<6 ) {
						$thanhcong = false; $loi['matkhau'] = "<br>Mật khẩu >=6 ký tự";
						} 
						if ($golaimatkhau == NULL) {
							$thanhcong=false; $loi['golaimatkhau'] = "<br>Nhập lại mật khẩu đi";
						}elseif ($matkhau != $golaimatkhau ) { 
							$thanhcong = false; $loi['golaimatkhau'] = "<br>Mật khẩu 2 lần không giống";
						} 

						if ($thanhcong==true) {
						 $mk_mahoa = md5($matkhau);
						 $rd = $this->ChuoiNgauNhien(32);//hoặc $rd =md5(rand(0,9999)); ma không cần dung hàm    ChuoiNgauNhien	
						 $sql = "INSERT INTO  users 
						 (username, password, email, hoten, gioitinh, ngaysinh, ngaydangky,randomkey) 
						  VALUES('$username','$mk_mahoa','$email','$hoten',$gioitinh,'$ns','$ngaydk','$rd')";
						 mysql_query($sql) or die(mysql_error());
						 $iduser = mysql_insert_id();
						$tieudethu = "Kích hoạt tài khoản";
						$noidungthu = file_get_contents("dangky_thukichhoat.html");			
						$link = "http://". $_SERVER['SERVER_NAME']."/tintuc/kichhoat.php";
						$link = $link . "?id=$iduser&rd=$rd";
						$noidungthu = str_replace(	array("{username}","{matkhau}","{hoten}","{link}"), 
											array($username,$matkhau,$hoten,$link),$noidungthu);
						$from = 'vuongphan0910@gmail.com';
						$tennguoigui="Ban Quản Trị Website";
						
						$username = 'vuongphan0910@gmail.com';// Tài khoản gmail dùng để gửi thư
						$password = 'PhanQuocVuong'; // mật khẩu của tài khoản gửi mail
						
						$this->smtpmailer($email, $from, $tennguoigui, $tieudethu,  $noidungthu,$username, $password);
						

						 
						}
												

						return $thanhcong;
                                   }//end DangKythanhVien
								   
			function CheckUsername($username){
						$sql="select idUser from users where username='{$username}'";
						$kq = mysql_query($sql);
						if (mysql_num_rows($kq)>0) return false;
						 else return true;
					}
					function CheckEmail($email){
							$sql="select idUser from users where email ='{$email}'";
							$kq = mysql_query($sql);
							if (mysql_num_rows($kq)>0) return false;	else return true;
						}

					function ChuoiNgauNhien($sokytu){
							
							$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
							for($i=0;$i<$sokytu;$i++)
							{
								$vitri= mt_rand(0,strlen($chuoi));
								$giatri= $giatri.substr($chuoi,$vitri,1);
								}
								return $giatri;
					
					}
						function DoiPass(&$loi){
								  $thanhcong = true;
								  // tiếp nhận dữ liệu từ form, session
								  $pass_old = trim(strip_tags($_POST['pass_old']));
								  $pass_new1 = trim(strip_tags($_POST['pass_new1']));
								  $pass_new2 = trim(strip_tags($_POST['pass_new2']));
								  $username = $_SESSION['login_user'];
								  $iduser = $_SESSION['login_id'];	
								  // kiểm tra dữ liệu nhập
								  $pass_min = 3;	
								  if ($pass_old==NULL){$thanhcong=false; $loi[]="Chưa nhập mật khẩu cũ"; }
									else {
								$sql="select idUser from users 
									where idUser=$iduser and password=md5('$pass_old')";
								$rs = mysql_query($sql) or die(mysql_error());
								if (mysql_num_rows($rs)<=0) {
									$thanhcong = false; 
									$loi[] = "Mật khẩu cũ không đúng";
								}	
									}
									if ($pass_new1==NULL){$thanhcong=false;$loi[]="Chưa nhập pass mới";}
									elseif (strlen($pass_new1)<$pass_min) {
										$thanhcong = false; 
										$loi[] = "Mật khẩu mới quá ngắn.>= $pass_min ký tự";
									}
									elseif ($pass_new1!=$pass_new2) {
										$thanhcong = false; 
										$loi[] = "Mật khẩu mới nhập 2 lần không giống nhau";
									}		
									if ($thanhcong ==true) { // cập nhật pass mới
										$sql="UPDATE users SET password=md5('$pass_new1') 
										where iduser=$iduser";
										mysql_query($sql) or die(mysql_error());				
									}	
									return $thanhcong;
								} //function DoiPass
								function GuiPassMoi(&$loi){
									$thanhcong=true;
									$email=$_POST['email'];
									if ($email == NULL){$thanhcong = false;$loi['email'] = "<br>Chưa nhập email"; }
									elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
										$thanhcong = false; $loi['email']="<br>Bạn nhập email không đúng";
									}elseif ($this->CheckEmail($email)==true) { 
										$thanhcong = false; $loi['email'] = "<br>Thành Viên Không Tồn Tại";
									}
									$matkhau=substr(md5(rand(0,999)),0,6);
									$sql="update users set password =md5('$matkhau') where email='$email' ";
									mysql_query($sql) or die (mysql_error());
									$tieudethu = "Thay Đổi Mật Khẩu";
									$noidungthu = "mat khau mới là: $matkhau";			
									$from = 'vuongphan0910@gmail.com';
									$tennguoigui="Ban Quản Trị Website";
									
									$username = 'vuongphan0910@gmail.com';// Tài khoản gmail dùng để gửi thư
									$password = 'PhanQuocVuong'; // mật khẩu của tài khoản gửi mail
									$this->smtpmailer($email, $from, $tennguoigui, $tieudethu,  $noidungthu,
									$username, $password);
									
									}
		
		
		
	}
?>