<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>﻿<?php 
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
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/foorFixed.css" rel="stylesheet" type="text/css" />                       
<footer class="footers" style=" padding-bottom:70px;"><!-- 
	<div class="u-ft-nav" id="fLoginInfo">
	    <span><a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>">发现</a><b></b></span>
        <span><a href="<?php echo WEB_PATH; ?>/mobile/lucky/?yid=<?php echo $uids; ?>">免费抽奖</a><b></b></span>
		<span><a href="<?php echo WEB_PATH; ?>/mobile/mobile/about/<?php echo $uids; ?>/">新手指南</a><b></b></span>
        <?php if(get_user_arr()): ?>
        <span><a href="<?php echo WEB_PATH; ?>/mobile/home/?yid=<?php echo $uids; ?>" class="Member"><?php echo get_user_name(get_user_arr(),'username'); ?></a>
        <a href="<?php echo WEB_PATH; ?>/mobile/user/cook_end/<?php echo $uids; ?>/" class="Exit">退出</a></span>
        
        <?php  else: ?>
        <span><a href="<?php echo WEB_PATH; ?>/mobile/user/login/<?php echo $uids; ?>/">登录</a><b></b></span>
		<span><a href="<?php echo WEB_PATH; ?>/mobile/user/register/<?php echo $uids; ?>/">注册</a></span>
        <?php endif; ?>
		
	</div>
  
	<p class="m-ftA"><a href="<?php echo WEB_PATH; ?>/mobile/mobile">触屏版</a><a href="<?php echo G_WEB_PATH; ?>" target="_blank">电脑版</a></p> 
	<p class="grayc">客服热线<span class="orange"><?php echo _cfg("cell"); ?></span> <br /><?php echo _cfg('web_copyright'); ?></p>
	<a id="btnTop" href="javascript:;" class="z-top" style="display:none;"><b class="z-arrow"></b></a>-->
</footer> 

<link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/index.css?v=151106" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/comm.css?v=130715" rel="stylesheet" type="text/css" />
<div class=" footer  clearfix">
    <ul>
        <li class="f_home"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="<?php if($footerF==5): ?>hover<?php endif; ?>"><i></i><?php echo _cfg('web_name_two'); ?></a></li>
        <li class="f_announced"><a  href="<?php echo WEB_PATH; ?>/mobile/mobile/lottery/<?php echo $uids; ?>/" class="<?php if($footerF==100): ?> hover <?php endif; ?>"><i></i>最新揭晓</a></li>
        <!--<li class="f_single"><a href="<?php echo $wurl; ?>" class="<?php if($footerF==112): ?>hover<?php endif; ?>"><i></i>微商城</a></li> -->
        <li class="f_single"><a href="<?php echo WEB_PATH; ?>/mobile/shaidan/?yid=<?php echo $uids; ?>/" class="<?php if($footerF==200): ?>hover<?php endif; ?>"><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCarts" href="<?php echo WEB_PATH; ?>/mobile/cart/cartlist/<?php echo $uids; ?>/" class="<?php if($footerF==300): ?>hover<?php endif; ?>" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="<?php echo WEB_PATH; ?>/mobile/home/?yid=<?php echo $uids; ?>" class="<?php if($footerF==4): ?>hover<?php endif; ?>"><i></i>
        个人中心</a></li>
    </ul>
</div>


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
			$("#btnCarts i").append('<b>'+data.num+'</b>');
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