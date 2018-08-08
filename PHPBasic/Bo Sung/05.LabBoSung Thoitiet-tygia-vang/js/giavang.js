if (location.host !=='vnexpress.net')
{
    document.write('<table border="0" cellpadding="0" cellspacing="0" width="100%">');
	try
	{
	    if (typeof vGoldBuy != "undefined")
	    	document.write('<tr><td>&nbsp;&nbsp;Mua</td><td>&nbsp;' + vGoldBuy + '</td></tr>');
	    if (typeof vGoldSell != "undefined")
	    	document.write('<tr><td>&nbsp;&nbsp;Bán</td><td>&nbsp;' + vGoldSell + '</td></tr>');
	}
	catch (error)
	{
	    document.write('<tr><td colspan="2" class="source"><a href="http://giaitri24h.mobi">GiaiTri24h.Mobi</a></td></tr>');
	}
	document.write('<tr><td colspan="2" class="source"><i>(Nguồn: Cty SJC Hà Nội)</i></td></tr>');
	document.write('<tr><td colspan="2" class="source">Soạn tin <b>GV</b> gửi tới 8100 để nhận giá vàng hàng ngày</td></tr>');
	document.write('</table>');
}
else
	document.write('<a href="http://giaitri24h.mobi">GiaiTri24h.Mobi</a>');