<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><html><head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0">
    <title>计算结果</title>
    <meta content="app-id=518966501" name="apple-itunes-app">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/lottery1.css?v=151106" rel="stylesheet" type="text/css">
	<script src="<?php echo G_TEMPLATES_JS; ?>/weixin/jquery190.js" language="javascript" type="text/javascript"></script>
    

    </head>
<body fnav="1" style="zoom: 1;">
 <div class="" id="loadingPicBlock">
    <div id="calResult" class="wrapper"><div class="g-formula clearfix"><div class="for-con1 z-oval clearfix"><em class="orange"><?php echo $item['q_user_code']; ?></em><i class="colorbbb">最终计算结果</i></div><p></p><div class="for-con2 clearfix"><cite>(</cite><span class="z-oval"><em class="orange"><?php echo $item['q_counttime']; ?></em><i class="colorbbb">时间取值之和</i></span><cite>%</cite><span class="z-oval"><em class="orange"><?php echo $item['canyurenshu']; ?></em><i class="colorbbb">商品总需人次</i></span><cite>)</cite><cite>+</cite><span class="z-oval"><em class="orange">10000001</em><i class="colorbbb">固定数值</i></span></div><div class="orange z-and">截止该商品最后购买时间【<?php echo microt($item['q_end_time']); ?>】<br>网站所有商品的最后100条购买时间取值之和<a id="a_showway" href="javascript:;" class="orange" onClick="index()">如何计算<i class="z-set"></i></a></div></div>
    
    <div class="calCon clearfix">
    <dl class="dl1"><dt><span><?php echo _cfg('web_name_two'); ?>时间</span><span></span><span>转换数据</span><span>会员</span></dt></dl>
    <dl id="dl_nginner" class="dl2" >
    <?php $ln=1;if(is_array($item['q_content'])) foreach($item['q_content'] AS $record): ?>
				   <?php 
						$itemid = $item['id'];
						$record_time = explode(".",$record['time']);
						$record['time'] = $record_time[0];
				    ?>	
    <dd><span><?php echo date("Y-m-d",$record['time']); ?><b></b></span><span><?php echo date("H:i:s",$record['time']); ?>.<?php echo $record_time['1']; ?><s></s></span><span><i><em></em></i><?php echo $record['timeadd']; ?><s></s></span><span><?php echo get_user_name($record['uid']); ?></span></dd>
    
    <?php  endforeach; $ln++; unset($ln); ?>
    </dl></div></div>
    <div class="pro_foot">
                
                <a href="<?php echo WEB_PATH; ?>/mobile/cart/cartlist/<?php echo $uids; ?>/" id="btnCart"><i class="fr"></i></a>
                <div class="btn">
                    <ul>
                        <li class="conductBtn"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $itemzx['id']; ?>">第<?php echo $itemzx['qishu']; ?>期正在进行中<span class="dotting"></span></a></li>
                    </ul>
                </div>
            </div>
     

<input id="getname" type="hidden" value="<?php echo _cfg('web_name_two'); ?>" />             
<input id="getwx" type="hidden" value="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" />      
<input id="hidPageType" type="hidden" value="0" />
<input id="hidIsHttps" type="hidden" value="0" />
<input id="hidSiteVer" type="hidden" value="v13" />
<input id="hidOpenID" type="hidden" value=""/>

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
        Base.getScript(_SkinDomain+'/weixin/1Bottom.js?v=' + GetVerNum(), function () {
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
</div>
<script type="text/javascript">
function index()
{
   var add=document.getElementById("add");
  
   add.style.display="block";
  
   
}

function indexout()
{
   var add=document.getElementById("add");

  
   add.style.display="none";
  
}
</script>
<style>
.m_popUp {
width: 100%;
height: 100%;
position: fixed;

z-index: 1000;
}



</style>

<div class="m_popUp" style=" display: none;" id="add" onClick="indexout()"><div class="m_guide"><div >
<div id="div_container" class="acc-pop clearfix z-box-width"><dl><dt class="gray6">如何计算？</dt><dd>1、取该商品最后购买时间前网站所有商品的最后100条购买时间记录；</dd><dd>2、按时、分、秒、毫秒排列取值之和，除以该商品总参与人次后取余数；</dd><dd>3、余数加上10000001 即为“幸运<?php echo _cfg('web_name_two'); ?>码”；</dd><dd>4、余数是指整数除法中被除数未被除尽部分， 如7÷3 = 2 ......1，1就是余数。</dd></dl></div></div><cite></cite></div></div>
</body></html>