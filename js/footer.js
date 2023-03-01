(function($){
    $("img.lazy").lazyload({threshold:200,failure_limit:30});

    /**
     * 搜索
     * @author kimi@kimiwang.com
     * @date   2014-02-05
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

    //签到领积分
    $(".state-show .normal-a:last,#sign-point").live('click', function(){
        var btn = $(this);
        //验证是否登录
        if (XDPROFILE.uid == "") return XD.user_handsome_login_init(),
            XD.user_handsome_login(),
            false;
        if(btn.data('lock')) return false;
        btn.data('lock', 1);
        $.getJSON(__URL_MEMBER__ + "/public/doSign?uid="+XDPROFILE.uid+"&callback=?", function(d) {
            if( (d.code == 1005) && ((d.msg == "error"))){
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
    });




    /**
     * 顶部导航隐藏显示功能
     * @author kimi@kimiwang.com
     * @date   2014-02-05
     * @return {[type]}   [description]
     */
    allMenu_show=function(){
        if((document.domain == "127.0.0.1" || document.domain == "ju.kimiwang.com") && $(".top_bar").size() > 0) return;
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
     * @author kimi@kimiwang.com
     * @date   2014-02-05
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
     * @author kimi@kimiwang.com
     * @date   2014-02-05
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
    var F_nav_scroll = function () {
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
    }
    F_nav_scroll();

    $('a.go-top').click(function(){
        $('body,html').animate({scrollTop:0},500);
    });


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
     * Author: kimi
     * Date: 14-04-10
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
})(jQuery);
