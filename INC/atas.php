<?php 
@include 'dist/koneksi.php';
@include '../dist/koneksi.php';
@$id=$_POST['kode'];
$query=mysqli_query($connect,"select * from tb_item where id = '$id'") or die($connect);
$tampil=mysqli_fetch_array($query);
?>
<div id="hitung">
<input type="text" id="cariItem" class="tombol" onKeyUp="cari()" maxlength="50" autofocus="autofocus" placeholder="Cari item ...">
<input type="text" readonly="readonly" value="<?php echo $tampil['harga'];?>" class="ilang" id="harga"/>

<hr>
<input type="text" readonly="readonly" value="<?php echo $tampil['nama_item'];?>" class="tombol" id="barang" placeholder="Item Terpilih ..."/>
<input type="text" class="ilang" value="<?php echo $tampil['id'];?>" class="tombol" id="idMenu"/>
<input type="text" class="ilang" value="<?php echo $tampil['stok'];?>" class="tombol" id="stok"/>
<hr />
</div>
