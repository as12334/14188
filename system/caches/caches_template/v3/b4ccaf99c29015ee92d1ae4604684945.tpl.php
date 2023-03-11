<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $key; ?></title>
<meta content="app-id=518966501" name="apple-itunes-app" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" /><meta content="telephone=no" name="format-detection" />
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/goods.css" rel="stylesheet" type="text/css" />
<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/BuyRecord.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $key; ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

    <input name="hidCodeID" type="hidden" id="hidCodeID" value="18101" />
    <input name="hidIsEnd" type="hidden" id="hidIsEnd" value="1" />

    <!-- 记录 -->
    <em id="commentList" class=" clrfix" >
      

    </em>
   

    
<?php include templates("mobile/index","footer");?>

</div>

<script>

            var base_url = "<?php echo WEB_PATH; ?>/mobile/mobile/buyrecordslist/<?php echo $itemid; ?>/<?php echo $uids; ?>/";
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
              $.post("<?php echo WEB_PATH; ?>/mobile/mobile/buyrecordslist/<?php echo $itemid; ?>/<?php echo $uids; ?>/",{"page":page},function(data){  
			          
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
                if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 30) {
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

</body>
</html>
