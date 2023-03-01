(function($){

    if (XDPROFILE.uid != '') {
        var gidArray = new Array();
        $(".y-like").each(function(){
            var gid = $(this).data("gtype") == 3?"t"+$(this).data("gid"):$(this).data("gid");
            gidArray. push(gid);
        });
        $.getJSON(__URL_JUANPI__ + '/favorite/goods_fav_status?callback=?', {"g_ids":gidArray.join(",")}, function(data){
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

        $.getJSON(__URL_JUANPI__ + '/favorite/option?callback=?', {"gid":gid, "status":do_status, 'app':"1",'gtype':g_type}, function(data){
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
                                    var li = '<li li-id="'+data.data.uid+'"><a href="http://www.juanpi.com/u/'+data.data.uid+'" target="_blank"><img src="http://s1.juancdn.com/'+data.data.avatar+'_80x80.jpg" width="35px" height="35px" alt="'+data.data.username+'" title="'+data.data.username+'"></a></li>';
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
        );


    });




})(jQuery);

