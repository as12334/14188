<?php 

defined('G_IN_SYSTEM')or exit('No permission resources.');

ini_set("display_errors","OFF");

class blpay_url extends SystemAction {
    
	private $out_trade_no;
	private $total_fee;
	
	public function __construct(){			

		$this->db=System::load_sys_class('model');		

	} 	

	

	private function qiantais(){	

		    $out_trade_no = $this->out_trade_no;
          
			$dingdaninfo = $this->db->GetOne("select * from `@#_member_addmoney_record` where `code` = '$out_trade_no'");		

			$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

			$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";

			if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap')){

			if(!$dingdaninfo || $dingdaninfo['status'] == '未付款'){

				_messagemobile("支付失败");			

			}else{

			if(empty($dingdaninfo['scookies'])){
             
				_messagee("充值成功!<a href=".WEB_PATH."/mobile/home/userbalance>查看账户明细</a>");
              
			}else{

				if($dingdaninfo['scookies'] == '1'){					 

					header("location: ".WEB_PATH."/mobile/cart/paysuccess");

				}else{

					_messagemobile("商品还未购买,请!<a href=".WEB_PATH."/member/cart/cartlist>返回购物车</a>重新购买商品");

				}					

			}

		}

	  

	  }else{

	   	if(!$dingdaninfo || $dingdaninfo['status'] == '未付款'){

			_message("支付失败");			

		}else{

			if(empty($dingdaninfo['scookies'])){
                 
				_message("充值成功!",WEB_PATH."/member/home/userbalance");
              
			}else{

				if($dingdaninfo['scookies'] == '1'){

					_message("支付成功!",WEB_PATH."/member/cart/paysuccess");

				}else{

					_message("商品还未购买,请重新购买商品!",WEB_PATH."/member/cart/cartlist");

				}					

			}

		}
	  }
	}

	//Notify
	
	public function houtai(){
		   
		//file_put_contents("alipay.txt",var_export($_POST,true));		
	    include G_SYSTEM."modules/pay/lib/blpay/bl_md5.function.php";	
		
		$pay_type =$this->db->GetOne("SELECT * from `@#_pay` where `pay_class` = 'blpay' and `pay_start` = '1'");

		$pay_type_key = unserialize($pay_type['pay_key']);

		$key =  $pay_type_key['key']['val'];		//支付KEY

		$id =  $pay_type_key['id']['val'];		//支付商号ID	
		
		$user =  $pay_type_key['user']['val'];		//云支付账号	
		
		$out_trade_no=$_POST['out_trade_no'];
        $total_fee=$_POST['total_fee']; 
        $trade_status=$_POST["trade_status"];
	    $custom=$_POST['custom'];
		$sign=$_POST['sign'];
		$apay=array(
                "out_trade_no"=>$out_trade_no,
                "total_fee"=>$total_fee,
                "trade_status"=>$trade_status,
				"sign"=>$sign,
				"custom"=>$custom			  
					);
		$l=new run();			
		$y=$l->index($apay,$key);
		//计算得出通知验证结果

		if($y!==false){//验证成功
			
			//商户订单号
			$out_trade_no = $out_trade_no;
			
			//价格
			$yunprice=$total_fee;
			
			$this->out_trade_no = $out_trade_no;	
			$this->total_fee = $total_fee;
			if(!$out_trade_no){
				echo "fail";exit;	
			}
			
			$ret = $this->blpay_chuli();
			if($ret == '已付款' || $ret == '充值完成' || $ret == '商品购买成功'){
				echo 'success';exit;

			}
			if($ret == '充值失败' || $ret == '商品购买失败'){
				echo "fail";exit;
			}
				

		}
		else {
			//验证失败
			echo "fail";
		}


	}//function end

	public function qiantai(){
		//file_put_contents("alipay.txt",var_export($_POST,true));		
	    include G_SYSTEM."modules/pay/lib/blpay/bl_md5.function.php";	
		
		$pay_type =$this->db->GetOne("SELECT * from `@#_pay` where `pay_class` = 'blpay' and `pay_start` = '1'");

		$pay_type_key = unserialize($pay_type['pay_key']);

		$key =  $pay_type_key['key']['val'];		//支付KEY

		$id =  $pay_type_key['id']['val'];		//支付商号ID	
		
		$user =  $pay_type_key['user']['val'];		//斌亮支付账号
		
		//计算得出通知验证结果
		
		$out_trade_no=$_GET['out_trade_no'];
        $total_fee=$_GET['total_fee']; 
        $trade_status=$_GET["trade_status"];
	    $custom=$_GET['custom'];
		$sign=$_GET['sign'];
		
		$apay=array(
                "out_trade_no"=>$out_trade_no,
                "total_fee"=>$total_fee,
                "trade_status"=>$trade_status,
				"sign"=>$sign,
				"custom"=>$custom
					);
		$l=new run();			
		$y=$l->index($apay,$key);
		//计算得出通知验证结果

		if($y!==false){//验证成功
			
			//商户订单号
			$out_trade_no = $out_trade_no;
			
			//价格
			$yunprice=$total_fee;
			/*
			加入您的入库及判断代码;
			判断返回金额与实金额是否想同;
			判断订单当前状态;
			完成以上才视为支付成功
			i1=1&i2=C14229652567669228&i3=a335e07deab871cb2ab00e86d62358cb&i4=1iIoXYfwCoWm%2BErGbsM8zL5HmBwPcvsf9cI
			*/
			$this->out_trade_no = $out_trade_no;
			$this->total_fee = $total_fee;
				
			if(!$out_trade_no){
				_messagemobile("返回参数错误1");
				exit;
			}
			
			//$ret = $this->blpay_chuli();					
			$this->qiantais();
			exit;
				

		}
		else {
			//验证失败
			_messagemobile("返回参数错误2");
			exit();
		}


	}//function end
	
	
	
	
	
	
	private function blpay_chuli(){

		$pay_type =$this->db->GetOne("SELECT * from `@#_pay` where `pay_class` = 'blpay' and `pay_start` = '1'");

		$out_trade_no = $this->out_trade_no;
		
		$total_fee = $this->total_fee;

		$dingdaninfo = $this->db->GetOne("select * from `@#_member_addmoney_record` where `code` = '$out_trade_no'");

		if(!$dingdaninfo){ return false;}	//没有该订单,失败
		
		if($dingdaninfo['money'] != $total_fee){

			return false;

		}

		if($dingdaninfo['status'] == '已付款'){

			return '已付款';

		}

		$c_money = intval($dingdaninfo['money']);

		$uid = $dingdaninfo['uid'];

		$time = time();

		

		$this->db->Autocommit_start();

		$up_q1 = $this->db->Query("UPDATE `@#_member_addmoney_record` SET `pay_type` = '云支付', `status` = '已付款' where `id` = '$dingdaninfo[id]' and `code` = '$dingdaninfo[code]'");
       
		$up_q2 = $this->db->Query("UPDATE `@#_member` SET `money` = `money` + $c_money where (`uid` = '$uid')");			

		$up_q3 = $this->db->Query("INSERT INTO `@#_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ('$uid', '1', '账户', '充值', '$c_money', '$time')");

		if($up_q1 && $up_q2 && $up_q3){

			$this->db->Autocommit_commit();			

		}else{

			$this->db->Autocommit_rollback();

			return '充值失败';

		}			

		if(empty($dingdaninfo['scookies'])){					

			return "充值完成";	//充值完成	

		}

		

		$scookies = unserialize($dingdaninfo['scookies']);			

		$pay = System::load_app_class('pay','pay');		

		$pay->scookie = $scookies;

		$ok = $pay->init($uid,$pay_type['pay_id'],'go_record');	//云购商品	

		if($ok != 'ok'){

			$_COOKIE['Cartlist'] = '';_setcookie('Cartlist',NULL);			

			return '商品购买失败';	//商品购买失败			

		}		



		$check = $pay->go_pay(1);

		if($check){

			$this->db->Query("UPDATE `@#_member_addmoney_record` SET `scookies` = '1' where `code` = '$out_trade_no' and `status` = '已付款'");

			$_COOKIE['Cartlist'] = '';_setcookie('Cartlist',NULL);

			return "商品购买成功";

		}else{

			return '商品购买失败';

		}			



	}

	

}//



?>