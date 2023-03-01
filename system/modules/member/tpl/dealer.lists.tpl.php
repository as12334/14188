<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>

<div class="header-data lr10">

<!--	<span class="lr5"></span><input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/day_new'" value=" 今日新增 ">	
	<span class="lr5"></span><input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/day_shop'" value=" 今日消费 ">
	<span class="lr5"></span><input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/noreg'" value=" 未认证 ">
	<span class="lr5"></span><input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/del'" value=" 已删除 ">	
	<span class="lr5"></span>
	账号绑定:
	<select name="sousuo">
					<option value="b_qq">绑定QQ账户</option>					
	</select>
	<input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/b_qq'"  value="查看"> 
	
	<span class="lr10"></span>
	排序:
	<select id="user_paixu">
					<option value="uid">商家id</option>
					
					<option value="time">入驻时间</option>
	</select>
	<input class="button" type="button" onclick="order_fun_sub('desc')" value="倒序">
	<input class="button" type="button" onclick="order_fun_sub('asc')" value="正序">
	
	<script>
		var user_paixu_value = 'uid';
		function order_fun_sub(type){		
			window.location.href='<?php echo $this_path.'/'.$user_type."/"; ?>'+user_paixu_value+"/"+type;	
		}
		document.getElementById("user_paixu").onchange=function(){		
			user_paixu_value = this.value;		
		}
	</script>	-->
	
	<div class="lr10" style="display:inline-block;margin-left:20px;color:#f60">
    说明：查看店铺信息是否和商家入驻所填写的信息一样
		
	</div>
</div>
<br>
<!--<div class="lr10" style="line-height:30px;color:#f60">
	<b>商家列表:</b> <?php echo $select_where; ?> &nbsp;&nbsp;&nbsp; 共找到 <?php echo $total; ?> 个商家
</div> -->
<div class="us2tab" style="overflow:hidden;">
<div class="table-list lr10">        
  <!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr><th align='center'>选中</th>
            <th align="center">UID</th>
            <th align="center">登录名</th>
            <th align="center">店铺名</th>
            <th align="center">掌柜</th>
            <th align="center">邮箱</th>	
            <th align="center">手机</th>
            <th align="center">保证金</th>
			
			<th align="center">入驻时间</th>
            
            <th align="center">状态</th>		
			
            <th align="center">管理</th>
		</tr>
    </thead>
    <tbody>
    	<?php foreach($members as $v){ ?>
			<tr><td align='center'><input name="id[]" type="checkbox" id="id[]" value="<?php echo $v['id']; ?>"/></td>
				<td align="center"><?php echo $v['id']; ?></td>
				<td align="center"><?php echo $v['username']; ?></td>
                <td align="center"><?php echo $v['shopname']; ?></td>
				<td align="center"><?php echo $v['shopid']; ?></td>	
				<td align="center"><?php echo $v['email']; ?> <!--<?php if($v['emailcode']==1){?><span style="color:#0c0">√</span><?php }else{ ?><span style="color:red">×</span><?php } ?> --></td>	
				<td align="center"><?php echo $v['mobile']; ?> <!--<?php if($v['mobilecode']==1){?><span style="color:#0c0">√</span><?php }else{ ?><span style="color:red">×</span><?php } ?> --></td>	
				<td align="center"><?php echo $v['shopbzj']; ?> 元</td>
				<td align="center"><?php echo _put_time($v['time']); ?></td>
                				
				<td align="center"><?php if($v['pass']==0){?>正常<?php }elseif($v['pass']==1){?><span style="color:#906">入驻待审</span><?php }elseif($v['pass']==2){?><span style="color: #00F">审核通过</span><?php }elseif($v['pass']==3){?><span style="color:red">审核不通过</span><?php }?></td>
				
				
				<td align="center">
                <a href="<?php echo $v['shopurl'];?>" target="_blank">查看店铺</a> |  
                <a href="<?php echo G_MODULE_PATH; ?>/dealer/modify/<?php echo $v['id'];?>">修改</a> | 
					<?php if($v['pass']==1): ?>
					<a href="<?php echo G_MODULE_PATH; ?>/dealer/pass/<?php echo $v['id'];?>">通过</a> |  
                    			
					<a href="<?php echo G_MODULE_PATH; ?>/dealer/passno/<?php echo $v['id'];?>" onClick="return confirm('是否真的审核不过！');">不过</a> |
					<?php elseif($v['pass']==2): ?>
					 				
					<a href="<?php echo G_MODULE_PATH; ?>/dealer/passno/<?php echo $v['id'];?>" onClick="return confirm('是否真的取消审核！');">取消审核</a> |
                    <?php elseif($v['pass']==3): ?>
					 				
					<a href="<?php echo G_MODULE_PATH; ?>/dealer/pass/<?php echo $v['id'];?>">通过</a> |
                    <?php else: ?>
					正常 |  				
					
					<?php endif; ?>
                    <?php if( $info['uid'] == 1){?>	
                    <a href="<?php echo G_MODULE_PATH; ?>/dealer/del/<?php echo $v['id'];?>" onClick="return confirm('是否真的删除！');">删除</a>
                    <?php }else{ ?>	
                    
					<a href="javascript:;" onClick="alert('您没有权限哦！');">删除</a>
                    <?php } ?>
			   </td>            	
			</tr>
            <?php } ?>
  	</tbody>
</table>
</div><!--table-list end-->

</div>

<div style="height:90px;"></div>
   <table width="100%"  cellspacing="0" cellpadding="0" id="ads" height="20px" border="0">
    <tr >
    <?php if($_COOKIE['auid']==1){?>
    <td align="left"><span id="selectAll" style="margin-left:5px;cursor:pointer;">全选</span>/<span id="reverse" style="cursor:pointer;">反选</span>

&nbsp;<input type="button" id="pl_del" class="button" value="批量删除">

</td><?php }?>
			
			<td><div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div></td>
		</tr>
	</table>
    
    <script type="text/javascript">
$(function(){
    $("#selectAll").click(function () {
        $(".us2tab :checkbox").attr("checked", true);
    });

    $("#reverse").click(function () {
        $(".us2tab :checkbox").each(function () {
            $(this).attr("checked", !$(this).attr("checked"));
        });
    });

    
	$('#pl_del').click(function(){
    	if($("input[name='id[]']:checked").length < 1) alert('请先选择要删除的数据');
    	else
    	{
    		if(confirm('确定要批量删除选中的数据吗？'))
    		{
				var n = 0;
				var id = '';
				$("input[name='id[]']:checked").each(function(){
					n += 1;
					id += $(this).val() + ',';
				});
			    $.ajax({
			    		url:'<?php echo WEB_PATH;?>/mobile/user/ajaxall',
						data: {tabe: 'member_dealer', type: 'del', ac: 'id', id: id},
			    		success:function(result){
			    			if(result=='SUCCESS'){
			    				alert('删除成功！');
			    				location.reload();
			    			}else{
								
			    				alert('操作失败！');
			    			}
			    		}
			    });
    		}
    	}
    });
    
});


</script>
</body>
</html> 