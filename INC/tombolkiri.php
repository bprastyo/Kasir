<table width="100%" border="1" style="border-radius: 15px; border-left: none; border-right: none; border-bottom: none; border-top: none">
  <tr>
    <td colspan="4"><?php 
		@$queryAmbil=mysqli_query($connect,"select noMeja from tbsimpansementara order by urut DESC limit 1") or die($connect);
		@$queryTampil=mysqli_fetch_array($queryAmbil);
	
		?>
  <input type="text" maxlength="30" autofocus="autofocus" class="tombol" id="noMeja" name="noMeja" value="<?php echo @$queryTampil[0];?>" size="20" placeholder="No Meja"/></td>
  </tr>
  <tr>
    <td><div align="center">
    <input name="button" type="button" class="tombol" onclick="addChar(this.form.noMeja,'1')" value="1" /></div></td>
    <td><div align="center">
    <input name="button2" type="button" class="tombol" onclick="addChar(this.form.noMeja,'2')" value="2" /></div></td>
    <td><div align="center">
    <input name="button3" type="button" class="tombol" onclick="addChar(this.form.noMeja,'3')" value="3" /></div></td>
    <td><div align="center">
    <input name="button4" type="button" class="tombol" onclick="addChar(this.form.noMeja,'4')" value="4" /></div></td>
  </tr>
  <tr>
    <td><div align="center">
    <input name="button5" type="button" class="tombol" onclick="addChar(this.form.noMeja,'5')" value="5" /></div></td>
    <td><div align="center">
    <input name="button6" type="button" class="tombol" onclick="addChar(this.form.noMeja,'6')" value="6" /></div></td>
    <td><div align="center">
    <input name="button7" type="button" class="tombol" onclick="addChar(this.form.noMeja,'7')" value="7" /></div></td>
    <td><div align="center">
    <input name="button8" type="button" class="tombol" onclick="addChar(this.form.noMeja,'8')" value="8" /></div></td>
  </tr>
  <tr> 
    <td><div align="center">
    <input name="button9" type="button" class="tombol" onclick="addChar(this.form.noMeja,'9')" value="9" /></div></td>
    <td><div align="center">
    <input name="button10" type="button" class="tombol" onclick="addChar(this.form.noMeja,'0')" value="0" /></div></td>
    <td colspan="2"><div align="center">
    <input name="button11" type="button"  class="tombol" onclick="deleteChar(this.form.noMeja)" value="&lt;=" /></div></td>
  </tr>
  <tr>
    <td colspan="4" align="justify">
      <hr>
          <input type="text" name="kodePromo" class="tombol" placeholder="Kode Promo / Member Card">
          <input type="text" name="diskon" class="tombol" placeholder="Diskon %" readonly="readonly">
    </td>
  </tr>
  <tr>
    <td colspan="4">

  <strong>Menu Kategori </strong></td>
  </tr>
  <tr><?php $klik="rotibakar";?>
    <td><div align="center"><a href="javascript:void()" onclick="rotibakar()"><img src="images/rotibakar.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="pisangbakar()"><img src="images/pisangbakar.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="indomie()"><img src="images/indomie.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="gorengan()"><img src="images/gorengan.png" alt="a" width="55" height="55" /></a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="javascript:void()" onclick="sosis()"><img src="images/sosis.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="pancake()"><img src="images/pancake.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="angkringan()"><img src="images/angkringan.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="paket()"><img src="images/paketspecial.png" alt="a" width="55" height="55" /></a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="javascript:void()" onclick="kbh()"><img src="images/promo.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="kentang()"><img src="images/kentang.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="javascript:void()" onclick="kopihitam()"><img src="images/coffe.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="kopisusu()"><img src="images/kopisusu.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="jus()"><img src="images/jus.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="teh()"><img src="images/teh.png" alt="a" width="55" height="55" /></a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="javascript:void()" onclick="squash()"><img src="images/squash.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"><a href="javascript:void()" onclick="milkshake()"><img src="images/milk_shake.png" alt="a" width="55" height="55" /></a></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>  
</table>
