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
public function init(){
	
$sdtype=$_GET['sdtype'];
$title="晒单分享";
$num=40;
$total=$this->db->GetCount("select * from `@#_shaidan` where sd_pass=1");
$page=System::load_sys_class('page');
if(isset($_GET['p'])){
$pagenum=$_GET['p'];
}else{$pagenum=1;}
$page->config($total,$num,$pagenum,"0");
if($pagenum>$page->page){
$pagenum=$page->page;
}
        
		$sq = '';
		if($sdtype==10 || $sdtype==''){$sq .= "`sd_id` DESC";}
		if($sdtype==20){$sq .= "`sd_ping` DESC";}
		if($sdtype==30){$sq .= "`sd_id` asc";}
		if($sdtype==40){$sq .= "`sd_zhan` DESC";}
		
$shaidan=$this->db->GetPage("select * from `@#_shaidan` where sd_pass=1 order by $sq  ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));



$lie=4;$sum=$num;
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
include templates("index","shaidan");
}
//晒单详情
public function detail(){
$member=$this->userinfo;
$sd_id=abs(intval($this->segment(4)));
//阅读

$this->db->Query("UPDATE `@#_shaidan` SET sd_read_num=sd_read_num+1 where sd_id='".$sd_id."'");

$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
$goods = $this->db->GetOne("select sid from `@#_shoplist` where `id` = '$shaidan[sd_shopid]'");
$goods = $this->db->GetOne("select id,qishu,money,q_uid,maxqishu,thumb,title from `@#_shoplist` where `sid` = '$goods[sid]' order by `qishu` DESC");
$total=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id'");
$sdheight = $total*200;
//他的其他晒单
$shaidanself=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`!='$sd_id' and sd_userid='$shaidan[sd_userid]' and sd_pass=1 order by `sd_id` DESC");
$sd_idself = $shaidanself['sd_id'];
$totalself=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_idself'");
//其他获得者
$sq = "`sd_zhan` DESC";
$num=5;
$shaidanother=$this->db->GetPage("select * from `@#_shaidan` where sd_pass=1 order by $sq  ",array("num"=>$num,"page"=>0,"type"=>1,"cache"=>0));


if(isset($_POST['submit'])){
$sdhf_syzm = _getcookie("checkcode");
$sdhf_pyzm = isset($_POST['sdhf_code']) ?strtoupper($_POST['sdhf_code']) : '';
$sdhf_id=$shaidan['sd_id'];
$sdhf_userid=$member['uid'];
$sdhf_content=$_POST['sdhf_content'];
$sdhf_time=time();
$sdhf_username = _htmtocode(get_user_name($member));
$sdhf_img = _htmtocode($member['img']);
if(empty($sdhf_content)){
_message("页面错误");
}
if(empty($sdhf_pyzm)){
_message("请输入验证码");
}
if($sdhf_syzm !=md5($sdhf_pyzm)){
_message("验证码不正确");
}
$this->db->Query("INSERT INTO `@#_shaidan_hueifu`(`sdhf_id`,`sdhf_userid`,`sdhf_content`,`sdhf_time`,`sdhf_username`,`sdhf_img`)VALUES
			('$sdhf_id','$sdhf_userid','$sdhf_content','$sdhf_time','$sdhf_username','$sdhf_img')");
$sd_ping=$shaidan['sd_ping']+1;
$this->db->Query("UPDATE `@#_shaidan` SET sd_ping='$sd_ping' where sd_id='$shaidan[sd_id]'");
_message("评论成功",WEB_PATH."/go/shaidan/detail/".$sd_id);
}
$shaidannew=$this->db->GetList("select * from `@#_shaidan` where sd_pass=1 order by `sd_id` DESC limit 8");


$shaidan_hueifu=$this->db->GetList("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' LIMIT 10");
foreach($shaidan_hueifu as $k=>$v){
$shaidan_hueifu[$k]['sdhf_content'] = _htmtocode($shaidan_hueifu[$k]['sdhf_content']);
}
if(!$shaidan){
_message("页面错误");
}
$substr=substr($shaidan['sd_photolist'],0,-1);
$sd_photolist=explode(";",$substr);

$title = $shaidan['sd_title'] ."_"._cfg("web_name");
$keywords = $shaidan['sd_title'];
$description = $shaidan['sd_title'];
include templates("index","detail");
}

//羡慕
public function xianmu(){
$sd_id=intval($_POST['id']);
$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
$sd_zhan=$shaidan['sd_zhan']+1;
$this->db->Query("UPDATE `@#_shaidan` SET sd_zhan='".$sd_zhan."' where sd_id='".$sd_id."'");
echo $sd_zhan;
}
//晒单说话
public function shaidan_ping_iframe(){
	$member=$this->userinfo;
	$sd_id=abs(intval($this->segment(4)));
	$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
	$num=10;
$total=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' order by id desc");
$page=System::load_sys_class('jspage');
if(isset($_GET['p'])){
$pagenum=$_GET['p'];
}else{$pagenum=1;}
$page->config($total,$num,$pagenum,"0");
if($pagenum>$page->jspage){
$pagenum=$page->jspage;
}
	$shaidan_hueifu=$this->db->GetPage("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' order by id desc  ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
	include templates("index","shaidan_ping_iframe");
}
public function EditorAjax(){
	$member=$this->userinfo;
	$action = isset($_GET['action']) ?($_GET['action']) : '';
	$sd_id=intval($_GET['sd_id']);
	$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");

$sdhf_id=$shaidan['sd_id'];
$sdhf_userid=$member['uid'];
$sdhf_content=$_GET['sdhf_content'];
$sdhf_time=time();
$sdhf_username = _htmtocode(get_user_name($member));
$sdhf_img = _htmtocode($member['img']);
$shairecord=$this->db->GetOne("select * from `@#_member_go_record` where `uid`='$sdhf_userid'");

	
	if($action == "EditorAjax"){
		
		if(!$shairecord){
	echo "亲，参与过"._cfg("web_name_two")."就可以评论啦！";
	}else{
			$this->db->Query("INSERT INTO `@#_shaidan_hueifu`(`sdhf_id`,`sdhf_userid`,`sdhf_content`,`sdhf_time`,`sdhf_username`,`sdhf_img`)VALUES
			('$sdhf_id','$sdhf_userid','$sdhf_content','$sdhf_time','$sdhf_username','$sdhf_img')");
			$sd_ping=$shaidan['sd_ping']+1;
		    $this->db->Query("UPDATE `@#_shaidan` SET sd_ping='$sd_ping' where sd_id='$sd_id'");
			echo 1000;
		}

	
	//include templates("index","Editor");
	}
}
public function Editor(){
	$member=$this->userinfo;
	$sd_id=abs(intval($this->segment(4)));
	$shaidan=$this->db->GetOne("select * from `@#_shaidan` where `sd_id`='$sd_id'");
	$num=10;
$total=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' order by id desc");
$page=System::load_sys_class('page');
if(isset($_GET['p'])){
$pagenum=$_GET['p'];
}else{$pagenum=1;}
$page->config($total,$num,$pagenum,"0");
if($pagenum>$page->page){
$pagenum=$page->page;
}
	$shaidan_hueifu=$this->db->GetPage("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id' order by id desc  ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
	include templates("index","Editor");
}

public function itmeifram(){
$itemid=safe_replace($this->segment(4));
$item=$this->db->GetOne("select * from `@#_shoplist` where `id`='$itemid' LIMIT 1");
$shop_sid=$this->db->GetList("select id from `@#_shoplist` where `sid`='$item[sid]' and `id` != '$itemid' order by id desc");
$shop_sid_str='';
for($i=0;$i<count($shop_sid);$i++){
$shop_sid_str.=$shop_sid[$i]['id'].',';
}
$shop_sid_str=trim($shop_sid_str,',');
if(!empty($shop_sid_str)){
$error = 0;
$page=System::load_sys_class('page');
$total=$this->db->GetCount("select * from `@#_shaidan` where   sd_pass=1 and `sd_shopid` in ($shop_sid_str)");
if(isset($_GET['p'])){
$pagenum=$_GET['p'];
}else{
$pagenum=1;
}
$num=10;
$page->config($total,$num,$pagenum,"0");
$shaidan=$this->db->GetPage("select * from `@#_shaidan` where `sd_shopsid` = '$item[sid]'  and sd_pass=1  order by sd_id  DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
foreach($shaidan as $k=>$v){
$t = explode(';',$v['sd_photolist']);
$shaidan[$k]['sd_photolist']=$t;
}
foreach($shaidan as $key=>$val){
$member_info=$this->db->GetOne("select * from `@#_member` where `uid`='$val[sd_userid]'");
$member_img[$val['sd_id']]=$member_info['img'];
$member_id[$val['sd_id']]=$member_info['uid'];
$member_username[$val['sd_id']]=$member_info['username'];
}
}else{
$error = 1;
}
include templates("index","itemifram");
}
}
