<div id="post-<?php the_ID() ?>" <?php post_class( 'site-construction-single-item' ); ?>>
    <div class="site-post-content">
        <h1 class="site-post-title">
            <?php the_title(); ?>
        </h1>

        <?php carpenter_post_share(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            carpenter_link_page();
            ?>
        </div>
    </div>
</div>



