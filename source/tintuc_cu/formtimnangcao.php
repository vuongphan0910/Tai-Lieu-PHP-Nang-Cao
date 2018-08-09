<style>
	#divtimkiem { height:280px; width:780px; margin-top:10px;}
#divtimkiem .caption { color:#000; margin:0; padding-top:5px; padding-bottom:5px; padding-left:5px;}
#divtimkiem #divtimkiem_1{ float:left; width:385px; height:280px; 
		margin-left:5px; border:dotted 1px #99FF33; }
#divtimkiem #divtimkiem_2{ float:left; width:380px; height:130px; 
		margin-left:5px; border:dotted 1px #99FF33; }
#divtimkiem #divtimkiem_3{ float:left; width:380px; height:144px; 
		margin-left:5px; border:dotted 1px #99FF33; margin-top:5px;}
#divtimkiem form{ margin:0px}
#divtimkiem #divtrolai{ clear:left; float:left; width:780px; text-align:center; 
		margin-left:5px; margin-top:10px; }
#divtimkiem #divtrolai a{ color:#09F; font-weight:bold; text-decoration:none}

</style>
<script>
	$(document).ready(function(e) {
        $("#linktrolai").click(function(){
		$("#content1").load("tinnoibat_tinxemnhieu.php");
		$("#info").show();
		$("#content2").show();
		$("#content1").css("width","485px");
		return false;
		});
    });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once "classtin.php";
   if (isset($t) ==false)
    $t = new tin;
   $lang = 'vi';
?>
<div id="divtimkiem">  
  <div id="divtimkiem_1">
	<form id="formtim_1" name="formtim_1" method="get" action="">
      <p class="caption">Tìm tin theo từ khoá và thời gian</p>  
      <p> <input type="text" name="tukhoa" id="tukhoa" 
		value="Từ ngày" class="tk"    
    	onFocus="this.value=''" 
		onBlur="if (this.value=='') this.value='Từ ngày'"/>
	   </p>
      <p> <select name="lstloaitin" id="lstloaitin" class="tk">
              <option value="-1">Chọn loại tin</option>
              <?php $lt = $t->LoaiTin($lang,1) ?>
              <?php while ($row_lt = mysql_fetch_assoc($lt)) { ?>
                  <option value="<?php echo $row_lt['idLT'];?>" > 
                        <?php echo $row_lt['Ten'];?> 
                  </option>
              <?php }?>
           </select>
      </p>
      <p> <input type="text" name="tungay" id="tungay" value="Từ ngày"
          class="tk"  onFocus="this.value=''" 
		 onBlur="if (this.value=='') this.value='Từ ngày'"/></p>
      <p> <input type="text" name="denngay" id="denngay" value="Đến ngày"  
          onFocus="this.value=''" class="tk"
          onBlur="if (this.value=='') this.value='Đến ngày'"/></p>
      <p> <input type="submit" name="btntim1" value="Tìm kiếm"> </p>
    </form>
  </div>
  <div id="divtimkiem_2">
    <form action="" method="get" name="formtim_2" id="formtim_2">
        <p class="caption"> Xem tin theo ngày</p>
      <input name="view" type="hidden" id="view" value="search2" /> 
        <select name="ngay" id="ngay">
          <option value="0">Chọn ngày</option>
           <?php for($i=1; $i<=31; $i++) { ?>
                <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
           <?php }?>
        </select>
        <select name="thang" id="thang">
          <option value="0">Chọn tháng</option>
           <?php for($i=1; $i<=12; $i++) { ?>
                <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
           <?php }?>
        </select>
        <select name="nam" id="nam">
          <option value="0">Chọn năm</option>
           <?php for($i=2007; $i<=date("Y"); $i++) { ?>
                <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
           <?php }?>
        </select>
      <p> <input name="btntim2" type="submit"  >  </p>
        
    </form>    
  </div>
  <div id="divtimkiem_3"> </div>
  <div id="divtrolai"> <a href="#" id="linktrolai">Trở lại</a> </div>
</div>
