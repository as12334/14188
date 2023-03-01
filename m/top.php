<?php 
$u=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$arrays   = explode("/", $u);
$coupon_end_time = time();
$time  = date("Y-m-d H:i:s") ;
$ttime = date('Y-m-d',strtotime("-1 days"))." 10";
?>

 <div class="app-other">
    <ul>
    <li class="search">
        <div id="search-box">
            <form id="search-form" action="<?php echo $url; ?>/m/search/" method="post">
                <div class="box-search">
                    <input type="text" id="keyword" name="keywords" x-webkit-speech="" placeholder="搜索商品" autocomplete="off" value="">
                    <a href="javascript:;" class="del"><img src="<?php echo $url; ?>/m/images/icon/del.png"></a>
                </div>
                <input type="hidden" id="page" value="">
                <button id="search-submit" type="submit">
                    <img src="<?php echo $url; ?>/m/images/icon/search.png">
                </button>
            </form>
        </div>
    </li>
            <li  class="normal <?php if($arrays['2']==""){?> active <?php }?> ">
        <a href="<?php echo $url; ?>/m">
        <em class="home"></em>首页</a></li>
          <!--  <li  class="normal <?php if($arrays['2']=="fuzhuang"){?> active <?php }?> ">
        <a href="<?php echo $url; ?>/m/fuzhuang">
        <em class=" fushi"></em>服装折扣</a></li>
           <li class="normal <?php if($arrays['2']=="xiebao"){?> active <?php }?> ">
        <a href="<?php echo $url; ?>/m/xiebao">
        <em class=" xiebao"></em>鞋包折扣</a></li>
            <li class="normal <?php if($arrays['2']=="muying"){?> active <?php }?> ">
        <a href="<?php echo $url; ?>/m/muying">
        <em class=" muying"></em>母婴折扣</a></li>
            <li class="normal <?php if($arrays['2']=="jujia"){?> active <?php }?> ">
        <a href="<?php echo $url; ?>/m/jujia">
        <em class=" jujia"></em>居家折扣</a></li>
            <li class="normal <?php if($arrays['2']=="other"){?> active <?php }?> ">
        <a href="<?php echo $url; ?>/m/other">
        <em class=" other"></em>其他折扣</a></li> -->
        </ul>
    <p><a href="<?php echo $url; ?>/m/user/"><em  class="icon-user"></em><br>个人中心</a>
    <!--<a href="<?php echo $url; ?>/m/about"><em class="icon-about"></em><br>关于我们</a> -->
    <a href="<?php echo $url; ?>/index.php/mobile/lucky/"><em class="icon-about"></em><br>幸运抽奖</a></p> 
</div>


<!--<script type="text/javascript" src="<?php echo $url; ?>/m/js/jquery.masonry.min.js"></script> -->