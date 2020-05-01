<script>
// JavaScript Document
<!-- Validasi Input -->
function checkName(){
    var x = document.myForm;
    var input = x.name.value;
    var errMsgHolder = document.getElementById('kategori_nama');
    if (input.length < 3) {
        alert("pajang kurang dari 3");
        return false;
    } else if (!(/^\S{3,}$/.test(input))) {
        alert("Tidak boleh ada spasi");
        return false;
    } else {
        return undefined;
    }
}


function addChar(input, character) {
	var target=document.getElementById("jml"); //memanggil form input jml
	if(target.value.length>=3 || input.value == null || input.value == "") 
		input.value = character 
	else
		input.value += character
}
function deleteChar(input) {
	input.value = input.value.substring(0, input.value.length - 1)
}
var xmlhttp;

function hanyaAngka(evt){
	var charCode	=(evt.which)?evt.which:event.keycode
		if(charCode	>31&&(charCode<48||charCode>57))
		return false;
		return true;
	}

function hanyaHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}

<!-- FUNGSI PROSES -->

function pilih(kode){
	var url="INC/atas.php?rand="+Math.random();
	var post='kode='+kode;
	ajax(url,post,"hitung");
	}

function cari(){
	var cari=document.getElementById("cariItem").value;
	var url='INC/tampilmenu.php';
	var post='cari='+cari;
	ajax(url,post,"tampilmenu");
	}

function menghitung(){ //mengisi ke tb simpan sementara
	var noMeja 		= document.getElementById("noMeja").value;
	var itembarang	= document.getElementById("barang").value;
	var idMenu		= document.getElementById("idMenu").value;
	var stok		= document.getElementById("stok").value;
	var itemharga	= document.getElementById("harga").value;
	var itemjumlah	= document.getElementById("jml").value;
	var table 		= "tbsimpansementara"; 
	var stokAkhir	=stok-itemjumlah;

		if( stokAkhir < 0){
			alert('Stok Tidak Cukup');
			return true;
		}
		if(noMeja==""){
			alert('Input No Meja Dahulu.');
		}else if (itembarang=="" || itemjumlah=="") {
			alert('Pilih Item Dan Isi Jumlah Pesanan.');
		}else{
			var url="INC/proses.php";
			var post="idMenu="+idMenu+"&itemharga="+itemharga+"&itemjumlah="+itemjumlah+"&noMeja="+noMeja+"&table="+table;
			ajax(url,post,"proses");
			return true;
		}
	}

function hapusItemTerpilih(id){
	var table = "hapusItemTerpilih"
	var url='INC/proses.php';
	var post='id='+id+"&table="+table;
	ajax(url,post,"proses");
	}

function nyarikembalian(){
	var totalitem	=document.getElementById("totalitem").value;
	var jumlahuang	=document.getElementById("jumlahuang").value;

	cari = jumlahuang-totalitem;

	document.getElementById("kembalian").value=cari;
	
	}
 
function simpancetak(){ //memindahkan isi tb simpan sementara ke tb detail transaksi
	var totalitem	= document.getElementById("totalitem").value;
	var jumlahuang	= document.getElementById("jumlahuang").value;
	var kembalian	= document.getElementById("kembalian").value;
	var noMeja 		= document.getElementById("noMeja").value;
	var hasil 		= jumlahuang-totalitem;
	var table 		= "simpanprint";

	if(noMeja==""){
		alert ("No Meja Tidak Boleh Kosong.");
	}else if (totalitem=="") {

	}else if(hasil<0){
			alert('Uang Pembayaran Kurang');
			return true;
		}else if(hasil >-1){
			window.open('INC/none.php','_blank');
			var url = 'INC/proses.php?'
			var post ='totalitem='+totalitem+"&jumlahuang="+jumlahuang+"&hasil="+hasil+"&noMeja="+noMeja+"&table="+table;
			ajax(url,post,"proses");
		}
	}
	
	function simpanaja(){ //menyimpan data sementara untuk digunakan nantinya
	var totalitem	= document.getElementById("totalitem").value;
	var jumlahuang	= document.getElementById("jumlahuang").value;
	var kembalian	= document.getElementById("kembalian").value;
	var noMeja 		= document.getElementById("noMeja").value;
	var hasil 		= jumlahuang-totalitem;
	var table 		= "simpanaja";

	if(noMeja==""){
		alert ("Isi No. Meja!");
	}else if (totalitem=="") {
		alert("Belum Ada Item di Cart");
	}else{
			var url = 'INC/proses.php?';
			var post ='totalitem='+totalitem+"&jumlahuang="+jumlahuang+"&hasil="+hasil+"&noMeja="+noMeja+"&table="+table;
			ajax(url,post,"proses");
		}
	}
	

	function loaddata(id){
	var table	=	"loaddata";

	var url='INC/proses.php';
	var post='id='+id+"&table="+table;
	ajax(url,post,"proses");
	}

<!-- TOMBOL KATEGORI MENU   -->	
<?php
	include 'koneksi.php';
	$query =  mysqli_query($connect,"SELECT * FROM tb_kategori_item") or die($connect);
	while($tampil=mysqli_fetch_array($query)){
?>
	function <?php echo $tampil['nama_kategori'];?>(){
		a	= "<?php echo $tampil['nama_kategori'];?>";
		var url='./INC/tampilmenu.php';
		var post="a="+a;
		ajax(url,post,"tampilmenu");
		}
<?php }?>

<!-- END TOMBOL MENU -->	
/* proses js */
function out_response(response){
	if(response=="tampilmenu"){
		document.getElementById("tampilmenu").innerHTML=xmlhttp.responseText;
		}
	if(response=="tampiltotal"){
		document.getElementById("tampiltotal").innerHTML=xmlhttp.responseText;
		}
	if(response=="hitung"){
		document.getElementById("hitung").innerHTML=xmlhttp.responseText;
		}
	if(response=="proses"){
		document.getElementById("proses").innerHTML=xmlhttp.responseText;
		}
	if(response=="tampilperingatan"){
		document.getElementById("tampilperingatan").innerHTML=xmlhttp.responseText;
		}
	if(response=="pilihandiskon"){
		document.getElementById("pilihandiskon").innerHTML=xmlhttp.responseText;
		}
	if(response=="kembalian"){
		document.getElementById("kembalian").innerHTML=xmlhttp.responseText;
		}
	if(response=="periksahitung"){
		document.getElementById("periksahitung").innerHTML=xmlhttp.responseText;
		}
	if(response=="peringatan"){
		document.getElementById("peringatan").innerHTML=xmlhttp.responseText;
		}
}

function ajax(url,post,response){
	xmlhttp=GetXmlHttpObject();
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4){
		if(xmlhttp.status==200){
		out_response(response);
			}else{
				ajax_fail();
				}
	}
	}
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(post);
  }
function ajax_fail(){
	slert('maaf ada gangguan penerimaan data, silahkan coba lagi atau refresh web browser anda');
	return false;
	}
function GetXmlHttpObject(){
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();
		}
	if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			alert('Browser anda tidak mendukung JavaScript.');}
			return false;
	}
</script>