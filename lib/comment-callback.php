<?php
function _themename_comment_callback( $comment, $args, $depth) {
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class( ['c-comment', $comment->comment_parent ? 'c-comment--child' : ''] ) ?>>
        <article class="c-comment__body">

            <?php echo get_avatar( $comment, 100, false, false, array('class' => 'c-comment__avatar') ); ?>
            <?php edit_comment_link( esc_html__( 'Edit Comment', '_themename' ), '<span class="c-comment__edit-link">', '</span>' ); ?>
                
                <div class="c-comment__content">

                    <div class="c-comment__author">
                        <?php echo get_comment_author_link( $comment ); ?>
                    </div>

                    <a class="c-comment__time" href="<?php echo esc_url( get_comment_link( $comment, $args ) ) ?>">
                        <time datetime="<?php comment_time( 'c' ) ?>">
                            <?php
                                printf( esc_html__( '%s ago', '_themename' ), human_time_diff( get_comment_time( 'U' ), current_time( 'U' ) ));
                            ?>
                        </time>
                    </a>

                </div>

        </article>
    <?php
}