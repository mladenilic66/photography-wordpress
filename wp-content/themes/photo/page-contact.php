<?php 

/* Template Name: Contact Page */

get_header();

    if ( have_posts() ) :

        while ( have_posts() ) : the_post(); ?>

            <aside class="contact-top">
                <div data-aos="fade-down" data-aos-duration="1000" class="wrapper">
                    <h1><?=get_field( 'contact_title' )?></h1>

                    <?php $contact = get_field( 'contact' ); ?>

                    <?php foreach ($contact as $contacts) : ?>

                        <p><i class="<?=$contacts['contact_icon']?>"></i>&nbsp; <?=$contacts['contact_content']?></p>
                        
                    <?php endforeach ?>

                </div>
            </aside>

            <aside class="contact-middle" style="background: url(<?=get_theme_mod('contact_image', get_bloginfo('template_url').'/img/hero-contact.jpg')?>) center center / cover no-repeat fixed;">
                <div data-aos="fade-zoom-in" data-aos-duration="1000" class="wrapper">
                    <?php the_content(); ?>
                </div>
            </aside>

            <aside class="contact-bottom">
                <div class="wrapper">
                    <h3>Contact Form</h3>
                    <div class="contact-form-wrap">
                        <?=get_field( 'contact_form' )?>
                    </div>
                </div>
            </aside>

<?php   endwhile;

    endif;

get_footer(); ?>