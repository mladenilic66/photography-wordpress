<?php get_header(); ?>

        <section class="primary">
            <div class="wrapper">
                <div class="inner">
                    <div class="post-outer">
                        <?php
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile;
                        ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>

<?php get_footer(); ?>