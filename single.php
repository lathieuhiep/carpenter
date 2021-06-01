<?php
get_header();

global $carpenter_options;

$carpenter_blog_sidebar_single = !empty( $carpenter_options['carpenter_blog_sidebar_single'] ) ? $carpenter_options['carpenter_blog_sidebar_single'] : 'right';

$carpenter_class_col_content = carpenter_col_use_sidebar( $carpenter_blog_sidebar_single, 'carpenter-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $carpenter_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $carpenter_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

