<?php get_header(); ?>
<div class="o-container u-margin-bottom-40">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
            <main role="main">
                <?php if(have_posts()) { ?>
                <?php while(have_posts()) { ?>
                <?php the_post(); ?>
                <article <?php post_class('c-post u-margin-bottom-20') ?>>
                    <h2 class="c-post__title">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?>
                    </a>
                    </h2>
                    <div class="c-post__meta">
                        <?php _themename_post_meta(); ?>
                    </div>
                    <div class="c-post__excerpt">
                        <?php the_excerpt(); ?>
                    </diV>
                    <?php _themename_readmore_link(); ?>
                </article>
                <?php } ?>
                <?php the_posts_pagination( ); ?>
                <?php do_action('_themename_after_pagination') ?>
                <?php } else { ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.', '_themename'); ?></p>
                <?php } ?>
            </main>
        </div>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>