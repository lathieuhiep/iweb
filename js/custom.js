/**
 * Custom js v1.0.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

( function( $ ) {

    "use strict";

    $( document ).ready( function () {

        /* Start back top */
        $('#back-top').click( function(e) {

            e.preventDefault();
            $( 'html, body' ).animate({
                scrollTop: 0
            },700);

        });
        /* End back top */

        /* btn mobile Start*/
        let $menu_item_has_children =   $( '.site-menu .menu-item-has-children' );

        if ( $menu_item_has_children.length ) {

            $('.site-menu .menu-item-has-children > a').after( "<span class='icon_menu_item_mobile'></span>" );

            var $icon_menu_item_mobile  =   $('.icon_menu_item_mobile');

            $icon_menu_item_mobile.each(function () {

                $(this).on( 'click', function () {

                    $(this).addClass( 'icon_menu_item_mobile_active' );
                    $(this).parents( '.menu-item-has-children' ).siblings().find( '.icon_menu_item_mobile' ).removeClass( 'icon_menu_item_mobile_active' );
                    $(this).parents( '.menu-item-has-children' ).children( '.sub-menu' ).slideDown();
                    $(this).parents( '.menu-item-has-children' ).siblings().find( '.sub-menu' ).slideUp();

                } )

            })

        }
        /* btn mobile End */

        /* Start Gallery Single */
        let $site_post_slides   =   $( '.site-post-slides' );

        if ( $site_post_slides.length ) {

            $site_post_slides.each(function () {

                $(this).owlCarousel({
                    loop: true,
                    items: 1,
                    dots: false,
                    autoplay: true,
                    smartSpeed: 800,
                    autoplaySpeed: 800,
                    autoHeight: true
                })

            })

        }
        /* End Gallery Single */

        /* Start element slides blog  */
        general_multi_owlCarouse( '.relate-template__box', 'settings' );
        /* End element slides blog  */

    });

    $( window ).on( "load", function() {

        $( '#site-loadding' ).remove();

    });

    let timer_clear;

    $(window).scroll(function(){

        if ( timer_clear ) clearTimeout(timer_clear);

        timer_clear = setTimeout(function(){

            /* Start scroll back top */
            var $scrollTop = $(this).scrollTop();

            if ( $scrollTop > 200 ) {
                $('#back-top').addClass('active_top');
            }else {
                $('#back-top').removeClass('active_top');
            }
            /* End scroll back top */

        }, 100);

    });

    /* Start function multi owlCarouse */
    function general_multi_owlCarouse( class_item, settings ) {

        let class_item_owlCarousel   =   $( class_item );

        if ( class_item_owlCarousel.length ) {

            class_item_owlCarousel.each(function(){

                let $settings_slider    =   $(this).data( settings ),
                    $item_number        =   parseInt( $settings_slider['number_item'] ),
                    $margin_item        =   parseInt( $settings_slider['margin_item'] ),
                    $loop_slider        =   $settings_slider['loop'],
                    $autoplay           =   $settings_slider['autoplay'],
                    $active_dots        =   $settings_slider['dots'],
                    $active_nav         =   $settings_slider['nav'],
                    $item_mobile        =   $settings_slider['item_mobile'],
                    $margin_item_mobile =   $settings_slider['margin_item_mobile'],
                    $item_tablet        =   $settings_slider['item_tablet'];

                $( this ).owlCarousel({

                    loop: $loop_slider,
                    autoplay: $autoplay,
                    margin: $margin_item,
                    nav: $active_nav,
                    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                    dots: $active_dots,
                    rtl: false,
                    autoplaySpeed: 800,
                    navSpeed: 800,
                    dotsSpeed: 800,
                    autoHeight:true,
                    responsive:{
                        0:{
                            items: $item_mobile,
                            margin: $margin_item_mobile
                        },
                        576:{
                            items:2
                        },
                        768:{
                            items: $item_tablet
                        },
                        1200:{
                            items:$item_number
                        }
                    }

                });

            });

        }

    }
    /* End function multi owlCarouse */

} )( jQuery );
