<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'carpenter_widgets_init');

function carpenter_widgets_init() {

	$carpenter_widgets_arr  =   array(

		'carpenter-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'carpenter' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'carpenter' )
		),

		'carpenter-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'carpenter' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'carpenter' )
		),

		'carpenter-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'carpenter' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'carpenter' )
		),

		'carpenter-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'carpenter' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'carpenter' )
		),

		'carpenter-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'carpenter' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'carpenter' )
		),

		'carpenter-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'carpenter' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'carpenter' )
		)

	);

	foreach ( $carpenter_widgets_arr as $carpenter_widgets_id => $carpenter_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $carpenter_widgets_value['name'] ),
			'id'            =>  esc_attr( $carpenter_widgets_id ),
			'description'   =>  esc_attr( $carpenter_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}