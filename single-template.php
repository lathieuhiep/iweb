<?php
get_header();

$iweb_meta_box_template_link_demo   =   rwmb_meta( 'iweb_meta_box_template_link_demo' );
$iweb_meta_box_template_description =   rwmb_meta( 'iweb_meta_box_template_description' );

?>

<div class="site-container site-single-template">
    <div class="container">

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
        ?>

            <div id="post-template__<?php the_ID(); ?>" class="post-template__item">
                <h1 class="post-template__item--title">
                    <?php the_title(); ?>
                </h1>

                <div class="post-template__box">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="post-template__box--image">
                                <?php the_post_thumbnail( 'full' ); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="post-template__box--button">
                                <a class="btn-link-demo" href="<?php echo esc_url( $iweb_meta_box_template_link_demo ); ?>" title="<?php the_title(); ?>">
                                    <?php esc_html_e( 'Xem Demo', 'iweb' ); ?>
                                </a>
                            </div>

                            <div class="post-template__box--content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ( !empty( $iweb_meta_box_template_description ) ) : ?>

                        <div class="post-template__box--description">
                            <h3 class="post-template__box--description__title">
                                <?php esc_html_e( 'Giới thiệu về website', 'iweb' ); ?>
                            </h3>

                            <div class="post-template__box--description__content">
                                <?php echo wp_kses_post(  $iweb_meta_box_template_description ); ?>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

        <?php
            endwhile;
        endif;
        ?>

    </div>
</div>

<?php
get_footer();