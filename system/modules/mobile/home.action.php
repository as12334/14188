<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');
System::load_sys_fun('send');
System::load_sys_fun('user');
class home extends base {
	public function __construct(){ 
		parent::__construct();
		if(ROUTE_A!='userphotoup' and ROUTE_A!='singphotoup'){
			if(!$this->userinfo)header("location:".WEB_PATH."/mobile/user/login");
			
			// _message("请登录",WEB_PATH."/mobile/user/login",3);
		}		
		$this->db = System::load_sys_class('model');
		
	}
	public function init(){
		$yid = $_GET['yid'];
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$member=$this->userinfo;
		$title="我的会员中心";	
		$footerF=4;
		
		//$quanzi=$this->db->GetList("select * from `@#_quanzi_tiezi` order by id DESC LIMIT 5");		
		
	 //获取微购等级  微购新手  微购小将==
	  $memberdj=$this->db->GetList("select * from `@#_member_group`");
	   
	  $jingyan=$member['jingyan'];
	  $dengji_1 = $this->db->GetOne("select * from `@#_member_group` where `jingyan_start` <= '$jingyan' and `jingyan_end` >= '$jingyan'"); 
	  if(!empty($memberdj)){
	     foreach($memberdj as $key=>$val){
		    if($jingyan>=$val['jingyan_start'] && $jingyan<=$val['jingyan_end']){
			   $member['yungoudj']=$val['name'];
			}
		 }
	  }
	  
		include templates("mobile/user","index");
	}
	
	//商家入驻须知
	public function reg_shop(){
	   $yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	   $title="商家入驻须知";
       $member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member=$this->db->Getone("select * from `@#_member` where `email`='$username' and dealer_pass=1 or `mobile`='$username' and dealer_pass=1" );
	 
	 if(!$member){
		$code = rand(100000,999999);
		include templates("mobile/user","reg_shop");
         }else{
		$member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
		
		if($member_dealer['shopbzj']>1){
		$title="入驻成功";	
		include templates("mobile/user","shopint");	
		}else{
		include templates("mobile/user","check_shop1");
		}
		
		
		
		 }			
		
	}
		//验证商家身份
	public function check_shop(){	
	$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	$title="验证商家身份";
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 //   $codecheck = ($this->segment(4)) ?  ($this->segment(4)) : '';		
	 $codecheck = $_POST['code'];
		include templates("mobile/user","check_shop");
		
	}
		//平台审核
	public function check_shop1(){	
	$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	$webname=$this->_cfg['web_name_two'];
	$title=$webname."平台审核";
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 include templates("mobile/user","check_shop1");
	 
		
	}
	
