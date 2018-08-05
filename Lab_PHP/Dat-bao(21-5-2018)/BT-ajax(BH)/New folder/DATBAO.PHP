<?php session_start();
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=array();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {color: #FF0000}
.style3 {
	color: #000066;
	font-weight: bold;
}
.style5 {color: #000099; font-weight: bold; }
-->
</style></head>

<body>
<div align="center"><font size="4" color="#0000ff"><b>Đăng Ký Đặt Báo</b></font></div>
<form name="f" method="post" action="">
<table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="145"><span class="style5">Loại Báo</span></td>
    <td width="300">
      <select name="loaibao">
<?php
include("connect.php");
$kq=mysql_query("select * from loaibao");
while($d=mysql_fetch_array($kq)){
?>	 
		<option value="<?php echo $d['mabao'];?>"><?php echo $d['tenbao'];?></option>
<?php }?>
      </select>    </td>
  </tr>
  <tr>
    <td width="145"><span class="style5">Số Lượng</span></td>
    <td width="300">
      <input type="text" name="soluong" size="5" value="1">    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input name="Button" type="submit" class="style3"  value="Đưa Vào Giỏ Hàng">
      </div>    </td>
  </tr>
</table>
</form>
<?php
if(isset($_POST['loaibao']))
{
	
	
	$k=count($_SESSION['giohang']);
	$kt=0; //kt=0 la chua co
	//Kiem tra thu co san pham can them trong gio hang hay chua?
	for($i=0;$i<$k;$i++)
	{
		if($_POST['loaibao']==$_SESSION['giohang'][$i]['mabao'])
		{
			$_SESSION['giohang'][$i]['soluong']+=$_POST['soluong'];
			$kt=1; //gia su kt=1 la co roi
			break;
		}
	}
	
	
	//Neu chua co thi them:
	if($kt==0)
	{
		$kq=mysql_query("select * from loaibao where mabao='{$_POST['loaibao']}'");
		$d=mysql_fetch_array($kq);
		
		//dua thong tin san pham vao gio hang:
		$_SESSION['giohang'][$k]['mabao']=$d['mabao'];
		$_SESSION['giohang'][$k]['tenbao']=$d['tenbao'];
		$_SESSION['giohang'][$k]['gia']=$d['gia'];
		$_SESSION['giohang'][$k]['soluong']=$_POST['soluong'];
	}
}
?>


<?php
if(count($_SESSION['giohang'])>0)
{
?>
<form method="post" action="" name="form2">
<table width="495" border="1" align="center" cellpadding="0" cellspacing="0"  bordercolorlight="#FFFF00">
  <tr bgcolor="#CCFFCC">
    <td colspan="6"><div align="center" class="style3">Danh Sách Các Loại Báo Cần Đặt</div></td>
  </tr>
  <tr bgcolor="#CCFFCC">
    <td width="45"><div align="center" class="style2"><strong>STT</strong></div></td>
    <td width="150"><div align="center" class="style2"><strong>Tên Báo</strong></div></td>
    <td width="75"><div align="center" class="style2"><strong>Giá</strong></div></td>
    <td width="75"><div align="center" class="style2"><strong>Số Lượng</strong></div></td>
    <td width="100"><div align="center" class="style2"><strong>Thành Tiền</strong></div></td>
    <td width="50"><div align="center" class="style2"><strong>Xóa</strong></div></td>
  </tr>
<?php
$tong=0;
for($i=0;$i<count($_SESSION['giohang']);$i++)
{
?>
  <tr>
    <td width="45"><div align="center"><?php echo $i+1;?></div></td>
    <td width="175"><div align="center"><?php echo $_SESSION['giohang'][$i]['tenbao'];?></div></td>
    <td width="50"><div align="right"><?php echo $_SESSION['giohang'][$i]['gia'];?></div></td>
    <td width="75"><div align="center"><input type="text" size="5" name="SL" value="<?php echo $_SESSION['giohang'][$i]['soluong'];?>"></div></td>
    <td width="100"><div align="right"><?php echo $_SESSION['giohang'][$i]['gia']*$_SESSION['giohang'][$i]['soluong']; $tong+=$_SESSION['giohang'][$i]['gia']*$_SESSION['giohang'][$i]['soluong'];?></div></td>
    <td width="50"><div align="center"><a href="#">xóa</a></div></td>
  </tr>
<?php }?>

<tr>
<td colspan="6" align="right">
Tong Cong Tien: <?php echo number_format($tong,0,",",".")." VND";?>
</td>
</tr>
</table>

<div align="center">
  <input name="capnhat" type="submit" class="style3" value="Cập Nhật">
  &nbsp;
  <input name="datbao" type="button" class="style3" value="Đặt Báo">
</div>
</form>
<?php }?>
</body>
</html>
