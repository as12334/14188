<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');

System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');


class group extends base {
	public function __construct() {	
			parent::__construct();
			$this->db = system::load_sys_class("model");
	}	
	
	/*会员是否加入该圈子*/
	private function user_add_group($qzid=0){
		if(!$this->userinfo)return false;		
		$addids = trim($this->userinfo['addgroup'],",").',';		
		if(strpos($addids,$qzid.',') === false){				
			return false;
		}
		return true;
	}
	
	public function init() {
		$member=$this->userinfo;		
		$title='圈子列表_'._cfg("web_name");	
		$t=$_GET['t'];
		$jingyan = $member['jingyan'];
		
		$dengji_1 = $this->db->GetOne("select * from `@#_member_group` where `jingyan_start` <= '$jingyan' and `jingyan_end` >= '$jingyan'");
		
		$quanzi=$this->db->GetList("select * from `@#_quanzi`  order by id desc");
		$sq = '';
		$tiezi_zd=$this->db->GetList("select * from `@#_quanzi_tiezi` where tiezi=0 and zhiding='Y' and shenhe='Y' order by id desc LIMIT 5 ");
		if($t==1){
			$sq .="order by id desc";
			}
		if($t==2){
			$sq .="order by dianji desc";
			}
		if($t==''){
			$sq .="order by hueifu desc";
			}		
		$tiezi=$this->db->GetList("select * from `@#_quanzi_tiezi` where tiezi=0 and  zhiding!='Y' and shenhe='Y' $sq LIMIT 10 ");
		$tiezi2=$this->db->GetList("select * from `@#_quanzi_tiezi` where tiezi=0 and  zhiding!='Y' and shenhe='Y' order by dianji desc LIMIT 6 ");
		
		$memberuid = $member['uid'];
		$m_huati=$this->db->GetCount("select * from `@#_quanzi_tiezi` where tiezi=0 and `hueiyuan`='$memberuid' and shenhe='Y'");
		$m_hueifu=$this->db->GetCount("select * from `@#_quanzi_tiezi` where tiezi!=0 and `hueiyuan`='$memberuid' and shenhe='Y'"); 
		include templates("group","index");
	}
	public function show() {
		$id=abs(intval($this->segment(4)));
		if(!$id){
			_message("还没有建立改圈子");
		}
		$quanzi=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$id'");		
		if(!$quanzi){
			_message("还没有建立改圈子");
		}
		$title=$quanzi['title']."_"._cfg("web_name");
		$keywords = $quanzi['jianjie'];
		$description = $quanzi['gongao'];
		
		$uid = $this->userinfo['uid'];	

		/*是否加入圈子*/
		  if(!$this->user_add_group($id)){				
			$addgroup = false;
		}else{
			$addgroup = true;
		}		
		/*是否加入圈子*/
			
		$num=10;
		$total=$this->db->GetCount("select * from `@#_quanzi_tiezi` WHERE qzid='$id'"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}	
		$qz=$this->db->GetPage("select * from `@#_quanzi_tiezi` WHERE qzid='$id' and `tiezi`='0' and `shenhe` = 'Y' order by zhiding DESC,id DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		
		include templates("group","list");
	}
	/*话题列表*/
	public function huatiList() {
		$id=abs(intval($this->segment(4)));
		if(!$id){
			_message("还没有建立改圈子");
		}
		$quanzi=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$id'");		
		if(!$quanzi){
			_message("还没有建立改圈子");
		}
		$title=$quanzi['title']."_"._cfg("web_name");
		$keywords = $quanzi['jianjie'];
		$description = $quanzi['gongao'];
		
		$uid = $this->userinfo['uid'];	

		/*是否加入圈子*/
		  if(!$this->user_add_group($id)){				
			$addgroup = false;
		}else{
			$addgroup = true;
		}		
		/*是否加入圈子*/
			
		$num=10;
		$total=$this->db->GetCount("select * from `@#_quanzi_tiezi` WHERE qzid='$id' and `tiezi`='0' and `shenhe` = 'Y' "); 
		$page=System::load_sys_class('jspage');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->jspage){
			$pagenum=$page->jspage;
		}	
		$qz=$this->db->GetPage("select * from `@#_quanzi_tiezi` WHERE qzid='$id' and `tiezi`='0' and `shenhe` = 'Y' order by zhiding DESC,id DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		
		include templates("group","huatiList");
	}
	
	/*加入圈子与退出*/
	public function goqz(){
	
		$uid = $this->userinfo['uid'];
		if(!$uid)exit;
		$qzid=intval($_POST['id']);		
		$text=$_POST['text'];
		
		$chengyuan=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$qzid'");
		if(!$chengyuan)return;
		
		if($text=="退出"){
		    if(!$this->user_add_group($qzid)){				
				return;
			}
			$iqroup = str_ireplace($qzid.",","",$this->userinfo['addgroup']);
			$cy = $chengyuan['chengyuan']-1;	
				
		}else{		
			if($this->user_add_group($qzid)){				
				return;
			}
			$iqroup = $this->userinfo['addgroup'].$qzid.',';
			$cy = $chengyuan['chengyuan']+1;
		}
				
		$this->db->Query("UPDATE `@#_member` SET `addgroup`='$iqroup' where `uid`='$uid'");
		$this->db->Query("UPDATE `@#_quanzi` SET `chengyuan`='$cy' where `id`='$qzid'");
	}
	
	/*发表圈子帖子*/
	public function showinsert(){	
		if(!$this->userinfo){ echo "未登录";exit();} //_message("未登录",WEB_PATH);
		$uid = $this->userinfo['uid'];
		$action=$_GET['action'];
			$title = htmlspecialchars($_GET['txtTopicTitleEx']);
			$neirong=$_GET['txtTopicContent'];
			$qzid=intval($_GET['qzid']);		
		if($action=="EditorAjax"){		
				
			
			/*是否加入圈子*/				
		    if(!$this->user_add_group($qzid)){				
				echo ("您还未加入该圈子");exit();
			}		
			/*是否加入圈子*/
						
			/*验证码*		
			$group_syzm = _getcookie("checkcode");			
			$group_pyzm = isset($_POST['group_code']) ? strtoupper($_POST['group_code']) : '';			
			if(empty($group_pyzm)){
				_message("请输入验证码");
			}
			if($group_syzm != md5($group_pyzm)){
				_message("验证码不正确");
			}
			/*验证码*/
											
		
			$quanzi = $this->db->GetOne("select * from `@#_quanzi` where `id` = '$qzid' LIMIT 1");
			if(!$quanzi){echo ("该圈子不存在");}
			
			
			if($quanzi['glfatie'] == 'N' && $quanzi['guanli'] != $uid){			
					echo ($quanzi['title'].": 会员不能发帖!");
			}			
			if($title==null || $neirong==null){echo ("不能为空");}
			$time=time();
			
			$tiezi=$this->db->GetOne("select * from `@#_quanzi_tiezi` where `hueiyuan` = '$uid' and `qzid` = '$qzid' and `title` = '$title' and `neirong` = '$neirong'");
			if($tiezi){echo ("不能重复提交");}
						
			if($quanzi['shenhe'] == 'Y'){
				$shenhe = 'N';
			}else{
				$shenhe = 'Y';
			}
			$shairecord=$this->db->GetOne("select * from `@#_member_go_record` where `uid`='$uid'");
			
			if(!$shairecord){
	echo "亲，参与过"._cfg("web_name_two")."就可以发表啦！";
	}else{
			$this->db->Query("INSERT INTO `@#_quanzi_tiezi`(`qzid`,`hueiyuan`,`title`,`neirong`,`zuihou`,`shenhe`,`time`)VALUES('$qzid','$uid','$title','$neirong','$uid','$shenhe','$time')");
			$tiez=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$qzid'");
			$tznum=$tiez['tiezi']+1;
			$this->db->Query("UPDATE `@#_quanzi` SET `tiezi`='$tznum' where `id`='$qzid'");
			echo 1000;
		}
			
			

			//_message("添加成功",$_SERVER['HTTP_REFERER']);
		}
	}
	
	/*帖子回复显示页*/
	public function nei(){
		$uid = $this->userinfo['uid'];
		$id=abs(intval($this->segment(4)));
		if(!$id)_message("页面错误");
		$tiezi=$this->db->GetOne("select * from `@#_quanzi_tiezi` where `id`='$id'");
		/*圈子是否能加入*/
		$tid = $tiezi['qzid'];
		$tiezijoin=$this->db->GetOne("select * from `@#_quanzi` where `id`='$tid'");
		/*圈子是否能加入*/	
		
		/*是否加入圈子*/
		  if(!$this->user_add_group($tid)){				
			$addgroup = false;
		}else{
			$addgroup = true;
		}		
		/*是否加入圈子*/
		
		if(!$tiezi)_message("页面错误");
		$tid = $tiezi['id'];
		$dianji=$tiezi['dianji']+1;
		$this->db->Query("UPDATE `@#_quanzi_tiezi` SET `dianji`='$dianji' where `id`='$id'");
	
		$title=$tiezi['title']."_"._cfg("web_name");
		$keywords =$tiezi['title'];
		$description = _htmtocode(_strcut($tiezi['neirong'],0,250));
		
		$member=$this->db->GetOne("select * from `@#_member` where `uid`='$tiezi[hueiyuan]'");		
		$quanzi=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$tiezi[qzid]'");
		
		$num=10;
		$total=$this->db->GetCount("select * from `@#_quanzi_tiezi` where `tiezi` = '$id'"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}	
		$hueifu=$this->db->GetPage("select * from `@#_quanzi_tiezi` WHERE tiezi='$id' and `shenhe` = 'Y' order by id DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
		
		include templates("group","nei");
	}
	
	/*ajax帖子回复显示页*/
	public function neifu(){
		$uid = $this->userinfo['uid'];
		$id=abs(intval($this->segment(4)));
		if(!$id)_message("页面错误");
		$tiezi=$this->db->GetOne("select * from `@#_quanzi_tiezi` where `id`='$id'");
		$tid = $tiezi['id'];
		if(!$tiezi)_message("页面错误");
		
		$dianji=$tiezi['dianji']+1;
		$this->db->Query("UPDATE `@#_quanzi_tiezi` SET `dianji`='$dianji' where `id`='$id'");
	
		$title=$tiezi['title']."_"._cfg("web_name");
		$keywords =$tiezi['title'];
		$description = _htmtocode(_strcut($tiezi['neirong'],0,250));
		
		$member=$this->db->GetOne("select * from `@#_member` where `uid`='$tiezi[hueiyuan]'");		
		$quanzi=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$tiezi[qzid]'");
		
		$num=10;
		$total=$this->db->GetCount("select * from `@#_quanzi_tiezi` where `tiezi` = '$id' and `shenhe` = 'Y'"); 
		$page=System::load_sys_class('jspage');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->jspage){
			$pagenum=$page->jspage;
		}	
		$hueifu=$this->db->GetPage("select * from `@#_quanzi_tiezi` WHERE tiezi='$id' and `shenhe` = 'Y' order by id DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
		include templates("group","neifu");
	}
	
	
	/*发表帖子回复*/
	public function hueifuinsert(){	
		$uid = $this->userinfo['uid'];
		if($uid==null){
		echo ("未登录");exit();
		}
		/*是否加入圈子*/				
		   		
		$action = isset($_GET['action']) ? ($_GET['action']) : '';	
		if($action=="EditorAjax"){
				
		
		$tzid=intval($_GET['tzid']);
		$hueifu=_htmtocode($_GET['sdhf_content']);
		$qzid=intval($_GET['qzid']);		
		
	//	$tiezijoin=$this->db->GetOne("select * from `@#_quanzi_tiezi` where `qzid`='$qzid'");
		 if(!$this->user_add_group($qzid)){				
				echo ("您还未加入该圈子哦！亲");exit();
			}
		$qzinfo = $this->db->GetOne("SELECT * FROM `@#_quanzi` WHERE `id` = '$qzid'");
		if(!$qzinfo || $qzinfo['huifu']=='N'){
			echo ("该圈子禁用回复!");exit();
			
		}
		
		
				
		
		if($hueifu==null){echo ("内容不能为空");exit();}
		
		if($tzid<=0){echo ("错误");exit();}
		$hftime=time();
		if($qzinfo['shenhe'] == 'Y'){
			$shenhe = 'N';
		}else{
			$shenhe = 'Y';
		}
		
		$hueifurecord=$this->db->GetOne("select * from `@#_member_go_record` where `uid`='$uid'");
		
		if(!$hueifurecord){
	echo "亲，参与过"._cfg("web_name_two")."就可以回复啦！";
	}else{
			$this->db->Query("INSERT INTO `@#_quanzi_tiezi`(`qzid`,`tiezi`,`hueiyuan`,`neirong`,`shenhe`,`time`)VALUES('$qzid','$tzid','$uid','$hueifu','$shenhe','$hftime')");
		
		$tiezi=$this->db->GetOne("select * from `@#_quanzi_tiezi` where `id`='$tzid'");
		$hfnum=$tiezi['hueifu']+1;
		$this->db->Query("UPDATE `@#_quanzi_tiezi` SET `hueifu`='$hfnum' where `id`='$tzid'");
			echo 1000;
		}
		
		
		
		
		if($qzinfo['shenhe'] == 'Y'){
			
			//_message("添加成功,需要管理员审核");
		}
		//_message("添加成功");
	
	}
 }
}

?>