		//交纳保证金
	public function shopbzj(){	
	$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	$member=$this->userinfo;
	if( $member['mobile']==''){$mobema=$member['email'];}else{$mobema=$member['mobile'];}
	
	       $username = $mobema;
	 $mysql_model=System::load_sys_class('model');
	 $member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'" );
	 
	
		
		$paylist = $this->db->GetList("SELECT * FROM `@#_pay` where `pay_start` = '1'");	
		
		
		if($member_dealer['shopbzj']>1){
			$title="入驻成功";
		include templates("mobile/user","shopint");
		
		}else{
		$title="交纳保证金";
	
		include templates("mobile/user","shopbzj");
		
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
	
		include templates("mobile/user","shopint");
		
	}
  
	 function invite(){
		 $yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
        $webname=$this->_cfg['web_name'];
        $member=$this->userinfo;
        $title="我的会员中心";
		$footerF=4;
		
        //$quanzi=$this->db->GetList("select * from `@#_quanzi_tiezi` order by id DESC LIMIT 5");

        //获取微购等级  微购新手  微购小将==
        $memberdj=$this->db->GetList("select * from `@#_member_group`");

        $jingyan=$member['jingyan'];
        if(!empty($memberdj)){
            foreach($memberdj as $key=>$val){
                if($jingyan>=$val['jingyan_start'] && $jingyan<=$val['jingyan_end']){
                    $member['yungoudj']=$val['name'];
                }
            }
        }
        include templates("mobile/user","invite");
    }
	
	  
	
	public function password(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="密码修改";
		$footerF=4;	
		include templates("mobile/user","password");
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
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		//$member=$mysql_model->GetOne("select * from `@#_member` where uid='".$member['uid']."'");	
		$action=isset($_GET['action']) ? $_GET['action'] : "";
		$password=isset($_GET['password']) ? $_GET['password'] : "";
		$userpassword=isset($_GET['password1']) ? $_GET['password1'] : "";
		$userpassword2=isset($_GET['password2']) ? $_GET['password2'] : "";
		if($action=="password"){
		if($password==null or $userpassword==null or $userpassword2==null){
				echo "密码不能为空;";
				exit;
			}
		if($password<6 and $password>20){
			echo "密码小于6位数";
			exit;
		}
		if($userpassword!=$userpassword2){
			echo "新密码不一致";
			exit;
		}		
		$password=md5($password);
		$userpassword=md5($userpassword);
		if($member['password']!=$password){
			echo "原密码错误";
		}else{
			$mysql_model->Query("UPDATE `@#_member` SET password='".$userpassword."' where uid='".$member['uid']."'");
			echo 1000;
			//echo _message("密码修改成功",null,3);
		}
		}
	} /* */
	
	//微购记录
	public function userbuylist(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	   $webname=$this->_cfg['web_name'];
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="购买记录";					
		//$record=$mysql_model->GetList("select * from `@#_member_go_record` where `uid`='$uid' ORDER BY `time` DESC");				
		include templates("mobile/user","userbuylist");
	}
	//购买记录详细
	public function userbuydetail(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="购买详情";
		$crodid=intval($this->segment(4));
		$record=$mysql_model->GetOne("select * from `@#_member_go_record` where `id`='$crodid' and `uid`='$member[uid]' LIMIT 1");		
		if($crodid>0){
			include templates("member","userbuydetail");
		}else{
			echo _message("页面错误",WEB_PATH."/member/home/userbuylist",3);
		}
	}
	//获得的商品
	public function orderlist(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$member=$this->userinfo;
		$title="获得的商品";
		//$record=$this->db->GetList("select * from `@#_member_go_record` where `uid`='".$member['uid']."' and `huode`>'10000000' ORDER BY id DESC");				
		include templates("mobile/user","orderlist");
	}
	//提现账号绑定
	public function numberbind(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="提现账号绑定";
		$member_number=$mysql_model->GetOne("select * from `@#_member_number` where uid='".$uid."' and type=1  limit 1");
		
		$member_number2=$mysql_model->GetOne("select * from `@#_member_number` where uid='".$uid."' and type=2  limit 1");
				
		include templates("mobile/user","numberbind");
	}
	//绑定账号
	public function numberadd(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="绑定账号";
		$member_number=$mysql_model->GetOne("select * from `@#_member_number` where uid='".$uid."'  limit 1");				
		include templates("mobile/user","numberadd");
	}
	//绑定账号
	public function numberadd2(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$title="绑定账号";
		$member_number=$mysql_model->GetOne("select * from `@#_member_number` where uid='".$uid."'  limit 1");				
		include templates("mobile/user","numberadd2");
	}
	//我的微积分
	public function fufen(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$fufen = System::load_app_config("user_fufen",'','member');
		$u_jf = $fufen['u_jf'];
	    $webname=$this->_cfg['web_name'];
        $member=$this->userinfo;
		$uid = $member['uid'];
        $title="我的微积分";
        $memberdj=$this->db->GetList("select * from `@#_member_group`");
        $jingyan=$member['jingyan'];
		$dengji_1 = $this->db->GetOne("select * from `@#_member_group` where `jingyan_start` <= '$jingyan' and `jingyan_end` >= '$jingyan'");
        if(!empty($memberdj)){
            foreach($memberdj as $key=>$val){
                if($jingyan>=$val['jingyan_start'] && $jingyan<=$val['jingyan_end']){
                    $member['yungoudj']=$val['name'];
                }
            }
        }

        $member_number=$this->db->GetList("select * from `@#_member_number` where uid='".$uid."'  limit 2");//查询客户有没有绑定账号
       
        $mefufen = $member['score']*0.01;
	    $totalscore = $member['score'];
		$total=$this->db->GetCount("select * from `@#_member_account` where `uid`='$uid' and `pay` = '微积分'");
		$total2=$this->db->GetCount("select * from `@#_member_cashout` where `uid`='$uid' and `type` = '3'");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,20,$pagenum,"0");		
		$account = $this->db->GetPage("select * from `@#_member_account` where `uid`='$uid' and `pay` = '微积分' ORDER BY time DESC",array("num"=>20,"page"=>$pagenum,"type"=>1,"cache"=>0));
		$account2 = $this->db->GetPage("select * from `@#_member_cashout` where `uid`='$uid' and `type` = '3' ORDER BY time DESC",array("num"=>20,"page"=>$pagenum,"type"=>1,"cache"=>0));				
		include templates("mobile/user","fufen");
	}
	
	
	
