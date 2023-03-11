<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
<div class="groups-stripes"></div>
<div class="layout980">
	<div class="groups-left">
		<div class="Topic-head">
			<div class="Topic-Himg"><a href="" class="fl-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $quanzi['img']; ?>" id="imgGroupIco" border="0"></a></div>
			<div class="Topic-HC">
				<div class="Topic-Htit gray03">
					<h2><a id="thisGroupName" href="" class="orange"><?php echo $quanzi['title']; ?></a></h2> 
					<?php if($quanzi['jiaru']=='Y'): ?>
					<?php if(!$addgroup): ?>
					<a id="btnJoinGroup" href="javascript:;" class="button04">申请加入</a>
					<?php  else: ?>
					<span class="JoinOut" id="spanJoinOut"><s></s>已加入<i>|</i><a id="btnJoinOutGroup" href="javascript:;" class="blue">退出</a></span>
					<?php endif; ?>
					<?php endif; ?>
				</div>
				<p class="Topic-Hinfo gray02">成员：
					<span class="gray01"><?php echo $quanzi['chengyuan']; ?></span>&nbsp;&nbsp;&nbsp;话题：
					<span class="gray01"><?php echo $quanzi['tiezi']; ?></span>&nbsp;&nbsp;&nbsp;创建时间：
					<span class="gray01"><?php echo date("Y-m-d H:i",$quanzi['time']); ?></span>
				</p>
				<div class="Topic-Hintro"><span id="pGroupAbout" class="gray01"><?php echo $quanzi['jianjie']; ?></span>&nbsp;</div>
			</div>
			<div class="Managers">
				<a class="Managers-icon" type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($quanzi['guanli']); ?>"></a>
				<div class="Managers-Himg"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($quanzi['guanli']); ?>" type="showCard" class="fl-img">
				<?php if(userid($quanzi['guanli'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($quanzi['guanli'],'img'); ?>" width="50" height="50" border="0"/>
				<?php endif; ?>				
				</a>
				<p class="Managers-name"><a type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($quanzi['guanli']); ?>" class="blue"><?php echo get_user_name($quanzi['guanli'],'username'); ?></a></p>
                <?php if(get_user_name($quanzi['guanli'],'username')=="1元微购"): ?>
                <p class="Managers-class"><span class="class-icon07"><s></s>微购官方</span></p>
                <?php endif; ?>
				</div>
			</div>
		</div>
		<div class="msg">
			<b><i></i>圈子公告：</b>
			<p id="pGroupNotice" class="gray01"><?php echo $quanzi['gongao']; ?></p>
		</div>
        <div id="commentList" class=" clrfix" style="display:none;">

        </div>
        <!--话题列表-->
		</div>
	<?php include templates("group","right");?>
</div>
<script>
$(function(){
	$("#btnJoinGroup,#btnJoinOutGroup").click(function(){
		var uid="<?php echo $uid; ?>";
		if(!uid){
			alert("你未登录！");
		}else{
			var qzid="<?php echo $quanzi['id']; ?>";
			var text=$("#btnJoinOutGroup").text();
			$.ajax({
				type:"POST",
				url:"<?php echo WEB_PATH; ?>/group/group/goqz",
				data:{id:qzid,text:text},
				success:function(){
					location.replace(location);
				}
			});
		}		
	});
	$("#txtTopicTitle,#btnPostTopic").click(function(){
		var uid="<?php echo uidcookie('uid'); ?>";
		var text=$("#btnJoinOutGroup").text();
		if(!uid){
			alert("你未登录！");
		}else if(!text){
			alert("你未加入圈子！");
		}else{
			$("#divEditor").removeClass("hidden");
			$(".Pub-inp-click").addClass("hidden");
		}
	});
	$("#btnCancel").click(function(){
		$("#divEditor").addClass("hidden");
		$(".Pub-inp-click").removeClass("hidden");
	});
	$("form").submit(function(){
		var text=$("#txtTopicTitleEx").val();
		if(!text){			
			alert("标题不能为空!");
			return false;
		}
	})
})
</script>

<script type="text/javascript">
       
            var base_url = "<?php echo WEB_PATH; ?>/group/group/huatiList/<?php echo $id; ?>";
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
        
    </script>
 <?php include templates("index","footer");?>