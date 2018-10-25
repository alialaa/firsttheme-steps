<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header role="banner" class="u-margin-bottom-40">
		<div class="c-header">
		 <div class="o-container u-flex u-align-justify u-align-middle">
                <div class="c-header__logo">
                    <a class="c-header__blogname" href="<?php esc_url(home_url('/')); ?>">
						<?php esc_html(bloginfo( 'name' )); ?>
                    </a>
                </div>
                <?php get_search_form(); ?>
         </div>
        </div>
	</header>
	
	<div id="content">