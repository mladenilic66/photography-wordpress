<?php 

/* Template Name: Blog Posts Page */

get_header();

query_posts( 'post_type=post&post_status=publish&paged='. get_query_var( 'paged' ));

?>
    <section class="primary">
        <div class="wrapper">
        	<div class="inner">
        		<div class="post-outer">
					<?php

						if ( have_posts() ) :

							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							the_posts_pagination([ 'mid_size' => 2, 'screen_reader_text' => __( ' ' ) ]);

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
        </div>
    </section>

<?php get_footer(); ?>