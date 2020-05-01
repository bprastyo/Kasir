<div>
	<table width="100%" border="1" bordercolor="#00CCFF" cellpadding="0" cellspacing="0" align="left">
		<tr>
			<th width="62%" height="33" align="center"> <h5>MENU</h5></th>
			<th width="22%" align="center"> <h5>HARGA</h5> </th>
			<th width="" align="center"> <h5>Stok</h5> </th>
		</tr>
	</table></div> 
<div class="scroll">
  	<table class="table-hover" width="100%" border="1" bordercolor="#00CCFF" cellpadding="0" cellspacing="0" align="left">
            <?php 
			@include "../dist/koneksi.php";
			@include "dist/koneksi.php";
			@$kategori=mysqli_real_escape_string($connect, trim($_POST['a']));


			@$cari=mysqli_real_escape_string($connect, trim($_POST['cari']));
		

			if($kategori==""){
				$queryambil=mysqli_query($connect,"select * from tb_item where ket = '1' order by nama_item asc") or die($connect);
			}
			if($cari){
				$queryambil=mysqli_query($connect,"select * from tb_item where nama_item like '%$cari%' and ket = '1' order by nama_item asc") or die($connect);
			}
			else if($kategori){
				$queryambil=mysqli_query($connect,"select * from tb_item where jenis = '$kategori' and ket = '1' order by nama_item asc") or die($connect);
			}
			while($value=mysqli_fetch_array($queryambil)){
			?> 
				<tr>
                    <td width="64%" height="40" align="left" valign="center">
					<div class="aitem pl-1"  valign="center">
						<a href="javascript:void()" onClick="pilih(<?php echo $value['id'];?> )"style="text-decoration:none; color:#000000" class="aitem"><?php echo $value['nama_item']; ?></a></div>					</td>
                    <td width="23%" align="left" p><div class="aitem pr-1">
					  	<div align="right"><a href="javascript:void()" onClick="pilih(<?php echo $value['id'];?> )"style="text-decoration:none; color:#000000" class="aitem"><?php echo $value['harga'] ?></a></div>
	                    </div>					
	                </td>
                    <td width="15%" align="center" valign="center"><div class="aitem pr-1"  valign="center">
					  	<div align="center"><a href="javascript:void()" onClick="pilih(<?php echo $value['id'];?> )"style="text-decoration:none; color:#000000" class="aitem"><?php echo $value['stok'] ?></a></div>
	                    </div>					
	                </td>
                </tr>
			<?php @$hitung++;}?>	
</table>
</div>
