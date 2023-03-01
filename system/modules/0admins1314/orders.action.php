<?php 
defined('G_IN_SYSTEM')or exit('no');
System::load_app_class('admin',G_ADMIN_DIR,'no');
System::load_app_fun('global',G_ADMIN_DIR);
System::load_sys_fun('user');
class orders extends admin {
	private $db;
	public function __construct(){		
		parent::__construct();		
		$this->db=System::load_sys_class('model');
		$this->ment=array();
		$info=$this->AdminInfo;
	    $admininfo = $info['useremail'];	
        $admins = strstr($admininfo,"2");
        if($info['mid'] == 0 ||  $admins){}else{exit();}
	}

	//订单
	public function orders_list(){
		
		
		
		isset($_GET['order_num'])?$order_num=$_GET['order_num']:$order_num='';
isset($_GET['pass'])?$pass=$_GET['pass']:$pass='';
isset($_GET['user'])?$user=$_GET['user']:$user='';
isset($_GET['name'])?$name=$_GET['name']:$name='';
isset($_GET['mob'])?$mob=$_GET['mob']:$mob='';
isset($_GET['title'])?$title=$_GET['title']:$title='';
isset($_GET['dh'])?$dh=$_GET['dh']:$dh='';
isset($_GET['time'])?$time=$_GET['time']:$time='';
isset($_GET['time1'])?$time1=$_GET['time1']:$time1='';
isset($_GET['type_o'])?$type_o=$_GET['type_o']:$type_o='';


$sq='';
if ($order_num!=''){
	$sq.=' and order_num="'.$order_num.'"';
}
if ($pass!=''){
	$sq.=' and pass="'.$pass.'"';
}

if ($user!=''){
	$row = $this->db->GetOne("select * from `go_member` where `username` = '$user' or `email` = '$user'  or `mobile` = '$user' limit 1");

	$sq.=' and email="'.$row['uid'].'"';
}
if ($name!=''){
	$sq.=' and name="'.$name.'"';
}
if ($mob!=''){
	$sq.=' and mob="'.$mob.'"';
}
if ($title!=''){
	$sq.=' and title like "%'.$title.'%"';
}
if ($dh!=''){
	$sq.=' and dh="'.$dh.'"';
}

if ($time!=''){
	$sq.=' and wtime>'.strtotime($time).'';
}
if ($time1!=''){
	$sq.=' and wtime<'.strtotime($time1).'';
}
if ($type_o!=''){
	$sq.=' and type_o="'.$type_o.'"';
}
	$num=20;
		$total=$this->db->GetCount("SELECT COUNT(*) FROM orders  where id<>''  $sq"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){$pagenum=$_GET['p'];}else{$pagenum=1;}	
		$page->config($total,$num,$pagenum,"0");
		$shoplist=$this->db->GetPage("SELECT * FROM orders where id<>''  $sq order by id desc",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));	
	
	
	    
		$totals=$this->db->GetCount("SELECT COUNT(*) FROM orders");
		$total0=$this->db->GetCount("SELECT COUNT(*) FROM orders  where `pass`=0  "); 
		$total1=$this->db->GetCount("SELECT COUNT(*) FROM orders  where `pass`=1  "); 
		$total2=$this->db->GetCount("SELECT COUNT(*) FROM orders  where `pass`=2  "); 
		$total3=$this->db->GetCount("SELECT COUNT(*) FROM orders  where `pass`=3  "); 
		$total4=$this->db->GetCount("SELECT COUNT(*) FROM orders  where `pass`=4  "); 
	
		include $this->tpl(ROUTE_M,'orders.list');
		
	}
	
	//订单详情
	public function orders_detail(){
		$order_num = isset($_GET['order_no'])?($_GET['order_no']):'';
		
		$row_o = $this->db->GetOne("select * from `orders` where `order_num` = '$order_num' limit 1");
		
		$rowaddr_o = $this->db->GetOne("select * from `order_address` where `order_num` = '$order_num' limit 1");
		
		$rows_o=$this->db->GetOne("SELECT * FROM `orders` where `order_num` = '$order_num'");
		
		$nums = explode(",",$row_o['num']);
$numcount = count($nums)-1;
	
		include $this->tpl(ROUTE_M,'orders.detail');
		
	}
	
	//订单发货
	public function orders_fh(){
		
$order_num = isset($_POST['order_no'])?($_POST['order_no']):'';
$gc=isset($_POST['gc'])?($_POST['gc']):'';
$dh=isset($_POST['dh'])?($_POST['dh']):'';
$ps=isset($_POST['ps'])?($_POST['ps']):'';
$pstype=isset($_POST['pstype'])?($_POST['pstype']):'';

if($pstype=="fh"){
	$query = $this->db->Query('update `orders` set `pass`=3,`ftime`="'.time().'",`gc`="'.$gc.'",`dh`="'.$dh.'" where `order_num`="'.$order_num.'"');	

}elseif($pstype=="ps"){
	$query = $this->db->Query('update `orders` set `ps`="'.$ps.'" where `order_num`="'.$order_num.'"');	


}elseif($pstype=="dh"){
	$query = $this->db->Query('update `orders` set `gc`="'.$gc.'",`dh`="'.$dh.'" where `order_num`="'.$order_num.'"');	

}
		header("location:".G_MODULE_PATH."/orders/orders_detail/?order_no=".$order_num."");
	}
	
}

?>