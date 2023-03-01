(function($){
    $.fn.slowShow = function(ele,time){
        time = time == undefined?100:time;
        var timer=null;
        clearInterval(timer);
        this.hover(function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    ele.show();
                },time);
            },
            function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    ele.hide();
                },time);
            }
        )
    }



})(jQuery);

(function($){

    if (XDPROFILE.uid != '') {
        var gidArray = new Array();
        $(".y-like").each(function(){
            var gid = $(this).data("gtype") == 3?"t"+$(this).data("gid"):$(this).data("gid");
            gidArray. push(gid);
        });
        $.getJSON(__URL_JUANPI__ + '/favorite/goods_fav_status?callback=?', {"g_ids":gidArray.join(","),"favken":$("input[name='favken']").val()}, function(data){
                if(data.code == 1001){
                    $.each(data.data,function(key,val) {
                        val = val.replace(/[^0-9]/ig,"");
                        if($(".y-like[data-gid='"+val+"']").find(".like-ico").size() != 0){
                            !$(".y-like[data-gid='"+val+"']").parents("li").find(".list-good").hasClass("gone") && $(".y-like[data-gid='"+val+"']").show();
                            $(".y-like[data-gid='"+val+"']").find(".like-ico").addClass("l-active");
                        }else{
                            $(".y-like[data-gid='"+val+"']").addClass("active");
                            $(".y-like[data-gid='"+val+"']").html($(".y-like[data-gid='"+val+"']").html().replace(/已收藏/,"收藏"));
                            $(".y-like[data-gid='"+val+"']").html($(".y-like[data-gid='"+val+"']").html().replace(/收藏/,"已收藏"));
                        }
                    });
                }
            }
        ).error(function() {
            });
    }

    $(".y-like").live("click",function(){
        if (XDPROFILE.uid == '') {
            XD.user_handsome_login_init();
            XD.user_handsome_login();
            return false;
        }
        if($(this).find(".like-ico").size() != 0){
            var do_status = $(this).find(".like-ico").hasClass("l-active")?0:1;
        }else{
            var do_status = $(this).hasClass("active")?0:1;

        }
        var likeObj = $(this);
        var gid = $(this).data("gid");
        var g_type = $(this).data("gtype");
        if(!gid || !g_type){
            return;
        }

		var favken = XDTOOL.getCookie('s_sign');

		//特卖收藏数据埋点,放在最后有小bug，故放在前面
        if(g_type==3){
            if(do_status == 1){
               _paq.push(['trackEvent', 'temai', 'click_collect', 'goodsid',gid,]);
            }
            else{
               _paq.push(['trackEvent', 'temai', 'click_cancel_collect', 'goodsid',gid,]);
            }
            
        }
		$.ajax({
			type: 'GET',
			url: __URL_JUANPI__ + '/favorite/option',
			data: {"gid":gid, "status":do_status, 'app':"1", 'gtype':g_type, 'favken':favken},
			dataType: 'jsonp',
			success: function(data) {
				if(data.code == 1004){
                    XD.user_handsome_login_init();
                    XD.user_handsome_login();
                }else{
                    $(".y-like[data-gid='"+gid+"']").each(function(){
                        $(this).find(".like-ico").toggleClass("l-active");
                        $(this).toggleClass("active");
                        $(this).html($(this).html().replace(/已收藏/,"收藏"));
                        if(do_status == 1){
                            $(this).addClass("active");
                            $(this).html($(this).html().replace(/收藏/,"已收藏"));
                        }else{
                            $(this).removeClass("active");
                            $(this).html($(this).html().replace(/已收藏/,"收藏"));
                        }
                    });
                    if(likeObj.find(".like-ico").size() != 0){
                        $("#likeico").remove();
                        likeObj.append('<div id="likeico"><span class="heart_left"></span><span class="heart_right"></span></div>');
                        setTimeout(function(){$("#likeico").remove()}, 600);
                        if(do_status == 1){
                            $("#likeico").removeClass('unliked').addClass('like-big').addClass('demo1');
                            likeObj.css("display","inline");
                        }else{
                            $("#likeico").removeClass('like-big').addClass('unliked').removeClass('demo1');
                            likeObj.css("display","");
                        }
                    }else{
                        if(data.code == 1001 || data.code == 1100){
                            if(data.code == 1100 && do_status == 1){
                                var content =  '<div class="top_tips"><p><em class="over">收藏成功，你可在手机端随时随地找到你喜欢的宝贝了！</em></p> </div>'
                                    +'<p class="app-show"></p>'
                                    +'<div class="foot_tips">还没有安装客户端？<a  href="'+__URL_JUANPI__+'/apps" class="foot_app">点击下载</a>'
                                    +'</div>';
                                b = new XDLightBox({
                                    title: "添加商品至“我的收藏”",
                                    lightBoxId: "alert_remind",
                                    contentHtml: content,
                                    scroll: false
                                });
                                b.init();
                            }


                            if(likeObj.find(".like-ico").size() == 0){
                                if(do_status == 1){
                                    var li = '<li li-id="'+data.data.uid+'"><a href="http://www.kimiwang.com/u/'+data.data.uid+'" target="_blank"><img src="http://s1.juancdn.com/'+data.data.avatar+'_80x80.jpg" width="35px" height="35px" alt="'+data.data.username+'" title="'+data.data.username+'"></a></li>';
                                    if($('.share_people:eq(0) ul').size() == 0){
                                        $('.share_people:eq(0) span').replaceWith("<ul>"+li+"</ul>");
                                    }else{
                                    	if($('.share_people:eq(0) li').size() >= 12){
                                    		$('.share_people:eq(0) li:last').remove();
                                    	}
                                        $('.share_people:eq(0) ul').prepend(li);
                                    }
                                }else{
                                    if($('.share_people:eq(0) li').size() == 1){
                                        $('.share_people:eq(0) ul').replaceWith("<span>暂无用户收藏</span>");
                                    }else{
                                        $('.share_people:eq(0) ul li[li-id='+data.data.uid+']').remove();
                                    }
                                }
                            }

                        }

                    }

                }
			}
		});


    });




})(jQuery);

