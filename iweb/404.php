<?php

get_header();
global $iweb_options;

$iweb_title      = $iweb_options['iweb_404_title'];
$iweb_content    = $iweb_options['iweb_404_editor'];
$iweb_background = $iweb_options['iweb_404_background'];

?>

<div class="site-error">
    <div class="container">

        <?php if ( $iweb_title != '' ): ?>

            <h1 class="site-title-404">
                <?php echo esc_html( $iweb_title ); ?>
            </h1>

        <?php endif; ?>

        <?php if ( $iweb_content != '' ) : ?>

            <div id="site-error-box-header">
                <?php echo balanceTags( $iweb_content, true ); ?>
            </div>

        <?php endif; ?>

        <div id="site-error-box-body">
            <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'iweb'); ?>">
                <?php esc_html_e('Go to the Home Page', 'iweb'); ?>
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>