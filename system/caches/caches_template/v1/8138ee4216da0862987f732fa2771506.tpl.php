<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
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

$yid=!isset($_GET['yid']) ? $yid : $_GET['yid'];
 ?>
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
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/header1.css"/>
	<!--新闻列表-->
		<div class="g-frame-footer">
			<div class="g-width footer">
				<div class="M-guide">
				<?php $category=$this->DB()->GetList("select * from `@#_category` where `parentid`='1'",array("type"=>1,"key"=>'',"cache"=>0)); ?>
			<?php $ln=1;if(is_array($category)) foreach($category AS $help): ?>
   			<dl class="ft-newbie">
   				<dt><span><?php echo $help['name']; ?></span></dt>
				<?php $article=$this->DB()->GetList("select * from `@#_article` where `cateid`='$help[cateid]'",array("type"=>1,"key"=>'',"cache"=>0)); ?>
				<?php 
					foreach($article as $art){
						echo "<dd><b></b><a href='".WEB_PATH.'/help/'.$art['id']."' target='_blank'>".$art['title'].'</a></dd>';
					}
				 ?>				
   			</dl>   			
			<?php  endforeach; $ln++; unset($ln); ?>
            <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?> 			
							<dl>
						<dt>客户端下载</dt>
						<dd>
							<a href="<?php echo _cfg('apk_url'); ?>"
								target="_blank">下载Android客户端</a>
						</dd>
						<dd>
							<a href="<?php echo _cfg('ipa_url'); ?>" target="_blank">下载iPhone客户端</a>
						</dd>
						<dd>
						<!--	<a href="<?php echo G_WEB_PATH; ?>/app/1ywg_iPad.ipa"
								target="_blank">下载iPad客户端</a>
						</dd> -->
					</dl>								
					
					<dl class="ft-fwrx">
						<dt><span>官方群</span></dt>
					<?php 
					if(isset($this->_cfg['qq_qun'])){
						$qq_qun_list = $this->_cfg['qq_qun'];
						$qq_qun_list = explode("|",$qq_qun_list);
						foreach($qq_qun_list as $qq){
						$qq = trim($qq);
						 ?>
						<dd class="ft-fwrx-service"><a style="text-indent:0em; background:none;width:160px;" target="_blank" rel="nofollow" href="javascript:;">官方QQ群：<em class="orange Fb"><?php echo $qq; ?></em></a></dd>
						<?php 
							} }
						 ?>
																
					</dl> 
                    
				<dl>
						<dt>携手<?php echo _cfg('web_name_two'); ?></dt>
						<dd>
							<a href="<?php echo WEB_PATH; ?>/single/business"
								target="_blank">商务合作</a>
						</dd>
						<dd>
							<a href="<?php echo WEB_PATH; ?>/link" target="_blank">友情链接</a>
						</dd>
						<dd>
							<a href="<?php echo WEB_PATH; ?>/group_qq"
								target="_blank">官方QQ群交流</a>
						</dd>
					</dl>
				</div>

				<div class="service-promise">
					<ul>
						<li class="M-android "><s class="F-bg"></s>
						<p class="F-txt">
							 <b class="gray9">下载手机客户端</b>
							 <s class="F-android-img"></s>
							 <a class="orange_btn" href="<?php echo _cfg('apk_url'); ?>" target="_blank">立即下载</a>
						 </p>
						 
						<li class="M-wx"><a target="_blank">
								<s class="F-wxm"> <img
									src="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" border="0" alt=""
									width="75" height="75"></s>
						</a>
							<p class="F-txt">
								<a target="_blank"> </a><a	target="_blank"> <b class="gray9"><i></i>关注官方微信</b> <s
									class="F-wx-img"></s>
								</a>
							</p></li>
						<li class="M-time"><s class="F-bg"></s>
							<p class="F-txt" id="pServerTime">
								<b class="gray9">服务器时间</b><span id="sp_ServerTime" class="F-txt-dig"></span>
							</p></li>
							<?php $mysql_model=System::load_sys_class('model'); ?><?php $fund_data=$this->DB()->GetOne("select * from `@#_fund` limit 1",array("cache"=>0)); ?>
						<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
						<?php if($fund_data['fund_off']): ?>	
						<li class="M-fund"><s class="F-bg"></s>
							<p class="F-txt">
								<b class="gray9">网站公益基金</b> <a href="<?php echo WEB_PATH; ?>/single/fund"
									target="_blank"><span class="F-fund-buy fam-y"
									id="spanFundTotal"><i class="rmbf">￥</i>0000000.00</span></a>
					  </p></li>	
						<?php endif; ?>	
						<li class="M-tel"><s class="F-bg"></s>
							<p class="F-txt">
								<b class="gray9">服务热线</b> <i class="F-tel-img"><?php echo _cfg("cell"); ?></i>  <a
									href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes" id="btnBtmQQ" class="F-icon-guest" target="_blank"><s></s>在线客服</a>
							</p></li>
					</ul>
				</div>
				<div class="M-security">
					<a href="<?php echo WEB_PATH; ?>/help/4" class="U-fair"
						target="_blank"> <s class="F-security-img"></s>
						<p class="F-security-T">100%公平公正</p>
						<p class="F-security-C">参与过程公开透明，用户可随时查看</p>
					</a> <a href="<?php echo WEB_PATH; ?>/help/5" class="U-security"
						target="_blank"> <s class="F-security-img"></s>
						<p class="F-security-T">100%正品保证</p>
						<p class="F-security-C">精心挑选优质商家，100%品牌正品</p>
					</a> <a href="<?php echo WEB_PATH; ?>/help/7" class="U-free"
						target="_blank"> <s class="F-security-img"></s>
						<p class="F-security-T">全国免运费</p>
						<p class="F-security-C">全场商品全国包邮（港澳台地区除外）</p>
					</a>
				</div>
			</div>
		</div>		
	<!--end 新闻列表-->

	<!-- 底部版权 -->
		<div class="g-frame copyright">
			<div class="footer_links">
				<?php echo Getheader('foot'); ?>
				</div>
			<div class="copyright"><a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo _cfg('web_copyright'); ?></a></div>
			<div class="footer_icon">
				<a target="_blank" class="fi_ectrustchina"></a>
				<a target="_blank" class="fi_315online"></a>
				<a target="_blank" class="fi_cnnic"></a>
				<a target="_blank" class="fi_anxibao"></a>
				<a target="_blank" class="fi_qh"></a>
			</div>
		</div>
	<!--end 底部版权 -->
	
	<!--右侧导航-->
