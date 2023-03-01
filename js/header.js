(function($){
    var loginStatus_toolbar = function(){
        if (__XD_USER__.uid == "" || __XD_USER__.uid == ""){
            var fl = '<div class="right-show fr">'+
                ''+
                ''+
                '<div class="other-show"><a href="'+__URL_JUANPI__+'/about/service" target="_blank" rel="nofollow">在线客服</a></div>'+
                '</div>';
            $('#toolbars .right-show').replaceWith(fl);
        }else {
            var fpic= XDTOOL.empty(__XD_USER__.pic)?"/face/default.jpg" : __XD_USER__.pic;
            var nick = __XD_USER__.nick;
            if(nick.length > 10){
                nick = nick.substr(0, 10)+"…";
            }
            var fl = '<div class="right-show fr">'+
                '<div class="logined-show"><a href="'+__URL_MEMBER__+'" class="normal-a"><img src="'+__UPLOAD__+fpic+'_20x20.jpg"><span class="user">'+nick+'</span><em class="cur"></em></a>'+
                '<div class="normal-box login-box">'+
                '<ul>'+
                '<li><a href="'+__URL_MEMBER__+'/index"><i class="icon icon-01"></i><span>我的收藏</span></a></li>'+
                '<li><a href="'+__URL_MEMBER__+'/setting"><i class="icon icon-03"></i><span>账号设置</span></a></li>'+
                '<li><a href="'+__URL_MEMBER__+'/rebate"><i class="icon icon-02"></i><span>我的返利</span></a></li>'+
                '<li><a href="'+__URL_MEMBER__+'/login/logout"><i class="icon icon-04"></i><span>退出</span></a></li>'+
                '</ul>'+
                '</div>'+
                '</div>'+
                '<div class="personal-show"><a href="'+__URL_MEMBER__+'/order"><span>我的订单</span></a><a href="'+__URL_MEMBER__+'/beans"><span>我的积分</span></a><a href="'+__URL_MEMBER__+'/message"><span>我的消息</span><em class="count" style="display: none;">0</em></a>　|</div>'+
                '<div class="other-show"><a href="'+__URL_JUANPI__+'/about/service" target="_blank" rel="nofollow">在线客服</a><a href="'+__URL_HEZUO__+'" target="_blank">卖家报名</a></div>'+
                '</div>';
            $('#toolbars .right-show').replaceWith(fl);
            $(".logined-show").live({
                mouseover:function(){
                    $(this).addClass("hover");
                },
                mouseout:function(){
                    $(this).removeClass("hover");
                }
            })
        }
    }
    loginStatus_toolbar();

    /**
     * 不同屏幕
     * @author mumian@kimi.com
     * @date   2014-12-05
     */
    var FunAdapt=function(){
        if($(window).width()>1024 && location.hash != "#narrow"){
            $(".kimi-pc").addClass("w1200");
        }else{
            $(".kimi-pc").removeClass("w1200");
        }
        if(location.hash == "#narrow"){
        	$("body,.header").css("min-width","980px");
        }
//        $(window).resize(function(){
//            if($(window).width()>1024){
//                $(".jp-pc").addClass("w1200");
//            }else{
//                $(".jp-pc").removeClass("w1200");
//            }
//        });
    }
    FunAdapt();


    /**ake 关于兼容mac retina屏 首页当为mac系统logo换成两倍的图片
     *@time 2014-09-09
     */
     if(document.domain == "www.jiukuaiyou.com"){

        if(navigator.platform.indexOf('Mac') > -1){
            $("div.logo").addClass("jiu-logo01 ")
            $(".protection").addClass("protection01")
        }else{
            $("div.logo").removeClass("jiu-logo01 ")
            $(".protection").removeClass("protection01")

             }

     }else{

        if(navigator.platform.indexOf('Mac') > -1){
            $("div.logo1").addClass("juan-logo01 ")
            $(".juan-user").addClass("juan-user01")
            $(".juan-jf").addClass("juan-jf01")
            $(".juan-fanli").addClass("juan-fanli01")
            $(".juan-iphone").addClass("juan-iphone01")
            $(".juan-brand").addClass("juan-brand01")
            $(".protection").addClass("protection01")
        }else{
            $("div.logo1").removeClass("juan-logo01 ")
            $(".juan-user").removeClass("juan-user01")
            $(".juan-jifen").removeClass("juan-jifen01")
            $(".juan-fanli").removeClass("juan-fanli01")
            $(".juan-iphone").removeClass("juan-iphone01")
            $(".juan-brand").removeClass("juan-brand01")
            $(".protection").removeClass("protection01")
     } 
 }

})(jQuery);

$(document).ready(function(){
    //用户访问统计Cookie共享
    if(document.domain == "www.kimiwang.com" || document.domain == "kimiwang.com"){
        if(!XDTOOL.empty(XDTOOL.getCookie("_Qt")) && XDTOOL.empty(XDTOOL.getCookie("_QM")) ){
            var _Qt = XDTOOL.getCookie('_Qt');
            $.getJSON(__U_JUANPI__+"/landcookie.php?callback=?",
                {qt:_Qt},
                function(data){
                    if(data.code==1001){
                        var cookieobj = {expires:365,path:'/',domain:".kimiwang.com"};
                        XDTOOL.setCookie("_QM",1,cookieobj);
                    }
                });
        }
        if(!XDTOOL.empty(__XD_USER__.uid)&&(XDTOOL.empty(XDTOOL.getCookie("c_login"))||XDTOOL.getCookie("c_login")=='0')){
            var uid = XDPROFILE.uid;
            $.getJSON(__U_JUANPI__+"/logincookie?callback=?",
                {uid:__XD_USER__.uid,pic:__XD_USER__.pic,nick:__XD_USER__.nick,sign:__XD_USER__.sign,exp:XDTOOL.getCookie("s_exp")},function(data){
                    if(data.code==1001){
                        var cookieobj = {expires:0,path:'/',domain:".kimiwang.com"};
                        XDTOOL.setCookie("c_login",1,cookieobj);
                    }
                });
        }
    }else{
        if(!XDTOOL.empty(XDTOOL.getCookie("_Qt")) && XDTOOL.empty(XDTOOL.getCookie("_QM")) ){
            var _Qt = XDTOOL.getCookie('_Qt');
            $.getJSON(__URL_JKY__+"/landcookie.php?callback=?",
                {qt:_Qt},
                function(data){
                    if(data.code==1001){
                        var cookieobj = {expires:365,path:'/',domain:".kimiwang.com"};
                        XDTOOL.setCookie("_QM",1,cookieobj);
                    }
                });
        }
        if(!XDTOOL.empty(__XD_USER__.uid)&&(XDTOOL.empty(XDTOOL.getCookie("c_login"))||XDTOOL.getCookie("c_login")=='0')){
            var uid = XDPROFILE.uid;
            $.getJSON(__URL_JKY__+"/logincookie?callback=?",
                {uid:__XD_USER__.uid,pic:__XD_USER__.pic,nick:__XD_USER__.nick,sign:__XD_USER__.sign,exp:XDTOOL.getCookie("s_exp")},function(data){
                    if(data.code==1001){
                        var cookieobj = {expires:0,path:'/',domain:".kimiwang.com"};
                        XDTOOL.setCookie("c_login",1,cookieobj);
                    }
                });
        }
    }

});
