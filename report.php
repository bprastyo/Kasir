<?php
	require_once('dist/koneksi.php');
    require_once(dirname(__FILE__).'./html2pdf/html2pdf.class.php');

	$content = "
	<table border=1px style='border-size=thin; size:100%'>
		<tr>
			<th width=5>id</th>
			<th width=55>nama</th>
			<th width=15>harga</th>
		</tr>
	";
	$no=1;
@$queryambil = mysql_query("select * from tb_item where ket = '1' order by nama_item asc") or die(mysql_error());
	while($value=mysql_fetch_array($queryambil)){
		$id			= $no++;
		$namaitem 	= $value['nama_item'];
		$harga		= $value['harga'];
	$content .= "
		<tr>
			<td>$id</td>
			<td>$namaitem</td>
			<td>$harga</td>
		</tr>
	";		
	}
	$content .=" </table>";

        $html2pdf = new HTML2PDF('P', array(216,75), 'en');

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('report.pdf');
   ?>