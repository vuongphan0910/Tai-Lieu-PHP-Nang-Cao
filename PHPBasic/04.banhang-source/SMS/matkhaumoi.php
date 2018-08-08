<?php
require_once('fibosmsconfig.php'); // Khai báo dùng hàm của Fibo 
CheckRequest();  			//Hàm kiểm tra request, đảm bảo yêu cầu xử lý đến từ server của Fibo
// Lấy nội dung tin nhắn
$message =$_REQUEST['message']; // Nội dung tin
$phone= $_REQUEST['phone']; // số điện thoại của KH
$service=$_REQUEST['service']; // mã dịch vụ
$port =$_REQUEST['port'];  // đầu số
$main =$_REQUEST['main'];  //keyword
$sub =$_REQUEST['sub'];  // prefix
// Hết lấy nội dung tin nhắn

$md5id = md5(uniqid(rand(), true));// id duy nhất để gán cho tin trả về
// xử lý tin

	$message= strtoupper($message);
	$tmp=explode(" ",$message);//cắt nội dung tin ra làm 3 phần
	if($tmp[0]=='SMS' && $tmp[1]=='MKM') {//p1 chứa keyword, p2 chứa Prefix (MKM=Mậtkhẩumới)
		$username=@$tmp[2]; //phần 3 chứa usrername	
		require "dbcon.php";
		$sql="select idUser from users where upper(username)='{$username}'";
		$rs = mysql_query($sql);
		if (mysql_num_rows($rs)>0){
			$row_rs = mysql_fetch_assoc($rs);
			$idUser = $row_rs['idUser'];
		}
		else $idUser = -1;
		if ($idUser>0) {
			$matkhaumoi= substr(md5(rand(0,1000)),10,6);
			$matkhaumoi_mahoa=md5($matkhaumoi);
			$sql = "update users set Password='{$matkhaumoi_mahoa}' where idUser=$idUser";
			mysql_query($sql);
			$thongbao="Mat khau moi cua $username la: $matkhaumoi";
		} else {
			$thongbao="User {$username} khong ton tai";	
		}
		echo "
		<ClientResponse>
			<Message>
				<PhoneNumber>{$phone}</PhoneNumber>
				<Message>{$thongbao}</Message>
				<SMSID>{$md5id}</SMSID>
				<ServiceNo>{$service}</ServiceNo>
			</Message>
		</ClientResponse>";
	}
	else { // nếu sai thi trả về hướng dẫn nhắn lại cho đúng cú pháp
		echo '
		<ClientResponse>
			<Message>
				<PhoneNumber>'.$phone.'</PhoneNumber>
				<Message>Noi dung tin nhan khong hop le. Goi tin theo cú phap SMS MKM  X . Trong do X là username </Message>
				<SMSID>'.$md5id.'</SMSID>
				<ServiceNo>'.$service.'</ServiceNo>
			</Message>
		</ClientResponse>';
		
	}

?>
