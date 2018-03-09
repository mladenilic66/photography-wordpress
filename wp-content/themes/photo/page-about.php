<?php 

/* Template Name: About Page */

get_header();

    if ( have_posts() ) :

        while ( have_posts() ) : the_post(); ?>

            <aside class="about-top">
                <div class="wrapper">
                	<div class="projects about-title">
                		<?php the_content(); ?>
                	</div>
                </div>
            </aside>

            <aside class="about-middle">
                <div class="wrapper">
                	<div class="about-services projects">
                        <?php $about_info = get_field( 'about_info' ); ?>

                        <?php foreach ($about_info as $about_single) : ?>
                            
                            <div data-aos="flip-right" data-aos-duration="1000" class="about-services-single">
                                <h4><?=$about_single['about_title']?></h4>
                                <i class="<?=$about_single['about_icon']?>"></i>
                            </div>
                            
                        <?php endforeach ?>
        				
                	</div>
                </div>
            </aside>

<?php   endwhile;

    endif;

get_footer(); ?>