<?php

add_filter( 'rwmb_meta_boxes', 'carpenter_register_meta_boxes' );

function carpenter_register_meta_boxes() {

    /* Start meta box post */
    $carpenter_meta_boxes[] = array(
        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Thiết lập công trình', 'carpenter' ),
        'post_types' => array( 'construction' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'carpenter_construction_gallery',
                'name'             => 'Gallery',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
            ),

        )
    );
    /* End meta box post */

    return $carpenter_meta_boxes;

}