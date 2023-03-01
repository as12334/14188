<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');
System::load_sys_fun('send');
System::load_sys_fun('user');
System::load_app_fun('member',ROUTE_M);
class home extends base {
	public function __construct(){ 
		parent::__construct();
		if(ROUTE_A!='userphotoup' and ROUTE_A!='singphotoup'){
			if(!$this->userinfo)header("location:".WEB_PATH."/member/user/login");
			//_message("请登录",WEB_PATH."/member/user/login",3);
		}		
		
		$this->db = System::load_sys_class('model');
		
		
	 }
		//商家入驻须知
	public function reg_shop(){	
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member=$this->db->Getone("select * from `@#_member` where `email`='$username' and dealer_pass=1 or `mobile`='$username' and dealer_pass=1" );
	 
	 if(!$member){
		$code = rand(100000,999999);
		include templates("member","reg_shop");
         }else{
		$member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
		
		if($member_dealer['shopbzj']>1){
		$title="入驻成功";	
		include templates("member","shopint");	
		}else{
			include templates("member","check_shop1");
		}
		
		 }
	
	    
		
	}
		//验证商家身份
	public function check_shop(){	
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 //   $codecheck = ($this->segment(4)) ?  ($this->segment(4)) : '';		
	 $codecheck = $_POST['code'];
		include templates("member","check_shop");
		
	}
		//验证商家身份
	public function check_shop1(){	
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 
	 
	
		include templates("member","check_shop1");
		
	}
	
		//交纳保证金
	public function shopbzj(){	
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 
	
		
		$paylist = $this->db->GetList("SELECT * FROM `@#_pay` where `pay_start` = '1' ");	
		
		if($member_dealer['shopbzj']>1){
		$title="入驻成功";	
		include templates("member","shopint");	
		
		}else{
		$title="交纳保证金";
	
		include templates("member","shopbzj");
		
		}
		
	}
	
	//入驻成功
	public function shopint(){	
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 
	
		$title="入驻成功";
		$paylist = $this->db->GetList("SELECT * FROM `@#_pay` where `pay_start` = '1' ");	
	
		include templates("member","shopint");
		
	}
	
	//新增登录doajax
	public function check_Ajax(){	
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	       $type=isset($_GET['type'])?$_GET['type']:'';
           $shopid=isset($_GET['shopid'])?$_GET['shopid']:'';
           $tburl=isset($_GET['tburl'])?$_GET['tburl']:'';
           $code=isset($_GET['code'])?$_GET['code']:'';
		   $mobile=isset($_GET['mobile'])?$_GET['mobile']:'';
           $emails=isset($_GET['emails'])?$_GET['emails']:'';
		   
		   $mysql_model=System::load_sys_class('model');
		   
		   $member_shopid=$this->db->Getone("select * from `@#_member_dealer` where `shopid`='$shopid' and `username`!='$username'");
       if($type=="tburl"){
	$text = file_get_contents($tburl);

     preg_match('/<title>([^<>]*)<\/title>/', $text, $title);
	 
	 $taobao = "item.taobao.com";
	 $tmall  = "detail.tmall.com";
	 $jd     = "item.jd.com";
	 
	 $tbid = "id=";
	 
	 

	     if(strstr($tburl,$taobao) || strstr($tburl,$tmall) || strstr($tburl,$jd)){
		
         }else{echo '商品链接不正确';exit();
		 }
		 if($shopid!=''){
		
         }else{echo '开店掌柜不能为空';exit();
		 }
		 
		 if(!$member_shopid){
		
         }else{echo '此掌柜已经被别人用了';exit();
		 }
		 if($mobile!=''){
		
         }else{echo '联系电话不能为空';exit();
		 }
		 if(!_checkmobile($mobile)){
					echo ("手机格式不正确!");exit();
				}	
		 if($emails!=''){
		
         }else{echo '联系邮箱不能为空';exit();
		 }
		 if(!_checkemail($emails)){
					echo ("邮箱格式不正确!");exit();
				}
		    $time = time();		
	        $pass = 1;//1为初审通过//2为审核通过//3为审核不通过//4为屏蔽
			$member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'");
			if($member_dealer){
				$sql="UPDATE `@#_member_dealer` SET `email`='$emails',`mobile`='$mobile',`shopurl`='$tburl',`pass`='$pass' WHERE `username`='$username'";
				$this->db->Query($sql);
				//echo "yes";
				}else{
			$sql="INSERT INTO `@#_member_dealer` (username,email,mobile,shopname,shopid,shopurl,shopbzj,shopmiaoshu,shopfuwu,shopwuliu,pass,time) value ('$username','$emails','$mobile','$shopid','$shopid','$tburl','0','0','0','0','$pass','$time')";
			$this->db->Query($sql);
				//echo "on";
				}
			$sql="UPDATE `@#_member` SET `dealer_pass`='1' WHERE `email`='$username'  or `mobile`='$username'";
			$this->db->Query($sql);
		echo '1000';
	   }
	        

		
		
		
	}
	//ajax end
	public function init(){
		$member=$this->userinfo;
		$title="我的用户中心";	
		$quanzi=$this->db->GetList("select * from `@#_quanzi_tiezi` order by id DESC LIMIT 5");
		
		$jingyan = $member['jingyan'];
		
		$dengji_1 = $this->db->GetOne("select * from `@#_member_group` where `jingyan_start` <= '$jingyan' and `jingyan_end` >= '$jingyan'"); 
		$max_jingyan_id = $dengji_1['groupid'];
		$dengji_2 = $this->db->GetOne("select * from `@#_member_group` where `groupid` > '$max_jingyan_id' order by `groupid` asc limit 1");
		if($dengji_2){
			$dengji_x = $dengji_2['jingyan_start'] - $jingyan;
 		}else{
			$dengji_x = $dengji_1['jingyan_end'] - $jingyan;	
		}
		
		$uid = $member['uid'];
			
		$cur=1;
		//会员首页夺宝状态
		$total=$this->db->GetCount("select * from `@#_member_go_record` where `uid`='$uid' and `huode`>'10000000'");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,10,$pagenum,"0");		
		$record = $this->db->GetPage("select * from `@#_member_go_record` where `uid`='$uid' and `huode`>'10000000' ORDER BY id DESC",array("num"=>10,"page"=>$pagenum,"type"=>1,"cache"=>0));
		$record1 = $this->db->GetPage("select * from `@#_member_go_record` where `uid`='$uid' and `huode`>'10000000' and status='已付款,未发货,未完成' ORDER BY id DESC");
		$record2 = $this->db->GetPage("select * from `@#_member_go_record` where `uid`='$uid' and `huode`>'10000000' and status='已付款,已发货,待收货' ORDER BY id DESC");
		
		foreach($record as $ckey=>$cord){
			$jiexiao = get_shop_if_jiexiao($cord['shopid']);
			if(!$jiexiao){
				unset($record[$ckey]);
			}
		}
		//会员首页记录
		$totalu=$this->db->GetCount("select * from `@#_member_go_record` where `uid`='$uid' order by `id` DESC");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($totalu,4,$pagenum,"0");		
		$records = $this->db->GetPage("select * from `@#_member_go_record` where `uid`='$uid' order by `id` DESC",array("num"=>4,"page"=>$pagenum,"type"=>1,"cache"=>0));
		//晒单分享
		$num=15;
$total=$this->db->GetCount("select * from `@#_shaidan` where 1");
$page=System::load_sys_class('page');
if(isset($_GET['p'])){
$pagenum=$_GET['p'];
}else{$pagenum=1;}
$page->config($total,$num,$pagenum,"0");
if($pagenum>$page->page){
$pagenum=$page->page;
}
$shaidan=$this->db->GetPage("select * from `@#_shaidan` where sd_pass=1 order by `sd_id` DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
$lie=3;$sum=$num;
$yushu=$total%$num;
$yeshu=floor($total/$num)+1;
if($yushu>0 &&$yeshu==$pagenum){
$sum=$yushu;
}
$sa_one=array();$sa_two=array();
$sa_tree=array();$sa_for=array();
foreach($shaidan as $sk=>$sv){
$shaidan[$sk]['sd_title'] = _htmtocode($shaidan[$sk]['sd_title']);
}
if($shaidan){
for($i=0;$i<$lie;$i++){
$n=$i;
while($n<$sum){
if($i==0){
$sa_one[]=$shaidan[$n];
}else if($i==1){
$sa_two[]=$shaidan[$n];
}else if($i==2){
$sa_tree[]=$shaidan[$n];
}else if($i==3){
$sa_for[]=$shaidan[$n];
}
$n+=$lie;
}
}
}
$uids = base64_encode($uid);
		include templates("member","index");
	}
	
	
	//个人设置
	public function userphoto(){	
	
	$cur = 2;
	$cur_co = 2;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="修改头像";
		$uid=_getcookie('uid');
		$ushell=_getcookie('ushell');
		include templates("member","photo");
	}
	
