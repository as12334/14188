<?php 

defined('G_IN_SYSTEM')or exit('no');
System::load_app_class('admin',G_ADMIN_DIR,'no');
System::load_app_fun('global',G_ADMIN_DIR);
class shaidan_admin extends admin {
	private $db;
	public function __construct(){		
		parent::__construct();	
		$this->ment=array(
			array("lists","晒单管理",ROUTE_M.'/'.ROUTE_C.""),
			array("addcate","晒单回复管理",ROUTE_M.'/'.ROUTE_C."/sd_hueifu"),
		);
		$this->db=System::load_sys_class('model');		
	} 	
	public function init(){	
	$info=$this->AdminInfo;
		$num=10;
		$total=$this->db->GetCount("select * from `@#_shaidan`"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}	
		$shaidan=$this->db->GetPage("select * from `@#_shaidan`",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		include $this->tpl(ROUTE_M,'shaidan.list');
	}
	public function sd_show(){
		$id=intval($this->segment(4));
		$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$id'");
		$substr=substr($shaidan['sd_photolist'],0,-1);
        $sd_photolist=explode(";",$substr);
			
		include $this->tpl(ROUTE_M,'shaidan.show');	
	}
	public function sd_fufen(){
		//$id=intval($this->segment(4));
		$action=$_GET['action'];
		$id=$_GET['id'];
		$sd_fufen=$_GET['sd_fufen'];
		
		if($action=='sd_fufen'){
		$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$id'");
		$time=time();
		$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$shaidan[sd_userid]','1','微积分','晒单奖励','$sd_fufen','$time')");
		$this->db->Query("UPDATE `@#_shaidan` SET sd_fufen='$sd_fufen',sd_pass=1 where `sd_id`='$id'");
		$this->db->Query("UPDATE `@#_member` SET score=score+'$sd_fufen' where `uid`='$shaidan[sd_userid]'");
			echo 1000;
		}
	}
	public function sd_pass(){
		$id=intval($this->segment(4));
		$this->db->Query("UPDATE `@#_shaidan` SET sd_pass=2 where `sd_id`='$id'");	
		header("location:".G_MODULE_PATH."/shaidan_admin/");	
	}
	public function sd_del(){
		$id=intval($this->segment(4));
		$shaidanx=$this->db->getlist("select * from `@#_shaidan` where `sd_id`='$id' limit 1 ");
		if($shaidanx){
			$this->db->Query("DELETE FROM `@#_shaidan` where `sd_id`='$id' ");
			_message("删除成功");
		}else{
			_message("参数错误");
		}		
	}
	public function hf_del(){
		$id=intval($this->segment(4));
		$shaidanx=$this->db->getlist("select * from `@#_shaidan_hueifu` where `id`='$id' limit 1 ");
		if($shaidanx){
			$this->db->Query("DELETE FROM `@#_shaidan_hueifu` where `id`='$id' ");
			_message("删除成功");
		}else{
			_message("参数错误");
		}
	}
	public function sd_hueifu(){
		$member=$this->db->getlist("select * from `@#_member`");
		$num=20;
		$total=$this->db->GetCount("select * from `@#_shaidan_hueifu`"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}	
		$shaidan=$this->db->GetPage("select * from `@#_shaidan_hueifu`",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		include $this->tpl(ROUTE_M,'shaidan.liuyan');
	}
}
?>