<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="Publish">
			<div class="Pub-inp-click">
				<b></b>
				<input type="text" id="txtTopicTitle" value="点击展开"><a id="btnPostTopic" href="javascript:;" class="button05">发表话题</a>
			</div>
			<div id="divEditor" class="Pub-topic hidden">
			<form action="<?php echo WEB_PATH; ?>/group/group/showinsert" method="post" id="wfform" name="wfform" >
				<p class="Pub-tit"><b></b><input id="txtTopicTitleEx" maxlength="100" type="text" name="title" value="请输入标题"></p>				
				<!--编辑器开始-->		
                <script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/api-uploadify.js" type="text/javascript"></script> 
<link rel="stylesheet" href="<?php echo G_PLUGIN_PATH; ?>/calendar/calendar-blue.css" type="text/css"> 
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/calendar/calendar.js"></script>		
				<script type="text/javascript">				
				var editurl=Array();
				editurl['editurl']='<?php echo G_PLUGIN_PATH; ?>/ueditor/';
				editurl['imageupurl']='<?php echo G_ADMIN_PATH; ?>/ueditor/upimage/';
				editurl['imageManager']='<?php echo G_ADMIN_PATH; ?>/ueditor/imagemanager/';			
				</script>
				<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/ueditor/ueditor.config.js"></script>
				<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/ueditor/ueditor.all.min.js"></script>
				<p class="Pub-con" style="width:680px;"><b></b><script name="neirong" id="txtTopicContent" type="text/plain"></script></p>
				<script type="text/javascript">			
				window.UEDITOR_CONFIG.initialContent='';
				window.UEDITOR_CONFIG.initialFrameWidth=678;
				window.UEDITOR_CONFIG.initialFrameHeight=300;
				<!--window.UEDITOR_CONFIG.fontsize=[8,9,10, 11, 12]; -->
				<!--window.UEDITOR_CONFIG.toolbars = [["source","fontfamily","bold","italic","justifyleft","justifycenter","justifyright","justifyjustify","insertunorderedlist",]]; -->
				<!--window.UEDITOR_CONFIG.fontfamily=[{ label:'',name:'songti',val:'宋体,SimSun'},{ label:'',name:'arial',val:'arial, helvetica,sans-serif'}]; -->
				<!--window.UEDITOR_CONFIG.maximumWords = 60000; -->
				var ue = UE.getEditor('txtTopicContent');
				</script>
				<!--编辑器结束-->
				<input type="hidden" value="<?php echo $quanzi['id']; ?>" name="qzid" id="qzid" />
				<div class="Pub-btn-r">
					<div  style="line-height:25px;display: inline-block;padding:0px;">
												
					</div>	
					<a id="btnCancel" href="javascript:;" class="button06">取消</a>
					<input type="button" id="btnPostTopicEx" style="float:right; margin-left:10px" name="submit" class="button05" value="发表话题" />
				</div>
			</form>
			</div>
		</div>		
       
		<div class="Topic-tab">
			<ul>
				<li class="tabcur">话题</li>
			</ul>
		</div>
		<?php if($total==0): ?>
		<div class="tips-con"><i></i>暂无话题，快抢沙发吧！</div>
		<?php  else: ?>
		<?php $ln=1;if(is_array($qz)) foreach($qz AS $tiezi): ?>
		<div class="Topiclist">
			<div class="Topiclist-img">
				<a type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tiezi['hueiyuan']); ?>" class="head-img">
				<?php if(userid($tiezi['hueiyuan'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($tiezi['hueiyuan'],'img'); ?>" width="50" height="50" border="0"/>
				<?php endif; ?>	
				</a>
				<a type="showCard" rel="nofollow" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tiezi['hueiyuan']); ?>" class="blue"><?php echo get_user_name($tiezi['hueiyuan'],'username'); ?></a>
			</div>
			<div class="Topiclist-RC "><b class="arrow"></b>
				<div class="R-tit gray">		
					<?php if($tiezi['zhiding']=='Y'): ?>
					<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/" class="red"><?php echo $tiezi['title']; ?></a>
					<i class="zhiding"></i>&nbsp;
					<?php  else: ?>
					<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/"><?php echo $tiezi['title']; ?></a> 
				   <!--  <i class="jing"></i>&nbsp; -->
				   <?php endif; ?>
					<span class="time"><?php echo date("Y年m月d日 H:i",$tiezi['time']); ?></span>
				</div>
                         <?php 
                         $neirong = strip_tags($tiezi['neirong']);  
                         $hueifu=$this->db->GetOne("select * from `@#_quanzi_tiezi` WHERE tiezi='$tiezi[id]' and `shenhe` = 'Y' order by id DESC");                  
                        ?>
				<div class="gray02"><?php echo _strcut($neirong,290); ?></div>
				<div class="topic-reply">
					<div>
						<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/" class="gray02">回复<span class="gray03">(<?php echo $tiezi['hueifu']; ?>)</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/" class="gray02">人气<span class="gray03">(<?php echo $tiezi['dianji']; ?>)</span></a>
					</div>
                    <?php if(get_user_name($hueifu['hueiyuan'],'username')!=""): ?>
					<span class="gray03">最后回复：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tiezi['zuihou']); ?>" class="blue"><?php echo get_user_name($hueifu['hueiyuan'],'username'); ?></a>&nbsp;&nbsp;<?php echo date("Y年m月d日 H:i:s",$hueifu['time']); ?>&nbsp;&nbsp;</span>		
                    <?php endif; ?>	
				</div>
			</div><p class="Topicline"></p>
		</div>			
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if($total>$num): ?>
		<div class="pagesx"><?php echo $page->show('two'); ?></div>
		<?php endif; ?>
		<?php endif; ?>	
	
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

<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }

