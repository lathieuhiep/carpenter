<?php
global $carpenter_options;

$carpenter_related_post_limit  =   $carpenter_options ['carpenter_related_post_limit'];
$carpenter_term_cat_post       =   get_the_terms( get_the_ID(), 'category' );

if ( !empty( $carpenter_term_cat_post ) ):

    $carpenter_term_cat_post_ids = array();

    foreach( $carpenter_term_cat_post as $item_cat_post_id ) $carpenter_term_cat_post_ids[] = $item_cat_post_id->term_id;

    $carpenter_post_related_arg = array(
        'post_type'         =>  'post',
        'cat'               =>  $carpenter_term_cat_post_ids,
        'post__not_in'      =>  array( get_the_ID() ),
        'posts_per_page'    =>  $carpenter_related_post_limit,
    );

    $carpenter_post_related_query = new WP_Query( $carpenter_post_related_arg );

    if ( $carpenter_post_related_query->have_posts() ) :
?>

    <div class="site-single-post-related">
        <h3 class="title">
            <?php esc_html_e( 'Related Post', 'carpenter' ); ?>
        </h3>

        <div class="row">
            <?php
            while ( $carpenter_post_related_query->have_posts() ) :
                $carpenter_post_related_query->the_post();
            ?>

                <div class="col-12 col-sm-6 col-md-4 item">
                    <div class="related-post-item">
                        <figure class="post-image">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </figure>

                        <h4 class="title-post">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>

                        <div class="excerpt-post">
                            <p>
                                <?php
                                if( has_excerpt() ) :
                                    echo wp_trim_words( get_the_excerpt(), 15, '...' );
                                else:
                                    echo wp_trim_words( get_the_content(), 15, '...' );
                                endif;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

<?php
    endif;
endif;