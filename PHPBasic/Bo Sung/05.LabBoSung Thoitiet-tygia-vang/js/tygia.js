if (location.host !=='vnexpress.net')
{
	document.write('<table border="0" cellpadding="0" cellspacing="0" width="100%">');
	try
	{
		for(i in vForexs){
			if (typeof vForexs[i] != "undefined")
		    	document.write('<tr><td>&nbsp;&nbsp;' + vForexs[i] + '</td><td>&nbsp;' + vCosts[i] + '</td></tr>');
	    }
	}
	catch (error)
	{
	    document.write('<tr><td colspan="2" class="source"><a href="http://giaitri24h.mobi">GiaiTri24h.Mobi</a></td></tr>');
	}
	document.write('<tr><td colspan="2" class="source"><i>(Nguồn: Ngân hàng Ngoại thương VN)</i></td></tr>');
	document.write('<tr><td colspan="2" class="source">Soạn tin <b>TG</b>&lt;mã tiền tệ&gt; gửi tới 8100 để nhận tỷ giá hàng ngày</td></tr>');
	document.write('</table>');
}
else
	document.write('<a href="http://giaitri24h.mobi">GiaiTri24h.Mobi</a>');