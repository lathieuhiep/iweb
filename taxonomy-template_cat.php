<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$iweb_template_cat_name = get_queried_object()->name;

?>

<div id="page-taxonomy-template" class="site-container site-single-template">
    <div class="container">
        <h1 class="page-taxonomy-template--title">
            <?php esc_html_e( 'Gói dịch vụ', 'iweb' ); echo ': ' . esc_html( $iweb_template_cat_name ); ?>
        </h1>

        <?php if ( have_posts() ) : ?>

            <div class="page-taxonomy-template__item">
                <div class="row">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        do_action( 'iweb_template_loop', 'col-12 col-sm-6 col-md-3 col-lg-4' );

                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <?php iweb_pagination(); ?>

            </div>

        <?php endif; ?>

    </div>
</div>

<?php
get_footer();