<?php get_header(); ?>

    <section class="primary">
        <div class="wrapper">
        	<div class="inner">
			<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h2 class="page-title">', '</h2>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header>

					<?php

					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

						the_posts_pagination([ 'mid_size' => 2, 'screen_reader_text' => __( ' ' ) ]);

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>
			</div>
        </div>
    </section>

<?php get_footer(); ?>