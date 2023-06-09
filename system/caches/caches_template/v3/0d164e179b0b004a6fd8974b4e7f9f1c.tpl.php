<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>支付_<?php echo _cfg("web_name"); ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Comm1.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/MyCart.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.cookie.js"></script>
<style>
.yeepay_bank img{ border:1px solid #eee; padding:2px; width:130px; height:35px; }
</style>
<script type="text/javascript">

function(){
    try {
            if(document.getElementById("bdmark") != null){
                return;
            }
            var urlhash = window.location.hash;
            if (!urlhash.match("fromapp")){
                if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {
                        <?php $getType="iPhone"; ?> 
                }else {
					
					}
            }else {
					<?php $getType="pc"; ?> 
					}
        } catch(err){}
	
}


</script>
</head>
<body>
<div class="logo">
	<div class="float">
		<span class="logo_pic"><a href="<?php echo WEB_PATH; ?>" class="a" title="<?php echo _cfg("web_name"); ?>">
			<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
		</a></span>
		<span class="tel"><a href="<?php echo WEB_PATH; ?>" style="color: #999;">返回首页</a></span>
	</div>
</div>
<form id="form_paysubmit" action="<?php echo WEB_PATH; ?>/<?php echo ROUTE_M; ?>/<?php echo ROUTE_C; ?>/paysubmit" method="post">
<input type="hidden" name="type_pay_list" value="/member/cart/cartlist">
<input type="hidden" name="getType" value="<?php echo $getType; ?>">
<input type="hidden" name="type_pay_success" value="/member/cart/paysuccess">
<div class="shop_payment">
	<ul class="payment">
		<li class="first_step">第一步：提交订单</li>
		<li class="arrow_1"></li>
		<li class="secend_step orange_Tech">第二步：网银支付</li>
		<li class="arrow_3"></li>
		<li class="third_step">第三步：支付成功 等待揭晓</li>
		<li class="arrow_2"></li>
		<li class="fourth_step">第四步：揭晓获得者</li>
		<!-- <li class="arrow_2"></li>
		<li class="fifth_step">第五步：晒单奖励</li> -->
	</ul>
	<div class="payment_Con">
		<ul class="order_list">
			<li class="top">
				<span class="name">商品名称</span>
				<span class="moneys">价值</span>
				<span class="money"><?php echo _cfg('web_name_two'); ?>价</span>
				<span class="num"><?php echo _cfg('web_name_two'); ?>人次</span>
				<span class="all">小计</span>
			</li>               
			<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shops): ?>
			<li class="end">
				<span class="name">
               		<a class="blue" href="<?php echo WEB_PATH; ?>/goods/<?php echo $shops['id']; ?>"><?php echo $shops['title']; ?></a>
                </span>
				<span class="moneys"><?php echo $shops['money']; ?></span>
				<span class="money"><span class="color">￥<b><?php echo $shops['yunjiage']; ?></b></span></span>
				<span class="num orange Fb"><?php echo $shops['cart_gorenci']; ?></span>
				<span class="all"><?php echo $shops['cart_xiaoji']; ?></span>
			</li>
			<?php  endforeach; $ln++; unset($ln); ?>           
			<li class="payment_Total">
				<div class="payment_List_Lc"><a href="<?php echo WEB_PATH; ?>/member/cart/cartlist" class="form_ReturnBut">返回购物车修改订单</a></div>
				<p class="payment_List_Rc">商品合计：<span class="orange F20"><?php echo $MoenyCount; ?></span> 微币</p>
			</li>
			<!-- 微积分 -->
            <?php if($fufen_dikou): ?>
			 <li id="liPayByPoints" class="point_out">
					<div class="payment_List_Lc">
					<input type="checkbox" class="input_choice" id="shop_score" name="shop_score" value="1"/>使用微积分抵扣现金：您的微积分(<?php echo $member['score']; ?>)本次消费最多可抵扣现金
                    <span class="orange Fb"><?php echo $fufen_dikou; ?>.00</span>微币)，我要使用 
                    <input type="text" maxlength="8" class="pay_input_text_gray" id="shop_score_num" value="0" money="<?php echo $fufen['fufen_yuan']; ?>" name="shop_score_num"/> 微积分, 1微币 = <?php echo $fufen['fufen_yuan']; ?> 微积分</div>
                    <p id="pPointsTip" class="pay_Value" style="display:none;"></p>
                    <p class="payment_List_Rc"></p>
             </li>
             <?php  else: ?>
              <li id="liPayByPoints" class="point_out point_gray">
					<div class="payment_List_Lc">
					<input type="checkbox" class="input_choice" disabled="disabled"/>使用微积分抵扣现金：您的微积分(<?php echo $member['score']; ?>)本次消费最多可抵扣现金
                    <span class="orange Fb"><?php echo $fufen_dikou; ?>.00</span>微币)，我要使用 
                    <input type="text" maxlength="8" class="pay_input_text_gray" name="costPoint"  disabled="disabled"/> 微积分</div>
                    <p id="pPointsTip" class="pay_Value" style="display:none;"></p>
                    <p class="payment_List_Rc"></p>
              </li>
             <?php endif; ?>
             <!-- 微积分 -->
            <!-- 余额支付 start-->
			<li class="point_in" id="liPayByBalance">
				<div class="payment_List_Lc">					
					<input type="checkbox" name="moneycheckbox" id="MoneyCheckbox" class="input_choice"/>使用账户余额支付，账户余额：
					<span class="green F18"><?php echo $Money; ?></span>微币
				</div>
				<p style="" class="pay_Value" id="pBalanceTip">
				<span>◆</span><em>◆</em>账户余额支付更快捷，
				<!--<a class="blue" target="_blank" href="<?php echo WEB_PATH; ?>/member/home/userrecharge">立即充值</a> --></p>
				<p class="payment_List_Rc">余额支付：<span id="pay_money" class="orange F20">0.00</span> 微币</p>
			</li>
            <!-- 余额支付 end--> 
		
			<li id="liPayByOther" class="point_in point_bank" style="display:list-item;">
				<div class="payment_List_Lc gary01 Fb">您的账户余额不足，请选择以下方式完成支付</div>
				<p class="payment_List_Rc">网银支付：<span id="pay_bankmoney" class="orange F20">0.00</span> 微币</p>
			</li>
			
            
		</ul>
	</div>
    
	<div class="pay_bankC" id="divBankList" style="display:block;">
		<div class="bank_arrow"><span>◆</span><em>◆</em></div>
		<?php 
        	$bank1 = $this->db->GetOne("select * from `@#_caches` where `key` = 'pay_bank_type'");
            $bank2 = $this->db->GetOne("select * from `@#_pay` where `pay_class` = '$bank1[value]'");
            if($bank1 && $bank2['pay_start'] ==1){
		 ?>
        <?php if($bank1['value'] == 'tenpay'): ?>
		 <!--<h2>银行支付：</h2>
            <ul class="bank_logo click_img">
            	<input type="hidden" name="pay_bank" value="tenpay"  />
                <li><input type="radio" value="CMB" name="account" checked="checked" /><label for="bankType1001"><span class="zh_bank"></span></label></li>
                <li><input type="radio" value="ICBC" name="account"/><label for="bankType1002"><span class="gh_bank"></span></label></li>
                <li><input type="radio" value="CCB" name="account" /><label for="bankType1003"><span class="jh_bank"></span></label></li>
                <li><input type="radio" value="ABC" name="account" /><label for="bankType1005"><span class="nh_bank"></span></label></li>
                <li><input type="radio" value="SPDB" name="account" /><label for="bankType1004"><span class="pf_bank"></span></label></li>   
                    
                <li><input type="radio" value="SDB" name="account" /><label for="bankType1008"><span class="sf_bank"></span></label></li>
                <li><input type="radio" value="CIB" name="account" /><label for="bankType1009"><span class="xy_bank"></span></label></li>
                <li><input type="radio" value="BOB" name="account" /><label for="bankType1032"><span class="bj_bank"></span></label></li>
                <li><input type="radio" value="CEB" name="account" /><label for="bankType1022"><span class="gd_bank"></span></label></li>
                <li><input type="radio" value="CMBC" name="account" /><label for="bankType1006"><span class="ms_bank"></span></label></li>
                    
                <li><input type="radio" value="CITIC" name="account" /><label for="bankType1021"><span class="zx_bank"></span></label></li>
                <li><input type="radio" value="GDB" name="account" /><label for="bankType1027"><span class="gf_bank"></span></label></li>
                <li><input type="radio" value="PAB" name="account" /><label for="bankType1010"><span class="pa_bank"></span></label></li>
                <li><input type="radio" value="BOC" name="account" /><label for="bankType1052"><span class="zg_bank"></span></label></li>
                <li><input type="radio" value="COMM" name="account"/><label for="bankType1020"><span class="jt_bank"></span></label></li>
            </ul>  -->
            <?php endif; ?>
            <?php if($bank1['value'] == 'yeepay'): ?>
          	<!--<h2>银行支付：</h2>
            <ul class="bank_logo yeepay_bank click_img">
            <input type="hidden" name="pay_bank" value="yeepay"  />
     		<li><input type="radio" value="ICBC-NET-B2C" name="account" checked="checked" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/ICBC.png"></li>
            <li><input type="radio" value="CCB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CCB.png"></li>
            <li><input type="radio" value="ABC-NET-B2C" name="account"  /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/ABC.png"></li>
         	<li><input type="radio" value="CMBCHINA-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CMBCHINA.png"></li>
            <li><input type="radio" value="BOC-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/BOC.png"></li>
            <li><input type="radio" value="BOCO-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/JIAOTONG.png"></li>
            
            
            <li><input type="radio" value="CEB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CEB.png"></li>
            <li><input type="radio" value="GDB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/GDB.png"></li>
            <li><input type="radio" value="POST-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/PSBC.png"></li>
            <li><input type="radio" value="CMBC-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CMBC.png"></li>
            <li><input type="radio" value="PINGANBANK-NET" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/SZPA.png"></li>
            <li><input type="radio" value="BCCB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/BCCB.png"></li>
            </ul>  -->
            <?php endif; ?>
			<?php 
				}
			 ?>
		<h3 class="bor">支付平台支付：</h3>
		<ul class="click_img">
        	<?php $ln=1;if(is_array($paylist)) foreach($paylist AS $pay): ?>
			<li>
            <input checked="checked" type="radio" value="<?php echo $pay['pay_id']; ?>" name="account" id="<?php echo $pay['pay_class']; ?>">
            <img style="border:1px solid #eee; padding:1px" height="35px" width="120px" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $pay['pay_thumb']; ?>">
            </li>   
            <?php  endforeach; $ln++; unset($ln); ?>
            <li>
          
          
            </li>   
		</ul>
	</div>
    <div class="payment_but" style="margin:15px 0 0 0;">
			<input type="hidden" name="submitcode" value="<?php echo $submitcode; ?>">
			<input id="submit_ok" class="shop_pay_but" type="submit" name="submit" value="">
	</div>
