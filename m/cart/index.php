<?php session_start();require"../../conn.php";
require_once "../../cart.shop.php";
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}
?>
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
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
        <title>购物袋-<?php echo $rowSeo['name'] ?>网</title>
        <meta content="购物袋,<?php echo $rowSeo['name'] ?>网" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <script type="text/javascript" src="<?php echo $url; ?>/m/js/Images.js?ts=<?php echo date("YmdHis"); ?>"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.min.js?t=<?php echo date("YmdHis"); ?>"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/base.js?t=<?php echo date("YmdHis"); ?>"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/sea-debug.js?t=<?php echo date("YmdHis"); ?>"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/lightbox.js?ts=<?php echo date("YmdHis"); ?>"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/css/md-shop.css?t=<?php echo date("YmdHis"); ?>" />
        <!-- head css -->
        
        <link href="<?php echo $url; ?>/m/css/cart.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
        <!--商品价格ajax获得-->
        <script src="<?php echo $url; ?>/js/shoppingcart_header.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $url; ?>/js/productajaxnew.js?t=<?php echo date("YmdHis"); ?>"></script> 
        <script type="text/javascript">
            var versionNumber="ts=08d33f1faffefc63_1452253119";
        </script>
        <!-- H5 -->
    </head>
    <body>
        <!-- 主体 -->
        
    <div class="main">
        <div class="app">
            <header class="head" id="head">
                <div class="fixtop">
                    <span id="t-find" class="classify"><a href="javascript:window.history.go(-1);" class="btn btn-left  btn-back" ></a></span>
                    <span id="t-index">购物袋</span>
                    <span id="t-user">
                    <a href="<?php echo $url; ?>/m" id="item-good-home">
                        <img src="<?php echo $url; ?>/m/images/icon/back-home.png" width="35" style="vertical-align:middle">
                    </a></span>
                </div>
            </header>
            <div class="quan-show bar-normal bag-show" <?php if($cart->getItems()!=''){ ?> style="display:none;" <?php }?>>
                <div class="quan-con">
	            <p class="empty"><img src="<?php echo $url; ?>/m/images/shopping/bag-empty.png"><br>购物袋还是空荡荡的<br><a href="<?php echo $url; ?>/m/" class="go-buy">去抢购</a></p>
                </div>
	        </div>


            <!--购物袋商品列表 begin-->
            <div class="my-bag" id="goodsList" >
                    <div class="quan-normal">
        <ul class="bag-list">
        
         <?php
// 取得
$getarr = $cart->getItems();
$n=1;
if(is_array($getarr)&&!empty($getarr))
{
    // 列表
    foreach($getarr as $pkey=>$pval)
    {
        if($pkey!=null)
        {
			
			
?>
                            <li skuid="56944013" data-bid="7562817">
                    <a href="javascript:;" class="box clear">
                        
                        <div class="pic fl" onclick="window.location.href='<?php echo $url; ?>/m/shop/index.php?id=<?php echo $pval['postitempid']?>'"><img src="<?php echo $url; ?>statics/uploads/<?php echo $pval['img']?>"></div>
                        
                        <div class="detail fl">
                            <p class="title" onclick="window.location.href='<?php echo $url; ?>/m/shop/index.php?id=<?php echo $pval['postitempid']?>'"><?php echo $pval['name']?></p>
                            <P class="type">  <?php 
$sql_pro='select * from `'.$tablepre.'pro_co` where `id`='.$pval['postitempid'].'';
$result_pro=$db->query($sql_pro);
while($row_pro=$db->getrow($result_pro)){
	$cart_num = $row_pro['cart_num'];
	$cart_title = $row_pro['cart_title'];
	$title_ex = explode(" ",$cart_title);$num_ex = explode(" ",$cart_num);  $title_count = count($title_ex)-1; 
	for($i=0;$i<=$title_count;$i++){
		if($num_ex[$i]==$pval['picStyle']){
	?>
                    <?php echo "颜色分类：".$title_ex[$i];?>
                    <?php }}}?> </P>
                            <div class="price"><span class="current">￥<?php echo $pval['price']?></span><span class="old">￥<?php echo $pval['priceold']?></span></div>
                        </div>
                    </a>
                                
                   
        
 
<div class="num clear">
<dl class="number clear">
                    
                    <dd _limit="0" _realbuy="" _sku_limit_buy="5" countcart="<?php echo $n;?>">
                        <p >
                        
                            <a href="javascript:;" onclick="decreaseappeditGroups(<?php echo $pkey?>,'<?php echo '';?>','<?php echo '';?>','<?php echo '';?>','<?php echo '';?>','<?php echo $n;?>')"><i class="decrease">-</i></a>
                            <input type="text" name="amount<?php echo $n;?>" id="amount<?php echo $n;?>" value="<?php echo $pval['num']?>" autocomplete="on"  readonly="true" />
                            <a href="javascript:;" onclick="increaseappeditGroups(<?php echo $pkey?>,'<?php echo '';?>','<?php echo '';?>','<?php echo '';?>','<?php echo '';?>','<?php echo $n;?>')"><i class="increase cur<?php echo $n;?>" >+</i></a> 
                        </p>
                        <p class="skulimitbuy" style="display:none;">&nbsp;&nbsp;限购<em class="red">5</em>件</p>
                        <div id="stockconfig" data-enough="50" data-less="20" data-stock="13620" style="display:none;"></div>
                    </dd>
                </dl>
        
    </div>
    
                    <a href="del.php?act=del&a=m&id=<?php echo $pkey?>" class="del"></a>
                </li>
                
                            <?php
		 $n++; }
    }
}
?> 
                    </ul>
            </div>
            </div>
            <!--购物袋商品列表 over-->

            <!--优惠券 begin
                        <ul class="action-list shopping-list nobottom" id="user-quan">
                <li>
                    <a href="javascript:;">
                        <span class="fl">
                        活动优惠<span> - <em class="u-yen">¥</em><span id="reduceTotal">0.00</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        满减优惠<span> - <em class="u-yen">¥</em><span id="reduceTotal"><?php echo $m_yh?></span></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        优惠券抵扣<span> - <em class="u-yen">¥</em><span id="cashTotal"><?php echo $k_yh?></span></span>
                        </span>
                        
                    </a>
                </li>
            </ul>-->
                        <div class="quan-box" style="display:none;">
    
