<?php
session_start();
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}
require"../../include/mysql.php";
require"../../include/common.func.php";
require"../../include/db.class.php";
$db = new db($db_host, $db_user, $db_pass, $db_name);

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代

	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	
	//解密（如果是RSA签名需要解密，如果是MD5签名则下面一行清注释掉）
	$notify_data = decrypt($_POST['notify_data']);
	
    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
	
	//解析notify_data
	//注意：该功能PHP5环境及以上支持，需开通curl、SSL等PHP配置环境。建议本地调试时使用PHP开发软件
	$doc = new DOMDocument();
	$doc->loadXML($notify_data);
	
	if( ! empty($doc->getElementsByTagName( "notify" )->item(0)->nodeValue) ) {
		//商户订单号
		$out_trade_no = $doc->getElementsByTagName( "out_trade_no" )->item(0)->nodeValue;
		//支付宝交易号
		$trade_no = $doc->getElementsByTagName( "trade_no" )->item(0)->nodeValue;
		//交易状态
		$trade_status = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue;
		
		if($_POST['trade_status'] == 'TRADE_FINISHED') {
			
			$db->execute('update `'.$tablepre.'orders` set pass=2 where order_num='.$out_trade_no.'');
			//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
					
			//注意：
			//该种交易状态只在两种情况下出现
			//1、开通了普通即时到账，买家付款成功后。
			//2、开通了高级即时到账，从该笔交易成功时间算起，过了签约时的可退款时限（如：三个月以内可退款、一年以内可退款等）后。
	
			//调试用，写文本函数记录程序运行情况是否正常
			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			
			echo "success";		//请不要修改或删除
		}
		else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
			//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
					
			//注意：
			//该种交易状态只在一种情况下出现——开通了高级即时到账，买家付款成功后。
	
			//调试用，写文本函数记录程序运行情况是否正常
			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			
			echo "success";		//请不要修改或删除
		}
	}

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
?>