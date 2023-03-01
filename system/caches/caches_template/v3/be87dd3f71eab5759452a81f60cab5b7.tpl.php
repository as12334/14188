<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php 
            $wurl="http://".$_SERVER['HTTP_HOST']."/m";
 ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $webname; ?></title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
     <style>
 .app-icon .set-icon{background:url(<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('mob_logo'); ?>) no-repeat;background-size:40px auto;}
.thin-bor-left:before {
left: 0;
-webkit-transform-origin: 0;
transform-origin: 0;
}
.select-btn {
width: 24%;
height: 44px;
line-height: 42px;
box-sizing: border-box;
font-size: 14px;
text-align: center;
color: #999;
float: left;
position: relative;
z-index: 2;
}
.select-icon1:after {
content: '';
position: absolute;
width: 4px;
height: 1px;
background-color: #999;
-webkit-transform: rotate(45deg);
transform: rotate(45deg);
top: 11px;
left: 9px;
}
.select-icon1 {
width: 11px;
height: 11px;
display: inline-block;
vertical-align: middle;
position: relative;
background-color: #fff;
top: -2px;
border: 1px solid #999;
border-radius: 50%;
}
 </style>
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/index.css?v=151106" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/weixinindex.css" rel="stylesheet" type="text/css" />

	<script src="<?php echo G_TEMPLATES_JS; ?>/weixin/jquery190.js" language="javascript" type="text/javascript"></script>
   
	<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/weixin/IndexFun.js" language="javascript" type="text/javascript"></script>
       <script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/Index.js" language="javascript" type="text/javascript"></script> 
    
    <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/mobile/kimi.min.js"></script>
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/style.css" rel="stylesheet" type="text/css" />
</head>
<body fnav="1">
    <div class="" id="loadingPicBlock">
        <!-- 关注微信 -->
        <div id="div_subscribe" class="app-icon-wrapper" style="display: ;">
            <div class="app-icon">
                <a href="javascript:;" class="close-icon"><i class="set-icon"></i></a>
                <a href="javascript:;" class="info-icon">
                    <i class="set-icon"></i>
                    <div class="info">
                        <p>点击关注<?php echo _cfg('web_name_two'); ?>官方微信^_^</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- 焦点图 -->
    <!--<section id="sliderBox" class="hotimg"></section>-->
    
    <div class="area">
                <ul class="banner">
                <?php $ln=1;if(is_array($indexbanner)) foreach($indexbanner AS $banner): ?>
                <li><a href="<?php echo $banner['link']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $banner['img']; ?>"></a></li>
                <?php  endforeach; $ln++; unset($ln); ?>
                
                </ul>
                <div class="adType">
        </div>
            </div>
            
            <section class="g-main">
		    <ul class="m-lott-lipro">
            <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/home/profile/<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/mobile/chongzhi.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/home/profile/<?php echo $uids; ?>/">赚积分</a></span>
			        </li>
			        <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/home/qiandao/<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/nava1.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/home/qiandao/<?php echo $uids; ?>/">签到领奖</a></span>
			        </li>
				<li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/lucky/?yid=<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/fenxiang.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/lucky/?yid=<?php echo $uids; ?>/">礼品抽奖</a></span>
			        </li>
					 <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/invite/friends/<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/nava3.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/invite/friends/<?php echo $uids; ?>/">邀请赚钱</a></span>
			        </li>
					 <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/shaidan/?yid=<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/sd.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/shaidan/?yid=<?php echo $uids; ?>/">晒单</a></span>
			        </li>
                    <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/home/reg_shop/<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/shop1.jpg" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/home/reg_shop/<?php echo $uids; ?>/">商家入驻</a></span>
			        </li>
                    <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/huodong.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>/">发现</a></span>
			        </li>
                    <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/group/show/7/<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/tv.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/group/show/7/<?php echo $uids; ?>/">精彩视频</a></span>
			        </li>
                    <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/lottery/?yid=<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/nava2.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo WEB_PATH; ?>/mobile/lottery/?yid=<?php echo $uids; ?>/">充值抽奖</a></span>
			        </li>
                    
