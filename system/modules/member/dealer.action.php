<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('admin',G_ADMIN_DIR,'no');
class dealer extends admin {
	public $member_count_num = 0;
	public $member_del_num = 0;
	public $member_new_num = 0;
	public function __construct(){
		parent::__construct();
		$this->db=System::load_sys_class("model");
		$this->ment=array(
						array("lists","商家列表",ROUTE_M.'/'.ROUTE_C."/lists"),
						//array("lists","查找商家",ROUTE_M.'/'.ROUTE_C."/select"),
						array("insert","添加商家",ROUTE_M.'/'.ROUTE_C."/insert"),					
						
					
		);
		$table = "@#_member_dealer";
		/*共有商家*/
			$this->member_count_num = $this->db->GetCount("SELECT COUNT(*) FROM `$table`");
			//$member_count_num = $this->db->GetCount("SELECT COUNT(*) FROM `$table`"); 
		/*删除商家*/
			$this->member_del_num = $this->db->GetNum("SELECT uid FROM `$table` where 1");
		/*今日新增*/
			$time = strtotime(date("Y-m-d"));
			$this->member_new_num = $this->db->GetNum("SELECT uid FROM `$table` where `time` > '$time'");
	} 
	
	
	/*
		显示商家
		根据第四个参数显示不同类型商家
		@def 		默认商家
		@del 		删除商家
		@noreg 		未认证商家
		@b_qq 		QQ绑定商家
		@b_weibo 	微博绑定商家
		@b_taobao 	淘宝绑定商家
		@day_new	今日新增
		@day_shop	今日消费
		
					....
		第五个参数排序字段
		uid,money,time,jingyan,score
					....
		第六个参数排序类型
		desc,asc
					....		
	*/
	public function lists(){
		$info=$this->AdminInfo;

		$table = "@#_member_dealer";
		$user_type = (!$this->segment(4)) ? 'def' : $this->segment(4);
		$user_ziduan = (!$this->segment(5)) ? 'uid' : $this->segment(5);
		$user_order = (!$this->segment(6)) ? 'desc' : $this->segment(6);
		
		
		$user_type_arr = array("def"=>"默认商家","del"=>"删除商家","noreg"=>"未认证商家","day_new"=>"今日新增","day_shop"=>"今日消费","b_qq"=>"QQ绑定商家","b_weibo"=>"微博绑定商家","b_taobao"=>"淘宝绑定商家");
		if(!isset($user_type_arr[$user_type])){
			$user_type = "def";		
		}		
	//	if($user_type == 'del'){$table = "@#_member_del";}else{$table = "@#_member";}
		
		$user_ziduan_arr = array("id"=>"商家ID","time"=>"入驻时间");	
		if(!isset($user_ziduan_arr[$user_ziduan])){
			$user_ziduan = "uid";
		
		}
		
		
		if($user_order != "desc" && $user_order != "asc"){			
			$user_order = 'desc';
			$user_order_cn = "倒序显示";
		}else{
			$user_order_cn = "正序显示";
		}
		
		$sql_where = '' ;			
		switch($user_type){
			case 'def':
				$sql_where = "(`emailcode` = '1' or `mobilecode` = '1') or `band` is not null";
			break; 
			case 'del':
				$sql_where = '1';	
			break; 
			case 'noreg':
				$sql_where = "`emailcode` <> '1' and `mobilecode` <> '1' and `band` is null";
			break;
			case 'b_qq':
				$sql_where = "`band` LIKE '%qq%'";
			break; 
			case 'b_weibo':
				$sql_where = "`band` LIKE '%weibo%'";
			break;
			case 'b_taobao':
				$sql_where = "`band` LIKE '%taobao%'";		
			break;
			case 'day_new':
				$day_time = strtotime(date("Y-m-d"));				
				$sql_where = "`time` > '$day_time'";		
			break;
			case 'day_shop':
				$day_time = strtotime(date("Y-m-d")).'.000';
				$uids = '';
				$conutc = $this->db->GetList("SELECT uid FROM `@#_member_go_record` WHERE `time` > '$day_time'");				
				foreach($conutc as $c){
					$uids .= "'".$c['uid']."',";
				}
				$uids = trim($uids,",");
				if(!empty($uids)){
					$sql_where = "`uid` in($uids)";
				}else{
					$sql_where = "`uid` in('0')";
				}
				
			break;			
			default:	
				$sql_where = "`emailcode` = '1' or `mobilecode` = '1'";
			break;			
		}
				
		
		$this_path = WEB_PATH."/".ROUTE_M."/".ROUTE_C."/".ROUTE_A;
		$select_where = "当前查看{$user_type_arr[$user_type]} - 使用{$user_ziduan_arr[$user_ziduan]} - {$user_order_cn}";
		
		$num=20;
		$total=$this->db->GetCount("SELECT COUNT(*) FROM `$table` "); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,$num,$pagenum,"0");	
		$members=$this->db->GetPage("SELECT * FROM `$table` order by id desc",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0)); 	

	//	$members=$this->db->GetPage("SELECT * FROM `$table` order by id desc "); 
		include $this->tpl(ROUTE_M,'dealer.lists');
		
	}
	//添加商家
	public function insert(){
		$mysql_model=System::load_sys_class('model');
		$member_allgroup=$mysql_model->Getlist("select groupid,name from `@#_member_group`");

		if(isset($_POST['submit'])){
			
			
			$img = htmlspecialchars($_POST['thumb']);
			$email=htmlspecialchars(trim($_POST['email']));
			$mobile=htmlspecialchars(trim($_POST['mobile']));
			
			$shopname=htmlspecialchars(trim($_POST['shopname']));
			$shopid=htmlspecialchars(trim($_POST['shopid']));
			$shopurl=htmlspecialchars(trim($_POST['shopurl']));
			$shopbzj=htmlspecialchars(trim($_POST['shopbzj']));
			$shopmiaoshu=htmlspecialchars(trim($_POST['shopmiaoshu']));
			$shopfuwu=htmlspecialchars(trim($_POST['shopfuwu']));
			$shopwuliu=htmlspecialchars(trim($_POST['shopwuliu']));
			$username=htmlspecialchars(trim($_POST['username']));
			$member=$this->db->Getone("select * from `@#_member` where `username`='$username' and dealer_pass=2");
			$member_shopname=$this->db->Getone("select * from `@#_member_dealer` where `shopname`='$shopname'");
			$member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `username`='$username'");
			$member_shopid=$this->db->Getone("select * from `@#_member_dealer` where `shopid`='$shopid'");
			if(($member)){
				_message("此登录名已经入驻成商家了");
				exit;
			}
			if(($member_dealer)){
				_message("此登录名已经被别人用了");
				exit;
			}
			if(($member_shopname)){
				_message("此店铺名已经被别人用了");
				exit;
			}
			if(($member_shopid)){
				_message("此掌柜已经被别人用了");
				exit;
			}
			if(empty($username)){
				_message("登录名不能为空");
				exit;
			}
			if(empty($shopname)){
				_message("店铺名不能为空");
				exit;
			}
			if(empty($shopid)){
				_message("掌柜不能为空");
				exit;
			}
			$time = time();
			$pass = 2;//1为初审//2为审核通过//3为审核不通过//4为屏蔽
			$sql="INSERT INTO `@#_member_dealer` (username,email,mobile,shopname,shopid,shopurl,shopbzj,shopmiaoshu,shopfuwu,shopwuliu,pass,time) value ('$username','$email','$mobile','$shopname','$shopid','$shopurl','$shopbzj','$shopmiaoshu','$shopfuwu','$shopwuliu','$pass','$time')";
			$this->db->Query($sql);
			$sql="UPDATE `@#_member` SET `dealer_pass`='2' WHERE `email`='$username'  or `mobile`='$username'";
			$this->db->Query($sql);
			if($this->db->Query($sql)){
					_message("增加成功");
			}else{
					_message("增加失败");
			}
		}
		include $this->tpl(ROUTE_M,'dealer_insert');
	}

	//修改商家
	public function modify(){
		$id=intval($this->segment(4));
		$member=$this->db->Getone("select * from `@#_member_dealer` where `id`='$id'");
		
		
		
		
		
		
		if(isset($_POST['submit'])){
		
			$email=htmlspecialchars(trim($_POST['email']));
			$mobile=htmlspecialchars(trim($_POST['mobile']));
			
			$shopname=htmlspecialchars(trim($_POST['shopname']));
			$shopid=htmlspecialchars(trim($_POST['shopid']));
			$shopurl=htmlspecialchars(trim($_POST['shopurl']));
			$shopbzj=htmlspecialchars(trim($_POST['shopbzj']));
			$shopmiaoshu=htmlspecialchars(trim($_POST['shopmiaoshu']));
			$shopfuwu=htmlspecialchars(trim($_POST['shopfuwu']));
			$shopwuliu=htmlspecialchars(trim($_POST['shopwuliu']));
			
				
			
			$sql="UPDATE `@#_member_dealer` SET `email`='$email',`mobile`='$mobile',`shopurl`='$shopurl',`shopbzj`='$shopbzj',`shopmiaoshu`='$shopmiaoshu',`shopfuwu`='$shopfuwu',`shopwuliu`='$shopwuliu' WHERE `id`='$id'";
			if($this->db->Query($sql)){
					_message("修改成功");
			}else{
					_message("修改失败");
			}
		}
		
		include $this->tpl(ROUTE_M,'dealer_modify');	
	}
	//删除会员
	public function del(){
		$id=intval($this->segment(4));
		$this->db->Autocommit_start();		
		
		$q2 = $this->db->Query("delete from `@#_member_dealer` where id='$id'");		
		
		if($q2){
			$this->db->Autocommit_commit();
			_message("删除成功");
		}else{
			$this->db->Autocommit_rollback();
			_message("删除失败");
		}			
	}

	
		
	
	//商家审核通过
	public function pass(){
		$id=intval($this->segment(4));
		$this->db->Autocommit_start();		
		
		$q2 = $this->db->Query("UPDATE `@#_member_dealer` SET `pass`='2' WHERE `id`='$id'");	
		$member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `id`='$id'");
		$username = $member_dealer['username'];
		//$member=$this->db->Getone("select * from `@#_member` where `email`='$username'  or `mobile`='$username'");
		//$q3 = $this->db->Query("UPDATE `@#_member` SET `pass`='2' WHERE `email`='$username'  or `mobile`='$username'");	
		if($q2){
			_message("操作成功",WEB_PATH."/member/dealer/lists");
		}else{
			_message("操作失败");
		}			
	}
	//商家不通过
	public function passno(){
		$id=intval($this->segment(4));
		$this->db->Autocommit_start();		
		
		$q2 = $this->db->Query("UPDATE `@#_member_dealer` SET `pass`='3' WHERE `id`='$id'");		
		$member_dealer=$this->db->Getone("select * from `@#_member_dealer` where `id`='$id'");
		$username = $member_dealer['username'];
		//$member=$this->db->Getone("select * from `@#_member` where `email`='$username'  or `mobile`='$username'");
		//$q3 = $this->db->Query("UPDATE `@#_member` SET `pass`='3' WHERE `email`='$username'  or `mobile`='$username'");
		if($q2){
			_message("操作成功",WEB_PATH."/member/dealer/lists");
		}else{
			_message("操作失败");
		}			
	}
	
	public function del_true(){
		$id=intval($this->segment(4));
		$q2 = $this->db->Query("UPDATE `@#_member_dealer` SET `pass`='3' WHERE `id`='$id'");		
		if($q2){
			_message("操作成功");
		}else{
			_message("操作失败");
		}			
	}
	
	//查找商家
	public function select(){
		if(isset($_POST['submit'])){
			$sousuo=htmlspecialchars(trim($_POST['sousuo']));
			$content=htmlspecialchars(trim($_POST['content']));
		
			if(empty($sousuo) || empty($content)){
				_message("参数错误");
			}
			$members = array();
			if($sousuo=='id'){			
				$members[0]=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `uid` = '$content'");				
			}
			if($sousuo=='nickname'){	
				$members=$this->db->GetList("SELECT * FROM `@#_member` WHERE `username` LIKE '%$content%'"); 
			}
			if($sousuo=='email'){				
				$members=$this->db->GetList("SELECT * FROM `@#_member` WHERE `email` LIKE '%$content%'");				
			}
			if($sousuo=='mobile'){
				$members=$this->db->GetList("SELECT * FROM `@#_member` WHERE `mobile` LIKE '%$content%'");			
			}			
			
		}
		
		include $this->tpl(ROUTE_M,'member_select');
		
	}
	
	//商家组
		public function member_group(){
			$this->ment=array(
						array("member_group","商家组",ROUTE_M.'/'.ROUTE_C."/member_group"),
						array("member_add_group","添加商家组",ROUTE_M.'/'.ROUTE_C."/member_add_group"),
						
			);
			$members=$this->db->Getlist("select * from `@#_member_group` where 1");
			include $this->tpl(ROUTE_M,'member.member_group');		
		}
		
		//修改商家组
		public function group_modify(){
			$id=intval($this->segment(4));
			$members=$this->db->Getone("select * from `@#_member_group` where `groupid`='$id'");
			if(isset($_POST['submit'])){
				$name=htmlspecialchars(trim($_POST['name']));
				$jingyan_start=htmlspecialchars(trim($_POST['jingyan_start']));
				$jingyan_end=htmlspecialchars(trim($_POST['jingyan_end'])); 
				if(empty($name) || empty($jingyan_start)  || empty($jingyan_end)){
					_message('商家组或者经验值不能为空');
				}elseif( $jingyan_start >= $jingyan_end){
					 _message('开始经验不能大于结束经验');
				}elseif($jingyan_end <= $jingyan_start){ 
					_message('结束经验不能小于开始经验');
				}
				$sql="UPDATE `@#_member_group` SET `name`='$name',`jingyan_start`='$jingyan_start', `jingyan_end`='$jingyan_end' WHERE `groupid`='$id'";
				$this->db->Query($sql);
				if($this->db->affected_rows()){
						_message("修改成功");
				}else{
						_message("修改失败");
				}
			}
			include $this->tpl(ROUTE_M,'member.group_modify');		
		}
		
		
		//删除商家组
		public function group_del(){
			$id=intval($this->segment(4));
			$sql="DELETE FROM `@#_member_group` WHERE `groupid`='$id'";
				$this->db->Query($sql);
				if($this->db->affected_rows()){
						_message("删除成功");
				}else{
						_message("删除失败");
				}
		}
		
		//增加商家组
		public function member_add_group(){
			if(isset($_POST['submit'])){
				$name=htmlspecialchars(trim($_POST['name']));
				$jingyan_start=htmlspecialchars(trim($_POST['jingyan_start']));
				$jingyan_end=htmlspecialchars(trim($_POST['jingyan_end']));
				if(empty($name) || empty($jingyan_start) || empty($jingyan_end)){
					_message('商家组或者经验值不能为空');
				}
				$sql="INSERT INTO `@#_member_group` (`name`,`jingyan_start`,`jingyan_end`) value ('$name','$jingyan_start','$jingyan_end')";
				$this->db->Query($sql);
				if($this->db->affected_rows()){
						_message("增加成功");
				}else{
						_message("增加失败");
				}
			}
			include $this->tpl(ROUTE_M,'add_membergroup');
		}
		
		

		//商家配置
		public function config(){
			$regtype = System::load_app_config("user_reg_type","",ROUTE_M);			
			$nickname = $this->db->GetOne("select * from `@#_caches` where `key` = 'member_name_key' limit 1");			
			if(isset($_POST['submit'])){
				
				$nicknames = htmlspecialchars($_POST['nickname']);
				$nicknames = trim($nicknames,",");
				$nicknames = str_ireplace(" ",'',$nicknames);				
				
				
				$regtype['reg_email'] = isset($_POST['reg_email']) ? 1 : 0;
				$regtype['reg_mobile'] = isset($_POST['reg_mobile']) ? 1 : 0;
				$regtype['reg_num'] = isset($_POST['reg_num']) ? $_POST['reg_num'] : 0;
				
				$html = "<?php return ".var_export($regtype,true)."; ?>";
				if(!is_writable(dirname(__FILE__).'/lib/user_reg_type.ini.php')) exit('user_reg_type.ini.php 没有写入权限!');
				file_put_contents(dirname(__FILE__).'/lib/user_reg_type.ini.php',$html);
				
				
				if($nickname){
					$this->db->Query("UPDATE `@#_caches` SET `value` = '$nicknames' where `key` = 'member_name_key'");
				}else{
					$this->db->Query("INSERT INTO `@#_caches` (`key`,`value`) value ('member_name_key','$nicknames')");
				}
				_message("操作成功");
			}			
			$nickname = $nickname['value'];
			include $this->tpl(ROUTE_M,'member_config');
		}
		
		//微积分配置
		public function member_fufen(){
			if(isset($_POST['submit'])){			
				$path =  dirname(__FILE__).'/lib/user_fufen.ini.php';			
				if(!is_writable($path)) _message('Please chmod  user_fufen.ini.php  to 0777 !');
				$f_overziliao=intval(trim($_POST['f_overziliao']));
				$f_shoppay=intval(trim($_POST['f_shoppay']));
				$f_phonecode=intval(trim($_POST['f_phonecode']));
				$f_visituser=intval(trim($_POST['f_visituser']));
				//以上是微积分，一下是经验值
				$z_overziliao=intval(trim($_POST['z_overziliao']));
				$z_shoppay=intval(trim($_POST['z_shoppay']));
				$z_phonecode=intval(trim($_POST['z_phonecode']));
				$z_visituser=intval(trim($_POST['z_visituser']));
				$fufen_yuan=intval(trim($_POST['fufen_yuan']));
				$fufen_yongjin=floatval(trim($_POST['fufen_yongjin']));
	
				$fufen_yongjintx=floatval(trim($_POST['fufen_yongjintx']));
				if($fufen_yuan<=0){
					_message('微积分输入有错误');
				}
				$jieguo=$fufen_yuan%10;
				if($jieguo!=0){
					_message('微积分输入有错误');
				}
			$html=<<<HTML
<?php 
return array (	
	'f_overziliao' => '$f_overziliao',
	'f_shoppay' => '$f_shoppay',
	'f_phonecode' => '$f_phonecode',
	'f_visituser' => '$f_visituser'	,
	'z_overziliao' => '$z_overziliao',
	'z_shoppay' => '$z_shoppay',
	'z_phonecode' => '$z_phonecode',
	'z_visituser' => '$z_visituser',
	'fufen_yuan' => '$fufen_yuan',
	'fufen_yongjin' => '$fufen_yongjin',
	'fufen_yongjintx' => '$fufen_yongjintx'
);
?>
HTML;

				file_put_contents($path,$html);
				_message("修改成功!");
			}
			
			$config = System::load_app_config("user_fufen");		
			include $this->tpl(ROUTE_M,'member_insertfufen');
		}
		
		
	//佣金提现申请管理
	public function commissions(){	
	
		$num=20;
		$total=$this->db->GetCount("SELECT COUNT(*) FROM `@#_member_cashout` WHERE 1"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,$num,$pagenum,"0");		
		$commissions=$this->db->GetPage("SELECT * FROM `@#_member_cashout`  WHERE 1",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0)); 
		
		//查询用户名
		if(!empty($commissions)){
		   foreach($commissions as $key=>$val){
		      $uid=$val['uid'];
			  $user[$key]=$this->db->GetOne("SELECT username FROM `@#_member` WHERE `uid`='$uid'  ");
			  
		   }
         }
        $fufen = System::load_app_config("user_fufen",'','member');
		include $this->tpl(ROUTE_M,'member.commissions');
	}
	
	//佣金提现申请审核
	public function commreview(){
	 $id=intval($this->segment(4));
	 
      
		 $audsta=$this->db->GetOne("SELECT * FROM `@#_member_cashout` WHERE `id`='$id'  ");
		 $is=$this->db->Query("UPDATE `@#_member_cashout` SET `auditstatus`='1' where `id`=$id "); 
		 if($is==1){
		  //审核通过后将该数据插入到佣金记录表中
		  
		  $type=-3;
		  $content="提现";
		  $is=$this->db->Query("INSERT INTO `@#_member_recodes`(`uid`,`type`,`content`,`money`,`time`,`cashoutid`)VALUES($audsta[uid],'$type','$content','$audsta[money]','$audsta[time]','$audsta[id]')"); 
		  
		  
		   _message("审核成功！");
		 }else{
			_message("审核失败！");	 
		 }
	}
	//充值记录
	public function recharge(){
		
		if(isset($_POST['sososubmit'])){
			$posttime1=isset($_POST['posttime1'])?$_POST['posttime1']:'';
			$posttime2=isset($_POST['posttime2'])?$_POST['posttime2']:'';
			if(empty($posttime1) || empty($posttime2)) _message("2个时间都不为能空！");
			if(!empty($posttime1) && !empty($posttime2)){ //如果2个时间都不为空
				$posttime1=strtotime($posttime1);
				$posttime2=strtotime($posttime2);
				if($posttime1 > $posttime2){
					_message("前一个时间不能大于后一个时间");
				}
				$times= "`time`>='$posttime1' AND `time`<='$posttime2'";
			}
			$chongzhi=isset($_POST['chongzhi'])?$_POST['chongzhi']:'';
			if(!empty($chongzhi) && $chongzhi!='请选择充值来源'){
				$content=" AND `content`='$chongzhi'";
			}
			if(empty($chongzhi) || $chongzhi=='请选择充值来源') $content=" AND (`content`='充值' or `content`='管理员修改金额' or `content`='使用佣金充值到用户账户' or `content`='使用余额宝充值到用户账户')";
			
			$yonghu=isset($_POST['yonghu'])?$_POST['yonghu']:'';
			if(empty($yonghu) || $yonghu=='请选择用户类型'){
				$uid=' AND 1';
			}
			$yonghuzhi=isset($_POST['yonghuzhi'])?$_POST['yonghuzhi']:'';
			if($yonghu=='用户id'){
				if($yonghuzhi){
					$uid=" AND `uid`='$yonghuzhi'";
				}else{
					$uid=' AND 1';
				}
			}
			if($yonghu=='用户名称'){
				if($yonghuzhi){
					$user_uid=$this->db->GetOne("select uid from `@#_member` where `username`='$yonghuzhi'");
					if($user_uid){
						$uid=" AND `uid`='$user_uid[uid]'";
					}else{
						_message($yonghuzhi."用户不存在！");
						$uid=' AND 1';
					}
				}else{
					$uid=' AND 1';
				}
			}
			if($yonghu=='用户邮箱'){
				if($yonghuzhi){
					$user_uid=$this->db->GetOne("select uid from `@#_member` where `email`='$yonghuzhi'");
					if($user_uid){
						$uid=" AND `uid`='$user_uid[uid]'";
					}else{
						_message($yonghuzhi."用户不存在！");
						$uid=' AND 1';
					}
				}else{
					$uid=' AND 1';
				}
			}
			if($yonghu=='用户手机'){
				if($yonghuzhi){
					$user_uid=$this->db->GetOne("select uid from `@#_member` where `mobile`='$yonghuzhi'");
					if($user_uid){
						$uid=" AND `uid`='$user_uid[uid]'";
					}else{
						_message($yonghuzhi."用户不存在！");
						$uid=' AND 1';
					}
				}else{
					$uid=' AND 1';
				}
			}
			$wheres=$times.$content.$uid;
		}
		$num=20;
		if(empty($wheres)){
			$total=$this->db->GetCount("SELECT count(*) FROM `@#_member_account` WHERE (`content`='充值' or `content`='使用佣金充值到用户账户' or `content`='使用余额宝充值到用户账户') AND `type`='1'"); 
			$summoeny=$this->db->GetOne("SELECT sum(money) sum_money FROM `@#_member_account` WHERE (`content`='充值' or `content`='使用佣金充值到用户账户' or `content`='使用余额宝充值到用户账户') AND `type`='1'"); 
		}else{
			$total=$this->db->GetCount("SELECT count(*) FROM `@#_member_account` WHERE $wheres"); 
			$summoeny=$this->db->GetOne("SELECT sum(money) sum_money FROM `@#_member_account` WHERE $wheres"); 
		}
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,$num,$pagenum,"0");	
		if(empty($wheres)){
			$recharge=$this->db->GetPage("SELECT * FROM `@#_member_account` WHERE (`content`='充值' or `content`='使用佣金充值到用户账户' or `content`='使用余额宝充值到用户账户') AND `type`='1' order by `time` desc",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0)); 
		}else{
			$recharge=$this->db->GetPage("SELECT * FROM `@#_member_account` WHERE  $wheres order by `time` desc",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0)); 
		}
		$members=array();
		for($i=0;$i<count($recharge);$i++){
			$uid=$recharge[$i]['uid'];
			$member=$this->db->GetOne("select * from `@#_member` where `uid`='$uid'");
			$members[$i]=$member['username'];	
			if(empty($member['username'])){
				if(!empty($member['email'])){
					$members[$i]=$member['email'];
				}
				if(!empty($member['mobile'])){
					$members[$i]=$member['mobile'];
				}
			}
		}
		include $this->tpl(ROUTE_M,'member.recharge');		
	}
	//消费记录
	public function pay_list(){
		if(isset($_POST['sososubmit'])){
			$posttime1=isset($_POST['posttime1'])?$_POST['posttime1']:'';
			$posttime2=isset($_POST['posttime2'])?$_POST['posttime2']:'';
			if(empty($posttime1) || empty($posttime2)) _message("2个时间都不为能空！");
			if(!empty($posttime1) && !empty($posttime2)){ //如果2个时间都不为空
				$posttime1=strtotime($posttime1);
				$posttime2=strtotime($posttime2);
				if($posttime1 > $posttime2){
					_message("前一个时间不能大于后一个时间");
				}
				$times= "`time`>='$posttime1' AND `time`<='$posttime2'";
			}
			
			$yonghu=isset($_POST['yonghu'])?$_POST['yonghu']:'';
			if(empty($yonghu) || $yonghu=='请选择用户类型'){
				$uid=' AND 1';
			}
			$yonghuzhi=isset($_POST['yonghuzhi'])?$_POST['yonghuzhi']:'';
			if($yonghu=='用户id'){
				if($yonghuzhi){
					$uid=" AND `uid`='$yonghuzhi'";
				}else{
					$uid=' AND 1';
				}
			}
			if($yonghu=='用户名称'){
				if($yonghuzhi){
					$user_uid=$this->db->GetOne("select uid from `@#_member` where `username`='$yonghuzhi'");
					if($user_uid){
						$uid=" AND `uid`='$user_uid[uid]'";
					}else{
						_message($yonghuzhi."用户不存在！");
						$uid=' AND 1';
					}
				}else{
					$uid=' AND 1';
				}
			}
			if($yonghu=='用户邮箱'){
				if($yonghuzhi){
					$user_uid=$this->db->GetOne("select uid from `@#_member` where `email`='$yonghuzhi'");
					if($user_uid){
						$uid=" AND `uid`='$user_uid[uid]'";
					}else{
						_message($yonghuzhi."用户不存在！");
						$uid=' AND 1';
					}
				}else{
					$uid=' AND 1';
				}
			}
			if($yonghu=='用户手机'){
				if($yonghuzhi){
					$user_uid=$this->db->GetOne("select uid from `@#_member` where `mobile`='$yonghuzhi'");
					if($user_uid){
						$uid=" AND `uid`='$user_uid[uid]'";
					}else{
						_message($yonghuzhi."用户不存在！");
						$uid=' AND 1';
					}
				}else{
					$uid=' AND 1';
				}
			}
			$wheres=$times.$uid;
		}
		$num=20;
		if(empty($wheres)){
			$total=$this->db->GetCount("SELECT count(*) FROM `@#_member_go_record` WHERE 1"); 
			$summoeny=$this->db->GetOne("SELECT sum(moneycount) sum_money FROM `@#_member_go_record` WHERE 1"); 
		}else{
			$total=$this->db->GetCount("SELECT count(*) FROM `@#_member_go_record` WHERE $wheres"); 
			$summoeny=$this->db->GetOne("SELECT sum(moneycount) sum_money FROM `@#_member_go_record` WHERE $wheres"); 
		}
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,$num,$pagenum,"0");	
		if(empty($wheres)){
			$pay_list=$this->db->GetPage("SELECT * FROM `@#_member_go_record` WHERE 1 order by `time` desc",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0)); 
		}else{
			$pay_list=$this->db->GetPage("SELECT * FROM `@#_member_go_record` WHERE  $wheres order by `time` desc",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0)); 
		}
		$members=array();
		for($i=0;$i<count($pay_list);$i++){
			$uid=$pay_list[$i]['uid'];
			$member=$this->db->GetOne("select * from `@#_member` where `uid`='$uid'");
			$members[$i]=$member['username'];	
			if(empty($member['username'])){
				if(!empty($member['email'])){
					$members[$i]=$member['email'];
				}
				if(!empty($member['mobile'])){
					$members[$i]=$member['mobile'];
				}
			}
		}
		include $this->tpl(ROUTE_M,'member.pay_list');	
	}
}

?>