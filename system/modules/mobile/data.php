<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');

System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');
System::load_sys_fun('user');

$user = $this->userinfo;
$rowlp = $this->db->GetOne("select * from `@#_lp`"); 

$h1=$rowlp['val0'];
$h2=$rowlp['val1'];
$h3=$rowlp['val2'];
$h4=$rowlp['val3'];
$h5=$rowlp['val4'];
$h6=$rowlp['val5'];
$h7=$rowlp['val6'];
$h8=$rowlp['val7'];
$h9=$rowlp['val8'];
$h10=$rowlp['val9'];
$h11=$rowlp['val10'];
$h12=$rowlp['val11'];

$url = G_UPLOAD_PATH;
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
   
    '0' => array('id'=>1,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl0'].'" width="49" height="49" class="boderbb">','num'=>$y1,'v'=>$h1), 
    '1' => array('id'=>2,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl1'].'" width="49" height="49" class="boderbb">','num'=>$y2,'v'=>$h2), 
    '2' => array('id'=>3,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl2'].'" width="49" height="49" class="boderbb">','num'=>$y3,'v'=>$h3), 
    '3' => array('id'=>4,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl3'].'" width="49" height="49" class="boderbb">','num'=>$y4,'v'=>$h4), 
    '4' => array('id'=>5,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl4'].'" width="49" height="49" class="boderbb">','num'=>$y5,'v'=>$h5), 
    '5' => array('id'=>6,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl5'].'" width="49" height="49" class="boderbb">','num'=>$y6,'v'=>$h6), 
	'6' => array('id'=>7,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl6'].'" width="49" height="49" class="boderbb">','num'=>$y7,'v'=>$h7), 
	'7' => array('id'=>8,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl7'].'" width="49" height="49" class="boderbb">','num'=>$y8,'v'=>$h8), 
	'8' => array('id'=>9,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl8'].'" width="49" height="49" class="boderbb">','num'=>$y9,'v'=>$h9), 
	'9' => array('id'=>10,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl9'].'" width="49" height="49" class="boderbb">','num'=>$y10,'v'=>$h10), 
	'10' => array('id'=>11,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl10'].'" width="49" height="49" class="boderbb">','num'=>$y11,'v'=>$h11), 
	'11' => array('id'=>12,'prize'=>'<img src="'.$url.'/'.$rowlp['img_sl11'].'" width="49" height="49" class="boderbb">','num'=>$y12,'v'=>$h12),
	
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
       if($rid=="1"){$prize=$rowlp['img_sl0'];  $lm=$rowlp['type0']; $num="5"; $title=$rowlp['title0'];
  }elseif($rid=="2"){$prize=$rowlp['img_sl1'];  $lm=$rowlp['type1']; $num="10"; $title=$rowlp['title1'];
  }elseif($rid=="3"){$prize=$rowlp['img_sl2'];  $lm=$rowlp['type2']; $num="20"; $title=$rowlp['title2'];
  }elseif($rid=="4"){$prize=$rowlp['img_sl3'];  $lm=$rowlp['type3']; $num="CC5"; $title=$rowlp['title3'];
  }elseif($rid=="5"){$prize=$rowlp['img_sl4'];  $lm=$rowlp['type4']; $num="CC10"; $title=$rowlp['title4'];
  }elseif($rid=="6"){$prize=$rowlp['img_sl5'];  $lm=$rowlp['type5']; $num="10"; $title=$rowlp['title5'];
  }elseif($rid=="7"){$prize=$rowlp['img_sl6'];  $lm=$rowlp['type6']; $num="10"; $title=$rowlp['title6'];
  }elseif($rid=="8"){$prize=$rowlp['img_sl7'];  $lm=$rowlp['type7']; $num="10"; $title=$rowlp['title7'];
  }elseif($rid=="9"){$prize=$rowlp['img_sl8']; $lm=$rowlp['type8']; $num="10"; $title=$rowlp['title8'];
  }elseif($rid=="10"){$prize=$rowlp['img_sl9']; $lm=$rowlp['type9']; $num="10"; $title=$rowlp['title9'];
  }elseif($rid=="11"){$prize=$rowlp['img_sl0']; $lm=$rowlp['type10']; $num="10"; $title=$rowlp['title10'];
  }elseif($rid=="12"){$prize=$rowlp['img_sl11']; $lm=$rowlp['type11']; $num="10"; $title=$rowlp['title11'];
                }else{$prize="";  $lm=''; $num=""; $title="";}

if($user){
	$time = time();
	$uid  = $user['uid'];
	$jf   = 15;
	$money = intval($title);
	if($user['score']>=$jf){
//抽奖消费微积分	
								
$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','-1','微积分','抽奖消费微积分','$jf','$time')");
$this->db->Query("UPDATE `@#_member` SET `score`=`score`-'$jf' where uid='$uid'");
										
//抽奖消费微积分
   if($lm=="1"){ ///1是产品
								
$this->db->Query("INSERT INTO `@#_member_lucky`(`uid`,`type`,`content`,`money`,`time`)VALUES('$uid','$lm','$title','$money','$time' )");
									
   }elseif($lm=="2"){///2是现金
	  
$this->db->Query("INSERT INTO `@#_member_lucky`(`uid`,`type`,`content`,`money`,`time`)VALUES('$uid','$lm','$title','$money','$time' )"); 	
   }else{
$this->db->Query("insert into `@#_member_account` (`uid`,`type`,`pay`,`content`,`money`,`time`) values ('$uid','1','微积分','抽奖得的微积分','$money','$time')");
$this->db->Query("UPDATE `@#_member` SET `score`=`score`+'$money' where uid='$uid'");	   
	   }
 }
}



echo json_encode($res); 

  
?>
