<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>

<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-records.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.js"></script>
<script id="pageJS" language="javascript" type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/MemberFun.js?date=150107"></script>

            <div class="p-center-main clrfix">
            <!--左边导航-->
            <?php include templates("member","left");?>
            <!--左边导航-->
  	

            <div class="sidebar_m clrfix fl">
                <div class="g-information clrfix">
                    <div class="m-info-up clrfix">
                        <div class="info-up-left ">

                            <div class="head-portrait fl">
                                <a id="a_UserPhoto" href="<?php echo WEB_PATH; ?>/index.php/member/home/userphoto" target="_blank"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_img(); ?>" /><b class="u-personal"></b></a>
                                <p><cite>修改头像</cite><em></em></p>
                            </div>

                            <dl class="fl">
                                <dt class="gray3">
            <script language="javaScript">
				now = new Date(),hour = now.getHours()
				     if (hour<06) {document.write("凌晨好！")}
				else if (hour<08) {document.write("早上好！")}
				else if (hour<12) {document.write("上午好！")}
				else if (hour<14) {document.write("中午好！")}
				else if (hour<17) {document.write("下午好！")}
				else if (hour<22) {document.write("晚上好！")}
				             else {document.write("夜里好！")}
			</script><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($member['uid']); ?>" target="_blank"><cite><b class="gray01">
				<?php if($member['username']!=null): ?>
				<?php echo $member['username']; ?>
				<?php elseif ($member['mobile']!=null): ?>
				<?php echo $member['mobile']; ?>
				<?php  else: ?>
				<?php echo $member['email']; ?>
				<?php endif; ?>
				</b>
				<?php if($member['username']!=null): ?>
				(
				<?php if($member['mobile']!=null): ?>
				<?php echo $member['mobile']; ?>
				<?php  else: ?>
				<?php echo $member['email']; ?>
				<?php endif; ?>
				)
				<?php endif; ?></cite><em class="gray9"></em></a></dt>
                                <dd class="gray9">
                                
                                    <span class="class-icon0<?php echo $dengji_1['groupid']; ?>"><s></s><?php echo $dengji_1['name']; ?></span>
                                    <em class = "gray02">经验值：<?php echo $member['jingyan']; ?></em> 
                                  <!--  <?php if($dengji_2): ?>
					                (还差<?php echo $dengji_x; ?>经验值升级到<?php echo $dengji_2['name']; ?>)
				                     <?php  else: ?>
                                      (还差<?php echo $dengji_x; ?>经验值升级到最高等级)
					
				                    <?php endif; ?>
                                   
                                    <a href="/htm-userExperience.html" target="_blank">查看等级介绍</a></dd> -->
                            </dl>
                        </div>
                        <div class="info-up-right fr">
                            <ul>
                               <!-- <li class="z-news">
                                    <a href="/UserMessage.do" class="u-personal"><b class="u-personal"></b>消息</a>
                                </li> -->
                                <li class="z-not-bound">
                                <?php if($member['email']!=null && $member['emailcode']=='1'): ?>	
                                    <a href="javascript:;" class="u-personal"><b class="u-personal"></b>已绑定</a>
                                    <?php  else: ?>
                                    <a href="<?php echo WEB_PATH; ?>/member/home/mailchecking" class="u-personal"><b class="u-personal"></b>未绑定</a>
                                    <?php endif; ?>
                                </li>
                                <li class="z-binding">
                                <?php if($member['mobile']!=null && $member['mobilecode']=='1'): ?>

                                    <a href="javascript:;" class="u-personal"><b class="u-personal"></b>已绑定</a>
                                    <?php  else: ?>
                                    <a href="<?php echo WEB_PATH; ?>/member/home/mobilechecking" class="u-personal"><b class="u-personal"></b>未绑定</a>
                                    <?php endif; ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-info-down clrfix">
                        <div class="info-down-l fl">
                            <span class="fl gray9">
                                <b class="orange">￥<?php echo uidcookie('money'); ?></b>
                                可用余额
                            </span>
                            <p class="fl">
                                <a href="<?php echo WEB_PATH; ?>/member/home/userrecharge" title="充值" class="z-recharge-btn">充值</a>
                               <!-- <a href="javascript:;" id="a_transaccount" title="转账" class="z-transfer-accounts">转账</a> -->
                            </p>
                        </div>
                        <div id="div_stat" class="info-down-r fr" >
                            <ul>
                            <li class="z-dividing-line"><s></s></li><li><a href="<?php echo WEB_PATH; ?>/member/home/userfufen"><em><?php echo $member['score']; ?></em>可用微积分</a></li>
                            <li class="z-dividing-line z-ends-line"><s></s></li><li class="z-fatal-frame"><a id="a_drq" href="<?php echo WEB_PATH; ?>/member/home/orderlist"><em><?php echo count($record); ?></em>全部</a></li>
                            <li class="z-dividing-line"><s></s></li><li class="z-fatal-frame"><a id="a_dfh" href="<?php echo WEB_PATH; ?>/member/home/orderlist/2"><em><?php echo count($record1); ?></em>待发货</a></li>
                           
                            <li class="z-dividing-line"><s></s></li><li class="z-fatal-frame"><a id="a_dsh" href="<?php echo WEB_PATH; ?>/member/home/orderlist/3"><em><?php echo count($record2); ?></em>待收货</a></li></ul>
                        </div>
                    </div>
                </div>
                <!--提示信息列表-->
                <div class="g-operation clrfix">
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

                    
                     <?php if($member['email']!=null && $member['emailcode']=='1'): ?>	
                                   
                                    <?php  else: ?>
                                    <div class="m-modify-single m-verification clrfix" id="add">
                            <p class="orange"><b class="u-personal u-Email-icon"></b>您还未验证邮箱哦，请及时验证！</p>
                            <a href="<?php echo WEB_PATH; ?>/member/home/mailchecking" class="z-operation-btn">立即验证</a>
                            <a onclick="indexout()" class="z-operation-close u-personal"></a>
                        </div>
                                    <?php endif; ?>
                        
                    

                </div>
                <!--获得的商品列表-->
                
                <!--云购记录列表-->
                <div id="g_buys_records" class="<?php if($total==0): ?>g-buys-records1<?php  else: ?>g-buys-records<?php endif; ?> g-common-control clrfix">
                    <div class="m-getGood-title clrfix">
                        <a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" class="gray9">全部<em class="f-tran">&gt;</em></a><b class="gray3"><?php echo _cfg('web_name_two'); ?>记录</b>
                    </div>
                    <div class="m-comm-scroll">
                    <?php if($totalu==0): ?>
                    <div class="null-data"><b class="gth-icon"></b>最近三个月还没有参与<?php echo _cfg('web_name_two'); ?>？ 梦想与您只有1微币的距离！<br><a href="/" class="blue" target="_blank">去<?php echo _cfg('web_name_two'); ?></a></div>
                    <?php  else: ?>
                    <div id="GoodsList" class="goods_show">
		<ul class="gtitle">
			<li>商品图片</li>
			<li class="gname">商品名称</li>
			<li class="yg_status"><?php echo _cfg('web_name_two'); ?>状态</li>
			<li class="joinInfo">参与人次</li>
			<li class="do">操作</li>
		</ul>	
		<?php $ln=1;if(is_array($records)) foreach($records AS $rt): ?>
        <?php 
        	$jiexiao = get_shop_if_jiexiao($rt['shopid']);
         ?>
		<?php if($jiexiao['q_uid']): ?>
		<ul class="goods_list">	
			<li><a title="" target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $jiexiao['thumb']; ?>"></a></li>
			<li class="gname"style="margin:10px 0 0 0;">
				<a target="_blank" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>" class="blue">第(<?php echo $rt['shopqishu']; ?>)期 <?php echo $rt['shopname']; ?></a>
				<p class="gray02">获得者：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($jiexiao['q_uid']); ?>" target="_blank" class="blue">
                <?php echo get_user_name($jiexiao['q_user']); ?>
                </a></p>
				<p class="gray02">揭晓时间：<?php echo date("Y-m-d H:i:s",$jiexiao['q_end_time']); ?></p>
			</li>
			<li class="yg_status" style="margin:23px 0 0 0;"><span class="orange">已揭晓</span></li>
			<li class="joinInfo" style="margin:23px 0 0 0;"><p><em><?php echo $rt['gonumber']; ?></em>人次</p></li>
			<li class="do" style="margin:23px 0 0 0;"><a href="<?php echo WEB_PATH; ?>/member/home/userbuydetail/<?php echo $rt['id']; ?>" class="blue" title="详情">详情</a></li>
		</ul>
		<?php  else: ?>
		<ul class="goods_list">	
			<li><a title="" target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo yunjl($rt['shopid']); ?>"></a></li>
			<li class="gname" style="margin:15px 0 0 0;">
				<a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>" class="blue">第(<?php echo $rt['shopqishu']; ?>)期 <?php echo $rt['shopname']; ?></a>				
				<p class="gray02">购买时间：<?php echo microt($rt['time']); ?></p>
			</li>
			<li class="yg_status" style="margin:23px 0 0 0;"><span class="orange">正在进行...</span></li>
			<li class="joinInfo" style="margin:23px 0 0 0;"><p><em><?php echo $rt['gonumber']; ?></em>人次</p></li>
			<li class="do" style="margin:23px 0 0 0;"><a href="<?php echo WEB_PATH; ?>/member/home/userbuydetail/<?php echo $rt['id']; ?>" class="blue" title="查看幸运码">查看<?php echo _cfg('web_name_two'); ?>码</a></li>
		</ul>
		<?php endif; ?>
		<?php  endforeach; $ln++; unset($ln); ?>	

	</div>
                  <?php endif; ?>      
                    </div>
                </div>
                <!--关注列表-->
                <div class="g-my-attention g-common-control clrfix" style="display: none;">
                    <div class="m-getGood-title clrfix">
                        <a href="" class="gray9">全部<em class="f-tran">&gt;</em></a><b class="gray3">我的关注</b>
                    </div>
                    <div class="m-comm-scroll">
                        <div class="loading-2015">
                            <em></em>
                        </div>
                        <a href="javascript:;" class="z-prev" style="display: none;"><i class="u-personal"></i><span></span></a>
                        <a href="javascript:;" class="z-next" style="display: none;"><i class="u-personal"></i><span></span></a>
                        <div class="commodity-list">
                            <div id="div_AttentionList" style="position: absolute;">
                            </div>
                        </div>
                    </div>
                </div>
                <!--最新晒单列表-->
                
                <div class="g-common-control clrfix" style="display: block;">
                    <div class="m-getGood-title clrfix">
                        <b id="b_posttitle" class="gray3"><?php echo _cfg('web_name_two'); ?>最新晒单</b>
                    </div>

                    <div id="div_PostList" class="single-part clrfix">
                    <?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
                    
                    <?php 
        	         $sd_content = strip_tags($sd['sd_content']);
                     ?>
                    <div idx="1" class="m-single " onmouseover="MM_over(<?php echo $sd['sd_id']; ?>)" onmouseout="MM_out(<?php echo $sd['sd_id']; ?>)" id="single-hover<?php echo $sd['sd_id']; ?>"><div class="single-list"><ul><li class="sig-pic"><a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"></a></li><li class="sig-title"><a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><b><?php echo $sd['sd_title']; ?></b></a></li><li class="sig-text"><?php echo _strcut($sd_content,64); ?></li><li><?php echo date("Y-m-d H:i",$sd['sd_time']); ?></li><li class="sig-xmjdh"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><cite class="fl"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($sd['sd_userid'],'img',''); ?>" width="30"><s></s></cite><em class="fl"><?php echo get_user_name($sd['sd_userid'],'username'); ?></em></a><b class="curr-arrow"><s class="u-personal"></s></b></li></ul></div></div>
                  
                  
                    
                  
                    <?php  endforeach; $ln++; unset($ln); ?>
                    </div>
                    
                    

                    <div class="m-see-more clrfix">
                        想要看更多？去<a href="<?php echo WEB_PATH; ?>/go/shaidan/" target="_blank" class="orange">晒单分享</a>看看
                    </div>

                </div>
            </div>
            <script>
