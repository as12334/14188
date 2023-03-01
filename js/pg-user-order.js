(function($){
    
	/*订单列表内容垂直居中*/
/*	var strlength = $('.order-infolist li').length;
	for(i=0;i<=strlength;i++){
		var h = ( 129- $('.order-infolist li').eq(i).height())/2;
		$('.order-infolist li').eq(i).css({'padding-top':h,'padding-bottom':h});
	}
*/
	/*删除订单*/
		$('.closebtnAction').click(function() {
			var _that = $(this);
			var url =  __URL_MEMBER__+'/user/order/deleteOrder/?order_no='+(_that.attr('_soid_no'));
			content = "<p class='mb20'>你确定要删除这笔订单吗？</p><a href='"+url+"' style='color:#fff'><div class='popbox-btn'><span class='check'>确认</span><span class='btn-cancel'>取消</span></div></a>";
			b = new XDLightBox({
				lightBoxId: "alert_dlt",
				contentHtml: content,
				scroll: false
			});
			b.init();

			$('.alert_close,.btn-cancel').click(function(){
				b.close();
			});

			var _that = $(this);
			
		$('.popbox-btn span.check a').click(function(){
			$.ajax({
				type: 'POST',
				url: __URL_MEMBER__+'/user/order/deleteOrder',
				data: {"order_no":parseInt(_that.attr('_soid_no'))},
				dataType: 'json',
				success: function(data) {
					alert(1);
					if(data.code!=200){
						$('#alert_dlt .alert_box p').text('删除失败！');
						
					}else{
						b.close();
						_that.parents('.order-infolist').fadeOut("slow", function() {
							$(this).remove();
							
						});
					}
				}
			});
		});
	});



    //查询订单
    $("#orderStatus").change(function(){
        var url=__URL_MEMBER__+"/order/index/t";
        var status=$(this).val();
        window.location =url+'/'+status;
        return false;
    });

    //用户取消订单
    $('.cancelAction').on('click',function(){
        var htmlbox = '<p class="result-tips"><label>请选择取消原因：</label><select  id="reason" class="result-select">'
                    + '<option value="1">我不想买了</option>'
                    + '<option value="2">信息填写错误</option>'
                    + '<option value="3">重新拍</option>'
                    + '<option value="4">卖家缺货</option>'
                    + '<option value="5">同城见面交易</option>'
                    + '<option value="6">其他原因</option>'
                    + '</select></p>'
                    + '<div class="btn" id="confirmYes"><a class="confirm fl" href="javascript:;">确认</a><a class="cancel fr" id="confirmNo" href="javascript:;">取消</a></div>';

        var box = new XDLightBox({
                        title:'温馨提示',
                        lightBoxId:'alert_confirm',
                        contentHtml:htmlbox,
                        scroll:true,
                        isBgClickClose:false
                      });

        box.init();

       var order_no = $(this).parents(".order-infolist").find('.order-no').attr('_order_no');
       var coupon_code = $.trim($(this).parents(".order-infolist").find('.order-no').attr('_coupon_code'));
        $('.confirm').on('click',function(){
            var reason = $("#reason").val();
            $.ajax({
                type:"post",
                dateType:"text",
                url:__URL_MEMBER__+'/user/order/cancelOrder/?order_no='+order_no+'&reason='+reason,
                data:({'order_no':order_no,'reason':reason, 'coupon_code':coupon_code}),
                success:function (data) {
                    if(data.code!=200){
						window.location.href='/user/order';
                        //alert("更新订单状态失败");
                       // box.buildContent('<p class="result-tips">' + data.msg + '</p>');
                        // window.location.href='/order';
                    }else{
                        window.location.href='/user/order';
                    }
                }
            });
        });
        $('#confirmNo').on('click',function(){
            box.close();
        });
    });

    //订单若有下架商品的订单取消事件
    $("#cancelOrder").live('click',function(){
        var orderNo = $("#cancelOrder").attr('data');
        $.ajax({
            type:"post",
            dateType:"json",
            url:__URL_MEMBER__+'/order/cancelOrder',
            data:{'order_no':orderNo,'reason':7},
            success:function(data){
                   window.location.href='/order';
            }
        });
    });
    //弹框
    function alertBox(){
        var htmlbox = '<p class="tips" id="paystatusbox">请在新开的页面完成支付。</p>'
            +'<p class="normal clear checkp" style="display:block;"><em class="icons icons-success fl"></em><span class="fl">如已经成功支付，请点击：</span><a href="javascript:;" id="confirmYes" class="button button_01 fl">已完成付款</a></p>'
            +'<p class="normal clear recheckp" style="display:none;"><em class="icons icons-success fl"></em><span class="fl">如已经成功支付，请点击：</span><a id="recheck" href="javascript:;" class="button button_01 fl">重新检测</a></p>'
            +'<p class="pay-tips clear" style="display:none;">*未支付成功。若已付款，可能是银行反应延迟了，请重新检测。</p>'
            +'<p class="normal clear"><em class="icons icons-tips fl"></em><span class="fl">如付款遇到问题，你可以：</span><a id="repay" href="javascript:;" class="button button_01 fl">重新支付</a></p><p class="normal"><a class="blue_2" href="http://www.juanpi.com/help/view/1631453" target="_blank">查看支付帮助&gt;&gt;</a></p>';

        var box = new XDLightBox({
            title:'温馨提示',
            lightBoxId:'alert_pay',
            contentHtml:htmlbox,
            scroll:true,
            isBgClickClose:false
        });

        box.init();

        $("#recheck").on("click", function() {
            checkPayStatus($(this));
            return false;
        });
        $('#confirmYes').on('click',function(){
            checkPayStatus($(this));
            return false;
        });

        $('#confirmNo').on('click',function(){
            //box.close();
        });

        $('#repay').on('click', function () {
            box.close();
            window.location.reload();
        });
    }

    //订单状态检测
    function checkPayStatus(this_btn) {
        var order_no = $("#orderNo").val();
        if (!this_btn.hasClass('.ing')) {
            $.ajax({
                url: __URL_MEMBER__+'/pay/checkPayStatus',
                type: 'post',
                data: {'order_no': order_no},
                success: function(ret) {
                    if ( ret.code == 500 ) {
                        $(".alert_bg .checkp").css("display", "none");
                        $(".alert_bg .recheckp").css("display", "block");
                        $(".alert_bg .pay-tips").css("display", "block");
                    } else {
                        window.location.href='/pay/re_order/?order_no='+order_no;
                    }
                },
                beforeSend: function () {
                    this_btn.addClass('ing');
                    this_btn.html('<img src="/images/items/ing-icon.gif">正在处理中...');
                },
                complete: function () {
                    this_btn.removeClass('ing');
                    this_btn.html('重新检测');
                }
            });
            return false;
        }
        
    }

     //去付款
    $('#payOrder').on('click',function(){
        var $this = $(this);
		if(!$this.hasClass('pay-btn-ing')){
            //检测支付方式
            if ( $(".pay-method input:checked").size() == 0 ) {
                alert('请确认您的支付方式');
                return false;
            }
            var checkedType = $(".pay-method input:checked").val();
            if(checkedType == 2 || checkedType == 9) {
                $("#payFormNew input[name='paytype']").val(checkedType);
            }
            var order_no = $("#orderNo").val();
            $.ajax({
                type:"post",
                dateType:"json",
                async:false,
                url:__URL_MEMBER__+'/pay/check_order',
                data:({'orderNo':order_no}),
                success:function (data) {
                    if(data.code == "1000"){
                        var htmlbox = data.html;
                        var box = new XDLightBox({
                            title:'',
                            lightBoxId:'shelves_alert',
                            contentHtml:htmlbox,
                            scroll:true,
                            isBgClickClose:false
                        });
                        box.init();

                    }else{
                        //去支付
                        var payType =  $("#payFormNew input[name='paytype']").val();
                        var checkUrl =  data.checkUrl;
                        if(payType == 9){   //微信扫码
                            $.ajax({
                                type: 'POST',
                                url: $("#payFormNew").attr('action'),
                                dataType: 'json',
                                data: $("#payFormNew").serialize(),
                                success: function (result) {
                                    if(result.code ==	1000){
                                        //创建二维码
                                        createQrCode(result.data.data.code_url);
                                        var out_trade_no = result.data.data.out_trade_no;
                                        var total_fee = result.data.data.total_fee;
                                        var code_url = result.data.data.code_url;
                                        var  expire_time = result.data.expire_time;
                                        $('#traceOrder').text(result.data.data.out_trade_no);
                                        $('#createTime').text(UnixToDate(result.data.create_time,'yyyy-MM-dd'));

                                        $('#alert_pay_weixin').show();
                                        $('#wx_title_count').remove();
                                        $('.alert_fullbg').size()
                                            ? $('.alert_fullbg').show()
                                            : $('<div class="alert_fullbg"></div>').appendTo('body');

                                        callSync(out_trade_no,total_fee,code_url,expire_time,checkUrl); //检查成功
                                    }else{  //错误的处理办法
                                        window.location.href= __URL_MEMBER__+'/order/';
                                    }
                                },
                                complete:function(){
                                    $this.removeClass('pay-btn-ing').html($this.data('oText'));
                                },
                                error:function(){
                                    alertBox();  //弹框
                                }
                            })
                        }else{
                            $this.removeClass('pay-btn-ing').html($this.data('oText'));
                            alertBox();  //弹框
                            $('#payFormNew').submit();
                        }
                    }
                },
                beforeSend: function () {
                    $this.data('oText', $this.text());
                    $this.addClass('pay-btn-ing').html('<img src="http://s.juancdn.com/juanpi/images/items/ing-icon.gif">正在处理中...');
                }
            });

            //特卖去付款数据埋点
            _paq.push(['trackEvent', 'temai', 'click_order_pay', 'orderid', order_no]);

            
		}
    });


     //详情页确认收货
    $('#receive,#receivet').on('click',function(){
        var orderBack = $("#orderBack").val();
        if(orderBack!=0){
            var htmlbox = '<p class="tips">该订单处于售后中，如果确认收货，将会关闭售后流程，<br/>是否确认收货？</p>'
                       + '<div class="btn"><a class="confirm fl" id="confirmYes" href="javascript:;">确认</a><a class="cancel fr" id="confirmNo" href="javascript:;">取消</a></div>';
        }else{
            var htmlbox = '<p class="tips">确认收货后，货款将打给卖家；<br />请确保您已收到货，否则将造成您的损失。</p>'
                       + '<div class="btn"><a class="confirm fl" id="confirmYes" href="javascript:;">确认</a><a class="cancel fr" id="confirmNo" href="javascript:;">取消</a></div>';
        }
        var box = new XDLightBox({
                        title:'温馨提示',
                        lightBoxId:'alert_confirm',
                        contentHtml:htmlbox,
                        scroll:true,
                        isBgClickClose:false
                      });

        box.init();
        var order_no = $("#orderNo").val();
        $('#confirmYes').on('click',function(){
            $.ajax({
                type:"post",
                dateType:"json",
                url:__URL_MEMBER__+'/order/confirmReceive',
                data:({'orderNo':order_no,'orderBack':orderBack}),
                success:function (data) {
                    if(data.code!=200){
                        //alert("更新订单状态失败");
                        window.location.href='/order/detail/orderId/'+order_no;
                    }else{
                        window.location.href='/order/detail/orderId/'+order_no;
                    }
                }
            });
        });
        $('#confirmNo').on('click',function(){
            box.close();
        });
    });



    //列表页确认收货
    $('.receive').on('click',function(){

        var orderBack = $(this).parents(".order-infolist").find('.order-no').attr('orderBack');
        if(orderBack!=0){
             var htmlbox = '<p class="tips">该订单处于售后中，如果确认收货，将会关闭售后流程，<br/>是否确认收货？</p>'
                       + '<div class="btn"><a class="confirm fl" id="confirmYes" href="javascript:;">确认</a><a class="cancel fr" id="confirmNo" href="javascript:;">取消</a></div>';
        }else{
            var htmlbox = '<p class="tips">确认收货后，货款将打给卖家；<br />请确保您已收到货，否则将造成您的损失。</p>'
                    + '<div class="btn"><a class="confirm fl" id="confirmYes" href="javascript:;">确认</a><a class="cancel fr" id="confirmNo" href="javascript:;">取消</a></div>';
        }
        var box = new XDLightBox({
                        title:'温馨提示',
                        lightBoxId:'alert_confirm',
                        contentHtml:htmlbox,
                        scroll:true,
                        isBgClickClose:false
                      });

        box.init();
		var order_no = $(this).parents(".order-infolist").find('.order-no').attr('_soid_no');
        $('#confirmYes').on('click',function(){
            $.ajax({
                type:"post",
                dateType:"json",
                url:__URL_MEMBER__+'/order/confirmReceive',
                data:({'orderNo':order_no,'orderBack':orderBack}),
                success:function (data) {
                    if(data.code!=200){
                        //alert("更新订单状态失败");
                        window.location.href='/order/';
                    }else{
                        window.location.href='/order/';
                    }
                }
            });
        });
        $('#confirmNo').on('click',function(){
            box.close();
        });
    });

    //用户中心首页用户头像选中效果
    $('.ph .ph-layer,.ph .ph-set').hover(function(){
        $('.ph .ph-set').css('background-position','-159px -21px');
    },function(){
        $('.ph .ph-set').css('background-position','-138px -21px');
    })
    function hideSlow(ele){
    var timer=null;
    clearTimeout(timer);
    timer=setTimeout(function(){
        ele.remove();
        _usFavorite = false;
    },3000);

    }
    //提醒发货
    var _usFavorite = false;
    var noticeFun=function(){
        $(".noticSales").on('click',function(){
        if(_usFavorite == true){
            return;
        }else{
            _usFavorite = true;
            //$(".success-box").remove();
            var that=$(this);
            var order_no = $(this).parents(".order-infolist").find('.order-no').attr('_soid_no');
            var result="";
            var html='<div class="success-box" style="display:none;top:17px;"><p></p></div>';
            that.parents(".my-order-list").append(html);
            $.ajax({
                    type:"post",
                    dateType:"json",
                    url:__URL_MEMBER__+'/order/remindseller',
                    data:({'orderno':order_no}),
                    success:function (data) {
                        //_usFavorite = false;
                        if(data.code!=1000){
                            $(".success-box p").html('<span class="warn">'+data.msg+'</span>');
                        }else{
                            $(".success-box p").html('<span>'+data.msg+'</span>');
                        }
                        $(".success-box").css("display","block");
                    },
                    error:function(e){
                        //_usFavorite = false;
                        $(".success-box p").html('<span class="warn">你的网络好像不太给力，请稍后重试。</span>');
                        $(".success-box").css("display","block");
                    }
                });
                hideSlow($(".success-box"));
            }

        })
    }
    noticeFun();

    //默认选中
    if($("input[name='choose_pay']").is(':checked')){
        $("#payFormNew input[name='paytype']").val($("input[name='choose_pay']:checked").val());
        $(" .cg_pay_type").html($("input[name='choose_pay']:checked").data('type'));
    }
    //切换支付方式
    $(".pay-method input[name='choose_pay']").on("click", function() {
        $("#payFormNew input[name='paytype']").val($(this).val());
        $(" .cg_pay_type").html($("input[name='choose_pay']:checked").data('type'));
    });

    //关闭诈骗提醒
    $('.fraud-banner span').on("click",function(){
        $('.fraud-banner').hide();
        return false;
    })
    var serverTime = parseInt($("#timeInfo span:first").html());
    var totalTime  = parseInt($("#timeInfo span:last").html());
    function showTime() {
        var timestamp = totalTime - new Date(serverTime);
        //计算出相差天数
        var days = Math.floor(timestamp / (24 * 3600));
        //计算出小时数
        var leave1 = timestamp % (24 * 3600); //计算天数后剩余的毫秒数
        var hours = Math.floor(leave1 / (3600));
        //计算相差分钟数
        var leave2 = leave1 % (3600); //计算小时数后剩余的毫秒数
        var minutes = Math.floor(leave2 / (60));
        //计算相差秒数
        var leave3 = leave2 % (60); //计算分钟数后剩余的毫秒数
        var seconds = Math.round(leave3);
        days = days < 0?0:days;
        hours = hours < 0?0:hours;
        minutes = minutes < 0?0:minutes;
        seconds = seconds < 0?0:seconds;
        if(minutes<=0 && seconds<=0){
            window.location.reload();
        }
        $("#m").html(minutes);
        $("#s").html(seconds);
        serverTime++;
        if(days ==0 && hours ==0 && minutes ==0 && seconds ==0 ){
            location.reload();
        }
    }
    if(totalTime > serverTime){
        showTime();
        setInterval(showTime, 1000);
    }
})(jQuery);


