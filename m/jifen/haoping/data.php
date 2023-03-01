<?php 
session_start(); 
require"../../../conn.php";

  $orderid = isset($_GET['orderid'])?html($_GET['orderid']):'';

//$an=isset($_POST['an'])?$_POST['an']:'';
$y1 = "5jf";
$y2 = "10jf";
$y3 = "20jf";
$y4 = "5y";
$y5 = "10y";
$y6 = "10g";
$y7 = "20g";
$y8 = "30g";
$y9 = 8;
$y10 = 10;
$y11 = 15;
$y12 = 12;


?>
<?php 
  if (!isset($_SESSION['user'])||$_SESSION['user']==''){ }else{
$sqls='select * from `'.$tablepre.'member_co` where `email`="'.$_SESSION['user'].'" or `user`="'.$_SESSION['user'].'"';
$results=$db->query($sqls);
$rows=$db->getrow($results);
	  
$sqlj='select  sum(jf) from `'.$tablepre.'jifen` where  email="'.$rows['email'].'"';
$resultj=$db->query($sqlj);
$rowjj=$db->getrow($resultj);

$sqlj='select * from `'.$tablepre.'jifen` where `email`="'.$rows['email'].'" and `type`=10';
$resultj=$db->query($sqlj);
$rowj=$db->getrow($resultj);

$sqllp='select * from `'.$tablepre.'lp` where `id`=1';
$resultlp=$db->query($sqllp);
$rowlp=$db->getrow($resultlp);
$img_sl7 = $rowlp['img_sl7'] ;
?>

<?php 
function get_rand($proArr) { 
    $result = ''; 
 
    //概率数组的总概率精度  
    $proSum = array_sum($proArr); 
 
    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    } 
    unset ($proArr); 
 
    return $result; 
} 

$prize_arr = array( 
   
    '0' => array('id'=>1,'prize'=>'<img src="'.$url.'/images/jifen/'.$y1.'.jpg" width="49" height="49" class="boderbb">','num'=>$y1,'v'=>$h1), 
    '1' => array('id'=>2,'prize'=>'<img src="'.$url.'/images/jifen/'.$y2.'.jpg" width="49" height="49" class="boderbb">','num'=>$y2,'v'=>$h2), 
    '2' => array('id'=>3,'prize'=>'<img src="'.$url.'/images/jifen/'.$y3.'.jpg" width="49" height="49" class="boderbb">','num'=>$y3,'v'=>$h3), 
    '3' => array('id'=>4,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl0'].'" width="49" height="49" class="boderbb">','num'=>$y4,'v'=>$h4), 
    '4' => array('id'=>5,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl1'].'" width="49" height="49" class="boderbb">','num'=>$y5,'v'=>$h5), 
    '5' => array('id'=>6,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl2'].'" width="49" height="49" class="boderbb">','num'=>$y6,'v'=>$h6), 
	'6' => array('id'=>7,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl3'].'" width="49" height="49" class="boderbb">','num'=>$y7,'v'=>$h7), 
	'7' => array('id'=>8,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl4'].'" width="49" height="49" class="boderbb">','num'=>$y8,'v'=>$h8), 
	'8' => array('id'=>9,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl5'].'" width="49" height="49" class="boderbb">','num'=>$y9,'v'=>$h9), 
	'9' => array('id'=>10,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl6'].'" width="49" height="49" class="boderbb">','num'=>$y10,'v'=>$h10), 
	'10' => array('id'=>11,'prize'=>'<img src="'.$url.'/'.$img_sl7.'" width="49" height="49" class="boderbb">','num'=>$y11,'v'=>$h11), 
	'11' => array('id'=>12,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl8'].'" width="49" height="49" class="boderbb">','num'=>$y12,'v'=>$h12),
	
); 

foreach ($prize_arr as $key => $val) { 
    $arr[$val['id']] = $val['v']; 
	
	
} 
 
$rid = get_rand($arr); //根据概率获取奖项id 


$res['yes'] = $prize_arr[$rid-1]['prize']; //中奖项 

 
unset($prize_arr[$rid-1]); //将中奖项从数组中剔除，剩下未中奖项 
shuffle($prize_arr); //打乱数组顺序 
for($i=0;$i<count($prize_arr);$i++){ 
    $pr[] = $prize_arr[$i]['prize'];
	
	
} 
$res['no'] = $pr; 
       if($rid=="1"){$prize="1";  $lm=1; $num="5"; $title="5积分";
  }elseif($rid=="2"){$prize="2";  $lm=1; $num="10"; $title="10积分";
  }elseif($rid=="3"){$prize="4";  $lm=1; $num="20"; $title="20积分";
  }elseif($rid=="4"){$prize="5";  $lm=2; $num="CC5"; $title=$rowlp['title0'];
  }elseif($rid=="5"){$prize="6";  $lm=2; $num="CC10"; $title=$rowlp['title1'];
  }elseif($rid=="6"){$prize="7";  $lm=2; $num="10"; $title=$rowlp['title2'];
  }elseif($rid=="7"){$prize="8";  $lm=2; $num="10"; $title=$rowlp['title3'];
  }elseif($rid=="8"){$prize="9";  $lm=2; $num="10"; $title=$rowlp['title4'];
  }elseif($rid=="9"){$prize="10"; $lm=2; $num="10"; $title=$rowlp['title5'];
  }elseif($rid=="10"){$prize="12"; $lm=3; $num="10"; $title=$rowlp['title6'];
  }elseif($rid=="11"){$prize="15"; $lm=3; $num="10"; $title=$rowlp['title7'];
  }elseif($rid=="12"){$prize="20"; $lm=3; $num="10"; $title=$rowlp['title8'];
                }else{$prize="1";  $lm=1; $num="10"; $title="5积分";}

if($rowjj['sum(jf)']>=15){
	
$sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("'.$lm.'","'.$rows['email'].'","'.$title.'","-15","8","0","no","'.time().'","0","0","0","'.$iipp.'")';
$db->execute($sql);

if($lm==1){$jf=$num;}else{$jf=0;}
$sql='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("0","'.$rows['email'].'","---","'.$jf.'","8","-1","yes","'.time().'","0","0","0","'.$iipp.'")';
$db->execute($sql);

$sqls='update `'.$tablepre.'member_co` set `haoping`="yes",`wtime`='.time().',`ip`="'.$iipp.'" where `email`="'.$rows['email'].'"';
$db->execute($sqls);

$db->execute('delete from `'.$tablepre.'jifen` where `email`="'.$rows['email'].'" and type=10');


}else{
}




echo json_encode($res); 
  }
  
?>
