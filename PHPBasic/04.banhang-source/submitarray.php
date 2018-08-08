<?
if (isset($_POST['btnSubmit'])==true){
	$daySL = $_POST['sl'];
	print_r($daySL);	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label>
      Số lượng 1
      <input type="text" name="sl[]" id="sl[]" />
    </label>
  </p>
  <p>
    <label>Số lượng 2
      <input type="text" name="sl[]2" id="sl[]2" />
    </label>
</p>
  <p>
    <label>Số lượng 3
      <input type="text" name="sl[]3" id="sl[]3" />
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
    </label>
  </p>
</form>
</body>
</html>