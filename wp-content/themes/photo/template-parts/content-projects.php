<div class="project">
	<div class="projects-img">
		<?php

			$default_p_img = get_field( 'default_project_image' , 'option' );

			if ( has_post_thumbnail() ) : ?>

				<a href="<?=get_permalink()?>"><?=the_post_thumbnail( 'project-thumbnail' )?></a>

			<?php else: ?>

				<a href="<?=get_permalink()?>"><img src="<?=$default_p_img?>"></a>

			<?php endif; ?>
		
			<a href="<?=get_permalink()?>"><h4 class="projects-title"><?=the_title()?></h4></a>
	</div>
</div>