<?php  

/* 添加新会员*/
			$member_db=System::load_app_class('base','member');
		
		
		
		$go_user_time = time();
		//if(!$go_user_info)$go_user_infos=array('nickname'=>'QU'.$go_user_time.rand(0,9));
		$go_y_user = $this->db->GetOne("select * from `@#_member` where `username` = '$go_user_infos[nickname]' LIMIT 1");
		
	//	if($go_y_user)$go_user_infos['nickname'] .= rand(1000,9999);
		//$go_user_name = _htmtocode($go_user_infos['nickname']);
		$go_user_name = ($go_user_infos['nickname']);
		if($go_user_name==""){_message("获取信息超时，请稍后再试!",WEB_PATH."/mobile/mobile");}
	//	$go_user_img  = 'photo/member.jpg';
		$go_user_himg  = $go_user_infos['headimgurl'];
		$go_user_img = $this->saveimage($go_user_himg);
	
		if($go_user_himg==""){_message("获取信息超时，请稍后再试!",WEB_PATH."/mobile/mobile");}
		$go_user_pass = md5('123456');
		$wx_openid    = $openid;
		$this->db->Autocommit_start();
		
		$q1 = $this->db->Query("INSERT INTO `@#_member` (`username`,`password`,`img`,`band`,yaoqing,`time`,`getType`) VALUES ('$go_user_name','$go_user_pass','$go_user_img','weixin','$yaoqing','$go_user_time','$getType')");
		$go_user_id = $this->db->insert_id();
		$q2 = $this->db->Query("INSERT INTO `@#_member_band` (`b_uid`, `b_type`, `b_code`, `b_time`) VALUES ('$go_user_id', 'weixin', '$wx_openid', '$go_user_time')");
		
		if($q1 && $q2){
			//$this->db->Autocommit_commit();
		$uid = $go_user_id;
			$member = $this->db->GetOne("select uid,password,mobile,email from `@#_member` where `uid` = '$uid' LIMIT 1");		
		$_COOKIE['uid'] = null;
		$_COOKIE['ushell'] = null;
		$_COOKIE['UID'] = null;
		$_COOKIE['USHELL'] = null;	
		
		$time = time();
		$user_ip = _get_ip_dizhi();
		$this->db->GetOne("UPDATE `@#_member` SET `user_ip` = '$user_ip',`login_time` = '$time' where `uid` = '$uid'");
		
		_setcookie("wuid",($member['uid']),60*60*24*7);			
		$s1 = _setcookie("uid",_encrypt($member['uid']),60*60*24*7);			
		$s2 = _setcookie("ushell",_encrypt(md5($member['uid'].$member['password'].$member['mobile'].$member['email'])),60*60*24*7);
	
	
		$domain = System::load_sys_config('domain');
		
		if(isset($domain[$_SERVER['HTTP_HOST']])){
			if($domain[$_SERVER['HTTP_HOST']]['m'] == 'mobile'){
					$callback_url =  WEB_PATH."/mobile/home";
			}else{
					$callback_url =  WEB_PATH."/mobile/home";					
			}				
		}else{
			$callback_url =  WEB_PATH."/mobile/home";	
		}	

		if($s1 && $s2){
			if(!$member['email'] || !$member['mobile']){
				header("Location:".$callback_url);
				//_message("登录成功，请绑定邮箱或手机号和及时修改默认密码!",$callback_url);
			}
				//_message("登录成功!",$callback_url);
				header("Location:".$callback_url);
		}else{
			//_message("登录失败请检查cookie!",G_WEB_PATH);
			header("Location:".WEB_PATH."/mobile/home");
		}		

		}else{
			$this->db->Autocommit_rollback();
			_message("登录失败!",G_WEB_PATH);
		}
		/* 添加新会员end*/


?>  