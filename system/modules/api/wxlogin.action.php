<?php

defined('G_IN_SYSTEM')or exit("no");
include_once dirname(__FILE__).'/lib/qq/qqConnectAPI.php';


		 
		
class wxlogin extends SystemAction {
	
	private $qc;
	private $db;
	private $qq_openid;
	private $config;
	public function __construct(){
	
		$this->qq_header();
		$this->qc = new QC();
		$this->db = System::load_sys_class("model");
		$this->config = System::load_app_config("connect");
		
	}
	
	private function qq_header(){
		$member_db=System::load_app_class('base','member');
		$memberone=$member_db->get_user_info();
		if($memberone){			
			$domain = System::load_sys_config('domain');	
			if(isset($domain[$_SERVER['HTTP_HOST']])){
				if($domain[$_SERVER['HTTP_HOST']]['m'] == 'mobile'){
					header("Location:".WEB_PATH."/mobile/home");exit;
				}else{
					header("Location:".WEB_PATH."/member/home");exit;				
				}	
				
			}	
		}	
	
	}

	
	//wx登录
	public function init(){
		$config = $this->config['weixin'];
		$appid =  $config['id'];
		$curl = WEB_PATH."/api/wxlogin/callback"; 
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$curl.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';  
		
        header("Location:".$url);
	}
	
	//qq回调
	public function callback(){	
        $config = System::load_app_config("connect");
		$config = $config['weixin'];
		$appid =  $config['id']; 
		$secret = $config['key'];
		
		$yid = $this->segment(4);
	    $yid=!empty($yid) ? $yid : $_COOKIE['yaoqingid'];
	    setcookie("yaoqingid", $yid, time()+3600);
	
	    $yaoqing = base64_decode($yid);	
		
		include_once 'oauth.php';
		
	   /* 获取会员登录来源*/	
	$mystring=strtolower(($_SERVER['HTTP_USER_AGENT']));
$window="window";
$ipod="ipod";
$iphone="iphone";
$android="android";
$iPad="iPad";
$getType="";
$pc = strstr($mystring, $window);
  if($pc){$getType="pc";}
  $ipod = strstr($mystring, $ipod);
  if($ipod){$getType="ipod";}
  $iphone = strstr($mystring, $iphone);
  if($iphone){$getType="iphone";}
  $android = strstr($mystring, $android);
  if($android){$getType="android";}
  $iPad = strstr($mystring, $iPad);
  if($iPad){$getType="iPad";}
	/* 获取会员登录来源*/	
			
		
			
		$go_user_info = $this->db->GetOne("select * from `@#_member_band` where `b_code` = '$openid' and `b_type` = 'weixin' LIMIT 1");
		
		$wuid = intval($go_user_info['b_uid']);
		$go_member_info = $this->db->GetOne("select uid from `@#_member` where `uid` = '$wuid' LIMIT 1");
		
		if(!$go_user_info){	
		/* 添加新会员*/	
		   include_once 'add.php';
		
			
		}else{		
			
			if(!$go_member_info){
				//$this->db->Query("DELETE FROM `@#_member_band` WHERE `b_uid` = '$uid'");
				
				/* 添加新会员*/
				 include_once 'add.php';
		        /* 添加新会员end*/
			}else{		
			/* 更新会员*/
			 include_once 'edit.php';
				
			}
		}
	}

//下载头像
    public function saveimage($url) {
        if (function_exists('curl_init')) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FAILONERROR, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $content = curl_exec($curl);
            curl_close($curl);
        } else {
            $content = @file_get_contents($url);
        }
        $dir = "touimg/" . date("Ymd") . '/';
        $date_dir = G_UPLOAD . '/' . $dir;
        //echo $date_dir;exit;

        (!is_dir($date_dir)) && @mkdir($date_dir, 0777, true);
        $file_name = uniqid() . '';
        $file_path = $date_dir . $file_name . '.jpg';
        if (!empty($content) && @file_put_contents($file_path, $content) > 0) {
            System::load_sys_class('upload', 'sys', 'no');
            upload::thumbs(160, 160, false, $file_path);
            upload::thumbs(80, 80, false, $file_path);
            upload::thumbs(30, 30, false, $file_path);
            return $dir . $file_name . '.jpg';
        }
        return 'photo/member.jpg';
    }	
	
	public function wx_set_config(){
		System::load_app_class("admin",G_ADMIN_DIR,'no');
		$objadmin = new admin();		
		$config = System::load_app_config("connect");
		if(isset($_POST['dosubmit'])){
			$wx_off = intval($_POST['type']);
			$wx_id = $_POST['id'];
			$wx_key = $_POST['key'];
			$config['weixin'] = array("off"=>$wx_off,"id"=>$wx_id,"key"=>$wx_key);
			$html = var_export($config,true);
			$html = "<?php return ".$html."; ?>";
			$path =  dirname(__FILE__).'/lib/connect.ini.php';
			if(!is_writable($path)) _message('Please chmod  connect.ini.php  to 0777 !');
			$ok=file_put_contents($path,$html);
			_message("配置更新成功!");
		}	
	
		$config = $config['weixin'];		
		include $this->tpl(ROUTE_M,'wx_set_config');
	}

	
}

?>