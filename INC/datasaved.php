<div align="center" class="scroll3">
<table width="85%" class="table">
  <tr><td>

<div>
<table width="100%" class="table">
  <tr>
    <td colspan="5" align="center" valign="middle"><p><strong> Data Tersimpan </strong> Hingga Tanggal : <?php echo date('d-M-Y');?></p></td>
    </tr>
  <tr style="background:#666; color:#FF0;">
    <td align="center">#</td>
    <td align="center">Meja</td>
    <td align="center">Rincian</td>
    <td align="center">Total</td>
    </tr>
<?php
$no=1;
$queryAmbil=mysqli_query($connect,"select * from tb_transaksi where ket='0' order by idtransaksi DESC") or die($connect);
while($queryTampil=mysqli_fetch_array($queryAmbil)){
?>  
  <tr>
    <td align="center">
      <a href="javascript:void()" onclick="loaddata('<?php echo $queryTampil['iddetailtransaksi'];?>')">
        Load Data
      </a>
      
    </td>
    <td lign="left" style="padding-left:20px;">
      <?php echo $queryTampil['nomeja'];?><br>
      <?php echo $queryTampil[7];?><br>
      <?php echo $queryTampil[8];?>
        
    </td>
    <td align="center">
      <table width="100%" class="table">
          <tr style="color:#FFF">
            <td align="center" bgcolor="#999999">Nama Item</td>
            <td align="center" bgcolor="#999999">Harga</td>
            <td align="center" bgcolor="#999999">Jml</td>
            <td align="center" bgcolor="#999999">Total</td>
          </tr>
            <?php
            $queryAmbilTransaksi=mysqli_query($connect,"select * from tb_detail_transaksi where iddetailtransaksi='$queryTampil[3]' AND keterangan='0'") or die($connect);
            while($queryTampilTransaksi=mysqli_fetch_array($queryAmbilTransaksi)){
            ?>      
            <?php
            $id = $queryTampilTransaksi['idMenu'];
            $queryAmbilItem = mysqli_query($connect, "SELECT * FROM `tb_item` where id = '$id'") or die(mysqli_error($connect));
            $queryTampilItem = mysqli_fetch_array($queryAmbilItem);

            ?>
          <tr>
            <td><?php echo $queryTampilItem['nama_item'];;?></td>
            <td align="right"><?php echo $queryTampilTransaksi['harga'];?></td>
            <td align="center"><?php echo $queryTampilTransaksi['jumlahpembelian'];?></td>
            <td align="right"><?php echo $queryTampilTransaksi['total'];?></td>
          </tr>
            <?php
            }
            ?>
        </table>
      </td>
      <td width="133" align="center">
        <?php echo number_format($queryTampil[4],0,'','.');?>
      </td>
    </tr>
<?php }?>    
  <tr style="background:#666; color:#FF0;">
    <td colspan="5"  style="border-left:solid 1px #00CCFF;">&nbsp;</td>
  </tr>
</table> 

</div>
</td>
</tr>
</table>

</div>