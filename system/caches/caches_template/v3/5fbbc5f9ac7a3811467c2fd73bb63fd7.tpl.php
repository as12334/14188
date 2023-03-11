<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Refresh"content="2;URL=<?php echo WEB_PATH; ?>/go/lucky">
<title>支付_<?php echo _cfg("web_name"); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Comm1.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/MyCart.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/JQuery.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.cookie.js"></script>
</head>
<body>
<input name="hidLogined" type="hidden" id="hidLogined" value="0">
<div class="logo">
	<div class="float">
		<span class="logo_pic"><a href="<?php echo WEB_PATH; ?>" class="a" title="<?php echo _cfg("web_name"); ?>">
			<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
		</a></span>
		<span class="tel"><a href="<?php echo WEB_PATH; ?>" style="color: #999;">返回首页</a></span>
	</div>
</div>
<div class="shop_payment">
        <ul class="payment">
           <li class="first_step">第一步：提交订单</li>
            <li class="arrow_2"></li>
            <li class="secend_step">第二步：网银支付</li>
            <li class="arrow_1"></li>
            <li class="third_step orange_Tech">第三步：支付成功 等待揭晓</li>
            <li class="arrow_3"></li>
            <li class="fourth_step">第四步：揭晓获得者</li>
            <!-- <li class="arrow_2"></li>
            <li class="fifth_step">第五步：晒单奖励</li> -->
        </ul>
		<div id="divResult" class="wait_list hidden" style="display: block;">
			<div class="wait_list_tips ">
			<dl>
				<dt><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/login_exp04.png" border="0" alt=""></dt>
				<dd><h2 class="orange Fb">恭喜您，支付成功！请等待系统为您揭晓！</h2>
                <h2 class=" Fb" style="color:red;"><span class="grayBtn">2</span>秒去抽奖</h2>
					<p>您现在可以<a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" class="blue">查看<?php echo _cfg('web_name_two'); ?>记录</a>或<a href="<?php echo WEB_PATH; ?>/index.php/go/lucky" class="blue">免费抽奖</a></p>
					<!-- <p>总共成功云购1件商品，信息如下：</p> -->
				</dd>
			</dl>
			</div>
			<!--
			<div class="wait_listCon">
			<ul>
				<li class="wait_Ltit">
					<span class="wait_Cw01">购买时间</span>
					<span class="wait_Cw02">商品名称</span>
					<span class="wait_Cw03">云购人次</span>
					<span class="wait_Cw04">云购编码</span>
				</li>
              
				<li class="wait_Lodity">
					<span class="wait_Cw01"></span>
					<span class="wait_Cw02"><a href="<?php echo WEB_PATH; ?>home/index/item" class="blue">(第6期)苹果（Apple）iPhone 5 32G智能手机</a></span>
					<span class="wait_Cw03">1</span>
					<span class="wait_Cw04"><b>10002561</b></span>
				</li>
                
			</ul>
			</div>
			-->
		</div>
</div>
<script type="text/javascript">
$(function(){
	var A=2;
	var B=function()
	{
		
		
		if(A==1){
			
		
	//	location.replace("<?php echo WEB_PATH; ?>/index.php/go/lucky")
	}else{
		
		$(".grayBtn").html(""+A+"");A--
		}
	};setInterval(B,1000)
	
})
</script>
<div class="fast" id="fast">
        <h3>
            <span>以下商品即将揭晓，快<?php echo _cfg('web_name_two'); ?>吧！</span></h3>
        <?php $data=$this->DB()->GetList("select * from `@#_shoplist` where `q_uid` is null order by `shenyurenshu` ASC LIMIT 4",array("type"=>1,"key"=>'',"cache"=>0)); ?>
		    <?php $ln=1;if(is_array($data)) foreach($data AS $fast): ?>
                <div class="fast_list">
                    <h4>
                        <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $fast['id']; ?>" title="<?php echo $fast['title']; ?>">
                            <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $fast['thumb']; ?>" alt="<?php echo $fast['title']; ?>"></a></h4>
                    <ul>
                        <li class="title"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $fast['id']; ?>" title="<?php echo $fast['title']; ?>">
                            <?php echo $fast['title']; ?></a></li>
                        <li>价值：￥<span> <?php echo $fast['money']; ?></span></li>
                        <li>需要 <span style="color: #0082f0">
                            <?php echo $fast['zongrenshu']; ?></span> 人次参与</li>
                        <li>已参与 <span style="color: #ff0000; font-size: 16px; family: arial">
                            <?php echo $fast['canyurenshu']; ?></span> 人次</li>
                        <li class="buy"><a id="btnAdd2Cart" href="<?php echo WEB_PATH; ?>/goods/<?php echo $fast['id']; ?>" class="go_cart gotoCart" target="blank">去看看</a></li>
                    </ul>
                </div>
           
            <?php  endforeach; $ln++; unset($ln); ?>
            <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>        
</div>
<!--footer 开始-->
<?php include templates("index","footer");?>