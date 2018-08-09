<?php 
	require_once"classUser.php";
	$u = new user;$loi= array();
	if(isset($_POST['email'])==true){
		
		$thanhcong= $u->GuiPassMoi($loi);
		if($thanhcong==true) header("location:guipassthanhcong.php");
	}

?>
<form action="" method="post">
<div align="center" id="loi">
	<?php foreach($loi as $v) echo $v,"<br>";?>
    </div>
	<table width="291" border="1" align="center">
  <tr>
    <td width="236" align="center">Gửi Mật Khẩu Mới</td>
   
  </tr>
  <tr>
    <td><label for="email">Email</label>
      <input type="text" name="email" id="email"> <input type="submit" name="btnguipass" id="btnguipass" value="Submit"></td>
    
    
  </tr>
 
</table>


</form>