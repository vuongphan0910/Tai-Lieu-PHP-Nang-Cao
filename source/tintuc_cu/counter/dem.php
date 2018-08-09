<?php
	$filename = "counter.txt"; // 23
	$sokytu = 5; //hiện  ít nhất 5 ký tự
	$dir = "."; //folder chứa hình
	$count = 0;
	if (file_exists($filename)==true){
		  $fp = fopen($filename, "r") or die("Mở file counter không được");
		  $size = filesize($filename);
		  $count = fread($fp, $size);
		  fclose($fp);
	}
	//if(!isset($_COOKIE['count'])){
	 $count++;
	$fp = fopen($filename, "w");
		fwrite($fp, $count);
		fclose($fp);
		//setcookie('count','1');
	//}
		$str = str_pad($count,$sokytu,"0",STR_PAD_LEFT);//thêm số 0 bên trái cho đủ $sokytu. vd: 00023
		$len=strlen($str); 
		
		if(!file_exists("$dir/0.png")) die("Không tìm thấy file hình");
		$h0 = ImageCreateFrompng("$dir/0.png"); //tạo hình từ file hoặc URL
		$rong = ImageSX($h0); //Lấy độ rộng của hình 
		$cao = ImageSY($h0); //Lấy độ cao của hình
		ImageDestroy($h0); //hủy hình 0
		
		$offset = 0; 
		$dest_img = ImageCreateTrueColor($rong*$len, $cao);//tạo hình
		for ($i=0;$i<$len; $i++) {
		  $digit = $str[$i];	  
		  $kyso = ImageCreateFrompng($dir."/".$digit.".png");//đọc hình ứng với số  
		  ImageCopyResized($dest_img, $kyso,$offset,0,0,0,$rong,$cao,$rong,$cao); 
		  $offset += $rong;
		} //for 
		header("Content-type: image/png"); // cho browse biết là 1 hình đang trả về
		header("Pragma: No-cache");
		header("Cache-Control:No-cache, Must-revalidate");
		imagepng($dest_img);	
		imagedestroy($dest_img); //hủy hình



 ?>