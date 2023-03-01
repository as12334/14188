<?php session_start();require"../../conn.php";
require_once "../../cart.shop.php";
$id=(isset($_GET['id'])&&checknum($_GET['id']))?$_GET['id']:'';
if ($id==''){
	msg('参数错误');
}
$sql='select * from `'.$tablepre.'pro_co` where `id`='.$id.'';
$result=$db->query($sql);
if (!$row_pro=$db->getrow($result)){
	msg('该宝贝不存在或已删除');
}
$id = $row_pro['id'];
$title = $row_pro['title'];
$img_sl0 = $row_pro['img_sl0'];
$img_sl1 = $row_pro['img_sl1'];
$img_sl2 = $row_pro['img_sl2'];
$img_sl3 = $row_pro['img_sl3'];
$img_sl4 = $row_pro['img_sl4'];
$img_sl5 = $row_pro['img_sl5'];
$price1 = $row_pro['pro_can1'];
$price2 = $row_pro['pro_can2'];
$pro_can4 = $row_pro['pro_can4'];
$wtime = $row_pro['wtime'];
$z_body = $row_pro['z_body'];
$f_body = $row_pro['f_body'];
$cart_num = $row_pro['cart_num'];
$cart_title = $row_pro['cart_title'];
$fhd = $row_pro['fhd'];
$ems = $row_pro['ems'];

$sql_prm='select * from `'.$tablepre.'prm` where `title`="'.$row_pro['title'].'"';
$result_prm=$db->query($sql_prm);
$row_prm=$db->getrow($result_prm);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta content="app-id=518966501" name="apple-itunes-app" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes, maximum-scale=5.0" /><meta content="yes" name="apple-mobile-web-app-capable" /><meta content="black" name="apple-mobile-web-app-status-bar-style" /><meta content="telephone=no" name="format-detection" />
        
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
        
        <title>【<?php echo $rowSeo['name'] ?>特卖】<?php echo $pro_can4;?>-<?php echo $rowSeo['name'] ?>网</title>
        <meta content="<?php echo $rowSeo['name'] ?>,1折,特卖,包邮,<?php echo $rowSeo['name'] ?>网" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <script type="text/javascript" src="<?php echo $url; ?>/m/js/Images.js?ts=<?php echo date("YmdHis"); ?>"></script>
        <!-- head css -->
        <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/css/md-shop.css?t=<?php echo date("YmdHis"); ?>" />
    <link href="<?php echo $url; ?>/m/css/deal.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
         <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/css/md-shop.css?t=<?php echo date("YmdHis"); ?>" />
    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.min.js?t=<?php echo date("YmdHis"); ?>"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/base.js?t=<?php echo date("YmdHis"); ?>"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/sea-debug.js?t=<?php echo date("YmdHis"); ?>"></script>
      <script type="text/javascript" src="<?php echo $url; ?>/js/lightbox.js?ts=<?php echo date("YmdHis"); ?>"></script>
      
