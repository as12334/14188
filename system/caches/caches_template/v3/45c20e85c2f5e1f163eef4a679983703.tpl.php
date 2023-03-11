<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>所有商品 - <?php echo $webname; ?>触屏版</title>
        <meta content="app-id=518966501" name="apple-itunes-app" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <meta content="black" name="apple-mobile-web-app-status-bar-style" />
        <meta content="telephone=no" name="format-detection" />
        <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/goods.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    </head>
    <body>
        <div class="h5-1yyg-v1" id="loadingPicBlock">

            <!-- 栏目页面顶部 -->

            
            <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/ajax.js"></script>
            <div class="pro-s-box thin-bor-bottom search-box focus-box" id="divSearch">
                <form action="<?php echo WEB_PATH; ?>/mobile/search/" method="post">
                    <div class="box">
                        <div class="border">
                            <div class="border-inner"></div>
                        </div>
                        <div class="input-box">
                            <i class="s-icon"></i>
                            <input type="text" placeholder="输入“汽车”试试" value="" id="txtSearch" name="txt" maxlength="10">
                            <i class="c-icon" id="btnClearInput" style="display: none"></i>
                        </div>
                    </div>
                    <input type="submit" class="s-btn" id="btnSearch" value="搜索" />
                </form>
            </div>
            <!-- 内页顶部 -->
            <div class="all-list-wrapper">

                <div class="menu-list-wrapper" id="divSortList">
                    <ul class="list">
                        <li id="0" class="current"><span class="items">全部商品</span></li>
                        <?php $data=$this->DB()->GetList("select * from `@#_category` where `model`='1' and parentid=0",array("type"=>1,"key"=>'',"cache"=>0)); ?>
                        <?php $ln=1;if(is_array($data)) foreach($data AS $categoryx): ?>
                        <li id="<?php echo $categoryx['cateid']; ?>"><span class="items"><?php echo $categoryx['name']; ?></span></li>
                        <?php  endforeach; $ln++; unset($ln); ?>
                        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
                    </ul>
                </div>

                <div class="good-list-wrapper">

                    <section class="goodsCon">
                        <!-- 导航 -->
                        <div class="goodsNav">
                            <ul id="divGoodsNav">
                                <li order="10" class="current"><a href="javascript:;">所有<b></b></a></li>
                                <li order="20" ><a href="javascript:;">即将揭晓<b></b></a></li>
                                <li order="40"><a href="javascript:;">最新<b></b></a></li>
                                <li order="50" type="price"><a href="javascript:;">价格<em></em><s></s><b></b></a></li>
                            </ul>
                        </div>
                        <!-- 列表 -->
                        <div class="goodsList">
                            <div id="divGoodsLoading" class="loading" style="display:none;"><b></b>正在加载...</div>
                            <a id="btnLoadMore" class="loading" href="javascript:;" style="display:none;">点击加载更多</a>
                            <a id="btnLoadMore2" class="loading"  style="display:none;">没有数据</a>
                            <a id="btnLoadMore3" class="loading"  style="display:none;">已经到底了</a>
                        </div>
                    </section>
                </div>
            </div>

            <input id="urladdress" value="" type="hidden" />
            <input id="pagenum" value="" type="hidden" />


            <?php include templates("mobile/index","footer");?>
            <script type="text/javascript">
                var yid = <?php echo intval($yid); ?>;
                //打开页面加载数据
                window.onload = function () {
                    if (yid > 0) {
                        glist_json(yid + "/10");
                    } else {
                        glist_json("list/10");
                    }
                    //购物车数量
                    $.getJSON('<?php echo WEB_PATH; ?>/mobile/ajax/cartnum', function (data) {
                        if (data.num) {
                            $("#btnCart").append('<em>' + data.num + '</em>');
                        }
                    });

                }
                //获取数据
                function glist_json(parm) {
                    $("#urladdress").val('');
                    $("#pagenum").val('');
                    $.getJSON('<?php echo WEB_PATH; ?>/mobile/mobile/glistajax/' + parm, function (data) {
                        $("#divGoodsLoading").css('display', 'none');
                        if (data[0].sum) {
                            var fg = parm.split("/");
                            $("#urladdress").val(fg[0] + '/' + fg[1]);
                            $("#pagenum").val(data[0].page);
                            for (var i = 0; i < data.length; i++) {
                                var ul = '<ul><li>';
                                ul += '<span id="' + data[i].id + '" class="z-Limg"><img src="<?php echo G_UPLOAD_PATH; ?>/' + data[i].thumb + '"></span>';
                                ul += '<div class="goodsListR">';
                                ul += '<h2 id="' + data[i].id + '">' + data[i].title + '</h2>';
                                ul += '<div class="pRate">';
                                ul += '<div class="Progress-bar" id="' + data[i].id + '">';
                                ul += '<p class="u-progress"><span class="pgbar" style="width:' + (data[i].canyurenshu / data[i].zongrenshu) * 100 + '%;"><span class="pging"></span></span></p>';
                                ul += '<ul class="Pro-bar-li">';
                                ul += '<li class="P-bar01"><em>' + data[i].canyurenshu + '</em>已参与</li>';
                                ul += '<li class="P-bar02"><em>' + data[i].zongrenshu + '</em>总需人次</li>';
                                ul += '<li class="P-bar03"><em>' + data[i].shenyurenshu + '</em>剩余</li>';
                                ul += '</ul></div>';
                                if (data[i].yunjiage != 0) {
                                    ul += '<a class="add " codeid="' + data[i].id + '" href="javascript:;"   ><s></s></a>';
                                }
                                ul += '</div></div></li></ul>';
                                $("#divGoodsLoading").before(ul);
                            }
                            if (data[0].page <= data[0].sum) {
                                $("#btnLoadMore").css('display', 'block');
                                $("#btnLoadMore2").css('display', 'none');
                                $("#btnLoadMore3").css('display', 'none');
                            } else if (data[0].page > data[0].sum) {
                                $("#btnLoadMore").css('display', 'none');
                                $("#btnLoadMore2").css('display', 'none');
                                $("#btnLoadMore3").css('display', 'block');
                            }
                        } else {
                            $("#btnLoadMore").css('display', 'none');
                            $("#btnLoadMore2").css('display', 'block');
                            $("#btnLoadMore3").css('display', 'none');
                        }
                    });
                }
                $(document).ready(function () {
                    //即将揭晓,人气,最新,价格	
                    $("#divGoodsNav li").click(function () {
                        var l = $(this).index();
                        $("#divGoodsNav li").removeClass().eq(l).addClass('current');
                        var parm = $("#divGoodsNav li").eq(l).attr('order');
                        $("#divGoodsLoading").css('display', 'block');
                        $(".goodsList ul").remove();
                        if(parm=="50"){
                            $(this).attr('order',"60");
                        }
                        if(parm=="60"){
                            $(this).attr('order',"50");
                        }
                        var glist = glist_json("list/" + parm);
                        
                        $("#divSortList li").removeClass("current");
                        $("#divSortList li:first").addClass("current");
                    });

                    //商品分类
                    var dl = $("#divGoodsNav dl"),
                            last = $("#divGoodsNav li:last"),
                            first = $("#divGoodsNav dd:first");
                    $("#divGoodsNav li:last a:first").click(function () {
                        if (dl.css("display") == 'none') {
                            dl.show();
                            last.addClass("gSort");
                            first.addClass("sOrange");
                        } else {
                            dl.hide();
                            last.removeClass("gSort");
                            first.removeClass("sOrange");
                        }
                    });
                    
                    $("#divSortList li").click(function(){
                        var id = $(this).attr("id");
                        var l = $("#divGoodsNav .current").index(),
                        parm = $("#divGoodsNav li").eq(l).attr('order');
                            $(".goodsList ul").remove();
                        if(id){
                            glist_json(id + '/' + parm);
                        }else{
                            glist_json('list/' + parm);
                        }
                        $("#divSortList li").removeClass("current");
                        $(this).addClass("current");
                    });
                    
                    $("#divGoodsNav  dd").click(function () {
                        var s = $(this).index();
                        var t = $("#divGoodsNav .gSort dd a").eq(s).html();
                        var id = $("#divGoodsNav .gSort dd a").eq(s).attr('id');
                        $("#divGoodsNav .gSort a:first").html(t + '<s class="arrowUp"></s>');
                        var l = $("#divGoodsNav .current").index(),
                                parm = $("#divGoodsNav li").eq(l).attr('order');
                        if (id) {
                            $("#divGoodsLoading").css('display', 'block');
                            $(".goodsList ul").remove();
                            glist_json(id + '/' + parm);
                        } else {
                            glist_json("list/" + parm);
                            $(".goodsList ul").remove();
                        }
                        dl.hide();
                        last.removeClass("gSort");
                        first.removeClass("sOrange");
                    });
                    //加载更多
                    $("#btnLoadMore").click(function () {
                        var url = $("#urladdress").val(),
                                page = $("#pagenum").val();
                        glist_json(url + '/' + page);
                    });
                    //返回顶部
                    $(window).scroll(function () {
                        if ($(window).scrollTop() > 50) {
                            $("#btnTop").show();
                        } else {
                            $("#btnTop").hide();
                        }
                    });
                    $("#btnTop").click(function () {
                        $("body").animate({scrollTop: 0}, 10);
                    });
                    //添加到购物车
                    $(document).on("click", '.add', function () {
                        var codeid = $(this).attr('codeid');
                        $.getJSON('<?php echo WEB_PATH; ?>/mobile/ajax/addShopCart/' + codeid + '/1', function (data) {
                            if (data.code == 1) {
                                addsuccess('添加失败');
                            } else if (data.code == 0) {
                                addsuccess('添加成功');
                            }
                            return false;
                        });
                    });
                    function addsuccess(dat) {
                        $("#pageDialogBG .Prompt").text("");
                        var w = ($(window).width() - 255) / 2,
                                h = ($(window).height() - 45) / 2;
                        $("#pageDialogBG").css({top: h, left: w, opacity: 0.8});
                        $("#pageDialogBG").stop().fadeIn(1000);
                        $("#pageDialogBG .Prompt").append('<s></s>' + dat);
                        $("#pageDialogBG").fadeOut(1000);
                        //购物车数量
                        $.getJSON('<?php echo WEB_PATH; ?>/mobile/ajax/cartnum', function (data) {
                            $("#btnCart").append('<em>' + data.num + '</em>');
                        });
                    }
                    //跳转页面
                    var gt = '.goodsList span,.goodsList h2,.goodsList .Progress-bar';
                    $(document).on('click', gt, function () {
                        var id = $(this).attr('id');
                        if (id) {
                            window.location.href = "<?php echo WEB_PATH; ?>/mobile/mobile/item/" + id + "/<?php echo $uids; ?>/";
                        }
                    });

                });

            </script>

        </div>
    </body>
</html>
<style>
    #pageDialogBG{-webkit-border-radius:5px; width:255px;height:45px;color:#fff;font-size:16px;text-align:center;line-height:45px;}
</style>
<div id="pageDialogBG" class="pageDialogBG">
    <div class="Prompt"></div>
</div>