</form>


<script id='spay-script' type='text/javascript' src='<?php echo G_TEMPLATES_STYLE; ?>/js/js.js'></script>
<script>
    //3. 需要发起支付时(示例中绑定在一个按钮的click事件中),调用BC.click方法
    document.getElementById("test").onclick = function() {
        asyncPay();
    };
    function bcPay() {
        BC.click({
            "title": "<?php echo $title; ?>",
            "amount": <?php echo $amount; ?>,
            "out_trade_no": "<?php echo $out_trade_no; ?>", //唯一订单号
            "sign" : "<?php echo $sign; ?>",
            /**
             * optional 为自定义参数对象，目前只支持基本类型的key ＝》 value, 不支持嵌套对象；
             * 回调时如果有optional则会传递给webhook地址，webhook的使用请查阅文档
             */
            "optional": {"test": "willreturn"}
        });

    }
    // 这里不直接调用BC.click的原因是防止用户点击过快，BC的JS还没加载完成就点击了支付按钮。
    // 实际使用过程中，如果用户不可能在页面加载过程中立刻点击支付按钮，就没有必要利用asyncPay的方式，而是可以直接调用BC.click。
    function asyncPay() {
        if (typeof BC == "undefined") {
            if (document.addEventListener) { // 大部分浏览器
                document.addEventListener('beecloud:onready', bcPay, false);
            } else if (document.attachEvent) { // 兼容IE 11之前的版本
                document.attachEvent('beecloud:onready', bcPay);
            }
        } else {
            bcPay();
        }
    }
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
<!--<div class="answer">
		<h6><span></span>付款遇到问题</h6>
		<ul class="answer_list">
			<li>1、如您未开通网上银行，即可以使用储蓄卡快捷支付轻松完成付款；</li>
			<li>2、如果您没有网银，可以使用银联在线支付，银联有支持无需开通网银的快捷支付和储值卡支付；</li>
			<li>3、如果您有财付通或快钱、手机支付账户，可将款项先充入相应账户内，然后使用账户余额进行一次性支付；</li>
			<li>4、如果银行卡已经扣款，但您的账户中没有显示，有可能因为网络原因导致，将在第二个工作日恢复。</li>
			<li class="more"><a href="<?php echo WEB_PATH; ?>/help/liaojie">更多帮助</a>&nbsp;&nbsp;<a href="<?php echo WEB_PATH; ?>/member/home">进入我的<?php echo _cfg('web_name_two'); ?>中心&gt;&gt;</a></li>
		</ul>      
    </div> -->
