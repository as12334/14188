<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm1.css"/>

<br />
<article class="m-share-comment m-round">
                <h3>共<span id="ReplyCount"  class="z-user orange"><?php echo $total; ?></span>条评论 &nbsp;&nbsp;<em><?php echo $tiezi['dianji']; ?></em>人阅读</h3>
                <ul id="replyList">
					<?php $ln=1;if(is_array($hueifu)) foreach($hueifu AS $hf): ?>
					<li>
						<a class="fl u-comment-img" href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $hf['hueiyuan']; ?>/<?php echo $uids; ?>/">
                        
							<?php if(userid($hf['hueiyuan'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($hf['hueiyuan'],'img'); ?>" width="50" height="50" border="0"/>
				<?php endif; ?>	
						</a>
						<div class="u-comment-r">
							<p class="z-comment-name"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $hf['hueiyuan']; ?>/<?php echo $uids; ?>/" class="blue"><?php echo get_user_name($hf['hueiyuan'],'username'); ?></a></p>
							<p class="gray6"><span><?php echo $hf['neirong']; ?></span><b><?php echo date("Y-m-d H:i:s",$hf['time']); ?></b></p>
						</div>
					</li>
					<?php  endforeach; $ln++; unset($ln); ?>
				</ul>
                <!-- <a id="btnLoadMore" class="loading" href="javascript:void(0);" style="display:none;">点击加载更多</a>
                <div id="divLoading" class="loading"style="display:none;"><b></b>正在加载</div> -->
                
</article>
<?php if($total>$num): ?>
				<div class="pagesx"><?php echo $page->show('two'); ?></div>
				<?php endif; ?>
<script type="text/javascript">
function onpage(id){
	var base_urls = "<?php echo WEB_PATH; ?>/mobile/group/neifu/<?php echo $tid; ?>";
	var ehtml = '<div id="divTopicShow"  style="text-align:center; padding:20px 0;" ><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/loading.gif" width="30" sytle="vertical-align:middle"/></div>';
	$("#commentList").html(ehtml).show();
	$.ajax({
                        url: base_urls,
                        async : true,
		                addidvalue: true,
                        data: {p: id},
                        success: function (data) {
                           $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
	
}
    </script>