<?php  
$urls    = $_SERVER['HTTP_HOST']; 
$webname = $this->_cfg['web_name'];
$appurl  = $this->_cfg['apk_url'];
$txt     = "app";
$app     = strstr($urls,$txt);
if(!$app){
 ?>
                    <li>
		                <a href="<?php echo $appurl; ?>" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/app10.png" alt="" border="0">
		                </a>
		                <span><a href="<?php echo $appurl; ?>">下载APP</a></span>
			        </li>
                    
<?php 
} 
 ?>

		    </ul>

    </section>
<!-- 最新揭晓 -->
    <section class="g-main" style="padding-bottom:10px;">
	    <div class="m-tt1">
		    <h2 class="fl"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/lottery/<?php echo $uids; ?>/">最新揭晓</a></h2>
		    <div class="fr u-more">
			    <a href="<?php echo WEB_PATH; ?>/mobile/mobile/lottery/<?php echo $uids; ?>/" class="u-rs-m1"><b class="z-arrow"></b></a>
		    </div>
	    </div>
	    <article class="h5-1yyg-w310 m-round m-lott-li" id="divLottery">
		    <ul class="clearfix" id="ulNewAwary">
		    <?php $ln=1;if(is_array($shopqishu)) foreach($shopqishu AS $qishu): ?>
            <?php 
            $qishu['q_user'] = unserialize($qishu['q_user']);
             ?>
			        <li>
		                <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $qishu['id']; ?>/<?php echo $uids; ?>/" class="u-lott-pic">
		                    <img src="<?php echo G_TEMPLATES_IMAGE; ?>/loading.gif" src2="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qishu['thumb']; ?>" border="0" alt="" />
		                </a>
		              <p class="f-gx-user"><em class="zheng">中奖</em>  <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $qishu['q_uid']; ?>/<?php echo $uids; ?>/" class="blue z-user"><?php echo _strcut(get_user_name($qishu['q_uid']),10); ?></a></p>
			        </li>
		        
			   <?php  endforeach; $ln++; unset($ln); ?>     
		        <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/MLotteryFun.js"></script>
						<script type="text/javascript">
							$(document).ready(function(){gg_show_time_init("ulNewAwary",'<?php echo WEB_PATH; ?>',0);});					
						</script>
		    </ul>
	    </article>
    </section>
        <!--导航-->
        <div style="border-top: none;">
            <nav id="goodsNav" class="nav-wrapper">
                <div class="nav-inner">
                    <ul id="ulOrder1" class="nav-list clearfix">
                        <li order="1"  class="current"><a href="javascript:;"><span>即将揭晓</span></a></li>
                        <li order="0"><a href="javascript:;"><span>人气</span></a></li>
                        
                        <li order="2" ><a href="javascript:;"><span>最新</span></a></li>
                        <li order="3" ><a href="javascript:;"><span>价值</span></a></li>
                    </ul>
                </div>
                <!--点击添加或移除current--><a href="<?php echo WEB_PATH; ?>/mobile/mobile/glist/?yid=<?php echo $uids; ?>/">
               <div class="select-btn thin-bor-left" id="btnSearch">
                    <span class="select-icon1"></span>
                    <span>搜索</span>
                </div></a>
                <!--搜索-->
               
            </nav>
        </div>
        <!--商品列表-->
        <div  class="goods-wrap marginB" >
        <ul id="commentList" class="goods-list clearfix"></ul>
        
        <ul id="start" class="goods-list clearfix" style="display:none;">

                </ul>

        </div>
        
        <!--<div class="goods-wrap marginB">
            <ul id="ulGoodsList" class="goods-list clearfix"></ul>
            <div class="loading clearfix"><b></b>正在加载</div>
        </div> -->
        <!--底部-->