<p>
  <!--payment_Con end-->
  <script>
$(function(){
	var info={'money':<?php echo $Money; ?>,'MoenyCount':<?php echo $MoenyCount; ?>,"shoplen":<?php echo $shoplen; ?>};
	if(info['money'] >= info['MoenyCount']){
		$("#divBankList").hide();
		$("#liPayByOther").hide();
		$("#MoneyCheckbox").attr("checked",true);
		$("#MoneyCheckbox").attr("disabled",true);
		$("#pay_money").text(info['MoenyCount']+'.00');
	}
	
	if(info['money']==0){
			$("#liPayByBalance").addClass("point_gray");
			$("#MoneyCheckbox").attr("disabled",true);
	}
	if(info['money'] < info['MoenyCount']){		
		$("#MoneyCheckbox").attr("checked",true);
		$("#pay_money").text(info['money']+'.00');
		$("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
		$("#MoneyCheckbox").click(function(){
			if(this.checked){
				$("#pay_money").text(info['money']+'.00');
				$("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
			}else{
				$("#pay_money").text('0.00');
				$("#pay_bankmoney").text(info['MoenyCount']+'.00');	
			} 
		});
	}
	
	
	$("#submit_ok").click(function(){	
		if(!this.cc){
			this.cc = 1;		
			return true;
		}else{		
			return false;
		}		
		return false;
	});
	
	$("#shop_score_num").blur(function(){
			var fufen = parseInt($(this).val());
			var money = parseInt($(this).attr("money"));
			$(this).val(Math.floor(fufen/money)*money);			
	});
	

	//$("input[@type=radio][@checked]").val();
	$(".click_img li>img").click(function(){			
			$(this).prev().attr("checked",'checked');
	});
	
});
      </script>
<!--footer 开始-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color=#987cb9 SIZE=3>
<p><?php include templates("index","footer");?></p>
