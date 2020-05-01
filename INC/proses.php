<?php 
include"../dist/koneksi.php";
@$id 			= $_POST['id'];
@$idMenu 		=mysqli_real_escape_string($connect, trim($_POST['idMenu']));
@$harga 		=mysqli_real_escape_string($connect, trim($_POST['itemharga']));
@$jumlah 		=mysqli_real_escape_string($connect, trim($_POST['itemjumlah']));
@$total 		=$harga*$jumlah;
@$tanggalpembelian = date('Y-m-d');
@$totalitem		= mysqli_real_escape_string($connect, trim($_POST['totalitem'])); //totalpembelian
@$uangbayar		= mysqli_real_escape_string($connect, trim($_POST['jumlahuang'])); //uangbayar
@$hasil			= mysqli_real_escape_string($connect, trim($_POST['hasil'])); 
@$uangkembali 	= $uangbayar - $totalitem; //uang kembali
@$user 			= mysqli_real_escape_string($connect, trim($_SESSION['user_session']));
@$nomeja 		=mysqli_real_escape_string($connect, trim($_POST['noMeja'])); //no meja
@$jampembelian 	=date('h:i:s'); //jampembelian


$table = $_POST['table'];


	if($table == "hapusItemTerpilih"){

		$queryAmbil	= mysqli_query($connect,"SELECT * FROM `tbsimpansementara` WHERE urut='$id'");
		$queryTampil = mysqli_fetch_array($queryAmbil);
		$jml = $queryTampil['jumlahPembelian'];
		$idMenu	= $queryTampil['idMenu'];

		$queryAmbilItem	= mysqli_query($connect,"SELECT * FROM `tb_item` WHERE id='$idMenu'") or die(mysqli_error($connect));
		$queryTampilItem = mysqli_fetch_array($queryAmbilItem);
		$stokawal = $queryTampilItem['stok'];
		$stok = $stokawal+$jml;

		echo "id : ".$id." idmenu : ".$idMenu." stok : ".$stokawal." qty : ".$jml." sisa : "."$stok";
		$queryUpdate = mysqli_query($connect,"UPDATE `tb_item` SET `stok` ='$stok' WHERE `tb_item`.`id` = '$idMenu';");
			// $queryReady	= mysqli_fetch_array($queryAmbil);
			// $stokAkhir	= $queryReady['stok']-$jumlah;

			// $queryUpdate = mysqli_query($connect, "UPDATE `tb_item` SET `stok` = '$stokAkhir' WHERE `tb_item`.`id` = '$idMenu';");


		@$id=$_POST['id'];
		mysqli_query($connect,"DELETE FROM `tbsimpansementara` WHERE  `tbsimpansementara`.`urut` = '$id' ")or die($connect);
		header('location:../index.php');
	}



	else if($table == "loaddata" ){
		mysqli_query($connect,"TRUNCATE `tbsimpansementara`")or die(mysqli_error($connect));
		@$id=$_POST['id'];

		mysqli_query($connect,"insert into tbsimpansementara (urut, nomeja, iddetailtransaksi, idMenu, harga, diskon, jumlahpembelian, total, tanggalpembelian, keterangan) 

			select urut, nomeja, iddetailtransaksi, idMenu, harga, diskon, jumlahpembelian, total, tanggalpembelian, keterangan from tb_detail_transaksi where iddetailtransaksi='$id'")or die(mysqli_error($connect));

		header('location:../index.php');	
		}



	else if($table == "tbsimpansementara") {

			$queryAmbil = mysqli_query($connect, "SELECT * FROM `tbsimpansementara` limit 1 ") or die(mysqli_error($connect));
			$queryTampil = mysqli_fetch_array($queryAmbil);

			if($queryTampil['iddetailtransaksi'] ==""){
				$iddetailtransaksi = date('YmdHis');
			}else {
				$iddetailtransaksi = $queryTampil['iddetailtransaksi'];
			}


			$queryAmbil	= mysqli_query($connect,"SELECT `id`, `stok`, `diskon` FROM `tb_item` WHERE `id` ='$idMenu'") or die(mysqli_error($connect));
			$queryTampil = mysqli_fetch_array($queryAmbil);
			$stok = $queryTampil['stok'];
			$stokAkhir	= $stok-$jumlah;

			// echo "stok : ".$stok." stokAkhir : ".$stokAkhir;
			
			$queryUpdate = mysqli_query($connect, "UPDATE `tb_item` SET `stok` = '$stokAkhir' WHERE `tb_item`.`id` = '$idMenu';");

			@$querysimpan=mysqli_query($connect,"INSERT INTO `tbsimpansementara` 
				(`urut`, `noMeja`, `iddetailtransaksi`, `idMenu`, `harga`, `jumlahPembelian`, `total`, `tanggalPembelian`)

			VALUES (NULL, '$nomeja', '$iddetailtransaksi','$idMenu', '$harga', '$jumlah', '$total', '$tanggalpembelian')");

			header('location:../index.php');
			
		}	

	else if($table == "simpanprint") { 
			//query check data tbsimpansementara 
			$queryAmbil = mysqli_query($connect,"SELECT * FROM `tbsimpansementara`")or die(mysqli_error($connect));
			$queryTampil = mysqli_fetch_array($queryAmbil);
				$iddetailtransaksi = $queryTampil['iddetailtransaksi'];

				
				mysqli_query($connect,"DELETE FROM `tb_detail_transaksi` WHERE `tb_detail_transaksi`.`iddetailtransaksi` = '$iddetailtransaksi'");

				mysqli_query($connect,"DELETE FROM `tb_transaksi` WHERE `tb_transaksi`.`iddetailtransaksi` = '$iddetailtransaksi'");

			$tanggalpembelian = date('Y-m-d'); //tgl
			$user = @$_SESSION['user_session'];

			$query = mysqli_query($connect,"insert into tb_detail_transaksi (urut, nomeja, iddetailtransaksi, idMenu, harga, diskon, jumlahpembelian, total, tanggalpembelian, keterangan) 

				select 'urut', '$nomeja', iddetailtransaksi, idMenu, harga, diskon, jumlahpembelian, total, '$tanggalpembelian', '1' from tbsimpansementara")or die(mysqli_error($connect));

			$query2 =mysqli_query($connect,"INSERT INTO `tb_transaksi` 
					(`idtransaksi`, `nonota`, `nomeja`, `iddetailtransaksi`, `totalpembelian`, `uangbayar`, `uangkembali`, `tglpembelian`, `jampembelian`, `jenispembelian`, `keterangan`, `ket`, `idlogin`) 
			VALUES (NULL, '$iddetailtransaksi', '$nomeja', '$iddetailtransaksi', '$totalitem', '$uangbayar', '$uangkembali', '$tanggalpembelian', '$jampembelian', '0', '1', '1', '$user');")or die(mysqli_error($connect));
				if($query){
					mysqli_query($connect,"TRUNCATE tbsimpansementara")or die($connect);?>
					<meta http-equiv="refresh" content="1; url=index.php">
					<?php }

	}else if($table=="simpanaja"){
		


		$queryAmbil = mysqli_query($connect, "SELECT * FROM `tbsimpansementara` limit 1 ") or die(mysqli_error($connect));
		$queryTampil = mysqli_fetch_array($queryAmbil);

		$iddetailtransaksi = $queryTampil['iddetailtransaksi'];

		mysqli_query($connect,"DELETE FROM `tb_detail_transaksi` WHERE `tb_detail_transaksi`.`iddetailtransaksi` = '$iddetailtransaksi'");

		mysqli_query($connect,"DELETE FROM `tb_transaksi` WHERE `tb_transaksi`.`iddetailtransaksi` = '$iddetailtransaksi'");


		@$query = mysqli_query(@$connect,"insert into tb_detail_transaksi (
				urut, 	nomeja, iddetailtransaksi, idMenu, harga, diskon, jumlahpembelian, total, tanggalpembelian, keterangan)
		select 'urut', '$nomeja', $iddetailtransaksi, idMenu, harga, diskon, jumlahpembelian, total, '$tanggalpembelian', '0' from tbsimpansementara")or die(mysqli_error($connect));

		$query2 =mysqli_query($connect,"INSERT INTO `tb_transaksi` 
		(`idtransaksi`, `nonota`, `nomeja`, `iddetailtransaksi`, `totalpembelian`, `uangbayar`, `uangkembali`, `tglpembelian`, `jampembelian`, `jenispembelian`, `keterangan`, `ket`, `idlogin`) 
		VALUES (NULL, '$iddetailtransaksi', '$nomeja', '$iddetailtransaksi', '$totalitem', '$uangbayar', '$uangkembali', '$tanggalpembelian', '$jampembelian', '0', '', '0', '$user');") or die(mysql_error($connect));
			if($query){
				mysqli_query($connect,"TRUNCATE tbsimpansementara")or die(mysql_error($connect));
				echo "<script> alert('Data telah disimpan sementara ')</script>";
				header('location:../index.php');
				}
	}

?>