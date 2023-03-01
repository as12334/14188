<?php 

defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base',null,'no');
System::load_app_fun('user','go');
System::load_app_fun('my','go');
System::load_sys_fun('send');
class user extends base {
	public function __construct(){	
		parent::__construct();
		$this->db = System::load_sys_class("model");
	
	}
	

	public function cook_end(){
		_setcookie("wuid","",time()-3600);
		_setcookie("uid","",time()-3600);
		_setcookie("ushell","",time()-3600);	
		header("Location:".WEB_PATH);	
		//_message("退出成功",WEB_PATH);
	}
	
	function LotteryLeave(){
		$shoplist = $this->db->GetOne("select * from `@#_shoplist` where `q_showtime` = 'Y' and `q_uid` is not null and `renqipos` != 1 order by id desc");
		$uid      =  $shoplist['q_uid'];
		$code     =  $shoplist['q_user_code'];
		
		
		$member   = $this->db->GetOne("select * from `@#_member` where `uid` = '$uid' ");
		$mobile   = $member['mobile'];
		

		 if($shoplist){	
		 if($member){				
		$template = $this->db->GetOne("select * from `@#_caches` where `key` = 'template_mobile_shop'");
		
		if(!$template){
			$template = array();
			$content =  "你在"._cfg("web_name")."够买的商品已中奖,中奖码是:".$code;
		}	
		if(empty($template['value'])){
			$content =  "你在"._cfg("web_name")."够买的商品已中奖,中奖码是:".$code;
		}else{
			if(strpos($template['value'],"00000000") == true){
					$content= str_ireplace("00000000",$code,$template['value']);
			}else{
					$content = $template['value'].$code;
			}
		}
		$this->db->Query("UPDATE `@#_shoplist` SET `renqipos`=1  where `q_uid` = '$uid'");
		//return _sendmobile($mobile,$content);
		echo _sendmobile($mobile,$content);
		/*
	$webname=_cfg("web_name");
	$content =  "【".$webname."】".$content;
	$memberMobcode = $this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	   $ch = curl_init();
       $timeout = 20;
	   
	   $account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $sendurl = $memberMobcode['url'];    
        //有些curl版本的post这样的数据格式
        $post_data = "account=".$account."&pswd=".$pswd."&mobile=".$mobile."&msg=".$content."&needstatus=true&product=";    
        
        
      curl_setopt ($ch, CURLOPT_URL, $sendurl);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);        
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       //post数据
      curl_setopt($ch, CURLOPT_POST, 1);
       //post的变量
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);   
      $file_contents = curl_exec($ch);
      curl_close($ch);  
	  // echo  "20320032032000,0 43290390903030";
 	  echo $file_contents;
	  $this->db->Query("UPDATE `@#_shoplist` SET `renqipos`=1  where `q_uid` = '$uid'");
	  */
	  
	 } }
}

