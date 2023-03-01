<?php session_start();
require"../../conn.php";
require_once "../../cart.shop.php";
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}

$uid = ($_COOKIE['wuid']);
$sqlip='select * from `'.$tablepre.'go_member` where  uid="'.$uid.'"';		 
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);
$sqladdr='select * from `'.$tablepre.'go_member_dizhi` where  uid="'.$uid.'"';
$resultaddr=$db->query($sqladdr);
$rowaddr=$db->getrow($resultaddr);

$sqla='select * from `'.$tablepre.'go_pay` where  pay_class="wapalipay"';
$resulta=$db->query($sqla);
$paya=$db->getrow($resulta);

$sqlw='select * from `'.$tablepre.'go_pay` where  pay_class="wxpay_web"';
$resultw=$db->query($sqlw);
$payw=$db->getrow($resultw);


		
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
        <title>订单确认</title>
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <script type="text/javascript" src="<?php echo $url; ?>/m/js/Images.js?ts=<?php echo date("YmdHis"); ?>"></script>
        <!-- head css -->
        
        <link href="<?php echo $url; ?>/m/css/cart.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
        
<script type="text/javascript" src="<?php echo $url; ?>/m/js/js.min.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">

function check(){
<?php if( $rowaddr['shouhuoren']==''){?>
	 tb_id =document.getElementById("modal-container"); 
	 tb_id.style.display="block";
	 return false;
	 <?php }?>
}
</SCRIPT>
<SCRIPT language="JavaScript" type="text/JavaScript">
function indexout()
{
   var modalcontainer=document.getElementById("modal-container");
   modalcontainer.style.display="none";

}
$(function(){
$(".type li").click(function(){
		var id=$(".type li").index(this);
		var order = $(this).attr("data-pay-type");
		$(".type li").removeClass().eq(id).addClass("active");
		$("#pay_type").val(order);
		});
		
		})
</SCRIPT>

    <script type="text/javascript">
            var versionNumber="ts=08d33f1faffefc63_1452521701";
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
                    <span id="t-index">确认订单</span>
                    <span id="t-user"><a href="<?php echo $url; ?>/m" id="item-good-home">
                        <img src="<?php echo $url; ?>/m/images/icon/back-home.png" width="35" style="vertical-align:middle">
                    </a></span>
                </div>
            </header>
          <form id="cart-order-form" action="<?php echo $url; ?>/m/pay/alipayapi.php" method="post" onSubmit="return check()">
                <input type="hidden" name="token" value="8dbe80ba3792a5621c0220402560e7f1">
                <input type="hidden" name="order_no" value="<?php echo date("YmdHis").rand(100,999);?>" />
              <ul class="action-list action-bag">
                  <li>
                  <?php if( $rowaddr['shouhuoren']==''){?>
                  <a href="<?php echo $url; ?>?/mobile/home/upadd/">
                                                    请填写收货地址
                      </a>
                  <?php }else{?>
                  <a href="<?php echo $url; ?>?/mobile/home/eidtadd/<?php echo $rowaddr['id']?>">
                                                    <div id="address" data-address_id="618496" class="fl">
                                <span class="name"><?php echo $rowaddr['shouhuoren']?></span><span class="phone"><?php echo $rowaddr['mobile']?></span>
                                <br>
                                <span class="address"><?php echo $rowaddr['sheng']?> <?php echo $rowaddr['shi']?> <?php echo $rowaddr['xian']?><?php echo $rowaddr['jiedao']?></span>
                                
                        </div>
                            <em class="cur"></em>
                      </a>
                  <?php }?>
                        
                    </li>
                </ul>
                                <div class="pay-type">
                    <p>支付方式</p>
                    <ul class="type" id="pay-type-list">
                    <li data-pay-type="12"  class="active">
                                <img src="<?php echo $url; ?>/m/images/shopping/icon_wx.png">
                                <span>聚宝支付</span><span style="color:#666; font-size:12px;">(仅支持微信6.0.2及以上版本)</span>
                                <i class="pay-type-radio"></i>
                            </li>
                      
                    </ul>
                    <input type="hidden" name="pay_type" id="pay_type" value="12" />
                </div>

                                <div class="order-detail">
                    <p class="seller"><img src="<?php echo $url; ?>/m/images/shopping/seller-icon.png"><span><?php echo $rowSeo['name'] ?></span></p>
                    <ul class="bag-list">

                        <li>                                                         <?php
