<?php

get_header();

?>

    <div class="site-container site-construction pt-0">
        <?php
        if ( have_posts() ) :
            while (have_posts()) :
                the_post();

                get_template_part( 'template-parts/construction/content','single' );

            endwhile;
        endif;
        ?>
    </div>

<?php
get_footer();
