<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/groups.css" rel="stylesheet" type="text/css" />

    <div class="g-main-con clrfix">
        <div class="groupsCon w1190">
	        <div class="g-groups-left">
		        <div class="groups-title gray3"><?php echo _cfg('web_name_two'); ?>圈</div>	        
		        <div class="groups-list clearfix">
		           <ul>
		               <?php $ln=1;if(is_array($quanzi)) foreach($quanzi AS $v): ?>
			                   <li>
				                <div class="groups-img"><a rel="nofollow" href="<?php echo WEB_PATH; ?>/group/show/<?php echo $v['id']; ?>" target="_blank" class="fl-img">
                                <?php if($v['img']==null): ?>
					<img src="<?php echo G_UPLOAD_PATH; ?>/quanzi/prmimg.jpg" title="<?php echo $v['title']; ?>" border="0" alt="">
					<?php  else: ?>
					<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $v['img']; ?>" title="<?php echo $v['title']; ?>" border="0" alt="">
					<?php endif; ?>
                                </a></div>
				                <div class="groups-info">
					                <p class="groups-name"><a href="<?php echo WEB_PATH; ?>/group/show/<?php echo $v['id']; ?>" target="_blank" title="<?php echo $v['title']; ?>" class="blue"><?php echo $v['title']; ?></a></p>
					                <p class="groups-class gray9">成员：<?php echo $v['chengyuan']; ?>&nbsp;&nbsp;&nbsp;&nbsp;话题：<?php echo $v['tiezi']; ?></p>
					                <p class="groups-intro gray9"><?php echo _strcut($v['jianjie'],52); ?></p>
				                </div>
			                </li>
			             <?php  endforeach; $ln++; unset($ln); ?>  
			                   
			               
		           </ul>
		        </div>
                <div class="groups-summary">
                     <div class="m-groups-tab">
                         <span <?php if($t==''): ?> class="curr" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/group/">推荐</a></span><span <?php if($t=='1'): ?> class="curr" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/group/?t=1"> 最新</a></span><span <?php if($t=='2'): ?> class="curr" <?php endif; ?>> <a href="<?php echo WEB_PATH; ?>/group/?t=2">热门</a></span>
                     </div>
                     <div class="m-groups-list">
                          <?php $ln=1;if(is_array($tiezi_zd)) foreach($tiezi_zd AS $v): ?>
                          <?php 
                           $id = $v['qzid'];
                           $qzi=$this->db->GetOne("select * from `@#_quanzi` where `id`='$id'"); 
                           $tzid = $v['id'];
                           $tzhueifu=$this->db->GetCount("select * from `@#_quanzi_tiezi` where `tiezi`='$tzid' and shenhe='Y'");   
                           ?>
                                  <dl>
                            	     <dt>
                                	    <span><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $v['id']; ?>" target="_blank"><?php echo $v['title']; ?></a></span>
                                        <cite><?php if($v['zhiding']=="Y"): ?><b class='f-group-icon'></b><?php endif; ?>
                                        <?php if($v['jinghua']=="Y"): ?><s class='f-group-icon'></s><?php endif; ?></cite>
                                        <em><?php echo date("Y-m-d H:i",$v['time']); ?></em>
                                     </dt>
                                     <dd>
                                	   <span>
                                         <a target="_blank" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($v['zuihou']); ?>" class="f-group-name"><?php echo get_user_name($v['zuihou'],'username'); ?></a>
                                         来自：<a href="<?php echo WEB_PATH; ?>/group/show/<?php echo $qzi['id']; ?>" target="_blank"><?php echo $qzi['title']; ?></a></span>
                                         <cite><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $v['id']; ?>" target="_blank" rel="nofollow">回复(<?php echo $tzhueifu; ?>)</a>
                                         <a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $v['id']; ?>" target="_blank" rel="nofollow">人气(<?php echo $v['dianji']; ?>)</a></cite>
                                     </dd>
                                  </dl>
                           <?php  endforeach; $ln++; unset($ln); ?>     
                           
                          <?php $ln=1;if(is_array($tiezi)) foreach($tiezi AS $v): ?>
                          <?php 
                           $id = $v['qzid'];
                           $qzi=$this->db->GetOne("select * from `@#_quanzi` where `id`='$id'"); 
                           $tzid = $v['id'];
                           $tzhueifu=$this->db->GetCount("select * from `@#_quanzi_tiezi` where `tiezi`='$tzid' and shenhe='Y'");   
                           ?>
                                  <dl>
                            	     <dt>
                                	    <span><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $v['id']; ?>" target="_blank"><?php echo $v['title']; ?></a></span>
                                        <cite><?php if($v['zhiding']=="Y"): ?><b class='f-group-icon'></b><?php endif; ?>
                                        <?php if($v['jinghua']=="Y"): ?><s class='f-group-icon'></s><?php endif; ?></cite>
                                        <em><?php echo date("Y-m-d H:i",$v['time']); ?></em>
                                     </dt>
                                     <dd>
                                	   <span>
                                         <a target="_blank" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($v['zuihou']); ?>" class="f-group-name"><?php echo get_user_name($v['zuihou'],'username'); ?></a>
                                         来自：<a href="<?php echo WEB_PATH; ?>/group/show/<?php echo $qzi['id']; ?>" target="_blank"><?php echo $qzi['title']; ?></a></span>
                                         <cite><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $v['id']; ?>" target="_blank" rel="nofollow">回复(<?php echo $tzhueifu; ?>)</a>
                                         <a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $v['id']; ?>" target="_blank" rel="nofollow">人气(<?php echo $v['dianji']; ?>)</a></cite>
                                     </dd>
                                  </dl>
                           <?php  endforeach; $ln++; unset($ln); ?>         
                              
                                  
                               
                     </div>
                 </div>               
	        </div>
	        <div class="groups-right groups-right-new">
	    <?php if(uidcookie('uid')): ?>        
