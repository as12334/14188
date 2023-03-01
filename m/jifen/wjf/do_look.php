<?php 
session_start();require"../../../conn.php";
$id=isset($_GET['id'])?html($_GET['id']):'';
$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';		 
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);

$sqladdr='select * from `'.$tablepre.'address` where `email`="'.$row['email'].'"';
$resultaddr=$db->query($sqladdr);
$rowaddr=$db->getrow($resultaddr);

$sqls='update `'.$tablepre.'jifen` set `types`="1",`ttime`='.time().' where`id`="'.$id.'"';
$db->execute($sqls);


$sql='insert into `'.$tablepre.'lp_address` (`lm`,`name`,`mob`,`address`) values("'.$id.'","'.$rowaddr['name'].'","'.$rowaddr['mobile'].'","'.$rowaddr['province'].$rowaddr['city'].$rowaddr['town'].$rowaddr['addr'].'")';
$db->execute($sql);

msg('','location="'.$url.'/m/jifen/wjf/show.php?id='.$id.'"');
?>