	//新后台增登录doajax
	public function adminajax(){
		$action=$_GET['action'];
		$username=$_GET['username'];
		$password=$_GET['password'];
		$decode=md5(strtoupper($_GET['decode']));
		$info=$this->db->GetOne("SELECT * FROM `@#_admin` WHERE `username` = '$username' LIMIT 1");		
			if(empty($username)){echo "请输入用户名";exit;}
			if(empty($password)){echo "请输入密码";exit;}	
			if(!$info){echo "登录失败,请检查用户名或密码!";exit;}
			if($info['userpass']!=md5($password)){echo "密码不对!";exit;}	
			
			//加入验证码
		$codeauto = _cfg("code_admin_off");
			if($codeauto==1)	{
			   
			if($decode!=_getcookie('checkcode'))	{
				echo "验证码错误";exit();
			}	
			}
			
		//加入验证码   
				
		if($action=="login_user"){
			    _setcookie("auid",($info['uid']),60*60*24*7);
			  	_setcookie("AID",_encrypt($info['uid'],'ENCODE'));
				_setcookie("ASHELL",_encrypt(md5($info['username'].$info['userpass']).md5($_SERVER['HTTP_USER_AGENT'])));				
				$this->AdminInfo=$info;
				$time=time();$ip=_get_ip();
				$this->db->Query("UPDATE `@#_admin` SET `logintime`='$time' WHERE (`uid`='$info[uid]')");
				$this->db->Query("UPDATE `@#_admin` SET `loginip`='$ip' WHERE (`uid`='$info[uid]')");
				echo 1000;
							}
			
		
	}
	//新增登录doajax
	public function pcAjax(){	

	

		$user = $this->userinfo;
		$action=$_GET['action'];
		$username=$_GET['username'];
		$password=md5($_GET['password']);
		
		
		if($action=="login_user")	{
				if(strpos($username,'@')==false){
				//手机				
				$logintype='mobile';
				if(!_checkmobile($username)){
					echo ("手机格式不正确!");
				}				
			}else{
				//邮箱
				$logintype='email';
				if(!_checkemail($username)){
					echo ("邮箱格式不正确!");
				}
			}
					
		$member=$this->db->GetOne("select * from `@#_member` where `$logintype`='$username'");
		
		$member1=$this->db->GetOne("select * from `@#_member` where `mobile`='$username' and auto_user=0");
		
			if(!$member){
				echo ("帐号不存在!");exit();
			}elseif($member['password']!=$password){
				echo ("密码不对!");exit();
			
			}else{
				echo 1000;
				$time = time();
				$user_ip = _get_ip_dizhi();
				
				if($member1){
				$this->db->GetOne("UPDATE `@#_member` SET `user_ip` = '$user_ip',`login_time` = '$time' where `uid` = '$member[uid]'");
				}
				_setcookie("wuid",($member['uid']),60*60*24*7);
				_setcookie("uid",_encrypt($member['uid']),60*60*24*7);			
				_setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['mobile'].$member['email'])),60*60*24*7);
				
				}
		
		}
	}
	//ajax end
	//关闭发送验证码
	public function regAjax0(){
		
		$yid = $this->segment(4);
	$yid=!empty($yid) ? $yid : $_COOKIE['yaoqingid'];
	setcookie("yaoqingid", $yid, time()+3600);
	
	$yaoqing = base64_decode($yid);	
	
	$config_email = System::load_sys_config("email");
		$config_mobile = System::load_sys_config("mobile");
		$regconfig = System::load_app_config("user_reg_type","",ROUTE_M);
	if($this->userinfo){		
			header("Location:".WEB_PATH."/");exit;
		}
	
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

		$user = $this->userinfo;
		$action=$_GET['action'];
		$username=$_GET['username'];
		$password=md5($_GET['password']);
		$repassword=md5($_GET['repassword']);
		$decode=md5(strtoupper($_GET['decode']));
		$user_ip = _get_ip_dizhi();
		$time = time();
		$mobcode = rand(100000,999999);
		$regtype=null;
		
		$ip = _get_ip();
		$member_reg_nums = $this->db->GetNum("SELECT uid FROM `@#_member` where  `user_ip` LIKE '%$ip%'");
	//	if($member_reg_nums >= 1){$regcode = '';}else{$regcode = $this->segment(4);}
			
		if($action=="login_user")	{
			
			if($password!=$repassword){
				echo ("两次密码不一致!");exit();
				
			}
			$memberyes=$this->db->GetOne("select * from `@#_member` where `mobile`='$username'");
			if($memberyes){
				echo ("该手机号已经被注册了!");exit();
				
			}
			//加入验证码
		$codeauto = _cfg("code_member_off");
			if($codeauto==1)	{
			   
			if($decode!=_getcookie('checkcode'))	{
				echo "验证码错误";exit();
			}	
			}
			
		//加入验证码   
		
		
		//随机图片   
			 $hostdir = $_SERVER['DOCUMENT_ROOT']."/statics/uploads/member/";

             $filesnames = scandir($hostdir);
 
             $photoall = count($filesnames)-1;
			 
             $photonum = rand(1,$photoall);	
			 
             $photonums =   $filesnames[$photonum]; 
			 
			 if($photoall>0){
			$img = "member/".$photonums;
			}else{
		    $img = "photo/member.jpg";
			}
 			//随机图片 
		 
				$day_time = strtotime(date("Y-m-d"));	
				$member_reg_num = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `user_ip` LIKE '%$ip%'");								
				if($member_reg_num > $regconfig['reg_num']){
					echo ("您今日注册会员数已经达到上限！");exit();
				}else{
			$sql="INSERT INTO `@#_member`(mobile,password,user_ip,img,emailcode,mobilecode,passcode,reg_key,yaoqing,time,getType,num)VALUES('$username','$password','$user_ip','$img','-1','1','1','$username','$yaoqing','$time','$getType','1')";
				$sqlreg = $this->db->Query($sql);
			 $member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");	
			 
			 //注册获得微积分	
		$uid = $member['uid'];
		$fili_cfg = System::load_app_config("user_fufen");
		$userreg = $this->db->GetOne("select * from `@#_member_account` where `uid` = '$uid' and `content` = '注册获得微积分'"); 	
		
		
		if(!$userreg){
		
					
							if($fili_cfg['u_reg']){							
								$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','1','微积分','注册获得微积分','$fili_cfg[u_reg]','$time')");
								$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$fili_cfg[u_reg]' where uid='$uid'");
							}	
		}
		//注册获得微积分	
		
		//邀请获得微积分
		if($member['yaoqing']){
				
				$yaoqinguid = $member['yaoqing'];
				//福分、经验添加
				if($fili_cfg['f_visituser']){
					$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$yaoqinguid','1','微积分','邀请好友奖励','$fili_cfg[f_visituser]','$time')");
				}				
				$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$fili_cfg[f_visituser]',`jingyan`=`jingyan`+'$fili_cfg[z_visituser]' where uid='$yaoqinguid'");
			}	
		//邀请获得微积分
		//APP下载注册即送5元体验金
		$urls = $_SERVER['HTTP_HOST'];
		$getType = $member['getType'];
		$moneyapp = 5;
		$userapp = $this->db->GetOne("select * from `@#_member_account` where `uid` = '$uid' and `content` = 'APP下载注册体验金'"); 	
		
		if($getType!="pc"){
		 if($urls=="app.58woaiduobao.com"){
		   if(!$userapp){
		    
					
													
								$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','1','帐户','APP下载注册体验金','$moneyapp','$time')");
								$this->db->Query("UPDATE `@#_member` SET `money`=`money`+'$moneyapp' where uid='$uid'");
		  }
		}
		}
		//APP下载注册即送5元体验金
		    _setcookie("wuid",($member['uid']),60*60*24*7);	 
			_setcookie("uid",_encrypt($member['uid']),60*60*24*7);
		    _setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['mobile'].$member['email'])),60*60*24*7);
			if($sqlreg){echo 1000;}else{echo ("您今日注册会员数已经达到上限！");exit();}
				
				
				}
		}
	}
	
	
	
	//开启发送验证码 新增注册doregajax 第一次发送
	public function regAjax(){	
    $yid = $this->segment(4);
	$yid=!empty($yid) ? $yid : $_COOKIE['yaoqingid'];
	setcookie("yaoqingid", $yid, time()+3600);
	
	$yaoqing = base64_decode($yid);
	
	
	$config_email = System::load_sys_config("email");
		$config_mobile = System::load_sys_config("mobile");
		$regconfig = System::load_app_config("user_reg_type","",ROUTE_M);
	if($this->userinfo){		
			header("Location:".WEB_PATH."/");exit;
		}
	
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

		$user = $this->userinfo;
		$action=$_GET['action'];
		$username=$_GET['username'];
		$password=md5($_GET['password']);
		$repassword=md5($_GET['repassword']);
		$decode=md5(strtoupper($_GET['decode']));
		$user_ip = _get_ip_dizhi();
		$time = time();
		$mobcode = rand(100000,999999);
		$regtype=null;
		$codetype=$regtype.'code';
		
		$ip = _get_ip();
		$member_reg_nums = $this->db->GetNum("SELECT uid FROM `@#_member` where  `user_ip` LIKE '%$ip%'");
	//	if($member_reg_nums >= 1){$yaoqing = '';}
			
		if($action=="login_user")	{
			
			if($password!=$repassword){
				echo ("两次密码不一致!");exit();
				
			}
			$memberyes=$this->db->GetOne("select * from `@#_member` where `mobile`='$username'");
			if($memberyes){
				echo ("该手机号已经被注册了!");exit();
				
			}
			//加入验证码
		$codeauto = _cfg("code_member_off");
			if($codeauto==1)	{
			   
			if($decode!=_getcookie('checkcode'))	{
				echo "验证码错误";exit();
			}	
			}
			
		//加入验证码    
				$day_time = strtotime(date("Y-m-d"));	
				$member_reg_num = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `user_ip` LIKE '%$ip%'");								
				if($member_reg_num >= $regconfig['reg_num']){
					echo ("您今日注册会员数已经达到上限！");exit();
				}else{
			$member_reg_code1 = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `num` >= '1' and `reg_key` = '$username'");
			//if($member_reg_code1 >= 1){echo ("操作太频繁！ 请稍后");exit();}
			
			
				$member_reg_code = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `num` > '3' and `reg_key` = '$username'");
				
		     $member=$this->db->GetOne("select * from `@#_member` where `reg_key` = '$username'");
			 $imgnum = rand(1,160);
			 
			//随机图片   
			 $hostdir = $_SERVER['DOCUMENT_ROOT']."/statics/uploads/member/";

             $filesnames = scandir($hostdir);
 
             $photoall = count($filesnames)-1;
			 
             $photonum = rand(1,$photoall);	
			 
             $photonums =   $filesnames[$photonum]; 
			 
			 if($photoall>0){
			$img = "member/".$photonums;
			}else{
		    $img = "photo/member.jpg";
			}
 			//随机图片  
		
		
			if(!$member){
			$sql="INSERT INTO `@#_member`(password,user_ip,img,emailcode,mobilecode,passcode,reg_key,yaoqing,time,getType,num)VALUES('$password','$user_ip','$img','-1','$mobcode','1','$username','$yaoqing','$time','$getType','1')";
				$sqlreg = $this->db->Query($sql);
				
				}else{
					if($member_reg_code >= 1){
						
						$this->db->GetOne("UPDATE `@#_member` SET `num` = num + '1',`mobilecode` = '$mobcode' where `reg_key` = '$username'");
						}else{
							
							$this->db->GetOne("UPDATE `@#_member` SET `num` = 1,`mobilecode` = '$mobcode' where `reg_key` = '$username'");
					
					}
					}
			    $webname=$this->_cfg['web_name_two'];//签名不可删除
				
				//模板设置
				$template = $this->db->GetOne("select * from `@#_caches` where `key` = 'template_mobile_reg'");
	
		if(!$template){
			$content = "您好,您的注册验证码是:".$mobcode."如非本人操作，可不用理会！";
		}	
		if(empty($template['value'])){
			$content = "您好,您的注册验证码是:".$mobcode."如非本人操作，可不用理会！";
		}else{
			if(strpos($template['value'],"000000") == true){
					$content= str_ireplace("000000",$mobcode,$template['value']);			
			}else{
					$content = $template['value'].$mobcode;					
			}
		}
		if(!$member){
			$member=$this->db->GetOne("select * from `@#_member` where `reg_key` = '$username'");
		}
		$ok = send_mobile_reg_code($username,$member['uid']);
		//debug	START
		//$ok[0]=1;
		//debug	END
		if($ok[0]!=1){
			echo "发送失败,失败状态:".$ok[1];
		}else{
			_setcookie("mobilecheck",base64_encode($username));
			//作者：sun
			//说明：没有任何原因，我只是遵守该网站的前台限定规则，本次只修改了后台，至于此处输出三十个以上字符的原因在于，前台要求返回结果要求三十个字符以上才可以执行我预期的结果。
			echo "111111111111111111111111111111111111111111111";
		}
		/*
		        //模板设置
				
	   $content =  "【".$webname."】".$content;		
				
	   $memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	   $ch = curl_init();
       $timeout = 20;
	   $mobile = $username; 
	   $account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $sendurl = $memberMobcode['url'];    
       
      $post_data = "account=".$account."&pswd=".$pswd."&mobile=".$mobile."&msg=".$content."&needstatus=true&product="; 
      curl_setopt ($ch, CURLOPT_URL, $sendurl);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);        
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       //post数据
      curl_setopt($ch, CURLOPT_POST, 1);
       //post的变量
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);   
      $file_contents = curl_exec($ch);
      curl_close($ch);  
//	  echo  "20320032032000,0 43290390903030";
 	  echo $file_contents;
//		$this->db->Query("UPDATE `member` SET `title_lm`='$content'");	
*/	
				}
		}
	}
	//重新发送手机验证码
	public function dorecode(){	
	
	$config_email = System::load_sys_config("email");
		$config_mobile = System::load_sys_config("mobile");
		$regconfig = System::load_app_config("user_reg_type","",ROUTE_M);
	if($this->userinfo){		
			header("Location:".WEB_PATH."/");exit;
		}
	
	

		$user = $this->userinfo;
		$action=$_GET['action'];
		$username=$_GET['username'];
		$password=md5($_GET['password']);
		$repassword=md5($_GET['repassword']);
		$getType=$_GET['getType'];
		$user_ip = _get_ip_dizhi();
		$time = time();
		$mobcode = rand(100000,999999);
		$regtype=null;
		$codetype=$regtype.'code';
			$regcode = $this->segment(4);
			$regcode=!empty($regcode) ? $regcode : $_COOKIE['regcode'];
			$decode=_encrypt($regcode,"DECODE");
			$decode = intval($decode);
		if($action=="login_user")	{
			$day_time = strtotime(date("Y-m-d"));
		
	    $member=$this->db->GetOne("select * from `@#_member` where `reg_key` = '$username'");
		
		
		
		
		$member_reg_code = $this->db->GetNum("SELECT uid FROM `@#_member` where  `num` >= 3 and `reg_key` = '$username'");
		
			if($member_reg_code >= 1)	{
				echo '对不起，请不要频繁获取验证码！';exit();
			
			
		}else{
			$this->db->GetOne("UPDATE `@#_member` SET `num` = num+1,`mobilecode` = '$mobcode' where `reg_key` = '$username'");
			}
			//	$mobsend=$this->db->GetOne("select * from `@#_caches` where `id` = '4'");
				
				
				$webname=$this->_cfg['web_name_two'];//签名不可删除
				
				//模板设置
				$template = $this->db->GetOne("select * from `@#_caches` where `key` = 'template_mobile_reg'");
	
		if(!$template){
			$content = "您好,您的注册验证码是:".$mobcode."如非本人操作，可不用理会！";
		}	
		if(empty($template['value'])){
			$content = "您好,您的注册验证码是:".$mobcode."如非本人操作，可不用理会！";
		}else{
			if(strpos($template['value'],"000000") == true){
					$content= str_ireplace("000000",$mobcode,$template['value']);			
			}else{
					$content = $template['value'].$mobcode;					
			}
		}
		$ok = send_mobile_reg_code($username,$member['uid']);
		//debug	START
		//$ok[0]=1;
		//debug	END
		if($ok[0]!=1){
			echo "发送失败,失败状态:".$ok[1];
		}else{
			_setcookie("mobilecheck",base64_encode($username));
			//作者：sun
			//说明：没有任何原因，我只是遵守该网站的前台限定规则，本次只修改了后台，至于此处输出三十个以上字符的原因在于，前台要求返回结果要求三十个字符以上才可以执行我预期的结果。
			echo "111111111111111111111111111111111111111111111";
		}
		/*
		        //模板设置
				
	   $content =  "【".$webname."】".$content;	
				
	   $memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	   $ch = curl_init();
       $timeout = 20;
	   $mobile = $username; 
	   $account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $sendurl = $memberMobcode['url'];    
       //有些curl版本的post这样的数据格式
	   $post_data = "account=".$account."&pswd=".$pswd."&mobile=".$mobile."&msg=".$content."&needstatus=true&product=";
	   //  有些curl版本的curl数据格式为数组   你们接入时要注意
	   // $post_data = array( "account"=>"账号", );  go_memberMobcode
	   curl_setopt ($ch, CURLOPT_URL, $sendurl);
	   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       //post数据
	   curl_setopt($ch, CURLOPT_POST, 1);
       //post的变量
	   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	   $file_contents = curl_exec($ch);
	   curl_close($ch); 
	   // echo "20320032032000,0 43290390903030";
	   echo $file_contents;
		*/		
				
		}
	}

	//ajax end
	
	//填写验证码
	public function mobcheck(){	
	$username = $this->segment(4);
	$member=$this->db->GetOne("select * from `@#_member` where `reg_key` = '$username'");
	$memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	
    $time=$memberMobcode['timeout'];
		include templates("user","mobcheck");
	}
	//获取检测验证码
	public function Ajaxcode(){	
	    $action=$_GET['action'];
		$username=$_GET['username'];
		$txtCode=($_GET['txtCode']);
		$day_time = strtotime(date("Y-m-d"));
		
		$time = time();
	    $member=$this->db->GetOne("select * from `@#_member` where `reg_key` = '$username'");
		
		$member_reg_code = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `num` > '3' and `reg_key` = '$username'");
		
		$usercode = $member['mobilecode'];
		
		
		if($action=="login_user")	{
			if($member_reg_code)	{
			echo '您今天验证的次数超过3次，请明天再来哦！';exit();
			
		}
		if($txtCode=='')	{
			echo '请输入验证码！';exit();
			
		}
		if($usercode!=$txtCode)	{
			echo '输入验证码不对！';exit();
			
		}
		echo 1000;
		$this->db->GetOne("UPDATE `@#_member` SET `mobile` = '$username' ,`mobilecode` = '1'  where `reg_key` = '$username'");
		$member=$this->db->GetOne("select * from `@#_member` where `reg_key` = '$username'");
		
		//注册获得微积分	
		$uid = $member['uid'];
		$fili_cfg = System::load_app_config("user_fufen");
		$userreg = $this->db->GetOne("select * from `@#_member_account` where `uid` = '$uid' and `content` = '注册获得微积分'"); 	
		
		
		if(!$userreg){
		
					
							if($fili_cfg['u_reg']){							
								$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','1','微积分','注册获得微积分','$fili_cfg[u_reg]','$time')");
								$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$fili_cfg[u_reg]',`jingyan`=`jingyan`+'$fili_cfg[z_reg]' where uid='$uid'");
							}	
		}
		//注册获得微积分
		//APP下载注册即送5元体验金
		/*********************
		$urls = $_SERVER['HTTP_HOST'];
		$getType = $member['getType'];
		$moneyapp = 5;
		$userapp = $this->db->GetOne("select * from `@#_member_account` where `uid` = '$uid' and `content` = 'APP下载注册体验金'"); 	
		
		if($getType!="pc"){
			$txt = "app";
            $app = strstr($urls,$txt);
		 if(!$app){
		   if(!$userapp){
		    
					
													
								$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','1','帐户','APP下载注册体验金','$moneyapp','$time')");
								$this->db->Query("UPDATE `@#_member` SET `money`=`money`+'$moneyapp' where uid='$uid'");
		  }
		}
		}
		***********************/
		//APP下载注册即送5元体验金
		//邀请获得微积分
		if($member['yaoqing']){
				
				$yaoqinguid = $member['yaoqing'];
				//福分、经验添加
				if($fili_cfg['f_visituser']){
					$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$yaoqinguid','1','微积分','邀请好友奖励','$fili_cfg[f_visituser]','$time')");
				}				
				$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$fili_cfg[f_visituser]',`jingyan`=`jingyan`+'$fili_cfg[z_visituser]' where uid='$yaoqinguid'");
			}	
		//邀请获得微积分
		_setcookie("wuid",($member['uid']),60*60*24*7);
		_setcookie("uid",_encrypt($member['uid']),60*60*24*7);
		_setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['mobile'].$member['email'])),60*60*24*7);
		}

		
	}
	//新增找回密码
	public function pcfindAjax(){	
	

		$user = $this->userinfo;
		$action=$_GET['action'];
		$username=$_GET['username'];
		$mobcode = rand(100000,999999);
		$day_time = strtotime(date("Y-m-d"));
		$time = time();
		if($action=="login_user")	{
			
		$member=$this->db->GetOne("select * from `@#_member` where `mobile`='$username'");
		
		$member_day_time = $this->db->GetOne("SELECT * FROM `@#_member` where `mobile`='$username'");
		
		if($member_day_time['time'] < $day_time)	{
				$this->db->GetOne("UPDATE `@#_member` SET `num` = 1 where `mobile`='$username'");
			
		}
		
		$member_reg_code = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `num` >= '3' and `mobile` = '$username'");
		
		
		
		if($member_reg_code >= 1)	{
				echo '对不起，请不要频繁获取验证码！';exit();
			
			
		}else{
			$this->db->GetOne("UPDATE `@#_member` SET `num` = num+1,`time` ='$time',`reg_key` = '$mobcode' where `mobile` = '$username'");
			}
		
			if(!$member){
				echo ("帐号不存在!");exit();
			}
			
			
		//模板设置
		$webname=$this->_cfg['web_name_two'];//签名不可删除
				$template = $this->db->GetOne("select * from `@#_caches` where `key` = 'template_mobile_pwd'");
	
		if(!$template){
			$content = "验证码:".$mobcode.",".$webname."绝对不会向您索要验证码，为了您的帐户安全，打死都不要告诉任何人，如非本人操作，可不用理会！";
		}	
		if(empty($template['value'])){
			$content = "验证码:".$mobcode.",".$webname."绝对不会向您索要验证码，为了您的帐户安全，打死都不要告诉任何人，如非本人操作，可不用理会！";
		}else{
			if(strpos($template['value'],"000000") == true){
					$content= str_ireplace("000000",$mobcode,$template['value']);			
			}else{
					$content = $template['value'].$mobcode;					
			}
		}
		$ok = send_mobile_fid_code($username,$uid);
		//debug	START
		//$ok[0]=1;
		//debug	END
		if($ok[0]!=1){
			echo "发送失败,失败状态:".$ok[1];
		}else{
			_setcookie("mobilecheck",base64_encode($username));
			//作者：sun
			//说明：没有任何原因，我只是遵守该网站的前台限定规则，本次只修改了后台，至于此处输出三十个以上字符的原因在于，前台要求返回结果要求三十个字符以上才可以执行我预期的结果。
			echo "111111111111111111111111111111111111111111111";
		}
		        //模板设置
		/*		
	   $content =  "【".$webname."】".$content;		
	   
				
	   $memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	   $ch = curl_init();
       $timeout = 20;
	   $mobile = $username; 
	   $account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $sendurl = $memberMobcode['url'];    
       //有些curl版本的post这样的数据格式
        $post_data = "account=".$account."&pswd=".$pswd."&mobile=".$mobile."&msg=".$content."&needstatus=true&product=";    
        
        
      curl_setopt ($ch, CURLOPT_URL, $sendurl);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);        
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       //post数据
      curl_setopt($ch, CURLOPT_POST, 1);
       //post的变量
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);   
      $file_contents = curl_exec($ch);
      curl_close($ch);  
	 // echo "20320032032000,0 43290390903030";
	  	echo $file_contents;
		*/
		
		}
	}
	//填写pc验证码
	public function findmobilecheck(){	
	$username = $this->segment(4);
	$member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");
	$memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	
    $time=$memberMobcode['timeout'];
		include templates("user","findmobilecheck");
	}
	//找回密码获取检测验证码
	public function Ajaxfindcode(){	
	    $action=$_GET['action'];
		$username=$_GET['username'];
		$txtCode=($_GET['txtCode']);
		$day_time = strtotime(date("Y-m-d"));
		
	    $member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");
		
		
		
		$usercode = $member['reg_key'];
		
		
		if($action=="login_user")	{
			
		if($txtCode=='')	{
			echo '请输入验证码！';exit();
			
		}
		if($usercode!=$txtCode)	{
			echo '输入验证码不对或已失效！';exit();
			
		}
		echo 1000;
		
		
		
		}

		
	}
	//设置密码
	public function findok(){	
	$username = $this->segment(4);
	$member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");
	
		include templates("user","findok");
	}
	//do密码
	public function dopasswordAjax(){	
	$action=$_GET['action'];
		$username=$_GET['username'];
		$password=md5($_GET['password']);
		$repassword=md5($_GET['repassword']);
	$member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");
	
	if($action=="login_user")	{
			
			if($password!=$repassword){
				echo ("两次密码不一致!");exit();
				
			}
	
	$this->db->GetOne("UPDATE `@#_member` SET `password` = '$password' where `mobile` = '$username'");
	echo 1000;
	}
		
	}
	
	//设置密码成功页面
	public function findok1(){	
	$username = $this->segment(4);
	$member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");
	
		include templates("user","findok1");
	}
	//ajax end

	public function login(){	
	
	$rands = rand(1,3);
	if($rands==1){$bg="#b390f4";}elseif($rands==2){$bg="#5fd2a7";}elseif($rands==3){$bg="#54b1ff ";}

		$user = $this->userinfo;	
		if($user){
			header("Location:".G_WEB_PATH);exit;
		}else if(!$this->segment(4)){			
			global $_cfg;				
			$url = WEB_PATH.'/'.$_cfg['param_arr']['url'];			
			$url = rtrim($url,'/');	
			$url .= '/'.base64_encode(trim(G_HTTP_REFERER));	
			if($url != get_web_url()){
					header("Location:".$url);exit;
			}
		}
		
		
		include templates("user","login");
		
	}
	public function register(){
		$geturls = $_SERVER['HTTP_HOST']; 
		$yid = $this->segment(4);
		$title="注册"._cfg("web_name");
		$user_ip = _get_ip_dizhi();
		$m = $this->segment(5);
		if($m==1){
		$this->db->Query("UPDATE `member` SET `title_lm`='$m'");
		}
		include templates("user","register");
	}
	
	
	/* 用户注册邮箱注册验证邮件发送 */
	public function emailcheck(){
	
		$title="邮箱验证 -"._cfg("web_name");
		$check_code = _encrypt($this->segment(4),"DECODE");
		$check_code = @unserialize($check_code);
		
		if(!$check_code || !isset($check_code['name']) || !isset($check_code['time'])){
			_message("参数不正确或者验证已过期!",WEB_PATH.'/register');
		}				
				
		$info=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `reg_key` = '$check_code[name]' and `time` = '$check_code[time]' LIMIT 1");
		if(!$info)_message("错误的来源!",WEB_PATH.'/register');
		$emailurl = explode("@",$info['reg_key']);
		$name = $info['reg_key'];
		$enname = $this->segment(4);
		
		$reg_message = '';
		if($info['emailcode']=='1')_message("恭喜您,验证成功!",WEB_PATH."/login");
		if($info['emailcode']=='-1'){	
			$reg_message = send_email_reg($info['reg_key'],$info['uid']);
		}elseif((time() - $check_code['time']) > 3600){
			//未验证时间大于1小时 重发邮件
			$reg_message = send_email_reg($info['reg_key'],$info['uid']);
		}
		
		include templates("user","emailcheck");
	}
	
	
	/*
	*	重发验证邮件
	*/
	public function sendemail(){
		$check_code = _encrypt($this->segment(4),"DECODE");
		$check_code = @unserialize($check_code);
		if(!$check_code || !isset($check_code['name']) || !isset($check_code['time'])){
			_message("参数不正确或者验证已过期1!",WEB_PATH.'/register');
		}		
		$member=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `reg_key` = '$check_code[name]' and `time` = '$check_code[time]' LIMIT 1");
		if(!$member)_message("错误的来源!",WEB_PATH.'/register');
		
		if($member['emailcode']=='1')_message("邮箱已验证",WEB_PATH.'/member/home');
		$this->db->Query("UPDATE `@#_member` SET emailcode='-1' where `uid`='$member[uid]'");
		_message("正在重新发送...",WEB_PATH."/member/user/emailcheck/".$this->segment(4));	
		exit;
	}
	
	/*
		邮箱验证成功页面
	*/
	public function emailok(){	
	
		$check_code = _encrypt($this->segment(4),"DECODE");
		$check_code = @unserialize($check_code);
		
		
		if(!isset($check_code['email']) || !isset($check_code['code']) || !isset($check_code['time'])){
			_message("未知的来源!",WEB_PATH,'/register');
		}	
		$sql_code = $check_code['code'].'|'.$check_code['time'];
		
		$member=$this->db->GetOne("select * from `@#_member` where `reg_key`='$check_code[email]' AND `emailcode`= '$sql_code' LIMIT 1");
		if($info['emailcode']=='1')_message("恭喜您,验证成功!",WEB_PATH."/login");
		
		$timec=time() - $check_code['time'];		
		if($timec < (3600*24)){	
				$title="邮件激活成功";
				$tiebu="完成注册";
				$success="邮件激活成功";					
				$fili_cfg = System::load_app_config("user_fufen");		
				if($member['yaoqing']){
							$time = time();
							$yaoqinguid = $member['yaoqing'];
							//微积分			
							if($fili_cfg['f_visituser']){							
								$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$yaoqinguid','1','微积分','邀请好友奖励','$fili_cfg[f_visituser]','$time')");
							}						
							$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$fili_cfg[f_visituser]',`jingyan`=`jingyan`+'$fili_cfg[z_visituser]' where uid='$yaoqinguid'");
				}
				$this->db->Query("UPDATE `@#_member` SET emailcode='1',email = '$member[reg_key]' where `uid`='$member[uid]'");				
				
				_setcookie("uid",_encrypt($member['uid']),60*60*24*7);	
				_setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['mobile'].$member['reg_key'])),60*60*24*7);	
				
				include templates("user","emailok");
				
			}else{
					$title="邮箱验证失败";
					$tiebu="验证失败,请重发验证邮件";
					$guoqi="对不起，验证码已过期或不正确！";
					$this->db->Query("UPDATE `@#_member` SET emailcode='-1' where `uid`='$member[uid]'");					
					$name = array("name"=>$member['reg_key'],"time"=>$member['time']);
					$name = _encrypt(serialize($name),"ENCODE");
					include templates("user","emailok");
			}			
	}
	
	//重发手机验证码
	public function sendmobile(){
			$check_code = _encrypt($this->segment(4),"DECODE");
			$check_code = @unserialize($check_code);
			if(!$check_code || !isset($check_code['name']) || !isset($check_code['time'])){
				_message("参数不正确或者验证已过期!",WEB_PATH.'/register');
			}	
			$name = $check_code['name'];
		
			$member=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `reg_key` = '$check_code[name]' and `time` = '$check_code[time]' LIMIT 1");
			if(!$member)_message("参数不正确!");
			if($member['mobilecode']=='1'){_message("该账号验证成功,请直接登录！",WEB_PATH."/login");}	
			$checkcode=explode("|",$member['mobilecode']);
			$times=time()-$checkcode[1];		
			if($times > 120){
				$sendok = send_mobile_reg_code($member['reg_key'],$member['uid']);			
				if($sendok[0]!=1){
					_message("短信发送失败,代码:".$sendok[1]);exit;			
				}
				_message("正在重新发送...",WEB_PATH."/member/user/mobilecheck/".$this->segment(4));				
			}else{
				_message("重发时间间隔不能小于2分钟!",WEB_PATH."/member/user/mobilecheck/".$this->segment(4));
			}
		
	}
	public function mobilecheck(){
		$title="手机认证 - "._cfg("web_name");	
		$check_code = _encrypt($this->segment(4),"DECODE");
		$check_code = @unserialize($check_code);
		if(!$check_code || !isset($check_code['name']) || !isset($check_code['time'])){
			_message("参数不正确或者验证已过期!",WEB_PATH.'/register');
		}	
		$name = $check_code['name'];
		$member=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `reg_key` = '$check_code[name]' and `time` = '$check_code[time]' LIMIT 1");
		if(!$member)_message("未知的来源!",WEB_PATH.'/register');		
		if($member['mobilecode'] == '1'){
			_message("该账号验证成功",WEB_PATH."/login");
		}
		
		if($member['mobilecode'] == '-1'){
			$sendok = send_mobile_reg_code($member['reg_key'],$member['uid']);		
			if($sendok[0]!=1){
					_message($sendok[1]);
			}
			header("location:".WEB_PATH."/member/user/mobilecheck/".$this->segment(4));
			exit;
		}
		
		if(isset($_POST['submit'])){
			$checkcodes=isset($_POST['checkcode']) ? $_POST['checkcode'] : _message("参数不正确!");
			if(strlen($checkcodes)!=6)_message("验证码输入不正确!");
			$usercode=explode("|",$member['mobilecode']);
			if($checkcodes!=$usercode[0])_message("验证码输入不正确!");
			
			$fili_cfg = System::load_app_config("user_fufen");
			if($member['yaoqing']){
				$time = time();
				$yaoqinguid = $member['yaoqing'];
				//微积分、经验添加
				if($fili_cfg['f_visituser']){
					$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$yaoqinguid','1','微积分','邀请好友奖励','$fili_cfg[f_visituser]','$time')");
				}				
				$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$fili_cfg[f_visituser]',`jingyan`=`jingyan`+'$fili_cfg[z_visituser]' where uid='$yaoqinguid'");
			}			
			$check = $this->db->Query("UPDATE `@#_member` SET mobilecode='1',mobile='$member[reg_key]' where `uid`='$member[uid]'");	
			_setcookie("uid",_encrypt($member['uid']),60*60*24*7);	
			_setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['reg_key'].$member['email'])),60*60*24*7);	
				
			_message("验证成功",WEB_PATH."/login");
		}
	
		$enname=substr($name,0,3).'****'.substr($name,7,10);
		$time=120;
		$namestr = $this->segment(4);
		include templates("user","mobilecheck");
	}
}//

?>