<div class="groupsR-con">
    <div class="grhead-img">
         <ul>
            <li class="fl-img"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia(uidcookie('uid')); ?>" title="13420842451" target="_blank">
            <?php if(userid(uidcookie('uid'),'img')==null): ?>
		<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" border="0" />
		<?php  else: ?>
		<img  src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid(uidcookie('uid'),'img'); ?>"  border="0"/>
		<?php endif; ?>	<i class="transparent-png"></i></a></li>
            <li>
                <b><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia(uidcookie('uid')); ?>" rel='nofollow' target="_blank"><?php echo get_user_name(uidcookie('uid'),'username'); ?></a></b>
                <span class="class-icon0<?php echo $dengji_1['groupid']; ?>"><s></s><?php echo $dengji_1['name']; ?></span>
            </li>
         </ul>
    </div>
    <div class="grhead-info">
         <ul>
             <li><em class="gray6"><?php echo $m_huati; ?></em>话题</li>
             <li><em class="gray6"><?php echo $m_hueifu; ?></em>回复</li>
             <li id="liGroup" class="join-groups">
                 <p id="pJionGroup"><em><?php if(qznum()==null): ?>0<?php  else: ?><?php echo qznum(); ?><?php endif; ?></em>加入圈子<b></b></p>
                 <div id="divGroupList" class="joinClist-con" style="display:none;">
                     <div id="divShowList" class="grhead-joinClist" ></div>
                 </div>
             </li>
         </ul>
    </div>
</div>
<?php  else: ?>
<div class="groupsR-con">
     <div class="groups-login">
          <p>登录查看您的圈子吧！</p>
          <p>没账号？ <span><a href="<?php echo WEB_PATH; ?>/member/user/register" target="_blank">简单注册 快捷方便！</a></span></p>
          <a id="btnLogin" href="<?php echo WEB_PATH; ?>/member/user/login" class="f-group-login">立即登录</a>
     </div>                        
</div>
<?php endif; ?>
<input id="hidIsLogin" type="hidden" value="1" />




                
        <div class="blank10"></div>
        <div id="divHotTopic" class="groups-section clearfix">
            <div class="R-grtit"><h3>热门话题</h3></div>
    <?php $ln=1;if(is_array($tiezi)) foreach($tiezi AS $v): ?>
                          <?php 
                           $id = $v['qzid'];
                           $qzi=$this->db->GetOne("select * from `@#_quanzi` where `id`='$id'"); 
                           $tzid = $v['id'];
                           $tzhueifu=$this->db->GetCount("select * from `@#_quanzi_tiezi` where `tiezi`='$tzid' and shenhe='Y'");   
                           ?>
        <div class="Topic-list">
            <div class="groups-Rimg"><a type="showCard"  href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($v['hueiyuan']); ?>" target="_blank">
            <?php if(userid($v['hueiyuan'],'img')==null): ?>
			<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" border="0"/>
			<?php  else: ?>
			<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($v['hueiyuan'],'img'); ?>" border="0"/>
			<?php endif; ?><i class="transparent-png"></i></a></div>
            <div class="groups-Rinfo">
	            <p class="groups-ht"><a href='<?php echo WEB_PATH; ?>/group/show/<?php echo $qzi['id']; ?>' title='<?php echo $qzi['title']; ?>' target="_blank"><?php echo $v['title']; ?></a></p>
	            <p class="groups-c gray9"><?php echo $qzi['title']; ?><span> | </span><?php echo $tzhueifu; ?>条回复</p>
            </div>
        </div>
    <?php  endforeach; $ln++; unset($ln); ?> 
       
    
        </div>
    

        <div class="blank10"></div>
        <div class="groups-section clearfix">
            <div class="R-grtit"><h3>活跃成员</h3></div>
            <div class="Member-active clearfix">
                <ul id="ulMember">
    <?php $hueifu=$this->DB()->GetList("select * from `@#_quanzi_tiezi` group by hueiyuan order by id DESC limit 12",array("type"=>1,"key"=>'',"cache"=>0)); ?>
			<?php $ln=1;if(is_array($hueifu)) foreach($hueifu AS $hf): ?>
        <li><a type="showCard"  href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($hf['hueiyuan']); ?>" target="_blank" class="blue">
        <span><?php if(userid($hf['hueiyuan'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg"  border="0"/>
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($hf['hueiyuan'],'img'); ?>"  border="0"/>
				<?php endif; ?>	<b class="transparent-png"></b></span><i><?php echo get_user_name($hf['hueiyuan'],'username'); ?></i></a></li>
            <?php  endforeach; $ln++; unset($ln); ?>
	<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>   
    
        
    
                </ul>
            </div>
        </div>
    

	        </div>
        </div>
    </div>
   
    <!--底部-->
 <?php include templates("index","footer");?>