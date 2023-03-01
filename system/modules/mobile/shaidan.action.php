<?php 

defined('G_IN_SYSTEM')or exit('no');
System::load_app_fun('global',G_ADMIN_DIR);
System::load_app_fun('my','go');
System::load_app_fun('user','go');
System::load_app_class("base","member","no");
System::load_sys_fun('user');
class shaidan extends base {
	public $db;
	public function __construct(){	
		parent::__construct();
		$this->db=System::load_sys_class('model');		
		
	}
	
	//晒单分享
	public function init(){
		$yid = $_GET['yid'];
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$footerF=200;		
	    $webname=$this->_cfg['web_name'];
		$key="晒单";
		include templates("mobile/index","shaidan");
	}
	public function shaidanajax(){
		$parm=htmlspecialchars($this->segment(4));
		$p=htmlspecialchars($this->segment(5)) ? htmlspecialchars($this->segment(5)) :1;
		//分页		
		$end=10;
		$star=($p-1)*$end;
		
		if($parm=='new'){
			$sel='`sd_time`';
		}else if($parm=='renqi'){
			$sel='`sd_zhan`';
		}else if($parm=='pinglun'){
			$sel='`sd_ping`';
		}
		$count=$this->db->GetList("select * from `@#_shaidan` where sd_pass=1 order by $sel DESC");		
		$shaidan=$this->db->GetList("select * from `@#_shaidan` where sd_pass=1 order by $sel DESC limit $star,$end");		
	
		foreach($shaidan as $sd){
			$user[]=get_user_name($sd['sd_userid']);
			$time[]=date("Y-m-d H:i",$sd['sd_time']);
			$member=$this->db->GetOne("select * from `@#_member` where `uid`='$sd[sd_userid]'");
			$pic[]=$member['img'];
		}
		for($i=0;$i<count($shaidan);$i++){
			$shaidan[$i]['user']=$user[$i];
			$shaidan[$i]['time']=$time[$i];
			$shaidan[$i]['pic']=$pic[$i];
		}
		$pagex=ceil(count($count)/$end);
		if($p<=$pagex){
			$shaidan[0]['page']=$p+1;
		}
		if($pagex>0){
			$shaidan[0]['sum']=$pagex;
		}else if($pagex==0){
			$shaidan[0]['sum']=$pagex;
		}
		echo json_encode($shaidan);
	}
	
	public function detail(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$key="晒单分享";			
		$member=$this->userinfo;	
		$sd_id=intval($this->segment(4));
		$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
		//阅读

        $this->db->Query("UPDATE `@#_shaidan` SET sd_read_num=sd_read_num+1 where sd_id='".$sd_id."'");
		$goods = $this->db->GetOne("select * from `@#_shoplist` where `sid` = '$shaidan[sd_shopid]' order by `qishu` DESC");
		$total=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id'");
					
		$shaidannew=$this->db->GetList("select * from `@#_shaidan` order by `sd_id` DESC limit 5");
		$shaidan_hueifu=$this->db->GetList("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' order by `id` DESC");
		if(!$shaidan){
			//_message("页面错误");
			echo "页面错误";
		}
		$substr=substr($shaidan['sd_photolist'],0,-1);
		$sd_photolist=explode(";",$substr);
		
		include templates("mobile/index","detail");
	}
	public function detailList(){
	   	$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$member=$this->userinfo;	
		$sd_id=intval($this->segment(4));
		$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
		
		$total=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id'");
					
		
		$shaidan_hueifu=$this->db->GetList("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' order by `id` DESC");
		
		
		include templates("mobile/index","detailList");
	}
	public function plajax(){
	    $webname=$this->_cfg['web_name'];
		$member=$this->userinfo;
		if(!is_array($member)){
			echo "请登录";exit;
		}
		$sdhf_id=$_POST['sd_id'];
		$sdhf_userid=$member['uid'];
		$sdhf_content=$_POST['count'];
		$sdhf_time=time();
		$shairecord=$this->db->GetOne("select * from `@#_member_go_record` where `uid`='$sdhf_userid'");
		if(!$shairecord){
	      echo "亲，参与过"._cfg("web_name_two")."就可以评论啦！";exit;
	    }
		if($sdhf_content==null){
			echo "内容不能为空";exit;
		}
		$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sdhf_id'");
		$this->db->Query("INSERT INTO `@#_shaidan_hueifu`(`sdhf_id`,`sdhf_userid`,`sdhf_content`,`sdhf_time`)VALUES
		('$sdhf_id','$sdhf_userid','$sdhf_content','$sdhf_time')");
		$sd_ping=$shaidan['sd_ping']+1;
		$this->db->Query("UPDATE `@#_shaidan` SET sd_ping='$sd_ping' where sd_id='$shaidan[sd_id]'");
		echo "1";	
	}
	//羡慕嫉妒恨
	public function xianmu(){
	    $webname=$this->_cfg['web_name'];
		$sd_id=$_POST['id'];
		$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
		$sd_zhan=$shaidan['sd_zhan']+1;
		$this->db->Query("UPDATE `@#_shaidan` SET sd_zhan='".$sd_zhan."' where sd_id='".$sd_id."'");
		echo $sd_zhan;
	}
}
?>