<!--		<div id="divRighTool" class="quickBack" style="display: block;bottom: 60px;right: 0px;">
			<dl class="quick_But">
				<dd id="divRigCart" class="quick_cart" style="">
					<a  href="<?php echo WEB_PATH; ?>/member/cart/cartlist"
						target="_blank" class="quick_cartA"><b>购物车</b><s></s><em>0</em></a>
					<div style="display: none;" id="rCartlist" class="Roll_mycart">
						<ul style="display: none;"></ul>
						<div class="quick_goods_loding" id="rCartLoading">
							<img border="0" alt="" src="<?php echo G_TEMPLATES_STYLE; ?>/images/goods_loading.gif">正在加载......
						</div>
						<p id="p1" style="display: none;">共计<span id="rCartTotal2">0</span> 件商品 金额总计：<span class="rmbgray" id="rCartTotalM">0</span></p>
						<h3 style="display: none;">
							<a target="_blank" href="<?php echo WEB_PATH; ?>/member/cart/cartlist"
								class="orange_btn">去购物车结算</a>
						</h3>
					</div>
				</dd>
				<dd class="quick_service">
					<a id="btnRigQQ" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes" class="quick_serviceA " target="_blank"><b>在线客服</b><s></s></a>
				</dd>
				<dd class="quick_Collection">
					<a id="btnFavorite" href="javascript:void();"
						class="quick_CollectionA"><b>收藏本站</b><s></s></a>
				</dd>
				<dd class="quick_Return">
					<a id="btnGotoTop" href="javascript:void()" class="quick_ReturnA"><b>返回顶部</b><s></s></a>
				</dd>
			</dl>
		</div> -->
        
                <link type="text/css" rel="stylesheet" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/all.css?t=20160316145942" />
        

        

    <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/base.js?t=20160316145942"></script>



                    


       

       
        <div id="J_sidebar" class="side_right">

        <div class="side-box">
            <ul class="side-oper">
            
                <li class="normal side-user">
                    <a class="links" id="J_user" target="_blank" href="<?php echo WEB_PATH; ?>/member/home">
                        <i class="normal-icon i-user"></i>
                    </a>
                    <div id="side-login" class="tab-tips tab-login">
                        <a href="<?php echo WEB_PATH; ?>/member/home" target="_blank">
                        <div class="user-box">
                         <?php if(get_user_arr()): ?>
                         <div class="pic"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_img(); ?>" width="60" height="60" ></div>
                            <p class="txt"><?php echo get_user_name(get_user_arr(),'username'); ?></p>
                         <?php  else: ?>
                         
                            <div class="pic"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/default-60.jpg"></div>
                            <p class="txt">快来<a target="_blank" href="<?php echo WEB_PATH; ?>/login">登录</a>吧，么么哒</p>
                          <?php endif; ?>  
                        </div>
                        </a>
                        <i class="close">×</i>
                        <div class="arr-icon">◆</div>
                    </div>
                </li>
               <li class="normal side-cart">
                    <a class="links links-cart" target="_blank" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" id="btnMyCart">
                        <i class="normal-icon i-cart"></i>
                        <em class="num cartnum">0</em>
                    </a>
                    <div class="tab-tips tab-tag">
                        <div class="carttime"></div><div class="arr-icon">◆</div>
                    </div>
                </li> 
                <li class="normal side-love">
                    <a class="links" id="J_love" target="_blank" href="<?php echo WEB_PATH; ?>/member/home/orderlist">
                        <i class="normal-icon i-love"></i>
                    </a>
                    <div class="tab-tips">获得的商品<div class="arr-icon">◆</div> </div>
                </li> 
                <li class="normal side-quan">
                    <a class="links" id="J_quan" target="_blank" href="<?php echo WEB_PATH; ?>/member/home/userrecharge">
                        <i class="normal-icon i-quan"></i>
                    </a>
                    <div class="tab-tips">快速充值<div class="arr-icon">◆</div> </div>
                </li>
                <li class="normal side-love">
                    <a class="links" id="J_love" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg('qq'); ?>&site=qq&menu=yes">
                        <i class="normal-icon-customer i-customer"></i>
                    </a>
                    <div class="tab-tips">在线客服<div class="arr-icon">◆</div> </div>
                </li> 
            </ul>
            <ul class="side-oper other">
                <li class="normal side-complain">
                    
                    <a class="links" id="J_complain" target="_blank" href="<?php echo G_WEB_PATH; ?>/index.php/help/13">
                        <i class="normal-icon i-complain"></i>
                    </a>
                    <div class="tab-tips">意见反馈<div class="arr-icon">◆</div> </div>
                   
                </li>
                <li class="normal side-code">
                    <a class="links" id="J_code" href="javascript:;">
                        <i class="normal-icon-weixin i-codes"></i>
                    </a>
                    <div class="tab-tips">
                        <div class="code-box">
                            <p class="code"><img border="0" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" width="148"></p>
                            <p class="txt">关注官方微信</p>
                        </div>
                        <div class="arr-icon">◆</div>
                    </div>
                </li>
                <?php 
				  $appurl = _cfg('apk_url'); //APP下载网址
                  $appdown = "http://qr.topscan.com/api.php?bg=ffffff&fg=000000&el=l&w=200&m=10&text=".$appurl; //自动生成二维码
				 ?>
                <li class="normal side-code">
                    <a class="links" id="J_code" href="javascript:;">
                        <i class="normal-icon i-code"></i>
                    </a>
                    <div class="tab-tips">
                        <div class="code-box">
                            <p class="code"><img border="0" src="<?php echo $appdown; ?>" width="148"></p>
                            <p class="txt">下载Android客户端</p>
                        </div>
                        <div class="arr-icon">◆</div>
                    </div>
                </li>
                <li class="normal side-backtop">
                    <a class="links" id="J_backtop" href="javascript:;">
                        <i class="normal-icon i-backtop"></i>
                    </a>
                    <div class="tab-tips">返回顶部<div class="arr-icon">◆</div> </div>
                </li>
            </ul>
        </div>

        <div id="J-right-bag" class="bag-tool right-bag">
            <div class="sidebar-hd">
                <i class="close" id="J_cart_close">×</i>
                <span class="t">购物袋</span><span class="time carttime"></span>
            </div>
        </div>
        <div id="pro_list"></div>
        <div class="bby_gwctck" id="shopbox" style=" display:none;z-index:99999999;">
        <div id="ShopingCar"></div>
        </div>
    </div>
     <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/lightbox.js"></script>
        <script src="<?php echo G_TEMPLATES_JS; ?>/goodfavoritefooter.js" type="text/javascript"></script>
	<!--end右侧导航-->
	
	<!--右下角揭晓-->
		
	<!--end右下角揭晓-->
	<script type="text/javascript">
