<?php 
	require_once"classtin.php";
	$ngay=$_GET['ngay'];
	$thang=$_GET['thang'];
	$nam=$_GET['nam'];
	//$gio=date('H:i:s');
	$thoigian=$nam."/".$thang."/".$ngay;//."/".$gio
	
	$pageSize = 5;
	$pageNum = $_GET['pageNum']; 
	settype($pageNum, "int");
	if ($pageNum<=0) $pageNum=1;
	if(isset($t)==false)
	$t = new tin;
	$kq=$t->TimkiemNangCao($thoigian,$totalRow,$pageNum,$pageSize);

?>
	<style>
    	 .caption{
				border:solid 1px #FFF;
				background-color:#06F;
				
				color:#FFF;
			
			}
			 .caption span {float:right}
			
    	#ketquatimkiem .row_tin{border-bottom:dotted 1px #000000;padding:5px;min-height:160px;margin:3px;}
		#ketquatimkiem .row_tin img{margin:3px 6px 3px 6px; 	}
		#ketquatimkiem a{text-decoration:none;color:#06F;}
		#ketquatimkiem .row_tin span{font-style:italic;}
    
    </style>
 
	<div><?php include "formtim.php";?></div>
	<div id="ketquatimkiem">
            <div class="caption">KẾT QUẢ TÌM KIẾM </span></div>
     
        <?php while ($row_tin = mysql_fetch_assoc($kq) ) {?>
                <?php ob_start(); ?>
                <div class="row_tin">
                <p><a href="news/{TieuDe_KhongDau}.html">{TieuDe}</a><span> ({TenTL} / {Ten})</span></p>
                <img src="{urlHinh}" width="180" height="100" align="left">
                   <p> <span class=ngay>Ngày đăng: {Ngay}.</span> 
                    <span class=solanxem>Số lần xem: {SoLanXem} </span></p>
                  
                <p class="tomtat"> {TomTat}</p>
                </div>
                <?php $str = ob_get_clean();
            $str = str_replace("{idTin}" , $row_tin['idTin'] , $str);
            $str = str_replace("{TieuDe}" , $row_tin['TieuDe'] , $str);
			$str = str_replace("{TieuDe_KhongDau}" , $row_tin['TieuDe_KhongDau'] , $str);
            $str = str_replace("{TomTat}" , $row_tin['TomTat'], $str);
            $str = str_replace("{urlHinh}" , $row_tin['urlHinh'], $str);
            $str=str_replace("{Ngay}",date("d/m/Y",strtotime($row_tin['Ngay'])),$str);
            $str = str_replace("{SoLanXem}" , $row_tin['SoLanXem'], $str);
            $str = str_replace("{Ten}" , $row_tin['Ten'], $str);
            $str = str_replace("{TenTL}" , $row_tin['TenTL'], $str);
            echo $str;
                ?>
            <?php } ?>    
            
           <div class="pagination_news">
        <?=$t->pagesList("home.php?view=search2&ngay=$ngay&thang=$thang&nam=$nam",$totalRow,$pageNum,$pageSize,3) ?>
        </div>
            
</div> 