function MM_over(ti) {
	var mSubObj=document.getElementById("single-hover"+ti);
	$("#single-hover"+ti).addClass("single-hover single-hover2");
	
}
function MM_out(ti) {
	var mSubObj=document.getElementById("single-hover"+ti);
$("#single-hover"+ti).removeClass("single-hover");
	
}
</script>
            <!--右侧-->
            <div class="sidebar_r clrfix fr">
                <!--<div class="g-my-cart g-sid-title">
                    <h3 class="gray3"><b>购物车</b></h3>

                    <div id="div_cart">
                        <cite id="myCart"><a href="" class="gray9" target="_blank">您的购物车有<em class="orange" id="sCartTotal2">0</em>件商品，合计:<em class="orange" id="sCartTotalM">￥0.00</em><i class="f-tran">&gt;</i></a></cite>
                    </div>
                </div> -->
                
                
                    <div class="g-invitation g-sid-title">
                        <h3 class="gray3"><b>邀请有奖</b></h3>
                       <span>邀请好友并消费即可获得<em class="orange">50微积分</em>加<em class="orange">6%现金奖励</em></span>
                        <textarea id="txtInfo" rows="3" cols="10" class="gray6">1微币就能买iPhone 6S，一种很有意思的购物方式，快来看看吧！
<?php echo WEB_PATH; ?>/register/<?php echo $uids; ?>
                        </textarea>
                        <div class="fx-out-inner" id="d_clip_container">
                            <a id="d_clip_button" href="javascript:;" class="z-copy-share fr">复制分享</a>
                            <div class="bdsharebuttonbox" data-tag="share_1">
	<!--<a class="bds_mshare" data-cmd="mshare"></a> -->
    <a class="bds_sqq" data-cmd="sqq"></a>
	<a class="bds_qzone" data-cmd="qzone" href="#"></a>
    <a class="bds_weixin" data-cmd="weixin" href="#"></a>
	<a class="bds_tsina" data-cmd="tsina"></a>
	<a class="bds_baidu" data-cmd="baidu"></a>
	
	<a class="bds_tqq" data-cmd="tqq"></a>
    <a class="bds_more" data-cmd="more"></a>