	//账户管理
	public function userbalance(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$member=$this->userinfo;
		$uid=$member['uid'];
		$title="账户记录";
		$footerF=4;
		$sql = "`uid`='$uid' and `pay` = '账户'  and `money` != '0' or `uid`='$uid' and  `pay` = '佣金' and `money` != '0'";
		$account=$this->db->GetList("select * from `@#_member_account` where $sql ORDER BY time DESC");
         $czsum=0;
         $xfsum=0;
		if(!empty($account)){ 
			foreach($account as $key=>$val){
			  if($val['type']==1){
				$czsum+=$val['money'];		  
			  }else{
				$xfsum+=$val['money'];		  
			  }		
			} 		
		}
		
		include templates("mobile/user","userbalance");
	}
	
	 
	public function userrecharge(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$member=$this->userinfo;
		$title="账户充值";$footerF=4;
		$paylist = $this->db->GetList("SELECT * FROM `@#_pay` where `pay_start` = '1' and pay_mobile=1");
 	
		include templates("mobile/user","recharge");
	}
	//收货地址index
	public function address(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="收货地址";
		$footerF=4;
		$member_dizhi=$mysql_model->Getlist("select * from `@#_member_dizhi` where uid='$uid' order by id desc limit  10");
		foreach($member_dizhi as $k=>$v){		
			$member_dizhi[$k] = _htmtocode($v);
		}
		$count=count($member_dizhi);
		
		include templates("mobile/user","address");
	}
	//收货地址add
	public function upadd(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="收货地址";
		$footerF=4;
		$member_dizhi=$mysql_model->Getlist("select * from `@#_member_dizhi` where uid='".$uid."' order by id desc limit  10");
		foreach($member_dizhi as $k=>$v){		
			$member_dizhi[$k] = _htmtocode($v);
		}
		$count=count($member_dizhi);
		
		if(isset($_SERVER['HTTP_REFERER'])==1){
	$reurl = $_SERVER['HTTP_REFERER'];
	}else{$reurl = WEB_PATH."/mobile/home/address/".$uids;}
	
		include templates("mobile/user","upadd");
	}
	//收货地址eidt
	public function eidtadd(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$id = $this->segment(4);
		$id = abs(intval($id));
		$dizhi=$mysql_model->Getone("select * from `@#_member_dizhi` where id='".$id."' ");
		 $title="收货地址";
		 $footerF=4;
		 if(isset($_SERVER['HTTP_REFERER'])==1){
	$reurl = $_SERVER['HTTP_REFERER'];
	}else{$reurl = WEB_PATH."/mobile/home/address/".$uids;}
		include templates("/mobile/user","eidtadd");
		
	}
	//收货地址eidt
	public function updateddress(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid=$member['uid'];
		$id = $this->segment(4);
		$id = abs(intval($id));
		$action=isset($_GET['action']) ? $_GET['action'] : "";
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
			//	echo "手机号错误;";
			//	exit;
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
		`default`='".$default."',
		`mobile`='".$mobile."' where `id`='".$id."'");		
		
		if($default=='Y'){
				$mysql_model->Query("UPDATE `@#_member_dizhi` SET `default`='N' where uid='".$member['uid']."' and `id`!='".$id."'");
			}elseif($default=='N'){
				$dizhi=$mysql_model->Getone("select * from `@#_member_dizhi` where uid='".$member['uid']."' and default='Y'");
				//if(empty($dizhi)){$mysql_model->Query("UPDATE `@#_member_dizhi` SET `default`='Y' where uid='".$member['uid']."' and `id`='".$id."'");}
				}	
				echo 1000;	
		//_message("修改成功",WEB_PATH.$type_address,1);
		}
	}
	//增加地址
	public function useraddress(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid=$member['uid'];
		$action=isset($_GET['action']) ? $_GET['action'] : "";
		if($action=="add"){
			foreach($_POST as $k=>$v){
				$_POST[$k] = _htmtocode($v);
			}
			$type_address=isset($_POST['type_address']) ? $_POST['type_address'] : "";
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
			//	echo "手机号错误";
			//	exit;
			}
			
			if($default==0){$default="N";}else{
				
				$default="Y";
				$mysql_model->Query("UPDATE `@#_member_dizhi` SET `default`='N' where uid='$uid'");
			
			}
					$mysql_model->Query("INSERT INTO `@#_member_dizhi`(`uid`,`sheng`,`shi`,`xian`,`jiedao`,`youbian`,`shouhuoren`,`tell`,`mobile`,`qq`,`default`,`time`)VALUES
			('$uid','$sheng','$shi','$xian','$jiedao','$youbian','$shouhuoren','$tell','$mobile','$qq','$default','$time')");
			
			echo 1000;	
			//_message("收货地址添加成功",WEB_PATH.$type_address,1);
		}
	}
	
	//编辑资料
	public function profile(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$footerF=4;
		 $title="编辑资料";
		include templates("mobile/user","profile");
	}
	//绑定手机
	public function mobilechecking(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$footerF=4;
		 $title="绑定手机";
		include templates("mobile/user","mobilechecking");
	}
	//绑定手机
	public function mobiles2(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$username = $this->segment(4);
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
	$member=$this->db->GetOne("select * from `@#_member` where `uid`='$uid'");
	$memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	$time=$memberMobcode['timeout'];
		$footerF=4;
		 $title="验证码验证";
		include templates("mobile/user","mobiles2");
	}	
	//头像修改
	public function headimg(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		 $mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$title="修改头像";
		$footerF=4;
		$uid=_getcookie('uid');
		$ushell=_getcookie('ushell');
		
		
		include templates("mobile/user","headimg");
	}
	//佣金管理
	public function commissions(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$recodetotal=0;   // 判断是否为空
		$shourutotal=0;
		$zhichutotal=0;
		$footerF=4;
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
		
		  
		 $total=$shourutotal-$zhichutotal;  //计算佣金余额	 
		include templates("mobile/invite","commissions");
	}
	//签到
	public function qiandao(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$fufen = System::load_app_config("user_fufen",'','member');
		$u_jf = $fufen['u_jf'];
		$fufen_yuan = $fufen['fufen_yuan'];
		# 签到时间限制（不能夸天哦。。）
		$time_start = '00:01';
		$time_stop= '23:59';

		# 每日签到增加微积分
		$time_score = $u_jf;

		# 连续签到的天数
		$time_day = 30;
		# 连续签到增加的微积分
		$time_day_score = rand(10000,15000);
		$footerF=4;
		$type_qiandao=isset($_POST['type_qiandao']) ? $_POST['type_qiandao'] : "";
		$action=isset($_GET['action']) ? $_GET['action'] : "";



		$member=$this->userinfo;
		if ( $action =="qiandao" ) {
			if ( !$member['mobile'] || $member['mobilecode']!='1' ) {
				echo "非常抱歉只有手机验证会员才能签到喔";exit();
				//_message("非常抱歉只有手机验证会员才能签到喔",WEB_PATH."/mobile/home/qiandao");

			}else if ( $member['sign_in_date'] == date('Y-m-d') ) {
				echo "您今天已经过签到了。";exit();
				//_message("您今天已经过签到了。",WEB_PATH."/mobile/home/qiandao");

			}else if ( strtotime(date('Y-m-d').$time_start ) > time() || strtotime(date('Y-m-d').$time_stop ) < time() ) {
				echo "现在不是签到时间！签到时间为{$time_start}点到{$time_stop}点";exit();
				//_message("现在不是签到时间！签到时间为{$time_start}点到{$time_stop}点",WEB_PATH."/mobile/home/qiandao");

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
						echo 1000;
					//	echo "签到成功，成功领取{$time_score}微积分。<br />恭喜您获得{$time_day_score}微积分的大礼包。<br />您的当前微积分为{$score}";
						//_message("签到成功，成功领取{$time_score}微积分。<br />恭喜您获得{$time_day_score}微积分的大礼包。<br />您的当前微积分为{$score}",WEB_PATH."/mobile/home/qiandao",10);
					} else {
						echo 1000;
					//	echo "签到成功，成功领取{$time_score}微积分。<br />您的当前微积分为{$score}。<br />再连续签到".($time_day-$sign_in_time)."天就能领取大礼包啦，加油！！！";
						//_message("签到成功，成功领取{$time_score}微积分。<br />您的当前微积分为{$score}。<br />再连续签到".($time_day-$sign_in_time)."天就能领取大礼包啦，加油！！！",WEB_PATH."/mobile/home/qiandao");
					}

				} else {
					$sign_in_time = 1;
					$sign_in_time_all = $member['sign_in_time_all'] + 1;
					$sign_in_date = date('Y-m-d');
					$score = $member['score'] + $time_score;
					$mysql_model->Query("INSERT INTO `@#_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ('".$member['uid']."', '1', '微积分', '每日签到', '$time_score', '".time()."')");
					$mysql_model->Query("UPDATE `@#_member` SET score='".$score."',sign_in_time='".$sign_in_time."', sign_in_time_all='".$sign_in_time_all."', sign_in_date='".$sign_in_date."' where uid='".$member['uid']."'");
					echo 1000;
					//echo "签到成功，成功领取{$time_score}微积分。<br />您的当前微积分为{$score}";
					//_message("签到成功，成功领取{$time_score}微积分。<br />您的当前微积分为{$score}",WEB_PATH."/mobile/home/qiandao");
				}
			}
			die;
		}

		if ( !$member['sign_in_date'] ) {
			$member['sign_in_date'] = '-';

		}else if ( $member['sign_in_date'] != date('Y-m-d') && $member['sign_in_date'] != date('Y-m-d',strtotime('-1 day')) ) {

			$member['sign_in_time'] = 0;
		}
		
		
		include templates("mobile/user","qiandao");
	}			
	/*
	public function pay(){
		if(isset($_POST['submit'])){
			$mid = TENPAY_MID; //商户编号 
			$key = TENPAY_KEY; //商户密钥
			$desc = '微购系统'; //商品名称   			  
			$oid = date("YmdHis").rand(100,999); //商户订单号   
			$pri = $_POST['money']*100; //总价(单位:分)   
			$url = WEB_PATH.'/member/home/tenpaysuccess'; //回调地址   			
			header("location:".makeUrl($key,$desc,$mid,$oid,$pri,$url)); 			
		}
	}
	public function tenpaysuccess(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$cmd_no         = $_GET['cmdno'];
		$pay_result     = $_GET['pay_result'];
		$pay_info       = $_GET['pay_info'];
		$bill_date      = $_GET['date'];
		$bargainor_id   = $_GET['bargainor_id'];
		$transaction_id = $_GET['transaction_id'];
		$sp_billno      = $_GET['sp_billno'];
		$total_fee      = $_GET['total_fee']/100+$member['money'];
		$fee_type       = $_GET['fee_type'];
		$attach         = $_GET['attach'];
		$sign           = $_GET['sign'];
		if($pay_result<1){
			$mysql_model->Query("UPDATE `@#_member` SET money='".$total_fee."' where uid='".$member['uid']."'");
			_message("支付成功",WEB_PATH.'/member/home/userbalance',3);
		}
	} 
	*/
	/**
	 * 摇一摇红包
	 */
	public function yaohongbao(){
		$webname=$this->_cfg['web_name'];
		$member=$this->userinfo;
		$uid = $member['uid'];
		$name = $member['username'];
		include templates("mobile/user","yaohongbao");
	}
	//晒单
	public function singlelist(){
		 $webname=$this->_cfg['web_name'];
		include templates("mobile/user","singlelist");
	}	
	//添加晒单
	public function postsinglebk(){
		$member=$this->userinfo;
		$uid=_getcookie('uid');
		$ushell=_getcookie('ushell');
		$title="添加晒单";		
		if(isset($_POST['submit'])){
			if($_POST['title']==null) _messagemobile("标题不能为空");	
			if($_POST['content']==null) _messagemobile("内容不能为空");	
			if(empty($_POST['file_up'])){
				_messagemobile("图片不能为空");
			}
			$pic=$_POST['file_up'];
			$pics = explode(';',$pic);
			$src=trim($pics[0]);
			$size=getimagesize(G_UPLOAD_PATH."/".$src);
			$width=220;
			$height=$size[1]*($width/$size[0]);
			$thumbs=tubimg($src,$width,$height);				
			$uid=$this->userinfo;
			$sd_userid=$uid['uid'];
			$sd_shopid=$_POST['shopid'];
			$sd_title=$_POST['title'];
			$sd_thumbs="shaidan/".$thumbs;
			$sd_content=$_POST['content'];
			$sd_photolist=$pic;
			$sd_time=time();			
			$sd_ip = _get_ip_dizhi();						
			$qishu= $this->db->GetOne("select `qishu`, `id` from `@#_shoplist` where `id`='$sd_shopid'");
			$qs = $qishu['qishu'];
			$ids = $qishu['id'];
			$this->db->Query("INSERT INTO `@#_shaidan`(`sd_userid`,`sd_shopid`,`sd_qishu`,`sd_ip`,`sd_title`,`sd_thumbs`,`sd_content`,`sd_photolist`,`sd_time`)VALUES ('$sd_userid','$ids','$qs','$sd_ip','$sd_title','$sd_thumbs','$sd_content','$sd_photolist','$sd_time')");
			_messagemobile("晒单分享成功",WEB_PATH."/mobile/home/singlelist");
		}
		$recordid=intval($this->segment(4));
		if($recordid>0){
			$shaidan=$this->db->GetOne("select * from `@#_member_go_record` where `id`='$recordid'");	
			$shopid=$shaidan['id'];
			include templates("mobile/user","postsingle");
		}else{
			_messagemobile("页面错误");
		}
	}

	public function postsingle(){
		$member=$this->userinfo;
		$uid=$member['uid'];
		$title="添加晒单";
		$recordid=intval($this->segment(4));
		$shaidan=$this->db->GetOne("select * from `@#_member_go_record` where `shopid`='$recordid' and `uid` = '$member[uid]'");
		if(!$shaidan){
			_messagemobile("该商品您不可晒单!");
		}
		$ginfo=$this->db->GetOne("select * from `@#_shoplist` where `id`='$shaidan[shopid]' LIMIT 1");
		if(!$ginfo){
			_messagemobile("该商品已不存在!");
		}
		$shaidanyn=$this->db->GetOne("select sd_id from `@#_shaidan` where `sd_shopid`='{$ginfo['id']}' and `sd_userid` = '$member[uid]'");
		if($shaidanyn){
			_messagemobile("不可重复晒单!");
		}
		if($_POST){

			if($_POST['title']==null)_messagemobile("标题不能为空");
			if($_POST['content']==null)_messagemobile("内容不能为空");
			if(!isset($_POST['fileurl_tmp'])){
				_messagemobile("图片不能为空");
			}
			System::load_sys_class('upload','sys','no');
			$img=explode(';', $_POST['fileurl_tmp']);
			$num=count($img);
			$pic="";
			for($i=0;$i<$num;$i++){
				$img[$i] = str_replace('http://', '', $img[$i]);
				$img[$i] = str_replace($_SERVER['HTTP_HOST'], '', $img[$i]);
				$img[$i] = str_replace('/statics/uploads/', '', $img[$i]);
				$pic.=trim($img[$i]).";";
			}

			$src=trim($img[0]);
			$size=getimagesize(G_UPLOAD_PATH."/".$src);
			$width=220;
			$height=$size[1]*($width/$size[0]);
			$thumbs=tubimg($src,$width,$height);
			$sd_userid=$uid;
			$sd_shopid=intval($ginfo['id']);
			$sd_title=safe_replace($_POST['title']);
			$sd_thumbs=$src;
			$sd_content=safe_replace($_POST['content']);
			$sd_photolist=$pic;
			$sd_time=time();
			$this->db->Query("INSERT INTO `@#_shaidan`(`sd_userid`,`sd_shopid`,`sd_title`,`sd_thumbs`,`sd_content`,`sd_photolist`,`sd_time`)VALUES
			('$sd_userid','$sd_shopid','$sd_title','$sd_thumbs','$sd_content','$sd_photolist','$sd_time')");
			header("Location:".WEB_PATH."/mobile/home/singlelist");
		}

		if($recordid>0){
			$shaidan=$this->db->GetOne("select * from `@#_member_go_record` where `id`='$recordid'");
			$shopid=$shaidan['shopid'];
			include templates("mobile/user","postsingle");
		}else{
			_messagemobile("页面错误");
		}
	}
	// 晒单上传图片方法
	public function mupload(){
		$uploadDir =$_SERVER['DOCUMENT_ROOT'].'/statics/uploads/shaidan/'.date('Ymd',time()).'/';
		if(!is_dir($uploadDir)){
		 	mkdir($uploadDir,0777);				
		}
		$rand=rand(10,99).substr(microtime(),2,6).substr(time(),4,6);
		$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); 
		if (!empty($_FILES)) {
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			$filetype = strtolower($fileParts['extension']);
			$tempFile   = $_FILES['Filedata']['tmp_name'];
			$targetFilename = $rand.'.'.$filetype;
			if (in_array($filetype, $fileTypes)) {
				move_uploaded_file($tempFile, $uploadDir.$targetFilename);
				echo 'shaidan/'.date('Ymd',time()).'/'.$targetFilename;
			} else {
				echo 'Invalid file type.';
			}
		}
	}
	//检查图片存在否
	public function check_exists(){
		$fileurl = $_SERVER['DOCUMENT_ROOT'].'/statics/uploads/shaidan/'.date('Ymd',time()).'/'.$_POST['filename'];
		if (file_exists($fileurl)){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function file_upload(){
		ini_set('display_errors', 0);
		// error_reporting(E_ALL);
		include dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR."UploadHandler.php";
		$upload_handler = new UploadHandler();
	}
	public function singoldimg(){
		if($_POST['action']=='del'){
			$sd_id=$_POST['sd_id'];
			$oldimg=$_POST['oldimg'];
			$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
			$sd_photolist=str_replace($oldimg.";","",$shaidan['sd_photolist']);
			$this->db->Query("UPDATE `@#_shaidan` SET sd_photolist='".$sd_photolist."' where sd_id='".$sd_id."'");
		}
	}
	public function singphotoup(){
		$mysql_model=System::load_sys_class('model');
		if(!empty($_FILES)){
			$uid=isset($_POST['uid']) ? $_POST['uid'] : NULL;
			$ushell=isset($_POST['ushell']) ? $_POST['ushell'] : NULL;
			$login=$this->checkuser($uid,$ushell);
			if(!$login){_messagemobile("上传出错");}
			System::load_sys_class('upload','sys','no');
			upload::upload_config(array('png','jpg','jpeg','gif'),1000000,'shaidan');
			upload::go_upload($_FILES['Filedata']);
			if(!upload::$ok){
				echo _messagemobile(upload::$error,null,3);
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
		_messagemobile("不可以删除!");
		$member=$this->userinfo;
		//$id=isset($_GET['id']) ? $_GET['id'] : "";
		$id=$this->segment(4);
		$id=intval($id);
		$shaidan=$this->db->Getone("select * from `@#_shaidan` where `sd_userid`='$member[uid]' and `sd_id`='$id'");
		if($shaidan){
			$this->db->Query("DELETE FROM `@#_shaidan` WHERE `sd_userid`='$member[uid]' and `sd_id`='$id'");
			_messagemobile("删除成功",WEB_PATH."/mobile/home/singlelist");
		}else{
			_messagemobile("删除失败",WEB_PATH."/mobile/home/singlelist");
		}
	}


		 
	
	 
}

?>