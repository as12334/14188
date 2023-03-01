<?php 


class jubaopay {

 

	private $config;

	/**

	*	支付入口

	**/

	

	public function config($config=null){

			$this->config = $config;
			

	}

	

	public function send_pay(){

			$config = $this->config;
$url     = 'http://'.$_SERVER['SERVER_NAME']."/"; //网址	
			
$partnerid   = $config['id'];//合作身份者id
$payid       = $config['code'];
$amount      = $config['money'];
$payerName   = $_COOKIE['wuid'];//$_COOKIE['wuid']
$remark      = "";//$rowka['nopc']
$returnURL   = $url."m/jupay/result.php";
$callBackURL = $url."m/jupay/notify.php";
$payMethod   = "";
$goodsName   = $config['title'];

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

			$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";

			if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap')){
				header("location:/m/jupay/wapDemoPost.php?order_num=".$payid."&pprice=".$amount."&partnerid=".$partnerid."&pname=".$goodsName."");	
				
				}else{
				header("location:/m/jupay/pcDemoPost.php?order_num=".$payid."&pprice=".$amount."&partnerid=".$partnerid."&pname=".$goodsName."");	
				}	
	


	exit();	

	}



 }



?>