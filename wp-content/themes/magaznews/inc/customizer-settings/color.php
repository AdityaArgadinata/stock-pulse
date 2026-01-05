<?php

/**
 * Color Options
 */

// Site tagline color setting.
$wp_customize->add_setting(
	'magaznews_header_tagline',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'magaznews_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'magaznews_header_tagline',
		array(
			'label'   => esc_html__( 'Site tagline Color', 'magaznews' ),
			'section' => 'colors',
		)
	)
);
