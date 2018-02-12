<?php
include("class/My_require.php");

 if($notifi->total_not()>0): ?>
				<strong style="margin-left:-25px; background:rgba(255,0,0,0.6); color:#fff;">
				<?php echo $notifi->total_not(); ?>
				</strong>
				<?php endif;?>