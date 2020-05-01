<?php
session_start();
include '../dist/koneksi.php';

@$queryambil = mysqli_query($connect,"select *  from tb_detail_transaksi order by urut DESC limit 1") or die(mysql_error());
$valueid=mysqli_fetch_array($queryambil);
$id = $valueid['iddetailtransaksi'];
$meja = $valueid['nomeja'];
include_once '../html2pdf/html2pdf.class.php';
	
	$content = "
	<table width=200>
		<tr>
			<td align=center colspan=4>
				Aplikasi Kasir 2.0 <br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Budi Tyo @ Rembang Jawa Tengah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;085211050734&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
				===================================
			</td>
		</tr>
		<tr>
			<td align=left>No Nota :</td><td colspan=3>$id</td>
		</tr>
		<tr>
			<td align=left>Meja :</td><td colspan=3>$meja</td>
		</tr>
		<tr>
			<td align=left >Kasir :</td><td colspan=3>".
			$user = $_SESSION['user_session']
			."</td>
		</tr>
		<tr>
			<td colspan=4>
				===================================
			</td>
		</tr>

	";
	$no=1;
	$queryambil2 =mysqli_query($connect,"select * from tb_detail_transaksi where iddetailtransaksi='$id'")or die(mysql_error());
	while($value=mysqli_fetch_array($queryambil2)){

		$queryAmbilItem = mysqli_query($connect,"SELECT * FROM tb_item where id='$value[3]'");
		$queryTampilItem = mysqli_fetch_array($queryAmbilItem);

		$namaitem 	= $queryTampilItem['nama_item'];
		$harga		= $value['harga'];
		$jumlahpembelian		= $value['jumlahpembelian'];
		$total		= $value['total'];
	$content .= "
		<tr>
			<td max-width=50%>
				<small>$namaitem</small>
			</td>
			<td>
				<small>$harga</small>
			</td>
			<td>
				<small>$jumlahpembelian</small>
			</td>
			<td>
				<small>$total</small>
			</td>
		</tr>
	";		
	}
	$content .=" 
	<tr>
		<td colspan=4>
			===================================
		</td>
	</tr>";
	$queryambil3=mysqli_query($connect,"select * from tb_transaksi where iddetailtransaksi = '$id'")or die($connect);
		while($queryTampil=mysqli_fetch_array($queryambil3)){
		
			$content .=
			"
				<tr>
					<td>Total</td><td colspan=3> : ".number_format($queryTampil['totalpembelian'])."</td>
				</tr>
				<tr>
					<td>Uang </td><td colspan=3> : ".number_format($queryTampil['uangbayar'])."</td>
				</tr>
				<tr>
					<td>Kembalian</td><td colspan=3> : ".number_format($queryTampil['uangkembali'])."</td>
				</tr>
			</table>
			===================================<br>
			Terima Kasih, Selamat Datang Kembali";
}
        $html2pdf = new HTML2PDF('P', array(216,75), 'en');

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('Nota - '.$id = $valueid['iddetailtransaksi'].'.pdf');

    ?>