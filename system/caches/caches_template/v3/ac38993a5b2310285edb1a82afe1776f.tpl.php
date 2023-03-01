<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>揭晓结果</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/comm1.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/lottery.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
  
<?php if($shopitem=='itemfun'): ?>
	<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/goodsInfo.js" language="javascript" type="text/javascript"></script>
<?php  else: ?>
<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/LotteryDetail.js" language="javascript" type="text/javascript"></script>
<?php endif; ?>
</head>
<body fnav="2" class="g-acc-bg"><?php include templates("mobile/index","top");?>
    <div>

        <!--期数信息-->
         <!-- 导航 -->
        <div id="divPeriod" class="pNav">
            <div class="loading"><b></b>正在加载</div>
    	    <ul class="slides">
    	       <?php echo $loopqishu; ?>
            </ul>
        </div>

        <!--商品信息-->
        <div class="announced-detail clearfix">
            <ul>
                <li class="fl ann-pic">
                    <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $itemzx['id']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" /></a>
                </li>
                <li class="ann-con gray9">
                    <p class="gray6">(第<?php echo $item['qishu']; ?>期)<?php echo $item['title']; ?></p>价值：￥<?php echo $item['money']; ?>
                </li>
            </ul>
        </div>

        <!--获得者信息-->
        <div class="bgColor-white clearfix">
            <div class="g-winn-con clearfix">
                <div class="winn-info clearfix">
                    <p class="fl">
                        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $item['q_uid']; ?>/<?php echo $uids; ?>/"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($item['q_uid'],'img'); ?>" /></a>
                    </p>
                    <dl class="gray9">
                        <dt>
                            <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $item['q_uid']; ?>/<?php echo $uids; ?>/" class="blue"><?php echo get_user_name($item['q_uid']); ?></a></dt>
                        <!--<dd>
                            来自：
                        河南省郑州市
                        </dd> -->
                        <dd>
                            本参与： <i class="orange">
                                <i class="orange"><?php echo $gorecode['gonumber']; ?></i>次数</i>
                        </dd>
                        
                        <dd class="ann-time">
                            揭晓时间：
                        <?php echo microt($item['q_end_time']); ?>
                        </dd>

                    </dl>
                    <div class="rNowTitle">获得者</div>
                    <!--分享-->
                    <div class="z-share-right">
                        <a id="btnShare" class="colorbbb" href="javascript:;" onClick="index()">
                            <i class="z-set"></i>
                            分享</a>
                    </div>
                </div>

                <div class="jsxq-ygm gray9 clearfix"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/calResult/<?php echo $item['id']; ?>/<?php echo $uids; ?>/" class="gray9 fr">计算详情>></a><cite>幸运码：<i class="orange"><?php echo $item['q_user_code']; ?></i></cite></div>
            </div>
        </div>


        <div class="ann_btn">
            <!--所有参与记录-->
            <a href="<?php echo WEB_PATH; ?>/mobile/mobile/buyrecords/<?php echo $item['id']; ?>/<?php echo $uids; ?>/">参与记录<s class="fr"></s></a>
            <!--商品详情-->
            <a href="<?php echo WEB_PATH; ?>/mobile/mobile/goodsdesc/<?php echo $item['id']; ?>/<?php echo $uids; ?>/">图文详情<em>（建议WIFI下使用）</em><s class="fr"></s></a>
            <!--商品晒单-->
            <a href="<?php echo WEB_PATH; ?>/mobile/mobile/goodspost/<?php echo $item['sid']; ?>/<?php echo $uids; ?>/">商品晒单<s class="fr"></s></a>
        </div>
        
            <div class="pro_foot clearfix">
                
                <a href="<?php echo WEB_PATH; ?>/mobile/cart/cartlist/<?php echo $uids; ?>/" id="btnCart1"><i class="fr"></i></a>
                   
               
                <div class="btn">
                    <ul>
                        <li class="conductBtn">
                            <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $itemzx['id']; ?>">第<?php echo $itemzx['qishu']; ?>期正在进行中<span class="dotting"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        
    </div>
    
