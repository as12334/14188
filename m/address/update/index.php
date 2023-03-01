<?php 
session_start();
require"../../../conn.php";
if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		msg('','location="/m/login/"');
	}
$type_address=isset($_GET['type_address'])?html($_GET['type_address']):'1';
$username=isset($_GET['username'])?html($_GET['username']):'';
$province=isset($_GET['province'])?html($_GET['province']):'';
$city=isset($_GET['city'])?html($_GET['city']):'';
$town=isset($_GET['town'])?html($_GET['town']):'';
$addr=isset($_GET['addr'])?html($_GET['addr']):'';
$mobile=isset($_GET['mobile'])?html($_GET['mobile']):'';
$tel='';	

$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';		 
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);

$sqlipa='select * from `'.$tablepre.'address` where email="'.$row['email'].'" order by id desc';		 
$rripa=$db->query($sqlipa);
$rowa=$db->getrow($rripa);

if($type_address=="add" && $row['email']!=$rowa['email']){
	
	$sql='insert into `'.$tablepre.'address` (`email`,`name`,`province`,`city`,`town`,`addr`,`mobile`,`tel`,`px`,`pass`,`wtime`,`ip`) values("'.$row['email'].'","'.$username.'","'.$province.'","'.$city.'","'.$town.'","'.$addr.'","'.$mobile.'","'.$tel.'",100,"yes",'.time().',"'.getip().'")';
$db->execute($sql);
echo "编辑地址成功~";			 
			msg('','location="'.$url.'/m/address/"');
			 
	}elseif($type_address=="edit"){
		
		
	$sql='update `'.$tablepre.'address` set `name`="'.$username.'",`province`="'.$province.'",`city`="'.$city.'",`town`="'.$town.'",`addr`="'.$addr.'",`mobile`="'.$mobile.'",`tel`="'.$tel.'",`wtime`='.time().',`ip`="'.getip().'" where `email`="'.$row['email'].'"';
$db->execute($sql);
	}
	echo "编辑地址成功~";
	msg('','location="'.$url.'/m/address/"');
	 
?>