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

$message=$_GET["message"];

$signature=$_GET["signature"];

$jubaopay=new jubaopay('jubaopay/jubaopay.ini');

$jubaopay->decrypt($message);

// 校验签名，然后进行业务处理
$result=$jubaopay->verify($signature);


            $ua = strtolower($_SERVER['HTTP_USER_AGENT']);

			$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";

			if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap')){
				$urlwww = $url."/index.php/mobile/home/userbalance";
				
				}else{
				$urlwww = $url."/index.php/member/home/userbuylist";
				}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>支付结果</title>
	
</head>
<body>
    <style>
.wap-tips{ width: 230px; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 40%; left: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: -112px;opacity: 0.8; }
</style>
     
</body>
</html>
<?php 
if($result == 1) {
	
    $payid = $jubaopay->getEncrypt("payid");
    $mobile = $jubaopay->getEncrypt("mobile");
    $amount = $jubaopay->getEncrypt("amount");
    $remark = $jubaopay->getEncrypt("remark");
    $orderNo = $jubaopay->getEncrypt("orderNo");
    $state = $jubaopay->getEncrypt("state");
    $modifyTime = $jubaopay->getEncrypt("modifyTime");
    $partnerid = $jubaopay->getEncrypt("partnerid");
    $realReceive = $jubaopay->getEncrypt("realReceive");

$sqlka='select * from `'.$tablepre.'orders` where  order_num="'.$payid.'"';
$resultka=$db->query($sqlka);
$rowka=$db->getrow($resultka);

$sqldd='select * from `go_member_addmoney_record` where  code="'.$payid.'" ';
$resultdd=$db->query($sqldd);
$dingdaninfo=$db->getrow($resultdd);	


           


if($dingdaninfo){

	
	
	if(!$dingdaninfo || $dingdaninfo['status'] == '未付款'){

			msg('付款失败','location="'.$urlwww.'"');	

		}else{

			if(empty($dingdaninfo['scookies'])){

				msg('付款成功','location="'.$urlwww.'"');

			}else{

				if($dingdaninfo['scookies'] == '1'){

					msg('付款成功','location="'.$urlwww.'"');
					
					header("location:".$urlwww."");

				}else{
					
					msg('商品还未购买,请重新购买商品!','location="'.$urlwww.'"');

					

				}



			}

		}
	
	}else{
	//echo '<div class="wap-tips">付款失败</div>';
	msg('付款失败','location="'.$urlwww.'"');	
	}

}
?>