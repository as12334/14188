<?php  

/* 更新会员*/
					//$this->db->Autocommit_commit();
		$uid = $go_user_info['b_uid'];
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
			_message("登录失败请检查cookie!",G_WEB_PATH);
			header("Location:".G_WEB_PATH);
		}	
				/* 更新会员end*/


?>  