<?php 

	$footer_bg = 'dark';
	$site_info = get_theme_mod('_themename_site_info','');

 ?>
<?php if ($site_info) { ?>
<div class="c-site-info c-site-info--<?php echo $footer_bg; ?>">
    <div class="o-container">
        <div class="o-row">  
            <div class="o-row__column o-row__column--span-12 c-site-info__text">
          		<?php echo esc_html( $site_info ) ?> 
            </div>
        </div>
    </div>
</div>
<?php } ?>