	//头像上传
	public function userphotoup(){

		if(!empty($_FILES)){			
			$uid=isset($_POST['uid']) ? $_POST['uid'] : NULL;		
			$ushell=isset($_POST['ushell']) ? $_POST['ushell'] : NULL;
			$login=$this->checkuser($uid,$ushell);			
			if(!$login){echo "未登陆";exit;}
			
			System::load_sys_class('upload','sys','no');
			upload::upload_config(array('png','jpg','jpeg'),500000,'touimg');
			upload::go_upload($_FILES['Filedata'],true);
			$files=$_POST['typeCode'];
			if(!upload::$ok){
				echo upload::$error;
			}else{
				$img=upload::$filedir."/".upload::$filename;				
				$size=getimagesize(G_UPLOAD."/touimg/".$img);
				$max=300;$w=$size[0];$h=$size[1];				
				if($w>300 or $h>300){
					if($w>$h){
						$w2=$max;
						$h2 = intval($h*($max/$w));
						upload::thumbs($w2,$h2,true);					
					}else{
						$h2=$max;
						$w2 = intval($w*($max/$h));
						upload::thumbs($w2,$h2,true);
					}
				}			
				echo "touimg/".$img;
			}					
		}
	}
	
	//头像裁剪
	public function userphotoinsert(){		
		$uid = $this->userinfo['uid'];		
		if(isset($_POST["submit"])){		
			$tname  = trim(str_ireplace(" ","",$_POST['img']));			
			$tname  = _htmtocode($tname);
			if(!file_exists(G_UPLOAD.$tname)){_message("头像修改失败",WEB_PATH."/member/home/userphoto",3);}
			$x = (int)$_POST['x'];
			$y = (int)$_POST['y'];
			$w = (int)$_POST['w'];
			$h = (int)$_POST['h'];
			$point = array("x"=>$x,"y"=>$y,"w"=>$w,"h"=>$h);
			$type_pro=isset($_POST['type_pro']) ? $_POST['type_pro'] : "";
			System::load_sys_class('upload','sys','no');
			upload::thumbs(160,160,false,G_UPLOAD.$tname,$point);
			upload::thumbs(80,80,false,G_UPLOAD.$tname,$point);
			upload::thumbs(30,30,false,G_UPLOAD.$tname,$point);			
			
			$this->db->Query("UPDATE `@#_member` SET img='$tname' where uid='$uid'");
			_message("头像修改成功",WEB_PATH.$type_pro,3);
			
		}
	}
	
	//个人资料
	public function modify(){
		$cur = 2;
		$cur_co = 1;
	
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="编辑个人资料";
		$config = System::load_app_config("user_fufen");//微积分/经验
				$funfenset = 	$config['f_overziliao'];
		$member_qq=$this->db->GetOne("select * from `@#_member_band` where `b_uid`=$member[uid]");
		include templates("member","modify");
	}
	
