<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><form action="" method="post" name="frmngay">
	thang :
	  <select name="txtmonth">
      <?php for($i=1;$i<=12;$i++){?>
	    <option value="<?=$i;?>"
		<?php if(isset($_POST['txtmonth'])&& ($_POST['txtmonth'])==$i){echo "selected='selected'";} ?>><?=$i;?></option>
	<?php } ?>
  </select>
  
    Nam : <input type="text" name="txtyear" id="txtyear" value="<?php if(isset($_POST['txtyear'])) {echo $_POST['txtyear'];}else echo "";  ?>" /><input type="submit" name="btnsubmit" value="Thuc Hien" />
    <?php
    	if(isset($_POST['btnsubmit']))
		{
			$m= $_POST['txtmonth'];
			$y = $_POST['txtyear'];
			switch ($m)
			{
				case 1: case 3 :case 5: case 7: case 8 : case 10 : case 12 : 
				$d = 31; break;
				case 4 :case 6: case 9: case 11 : 
				$d = 30; break;
				case 2 : 
				if(($y%4==0)&&($y%100!=0)|| ($y%400==0) )
				{
					$d=29;
				}
				else $d=28;break;
			
			}
				echo "Ngay :<select name='txtday'>";
	    		for($i=1;$i<=$d;$i++){
				echo "<option value='$i'>$i</option>";
				}
  				echo "</select>";
				
			
		}
	?>
</form>
</body>
</html>