</div>
            <!--优惠券 over-->
            <!--过期商品 begin-->
            
            <!--过期商品 over-->

            <!--结算按钮 begin-->
            <input type="hidden" name="totalPrice" id="totalPrice" value="29.70" />
            <div class="bag-total" >
                <div class="bag-money fl">
                    <p class="count" id="counts">合计：<span class="p">￥<?php echo $countprice = $cart->sum()-$k_yh-$m_yh?></span><span class="t"></span>
                    </p>
                    <!--<p class="save">（不含运费）</p> -->
                </div>
                <a href="<?php echo $url; ?>/m/pay/" class="go_pay fr" data-login='1'>去结算</a>
            </div>
            <!--结算按钮 over-->

            <?php require_once('../bottom.php');?>



            <div style="display: none; z-index: 201;" class="alert_fullbg"></div>
            <div class="normal_alert_bg" style="display:none;">
                <div class="box">
                    <div class="alert_tips">
                                            </div>
                    <div class="btns_all">
                        <a id="go-pay-in-app" href="javascript:void(0)" class="btns btn01 button_1">速去APP下单</a>
                        <a href="javascript:;" class="btns btn01 button_1 colors go-pay-no-app">我钱多，直接买！</a>
                    </div>
                </div>
            </div>
            <div class="normal_loading" id="loading-alert" style="display:none;">
                <div class="box">
                    <div class="loading show">
                        <img class="stars" src="<?php echo $url; ?>/m/images/icon/stars.png" style="width:36px;">
                        <div class="shade"></div>
                    </div>
                    <p class="txt">正在加载中...</p>
                </div>
            </div>

            <div style="display:none;" class="temai_tips">
                <div class="temai_box">
                    <p class="txt" id="txt1">部分折扣活动已结束。</p>
                    <p class="txt" id="txt2">请重新确认订单信息再去结算哦~</p>
                    <div class="temai_btn">
                        <a href="javascript:;">确定</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

        <!-- 业务js -->
        
  
    <script type="text/javascript">
       use('cart');
        
    </script>

        <!-- 微信分享配置 -->
        
    
<script type="text/javascript">
    var weixin_cfg={
        // appId:"wx645fc030441e3451"||'',
        // timestamp:"1452346194"||'',
        // nonceStr:"A6xXJb899h8BwMfA"||'',
        // signature:"5c8bfd65a827d164d58e984048bf6dcac4dcdd82"||''
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "wx645fc030441e3451", // 必填，公众号的唯一标识
        timestamp: "1452346194", // 必填，生成签名的时间戳
        nonceStr: "A6xXJb899h8BwMfA", // 必填，生成签名的随机串
        signature: "5c8bfd65a827d164d58e984048bf6dcac4dcdd82",// 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage','onMenuShareQQ','onMenuShareTimeline','hideOptionMenu','chooseWXPay','showMenuItems'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    };

    //app分享
    var shareUrl = self.location.href + "?qmshareview=1";
    var shareTitle = "";
    var shareContent = "";
    var shareImgUrl = "?ts=08d33f1faffefc63_1452253119";

</script>

        

    </body>
</html>