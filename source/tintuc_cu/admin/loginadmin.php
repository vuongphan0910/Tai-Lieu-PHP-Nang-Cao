<?php
 session_start();
 require_once"classquantri.php";
 $qt= new quantritin;
 if (isset($_POST['btndn'])==true) 
 {
	 $qt ->DangNhap();
	 }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

#frm1
{
	height:150px;
	border: solid 1px #06F;
	margin:auto;
	border-radius:15px;
	box-shadow:3px 3px 3px #666666;	
	
}


#container 
{	width:600px;
	min-height:150px;
	background-color:#06F;
	border:solid 1px #003399;
	color:#FFF;
	border-radius: 5px;
	box-shadow: 3px 3px 3px #666666;
	text-align:center;
		margin:auto;
		padding-left:5px;
		padding-right:5px;
		padding-bottom:3px;
	
	}	
	#header
	{
		color:#0CF;
		height:75px;
	
		
		
		
		
	}
	#header h4
	{
		font-size:36px;		
		}
	#nd
	{
		min-height:75px;
		background-color:#09F;
		padding:15px;
		border: solid 1px #00CCFF;
		border-radius:0 0 5px 5px;
		
		
		
		
		
		}
		#nd table
		{
			margin:10 10 10 10;
			border:solid 1px #FFFFFF;
			width:400px;
			border-radius:6px 6px 6px 6px;
			color:#03F;
			
		}
		 #nd #btndn
		{	background-color:#06F;
			border:solid 1px #000000;
			border-radius:3px 3px 3px 3px;
			box-shadow:1px 1px #000000;
			width:160px
			
		}
		#nd .txt
		{
			background-color:#C90;	
		}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" >


<div id="container">
<div id="header"><h4>QUAN TRI WEBSITE</h4>
</div>
<div id="nd">
	<div id="error"><?php echo $_SESSION['error'] ?> </div>

	<table width="415" height="104" border="0" align="center" >
    	
    	<tr>
        <td width="156" align="center" > <strong>Tên Đăng Nhập</strong></td>
        <td width="247"><input name="u" type="text"  class="txt" id="u" value="<?php echo $_COOKIE['un'];?>"/></td>
        </tr>
        <tr><td height="42" align="center"><strong>Password</strong></td>
        <td ><input name="p" type="password" class="txt" id="p" value="<?php echo $_COOKIE['pw']; ?>"  /></td>
        </tr>
        <tr>
    	  <td colspan="2" align="center"><input name="btndn" type="submit" value="Đăng Nhập" id="btndn" />
   	        <input type="checkbox" name="nho" id="nho" />
          <label for="nho">Ghi Nho</label></td>
        </tr>
    </table>
</div>


</div>


</form>

</body>
</html>
