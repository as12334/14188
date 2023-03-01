<?php 
session_start();
require"../../../conn.php";
$u = isset($_GET['u'])?html($_GET['u']):'';

$base64_decode = base64_decode($u);

$urlarr        = explode("&",$base64_decode);

$count         = count($urlarr);

if($count==2)//判断urls参数总数是否满足条件
{ 

 $user       = $urlarr[0];
 $pass       = $urlarr[1];

$sqlok='select * from `'.$tablepre.'member_co` where `user`="'.$user.'" and `password`="'.($pass).'" and `pass`="yes" and `haoping`="yes"';
$resultok=$db->query($sqlok);
$rowok=$db->getrow($resultok);
if($rowok){
	$_SESSION['user'] = $user;
	}
}
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
        <link href="<?php echo $url; ?>/m/css/haoping.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        <!--<link href="<?php echo $url; ?>/m/css/bag.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" /> -->
         <title><?php echo $rowSeo['title'] ?></title>
        <meta content="<?php echo $rowSeo['keys'] ?>" name="keywords">
        <meta content="<?php echo $rowSeo['description'] ?>" name="description">
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/m/js/underscore.js?ts=<?php echo date("YmdHis"); ?>"></script>

</head>
<body>

    <!-- 主体 -->


    <div class="main">
        <!-- 页头 -->
                    <?php require"../../top.php";?>
                <!-- /页头 -->

		<div class="app">
                                <!--<div class="go-app">
        <a href="javascript:void(0);" class="joa_load_app">
            <img src="/images/go_load.png">
            <i class="closed"></i>
        </a>
    </div> -->
    <header id="head" class="head">
        <div class="fixtop">
        <span id="classify" class="classify"><a href="javascript:;" class="btn btn-left btn-type"></a></span>
        <span id="index"><i class="logo"><img src="<?php echo $url; ?>/m/images/logo.fw.png"></i></span>
        <!--<span id="user"><a href="javascript:;" class="btn btn-right btn-sign"></a></span> -->
    </div>
    </header>

    
    <div class="nav_box">
        <nav class="nav" id="nav">
            <ul class="">
            <li><a href="<?php echo $url; ?>/m"><em class="icon icon-jz"></em><span>聚优折扣</span><em class="line"></em></a></li>
            <li><a href="<?php echo $url; ?>/m/user/"><em class="icon icon-bz"></em><span>个人中心</span><em class="line"></em></a></li>
            <li><a href="<?php echo $url; ?>/m/jiu"><em class="icon icon-jk"></em><span>9.9包邮</span><em class="line"></em></a></li>
            <li class=" _border"><a  class="active" href="<?php echo $url; ?>/m/jifen/haoping/"><em class="icon icon-yg"></em><span>抽奖红利</span><em class="line"></em></a></li> 
            </ul>
        </nav>
    </div>
<!-- main end-->
<script>
    var wap_type = getCookie('wap_type');
    if(wap_type!='' || wap_type != null){
        var wap_type_int = parseInt(wap_type);
        switch(wap_type_int){
            case 1:
            case 2:
                $(".go-app").hide();
                break;
        }
    }
</script>


     <div class="haoping_box">
       <div class="haoping">
       <iframe scrolling="no" frameborder="0" width="100%" src="<?php echo $url; ?>/m/jifen/haoping/lucky.php" height="447" ></iframe>
       </div>
     </div>

               
            <div class="alert_fullbg"></div>
            <!--<div class="tips"><div><img src="<?php echo $url; ?>/m/images/images.png" width="100%;"></div></div>
            <div class="tips01"><div><img src="<?php echo $url; ?>/m/images/images01.png" width="100%;"></div></div> -->
            <div  id="back_top"  class="slide-box" style="display:none">
    <!--<a href="../cart" class="bag-enter"><img src="<?php echo $url; ?>/m/images/icon/bag-icon.png"></a> -->
    <a href="#" class="back-top" ><img src="<?php echo $url; ?>/m/images/icon/back-top.png"></a>      
</div>
<script type="text/javascript">
(function(){
    $.ajax({
        type:"post",
        url:'http://'+location.host+'/shop/getCart',
        success:function (rs) {
            if(rs.goodsNum > 0){
                var $html = $('.slide-box .bag-enter').html();
                $('.slide-box .bag-enter').html($html+'<em>'+rs.goodsNum+'</em>');
            }
        }
    });
})();
//回到顶部图标显示隐藏效果
document.getElementById("back_top").style.display = "none";
window.onscroll = function () {
    if (document.documentElement.scrollTop + document.body.scrollTop > 100) {
        document.getElementById("back_top").style.display = "block";
    }
    else {
        document.getElementById("back_top").style.display = "none";
    }
}
</script>
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
<?php require_once('../../bottom.php');?>

            <style>#foot{height: 120px;}</style>         </div>
	</div>
   

