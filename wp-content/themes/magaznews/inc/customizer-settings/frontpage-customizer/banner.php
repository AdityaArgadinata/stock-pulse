<?php
/**
 * Frontpage Customizer Settings
 *
 * @package Magaznews
 *
 * Banner Section
 */

$wp_customize->add_section(
	'magaznews_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'magaznews' ),
		'panel' => 'magaznews_frontpage_panel',
	)
);

// Banner section enable settings.
$wp_customize->add_setting(
	'magaznews_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'magaznews' ),
			'type'     => 'checkbox',
			'settings' => 'magaznews_banner_section_enable',
			'section'  => 'magaznews_banner_section',
		)
	)
);

// Banner Slider Sub Heading.
$wp_customize->add_setting(
	'magaznews_banner_slider_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Magaznews_Section_Sub_Heading_Control(
		$wp_customize,
		'magaznews_banner_slider_sub_heading',
		array(
			'label'           => esc_html__( 'Banner Slider Section', 'magaznews' ),
			'settings'        => 'magaznews_banner_slider_sub_heading',
			'section'         => 'magaznews_banner_section',
			'active_callback' => 'magaznews_if_banner_enabled',
		)
	)
);

// banner content type settings.
$wp_customize->add_setting(
	'magaznews_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'magaznews' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'magaznews' ),
		'section'         => 'magaznews_banner_section',
		'type'            => 'select',
		'active_callback' => 'magaznews_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'magaznews' ),
			'category' => esc_html__( 'Category', 'magaznews' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// banner post setting.
	$wp_customize->add_setting(
		'magaznews_banner_slider_post_' . $i,
		array(
			'sanitize_callback' => 'magaznews_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'magaznews_banner_slider_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'magaznews' ), $i ),
			'section'         => 'magaznews_banner_section',
			'type'            => 'select',
			'choices'         => magaznews_get_post_choices(),
			'active_callback' => 'magaznews_banner_slider_content_type_post_enabled',
		)
	);

}

// banner category setting.
$wp_customize->add_setting(
	'magaznews_banner_slider_category',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_banner_slider_category',
	array(
		'label'           => esc_html__( 'Category', 'magaznews' ),
		'section'         => 'magaznews_banner_section',
		'type'            => 'select',
		'choices'         => magaznews_get_post_cat_choices(),
		'active_callback' => 'magaznews_banner_slider_content_type_category_enabled',
	)
);

// Banner Posts Sub Heading.
$wp_customize->add_setting(
	'magaznews_banner_posts_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Magaznews_Section_Sub_Heading_Control(
		$wp_customize,
		'magaznews_banner_posts_sub_heading',
		array(
			'label'           => esc_html__( 'Banner Posts Section', 'magaznews' ),
			'settings'        => 'magaznews_banner_posts_sub_heading',
			'section'         => 'magaznews_banner_section',
			'active_callback' => 'magaznews_if_banner_enabled',
		)
	)
);

// banner content type settings.
$wp_customize->add_setting(
	'magaznews_banner_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_banner_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'magaznews' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'magaznews' ),
		'section'         => 'magaznews_banner_section',
		'type'            => 'select',
		'active_callback' => 'magaznews_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'magaznews' ),
			'category' => esc_html__( 'Category', 'magaznews' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// banner post setting.
	$wp_customize->add_setting(
		'magaznews_banner_posts_post_' . $i,
		array(
			'sanitize_callback' => 'magaznews_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'magaznews_banner_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'magaznews' ), $i ),
			'section'         => 'magaznews_banner_section',
			'type'            => 'select',
			'choices'         => magaznews_get_post_choices(),
			'active_callback' => 'magaznews_banner_posts_content_type_post_enabled',
		)
	);

}

// banner category setting.
$wp_customize->add_setting(
	'magaznews_banner_posts_category',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_banner_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'magaznews' ),
		'section'         => 'magaznews_banner_section',
		'type'            => 'select',
		'choices'         => magaznews_get_post_cat_choices(),
		'active_callback' => 'magaznews_banner_posts_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function magaznews_if_banner_enabled( $control ) {
	return $control->manager->get_setting( 'magaznews_banner_section_enable' )->value();
}
//Banner Slider
function magaznews_banner_slider_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_banner_slider_content_type' )->value();
	return magaznews_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function magaznews_banner_slider_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_banner_slider_content_type' )->value();
	return magaznews_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
//Banner Posts
function magaznews_banner_posts_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_banner_posts_content_type' )->value();
	return magaznews_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function magaznews_banner_posts_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_banner_posts_content_type' )->value();
	return magaznews_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
