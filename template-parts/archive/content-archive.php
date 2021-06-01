<?php

global $basictheme_options;

$basictheme_blog_sidebar_archive    =   $basictheme_options['basictheme_blog_sidebar_archive'] ? : 'right';
$basictheme_class_col_content       =   basictheme_col_use_sidebar( $basictheme_blog_sidebar_archive, 'basictheme-sidebar-main' );
$basictheme_blog_per_row            =   $basictheme_options['basictheme_blog_per_row'] ? : 3;

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $basictheme_class_col_content ); ?>">
                <div class="site-post-content">
                    <?php if ( have_posts() ) : ?>

                        <div class="row">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" class="site-post-item col-12 col-md-6 col-lg-<?php echo esc_attr( 12 / $basictheme_blog_per_row ); ?>">
                                    <div class="site-post-content">
                                        <h2 class="site-post-title">
                                            <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
				                                <?php if ( is_sticky() && is_home() ) : ?>
                                                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
				                                <?php
				                                endif;

				                                the_title();
				                                ?>
                                            </a>
                                        </h2>

		                                <?php
		                                basictheme_post_formats();

		                                basictheme_post_meta();
		                                ?>

                                        <div class="site-post-excerpt">
                                            <p>
				                                <?php
				                                if ( has_excerpt() ) :
					                                echo esc_html( get_the_excerpt() );
				                                else:
					                                echo wp_trim_words( get_the_content(), 30, '...' );
				                                endif;
				                                ?>
                                            </p>

                                            <a href="<?php the_permalink();?>" class="text-read-more">
				                                <?php esc_html_e(  'Read more','basictheme' ); ?>
                                            </a>

			                                <?php basictheme_link_page(); ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>

                    <?php
	                    basictheme_pagination();

	                    else:

                        if ( is_search() ) :
	                        get_template_part( 'template-parts/search/content', 'no-data' );
                        endif;

                    endif;
                    ?>
                </div>
            </div>

            <?php
            if ( $basictheme_blog_sidebar_archive !== 'hide' ) :
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>