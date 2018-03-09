<?php get_header(); ?>

    <section class="primary">
        <div class="wrapper">
            <div class="projects">
                <div class="projects-wrap">
                    <?php

                        $query = new WP_Query([
                            'post_type' => 'projects',
                            'order_by' => 'date',
                            'order' => DESC,
                            'posts_per_page' => 12
                        ]);

                        if ( $query->have_posts() ):

                            while ( $query->have_posts() ):
                            
                                $query->the_post();

                                get_template_part( 'template-parts/content', 'projects' );

                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );
                        
                        endif;

                        wp_reset_postdata();

                    ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>