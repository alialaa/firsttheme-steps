 	<?php 
        $footer_layout = '3,3,3,3';
		$columns = explode(',', $footer_layout);
		$footer_bg = 'dark';
		$widgets_active = false;
		   foreach ($columns as $i => $column) {
		       if( is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
		           $widgets_active = true;
		       }
		   }
    ?>
	<?php if($widgets_active) { ?>
		<div class="c-footer c-footer--<?php echo $footer_bg; ?>">
		    <div class="o-container">
		        <div class="o-row">
		            <?php foreach($columns as $i => $column) { ?>
		                <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column ?>@medium">
		                    <?php if(is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
		                        dynamic_sidebar( 'footer-sidebar-' . ($i + 1) );
		                    } ?>
		                </div>
		            <?php }?>
		        </div>
		    </div>
		</div>
	<?php } ?>
	<?php 

	$footer_bg = 'dark';

 ?>