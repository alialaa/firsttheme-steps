<?php get_header(); ?>
<?php
    $layout = _themename_meta( get_the_ID(), '__themename_post_layout', 'full' );
    $sidebar = is_active_sidebar( 'primary-sidebar' );
    if($layout === 'sidebar' && !$sidebar) {
        $layout = 'full';
    }
?>
<div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout; ?>">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $layout === 'sidebar' ? '8' : '12' ?>@medium">
            <main role="main">
                <?php if(have_posts()) { ?>
                    <?php while(have_posts()) { ?>
                        <?php the_post(); ?>

                        <?php get_template_part('template-parts/post/content'); ?>
                        <?php 
                        if (get_theme_mod('_themename_display_author_info', true)) {
                            get_template_part('template-parts/single/author');
                        } 
                        ?>

                    <?php } ?>
                <?php } else { ?>
                    <?php get_template_part('template-parts/post/content','none'); ?>
                <?php } ?>
            </main>
        </div>
        <?php if( $layout === 'sidebar') { ?>
            <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>