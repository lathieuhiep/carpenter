<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class carpenter_widget_construction_grid extends Widget_Base
{

    public function get_categories()
    {
        return array('carpenter_widgets');
    }

    public function get_name()
    {
        return 'carpenter-construction-grid';
    }

    public function get_title()
    {
        return esc_html__('Construction Grid', 'carpenter');
    }

    public function get_icon()
    {
        return 'fa fa-newspaper-o';
    }

    protected function _register_controls()
    {

        /* Section Query */
        $this->start_controls_section(
            'section_query',
            [
                'label' => esc_html__('Query', 'carpenter')
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label' => esc_html__('Select Category', 'carpenter'),
                'type' => Controls_Manager::SELECT2,
                'options' => carpenter_check_get_cat('construction_cat'),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of Construction', 'carpenter'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'carpenter'),
                'type' => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id' => esc_html__('ID', 'carpenter'),
                    'title' => esc_html__('Title', 'carpenter'),
                    'date' => esc_html__('Date', 'carpenter'),
                    'rand' => esc_html__('Random', 'carpenter'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'carpenter'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'carpenter'),
                    'DESC' => esc_html__('Descending', 'carpenter'),
                ],
            ]
        );

        $this->end_controls_section();

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' => esc_html__('Layout Settings', 'carpenter')
            ]
        );

        $this->add_control(
            'column_number',
            [
                'label' => esc_html__('Column', 'carpenter'),
                'type' => Controls_Manager::SELECT,
                'default' => 3,
                'options' => [
                    4 => esc_html__('4 Column', 'carpenter'),
                    3 => esc_html__('3 Column', 'carpenter'),
                    2 => esc_html__('2 Column', 'carpenter'),
                    1 => esc_html__('1 Column', 'carpenter'),
                ],
            ]
        );

        $this->end_controls_section();

        /* Section style post */
        $this->start_controls_section(
            'section_style_post',
            [
                'label' => esc_html__('Color & Typography', 'carpenter'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Style title post
        $this->add_control(
            'title_post_options',
            [
                'label' => esc_html__('Title Post', 'carpenter'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_post_color',
            [
                'label' => esc_html__('Color', 'carpenter'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-construction-grid .item-post__title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_post_color_hover',
            [
                'label' => esc_html__('Color Hover', 'carpenter'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-construction-grid .item-post__title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_post_typography',
                'selector' => '{{WRAPPER}} .element-construction-grid .item-post .item-post__title',
            ]
        );

        $this->add_control(
            'title_post_alignment',
            [
                'label' => esc_html__('Title Alignment', 'carpenter'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'carpenter'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'carpenter'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'carpenter'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'carpenter'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .element-construction-grid .item-post .item-post__title' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $cat_post = $settings['select_cat'];
        $limit_post = $settings['limit'];
        $order_by_post = $settings['order_by'];
        $order_post = $settings['order'];

        if (!empty($cat_post)) :

            $args = array(
                'post_type' => 'construction',
                'posts_per_page' => $limit_post,
                'orderby' => $order_by_post,
                'order' => $order_post,
                'tax_query' => array(
                    array(
                        'taxonomy'  =>  'construction_cat',
                        'field'     =>  'id',
                        'terms'     =>   $cat_post
                    )
                )
            );

        else:

            $args = array(
                'post_type' => 'construction',
                'posts_per_page' => $limit_post,
                'orderby' => $order_by_post,
                'order' => $order_post
            );

        endif;

        $query = new \ WP_Query($args);

        if ($query->have_posts()) :
            ?>

            <div class="element-construction-grid">
                <div class="row">
                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        $terms = get_the_terms( get_the_ID(), 'construction_cat' );
                    ?>

                        <div class="col-6 col-md-4 col-lg-<?php echo esc_attr(12 / $settings['column_number']); ?>">
                            <div class="item-post">
                                <div class="item-post__thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) :
                                            the_post_thumbnail('large');
                                        else:
                                        ?>
                                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/no-image.png')) ?>"
                                                 alt="<?php the_title(); ?>"/>
                                        <?php endif; ?>
                                    </a>
                                </div>

                                <div class="item-post__content text-center">
                                    <?php
                                    if ( !empty( $terms ) ) :
                                        $term = array_shift( $terms );
                                    ?>
                                        <h4 class="item-post__cate">
                                            <a href="<?php echo esc_url( get_term_link( $term->slug, 'construction_cat' ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>">
                                                <?php echo esc_html( $term->name ); ?>
                                            </a>
                                        </h4>
                                    <?php endif; ?>

                                    <h4 class="item-post__title">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>

        <?php

        endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new carpenter_widget_construction_grid);