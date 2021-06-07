<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'carpenter_create_construction', 10);

function carpenter_create_construction() {

    /* Start post type template */
    $labels = array(
        'name'                  =>  _x( 'Construction', 'post type general name', 'carpenter' ),
        'singular_name'         =>  _x( 'Construction', 'post type singular name', 'carpenter' ),
        'menu_name'             =>  _x( 'Construction', 'admin menu', 'carpenter' ),
        'name_admin_bar'        =>  _x( 'All Constructions', 'add new on admin bar', 'carpenter' ),
        'add_new'               =>  _x( 'Add New', 'Construction', 'carpenter' ),
        'add_new_item'          =>  esc_html__( 'Add New Construction', 'carpenter' ),
        'edit_item'             =>  esc_html__( 'Edit Construction', 'carpenter' ),
        'new_item'              =>  esc_html__( 'New Construction', 'carpenter' ),
        'view_item'             =>  esc_html__( 'View Construction', 'carpenter' ),
        'all_items'             =>  esc_html__( 'All Constructions', 'carpenter' ),
        'search_items'          =>  esc_html__( 'Search Construction', 'carpenter' ),
        'not_found'             =>  esc_html__( 'No template found', 'carpenter' ),
        'not_found_in_trash'    =>  esc_html__( 'No template found in trash', 'carpenter' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-tagcloud',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'cong-trinh' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('construction', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Construction categories', 'taxonomy general name', 'carpenter' ),
        'singular_name'     => _x( 'Construction category', 'taxonomy singular name', 'carpenter' ),
        'search_items'      => __( 'Search template category', 'carpenter' ),
        'all_items'         => __( 'All Category', 'carpenter' ),
        'parent_item'       => __( 'Parent category', 'carpenter' ),
        'parent_item_colon' => __( 'Parent category:', 'carpenter' ),
        'edit_item'         => __( 'Edit category', 'carpenter' ),
        'update_item'       => __( 'Update category', 'carpenter' ),
        'add_new_item'      => __( 'Add New category', 'carpenter' ),
        'new_item_name'     => __( 'New category Name', 'carpenter' ),
        'menu_name'         => __( 'Categories', 'carpenter' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-cong-trinh' ),
    );

    register_taxonomy( 'construction_cat', array( 'construction' ), $taxonomy_args );
    /* End taxonomy */

}