<!-- /主体 -->

    <!-- main js -->
    <script type="text/javascript">
    function addLoadEvent(func) {
        var oldOnload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        }
        else {
            window.onload = function() {
                oldOnload();
                func();
            }
        }
    }
    // 添加Load事件处理
    addLoadEvent(hideMenu);
    function hideMenu() {
        setTimeout("window.scrollTo(0, 0)", 1);
    }

    $('.alert_black_bg .close').on('click', function(){
        $('.alert_black_bg').hide();
    });

    var browser={

        v: (function(){
            var u = navigator.userAgent, app = navigator.appVersion, p = navigator.platform;
            return {
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                ios: !!u.match(/i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
                iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                weixin: u.indexOf('MicroMessenger') > -1, //是否微信
                webApp: u.indexOf('Safari') == -1, //是否web应该程序，没有头部与底部
                UCB: u.match(/UCBrowser/i) == "UCBrowser",
                QQB: u.match(/MQQBrowser/i) == "MQQBrowser",
                win: p.indexOf('Win') > -1,//判断是否是WIN操作系统
                mac: p.indexOf('Mac') > -1//判断是否是Mac操作系统

            };
        })()
    }

    var F_weixin = function(){
        if (browser.v.weixin ) {

            $("ul.goods-list a").on('click', F_alert_tips);
            $("div.alert_fullbg").on('click',F_alert_hide);

        }else{

        }
    }

    var type = "";

    var F_alert_tips = function(type) {

        if(type == "down"){
            $(".tips").css({
                display:'block'
            });
        } else {
            $(".tips01").css({
                display:'block'
            });
        }

        $(".alert_fullbg").css({
            display:'block'
        })

        return false;
    }
    var F_alert_hide =function() {
        $(".tips").hide();
        $(".tips01").hide();
        $(".alert_fullbg").hide();
    }


    F_weixin();


    var F_pc = function(){
            if( browser.v.win || browser.v.mac){
                $("#alert_wrap .sub").html("立即下载");
            }else{
                $("#alert_wrap .sub").html("立即启动");
            }
        }
        F_pc();

    var refreshTimer = null,
            mebook = mebook || {};

    /*
     *滚动结束 屏幕静止一秒后检测哪些图片出现在viewport中
     *和PC端不同 由于无线速度限制 和手机运算能力的差异 1秒钟的延迟对手机端的用户来说可以忍受
     */
    $(window).on('scroll', function () {
        if (refreshTimer) {
            clearTimeout(refreshTimer);
            refreshTimer = null;
        }
        refreshTimer = setTimeout(mebook.getInViewportList(), 300);
    });




    $.belowthefold = function (element) {
        var fold = $(window).height() + $(window).scrollTop();
        return fold <= $(element).offset().top;
    };

    $.abovethetop = function (element) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height();
    };

    /*
     *判断元素是否出现在viewport中 依赖于上两个扩展方法
     */
    $.inViewport = function (element) {
        return !$.belowthefold(element) && !$.abovethetop(element)
    };

    mebook.loadImg = function (li) {
        if (li.length) {
            var img = li,
                    src = img.attr('_src');
            img.attr('src', src);
        }
    };

    mebook.getInViewportList = function () {
        var list = $('.lazy'),
                ret = [];
        list.each(function (i) {
            var li = list.eq(i);
            if ($.inViewport(li)) {
                mebook.loadImg(li);
            }
        });
    };
    $(window).scrollTop(1);
    mebook.getInViewportList();

    $(".goods-list li").each(function(){
        if($(this).find(".list-price").hasClass("start")){
            $(this).find("a").attr("href","javascript:;");
        }
    });

    $(".goods-list li").click(function(){
        if($(this).find(".list-price").hasClass("start")){
            $("#alert_exchange_new").css("top","40%");
            $(".alert_fullbg,#alert_exchange_new").show();
            $("#alert_exchange_new .fontL").html("下载客户端");
            $("#alert_exchange_new .fontS").html("收藏商品获开抢提醒");
            return false;
        }
    });
    
</script>

<script type="text/javascript" src="<?php echo $url; ?>/m/js/kimi.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script type="text/javascript" src="<?php echo $url; ?>/m/js/common.js?ts=<?php echo date("YmdHis"); ?>"></script>

<script type="text/javascript" src="<?php echo $url; ?>/js/lightbox.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/js/goodfavoritefooter.js?ts=<?php echo date("YmdHis"); ?>" type="text/javascript"></script>

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