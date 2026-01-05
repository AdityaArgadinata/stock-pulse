<?php

/**
 * Font section
 */

// Font section.
$wp_customize->add_section(
	'magaznews_font_options',
	array(
		'title' => esc_html__( 'Font ( Typography ) Options', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'magaznews_site_title_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'magaznews_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'magaznews_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'magaznews' ),
		'section'  => 'magaznews_font_options',
		'settings' => 'magaznews_site_title_font',
		'type'     => 'select',
		'choices'  => magaznews_font_choices(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'magaznews_site_description_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'magaznews_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'magaznews_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'magaznews' ),
		'section'  => 'magaznews_font_options',
		'settings' => 'magaznews_site_description_font',
		'type'     => 'select',
		'choices'  => magaznews_font_choices(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'magaznews_header_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'magaznews_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'magaznews_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'magaznews' ),
		'section'  => 'magaznews_font_options',
		'settings' => 'magaznews_header_font',
		'type'     => 'select',
		'choices'  => magaznews_font_choices(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'magaznews_body_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'magaznews_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'magaznews_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'magaznews' ),
		'section'  => 'magaznews_font_options',
		'settings' => 'magaznews_body_font',
		'type'     => 'select',
		'choices'  => magaznews_font_choices(),
	)
);
