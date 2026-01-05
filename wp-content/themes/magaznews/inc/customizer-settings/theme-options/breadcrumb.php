<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'magaznews_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'magaznews_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'magaznews' ),
			'type'     => 'checkbox',
			'settings' => 'magaznews_breadcrumb_enable',
			'section'  => 'magaznews_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'magaznews_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'magaznews_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'magaznews' ),
		'section'         => 'magaznews_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'magaznews_breadcrumb_enable' )->value() );
		},
	)
);
