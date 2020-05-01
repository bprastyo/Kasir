<?php
 session_start(); // memulai session
 session_destroy($_SESSION['user_session']=$username_login); // menghapus session
 header("location:login.php"); // mengambalikan ke form_login.php
 ?>