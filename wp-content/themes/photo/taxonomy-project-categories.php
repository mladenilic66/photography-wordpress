<?php get_header(); ?>

    <section class="primary">
        <div class="wrapper">
        	<div class="projects">
        		<div class="projects-wrap">
				<?php

					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'projects' );

						endwhile;

						the_posts_pagination([ 'mid_size' => 2, 'screen_reader_text' => __( ' ' ) ]);

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
				?>
				</div>
			</div>
        </div>
    </section>

<?php get_footer(); ?>