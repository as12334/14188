<?php 

class getshop extends SystemAction {

	//ajax
	public function lottery_shop_json(){

		if(!isset($_GET['gid'])){
			echo json_encode(array("error"=>'1'));
			return;exit;
		}
		$gid  = trim($_GET['gid']);
		$times = (int)System::load_sys_config('system','goods_end_time');
		if(!$times){$times = 1;}	
		
		$db = System::load_sys_class('model');
		$gid = safe_replace($gid);
		$gid = str_ireplace("select","",$gid);
		$gid = str_ireplace("union","",$gid);	
		$gid = str_ireplace("'","",$gid);	
		$gid = str_ireplace("%27","",$gid);
		$gid  = trim($gid,',');
	
		if(!$gid){
			$info = $db->GetOne("select qishu,xsjx_time,id,zongrenshu,thumb,title,q_uid,q_user,q_user_code,q_end_time from `@#_shoplist` where `q_showtime` = 'Y' order by `q_end_time` ASC");
		}else{		
			$infos = $db->GetList("select  qishu,xsjx_time,id,zongrenshu,thumb,title,q_uid,q_user,q_user_code,q_end_time from `@#_shoplist` where `q_showtime` = 'Y' order by `q_end_time` ASC limit 0,4");			
			$gid = @explode('_',$gid);		
			$info = false;		
			foreach($infos as $infov){
				if(!in_array($infov['id'],$gid)){
					$info = $infov;
					break;
				}
			}			
		}
		
		if(!$info){
			echo json_encode(array("error"=>'1'));
			return;exit;
		}		
		
		if($info['xsjx_time']){$info['q_end_time'] = $info['q_end_time']+$times;}
		
		System::load_sys_fun("user");
		$user = unserialize($info['q_user']);
		$user = get_user_name($info['q_uid'],"username");
		$uid  = $info['q_uid'];
		$upload = G_UPLOAD_PATH;
		
		$q_time = substr($info['q_end_time'],0,10);
		
		if($q_time <= time()){
			$db->Query("update `@#_shoplist` SET `q_showtime` = 'N' where `id` = '$info[id]' and `q_showtime` = 'Y' and `q_uid` is not null");
			echo json_encode(array("error"=>'-1'));			
			return;	exit;
		}	
		$user_shop_number = $db->GetOne("select sum(gonumber) as gonumber from `@#_member_go_record` where `uid`= '$uid' and `shopid` = '$info[id]' and `shopqishu` = '$info[qishu]'");
		$user_shop_number= $user_shop_number['gonumber'];
		$times = $q_time-time();	
		echo json_encode(array("error"=>"0","user_shop_number"=>"$user_shop_number","user"=>"$user","zongrenshu"=>$info['zongrenshu'],"q_user_code"=>$info['q_user_code'],"qishu"=>$info['qishu'],"upload"=>$upload,"thumb"=>$info['thumb'],"id"=>$info['id'],"uid"=>"$uid","title"=>$info['title'],"user"=>$user,"times"=>$times));
		exit;
	}

	
	
	//ajax	
	public function lottery_shop_get(){
		if(isset($_POST['lottery_shop_get'])){
			$db = System::load_sys_class('model');
			$times = (int)System::load_sys_config('system','goods_end_time');
			$gid = isset($_POST['gid']) ? abs(intval($_POST['gid'])) : exit();
			$info = $db->GetOne("select id,xsjx_time,q_end_time from `@#_shoplist` where `id` ='$gid' and `q_showtime` = 'Y'");
			if(!$info){
				echo "no";exit;
			}
			if($info['xsjx_time']){$info['q_end_time'] = $info['q_end_time']+$times;}
			$q_time =  intval(substr($info['q_end_time'],0,10));
			if($q_time <= time()){
				$db->Query("update `@#_shoplist` SET `q_showtime` = 'N' where `id` = '$info[id]' and `q_showtime` = 'Y' and `q_uid` is not null");
			}
			echo $q_time - time();			
			exit;						
		}
	}
	
	//ajax
	public function lottery_shop_set(){
		if(isset($_POST['lottery_sub'])){
			$db = System::load_sys_class('model');
			$times = (int)System::load_sys_config('system','goods_end_time');
			$gid = isset($_POST['gid']) ? abs(intval($_POST['gid'])) : exit();
			$info = $db->GetOne("select id,xsjx_time,thumb,title,q_uid,q_user,q_end_time from `@#_shoplist` where `id` ='$gid'");
			
			if(!$info || empty($info['q_end_time'])){
				echo '0';exit;
			}		
			if($info['xsjx_time']){$info['q_end_time'] = $info['q_end_time']+$times;}
			$times =  str_ireplace(".","",$info['q_end_time']);
			$q_time = substr($info['q_end_time'],0,10);
			$q = false;
			if(time() >= $q_time){
				$q = $db->Query("update `@#_shoplist` SET `q_showtime` = 'N',`renqipos`=1 where `id` = '$gid' and `q_showtime` = 'Y' and `q_uid` is not null");	
				
			/**
*	发送用户手机获奖短信
*	mobile @用户手机号
*   uid    @用户的ID
*	code   @中奖码
*/
				$shoplist = $db->GetOne("select * from `@#_shoplist` where `id` ='$gid'");
		$uid      =  $shoplist['q_uid'];
		$code     =  $shoplist['q_user_code'];
		
		
		$member   = $db->GetOne("select * from `@#_member` where `uid` = '$uid' ");
		$mobile   = $member['mobile'];
		

						
		$template = $db->GetOne("select * from `@#_caches` where `key` = 'template_mobile_shop'");
		
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
			
	//	return _sendmobile($mobile,$content);
	$webname=_cfg("web_name");
	$content =  "【".$webname."】".$content;
	$memberMobcode = $db->GetOne("select * from `@#_membermobcode` where `id` = '1' and `pass` = '1'");
	   $ch = curl_init();
       $timeout = 20;
	   
	   $account = $memberMobcode['account']; 
	   $pswd = $memberMobcode['pswd']; 
	   $sendurl = $memberMobcode['url'];    
       /** 有些curl版本的post这样的数据格式 **/
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
	//  $db->Query("UPDATE `@#_shoplist` SET `renqipos`=2  where `id` ='$gid'");
	
				//
			}
			if($q)
				echo '1';
			else
				echo '0';
		}
	}//
	

}

?>