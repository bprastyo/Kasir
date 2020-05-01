<?php
@session_start();
	@include "session.php";
	include 'dist/koneksi.php';
?>
<div id="proses">
<form id="form1" method="post" >

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			Aplikasi Kasir
		</div>
		<div class="col-md-4">
			<a href="#popup">Laporan</a>||
			    <div id="popup">
			    	<div class="window">
			        	<a href="#" class="close-button" title="Close">Tutup</a>
			            <?php @include "INC/laporan.php";?>
			        </div>
			    </div>
			    Kasir : <?php echo @$_SESSION['user_session'];?> <a href="logout.php">Logout</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?php include "INC/tombolkiri.php";?>
		</div>
		<div class="col-md-4">
			<div align="center" id="hitung"><?php include "INC/atas.php";?></div>
			<div id="tampilmenu" align="center"><?php @include "INC/tampilmenu.php";?></div>
		</div>
		<div class="col-md-5">
			<div align="center" id="periksahitung"><?php @include"INC/hasilhitung.php";?></div>  
		</div>
	</div>
</div>

</form> 
</div> 
<!-- End ImageReady Slices -->
