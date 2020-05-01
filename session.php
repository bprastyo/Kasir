<?php
@session_start();
if((!$_SESSION['user_session'])){ //!$_SESSION jika sesi tidak ada auto redirect ke login.php	
echo"<meta http-equiv='refresh' content='0;url=login.php'>";
exit;
}
?>
