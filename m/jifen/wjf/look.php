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


  $sqllp='select * from `'.$tablepre.'jifen` where `email`="'.$row['email'].'" and `id`="'.$id.'"';
$resultlp=$db->query($sqllp);
if(!$rowlp=$db->getrow($resultlp)){
	msg('','location="'.$url.'/m/"');
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
        <title>选择收货地址</title>
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
        <style>
.btns{width:80px; height:26px; line-height:26px; background:url(<?php echo $url; ?>/images/btn_bg.gif) repeat-x; border:1px solid #ddd; cursor:pointer}
</style>
    </head>
    <body>
        <!-- 主体 -->
        
    <div class="main">
        <div class="app">
            <header id="head" class="head">
            <div class="fixtop">
            <span class="classify" id="t-find"><a class="btn btn-left  btn-back" href="<?php echo $url; ?>/m/user"></a></span>
            <span id="t-index">收货信息</span>
            <span id="t-user">
            <?php if($rowaddr['name']!=""){?>
            <a href="<?php echo $url; ?>/m/address/edit/" class="normal" id="addAddress">修改</a></span>
            <?php }else{?>
            <a href="<?php echo $url; ?>/m/address/add/" class="normal" id="addAddress">添加</a></span>
            <?php }?>
            </div>
            </header>
            <?php if($rowaddr['name']!=""){?>
                        <ul id="my-address" class="my-address" style="min-height:140px;">
                                <li class="normal">
                    <a href="<?php echo $url; ?>/m/address/edit/">
                    <span class="name"><?php echo $rowaddr['name']?></span>
                    <span class="phone"><?php echo $rowaddr['mobile']?></span>
                                            <span class="default">默认</span>
                                        <br>
                    <span class="address">
                    <?php echo $rowaddr['province']?> <?php echo $rowaddr['city']?> <?php echo $rowaddr['town']?>&nbsp;<?php echo $rowaddr['addr']?>                    </span>
                    </a>
                </li>
                
                <li class="normal">
                    商品清单：<span style="color:red"><?php echo $rowlp['title'];?></span>
                </li>
                
                 <li class="normal">
                    <form action="<?php echo $url; ?>/m/jifen/wjf/do_look.php?id=<?php echo $id;?>" method="post" name="form1" id="form1" >
                    <input type="submit" tabindex="7" value="提 交" class="btns" id="">
                    </form>
                </li>
                            </ul>
							
							
							<?php }else{?>
                            
                            <div class="quan-show bar-normal">
                <div class="quan-con">
                    <p class="empty">
                        <span class="tip">还没有收货地址，赶紧添加一个吧</span>
                    </p>
                </div>
            </div>
            <?php }?>
                        <?php require_once('../../bottom.php');?>



        </div>
    </div>

    
        <!-- 微信分享配置 -->
        
        


    </body>
</html>