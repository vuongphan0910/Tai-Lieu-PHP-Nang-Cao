<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require_once "classquantri.php";
	$qt =new quantritin;
	$qt->CheckLogin();
	//print_r($_SESSION);
	if (isset($_POST['btnOK'])==true) {
	$qt->ThemTin();
	header("location:main.php?p=tintuc_xemds");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script type="text/javascript" src="../js/jquery.js">
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script>
$(document).ready(function(e) {
   
			$("#idTL").change(function(){
			var idTL=$(this).val();
			$("#idLT").load("tintuc_layloaitin.php?idTL="+ idTL);
		});
		
		 

});
	function BrowseServer( startupPath, functionData ){
				var finder = new CKFinder();
				finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
				finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
				finder.selectActionFunction = SetFileField;//hàm được gọi khi chọn 1 file 
				finder.selectActionData = functionData; //id của textfield hiện địa chỉ hình
			//finder.selectThumbnailActionFunction = ShowThumbnails;	
				finder.popup(); // Bật cửa sổ CKFinder
			} //BrowseServer
			function SetFileField( fileUrl, data ){
				document.getElementById( data["selectActionData"] ).value = fileUrl;
               }

		$(document).ready(function(e) {
			$("#formNewsDetail").submit(function(){
				if ($("#TieuDe").val()==0) {
				alert("Vui Lòng Nhập Tiêu Đề");
				$("#TieuDe").focus();
				return false;
					
				}
				else if ($("#TomTat").val()==0) {
				alert("Bạn ơi!Hãy Viết Vài Dòng Tóm Tắt");
				$("#TomTat").focus();
				return false;
					
				}
				else if ($("#idTL").val()==0) {
				alert("Bạn ơi! Chưa chọn thể loại mà");
				return false;
						}
				/*else if ($("#Content").val()==0) {
				alert("Tin Chua Co Noi Dung");
				$("#Content").focus();
				return false;
						}*/
				});
				/*else if ($("#idLT").val()==0) {
					alert("Bạn ơi! Chưa chọn loại tin mà");
					return false;
				}*/
			
			/*$("#formNewsDetail").submit(function(){
				
			});
			
            $("#formNewsDetail").submit(function(){
			
			});*/
			

        });


</script>



<head>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style>
	#NewsDetail {width: 650px; border: 1px groove #030;
	background-color:#3FF}
#NewsDetail td{ border-bottom:solid 1px #030}
#NewsDetail th {
	text-align: right; background-color: #CCFFFF;
	width: 90px; border-bottom: solid 1px #030;}
#NewsDetail .txt{
	color:#003366; background-color:#FF9966;	
	width:550px; border:groove 1px #963;
	padding-top:3px; padding-bottom:3px;
	border-radius: 3px 3px 3px 3px;
		box-shadow: 3px 3px #666;}
#NewsDetail #idTL, #NewsDetail #idLT {
	background-color:#FF9966;
	width: 180px; border: 1px solid #009999;}
#btnOK {	color:#06F; background-color:#CCC; width:150px; height:30px;
			box-shadow:3px 3px #000;
			border-radius:5px;


	}
/*#lang {
		width:500px;	
		background-color:;
		font-weight:bold;	
			
	}
	#TieuDe
	{
		width:490px;	
		background-color:#FF9966;
		font-weight:bold;
		border-radius: 3px 3px 3px 3px;
		box-shadow: 3px 3px #EAC2A8;
	}
	#TomTat{
		width: 493px; height: 106px;
		box-shadow: 3px 3px #CCC;}
	#urlHinh{
		width:490px;	
		background-color:#FF9966;
		border-radius: 3px 3px 3px 3px;
		box-shadow: 3px 3px #EAC2A8;
		
	}
	#Ngay{
			width:490px;	
		background-color:#FF9966;
		font-weight:bold;
		border-radius: 3px 3px 3px 3px;
		box-shadow: 3px 3px #EAC2A8;
		
		}*/

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



</head>

<body>
<form action="" method="post" id="formNewsDetail">
<table width="800" border="1" align="center" cellpadding="4" cellspacing="0" id="NewsDetail">
  <tr>
    <td width="300"><strong>Ngôn ngữ</strong></td>
    <td colspan="3"><select name="lang" id="lang" class="txt"><option value="vi">Tiếng Việt</option>
      <option value="en">Tiếng Anh</option>
    </select></td>
    </tr>
  <tr>
    <td><strong>Tiêu đề</strong></td>
    <td colspan="3" ><input type="text" name="TieuDe" id="TieuDe" class="txt" /></td>
    </tr>
  <tr>
    <td><strong>Tóm tắt</strong></td>
    <td colspan="3"><textarea name="TomTat" id="TomTat" cols="45" rows="5" ></textarea></td>
    </tr>
  <tr>
    <td><strong>url Hình</strong></td>
    <td colspan="3"><input type="text" name="urlHinh" id="urlHinh" class="txt"/> <input onclick="BrowseServer('Images:/','urlHinh')" type="button"  value="button"/> </td>
    </tr>
  <tr>
    <td><strong>Ngày đưa</strong></td>
    <td colspan="3"><input type="text" name="Ngay" id="Ngay" class="txt"/></td>
    </tr>
  <tr>
    <td><strong>Ẩn Hiện</strong></td>
    <td width="164">
      <label>
        <input type="radio" name="AnHien" value="0" id="AnHien" />
        Ẩn</label>
      
      <label>Hiện
        <input type="radio" name="AnHien" value="1" id="AnHien" checked="checked"/>
        </label>
     
    </td>
    <td width="139" align="center"><strong>Nổi bật</strong></td>
    <td width="352"><input  type="radio" id="NoiBat" name="NoiBat" value="0" checked="checked" />
      Bình thường 
        <input type="radio"  id="NoiBat" name="NoiBat" value="1" />
      Nổi bật</td>
  </tr>
  <tr>
    <td><strong>Thể Loại</strong></td>
    <script >


</script>

    
    <td><select name="idTL" id="idTL" ><?php $theloai=$qt->TheLoai('',-1);?>
	<option value="0">Chọn Thể Loại</option><?php while ($row_theloai=mysql_fetch_assoc($theloai)){?>
    <option value="<?=$row_theloai['idTL']; ?>"><?=$row_theloai['TenTL'] ?></option>
    <?php }?>
    </select></td>
    <td align="center"><strong>Loại tin</strong></td>
    <td><select name="idLT" id="idLT"><option value="0">Chọn Loai Tin</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="4" align="left"><textarea name="Content" id="Content" cols="45" rows="5"></textarea></td>
    <script type="text/javascript">
var editor = CKEDITOR.replace( 'Content',{
	uiColor : '#9AB8F3',
	language:'vi',
	skin:'v2',
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

				 	
	toolbar:[
	['Source','-','Save','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize', 'ShowBlocks','-','About']
	]
});		
</script>

    
    
    </tr>
    <tr>
    <td colspan="4" align="left"><textarea name="Content" id="Content" cols="45" rows="5"></textarea></td>
    <script type="text/javascript">
var editor = CKEDITOR.replace( 'Content',{
	uiColor : '#9AB8F3',
	language:'vi',
	skin:'v2',
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

				 	
	toolbar:[
	['Source','-','Save','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize', 'ShowBlocks','-','About']
	]
});		
</script>

    
    
    </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="btnOK" id="btnOK" value="OK" /></td>
    </tr>
</table>



</form>
</body>
</html>