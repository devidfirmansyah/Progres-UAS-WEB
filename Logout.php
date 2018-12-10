<?php
// mengaktifkan session php
session_start();
// menghapus semua session
session_destroy();
session_unset();

setcookie('ID','',time()-3600);
setcookie('key','',time()-3600);

header("Location:Login.php");
exit;
?>
