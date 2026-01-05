<?php
/**
 * Header Options
 */

// Header Options.
$wp_customize->add_section(
	'magaznews_header_section',
	array(
		'title' => esc_html__( 'Header Options', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Header Advertisement Image.
$wp_customize->add_setting(
	'magaznews_header_advertisement',
	array(
		'sanitize_callback' => 'magaznews_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'magaznews_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'magaznews' ),
			'section'  => 'magaznews_header_section',
			'settings' => 'magaznews_header_advertisement',
		)
	)
);

// Header Advertisement Image URL.
$wp_customize->add_setting(
	'magaznews_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'magaznews_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'magaznews' ),
		'section'  => 'magaznews_header_section',
		'settings' => 'magaznews_header_advertisement_url',
		'type'     => 'url',
	)
);
