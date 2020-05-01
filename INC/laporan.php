<?php
include "../dist/koneksi.php";
@$tgl=$_POST['tanggal'];
@$bln=$_POST['bulan'];
@$thn=$_POST['tahun'];
if(!isset($tgl)){
$tgl=date("j");
$bln=date("n");
$thn=date("Y");
}
?>


<div align="center" class="scroll3">
<table width="85%" bgcolor="white" style="border-radius: 15%">
  <tr><td>

<div align="center">
    <br>
  </div>
<br>
<div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="lr">
  <tr>
    <td colspan="5" align="center" valign="middle"><p><strong> Laporan Detail Nota</strong></p></td>
    </tr>
  <tr>
    <td colspan="5" align="center">Per Tanggal : <?php echo $tgl." ".$bulan[$bln]." ".$thn;?></td>
    </tr>
  <tr style="background:#666; color:#FF0;">
    <td width="89" align="center"><strong>No Urut</strong></td>
    <td width="176" align="center"><p><strong>No Nota</strong></p></td>
    <td width="364" align="center"><strong>Rincian</strong></td>
    <td width="125" align="center"><strong>Tanggal | Jam</strong></td>
    <td width="133" align="center"><strong>Total Transaksi</strong></td>
    </tr>
<?php
$no=1;
$queryAmbilTransaksi=mysqli_query($connect,"select * from tb_transaksi where tglpembelian='$thn-$bln-$tgl' AND ket='1' order by idtransaksi ASC") or die($connect);
while($queryTampilTransaksi=mysqli_fetch_array($queryAmbilTransaksi)){
?>  
  <tr>
    <td width="89" align="center"><?php echo $no++;?></td>
    <td width="176" align="left" style="padding-left:20px;">
      <?php echo $queryTampilTransaksi[1];?>
        
      </td>
    <td width="364" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="lr">
      <tr class="lr" style="color:#FFF">
        <td align="center" bgcolor="#999999"><p><strong>Nama Item</strong></p></td>
        <td align="center" bgcolor="#999999"><strong>Harga</strong></td>
        <td align="center" bgcolor="#999999"><strong>Jml</strong></td>
        <td align="center" bgcolor="#999999"><strong>Total</strong></td>
      </tr>
<?php
$queryAmbilDetail=mysqli_query($connect,"select * from tb_detail_transaksi where iddetailtransaksi='$queryTampilTransaksi[3]' AND keterangan='1'") or die($connect);
while($queryTampilDetail=mysqli_fetch_array($queryAmbilDetail)){
?>      
      <tr>
        <td><?php echo $queryTampilDetail['namaitem'];?></td>
        <td align="right"><?php echo $queryTampilDetail['harga'];?></td>
        <td align="center"><?php echo $queryTampilDetail['jumlahpembelian'];?></td>
        <td align="right"><?php echo $queryTampilDetail['total'];?></td>
      </tr>
<?php
}
?>
    </table></td>
    <td width="125" align="center"><?php echo $queryTampilTransaksi[7];?><br><?php echo $queryTampilTransaksi[8];?></td>
    <td width="133" align="center"><?php echo number_format($queryTampilTransaksi[4],0,'','.');?></td>
    </tr>
<?php }?>    
  <tr style="background:#666; color:#FF0;">
    <td colspan="3"  style="border-left:solid 1px #00CCFF;"><a href="download_file_excel.php?tanggal=<?php echo $tgl;?>&bulan=<?php echo $bln;?>&tahun=<?php echo $thn;?>" style="text-decoration:none; color:#FFF; font-weight:bold;">Download File Excel</a></td>
    <td colspan="2">
      <?php 
        $query=mysqli_query($connect,"select *, sum(totalpembelian) as total from tb_transaksi where tglpembelian='$thn-$bln-$tgl' AND ket='1' order by idtransaksi ASC") or die(mysqli_error($connect));
        while($tampil=mysqli_fetch_array($query)){
          echo "Total Nilai Transaksi : Rp. ".number_format($tampil['total']);
        }?>
    </td>
    </tr>
</table>
<br><br><br><br>

</div>
</td>
</tr>
</table>

</div>