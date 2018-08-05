<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//Khoi tao mang gom 20 phan tu co gia tri ngau nhien [0,99]:
$a=array();
for($i=0;$i<20;$i++)
	$a[$i]=rand(0,99);
	
//In mang vua khoi tao:
echo "<br/>Mang vua khoi tao gom: ";
for($i=0;$i<20;$i++)
 echo $a[$i]." &nbsp;";
//print_r($a);


//In mang theo chieu nguoc lai:
echo "<br/>Dao mang: ";
for($i=19;$i>=0;$i--)
 echo $a[$i]." &nbsp;";
 
 
//Liet ke cac phan tu co gia tri chan:
echo "<br/>Cac phan tu co gia tri chan: ";
for($i=0;$i<20;$i++)
 if($a[$i]%2==0) echo $a[$i]." &nbsp;";

//Tinh tong cac phan tu chia het cho 3:
echo "<br/>Tong cac phan tu chia het cho 3: ";
$tong=0;
for($i=0;$i<20;$i++)
 if($a[$i]%3==0) $tong+=$a[$i];
echo $tong;

//Kiem tra co bao nhieu $n trong mang:
$n=5;

$dem=0;
for($i=0;$i<20;$i++)
 if($a[$i]==$n) $dem++;
 
echo "<br/>Co $dem phan tu co gia tri bang $n"; 

?>
</body>
</html>