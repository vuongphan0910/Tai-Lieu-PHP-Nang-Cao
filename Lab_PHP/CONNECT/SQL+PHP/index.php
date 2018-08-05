<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang chu</title>
</head>

<body>
<?php
//ket noi den server:
/*$link=@mysql_connect("localhost12","root","");
if($link) echo "Ket noi den server thanh cong!";
else echo "Ket noi that bai!";

Can bien $link de thuc truy van:
mysql_select_db("test",$link) or die("Database khong toi tai!");

mysql_query($sl,$link)
*/


@mysql_connect("localhost","root","") or die("Ket noi den server that bai!");

//Chon database can su dung:
mysql_select_db("test") or die("Database khong toi tai!");
mysql_query("set names utf8");

$sl="select * from user";
//Query lay du lieu:
$kq=mysql_query($sl);

//Lay tung dong du lieu tu ket qua:

//$d=mysql_fetch_array($kq); //$d se la 1 mang 1 chieu voi chi so cac phan tu chinh la cac thuoc tinh cua bang

//echo $d['HoTen']." co email la: ".$d['Email']."<br/>";

//Lay them 1 dong tiep theo:
//$d=mysql_fetch_array($kq); 
//echo $d['HoTen']." co email la: ".$d['Email']."<br/>";

//Dem so dong du lieu lay duoc:
//$num=mysql_num_rows($kq);
//echo $num;

/*for($i=1;$i<=$num;$i++)
{
	$d=mysql_fetch_array($kq); 
	echo $d['HoTen']." co email la: ".$d['Email']."<br/>";
}*/


//Cach 2: khong su dung for ma su dung while:
while($d=mysql_fetch_array($kq))
{
	echo $d['HoTen']." co email la: ".$d['Email']."<br/>";
}

?>
</body>
</html>