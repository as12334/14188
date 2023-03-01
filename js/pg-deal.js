define(function(require,exports,module){
    return function(){
		var bCpChange = false; //记录文案是否有变更
        var sku;
        var y;
		
		//获取用户地理信息,并设置“包邮” or “加5块”
        $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(){
            $(".goods_show .address em").html(remote_ip_info.province);
            if($(".goods_show .by").data("post") == 0 && !(XDTOOL.isfree_post(remote_ip_info.province) === true)){
                $(".goods_show .by").html("加5块");
            }else{
                $(".goods_show .by").html("包邮");
            }
        });
		
		//分享按钮js
        var share_show=function(){
            var timer=null;
            clearInterval(timer);
            $(".share-box").hover(
                function(){
                    clearTimeout(timer);
                    timer=setTimeout(function(){
                        $(".share-box .share").show();
                    },100);
                },
                function(){
                    clearTimeout(timer);
                    timer=setTimeout(function(){
                        $(".share-box .share").hide();
                    },100);
                }
            );
        }
        share_show();
		
		//地址列表js
        var area_show=function(){
            var timer=null;
            clearInterval(timer);
            $(".goods_show .address,.goods_show .city").hover(
                function(){
                    clearTimeout(timer);
                    timer=setTimeout(function(){
                        $(".goods_show .address .city").show();
                    },100);
                },
                function(){
                    clearTimeout(timer);
                    timer=setTimeout(function(){
                        $(".goods_show .address .city").hide();
                    },100);
                }
            );

            $(".goods_show .city li").click(function(){
                $(".goods_show .address em").html($(this).text());
                if($(".goods_show .by").data("post") == 0 && !(XDTOOL.isfree_post($(this).text()) === true)){
                    $(".goods_show .by").html("加5块");
                }else{
                    $(".goods_show .by").html("包邮");
                }
                $(".goods_show .address .city").hide();
            })
        }
        area_show();
		
		//飞入购物袋js效果
		var fly_cart_fun=function(){
			//初始化fly的默认值
			var _top=$("#J-mini-btn a").offset().top;
			var _left=$("#J-mini-btn a").offset().left;
			$("#J-mini-cart").css({"top":_top,"left":_left,"display":"block"});
			var fist_top=_top-$("#J-mini-cart").height();
			var into_top=$("#J_cart").offset().top;
			var into_left=$("#J_cart").offset().left;
			$("#J-mini-cart").animate({
				top:fist_top
				},200,function(){
				$("#J-mini-cart").animate({
				top:into_top,left:into_left
				},600,function(){
				$("#J-mini-cart").css("display","none");
				});
			});
		}

        var clearClass = function(){
            $('.submit-go .btn').removeClass('no');  
            $('.submit-go .btn').html('加入购物袋');
        }
		
        //获取sku信息
        var getSku = function(){
            $(".loadingsku").show();
            $.ajaxSetup({
                cache: false
            });
            $.ajax({
				type: 'get',
				url: __URL_SHOP__+'/deal/getSku',
				cache: false,
				dataType: 'jsonp',
				data:{'gid':$(".goods_show").data("gid"),'t':new Date().getTime()},
				success: function(json) {
					$(".loadingsku").hide();
					y = json.info;
					$(".tm-price span:eq(0)").html('<i class="symbols">￥</i>'+parseFloat(y.si_cprice));
					$(".tm-price .levelbox").html('购买可获得<em>'+y.jifen+'</em>积分');
					$(".om-price span:eq(0)").html("<em>￥</em>"+parseFloat(y.si_price));
					$(".om-price span:eq(1)").html('<span class="discount">(<em>'+y.good_rate+'</em>折)</span>');
					$(".slide-box .fr .p").html('<i class="symbols">￥</i>'+parseFloat(y.si_cprice));
					$(".slide-box .fr .del").html('<em>￥</em>'+parseFloat(y.si_price));
					if(json.code != 200 || json.sku === false){
						//加载sku信息失败
					}else{
						sku = json.sku;
						

						if(!XDTOOL.emptyObj(sku['0_0'])){
							$("#confirm input[name='sid']").val(sku['0_0'].ss_id);
						}

						var zArr = new Array();
						var zIds = new Array();
						var fArr = new Array();
						var fIds = new Array();
						$.each(sku, function(i,val){
							if(val.ss_av_zid != 0 && $.inArray(val.ss_av_zid,zIds) < 0){
								var z = new Array();
								z['id'] = val.ss_av_zid;
								z['value'] = val.ss_av_zvalue;
								z['pic'] = val.ss_av_zpic;
								zArr.push(z);
								zIds.push(val.ss_av_zid);
							}
							if((val.ss_av_fid != 0) && ($.inArray(val.ss_av_fid,fIds) < 0)){
								var f = new Array();
								f['id'] = val.ss_av_fid;
								f['value'] = val.ss_av_fvalue;
								f['pic'] = val.ss_av_fpic;
								fArr.push(f);
								fIds.push(val.ss_av_fid);
							}
						});
						//构造颜色html
						var zHtml = '';
						if(!XDTOOL.emptyObj(zArr)){
							$.each(zArr, function(i,val){
								if(val.pic == ""){
                                    zHtml = zHtml+'<li class="attr_pic" data-c="'+val.id+'"><a class="txt" href="javascript:void(0)" title="'+val.value+'">'+val.value+'</a></li>';
								}else{
									zHtml = zHtml+'<li class="attr_pic" data-c="'+val.id+'"><a href="javascript:void(0)" title="'+val.value+'"><img src="'+val.pic+'" height="34px" width="34px"></a></li>';
								}
							})
							    zHtml = '<dl class="color clear"><dt>颜色：</dt><dd><ul>'+zHtml+'</ul></dd></dl>';
						}
						//构造尺码html
						var fHtml = '';
						if(!XDTOOL.emptyObj(fArr)){
							$.each(fArr, function(i,val){
								fHtml = fHtml+'<li class="nos" data-c="'+val.id+'"><a href="javascript:void(0)"><span class="c">'+val.value+'</span></a></li>';
							})
                            fHtml = '<dl class="size clear"><dt>尺码：</dt><dd><ul>'+fHtml+'</ul></dd></dl>';
						}

						$(".J-other .J-title").after(zHtml+fHtml);
						
						//如果没有颜色信息
						if(XDTOOL.emptyObj(zArr)){
							$.each($(".J-other .size li"), function(i,val){
								if(!XDTOOL.emptyObj(sku["0_"+$(this).data("c")]) && (sku["0_"+$(this).data("c")]['ss_number'] <= 0 ||sku["0_"+$(this).data("c")]['ss_realempty']  == 1)){
									$(this).addClass("no");
								}
							});
						}
						//如果没有尺码信息
						if(XDTOOL.emptyObj(fArr)){
							$.each($(".J-other .color li"), function(i,val){
								if(!XDTOOL.emptyObj(sku[$(this).data("c")+"_0"]) && (sku[$(this).data("c")+"_0"]['ss_number'] <= 0||sku[$(this).data("c")+"_0"]['ss_realempty']  == 1)){
									$(this).addClass("no");
								}
							});
						}

						//购买按钮状态设置 add by wudong 
						var $submitBtn=$(".submit-go .btn"),
							$colorLi=$(".J-other li"),
							$numOpertator=$('.decrease,.increase'),
							$stock=$(".number dd .stock");
						if(y.flag == "beforeshow" || y.flag == "beforesell" || y.flag == "offshelf" || y.flag == "remind"||y.flag=='soldout'){
							$(".J-other .number,.su-time").remove();
							
							if(y.flag=='remind'||y.flag=='offshelf'||y.flag=='soldout'){

								$colorLi.addClass('no');
								$numOpertator.addClass('no');
								$stock.addClass('over').html('<i></i>抢光了');

								if(y.flag=='remind'){
									$submitBtn.attr('class', 'btn remind');
									$(".submit-go").append('<p class="tips other">该商品有人尚未付款，你还有机会哦</p>');
								}else{
									$submitBtn.attr('class', 'btn end');
								}

							}else{
								$submitBtn.attr('class', 'btn start');
							}

						}else{
							$submitBtn.attr('class', 'btn');
							$colorLi.removeClass("no");
							$stock.removeClass('over').html("");
						}
						

						$submitBtn.html(y.btn);
						
						//有货提醒或卖光按钮判断
						/*if(y.btnclass == "soldout"){
							$(".su-time").remove();
							$(".J-other li").addClass("no");
							$('.decrease,.increase').addClass('no');
							$(".number dd .stock").addClass('over');
							$(".number dd .stock").html("<i></i>抢光了");
							$(".submit-go .btn").attr("class","btn end");
							$(".submit-go .btn").html("抢光了");
						}else if(y.btnclass == "remind"){
							$(".su-time").remove();
							$(".J-other li").addClass("no");
							$(".number dd .stock").addClass('over');
							$(".number dd .stock").html("<i></i>抢光了");
							$(".submit-go .btn").attr("class","btn remind");
							$(".submit-go .btn").html("有货提醒我");
							$(".submit-go").append('<p class="tips other">有人未付款，仍有机会购买哦~</p>');
						}else if(y.btnclass == "normal"){ // add by wudong 2015/9/6 
							$(".su-time").remove();
							$(".J-other li").removeClass("no");
							$(".number dd .stock").removeClass('over');
							$(".number dd .stock").html("");
							$(".submit-go .btn").attr("class","btn");
							$(".submit-go .btn").html("加入购物袋");
						}*/
						
						//sku信息事件绑定
						doSku();
						var stockless = $('#stockconfig').data('less');
						//默认颜色选择第一个
						if($(".J-other .color li").size() > 0){
							var iLen = $(".J-other .color li").size();
							var jzFlag = false;
							var minjzIdx = 0;
							var minjzVal = 9999999;
							for ( var i = 0; i < iLen; i++ ) {
								var oColorItem = $(".J-other .color li").eq(i);
								$.each(sku, function(idx,val){
									if ( oColorItem.data("c") == idx.split("_")[0] && val.ss_number <= stockless ) {
										if ( parseInt(val.ss_number) != 0 && parseInt(val.ss_number) < minjzVal  && val.ss_realempty == 0 ) {
											jzFlag = true;
											minjzVal = val.ss_number;
											minjzIdx = i;
										}
									}
								});
							}
							if ( jzFlag ) {
								$(".J-other .color li").eq(minjzIdx).click();
							}
							if ( !jzFlag ) {
								var clickFlag = false;
								for ( var i = 0; i < iLen; i++ ) {
									var oColorItem = $(".J-other .color li").eq(i);
									var cFlag = false;
									$.each(sku, function(idx,val){
										if ( oColorItem.data("c") == idx.split("_")[0] && parseInt(val.ss_number) != 0 &&  val.ss_realempty == 0 ) {
											cFlag = true;
										}
									});
									if ( cFlag && !clickFlag && !$(".J-other .color li").eq(i).hasClass("no") ) {
										$(".J-other .color li").eq(i).click();
										clickFlag = true;
									}
									if ( !cFlag && !$(".J-other .color li").eq(i).hasClass("no") ) {
										$(".J-other .color li").eq(i).addClass("no");
										//添加一个额外的标记
										//表示改颜色对应下的所有尺码全都被抢光,不能再去掉 no class
										$(".J-other .color li").eq(i).addClass("empty_flag");
									}
								}
							}
						}
						if($(".J-other .size li").size() == 1){
							$(".J-other .size li").click();
						}
						if ( $(".J-other .color li").size() == 0 ) { //只有尺寸时,也需要展示库存状态
							var iLen = $(".J-other .size li").size();
							for ( var i = 0; i < iLen; i++ ) {
								if ( !$(".J-other .size li").eq(i).hasClass("no") ) {
									$(".J-other .size li").eq(i).click();
									$(".J-other .size li").eq(i).removeClass("cur");
									break;
								}
							}
						}
					}
				}
            });
        }
        getSku();
		
		//sku信息事件绑定
        var doSku = function(){
			//给所有的颜色li绑定hover事件
			if ( $(".J-other .color li").size() > 0 ) {
				$(".J-other .color li").hover(function() {
					if ( $(this).has("div.stock_tips") ) {
						$(this).children("div.stock_tips").show();
					}
				}, function() {
					if ( $(this).has("div.stock_tips") ) {
						$(this).children("div.stock_tips").hide();
					}
				});
			}
			
			$(".J-other li").click(function(){
				/* 没有选择sku信息的警告框 */
                $(".J-other").removeClass('J-attention');
                $(".J-other .tips").css("display","none");
				var _isZ = $(this).parents("dl").hasClass("color") ? 1 : 0;
				
                if( ($(this).hasClass("no") || $(this).hasClass("chance")) ){
                    return false;
                }
				
                if($(".J-other .color").size() != 0 && $(".J-other .size").size() != 0){
					$(".J-other .color li").each(function(idx, obj) {
						if ( !$(obj).hasClass("empty_flag") ) {
							$(obj).removeClass("no");
						}
					});
                    $(".J-other .size li").removeClass("no");
                }
				
                if( !_isZ && $(this).hasClass("cur") ){
                    $(this).siblings().removeClass("cur");
                    $(this).removeClass("cur");
                } else {
                    $(this).siblings().removeClass("cur");
                    $(this).addClass("cur");
                }
				
                if($(".J-other .size,.J-other .color").size() == $(".J-other .size .cur,.J-other .color .cur").size() && $(".J-other").hasClass("J-attention")){
                    $(".J-other .confirm-btn").removeClass('no');
                }
                if($(".J-other .size,.J-other .color").size() != $(".J-other .size .cur,.J-other .color .cur").size() && $(".J-other").hasClass("J-attention")){
                    $(".J-other .confirm-btn").addClass('no');
                }
				
                var z = f = 0;
                if($(".J-other .color li.cur").size() != 0){
                    z = $(".J-other .color li.cur").data("c");
                }
                if($(".J-other .size li.cur").size() != 0){
                    f = $(".J-other .size li.cur").data("c");
                }
                $("#confirm input[name='zid']").val(z);
                $("#confirm input[name='fid']").val(f);
				
				var s = null;
                if(!XDTOOL.emptyObj(sku[z+"_"+f])){
                    s = sku[z+"_"+f];
                    $("#confirm input[name='sid']").val(s.ss_id);
                    $(".tm-price span:eq(0)").html('<i class="symbols">￥</i>'+parseFloat(s.ss_cprice));
                    $(".tm-price .levelbox").html('购买可获得<em>'+s.ss_fen+'</em>积分');
                    $(".om-price span:eq(0)").html("1<em>￥</em>"+parseFloat(s.ss_price));
                    $(".om-price span:eq(1)").html('<span>(<i class="num">'+s.good_rate+'</i>折)</span>');
                    $(".slide-box .fr .p").html('<em>￥</em>'+parseFloat(s.ss_cprice));
                    $(".slide-box .fr .del").html('<em>￥</em>'+parseFloat(s.ss_price));
                }else{
                    $(".tm-price span:eq(0)").html('<i class="symbols">￥</i>'+parseFloat(y.si_cprice));
                    $(".tm-price .levelbox").html('购买可获得<em>'+y.jifen+'</em>积分');
                    $(".om-price span:eq(0)").html("<em>￥</em>"+parseFloat(y.si_price));
                    $(".om-price span:eq(1)").html('<span>(<i class="num">'+y.good_rate+'</i>折)</span>');
                    $(".slide-box .fr .p").html('<i class="symbols">￥</i>'+parseFloat(y.si_cprice));
                    $(".slide-box .fr .del").html('<em>￥</em>'+parseFloat(y.si_price));
                }
				
				var stockless = $('#stockconfig').data('less');
                if($(".J-other .color li.cur").size() != 0){
                    $.each(sku, function(i,val){
						if ( $(".J-other .size li").size() == 0 ) { //只有颜色的情况
							var oColorItem = $(".J-other .color li[data-c='"+i.split("_")[0]+"']");
							if ( oColorItem.children("div").size() > 0 ) {
								oColorItem.children("div").remove();
							}
							if(val.ss_realempty == 1){
                                oColorItem.addClass("no");
                            }else if ( val.ss_number == 0 ) {
								if ( val.ss_realempty != 1 && oColorItem.children("div").size() == 0 ) {
									oColorItem.append('<div class="stock_tips tips_other"><span>有机会</span><em></em></div>');
								} else {
									oColorItem.addClass("no");
								}
							} else {
								if ( val.ss_number > 0 && val.ss_number <= stockless && oColorItem.children("div").size() == 0 ) {
									oColorItem.append('<div class="stock_tips"><span>紧张</span><em></em></div>');
								}
							}
						} else {
							var oSizeItem = $(".J-other .size li[data-c='"+i.split("_")[1]+"']");
							var curflag = false;
							if ( $(".J-other .color li.cur").data("c") == i.split("_")[0] ) {
								curflag = true;
							}
							
							
							if( curflag ) {
								if ( oSizeItem.hasClass("cur") ) {
									oSizeItem.attr("class", "nos cur");
								} else {
									oSizeItem.attr("class", "nos");
								}
								if ( oSizeItem.children("a").children("span").size() > 1 ) {
									oSizeItem.children("a").children("span:last").remove();
								}
							}
							
							//在尺码上更新库存状态
                            if(curflag &&  val.ss_realempty == 1){
                                oSizeItem.addClass("no");
                            }else if( curflag && val.ss_number == 0 ){
								if ( val.ss_realempty != 1 && !oSizeItem.hasClass("chance") ) {
									oSizeItem.addClass("chance");
									oSizeItem.children("a").append('<span class="normal">有机会</span>');
								} else {
									if ( !oSizeItem.hasClass("chance") ) {
										oSizeItem.addClass("no");
									}
								}
							} else {
								if ( curflag && val.ss_number > 0 && val.ss_number <= stockless && !oSizeItem.hasClass("other") ) {
									oSizeItem.addClass("other");
									oSizeItem.children("a").append('<span class="normal">库存紧张</span>');
								}
							}
						}
						
                    })
                }
				
                if($(".J-other .size li.cur").size() != 0){
                    $.each(sku, function(idx,val){
						if ( $(".J-other .color li").size() == 0 ) { //只有尺寸的情况
							var oSizeItem = $(".J-other .size li[data-c='"+idx.split("_")[1]+"']");
							
							if ( oSizeItem.hasClass("cur") ) {
								oSizeItem.attr("class", "nos cur");
							} else {
								oSizeItem.attr("class", "nos");
							}
							if ( oSizeItem.children("a").children("span").size() > 1 ) {
								oSizeItem.children("a").children("span:last").remove();
							}

                            if( val.ss_realempty == 1){
                                oSizeItem.addClass("no");
                            }else if( val.ss_number == 0 ){
								if ( val.ss_realempty != 1 && !oSizeItem.hasClass("chance") ) {
									oSizeItem.addClass("chance");
									oSizeItem.children("a").append('<span class="normal">有机会</span>');
								} else {
									if ( !oSizeItem.hasClass("chance") ) {
										oSizeItem.addClass("no");
									}
								}
							} else {
								if ( val.ss_number > 0 && val.ss_number <= stockless && !oSizeItem.hasClass("other") ) {
									oSizeItem.addClass("other");
									oSizeItem.children("a").append('<span class="normal">库存紧张</span>');
								}
							}
						} else {
							if($(".J-other .size li.cur").data("c") == idx.split("_")[1] &&(val.ss_number == 0 ||val.ss_realempty == 1)){
								$(".J-other .color li[data-c='"+idx.split("_")[0]+"']").addClass("no");
							}
						}
                        
                    })
                }
				
                var limitnum = $('.number dd').attr('_sku_limit_buy');
                $('.number .skulimitbuy').html('限购<em class="red">'+limitnum+'</em>件');
				
            });
        }

		//切换主图
        $(".goods_show .deal-pic li").mouseover(function(){
            $(".goods_show .deal-pic li").removeClass("cur");
            $(this).addClass("cur");
            src= $(this).find("img").attr("src");
            if(src){
                $(".goods_show .deal-pic .pic img").attr("src",src.replace(/_58x58/,"_400x400"));
            }
        });
        
        //切换属性图片
        $(".attr_pic").live('click',function(){
            var that = this;
            var datac = $(that).attr("data-c");
            var key = "isclick" + datac;
            $(".attr_pic").each(function(index,obj){
                if(that!=obj){
                    var keytwo = "isclick" + $(obj).attr("data-c") ;
                    //$(that).removeClass("cur");
                    $("body").data(keytwo,"no");
                }
            });
            if($("body").data(key)=="yes"){
                $(that).removeClass("cur");
                $("body").data(key,"no");
            }else{
					var _isZ = $(this).parents("dl").hasClass("color") ? 1 : 0;
				
                if( ($(this).hasClass("no") || $(this).hasClass("chance")) ){
                    return false;
                }
				
                if($(".J-other .color").size() != 0 && $(".J-other .size").size() != 0){
					$(".J-other .color li").each(function(idx, obj) {
						if ( !$(obj).hasClass("empty_flag") ) {
							$(obj).removeClass("no");
						}
					});
                    $(".J-other .size li").removeClass("no");
                }
				
                if( !_isZ && $(this).hasClass("cur") ){
                    $(this).siblings().removeClass("cur");
                    $(this).removeClass("cur");
                } else {
                    $(this).siblings().removeClass("cur");
                    $(this).addClass("cur");
                }
                $("body").data(key,"yes");
            }
            var src = $(that).find("img").attr("src");
			//console.log( src );
            //mini购物袋图片
            if(src){
                 $('#J-mini-cart').find("img").attr("src",src);
                 $(".goods_show .deal-pic .pic img").attr("src",src.replace(/_34x34/,"_400x400"));
            }
           
        });
		
		
		//默认减号按钮为灰色
		if (Number($("input[name='amount']").val()) == 1){
			$('.decrease').addClass('no');
		}
        //通知九块邮访客开关有变
        var noticeJkyGuestswitch=function(){
            $.ajax({
                'url': __URL_JKY__+'/public/getCartGuestSwitch',
                'data': {"plat": 1},
                'dataType': 'jsonp'
            });
        }
        //获取用户是否不登录也能免注册下单
        if (XDPROFILE.uid == ''){
            $.ajax({
                'url': __URL_CART__+'/MiniCart/setGuestSwitch',
                'data': {"plat": 1},
                'dataType': 'jsonp',
                'success': function(ret){
                    if ( ret.code == 200 && XDPROFILE.guestswitch != ret.data) {
                        XDTOOL.setCookie("s_guestswitch", ret.data, {
                            expires: null,
                            path: "/"
                        });
                        //更改全局开关
                        XDPROFILE.guestswitch = ret.data;
                        //通知九块邮
                        noticeJkyGuestswitch();
                    }
                }
            });
        }

		//绑定加入购物袋click事件
        $(".submit-go .btn,.title-nav .btn,.confirm-btn a").click(function(){
        	//add by wudong
        	if(terminalFlag===0){
        		var colllectStr="收藏此商品",
        			collectStatus="";
        		if($(".sector-other .collect a").hasClass('active')){
        			collectStatus="class='collected'";
        			colllectStr="已收藏";
        		}
        		var title='此商品仅限卷皮客户端购买',
        			content='<div class="t-container">\
        					<div class="app-side-box fl">\
				                <p class="app-show"></p>\
				                <p >扫描下载卷皮客户端</p>\
				            </div>\
				            <div class="separator fl"></div>\
				            <div class="share-box fl">\
				            	<p >收藏此商品以便在客户端购买</p>\
				                <div class="collect"><a href="javascript:void(0);"><i id="collect-status" '+collectStatus+' ></i>'+colllectStr+'</a></div>\
				            </div>\
        				</div>';
        			id='alert_terminal';
        		var box=getBox(title,content,id);
        		box.init();

        		$("#alert_terminal .collect").click(function(){
        			$(".sector-other .collect a").trigger('click');
        		})
        		return;
        	}

            if($(".submit-go .btn").hasClass('no')) return false;
			//判断用户登录状态
            if ( XDPROFILE.uid == '' && XDPROFILE.guestswitch != 1 ) {
                XD.user_handsome_login_init();
                XD.user_handsome_login();
                return false;
            }
            $(".submit-go .tips,.confirm-btn .tips").remove();
            if($(this).hasClass("end")){
                //$(".submit-go,.confirm-btn").append('<p class="tips">商品已结束！</p>');
                return false;
            }else if($(this).hasClass("start")){
                //$(".submit-go,.confirm-btn").append('<p class="tips">商品还未开始哦！</p>');
                return false;
            }
            //有货提醒操作
            if($(this).hasClass('remind')){

                var gid = $("#confirm input[name='pid']").val();
                if(!gid){
                    return false;
                }
                var favken = XDTOOL.getCookie('s_sign');

                //记录有货提醒
                $.getJSON(__URL_CART__+'/MiniCart/remindRecord?callback=?',{"gid":gid,favken:favken},function(data){

                });

                //收藏该商品
                $.getJSON(__URL_JUANPI__ + '/favorite/option?callback=?', {"gid":gid, "status":1, 'app':"1",'gtype':3,favken:favken}, function(data){
                    if(data.code == 1004){
                        XD.user_handsome_login_init();
                        XD.user_handsome_login();
                    }else if(data.code == 1001 || data.code == 1100){
                        var content =  '<div class="con-go"><p class="txt">提醒成功!</p><div class="submit-go"><a href="javascript:void(0);" class="btn go_pay">去结算</a><a href="javascript:void(0);" class="btn continue">逛更多</a></div></div>';
                        b = new XDLightBox({
                            title: "",
                            lightBoxId: "shopping_alert",
                            contentHtml: content,
                            scroll: false
                        });
                        b.init();
                        $('.alert_close').click(function(){
                            location.reload();
                            box.close();
                        });
                    }
                });
                return false;
            }

            checkNum();
            $("#confirm input[name='num']").val(Number($("input[name='amount']").val()));
            if($(".J-other .size,.J-other .color").size() != $(".J-other .size .cur,.J-other .color .cur").size()){
				if ( !$(".submit-go a").hasClass("end") ) {
					$(".submit-go .tips").size() == 0 && $(".J-other").addClass("J-attention");
					$(".J-other .tips").css("display","block");
				}
                return false;
            }
            if(Number($("input[name='amount']").val()) == 0){
				bCpChange = true;
                return false;
            }


            var data = $("#confirm").serialize();
            $('.alert_close').click(function(){
                location.reload();
                box.close();
            }); 

            var skuid = $("#confirm input[name='sid']").val();
            var gnum = $('.number dd input[name=amount]').val();

         //加入购物袋
            $.ajax({
                type: 'get',
                url: __URL_CART__+'/shop/changeGoodsNum.php',
                dataType: 'jsonp',
                data:{'skuid':skuid,'num':gnum},
                success: function(data) {
                    $('#shopping_alert').remove();
                    $('.alert_fullbg').remove();
                    if(data.status == 1){
                        $(".submit-go .btn").addClass('no');
                        $(".submit-go .btn").html('<img src="http://s.juancdn.com/juanpi/images/items/ing-icon.gif">正在处理中...'); 
                        fly_cart_fun();
                       // get_mini_cart();
                        $("#J_sidebar .side-oper li.side-cart").click();
                        setTimeout(clearClass,800);
                        return false;                       
                    }else if(data.status == 2){
                        //未登录
                        XD.user_handsome_login_init();
                        XD.user_handsome_login();
                        return false;
                    }else if(data.status == 3){
                        //购物袋已满
                        var content = '<div class="tag"><div class="tips_img fl"></div><div class="con fr"><p class="txt">购物袋已经放满啦~~<br>请先结算再购买。</p><p><a href="javascript:;" class="button button_01">去结算</a></p></div></div>';
                    }else if(data.status == 1004 || data.status == 1022){
                        //每次仅限
                        $('.number .skulimitbuy').html('限购<em class="red">'+data.limitnum+'</em>件');
                        $('.number .skulimitbuy').show();
                        return false
                    }else if(data.status == 1005){
                        //库存不足
                        $('.number .skulimitbuy').html('库存不足');
                        $('.number .skulimitbuy').show();
                        return false;
                    } else if ( data.status == 3000 ) {
						 //未登录
						//console.log('超过百分比');
                        XD.user_handsome_login_init();
                        XD.user_handsome_login();
                        return false;
					}else if(data.status == 1025){
                        //每次仅限
                        $('.number .skulimitbuy').html('<em class="red">已达购买上限</em>');
                        $('.number .skulimitbuy').show();
                        return false;
                    }else{
                        //加入失败
                        var content = '<div class="cv-pop"><p><em class="st-failed"></em><span>'+data.info+'</span></p><div class="btn-close"><a href="javascript:void(0);" class="alert_close">关闭</a></div></div>';
                        
                    }
                    var box = new XDLightBox({
                        title:'',
                        lightBoxId:'shopping_alert',
                        contentHtml:content,
                        scroll:true,
                        isBgClickClose:false
                    });
                    box.init();
                    $('.alert_close').click(function(){
                        location.reload();
                        box.close();
                    });


                },
                error: function () {
                    var content = '<div class="con-go"><p>操作失败，请稍后再试</p></div>';
                    var box = new XDLightBox({
                        title:'',
                        lightBoxId:'shopping_alert',
                        contentHtml:content,
                        scroll:true,
                        isBgClickClose:false
                      });
                    box.init();

                },
                complete: function(){
                }
            });
			//特卖加入购物车数据埋点
			_paq.push(['trackEvent', 'temai', 'click_add_cart', 'skuid', skuid,]);
            return false;
        });


        //去结算按钮
        $('#shopping_alert .submit-go .go_pay,#shopping_alert .tag .button_01').live('click',function(){
            window.location.href = __URL_CART__;
        });

        //继续购物按钮
        $('#shopping_alert .submit-go .continue').live('click',function(){
            window.location.href = __URL_JUANPI__;
        });

        
        $(".J-other .J_PanelCloser,.J-other .confirm-btn").click(function(){
            $(".J-other").removeClass("J-attention");
            $(".J-other .confirm-btn").hide();
        });

        $(".title-nav .btn").click(function(){
            $(window).scrollTop(300);
        });

        //数量减操作
        $(".number .decrease").click(function(){
			if ( $(this).hasClass("no") ) return false; 
            var num = parseInt($("input[name='amount']").val());//购买数量
            var limitnum = $('.number dd').attr('_sku_limit_buy');
            if(num > 1){
                $("input[name='amount']").val(num-1);
                $('.decrease,.increase').removeClass('no');
            }else{
                $(this).addClass('no');
            }
            
			$('.number .skulimitbuy').html('限购<em class="red">'+limitnum+'</em>件');
            $('.number .skulimitbuy').hide();
			
        });

        //数量加操作
        $(".increase").click(function(){
			if ( $(this).hasClass("no") ) return false; 
            var num = parseInt($("input[name='amount']").val());//购买数量
            var has_buy = parseInt($(".number dd:eq(0)").attr('_realbuy'));//已购买商品数量
            var sku_limit_buy = parseInt($(".number dd:eq(0)").attr('_sku_limit_buy'));//sku限购数
            var sku_left = parseInt($(".number dd .stock b").text()); //sku仅剩数
            if(isNaN(num)){
                num = 1;
            }
            if(isNaN(has_buy)){
                has_buy = 0;
            }

            if(isNaN(sku_limit_buy)){
				if (XDPROFILE.uid == '') {
					sku_limit_buy = 2;
				} else {
					sku_limit_buy = 5;
				}
            }
            var user_buy_num = num + has_buy;
            if(!isNaN(sku_left) && num >= sku_left ){
                $('.increase').addClass('no');
            }else if(user_buy_num >= sku_limit_buy){
                $('.number .skulimitbuy').show();
                $('.increase').addClass('no');
            }else{
                $('.number .skulimitbuy').hide();
                $("input[name='amount']").val(num+1);
                $('.decrease').removeClass('no');
            }

        });
		
		//数量input框键盘事件
        $("input[name='amount']").keyup(function(event){
            if(event.keyCode != 8){
                if($(".submit-go .btn").hasClass("end")){
                    $("input[name='amount']").val(1);
                    return ;
                }
                checkNum();
            }
        });

        $("input[name='amount']").blur(function(){
			checkNum();
        })
		
		//购买数量校正
        var checkNum = function(){
            var num = parseInt($("input[name='amount']").val());//购买数量
            var has_buy = parseInt($(".number dd:eq(0)").attr('_realbuy'));//已购买商品数量
            var sku_limit_buy = parseInt($(".number dd:eq(0)").attr('_sku_limit_buy'));//sku限购数
            if(isNaN(num)){
                num = 1;
            }
            if(isNaN(has_buy)){
                has_buy = 0;
            }
            if(isNaN(sku_limit_buy)){
                sku_limit_buy = 5;
            }
            var user_buy_num = num + has_buy;

            var re = /^[1-9]+[0-9]*]*$/;
            if(num == 0 || XDTOOL.empty(num) || !re.test(num)){
                $("input[name='amount']").val(1);
                $('.increase,.decrease').removeClass('no');
            }else if(user_buy_num > sku_limit_buy){
                $("input[name='amount']").val(sku_limit_buy);
                $('.number .skulimitbuy').show();
                $('.increase').addClass('no');
                $('.decrease').removeClass('no');
            }else{
                $('.number .skulimitbuy').hide();
                $("input[name='amount']").val(num);
                $('.increase').removeClass('no');
                $('.decrease').removeClass('no');
            }

        }
		
        $(window).scroll(function() {
		
			if($('.slide-box-tab li').size()==0){
				$('.slide-box-tab').hide();
				$(".content .slide-box").css('height','auto');
			};
		
            if($(window).scrollTop() > $(".content").offset().top){
                $(".content .slide-box").addClass("fixed");
				$(".slide-box-main .fl .seller").show();
            }else{
                $(".content .slide-box").removeClass("fixed");
					$(".slide-box-main .fl .seller").hide();
					$('.slide-box').css('height','');
            }
            if($(window).scrollTop() > $(".content").offset().top && $(".content").height()-$(".content .title-nav").height() > $(".content .right-show").height()){
			
                $(".content .right-show").addClass("rightfixed");
                if($(window).scrollTop() > $(document).height()-1000){
                    $(".content .right-show").css("top",$(document).height()-$(window).scrollTop()-1000);
                }else{
                    $(".content .right-show").css("top",-10);
                }
            }else{
                $(".content .right-show").removeClass("rightfixed");
            }
        });

        var time_zero = function (s) {
            return s < 10 ? '0' + s: s;
        }
		
        var shop_countdown = function(){
            var edate = new Date($(".su-time .price").data("etime")*1000);
            var Temp = new JP_time(edate);
            if(Temp.timerRunning){
                Temp = Temp.data;
                $(".su-time .price").html(
                    '<span><em>'+time_zero(Temp.D)+'</em>天<em>'+time_zero(Temp.H)+'</em>小时<em>'+time_zero(Temp.M)+'</em>分</span>'
                );
            }else{
                $(this).html(
                    '<span><em>00</em>天<em>00</em>小时<em>00</em>分</span>'
                );
            }

        }

        var timeStart = function (){
            shop_countdown();
            setTimeout(arguments.callee,30000);
        }
        timeStart();
		//没有二级标签，删除块
		if($('.slide-box-tab li').size()==0){
			$('.slide-box-tab').hide();
			$('.slide-box').css('height','50px');
			$('.content .tm-goodsinfo').css({'padding':'5px 40px 60px', 'margin':'0 0 40px'});
		}
        $(".slide-box-main li").click(function(){
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
			if($(this).index()==1 || $(this).index()==2){
				$('.slide-box-tab').hide();
				$('.slide-box').css('height','auto');
			}else{
				if($('.slide-box-tab li').size()==0){
					$('.slide-box-tab').hide();
					$(".content .slide-box").css('height','auto');
				}else{
					$('.slide-box-tab').show();
					$('.slide-box').css('height','90px');
				}
			}
        });
		$(".cp01 li").mouseover(function(){
		  $(this).siblings().removeClass("active");
            $(this).addClass("active");
			var i = $(this).index(); 
		 $(".cp02 .cp-con").hide();
         $(".cp02 .cp-con:eq("+i+")").show(); 
		});

        if($(".slide-box").data("default") == "order"){
            $(window).scrollTop($(".content").offset().top);
            $(".slide-box li:eq(2)").click();
        }
       
        //ajax 判断商品收藏状态
        var getFavStatus = function(){
        	if (XDPROFILE.uid != '') {
				var gid =$(".goods_show").data("gid");
				$.getJSON(__URL_JUANPI__+ '/favorite/isFavorite?callback=?', {"gid":gid,"g_type":3}, function(data){
						if( data.code=="1000"){
							$(".sector-other .collect a").html("<i></i>已收藏").addClass("l-actives active");
						}
					}
				).error(function() {
				});
			}
		}
		getFavStatus();

        //用户收藏事件
		$(".sector-other .collect a").click(function(){
			var that = this;
			if (XDPROFILE.uid == '') {
			XD.user_handsome_login_init();
			XD.user_handsome_login();
			return false;
			}
			if($("body").data("f_islock")=="yes"){
			 return false;
			}else{
			 $("body").data("f_islock","yes");
			}
			var do_status = $(this).hasClass("active")?0:1;
			var gid = $(".goods_show").data("gid");
			var favken = XDTOOL.getCookie('s_sign');
			$.ajax({
				type: 'GET',
				url: __URL_JUANPI__ +"/favorite/option",
				dataType: 'jsonp',
				jsonp: 'callback',
				data:{"gid":gid, "status":do_status, "app":"1","gtype":3,"favken":favken},
				success: function(data) {
					$("body").data("f_islock","no");
					if( data && (data.code == 1001 || data.code == 1100)){
						if(data.code == 1100){
						 var title = '添加商品至“我的收藏”';
						 var content =  '<div class="top_tips"><p><em class="over">收藏成功，你可在手机端随时随地找到你喜欢的宝贝了！</em></p> </div>'
							 +'<p class="app-show"></p>'
							 +'<div class="foot_tips">还没有安装客户端？<a  href="'+__URL_JUANPI__+'/apps" class="foot_app">点击下载</a>'
							 +'</div>';
						 var box = getBox(title,content,'alert_remind');
						 box.init();
						}
						if(do_status==1){
						  $(that).html("<i></i>已收藏").addClass("l-actives active");

						  var collectEle=$("#collect-status");
						  if(collectEle){
						  		collectEle.parent('a').html('<i id="collect-status" class="collected"></i>已收藏');
						  }
						  
							
						}else{

						  $(that).html("<i></i>收藏").removeClass("l-actives active");

						  var collectEle=$("#collect-status");
						  if(collectEle){
						  		collectEle.removeClass('collected');
						  		collectEle.parent('a').html('<i id="collect-status"></i>收藏此商品');
						  }

							
						}
					}else if(data && data.code == 1004){
						 XD.user_handsome_login_init();
						 XD.user_handsome_login();
					}else{
					 return false;
					}
				}
			});
			 
			//特卖数据埋点
			if(do_status == 1){
				_paq.push(['trackEvent', 'temai', 'click_goods_collect', 'goodsid', gid,]);
			} else {
				_paq.push(['trackEvent', 'temai', 'click_goods_cancelcollect', 'goodsid', gid,]);
			}
		});
    
	
    //收藏 抢光弹框
    function getBox(title,content,id) {
        var box = new XDLightBox({
            title:title,
            lightBoxId:id,
            contentHtml:content,
            scroll:true
        });

        return box;
    }
}
});
