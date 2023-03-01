<?php session_start();
require"../../conn.php";
require_once "../../cart.class.php";
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}
	
	// 删除
if(isset($_GET['act'])&&!empty($_GET['act'])&&$_GET['act']=="del"&&!empty($_GET['id']))
{
	$cart->emptyItem($_GET['id']);
	msg('','location="'.$url.'m/cart/"');
	
	
}
// 清空
if(isset($_GET['act'])&&!empty($_GET['act'])&&$_GET['act']=="clean")
{
    $cart->emptyItem();
    msg('','location="'.$url.'m/"');
}
?>