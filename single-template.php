<?php

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

?>

<div class="site-container site-single-template">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/post-template/inc', 'content' );

                get_template_part( 'template-parts/post-template/inc', 'related-template' );

            endwhile;
        endif;
        ?>
    </div>
</div>

<?php
get_footer();