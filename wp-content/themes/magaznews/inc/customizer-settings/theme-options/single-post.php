<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'magaznews_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'magaznews_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'magaznews' ),
			'settings' => 'magaznews_enable_single_category',
			'section'  => 'magaznews_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'magaznews_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'magaznews' ),
			'settings' => 'magaznews_enable_single_author',
			'section'  => 'magaznews_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'magaznews_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'magaznews' ),
			'settings' => 'magaznews_enable_single_date',
			'section'  => 'magaznews_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'magaznews_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'magaznews' ),
			'settings' => 'magaznews_enable_single_tag',
			'section'  => 'magaznews_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'magaznews_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'magaznews' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'magaznews_related_posts_title',
	array(
		'label'    => esc_html__( 'Related Posts Title', 'magaznews' ),
		'section'  => 'magaznews_single_page_options',
		'settings' => 'magaznews_related_posts_title',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'magaznews_related_posts_title',
		array(
			'selector'            => '.theme-wrapper h2.related-title',
			'settings'            => 'magaznews_related_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}
