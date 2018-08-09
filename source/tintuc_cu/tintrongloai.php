<style >
	#tintrongloai #path {
	background-color:#036;color:#FFF; height:30px; line-height:30px;
	text-transform:uppercase; font-size:16px;}
	#tintrongloai .row_tin {
		border-bottom: solid 1px #000; padding-right:5px; min-height:160px;margin:5px;}
	#tintrongloai .row_tin img{ margin-right:5px; width:180px; height:100px}
	#tintrongloai .xemtiep {text-align: right;}
	#tintrongloai .xemtiep a {color: #990033;text-decoration: none;}
	#tintrongloai .xemtiep a:hover {color: #006699;text-decoration: underline;}
	#tintrongloai .tieude{ font-weight:bold; margin-top:5px; margin-bottom:5px;}
	#tintrongloai .tomtat { text-align:justify; margin-top:5px; margin-bottom:5px;}
	#tintrongloai .ngay{ margin-top:5px; margin-bottom:5px; color:#003333; font-style:italic}
	#catenews_left{
			width:500px;
			min-height:350px;
			float:left;
			display:block;
			background-color:#06F;
		
		}
		#catenews_left a{display:block;}
		#catenews_right{ width:287px;float:right;background-color:#0CF;margin-left:3px;text-align:center; 
			}
			#catenews_right a {display:block;}
		/*	#catenews_right img{al}*/
		
	

</style>
<?php 
	$pageSize =5;
	settype ($pageNum,'int');
	$pageNum = $_GET['pageNum'];
	if ($pageNum<=0)
	$pageNum=1;
	$totalRow=0;
	require_once"classtin.php";
	if(isset($t)==false)
	$t=new tin;
	$Ten_KhongDau = $_GET['Ten_KhongDau'];
	if (get_magic_quotes_gpc()==false) 
	$Ten_KhongDau=mysql_real_escape_string($Ten_KhongDau);
	$idLT = $t->LayidLT($Ten_KhongDau);

	//$idLT=$_GET['idLT'];
	//settype($idLT,"int");
	$tin=$t->TinTrongLoai($idLT,$totalRow,$pageNum,$pageSize);
	$loaitin=$t->ChiTietLoaiTin($idLT);
	$row_loaitin= mysql_fetch_assoc($loaitin);
	//$dem=0;
?>

<div id="tintrongloai">
	
	<div id="path">{Homepage}/<?=$row_loaitin['TenTL'] ?>><?=$row_loaitin['Ten'] ?></div>
				
				<?php while ($row_tin=mysql_fetch_assoc($tin)) {?>
                   <div class="row_tin">
                  <a href="news/<?=$row_tin['TieuDe_KhongDau'] ?>.html"> <p class="tieude"><?=$row_tin['TieuDe'];?> </p></a>
                   <p class="ngay">
                   <img src="<?=$row_tin['urlHinh'];?>" width="150" height="100" align="left">
                   {Ngaydang}: <?=date('d/m/Y',strtotime($row_tin['Ngay']));?>. 
                   {Solanxem}: <?=$row_tin['SoLanXem'];?> </p>
                   <p class="tomtat"> <?=$row_tin['TomTat'];?> </p>
                   <div class="xemtiep"> <a href="news/<?=$row_tin['TieuDe_KhongDau']; ?>.html">{chitiet}</a> </div>
                </div>
                <?php } ?>
                
                
                
                <p class="pagination_news">
        <?=$t->pagesList1("cat/$Ten_KhongDau",$totalRow,$pageNum,$pageSize,3) ?>
        </p>

			
</div>