	//邮箱验证
	public function mailchecking(){	
		$cur = 2;
		$cur_co = 4;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="邮箱验证";
		if($member['email'] && $member['emailcode'] == 1){
			_message("您的邮箱已经验证成功,请勿重复验证！");
		}		
		include templates("member","mailchecking");
		
	}
	public function mailchackajax(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;		
		$member2=$mysql_model->GetOne("select uid from `@#_member` where `email`='".$_POST['param']."'");
		if(!empty($member2)){
			echo "邮箱已经存在";
		}else{
			echo '{
					"info":"",
					"status":"y"
				}';
		}
	}
	
	
	
	//发送验证邮件
	public function sendsuccess(){	
	
	   $action = $_GET['action'];
	   $email = $_GET['email'];
	   if($action=="email"){
		//if(!isset($_POST['submit']))_message("参数错误",WEB_PATH.'/member/home/modify');
		if(!isset($email) || empty($email)){
		echo "邮箱地址不能为空!";}
		//_message("邮箱地址不能为空!",WEB_PATH.'/member/home/modify');
		if(!_checkemail($email)){
		echo "邮箱格式错误";}
		//_message("邮箱格式错误!",WEB_PATH.'/member/home/modify');
		
		$config_email = System::load_sys_config("email");
		if(empty($config_email['user']) && empty($config_email['pass'])){
			echo "系统邮箱配置不正确!";
				//	_message("系统邮箱配置不正确!",WEB_PATH.'/member/home/modify');
		}
		
		$member=$this->userinfo;
		$title="发送成功";	
		
		
		$member2=$this->db->GetOne("select * from `@#_member` where `email`='$email' and `uid` != '$member[uid]'");
		if(!empty($member2) && $member2['emailcode'] == 1){
			echo "该邮箱已经存在，请选择另外的邮箱验证！";
		//	_message("该邮箱已经存在，请选择另外的邮箱验证！",WEB_PATH.'/member/home/modify');
		}
		
		$strcode1=$email.",".$member['uid'].",".time();
		$strcode= _encrypt($strcode1);
		
		$tit=$this->_cfg['web_name_two']."激活注册邮箱";
		$content='<span>请在24小时内绑定邮箱</span>，点击链接：<a href="'.WEB_PATH.'/member/home/emailcheckingok/'.$strcode.'">';
		$content.=WEB_PATH.'/member/home/emailcheckingok/'.$strcode.'</a>';
		$succ=_sendemail($email,'',$tit,$content,'yes','no');
		if($succ=='no'){
			echo "邮件发送失败!";
			//	_message("邮件发送失败!".$succ,WEB_PATH.'/member/home/modify',30);
		}else{
			echo 1000;
				//include templates("member","sendsuccess");	
		}
	   }
	}
	
	//邮箱认证返回
	public function emailcheckingok(){
		$cur = 2;
		$cur_co = 4;
		$member=$this->userinfo;
		$key=$this->segment(4);
		if($this->segment(5)){
			$key.='/'.$this->segment(5);
		}
		
		$emailcode=_encrypt($key,'DECODE');				
		if(empty($emailcode)){
			 _message("认证失败,参数不正确！",null,3);
		}		
		$memberx=explode(",",$emailcode);		
		$email=$memberx[0];
		$timec=(time()-$memberx[2])/(60*60);	
		$qmember=$this->db->GetOne("select * from `@#_member` where `email`='$email' and `uid` != '$member[uid]'");
		if($qmember && $qmember['emailcode']==1){
			_message("该邮箱已被认证,请勿重复认证!",WEB_PATH.'/member/home');
		}		
		if($timec<24){
			$this->db->Query("UPDATE `@#_member` SET email='".$memberx[0]."',emailcode='1' where uid='$member[uid]'");			
			$title="邮箱验证完成";
			include templates("member","sendsuccess2");
		}else{
			_message("认证时间已过期!",null,3);
		}
	}
	public function mobilechecking(){
		$cur = 2;
		$cur_co = 4;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="手机验证";
		if($member['mobile'] && $member['mobilecode'] == 1){
			_message("您的手机已经验证成功,请勿重复验证！");
		}	
		include templates("member","mobilechecking");
	}
	
	//手机验证
	public function mobilesuccess(){
		$cur = 2;
		$cur_co = 4;
		$title="手机验证";
		$member = $this->userinfo;
		$uid = $member['uid'];
		$action=$_GET['action'];
		$username=$_GET['username'];
		$mobcode = rand(100000,999999);
		$day_time = strtotime(date("Y-m-d"));
		$time = time();
		if($action=="mobile")	{
			
		$member=$this->db->GetOne("select * from `@#_member` where `mobile` = '$username'");
		
		if($member){
				echo ("该手机号已经认证了!");exit();
			}
		
		$member_day_time = $this->db->GetOne("SELECT * FROM `@#_member` where `uid`='$uid'");
		
		if($member_day_time['time'] < $day_time)	{
				$this->db->GetOne("UPDATE `@#_member` SET `num` = 1 where `uid`='$uid'");
			
		}
		
		$member_reg_code = $this->db->GetNum("SELECT uid FROM `@#_member` where `time` > '$day_time' and `num` >= '3' and `uid` = '$uid'");
		
		
		
		if($member_reg_code >= 1)	{
			//	echo '对不起，请不要频繁获取验证码！';exit();
			
			
		}else{
			$this->db->GetOne("UPDATE `@#_member` SET `num` = num+1,`time` ='$time',`reg_key` = '$mobcode' where `uid` = '$uid'");
			}
		$ok = send_mobile_reg_code($username,$uid);
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
		$webname=$this->_cfg['web_name_two'];	
	   $con = "【".$webname."】验证码:".$mobcode.",".$webname."绝对不会向您索要验证码，为了您的帐户安全，打死都不要告诉任何人，如非本人操作，可不用理会！";
				
	   $memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	   $ch = curl_init();
       $timeout = 20;
	   $mobile = $username; 
	   $account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $sendurl = $memberMobcode['url'];    
       // 有些curl版本的post这样的数据格式
        $post_data = "account=".$account."&pswd=".$pswd."&mobile=".$mobile."&msg=".$con."&needstatus=true&product=";    
        
        
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
	public function mobilechecking1(){	
	$cur = 2;
	$cur_co = 4;
		
	$username = $this->segment(4);
	
	$member = $this->userinfo;
	$uid = $member['uid'];
	$member=$this->db->GetOne("select * from `@#_member` where `uid`='$uid'");
	$memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	
    $time=$memberMobcode['timeout'];
		include templates("member","mobilechecking1");
	}
	
	public function mobilecheck(){	
		$member=$this->userinfo;
		$usercode = $member['mobilecode'];
		$action=$_GET['action'];
		
		$day_time = strtotime(date("Y-m-d"));
	   
	   $txtCode=isset($_GET['txtCode']) ? $_GET['txtCode'] : "";
	   $shoujimahao=isset($_GET['username']) ? $_GET['username'] : "";
		
	   if($action=="mobile"){
		  if($txtCode=='')	{
			echo '请输入验证码！';exit();
			
		}
		if($usercode!=$txtCode)	{
			echo '输入验证码不对或已失效！';exit();
			
		}
			
			
			
			$this->db->Query("UPDATE `@#_member` SET `mobilecode`='1',`mobile` = '$shoujimahao' where `uid`='$member[uid]'");
			//微积分、经验添加			
			$isset_user=$this->db->GetList("select `uid` from `@#_member_account` where `content`='手机认证完善奖励' and `type`='1' and `uid`='$member[uid]' and (`pay`='经验' or `pay`='微积分')");	
			if(empty($isset_user)){
				$config = System::load_app_config("user_fufen");//微积分/经验
				$time=time();
				$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$member[uid]','1','微积分','手机认证完善奖励','$config[f_phonecode]','$time')");
				$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$member[uid]','1','经验','手机认证完善奖励','$config[z_phonecode]','$time')");			
				$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$config[f_phonecode]',`jingyan`=`jingyan`+'$config[z_phonecode]' where uid='".$member['uid']."'");
			}
				
//微积分、经验添加			
			$isset_user=$this->db->GetOne("select `uid` from `@#_member_account` where `pay`='手机认证完善奖励' and `type`='1' and `uid`='$member[uid]' or `pay`='经验'");	
			if(empty($isset_user)){
				$config = System::load_app_config("user_fufen");//微积分/经验
				$time=time();

				$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$member[uid]','1','微积分','手机认证完善奖励','$config[f_overziliao]','$time')");
				$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$member[uid]','1','经验','手机认证完善奖励','$config[z_overziliao]','$time')");			
				$mysql_model->Query("UPDATE `@#_member` SET `score`=`score`+'$config[f_overziliao]',`jingyan`=`jingyan`+'$config[z_overziliao]' where uid='".$member['uid']."'");
			}	
			_setcookie("uid",_encrypt($member['uid']),60*60*24*7);
		_setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$shoujimahao.$member['email'])),60*60*24*7);	
			echo 1000;	
		//	_message("验证成功",WEB_PATH."/member/home/modify");
		}else{
			echo "验证失败";exit();
			
		}
	}
	public function usermodify(){
		$mysql_model=System::load_sys_class('model');
		$action=_htmtocode(trim($_GET['action']));	
		$member=$this->userinfo;
		if($action=="usermodify"){
			$type_pro=_htmtocode(trim($_GET['type_pro']));			
			$username=_htmtocode(trim($_GET['username']));
			$username = str_ireplace("'","",$username);
			$txtQQ=_htmtocode(trim($_GET['txtQQ']));
			$txtemail=$txtQQ."@qq.com";
			$qianming=_htmtocode(trim($_GET['qianming']));
			$mobile = $member['mobile'];
			$member_ni = $this->db->GetOne("select username from `@#_member` where `username` = '$username'");
			if($member_ni){
				if($member['username']==$username){}else{echo "昵称已存在！";exit();}
				}
			$reg_user_str = $this->db->GetOne("select value from `@#_caches` where `key` = 'member_name_key' limit 1");
			$reg_user_str = explode(",",$reg_user_str['value']);
			if(is_array($reg_user_str) && !empty($username)){
				foreach($reg_user_str as $rv){
					if($rv == $username){
						echo  ("此昵称禁止使用!");exit();
					}
				}
			
			}		
			
			//微积分、经验添加
			$isset_user=$this->db->GetOne("select `uid` from `@#_member_account` where (`content`='完善昵称奖励') and `type`='1' and `uid`='$member[uid]' and (`pay`='经验' or `pay`='微积分')");	
			if(!$isset_user){			
				$config = System::load_app_config("user_fufen");//微积分/经验
				$funfenset = 	$config['f_overziliao'];
				$time=time();

				$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$member[uid]','1','微积分','完善昵称奖励','$config[f_overziliao]','$time')");
				$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$member[uid]','1','经验','完善昵称奖励','$config[z_overziliao]','$time')");			
				$mysql_model->Query("UPDATE `@#_member` SET username='".$username."',qianming='".$qianming."',`score`=`score`+'$config[f_overziliao]',`jingyan`=`jingyan`+'$config[z_overziliao]',qq='".$txtQQ."',email='".$txtemail."' where uid='".$member['uid']."'");
			}else{	
			$mysql_model->Query("UPDATE `@#_member` SET username='".$username."',qianming='".$qianming."',qq='".$txtQQ."',email='".$txtemail."' where uid='".$member['uid']."'");
			}
			_setcookie("uid",_encrypt($member['uid']),60*60*24*7);			
			_setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['mobile'].$txtemail)),60*60*24*7);
			echo 1000;
		//	_message("修改成功",WEB_PATH.$type_pro,3);
			
		}
	}
	public function address(){
		
		$cur = 2;
		$cur_co = 3;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="收货地址";
		$member_dizhi=$mysql_model->Getlist("select * from `@#_member_dizhi` where uid='".$member['uid']."'  limit 10");
		foreach($member_dizhi as $k=>$v){		
			$member_dizhi[$k] = _htmtocode($v);
		}
		$count=count($member_dizhi);
		include templates("member","address");
	} 
	public function morenaddress(){
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$member_dizhi=$mysql_model->Getlist("select * from `@#_member_dizhi` where uid='".$member['uid']."'");
		foreach($member_dizhi as $dizhi){
			if($dizhi['default']=='Y'){
				$mysql_model->Query("UPDATE `@#_member_dizhi` SET `default`='N' where uid='".$member['uid']."'");
			}
		}
		$id = $this->segment(4);
		$id = abs(intval($id));
		if(isset($id)){
		$mysql_model->Query("UPDATE `@#_member_dizhi` SET `default`='Y' where id='".$id."'");	
		header("location:".WEB_PATH."/member/home/address");			
		//echo _message("修改成功",WEB_PATH."/member/home/address",3);
		}
	}
	
	public function deladdress(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$id=$this->segment(4);
		$id = abs(intval($id));
		$dizhi=$mysql_model->Getone("select * from `@#_member_dizhi` where `uid`='$member[uid]' and `id`='$id'");
		if(!empty($dizhi)){
			$mysql_model->Query("DELETE FROM `@#_member_dizhi` WHERE `uid`='$member[uid]' and `id`='$id'");
			header("location:".WEB_PATH."/member/home/address");
		}else{
			echo _message("删除失败",WEB_PATH."/member/home/address",0);
		}
	}
	public function delmobaddress(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$id=$this->segment(4);
		$id = abs(intval($id));
		$dizhi=$mysql_model->Getone("select * from `@#_member_dizhi` where `uid`='$member[uid]' and `id`='$id'");
		if(!empty($dizhi)){
			$mysql_model->Query("DELETE FROM `@#_member_dizhi` WHERE `uid`='$member[uid]' and `id`='$id'");
			header("location:".WEB_PATH."/mobile/home/address");
		}else{
			echo _message("删除失败",WEB_PATH."/mobile/home/address",0);
		}
	}
	public function updateddress(){
		
		$action=isset($_GET['action']) ? $_GET['action'] : "";
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid=$member['uid'];
		$id = $this->segment(4);
		$id = abs(intval($id));
		if($action=="eidt"){
			$type_address=isset($_POST['type_address']) ? $_POST['type_address'] : "/member/home/address";
			$default=isset($_GET['defaults']) ? $_GET['defaults'] : "";
			$sheng=isset($_GET['sheng']) ? $_GET['sheng'] : "";
			$shi=isset($_GET['shi']) ? $_GET['shi'] : "";
			$xian=isset($_GET['xian']) ? $_GET['xian'] : "";
			$jiedao=isset($_GET['jiedao']) ? $_GET['jiedao'] : "";
			$youbian=isset($_GET['youbian']) ? $_GET['youbian'] : "";
			$shouhuoren=isset($_GET['shouhuoren']) ? $_GET['shouhuoren'] : "";
			$tell=isset($_GET['tell']) ? $_GET['tell'] : "";
			$mobile=isset($_GET['mobile']) ? $_GET['mobile'] : "";
			$qq=isset($_POST['qq']) ? $_POST['qq'] : "";
			$time=time();
			if($sheng==null or $jiedao==null or $shouhuoren==null or $mobile==null){
				echo "带星号不能为空;";
				exit;
			}			
			if(!_checkmobile($mobile)){
				echo "手机号错误;";
				exit;
			}
			if($default==0){$default="N";}else{$default="Y";}
		$mysql_model->Query("UPDATE `@#_member_dizhi` SET 
		`uid`='".$uid."',
		`sheng`='".$sheng."',
		`shi`='".$shi."',
		`xian`='".$xian."',
		`jiedao`='".$jiedao."',
		`youbian`='".$youbian."',
		`shouhuoren`='".$shouhuoren."',
		`tell`='".$tell."',
		`qq`='".$qq."',
		
		`mobile`='".$mobile."' where `id`='".$id."'");		
		
	
				echo 1000;
			//	header("location:".WEB_PATH.$type_address);	
		//_message("修改成功",WEB_PATH.$type_address,1);
		}
	}
	public function useraddress(){
		$action=isset($_GET['action']) ? $_GET['action'] : "";
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid=$member['uid'];
		if($action=="add"){
			foreach($_POST as $k=>$v){
				$_POST[$k] = _htmtocode($v);
			}
			$type_address=isset($_POST['type_address']) ? $_POST['type_address'] : "/member/home/address";
			$default=isset($_GET['default']) ? $_GET['default'] : "";
			$sheng=isset($_GET['sheng']) ? $_GET['sheng'] : "";
			$shi=isset($_GET['shi']) ? $_GET['shi'] : "";
			$xian=isset($_GET['xian']) ? $_GET['xian'] : "";
			$jiedao=isset($_GET['jiedao']) ? $_GET['jiedao'] : "";
			$youbian=isset($_GET['youbian']) ? $_GET['youbian'] : "";
			$shouhuoren=isset($_GET['shouhuoren']) ? $_GET['shouhuoren'] : "";
			$tell=isset($_GET['tell']) ? $_GET['tell'] : "";
			$mobile=isset($_GET['mobile']) ? $_GET['mobile'] : "";
			$qq=isset($_POST['qq']) ? $_POST['qq'] : "";
			$time=time();
			if($sheng==null or $jiedao==null or $shouhuoren==null or $mobile==null){
				echo "带星号不能为空;";
				exit;
			}			
			if(!_checkmobile($mobile)){
				echo "手机号错误;";
				exit;
			}
			$member_dizhi=$mysql_model->GetOne("select * from `@#_member_dizhi` where `uid`='".$member['uid']."'");
			if(!$member_dizhi){
				$default="Y";
			}else{
				$default="N";
			}
			if($default==0){$default="N";}else{$default="Y";}
					$mysql_model->Query("INSERT INTO `@#_member_dizhi`(`uid`,`sheng`,`shi`,`xian`,`jiedao`,`youbian`,`shouhuoren`,`tell`,`mobile`,`qq`,`default`,`time`)VALUES
			('$uid','$sheng','$shi','$xian','$jiedao','$youbian','$shouhuoren','$tell','$mobile','$qq','$default','$time')");
			
			echo 1000;
			//_message("收货地址添加成功",WEB_PATH.$type_address,1);
		}
	}
	
	public function password(){
		$cur = 2;
		$cur_co = 4;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="修改密码";	
		include templates("member","password");
	}
	//账户安全
	public function Security(){
		$cur = 2;
		$cur_co = 4;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="账户安全设置";	
		include templates("member","Security");
	}
	public function oldpassword(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		if($member['password']==md5($_POST['param'])){
			echo '{
					"info":"",
					"status":"y"
				}';
		}else{
			echo "原密码错误";
		}
	}
	public function userpassword(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		//$member=$mysql_model->GetOne("select * from `@#_member` where uid='".$member['uid']."'");	
		$action=isset($_GET['action']) ? $_GET['action'] : "";
		if($action=="password"){
		$password=isset($_GET['password']) ? $_GET['password'] : "";
		$userpassword=isset($_GET['password1']) ? $_GET['password1'] : "";
		$userpassword2=isset($_GET['password2']) ? $_GET['password2'] : "";
		if($password==null or $userpassword==null or $userpassword2==null){
				echo "密码不能为空;";
				exit;
		}
		
		if(strlen($password)<6 || strlen($password)>20){
			echo "密码不能小于6位或者大于20位";
			exit;
		}
		if($userpassword!==$userpassword2){
			echo "二次密码不一致";
			exit;
		}		
		$password=md5($password);
		$userpassword=md5($userpassword);
		if($member['password']!=$password){
			echo "原密码错误";
			exit;
			//echo _message("原密码错误",null,3);
		}else{
			$mysql_model->Query("UPDATE `@#_member` SET password='".$userpassword."' where uid='".$member['uid']."'");
			echo 1000;
			//echo _message("密码修改成功",null,3);
		}
		}
	}
	//用户记录
	public function userbuylist(){
		$cur = 3;
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="购买记录 - "._cfg("web_name");		
		
		$total=$this->db->GetCount("select * from `@#_member_go_record` where `uid`='$uid' order by `id` DESC");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,10,$pagenum,"0");		
		$record = $this->db->GetPage("select * from `@#_member_go_record` where `uid`='$uid' order by `id` DESC",array("num"=>10,"page"=>$pagenum,"type"=>1,"cache"=>0));
		
		include templates("member","userbuylist");
	}
	//购买记录详细
	public function userbuydetail(){
		$cur = 3;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="购买详情";
		$crodid=intval($this->segment(4));
		$record=$mysql_model->GetOne("select * from `@#_member_go_record` where `id`='$crodid' and `uid`='$member[uid]' LIMIT 1");		
		if(!$record){
			_message("页面错误",WEB_PATH."/member/home/userbuylist",3);
		}
		$shopinfo=$mysql_model->GetOne("select thumb from `@#_shoplist` where `id`='$record[shopid]' LIMIT 1");
		$record['thumb'] = $shopinfo['thumb'];
		if($crodid>0){
			include templates("member","userbuydetail");
		}else{
			_message("页面错误",WEB_PATH."/member/home/userbuylist",3);
		}
	}
	//获得的商品
	public function orderlist(){
		$cur = 4;
		$member=$this->userinfo;	
		$uid = $member['uid'];
		$title="获得的商品 - "._cfg("web_name");
		
		//会员首页夺宝状态
		$statusid=intval($this->segment(4));
		$status = '';
		$sq = '';
		if($statusid==2){$status = '已付款,未发货,未完成';$sq .= "`status`='$status' and";}
		if($statusid==3){$status = '已付款,已发货,待收货';$sq .= "`status`='$status' and";}
		
		$total=$this->db->GetCount("select * from `@#_member_go_record` where `uid`='$uid' and $sq `huode`>'10000000'");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,10,$pagenum,"0");		
		
		
		$member_dizhi=$this->db->GetOne("select * from `@#_member_dizhi` where uid='".$uid."'  limit 1");//查询客户有没有填写地址
		
		$record = $this->db->GetPage("select * from `@#_member_go_record` where `uid`='$uid' and $sq `huode`>'10000000' ORDER BY id DESC",array("num"=>10,"page"=>$pagenum,"type"=>1,"cache"=>0));
		
		foreach($record as $ckey=>$cord){
			$jiexiao = get_shop_if_jiexiao($cord['shopid']);
			if(!$jiexiao){
				unset($record[$ckey]);
			}
		}		
		
		include templates("member","orderlist");
	}
	//账户管理
	public function userbalance(){
		$cur = 6;
		$member=$this->userinfo;	
		$uid = $member['uid'];
		$title="账户记录 - "._cfg("web_name");		
		$sql = "`uid`='$uid' and (`pay` = '账户'  or `pay` = '佣金')";
		$total=$this->db->GetCount("select * from `@#_member_account` where $sql");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,20,$pagenum,"0");		
		$account = $this->db->GetPage("select * from `@#_member_account` where $sql ORDER BY time DESC",array("num"=>20,"page"=>$pagenum,"type"=>1,"cache"=>0));
				
		include templates("member","userbalance");
	}
	
	
	//账户微积分
	public function userfufen(){
		$cur = 9;
		$member=$this->userinfo;	
		$uid = $member['uid'];
		$title="我的微积分 - "._cfg("web_name");
		$fufen = System::load_app_config("user_fufen",'','member');
		$mefufen = $member['score']*0.01;
		$totalscore = $member['score'];
		
		$member_number=$this->db->GetList("select * from `@#_member_number` where uid='".$uid."'  limit 2");//查询客户有没有绑定账号
	
		$total=$this->db->GetCount("select * from `@#_member_account` where `uid`='$uid' and `pay` = '微积分'");
		$total2=$this->db->GetCount("select * from `@#_member_cashout` where `uid`='$uid' and `type` = '3'");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,20,$pagenum,"0");		
		$account = $this->db->GetPage("select * from `@#_member_account` where `uid`='$uid' and `pay` = '微积分' ORDER BY time DESC",array("num"=>20,"page"=>$pagenum,"type"=>1,"cache"=>0));
		$account2 = $this->db->GetPage("select * from `@#_member_cashout` where `uid`='$uid' and `type` = '3' ORDER BY time DESC",array("num"=>20,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		include templates("member","userfufen");
	}	
	public function userrecharge(){
		$cur = 6;
		$member=$this->userinfo;
		$title="账户充值";
		$paylist = $this->db->GetList("SELECT * FROM `@#_pay` where `pay_start` = '1' order by pay_id desc");	
		include templates("member","userrecharge");
	}	

	//圈子管理
	public function joingroup(){
		$cur = 7;
		$member=$this->userinfo;
		$title="我的"._cfg("web_name_two")."圈";
		
		$addgroup=rtrim($member['addgroup'],",");
		if($addgroup){
			$group=$this->db->GetList("select * from `@#_quanzi` where `id` in ($addgroup)");		
		}else{
			$group=null;
		}
		$tiezi=$this->db->GetList("select * from `@#_quanzi_tiezi` where `hueiyuan`='$member[uid]' and `tiezi`='0' and `shenhe` = 'Y'");	
		$hueifu=$this->db->GetList("select * from `@#_quanzi_tiezi` where `hueiyuan`='$member[uid]' and `tiezi`!='0' and `shenhe` = 'Y'");	
		include templates("member","joingroup");
	}
	public function topic(){
		$cur = 7;
		$member=$this->userinfo;
		$title="圈子话题";
		$tiezi=$this->db->GetList("select * from `@#_quanzi_tiezi` where `hueiyuan`='$member[uid]'");	
		$hueifu=$this->db->GetList("select * from `@#_quanzi_hueifu` where `hueiyuan`='$member[uid]'");	
		include templates("member","topic");
	}
	public function tiezidel(){
		$member=$this->userinfo;
		$id = $this->segment(4);
		$id = abs(intval($id));
		$tiezi=$this->db->Getone("select * from `@#_quanzi_tiezi` where `hueiyuan`='$member[uid]' and  `id`='$id'");
		if($tiezi){
			$this->db->Query("DELETE FROM `@#_quanzi_tiezi` WHERE `hueiyuan`='$member[uid]' and  `id`='$id'");
			header("location:".WEB_PATH."/member/home/joingroup");
			//_message("删除成功",WEB_PATH."/member/home/topic");
		}else{
			header("location:".WEB_PATH."/member/home/joingroup");
			//_message("删除失败",WEB_PATH."/member/home/topic");
		}
	}
	public function hueifudel(){
		$member=$this->userinfo;
		$id = $this->segment(4);
		$id = abs(intval($id));
		$hueifu=$this->db->Getone("select * from `@#_quanzi_hueifu` where `id`='$id'");
		if($hueifu){
			$this->db->Query("DELETE FROM `@#_quanzi_hueifu` WHERE `id`='$id'");
			header("location:".WEB_PATH."/member/home/joingroup");
			//_message("删除成功",WEB_PATH."/member/home/topic");
		}else{
			header("location:".WEB_PATH."/member/home/joingroup");
			//_message("删除失败",WEB_PATH."/member/home/topic");
		}
	}

	
	//晒单
	public function singlelist(){
		$cur = 5;
		$member=$this->userinfo;
		$title="我的晒单";
		$cord=$this->db->Getlist("select * from `@#_member_go_record` where `uid`='$member[uid]' and `huode` > '10000000'");
		
		$shaidan=$this->db->Getlist("select * from `@#_shaidan` where `sd_userid`='$member[uid]' order by `sd_id`");

		$sd_id = $r_id = array();
		foreach($shaidan as $sd){
			if(!empty($sd['sd_shopid'])){
				$sd_id[]=$sd['sd_shopid'];
			}
		}

		foreach($cord as $rd){
			if(!in_array($rd['shopid'],$sd_id)){
				$r_id[]=$rd['shopid'];
			}
		}
		if(!empty($r_id)){
			$rd_id=implode(",",$r_id);
			$rd_id = trim($rd_id,',');
		}else{
			$rd_id="0";
		}
		
		$record = $this->db->Getlist("select a.shopid,a.id from `@#_member_go_record` as a left join `@#_shoplist` as b on a.shopid=b.id where a.shopid in ($rd_id) and a.`uid`='$member[uid]' and a.`huode`>'10000000' and b.q_showtime='N'");

		$total=$this->db->GetCount("select * from `@#_shaidan` where `sd_userid`='$member[uid]' order by `sd_id`");
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}
		$page=System::load_sys_class('page');
		$page->config($total,10,$pagenum,"0");

		$shaidan=$this->db->GetPage("select * from `@#_shaidan` where `sd_userid`='$member[uid]' order by `sd_id`",array("num"=>10,"page"=>$pagenum,"type"=>1,"cache"=>0));

		include templates("member","singlelist");
	}
	
	
	/*添加晒单*/
	public function singleinsert(){	
	    $cur = 5;
		$member=$this->userinfo;
		$uid=_getcookie('uid');
		$ushell=_getcookie('ushell');
		$title="添加晒单";		
		
		$recordid=intval($this->segment(4));
		$shopid = $recordid;
		$shaidan=$this->db->GetOne("select * from `@#_member_go_record` where `id`='$recordid' and `uid` = '$member[uid]'");
		if(!$shaidan){
			_message("该商品您不可晒单!");
		}
		$shaidanyn=$this->db->GetOne("select sd_id from `@#_shaidan` where `sd_shopid`='$recordid' and `sd_userid` = '$member[uid]'");
		if($shaidanyn){
			_message("不可重复晒单!");
		}
		$ginfo=$this->db->GetOne("select id,sid,qishu from `@#_shoplist` where `id`='$shaidan[shopid]' LIMIT 1");
		if(!$ginfo){
			_message("该商品已不存在!");
		}
				
		if(isset($_POST['submit'])){		
	
			
			if($_POST['title']==null)_message("标题不能为空");	
			if($_POST['content']==null)_message("内容不能为空");	
			if(!isset($_POST['fileurl_tmp'])){
				_message("图片不能为空");
			}
			System::load_sys_class('upload','sys','no');
			$img=$_POST['fileurl_tmp'];
			$num=count($img);
			$pic="";
			for($i=0;$i<$num;$i++){
				$pic.=trim($img[$i]).";";
			}
			
			$src=trim($img[0]);
			
			if(!file_exists(G_UPLOAD.$src)){
				//	_message("晒单图片不正确".$src);
			}
			$size=getimagesize(G_UPLOAD.$src);
			$width=270;
			$height=340;	
			//$height=$size[1]*($width/$size[0]);			
		
			$src_houzhui = upload::thumbs($width,$height,false,G_UPLOAD.'/'.$src);			
			$thumbs=$src."_".intval($width).intval($height).".".$src_houzhui;			
			
			
			$sd_userid = $this->userinfo['uid'];
			$sd_shopid = $ginfo['id'];	
			$sd_shopsid = $ginfo['sid'];	
			$sd_qishu = $ginfo['qishu'];	
			$sd_title = _htmtocode($_POST['title']);
			$sd_thumbs = $thumbs;
			$sd_content = $_POST['content'];
			$sd_photolist= $pic;
			$sd_time=time();		
			$sd_ip = _get_ip_dizhi();			
			$this->db->Query("INSERT INTO `@#_shaidan`(`sd_userid`,`sd_shopid`,`sd_shopsid`,`sd_qishu`,`sd_ip`,`sd_title`,`sd_thumbs`,`sd_content`,`sd_photolist`,`sd_time`)VALUES
			('$sd_userid','$sd_shopid','$sd_shopsid','$sd_qishu','$sd_ip','$sd_title','$sd_thumbs','$sd_content','$sd_photolist','$sd_time')");
			
			header("location:".WEB_PATH."/member/home/singlelist");
			//_message("晒单分享成功",WEB_PATH."/member/home/singlelist");
		}		
		
		include templates("member","singleinsert");
	}
	
	//编辑
	public function singleupdate(){
		_message("不可编辑!");
		if(isset($_POST['submit'])){
			System::load_sys_class('upload','sys','no');
			if($_POST['title']==null)_message("标题不能为空");	
			if($_POST['content']==null)_message("内容不能为空");				
			$sd_id=$_POST['sd_id'];
			$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");			
			$pic=null;$thumbs=null;
			if(isset($_POST['fileurl_tmp'])){
				if($shaidan['sd_photolist']==null){				
					$img=$_POST['fileurl_tmp'];
					$num=count($img);
					for($i=0;$i<$num;$i++){
						$pic.=trim($img[$i]).";";
					}
					$src=trim($img[0]);
					$size=getimagesize(G_UPLOAD_PATH."/".$src);
					$width=270;
			        $height=340;	
		            //$height=$size[1]*($width/$size[0]);			
					$thumbs=tubimg($src,$width,$height);
				}else{
					$img=$_POST['fileurl_tmp'];
					$num=count($img);
					for($i=0;$i<$num;$i++){
						$pic.=$img[$i].";";
					}
				}
			}
			if($thumbs!=null){
				$sd_thumbs=$thumbs;
			}else{
				$sd_thumbs=$shaidan['sd_thumbs'];
			}
			$uid=$this->userinfo;
			$sd_userid=$uid['uid'];
			$sd_shopid=$shaidan['sd_shopid'];
			$sd_title=$_POST['title'];
			$sd_content=$_POST['content'];
			$sd_photolist=$pic.$shaidan['sd_photolist'];
			$sd_time=time();			
			$this->db->Query("UPDATE `@#_shaidan` SET
			`sd_userid`='$sd_userid',
			`sd_shopid`='$sd_shopid',
			`sd_title`='$sd_title',
			`sd_thumbs`='$sd_thumbs',
			`sd_content`='$sd_content',
			`sd_photolist`='$sd_photolist',
			`sd_time`='$sd_time' where sd_id='$sd_id'");
			_message("晒单修改成功",WEB_PATH."/member/home/singlelist");
		}
		$member=$this->userinfo;
		$title="修改晒单";	
		$uid=_getcookie('uid');
		$ushell=_getcookie('ushell');
		$sd_id=intval($this->segment(4));
		if($sd_id>0){
			$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
			include templates("member","singleupdate");
		}else{
			_message("页面错误");
		}	
	}
	public function singoldimg(){
		if($_POST['action']=='del'){
			$sd_id=$_POST['sd_id'];
			$sd_id = abs(intval($sd_id));
			$oldimg=$_POST['oldimg'];
			$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
			$sd_photolist=str_replace($oldimg.";","",$shaidan['sd_photolist']);
			$this->db->Query("UPDATE `@#_shaidan` SET sd_photolist='".$sd_photolist."' where sd_id='".$sd_id."'");
		}
	}
	
	//晒单上传
	public function singphotoup(){
		
		if(!empty($_FILES)){
			/*
				更新时间：2014-04-28
				xu
			*/
			/*
			$uid=isset($_POST['uid']) ? $_POST['uid'] : NULL;		
			$ushell=isset($_POST['ushell']) ? $_POST['ushell'] : NULL;
			$login=$this->checkuser($uid,$ushell);
			if(!$login){echo "上传失败";exit;}
			
			*/
			System::load_sys_class('upload','sys','no');
			upload::upload_config(array('png','jpg','jpeg','gif'),1000000,'shaidan');
			upload::go_upload($_FILES['Filedata']);
			if(!upload::$ok){
				echo _message(upload::$error,null,3);
			}else{
				$img=upload::$filedir."/".upload::$filename;					
				$size=getimagesize(G_UPLOAD_PATH."/shaidan/".$img);
				$max=700;$w=$size[0];$h=$size[1];
				if($w>700){
					$w2=$max;
					$h2=$h*($max/$w);
					upload::thumbs($w2,$h2,1);						
				}					
				echo trim("shaidan/".$img);
			}					
		} 
	}	
	public function singdel(){
		$action=isset($_GET['action']) ? $_GET['action'] : null; 
		$filename=isset($_GET['filename']) ? $_GET['filename'] : null;
		if($action=='del' && !empty($filename)){
			$filename=G_UPLOAD_PATH.'shaidan/'.$filename;			
			$size=getimagesize($filename);			
			$filetype=explode('/',$size['mime']);			
			if($filetype[0]!='image'){
				return false;
				exit;
			}
			unlink($filename);
			exit;
		}
	}
	//晒单删除
	public function shaidandel(){
		_message("已添加的晒单不可删除!");
		$member=$this->userinfo;
		//$id=isset($_GET['id']) ? $_GET['id'] : "";
		$id=$this->segment(4);
		$id=intval($id);
		$shaidan=$this->db->Getone("select * from `@#_shaidan` where `sd_userid`='$member[uid]' and `sd_id`='$id'");
		if($shaidan){
			$this->db->Query("DELETE FROM `@#_shaidan` WHERE `sd_userid`='$member[uid]' and `sd_id`='$id'");
			_message("删除成功",WEB_PATH."/member/home/singlelist");
		}else{
			_message("删除失败",WEB_PATH."/member/home/singlelist");
		}
	}
	
			//邀请好友
	public function invitefriends(){
		$cur = 8;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;		 
		$uid = $member['uid'];
		$notinvolvednum=0;  //未参加购买的人数
		$involvednum=0;     //参加预购的人数
		$involvedtotal=0;   //邀请人数		 
		$uids = base64_encode($uid);
       
        //查询邀请好友信息		
		$invifriends=$mysql_model->GetList("select * from `@#_member` where `yaoqing`='$member[uid]' ORDER BY `time` DESC");	
		$involvedtotal=count($invifriends);
		
            
		//var_dump($invifriends);
                		
		for($i=0;$i<count($invifriends);$i++){
		   $sqluid=$invifriends[$i]['uid'];
		   $sqname=get_user_name($invifriends[$i]); 
		   $invifriends[$i]['sqlname']=	 $sqname;  
		   
		   //查询邀请好友的消费明细		   
		   $accounts[$sqluid]=$mysql_model->GetList("select * from `@#_member_account` where `uid`='$sqluid'  ORDER BY `time` DESC");	
          
		
		//判断哪个好友有消费		
		 if(empty($accounts[$sqluid])){
		    $notinvolvednum +=1;
		    $records[$sqluid]='未参与购买';
		 }else{
		    $involvednum +=1;
		    $records[$sqluid]='已参与购买';
		 }
		
		
		}  
		
		$recodetotal=0;   // 判断是否为空
		$shourutotal=0;
		$zhichutotal=0;
		
		$invifriends=$mysql_model->GetList("select * from `@#_member` where `yaoqing`='$member[uid]' ORDER BY `time` DESC");
		
		 
		  //查询佣金表
		  for($i=0;$i<count($invifriends);$i++){
			   $sqluid=$invifriends[$i]['uid'];
			   
			   //查询邀请好友给我反馈的佣金  
			   $recodes[$sqluid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$sqluid' and `type`=1 ORDER BY `time` DESC");
			   
			   $user[$sqluid]['username']=	get_user_name($invifriends[$i]);	   
				 
			}
		  //自己提现或充值
		  $recodes[$uid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$uid' and `type`!=1 ORDER BY `time` DESC");
		  $user[$uid]['username']= get_user_name($member);
		  
		  
         $recodearr='';
		 $i=0;	
		 if(!empty($recodes)){
		 foreach($recodes as $key=>$val){
			$username[$key]=$user[$key]['username'];
			foreach($val as $key2=>$val2){
			  $recodearr[$i]=$val2;		  
			  $i++;  
			} 
		 }
		 }
		 
		 $recodetotal=count($recodes);
		 
		 
		 //查询   累计收入：元    累计(提现/充值)：元    佣金余额：元
		 
		 if(!empty($recodes)){
			 foreach($recodes as $key=>$val){
			  if($uid==$key){
			     foreach($val as $key2=>$val2){  		   
					 
					$zhichutotal+=$val2['money'];	 //总佣金支出		 
					 
				   }
			    }else{
				    foreach($val as $key3=>$val3){  		   
					 
					$shourutotal+=$val3['money'];	 //总佣金收入		 
				   }
				
				}		
			  }
			     
		  }		  
		
		  //查询被冻结金额		  
		$cashoutdj=$mysql_model->GetOne("select SUM(money) as summoney  from `@#_member_cashout` where `uid`='$uid' and `auditstatus`!='1'  and `type` = '1' ORDER BY `time` DESC");	
		 $total=$shourutotal-$zhichutotal;  //计算佣金余额	 
		 $cashoutdjtotal= $cashoutdj['summoney'];  //冻结佣金余额
		$cashouthdtotal= $total-$cashoutdjtotal;  //活动佣金余额		
		 //提现记录
		 $recount=0;
		$fufen = System::load_app_config("user_fufen",'','member');
		//查询提现记录	 
		//$recordarr=$mysql_model->GetList("select * from `@#_member_recodes` a left join `@#_member_cashout` b on a.cashoutid=b.id where a.`uid`='$uid' and a.`type`='-3' ORDER BY a.`time` DESC");		$recordarr=
		
		$recordarr=$mysql_model->GetList("select * from  `@#_member_cashout`  where `uid`='$uid' ORDER BY `time` DESC limit 0,3");
        
		if(!empty($recordarr)){
		  $recount=1;
		}	
		//提现记录
		include templates("member","invitefriends");
	}
	
		//佣金明细
	public function commissions(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$recodetotal=0;   // 判断是否为空
		$shourutotal=0;
		$zhichutotal=0;
		
		$invifriends=$mysql_model->GetList("select * from `@#_member` where `yaoqing`='$member[uid]' ORDER BY `time` DESC");
		
		 
		  //查询佣金表
		  for($i=0;$i<count($invifriends);$i++){
			   $sqluid=$invifriends[$i]['uid'];
			   
			   //查询邀请好友给我反馈的佣金  
			   $recodes[$sqluid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$sqluid' and `type`=1 ORDER BY `time` DESC");
			   
			   $user[$sqluid]['username']=	get_user_name($invifriends[$i]);	   
				 
			}
		  //自己提现或充值
		  $recodes[$uid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$uid' and `type`!=1 ORDER BY `time` DESC");
		  $user[$uid]['username']= get_user_name($member);
		  
		  
         $recodearr='';
		 $i=0;	
		 if(!empty($recodes)){
		 foreach($recodes as $key=>$val){
			$username[$key]=$user[$key]['username'];
			foreach($val as $key2=>$val2){
			  $recodearr[$i]=$val2;		  
			  $i++;  
			} 
		 }
		 }
		 
		 $recodetotal=count($recodes);
		 
		 
		 //查询   累计收入：元    累计(提现/充值)：元    佣金余额：元
		 
		 if(!empty($recodes)){
			 foreach($recodes as $key=>$val){
			  if($uid==$key){
			     foreach($val as $key2=>$val2){  		   
					 
					$zhichutotal+=$val2['money'];	 //总佣金支出		 
					 
				   }
			    }else{
				    foreach($val as $key3=>$val3){  		   
					 
					$shourutotal+=$val3['money'];	 //总佣金收入		 
				   }
				
				}		
			  }
			     
		  }		  
		//查询被冻结金额		  
		$cashoutdj=$mysql_model->GetOne("select SUM(money) as summoney  from `@#_member_cashout` where `uid`='$uid' and `auditstatus`!='1' and `type` = '1' ORDER BY `time` DESC");	
		  
		 $total=$shourutotal-$zhichutotal;  //计算佣金余额	 
		 
		
		$cashoutdjtotal= $cashoutdj['summoney'];  //冻结佣金余额
		$cashouthdtotal= $total-$cashoutdjtotal;  //活动佣金余额
		 			 
		include templates("member","commissions");
	}
	//积分申请提现
	public function txjifen(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$action      = (($_GET['action']));
		if($action == "submit1"){ //提现	     
		 $fufen      = (intval($_GET['money']));
		 $numid      = (intval($_GET['numid']));
		 
		 $member_number=$this->db->GetOne("select * from `@#_member_number` where uid='".$uid."' and id='".$numid."'  limit 1");
		 
		 $username   = $member_number['username'];
		 $bankname   = "";
		 $branch     = 1;
		 $banknumber = $member_number['banknumber'];
		 $linkphone  = $member_number['linkphone'];
		 
		 $money      = $fufen*0.01;
		 $time       =time();
		 $type       = 3;  //收取1/消费-1/充值-2/提现-3/积分提现3
		 if(!$numid){echo ("您还没有选择账号哦！");exit;}
		 if(!$username){echo ("您还没有绑定账号哦！");exit;}
		 if($fufen==""){echo ("请填写提现的微积分！");exit;}
		 if($fufen<1000){echo ("提现的微积分要大于1000积分哦！");exit;}
		 
		 
		$sq1 =  $this->db->Query("INSERT INTO `@#_member_cashout`(`uid`,`money`,`username`,`bankname`,`branch`,`banknumber`,`linkphone`,`time`,`type`)VALUES
			('$uid','$money','$username','$bankname','$branch','$banknumber','$linkphone','$time','$type')"); 
			
		$sq2 =  $this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','-1','微积分','微积分提现','$fufen','$time')");
		
		$sq3 =  $this->db->Query("UPDATE `@#_member` SET `score`=`score`-'$fufen' where uid='$uid'");
		
		if($sq1 && $sq2 && $sq3){echo 1000; }  	else{echo ("提现失败！");exit;}
			
	   }
		
	}
	//申请提现
	public function cashout(){
		$cur = 8;
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$total=0;
		$shourutotal=0;
		$zhichutotal=0;
		$cashoutdjtotal=0;
		$cashouthdtotal=0;
        //查询邀请好友id
    	$invifriends=$mysql_model->GetList("select * from `@#_member` where `yaoqing`='$member[uid]' ORDER BY `time` DESC");

		//查询佣金收入
		for($i=0;$i<count($invifriends);$i++){
			   $sqluid=$invifriends[$i]['uid'];			   
			   //查询邀请好友给我反馈的佣金  
			   $recodes[$sqluid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$sqluid' and `type`=1 ORDER BY `time` DESC");			 
		}
		
		//查询佣金消费(提现,充值)	
		$zhichu=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$uid' and `type`!=1 ORDER BY `time` DESC");	
		  
		//查询被冻结金额		  
		$cashoutdj=$mysql_model->GetOne("select SUM(money) as summoney  from `@#_member_cashout` where `uid`='$uid' and `auditstatus`!='1' and `type` = '1' ORDER BY `time` DESC");	
		
		 if(!empty($recodes)){
			 foreach($recodes as $key=>$val){
			    foreach($val as $key2=>$val2){					 
					$shourutotal+=$val2['money'];	 //总佣金收入	 
				}
			 }		 
		 }		  
		 if(!empty($zhichu)){
			foreach($zhichu as $key=>$val3){  	   
				$zhichutotal+=$val3['money'];	//总支出的佣金		  
			}
		 }  
	

		$total=$shourutotal-$zhichutotal;  //计算佣金余额
		$cashoutdjtotal= $cashoutdj['summoney'];  //冻结佣金余额
		$cashouthdtotal= $total-$cashoutdj['summoney'];  //活动佣金余额
		
		
		$action = ($_GET['action']);
		

       if($action == "submit1"){ //提现	     
		 $money      = (intval($_GET['money']));
		 $numid      = (intval($_GET['numid']));
		 
		 $member_number=$this->db->GetOne("select * from `@#_member_number` where uid='".$uid."' and id='".$numid."'  limit 1");
		 
		 $username   = $member_number['username'];
		 $bankname   = "";
		 $branch     = 1;
		 $banknumber = $member_number['banknumber'];
		 $linkphone  = $member_number['linkphone'];
		 $time       =time();
		 $type       = -3;  //收取1/消费-1/充值-2/提现-3
		 if(!$member_number){echo ("您还没有绑定账号哦！");exit;}
		 if($money==""){echo ("请填写提现的金额！");exit;}
		 if($money<10){echo ("提现的金额要大于10微币哦！");exit;}
		 if($total<10){
		     echo ("佣金金额大于10微币才能提现！");exit;
		 }elseif($cashouthdtotal<$money){
		    echo ("输入额超出活动佣金金额！");exit;
		 }elseif($total<$money ){  
		     echo ("输入额超出总佣金金额！");exit;
		 }else{
			 
		 
		 //插入提现申请表  这里不用在佣金表中插入记录 等后台审核才插入
		 $this->db->Query("INSERT INTO `@#_member_cashout`(`uid`,`money`,`username`,`bankname`,`branch`,`banknumber`,`linkphone`,`time`,`type`)VALUES
			('$uid','$money','$username','$bankname','$branch','$banknumber','$linkphone','$time','1')"); 
			echo 1000;
		 }	   
	   }
	   
	   if($action == "submit2"){//充值			
		  $money      = abs(intval($_GET['money']));		
		  $type       = 1;
		  $pay        ="佣金";
		  $time       =time();
		  $content    ="使用佣金充值到账户";
		  
		 if($money <= 0){
			  echo ("充值金额要大于1");exit;
		 }
		 if($money > $total){
			  echo ("输入额超出总佣金金额！");exit;
		 }	
		 if($cashouthdtotal<$money){
		    echo ("输入额超出活动佣金金额！");exit;
         }			
		  
		  //插入记录
		 $account=$this->db->Query("INSERT INTO `@#_member_account`(`uid`,`type`,`pay`,`content`,`money`,`time`)VALUES
			('$uid','$type','$pay','$content','$money','$time')");
		 
		 // 查询是否有该记录
		 if($account){		    
			 //修改剩余金额
			 $leavemoney=$member['money']+$money;			 
			 $mrecode=$this->db->Query("UPDATE `@#_member` SET `money`='$leavemoney' WHERE `uid`='$uid' ");			 
			 //在佣金表中插入记录		 
		     $recode=$this->db->Query("INSERT INTO `@#_member_recodes`(`uid`,`type`,`content`,`money`,`time`)VALUES
			('$uid','-2','$content','$money','$time')");
			echo 1000;
		 }else{
		     echo ("充值失败！");exit;
		 }	
	   }
		//include templates("member","cashout");
	}
	//提现账号绑定
	public function numberbind(){
		$mysql_model=System::load_sys_class('model');
		$cur=11;
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="提现账号绑定";
		$member_number=$mysql_model->GetOne("select * from `@#_member_number` where uid='".$uid."' and type=1  limit 1");
		
		$member_number2=$mysql_model->GetOne("select * from `@#_member_number` where uid='".$uid."' and type=2  limit 1");
		include templates("member","numberbind");
	}
	//提现账号绑定
	public function donumberbind(){
		$mysql_model=System::load_sys_class('model');
		$cur=11;
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="提现账号绑定";
		
		$action   = $_GET['action'];
		
		$username   = $_GET['username'];
		$banknumber = $_GET['banknumber'];
		$banktype = $_GET['banktype'];
		$bank = $banknumber."".$banktype;
		$linkphone  = $_GET['linkphone'];
		$account=$this->db->Query("INSERT INTO `@#_member_number`(`uid`,`username`,`banknumber`,`linkphone`,`type`)VALUES
			('$uid','$username','$bank','$linkphone','$action')");
			if($account){echo 1000;}else{echo "绑定不成功";}
		
	}
	//提现充值记录cashoutlist
	public function recordlist(){
		$fufen = System::load_app_config("user_fufen",'','member');
		$cur=12;
		$title="提现充值记录";
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$recodetotal=0;   // 判断是否为空
		$shourutotal=0;
		$zhichutotal=0;
		
		$invifriends=$mysql_model->GetList("select * from `@#_member` where `yaoqing`='$member[uid]' ORDER BY `time` DESC");
		
		$member_number=$mysql_model->GetList("select * from `@#_member_number` where uid='".$uid."'  limit 2");//查询客户有没有绑定账号
		 
		  //查询佣金表
		  for($i=0;$i<count($invifriends);$i++){
			   $sqluid=$invifriends[$i]['uid'];
			   
			   //查询邀请好友给我反馈的佣金  
			   $recodes[$sqluid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$sqluid' and `type`=1 ORDER BY `time` DESC");
			   
			   $user[$sqluid]['username']=	get_user_name($invifriends[$i]);	   
				 
			}
		  //自己提现或充值
		  $recodes[$uid]=$mysql_model->GetList("select * from `@#_member_recodes` where `uid`='$uid' and `type`!=1 ORDER BY `time` DESC");
		  $user[$uid]['username']= get_user_name($member);
		  
		  
         $recodearr='';
		 $i=0;	
		 if(!empty($recodes)){
		 foreach($recodes as $key=>$val){
			$username[$key]=$user[$key]['username'];
			foreach($val as $key2=>$val2){
			  $recodearr[$i]=$val2;		  
			  $i++;  
			} 
		 }
		 }
		 
		 $recodetotal=count($recodes);
		 
		 
		 //查询   累计收入：元    累计(提现/充值)：元    佣金余额：元
		 
		 if(!empty($recodes)){
			 foreach($recodes as $key=>$val){
			  if($uid==$key){
			     foreach($val as $key2=>$val2){  		   
					 
					$zhichutotal+=$val2['money'];	 //总佣金支出		 
					 
				   }
			    }else{
				    foreach($val as $key3=>$val3){  		   
					 
					$shourutotal+=$val3['money'];	 //总佣金收入		 
				   }
				
				}		
			  }
			     
		  }		  
		
		  
		 $total=$shourutotal-$zhichutotal;  //计算佣金余额		
		include templates("member","recordlist");
	}
	
	//提现记录
	public function record(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$recount=0;
		$fufen = System::load_app_config("user_fufen",'','member');
		//查询提现记录	 
		//$recordarr=$mysql_model->GetList("select * from `@#_member_recodes` a left join `@#_member_cashout` b on a.cashoutid=b.id where a.`uid`='$uid' and a.`type`='-3' ORDER BY a.`time` DESC");		$recordarr=
		
		$recordarr=$mysql_model->GetList("select * from  `@#_member_cashout`  where `uid`='$uid' and `type` = '1' ORDER BY `time` DESC limit 0,40");
        
		if(!empty($recordarr)){
		  $recount=1;
		}		
		include templates("member","record");
	}
	//佣金充值到账户
	public function useryj(){
		$cur = 6;
		$member=$this->userinfo;	
		$uid = $member['uid'];
		$title="账户记录 - "._cfg("web_name");		
		
		$total=$this->db->GetCount("select * from `@#_member_account` where `uid`='$uid' and `pay` = '佣金'");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,20,$pagenum,"0");		
		$account = $this->db->GetPage("select * from `@#_member_account` where `uid`='$uid' and `pay` = '佣金' ORDER BY time DESC",array("num"=>40,"page"=>$pagenum,"type"=>1,"cache"=>0));
				
		include templates("member","useryj");
	}
	//qq绑定
	public function qqclock(){
		$member=$this->userinfo;
		include templates("member","qqclock");
	}
	# 我的修改 微积分签到
	public function qiandao() {
		$fufen = System::load_app_config("user_fufen",'','member');
		$u_jf = $fufen['u_jf'];
		$fufen_yuan = $fufen['fufen_yuan'];
		
		$cur = 10;
		# 签到时间限制（不能夸天哦。。）
		$time_start = '00:01';
		$time_stop= '23:59';

		# 每日签到增加微积分
		$time_score = $u_jf;

		# 连续签到的天数
		$time_day = 4;
		# 连续签到增加的微积分
		$time_day_score = rand(10000,15000);



		$member=$this->userinfo;
		if ( isset($_POST['submit']) ) {
			if ( !$member['mobile'] || $member['mobilecode']!='1' ) {
				_message("非常抱歉只有手机验证会员才能签到喔",WEB_PATH."/member/home/qiandao");

			}else if ( $member['sign_in_date'] == date('Y-m-d') ) {
				_message("您今天已经过签到了。",WEB_PATH."/member/home/qiandao");

			}else if ( strtotime(date('Y-m-d').$time_start ) > time() || strtotime(date('Y-m-d').$time_stop ) < time() ) {
				_message("现在不是签到时间！签到时间为{$time_start}点到{$time_stop}点",WEB_PATH."/member/home/qiandao");

			} else {
				$mysql_model = System::load_sys_class('model');
				if ( $member['sign_in_date'] == date('Y-m-d',strtotime('-1 day')) ){
					# 连续签到

					if ( $member['sign_in_time'] >= $time_day ) {
						$member['sign_in_time'] = 0;
					}

					$sign_in_time = $member['sign_in_time'] + 1;
					$sign_in_time_all = $member['sign_in_time_all'] + 1;
					$sign_in_date = date('Y-m-d');
					$score = $member['score'] + $time_score;

					if ( $sign_in_time >= $time_day ) {
						# 领取大礼包了
						$score += $time_day_score;
						$big = true;
					} else {
						$big = false;
					}

					$mysql_model->Query("INSERT INTO `@#_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ('".$member['uid']."', '1', '微积分', '每日签到', '$time_score', '".time()."')");
					$mysql_model->Query("UPDATE `@#_member` SET score='".$score."',sign_in_time='".$sign_in_time."', sign_in_time_all='".$sign_in_time_all."', sign_in_date='".$sign_in_date."' where uid='".$member['uid']."'");
					if ( $big ) {
						$mysql_model->Query("INSERT INTO `@#_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ('".$member['uid']."', '1', '微积分', '签到大礼包', '$time_day_score', '".time()."')");
						_message("签到成功，成功领取{$time_score}微积分。<br />恭喜您获得{$time_day_score}微积分的大礼包。<br />您的当前微积分为{$score}",WEB_PATH."/member/home/qiandao",10);
					} else {
						_message("签到成功，成功领取{$time_score}微积分。<br />您的当前微积分为{$score}。<br />再连续签到".($time_day-$sign_in_time)."天就能领取大礼包啦，加油！！！",WEB_PATH."/member/home/qiandao");
					}

				} else {
					$sign_in_time = 1;
					$sign_in_time_all = $member['sign_in_time_all'] + 1;
					$sign_in_date = date('Y-m-d');
					$score = $member['score'] + $time_score;
					$mysql_model->Query("INSERT INTO `@#_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ('".$member['uid']."', '1', '微积分', '每日签到', '$time_score', '".time()."')");
					$mysql_model->Query("UPDATE `@#_member` SET score='".$score."',sign_in_time='".$sign_in_time."', sign_in_time_all='".$sign_in_time_all."', sign_in_date='".$sign_in_date."' where uid='".$member['uid']."'");
					_message("签到成功，成功领取{$time_score}微积分。<br />您的当前微积分为{$score}",WEB_PATH."/member/home/qiandao");
				}
			}
			die;
		}

		if ( !$member['sign_in_date'] ) {
			$member['sign_in_date'] = '-';

		}else if ( $member['sign_in_date'] != date('Y-m-d') && $member['sign_in_date'] != date('Y-m-d',strtotime('-1 day')) ) {

			$member['sign_in_time'] = 0;
		}
		include templates("member","qiandao");
	}
	//卡密充值
	public function czk(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$title="卡密充值";  
		$cur = 14;
		 $webname=$this->_cfg['web_name'];
		include templates("member","czk");
	}
	//卡密充值记录
	public function czklist(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$content = "卡密充值";
		$total=$this->db->GetCount("select * from `@#_member_account` where `content` = '$content' and uid='$uid'");
		$account = $this->db->GetList("SELECT * FROM `@#_member_account` where `content` = '$content' and uid='$uid' order by id desc LIMIT 20");
		include templates("member","czklist");
	}
	
	
}

?>