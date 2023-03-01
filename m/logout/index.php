<?php
session_start();
require"../../conn.php";
if (isset($_COOKIE['wuid'])){
	setcookie("wuid", "", time()-3600);
	
}
msg('','location="'.$url.'/m/"');
?>