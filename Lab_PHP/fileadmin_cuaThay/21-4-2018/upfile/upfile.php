<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <input type="hidden" name="MAX_FILE_SIZE" value="700000"/>
  <label for="ufile">Chon file:</label>
  <input type="file" name="ufile" id="ufile" />
  <input type="submit" name="thuchien" id="thuchien" value="Upload" />
</form>

<?php
if(isset($_FILES['ufile']))
{
	/*
	$_FILES['ten_input']['name']: ten file up len, tuy theo trinh duyet, co the chua ca duong dan tren local
	$_FILES['ten_input']['tmp_name']: chua thong tin file tam tren server
	$_FILES['ten_input']['size']: kich thuoc file
	$_FILES['ten_input']['type']: kieu file
	*/
	$target="files/";
	$tenfile=basename($_FILES['ufile']['name']);
	$target.=$tenfile;
	
	//File ton tai!
	if(file_exists($target)) echo "File da ton tai!";
	else echo "File chua co";
	
	
	//kiem tra kieu file:
	if(preg_match("/\.(jpg|png|gif)$/i",$tenfile)) echo "Day la file anh";
	else echo "Day khong phai file anh!";
	
	
	if(move_uploaded_file($_FILES['ufile']['tmp_name'],$target))
	{
		echo "Up load $tenfile thanh cong<br/>";
		echo $_FILES['ufile']['type'];
	}
	else echo "Up load that bai!";
	
}
?>
</body>
</html>