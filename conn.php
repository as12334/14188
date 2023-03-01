<?php
require"include/common.in.php";
require_once "cart.shop.php";
$u=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$arrays   = explode("/", $u);
$logins   = "先登录！";

$coupon_end_time = time();

$phpself = $_SERVER['PHP_SELF'];

$reUrl = 'http://'.$_SERVER['HTTP_HOST'] ."/". $_SERVER['REQUEST_URI'];

$ddurl = 'http://'.$_SERVER['SERVER_NAME']."/".$_SERVER["REQUEST_URI"];

$kimiurl = "http://".$_SERVER['SERVER_NAME']."/"; //网址

$url     = "http://".$_SERVER['SERVER_NAME']."/"; //网址

if(isset($_SERVER['HTTP_REFERER'])==1){
	if($phpself=="/login/getpass/getpass.php"){$reurl="/";}else{$reurl = $_SERVER['HTTP_REFERER'];}
	}else{$reurl = $url;}
	
$sqlSeo='select * from `'.$tablepre.'seo` where `id`=1';
$resultSeo=$db->query($sqlSeo);
$rowSeo=$db->getrow($resultSeo);
$img_sl=$rowSeo['img_sl1'];
$adminemail = "432@qq.com"; 
$adminpass  = "423";
//积分
$h1=2200;
$h2=1980;
$h3=900;
//产品
$h4=1;
$h5=1;
$h6=1;
$h7=1;
//购物券
$h8=100;
$h9=100;
$h10=100;
//现金卡
$h11=1;
$h12=1;

//自动收货
$stime = strtotime(date('Y-m-d',strtotime("-10 days"))." 00:00:00");

$sqllpss='select * from `'.$tablepre.'jifen` where lm >=2';
$resultlpss=$db->query($sqllpss);
while ($rowlpss=$db->getrow($resultlpss)){


	
	if($rowlpss['types']<3){}else{}

$sqls='update `'.$tablepre.'jifen` set `types`="3",`stime`='.time().' where `ftime`<"'.$stime.'" and `ttime`!=0 and `ftime`!=0 and lm >=2';
$db->execute($sqls);

	
}




		if (!isset($_SESSION['user'])||$_SESSION['user']==''){
$m_yh="0.00";
$k_yh="0.00";
 }else{	
$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';			
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);
$sqlm='select * from `'.$tablepre.'jifen` where  email="'.$row['email'].'" and types=0 and lm=2 order by id desc';
$resultm=$db->query($sqlm);
$rowm=$db->getrow($resultm);
$m_yh="0.00";
$k_yh="0.00";
if($cart->sum()>=180){
        if($rowm['title']=="30购物券满180元用"){$m_yh="30.00";}
	}elseif($cart->sum()>=120){
		if($rowm['title']=="20购物券满120元用"){$m_yh="20.00";}
	}elseif($cart->sum()>=60){
		if($rowm['title']=="10购物券满60元用"){$m_yh="10.00";}
	}
$sqlka='select * from `'.$tablepre.'jifen` where  email="'.$row['email'].'" and types=0 and lm=3 order by id desc';
$resultka=$db->query($sqlka);
$rowka=$db->getrow($resultka);
if($rowka['title']=="5元现金卡"){$k_yh="5.00";}
if($rowka['title']=="10元现金卡"){$k_yh="10.00";}
 }	?>