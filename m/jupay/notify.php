<?php
session_start();

require"../../include/mysql.php";
require"../../include/common.func.php";
require"../../include/db.class.php";
if (isset($_COOKIE['wuid'])!=1){
	//	msg('','location="'.$url.'/?/mobile/user/login"');
	}

$db = new db($db_host, $db_user, $db_pass, $db_name);

include 'jubaopay/jubaopay.php';

$message=$_POST["message"];
$signature=$_POST["signature"];

$jubaopay=new jubaopay('jubaopay/jubaopay.ini');

$jubaopay->decrypt($message);
// 校验签名，然后进行业务处理
$result=$jubaopay->verify($signature);
if($result==1) {
	$payid = $jubaopay->getEncrypt("payid");
	
$sqlka='select * from `'.$tablepre.'orders` where  order_num="'.$payid.'"';
$resultka=$db->query($sqlka);
$rowka=$db->getrow($resultka);


$sqldd='select * from `go_member_addmoney_record` where  code="'.$payid.'"  and `status` = "未付款"';
$resultdd=$db->query($sqldd);
$rowdd=$db->getrow($resultdd);	

if(!$rowdd){	echo "verify failed";exit;}	//没有该订单,失败

//if($rowka){
	 $payids = $db->execute('update `orders` set `pass` = 2 where order_num="'.$payid.'"');
	 if($payids){
	 echo "success";
	 }
//}elseif($rowdd){

 $c_money = $rowdd['money'];
	
	$uid  = $rowdd['uid'];
	
	$time = time();
	
	$id   = $rowdd['id'];
	
	    $up_q1 = $db->execute('update `go_member_addmoney_record` set `pay_type` = "聚宝支付", `status` = "已付款",`scookies` = "1" where code="'.$payid.'"');
		
	    $up_q2 = $db->execute('update `go_member` set `money` = `money` + "'.$c_money.'" where uid="'.$uid.'"');

			

		$up_q3 = $db->execute('INSERT INTO `go_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ("'.$uid.'", "1", "账户", "充值", "'.$c_money.'", "'.$time.'")');
		
		//$up_q4 = $this->db->Query('UPDATE `go_member_addmoney_record` SET `scookies` = "1" where `code` = "'.$payid.'" and `status` = "已付款"');
		
		
		if($up_q1 && $up_q2 && $up_q3){

					echo "success"; 

				}else{

					

					echo "verify failed";exit;

				}
}
//}
?>