<script type="text/javascript">
        /*
       * 智能机浏览器版本信息:
       *
       */
	    $(document).ready(function() {
		    var maxWidth = 280;
		    var maxHeight = 200;
		    var zoomTimes;
		    $("img").each(function(){			
				    var curWidth  = $(this).width();
				    var curHeight = $(this).height();
				    if(curWidth > maxWidth){
				         $(this).width("100%");
				        
				    }else if(curHeight > maxHeight){
				        
				         $(this).width("100%");
				    }
			    });
		});

    </script>
        
    
    <script type="text/javascript">
    $("img.lazy").lazyload({threshold:200,failure_limit:30});
    seajs.use([
         '<?php echo $url; ?>/js/zhe-item.js?t=<?php echo date("YmdHis"); ?>',
        '<?php echo $url; ?>/js/pg-deal.js?t=<?php echo date("YmdHis"); ?>'
        ],function(a,b,c){
        a();b();c();
    });
    
    var gid = 3704102;
    var terminalFlag = 1;
    if(terminalFlag===0){
        $("#J-mini-btn").append("<div class='terminalTips' ><i class='icon-telephone'></i></div>");
    }
    $.ajax({
        type: 'GET',
        url: '/deal/getActivitysInfo',
        data: {gid: gid},
        dataType: 'json',
        cache: true,
        success: function(res) {
            if ( res.code == 1000 && res.data.rules.length > 0 ) {
                var data = res.data;
                data.ab_type = parseInt(data.ab_type);
                var _html = '<dl class="activity-hd clear">';
                _html += '<dd><div class="activity-box">';
                var iLen = data.rule_num;
                if ( iLen > 1 ) {
                    _html += '<p id="manjian">';
                    switch( data.ab_type ) {
                    case 4:
	                    _html += '<span class="title t1">满减</span>';
	                    _html += '<span class="mr10">'+data.message+'</span>';
	                    _html += '<span>满<b class="f36">'+data.aeMinMoney+'</b>元减<b class="f36">'+data.aeMoney+'</b>元（共'+iLen+'项）</span>';
	                    break;
                    case 6:
	                    _html += '<span class="title t3">满件折</span>';
	                    _html += '<span class="mr10">'+data.message+'</span>';
	                    _html += '<span>满<b class="f36">'+data.aeMinMoney+'</b>件可享<b class="f36">'+data.aeMoney+'</b>折（共'+iLen+'项）</span>';
	                    break;
                    case 7:
	                    _html += '<span class="title t2">满件减</span>';
	                    _html += '<span class="mr10">'+data.message+'</span>';
	                    _html += '<span>满<b class="f36">'+data.aeMinMoney+'</b>件减<b class="f36">'+data.aeMoney+'</b>元（共'+iLen+'项）</span>';
	                    break;
                    	
                    }
                    _html += '<i class="fr"></i>';
                    _html += '</p>';
                    _html += '<div class="all">';
                    for ( var i = 0; i < iLen; i++ ) {
                        _html += '<span class="mr10">'+data.message+'</span>';
                        switch( data.ab_type ) {
                        case 4:
                        	_html += '<span>满<b class="f36">'+data['rules'][i]['aeMinMoney']+'</b>元减<b class="f36">'+data['rules'][i]['aeMoney']+'</b>元</span><br/>';
                            break;
                        case 6:
                        	_html += '<span>满<b class="f36">'+data['rules'][i]['aeMinMoney']+'</b>件可享<b class="f36">'+data['rules'][i]['aeMoney']+'</b>折</span><br/>';
                            break;
                        case 7:
                        	_html += '<span>满<b class="f36">'+data['rules'][i]['aeMinMoney']+'</b>件减<b class="f36">'+data['rules'][i]['aeMoney']+'</b>元</span><br/>';
                            break;
                            
                        }
                    }
                    _html += '</div>';
                } else {
                	switch( data.ab_type ) {
                    case 4:
                    	_html += '<p><span class="title t1">满减</span>';
                        _html += '<span class="mr10">'+data.message+'</span>';
                        _html += '<span>满<b class="f36">'+data.aeMinMoney+'</b>元减<b class="f36">'+data.aeMoney+'</b>元</span>';
                        if(data.abFullcutSum){
                            _html += '，上不封顶';
                        }
                        break;
                    case 6:
                    	_html += '<p><span class="title t3">满件折</span>';
                        _html += '<span class="mr10">'+data.message+'</span>';
                        _html += '<span>满<b class="f36">'+data.aeMinMoney+'</b>件可享<b class="f36">'+data.aeMoney+'</b>折</span>';
                        break;
                    case 7:
                    	_html += '<p><span class="title t2">满件减</span>';
                        _html += '<span class="mr10">'+data.message+'</span>';
                        _html += '<span>满<b class="f36">'+data.aeMinMoney+'</b>件减<b class="f36">'+data.aeMoney+'</b>元</span>';
                        break;
                        
                    }
                    _html += '<a class="links" target="_blank" rel="nofollow" href="/factivity/'+data.fid+'">立即参加</a>';
                    _html += '</p>';
                }
                _html += '</div></dd></dl>';
                $(".J-basic .tm-price").after(_html);
                $("#manjian").click(function(){
                    if ($('.activity-box').hasClass('cur')) {
                        $('.activity-box').removeClass('cur');
                        switch( data.ab_type ) {
                        case 4:
                        	var _tmp = '<span class="title t1">满减</span><san class="mr10">'+data.message+'</san><span>满<b class="f36">'+data.aeMinMoney+'</b>元减<b class="f36">'+data.aeMoney+'</b>元（共'+iLen+'项）</span></span><i class="fr"></i>';
                            break;
                        case 6:
                        	var _tmp = '<span class="title t3">满件折</span><san class="mr10">'+data.message+'</san><span>满<b class="f36">'+data.aeMinMoney+'</b>件可享<b class="f36">'+data.aeMoney+'</b>折（共'+iLen+'项）</span></span><i class="fr"></i>';
                            break;
                        case 7:
                        	var _tmp = '<span class="title t2">满件减</span><san class="mr10">'+data.message+'</san><span>满<b class="f36">'+data.aeMinMoney+'</b>件减<b class="f36">'+data.aeMoney+'</b>元（共'+iLen+'项）</span></span><i class="fr"></i>';
                            break;
                        }
                        $("#manjian").html(_tmp);
                        
                    } else {
                        $('.activity-box').addClass('cur');
                        switch( data.ab_type ) {
                        case 4:
                        	var _tmp = '<span class="title t1">满减</span>共'+iLen+'项满减信息</span></span><a class="links" rel="nofollow" href="/factivity/'+data.fid+'" target="_blank">立即参加</a><i class="fr"></i>';
                            break;
                        case 6:
                        	var _tmp = '<span class="title t3">满件折</span>共'+iLen+'项满件折信息</span></span><a class="links" rel="nofollow" href="/factivity/'+data.fid+'" target="_blank">立即参加</a><i class="fr"></i>';
                            break;
                        case 7:
                        	var _tmp = '<span class="title t2">满件减</span>共'+iLen+'项满件减信息</span></span><a class="links" rel="nofollow" href="/factivity/'+data.fid+'" target="_blank">立即参加</a><i class="fr"></i>';
                            break;
                        }
                        $("#manjian").html(_tmp);
                    }
                });
            }
        }
    });
    
    $.ajax({
        type: 'GET',
        url: '/deal/getSimilarHotGoodsList',
        data: {
            "gid":"247260",
            "gcat_id":"596",
            "gcat_topid":"275",
            "limit":"5"
        },
        dataType: 'json',
        cache: true,
        success: function(res) {
            if ( res.code == 200 && res.data != 'null') {
                eval("(data="+res.data+")");
                var _html = '';
                var _tmp = '';
                var _len = data.length;
                if($('html.w1200').size()==0){
                    if(_len==5){
                        _len -= 1;
                    }
                
                }

                for ( var i = 0; i < _len; i++ ) {
                    if ( i == _len - 1 ) {
                        _tmp = '<li class="mr0">';
                    } else {
                        _tmp = '<li>';
                    }
                    _tmp += '<a href="'+data[i].targetUrl+'" target="_blank">';
                    _tmp += '<img class="hotgoods-lazy" src="/images/blank.png?ts=510b308f014610ca_1448011977" d-src="'+data[i].picUrl+'" />';
                    _tmp += '<div class="hot_price"><em class="hot_yang">￥</em><em class="hot_num">'+data[i].si_cprice+'</em></div>';
                    _tmp += '</a>';
                    _tmp += '</li>';
                    _html += _tmp;
                }
                $('#hot_goods_list').html(_html);
                $("img.hotgoods-lazy").lazyload({threshold:200,failure_limit:30});
            }
        }
    });
    
    var servertime = 1448085024;
    setInterval(function() {
        timestamp=1448416800-new Date(servertime);
        //计算出相差天数
        days=Math.floor(timestamp/(24*3600));
        //计算出小时数
        leave1=timestamp%(24*3600);    //计算天数后剩余的毫秒数
        hours=Math.floor(leave1/(3600));
        //计算相差分钟数
        leave2=leave1%(3600) ;       //计算小时数后剩余的毫秒数
        minutes=Math.floor(leave2/(60));
        //计算相差秒数
        leave3=leave2%(60);      //计算分钟数后剩余的毫秒数
        seconds=Math.round(leave3);
        days=days<0?0:days;
        hours=hours<0?0:hours;
        minutes=minutes<0?0:minutes;
        seconds=seconds<0?0:seconds;
        $("#d").html(days);
        $("#h").html(hours);
        $("#m").html(minutes);
        $("#s").html(seconds);
        servertime++;
    }, 1000);
    //控制滚动
    $(function() {
        $('.slide-box-tab li').bind('click', function(){
            var tagname = $(this).find('a').attr('_tagname');
            $('.info-title').each(function(){
                if( $(this).attr('_tagname') == tagname ){
                    var h =$(this).offset().top-120;
                    window.scrollTo(100,h);
                }
            });
        });
        $('.slide-box-main li').bind('click', function(){
            if ($(this).index()==1){
               var h =$('.buy-guidelines').offset().top-120; 
            };
            if($(this).index()==2){
               var h =$('.consumer-protection').offset().top-120;
            }
           if($(this).index()==0){
               return;
           }
           window.scrollTo(100,h);
       });
        
        //设置限购值
        $.ajax({
        	type: 'GET',
        	url: "/deal/getSkuLimit",
        	dataType: 'json',
        	cache: true,
        	success: function(ret) {
            	$("dl.number dd:first").attr("_sku_limit_buy", ret.num);
        	}
        });
    });
    //副图居中
    $('.deal-pic ul').css('width', $('.deal-pic ul li').length*65-5);
    function check_endtime()
    {
        var servertime = 1448085024;
        var end_time = 1448085024;
        if( servertime > end_time)
        {
            var info = '<div class="con-go"><p class="txt">很抱歉，满减活动已结束！</p></div>';
            var box = new XDLightBox({
                title:'提示',
                lightBoxId:'alert_sign',
                contentHtml:info,
                scroll:false
            });
            box.init();
        }
    }
   $("#show-qcode").hover(function(){
    $("#new-qcode").css('display','block');
   },function(){
    $("#new-qcode").css('display','none');
   })
    </script>
        <script type="text/javascript">
            var versionNumber="ts=08d33f1faffefc63_1452166318";
        </script>
        <!-- H5 -->
        <!--商品价格ajax获得-->
        <script src="<?php echo $url; ?>/js/shoppingcart_header.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $url; ?>/js/productajaxnew.js?t=20121023"></script> 
    </head>
    <body>
        <!-- 主体 -->
        
    
    <!-- 主体 -->
    
    <div class="main">
        <div class="app">
                        
                        <div id="item">
                <div class="item-good">
                    <a href="javascript:window.history.go(-1)" id="item-good-back">
                        <img src="<?php echo $url; ?>/m/images/icon/back-arrow.png">
                    </a>
                    <a href="<?php echo $url; ?>/m" id="item-good-home">
                        <img src="<?php echo $url; ?>/m/images/icon/back-home.png">
                    </a>

                    <div class="img_show">
                        <ul id="target" class="clear">
                                                            <li>
                                    <?php
    if ($img_sl0!=''){
        
    ?>
        <img src="<?php echo $url; ?>statics/uploads/<?php echo $img_sl0 ?>"  class="lazy no-change-scroll" />
    <?php
    }
    ?>
                                </li>
                                <?php if($img_sl1==''){ }else{?>
                                            <li>
                                <?php
    if ($img_sl1!=''){
        $img_sl1=substr($img_sl1,0,strrpos($img_sl1,'/')+1).'d'.substr($img_sl1,strrpos($img_sl1,'/')+1);
    ?>
        <img src="<?php echo $url; ?>/<?php echo $img_sl1; ?>"   class="lazy no-change-scroll" />
    <?php
    }
    ?>
                </li>
                <?php }?>
                <?php if($img_sl2==''){ }else{?>
                                            <li>
                                <img src="<?php echo $url; ?>/<?php echo $img_sl2; ?>"   class="lazy no-change-scroll" />
                </li>
                <?php }?>
                 <?php if($img_sl3==''){ }else{?>
                                            <li >
                                <img src="<?php echo $url; ?>/<?php echo $img_sl3; ?>"   class="lazy no-change-scroll" />
                </li>
                <?php }?>
                 <?php if($img_sl4==''){ }else{?>
                                            <li >
                                <img src="<?php echo $url; ?>/<?php echo $img_sl4; ?>"   class="lazy no-change-scroll" /> 
                </li>
                <?php }?>
                
                 <?php if($img_sl5==''){ }else{?>
                                            <li >
                                <img src="<?php echo $url; ?>/<?php echo $img_sl5; ?>"   class="lazy no-change-scroll" />
                </li>
                <?php }?>
                                                            
                                                    </ul>
                        <div class="icons" id="icons" style="display:none;">
                            <span class="curr">1</span>
                        </div>
                        <div class="item_botton">
                            <em>1</em>/<em>0</em>
                        </div>
                    </div>
                    <div class="normal-list sale fl">
                        <h1><?php echo $title;?></h1>

                        <div class="list-price buy fl">
                            <span class="price-new"><i>&yen;</i><?php echo $price2;?></span><i class="del f14 ml2">&yen;<?php echo $price1;?></i>
                        </div>
                        <div class="item_zhe fl">
                            <!--
                            <span class="sp1">1.5折</span>
                            <span class="sp2">包邮</span>
                            -->
                            <span class="sp3">包邮</span>
                        </div>
                         <!--<span class="star_time clear">购买可获得<em style="color:red"><?php echo ceil($price2*2);?></em>积分</span>
                       <span class="star_time clear" id="clock">
                                                            <img src="<?php echo $url; ?>/m/images/item/star_time.png"><span id="clock_span">剩余: 3天12小时51分24秒</span>
                                                    </span> -->
                    </div>
                    <!--<div class="collect fr" id="div_favorite" data-id="4920313">
                        <a ><em></em><span>收藏</span></a>
                    </div> -->
                                        <label class="activity_info_place_holder" style="display: none;"></label>
                    <!-- 活动信息 insert into here -->
                </div>
                
                  
                <div class="type-list">
                    <div class="box clear">
                    
                        <div class="normal type-box">
                            

                            <div class="type clear"><div class="deal-wrap clear">
        
        <div class="sector-info">
