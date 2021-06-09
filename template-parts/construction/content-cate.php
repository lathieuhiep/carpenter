<div class="site-container site-cate-construction">
    <div class="container">
        <?php if ( have_posts() ) : ?>

            <div class="row">
                <?php
                while ( have_posts() ) :
                    the_post();
                    $terms = get_the_terms( get_the_ID(), 'construction_cat' );
                ?>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <div class="item__thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>

                        <div class="item__content text-center">
                            <?php
                            if ( !empty( $terms ) ) :
                                $term = array_shift( $terms );
                            ?>

                                <h4 class="item__content--cate">
                                    <a href="<?php echo esc_url( get_term_link( $term->slug, 'construction_cat' ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>">
                                        <?php echo esc_html( $term->name ); ?>
                                    </a>
                                </h4>

                            <?php endif; ?>

                            <h4 class="item__content--title">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>

                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

        <?php
            carpenter_pagination();
        endif;
        ?>
    </div>
</div>