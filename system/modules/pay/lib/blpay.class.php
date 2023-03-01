<?php 



class blpay {

 

	private $config;

	/**

	*	支付入口

	**/

	

	public function config($config=null){

			$this->config = $config;

	}

	

	public function send_pay(){

			$config = $this->config;
			//支付方式无需修改
			$payment_type='1';
			
			//合作身份者pid
			$yun_config['partner']		= $config['id'];
			
			//安全检验码
			$yun_config['key']			= $config['key'];
			
			//斌亮会员账户（邮箱）
			$seller_email               = $config['pay_type_data']['user']['val'];
			
			include dirname(__FILE__).DIRECTORY_SEPARATOR."blpay".DIRECTORY_SEPARATOR."bl_md5.function.php";
			
			//商户订单号
			$out_trade_no = $config['code'];//商户网站订单系统中唯一订单号，必填
	
			//订单名称
			$subject = $config['title'];//必填
	
			//付款金额
			$total_fee = $config['money'];//必填 需为整数
	        //斌亮支付接口地址
			$url='http://www.hbblkj.com/index.php/index/index/xinzhifu';//必填 
			$anti_phishing_key='0';//超时时间戳 为空将做处理 不为空订单将在5秒后超时
			//订单描述
	
			$username = '0';//商户网站的自定义标识，原样返回

			$exter_invoke_ip=$_SERVER["REMOTE_ADDR"];//必要参数，不用修改
		//服务器异步通知页面路径
        $nourl = $config['NotifyUrl'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $reurl = $config['ReturnUrl'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
			
		
			//构造要请求的参数数组，无需改动
			$parameter = array(
					"partner" => trim($yun_config['partner']),
				//	"seller_email"	=> $seller_email,
					"out_trade_no"	=> $out_trade_no,
			//		"anti_phishing_key"	=> $anti_phishing_key,//超时时间戳
					"total_fee"	=> $total_fee,				
					"notify_url"	=> $nourl,
					"return_url"	=> $reurl,
			//	    "payment_type"	=> $payment_type,
			//		"payment_obj"	=> 1,
				    "exter_invoke_ip"	=> $exter_invoke_ip,
					"custom"=> 10
			);

			$key = $config['key'];//商户KEY
	      
	        $lsi=new Integration();
	        $lsi->init($key,$url);
			$html_text = $lsi->Send($parameter);
			echo $html_text;
			exit;

	

	}



 }



?>