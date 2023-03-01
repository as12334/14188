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

	<span class="lr5"></span><input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/auto_user'" value=" 真实会员 ">
    <span class="lr5"></span><input class="button" type="button" onclick="window.location.href='<?php echo $this_path; ?>/day_new'" value=" 今日新增 ">	
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
					<option value="uid">会员uid</option>
					<option value="money" >账户金额</option>
					<option value="score">会员微积分</option>
					<option value="jingyan">会员经验</option>
                    <option value="login_time">登陆时间</option>
					<option value="time">注册时间</option>
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
	</script>	
	
	<div class="lr10" style="display:inline-block;margin-left:20px;">
		共有会员: <font color="#0c0"> <?php echo $this->member_count_num; ?> </font>人
		<span class="lr10"></span>
		今日注册: <font color="#f60"> <?php echo $this->member_new_num; ?> </font>人
		<!--<span class="lr10"></span>
		删除会员: <font color="red"> <?php echo $this->member_del_num; ?> </font>人 -->
	</div>
</div>

<div class="lr10" style="line-height:30px;color:#f60">
	<b>会员列表:</b> <?php echo $select_where; ?> &nbsp;&nbsp;&nbsp; 共找到 <?php echo $total; ?> 个会员
</div>
<div class="us2tab" style="overflow:hidden;">
<div class="table-list lr10">        
  <!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr><th align='center'>选中</th>
            <th align="center">UID</th>
            <th align="center">用户名</th>
            <th align="center">邮箱</th>
            <th align="center">手机</th>
            <th align="center">金额</th>
			<!--<th align="center">微积分</th> 
			<th align="center">经验值</th> -->			
			<th align="center">登陆时间,地址,IP</th>
			<th align="center">注册时间</th>		
			<th align="center">真假</th>
            <th align="center">管理</th>
		</tr>
    </thead>
    <tbody>
    
    	<?php foreach($members as $v){ ?>
			<tr><td align='center'><input name="id[]" type="checkbox" id="id[]" value="<?php echo $v['uid']; ?>"/></td>
				<td align="center"><?php echo $v['uid']; ?></td>
				<td align="center"><?php echo $v['username']; ?></td>	
				<td align="center"><?php echo $v['email']; ?> <?php if($v['emailcode']==1){?><span style="color:#0c0">√</span><?php }else{ ?><span style="color:red">×</span><?php } ?></td>	
				<td align="center"> <?php if( $info['uid'] == 1){?>	<?php echo $v['mobile']; ?> <?php }else{ ?><?php echo _strcut($v['mobile'],8);?><?php } ?><?php if($v['mobilecode']==1){?><span style="color:#0c0">√</span><?php }else{ ?><span style="color:red">×</span><?php } ?></td>	
				<td align="center"><?php echo $v['money']; ?></td>
				<!--<td align="center"><?php echo $v['score']; ?></td>
				<td align="center"><?php echo $v['jingyan']; ?></td> -->				
				<td align="center"><?php echo _put_time($v['login_time'],"未登录"); ?>,<?php echo trim($v['user_ip'],","); ?>,<?php echo $v['getType']; ?>
                <?php if($v['band']!=""){echo ",".$v['band'];} ?>,<?php if( $v['yaoqing']>1){?>邀请人UID<span style="color:red"><?php echo $v['yaoqing'];?></span><?php } ?></td>	
				<td align="center"><?php echo _put_time($v['time']); ?></td>
				<td align="center"><?php if($v['auto_user']==0){?><span style="color:#0C0">真</span> <?php }else{ // echo trim($v['band'],","); ?><span style="color:red">假</span><?php } ?></td>
				<td align="center">
					<?php if($table=='@#_member_del'): ?>
					<a href="<?php echo G_MODULE_PATH; ?>/member/huifu/<?php echo $v['uid'];?>">恢复</a>				
					<a href="<?php echo G_MODULE_PATH; ?>/member/del_true/<?php echo $v['uid'];?>" onClick="return confirm('是否真的删除！');">删除</a>
					<?php else: ?>
						
                    <?php if( $info['uid'] == 1){?>		
                    [<a href="<?php echo G_MODULE_PATH; ?>/member/modify/<?php echo $v['uid'];?>">改</a>]
                    [<a href="<?php echo G_MODULE_PATH; ?>/member/del/<?php echo $v['uid'];?>" onClick="return confirm('是否真的删除！');">删</a>]
                    <?php }else{ ?>	
                    <?php if($v['uid'] == $_COOKIE['wuid']){ ?>	
                    [<a href="<?php echo G_MODULE_PATH; ?>/member/modify/<?php echo $v['uid'];?>">改</a>]
                    <?php }else{ ?>	
                    [<a href="javascript:;" onClick="alert('您没有权限哦！只能修改您自己的账号');">改</a>]
                    <?php } ?>
					[<a href="javascript:;" onClick="alert('您没有权限哦！');">删</a>]
                    <?php } ?>
					<?php endif; ?>
			   </td>            	
			</tr>
            <?php } ?>
  	</tbody>
</table>
  <!--table-list end-->
</div>
</div>

<div style="height:90px;"></div>
   <table width="100%"  cellspacing="0" cellpadding="0" id="ads" height="20px" border="0">
    <tr >
    <?php if($_COOKIE['auid']==1){?>
    <td align="left"><span id="selectAll" style="margin-left:5px;cursor:pointer;">全选</span>/<span id="reverse" style="cursor:pointer;">反选</span>

&nbsp;<input type="button" id="pl_del" class="button" value="批量删除"> 删除后不可恢复，此功能不可删除回收站

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
    		if(confirm('确定要批量删除选中的数据吗？ 删除后不可恢复'))
    		{
				var n = 0;
				var id = '';
				$("input[name='id[]']:checked").each(function(){
					n += 1;
					id += $(this).val() + ',';
				});
			    $.ajax({
			    		url:'<?php echo WEB_PATH;?>/mobile/user/ajaxall',
						data: {tabe: 'member', type: 'del', ac: 'uid', id: id},
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