(function($){
    $("img.lazy").lazyload({threshold:200,failure_limit:30});

    /**
     * 服饰折扣推荐显示
     */
    if($('html.w1200').size()>0){
        $('.brand-show .brand-logo').show();
    }else{		
		if($('.baby-brand-show').size()>0){
            strlength = $('.baby-brand-show .brand-window li').length;
            for(i=strlength-1; i<=strlength; i++){
                $('.baby-brand-show .brand-window li')[i].remove();
            }
		}
        $('.brand-show .brand-logo').hide();
    }

    /**
     * 搜索
     * @author xueli@kimiwang.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    searchFun = function () {
        var $search_txt = $("#keywords");
        $search_txt.on('focusin', function () {
            if ($(this).val() == "请输入想找的宝贝") {
                $(this).val("");
            } else {
                $(this).css({
                    color: '#646464'
                });
            }
        }).on('focusout', function () {
                if ($(this).val() == "") {
                    $(this).val("请输入想找的宝贝");
                    $(this).css({
                        color: '#C6C6C6'
                    });
                }
            }).on('focus', function () {
                if ($(this).val() == "请输入想找的宝贝") {
                    $(this).val("");
                    $(this).css({
                        color: '#666'
                    });
                } else {
                    $(this).css({
                        color: '#646464'
                    });
                }
            });

        $(".search .smt").on('click', function () {
            if ($search_txt.val() == "请输入想找的宝贝" || $search_txt.val() == "") {
                return false;
            }
            var s_url = $("#search_action").val() + '?keywords=' + $search_txt.val();
            window.location.href = s_url;
        });
        $search_txt.on('keydown', function (event) {
            if (event.keyCode == 13) {
                var s_url = $("#search_action").val() + '?keywords=' + $search_txt.val();
                window.location.href = s_url;
            }
        });
    }
    searchFun();

    /**
     * 用户数据初始化
     * @author xueli@kimiwang.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    statusInit = function(){
        $(".state-show .normal-side-box").remove();$(".side_right .normal-side-box:last").remove();
        //导航签到
        if (XDPROFILE.uid == '') {
            //未登录
            $(".state-show").append('<div class="normal-side-box"><div class="box-tips"><p class="text">每天最多可赚：<b>100</b> 积分<br><a target="_blank" href="http://'+window.location.host+'/jifen/task">赚积分攻略</a></p><p class="other"> <a target="_blank" href="http://'+window.location.host+'/user/beans">我的积分</a>&#12288;｜&#12288;<a target="_blank" href="http://'+window.location.host+'/jifen">积分商城</a><br><a target="_blank" href="http://'+window.location.host+'/jifen/">新手任务，轻松起步！</a><br>QQ特享群：<b>454405064</b> </p></div></div>');
           
        }else{
            var signData = XDTOOL.getCookie('sign_'+__XD_USER__.uid);
            if(signData != undefined && signData != null && signData.trim() != ''){
                var json = decodeURIComponent(signData);
                json = $.parseJSON(json);
                if(json.code == 1001){
                    
                }else{
                   
                }
            }else{
                $.getJSON(__URL_MEMBER__ + "/public/pointLoadJson?uid="+__XD_USER__.uid+"&callback=?", function(json) {
                    if(json.code == 1001){
                      
                    }else{
                      
                      
                    }
                });
            }
        }
        $(".state-show .dosign,.state-show .normal-side-box").slowShow($(".state-show .normal-side-box"));

        //右侧滚动购物袋
        $(".side_right .trigger:eq(0)").hover(function(){
            var $bag_tool = $(this).parents('.side_right').find('.bag-tool');
            $(".side_right .normal-side-box:eq(0)").show();
            $bag_tool.html('<div id="loadingimg" style="display:none;"></div>');
            $bag_tool.find('#loadingimg').show();
            if (XDPROFILE.uid == '') {
                //未登录
                $('.cartnum').hide();
                $('.bag-show .bag-a span.fl').addClass('empty');
                $('.bag-show .bag-a span.fl').html('购物袋（<em class="cartnum">0</em>）');
                $('.carttime').hide();
                $bag_tool.addClass('bag-tool-empty');
                $bag_tool.html('<div id="loadingimg" style="display:none;"></div><p><span class="icon-normal icon-bag-empty"></span>好像还没有<a href="'+__URL_MEMBER__+'/login">登录</a>哦~</p>');
            }else{
                $.ajax({
                    type: 'get',
                    url: __URL_CART__+'/MiniCart/miniCartList',
                    dataType: 'jsonp',
                    success: function(data) {
                        if(data.status == 1){
                            $(".side_right .normal-side-box:eq(0)").removeClass('empty');
                            $(".side_right .normal-side-box:eq(0) .bag-tool").removeClass('bag-tool-empty');
                            //购物袋列表
                            var carthtml = '<div id="loadingimg" style="display:none;"></div>';
                            carthtml = '<ul class="clear">';
                            $.each(data.data, function(index, val){
                                carthtml += '<li><a target="_blank" class="pic fl" href="'+__URL_SHOP__+'/deal/'+val['productId']+'"><img class="lazy" d-src="'+__UPLOAD__+val['pic']+'_60x60.jpg" src="http://s.juancdn.com/common/images/blank_90x90.png"></a>';
                                carthtml += '<div class="detail">';
                                carthtml += '<p class="title"><a target="_blank" href="'+__URL_SHOP__+'/deal/'+val['productId']+'">'+val['title']+'</a><span class="fr"><em>￥</em>'+val['total']+'</span></p><p class="normal">';
                                if(val['fidVal'] != ''){carthtml += '尺码：'+val['fidVal'];}
                                carthtml += '<a href="javascript:;" class="del fr">删除</a></p><p class="normal">';
                                if(val['zidVal'] != ''){carthtml += '颜色：'+val['zidVal'];}
                                carthtml += '</p></div><div class="tips_alert" style="display:none;"><div class="mask_bg"></div><div class="btn_all"><a class="btn btn01" data-skuid="'+val['size_id']+'" href="javascript:;">删除</a><a class="btn btn02" href="javascript:;">保留</a></div></div></li>';
                            });
                            carthtml += "</ul>";
                            carthtml += '<div class="amount"><span class="fl">共<em class="cartnum">'+data.goodsNum+'</em>件商品</span><a class="fr btn" target="_blank" href="'+__URL_CART__+'">去购物袋结算</a></div>'
                            $bag_tool.html(carthtml);
                            $(".tag-side-box img.lazy").lazyload({threshold:200,failure_limit:30});
                            $('.cartnum').text(data.goodsNum);
                            $bag_tool.find('ul li:last').addClass('last');

                        }else if(data.status == 2){
                            //未登录
                            $('.cartnum').hide();
                            $('.bag-show .bag-a span.fl').addClass('empty');
                            $('.bag-show .bag-a span.fl').html('购物袋（<em class="cartnum">0</em>）');
                            $('.carttime').hide();
                            $bag_tool.addClass('bag-tool-empty');
                            $bag_tool.html('<div id="loadingimg" style="display:none;"></div><p><span class="icon-normal icon-bag-empty"></span>好像还没有<a href="'+__URL_MEMBER__+'/login">登录</a>哦~</p>');
                        }else{
                            //购物袋为空
                            $('.cartnum').hide();
                            $('.bag-show .bag-a span.fl').addClass('empty');
                            $('.bag-show .bag-a span.fl').html('购物袋<em class="cartnum">0</em>');
                            $('.carttime').hide();
                            $bag_tool.parent().addClass('empty');
                            $bag_tool.addClass('bag-tool-empty');
                            $bag_tool.html('<div id="loadingimg" style="display:none;"></div><p><span class="icon-normal icon-bag-empty"></span>购物袋还是空荡荡的~</p>');
                        }
                        $bag_tool.find('#loadingimg').hide();
                    },
                    error: function () {
                        $bag_tool.parent().addClass('empty');
                        $bag_tool.addClass('bag-tool-empty');
                        $bag_tool.html('<p><span class="icon-normal icon-bag-empty"></span>操作失败，请稍后再试~</p>');
                    }
                });
            }
        },function(){
            $(".side_right .normal-side-box:eq(0)").hide();
        });

        $(".side_right .normal-side-box:eq(0)").hover(function(){
            $(this).show();
        },function(){
            $(this).hide();
        });

        $(".side_right .trigger:eq(1),.side_right .normal-side-box:eq(1)").slowShow($(".side_right .normal-side-box:eq(1)"));
        $(".side_right .trigger:eq(2),.side_right .normal-side-box:eq(2)").slowShow($(".side_right .normal-side-box:eq(2)"));
        $(".side_right .normal-side-box").size() == 1 && $(".side_right .normal-side-box").css("top","-65px");

        if (XDPROFILE.uid != '') {
            $.getJSON(__URL_MEMBER__ + "/Public/message?callback=?", function(data) {
                if(typeof(data) != "undefined " && data != 0 ){
                    $('.personal-show .count ').show();
                    $('.personal-show .count ').html('<i>'+data+'</i>');
                }
            });
        }
    }
    statusInit();


    var tpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">签到成功，获得 <em class="red_1">{DOU}</em> 积分</p>'
        +'<p class="sum">您已连续签到{NUM}天，<br>明天继续签到，可获得 <em class="red_1">{tDou}</em> 积分</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var checkedTpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">您今天已经签到过了</p>'
        +'<p class="sum">明天继续签到，可获得 <em class="red_1">{tDou}</em> 积分</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var failTpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">签到失败！</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var failCookie='<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">为避免刷小号现象,即日起每台电脑仅允许一个帐号进行签到!</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var failMajia='<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<label>验证码：</label>'
        +'<input type="text"  placeholder="验证码" name="code" id="code" autocomplete="off">'
        +'<img src="'+__URL_MEMBER__+'/public/verify" id="verify" onclick="this.src='+__URL_MEMBER__+'/public/verify?\'+(new Date()).getTime()" >'
        +'</div>'
        +'<div class="maJiabtn"><input type="submit"  value="签到" autocomplete="off" /></div>'
        +'</div>';


    function closeAlert(){
        $(".alert_bg").remove();
        $(".alert_fullbg").remove();
    }
    //获取焦点就去除错误提示
    $("[name='mjcode']").live('focus',function(){
        $("#mj_warn_1,#mj_warn_2").css("display","none");
    });

    //取消提交验证
    $("#mjclear,.alert_close").live("click",function(){
        var that = this;
        $(".phone-verify").attr("disabled",false);
        $(".phone-verify").val("获取验证码");
        if($(that).attr("class")!="alert_close"){
            $(".alert_close").click();
        }

    });

    //确认提交验证码
    $("#mjconfirm").live('click',function(){
        var btn =  $(this);
        //验证是否登录
        if (XDPROFILE.uid == "") return XD.user_handsome_login_init(),
            XD.user_handsome_login(),
            false;

        if(btn.data('lock')) return false;
        btn.data('lock', 1);
        var code = $("[name='mjcode']");
        if(code.val()==""){
            $("#mj_warn_2").css("display","none");
            $("#mj_warn_1").css("display","block");
            return false;
        }

        $.getJSON(__URL_MEMBER__ + "/public/doSign?uid="+XDPROFILE.uid+"&code="+code.val()+"&callback=?", function(d) {
            //马甲验证
            if(d.code==1100){
                closeAlert();
                alert_robot();
                btn.data('lock',0);
                return;
            }else if( (d.code == 1005) && ((d.msg == "error"))){
                closeAlert();
                return XD.user_handsome_login_init(),
                    XD.user_handsome_login(),
                    false;
            }else if ( (d.code == 1001) && ((d.msg == "succuss"))) {
                var box_tpl = tpl
                    .replace(/{DOU}/, d.Dou)
                    .replace(/{tDou}/, d.tDou)
                    .replace(/{NUM}/, d.lastNum)
            }else if( (d.code == 1004) && (d.msg == "succuss")) {
                var box_tpl = checkedTpl
                    .replace(/{tDou}/g,  d.tDou);
            }else if( (d.code == 1102) && (d.msg == "error")) {
                var box_tpl = failCookie;
            }else if( (d.code == 1103) && (d.msg == "error")) {
                closeAlert();
                btn.data('lock', 0);
                showMjVerfiyAlert();
                return;

            }else if( (d.code == 1105) && (d.msg == "error")) {
                btn.data('lock', 0);
                $("#mj_warn_2").find(".tips_txt").html('验证码错误');
                $("#mj_verfiy").click();
                $("#mj_warn_1").css("display","none");
                $("#mj_warn_2").css("display","block");

                return;

            }else{
                var box_tpl = failTpl;
            }
            closeAlert();
            var box = new XDLightBox({
                title:'每日签到送积分',
                lightBoxId:'alert_sign',
                contentHtml:box_tpl,
                scroll:true
            });
            box.init();
            btn.data('lock', 0);
            statusInit();
            //关闭弹出框
            $(".alert_close").live('click', function(){
                $('#alert_sign').hide();
            });
        });


    });
    /**
     * 弹出验证码框
     *
     */
    var showMjVerfiyAlert = function(){
        var htmlMsg = '<div class="sign-show clear">'
            +'<ul><li class="clear">'
            +'<input type="text" name="mjcode" class="check-code mr10 fl" />'
            +'<a href="javascript:;" id="mj_verfiy" class="fl"><img src="/verify"  onclick="this.src=\'http://user.kimiwang.com/public/verify?\'+(new Date()).getTime()"/></a>'
            +'<p class="link-tips link-tips05 mt10" id="mj_warn_1" style="display:none;">'
            +'<span class="title_cur"></span>'
            +'<span class="tips_ico"><i></i></span>'
            +'<span class="tips_txt">请输入图片验证码</span>'
            +'</p>'
            +'<p class="link-tips link-tips05 mt10 " id="mj_warn_2" style="display:none;">'
            +'<span class="title_cur"></span>'
            +'<span class="tips_ico"><i></i></span>'
            +'<span class="tips_txt">验证码错误</span>'
            +'</p>'
            +'</li>'
            +' <li>'
            +'<div class="btn mt20 clear"><a class="sub mr15 fl" id="mjconfirm" href="javascript:;">确认</a> <a id="mjclear" class="sub sub01 fl" href="javascript:;">取消</a></div>'
            +'</li></ul></div>'

        var c = new XDLightBox({
            title: "请输入图片验证码",
            lightBoxId: "alert_check_code",
            contentHtml: htmlMsg,
            scroll: false,
            isBgClickClose: false
        });
        c.init();
    }

    //签到领积分
    $(".state-show .normal-a:last,#sign-point").live('click', function(){

        var btn = $(this);

        /*var isSign= btn.find("em.text").html()=="已签到"?true:false;
        if(isSign){
            return;
        }*/

        //验证是否登录
        if (XDPROFILE.uid == "") return XD.user_handsome_login_init(),
            XD.user_handsome_login(),
            false;
        if(btn.data('lock')) return false;
        btn.data('lock', 1);

        
		 $.getJSON(__URL_MEMBER__ + "/public/doSign?uid="+XDPROFILE.uid+"&callback=?", function(d) {
			//马甲验证
			if(d.code==1100){
				alert_robot();
				btn.data('lock', '');
				return;
			}else if( (d.code == 1005) && ((d.msg == "error"))){
				return XD.user_handsome_login_init(),
					XD.user_handsome_login(),
					false;
			}else if ( (d.code == 1001) && ((d.msg == "succuss"))) {
				var box_tpl = tpl
					.replace(/{DOU}/, d.Dou)
					.replace(/{tDou}/, d.tDou)
					.replace(/{NUM}/, d.lastNum)
			}else if( (d.code == 1004) && (d.msg == "succuss")) {
				var box_tpl = checkedTpl
					.replace(/{tDou}/g,  d.tDou);
                    }else if( (d.code == 1102) && (d.msg == "error")) {
                        var box_tpl = failCookie;
                    }else if( (d.code == 1103) && (d.msg == "error")) {
                        btn.data('lock', 0);
                        showMjVerfiyAlert();
                        return;

			}else{
				var box_tpl = failTpl;
			}
			var box = new XDLightBox({
				title:'每日签到送积分',
				lightBoxId:'alert_sign',
				contentHtml:box_tpl,
				scroll:true
			});
			box.init();
			btn.data('lock', 0);
			statusInit();
			//关闭弹出框
			$(".alert_close").live('click', function(){
				$('#alert_sign').hide();
			});
		});
      
		//签到行为数据埋点
		_paq.push(['trackEvent', 'jifen', 'click_dosign', 'uid', XDPROFILE.uid,]);

    });




    /**
     * 顶部导航隐藏显示功能
     * @author xueli@kimiwang.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    allMenu_show=function(){
        if((document.domain == "www.jiukuaiyou.com" || document.domain == "ju.jiukuaiyou.com") && $(".top_bar").size() > 0) return;
        $(".nav ul li:first").removeClass("open");
        var timer=null;
        $(".nav ul li:first").hover(
            function(){
                var mu=$(this);
                timer=setTimeout(function(){
                    mu.addClass("open");
                },100);
            },
            function(){
                clearTimeout(timer);
                $(this).removeClass("open");
            }
        );
    }
    allMenu_show();

    /**
     * 页面向下滑动时，给左边侧标题栏增添'九块邮'图像
     * @author xueli@kimiwang.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    var $navFun_1 = function() {
        var st = $(document).scrollTop(),
            headh = $("div.header").height(),
            $nav_classify = $("div.jiu-side-nav");
        if(st > headh){
            $nav_classify.addClass("fixed");
        } else {
            $nav_classify.removeClass("fixed");
        }

    };

    /**
     * 右侧返回顶部
     * @author xueli@kimiwang.com
     * @date   2014-10-14
     * @return {[type]}   [description]
     */
    var $navFun_2 = function() {
        var st = $(document).scrollTop(),
            winh = $(window).height(),
            doch = $(document).height(),
            headh = $("#toolbar").height(),
            header = $(".header").height(),
            $nav_classify = $("div.side_right");

        if(st > headh + header){
            $nav_classify.show()
            $nav_classify.addClass('fix')
        } else {

            $nav_classify.hide()
            $nav_classify.removeClass('fix')
        }
    };

    var $navFun = function(){
        $navFun_1();
        $navFun_2();
    }

    /**
     * fangfang，绑定滚动函数
     * @param {}
     * @time 2014-02-12
     */
    /*var F_nav_scroll = function () {
        if(navigator.userAgent.indexOf('iPad') > -1){
            return false;
        }
        if (!window.XMLHttpRequest) {
           return;
        }else{
            $(".side_right").css("bottom",($(window).height()-$(".side_right").height())/2-100);
            //默认执行一次
            $navFun();
            $(window).bind("scroll", $navFun);
        }
        $(window).resize(function(){
            $(".side_right").css("bottom",($(window).height()-$(".side_right").height())/2-100);
        })
    }*/
    //F_nav_scroll();

    $('a.go-top').click(function(){
        $('body,html').animate({scrollTop:0},500);
    });
    $('#J_sidebar .side-box a#J_backtop').click(function(){
        $('body,html').animate({scrollTop:0},500);
    });
    //显示回到顶部按钮
    var backtop_show=function(){
        $(window).scroll(function(){
            var st=$(window).scrollTop();
            if(st>0){
               $("a#J_backtop").css("display","block"); 
            }
            else{
                $("a#J_backtop").css("display","none");
                $("a#J_backtop").parents().find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
            }
        })
    }
    backtop_show();
    /**
     * 首页幻灯片
     * @param {}
     * @time 2015-01-13
     */

    var carousel_index = function(){
        if($(".banner li").size() == 1) $(".banner li").eq(0).css("opacity", "1");
        if($(".banner li").size() <= 1) return;
        var i = 0,max = $(".banner li").size()- 1,playTimer;
        $(".banner li").each(function(){
            $(".adType").append('<a></a>');
        });
    //初始化
        $(".adType a").eq(0).addClass("current");
    $(".banner li").eq(0).css({"z-index":"2","opacity":"1"});
    var playshow=function(){
        $(".adType a").removeClass("current").eq(i).addClass("current");
        $(".top_bar .banner li").eq(i).css("z-index", "2").fadeTo(500, 1, function(){
        $(".top_bar .banner li").eq(i).siblings("li").css({
                  "z-index": 0,
                  opacity: 0
        }).end().css("z-index", 1);
        });
    }
    var next = function(){
      i = i>=max?0:i+1;
      playshow()
    }
    var prev = function(){
      i = i<=0?max:i-1;
      playshow()
    }
        var play = setInterval(next,3000);
        $(".banner li a,.banner_arrow").hover(function(){
            clearInterval(play);
            $(".banner_arrow").css("display","block");
        },function(){
            clearInterval(play);
            play = setInterval(next,3000);
            $(".banner_arrow").css("display","none");
        });
        $(".banner_arrow .arrow_prev").on('click', _.throttle(function(event) {
          prev();
        },600) );
        $(".banner_arrow .arrow_next").on('click', _.throttle(function(event) {
          next();
        },600) );
        $(".adType a").mouseover(function(){
            if($(this).hasClass("current")) return;
            var index = $(this).index()-1;
            var playTimer = setTimeout(function(){
                clearInterval(play);
                i = index;
                next();
            },500)
        }).mouseout(function(){
                clearTimeout(playTimer);
            });
    }
    carousel_index();

    /**
     * 将文字信息上下滚动
     * Author: zhuwenfang
     * Date: 14-01-10
     * Time: PM 16:55
     * Function: scrolling the dom 'li' up&down
     **/
    var liAutoScroll = function(){
        var liScrollTimer;
        var $obj = $('.links_list_box');
        $obj.hover(function(){
            clearInterval(liScrollTimer);
        }, function(){
            liScrollTimer = setInterval(function(){
                $obj.find(".links_list").animate({
                    marginTop : -20 + 'px'
                }, 500, function(){
                    $(this).css({ marginTop : "0px"}).find("li:first").appendTo(this);
                });

            }, 3000);
        }).trigger("mouseleave");

    }
    liAutoScroll();


    /**
     * 右侧购物袋交互
     * Author:phpdance
     * 2015-03-26新增
     * */
    var $obj=null;
    var timer=null;
    var normal_show_fun=function(){
        clearInterval(timer);
        $('#J_sidebar .side-oper li').hover(function(){
                $('#J_sidebar .side-oper li').find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"})
                $('#J_sidebar .side-oper li').removeClass("curr");
                $obj=$(this);
                clearTimeout(timer);
                timer=setTimeout(function(){
                    $obj.addClass("curr");
                    if($obj.hasClass("side-cart")){
                        if($obj.find(".carttime").html()=="" || $obj.find("em.cartnum").html()=="0"){
                            $('.carttime').hide();
                            return;
                        }
                    }
                    if($obj.hasClass("side-backtop") && $obj.find("a.links").css("display")=="none"){
                        return;
                    }else{
                        $obj.find(".tab-tips").css("opacity","1");
                        $obj.find(".tab-tips").animate({
                            right: 36,opacity: 'show'
                        }, 300);
                    }
                },100);
                if($obj.hasClass("side-user")){
                    $obj.find(".close").on('click',function(){
                        $obj.find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
                    })
                }
            },
            function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    $obj.removeClass("curr");
                    $obj.find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
                },100);
            }
        )

        //会员中心特殊处理
       /* $('#J_sidebar .side-oper li.side-user').hover(function(){
            if (XDPROFILE.uid == '') {
                //未登录
                $(this).find('#side-login .user-box p.txt').html('快来<a target="_blank" href="'+__URL_MEMBER__+'/login">登录</a>吧，么么哒！');
            }else{
                $(this).find('#side-login .user-box p.txt').html(XDPROFILE.username);
				var _partten = /.*?\/default(\-60)?.jpg$/;
				if ( !_partten.test(XDPROFILE.face) ) {
					$(this).find('#side-login .user-box .pic img').attr('src', XDPROFILE.face+'_60x60.jpg');
				}
            }
        })
         */
    }
    normal_show_fun(); //鼠标移入在左侧显示信息的效果

    //点击购物袋按钮，请求mini购物袋列表
    var get_mini_cart=function(){
        $("#J_sidebars .side-oper li.side-cart").on('click',function(){
            var login_htmll='<div style="opacity:1;right:36px;" class="tab-login"><div class="user-box"><div class="pic"><img src="http://s.juancdn.com/common/images/global/default-60.jpg"></div><p class="txt">快来<a target="_blank" href="'+__URL_MEMBER__+'/login">登录</a>吧，么么哒！</p></div><i class="close">×</i><div class="arr-icon">◆</div> </div>';
            if (XDPROFILE.uid == '') {
                //未登录
                $('.carttime').hide();
                $('.cartnum').text('0');
                if($(this).find(".tab-login").size()==0){
                    $(this).append(login_htmll);
                    $(this).find(".tab-login .close").on('click',function(){
                        $(this).parents("li.side-cart").removeClass("curr");
                    })
                }else{
                    return;
                }
            }else{
                var $bag_tool = $("#J-right-bag");
                var loadingDom = '<div class="sidebar-hd"><i class="close" id="J_cart_close">×</i><span class="t">购物袋</span><span class="time carttime"></span></div><div id="loadingimg" style="display:none;"></div>';
                $(this).find('.tab-tag').hide();
                if($bag_tool.hasClass("bag-show")){
                    $bag_tool.removeClass("bag-show");
                }else{
                    $bag_tool.addClass("bag-show");
                    $bag_tool.html(loadingDom);
                    $bag_tool.find('#loadingimg').show();
                    $.ajax({
                        type: 'get',
                        url: __URL_CART__+'/shop/cart.php',
                        dataType: 'jsonp',
                        success: function(data) {
                            $bag_tool.find('#loadingimg').hide();
                            if(data.status ==''){
                                //购物袋列表
                                var carthtml = loadingDom;
                                carthtml += '<ul class="clear">';
                                $.each(data.data, function(index, val){
                                    carthtml += '<li><a target="_blank" class="pic fl" href="'+__URL_SHOP__+'/deal/'+val['productId']+'"><img class="lazy" d-src="'+__UPLOAD__+val['pic']+'_60x60.jpg" src="http://s.juancdn.com/common/images/blank_90x90.png"></a>';
                                    carthtml += '<div class="detail">';
                                    carthtml += '<p class="title"><a target="_blank" href="'+__URL_SHOP__+'/deal/'+val['productId']+'">'+val['title']+'</a></p>';
                                    carthtml += '<p class="normal"><span class="price"><em class="u-yen">¥</em>'+val['cprice']+'</span>x '+val['num']+'</p>';
                                    carthtml += '</div></li>';
                                });
                                carthtml += "</ul>";
                                carthtml += '<div class="amount"><span class="fl">共<em class="cartnum">'+data.goodsNum+'</em>件商品</span><span class="all fr"><em class="u-yen">¥</em>'+data.totalPrice+'</span></div> <div class="go-buy clear"><a href="'+__URL_CART__+'" target="_blank">去购物袋结算</a></div>'
                                $bag_tool.html(carthtml);
                                $bag_tool.find("ul img.lazy").lazyload({threshold:200,failure_limit:30});
                                $('.cartnum').text(data.goodsNum);
                                $bag_tool.find(".sidebar-hd").append('<span>后清空</span>');
                                $bag_tool.find('ul li:last').addClass('last');
                                $('.carttime').show();
                                //更新定时器
                                document.servtime = data.servertime, document.expiretime = data.expireTime;
                                if(typeof document.cartTimer !== "undefined"){
                                    window.clearInterval(document.cartTimer);
                                }
                                document.cartTimerFuc();
                                document.cartTimer = window.setInterval("document.cartTimerFuc()", 1000);

                            }else if(data.status == 2){
                                //未登录
                                $('.carttime').hide();
                                $('.cartnum').text('0');
                                if(typeof document.cartTimer !== "undefined") {
                                    window.clearInterval(document.cartTimer);
                                }
                                $bag_tool.html(loadingDom+'<p><span class="icon-normal icon-bag-empty"></span>好像还没有<a href="'+__URL_MEMBER__+'/login">登录</a>哦~</p>');
                            }else{
                                //购物袋为空
                                $('.carttime').hide();
                                $('.cartnum').text('0');
                                if(typeof document.cartTimer !== "undefined") {
                                    window.clearInterval(document.cartTimer);
                                }
                                $bag_tool.html(loadingDom+'<div class="bag-empty"><p class="img"></p><p class="txt">购物袋还是空荡荡哒~<br>快去抢购宝贝吧！</p></div>');
                            }
                        },
                        error: function () {
                            $bag_tool.html(loadingDom+'<div class="bag-empty"><p><span class="icon-normal icon-bag-empty"></span>操作失败，请稍后再试~</p></div>');
                        }
                    });
                }

            }

        })
        $("#J-right-bag #J_cart_close").live('click',function(){
            $("#J-right-bag").removeClass("bag-show");
        })

    }
    get_mini_cart();

})(jQuery);