<?php session_start();require"../../conn.php";
 $keywords=isset($_POST['keywords'])?html($_POST['keywords']):'';
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
        <link href="<?php echo $url; ?>/m/css/bag.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        <title>搜索<?php echo $keywords; ?>的商品结果页-<?php echo $rowSeo['name'] ?>网</title>
        <meta content="<?php echo $keywords; ?>,<?php echo $keywords; ?>优惠,<?php echo $keywords; ?>打折,<?php echo $rowSeo['name'] ?>网" name="keywords">
    <meta content="<?php echo $rowSeo['name'] ?>网为您精选<?php echo $keywords; ?>,全场低至1折起包邮，买<?php echo $keywords; ?>就上<?php echo $rowSeo['name'] ?>网。" name="description">
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/m/js/underscore.js?ts=<?php echo date("YmdHis"); ?>"></script>

</head>
<body>

    <div class="main">
<!-- 页头 -->
                    <?php require"../top.php";?>
                <!-- /页头 -->
        <div class="app">
            <header id="head" class="head">
                <div class="fixtop">
                    <span id="classify" class="classify"><a href="javascript:;" class="btn btn-left btn-type"></a></span>
                    <span id="index" class="s-index">
                        <div  class="search-area">
                            <form id="search-form" action="<?php echo $url; ?>/m/search/" method="post">
                                <div class="box-search">
                                    <input type="text" id="search_keyword" name="keywords" value="<?php echo $keywords; ?>"  x-webkit-speech="" placeholder="搜索商品" autocomplete="off">
                                    <a href="javascript:void(0)" class="del"><img src="<?php echo $url; ?>/m/images/icon/del.png"></a>
                                </div>
                                    <button id="search-submit" onclick="search();" type="submit">搜索</button>
                            </form>
                        </div>
                    </span>
                    <span id="user" style="display:none;"><a href="javascript:;" class="btn btn-right btn-sign"></a></span>
                </div>
            </header>
            <div id="goods" class="clear">
                


<section  class="goods" id="goods">
    <ul class="goods-list clear" >
     <?php
		
$sq  = '';  
$ss  = '';
$key = '';
$st  = ' ';
//如果有关键字
if ($keywords!=''){
	
	$len  = strlen($keywords);

	
	for($i=0;$i<=$len;$i++){
		
	 $key = cut_strs($keywords,$i,1);
	if ($key!=''){
 	 if ($i==0){
	
	      $sq .=' and title like "%'.$key.'%"'.$st;
	 }else{
		  $sq .=' or title like "%'.$key.'%"'.$st;
		 }
	}else{
	
		}	
	}        		
}
		
		
		
$sqlcountip='select COUNT(*) from `'.$tablepre.'pro_co` where pass="yes" '.$sq.'';
$counterip=$db->getqueryallrow($sqlcountip);
$sqlip='select * from `'.$tablepre.'pro_co` where pass="yes" '.$sq.' order by id desc';				
$pip=new page();
$pip->setpage($counterip,100);
$sqlip.=$pip->getlimit();  
$rrip=$db->query($sqlip);
while($row=$db->getrow($rrip)){?>
    <li data_jstype="<?php echo $row['id'] ?>" class="box" style="overflow:hidden">        <a class="goods-a" href="<?php echo $url; ?>/m/item/?id=<?php echo $row['id'] ?>">            <img class="lazy" _src="<?php echo $url; ?>statics/uploads/<?php echo $row['img_sl0'] ?>" src="<?php echo $url; ?>/m/img/kimiblank.gif" onload="if (this.width!=this.height){this.height=this.width;}" >            
   <!-- <span class="icon new">新品</span> -->
         </a>        <a href="<?php echo $url; ?>/m/item/?id=<?php echo $row['id'] ?>" id="click_js" target="_blank">			<h3><?php echo $row['title'] ?></h3>            <div class="list-price buy ">                <span class="price-new"><i>￥</i><?php echo $row['pro_can2'] ?></span><!--<i class="del">￥<?php echo $row['pro_can1'] ?></i> -->                <span class="good-btn">
         <?php if($row['id']=="A"){?>
    <img src="<?php echo $url; ?>/m/images/icon/brand.png">
 品牌折扣<?php }elseif($row['id']=="B"){?> <img src="<?php echo $url; ?>/m/images/icon/t.gif">
 去天猫<?php }elseif($row['id']=="C"){?> <img src="<?php echo $url; ?>/m/images/icon/tb.png">
 去淘宝<?php }else{?><?php }?><img src="<?php echo $url; ?>/m/images/icon/kimi.png">
 特卖</span>            </div>        </a>    </li>
 
 <?php }?>
 
    </ul>
</section>

<div class="more" id="page-no-next" style="display: none;"><span>亲，已经到底了</span></div>

<script id="goods_show_hidden" type="text/tmpl">
    <li  data_jstype="_taobao_flag_">
        <a class="goods-a" href="_targetUrl_">
            <img class="lazy" _src="_picurl_" src="<?php echo $url; ?>/m/img/kimiblank.gif">
            _is_new_ _is_over_
        </a>
        <a href="_jumpUrl_" id="click_js" target="_target_">
			<h3>_title_</h3>
            <div class="list-price _class_ ">
                <span class="price-new"><i>￥</i>_cprice_</span><i class="del">￥_oprice_</i>
                <span class="good-btn">_tag_ _status_</span>
            </div>
        </a>
    </li>
</script>

<script id="goods_new_icon_hidden" type="text/tmpl">
    <span class="icon new">新品</span>
</script>

<script id="goods_buy_over_icon_hidden" type="text/tmpl">
    <em class="buy-over">抢光了</em>
</script>




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

        </div>
    </div>

<!-- /主体 -->

  
<script type="text/javascript" src="<?php echo $url; ?>/m/js/kimi.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script type="text/javascript" src="<?php echo $url; ?>/m/js/common.js?ts=<?php echo date("YmdHis"); ?>"></script>
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

        //    $("ul.goods-list a").on('click', F_alert_tips);
        //    $("div.alert_fullbg").on('click',F_alert_hide);

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
    <script type="text/javascript">
        $('.del').click(function(){
            $('#search_keyword').val('');
        });
    </script>

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