<?php

add_filter( 'rwmb_meta_boxes', 'iweb_register_meta_boxes' );

function iweb_register_meta_boxes() {

    /* Start 1st meta box */
    $iweb_meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => esc_html__( 'Personal Information', 'iweb' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => esc_html__( 'Full name', 'iweb' ),
                'desc'  => 'Format: First Last',
                'id'    => 'rw_fname',
                'type'  => 'text',
                'std'   => 'Anh Tran',
                'class' => 'custom-class',
                'clone' => true,
            ),
        )
    );
    /* End 1st meta box */

    return $iweb_meta_boxes;

}