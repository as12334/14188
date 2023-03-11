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
        
        <script>
            $(function(){
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
        <div class="h5-1yyg-v1" id="loadingPicBlock">

            <!-- 栏目页面顶部 -->

            <?php include templates("mobile/index","header");?>
            <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/ajax.js"></script>
            <div class="pro-s-box thin-bor-bottom search-box focus-box" id="divSearch">
                <form action="<?php echo WEB_PATH; ?>/mobile/search/" method="post">
                    <div class="box">
                        <div class="border">
                            <div class="border-inner"></div>
                        </div>
                        <div class="input-box">
                            <i class="s-icon"></i>
                            <input type="text" placeholder="输入“汽车”试试" value="<?php echo $txt; ?>" id="txtSearch" name="txt" maxlength="10">
                            <i class="c-icon" id="btnClearInput" style="display: none"></i>
                        </div>
                    </div>
                    <input type="submit" class="s-btn" id="btnSearch" value="搜索" />
                </form>
            </div>
            <!-- 内页顶部 -->
            <section class="goodsCon">
                <!-- 列表 -->
                <div class="goodsList">
                    <div class="result-num thin-bor-bottom" id="divResultTip" style="">
                        <?php if($count): ?>
                        共&nbsp;<span class="orange" id="spCount"><?php echo $count; ?></span>&nbsp;个关于“<span id="spKeyWord" class="orange"><?php echo $txt; ?></span>”的搜索结果
                        <?php  else: ?>
                        没有相关结果。
                        <?php endif; ?>
                    </div>
                    <?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $goods): ?>
                    <ul>
                        <li>
                            <span id="<?php echo $goods['id']; ?>" class="z-Limg">
                                <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $goods['thumb']; ?>"></span>
                            <div class="goodsListR">
                                <h2 id="<?php echo $goods['id']; ?>"><?php echo $goods['title']; ?></h2>
                                <div class="pRate">
                                    <div class="Progress-bar" id="<?php echo $goods['id']; ?>">
                                        <?php 
                                        $mypro = $goods['canyurenshu']/$goods['zongrenshu']*100;
                                         ?>
                                        <p class="u-progress">
                                            <span class="pgbar" style="width:<?php echo $mypro; ?>%;"><span class="pging"></span></span>
                                        </p>
                                        <ul class="Pro-bar-li">
                                            <li class="P-bar01"><em><?php echo $goods['canyurenshu']; ?></em>已参与</li>
                                            <li class="P-bar02"><em><?php echo $goods['zongrenshu']; ?></em>总需人次</li>
                                            <li class="P-bar03"><em><?php echo $goods['shenyurenshu']; ?></em>剩余</li>
                                        </ul>
                                    </div>
                                    <a class="add " codeid="<?php echo $goods['id']; ?>" href="javascript:;"><s></s></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <?php  endforeach; $ln++; unset($ln); ?>
                </div>
            </section>
            <?php include templates("mobile/index","footer");?>

        </div>
    </body>
</html>