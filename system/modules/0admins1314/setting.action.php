<?php 
defined('G_IN_SYSTEM')or exit('no');
System::load_app_class('admin',G_ADMIN_DIR,'no');
System::load_app_fun('global',G_ADMIN_DIR);

class setting extends admin {	
	public function __construct(){
		parent::__construct();
		$this->db=System::load_sys_class("model");
		$this->ment=array(
						array("webcfg","SEO设置",ROUTE_M.'/'.ROUTE_C."/webcfg"),
						array("config","基本配置",ROUTE_M.'/'.ROUTE_C."/config"),
						array("upload","上传配置",ROUTE_M.'/'.ROUTE_C."/upload"),
					//	array("watermark","水印配置",ROUTE_M.'/'.ROUTE_C."/watermark"),
						array("email","邮箱配置",ROUTE_M.'/'.ROUTE_C."/email"),
						array("mobile","短信配置",ROUTE_M.'/'.ROUTE_C."/mobile"),
						array("payset","支付方式","pay/pay/pay_list"),						
						//array("empower","授权查询",ROUTE_M.'/'.ROUTE_C."/empower"),
						array("domain","模块域名绑定",ROUTE_M.'/'.ROUTE_C."/domain"),
						array("send","<b>中奖通知设置</b>",ROUTE_M.'/'.ROUTE_C."/sendconfig")
		);
		$info=$this->AdminInfo;
	    $admininfo = $info['useremail'];	
        $admins = strstr($admininfo,"0");
        if($info['mid'] == 0 ||  $admins){}else{exit();}
	
	}
	
	public function supper_ments(){
	
		/*
		
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `mid` int(10) unsigned NOT NULL,
			  `mtype` tinyint(1) NOT NULL,
			  `mids` varchar(100) NOT NULL,
			  `mname` char(20) NOT NULL,
			  `route_m` char(20) NOT NULL,
			  `route_c` char(20) DEFAULT NULL,
			  `route_a` char(20) DEFAULT NULL,
			  `route_data` varchar(250) DEFAULT NULL,
			  `posttime` int(10) unsigned NOT NULL,
		
		*/
		//$this->db->Query("INSERT INTO `@#_supper_ments` (`mid`,`mtype`,`mids`,`mname`,`route_m`,`route_c`,`route_a`,`route_data`,`posttime`) VALUES ($values)");
	
	}
	

	
	/**
	*	中奖通知设置
	*/
	public function sendconfig(){
	
	  $type = System::load_sys_config("send","type");
	  if(isset($_POST['s_type'])){	  
		$s_type = abs($_POST['s_type']);
		if(($s_type == $type) || $s_type > 3){
			_message("更新完成!");
		}
		$html = "<?php return array('type'=>'$s_type'); ?>";
		if(!is_writable(G_CONFIG.'send.inc.php')) exit('send.inc.php 没有写入权限!');
			file_put_contents(G_CONFIG.'send.inc.php',$html);
			_message("更新完成!");
		}
	  include $this->tpl(ROUTE_M,'config.send');
	}
	
	public function domain(){	
		$domain_cfg = System::load_sys_config("domain");
		if(empty($domain_cfg))$domain_cfg = array();
		if(isset($_POST['dosubmit']) && $_POST['dosubmit'] != 'del'){
			//插入或者修改
			$domain  = isset($_POST['domain']) ? trim(htmlspecialchars($_POST['domain'])) : null;
			$module  = isset($_POST['module']) ? trim(htmlspecialchars($_POST['module'])) : null;
			$action  = isset($_POST['action']) ? trim(htmlspecialchars($_POST['action'])) : null;
			$func    = isset($_POST['func']) ? trim(htmlspecialchars($_POST['func'])) : null;
			
			if(!$domain || !$module){
				exit("请正确填写绑定参数!");				
			}
			if($_POST['dosubmit'] == 'install'){
				if(array_key_exists($domain,$domain_cfg)){
					exit("绑定的域名已经被使用!");//array_keys
				}			
			}
			
			$domain =  str_ireplace("http://",'',trim($domain,'/'));		
			$domain_cfg[$domain] = array("m"=>$module,"c"=>$action,"a"=>$func);
			$html  = "<?php \n\n";
			$html .= "return ";
			$html .= var_export($domain_cfg,true).';';	
			$html .= "\n\n?>";
			if(!is_writable(G_CONFIG.'domain.inc.php')) exit('domain.inc.php 没有写入权限!');
			file_put_contents(G_CONFIG.'domain.inc.php',$html);
			exit("ok");
		}
		
		if(isset($_POST['dosubmit']) && $_POST['dosubmit'] == 'del'){
			$domain  = isset($_POST['domain']) ? trim(htmlspecialchars($_POST['domain'])) : null;
			if(!$domain){
				exit("操作失败!");			
			}
			if(isset($domain_cfg[$domain])){
				unset($domain_cfg[$domain]);
				$html  = "<?php \n\n";
				$html .= "return ";
				$html .= var_export($domain_cfg,true).';';	
				$html .= "\n\n?>";
				if(!is_writable(G_CONFIG.'domain.inc.php')) exit('domain.inc.php 没有写入权限!');
				file_put_contents(G_CONFIG.'domain.inc.php',$html);
				exit("ok");
			}else{
				exit("操作失败!");	
			}
		}
		
		include $this->tpl(ROUTE_M,'config.domain');
	}
	
