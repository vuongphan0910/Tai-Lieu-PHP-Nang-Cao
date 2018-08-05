<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP</title>
</head>

<body>
<?php
//Mang:
//Mang 1 chieu:


//Khai bao mang voi gia tri cho truoc:
$mang1= array(2, 1, 3, 6, 8);
/*echo "Phan tu dau tien cua mang la: {$mang1[0]}<br/>";
echo "Phan tu thu 2 cua mang la: ".$mang1[1];*/

//in mang1:
for($i=0;$i<5;$i++)
	echo $mang1[$i]." &nbsp;";
	
//Khai bao mang voi chi so cho truoc:
//$mang2= array(1=>5,2=>9,3=>0,4=>12); //chi_so=>gia_tri. Co the viet gon lai:
$mang2=array(1=>5,9,0,12);
echo "<br/>Mang 2 gom:";
for($i=1;$i<5;$i++)
	echo $mang2[$i]." &nbsp;";

//Khai bao mang voi chi so la chuoi:
$menu=array("khai vi"=>"Sup cua", "mon 1"=>"Ga hap hanh", "mon 2"=>"Bo nau tieu");
//Su dung cau truc foreach cho mang:
/*foreach ($tenmang as $bien)
	echo $bien;*/
	echo "<br/>";
foreach ($menu as $cs=>$gt)
	echo "$cs ====> $gt<br/>";
	
//Khai bao mang chua gia tri:

$mang=array();
$mang[0]=5;
$mang[1]=7;
$mang[2]=12;
$mang[3]=57;	

//Dem so phan tu cua mang:
echo "So phan tu cua mang: ".count($mang);

echo "<br/>So ngau nhien trong doan tu 0->9: ".rand(0,9);

?>
</body>
</html>