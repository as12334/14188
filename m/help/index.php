<?php 
session_start();
require"../../conn.php";?>
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
        
        <title><?php echo $rowSeo['name'] ?>网-帮助中心</title>
        <meta content="<?php echo $rowSeo['name'] ?>折扣,独家,超值,品牌折扣,值得买,<?php echo $rowSeo['name'] ?>网" name="keywords">
    <meta content="<?php echo $rowSeo['name'] ?>网-专注独家折扣，汇聚全网最优质折扣商品，每日千款超值商品低至1折起，10:00点开始，限量抢购。<?php echo $rowSeo['name'] ?>折扣品牌特卖会，独家验货，样品质检，一个值得买的打折网。" name="description">
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/m/js/underscore.js?ts=<?php echo date("YmdHis"); ?>"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/m/css/md-other.css?ts=<?php echo date("YmdHis"); ?>" />

</head>
<body>
   
    <!-- 主体 -->

    <div class="main">
        <div class="app">
            	            <header id="head">
	                <div class="fixtop">
	                    <span class="classify" id="t-find"><a class="btn btn-left  btn-back" href="<?php echo $url; ?>/m/user"></a></span>
	                    <span id="t-index">帮助中心</span>
	                   <span id="t-user"></span>
	                </div>
	            </header>
                        <dl class="help-center">
                <dt><span>问题:</span>什么是积分，积分有什么用</dt>
                <dd><span>回答:</span>
                    <p>积分累积到一定数量，可以免费抽奖。1000积分约等于一元，具体请登录官方网站（<a href="<?php echo $url; ?>"><?php echo $yumin; ?></a>）或<?php echo $rowSeo['name'] ?>官方网站（<a href="<?php echo $url; ?>"><?php echo $yumin; ?></a>）在"积分商城"查看。感谢您对<?php echo $rowSeo['name'] ?>/九块邮的支持！</p>
                </dd>
               <!-- <dt><span>问题:</span>浏览商品</dt>
                <dd><span>回答:</span>
                    <p>点击首页左上角商品分类图标显示商品类目或通过搜索关键字即可找到你喜欢的商品宝贝使用了如下折扣方式：拍下改价、VIP价格、优惠券价格。是否是拍下改价、VIP价格、优惠券价格宝贝，<?php echo $rowSeo['name'] ?>会在宝贝标题描述中提示。</p>
                </dd> -->
                <dt><span>问题:</span>如何购买</dt>
                <dd><span>回答:</span>
                    <p>点击查看商品详情，点击"立即购买"按键，即可登录京东、美丽说、淘宝等等并购买</p>
                </dd>
               
                
                <dt><span>问题:</span>为什么宝贝价格和在京东、美丽说、淘宝等等看到的不一致？</dt>
                <dd><span>回答:</span>
                    <p>部分卖家会使用京东、美丽说、淘宝等等提供的优惠方式进行活动，如果您看到价格不一致，那可能就是该宝贝使用了如下折扣方式：拍下改价、VIP价格、优惠券价格。
                        是否是拍下改价、VIP价格、优惠券价格宝贝，<?php echo $rowSeo['name'] ?>会在宝贝标题描述中提示。</p>
                </dd>
                <dt><span>问题:</span>卖家不发货或虚假发货怎么办？</dt>
                <dd><span>回答:</span>
                    <p>如遇到不发货或一些卖家违返协议的问题，可以通过淘宝的正常渠道投诉卖家。也可以投诉至<?php echo $rowSeo['name'] ?>在线客服，我们会尽最大努力协助你维护权益。
                        客服QQ：<?php echo $rowSeo['qq'] ?></p>
                </dd>
            </dl>
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
<script>
var wap_type = getCookie('wap_type');
if(wap_type!='' || wap_type != null){
    var wap_type_int = parseInt(wap_type);
    switch(wap_type_int){
        case 1:
            $("#alert_wrap").hide();
            break;
    }
}
//alert($(".alert_wrap").attr("style"));
$('.joa_load_app').click(function(){
    JOA.iframe2open();
    JOA.jump2download();
});
</script>
                    </div>
    </div>

<!-- /主体 -->

<script type="text/javascript">
            $(function(){
            function hideMenu() {
                setTimeout("window.scrollTo(0, 0)", 1);
            }

            $('.alert_black_bg .close').on('click', function(){
                $('.alert_black_bg').hide();
                $('#foot').height(120);
            });
            });
            $(".go-app .closed").on("click",function(){
                $(".go-app").hide();
                return false;
            })

</script>
</body>
</html>