<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'magaznews_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'magaznews' ),
		'panel' => 'magaznews_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'magaznews_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'magaznews' ),
			'settings' => 'magaznews_pagination_enable',
			'section'  => 'magaznews_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'magaznews_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'magaznews' ),
		'section'         => 'magaznews_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'magaznews' ),
			'numeric' => __( 'Numeric', 'magaznews' ),
		),
		'active_callback' => 'magaznews_pagination_enabled',
	)
);

/*========================Active Callback==============================*/
function magaznews_pagination_enabled( $control ) {
	return $control->manager->get_setting( 'magaznews_pagination_enable' )->value();
}
