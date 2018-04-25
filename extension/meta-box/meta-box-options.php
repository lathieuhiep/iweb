<?php

add_filter( 'rwmb_meta_boxes', 'iweb_register_meta_boxes' );

function iweb_register_meta_boxes() {

    /* Start meta box post */
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
    /* End meta box post */

    /* Start meta box template */
    $iweb_meta_boxes[] = array(
        'id'            =>  'iweb_meta_box_template',
        'title'         =>  esc_html__( 'Option Template', 'iweb' ),
        'post_types'    =>  array( 'template' ),
        'context'       =>  'normal',
        'priority'      =>  'low',
        'fields'        =>  array(

            /* Link Demo */
            array(
                'type'  =>  'heading',
                'name'  =>  esc_html__(  'Link Demo',  'iweb' ),
            ),

            array(
                'name'  =>  esc_html__( 'Link Demo', 'iweb' ),
                'id'    =>  'iweb_meta_box_template_link_demo',
                'type'  =>  'text',
                'std'   =>  '#',
                'class' =>  'custom-class',
            ),

            /* Description */
            array(
                'type'  =>  'heading',
                'name'  =>  esc_html__(  'Description',  'iweb' ),
            ),

            array(
                'name'      =>  '',
                'id'        =>  'iweb_meta_box_template_description',
                'type'      =>  'wysiwyg',
                'raw'       =>  false,
                'options'   =>  array(
                    'textarea_rows' =>  10,
                    'teeny'         =>  false,
                ),
            ),

        )
    );
    /* End meta box template */

    return $iweb_meta_boxes;

}