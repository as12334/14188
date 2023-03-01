<?php 
session_start();
require"../conn.php";

$keywords=isset($_POST['keywords'])?html($_POST['keywords']):'';
$time  = date("Y-m-d H:i:s") ;
$ttime = date('Y-m-d',strtotime("-1 days"))." 10";
//签到时间
$makeday  = date("Y-m-d");
$makeday1 = date("Y-m-d",strtotime("-1 days"));
$makeday2 = date("Y-m-d",strtotime("+1 days"));
if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		
	}else{
		$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';			
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);

$sql7='select sum(type) from `'.$tablepre.'jifen` where email="'.$row['email'].'" and type="1" order by id desc';			
$rr7=$db->query($sql7);
$row7=$db->getrow($rr7);

$sqlmake='select * from `'.$tablepre.'jifen` where email="'.$row['email'].'" and type="1" order by id desc';			
$rrmake=$db->query($sqlmake);
$rowmake=$db->getrow($rrmake);

$mday  =  date("Y-m-d",$rowmake['wtime']);
		}
		
		
		$jfjd      = $_GET['jfjd'];
	//echo "1000";
	if($jfjd=="ok"){ //echo "1000";
	}
	if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		
	}else{
		
$time  = date("Y-m-d H:i:s") ;
$ttime = date('Y-m-d',strtotime("-1 days"))." 10";
//签到时间
$makeday  = date("Y-m-d");
$makeday1 = date("Y-m-d",strtotime("-1 days"));
$makeday2 = date("Y-m-d",strtotime("+1 days"));
if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		
	}else{
		$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';			
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);

$sql7='select sum(type) from `'.$tablepre.'jifen` where email="'.$row['email'].'" and type="1" order by id desc';			
$rr7=$db->query($sql7);
$row7=$db->getrow($rr7);

$sqlmake='select * from `'.$tablepre.'jifen` where email="'.$row['email'].'" and type="1" order by id desc';			
$rrmake=$db->query($sqlmake);
$rowmake=$db->getrow($rrmake);

$mday  =  date("Y-m-d",$rowmake['wtime']);
		}

     if($makeday == $mday){
		  }elseif($makeday1 == $mday && $rowmake['jf']==30){
			  $rowjf7 = $rowmake['types']+1;
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",30,1,"'.$rowjf7.'","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
		  }elseif($makeday1 == $mday && $rowmake['jf']==25){
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",30,1,"6","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
		  }elseif($makeday1 == $mday && $rowmake['jf']==20){
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",25,1,"5","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
		  }elseif($makeday1 == $mday && $rowmake['jf']==15){
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",20,1,"4","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
		  }elseif($makeday1 == $mday && $rowmake['jf']==10){
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",15,1,"3","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
		  }elseif($makeday1 == $mday && $rowmake['jf']==5){
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",10,1,"2","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
		  }else{
		  $sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-1","'.$row['email'].'","签到",5,1,"1","yes",'.time().',"0","0","0","'.$iipp.'")';
          $db->execute($sql);
	  }
		}
		msg('','location="'.$url.'/m/jifen/wjf/"');
?>