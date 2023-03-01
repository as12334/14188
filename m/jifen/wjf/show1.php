<?php 
session_start();
require"../../../conn.php";
$id=isset($_GET['id'])?html($_GET['id']):'';
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


  $sqllp='select * from `'.$tablepre.'jifen` where `email`="'.$row['email'].'" and `id`="'.$id.'"';
$resultlp=$db->query($sqllp);
if(!$rowlp=$db->getrow($resultlp)){
	msg('','location="'.$url.'/m"');
	};
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
           
       <table width="100%" cellpadding="0" align="center" border="0">
                                  <tr><td colspan="4">
                                  <?php if($rowlp['types']==1){?>
                                  <img src="<?php echo $url; ?>/images/lp/lp_1.gif?ts=<?php echo date("YmdHis"); ?>" width="100%">
                                  <?php }elseif($rowlp['types']==2){?>
                                  <img src="<?php echo $url; ?>/images/lp/lp_2.gif?ts=<?php echo date("YmdHis"); ?>" width="100%">
                                  <?php }elseif($rowlp['types']==3){?>
                                  <img src="<?php echo $url; ?>/images/lp/lp_3.gif?ts=<?php echo date("YmdHis"); ?>" width="100%">
                                  <?php }?>
                                  </td></tr>
                                  <tr><td width="25%">&nbsp;<?php echo date("Y-m-d H:i:s",$rowlp['ttime']);?>&nbsp;</td>
                                  <td width="25%">&nbsp;<?php echo date("Y-m-d H:i:s",$rowlp['ttime']);?>&nbsp;</td>
                                  <td width="25%">&nbsp;<?php if($rowlp['types']==1){}else{ echo date("Y-m-d H:i:s",$rowlp['ftime']); }?>&nbsp;</td>
                                  <td>&nbsp;<?php if($rowlp['types']==3){ echo date("Y-m-d H:i:s",$rowlp['stime']);}?>&nbsp;</td>
                                  </tr></table>
             </li> <li class="normal">
                    
                    <span class="name"><?php echo $rowaddr['name']?></span>
                    <span class="phone"><?php echo $rowaddr['mobile']?></span>
                                           
                                        <br>
                    <span class="address">
                    <?php echo $rowaddr['province']?> <?php echo $rowaddr['city']?> <?php echo $rowaddr['town']?>&nbsp;<?php echo $rowaddr['addr']?>                    </span>
                </li>
                            </ul>
                        <?php require_once('../../bottom.php');?>



        </div>
    </div>

        

        <!-- 微信分享配置 -->
        
        


    </body>
</html>