<label>商品规格</label>
            <div class="J-other">
                
                <dl class="color clear"><dd><ul>
                  <?php $title_ex = explode(" ",$cart_title);$num_ex = explode(" ",$cart_num);  $title_count = count($title_ex)-1; for($i=0;$i<=$title_count;$i++){?>
    <li class="attr_pic <?php if($i==0)echo "cur";?>" data-c="<?php echo $num_ex[$i];?>"><a href="javascript:void(0)" title="<?php echo $title_ex[$i];?>"> &nbsp;<?php echo $title_ex[$i];?>&nbsp; </a></li>
    
	<?php }?>
                
                
                
                </ul></dd></dl>
                <label>数量</label>
<dl class="number clear">
                    
                    <dd _limit="0" _realbuy="" _sku_limit_buy="5">
                        <p>
                        
                            <i class="decrease">-</i>
                            <input type="text" name="amount" id="amount" value="1" autocomplete="off" />
                            <i class="increase">+</i> 
                        </p>
                        <p class="skulimitbuy" style="display:none;">&nbsp;&nbsp;限购<em class="red">5</em>件</p>
                        <div id="stockconfig" data-enough="50" data-less="20" data-stock="13620" style="display:none;"></div>
                    </dd>
                </dl>
        </div>
    </div>
