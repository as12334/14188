<?php session_start();
require"../../include/mysql.php";
require"../../include/common.func.php";
require"../../include/db.class.php";
require_once "../../cart.shop.php";
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}

$db = new db($db_host, $db_user, $db_pass, $db_name);

	$type_o = 1; //手机订单
$sqlip='select * from `'.$tablepre.'go_member` where  uid="'.$_COOKIE['wuid'].'"';		 
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);

$sqladdr='select * from `'.$tablepre.'go_member_dizhi` where  uid="'.$_COOKIE['wuid'].'"';
$resultaddr=$db->query($sqladdr);
$rowaddr=$db->getrow($resultaddr);

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


$addr = $rowaddr['sheng']." ".$rowaddr['shi']." ".$rowaddr['xian']." ".$rowaddr['jiedao'];
$token = isset($_POST['token'])?html($_POST['token']):'';
$order_num = isset($_POST['order_no'])?html($_POST['order_no']):'';
$ps=isset($_POST['u_note'])?html($_POST['u_note']):'-';
$pay_type=isset($_POST['pay_type'])?html($_POST['pay_type']):'';

$countprice = $cart->sum()-$k_yh-$m_yh;
if($token=="8dbe80ba3792a5621c0220402560e7f1"){
$styles = '';
$pid = '';
$pname = '';
$pimg = '';
$pprice = '';
$pnum = '';
$jf='';
// 取得
$getarr = $cart->getItems();
if(is_array($getarr)&&!empty($getarr))
{
    // 列表
    foreach($getarr as $pkey=>$pval)
    {
        if($pkey!=null)
        {
		$pid    .=	$pval['postitempid'].",";
		$pname  .=	$pval['name'].",";
		$pimg   .=	$pval['img'].",";
		$pprice .=	$pval['price'].",";
		$pnum   .=	$pval['num'].",";
			
$sql_pro='select * from `'.$tablepre.'pro_co` where `id`='.$pval['postitempid'].'';
$result_pro=$db->query($sql_pro);
while($row_pro=$db->getrow($result_pro)){
	$cart_num = $row_pro['cart_num'];
	$cart_title = $row_pro['cart_title'];
	$title_ex = explode(" ",$cart_title);$num_ex = explode(" ",$cart_num);  $title_count = count($title_ex)-1; 
	for($i=0;$i<=$title_count;$i++){
			if($num_ex[$i]==$pval['picStyle']){ $style = $title_ex[$i];
		 	$styles .= $style.",";
			         }
				  }
				  $jf += ceil($row_pro['pro_can2']*2);//积分计算
              }
        }
    }
}
if(!isset($pname)){header('Content-type:text/html; charset=utf-8'); msg('','location="'.$url.'/m/"');}

$sql='insert into `'.$tablepre.'orders` (`lm`,`email`,`order_num`,`title`,`img_sl`,`style`,`price`,`num`,`c_price`,`act_yh`,`k_yh`,`m_yh`,`paytype`,`pass`,`wtime`,`ftime`,`stime`,`ip`,`nops`,`ps`,`gc`,`dh`,`type_o`,`name`,`mob`,`jf`) values("'.$pid.'","'.$row['uid'].'","'.$order_num.'","'.$pname.'","'.$pimg.'","'.$styles.'","'.$pprice.'","'.$pnum.'","'.$countprice.'","0.00","'.$k_yh.'","'.$m_yh.'","'.$pay_type.'","0",'.time().',"0","0","'.getip().'","","","","","'.$type_o.'","'.$rowaddr['shouhuoren'].'","'.$rowaddr['mobile'].'","'.$jf.'")';
$db->execute($sql);

$sql='insert into `'.$tablepre.'order_address` (`order_num`,`name`,`addr`,`mobile`,`ps`,`gc`,`dh`) values("'.$order_num.'","'.$rowaddr['shouhuoren'].'","'.$addr.'","'.$rowaddr['mobile'].'","'.$ps.'","","")';
$db->execute($sql);

$sqlju='select * from `'.$tablepre.'go_pay` where  pay_class="jubaopay"';
$resultju=$db->query($sqlju);
$payju=$db->getrow($resultju);
$payarry = explode('"',$payju['pay_key']);
$app_id = $payarry[9];

$partnerid = $app_id;

//下完单清空购物车
//$cart->emptyItem();
}
msg('','location="'.$url.'m/jupay/wapDemoPost.php?order_num='.$order_num.'&pprice='.$countprice.'&partnerid='.$partnerid.'&pname=微商城订单"');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单支付</title>
</head>

<body>
</body>
</html>