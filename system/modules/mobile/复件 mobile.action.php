<?php
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base','member','no');

System::load_app_fun('my');
System::load_app_fun('user');
System::load_sys_fun('user');

class mobile extends base {

	public function __construct() {
		parent::__construct();
		$this->db=System::load_sys_class('model');

	}

	public function  sql_demo(){
			$sql_text = file_get_contents("up.sql");
			$sql_text = explode(";",$sql_text);


			$ok = $this->db->GetOne("SHOW TABLES LIKE '@#_pay'");
			if(empty($ok)){
				echo "kong";
			}else{
				echo "nonull";
			}
	}

	//首页
	public function init(){
		$yid = $_GET['yid'];
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$footerF=5;
		$webname=$this->_cfg['web_name'];
		
		$meoney='0';	//0元专区
		$meoney0=$this->db->GetList("select * from `@#_shoplist` where `yunjiage` = '$money' and `q_uid` is null ORDER BY id DESC LIMIT 0,10");
		
        $new_shops=$this->db->GetList("select * from `@#_shoplist` where `pos` = '1' and `q_end_time` is null ORDER BY `id` DESC LIMIT 1,10");
		//最新商品
		$new_shop=$this->db->GetOne("select * from `@#_shoplist` where `pos` = '1' and `q_end_time` is null ORDER BY `id` DESC LIMIT 1");
		//即将揭晓
		$orders = '`q_end_time` is null';
		$orderlist=$this->db->GetList("select * from `@#_shoplist` where $orders ORDER BY `shenyurenshu` ASC LIMIT 118");
		$total=$this->db->GetCount("select * from `@#_shoplist` where $orders"); 
		
		//人气商品
		$num=118;
		$totals = ceil($total/$num);
	//	$orderlist=$this->db->GetList("select * from `@#_shoplist` where `renqi`='1' and `q_uid` is null  LIMIT '$num'");
		
		
		
		
		//首页幻灯片
		$indexbanner=$this->db->GetList("select * from `@#_wap` order by id desc");

		$max_renqi_qishu = 1;
		$max_renqi_qishu_id = 1;

		if(!empty($shoplistrenqi)){
			foreach ($shoplistrenqi as $renqikey =>$renqiinfo){
				if($renqiinfo['qishu'] >= $max_renqi_qishu){
					$max_renqi_qishu = $renqiinfo['qishu'];
					$max_renqi_qishu_id = $renqikey;
				}
			}
			$shoplistrenqi[$max_renqi_qishu_id]['t_max_qishu'] = 1;
		}
		$this_time = time();
		if(count($shoplistrenqi) > 1){
					if($shoplistrenqi[0]['time'] > $this_time - 86400*3)
					$shoplistrenqi[0]['t_new_goods'] = 1;
		}


		$w_jinri_time = strtotime(date('Y-m-d'));
		$w_minri_time = strtotime(date('Y-m-d',strtotime("+1 day")));



		//他们正在微购
		$go_record=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,7");
		//最新揭晓
		$shopqishu=$this->db->GetList("select qishu,id,sid,thumb,title,q_uid,q_user from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N' ORDER BY `q_end_time` DESC LIMIT 4");


		$jinri_shoplist = $this->db->GetList("select * from `@#_shoplist` where `xsjx_time` > '$w_jinri_time' and `xsjx_time` < '$w_minri_time' order by xsjx_time limit 0,3 ");

		//微购动态
		$tiezi=$this->db->GetList("select * from `@#_quanzi_tiezi` where `qzid` = '1' order by `time` DESC LIMIT 5");
		//晒单分享
		$shaidan=$this->db->GetList("select * from `@#_shaidan` order by `sd_id` DESC LIMIT 2");
		$shaidan_two=$this->db->GetList("select * from `@#_shaidan` order by `sd_id` DESC LIMIT 2,6");

		//总微购次数
		$user_shop_number = array();
		$uid='';
		$shopid='';
		if(!empty($jinri_shoplist)){

			foreach($jinri_shoplist as $key=>$val){
			   $uid=$val['q_uid'];
			   $qishu=$val['qishu'];
			   $shopid=$val['id'];
			 if($val['xsjx_time'] < time()){

			   $user_shop_list = $this->db->GetList("select * from `@#_member_go_record` where `uid`= '$uid' and `shopid` = '$shopid' and `shopqishu` = '$qishu'");
			   $user_shop_number[$uid][$shopid]=0;
				foreach($user_shop_list as $user_shop_n){
					//$user_shop_number[$uid][$shopid] += $user_shop_n['gonumber'];
					$user_shop_number[$uid][$shopid] += $user_shop_n['gonumber'];


				}
			 }
			}
		}
		//echo "<pre>";
		//print_r($jinri_shoplist);
		$two_cate_list = $this->db->GetList("select cateid,parentid,name from `@#_category` where `model` = '1' and `parentid` = '0' order by `order` DESC");

         $key="首页";
		include templates("mobile/index","index");
	}
	//order商品列表
	public function orderlist(){
		$yid = $_GET['yid'];
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$footerF=5;
		$webname=$this->_cfg['web_name'];
		
		$id = $this->segment(4);
		
		$num = 28;
		
		
		
		
		if($id==0){
			//人气商品
			$orders = '`renqi`=1 and `q_uid` is null ORDER BY `canyurenshu` desc';	
		$total=$this->db->GetCount("select * from `@#_shoplist` where $orders "); 
		$page=System::load_sys_class('page');
		if(isset($_POST['page'])){
			$pagenum=$_POST['page'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			//$pagenum=$page->page;
		}	
		$orderlist=$this->db->GetPage("select * from `@#_shoplist` where $orders ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));	
			
			
		
		
		}elseif($id==1){
			
			//即将揭晓
			
			$ran  = rand(0,10);
			if($ran>4){
				$orders = '`q_uid` is null  ORDER BY `canyurenshu` desc';
				}elseif($ran<=6 && $ran>=4){
				
				$orders = '`q_uid` is null  ORDER BY `shenyurenshu`,money desc';	
				}else{
					$orders = '`q_uid` is null  ORDER BY `shenyurenshu` ASC';
					}
			$total=$this->db->GetCount("select * from `@#_shoplist` where $orders "); 
			$totals = ceil($total/$num);
		$page=System::load_sys_class('page');
		if(isset($_POST['page'])){
			$pagenum=$_POST['page'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			//$pagenum=$page->page;
		}	
		$orderlist=$this->db->GetPage("select * from `@#_shoplist` where $orders ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));	
			
		
		
		}elseif($id==2){
		$orders = '`q_uid` is null order by `time` DESC';	
			//最新商品
			$total=$this->db->GetCount("select * from `@#_shoplist` where $orders "); 
			$totals = ceil($total/$num);
		$page=System::load_sys_class('page');
		if(isset($_POST['page'])){
			$pagenum=$_POST['page'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			//$pagenum=$page->page;
		}	
		$orderlist=$this->db->GetPage("select * from `@#_shoplist` where $orders",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));	
			
		
			
		}else{
		$orders = '`q_uid` is null ORDER BY `money` DESC';	
			//价值
		$total=$this->db->GetCount("select * from `@#_shoplist`   where $orders"); 
		$totals = ceil($total/$num);
		$page=System::load_sys_class('page');
		if(isset($_POST['page'])){
			$pagenum=$_POST['page'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			//$pagenum=$page->page;
		}	
		$orderlist=$this->db->GetPage("select * from `@#_shoplist`  where $orders ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
			
			}
		
		
		
		
        include templates("mobile/index","orderlist");
		
		
	}
	//商品详细
	public function itemajax(){
		$mysql_model=System::load_sys_class('model');
		$itemid=safe_replace($this->segment(4));
		$item=$mysql_model->GetOne("select * from `@#_shoplist` where `id`='".$itemid."' LIMIT 1");
		$uid=$mysql_model->GetOne("select * from `@#_member` where `uid`='".$item['q_uid']."' LIMIT 1");
		$mysql_model->Query("UPDATE `@#_shoplist` SET `q_showtime`='N' where `id`= $itemid");
		$temp =array();
		$temp = $item;
		$temp['user'] = empty($uid['username']) ? substr($uid['mobile'],0,3).'****'.substr($uid['mobile'],7,4) : $uid['username'];
		$temp['pic'] = G_UPLOAD_PATH.'/'.$item['thumb'];
		echo '<div style="width:90%; margin-left:5%;"><img width="90%" src='.$temp['pic'].'></div><div class="txt"><h6>'.$temp['title'].'</h6><div class="zj"><span>中奖</span><span style="color: #5bb6ea;">'.$temp['user']."</span></div></div>";exit;

	}
	//活动
	public function action(){
		$yid = $_GET['yid'];
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$footerF=5;
		$webname=$this->_cfg['web_name'];
		
		$id = $this->segment(4);
		
		
		
		if($id==1){
			$title = "1元专区";
			$meoney='1';	//1元专区
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `yunjiage` = 1 and `q_uid` is null ORDER BY id DESC LIMIT 0,128");
			
		}elseif($id==0){
			
			$title = "0元专区";
			$meoney='0';	//0元专区
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `yunjiage` = 0 and `q_uid` is null ORDER BY id DESC LIMIT 0,128");	
		
		
		}elseif($id==5){
			
			$title = "5元专区";
			$meoney='5';	//5元专区
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `yunjiage` = 5 and `q_uid` is null ORDER BY id DESC LIMIT 0,128");
			
		}elseif($id==10){
			
			$title = "10元专区";
			$meoney='10';	//10元专区
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `yunjiage` = 10 and `q_uid` is null ORDER BY id DESC LIMIT 0,128");	
		}elseif($id==100){
			
			$title = "100元专区";
			$meoney='100';	//100元专区
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `yunjiage` = 100 and `q_uid` is null ORDER BY id DESC LIMIT 0,128");
		
		}elseif($id==50){
			
			$title = "四人微购";
			
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `cateid` = 50 and `q_uid` is null ORDER BY id DESC LIMIT 0,128");	
			
		}else{
			
			$title = "活动专区";
			
			//人气商品
		    $shoplistrenqi=$this->db->GetList("select * from `@#_shoplist` where `renqi`='1' and `q_uid` is null  LIMIT 118");
			
			}
		
		
		
		

		
		include templates("mobile/index","action");
	}
	
	//所有产品
	public function action1(){
		$yid = $_GET['yid'];
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		$footerF=5;
		$webname=$this->_cfg['web_name'];
		
		$id = $this->segment(4);
		$ids = $this->segment(5);
		$two_cate_list = $this->db->GetList("select cateid,parentid,name from `@#_category` where `model` = '1' and `parentid` = '0' order by `order` DESC");
		$two_cate_one = $this->db->GetOne("select cateid,parentid,name from `@#_category` where `model` = '1' and `parentid` = '0' and cateid='$id' order by `order` DESC");
		$shoplistrenqi=$this->db->GetList("select * from `@#_category` where `parentid` = '$id' order by `cateid` DESC");
		if($ids==0){
			$title = "即将揭晓";
			$orders = 'order by `shenyurenshu` ASC';
		    
			
			
		
		
		}elseif($ids==1){
			
			$title = "人气";
			$orders = "and `renqi` = '1'";
		    
			
		}elseif($ids==2){
			
			$title = "最新";
			$orders = 'order by `time` DESC';
			
		    
		}elseif($ids==3){
			
			$title = "价值";
			
			$orders = 'order by `money` DESC';
		    
		}else{
			
			$title = "剩余人次";
			
			$orders = 'order by `shenyurenshu` ASC';
		    
			
			}
		
		
		
		

		
		include templates("mobile/index","action1");
	}
	
	

	//商品列表
	public function glist(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
        $webname=$this->_cfg['web_name'];
		$title="商品列表_"._cfg("web_name");

		$key="所有商品";
		$footerF=1;
		include templates("mobile/index","glist");
	}
	//ajax获取商品列表信息
	public function glistajax(){
	    $webname=$this->_cfg['web_name'];
		$cate_band =htmlspecialchars($this->segment(4));
		$select =htmlspecialchars($this->segment(5));
		$p =htmlspecialchars($this->segment(6)) ? $this->segment(6) :1;

		if(!$select){
			$select = '10';
		}
		if($cate_band){
			$fen1 = intval($cate_band);
			$cate_band = 'list';
		}
		if(empty($fen1)){
			$brand=$this->db->GetList("select * from `@#_brand` where 1 order by `order` DESC");
			$daohang = '所有分类';
		}else{
			$brand=$this->db->GetList("select * from `@#_brand` where `cateid`='$fen1' order by `order` DESC");
			$daohang=$this->db->GetOne("select * from `@#_category` where `cateid` = '$fen1' order by `order` DESC");
			$daohang = $daohang['name'];
		}

		$category=$this->db->GetList("select * from `@#_category` where `model` = '1'");

		//分页

		$end=10;
		$star=($p-1)*$end;

		$select_w = '';
		if($select == 10){
			$select_w = "order by `id` DESC";
		}
		if($select == 20){
			$select_w = 'order by `shenyurenshu` ASC';
			
		}
		if($select == 30){
			$select_w = 'order by `shenyurenshu` ASC';
		}
		if($select == 40){
			$select_w = 'order by `time` DESC';
		}
		if($select == 50){
			$select_w = 'order by `money` DESC';
		}
		if($select == 60){
			$select_w = 'order by `money` ASC';
		}

		if($fen1){
			$count=$this->db->GetList("select * from `@#_shoplist` where `q_uid` is null and `parentid`='$fen1' $select_w limit $star,$end");
		}else{
			$count=$this->db->GetList("select * from `@#_shoplist` where `q_uid` is null $select_w");
		}
		if($fen1){
			
			
			$shoplist=$this->db->GetList("select * from `@#_shoplist` where `q_uid` is null and `parentid`='$fen1' $select_w limit $star,$end");
		}else{
			$shoplist=$this->db->GetList("select * from `@#_shoplist` where `q_uid` is null $select_w limit $star,$end");
		}
		$max_renqi_qishu = 1;
		$max_renqi_qishu_id = 1;

		if(!empty($shoplistrenqi)){
			foreach ($shoplistrenqi as $renqikey =>$renqiinfo){
				if($renqiinfo['qishu'] >= $max_renqi_qishu){
					$max_renqi_qishu = $renqiinfo['qishu'];
					$max_renqi_qishu_id = $renqikey;
				}
			}
			$shoplistrenqi[$max_renqi_qishu_id]['t_max_qishu'] = 1;
		}


		$this_time = time();
		if(count($shoplist) > 1){
					if($shoplist[0]['time'] > $this_time - 86400*3)
					$shoplist[0]['t_new_goods'] = 1;
		}
		$pagex=ceil(count($count)/$end);
		if($p<=$pagex){
			$shoplist[0]['page']=$p+1;
		}
		if($pagex>0){
			$shoplist[0]['sum']=$pagex;
		}else if($pagex==0){
			$shoplist[0]['sum']=$pagex;
		}

		echo json_encode($shoplist);
	}

	//商品详细
	public function item(){
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		//$uids=_getcookie('uid');
		
	    $webname=$this->_cfg['web_name'];
		$key="商品详情";
		$mysql_model=System::load_sys_class('model');
		$itemid=safe_replace($this->segment(4));
		

		$item=$mysql_model->GetOne("select * from `@#_shoplist` where `id`='".$itemid."' LIMIT 1");
		if(!$item)_messagemobile("商品不存在！");
		if($item['q_end_time']){
			header("location: ".WEB_PATH."/mobile/mobile/dataserver/".$item['id']);
			exit;
		}
		$sid=$item['sid'];
		$sid_code=$mysql_model->GetOne("select * from `@#_shoplist` where `sid`='$sid' order by `id` DESC LIMIT 1,1");
		$sid_go_record=$mysql_model->GetOne("select * from `@#_member_go_record` where `shopid`='$sid_code[sid]' and `uid`='$sid_code[q_uid]' order by `id` DESC LIMIT 1");
		
		$yes_record=$mysql_model->GetOne("select * from `@#_member_go_record` where `shopid`='$itemid' and `uid`='$uid' order by `id` DESC LIMIT 1");//限购


		$category=$mysql_model->GetOne("select * from `@#_category` where `cateid` = '$item[cateid]' LIMIT 1");
		$brand=$mysql_model->GetOne("select * from `@#_brand` where `id`='$item[brandid]' LIMIT 1");

		$title=$item['title'];
		$syrs=$item['zongrenshu']-$item['canyurenshu'];
		$item['picarr'] = unserialize($item['picarr']) ;


		$us=$mysql_model->GetList("select * from `@#_member_go_record` where `shopid`='".$itemid."' AND `shopqishu`='".$item['qishu']."'ORDER BY id DESC LIMIT 6");

		//$us2=$mysql_model->GetList("select * from `@#_member_go_record` where `shopid`='".$itemid."' AND `shopqishu`='".$item['qishu']."'ORDER BY id DESC");

		$itemlist = $this->db->GetList("select * from `@#_shoplist` where `sid`='$item[sid]' and `q_end_time` is not null order by `qishu` DESC");

		//期数显示
		$loopqishu='';
		$loopqishu.='<li class="cur"><a href="javascript:;">'."第".$item['qishu']."期</a><b></b></li>";

		if(empty($itemlist)){
		foreach($itemlist as $qitem){
			$loopqishu.='<li><a href="'.WEB_PATH.'/mobile/mobile/item/'.$qitem['id'].'" class="">第'.$qitem['qishu'].'期</a></li>';

		}}

		foreach($itemlist as $qitem){
			if($qitem['id'] == $itemid){

				$loopqishu.='<li class="cur"><a href="javascript:;">'."第".$itemlist[0]['qishu']."期</a><b></b></li>";
			}else{
				$loopqishu.='<li><a href="'.WEB_PATH.'/mobile/mobile/dataserver/'.$qitem['id'].'" >第'.$qitem['qishu'].'期</a></li>';
			}
		}
		$gorecode=array();
		if(!empty($itemlist)){
		//查询上期的获奖者信息
			$gorecode=$this->db->GetOne("select * from `@#_member_go_record` where `shopid`='".$itemlist[0]['id']."' AND `shopqishu`='".$itemlist[0]['qishu']."' and huode!=0 ORDER BY id DESC LIMIT 1");
		}

		//echo "<pre>";
		//print_r($itemlist);
		//echo microt($itemlist[0]['q_end_time']);exit;
		 $curtime=time();
         $shopitem='itemfun';

		//晒单数
		$shopid=$this->db->GetOne("select * from `@#_shoplist` where `id`='$itemid'");
		$shoplist=$this->db->GetList("select * from `@#_shoplist` where `sid`='$shopid[sid]'");
		$shop='';
		foreach($shoplist as $list){
			$shop.=$list['id'].',';
		}
		$id=trim($shop,',');
		if($id){
			$shaidan=$this->db->GetList("select * from `@#_shaidan` where `sd_shopid` IN ($id)");
			$sum=0;
			foreach($shaidan as $sd){
				$shaidan_hueifu=$this->db->GetList("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd[sd_id]'");
				$sum=$sum+count($shaidan_hueifu);
			}
		}else{
			$shaidan=0;
			$sum=0;
		}
$footerF=2;
		include templates("mobile/index","item");
	}

	//往期商品查看
	public function dataserver(){
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$key="揭晓结果";
		$itemid=intval($this->segment(4));
		$item=$this->db->GetOne("select * from `@#_shoplist` where `id`='$itemid' and `q_end_time` is not null LIMIT 1");
		if(!$item){
			_messagemobile("商品不存在！");
		}
		if(empty($item['q_user_code'])){
			_messagemobile("该商品正在进行中...");
		}

		$itemlist = $this->db->GetList("select * from `@#_shoplist` where `sid`='$item[sid]' order by `qishu` DESC");
		$category=$this->db->GetOne("select * from `@#_category` where `cateid` = '$item[cateid]' LIMIT 1");
		$brand=$this->db->GetOne("select * from `@#_brand` where `id` = '$item[brandid]' LIMIT 1");

		//微购中奖码
		$q_user = unserialize($item['q_user']);
		$q_user_code_len = strlen($item['q_user_code']);
		$q_user_code_arr = array();
		for($q_i=0;$q_i < $q_user_code_len;$q_i++){
			$q_user_code_arr[$q_i] = substr($item['q_user_code'],$q_i,1);
		}

		//期数显示
		$loopqishu='';
		if(empty($itemlist[0]['q_end_time'])){
			$loopqishu.='<li><a href="'.WEB_PATH.'/mobile/mobile/item/'.$itemlist[0]['id'].'">'."第".$itemlist[0]['qishu']."期</a><b></b></li>";
			array_shift($itemlist);
		}

		foreach($itemlist as $qitem){
			if($qitem['id'] == $itemid){

				$loopqishu.='<li class="cur"><a href="javascript:;">'."第".$qitem['qishu']."期</a><b></b></li>";
			}else{
				$loopqishu.='<li><a href="'.WEB_PATH.'/mobile/mobile/dataserver/'.$qitem['id'].'" >第'.$qitem['qishu'].'期</a></li>';
			}
		}

		//总微购次数
		$user_shop_number = 0;
		//用户微购时间
		$user_shop_time = 0;
		//得到微购码
		$user_shop_codes = '';

		$user_shop_list = $this->db->GetList("select * from `@#_member_go_record` where `uid`= '$item[q_uid]' and `shopid` = '$itemid' and `shopqishu` = '$item[qishu]'");
		foreach($user_shop_list as $user_shop_n){
			$user_shop_number += $user_shop_n['gonumber'];
			if($user_shop_n['huode']){
				$user_shop_time = $user_shop_n['time'];
				$user_shop_codes = $user_shop_n['goucode'];
			}
		}

		$h=abs(date("H",$item['q_end_time']));
		$i=date("i",$item['q_end_time']);
		$s=date("s",$item['q_end_time']);
		$w=substr($item['q_end_time'],11,3);
		$user_shop_time_add = $h.$i.$s.$w;
		$user_shop_fmod = fmod($user_shop_time_add*100,$item['canyurenshu']);

		if($item['q_content']){
			$item['q_content'] = unserialize($item['q_content']);
		}
        $item['picarr'] = unserialize($item['picarr']) ;

		//记录
		$itemzx=$this->db->GetOne("select * from `@#_shoplist` where `sid`='$item[sid]' and `qishu`>'$item[qishu]' and `q_end_time` is null order by `qishu` DESC LIMIT 1");

	    $gorecode=$this->db->GetOne("select * from `@#_member_go_record` where `shopid`='".$itemid."' AND `shopqishu`='".$item['qishu']."' and `uid`= '$item[q_uid]' and huode!=0 LIMIT 1");
	    $gorecode_count=$this->db->GetOne("select sum(gonumber) as count from `@#_member_go_record` where `shopid`='".$itemid."' AND `shopqishu`='".$item['qishu']."' and `uid`= '$item[q_uid]'");
	    $gorecode_count=$gorecode_count ? $gorecode_count['count'] : 0;

		$shopitem='dataserverfun';
		$curtime=time();
		//晒单数
		$shopid=$this->db->GetOne("select * from `@#_shoplist` where `id`='$itemid'");
		$shoplist=$this->db->GetList("select * from `@#_shoplist` where `sid`='$shopid[sid]'");
		$shop='';
		foreach($shoplist as $list){
			$shop.=$list['id'].',';
		}
		$id=trim($shop,',');
		if($id){
			$shaidan=$this->db->GetList("select * from `@#_shaidan` where `sd_shopid` IN ($id)");
			$sum=0;
			foreach($shaidan as $sd){
				$shaidan_hueifu=$this->db->GetList("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd[sd_id]'");
				$sum=$sum+count($shaidan_hueifu);
			}
		}else{
			$shaidan=0;
			$sum=0;
		}
		$itemxq=0;
		if(!empty($itemzx)){
		  $itemxq=1;
		}
		

		include templates("mobile/index","item");
	}




	//************************************************//
	//************************************************//
	//************************************************//

	public function tenpaysuccess(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$code= _getcookie('CODE');
		if(!isset($_GET['attach'])){
			_messagemobile("暂时还没有信息!");
			exit;
		}
		if(!$code){
			_messagemobile("暂时还没有信息!");
			exit;
		}
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$total_fee      = $_GET['total_fee']/100+$member['money'];
		$attach         = $_GET['attach'];
		$sign           = $_GET['sign'];
		if($pay_result<1){
			$mysql_model->Query("UPDATE `@#_member` SET money='".$total_fee."' where uid='".$member['uid']."'");
			$shop=explode("&",$attach);
			gopay($member,$shop[0],$shop[1],$shop[2]);
		}
	}

	//最新揭晓
	public function lottery(){
		$footerF=100;
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
	     $webname=$this->_cfg['web_name'];
		//最新揭晓
		$wheres = "`q_end_time` is not null and `q_showtime` = 'N'";
		$shopqishu=$this->db->GetList("select * from `@#_shoplist` where $wheres ORDER BY `q_end_time` DESC LIMIT 0,4");
		
		


		$shoplist=$this->db->GetList("select * from `@#_shoplist` where $wheres ORDER BY `canyurenshu` DESC LIMIT 4");
		$member_record=$this->db->GetList("select * from `@#_member_go_record` order by id DESC limit 6");
		$key="最新揭晓";
		include templates("mobile/index","lottery");
	}

	//商品购买记录
	public function buyrecords(){
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
	    $webname=$this->_cfg['web_name'];
		$key="所有微购记录";
		$itemid=intval($this->segment(4));
		$page=System::load_sys_class('page');
		
		$total=$this->db->GetCount("select * from `@#_member_go_record` where `shopid`='$itemid'"); 
		
		//人气商品
		$num=40;
		$totals = ceil($total/$num);
		
		
if(isset($_POST['page'])){
$pagenum=$_POST['page'];
}else{$pagenum=1;}
$page->config($total,$num,$pagenum,"0");
if($pagenum>$page->page){
//$pagenum=$page->page;
}


		$cords=$this->db->GetPage("select * from `@#_member_go_record` where `shopid`='$itemid' order by id DESC ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
		if(!$cords){
			_messagemobile('暂时还没有人参与微购哦!');
		}
		include templates("mobile/index","buyrecords");
	}
	public function buyrecordslist(){
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
	    $webname=$this->_cfg['web_name'];
		$key="所有微购记录";
		$itemid=intval($this->segment(4));
		$page=System::load_sys_class('page');
		$total=$this->db->GetCount("select * from `@#_member_go_record` where `shopid`='$itemid'"); 
		$num=40;
		$totals = ceil($total/$num);
if(isset($_POST['page'])){
$pagenum=$_POST['page'];
}else{$pagenum=1;}
$page->config($total,$num,$pagenum,"0");
if($pagenum>$page->page){
//$pagenum=$page->page;
}


		$cords=$this->db->GetPage("select * from `@#_member_go_record` where `shopid`='$itemid' order by id DESC ",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));
		if(!$cords){
			_messagemobile('暂时还没有人参与微购哦!');
		}
		include templates("mobile/index","buyrecordslist");
	}
	//图文详细
	public function goodsdesc(){
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$key="图文详情";
		$itemid=intval($this->segment(4));
		$desc=$this->db->GetOne("select * from `@#_shoplist` where `id`='$itemid'");
		if(!$desc){
			_messagemobile('暂时还没有信息!');
		}
		include templates("mobile/index","goodsdesc");
	}
	//晒单评论
	public function goodspost(){
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	    $webname=$this->_cfg['web_name'];
		$key="晒单评论";
		$itemid=intval($this->segment(4));
		$shoplist=$this->db->GetList("select * from `@#_shoplist` where `sid`='$itemid'");
		if(!$shoplist){
			_messagemobile('暂时还没有信息!');
		}
		$shop='';
		foreach($shoplist as $list){
			$shop.=$list['id'].',';
		}
		$id=trim($shop,',');
		if($id){
			$shaidan=$this->db->GetList("select * from `@#_shaidan` where `sd_shopid` IN ($id) order by `sd_id` DESC");
			$sum=0;
			foreach($shaidan as $sd){
				$shaidan_hueifu=$this->db->GetList("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd[sd_id]'");
				$sum=$sum+count($shaidan_hueifu);
			}
		}else{
			$shaidan=0;
			$sum=0;
		}
		include templates("mobile/index","goodspost");
	}

	public function calResult(){
		
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	  $itemid=intval($this->segment(4));
	  	$item=$this->db->GetOne("select * from `@#_shoplist` where `id`='$itemid' LIMIT 1");

	    $h=abs(date("H",$item['q_end_time']));
		$i=date("i",$item['q_end_time']);
		$s=date("s",$item['q_end_time']);
		$w=substr($item['q_end_time'],11,3);
		$user_shop_time_add = $h.$i.$s.$w;
		$user_shop_fmod = fmod($user_shop_time_add*100,$item['canyurenshu']);

		if($item['q_content']){
			$item['q_content'] = unserialize($item['q_content']);
			$user_shop_time_add = $item['q_counttime'];
			$user_shop_fmod = fmod($item['q_counttime'],$item['canyurenshu']);
		}

        $item['picarr'] = unserialize($item['picarr']) ;

	  include templates("mobile/index","calResult");
	}
	//新手指南
	public function about(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	 $webname=$this->_cfg['web_name'];
	 $category=$this->db->GetOne("select * from `@#_category` where `parentid`='1' and `name`='新手指南'");

	 $article=$this->db->GetList("select * from `@#_article` where `cateid`='$category[cateid]'");

	include templates("mobile/index","about");
	}


	//用户服务协议
	public function terms(){
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
	  $webname=$this->_cfg['web_name'];
	 $category=$this->db->GetOne("select * from `@#_category` where `parentid`='1' and `name`='新手指南'");

	 $article=$this->db->GetOne("select * from `@#_article` where `cateid`='$category[cateid]' and `title`='服务协议' ");
	//echo "<pre>";
	//print_r($article);
	  include templates("mobile/system","terms");
	}

	//访问个人主页
	public function userindex(){
		
	  $webname=$this->_cfg['web_name'];
	  $uid=safe_replace($this->segment(4));
	  $user = $this->userinfo;
	  $uids = $user['uid'];
	  
	  //访客
	  if($uids!=$uid){
		if($uids){
		$memberfk=$this->db->GetOne("select * from `@#_member_visitors` where fkid='$uids' and uid='$uid'");
		$time = time();
			if($memberfk){
			$this->db->GetOne("UPDATE `@#_member_visitors` SET `time` = '$time' where fkid='$uids' and uid='$uid'");
			
		}else{
			$this->db->Query("insert into `@#_member_visitors` (`uid`,`fkid`,`time`) values ('$uid','$uids','$time')");
		}
		}
		}
	  //访客
	  //$uid=intval($this->segment(4))-1000000000;
	  //获取个人资料
	  $member=$this->db->GetOne("select * from `@#_member` where `uid`='$uid'");

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
	  
	  $yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
	  include templates("mobile/index","userindex");
	}

	/*
	//今日揭晓
	public function autolottery(){
	    $w_jinri_time = strtotime(date('Y-m-d'));
		$w_minri_time = strtotime(date('Y-m-d',strtotime("+1 day")));

		$jinri_shoplist = $this->db->GetList("select * from `@#_shoplist` where `xsjx_time` > '$w_jinri_time' and `xsjx_time` < '$w_minri_time' order by xsjx_time limit 0,3 ");
		include templates("mobile/index","buyrecords");

	}

	//明日揭晓
	public function nextautolottery(){
		$w_minri_time = strtotime(date('Y-m-d',strtotime("+1 day")));
		$w_houri_time = strtotime(date('Y-m-d',strtotime("+2 day")));

		$jinri_shoplist = $this->db->GetList("select * from `@#_shoplist` where `xsjx_time` > '$w_minri_time' and `xsjx_time` < '$w_houri_time' order by xsjx_time limit 0,3 ");
	}*/
}
?>