<?php 
session_start();
require"../../../conn.php";
if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		msg('','location="/m/login/"');
	}
$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';		 
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);

$sqladdr='select * from `'.$tablepre.'address` where `email`="'.$row['email'].'"';
$resultaddr=$db->query($sqladdr);
$rowaddr=$db->getrow($resultaddr);

//总积分
$sqljf='select sum(jf) from `'.$tablepre.'jifen` where `email`="'.$row['email'].'"';
$resultjf=$db->query($sqljf);
$rowjf=$db->getrow($resultjf);


$sqlmake='select * from `'.$tablepre.'jifen` where email="'.$row['email'].'" and type="1" order by id desc';			
$rrmake=$db->query($sqlmake);
$rowmake=$db->getrow($rrmake);

$mday  =  date("Y-m-d",$rowmake['wtime']);
$makeday  = date("Y-m-d");
$makeday1 = date("Y-m-d",strtotime("-1 days"));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
        <title>我的积分</title>
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <!-- head css -->
        
        <link href="<?php echo $url; ?>/m/css/other.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
        
        <script type="text/javascript">
            var versionNumber="ts=3b5d42560ca10c23_1445665610";
        </script>
        <!-- H5 -->
    </head>
    <body>
        <!-- 主体 -->
        
    <div class="main">
        <div class="app">
            <header id="head" class="head">
            <div class="fixtop">
            <span class="classify" id="t-find"><a class="btn btn-left  btn-back" href="<?php echo $url; ?>/m/user"></a></span>
            <span id="t-index">我的积分</span>
            
            </div>
            </header>
           
                        <ul id="my-address" class="my-address" style="min-height:;">
                                <li class="normal">
                    <span class="price">
	                            <span class="font">我的积分总余额</span>:<b class="red"><?php  if($rowjf['sum(jf)']==''){echo 0;}else{echo $rowjf['sum(jf)'];} ?></b><!-- <i class="juandou"></i> -->
                                <?php if($rowmake['jf']==''){?>
                                <p>（每天签到领积分，连续7天最高可领30）</p>
                                <?php }else{?>
	                            <p>（您已连续签到 <span class="red"><?php echo $rowmake['types']; ?></span> 天，明天继续签到可领  <span class="red">
                                <?php 
if($makeday == $mday && $rowmake['jf']==30){ 
		  echo 30;
		  }elseif($makeday == $mday && $rowmake['jf']==25){
		   echo 30;
		  }elseif($makeday == $mday && $rowmake['jf']==20){
		   echo 25;
		  }elseif($makeday == $mday && $rowmake['jf']==15){
		   echo 20;
		  }elseif($makeday == $mday && $rowmake['jf']==10){
		  echo 15;
		  }else{
			  echo 10;
			  }
?>
                                </span> ） </p>
                                <?php }?>
	                        </span>
                </li>
                <li class="normal">
                <table width="100%" border="0" cellspacing="1" cellpadding="0" class="invstatab1"  style="font-size:12px; ">
               <tr>  
                <td class="title1 b_co" width="22%">时间</td>
                <td class="title1 b_co" >内容</td>
                
                <td class="title1 b_co" width="15%">状态</td>
                <td class="title1 b_co" width="15%">操作</td>
              </tr>
<?php 
/*
0 注册
1 签到
2 邀请好友
3 完善注册信息
4 认证电子邮箱
5 认证手机号码
6 积分兑换
7 幸运抽奖
8 好评抽奖 */

//如果有关键字
$sq='';

$sqlsjf='select sum(jf) from `'.$tablepre.'jifen` where `email`="'.$row['email'].'" and lm >=2 '.$sq.'';
$resultsjf=$db->query($sqlsjf);
$rowsjf=$db->getrow($resultsjf);
$sqlcountjf='select COUNT(*) from `'.$tablepre.'jifen` where `email`="'.$row['email'].'"  and lm >=2 '.$sq.'';
$counterjf=$db->getqueryallrow($sqlcountjf);
$sqljf='select * from `'.$tablepre.'jifen` where `email`="'.$row['email'].'" and lm >=2  '.$sq.' order by `id` desc';				
$pjf=new page();
$pjf->setpage($counterjf,30);
$sqljf.=$pjf->getlimit();
$resultjf=$db->query($sqljf);
while ($rowjf=$db->getrow($resultjf)){
	if($rowjf['types']==0){$types="待提交";}elseif($rowjf['types']==1){$types="<span style='color:#03F;'>待发货</span>";}elseif($rowjf['types']==2){$types="<span style='color:red;'>已发货</span>";}elseif($rowjf['types']==3){$types="<span style='color:green;'>已收货</span>";}
	
			  ?>
    <tr>
     
      <td class="b_co"><?php echo date("Y-m-d",$rowjf['wtime']);?></td> 
      <td class="b_co"><?php echo $rowjf['title'];?></td>
      
      
      <td class="b_co"><?php echo $types;?></td>
      <td class="b_co" ><?php if($rowjf['types']==0){?><a href="<?php echo $url; ?>/m/jifen/wjf/look.php?id=<?php echo $rowjf['id'];?>" class="green">查看</a><?php }else{?>
      <a href="<?php echo $url; ?>/m/jifen/wjf/show.php?id=<?php echo $rowjf['id'];?>" class="green">查看</a>
      <?php }?>
      </td>
    </tr>
              <?php
}

?>
              </table>

 <table width="100%" border="0" cellspacing="1" cellpadding="0"  style="font-size:12px; " >
               <tr>  
                <td align="center"><?php 
		if (isset($counterjf)&&$counterjf){
		$pra='';
		echo $pjf->getpagemenu($pra,6,'首页','上一页','下一页','尾页');
		
		}else{ 
		?>
	                  您还没有礼品哦，赶快去<a href="<?php echo $url; ?>/m/jifen/haoping" target="_blank" class="green">【抽奖】</a> 
             <?php }?>   </td>
                </tr>
                </table>

       
             </li>
                            </ul>
                        <?php require_once('../../bottom.php');?>



        </div>
    </div>

        

        <!-- 微信分享配置 -->
        
        


    </body>
</html>