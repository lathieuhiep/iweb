<?php
get_header();

$iweb_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

$iweb_class_elementor =   '';

if ( $iweb_check_elementor ) :
    $iweb_class_elementor =   ' site-container-elementor';
endif;

?>

    <main class="site-container<?php echo esc_attr( $iweb_class_elementor ); ?>">

        <?php
        if ( $iweb_check_elementor ) :
            get_template_part('template-parts/page/content','page-elementor');
        else:
            get_template_part('template-parts/page/content','page');
        endif;
        ?>

    </main>

<?php 

get_footer();