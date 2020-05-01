
<table width="100%" border="1" style="border-radius: 15px; border-right: none; border-left: none; border-bottom: none; border-top: none;" >
      <tr>
        <td width="40px" valign="top"><?php @include"angkahitung.php";?></td>
        <td><div class="scroll2">

        	<!-- Menampilkan Hasil Hitung -->

	  <table width="100%" border="1" bordercolor="#00CCFF" cellpadding="0" cellspacing="0" align="left">
		  <tr>
			<td height="35"><div align="center"><strong>Item</strong></div></td>
			<td ><div align="center"><strong>Harga</strong></div></td>
			<td ><div align="center"><strong>QTY</strong></div></td>
			<td ><div align="center"><strong>Total</strong></div></td>
			<td ><div align="center"></div></td>
		  </tr>

		  	<!-- Menampilkan Hasil Simpan Sementara -->
			<?php 
			@$queryAmbil=mysqli_query(@$connect,"select * from tbsimpansementara order by urut asc")or die(mysqli_error($connect));
			while($queryTampil=mysqli_fetch_array($queryAmbil)){
			?>

		  <tr>
			<td height="44"><div align="left" class="aitem2 pl-1">
				<?php
					$id = $queryTampil['idMenu'];
					$queryAmbilItem = mysqli_query($connect, "SELECT * FROM `tb_item` where id = '$id'") or die(mysqli_error($connect));
					$queryTampilItem = mysqli_fetch_array($queryAmbilItem);

					echo $queryTampilItem['nama_item'];

				?>
			</div></td>
			<td ><div align="right" class="aitem2"><?php echo number_format($queryTampil['harga']);?> &nbsp;</div></td>
			<td ><div align="center" class="aitem2"><?php echo $queryTampil['jumlahPembelian'];?></div></td>
			<td><div align="right" class="aitem2"><?php echo number_format($queryTampil['total']);?>	&nbsp;</div>
			</div></td>
			<td><div align="center" class="aitem2">
				<a href="javascript:void()" onclick="hapusItemTerpilih('<?php echo $queryTampil['urut'];?>')"><img src="images/x.png" height="25" width="30"></a>			</div></td>
		  </tr>
		  <?php }?>
		  <!-- Selesai Menampilkan Hasil Simpan Sementara -->

	</table>
	</div>
	<div class="headerpage"><p>
	
	<!-- footer-->
	</p>
</div></td>
  </tr>
      <tr>
        <td colspan="2">
		

        	<div class="row">
        		<div class="col-md-5">
        			<u class="tombol pl-2">Total</u><br>
        			<u class="tombol pl-2">Uang</u><br>
        			<u class="tombol pl-2">Kembalian</u>
        		</div>
        		<div class="col-md-7">
        			<u>
        				<?php
						$queryAmbil=mysqli_query($connect,"select *,sum(total) as subtotal from tbsimpansementara")or die($connect);
							while($queryTampil=mysqli_fetch_array($queryAmbil)){
						?>
							<input type="text" class="tombol" style="font-weight:bold; color:#000000" readonly="readonly"
								value="<?= number_format($queryTampil['subtotal']); ?>"><?php }?>
							<?php
							$queryAmbil=mysqli_query($connect,"select *,sum(total) as subtotal from tbsimpansementara")or die($connect);
							while($queryTampil=mysqli_fetch_array($queryAmbil)){
							?>
							<input type="text" id="totalitem" class="ilang" size="18" value="<?php echo $queryTampil['subtotal']; ?>">
						<?php }?>     			
        				<input type="text" id="jumlahuang" name="jumlahuang" class="tombol" maxlength="10" placeholder="Ketik Langsung" onkeyup="nyarikembalian()" onkeypress="return hanyaAngka(event)">

        			<input name="text" type="number" class="tombol" id="kembalian" style="font-weight:bold; color:#000000" readonly="readonly"/>
        		</div>
        	</div>
 

	      <table width="100%" align="right" class="table">
			  <!-- <tr>
				<td width="41%"><u>Total</u></td>
				<td width="59%">
				<?php
					$queryAmbil=mysqli_query($connect,"select *,sum(total) as subtotal from tbsimpansementara")or die($connect);
						while($queryTampil=mysqli_fetch_array($queryAmbil)){
					?>
					<input type="text" class="tombol" style="font-weight:bold; color:#000000" readonly="readonly"
						value="<?= number_format($queryTampil['subtotal']); ?>"><?php }?>
					<?php
					$queryAmbil=mysqli_query($connect,"select *,sum(total) as subtotal from tbsimpansementara")or die($connect);
					while($queryTampil=mysqli_fetch_array($queryAmbil)){
					?>
					<input type="text" id="totalitem" class="ilang" size="18" style="font-weight:bold; color:#000000" 
					value="<?php echo $queryTampil['subtotal']; ?>"><?php }?>
				</td>
			  </tr>
			  <tr>
					<td><u>Bayar</u></td>
					<td><input type="text" id="jumlahuang" name="jumlahuang" class="tombol" maxlength="10" placeholder="Ketik Langsung" onkeyup="nyarikembalian()" onkeypress="return hanyaAngka(event)"></td>
			  </tr>
			  <tr>
					<td><u>Kembalian</u></td>
					<td><div id="kembalianuang">
					  <input name="text" type="number" class="tombol" id="kembalian" style="font-weight:bold; color:#000000" readonly="readonly"/>
			   </div></td>
			  </tr> -->
			  <tr>
				<td height="54" valign="bottom" colspan="2">
					<div class="row text-center">

						<div class="col-md-4">
							<a href="#datasaved">
								<img src="images/datasaved.png" height="33"/><br />Data Saved
							</a>
								<div id="datasaved">
									<div class="window">
								    	<a href="#" class="close-button" title="Close">Tutup</a>
								        <?php @include "INC/datasaved.php";?>
								    </div>
								</div>
						</div>
						<div class="col-md-4">
						  	<a href="javascript:void()" onclick="simpanaja()">
						  		<img src="images/simpan.jpg" height="33"/><br />Simpan 
						  	</a>
						</div>
						<div class="col-md-4">
						  	<a href="javascript:void()" onclick="simpancetak()">
								<img src="images/print.jpg" height="33" /><br />
								Print 
							</a>
						</div>
					</div>
				</td>
			  </tr>
		</table>
	</td>
  </tr>
</table>