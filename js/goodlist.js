(function($){
    $(".goods-list li").hover(function(){
        $(this).find(".list-good").hasClass("gone") && $(this).find(".like-ceng").size() != 0 && $(this).find(".like-ico").hasClass("l-active") && $(this).find(".like-ceng").show();

        /*20150226 by adong begin*/

        $(this).find(".list-good").hasClass("gone") && $(this).find(".like-ceng").size() != 0 && $(this).find(".like-ico").hasClass('l-active') && $(this).find(".buy-over.brand").hide();

        /*20150226 by adong end*/

        $(this).addClass("hover1");
        if($(this).find(".list-good").hasClass("gone")) return;
        if($(this).find(".brand-bd").size() != 0) return;
        $(this).addClass("hover");
        $(this).find(".btn span").html() == "淘宝" && $(this).find(".btn span").html("去淘宝");
        $(this).find(".btn span").html() == "天猫" && $(this).find(".btn span").html("去天猫");
        $(this).find(".btn span").html() == "特卖" && $(this).find(".btn span").html("去购买");
        $(this).find(".btn span").html() == "聚米" && $(this).find(".btn span").html("去聚米");
        $(this).find(".btn span").html() == "品牌" && $(this).find(".btn span").html("逛品牌");
    },function(){
        $(this).removeClass("hover1");
        $(this).find(".like-ceng").hide();

        /*20150226 by adong begin*/
        $(this).find(".buy-over.brand").show();

        /*20150226 by adong end*/

        $(this).removeClass("hover");
        $(this).find(".btn span").html() == "去淘宝" && $(this).find(".btn span").html("淘宝");
        $(this).find(".btn span").html() == "去天猫" && $(this).find(".btn span").html("天猫");
        $(this).find(".btn span").html() == "去购买" && $(this).find(".btn span").html("特卖");
        $(this).find(".btn span").html() == "去聚米" && $(this).find(".btn span").html("聚米");
        $(this).find(".btn span").html() == "逛品牌" && $(this).find(".btn span").html("品牌");
    });

    $(".goods-list li").each(function(){
        if($(this).find('span.price-old').width()>= 55||$(this).find('span.price-current').width()>= 125){
            $(this).find('span.discount').hide();
        }
        if($(this).find('.list-good').hasClass("gone")){
            $(this).find(".btn a").attr("href","javascript:;");
            $(this).find(".btn a").removeAttr("target");

        }
    })

    $(".goods-list .buy-over a").click(function(e){
        if (e && e.stopPropagation) {
            e.stopPropagation();
        }else {//IE浏览器
            window.event.cancelBubble = true;
        }
    });

    $(".goods-list li").find(".btn a").unbind("click").click(function(e){
        var title = $(this).parents("li").find(".good-title a").html();
        var btntitle=$(this).parents("li").find(".btn span").html();
        var link = $(this).attr("href");

        if(link.indexOf("click")!=-1&&link.indexOf("url")==-1){
         /* if(btntitle.indexOf("明日")!=-1||btntitle.indexOf("今日")!=-1){
                var istao=$(this).parents("li").attr('data_jstype');
                if(parseInt(istao)==0){
                    var click_action_name = '跳转到淘宝('+title+')';
                }else if(parseInt(istao)==1){
                    var click_action_name = '跳转到天猫('+title+')';
                }
            }else{
                if(btntitle.indexOf("淘宝")!=-1){
                   var click_action_name = '跳转到淘宝('+title+')';
                }else if(btntitle.indexOf("天猫")!=-1){
                    var click_action_name = '跳转到天猫('+title+')';
                }
            }
            */
            //console.log(link.split('=')[1]);
            //任务编号1437
            _paq.push(['trackEvent', 'jump', 'click_jump', 'goodsid',link.split('=')[1],]);
        }
    });

    //聚米列表页提醒
    $(".goods-list li .good-pic,.goods-list li .good-title,.goods-list li .good-price,.goods-list .mask-bg,.goods-list .buy-over").click(function(){
        if($(this).parents("li").hasClass("noalert")){
            return true;
        }
//        if($(".header_user").length == 0 && $(".advance-nav").lenght == 0){
//            return true;
//        }
        if($(this).parents("li").find(".btn.start_1").size() == 0 && !$(this).parents("li").find(".list-good").hasClass("gone")){
            return true;
        }

        var link = $(this).parents("li").find(".good-title a").attr("href");
        var gid = $(this).parents("li").attr("id");
        var gtype = $(this).parents("li").attr("gtype");
        //积分兑换  采集   优惠券
        if(link.match(/jifen/i) || link.match(/url/i) || ($(this).parents("li").find(".go-quan").length != 0 && !$(this).parents("li").find(".list-good").hasClass("gone"))){   //积分兑换抽奖去内页
            return true;
        }

        if($(this).parents("li").find(".list-good").hasClass("gone")){
            if($(this).hasClass("good-title") || $(this).hasClass("good-price")) return true;
            if($(this).parents("li").find(".like-ico").hasClass("l-active") || $(this).parents("li").find(".del-ico").length != 0){
                var content = '<div class="top_tips"><p><em class="over">商品抢光了！</em></p><p class="tips01">因商品已经抢光，无法跳转到淘宝下单</p></div><div class="item-btn clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like active" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">已收藏</p></a><p class="like-o"><span class="fl">随时留意您的手机哦</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
            }else{
                var content = '<div class="top_tips"><p><em class="over">商品抢光了！</em></p><p class="tips01">因商品已经抢光，无法跳转到淘宝下单</p></div><div class="item-btn clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">收藏</p></a><p class="like-o"><span class="fl">下次开抢可提醒您</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
            }
        }else{
            if($(this).parents("li").find(".like-ico").hasClass("l-active") || $(this).parents("li").find(".del-ico").length != 0){
                var content = '<div class="top_tips"><p><em class="over">您已收藏，商品开抢前会在手机提醒您开抢！</em></p></div><div class="item-btn clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like active" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">已收藏</p></a><p class="like-o"><span class="fl">开抢前5分钟手机提醒</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
            }else{
                var content = '<div class="top_tips"><p><em class="over">商品还未开始！</em></p></div>';
            }
        }

        b = new XDLightBox({
            title: "温馨提示",
            lightBoxId: "alert_remind",
            contentHtml: content,
            scroll: false
        });
        b.init();
        return false;
    });

})(jQuery);