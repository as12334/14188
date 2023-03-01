<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');
System::load_sys_fun("user");

class us extends base{
	public function __construct() {	
	
		$uid = abs(intval($this->segment(4)));
		parent::__construct();
		if(!$uid)_message("参数不正确!");	
		if($uid > 1000000000)$uid = $uid-1000000000;		
		$this->uid = $uid;
		
	}
	public function uname(){
		$mysql_model=System::load_sys_class('model');
		$title="个人主页";
		$index = $this->uid;	
		$tab=$this->segment(3);
		$member=$mysql_model->GetOne("select * from `@#_member` where uid='$index'");
		$mdd = explode(",",$member['user_ip']);
		$madd = $mdd[0];
		$jingyan = $member['jingyan'];
		
		$dengji_1 = $mysql_model->GetOne("select * from `@#_member_group` where `jingyan_start` <= '$jingyan' and `jingyan_end` >= '$jingyan'");
		$user = $this->userinfo;
		$uid = $user['uid'];
		$memberfks=$mysql_model->GetList("select * from `@#_member_visitors` where uid='$index' order by `time` DESC limit 0,14");
		if($uid!=$index){
		if($uid){
		$memberfk=$mysql_model->GetOne("select * from `@#_member_visitors` where fkid='$uid' and uid='$index'");
		$time = time();
			if($memberfk){
			$mysql_model->GetOne("UPDATE `@#_member_visitors` SET `time` = '$time' where fkid='$uid' and uid='$index'");
			
		}else{
			$mysql_model->Query("insert into `@#_member_visitors` (`uid`,`fkid`,`time`) values ('$index','$uid','$time')");
		}
		}
		}
		if($member){
			$membergo=$mysql_model->GetList("select * from `@#_member_go_record` where uid='$index' order by `id` DESC limit 0,10 ");	
			include templates("us","index");
		}else{
			_message("页面错误",WEB_PATH,3);
		}
	}
	
	public function userbuy(){
		$memberself=$this->userinfo;
		$mysql_model=System::load_sys_class('model');
		$title="购买记录";
		$index = $this->uid;		
		$tab=$this->segment(3);
		$num=20;
$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}
		
		$member=$mysql_model->GetOne("select * from `@#_member` where uid='$index'");
		
		if($member){
			$total=$mysql_model->GetCount("select * from `@#_member_go_record` where uid='$index'");
			$membergo=$mysql_model->GetPage("select * from `@#_member_go_record` where uid='$index' order by `id` DESC ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));	
			
				
			include templates("us","userbuy");
		}else{
			_message("页面错误",WEB_PATH,3);
		}
	}
	public function userraffle(){
		$mysql_model=System::load_sys_class('model');
		$memberself=$this->userinfo;
		$title="获得的商品";
		$index = $this->uid;		
		$tab=$this->segment(3);
		$member=$mysql_model->GetOne("select * from `@#_member` where uid='$index'");
		$memberhuode=$mysql_model->GetList("select * from `@#_member_go_record` where uid='$index' and `huode` > '10000000' order by `id` DESC limit 0,20");		
		if($member){
			include templates("us","userraffle");
		}else{
			_message("页面错误",WEB_PATH,3);
		}
	}
	public function userpost(){
		$memberself=$this->userinfo;
		$mysql_model=System::load_sys_class('model');
		$title="晒单";
		$index = $this->uid;		
		$tab=$this->segment(3);
		$member=$mysql_model->GetOne("select * from `@#_member` where uid='$index'");
		
		if($member){
			$shaidan=$mysql_model->GetList("select * from `@#_shaidan` where sd_userid='$index' and sd_pass=1 order by `sd_id` DESC limit 20");		
			include templates("us","userpost");
		}else{
			_message("页面错误",WEB_PATH,3);
		}
	}
}

?>