<input id="getwx" type="hidden" value="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" />     
<input id="getname" type="hidden" value="<?php echo _cfg('web_name_two'); ?>" />            
<input id="hidPageType" type="hidden" value="0" />
<input id="hidIsHttps" type="hidden" value="0" />
<input id="hidSiteVer" type="hidden" value="v13" />
<input id="hidOpenID" type="hidden" value=""/>
<?php include templates("mobile/index","footer");?>

<script type="text/javascript">
    var Base = {
        head: document.getElementsByTagName("head")[0] || document.documentElement,
        Myload: function (B, A) {
            this.done = false;
            B.onload = B.onreadystatechange = function () {
                if (!this.done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
                    this.done = true;
                    A();
                    B.onload = B.onreadystatechange = null;
                    if (this.head && B.parentNode) {
                        this.head.removeChild(B)
                    }
                }
            }
        },
        getScript: function (A, C) {
            var B = function () { };
            if (C != undefined) {
                B = C;
            }
            var D = document.createElement("script");
            D.setAttribute("language", "javascript");
            D.setAttribute("type", "text/javascript");
            D.setAttribute("src", A);
            this.head.appendChild(D);
            this.Myload(D, B);
        },
        getStyle: function (A, B) {
            var B = function () { };
            if (callBack != undefined) {
                B = callBack;
            }
            var C = document.createElement("link");
            C.setAttribute("type", "text/css");
            C.setAttribute("rel", "stylesheet");
            C.setAttribute("href", A);
            this.head.appendChild(C);
            this.Myload(C, B);
        }
    }
    function GetVerNum() {
        var D = new Date();
        return D.getFullYear().toString().substring(2, 4) + '.' + (D.getMonth() + 1) + '.' + D.getDate() + '.' + D.getHours() + '.' + (D.getMinutes() < 10 ? '0' : D.getMinutes().toString().substring(0, 1));
    }
    $(document).ready(function () {
        var _SkinDomain = $("#hidIsHttps").val() == "1" ? "<?php echo G_TEMPLATES_JS; ?>/" : "<?php echo G_TEMPLATES_JS; ?>/";
        Base.getScript(_SkinDomain+'/weixin/Bottom.js?v=' + GetVerNum(), function () {
            var _pagetype = $("#hidPageType").val();
            var _footer = $("div.footer");
            var _cartpay = $("#mycartpay");
            var _cartlist = 0;//$("li", "#cartBody");
            var _saysome = $("div.saysome");
            var _curpage = window.location.href.toLowerCase();
            
            var _ishide = false;
            if (_cartpay.length > 0 && _cartlist.length > 0) {
                _footer = _cartpay;
                _pagetype = "1";
                _ishide = true;
            }
            else if (_saysome.length > 0)
            {
                _footer = _saysome;
                _pagetype = "1";
            }
            //弹出输入法是否隐藏底部导航
            if (_curpage.indexOf('/member/recharge.do')>0 || _curpage.indexOf('/member/goodsbuydetail-')>0)
            {
                _ishide = true;
            }

            var _hh = parseInt($(window).height());
            var _ww=$(window).width();
            if (_pagetype != "-1" && _footer.length>0) {
                var SetFooterPos = function () {
                    var j = 0;
                    var _setObj;
                    _setObj = setInterval(function (){
                        var _hh1 = parseInt($(window).height());
                        var _hh2 = _hh - _hh1;

                        if (_hh1 > 200) {
                            if (_hh2 > 0) {
                                if (parseInt($(window).width()) != parseInt(_ww)) {
                                    _footer.css("bottom", 0).show();
                                }
                            }
                            else {
                                _footer.css("bottom", 0).show();
                            }
                            j++;
                           //$("#mycarttest").html(_hh1 + "||" + _hh2 + "||" + $(window).width());
                            if (j == 3) {
                                clearInterval(_setObj);
                            }
                        }
                    }, 100);
                }

                SetFooterPos();

                window.onresize = function () {
                    if (_ishide) {
                        _footer.hide();
                    }
                    SetFooterPos();
                };
            }
        });
    });