// 取得
$getarr = $cart->getItems();
if(is_array($getarr)&&!empty($getarr))
{
    // 列表
    foreach($getarr as $pkey=>$pval)
    {
        if($pkey!=null)
        {
?>
                                                        <a class="box clear js-active-goods" data-skuid="8604813" href="<?php echo $url; ?>/m/shop/index.php?id=<?php echo $pval['postitempid']?>">
                                <div href="" class="pic fl">
                                    <img src="<?php echo $url; ?>statics/uploads/<?php echo $pval['img']?>">
                                </div>
                                <div class="detail fl">
                                    <p class="title"><?php echo $pval['name']?></p>
                                    <p class="type"><?php 
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
                    <?php }}}?>  </p>
                                    <div class="price"><span class="current">￥<?php echo $pval['price']?></span></div>
                                </div>
                                <div class="other"><span class="n">×<?php echo $pval['num']?></span></div>
                            </a>
                                 <?php
		  }
    }
}
?>                        
                                                        <div class="normal clear">
                                <p class="fl">运费</p>
                                                                    <p class="fr rose">包邮</p>
                          </div>
                            <div class="normal clear">
                                <p class="fl">小计</p>
                                <p class="fr"><span class="rose">￥<?php echo $cart->sum()?></span></p>
                            </div>
                            <div class="activate-box">
                              <input type="text" class="activate-key js-user-note" name="u_note" maxlength="50" x-webkit-speech="" placeholder="给卖家留言(限50字)" autocomplete="off">
                            </div>
                        </li>
                        
    
                    </ul>
                </div>
                                                <div class="order_total">
                    <div class="total_info clear">
                        <span class="sp1">总计</span>
                        <span class="sp2">￥<?php echo $cart->sum()?></span>
                    </div>
                    <!--<div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">满减优惠</span>
                        <span class="sp2">
                                                            -￥<?php echo $m_yh?>
                      </span>
                    </div>
                    <div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">活动优惠</span>
                        <span class="sp2">
                                                            -￥0.00
                      </span>
                    </div>
                    <div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">优惠券抵扣</span>
                        <span class="sp2">
                                                            -￥<?php echo $k_yh?>
                      </span>
                    </div> -->
                </div>
                                    <input type="hidden" name="ad_ab_id" value="" />
              <div class="bag-total order_temai">
                <div class="bag-money fl">
                        <p class="count other">实付款<span class="p">
                        ￥<?php echo $countprice = $cart->sum()-$k_yh-$m_yh?></span>
                        </p>
                    </div>
                    <?php if($countprice!=0){?>
                    <input type="submit" name="ppay" value="去付款" class="go_pay fr" style="border:0; cursor:pointer">
                    <?php }else{?>
                    <a href="javascript:;" onClick="alert('购物车没有产品');" class="go_pay fr">去付款
                   
                    <?php }?>
                </div>
          </form>
        <?php require_once('../bottom.php');?>
 
<div id="modal-container" style="display:none; z-index: 201;"><div class="alert_fullbg" ></div><div id="bag-alert" style="display:block;" class="normal-alert"><div class="box"><p class="txt">请填写收货地址</p><div id="modal-btn" class="btn-all"><a class="btn02 fr" href="<?php echo $url; ?>?/mobile/home/upadd/">确定</a><a class="btn01 fl" onClick="indexout()" href="javascript:;" >取消</a></div></div></div></div>  

        <div style="display: none; z-index: 200;" class="alert_fullbg"></div>
        <div style="display:none;" class="temai_tips">
            <div class="temai_box">
                <p class="txt" id="txt1">部分折扣活动已结束。</p>
                <p class="txt" id="txt2">请重新确认订单信息再去结算哦~</p>
                <div class="temai_btn">
                    <a href="javascript:;">确定</a>
                </div>
            </div>
        </div>
        <div id="loading-alert-checkout" class="normal-alert">
            <div class="box">
                <img class="loading" src="http://s.juancdn.com/weixin/images/icon/loading.png">
                <p>正在创建支付</p>
            </div>
        </div>
        <div class="normal_loading" style="top:30%; z-index:201">
            <div class="box other">
                <div class="loading2">
                    <img src="http://s.juancdn.com/jpwebapp/images/icon/loading_bag.png?ts=08d33f1faffefc63_1452521701">
                    <img class="circle-rotating" src="http://s.juancdn.com/jpwebapp/images/icon/loading_circle.png?ts=08d33f1faffefc63_1452521701" alt="加载中">
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" value="" name="autoregister_flag">

       
       


    </body>
</html>