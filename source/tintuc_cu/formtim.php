<script>
	$(document).ready(function(e) {
        $("#timnangcao").click(function(){
			$("#content1").load("formtimnangcao.php");
			$("#info").hide();  $("#content2").hide();
			$("#content1").css("width","785px");
			return false;
		});
		
		

    });
</script>
<style>
	#divtim {  height:50px; text-align:center }
#divtim #formtim{ background-color:#FFF; margin: 0px; 
	border: outset 2px #999966; padding-top: 5px; padding-bottom: 5px; } 
#formtim #btntim{ line-height:5px;}
#formtim #tukhoa { width:190px; height:20px; text-align:center; 
	margin-left:10px; 	border: solid 1px #FFA806;}
#formtim a { text-decoration:none; color:#000}
#formtim a:hover{ font-weight:bold}



</style>
	<script>
	
        function Focus(object) {
            object.value = "";
        }
 
        function Blur(object) {
            if (object.value == "")
                object.value = "";
        }
		$(document).ready(function(e) {
            $("#formtim").submit(function(e) {
				if ($("#tukhoa").val()=="")  {
					alert("Ban Chua Nhap Tu Khoa"); return false;
					}
				return true
                
            }); 
        });
	
        </script>
<div id="divtim">
<form onsubmit="this.action='/tintuc/search/'+document.formtim.tukhoa.value+'.html'" action="" method="post" name="formtim" id="formtim">
<input name="view" type="hidden" id="view" value="search" />
<input name="tukhoa" type="text" id="tukhoa" value="{TuKhoa}" onfocus="Focus(this)" onblur="Blur(this)">
<input type="image" src="css/images/search.png" name="btntim" id="btntim" value="{Tim_btnvalue}" onclick="ValidateSearch()"><br />
<a href="#" id="timnangcao">{Timkiem_NC}</a>
</form>
</div>