(function(){				
		var week = '日一二三四五六';
		var innerHtml = '{0}:{1}:{2}';
		var dateHtml = "{0}月{1}日 &nbsp;周{2}";
		var timer = 0;
		var beijingTimeZone = 8;				
				function format(str, json){
					return str.replace(/{(\d)}/g, function(a, key) {
						return json[key];
					});
				}				
				function p(s) {
					return s < 10 ? '0' + s : s;
				}			

				function showTime(time){
					var timeOffset = ((-1 * (new Date()).getTimezoneOffset()) - (beijingTimeZone * 60)) * 60000;
					var now = new Date(time - timeOffset);
					document.getElementById('sp_ServerTime').innerHTML = format(innerHtml, [p(now.getHours()), p(now.getMinutes()), p(now.getSeconds())]);				
					//document.getElementById('date').innerHTML = format(dateHtml, [ p((now.getMonth()+1)), p(now.getDate()), week.charAt(now.getDay())]);
				}				
				
				window.yungou_time = 	function(time){						
					showTime(time);
					timer = setInterval(function(){
						time += 1000;
						showTime(time);
					}, 1000);					
				}
	window.yungou_time(<?php echo time(); ?>*1000);
				
})();
				
				
				
$(document).ready(function(){
	try{  
       if(typeof(eval(pleasereg_initx))=="function"){
            pleasereg_initx();
	   }
    }catch(e){
       //alert("not function"); 
    }  
})
</script>
<script>
$(function(){
	$(".quick_cart").hover(
		function(){			
			$("#rCartlist,#rCartLoading").show();
			$("#rCartlist p,#rCartlist h3").hide(); 
			$("#rCartlist li").remove();
			$("#rCartTotal2").html("");
			$("#rCartTotalM").html("");
			$.getJSON("<?php echo WEB_PATH; ?>/member/cart/cartshop/"+ new Date().getTime(),function(data){
				$("#rCartlist ul").append(data.li);
				$("#rCartTotal2").html(data.num);
				$("#rCartTotalM").html(data.sum);
				$("#rCartLoading").hide();
				$("#rCartlist ul,#rCartlist p,#rCartlist h3").show();				
			});
		},
		function(){
			$("#rCartlist,#rCartlist ul,#rCartlist p,#rCartlist h3").hide();
		}
	);
});
function delshop(id){
	var Cartlist = $.cookie('Cartlist');
	var info = $.evalJSON(Cartlist);
	var num=$("#rCartTotal2").html()-1;
	var sum=$("#rCartTotalM").html();
	info['MoenyCount'] = sum-info[id]['money']*info[id]['num'];
		
	delete info[id];
	//$.cookie('Cartlist','',{path:'/'});
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
	$("#rCartTotalM").html(info['MoenyCount']);
	$('#rCartTotal2').html(num);
	$('#sCartTotal').text(num);											
	$('#btnMyCart em').text(num);
	$("#shopid"+id).remove();
}
$(document).ready(function(){
	$.get("<?php echo WEB_PATH; ?>/member/cart/getnumber/"+ new Date().getTime(),function(data){
		$("#sCartTotal").text(data);											
		$("#btnMyCart em").text(data);											
	});
});
</script>
<script>

$(function(){

	$("#btnGotoTop").click(function(){
		$("html,body").animate({scrollTop:0},1500);
	});
	$("#btnFavorite,#addSiteFavorite").click(function(){
		var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
		if(document.all){
	 
			window.external.addFavorite('<?php echo G_WEB_PATH; ?>','<?php echo _cfg("web_name"); ?>');
		}
		else if(window.sidebar){
		   window.sidebar.addPanel('<?php echo _cfg("web_name"); ?>','<?php echo G_WEB_PATH; ?>', "");
		}else{ 
			alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹');
		}
    });
	$("#divRighTool a").hover(		
		function(){
			$(this).addClass("Current");
		},
		function(){
			$(this).removeClass("Current");
		}
	)	
	
 
});
	//基金
	$.ajax({
		url:"<?php echo WEB_PATH; ?>/api/fund/get",
		success:function(msg){
		var str='<i class="rmbf">￥</i>'+msg;
			$("#spanFundTotal").html(str);
		}
	});
	
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
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?bb43ab7e1f6fa2f4e08138689911b7e0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

 </body>
</html>
