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
		get_quan();
        $("#tp").change(function(e) {
        	
				get_quan();
        })
    });
	function get_quan(){
		$.ajax({
				
				type:"GET",
				url:"quan.php",
				data:"tp="+$("#tp").val(),
				success:function(abc){
					$("#kq").html(abc);
				}
					
			});

		}
	
</script>
	<form action="" method="get" name="frm_tim">
    	<select id="tp" name="tp">
 
    	  <option value="01">Ha Noi</option>
          <option value="02">TP.HCM</option>
        	
        </select>
    </form>
    <div id="kq"></div>
</body>
</html>