</script>

       <!-- <div class="weixin-mask" style="display: none;"></div> -->
    </div>
    <script>
	var base_url = "<?php echo WEB_PATH; ?>/mobile/mobile/orderlist/1";
    var ehtml = '<div class="loading clearfix"><b></b>正在加载...</div>';

                    
					$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html( "").show();
                        }
                    });
             	
$(function(){
       
    scrollPage(getGoodsList); //启用无限滚动 触发事件后执行回调函数
        
        function getGoodsList(page){
              $.post(base_url,{"page":page},function(data){  
			          
                    $("#commentList").append(data);
              })
        }
    });
    /*
     * 描述：无限分页功能，当页面滚动到dataMore 时 触发 调用数据功能
     * 使用方法：需要页面添加  dataMore(滑动加载更多数据)
     * 参数：callBackFun  回调函数 （ajax 请求数据的函数）
     * 返回值：无
     * */
    var isload = true;
    var page=1;
	
    function scrollPage(callBackFun) {
        $(window).scroll(function() {
            if (isload) { //ajax在后台获取数据时，设值其false，防止页面多次加载
                // var more_top =document.getElementById("dataMore").offsetTop; //加载更多层距离document 顶部的距离
                if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 150) {
                    //更多出现在滚动区域
                    page++;
                   if(page>="<?php echo $totals; ?>"){
                        isload=false;
                    }
					$("#start").html(ehtml).show();
					 setTimeout(function () {
				             	$("#start").hide();
                                }, 3000);
                    callBackFun(page);
                }
            }
        });
    }  
	
$(function(){
	$("#ulOrder1 li").click(function(){
		var id=$("#ulOrder1 li").index(this);
		var order = $(this).attr("order");
		$("#ulOrder1 li").removeClass().eq(id).addClass("current");
		
		 var base_url = "<?php echo WEB_PATH; ?>/mobile/mobile/orderlist/"+order;
         
		 $("#commentList").html(ehtml).show();
		 

$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html( "").show();
                        }
                    });
$(function(){
       
    scrollPage(getGoodsList); //启用无限滚动 触发事件后执行回调函数
        
        function getGoodsList(page){
              $.post(base_url,{"page":page},function(data){  
			          
                    $("#commentList").append(data);
              })
        }
    });
    /*
     * 描述：无限分页功能，当页面滚动到dataMore 时 触发 调用数据功能
     * 使用方法：需要页面添加  dataMore(滑动加载更多数据)
     * 参数：callBackFun  回调函数 （ajax 请求数据的函数）
     * 返回值：无
     * */
    var isload = true;
    var page=1;
	
    function scrollPage(callBackFun) {
        $(window).scroll(function() {
            if (isload) { //ajax在后台获取数据时，设值其false，防止页面多次加载
                // var more_top =document.getElementById("dataMore").offsetTop; //加载更多层距离document 顶部的距离
                if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 150) {
                    //更多出现在滚动区域
                    page++;
                   if(page>="<?php echo $totals; ?>"){
                        isload=false;
                    }
					$("#start").html(ehtml).show();
					 setTimeout(function () {
				             	$("#start").hide();
                                }, 3000);
                    callBackFun(page);
                }
            }
        });
    }  
 
	});
	
})

	</script>

    <script type="text/javascript">
  var carousel_index = function(){
	    //var area_h=$(".banner li a").height();
		//$(".area").css("height",area_h);
        if($(".banner li").size() <= 1) return;
        $(".banner li").each(function(){
            $(".adType").append('<a></a>');
        });
		$('.area').swipeSlide({
		continuousScroll:true,
		speed : 3000,
		transitionType : 'cubic-bezier(0.22, 0.69, 0.72, 0.88)'
		},function(i){
		$('.adType').children().eq(i).addClass('current').siblings().removeClass('current');
		});
    }
    carousel_index();
</script>
</body>
</html>
