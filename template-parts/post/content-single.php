<?php

global $carpenter_options;

$carpenter_on_off_share_single = $carpenter_options['carpenter_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <div class="site-post-content">
        <h1 class="site-post-title">
            <?php the_title(); ?>
        </h1>

        <div class="site-post-excerpt">
            <?php
            the_content();

            carpenter_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">

            <?php if( get_the_category() != false ): ?>

                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','carpenter');
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','carpenter' );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $carpenter_on_off_share_single == 1 || $carpenter_on_off_share_single == null ) :

        carpenter_post_share();

    endif;

    ?>
</div>

<?php
carpenter_comment_form();

get_template_part( 'template-parts/post/inc','related-post' );




