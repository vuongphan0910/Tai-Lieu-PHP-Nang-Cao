<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<script type="text/javascript">
	$(document).ready(function(e) {
        $("#btnsub").click(function(e) {
        	$.ajax({
				
				type:"GET",
				url:"xuly.php",
				data:"tim="+$("#tim").val(),
				success:function(abc){
					$("#kq").html(abc);
				}
					
			});

				
        })
    });
	
	$(document).ready(function(e) {
    $("#tim").click(function(){
		
		$.ajax({
			type:"GET",
			url:"xuly2.php",
			data:"mack="+ $("#mack").val(),
			success: function(html){
				$("#kq").html(html);
				
				}
			});
		
		})
});
</script>
<form id="frm" name="frm" action="" method="post">
	<input type="text" name="mack" id="tim"/>
    <input type="button" name="btnsub" id="btnsub" value="Tim"/>
</form>
<div id="kq"></div>
</body>
</html>