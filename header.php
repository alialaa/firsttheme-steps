<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <a class="u-skip-link" href="#content"><?php esc_attr_e('Skip to content','_themename'); ?></a>
	<header role="banner" class="u-margin-bottom-40">
		<div class="c-header">
            <div class="o-container u-flex u-align-justify u-align-middle">
                <div class="c-header__logo">
                    <?php if (has_custom_logo( )) {
                        the_custom_logo();
                    } else { ?>
                        <a class="c-header__blogname" href="<?php esc_url(home_url('/')); ?>">
                            <?php esc_html(bloginfo( 'name' )); ?>
                        </a>
                    <?php } ?>
                </div>
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="c-navigation">
            <div class="o-container">
                <nav class="header-nav" role="navigation" aria-label="<?php esc_html_e( 'Main Navigation', '_themename ') ?>" >
                    <?php wp_nav_menu( array('theme_location' => 'main-menu') ) ?>
                </nav>
            </div>
        </div>
	</header>
	
	<div id="content">
    
    <!-- <img src="http://via.placeholder.com/1200x500" alt="">-->    
    <?php 
    //var_dump(wp_get_attachment_image_url(1905,'_themename-blog-image'));