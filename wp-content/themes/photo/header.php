<?php
/**
 * The header for this theme
 *
 * This is the template that displays all of the <head> section
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="<?=get_template_directory_uri()?>/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?=get_template_directory_uri()?>/img/favicon.ico" type="image/x-icon">
        <?php wp_head(); ?>
        <style type="text/css">
            .categories.fix {
                background-color: <?=get_theme_mod('header_color', '#071921')?>;
            }
        </style>
    </head>

    <body>
        <section class="header-wrap text-white" style="background: url(<?=get_theme_mod('header_image', get_bloginfo('template_url').'/img/hero2.png')?>) center center / cover no-repeat;">

            <h2><?=get_theme_mod('header_heading', 'The face of the moon was in darkness. It is present, it\'s there just awaites for brightness.')?></h2>
            
            <header class="header">
                <div class="wrapper">
                    <div class="logo"></div>

                    <ul class="menu-bars">
                        <li>
                            <a href="#"><i class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                    
                    <?php wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'container' => 'nav',
                        'container_class' => 'nav nav-main'
                    ]) ?>

                </div>
            </header>

            <div class="cat-position">
                <div class="nav categories">

                    <?php wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'container_class' => 'nav nav-slide'
                    ]) ?>

                    <?php

                        $terms = get_terms([
                            'taxonomy' => 'project-categories',
                            'orderby'  => 'id',
                            'hide_empty' => false,
                        ]);

                        $count = count( $terms );

                        if ($count > 0):

                    ?>
                        <ul class="menu-cat">
                        
                            <?php foreach ($terms as $term): $term_link = get_term_link( $term ); ?>

                                <li><a href="<?php echo esc_url( $term_link ); ?>"><?=$term->name?></a></li>

                            <?php endforeach; ?>

                        </ul>
                        
                    <?php endif; ?>
                </div>
            </div>
        </section>