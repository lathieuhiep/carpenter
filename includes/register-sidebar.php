<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'basictheme_widgets_init');

function basictheme_widgets_init() {

	$basictheme_widgets_arr  =   array(

		'basictheme-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'basictheme' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'basictheme' )
		),

		'basictheme-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'basictheme' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'basictheme' )
		),

		'basictheme-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'basictheme' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'basictheme' )
		),

		'basictheme-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'basictheme' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'basictheme' )
		),

		'basictheme-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'basictheme' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'basictheme' )
		),

		'basictheme-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'basictheme' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'basictheme' )
		)

	);

	foreach ( $basictheme_widgets_arr as $basictheme_widgets_id => $basictheme_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $basictheme_widgets_value['name'] ),
			'id'            =>  esc_attr( $basictheme_widgets_id ),
			'description'   =>  esc_attr( $basictheme_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}