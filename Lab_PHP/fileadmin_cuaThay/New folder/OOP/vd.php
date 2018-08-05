<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OOP0</title>
</head>
<?php
//Xay dung 1 doi tuong:
class concun{
	
	//Thuoc tinh:
	public $ten;
	private $tuoi;
	protected $maulong;
	
	//phuong thuc:
	function tao_tuoi($tam)
	{
		$this->tuoi=$tam;
	}
	
	function lay_tuoi()
	{
		return $this->tuoi;
	}
	
	//Ham tao:
	function __construct()
	{
		echo "Mot con cun vua duoc tao!";
	}
	
	
	//Ham huy:
	function __destruct()
	{
		echo "Con cun da chet!";
	}
	
	
}

class cuncon extends concun{
	
	public $diachi;
	
}
?>



<body>
<?php
$cun1=new concun;

$cun1->ten="Bi";
echo $cun1->ten;
$cun1->tao_tuoi(2);
echo "<br/>";
echo $cun1->lay_tuoi();
echo "<br/>";

unset($cun1);
echo "Ket thuc trang";

$cun2=new cuncon;
$cun2->ten="Mi";
$cun2->diachi="Quan 11";
?>


</body>
</html>