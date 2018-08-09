
<style>
	#path{ background-color:#999900; color:#003366; font-weight:bold;
	    padding-top:5px; padding-bottom:5px; }
#chitiettin_left{ float:left; width:535px;; background-color:#FFF;padding-right:3px;}
#chitiettin_right{ float:left; width:250px; background-color:#FFF; border:solid 1px #000; }
#chitiettin #tin_tieude{ font-weight:bold; color:#003366; }
#chitiettin #tin_tomtat{ 
color:#000; text-align:justify; border-bottom:#CC3300 1px solid; 
padding-bottom:12px; padding-right:5px; font-size:16px}
#chitiettin #tin_noidung{ text-align:justify; background-color:#FFF;}
#chitiettin .ngay{ color:#036;  font-style:italic; text-align:right}
/*#util{
		
	}
#tinmoihon{
			text-align:center;	
	}
#tincuhon{}
.caption{
		
    border-bottom: 1px solid #e5e5e5;
    box-shadow: 0 2px 0 #fcfafa;
    height: auto;
    margin-bottom: 0;
    padding: 8px 10px 0;	
	display:inline-table;
	}
	#tincuhon {
			text-align:center;	
			color:#000;
			
	}
	#tincuhon p{border-top:solid 1px #000000;padding-top:5px;}
	#tincuhon a{text-decoration:none; color:#000;}*/
	#util {  padding-top:15px; padding-bottom:15px; background-color:#993300;
		color:#99FF00; text-align:center}
#util  a{ color:#99FF00; font-weight:bold; text-decoration:none}
#util  a:hover{ color:#003366}

#tinmoihon, #tincuhon{ margin-top:10px}
#tinmoihon .caption, #tincuhon .caption {  
	color:#66FFFF; font-weight:bold; padding-left:10px; 
text-transform:uppercase; display:block; background-color:#CC9900;
	padding-bottom:5px; padding-top:5px; border-bottom:solid 1px #99FF00;}
#tinmoihon a, #tincuhon a{ 
	color:#990033; text-decoration:none; margin-left:10px; display:block; 
	padding-top:5px; padding-bottom:5px; border-bottom:dotted 1px #990066; }
</style>
<script>
	$(document).ready(function(e) {
       $("#banin").click(function(){
    $("#header").hide();      $("#menu").hide();
    $("#content1").hide();    $("#content2").hide();
    $("#info").hide();        $("#content3").hide();
    $("#footer").hide();      $("#util").hide();
    $("#chitiettin_right").hide();
    $("#chitiettin").css("width","990px");
    $("#chitiettin_left").css("width","990px");
    $("#path").css("width","990px");
	/*window.print() ;*/
    return false; });
	
		
    });
</script>


<?php require_once "classtin.php";  if (isset($t)==false) $t = new tin;
	$TieuDe_KhongDau =$_GET['TieuDe_KhongDau'];
	if(get_magic_quotes_gpc()==false)
		$TieuDe_KhongDau = mysql_real_escape_string($TieuDe_KhongDau);
		$idTin=$t->LayidTin($TieuDe_KhongDau);	
//$idTin = $_GET['idTin']; settype($idTin,"int");
		$t->CapNhatSolanXemTin($idTin);
		$tin = $t->ChiTietTin($idTin);
		$row_tin=mysql_fetch_assoc($tin);?>
<div id=path>{Homepage}/<?=$row_tin['TenTL'];?>/<?=$row_tin['Ten'];?></div>
<div id="chitiettin">
    <div id="chitiettin_left">
       <p id="tin_tieude"> <?=$row_tin['TieuDe'];?> </p>
       <p id="tin_tomtat">
       <img src="<?=$row_tin['urlHinh'];?>" width=70 height=70 align=left>
       <?=$row_tin['TomTat'];?>
       </p>
       <div id="tin_noidung"> <?=$row_tin['Content'];?> </div> 
     </div>
     <div id="chitiettin_right"> 
     		<div id="util">
    <a href="#" id="banin"> Bản in </a> &nbsp; 
     Xem:  <?=$row_tin['SoLanXem'];?>. 
     Đăng:  <?=date('d/m/Y',strtotime($row_tin['Ngay']));?>              
				</div>
				<?php $kq = $t->TinMoiCungLoai($idTin,$lang,5); 
							if(mysql_num_rows($kq)>0) { ?>
				
                <div id="tinmoihon">
                    <span class="caption">{Newer}</span>
                    
                    <?php while ($row_kq = mysql_fetch_assoc($kq)) {?>
                      <p> <img src="<?=$row_kq['urlHinh']; ?>"  width="140" height="110" align="center"/></p>
                       <p> <a href="news/<?php echo $row_kq['TieuDe_KhongDau']?>.html"> <?=$row_kq['TieuDe'];?> </a></p>
                  <?php } ?>
                </div>
                <?php }?>
                 <?php $kq = $t->TinCuCungLoai($idTin,$lang,5);
				 		if(mysql_num_rows($kq)>0) { ?>
				 
                <div id="tincuhon">         
                    <span class="caption">{OlderNews}</span>
                   
                    <?php while ($row_kq = mysql_fetch_assoc($kq)) {?>
                        <p> <img src="<?=$row_kq['urlHinh']; ?>"  width="140" height="110" align="center"/></p>
                        <a href="news/<?php echo $row_kq['TieuDe_KhongDau']?>.html"> 
						<?=substr($row_kq['TieuDe'],0,40);?>...</a>
                    <?php } ?>
			</div>
			<?php } ?>
      </div>     
</div>
