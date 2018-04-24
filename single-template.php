<?php
get_header();

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
                        <div class="col-md-9"></div>
                        <div class="col-md-3"></div>
                    </div>
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