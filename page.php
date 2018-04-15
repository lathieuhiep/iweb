<?php
get_header();

$iweb_check_elementor = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

?>

<main class="site-container">

    <?php
    if ( $iweb_check_elementor ) :
        get_template_part('template-parts/page/content','page-elementor');
    else:
        get_template_part('template-parts/page/content','page');
    endif;
    ?>

</main>

<?php get_footer(); ?>

