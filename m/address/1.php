
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
        <link href="//s.juancdn.com" rel="dns-prefetch">
        <link href="//s1.juancdn.com" rel="dns-prefetch">
        <link href="//d.juanpi.com" rel="dns-prefetch">
        <title>编辑地址</title>
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <!-- head css -->
        
    <link href="http://s.juancdn.com/jpwebapp_v1/css/pages/other.css?ts=4266453c0ac28a55_1448685758" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
        
        <script type="text/javascript">
            var versionNumber="ts=4266453c0ac28a55_1448685758";
        </script>
        <!-- H5 -->
    </head>
    <body>
        <!-- 主体 -->
        
     <!-- 废弃了 -->
 <style>
 	#top_weixin{
 		width: 100%; z-index: 9999; position:fixed;top:0;display: none; background:#e4e4e4;
 	}
 	#open_d{
		height: 36px;  z-index: 99999; width: 100%; margin: 0 auto; position: relative; max-width: 476px; min-width: 320px; line-height: 36px; font-size: 14px; font-family: '微软雅黑';background: #e4e4e4;border: 1px solid rgba(255,56,56,1);margin: 1px auto;color:rgba(255,56,56,1);
 	}
 	#xq_a{
 		z-index: 99999;  margin: 0 auto; position: relative;max-width: 480px; min-width: 320px;display:none;
 	}
 </style>
 <div id="top_weixin" class="clear">
	<div id="open_d">
		<i style="width: 36px; height: 36px; background: #e4e4e4; float: left;">
			<img src="http://s.juancdn.com/jpwebapp/images/yellow.png?1" width="36px">
		</i>
		<span style="padding-left: 10px; display: inline-block;">
			<span id="open_t">无法启动下载，请使用浏览器下载！</span>
			<a style="color:rgba(2,137,205,1); text-decoration: underline;" id="open_o">查看>></a>
		</span>
		<i style="width: 40px; height: 36px; position: absolute; right: 20px;"></i>
	</div>
	<div id="xq_a">
		<img width="100%" src="http://s.juancdn.com/jpwebapp/images/xiazai_a.png?1" />
	</div>
</div>

    <div class="main">
        <div class="app">
            <header id="head" class="head">
                <div class="fixtop">
                    <span class="classify" id="t-find">
                        <a class="btn btn-left btn-back" id="historyBack"></a>
                    </span>
                    <span id="t-index">编辑地址</span>
                    <span id="t-user">
                        <a href="javascript:;" class="normal js-submit" disabled="true">保存</a>
                    </span>
                </div>
            </header>
            <form id="global-form" action="http://m.juanpi.com/address/update" method="post">
                <input type="hidden" name="id" value="474906"/>
                <input type="hidden" name="from" value="">
                <input id="cdcode-input" type="hidden" name="cdcode" value="440306">
                <ul class="address-show">
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            收货人：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="username"
                               name="username" class="normal-input fl" value="林佳" maxlength="16" clearinput="on" required>
                        
                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            手机号：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="mobile"
                               name="mobile" class="normal-input fl" value="13420842451" maxlength="11" clearinput="on" required>

                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li>
                    <li class="normal">
                        <span class="auto-location"><i><img src="http://s.juancdn.com/weixin/images/icon/location-ico.png"></i></span>
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            省份：
                        </span>
                        <span class="tbl-cell">
                            <span class="new-input-span">
                                <span class="new-sel-box new-p-re">
                                    <input type="hidden" name="province" value="广东省"/>
                                    <label id="province_label">广东省</label>
                                    <select style="width:200px;" class="new-select" id="province-select"
                                            data-province="广东省">
                                    </select>
                                </span>
                            </span>
                        </span>

                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            城市：
                        </span>
                        <span class="tbl-cell">
                            <span class="new-input-span">
                                <span class="new-sel-box new-p-re">
                                    <input type="hidden" name="city" value="深圳市"/>
                                    <label id="city_label" data-city="深圳市">深圳市</label>
                                    <select style="width:200px;" class="new-select" id="city-select"
                                            data-city="深圳市">
                                    </select>
                                </span>
                            </span>
                        </span>

                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <em>&nbsp;</em>
                            区县：
                        </span>
                        <span class="tbl-cell">
                            <span class="new-input-span">
                                <span class="new-sel-box new-p-re">
                                    <input type="hidden" name="town" value="宝安区"/>
                                    <label id="town_label">宝安区</label>
                                    <select style="width:200px;" id="town-select" class="new-select"
                                            data-town="宝安区">
                                    </select>
                                </span>
                            </span>
                        </span>
                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li>
                    <li class="normal">
                        <span class="fl"  style="width:28%;">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            详细地址：
                        </span>
                        <textarea rows="3" cols="20" class="normal-area" name="addr" id="addr" maxlength="40">甲子塘北2巷8号</textarea>

                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li>
                    <!-- <li class="normal">
                        <span class="fl">
                            <em>&nbsp;</em>
                            邮编：
                        </span>
                        <input type="text" autocomplete="off" placeholder="非必填" x-webkit-speech="" name="postcode"
                               id="postcode" class="normal-input fl" value="" maxlength="6">

                        <p style="display:none;" class="wap-tips clear"><i><img
                                src="http://s.juancdn.com/jpwebapp/images/login/tips-ico.png"></i><span></span></p>
                    </li> -->
                </ul>
                <ul class="action-list">
                                            <li>
                            <span class="fl">当前地址为默认收货地址</span>
                            <input type="hidden" name="default" value="1"/>
                        </li>
                        
                </ul>
            </form>
            <button id="delAddress" class="delAddress" data-addr_id="474906">删除地址</button>
            <div id="foot">
    <div class="foot-nav" class="foot">
        <a href="http://www.juanpi.com/" id="pcJuanpi"><img src="http://s.juancdn.com/jpwebapp/images/icon/phone.png">电脑版</a>
        <a href="javascript:void(0);" class="joa_load_app"><img src="http://s.juancdn.com/jpwebapp/images/icon/client.png">客户端<img src="http://s.juancdn.com/jpwebapp/images/icon/tip.png" class="icon-tips"></a>
        <a href="http://m.juanpi.com" class="_border"><img src="http://s.juancdn.com/jpwebapp/images/icon/home.png">返回首页</a>
    </div>
    <div class="foot-copyright"></div>
    <h2>copyright © 武汉奇米网络科技有限公司</h2><!-- 2015卷皮折扣 -->
