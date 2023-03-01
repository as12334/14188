<?php

$order_num = isset($_GET['order_num'])?($_GET['order_num']):'';
$pname = isset($_GET['pname'])?($_GET['pname']):'';
$pprice = isset($_GET['pprice'])?($_GET['pprice']):'';
$partnerid = isset($_GET['partnerid'])?($_GET['partnerid']):'';

include 'jubaopay/jubaopay.php';

// 模拟创建号
function genPayId($length = 6 ) {

	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$password = "";
	for ( $i = 0; $i < $length; $i++ )
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];

	return $password;
}
$url     = 'http://'.$_SERVER['SERVER_NAME']."/"; //网址

$payid       = $order_num;
$amount      = $pprice;
$payerName   = $_COOKIE['wuid'];//$_COOKIE['wuid']
$remark      = "";//$rowka['nopc']
$returnURL   = $url."m/jupay/result.php";
$callBackURL = $url."m/jupay/notify.php";
$payMethod   = "";
$goodsName   = $pname;//$rowka['title']

//////////////////////////////////////////////////////////////////////////////////////////////////
 //商户利用支付订单（payid）和商户号（mobile）进行对账查询
$jubaopay=new jubaopay('jubaopay/jubaopay.ini');
$jubaopay->setEncrypt("payid", $payid);
$jubaopay->setEncrypt("partnerid", $partnerid);
$jubaopay->setEncrypt("amount", $amount);
$jubaopay->setEncrypt("payerName", $payerName);
$jubaopay->setEncrypt("remark", $remark);
$jubaopay->setEncrypt("returnURL", $returnURL);
$jubaopay->setEncrypt("callBackURL", $callBackURL);
$jubaopay->setEncrypt("goodsName", $goodsName);
//$jubaopay->setEncrypt("payMethodChannels", "ll");
//$jubaopay->setEncrypt("payType", "credit_express");
//$jubaopay->setEncrypt("bankCode", "CMBCHINA");

//对交易进行加密=$message并签名=$signature
$jubaopay->interpret();
$message=$jubaopay->message;
$signature=$jubaopay->signature;
//将message和signature一起aPOST到聚宝支付

?>
<form method="post" action="http://www.jubaopay.com/apiwapsyt.htm" id="payForm">
	<!-- 正式环境 action="https://www.jubaopay.com/apiwapsyt.htm" -->
	<input type="hidden" name="message" value="<?php echo $message;?>">
	<input type="hidden" name="signature" value="<?php echo $signature;?>">
</form>

<script type="text/javascript">
    document.getElementById('payForm').submit();
</script>