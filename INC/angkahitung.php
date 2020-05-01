
<input type="text" id="jml" size="5px" class="tombol" value="" style="text-align:center;" required="required" onkeypress="return hanyaAngka(event)" onkeydown="cekangkahitung()" maxlength="3" autofocus="autofocus" /></div>
<div align="center">
<input name="hitung" id="hitung" type="button"  class="tombol" value="&nbsp;Count&nbsp;&nbsp;" onclick="menghitung()">
</div>
<div align="center"><input name="button" type="button"  class="tombol" onClick="deleteChar(this.form.jml)" value="   &lt;=    &nbsp;">
</div><div align="center">
<input type="button" value="&nbsp;1&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'1')"> 
<input type="button" value="&nbsp;2&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'2')"> 
<input type="button" value="&nbsp;3&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'3')"> 
<input type="button" value="&nbsp;4&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'4')"> 
<input type="button" value="&nbsp;5&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'5')"> 
<input type="button" value="&nbsp;6&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'6')"> 
<input type="button" value="&nbsp;7&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'7')"> 
<input type="button" value="&nbsp;8&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'8')"> 
<input type="button" value="&nbsp;9&nbsp;" class="tombolmd" onClick="addChar(this.form.jml,'9')"> 
<input name="0" type="button" class="tombolmd" id="0" onClick="addChar(this.form.jml,'0')" value="&nbsp;0&nbsp;">
</div>