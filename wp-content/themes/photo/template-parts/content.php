        <article class="post-wrapper">
            <?php

                if ( is_single() ) {
                    the_title( '<h3>', '</h3>' );
                } else {
                    the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
                }
            ?>

            <hr>
            <div class="post-info">
                <span><i class="far fa-calendar"></i>&nbsp;<?php echo get_the_date(); ?></span>
                <?php

                    $categories = get_the_category();

                    if ( !empty( $categories ) ):

                        foreach( $categories as $category ): ?>

                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">&nbsp; | &nbsp;<i class="far fa-folder"></i>&nbsp;<?php echo esc_html( $category->name ); ?></a>

                        <?php endforeach;

                    endif;
                ?>
            </div>
            <hr>
            <div class="post-inner">
                <div <?=( is_single() ) ? post_class( 'single-post-image' ) : post_class( 'post-image' ) ?>>
                    <div class="post-read-more">
                        <a class="button" href="<?=get_permalink()?>">read more</a>
                    </div>
                    
                    <?php

                        $default_post_img = get_field( 'default_post_image' , 'option' );

                        if ( is_single() ) :

                            the_post_thumbnail( 'large' );

                        else:

                            if( has_post_thumbnail() ):

                        ?>

                            <a href="<?=get_permalink()?>"><?php the_post_thumbnail( 'medium' ); ?></a>

                        <?php else: ?>

                            <a href="<?=get_permalink()?>"><img src="<?=$default_post_img['sizes']['medium']?>"></a>

                        <?php endif; 

                        endif;
                    ?>

                </div>

                <?php if ( is_single() ) : ?>

                    <div <?=( is_single() ) ? post_class( 'single-summary' ) : post_class( 'post-summary' ) ?>>
                        <p><?php the_content(); ?></p>
                    </div>

                <?php else : ?>

                    <div <?=( is_single() ) ? post_class( 'single-summary' ) : post_class( 'post-summary' ) ?>>
                        <?php the_excerpt(); ?>
                    </div>

                <?php endif; ?>
                
            </div>
            <?php if ( is_single() && has_tag() ) : ?>
                <footer class="single-post-footer clear-fix">
                    <div class="single-post-tags">
                        <?php the_tags(' ',''); ?>
                    </div>
                </footer>
            <?php endif; ?>
        </article>

        <?php if ( is_single() ) : ?>
            <div class="post-next-prev">
                <?php previous_post_link('%link'); ?>
                <?php next_post_link('%link'); ?>
            </div>
        <?php endif; ?>