	//写入文件
	public function cfgPut(){
		$cfg=$this->db->GetList("select * from `@#_config` where 1");		
		$html="<?php \n defined('G_IN_SYSTEM') or exit('No permission resources.'); \n";
		$html.="return array( \n";
		foreach ($cfg as $v){
			$v['value'] = addslashes($v['value']);
			$html.="'$v[name]' => '$v[value]',//$v[zhushi]";
			$html.="\n";		
		}
		$html.="); \n ?>";
		if(!is_writable(G_CONFIG.'system.inc.php')) _message('system.inc.php 没有写入权限!');
		return $ok=file_put_contents(G_CONFIG.'system.inc.php',$html);		
	}
	//基本设置
	public function config(){
	$info=$this->AdminInfo;
		if(isset($_POST['dosubmit'])){		
			$charset=htmlspecialchars($_POST['charset']);
			$timezone=htmlspecialchars($_POST['timezone']);
			$error=htmlspecialchars($_POST['error']);
			$gzip=htmlspecialchars($_POST['gzip']);
			$index_name=htmlspecialchars($_POST['index_name']);
			$expstr=htmlspecialchars($_POST['expstr']);
			$admindir=htmlspecialchars($_POST['admindir']);
			$web_off=htmlspecialchars($_POST['web_off']);
			$web_off_text=$_POST['web_off_text'];
			$qq=htmlspecialchars($_POST['qq']);
			$qq_qun=htmlspecialchars($_POST['qq_qun']);
			$cell=htmlspecialchars($_POST['cell']);
			$goods_end_time = intval($_POST['goods_end_time']);
			
			$code_admin_off=$_POST['code_admin_off'];
			$code_member_off=$_POST['code_member_off'];
			$code_reg_off=$_POST['code_reg_off'];
			
			if($goods_end_time < 30 && $goods_end_time != 0){
				$goods_end_time = 180;
			}
			if($goods_end_time >= 300){
				$goods_end_time = 180;
			}	
			
			$this->db->Query("UPDATE `@#_config` SET `value`='$charset' WHERE (`name`='charset')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$timezone' WHERE (`name`='timezone')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$error' WHERE (`name`='error')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$gzip' WHERE (`name`='gzip')");			
			$this->db->Query("UPDATE `@#_config` SET `value`='$index_name' WHERE (`name`='index_name')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$expstr' WHERE (`name`='expstr')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$admindir' WHERE (`name`='admindir')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_off' WHERE (`name`='web_off')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_off_text' WHERE (`name`='web_off_text')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$qq' WHERE (`name`='qq')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$qq_qun' WHERE (`name`='qq_qun')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$cell' WHERE (`name`='cell')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$goods_end_time' WHERE (`name`='goods_end_time')");
			
			$this->db->Query("UPDATE `@#_config` SET `value`='$code_admin_off' WHERE (`name`='code_admin_off')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$code_member_off' WHERE (`name`='code_member_off')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$code_reg_off' WHERE (`name`='code_reg_off')");
			
			$admindir_one = dirname(__FILE__);	
			$admindir_two = dirname($admindir_one).DIRECTORY_SEPARATOR.$admindir;
			if($admindir_one !== $admindir_two){			
				rename($admindir_one,$admindir_two);
			}			
			$ok=$this->cfgPut();
			if($this->db->affected_rows() && $ok){				
				_message("修改成功");
			}else{
				_message("修改失败");
			}
		}
	
		
		$web=System::load_sys_config('system');
		include $this->tpl(ROUTE_M,'config.system');
	}
	
