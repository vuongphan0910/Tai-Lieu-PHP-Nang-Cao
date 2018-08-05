<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
</head>

<body>
<script type="text/javascript">

$(document).ready(function(e) {
    $("#vd1").click(function(){
		
		$.ajax({
			url:"kq1.php",
			success: function(abc)
			{
				$("#kq").html(abc);
			}
			
			})
		
		})
		
		
		
	$("#thuchien").click(function(){
		
		
		$.ajax({
			type:"GET",
			url:"kq2.php",
			data:"vd="+ $("#test").val(),
			success: function(abc){
				
				$("#kq").html(abc);
				}
			
			});
		
		})	
});

</script>
<form id="form1" name="form1" method="post" action="">
  <fieldset>
    <legend>Vi du 1</legend>
    <p>
      <input type="button" name="vd1" id="vd1" value="Vi du 1" />
    </p>
  </fieldset>
  <p>&nbsp;</p>
  <fieldset>
    <legend>Vi du 2</legend>
    <p>
      <label for="test">Nhap gia tri:</label>
      <input type="text" name="test" id="test" />
      <input type="button" name="thuchien" id="thuchien" value="Thuc hien" />
    </p>
  </fieldset>
</form>
<div id="kq"></div>
</body>
</html>