<!--    <a class="bds_renren" data-cmd="renren"></a>
	<a class="bds_more" data-cmd="more">更多</a>
	<a class="bds_count" data-cmd="count"></a> -->
</div>
<script>
	window._bd_share_config = {
		common : {
			bdText : '1微币就能买IPhone 6S哦，快去看看吧！  ',	
			bdDesc : '',	
			bdUrl : '<?php echo WEB_PATH; ?>/register/<?php echo $uids; ?>/', 	
			bdPic : ''
		},
		share : [{
			"bdSize" : 16
		}],
		
		image : [{
			viewType : 'list',
			viewPos : 'top',
			viewColor : 'black',
			viewSize : '16',
			viewList : ['sqq','qzone','tsina','huaban','tqq','renren','weixin']
		}],
		selectShare : [{
			"bdselectMiniList" : ['sqq','qzone','weixin','tqq','kaixin001','bdxc','tqf']
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
                        </div>
                    </div>
                
               <!-- <div class="g-dynamic g-sid-title">
                    <h3 class="gray3"><b id="b_dynamictitle">好友动态</b></h3>
                    
                    
                        <div class="m-dynamic-none">
                            <b class="gth-icon transparent-png"></b>
                            您的好友都去哪儿了？
                        </div>
                    
                </div> -->
                <?php 
				  $appurl = _cfg('apk_url'); //APP下载网址
                  $appdown = "http://qr.topscan.com/api.php?bg=ffffff&fg=000000&el=l&w=200&m=10&text=".$appurl; //自动生成二维码
				 ?>
                <div class="g-QR-code g-sid-title">
                    <h3 class="gray3"><b>下载手机APP</b></h3>
                    <div class="clrfix">
                        <span class="fl"><a href="<?php echo G_WEB_PATH; ?>/app" target="_blank">
                            <img src="<?php echo $appdown; ?>" width="75"></a></span>
                        <p class="fl gray6">
                            参与<?php echo _cfg("web_name_two"); ?>随心所欲！
                        <a href="<?php echo _cfg('apk_url'); ?>" target="_blank">立即下载</a>
                        </p>
                    </div>
                    <s class="u-personal"></s>
                </div>

                <div class="g-QR-code g-sid-title">
                    <h3 class="gray3"><b>关注官方微信</b></h3>
                    <div class="clrfix">
                        <span class="fl"><a href="javascript:;">
                            <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" width="75"></a></span>
                        <p class="fl gray6">
                            扫一扫<br />
                            享受更多微信专享服务
                        </p>
                    </div>
                    <em class="u-personal"></em>
                </div>
                <div class="g-service-hotline g-sid-title">
                    <h3 class="gray3"><b>服务热线</b></h3>
                    <p class="orange"><?php echo _cfg("cell"); ?><i>（工作时间：09:00-21:00）</i></p> 
                    <a id="a_service" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes"><b class="u-personal"></b>在线客服</a>
                    <em class="u-personal"></em>
                </div>
            </div>
        </div>

<script>
 var clip = null;	
function copy(id){ return document.getElementById(id); }	
function initx(){
	clip = new ZeroClipboard.Client();
	clip.setHandCursor(true);
	ZeroClipboard.setMoviePath("<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.swf");
	clip.addEventListener('mouseOver',function (client){
		clip.setText(copy('txtInfo').value );
	});		
	clip.addEventListener('complete',function(client,text){
		alert("邀请复制成功");
	});		
	clip.glue('d_clip_button','d_clip_container');
}
$(function(){
	initx();
})

</script>
<?php include templates("index","footer");?>