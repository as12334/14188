<?php 
session_start();
require"../../conn.php";
$act = isset($_GET['act'])?html($_GET['act']):'';
$reason = isset($_GET['reason'])?html($_GET['reason']):'';
$order_no = isset($_GET['order_no'])?html($_GET['order_no']):'';

if($act=="del"){
$db->execute('delete from `'.$tablepre.'orders` where `order_num`="'.$order_no.'"');
msg('','location="'.$url.'/m/order/"');
}elseif($act=="can"){
$sql='update `'.$tablepre.'orders` set `pass`="1",`nops`="'.$reason.'" where `order_num`="'.$order_no.'"';
$db->execute($sql);	
msg('','location="index.php?order_no='.$order_no.'"');
	}
	
?>