</div>



        </div>
    </div>
    <div class="alert_fullbg" style="display: none; z-index: 201;"></div>
    <div class="normal-alert" style="display:none;" id="bind-other-alert">
        <div class="box">
            正在获取地址，请稍等...
        </div>
    </div>

        <!-- 业务js -->
        
    <script src="http://s.juancdn.com/jpwebapp_v1/js/lib/sea.js?ts=4266453c0ac28a55_1448685758"></script>
    <script src="http://s.juancdn.com/jpwebapp_v1/js/lib/sea-config.js?ts=4266453c0ac28a55_1448685758"></script>
    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&libraries=convertor"></script>
    <script type="text/javascript">
       use('editAddress');
    </script>

        <!-- 微信分享配置 -->
        
        <!-- 统计js -->
        
    <div style="display:none">
   <script>
    //百度-网站流量统计
    //对H5内嵌页面和M站页面分开统计
    var in_app = '';
    var arr, reg = new RegExp("(^| )qm_app_ver=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) in_app = arr[2];

    if (in_app != '') {
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js" + "?" + "2bd799a12c807ffaad0841b6f078c4b3";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    } else {
        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fe4ceab5da6d783f3d6d7e9904eb493f1' type='text/javascript'%3E%3C/script%3E"));
    }

</script>
   <script>
 
    //谷歌-网站流量统计
    (function(i, s, o, g, r, a, m){i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function(){
        (i[r].q = i[r].q || []).push(arguments)}, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-41505183-4', 'juanpi.com');
    ga('send', 'pageview');
    
</script>
   <!-- TO DO  重构-->

<script>
    //获取cookie
    function getCookie(name){
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
    var _paq = _paq || [];
        //_paq.push(["setRequestMethod", 'GET']);
        _paq.push(["setCookieDomain", "*.juanpi.com"]);
        _paq.push(['trackPageView']);

    (function() {
        var u="http://d.juanpi.com/";
        _paq.push(["setTrackerUrl", u+"sermon/receiver/receive.do?ua="+navigator.userAgent
            +"&_Qt="+getCookie("_Qt")
            +"&s_uid="+getCookie("s_uid")
            +"&s_name="+getCookie("s_name")
            +"&s_pic="+getCookie("s_pic")
            +"&s_sign="+getCookie("s_sign")
            +"&s_exp="+getCookie("s_exp")
            +"&sid="+getCookie("sid")
            +"&newPerson="+getCookie("newPerson")
            +"&utm="+getCookie("curutm")
            +"&qm_device_id="+getCookie("qm_device_id")
            +"&topic=jp"
            +"&key_url_list="+getCookie("key_url_list")
            +"&qm_jpid="+getCookie("qm_jpid")
            +"&qm_session_id="+getCookie("qm_app_seesion")
        ]);
        _paq.push(["setSiteId", "1"]);
        var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
        g.defer=true; g.async=true; g.src=u+"static/js/piwik.js"; s.parentNode.insertBefore(g,s);
    })();
</script>
</div>


    </body>
</html>