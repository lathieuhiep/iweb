<?php

global $iweb_options;

$iweb_show_loading = $iweb_options['iweb_general_show_loading'] == '' ? '0' : $iweb_options['iweb_general_show_loading'];

if(  $iweb_show_loading == 1 ) :

    $iweb_loading_url  = $iweb_options['iweb_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $iweb_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $iweb_loading_url ); ?>" alt="<?php esc_attr_e('loading...','iweb') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','iweb') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>