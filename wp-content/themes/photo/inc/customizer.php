<?php

function wpb_customize_register($wp_customize) {

	// header section
	$wp_customize->add_section('header', [
		'title'       => 'Header',
		'description' => 'Header Options',
		'prority'     => 100
	]);


	// header image
	$wp_customize->add_setting('header_image', [
		'default'  => get_bloginfo('template_directory').'/img/hero2.png',
		'type'     => 'theme_mod'
	]);

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image', [
		'label'    => 'Header Image',
		'section'  => 'header',
		'settings' => 'header_image',
		'priority' => 1
	]));


	// header heading
	$wp_customize->add_setting('header_heading', [
		'default'  => 'The face of the moon was in darkness. It is present, it\'s there just awaites for brightness.',
		'type'     => 'theme_mod'
	]);

	$wp_customize->add_control('header_heading', [
		'label'    => 'Heading',
		'section'  => 'header',
		'priority' => 2
	]);


	// header category background color
	$wp_customize->add_setting( 'header_color' , [
	    'default'   => '#071921',
	    'transport' => 'refresh',
	]);

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', [
		'label'      => 'Category Background Color',
		'section'    => 'header',
		'settings'   => 'header_color',
	]));


	// contact section
	$wp_customize->add_section('contact', [
		'title'       => 'Contact',
		'description' => 'Contact Options',
		'prority'     => 100
	]);


	// contact image
	$wp_customize->add_setting('contact_image', [
		'default'  => get_bloginfo('template_directory').'/img/hero-contact.jpg',
		'type'     => 'theme_mod'
	]);

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_image', [
		'label'    => 'Contact Image',
		'section'  => 'contact',
		'settings' => 'contact_image',
		'priority' => 1
	]));

}
add_action('customize_register','wpb_customize_register');