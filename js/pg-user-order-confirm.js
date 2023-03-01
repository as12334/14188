

$(function(){
	
	var base_url = __URL_MEMBER__+'/address/update';
            var ehtml = '';

            function checkUserName() {
                var value = $("#truename").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".s13-name").html(ehtml + "收货人不能为空哦~").show();
					$(".s12").hide();
					
                    return false;
                }
                $(".s13-name").hide();
                return true;
            }
            function checkMobile() {
                var value = $("#mobile").val();
				var pregMobile = /^1[3,4,5,8]\d{9}$/;  //读取php配置的正则
                if (value == '' || value.length == 0) {
                    $(".s13-mob").html(ehtml + "手机不能为空哦~").show();
					
                    return false;
                } else if (!pregMobile.test(value)) {
                    $(".s13-mob").html(ehtml + "手机格式不对~").show();
					
                } else {
                    $(".s13-mob").hide();
                }
                return true;
            }
            function checkProvince() {
                var value = $("#province").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".s13-ppp").html("省份不能为空哦~").show();
					
                }
                $(".s13-ppp").hide();
                return true;
            }
			function checkCity() {
                var value = $("#city").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".s13-ppp").html("城市不能为空哦~").show();
					
                }
                $(".s13-ppp").hide();
                return true;
            }
			function checkAown() {
                var value = $("#town").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".s13-ppp").html("区县不能为空哦~").show();
					
                }
                $(".s13-ppp").hide();
                return true;
            }
			function checkAddr() {
                var value = $("#addr").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".s13-addr").html("详细地址不能为空哦~").show();
					
                    return false;
                }
                $(".s13-addr").hide();
                return true;
            }
            function len(value) {
                var total = 0;
                for (i = 0; i < value.length; i++) {
                    var char = value.charCodeAt(i);
                    if ((char >= 0x0001 && char <= 0x007e) || (0xff60 <= char && char <= 0xff9f)) {
                        total++;
                    }
                    else {
                        total += 2;
                    }
                }
                return total;
            }


            $("#username").on('blur', function () {
				
             //   checkUserName();
            });

            $("#mobile").on('blur', function () {
            //    checkMobile();
            });

            $("#btn_address").click(function () {
                if (checkUserName() && checkMobile() && checkProvince() && checkCity() && checkAown() && checkAddr()) {
					type_address = $("#type_address").val();
                    username = $("#truename").val();
                    mobile = $("#mobile").val();
					province = $("#province").val();
					city = $("#city").val();
                    town = $("#town").val();
					addr = $("#addr").val();
                    
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {type_address: type_address, username: username, mobile: mobile, province: province,city: city, town: town, addr: addr},
                        success: function (data) {
                            $(".wap-tips").html(ehtml + "编辑地址成功~").show();
                                setTimeout(function () {
                                    location.href = "/pay/";
                                }, 2000);
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
                }
				
				
            });
	
    var cartTimer;
    function alertBox(_checkUrl,_curTime){
        $("#checkUrl").attr("href", _checkUrl);
        setInterval(function() {
            //30分钟倒计时
            getCountDown(_curTime, true, function () {
                window.location.href = _checkUrl;
            });
        }, 1000);
        var _html = $('#alert_pay .alert_content').html();
        var box = new XDLightBox({
            lightBoxId:'alert_pay',
            contentHtml:_html,
            scroll:true,
            isBgClickClose:false
        });
        box.init();
        $('#alert_pay .alert_close').click(function(){
            box.close();
            window.location.href=__URL_MEMBER__+'/pay/re_order/?order_no='+$("#order_no").val();
        });
    }
    $("img.lazy").lazyload({threshold:200,failure_limit:30});
    $('.go_pay').click(function(){
        var $this = $(this);
        //检测支付方式
        if ( $(".pay-method input:checked").size() == 0 ) {
            alert('请确认您的支付方式');
            return false;
        }
        var addrid = $('#address_id').val();
        if(addrid <= 0){
            $('body,html').animate({scrollTop:0},500);
            $('#myAddress li:last').click();
            $('.write_links').show();
            return;
        }
        var _payType = null;
        $(".pay-method input[name=choose_pay]").each(function(idx, obj) {
            if ( $(this).attr("checked") == 'checked' ) {
                _payType = $(this).val();
            }
        });
        if ( _payType == null ) alert("请选择支付方式");

        //添加加载中样式防止重复点击
        if($this.hasClass('pay-btn-ing')){
            return false;
        }
        $this.find('.go_pay_text').data('oText', $this.text());
        $this.addClass('pay-btn-ing').find('.go_pay_text').html('<img src="../images/items/ing-icon.gif">正在处理1中...');
		$('#alert_pay').show();
		clearTimeout(cartTimer);
					window.open("/pay/alipayapi.php?u_note="+$("#u_note").val()+"&choose_pay="+$("#choose_pay").val()+"&order_no="+$("#order_no").val(),'_blank');
        //特卖确认支付埋点数据
        var skuids = '';
        $(".sku-item").each(function(){
            var skuid = $(this).data("skuid");
            skuids += skuid+',';
        });
        skuids = skuids.substring(0,skuids.length-1);
        _paq.push(['trackEvent', 'temai', 'click_order', 'skuid_list', skuids]);
        //获取买家留言数据
        var noteArr = new Array();
        $(".inputmask .txt").each(function(i,o){
            var _tmp = new Array();
            var noteContent = $(o).val();
            if(noteContent.length > 50){
                noteContent = noteContent.substring(0, 50);
            }
            _tmp.push($(o).data("sellerid"));
            _tmp.push(noteContent);
            noteArr.push(_tmp);
        });
        /*var wakePayUrl = false;
        var wakeFlag = setInterval(function(){
            if(wakePayUrl == false) return;
            clearInterval(wakeFlag);
            window.open(wakePayUrl);
        },200);*/
        //var newWin = window.open();
        $.ajax({
            type: 'POST',
            url: '/pay/create_order',
            async:false,
            data: {
                'token': $("#token").val(),
                'address_id': addrid,
                'coupon_code': $("#coupon_code").val(),
                'actids': $("#actids").val(),
                'u_note': noteArr,
                'pay_type': _payType
            },
            dataType: 'json',
            success: function(data) {
                var _html = "";
                var _idx = 3;
				$('#alert_pay').show();
					 alertBox(_checkUrl, _curTime);  //弹框
                       // $('#payFormNew').submit();
                        $this.removeClass('pay-btn-ing').addClass('no').find('.go_pay_text').html($this.find('.go_pay_text').data('oText'));
                    $('#counDown').remove();
                    clearTimeout(cartTimer);
					window.open("/pay/alipayapi.php?u_note="+$("#u_note").val()+"&choose_pay="+$("#choose_pay").val()+"&order_no="+$("#order_no").val(),'_blank');
                if ( data.code == 200 ) {
				//	window.location.href="/pay/?"+$("#coupon_code").val();
                    //去掉购物袋倒计时
					 $('#alert_pay').show();
					 alertBox(_checkUrl, _curTime);  //弹框
                       // $('#payFormNew').submit();
                        $this.removeClass('pay-btn-ing').addClass('no').find('.go_pay_text').html($this.find('.go_pay_text').data('oText'));
                    $('#counDown').remove();
                    clearTimeout(cartTimer);
					window.open("/pay/alipayapi.php?u_note="+$("#u_note").val()+"&choose_pay="+$("#choose_pay").val()+"&order_no="+$("#order_no").val(),'_blank');
                    //wakePayUrl = data.data.wakePayUrl;
                    var checkUrl =  data.data.checkUrl;
                    var _orderNo = data.data.orderno;
                    var _checkUrl = data.data.checkUrl;
                    var _curTime = data.data.curtime;
                    var repeyUrl = __URL_MEMBER__+'/pay/action_order/?id='+_orderNo;
                    $('#repay').attr("href", repeyUrl);
                    $("input[name='orderPay']").val(_orderNo);
                    $("input[name='token']").val(data.data.token);
                    $("input[name='paytype']").val(_payType);

                    //去支付
                    var payType = $("#payFormNew input[name='paytype']").val();
                    
                        $.ajax({
                            type: 'POST',
                            url: $("#payFormNew").attr('action'),
                            dataType: 'json',
                            data: $("#payFormNew").serialize(),
                            success: function (result) {
                                //创建二维码
                                createQrCode(result.data.data.code_url);
                                var out_trade_no = result.data.data.out_trade_no;
                                var total_fee = result.data.data.total_fee;
                                var code_url = result.data.data.code_url;
                                var  expire_time = result.data.expire_time;
                                $('#traceOrder').text(result.data.data.out_trade_no);
                                $('#createTime').text(UnixToDate(result.data.create_time, 'yyyy-MM-dd'));
                                $('.pricenum label').html((result.data.pay_amount).toFixed(2));
                                $('#alert_pay_weixin').show();
                                $('#wx_title_normal').remove();
                                cartCount(0, 1800, function () {
                                    window.location.href = checkUrl;
                                });
                                $('.alert_fullbg').size() 
                                    ? $('.alert_fullbg').show()
                                    : $('<div class="alert_fullbg"></div>').appendTo('body');

                                $('#alert_pay_weixin .alert_close').click(function(){
                                    window.location.href=_checkUrl;
                                    $('#alert_pay_weixin').show();
                                    $('.alert_fullbg').hide();
                                });
                                $this.removeClass('pay-btn-ing').addClass('no').find('.go_pay_text').html($this.find('.go_pay_text').data('oText'));
                                callSync(out_trade_no,total_fee,code_url,expire_time,checkUrl); //检查成功
                            },
                            error: function () {
                                alertBox(_checkUrl, _curTime);  //弹框
                            }
                        })
                if (payType != 9) {   //微信扫码    } else {
                        alertBox(_checkUrl, _curTime);  //弹框
                        $('#payFormNew').submit();
                        $this.removeClass('pay-btn-ing').addClass('no').find('.go_pay_text').html($this.find('.go_pay_text').data('oText'));
                    }

                    //更新支付样式
                    $('.step-box .flow-steps').removeClass('steps_2');
                    $('.step-box .flow-steps').addClass('steps_3');
                    $('#post_order input[name=order_no]').val(_orderNo);
                    $('.step-box li').eq(2).addClass('cur');

                    var shareCartData = {'shareCartNum':0,'residualTime':3600};
                    setCartNum('shareCartData',JSON.stringify(shareCartData));  //重置数量和过期时间
                    //特卖去付款数据埋点
                    _paq.push(['trackEvent', 'temai', 'click_order_pay', 'orderid', _orderNo]);
                } else if ( data.code == 1000 ) { //有下架商品
                    var box = new XDLightBox({
                        lightBoxId:'shelves_alert',
                        contentHtml:data.html,
                        scroll:true,
                        isBgClickClose:false
                    });
                    box.init();
                    $('.alert_close').click(function(){
                        box.close();
                        window.location.href="/pay/confirm_order/"+$("#coupon_code").val();
                    });
                } else if ( data.code == 508 ){
                    _html = data.msg
                    $(".go_pay .t_box span").eq(0).html(_html);
                    $(".go_pay .t_box").show("slow");
                } else if ( data.code == 507 ) { //活动过期情况
                    _html = "抱歉，部分满减活动已结束，请重新确认。<b>"+_idx+"</b>秒后将返回购物袋";
                    junpInterval(_html, _idx, false);
                } else if ( data.code == 504 ) { //优惠券异常
                    _html = "抱歉，你所使用的优惠券异常，请重新选择。<b>"+_idx+"</b>秒后将返回购物袋";
                    junpInterval(_html, _idx, false);
                } else if ( data.code == 501 || data.code == 502 ) {
                    _html = "购物袋商品已清空，请重新选择。<b>"+_idx+"</b>秒后将返回购物袋";
                    junpInterval(_html, _idx, false);
                } else if ( data.code == 503 ) {
                    $(".go_pay .t_box span").eq(0).html("收货地址有误，请确认");
                    $(".go_pay .t_box").show("slow");
					$(".new-address").show();
                    setTimeout(function() {
                        window.location.href="/pay/"+$("#coupon_code").val();
                    }, 3000);
                } else if ( data.code == 500 ) {
                    _html = "请勿重复提交表单。<b>"+_idx+"</b>秒后窗口将关闭";
                    junpInterval(_html, _idx, true);
                } else if ( data.code == 506 ) {
                    //重复操作,不做处理
                } else {
                    _html = "订单创建失败。<b>"+_idx+"</b>秒后将返回购物袋";
                    junpInterval(_html, _idx, false);
                }
            }
        });
    });

    function junpInterval(_html, _idx, flag) {
        $(".go_pay .t_box span").eq(0).html(_html);
        $(".go_pay .t_box").show("slow");
        var _timer = setInterval(function() {
            _idx -= 1;
            $(".go_pay .t_box span").eq(0).children("b").text(_idx);
            if ( _idx == 1 ) {
                clearInterval(_timer);
                if ( flag ) {
                    window.opener = null;
                    window.open('','_self');
                    window.close();
                } else {
                    window.location.href=__URL_CART__;
                }
            }
        }, 1000);
    }

    //订单若有下架商品的订单取消事件
    $("#cancelOrder").live('click',function(){
        var skuid = '';
        $('#shelves_alert .alert_content ul.list li').each(function() {
            skuid += skuid == '' ? $(this).data('skuid') : '_'+$(this).data('skuid');
        });
        $.ajax({
            type: 'POST',
            url: __URL_CART__+'/index/removeOfShelves',
            data: {'skuid': skuid, 'flag': 'confrim_order'},
            dataType: 'jsonp',
            success: function(data) {
                if ( data.errorCode == 200 ) {
                    window.location.href=__URL_CART__;
                }
            }
        });
    });

    $("#ck").click(function(){
        if(typeof($(this).attr("checked"))=='undefined' || $(this).attr("checked")==false){
            $(".go_pay").addClass('no');
        }else{
            $(".go_pay").removeClass('no');
        }
    });
    $(".inputmask .txt").each(function(i,o){
        $(o).keyup(function(){
            var note = $(o).val();
            if(note.length > 50){
                note = note.substring(0, 50);
                $(o).val(note);
            }
        })
    });
    //订单支付状态检测
    $("#recheck").on("click", function() {
        checkPayStatus($(this));
        return false;
    });
    $("#checkUrl").on("click", function() {
        checkPayStatus($(this));
        return false;
    });

    $('#repay').on('click', function () {
        $('#alert_pay .alert_close').click();
    });

    function checkPayStatus(this_btn) {
        var _href = $("#checkUrl").attr('href');
        if (!this_btn.hasClass('.ing')) {
            $.ajax({
                url: '/pay/checkPayStatus/?order_num'+$('#order_no').val(),
                type: 'post',
                data: {'order_no': $('#post_order input[name=order_no]').val(),'order_num': $('#order_no').val()},
                success: function(data) {
                    if ( data == 200 ) {
                        $(".alert_bg .checkp").css("display", "none");
                        $(".alert_bg .recheckp").css("display", "block");
                        $(".alert_bg .pay-tips").css("display", "block");
                    } else {
						
                        window.location.href = '/pay/re_order/?order_no='+$('#order_no').val();
                    }
                },
                beforeSend: function () {
                    this_btn.addClass('ing');
                    this_btn.html('<img src="/images/items/ing-icon.gif">正在处2理中...');
                },
                complete: function () {
                    this_btn.removeClass('ing');
                    this_btn.html('重新检测');
                }
            });
        }
        return false;
    }
    //默认选中
    if($("input[name='choose_pay']").is(':checked')){
        $("#payFormNew input[name='paytype']").val($("input[name='choose_pay']:checked").val());
        $(" #ck").html($("input[name='choose_pay']:checked").data('type'));
    }
    //切换支付方式
    $(".pay-method input[name='choose_pay']").on("click", function() {
        $("#payFormNew input[name='paytype']").val($(this).val());
        $(" #ck").html($("input[name='choose_pay']:checked").data('type'));
    });

    function cartCount(stime, etime, callback) {
        var timestamp = (etime - stime) * 1000,
            dTime = new Date(timestamp),
            hours = dTime.getHours(),
            minutes = dTime.getMinutes(),
            seconds = dTime.getSeconds();

        hours=hours<0?0:hours;
        minutes=minutes<0?0:minutes;
        seconds=seconds<0?0:seconds;
        if ( minutes < 10 ) {
            minutes = '0'+minutes;
        }
        if ( seconds < 10 ) {
            seconds = '0'+seconds;
        }
        $("#countm").html(minutes);
        $("#counts").html(seconds);

        if (minutes == 0 && seconds == 0) {
            if (Object.prototype.toString.call(callback) === '[object Function]') {
                callback();
            }
        } else {
            cartTimer = setTimeout(function () {
                cartCount(stime+1, etime, callback);
            }, 1000);
        }        
    }
    //倒计时
    cartCount($('#counDown').data('curtime'), $('#counDown').data('time'), function () {
        //清除定时器
        window.location.href=__URL_CART__+"/cartTimeOut/?act=clean";
    });
});
