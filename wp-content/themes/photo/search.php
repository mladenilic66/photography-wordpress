<?php get_header(); ?>

    <section class="primary">
        <div class="wrapper">
        	<div class="inner">
        		<div class="post-outer">
					<?php

						if ( have_posts() ) : ?>

							<header class="page-header">
								<h2 class="page-title"><?php printf( esc_html( 'Search Results for: %s', 'photo' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
							</header>

							<?php while ( have_posts() ) : the_post();

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


