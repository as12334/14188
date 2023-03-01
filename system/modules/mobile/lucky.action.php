<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');

System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');
System::load_sys_fun('user');


class lucky extends base {
	private $arr;
	private $proArr;
	public function __construct() {	
			parent::__construct();
			$this->db = system::load_sys_class("model");
	}	
	
	
	
	public function init() {
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$title="免费抽奖";
		
		$rowlp = $this->db->GetOne("select * from `@#_lp`"); 
 
	  $limit = rand(0,300);
	  
	  $limits = rand(30,70);
	  
	  $memberlist=$this->db->GetList("select * from  `@#_member`  where `auto_user`='1' ORDER BY `uid` DESC limit $limit,$limits");
	  
	  $time = "刚刚";
	
		
		include templates("mobile/index","lucky");
	}
	
	/*抽奖板面*/
	public function luckyshow() {
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		
		include templates("mobile/index","luckyshow");
		
	}
	
	/*抽奖数据*/
	public function data() {
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		include("data.php");
		
	}
	/*抽奖记录*/
	public function luckylist() {
		$yid = $this->segment(4);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);

		
		$webname=$this->_cfg['web_name'];
		$title="提现充值记录";
		$member_number=$this->db->GetList("select * from `@#_member_number` where uid='".$uid."'  limit 2");//查询客户有没有绑定账号
		$member_dizhi=$this->db->GetOne("select * from `@#_member_dizhi` where uid='".$uid."'  limit 1");//查询客户有没有填写地址
		
