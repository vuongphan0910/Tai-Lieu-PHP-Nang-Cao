<?php
class db
{
	public $conn = NULL;
	public $result = NULL;
	public $host="localhost";
	public $user="root";
	public $pass="";
	public $database="tintuc";

	function __construct(){
		$this->conn=mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->database,$this->conn);
		mysql_query("set names 'utf8'"); 
	}
	/////// Tiếp nhận kết quả từ database////////
	function getdata($sql){
		$this->result= mysql_query($sql);
	}
	/////////// Trích từng dòng database///////////////
	function fetchRow() {
		if (is_resource($this->result) ==false) return false;
	  	$row = mysql_fetch_assoc($this->result);
		return $row;	
	}
	function TheLoai($lang='vi' , $AnHien=1){
		$sql="SELECT idTL, TenTL from theloai WHERE (AnHien=$AnHien or $AnHien=-1)
			  AND (lang = '$lang' or '$lang'='') 
			  ORDER BY ThuTu";
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq;
	}//TheLoai
	function LoaiTin ($lang='vi',$AnHien=1){
		$sql="SELECT idLT, Ten  FROM loaitin
			WHERE (AnHien = $AnHien or $AnHien = -1) 
			AND (lang = '$lang' or '$lang'='') 
			ORDER BY Thutu";
		$kq = mysql_query($sql) or die(mysql_error());	
		return $kq;
	} //LoaiTin	
	function LoaiTinTrongTheLoai($idTL,$AnHien=1){
		settype($idTL, "int");
		
		$sql = "SELECT idLT, Ten,Ten_KhongDau FROM loaitin  WHERE (AnHien=$AnHien or $AnHien=-1)  
		  AND	idTL=$idTL ORDER BY ThuTu ASC";
		$kq = mysql_query($sql) or die(mysql_error());	
		return $kq;
	}//LoaiTinTrongTheLoai
	function changeTitle($str){
		$str = $this->stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);
		$str = str_replace('"',"",$str);
		$str = str_replace("\\","",$str);
		$str = str_replace(":","",$str);
		$str = str_replace("%","",$str);
		$str = str_replace("+","",$str);
		$str = str_replace("-","",$str);
		$str = trim($str);		
		while (strpos($str,'  ')>0) $str = str_replace("  "," ",$str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);	
		return $str;
	}

	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ',
		 'D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị',	  
		 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau=>$codau) {
		  $arr = explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
	function pagesList1($baseURL,$totalRows,$pageNum=1,$pageSize=5,$offset=3){
					if ($totalRows<=0) return "";
					$totalPages = ceil($totalRows/$pageSize);
					if ($totalPages<=1) return "";
					$from = $pageNum - $offset;	$to = $pageNum + $offset;
					if ($from <=0) { $from = 1;   $to = $offset*2; }
					if ($to > $totalPages) { $to = $totalPages; }
					$links = "";
					for($j = $from; $j <= $to; $j++) {
						if($j==$pageNum)
						$links=$links."<span>$j</span>";
						else
						$links= $links . "<a href = '$baseURL/$j/'>$j</a>"; 
					} //for
					$firstLink="";
									$prevLink="";
									$lastLink="";
									$nextLink="";
									if($pageNum>1)
									{
										$firstLink="<a href='$baseURL.html'>Trang đầu</a>";
										$prevPage=$pageNum-1;
										$prevLink="<a href='$baseURL/$prevPage/'>Trang Trước</a>";
										
										}
									if ($pageNum<$totalPages)
									{
										$lastLink="<a href='$baseURL/$totalPages/'>Trang Cuối</a>";
										$nextPage=$pageNum+1;
										$nextLink="<a href='$baseURL/$nextPage/'>Trang Kế</a>";
										
									}
								return $firstLink.$prevLink.$links.$nextLink.$lastLink;
	}
	function pagesList($baseURL,$totalRows,$pageNum=1,$pageSize=5,$offset=5){
								if ($totalRows<=0) return "";
								$totalPages = ceil($totalRows/$pageSize);
								if ($totalPages<=1) return "";
								$from = $pageNum - $offset;	
								$to = $pageNum + $offset;
								if ($from <=0) { $from = 1;   $to = $offset*2; }
								if ($to > $totalPages) { $to = $totalPages; }
								$links = "";
								for($j = $from; $j <= $to; $j++) {
									if($j==$pageNum)
									$links=$links."<span>$j</span>";
									else
									$links= $links . "<a href = '$baseURL&pageNum=$j'>$j</a>"; 
								} //for
								//*****gắn vào để hiện kết hợp vừa số vừa phân trang dạng chữ
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
								return $firstLink.$prevLink.$links.$nextLink.$lastLink;//đưa biến $links vào giữa
								
								
								} //end function pagelist
								function smtpmailer($to,$from,$from_name,$subject,$body,$username,$password){ 
								
								   require_once "PHPMailer_v5.1/class.phpmailer.php";
								   global $error;
								   $mail = new PHPMailer();  // create a new object
								   $mail->IsSMTP(); // enable SMTP
								   $mail->SMTPDebug = 1;  // debugging: 1=errors and messages, 2=messages only
								   $mail->SMTPAuth = true;  // authentication enabled
								   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
								   $mail->Host = 'smtp.gmail.com';
								   $mail->Port = 465; 
								   $mail->Username = $username;  
								   $mail->Password = $password;           
								   $mail->SetFrom($from, $from_name);
								   $mail->Subject = $subject;
								   $mail->Body = $body;
								   $mail->AddAddress($to);
								   $mail->CharSet="utf-8";
								   $mail->IsHTML(true);
								   if(!$mail->Send()) {$error = 'Mail error: '.$mail->ErrorInfo; return false;
								   } else { $error = 'Đã gửi thư'; return true; 
								   }
					}

}
?>