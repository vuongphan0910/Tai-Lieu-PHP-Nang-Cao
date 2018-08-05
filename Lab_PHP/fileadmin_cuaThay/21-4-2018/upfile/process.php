<?php ob_start();
if(isset($_FILES['upImg']))
{
	$target="files/";
	$filename=basename($_FILES['upImg']['name']);
	$target.=$filename;
	if(move_uploaded_file($_FILES['upImg']['tmp_name'],$target))
	{
		//insert vao db:
		include("connect.php");
		$sl="insert into images values(NULL, '$target','{$_POST['MoTa']}')";
		if(mysql_query($sl))
		{
			header("location:lib.php");
		}
		else
		{
			unlink($target);
		}
	}
	else echo "Upload that bai!";
}
?>