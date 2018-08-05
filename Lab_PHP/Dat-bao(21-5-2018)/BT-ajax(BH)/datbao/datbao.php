<?php 
	session_start();
	include ("connect.php");
	if(!isset($_SESSION['giohang']))
	$_SESSION['giohang']=array();
	$sql="select * from loaibao ";
	$query=mysqli_query($link,$sql);
	print_r($_SESSION['giohang']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<div id="dat" align="center">
    <form id="datbao" action="xuly_dathang.php" method="post" >
    	<h3>Đăng Ký Đặt Báo</h3>
      <p>Loại Báo : <select name="loaibao">
      	<?php while ($d=mysqli_fetch_array($query)){?>
          <option value="<?=$d['mabao']?>"><?=$d['tenbao']?></option>
          <?php }?>
      </select></p>
    	<p>Số Lượng : <input type="number" name="sl"/>	</p>
        <p><input type="submit" name="btndat" value="Đưa Vào Giỏ Hàng" /></p>
    </form>
    </div>
    <?php
if(count($_SESSION['giohang'])>0)
{?>
<div id="dsdat" align="center">
	<form id="ds" action="xuly_dathang.php" method="post" >
    	<table width="50%" border="1"><tr>
        	<th colspan="6" >Danh Sách Báo Đã Đặt</th>
        </tr>
  		<tr>
        	<th>STT</th>
			<th>Tên Báo</th>
			<th>Giá</th>
			<th>Số Lượng</th>
			<th>Thành Tiền</th>
			<th>Xóa</th>
	   </tr>  
       <?php $tong=0;for($i=0;$i<count($_SESSION['giohang']);$i++) {?>
       		<tr>
            	<td><?=$i+1?></td>
                <td><?=$_SESSION['giohang'][$i]['tenbao']?></td>
                <td><?=$_SESSION['giohang'][$i]['gia']?></td>
                <td><input type="number" name="sl_<?=$i?>" value="<?=$_SESSION['giohang'][$i]['sl']?>" min="1"/></td>
                <td><?php echo $_SESSION['giohang'][$i]['gia']*$_SESSION['giohang'][$i]['sl'];$tong+=$_SESSION['giohang'][$i]['gia']*$_SESSION['giohang'][$i]['sl']?></td>
                <td><a href="xuly_dathang.php?mabao=<?=$i?>">Xóa</a></td>
            </tr>  
           <?php } ?>   
           <tr><td colspan="6" align="right">Tổng Tiền: <?= number_format($tong,0,",",".")."VND"?>

           </td></tr>
            <tr align="center"><td colspan="6"><input type="submit" name="update_gh" value="Cập Nhật" /> <input type="button" name="dathang" value="Đặt Hàng" onClick="location.href='ct_datbao.php'" /></td></tr>
        </table>
    
    </form>
</div>
<?php }?>
</body>
</html>