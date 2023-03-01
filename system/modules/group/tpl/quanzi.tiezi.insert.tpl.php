<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/api-uploadify.js" type="text/javascript"></script> 
<link rel="stylesheet" href="<?php echo G_PLUGIN_PATH; ?>/calendar/calendar-blue.css" type="text/css"> 
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/calendar/calendar.js"></script>
<script type="text/javascript">
var editurl=Array();
editurl['editurl']='<?php echo G_PLUGIN_PATH; ?>/ueditor/';
editurl['imageupurl']='<?php echo G_ADMIN_PATH; ?>/ueditor/upimage/';
editurl['imageManager']='<?php echo G_ADMIN_PATH; ?>/ueditor/imagemanager';
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/ueditor/ueditor.all.min.js"></script>
<style>
body{ background-color:#fff}
.textarea{width:400px;height:100px;}
</style>
</head>
<body>
<script language="JavaScript">
$(function(){
	$("form").submit(function(){
		var username=$("#username").val();
		var title=$("#title").val();
		if(username.length<1){
			alert("发帖子会员不能为空");
			return false;
		}
		if(title.length<1){
			alert("帖子标题不能为空");
			return false;
		}
		return true;
	});
})
</script>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<form action="" method="post" id="myform">
<table width="100%" >
    <tr>
    	<td width="100"><span style="color:red">* </span>帖子圈子：</td> 
   		<td><select name="qzid" class=" wid300"><?php foreach($quanzi as $v){ ?>
            
            <option value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></option>
           
             <?php } ?> </select></td>
    </tr>
    <tr>
    	<td width="100"><span style="color:red">* </span>发帖子会员：</td> 
   		<td><input type="text" name="username" style="width:300px;" class="input-text" id="username" value=""></input>
        (请填写邮箱/手机)
        </td>
    </tr>
    <tr>
    	<td width="100"><span style="color:red">* </span>帖子标题：</td> 
   		<td><input type="text" name="title" style="width:300px;" class="input-text" id="title" value=""></input></td>
    </tr>	
    <tr>
    	<td><span style="color:red">* </span>帖子内容：</td>
    	<td>
        <textarea name="neirong" class='content' id="myeditor" type="text/plain">
	    		
	   			 </textarea>
        </td>
	</tr>
    <tr>
    	<td width="100">帖子封面：</td> 
   		<td>
        <img src="<?php echo G_UPLOAD_PATH; ?>/photo/goods.jpg" style="border:1px solid #eee; padding:1px; width:50px; height:50px;">
           	<input type="text" id="imagetext" name="thumb" value="photo/goods.jpg" class="input-text wid300">
			<input type="button" class="button"
             onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','缩略图上传','image','shopimg',1,500000,'imagetext')" 
             value="上传图片"/> 除了轻松一刻和精彩视频，其它的可以不用上专
        </td>
    </tr>
    <tr>
    	<td width="100">帖子视频url：</td> 
   		<td><input type="text" name="url" style="width:300px;" class="input-text" id="url" value=""></input></td>
    </tr>
	<tr>
    	<td>置顶：</td>
		<?php if($tiezi['zhiding']=='Y'){ ?>
    	<td>
		<input type="radio" name="zhiding" checked="checked" class="input-text" value="Y">是
		<input type="radio" name="zhiding" class="input-text" value="N">否
		(帖子是否置顶)</td>
		<?php }else{ ?>
		<td>
		<input type="radio" name="zhiding" class="input-text" value="Y">是
		<input type="radio" name="zhiding" checked="checked" class="input-text" value="N">否
		(帖子是否置顶)</td>
		<?php } ?>
	</tr>
    <tr>
    	<td>精华：</td>
		<?php if($tiezi['jinghua']=='Y'){ ?>
    	<td>
		<input type="radio" name="jinghua" checked="checked" class="input-text" value="Y">是
		<input type="radio" name="jinghua" class="input-text" value="N">否
		(帖子是否精华)</td>
		<?php }else{ ?>
		<td>
		<input type="radio" name="jinghua" class="input-text" value="Y">是
		<input type="radio" name="jinghua" checked="checked" class="input-text" value="N">否
		(帖子是否精华)</td>
		<?php } ?>
	</tr>
</table>
   	<div class="bk15"></div>
   <br><br>
    <table width="100%"  cellspacing="0" cellpadding="0" id="ads">
    <tr >
			<td align="right" style="width:120px"></td>
			<td><input class="button" type="submit" name="submit" value="提交" />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="button" name="submit" value="返回"  onClick="javascript:history.go(-1);"></td>
		</tr>
	</table>
	
</form>
</div>
<style>
        #ads{
    position:fixed;
    
   
left:0px; bottom:0px;
    border:1px solid #ffbe7a;
    width:100%;
    height:30px;
	background:#fffced;
	
	padding:2px;
	
}

        </style>
<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('myeditor');
    ue.addListener('ready',function(){
        this.focus()
    });
	var info=new Array();
    function gbcount(message,maxlen,id){ 
		if(!info[id]){
			info[id]=document.getElementById(id);
		}
        var lenE = message.value.length;
        var lenC = 0;
        var enter = message.value.match(/\r/g);
        var CJK = message.value.match(/[^\x00-\xff]/g);//计算中文
        if (CJK != null) lenC += CJK.length;
        if (enter != null) lenC -= enter.length;		
		var lenZ=lenE+lenC;		
		if(lenZ > maxlen){
			info[id].innerHTML=''+0+'';
			return false;
		}
		info[id].innerHTML=''+(maxlen-lenZ)+'';
    }
	
function set_title_color(color) {
	$('#title2').css('color',color);
	$('#title_style_color').val(color);
}
function set_title_bold(){
	if($('#title_style_bold').val()=='bold'){
		$('#title_style_bold').val('');	
		$('#title2').css('font-weight','');
	}else{
		$('#title2').css('font-weight','bold');
		$('#title_style_bold').val('bold');
	}
}

//API JS
//window.parent.api_off_on_open('open');
</script>
</body>
</html> 
