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
if($port!='8017')// kiểm tra xem có đúng đầu số không?
{
	// trường hợp nhắn sai đầu số
	echo '
			<ClientResponse>
				<Message>
					<PhoneNumber>'.$phone.'</PhoneNumber>
					<Message>Ban da nhan sai dau so</Message>
					<SMSID>'.$md5id.'</SMSID>
					<ServiceNo>'.$service.'</ServiceNo>
				</Message>
			</ClientResponse>';
	
}
else // xử lý tin
{
	$message= strtoupper($message);
	$tmp=explode(" ",$message);//cắt nội dung tin ra làm 3 phần
	if($tmp[0]=='SMS' && // phần thứ nhất chứa keyword
		@$tmp[1]=='HELLO' && //phần thứ 2 chứa Prefix
			@$tmp[2]=='FIBO') //phần 3 chứa nội dung tin, nếu đúng thì trả về lời chào
	{
		echo '
		<ClientResponse>
			<Message>
				<PhoneNumber>'.$phone.'</PhoneNumber>
				<Message>Cam on ban da su dung dich vu cua FIBO. Chuc ban thanh cong.</Message>
				<SMSID>'.$md5id.'</SMSID>
				<ServiceNo>'.$service.'</ServiceNo>
			</Message>
		</ClientResponse>';

	}
	else// nếu sai thi trả về hướng dẫn nhắn lại cho đúng cú pháp
	{
		echo '
		<ClientResponse>
			<Message>
				<PhoneNumber>'.$phone.'</PhoneNumber>
				<Message>Xin chao, noi dung tin nhan khong hop le. Vui long goi tin nhan theo noi dung SMS Hello Fibo</Message>
				<SMSID>'.$md5id.'</SMSID>
				<ServiceNo>'.$service.'</ServiceNo>
			</Message>
		</ClientResponse>';
		
	}
}
?>
