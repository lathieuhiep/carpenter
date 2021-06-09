<?php
get_header();

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

    <div class="site-container site-single">
        <div class="container">
            <?php
            if ( have_posts() ) :
                while (have_posts()) :
                    the_post();

                get_template_part( 'template-parts/construction/content','single' );

                endwhile;
            endif;
            ?>
        </div>
    </div>

<?php
get_footer();
