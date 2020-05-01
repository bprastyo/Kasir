<?php
@session_start();
@include ("dist/koneksi.php");
?>
<link href="dist/bootstrap.css" rel="stylesheet" type="text/css" />
<body style="background-image:url(images/backgroun.jpg); background-repeat:no-repeat; background-size:cover;
			background-attachment: fixed;"><br />
<div class="container">
	<div class="row">
    	<div class="col-md-4">
			<form method="post" action="" name="form">
        	<div class="jumbotron">
            	<div class="form-group">
                	<div>User ID</div>
                  	<div class="form-group"> <input type="text" class="form-control" id="user_login"  name="user_login" placeholder="User ID" required="required" autofocus="autofocus" maxlength="50" /></div>
                    <div> Password</div>
                    <div class="form-group"> <input type="password" class="form-control" id="pass_login" name="pass_login" placeholder="password" required="required"/></div>
                    <div> <input type="submit" class="btn btn-block" value="Masuk" name="masuk" maxlength="50"></div>
                </div>
            </div>
			</form>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
				<?php
				  if(@$_POST['masuk']){
					  $username_login= mysqli_real_escape_string($connect, trim($_POST['user_login']));
					  $password_login= mysqli_real_escape_string($connect, trim($_POST['pass_login']));
					  $akses="0";

					  @$a=mysqli_query($connect,"SELECT * from tb_user where username='$username_login' AND password='$password_login' AND keterangan='1'") or die (mysqli_error($connect));
					  $cek=mysqli_fetch_array($a);
					  $status=$cek['jenis_user'];
				//echo $cek;
						if ($cek>=1) {
						$_SESSION['user_session']=$username_login;
							echo("<script>document.location='index.php';</script>");
						}else{
							echo "Username / Password Salah";
						}
				}
				?>
		</div>
	</div>
</div>
</body>