<?php
/**
 * Frontpage Customizer Settings
 *
 * @package Magaznews
 *
 * Recent Articles Section
 */

$wp_customize->add_section(
	'magaznews_recent_articles_section',
	array(
		'title' => esc_html__( 'Recent Articles Section', 'magaznews' ),
		'panel' => 'magaznews_frontpage_panel',
	)
);

// Recent Articles section enable settings.
$wp_customize->add_setting(
	'magaznews_recent_articles_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_recent_articles_section_enable',
		array(
			'label'    => esc_html__( 'Enable Recent Articles Section', 'magaznews' ),
			'type'     => 'checkbox',
			'settings' => 'magaznews_recent_articles_section_enable',
			'section'  => 'magaznews_recent_articles_section',
		)
	)
);

// Recent Articles title settings.
$wp_customize->add_setting(
	'magaznews_recent_articles_title',
	array(
		'default'           => __( 'Recent Articles', 'magaznews' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'magaznews_recent_articles_title',
	array(
		'label'           => esc_html__( 'Section Title', 'magaznews' ),
		'section'         => 'magaznews_recent_articles_section',
		'active_callback' => 'magaznews_if_recent_articles_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'magaznews_recent_articles_title',
		array(
			'selector'            => '.recentpost h3.section-title',
			'settings'            => 'magaznews_recent_articles_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'magaznews_recent_articles_title_text_partial',
		)
	);
}

// View All button label setting.
$wp_customize->add_setting(
	'magaznews_recent_articles_view_all_button_label',
	array(
		'default'           => __( 'View All', 'magaznews' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'magaznews_recent_articles_view_all_button_label',
	array(
		'label'           => esc_html__( 'View All Button Label', 'magaznews' ),
		'section'         => 'magaznews_recent_articles_section',
		'settings'        => 'magaznews_recent_articles_view_all_button_label',
		'type'            => 'text',
		'active_callback' => 'magaznews_if_recent_articles_enabled',
	)
);

// View All button URL setting.
$wp_customize->add_setting(
	'magaznews_recent_articles_view_all_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'magaznews_recent_articles_view_all_button_url',
	array(
		'label'           => esc_html__( 'View All Button Link', 'magaznews' ),
		'section'         => 'magaznews_recent_articles_section',
		'settings'        => 'magaznews_recent_articles_view_all_button_url',
		'type'            => 'url',
		'active_callback' => 'magaznews_if_recent_articles_enabled',
	)
);

// recent_articles content type settings.
$wp_customize->add_setting(
	'magaznews_recent_articles_content_type',
	array(
		'default'           => 'recent',
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_recent_articles_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'magaznews' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'magaznews' ),
		'section'         => 'magaznews_recent_articles_section',
		'type'            => 'select',
		'active_callback' => 'magaznews_if_recent_articles_enabled',
		'choices'         => array(
			'post'   => esc_html__( 'Post', 'magaznews' ),
			'recent' => esc_html__( 'Recent', 'magaznews' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// recent_articles post setting.
	$wp_customize->add_setting(
		'magaznews_recent_articles_post_' . $i,
		array(
			'sanitize_callback' => 'magaznews_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'magaznews_recent_articles_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'magaznews' ), $i ),
			'section'         => 'magaznews_recent_articles_section',
			'type'            => 'select',
			'choices'         => magaznews_get_post_choices(),
			'active_callback' => 'magaznews_recent_articles_section_content_type_post_enabled',
		)
	);

}

// recent_articles category setting.
$wp_customize->add_setting(
	'magaznews_recent_articles_category',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_recent_articles_category',
	array(
		'label'           => esc_html__( 'Category', 'magaznews' ),
		'section'         => 'magaznews_recent_articles_section',
		'type'            => 'select',
		'choices'         => magaznews_get_post_cat_choices(),
		'active_callback' => 'magaznews_recent_articles_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function magaznews_if_recent_articles_enabled( $control ) {
	return $control->manager->get_setting( 'magaznews_recent_articles_section_enable' )->value();
}
function magaznews_recent_articles_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_recent_articles_content_type' )->value();
	return magaznews_if_recent_articles_enabled( $control ) && ( 'post' === $content_type );
}
function magaznews_recent_articles_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_recent_articles_content_type' )->value();
	return magaznews_if_recent_articles_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'magaznews_recent_articles_title_text_partial' ) ) :
	// Title.
	function magaznews_recent_articles_title_text_partial() {
		return esc_html( get_theme_mod( 'magaznews_recent_articles_title' ) );
	}
endif;
