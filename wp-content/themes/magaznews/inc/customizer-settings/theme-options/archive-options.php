<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'magaznews_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'magaznews_excerpt_length',
	array(
		'default'           => 15,
		'sanitize_callback' => 'magaznews_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'magaznews_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'magaznews' ),
		'section'     => 'magaznews_archive_page_options',
		'settings'    => 'magaznews_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Archive Column layout options.
$wp_customize->add_setting(
	'magaznews_archive_column_layout',
	array(
		'default'           => 'double-column',
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_archive_column_layout',
	array(
		'label'   => esc_html__( 'Column Layout', 'magaznews' ),
		'section' => 'magaznews_archive_page_options',
		'type'    => 'select',
		'choices' => array(
			'double-column' => __( 'Column 2', 'magaznews' ),
			'triple-column' => __( 'Column 3', 'magaznews' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'magaznews_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'magaznews' ),
			'settings' => 'magaznews_enable_archive_category',
			'section'  => 'magaznews_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'magaznews_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'magaznews' ),
			'settings' => 'magaznews_enable_archive_author',
			'section'  => 'magaznews_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'magaznews_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'magaznews' ),
			'settings' => 'magaznews_enable_archive_date',
			'section'  => 'magaznews_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
