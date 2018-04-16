<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'iweb_create_template', 10);

function iweb_create_template() {

    /* Start post type template */
    $labels = array(
        'name'                  =>  _x( 'Template', 'post type general name', 'iweb' ),
        'singular_name'         =>  _x( 'Template', 'post type singular name', 'iweb' ),
        'menu_name'             =>  _x( 'Template', 'admin menu', 'iweb' ),
        'name_admin_bar'        =>  _x( 'All Template', 'add new on admin bar', 'iweb' ),
        'add_new'               =>  _x( 'Add New', 'Template', 'iweb' ),
        'add_new_item'          =>  esc_html__( 'Add New Template', 'iweb' ),
        'edit_item'             =>  esc_html__( 'Edit Template', 'iweb' ),
        'new_item'              =>  esc_html__( 'New Template', 'iweb' ),
        'view_item'             =>  esc_html__( 'View Template', 'iweb' ),
        'all_items'             =>  esc_html__( 'All Template', 'iweb' ),
        'search_items'          =>  esc_html__( 'Search Template', 'iweb' ),
        'not_found'             =>  esc_html__( 'No template found', 'iweb' ),
        'not_found_in_trash'    =>  esc_html__( 'No template found in trash', 'iweb' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-schedule',
        'rewrite'            => array('slug' => 'mau-giao-dien' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('template', $args );
    /* End post type template */

    /* Start taxonomy template */
    $taxonomy_labels = array(

        'name'              => _x( 'Template categories', 'taxonomy general name', 'iweb' ),
        'singular_name'     => _x( 'Template category', 'taxonomy singular name', 'iweb' ),
        'search_items'      => __( 'Search template category', 'iweb' ),
        'all_items'         => __( 'All Category', 'iweb' ),
        'parent_item'       => __( 'Parent category', 'iweb' ),
        'parent_item_colon' => __( 'Parent category:', 'iweb' ),
        'edit_item'         => __( 'Edit category', 'iweb' ),
        'update_item'       => __( 'Update category', 'iweb' ),
        'add_new_item'      => __( 'Add New category', 'iweb' ),
        'new_item_name'     => __( 'New category Name', 'iweb' ),
        'menu_name'         => __( 'Categories', 'iweb' ),

    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'kho-giao-dien' ),

    );

    register_taxonomy( 'template_cat', array( 'template' ), $taxonomy_args );
    /* End taxonomy template */

    /* Start tag template */
    $taxonomy_tag_labels = array(
        'name'            =>  _x( 'Template tag', 'taxonomy general name', 'iweb' ),
        'singular_name'   =>  _x( 'Tag', 'taxonomy singular name', 'iweb' ),
        'search_items'    =>  esc_html__( 'Search template tag', 'iweb' ),
        'edit_item'       =>  esc_html__( 'Edit Tag', 'iweb' ),
        'update_item'     =>  esc_html__( 'Update Tag', 'iweb' ),
        'add_new_item'    =>  esc_html__( 'Add New Tag', 'iweb' ),
        'new_item_name'   =>  esc_html__( 'New Tag Name', 'iweb' ),
        'menu_name'       =>  esc_html__( 'Tag', 'iweb' ),
    );

    $taxonomy_tag_args = array(
        'hierarchical'      =>  '',
        'labels'            =>  $taxonomy_tag_labels,
        'show_ui'           =>  true,
        'show_admin_column' =>  true,
        "singular_label"    =>  "Template Tag",
        'rewrite'           =>  array( 'slug' => 'tu-khoa-giao-dien' ),
    );
    register_taxonomy( 'template_tag', array( 'template' ), $taxonomy_tag_args );
    /* End tag template */

}