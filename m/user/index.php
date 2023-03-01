<?php 
session_start();
require"../../conn.php"; 

if(isset($_COOKIE['wuid'])){$uid = ($_COOKIE['wuid']);}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
        
        <link href="<?php echo $url; ?>/m/css/style.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        
        <title>个人中心 - <?php echo $rowSeo['title'] ?></title>
        <meta content="<?php echo $rowSeo['keys'] ?>" name="keywords">
        <meta content="<?php echo $rowSeo['description'] ?>" name="description">
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/m/js/underscore.js?ts=<?php echo date("YmdHis"); ?>"></script>

</head>
<body>
   
    <!-- 主体 -->

    <div class="main">
        <?php require"../top.php";?>
        <div class="app">
            <header id="head" class="head">
                <div class="fixtop">
                     <span id="t-find"><a class="btn btn-left btn-back" href="<?php echo $url; ?>/m/"></a></span>
                   <span id="t-index">个人中心</span>
                    <span id="t-user"><?php if (!isset($_COOKIE['wuid'])||isset($_COOKIE['wuid'])==''){?>
		
	                <?php }else{?><a href="<?php echo $url; ?>?/mobile/user/cook_end/"  class="normal">退出</a><?php }?></span>
                </div>
            </header>
            <div class="user-box">
            
            <?php if (!isset($_COOKIE['wuid'])||isset($_COOKIE['wuid'])==''){?>
		    <div class="user-show">
                        <p>Hi,等你好久了~</p>
                        <a href="<?php echo $url; ?>index.php/mobile/user/login/" class="go_login">登录/注册</a>
                    </div>
	                <?php }else{
						$sqls='select * from `'.$tablepre.'go_member` where  uid="'.$uid.'"';	
                        $results=$db->query($sqls);
                        $rows=$db->getrow($results);
						?>
                    
                     <ul class="action-list user-show">
                        <li>
                             <img src="<?php echo $url; ?>statics/uploads/<?php echo $rows['img']; ?>" class="profile" style="width:60px;height:60px;"><span><?php if($rows['username']==""){ echo $rows['email']; }elseif($rows['mobile']==""){echo $rows['username'];}else{echo $rows['mobile'];}  ?></span>
                        </li>
                    </ul>
					
					<?php }?>
                    
                                    
                                <!----><ul class="action-list">
                    <li><a href="<?php echo $url; ?>/m/order"><em class="icon icon-temai"></em><span>我的订单</span><em class="cur"></em></a></li>
                    <li><a href="<?php echo $url; ?>/m/cart"><em class="icon icon-bag"></em><span>我的购物袋</span><em class="cur"></em><span class="rest"></span></a></li>
                    <!--<li><a href="<?php echo $url; ?>/m/coupon"><em class="icon icon-quan"></em><span>我的优惠券</span><em class="cur"></em></a></li> -->
                </ul> 
                <!--<ul class="action-list">
                    <li><a href="<?php echo $url; ?>/m/jifen/wjf"><em class="icon icon-quan"></em><span>我的积分</span><em class="cur"></em></a></li>
                </ul> -->
                <ul class="action-list">
                    <li><a href="<?php echo $url; ?>index.php/mobile/home/address/"><em class="icon icon-address"></em><span>收货地址</span><em class="cur"></em></a></li>
                </ul>
                <!--<ul class="action-list">
                    <li><a href="<?php echo $url; ?>/m/help"><em class="icon icon-help"></em><span>帮助中心</span><em class="cur"></em></a></li>
                </ul> -->
               
            </div>

            <style type="text/css">
#alert_wrap .alert_contents .message .icon{
width: 55px;
}
.alert_contents {
font-size: 12px;
width: 100%;
height: 114px;
overflow: hidden;
}
.alert_contents .message{
margin: 1% 0 0 13%;
}
.alert_contents .message .icon{
width: 30%;
float: left;
margin:0 1% 0 0;
}
.alert_contents .sub{
border: none;
background: #2cbd2e;
border-radius: 6px;
color: #fff;
font-size: 12px;
margin-top: 2%;
width:32%;
text-align: center;
padding: 12px 0;
}
.alert_contents .sub:hover{background:#40c042;}
.alert_contents .sub:active{background:#40c042;}
#alert_wrap .alert_contents .message .jky_des{
height: 28px;
line-height: 28px;}
#alert_wrap .message .f16 {
color: #fff;
}
#alert_wrap .alert_contents .message .yellow{
line-height:22px;
color:#e5e5e5;
}
#alert_wrap .alert_contents .message .yellow img{
vertical-align:-1px;height:14px;margin-left:2px;}
#alert_wrap .alert_contents .sub{
position:absolute;
width:16%;
right:9%;
top:25%;
margin:0;
}
#alert_wrap .alert_contents .message {
margin:10px 2% 0;
height:55px;
}
</style>
 
<?php require_once('../bottom.php');?>


</body>
</html>