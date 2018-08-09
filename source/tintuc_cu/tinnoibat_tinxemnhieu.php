<style>
	#nb_xn #tabs a{ color:#06F; text-decoration:none; float:right;
	background-color:#CCC; width:100px; display:block; margin-left:2px;
	padding-top:3px; padding-bottom:3px; text-align:center}
#nb_xn #tabs a:hover{ color:#003366;}


</style>
<script>
	$(document).ready(function(e) {
        $("#txn").click(function(){
	    $("#contenttab").load("tinxemnhieu.tco"); return false;
})
		$("#tnb").click(function(){
	    $("#contenttab").load("tinnoibat.tco");  return false;
		})

			

    });

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="nb_xn">
    <div id="tabs">
    	   <a href="#" id="tnb">{TinNoiBat}</a>
	      <a href="#" id="txn">{TinXemNhieu}</a>
         <div style="clear:both"></div>
    </div>
    <div id="contenttab"><?php include"tinnoibat.php"; ?>
   </div>
</div>
