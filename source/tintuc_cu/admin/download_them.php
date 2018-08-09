<style >
	#divUpload{ width:500px; border:solid 1px #033}
	#divUpload span { width:60px; float:left; color:#036}
	#divUpload .txt { width:420px; background-color:#990; padding:3px;}
	#divUpload #mota { height:80px}
	#divUpload #btnUpload { background-color:#036; color:#0FC; height:30px; width:100px}


</style>
<?php
require_once "classquantri.php";
$qt = new quantritin;
$qt->CheckLogin();
if(isset( $_POST['btnUpload'])==true){
	$qt->ThemDownload();
	header("location:main.php?p=download_xemds");
} //if
?>

<div id="divUpload">
<form action="" method=post enctype="multipart/form-data" name=form1 id="form1">
<p><span>Tên file</span> <input type="text" name="tenfile" class="txt" /></p>
<p><span>Mô tả</span> <textarea name="mota" id="mota" class="txt"> </textarea> </p>
<p><span>Tên file</span> <input type="file" name="file" class="txt" /> </p>
<p align=center><input type=submit name=btnUpload id=btnUpload value="Upload" ></p>
</form>
</div>
