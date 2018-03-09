<?php get_header(); ?>

    <section class="primary">
        <div class="wrapper">
        	<div class="projects">
				<div class="gamma-container gamma-loading" id="gamma-container">
					<?php

	                    $photos = get_field( 'images' );

	                    if (isset($photos) && $photos !== false) :

	                ?>
			    
                    <ul class="gamma-gallery">
                    	<?php foreach ($photos as $photo) : ?>
                        <li>
                            <div data-alt="dd" data-description="<h3><?=$photo['title']?></h3>">
                                <div data-src="<?=$photo['image']['url']?>"></div>
                                <div data-src="<?=$photo['image']['sizes']['project-main']?>"></div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="gamma-overlay"></div>

                    <?php

						else :

							get_template_part( 'template-parts/content', 'none' );

					    endif;

				    ?>
				</div>
			</div>
        </div>
    </section>

<?php get_footer(); ?>