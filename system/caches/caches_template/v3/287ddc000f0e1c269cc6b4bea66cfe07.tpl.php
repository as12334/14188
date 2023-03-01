<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>

<!DOCTYPE html>
<html style="background-color: #f3f3f3">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $title; ?> - <?php echo $webname; ?>触屏版</title>     
    <meta content="app-id=518966501" name="apple-itunes-app" />     
   

    <meta content="yes" name="apple-mobile-web-app-capable" />     
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />     
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/bootstrap.css"> -->
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/header_footer.css?i=2205">
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.min.css?i=2205"/>
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/single.css?" rel="stylesheet" type="text/css" />

<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>



<style>
.a_user_img1 {
display: block;
width:64px;
margin: 5px auto;
border-radius: 50%;

background:#fff;
}
.a_user_img {
display: block;
width:64px;
position:absolute;
border-radius: 50%;
margin:2px;

}
.IImg{
width:64px;
margin-top:12px;
 float: left;
 border-radius: 50%;
}
.wz1{
   float: left;
   line-height: 20px;
    width: 198px;
    font-size: 16px;
    margin-top: 24px;
    margin-left: 20px;
    color:#555555;
}
.wz2{
    font-size: 12px;
    color:#888888;
	width: 198px;
}
.borders{
	
	border:1px dashed #f3f3f3;
	}
,green{ color:#06F}	

</style>

</head>
<body ><div class="h5-1yyg-v1">
<header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $title; ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

    <!--S 内容区域 -->
    
    <section class="clearfix g-share-lucky" style="height:100px;background-position: 95% center;border-bottom: 6px solid #f3f3f3;">      
        
			<!-- <s class="z-Reward"></s> -->
            <a href="<?php echo WEB_PATH; ?>/mobile/group/show/<?php echo $quanzi['id']; ?>/<?php echo $uids; ?>/" class="fl u-lucky-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $quanzi['img']; ?>" border="0" ></a>
			
			<div class="u-lucky-r">
				<p><em class="green"><?php echo $quanzi['title']; ?></em><br/><em class="wz2">
       成员：<b class="red"><?php echo $quanzi['chengyuan']; ?></b>&nbsp;&nbsp;&nbsp;话题：<b class="red"><?php echo $quanzi['tiezi']; ?></b>
					
       </em><br/><em class="wz2"><?php echo _strcut($quanzi['jianjie'],182); ?></em></p> 
				
			</div>                
        </section>
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/newsvideo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/video.css" />
<!-- 特别精彩 -->
<section class="g-main">
	    <div class="m-tt1">
		    <h2 class="fl">特别精彩</h2>
		    <div class="fr u-more">
			    
		    </div>
	    </div>
        <article class="clearfix h5-1yyg-w310 m-round ">
    <div class="c_big_box" >
        <div class="c_video_box" >
        <ul class="c_video_boxs" >
    <em id="commentList" class=" clrfix" >
      

      </em>
      </ul> 
       </div>
</div>
</article>
      </section>
      </div>
   <script type="text/javascript">
       
            var base_url = "<?php echo WEB_PATH; ?>/mobile/group/huatiList/<?php echo $id; ?>";
            var ehtml = '<div id="divTopicShow"  style="text-align:center" >正在加载…</div>';
			$("#commentList").html(ehtml).show();



            var getAllp = function(){
                    
					$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html( "数据加载失败,请重试!").show();
                        }
                    });
             	
};
getAllp();
 
 $(function(){
       
    scrollPage(getGoodsList); //启用无限滚动 触发事件后执行回调函数
        
        function getGoodsList(page){
              $.post(base_url,{"page":page},function(data){  
			          
                    $("#commentList").append(data);
              })
        }
    });
    /*
     * 描述：无限分页功能，当页面滚动到dataMore 时 触发 调用数据功能
     * 使用方法：需要页面添加  dataMore(滑动加载更多数据)
     * 参数：callBackFun  回调函数 （ajax 请求数据的函数）
     * 返回值：无
     * */
    var isload = true;
    var page=1;
	
    function scrollPage(callBackFun) {
        $(window).scroll(function() {
            if (isload) { //ajax在后台获取数据时，设值其false，防止页面多次加载
                // var more_top =document.getElementById("dataMore").offsetTop; //加载更多层距离document 顶部的距离
                if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 50) {
                    //更多出现在滚动区域
                    page++;
                   if(page>="<?php echo $totals; ?>"){
                        isload=false;
                    }
                    callBackFun(page);
                }
            }
        });
    }       
    </script>
<?php include templates("mobile/index","footer");?>
</body>
</html>