<input id="getwx" type="hidden" value="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" />     
<input id="getname" type="hidden" value="<?php echo _cfg('web_name_two'); ?>" />            
<input id="hidPageType" type="hidden" value="0" />
<input id="hidIsHttps" type="hidden" value="0" />
<input id="hidSiteVer" type="hidden" value="v13" />
<input id="hidOpenID" type="hidden" value=""/>
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
top: 0;
z-index: 1000;
}
.m_guide {
display: block;
width: 100%;
height: 100%;
background: #000;
opacity: 0.8;
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=80);
position: absolute;
top: 0;
left: 0;
z-index: 98;
}
.m_popUp cite {
display: block;
background: url(<?php echo G_TEMPLATES_IMAGE; ?>/weixin/share_03.png?v=1105) top right no-repeat;
background-size: 273px auto;
height: 230px;
margin: 10px 10px 0 0;
position: relative;
z-index: 99;
}
</style>
<div class="m_popUp" style=" display: none;" id="add" onClick="indexout()"><div class="m_guide"></div><cite></cite></div>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base = {
    head: document.getElementsByTagName("head")[0] || document.documentElement,
    Myload: function(B, A) {
        this.done = false;
        B.onload = B.onreadystatechange = function() {
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
    getScript: function(A, C) {
        var B = function() {};
        if (C != undefined) {
            B = C
        }
        var D = document.createElement("script");
     //   D.setAttribute("language", "javascript");
       // D.setAttribute("type", "text/javascript");
        D.setAttribute("src", A);
        this.head.appendChild(D);
        this.Myload(D, B)
    },
    getStyle: function(A, B) {
        var B = function() {};
        if (callBack != undefined) {
            B = callBack
        }
        var C = document.createElement("link");
    //    C.setAttribute("type", "text/css");
    //    C.setAttribute("rel", "stylesheet");
        C.setAttribute("href", A);
        this.head.appendChild(C);
        this.Myload(C, B)
    }
}
function GetVerNum() {
    var D = new Date();
    return D.getFullYear().toString().substring(2, 4) + '.' + (D.getMonth() + 1) + '.' + D.getDate() + '.' + D.getHours() + '.' + (D.getMinutes() < 10 ? '0': D.getMinutes().toString().substring(0, 1))
}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');


</script>

 <?php 
$shop=$this->db->GetOne("select * from `@#_shoplist` where `shenyurenshu`=0 and `q_uid` is null  ORDER BY `id` desc"); 

$total=$this->db->GetCount("select * from `@#_member_go_record` where `shopid` = '$shop[id]'");

$num = rand(0,$total);

$memauto=$this->db->GetOne("select * from `@#_member_go_record` where `shopid` = '$shop[id]' order by id desc LIMIT $num,1");

$xsjx_time = date("Y-m-d H:i:s",strtotime("+1 seconds"));

$xsjx_times = strtotime($xsjx_time);

if($shop){
				$auto_ok = $this->db->Query("UPDATE `@#_shoplist` SET `xsjx_time` = '$xsjx_times' where `id` = '$shop[id]'");
                
		 }

$wurl="http://".$_SERVER['HTTP_HOST']."/m";

if($yid==''){
$yid=!isset($_GET['yid']) ? $yid : $_GET['yid'];
}
 ?>



<script type="text/javascript">
    
            var base_url_send = "<?php echo WEB_PATH; ?>/api/wxlogin/callback/<?php echo $yid; ?>";
			var base_url_qq = "<?php echo WEB_PATH; ?>/api/qqlogin/callback/<?php echo $yid; ?>";
			
			<?php if(_cfg("code_reg_off")==1): ?>
            var base_url_yaoqing = "<?php echo WEB_PATH; ?>/member/user/regAjax/<?php echo $yid; ?>";
			
			<?php  else: ?>
			
			var base_url_yaoqing = "<?php echo WEB_PATH; ?>/member/user/regAjax0/<?php echo $yid; ?>";
			<?php endif; ?>	
			
			
            var ehtml = '';
			//$("#commentList").html(ehtml).show();

var base_url_LotteryLeave = "<?php echo WEB_PATH; ?>/member/user/LotteryLeave/";			
var LotteryLeave = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_LotteryLeave,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                        //  $('#commentList').html(data).show();
                        },
                        error: function () {
                        //    $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
LotteryLeave();

            var getAllp = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_yaoqing,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                        //  $('#commentList').html(data).show();
                        },
                        error: function () {
                        //    $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getAllp();



 var getsend = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_send,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                        //  $('#commentList').html(data).show();
                        },
                        error: function () {
                        //    $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getsend();

 var getqq = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_qq,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                        //  $('#commentList').html(data).show();
                        },
                        error: function () {
                        //    $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getqq();
//购物车数量
	$.getJSON('<?php echo WEB_PATH; ?>/mobile/ajax/cartnum',function(data){
		if(data.num){
			$("#btnCart1 i").append('<b>'+data.num+'</b>');
		}
	});
        
    </script>
<script type="text/javascript">			
			function lxfEndtime(xsjx_time_shop,this_time){	
				if(!this.xsjx_time_shop){
					this.xsjx_time_shop = xsjx_time_shop;	
					this.this_time		= this_time
				}
				this.this_time = this.this_time + 1000;
				lxfEndtime_setTimeout  = window.setTimeout("lxfEndtime()",1000);				
				var endtime = <?php echo $item['xsjx_time']; ?>000;
			    var youtime = endtime - this.this_time;	   	   //还有多久(毫秒值)
				
				var seconds = youtime/1000;
				var minutes = Math.floor(seconds/60);
				var hours = Math.floor(minutes/60);
				var days = Math.floor(hours/24);
				var CDay= days;
				var CHour= hours % 24;
				var CMinute= minutes % 60;
				var CSecond= Math.floor(seconds%60);//"%"是取余运算，可以理解为60进一后取余数，然后只要余数							
				this.xsjx_time_shop.html("<b>限时揭晓</b><p>剩余时间：<em>"+days+"</em>天<em>"+CHour+"</em>时<em>"+CMinute+"</em>分<em>"+CSecond+"</em>秒</p>");
				delete youtime,seconds,minutes,hours,days,CDay,CHour, CMinute, CSecond;
				if(endtime <= this.this_time){			
					lxfEndtime_setTimeout && clearTimeout(lxfEndtime_setTimeout);					
					this.xsjx_time_shop.html("<b>限时揭晓</b><p>正在计算中....</p>");//如果结束日期小于当前日期就提示过期啦	
					xsjx_time_shop = this.xsjx_time_shop;
					$.ajaxSetup({
						async : false
					});
					$.post("<?php echo WEB_PATH; ?>/go/autolottery/autolottery_ret_install",{"shopid":<?php echo $shop['id']; ?>},function(data){		
						//alert(data)
						if(data == '-1'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>没有这个商品!</p>");
							return;
						}
						if(data == '-2'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品揭晓失败!</p>");
							return;
						}
						if(data == '-3'){							
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品参与人数为0，商品不予揭晓!</p>");
							return;
						}
						if(data == '-4'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品还未到揭晓时间!</p>");
							return;
						}
						if(data == '-5'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品揭晓时间已过期!</p>");
							return;
						}if(data == '-6'){							
							 xsjx_time_shop.html("<b>限时揭晓</b>商品正在揭晓中!");								
							 window.location.href=location.href;
							 return;
						}else{							
							xsjx_time_shop.html("<b>限时揭晓</b><p>揭晓幸运码:<i style='color:#fff;background:#f60; padding:3px 5px;'>"+data+"</i></p>");						
							return;
						}						
						
					});
					
				}							
			  }			  
			 $(function(){lxfEndtime($("#timeall"),<?php echo time(); ?>000);});
			</script>
</body>
</html>
