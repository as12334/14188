	var _html="<div class='alert_fullbg' style='display:block;'></div>"
	var _height=$(window).height();
	var executeFlg = true;
	var timer;
	$(document).ready(function(){
	    var w_h=$("#head").width();
		//$("#index .search-area").css('width',w_h-100);
		if( $(".next-nav ul li a.active").offset() != null ){
            $(".next-nav .box").scrollLeft($(".next-nav ul li a.active").offset().left);
        }
		//alert(0);
	})
	//分类动画
	$(".classify .btn-type").on('click',function(){
		$("body").css("paddingBottom","0");
		//$(".back-top").css("display","none");
		$(".main").css({"height":_height,"overflow":"hidden"})
		$(".app").append(_html);
		$(".alert_fullbg").css('z-index','201');
		$(".app-other").css({'left':'0','visibility':'visible'});
		$(".app-other").css('height',_height)
		$(".alert_fullbg").on('click',function(){
			$("body").css("paddingBottom","45px");
			//$(".back-top").css("display","block");
			$(".app-other").css({'left':'-70%','visibility':'hidden'});
			$(this).remove();
			clearTimeout(timer);
			timer=setTimeout(function(){
			    $(".app-other").css('height',"auto")
			    $(".main").css({"height":"auto","overflow":"visible"})
			},400);
		});
	})
	//签到
	$("#user .btn-sign").on('click',function(){
        $(".app").append(_html);
		$(".alert_fullbg").css('z-index','201');
        $(".tips-box").css('display','block');
		executeFlg=false;
        $(".alert_fullbg,.tips-box .del").on('click',function(){
			$(".tips-box").css('display','none');
			$(".alert_fullbg").remove();
			executeFlg=true;
		})
	})
	//筛选
	$(".choice,.pack_up").on('click',function(){
	  var _all_h=0;
	  var dd_size=$(".screen-box dd").size();
	  _all_h=$(".screen-box dt").height()+$(".screen-box dd").height()*dd_size-18;
	  if($(".screen-box").hasClass("show")){
	    executeFlg=true;
	  	$(".alert_fullbg").remove();
		$(".choice em").addClass("cur");
	  	$(".screen-box").css("height","0px");
	  	$(".screen-box").removeClass("show");
	  }
	  else{
	    executeFlg=false;
	  	$(".app").append(_html);
		$(".choice em").removeClass("cur");
	  	$(".screen-box").css("height",_all_h);
	    $(".screen-box").addClass("show");
		$(".alert_fullbg").on('click',function(){
			$(".alert_fullbg").remove();
			$(".choice em").removeClass("cur");
			$(".screen-box").css("height","0px");
			$(".screen-box").removeClass("show");
			executeFlg=true;
		})
	  }
	})
	//滚动一级导航浮动
	var nav_f_show=function(){
		$(window).on('scroll',function(){
		if($(window).scrollTop()>$("#nav").offset().top&&executeFlg==true){
			$("#nav ul").addClass("fixed");
		}
		else{
			$("#nav ul").removeClass("fixed");
		}
	})
	}
	//二级导航浮动以及适配
	var nav_t_show=function(){
	    var box=$(".next-nav").width();
	    var _box_h=0;
		$(".next-nav ul li").each(function(i){
		    _box_h+=$(this).width();
		})
		$(".next-nav ul").css("width",_box_h);
		$(window).on('scroll',function(){
		if($(window).scrollTop()>$(".next-nav").offset().top&&executeFlg==true){
			$(".next-nav .box").addClass("fixed");
		}
		else{
			$(".next-nav .box").removeClass("fixed");
		}
	})
	}
	if($(".next-nav ul li").size()>0){
		nav_t_show();
	}
	if($("#nav").size()>0){
		nav_f_show();
	}
	/**
     * 首页幻灯片 mumian
     * @param {}
     * @time 2015-02-10
     */
    var carousel_index = function(){
	    //var area_h=$(".banner li a").height();
		//$(".area").css("height",area_h);
        if($(".banner li").size() <= 1) return;
        $(".banner li").each(function(){
            $(".adType").append('<a></a>');
        });
		$('.area').swipeSlide({
		continuousScroll:true,
		speed : 3000,
		transitionType : 'cubic-bezier(0.22, 0.69, 0.72, 0.88)'
		},function(i){
		$('.adType').children().eq(i).addClass('current').siblings().removeClass('current');
		});
    }
    carousel_index();
	//搜索
	//alert($("#search_keyword").val());
	searchFun=function(){
		$("#search_keyword").on('focus',function(){
		$(this).next().css("display","block");
		})
		var $search_txt = $(".box-search #keyword");
		$search_txt.on('keyup', function () {
                if ($(this).val() == "") {
                    $(this).next().css("display","none");
                } else {
                    $(this).next().css("display","block");
                }
            });
		$(".box-search .del").on('click',function(){
						$(this).css("display","none");
						$search_txt.val("");
		})
	}
	searchFun();
	$(".closed").on("click",function(){
    	$(".go-app").hide();
    	return false;
    })
	//关于筛选勾勾
	$(".screen-box dd a").on("click",function(){
		$(".screen-box dd a").find("img").css("display","none");
		$(this).find("img").css("display","block");
	});




    ////网站流量统计，大数据分析流量数据来源 2014-11-19

    (function(){
        function getCookie(cookieName) {
            var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
                cookieMatch = cookiePattern.exec(document.cookie);

            return cookieMatch ? cookieMatch[2] : '';
        }
        function setCookie(value)
        {
            var name="key_url_list";
            var value_list = getCookie(name).split(",");

            if(value_list.length>=4){
                value_list.shift();
            }
            value_list.push(value);
            var value_str = '';
            if(value_list.length>=1){
                value_str=value_list.join(",");
            }
            else{
                value_str=value_list[0];
            }
            //去掉逗号
            if (value_str.substr(0,1)==',') value_str=value_str.substr(1);

            var Days = 30;
            var exp = new Date();
            exp.setTime(exp.getTime() + Days*24*60*60*1000);
            document.cookie = name + "="+ value_str + ";expires=" + exp.toGMTString()+";domain=.juanpi.com;path=/";
        }
        var _paq = _paq || [];
        //_paq.push(["setRequestMethod", 'POST']);
        _paq.push(['trackPageView']);
        //获取当前url存入一个数组
        var url=window.location.href;
        //如果为下面类型的一种存入cookie
        if(url.toString().indexOf('index')>0
            || url.toString().indexOf('zhuanti')>0
            || url.toString().indexOf('brand')>0
            || url.toString().indexOf('search')>0
            || url.toString().indexOf('fushi')>0
            || url.toString().indexOf('muying')>0
            || url.toString().indexOf('jujia')>0
            || url.toString().indexOf('qita')>0
            || url.toString().indexOf('yugao')>0){
            setCookie(url);
        }
        if(location.pathname == '/'){
            setCookie(url);
        }
        //_paq.push(['enableLinkTracking']);
        //_paq.push(["setCustomVariable", "useragent", navigator.userAgent, "visit"]);
        //var piwikTracker = Piwik.getTracker();
        //_paq.push([ function() { var qt = this.getCookie("_Qt"); }]);
        //var qt = piwikTracker.getCookie("_Qt")
        (function() {
            var u="http://d.juanpi.com/";
            _paq.push(["setTrackerUrl", u+"sermon/receiver/receive.do?ua="+navigator.userAgent
            +"&_Qt="+getCookie("_Qt")
            +"&s_uid="+getCookie("s_uid")
            +"&s_name="+getCookie("s_name")
            +"&s_pic="+getCookie("s_pic")
            +"&s_sign="+getCookie("s_sign")
            +"&s_exp="+getCookie("s_exp")
            +"&sid="+getCookie("sid")
            +"&newPerson="+getCookie("newPerson")
            +"&utm="+getCookie("utm")
            +"&topic=jp"
            +"&key_url_list="+getCookie('key_url_list')
            ]);
            _paq.push(["setSiteId", "1"]);
            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
            g.defer=true; g.async=true; g.src=u+"static/js/piwik.js"; s.parentNode.insertBefore(g,s);
        })();
    })();