		$rowmoney2 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=2"); 
		$rowmoney3 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=3"); 
		$rowmoney4 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=4"); 
		$moneycount2=$rowmoney2['sum(money)'];
		$moneycount3=$rowmoney3['sum(money)'];
		$moneycount4=$rowmoney4['sum(money)'];
		$moneycount= $moneycount2 - $moneycount3 - $moneycount4;
		$luckylist=$this->db->GetList("select * from  `@#_member_lucky`  where `uid`='$uid' and (type=2 or type=1) ORDER BY `id` DESC limit 0,30");
		if(!empty($luckylist)){
		  $recount=1;
		}
		include templates("mobile/index","luckylist");
		
	}
	/*中奖详细页*/
	public function luckynei() {
		$yid = $this->segment(5);
		$user = $this->userinfo;
		$uid = $user['uid'];
		$uids = base64_encode($uid);
		$id = $this->segment(4);
		$luckynei = $this->db->GetOne("select * from `@#_member_lucky` WHERE `id`='$id' and type=1");
		$member_dizhi=$this->db->GetOne("select * from `@#_member_dizhi` where uid='".$uid."'  limit 1");//查询客户有没有填写地址
		$title=$luckynei['content'];
		include templates("mobile/index","luckynei");
		
	}
	/*收货*/
	public function shouhuo() {
		
		$id = $this->segment(4);
		$mrecode=$this->db->Query("UPDATE `@#_member_lucky` SET `pass`='3' WHERE `id`='$id' ");		
		header("location:".WEB_PATH."/mobile/lucky/luckylist/");
		
	}
	//计算佣金余额
	function yue(){
		$user = $this->userinfo;
		$uid = $user['uid'];
		$fufen = System::load_app_config("user_fufen",'','member');
		
		$rowmoney2 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=2"); 
		$rowmoney3 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=3"); 
		$rowmoney4 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=4"); 
		$moneycount2=$rowmoney2['sum(money)'];
		$moneycounts=$rowmoney3['sum(money)']+$rowmoney4['sum(money)'];
		
		$moneycount= $moneycount2 - $moneycounts;
		
			
		include templates("mobile/index","yue");
		
	}
	//提现记录
	public function record(){
		$mysql_model=System::load_sys_class('model');
		$member=$this->userinfo;
		$uid = $member['uid'];
		$recount=0;
		$fufen = System::load_app_config("user_fufen",'','member');
		//查询提现记录	 
		//$recordarr=$mysql_model->GetList("select * from `@#_member_recodes` a left join `@#_member_cashout` b on a.cashoutid=b.id where a.`uid`='$uid' and a.`type`='-3' ORDER BY a.`time` DESC");		$recordarr=
		
		$recordarr=$mysql_model->GetList("select * from  `@#_member_cashout`  where `uid`='$uid' ORDER BY `time` DESC limit 0,40");
        
		if(!empty($recordarr)){
		  $recount=1;
		}		
		include templates("mobile/index","record");
	}
		//现金充值到账户
	public function useryj(){
		$cur = 6;
		$member=$this->userinfo;	
		$uid = $member['uid'];
		$title="账户记录 - "._cfg("web_name");		
		
		$total=$this->db->GetCount("select * from `@#_member_lucky` where `uid`='$uid' and `type` = '4'");
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,20,$pagenum,"0");		
		$account = $this->db->GetPage("select * from `@#_member_lucky` where `uid`='$uid' and `type` = '4' ORDER BY time DESC",array("num"=>40,"page"=>$pagenum,"type"=>1,"cache"=>0));
				
		include templates("mobile/index","useryj");
	}
	function cashout(){
		

        $webname=$this->_cfg['web_name'];
        $member=$this->userinfo;
		$uid = $member['uid'];
        $title="我的会员中心";
		
        $rowmoney2 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=2"); 
		$rowmoney3 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=3"); 
		$rowmoney4 = $this->db->GetOne("select sum(money) from `@#_member_lucky` WHERE `uid`='$uid' and type=4"); 
		$moneycount2=$rowmoney2['sum(money)'];
		$moneycounts=$rowmoney3['sum(money)']+$rowmoney4['sum(money)'];
		
		$moneycount= $moneycount2 - $moneycounts;


        $action = ($_GET['action']);
		

       if($action == "submit1"){ //提现	     
		 $money      = (intval($_GET['money']));
		 $numid      = (intval($_GET['numid']));
		 $member_number=$this->db->GetOne("select * from `@#_member_number` where uid='".$uid."' and id='".$numid."'  limit 1");
		 
		 $username   = $member_number['username'];
		 $bankname   = "";
		 $branch     = 1;
		 $banknumber = $member_number['banknumber'];
		 $linkphone  = $member_number['linkphone'];
		 $time       =time();
		 $type       = -3;  //收取1/消费-1/充值-2/提现-3
		 if(!$member_number){echo ("您还没有绑定账号哦！");exit;}
		 if($money==""){echo ("请填写提现的金额！");exit;}
		 if($money<10){echo ("提现的金额要大于10微币哦！");exit;}
		 if($moneycount<10){
		     echo ("佣金金额大于10微币才能提现！");exit;
		
		 }elseif($moneycount<$money ){  
		     echo ("输入额超出总现金金额！");exit;
		 }else{
			 
		 
		 //插入提现申请表  这里不用在佣金表中插入记录 等后台审核才插入
		 $this->db->Query("INSERT INTO `@#_member_cashout`(`uid`,`money`,`username`,`bankname`,`branch`,`banknumber`,`linkphone`,`time`,`type`)VALUES
			('$uid','$money','$username','$bankname','$branch','$banknumber','$linkphone','$time','2')"); 
			
		 $this->db->Query("INSERT INTO `@#_member_lucky`(`uid`,`type`,`content`,`money`,`time`)VALUES('$uid','3','提现','$money','$time' )"); 	
			echo 1000;
		 }	   
	   }
	   
	   if($action == "submit2"){//充值			
		  $money      = abs(intval($_GET['money']));		
		  $type       = 1;
		  $pay        ="现金";
		  $time       =time();
		  $content    ="使用现金充值到账户";
		  
		 if($money <= 0){
			  echo ("充值金额要大于1");exit;
		 }
		 if($money > $moneycount){
			  echo ("输入额超出总现金金额！");exit;
		 }	
		
		  //插入记录
		 $account=$this->db->Query("INSERT INTO `@#_member_lucky`(`uid`,`type`,`content`,`money`,`time`)VALUES('$uid','4','$content','$money','$time' )"); 
		 
		 // 查询是否有该记录
		 if($account){		    
			 //修改剩余金额
			 $leavemoney=$member['money']+$money;			 
			 $mrecode=$this->db->Query("UPDATE `@#_member` SET `money`='$leavemoney' WHERE `uid`='$uid' ");			 
			 //在中奖表中插入记录		 
		    
			echo 1000;
		 }else{
		     echo ("充值失败！");exit;
		 }	
	   }

       
    }


	
}

?>