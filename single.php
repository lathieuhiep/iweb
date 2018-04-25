<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

global $iweb_options;

$iweb_single_sidebar    =   $iweb_options['iweb_blog_single_sidebar'];

if ( $iweb_single_sidebar  == 1 ) :
    $iweb_col_not_sidebar = 'col-md-12';
else:
    $iweb_col_not_sidebar = 'col-md-9';
endif;

?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">

            <?php

            if( $iweb_single_sidebar == 2 ):
                get_sidebar();
            endif;

            ?>

            <div class="<?php echo esc_attr( $iweb_col_not_sidebar ); ?>">
                <?php

                if ( have_posts() ) : while (have_posts()) : the_post();

                    $iweb_comment_count  = wp_count_comments( get_the_ID() );

                ?>

                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php

                        if(has_post_format('gallery')):
                            get_template_part( 'template-parts/post/content','gallery' );
                        elseif(has_post_format('audio')):
                            get_template_part( 'template-parts/post/content','audio' );
                        else:
                            get_template_part( 'template-parts/post/content','video' );
                        endif;

                        get_template_part( 'template-parts/post/content','info' );

                        ?>
                    </div>

                <?php if ( get_the_author_meta( 'description' ) != '' ) : ?>

                    <div class="site-author d-flex">
                            <div class="author-avata">
                                <?php echo get_avatar( get_the_author_meta('ID'),80); ?>
                            </div>
                            <div class="author-info">
                                <h3><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>"><?php the_author();?></a></h3>
                                <p>
                                    <?php the_author_meta('description'); ?>
                                </p>
                            </div>
                        </div>

                <?php
                    endif;

                        if ( comments_open() || get_comments_number() ) :

                ?>

                        <div class="site-comments">
                            <?php comments_template( '', true ); ?>
                        </div>

                <?php
                        endif;

                    endwhile;
                endif;

                ?>

            </div>

            <?php

            if( $iweb_single_sidebar == 3 ):
                get_sidebar();
            endif;

            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>