</div></div>
                        </div>
                        
                    </div>
                </div>
                
                
                
                <div class="feature-box">
                    <a href="javascript:;">
                        <img src="<?php echo $url; ?>/m/images/icon/shield.png">
                        <span>100%人工质检</span>
                                                    <!--<img src="<?php echo $url; ?>/m/images/icon/seven.png">
                            <span>7天无理由退货</span> -->
                                                    <em class="arrow"></em>
                    </a>
                </div>
                                <div class="item-feature-box">
                    <h3>商品参数</h3>

                    <div class="com-list">
                                                    <ul>
                                <!-- 规格参数 -->
                                                                    <li >
                                        <div class="shop_info clear">
                                            <span>发货地</span>
                                            <strong><?php if($fhd==''){echo "广东省 广州市";}else{ echo $fhd;} ?></strong>
                                        </div>
                                    </li>
                                                                    <li >
                                        <div class="shop_info clear">
                                            <span>默认物流</span>
                                            <strong><?php if($ems==''){echo "按地址来选物流";}else{ echo $ems; }?></strong>
                                        </div>
                                    </li>
                                                                    <li >
                                        <div class="shop_info clear">
                                            <span>运费说明</span>
                                            <strong>全国包邮（偏远地区除外）</strong>
                                        </div>
                                    </li>
                                                                   <!-- <li class="highlight">
                                        <div class="shop_info clear">
                                            <span>退货补贴</span>
                                            <strong></strong>
                                        </div>
                                    </li> -->
                                                            </ul>
                                            </div>
                </div>
                 <header class="g-header">
                 </header>
                 <div id="divGoodsDesc" class="detailContent z-minheight" style="">
                <div class="item-detail-box">
                    <h3>图文详情</h3>

                    <p><?php echo $z_body;?></p>
                </div></div>
               <!-- <div class="feature-box">
                    <a href="/help/shopAdvice?pid=157">
                        <b>购买咨询</b>
                        <em class="arrow"></em>
                    </a>
                </div> -->
            </div>
           

            <div  id="back_top"  class="slide-box" style="display:none">
    <a href="javascript:;" class="back-top" ><img src="<?php echo $url; ?>/m/images/icon/back-top.png"></a>