	public function webcfg(){
		$info=$this->AdminInfo;
		if(isset($_POST['dosubmit'])){
		
			
			$web_name=htmlspecialchars($_POST['web_name']);
			$web_name_two=htmlspecialchars($_POST['web_name_two']);
			$web_path=htmlspecialchars($_POST['web_path']);
			$web_wx_url=htmlspecialchars($_POST['web_wx_url']);
			$web_key=htmlspecialchars($_POST['web_key']);
			$web_des=htmlspecialchars($_POST['web_des']);
			$web_logo=htmlspecialchars($_POST['web_logo']);
			$mob_logo=htmlspecialchars($_POST['mob_logo']);	
			$wx=htmlspecialchars($_POST['wx']);	
			
			$apk_url=htmlspecialchars($_POST['apk_url']);	
			$ipa_url=htmlspecialchars($_POST['ipa_url']);	
					
			$web_copyright=$_POST['web_copyright'];
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_name' WHERE (`name`='web_name')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_name_two' WHERE (`name`='web_name_two')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_key' WHERE (`name`='web_key')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_des' WHERE (`name`='web_des')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_path' WHERE (`name`='web_path')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_logo' WHERE (`name`='web_logo')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$mob_logo' WHERE (`name`='mob_logo')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$wx' WHERE (`name`='wx')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_copyright' WHERE (`name`='web_copyright')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$web_wx_url' WHERE (`name`='web_wx_url')");
			
			$this->db->Query("UPDATE `@#_config` SET `value`='$apk_url' WHERE (`name`='apk_url')");
			$this->db->Query("UPDATE `@#_config` SET `value`='$ipa_url' WHERE (`name`='ipa_url')");
			
			$ok=$this->cfgPut();
			if($this->db->affected_rows() && $ok){
				_message("修改成功");
			}else{
				_message("修改失败");
			}
		}
		
		$web=System::load_sys_config('system');
		include $this->tpl(ROUTE_M,'config.webcfg');
	}
	public function lp(){
		$info=$this->AdminInfo;
		if(isset($_POST['dosubmit'])){
		
			for($i=0;$i<=11;$i++){ }
			$title0=htmlspecialchars($_POST['title0']);
			$img_sl0=htmlspecialchars($_POST['img_sl0']);
			$type0=htmlspecialchars($_POST['type0']);
			$val0=htmlspecialchars($_POST['val0']);
			
			$title1=htmlspecialchars($_POST['title1']);
			$img_sl1=htmlspecialchars($_POST['img_sl1']);
			$type1=htmlspecialchars($_POST['type1']);
			$val1=htmlspecialchars($_POST['val1']);
			
			$title2=htmlspecialchars($_POST['title2']);
			$img_sl2=htmlspecialchars($_POST['img_sl2']);
			$type2=htmlspecialchars($_POST['type2']);
			$val2=htmlspecialchars($_POST['val2']);
			
			$title3=htmlspecialchars($_POST['title3']);
			$img_sl3=htmlspecialchars($_POST['img_sl3']);
			$type3=htmlspecialchars($_POST['type3']);
			$val3=htmlspecialchars($_POST['val3']);
			
			$title4=htmlspecialchars($_POST['title4']);
			$img_sl4=htmlspecialchars($_POST['img_sl4']);
			$type4=htmlspecialchars($_POST['type4']);
			$val4=htmlspecialchars($_POST['val4']);
			
			$title5=htmlspecialchars($_POST['title5']);
			$img_sl5=htmlspecialchars($_POST['img_sl5']);
			$type5=htmlspecialchars($_POST['type5']);
			$val5=htmlspecialchars($_POST['val5']);
			
			$title6=htmlspecialchars($_POST['title6']);
			$img_sl6=htmlspecialchars($_POST['img_sl6']);
			$type6=htmlspecialchars($_POST['type6']);
			$val6=htmlspecialchars($_POST['val6']);
			
			$title7=htmlspecialchars($_POST['title7']);
			$img_sl7=htmlspecialchars($_POST['img_sl7']);
			$type7=htmlspecialchars($_POST['type7']);
			$val7=htmlspecialchars($_POST['val7']);
			
			$title8=htmlspecialchars($_POST['title8']);
			$img_sl8=htmlspecialchars($_POST['img_sl8']);
			$type8=htmlspecialchars($_POST['type8']);
			$val8=htmlspecialchars($_POST['val8']);
			
			$title9=htmlspecialchars($_POST['title9']);
			$img_sl9=htmlspecialchars($_POST['img_sl9']);
			$type9=htmlspecialchars($_POST['type9']);
			$val9=htmlspecialchars($_POST['val9']);
			
			$title10=htmlspecialchars($_POST['title10']);
			$img_sl10=htmlspecialchars($_POST['img_sl10']);
			$type10=htmlspecialchars($_POST['type10']);
			$val10=htmlspecialchars($_POST['val10']);
			
			$title11=htmlspecialchars($_POST['title11']);
			$img_sl11=htmlspecialchars($_POST['img_sl11']);
			$type11=htmlspecialchars($_POST['type11']);
			$val11=htmlspecialchars($_POST['val11']);
			
			
$this->db->Query("UPDATE `@#_lp` SET `title0`='$title0',`img_sl0`='$img_sl0',`type0`='$type0',`val0`='$val0',`title1`='$title1',`img_sl1`='$img_sl1',`type1`='$type1',`val1`='$val1',`title2`='$title2',`img_sl2`='$img_sl2',`type2`='$type2',`val2`='$val2',`title3`='$title3',`img_sl3`='$img_sl3',`type3`='$type3',`val3`='$val3',`title4`='$title4',`img_sl4`='$img_sl4',`type4`='$type4',`val4`='$val4',`title5`='$title5',`img_sl5`='$img_sl5',`type5`='$type5',`val5`='$val5',`title6`='$title6',`img_sl6`='$img_sl6',`type6`='$type6',`val6`='$val6',`title7`='$title7',`img_sl7`='$img_sl7',`type7`='$type7',`val7`='$val7',`title8`='$title8',`img_sl8`='$img_sl8',`type8`='$type8',`val8`='$val8',`title9`='$title9',`img_sl9`='$img_sl9',`type9`='$type9',`val9`='$val9',`title10`='$title10',`img_sl10`='$img_sl10',`type10`='$type10',`val10`='$val10',`title11`='$title11',`img_sl11`='$img_sl11',`type11`='$type11',`val11`='$val11'");
			
			
			
		}
		$rowlp = $this->db->GetOne("select * from `@#_lp`"); 
	//	$web=System::load_sys_config('system');
		include $this->tpl(ROUTE_M,'config.lp');
	}
	public function luckylists(){	
		
		$list_where =" where type=1 order by id desc";
			
		$num=20;
	
		$total=$this->db->GetCount("SELECT COUNT(*) FROM `@#_member_lucky` $list_where");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,$num,$pagenum,"0");
		$recordlist=$this->db->GetPage("SELECT * FROM `@#_member_lucky` $list_where",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));	
		
		include $this->tpl(ROUTE_M,'config.luckylists');
		
	}
	public function luckycode(){	
		$id = $_GET['id'];
		$list_where =" where id='$id'";
		
	
	
		$record=$this->db->GetOne("SELECT * FROM `@#_member_lucky` $list_where");
		
		$member_where =" where uid='$record[uid]'";
		
		$user=$this->db->GetOne("SELECT * FROM `@#_member` $member_where");
		
		$user_dizhi=$this->db->GetOne("select * from `@#_member_dizhi` $member_where");//查询客户有没有填写地址
		
		if(isset($_POST['dosubmit'])){
			$id=htmlspecialchars($_POST['id']);
			$pass=htmlspecialchars($_POST['pass']);
			$company=htmlspecialchars($_POST['company']);
			$company_code=htmlspecialchars($_POST['company_code']);
			$list_where =" where id='$id'";
			$this->db->Query("UPDATE `@#_member_lucky` SET `pass`='$pass',`company`='$company',`company_code`='$company_code' $list_where");
		header("location:".G_MODULE_PATH."/setting/luckylists/");	
		}
		include $this->tpl(ROUTE_M,'config.luckycode');
		
	}	
	public function email(){
		$cesi=$this->segment(4);
		if($cesi=='cesi'){
			$youxiang=$this->segment(5);		
			$youxiang=str_replace("|",".",$youxiang);
			$ok=_sendemail($youxiang,'',"后台邮箱配置测试成功","<b>恭喜你邮箱测试成功</b>","1","0");
			if($ok=='1'){
				echo "邮件测试成功";
			}else{
				echo "邮件测试失败";
			}
			exit;
		}
		
		if(isset($_POST['dosubmit'])){
			$stmp_host=htmlspecialchars($_POST['server']);
			$email=htmlspecialchars($_POST['email']);
			$user=htmlspecialchars($_POST['user']);
			$pass=htmlspecialchars($_POST['pass']);
			$big=htmlspecialchars($_POST['big']);
			$fromName=htmlspecialchars($_POST['name']);
			$html=<<<HTML
			<?php 
			return array (	
				'stmp_host' => '{$stmp_host}',	//stmp服务器
				'user' => '{$user}',//账号
				'pass' => '{$pass}',		//密码
				'big' => '{$big}',				//发送编码
				'from' => "{$email}",//发件人
				'fromName' => "{$fromName}",  		//发件人名
				'nohtml' => "不支持HTML格式"  	//不支持HTML
			);
			?>
HTML;
			if(!is_writable(G_CONFIG.'email.inc.php')) _message('email.inc.php 没有写入权限!');
			$ok=file_put_contents(G_CONFIG.'email.inc.php',$html);
			if($ok){
				_message("操作成功");
			}
		}
		
		$info=System::load_sys_config("email");			
		include $this->tpl(ROUTE_M,'config.email');
	}
	
	
	/*短信配置与测试*/
	public function mobiles(){
		$memberMobcode=$this->db->GetOne("select * from `@#_membermobcode` where `id` = 1 and `pass` = 1");
		$account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $url = $memberMobcode['url'];  
       $timeout = $memberMobcode['timeout'];    
				if(isset($_POST['dosubmit'])){
            $account=htmlspecialchars($_POST['account']);
			$pswd=htmlspecialchars($_POST['pswd']);
			$url=htmlspecialchars($_POST['url']);
			$time=htmlspecialchars($_POST['time']);
            $this->db->Query("UPDATE `@#_membermobcode` SET `account`='$account',`pswd`='$pswd',`url`='$url',`timeout`='$time'");
                }
		include $this->tpl(ROUTE_M,'config.mobile');
	}
	
	
	public function mobile(){
		
		$mobile=array('mid'=>'','mpass'=>'');
		$mobile=System::load_sys_config("mobile");
		
		$cesi=$this->segment(4);		
		
		if(isset($_POST['dosubmit_ceshi'])){
			$sendobj = System::load_sys_class("sendmobile");
						
			$_POST['ceshi_haoma'] = trim($_POST['ceshi_haoma']);
			$_POST['ceshi_con'] = trim($_POST['ceshi_con']);
			
			if(empty($_POST['ceshi_con']) || empty($_POST['ceshi_haoma'])){
				echo json_encode(array("-1","内容或者手机号不能为空!"));
				return;
			}			
			$ret = $sendobj->mobile_con_check($_POST['ceshi_con']);
			
			//内容检测不合法返回
			if($ret[0]==-1){
				echo json_encode($ret);
				return;
			}
			if(!is_numeric($_POST['ceshi_haoma'])){
				echo json_encode(array("-1","手机号不正确!"));
				return;
			}
			$sendok=_sendmobile($_POST['ceshi_haoma'],$_POST['ceshi_con']);
			echo json_encode($sendok);
			return;			
		}/*if end*/
		
		if(isset($_POST['dosubmit'])){
		
				$cfg_id= trim($_POST['mid']);			
				$cfg_pass = trim($_POST['mpass']);	
				$cfg_qianming = trim(isset($_POST['mqianming']) ? $_POST['mqianming'] : '');
				$cfg_type  = abs(intval($_POST['interface']));		

						
				if($cfg_type == 1){
					$mobile['cfg_mobile_1']['mid']    		= $cfg_id;
					$mobile['cfg_mobile_1']['mpass']  		= $cfg_pass;
					$mobile['cfg_mobile_1']['mqianming']   	= $cfg_qianming;	
					$mobile['cfg_mobile_2']['mid'] 			= $mobile['cfg_mobile_2']['mid'];
					$mobile['cfg_mobile_2']['mpass'] 		= $mobile['cfg_mobile_2']['mpass'];
					$mobile['cfg_mobile_2']['mqianming']	= $mobile['cfg_mobile_2']['mqianming'];
				}
				
				if($cfg_type == 2){
					$mobile['cfg_mobile_1']['mid'] 			= $mobile['cfg_mobile_1']['mid'];
					$mobile['cfg_mobile_1']['mpass'] 		= $mobile['cfg_mobile_1']['mpass'];
					$mobile['cfg_mobile_1']['mqianming']	= $mobile['cfg_mobile_1']['mqianming'];
					$mobile['cfg_mobile_2']['mid'] 			= $cfg_id;
					$mobile['cfg_mobile_2']['mpass'] 		= $cfg_pass;
					$mobile['cfg_mobile_2']['mqianming']	= $cfg_qianming;				
				}		
				
				$mobile['cfg_mobile_on'] = $cfg_type;
						
				if(!is_writable(G_CONFIG.'mobile.inc.php')) _message('mobile.inc.php 没有写入权限!');
				
				$html  = var_export($mobile,true);
				$html  = "<?php \n return ".$html."; \n?>";
				$ok=file_put_contents(G_CONFIG.'mobile.inc.php',$html);
				if($ok){
					_message("短信配置更新成功!");
				}
		}
		
		$sendmobile=System::load_sys_class("sendmobile");
		
		//$sendmobile->GetBalance();
		
		if($sendmobile->error==1){
			$text2="<b style='color:#0c0'>短信功能正常</b>,短信还剩余 ".$sendmobile->v." 条";
		}else{
			$text2="<b style='color:#ff0000'>短信测试失败</b>,失败原因:".$sendmobile->v;
		}
		
		/*
		$new_mbl = $sendmobile->GetBalance_new();
		if($new_mbl['id']){
			$text1= "<b style='color:#0c0'>短信功能正常</b>,短信还剩余 ".$new_mbl['id']." 条";
		}else{
			$text1= "<b style='color:#ff0000'>短信测试失败</b>,失败原因:".$new_mbl['err'];
		}
		*/
		
		if(!isset($mobile['cfg_mobile_2'])){
			$mobile['cfg_mobile_1'] = $mobile['cfg_mobile_2'] = array(); 
			$mobile['cfg_mobile_2']['mid'] 			= $mobile['mid'];
			$mobile['cfg_mobile_2']['mpass'] 		= $mobile['mpass'];;
			$mobile['cfg_mobile_2']['mqianming']	= $mobile['mqianming'];		
			$mobile['cfg_mobile_1'] = array(); 
			$mobile['cfg_mobile_1']['mid'] 			= '';
			$mobile['cfg_mobile_1']['mpass'] 		= '';
			$mobile['cfg_mobile_1']['mqianming']	= '';
			
		}
		
		include $this->tpl(ROUTE_M,'config.mobile');
	}
	
	//上传配置
	public function upload(){	
	
		if(isset($_POST['dosubmit'])){
				$up_image_type = htmlspecialchars($_POST['up_image_type']);	
				$up_soft_type = htmlspecialchars($_POST['up_soft_type']);	
				$up_media_type = htmlspecialchars($_POST['up_media_type']);	
				$upsize = intval($_POST['upsize']);
				$up_image_type = trim($up_image_type,',');
				$up_soft_type = trim($up_soft_type,',');
				$up_media_type = trim($up_media_type,',');
								
				EditConfig("upload","upsize",$upsize,'xiao');
				EditConfig("upload","up_image_type",$up_image_type,'xiao');
				EditConfig("upload","up_soft_type",$up_soft_type,'xiao');
				EditConfig("upload","up_media_type",$up_media_type,'xiao');				
		
				_message("操作成功!");				
				
		}
	
		$web=System::load_sys_config('upload');
		/*	
			$up_image_type = implode(',',$web['up_image_type']);
			$up_soft_type = implode(',',$web['up_soft_type']);
			$up_media_type = implode(',',$web['up_media_type']);
		*/
		$up_image_type = $web['up_image_type'];
		$up_soft_type = $web['up_soft_type'];
		$up_media_type = $web['up_media_type'];
		include $this->tpl(ROUTE_M,'config.upload');
	}
	//水印配置
	public function watermark(){
		
		$upload_set = System::load_sys_config("upload");
		if(isset($_POST['dosubmit'])){
		
			$watermark_off = $_POST['watermark_off'];
			$watermark_type = $_POST['watermark_type'];
			
			$text = htmlspecialchars($_POST['text']);
			$color = htmlspecialchars($_POST['color']);
			$size = intval($_POST['size']);
			$font = $_POST['font'];
			
			$fontdir = dirname(dirname(__FILE__))."/api/lib/".$font;
			if(!file_exists($fontdir)){
				_message("字体文件不存在");
			}
			
			
			
			$width = intval($_POST['width']);
			$height = intval($_POST['height']);
			$image = htmlspecialchars($_POST['image']);
			$apache = intval($_POST['apache']);
			$good = intval($_POST['good']);
			$sel = htmlspecialchars($_POST['sel']);			
			$font = "";
			$html =<<<HTML
			<?php 
			/*
				上传和水印配置
				@up_image_type 		上传图片类型
				@up_soft_type		上传附件类型
				@up_media_type		上传媒体类型
				@upsize				允许单文件最大大小
				@watermark_off		水印开启
				@watermark_type		水印类型
				@watermark_condition
				@watermark_text		文本水印配置
				@watermark_image	图片水印地址
				@watermark_position 水印位置
			*/
			return array(
				'up_image_type' => '$upload_set[up_image_type]',
				'up_soft_type' => '$upload_set[up_soft_type]',
				'up_media_type' => '$upload_set[up_media_type]',
				'upsize' => '$upload_set[upsize]',
				'watermark_off' => '$watermark_off',
				'watermark_condition' => array('width'=>'$width','height'=>"$height"),
				'watermark_type' => '$watermark_type',
				'watermark_text' => array('text'=>"$text",'color'=>"$color",'size'=>"$size",'font'=>"$fontdir"),
				'watermark_image' => '$image',
				'watermark_position' => '$sel',
				'watermark_apache' => '$apache',
				'watermark_good' => '$good',
			);
			?>
HTML;

			$path = G_CONFIG.'/'.'upload.inc.php';
			file_put_contents($path,$html);
			_message("修改成功");
		}
				
		$upload_set['watermark_text']['font'] = basename($upload_set['watermark_text']['font']);
		
		include $this->tpl(ROUTE_M,'config.watermark');
	}
	
	
	//授权
	public function empower(){
		if(isset($_POST['dosubmit'])){
			$code=isset($_POST['code']) ? $_POST['code'] : null;
			if($code==null){
				_message('您输入的授权码格式不正确!');
			}
			$code = strtoupper($code);		
			$check = @fopen("","r");  
			if(!$check){  
				_message('您输入的授权码不正确!'); 
			}   
			$html="
				<?php 
					return array('code' => '$code');
				?>
			";
			$path = G_CONFIG.'/'.'code.inc.php';
			file_put_contents($path,$html);
			_message("绑定成功");
			
		}
		$code = System::load_sys_config("code","code");		
		if($code){
			echo <<<HTML
			<iframe src="" width="100%" height="100%" scrolling="no"  style=" border:0px;background:#fff; text-align:center"></iframe>
HTML;
		}else{
			include $this->tpl(ROUTE_M,'config.empower');	
		}		
	}
	
	//验证码配置
	public function checkcode(){
			if(isset($_POST['type'])){
			$info= array();
			$info['width']=$_POST['width'];
			$info['height']=$_POST['height'];
			$info['color']=$_POST['color'];
			$info['bgcolor']=$_POST['bgcolor'];
			$info['lenght']=$_POST['lenght'];
			$info['type']=$_POST['type'];
			
			$html_a=var_export($info,true);
			$html="
				<?php 
					return {$html_a};
				?>
			";
			$path = G_CONFIG.'/'.'checkcode.inc.php';
			file_put_contents($path,$html);
			}
			include $this->tpl(ROUTE_M,'config.checkcode');
	}
	
}//

?>