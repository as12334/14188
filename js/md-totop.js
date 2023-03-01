/**
 * Created with JetBrains WebStorm.
 * User: kimiwang
 * Date: 12-9-7
 * Time: 上午8:14
 *
 */
(function($){
    /**
     * fangfang 将整个页面回到顶部的按钮功能
     * @method extend
     * @param {}
     * @time 2014-02-10
     */
    $.fn.toTop = function(){
        var bt = '<div id="back_top" class="back_top" style="display: block;"><a href="javascript:;" style="display: none;"></a><span class="call-survey"></span></div>';
        var _self = $(this);  
        if($(window).width()>1024){
            _self.append(bt);
        }
        $("#back_top .call-survey").live("click",function(){
            $("body").feedbackInit();
        });
        /**
         * @time: 2014-05-21
         */
        $(window).resize(function(){
            if($(window).width()>1024){
                if($("#back_top").length<=0){
                    _self.append(bt);
                    $(window).scrollTop() == 0?$("#back_top").find("a").fadeOut() : $("#back_top").find("a").fadeIn();
                    b.find("a").click(function(){
                        $('.down-slide').css('top', 137);
                        $(window).scrollTop(0);
                        return false;
                    });
                }
            }else{
                if($("#back_top").length>0){
                    $("#back_top").remove();
                }
            }
        });
        $(window).scroll(function(){
            b = $("#back_top");
            if(b.length>0){
                $(window).scrollTop() == 0? b.find("a").fadeOut() : b.find("a").fadeIn();
                b.find("a").click(function(){
                    var isJkyDivUp = $('.warp-jky').attr('isup');
                    if(isJkyDivUp == 'yes'){
                        $('.jky-ico').stop(true).animate({width: '140'}, 300).siblings().animate(
                        {width: '110'}, 300); 
                    }else{
                        $('.jp-ico').stop(true).animate({width: '140'}, 300).siblings().animate(
                        {width: '110'}, 300); 
                    }                   
                    $('.down-slide').css('top', 137);
                    $(window).scrollTop(0);
                    return false;
                });
            }
        });
    };
    /**
     * fangfang 用户填写对我司网站的回馈信息
     * @method extend
     * @param {}
     * @time 2014-02-10
     */
    $.fn.feedbackInit = function(){
        $(".survey-box").remove();
        var curl = location.href.toString();
        var box = '<div class="survey-box survey_show_w3c" id="J_SurveyBox" style="display:block;bottom:-220px">'+
            '<div class="survey_header"><div class="survey_title">您对当前页面满意吗？</div>'+
            '<a id="J_SurveyHide" class="survey_hide" href="javascript:;"></a></div><div class="survey_main">'+
            '<div class="survey_radio survey_radio_good" idx="213"></div>'+
            '<div class="survey_radio survey_radio_bad" idx="214"></div>'+
            '<textarea id="J_SurveyText" class="survey_text default">您留下的每个建议都是我们不断改进聚米的动力！</textarea>'+
            '<div class="survey_count"><label id="J_SurveyCountCur" class="survey_count_cur">0</label>/1000</div>'+
            '<button id="J_SurveySubmit" class="survey_submit">提 交</button></div></div>';
        $(this).append(box);
        $("#J_SurveyBox").animate({bottom:'0'},100);
        var funcFeedbackOPT = function(){
            $("#J_SurveyHide").click(function(){
                $(".survey-box").remove();
            });
            var str = "您留下的每个建议都是我们不断改进聚米的动力！";
            $(".survey-box .survey_radio").click(function(){
                if($(this).hasClass("survey_radio_good")){
                    $(this).parents("div").find(".survey_radio_bad").removeClass("survey_radio_bad_sel");
                    $(this).addClass("survey_radio_good_sel");
                }else{
                    $(this).parents("div").find(".survey_radio_good").removeClass("survey_radio_good_sel");
                    $(this).addClass("survey_radio_bad_sel");
                }
            });
            $("#J_SurveyText").focusin(function(){
                if($("#J_SurveyText").val() == str){
                    strlen = $("#J_SurveyText").val('');
                }
                var strlen = $("#J_SurveyText").val().length;
                $("#J_SurveyCountCur").text(strlen);
            }).focusout(function(){
                    if($("#J_SurveyText").val() == ''){
                        strlen = $("#J_SurveyText").val(str);
                    }
                });
            $("#J_SurveyText").keydown(function(){
                var strlen = $("#J_SurveyText").val().length;
                if(strlen>=1000){
                    return false;
                }
            }).keyup(function(){
                    var strlen = $("#J_SurveyText").val().length;
                    $("#J_SurveyCountCur").text(strlen);
                });
            $("#J_SurveySubmit").click(function(){
                var params = {fb_url:location.href.toString(),
                    fb_grade:($(".survey_radio_good_sel").length>0)?1:($(".survey_radio_bad_sel").length>0?0:-1),
                    fb_cont:$("#J_SurveyText").val()=="您留下的每个建议都是我们不断改进聚米的动力！"?null:$("#J_SurveyText").val()
                };
                if(params.fb_grade==-1){
                    alert("亲.您对当前页面满意吗?");
                    $(".survey_radio_good").focus();
                    return false;
                }
                feedbackSubmit(params)
            })
        };
        var feedbackSubmit = function(params){
            $.getJSON(__U_MAIN__+'/jsonp/feedback?callback=?',
                params,function(data){
                    $(".survey-box").remove();
                    alert("谢谢您的支持!");
                })
        };
        funcFeedbackOPT();
    };

    var right_sign_show=function(){
        var timer=null;
        clearInterval(timer);
        $(".side_right .trigger,.side_right .normal-side-box").hover(
            function(){
                clearTimeout(timer);
                if($(this).hasClass("trigger")){
                    var sizeOf =  $(".side_right .trigger").index(this);
                }else{
                    var sizeOf =  $(".side_right .normal-side-box").index(this);
                }
                timer=setTimeout(function(){
                    $('.side_right .normal-side-box').hide();
                    $('.side_right .normal-side-box').eq(sizeOf).show();
                },100)
            },
            function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    $('.side_right .normal-side-box').hide();
                },100)
            }
        )
    }
    right_sign_show();

    /**
     * 鼠标移入，出现二维码
     * Author: zhuwenfang
     * Date: 14-01-10
     * Time: AM 10:02
     * Function: when mouse hovers, showing 'the two dimensional code' div 
     **/
    var F_showTwoDimenCode = function(){
        var popImgHtml = "<div class='pop-img fl'>"
        + "<div class='jqywx fl'></div>" 
        + "<p class='tao-img fl'></p>"
        + "</div>";

        $(".kik").on("mouseenter", function(){
            if( $(".pop-img").length == 0 ){                  
                $(".follow ul li:last").append( popImgHtml ); 
            }       
        });
       
        $(".follow ul li:last").on("mouseleave", function(){
           $(".pop-img").remove();
        });
    }
    F_showTwoDimenCode();


    // 导航独家 end

    var $navFun_1 = function() {

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

        //IE6下的定位 不写他的支持了
        if (!window.XMLHttpRequest) {
        }
    };
    var $navFun_2 = function() {
        var st = $(document).scrollTop();
        $(".side_right").css("top",($(window).height()-$(".side_right").height())/2+"px");
        if(st>$(".main").offset().top){
            $(".go-top").css("display","block");
        }else{
            $(".go-top").css("display","none");
        }
    }
    var F_nav_scroll = function () {
        if(document.domain=="brand.juanpi.com"){
            $navFun_2();
            $(window).bind("scroll", $navFun_2);

        }
        else{
            $navFun_1();
            $(window).bind("scroll", $navFun_1);
        }
    }

//    F_nav_scroll();
    var F_top = function(){
        $('body,html').animate({scrollTop:0},500);
    }
    $('a.go-top').on('click',F_top)

})(jQuery);
$("body").toTop();