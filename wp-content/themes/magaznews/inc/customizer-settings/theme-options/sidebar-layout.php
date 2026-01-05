<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'magaznews_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Sidebar Option - Archive Sidebar Position.
$wp_customize->add_setting(
	'magaznews_archive_sidebar_position',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'magaznews_archive_sidebar_position',
	array(
		'label'   => esc_html__( 'Archive Sidebar Position', 'magaznews' ),
		'section' => 'magaznews_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'magaznews' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'magaznews' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'magaznews_post_sidebar_position',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'magaznews_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'magaznews' ),
		'section' => 'magaznews_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'magaznews' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'magaznews' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'magaznews_page_sidebar_position',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'magaznews_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'magaznews' ),
		'section' => 'magaznews_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'magaznews' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'magaznews' ),
		),
	)
);