</div>


            
                        <div class="buy_btn clear">
                <div class="buy_cart">
                                            <a href="javascript:;" class="go_tmall fr" onclick="appaddGroups(<?php echo $id;?>,'<?php echo $price2;?>','<?php echo $img_sl0;?>','<?php echo $title;?>','<?php echo $price1;?>')">加入购物袋</a>
                                        <a href="<?php echo $url; ?>/m/cart" class="app_load normal fl" sku_num="" etime="" stock_less="20" class="app_load">
                        <div class="box-button">
                            <span class="icon"><img src="<?php echo $url; ?>/m/images/item/bag-icon.png">
                           <?php if($cart->sums()!=''){?> <em><?php echo $cart->sums()?></em><?php }?>
                            </span>
                            <span class="txt">购物袋</span>
                        </div>
                        <div class="box-tips" style="display: none;">
                            <p>商品已加入购物袋</p>
                            <span href="<?php echo $url; ?>/m/cart">立即结算</span>
                            <em>◆</em>
                        </div>
                    </a>
                </div>
            </div>
                        <?php require_once('../bottom.php');?>




            <div class="alert_fullbg" style="display: none; z-index: 201;"></div>
            <div style="display:none;" class="temai_tips">
                <div class="temai_box">
                    <p class="txt" id="qiang">该商品参与的折扣活动已过期</p>

                    <div class="temai_btn">
                        <a href="javascript:;">确定</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /主体 -->

        <!-- 业务js -->
        
    
    

       <script type="text/javascript"> 
           seajs.config({	base:'http://s.juancdn.com/jpwebapp_v1/',
	

	debug:true
});

function use(pageName){
	var basePath=seajs.data.base,
		mode="build";
   	if(location.search.indexOf('debug=true')>-1){
        mode='src';
   	}

	//mode='src';

   seajs.use('js/'+mode+'/'+pageName);
  
}
        var m=402007-1;
        
        var si_id = '4347363';
        var goods_id='4347363';
        var appInfo={
            appOpenSrc:"",
            appName:'',
            juan_iphurl:'',
            juan_andurl:'',
            jiu_iphurl:'',
            jiu_andurl:''
        }
		var terminalFlag = 1;

       use('shop_detail');
    </script>
        <!-- 微信分享配置 -->
        
        <!-- 统计js -->
        
    


    </body>
</html>