;(function($){
    function initDialog () {
        var wxCuponFlag=$("#wxCuponFlag").attr("value"),//首单反馈
            ogAlterTipFlag=$("#ogAlterTipFlag").attr("value"),//下单有礼
            htmlStr='',id,title,isBgClose=false;
        if(wxCuponFlag==1){
            var nowTime = new Date().getTime();
            var startTime =new Date('2015/09/14 10:00:00').getTime();
            //var startTime =new Date('2015/08/17 19:00:00').getTime();
            var endTime = new Date('2015/09/18 23:59:59').getTime();
            var url,text;
            if(nowTime >=startTime &&  nowTime <= endTime){
                url=__URL_JUANPI__+'/act/xinren919';
                text='进入主会场';
            }else{
                url=__URL_JUANPI__;
                text='去逛逛';
            }
            // var url =  (nowTime >=startTime &&  nowTime <= endTime) ?  __URL_JUANPI__+'/act/xinren99':__URL_JUANPI__;
            htmlStr='<div class="act99-content">\
                    <div class="act99-container"><p class="small-text">满29元减5元 / 满109元减15元 / 满199元减30元</p>\
                    <p >优惠券仅限app使用，</p>\
                    <p><a class="go-download" href="http://www.juanpi.com/apps/" target="_blank">马上下载卷皮折扣app吧！</a></p>\
                    <a href="'+url+'" class="btn-goto bc" target="_blank"  data-bc="huikui919_001.0">'+text+'</a></div></div>';
            id="alert_feedback";
            title='';
        }
        if(ogAlterTipFlag==1){
            htmlStr='<h1>订单支付成功</h1>\
                        <div class="img-container"></div>\
                        <a href="'+__URL_JUANPI__+'/act/youli99" class="btn-goLottery"></a>\
                        ';
            id="alert_gift";
            title='<div class="act_logo"></div>';
        }
        showModalDialog(htmlStr,id,title,isBgClose);
        //统计
        var oBc = $('.bc');
        oBc.live("click", function(){
            _paq.push(['trackEvent','event_click','click_event_btnid', 'btnid_utm', $(this).attr('data-bc')]);
        });
    }

    function showModalDialog(htmlMsg,id,title,isBgClose) {
        if(!htmlMsg) return;
        var box = new XDLightBox({
            title: title,
            lightBoxId: id,
            contentHtml: htmlMsg,
            scroll:true,
            isBgClickClose:isBgClose
        });
        box.init();

    }

    $(function(){
        initDialog();
    })
})(jQuery);
