$(document).ready(function(){
var F_slide_goods = function(){
    var _size=$("#slide-goods li").size();
    if(_size<=3) {$("#slide-goods .lleft,#slide-goods .lright").css("display","none")}
    if(_size==0){$(".old_record").css("display","none")}
    var i = 0,max =Math.ceil(_size/3)-1;
	//初始化
    $("#slide-goods .lleft").addClass("no");
    var playshow=function(){
       $(".adlunbo ul").animate({marginLeft: (-i*$(".adlunbo").width())+'px'}, 500);
       $('.adlunbo ul li img.lazy').lazyload({threshold:1000,failure_limit:30});
       if(i>=(Math.ceil($("#slide-goods li").size()/3)-1)){$("#slide-goods .lright").addClass("no");}
       if(i<=0){$("#slide-goods .lleft").addClass("no");}
    }
    var next = function(){
      if(i>=(Math.ceil($("#slide-goods li").size()/3)-1)){return;}
      else{$("#slide-goods .lright").removeClass("no");$("#slide-goods .lleft").removeClass("no");i=i+1}
      playshow()
    }
    var prev = function(){
      if(i<=0){return;}
      else{$("#slide-goods .lright").removeClass("no");$("#slide-goods .lleft").removeClass("no");i=i-1}
      playshow()
    }
    $("#slide-goods .lleft").on('click', _.throttle(function(event){
      prev()
    },600) );
    $("#slide-goods .lright").on('click', _.throttle(function(event) {
      next();
    },600) );
}
F_slide_goods();

var F_goods_del=function(){
    $("#slide-goods").on("click",'#slide-goods li .del',function(){
		if ( $(this).hasClass("no") ) return false; //样式置灰的时候不可点击
		var _that = $(this);
		$.ajax({
			type: 'GET',
			url: __URL_CART__+'/index/delHistoryGoods',
			data: {'skuid': $(_that).parents('li').data('skuid')},
			success: function(data) {
				if ( data.errorCode == 200 ) {
					$(_that).parent().hide("slow", function() {
						$(this).remove();
						var _size=$("#slide-goods li").size();
				        if(_size<=3) {$("#slide-goods .lleft,#slide-goods .lright").css("display","none")}
				        if(_size==0){$(".old_record").css("display","none")}
						if(parseInt($("#slide-goods ul").css('marginLeft')) < $(".adlunbo").width()*(-1)*(Math.ceil($("#slide-goods li").size()/3)-1)){
							$("#slide-goods .lleft").click();
						}
					});
				} else {
				}
			}
		});
		return false;
    });
    $("#slide-goods .jion a").on('click',function(){//重新加入购物袋
		//对于已抢光或下架的商品不做处理
		if ( $(this).hasClass("no") ) return false; 
		if ( $(this).parents("li").data("lock") == "" ) return false;  //有锁,退出
		$(this).parents("li").data("lock") == ""; //加锁
		$(this).addClass("no");//样式置灰 - 重新加入
		$("#slide-goods li .del").addClass("no");//样式置灰 - 删除按钮
		
		var _that = $(this);
		var _sbtimer = null;
		$(_that).parents("li").find(".success-box").unbind('click');
		$(_that).parents("li").find(".success-box").bind('click', function() {
			clearTimeout(_sbtimer);
			window.location.href=__URL_CART__;
		});
		$.ajax({
			type: 'GET',
			url: __URL_CART__+'/index/reAddToCart',
			data: {'skuid': $(_that).parents('li').data('skuid')},
			success: function(data) {
				$(_that).parents("li").data("lock","123456");//解锁
				if ( data.errorCode == 200 ) {
                    var cartDataString  = XDTOOL.getCookie('shareCartData');
                    var cartData = JSON.parse(cartDataString);
                    var num = cartData.shareCartNum + 1;
                    var shareCartData = {'shareCartNum':num,'residualTime':1200};
                    setCartNum('shareCartData',shareCartData);  //重置数量和过期时间
					$(_that).parents("li").find(".success-box").css("display","block");
					_sbtimer = setTimeout(function() {
						$(_that).parents("li").find(".success-box").css("display","none");
						window.location.href=__URL_CART__;
					}, 1500);
				} else if ( data.errorCode == 1002 ) {
					$(_that).siblings(".t_box").children("span").html("购物袋已满，请先去结算");
					showPopup($(_that).siblings(".t_box"), 1500);
				} else if ( data.errorCode == 1004 ||  data.errorCode == 1022 ) { //超出限购
					//弹出提示框
					$(_that).siblings(".t_box").children("span").html("限购"+data.errorMsg.limitnum+"件");
					showPopup($(_that).siblings(".t_box"), 1500);
				} else if ( data.errorCode == 1025 ) { //超出限购
					$(_that).siblings(".t_box").children("span").html('已达购买上限');
					showPopup($(_that).siblings(".t_box"), 1500);
				} else if ( data.errorCode == 1005 ) { //超出库存
					//弹出提示框
					$(_that).siblings(".t_box").children("span").html("库存不足");
					showPopup($(_that).siblings(".t_box"), 1500);
				} else {
					//弹出提示框
					$(_that).siblings(".t_box").children("span").html("加入失败");
					showPopup($(_that).siblings(".t_box"), 1500);
				}
			},
			error: function(errMsg) {
				$(_that).parents("li").data("lock","123456");//解锁
				$(_that).removeClass("no");
			}
		});
		return false;
    });
}
/* 弹出层方法 */
function showPopup(pobj, time) {
	$("#slide-goods .jion a").removeClass("no");
	$("#slide-goods li .del").removeClass("no");
	$(pobj).show("fast");
	setTimeout(function() {
		$(pobj).hide("fast");
	}, time);
}
F_goods_del();


/*优惠券按钮,*/
var show_fun=function(){
    $("#activate-code").on('keyup',function(){
        if($("#activate-code").val()!=""){
           $(".activate-button").removeClass("no");
        }
        else {
            $(".activate-button").addClass("no");
        }
    })
}
show_fun();

/* 选中优惠券js */
$('#cash-voucher').on("click",'.coupon_ul .use-link', function() {
    if($(this).hasClass('user')) {//取消使用
        $(this).removeClass('user');
        $(this).html('使用');
        $('.cv-box').slideUp();
        $('.orders-trigger-btn .txt ').html('使用优惠券');
        $(' input[name=couponcode]').val('');
        XDTOOL.setCookie("couponcode", '',3600);   //设置优惠券code
        $('#cashTotal').text(parseFloat(0).toFixed(2));
        chageTotalNumAndPrice();  //更新购物袋、以及总价
    } else {
        $('#cash-voucher .coupon_ul .use-link').removeClass('user');
        $('#cash-voucher .coupon_ul .use-link').html('使用');
        $(this).addClass('user');
        $(this).html('取消');
        $('.cv-box').slideUp();
        $(this).removeClass('cur');
        $('.orders-trigger-btn .txt ').html('优惠券'+$(this).attr("data-money")+'元');
        $(' input[name=couponcode]').val($(this).attr("data-code"));
        XDTOOL.setCookie("couponcode", $(this).attr("data-code"),3600);   //设置优惠券code
        var cashTotal = $(this).attr("data-money");
        $('#cashTotal').text(parseFloat(cashTotal).toFixed(2));
        chageTotalNumAndPrice();  //更新购物袋、以及总价
    }
});
/* 点击增加减按钮联动改变商品总价格、数量 */
function chageTotalNumAndPrice(flag) {
    //$(' input[name=couponcode]').val('');
    var fTotalPrice = $('input[name=totelPrice]').val();
    var cashTotal = $('#cashTotal').text();
    var reduceTotal = $('#reduceTotal').text();
    var iTotalNum = $('#totalNum').text();

    //更新mini购物袋的样式
    $('#toolbar .bag-show .bag-a em.cartnum').text(iTotalNum);

    if(iTotalNum==0){
        $('.cartnum').css("background","#ccc");
    }else{
        $('.cartnum').css("background","#f36");
    }

    // 更新总金额
    var toPrice = fTotalPrice -cashTotal -reduceTotal;
    $('#totalPrice').text( parseFloat(toPrice).toFixed(2));
}
/*获取购物袋列表数据*/

var sendAjax =function(callback){
    if($('.orders-total-pay .go_pay ').hasClass('ing')){
        return false;
    }
    $('.orders-total-pay .go_pay ').addClass('ing');
    //$('.orders-total-pay .go_pay ').html('<img src="http://s.juancdn.com/juanpi/images/items/ing-icon.gif">正在处理中...'); //去掉加载中效果
    var sCouponCode = $('input[name=couponcode]').val();
    XDTOOL.setCookie("couponcode", '',3600);    //清空优惠券数据
    $(' input[name=couponcode]').val();   //清空优惠券数据
    $('input[name=actIds]').val();  //清空活动数据
    $.ajax({
        type: 'POST',
        data: {"coupon":sCouponCode},
        url: __URL_CART__+'/index/ajaxGetCartInfo',
        success: function(data) {
            if(data.errorCode == 200){
                if(data.errorMsg.cartString == ''){
                    var shareCartData = {'shareCartNum':0,'residualTime':3600};
                    setCartNum('shareCartData',shareCartData);
					$('.cartnum').text('0').css("background","#ccc");
                    var empty = '<div class="orders order_empty">'+
                                    ' <div class="empty_img fl"></div>'+
                                    ' <div class="empty_detail fr">'+
                                        '<p class="txt">购物袋还是空荡荡哒~快去抢购宝贝吧！</p>'+
                                        '<p class="btn_all"><a class="btn_normal btn_normal_01" href="http://www.juanpi.com">去抢购</a></p>'+
                                    '</div>'+
                                '</div>';
                    $('.orders'). replaceWith(empty);
                    $('.time_tips').remove();
                }else{
                    //更新优惠券
                    $('.couponList').html(data.errorMsg.copString);
                    $('#totalNum').text(data.errorMsg.cartArr.cartInfo.goodsNum);
                    $('#reduceTotal').text(data.errorMsg.cartArr.cartInfo.reduceTotal);
                    $('input[name=totelPrice]').val(data.errorMsg.cartArr.cartInfo.totalPrice);
                    $('input[name=actIds]').val(data.errorMsg.cartArr.cartInfo.actIds);
                    $('#cashTotal').text(data.errorMsg.cartArr.cartInfo.cashTotal);
                    //$('input[name=cashTotal]').val(data.errorMsg.cartArr.cartInfo.cashTotal);
                    //更新订单列表
                    $('.order-list').html(data.errorMsg.cartString);   //更新列表
                    //app购物券
                    if(data["errorMsg"]["cartArr"]["appCouponList"]){
                        showAppCouponList(data["errorMsg"]["cartArr"]);
                    };
                    chageTotalNumAndPrice();
                    $('.orders-trigger-btn .txt ').html("使用优惠券");  //更新优惠券列表

                    if( data.errorMsg.hasCoup !='undefined' &&  data.errorMsg.hasCoup >= 0){
                        var num = data.errorMsg.hasCoup;
                        $('#cash-voucher .coupon_ul .use-link').eq(num).click();
                    }else if(typeof(data.errorMsg.cartArr.cartInfo.isSelecCop) != "undefined"  && data.errorMsg.cartArr.cartInfo.isSelecCop == 1){
                        $('#cash-voucher .coupon_ul .use-link').eq(0).click();
                    }
                    var shareCartData = {'shareCartNum':data.errorMsg.cartArr.cartInfo.goodsNum,'residualTime':data.errorMsg.cartArr.cartInfo.residualTime};
                    setCartNum('shareCartData',shareCartData);
                }
            }
        },complete:function(data) {
            $('.orders-total-pay .go_pay').removeClass('ing');
            $('.orders-total-pay .go_pay').html('去结算');
            if (Object.prototype.toString.call(callback) === '[object Function]') {
                callback();
            }
        }
    });
}
//sendAjax();
//app优惠券展示
var showAppCouponList=function(cartArr){
    var htmls="";
    var aeHtmls="";
    //初始化
    $(".appCouponList ul").html("");
    $(".app-cash-voucher").hide();
    $(".orders-trigger p").remove();
    //满足显示
    if(cartArr["appCouponList"]&&cartArr["appCouponList"].length>0&&cartArr["viewAppCoupon"]["toast"]){
        for(var i=0;i<cartArr["appCouponList"].length;i++){
            var rdslt='满'+parseInt(cartArr["appCouponList"][i]['ae_min_money'])+'元减'+parseInt(cartArr["appCouponList"][i]['ae_money'])+'元';
            var start_time=UnixToDate(cartArr["appCouponList"][i]["start_time"]);
            var end_time=UnixToDate(cartArr["appCouponList"][i]['end_time']);
            htmls+=' <li class="un-use">';
            htmls+='    <div class="rdslt">'+rdslt+'</div>';
            htmls+='    <div class="cv-adv">'+cartArr["appCouponList"][i]['ap_belone_name']+'</div>';
            htmls+='    <div class="cv-time">'+start_time+' &mdash;'+end_time+'</div>';
            htmls+=' <div class="cv-status"><a href="javascript:;" class="ui-app-code"><span class="use-link use-app">去APP使用</span>';
            htmls+='<div class="app-code">';
            htmls+='<img src="http://s.juancdn.com/juanpi/images/shopping/code.jpg">';
            htmls+='<p>扫码使用优惠券</p>';
            htmls+=' </div>';
            htmls+='</a>';
            htmls+='</div>';
            htmls+='</li>';
            rdslt=null;
        };
        aeHtmls='<p class="fl ticket-tips" id="ticket-own">（你有<span class="ae_money">'+parseInt(cartArr["appCouponList"][0]['ae_money'])+'</span>元APP专享券）</p>';
        $(".app-cash-voucher").show();
            $("#alert_bg_ticket p span").html(parseInt(cartArr["appCouponList"][0]['ae_money']));
            $('.orders-total-pay .go_pay').attr('appCouponList',cartArr["viewAppCoupon"]["toast"]);
    }else{
        $('.orders-total-pay .go_pay').removeAttr("appCouponList");
    };

    $(".appCouponList ul").html(htmls);
    $(".orders-trigger a").after(aeHtmls)
};
/*购物车商品列表删除*/
var F_bag_goods=function(){
    $(".orders").on('click','.actions-item .del',function(){
        $(this).parents(".actions-item").find(".confirm_box ").css("display","block");
        $(this).parents(".actions-item").find(".btn_01").on('click',function(){
            var _that = $(this);
            var ozf = $(_that).parents('td').siblings('td.product-item');
            $.ajax({
                type: 'GET',
                url: __URL_CART__+'/index/deleteCartGoods',
                data: {'skuid': ozf.eq(0).data('skuid')},
                success: function(data) {
                    if ( data.errorCode == 200 ) {
                        var oShopDiv = $(_that).parents(".orders-bd");
                        var oShopTbody = $(_that).parents("tbody");
                        $(_that).parents(".confirm_box").css("display","none");
                        var leng = $(_that).parents(".tbl-main").find('tr').length;
                        if(leng == 1 ){  //如果只有一个tr  就把整个活动div去掉
                            var obj = $(_that).parents(".orders-bd");
                        }else{
                            var obj = $(_that).parents("tr");
                        }
                        obj.hide("slow", function() {
                            $(this).remove();
                        });
                        sendAjax(function () {
                            window.location.reload();
                        }); // 更新数据
                    } else {
                    }
                }
            });

            //特卖购物车删除数据埋点
            _paq.push(['trackEvent', 'temai', 'click_del_goods', 'skuid', ozf.eq(0).data('skuid')]);
        })
        $(this).parents(".actions-item").find(".btn_02").on('click',function(){
            $(this).parents(".confirm_box ").css("display","none");
        })
    })

}
F_bag_goods();
/* 点击增加减按钮联动改变单件商品价格、数量 */
function linkageChange(_that, flag) {
    if (_that.hasClass('ajaxing')) {
        return;
    }
	if ( flag == 3 ) {
        oGoodsNum = _that;
		var iOldNum = $(_that).parents('.num').data("ioldnum");
	} else {
        var oGoodsNum = $(_that).siblings('input[name=amount]');
		var iOldNum = parseInt(oGoodsNum.val());
	}
	if ( !iOldNum || iOldNum <= 0 ) iOldNum = 1;
	var iGoodsNum = parseInt(oGoodsNum.val());

    if ( flag == 1 && iGoodsNum >= 2 ) { //减
		iGoodsNum = iGoodsNum - 1;
       // $(_that).siblings('input[name=amount]').val(iGoodsNum);
	}else	if ( flag == 2 ) { //增
		iGoodsNum = iGoodsNum + 1;
      //  $(_that).siblings('input[name=amount]').val(iGoodsNum);
	}
	if ( !iGoodsNum || iGoodsNum <= 0 ) {//异常
		iGoodsNum = 1;
	}
    if (  iOldNum == iGoodsNum )
        return false;   //修改前后的数量一致,不发送请求
	var ozf = $(_that).parents('td').siblings('td.product-item');
	$.ajax({
		type: 'POST',
		url: __URL_CART__+'/shop/changeGoodsNum.php',
		data: {'num': iGoodsNum, 'skuid': ozf.eq(0).data('skuid')},
		success: function(data) {
			$(_that).parents(".normal").removeClass("cur");
			//$(_that).parent().data("lock", "123456"); //解锁
			if ( flag == 3 ) {
				$(_that).parents('td').find('i.decrease').removeClass('no');
				$(_that).parents('td').find('i.increase').removeClass('no');
			}
			//oGoodsNum.val(iOldNum);
			$(_that).parents('td').find('.tips').css('display', 'none');
			if ( data.errorCode == 200 ) {
               // oGoodsNum.val(iGoodsNum);
			} else if ( data.errorCode == 1010 ) { //商品数量没有发生变化
				if ( flag == 1 && iGoodsNum == 1 ) {
					$(_that).addClass('no');
				}
			} else if ( data.errorCode == 1004 || data.errorCode == 1022 ) { //超出限购
				$(_that).parents(".normal").addClass("cur");
				$(_that).parents('td').find('.tips').html('限购'+data.errorMsg.limitnum+'件');
				$(_that).parents('td').find('.tips').css('display', 'block');
				if ( flag == 2 ) {
					$(_that).addClass('no');
				}
			} else if ( data.errorCode == 1005 ) { //超出库存
				$(_that).parents(".normal").addClass("cur");
				$(_that).parents('td').find('.tips').html('库存不足');
				$(_that).parents('td').find('.tips').css('display', 'block');
				if ( flag == 2 ) {
					$(_that).addClass('no');
				}
			} else if ( data.errorCode == 1025 ) {
				$(_that).parents(".normal").addClass("cur");
				$(_that).parents('td').find('.tips').html('已达购买上限');
				$(_that).parents('td').find('.tips').css('display', 'block');
				if ( flag == 2 ) {
					$(_that).addClass('no');
				}
			} else {
				$(_that).parents(".normal").addClass("cur");
				$(_that).parents('td').find('.tips').html(data.errorMsg.msg);
				$(_that).parents('td').find('.tips').css('display', 'block');
			}
		},
		complete: function(errorMsg) {
            sendAjax(function () {
                _that.closest('.normal').find('.ct-loading').hide();
                _that.siblings('i').andSelf().removeClass('ajaxing');
            });
			//$(_that).parent().data("lock", "123456"); //解锁
            
		},
        beforeSend: function() {
            _that.closest('.normal').find('.ct-loading').show();
            _that.siblings('i').andSelf().addClass('ajaxing');
        }

	});

}

//弹窗提示信息
function alertMsg($content){

    if($content==undefined){
        return;
    }
    var box = new XDLightBox({
        lightBoxId:'alert_coupon',
        contentHtml:$content,
        scroll:true,
        isBgClickClose:false
    });
    box.init();
    $(' .btn-close , .alert_close ,.btn-view-close').click(function(){
        box.close();
        $('input[name=activate-code]').val('');
        $('.activate-button').addClass('no');
    });
}

/* 激活优惠券 */
function activeCoupon(sCouponCode, goodsMoney) {
    var re = /^[A-Za-z0-9]+$/;
    if(!re.test(sCouponCode)){
        var content='<div class="cv-pop st-failed"><span>激活不成功</span><p>抱歉，您输入的激活码格式有误，请重新输入</p><div class="btn-close">关闭</div></div>';
        alertMsg(content);
    }else{
        $.ajax({
            type: 'GET',
            url: __URL_MEMBER__+'/cart/addCart.php',
            data: {"code":sCouponCode, 'flag': 'p'},
            dataType: 'jsonp',
            success: function(data) {
                if (data.code == 2) {
                    sendAjax();  //重新计算金额
                    var st_class = "st-success";
                    var btn_div = '<div class="btn-view btn-view-close"><a href="javascript:;">关闭</a></div>';
                }else if (data.code == 3) {
                    var st_class = "st-timeout";
                    var btn_div = '<div class="btn-view btn-view-close"><a href="javascript:;">关闭</a></div>';
                }else if (data.code == 101) {
                    var st_class = "st-failed";
                    var btn_div = '<div class="btn-view"><a href="'+__URL_MEMBER__+'/setting/base">去完善</a></div>';
                    window.location.href = ""+__URL_MEMBER__+"/setting/base";
                }else{
                    var st_class = "st-failed";
                    var btn_div = '<div class="btn-close">关闭</div>';
                }
                var content = '<div class="cv-pop '+st_class+'"><span>'+data.title+'</span><p>'+data.msg+'</p>'+btn_div+'</div>';
                alertMsg(content);
            },
            error: function (args) {
                var content='<div class="cv-pop st-failed"><span>激活失败</span><p>激活失败</p><div class="btn-close">关闭</div></div>';
                alertMsg(content);
            }
        });
    }

}

/* 移除下架商品 */
function removeOfShelves() {
	var skuid = '';
	$('#shelves_alert .alert_content ul.list li').each(function() {
		skuid += skuid == '' ? $(this).data('skuid') : '_'+$(this).data('skuid');
	});
	$.ajax({
		type: 'GET',
		url: __URL_CART__+'/index/removeOfShelves',
		data: {'skuid': skuid},
		success: function(data) {
			if ( data.errorCode == 200 ) {
				closeShelvesBox();
			}
		}
	});
}
/* 关闭下架弹窗 */
function closeShelvesBox() {
	location.reload();
}

/* 优惠券使用情况检测 */
function checkCouponStatus() {
	//计算页面目前商品的总量及金额
	var fTotalPrice = 0;
	var iTotalNum = 0;
	$('.orders-bd .tbl-main tr').each(function() {
		var _num = parseInt($(this).find('td.quantity-item p.num input[name=amount]').val());
		var _price = Number(parseFloat($(this).find('td.price-item p.price label').eq(0).text()).toFixed(2))*100;
		iTotalNum += _num;
		fTotalPrice += _price*_num;
	});
	
	//计算优惠券的使用是否满足条件
	var fUseCouponMoney = 0;
	var idx = null;
	$('.coupon_ul li').each(function() {
		if ( $(this).hasClass('slt') ) {
			fUseCouponMoney = Number(parseFloat($(this).data('money')).toFixed(2))*100;
			idx = $(this).index();
			//设置优惠券使用码
			$('.orders-total-pay input[name=couponcode]').val($(this).find('input[name=coupon_code]').val());
		}
	});
	if ( idx ) {
		var fMoneyUseCondition = Number(parseFloat($('.coupon_ul li').eq(idx).data('moneycanuse')).toFixed(2))*100;
		if ( fMoneyUseCondition > fTotalPrice ) {
			$('.coupon_ul li').eq(idx).find("input[name='cv']").removeAttr("checked");
			$('.coupon_ul li').eq(idx).removeClass('slt');
			fUseCouponMoney = 0;
		}
		
		if ( fUseCouponMoney == 0 ) {
			$('.orders-total-pay input[name=couponcode]').val(''); //清空优惠券代码
		}
	}
}
    //页面初始化,清空优惠券使用cookie
    XDTOOL.setCookie("couponcode", '',3600);
    //如果优惠券默认选中
    if($('#cash-voucher').attr('data-select') == 1){
        $('.cash-voucher .coupon_ul .use-link').eq(0).click();
    }
    $(".orders-trigger .orders-trigger-btn").click(function() {
        if ( $('.cv-box').css('display') == 'none' ) {
            $('.cv-box').slideDown();
            $(this).addClass('cur');
        } else {
            $('.cv-box').slideUp();
            $(this).removeClass('cur');
            return false;
        }
    });

    $('.order-list').on('click','.orders-bd .tbl-main p.num i.decrease',function(){
        linkageChange($(this), 1);
    });
    $('.order-list').on('click','.orders-bd .tbl-main p.num i.increase',function(){
        linkageChange($(this), 2);
    });
    $('.order-list').on('blur','.tbl-main p.num input[name=amount]', function() {
        //检测数据是否合法
        var partten = /^[1-9][0-9]{0,}$/;
        var $this = $(this);
        if ( !partten.exec($this.val()) ) {
            $this.val($this.parents('.num').data("ioldnum"));
            return false;
        }
        linkageChange($this, 3);
    });


    //去结算
    $('.orders-total-pay a.go_pay').on("click", function() {
        if($('.orders-total-pay .go_pay ').hasClass('ing')){
            return false;  //正在返回数据中
        }
        var _taht = $(this);
        if ( $(_taht).hasClass("no") ) return false;
        //$(_taht).addClass("no");//结算按钮增加置灰样式

        $.ajax({
            type: 'POST',
            url:__URL_CART__+ '/cart/addCart.php',
            data: {'actIds':$('input[name=actIds]').val(),'couponcode':$('input[name=couponcode]').val()},
            success: function(data) {
                var reloadFunc = function(){
                    location.reload();
                }
                if ( data.errorCode == 2003 ) {  //有部分活动下架，2s后刷新页面
                    $('.orders-total-pay .go_pay').addClass('no');
                    $('.orders-total-pay .go_pay').append('<span class="t_box open" style="display:block;"><span>抱歉，部分折扣活动已结束。请重新确认订单信息再去结算哦~</span><em></em></span>');
                    setTimeout(reloadFunc,2000);
                }if ( data.errorCode == 2004 ) {  //有优惠券过期，2s后刷新页面
                    $('.orders-total-pay .go_pay').addClass('no');
                    $('.orders-total-pay .go_pay').append('<span class="t_box open" style="display:block;"><span>抱歉，你所使用的优惠券已过期，请重新选择</span><em></em></span>');
                    setTimeout(reloadFunc,2000);
                }else  if ( data.errorCode == 2001 || data.errorCode == 2002 ) {
                    $('#shelves_alert .alert_content ul.list').html(data.errorMsg);
                    var _html = $("#shelves_alert .alert_content").html();
                    var box = new XDLightBox({
                        lightBoxId:'shelves_alert',
                        contentHtml:_html,
                        scroll:true,
                        isBgClickClose:false
                    });
                    box.init();
                    $('.alert_close').click(function(){
                        box.close();
                        closeShelvesBox();
                    });
                    $('#shelves_alert .btn_all .button_02').on('click', function() {
                        removeOfShelves();
                    });
                } else if ( data.errorCode == 2000 ) {
                    //针对优惠券的使用情况，做一个校对，防止在商品数量的频繁变化中导致优惠券异常
                    //checkCouponStatus();
                    if ( $(_taht).attr("appCouponList")  ){ //如果有app优惠券没用的情况下
                        var _html = $("#alert_bg_ticket .alert_content").html();
                        var box = new XDLightBox({
                            title:'',
                            lightBoxId:'alert_bg_ticket',
                            contentHtml:_html,
                            scroll:true,
                            isBgClickClose:false
                        });
                        box.init();
                        $('.btn-buy').on('click',function(){
                            $("#cartConfirmForm").submit();
                        })
                    }else{
                        $("#cartConfirmForm").submit();
                    }

                } else if ( data.errorCode == 3000 ) {
                    window.location.href = __URL_MEMBER__+"/Register/mdAutoRegister";
                }
            }
        });
        //特卖去付款数据埋点
        var skuids = '';
        $(".sku-item").each(function(){
            var skuid = $(this).data("skuid");
            skuids += skuid+',';
        });
        skuids = skuids.substring(0,skuids.length-1);
        _paq.push(['trackEvent', 'temai', 'click_buy_goods', 'skuid_list', skuids]);
    });
    //激活优惠券
    $('.cv-box .activate-button').on('click', function() {
        var sCouponCode = $.trim($('.cv-box input[name=activate-code]').val());
        if($(this).hasClass('no') || sCouponCode == '') return false;

        var goods_money = $(".orders-total-pay p.all label").text();
        activeCoupon(sCouponCode, goods_money);
    });

    //马上登录
    $('#loginnow').click(function(){
        XD.user_handsome_login_init();
        XD.user_handsome_login();
        return false;
    });


    var Funfixed=function(){
        if($(".orders-total-pay").size() >0){
            var scr = $(window).scrollTop();
            var start = $(".orders-pay-fixed").height()+$(".orders-pay-fixed").offset().top-$(window).height();
            //初始化
            if(scr >= start){
                $(".orders-total-pay").removeClass("fixed");
            }else{
                $(".orders-total-pay").addClass("fixed");
            }
            $(window).scroll( function() {
                var scr = $(window).scrollTop();
                if(scr >= start){
                    $(".orders-total-pay").removeClass("fixed");
                }
                else{
                    $(".orders-total-pay").addClass("fixed");
                }
            });
        }
    }
    if(($(".orders-pay-fixed").length  > 0 ) && ($(".orders-pay-fixed").offset().top>$(window).height())){
        Funfixed();
    }

})
