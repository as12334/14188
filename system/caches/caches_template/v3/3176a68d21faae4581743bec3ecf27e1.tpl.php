<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!-- 栏目导航 -->
    <nav class="g-snav u-nav">
	    <div class="g-snav-lst"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" <?php if($key=="首页" ): ?>class="nav-crt"<?php endif; ?>>首页</a> <?php if($key=="首页" ): ?><s class="z-arrowh"></s><?php endif; ?></div>
		
	    <div class="g-snav-lst"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/glist/<?php echo $uids; ?>/" <?php if($key=="所有商品" ): ?>class="nav-crt"<?php endif; ?>>所有商品</a><?php if($key=="所有商品" ): ?><s class="z-arrowh"></s><?php endif; ?></div>
		
	    <div class="g-snav-lst"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/lottery/<?php echo $uids; ?>/" <?php if($key=="最新揭晓" ): ?>class="nav-crt"<?php endif; ?>>最新揭晓</a><?php if($key=="最新揭晓" ): ?><s class="z-arrowh"></s><?php endif; ?></div>
		
	    <div class="g-snav-lst"><a href="<?php echo WEB_PATH; ?>/mobile/shaidan/?yid=<?php echo $uids; ?>/" <?php if($key=="晒单" ): ?>class="nav-crt"<?php endif; ?>>晒单</a><?php if($key=="晒单" ): ?><s class="z-arrowh"></s><?php endif; ?></div>
		
	    <div class="g-snav-lst"><a href="<?php echo WEB_PATH; ?>/mobile/autolottery/?yid=<?php echo $uids; ?>/" <?php if($key=="限时" ): ?>class="nav-crt"<?php endif; ?>>限时</a><?php if($key=="限时" ): ?><s class="z-arrowh"></s><?php endif; ?></div>
    </nav>
