<?php session_start();
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}
require"../../include/mysql.php";
require"../../include/common.func.php";
require"../../include/db.class.php";
require_once "../../cart.shop.php";
$db = new db($db_host, $db_user, $db_pass, $db_name);

$order_num = isset($_GET['order_num'])?html($_GET['order_num']):'';
$sqlka='select * from `'.$tablepre.'orders` where  order_num="'.$order_num.'"';
$resultka=$db->query($sqlka);
$rowka=$db->getrow($resultka);
if(!$rowka){msg('订单不存在','location="/m/"');}

$sql='select * from `'.$tablepre.'go_pay` where  pay_id=5';
$result=$db->query($sql);
$pay=$db->getrow($result);


$email = "921043084@qq.com";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付宝支付</title>
</head>
<?php

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");



/**************************调用授权接口alipay.wap.trade.create.direct获取授权码token**************************/
	
//返回格式
$format = "xml";
//必填，不需要修改

//返回格式
$v = "2.0";
//必填，不需要修改

//请求号
$req_id = date('Ymdhis');
//必填，须保证每次请求都是唯一

//**req_data详细信息**

//服务器异步通知页面路径
$notify_url = $url."m/ailpay/notify_url.php";
//需http://格式的完整路径，不允许加?id=123这类自定义参数

//页面跳转同步通知页面路径
$call_back_url = $url."m/ailpay/call_back_url.php";
//需http://格式的完整路径，不允许加?id=123这类自定义参数

//操作中断返回地址
$merchant_url = $url."m/pay/";
//用户付款中途退出返回商户的地址。需http://格式的完整路径，不允许加?id=123这类自定义参数

//卖家支付宝帐户
$seller_email = $email;
//必填

//商户订单号
$out_trade_no = $order_num;
//商户网站订单系统中唯一订单号，必填

//订单名称
$subject = $rowka['title'];
//必填

//付款金额
$total_fee = $rowka['pro_can2'];
//必填

//请求业务参数详细
$req_data = '<direct_trade_create_req><notify_url>' . $notify_url . '</notify_url><call_back_url>' . $call_back_url . '</call_back_url><seller_account_name>' . $seller_email . '</seller_account_name><out_trade_no>' . $out_trade_no . '</out_trade_no><subject>' . $subject . '</subject><total_fee>' . $total_fee . '</total_fee><merchant_url>' . $merchant_url . '</merchant_url></direct_trade_create_req>';
//必填

/************************************************************/

//构造要请求的参数数组，无需改动
$para_token = array(
		"service" => "alipay.wap.trade.create.direct",
		"partner" => trim($alipay_config['partner']),
		"sec_id" => trim($alipay_config['sign_type']),
		"format"	=> $format,
		"v"	=> $v,
		"req_id"	=> $req_id,
		"req_data"	=> $req_data,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestHttp($para_token);

//URLDECODE返回的信息
$html_text = urldecode($html_text);

//解析远程模拟提交后返回的信息
$para_html_text = $alipaySubmit->parseResponse($html_text);

//获取request_token
$request_token = $para_html_text['request_token'];


/**************************根据授权码token调用交易接口alipay.wap.auth.authAndExecute**************************/

//业务详细
$req_data = '<auth_and_execute_req><request_token>' . $request_token . '</request_token></auth_and_execute_req>';
//必填

//构造要请求的参数数组，无需改动
$parameter = array(
		"service" => "alipay.wap.auth.authAndExecute",
		"partner" => trim($alipay_config['partner']),
		"sec_id" => trim($alipay_config['sign_type']),
		"format"	=> $format,
		"v"	=> $v,
		"req_id"	=> $req_id,
		"req_data"	=> $req_data,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter, 'get', '确认');
echo $html_text;
?>
</body>
</html>