</style>
<script type="text/javascript">
$("#txtTopicTitleEx").focus(function(){		
	     	var va1=$("#txtTopicTitleEx").val();
		    if($("#txtTopicTitleEx").val()=='请输入标题'){
			$("#txtTopicTitleEx").val("");
		         }
	        });
			$("#txtTopicTitleEx").blur(function(){		
	     	var va1=$("#txtTopicTitleEx").val();
		    if($("#txtTopicTitleEx").val()==''){
			$("#txtTopicTitleEx").val("请输入标题");
		         }
	        });
	
function onpage(id){
	var base_urls = "<?php echo WEB_PATH; ?>/group/group/huatiList/<?php echo $id; ?>"; 
	var ehtml = '<div id="divTopicShow"  style="text-align:center" >正在加载…</div>';
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
                            $('#commentList').html( "数据加载失败,请重试!").show();
                        }
                    });
	
}
        $(function () {
			    
				
            var base_url = "<?php echo WEB_PATH; ?>/group/group/showinsert";
            var ehtml = '<i><img src="<?php echo G_TEMPLATES_STYLE; ?>/newimages/tips-ico.png" width="15" sytle="vertical-align:middle"/></i> ';
			
			
			 function checkTitle() {
                var value = $("#txtTopicTitleEx").val();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (value == '请输入标题') {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "话题标题不能为空！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                }
  

                if (value.length < 3) {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "话题标题不能少于3个字！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                }
				if (value.length > 100) {
					var lentext = value.length-100;
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "已超过"+lentext+"个字了，删除一些吧！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                }
               
                return true;
				
            }

				
				

               
			 
			  function checkUserName() {
                var value = ue.getContent();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				
  

                if (value == '' || value.length < 3) {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "话题内容不能少于3个字！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                }
				
               
                return true;
				
            }


            function len(value) {
                var total = 0;
                for (i = 0; i < value.length; i++) {
                    var char = value.charCodeAt(i);
                    if ((char >= 0x0001 && char <= 0x007e) || (0xff60 <= char && char <= 0xff9f)) {
                        total++;
                    }
                    else {
                        total += 2;
                    }
                }
                return total;
            }


           

            $("#btnPostTopicEx").click(function () {
                 if (checkUserName() && checkTitle()) {
                    txtTopicContent = ue.getContent();
					txtTopicTitleEx = $("#txtTopicTitleEx").val();
					qzid = $("#qzid").val();
                    
				
					
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'EditorAjax', txtTopicContent: txtTopicContent, txtTopicTitleEx: txtTopicTitleEx, qzid: qzid},
                        success: function (data) {
                            if (data != '1000') {
                                $(".copy-tips").show();
                                $(".wap-tips").html(ehtml + data).show();
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								$("#btnPostTopicEx").val("发表话题");
                            } else {
								$("#btnPostTopicEx").val("正在发表...");
								setTimeout(getAllp,50);
                               // $(".login-success").show();
								//$("#btnSubmitMsg").addClass("letter-noSpac").html("登录成功");
                                  //  location.href = "<?php echo WEB_PATH; ?>/go/shaidan/Editor/<?php echo $shaidan['sd_id']; ?>";
                               
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
				 }
            });
        });
    </script>