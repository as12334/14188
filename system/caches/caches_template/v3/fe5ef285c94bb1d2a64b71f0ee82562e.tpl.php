<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="g-obtain-title clrfix">
                    <ul>
                        <li <?php if($cur_co==1): ?>class="curr"<?php endif; ?> ><a href="<?php echo WEB_PATH; ?>/member/home/modify">个人资料</a></li>
                        <li <?php if($cur_co==2): ?>class="curr"<?php endif; ?> ><a href="<?php echo WEB_PATH; ?>/member/home/userphoto">修改头像</a></li>
                        <li <?php if($cur_co==3): ?>class="curr"<?php endif; ?> ><a href="<?php echo WEB_PATH; ?>/member/home/address">收货地址</a></li>
                        <li <?php if($cur_co==4): ?>class="curr"<?php endif; ?> ><a href="<?php echo WEB_PATH; ?>/member/home/Security">账户安全</a></li>
                    </ul>
                </div>

<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>