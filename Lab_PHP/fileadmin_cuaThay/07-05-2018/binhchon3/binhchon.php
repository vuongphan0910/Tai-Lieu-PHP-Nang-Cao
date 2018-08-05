<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function xemkq()
{
	x=window.open('','','status=yes,menubar=no');
	x.location='ketquabinhchon.php'; 
	x.resizeTo(650,300);
}
</script>
</head>

<body>
<div style="width:200px;">
<form id="form1" name="form1" method="get" action="xuly.php">
	<table>
    	<tr>
        	<td style="color:#F00; font-size:18px; text-align:center;">
            	<?php
				require_once("connect.php");
					$kqbc=mysql_query("select * from binhchon where AnHien=1");
					$dbc=mysql_fetch_array($kqbc);
						echo $dbc["MoTa"];
					
					?>
            </td>
        </tr>
        <tr>
        	<td><table>
            	<?php $kpa=mysql_query("select * from phuongan where idBC={$dbc['idBC']}");
					while($dpa =mysql_fetch_array($kpa))
					{ ?>
                    <tr>
                    	<td>
                        	<input type="radio" name="idPA" value="<?php echo $dpa["idPA"]; ?>"  />
                        </td>
						<td><?php echo $dpa["MoTa"]; ?></td>
                     </tr>
                     <?php
					}
					 ?>
				</table>
			</td>
        </tr>
        <tr>
        	<td><input type="submit" name="binhchon" id="binhchon" value="Bình Chọn" />
            <a href="javascript:xemkq()">Ket qua</a>
            </td>
        </tr>
         
    </table>

</form>
</div>
</body>
</html>