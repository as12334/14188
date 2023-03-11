<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_q.css?v=150728" rel="stylesheet" type="text/css" />

<div class="p-center-main clrfix">
            <!--左边导航-->
            
  	<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
                <div class="g-purchase-title">
					<span class="gray3"><?php echo _cfg('web_name_two'); ?>记录</span>
                </div>
                <!--<div class="g-screen-state clrfix">
                    <ul id="ul_state" class="a-screen">
                        <li><a state="-1" href="javascript:;" class="z-checked">全部</a></li>
                        <li><a state="1" href="javascript:;">进行中</a></li>
                        <li><a state="3" href="javascript:;">已揭晓</a></li>
                        <li><a state="4" href="javascript:;">已退购</a></li>
                    </ul>
                </div>
                <div class="g-screen-date clrfix">
                    <ul id="ul_region" class="a-screen fl">
                        <li><a region="3" href="javascript:;" >最近1个月</a></li>
                        <li><a region="4" href="javascript:;" class="z-checked">最近3个月</a></li>
                    </ul>
                    <ul class="m-select fl">
                        <li class="gray9">
                            <label>日期</label></li>
                        <li>
                            <input id="txtBeginTime"  type="text" maxlength="10"  /><b class="u-personal"></b>
                      
                        </li>
                        <li><em>-</em></li>
                        <li>
                            <input id="txtEndTime" type="text"  maxlength="10" /><b class="u-personal"></b>
                        </li>
                        <li><a id="a_serach" href="javascript:;">确定</a></li>
                    </ul>
                </div> -->
                <div id="GoodsList" class="goods_show">
		<ul class="gtitle">
			<li>商品图片</li>
			<li class="gname">商品名称</li>
			<li class="yg_status"><?php echo _cfg('web_name_two'); ?>状态</li>
			<li class="joinInfo">参与人次</li>
			<li class="do">操作</li>
		</ul>	
		<?php $ln=1;if(is_array($record)) foreach($record AS $rt): ?>
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
        
        <style>
			#divPageNav{ padding-top:10px;text-align:right}
			#divPageNav li a{ padding:5px;}
			.null-data {
padding: 150px 0;
}
		</style>
        <?php if($total!=0): ?>
		<div id="divPageNav" class="page_nav">
        	<?php echo $page->show('one'); ?> <li>共 <?php echo $total; ?> 条</li>
        </div>
        <?php  else: ?>
        <div class="null-data"><b class="gth-icon transparent-png"></b>您最近还没有参与<?php echo _cfg('web_name_two'); ?>哦！ 梦想与您只有1微币的距离！<br><a href="/" target="_blank" class="blue">去<?php echo _cfg('web_name_two'); ?></a></div>
        <?php endif; ?>
        </div>
        
        

            </div>

        </div>

<?php include templates("index","footer");?>