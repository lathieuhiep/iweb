/**
 * Element template js v1.0.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

( function( $ ) {

    "use strict";

    $( document ).ready( function () {

        /* Start load ajax product menu */
        let element_template_row    =   $( '.element-template__row' );

        $( '.element-template__btn--filter' ).on('click',function () {

            let has_active = $(this).hasClass( 'active' );

            if ( has_active === false ) {

                $(this).parent().find('.element-template__btn--filter').removeClass( 'active' );
                $(this).addClass( 'active' );

                let $data_settings_template =   $(this).parent().data( 'settings' ),
                    template_row_height     =   element_template_row.height(),
                    $data_cat_id            =   $(this).data( 'cat-id' ),
                    $data_limit             =   parseInt( $data_settings_template['limit'] ),
                    $data_orderby           =   $data_settings_template['orderby'],
                    $data_order             =   $data_settings_template['order'],
                    $data_column             =  parseInt( $data_settings_template['column'] );

                $.ajax({

                    url: iweb_template_load.url,
                    type: 'POST',
                    data: ({

                        action: 'iweb_template_load_item',
                        iweb_temlate_cat_id: $data_cat_id,
                        iweb_temlate_limit: $data_limit,
                        iweb_temlate_orderby: $data_orderby,
                        iweb_temlate_order: $data_order,
                        iweb_temlate_column: $data_column

                    }),

                    beforeSend: function () {

                        element_template_row.css( 'height', template_row_height );
                        element_template_row.find( '.element-template__col' ).fadeOut( 800 );
                        $( '.loader_box' ).fadeIn( 800 );

                    },

                    success: function( data ){

                        if ( data ){

                            element_template_row.empty().append( data ).find( '.element-template__col' ).hide();

                        }

                        setTimeout( function() {

                            element_template_row.find( '.element-template__col' ).fadeIn( 800 );
                            element_template_row.css( 'height', 'auto' );
                            $( '.loader_box' ).fadeOut( 600 );

                        }, 800 );

                    }

                });

            }

        });
        /* End load ajax product menu */

    });

} )( jQuery );