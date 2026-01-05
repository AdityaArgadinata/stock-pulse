<?php
/**
 * Highlights Section
 */

$wp_customize->add_section(
	'magaznews_highlights_news_section',
	array(
		'title' => esc_html__( 'Highlights Section', 'magaznews' ),
		'panel' => 'magaznews_frontpage_panel',
	)
);

// Highlights News section enable settings.
$wp_customize->add_setting(
	'magaznews_highlights_news_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'magaznews_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magaznews_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'magaznews_highlights_news_section_enable',
		array(
			'label'    => esc_html__( 'Enable Highlights News Section', 'magaznews' ),
			'type'     => 'checkbox',
			'settings' => 'magaznews_highlights_news_section_enable',
			'section'  => 'magaznews_highlights_news_section',
		)
	)
);

// Highlights News title settings.
$wp_customize->add_setting(
	'magaznews_highlights_news_title',
	array(
		'default'           => __( 'Highlights News', 'magaznews' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'magaznews_highlights_news_title',
	array(
		'label'           => esc_html__( 'Section Title', 'magaznews' ),
		'section'         => 'magaznews_highlights_news_section',
		'active_callback' => 'magaznews_if_highlights_news_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'magaznews_highlights_news_title',
		array(
			'selector'            => '.recentpost h3.section-title',
			'settings'            => 'magaznews_highlights_news_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'magaznews_highlights_news_title_text_partial',
		)
	);
}

// Highlights news content type settings.
$wp_customize->add_setting(
	'magaznews_highlights_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_highlights_news_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'magaznews' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'magaznews' ),
		'section'         => 'magaznews_highlights_news_section',
		'type'            => 'select',
		'active_callback' => 'magaznews_if_highlights_news_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'magaznews' ),
			'category' => esc_html__( 'Category', 'magaznews' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Highlights news post setting.
	$wp_customize->add_setting(
		'magaznews_highlights_news_post_' . $i,
		array(
			'sanitize_callback' => 'magaznews_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'magaznews_highlights_news_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'magaznews' ), $i ),
			'section'         => 'magaznews_highlights_news_section',
			'type'            => 'select',
			'choices'         => magaznews_get_post_choices(),
			'active_callback' => 'magaznews_highlights_news_section_content_type_post_enabled',
		)
	);

}

// Highlights news category setting.
$wp_customize->add_setting(
	'magaznews_highlights_news_category',
	array(
		'sanitize_callback' => 'magaznews_sanitize_select',
	)
);

$wp_customize->add_control(
	'magaznews_highlights_news_category',
	array(
		'label'           => esc_html__( 'Category', 'magaznews' ),
		'section'         => 'magaznews_highlights_news_section',
		'type'            => 'select',
		'choices'         => magaznews_get_post_cat_choices(),
		'active_callback' => 'magaznews_highlights_news_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function magaznews_if_highlights_news_enabled( $control ) {
	return $control->manager->get_setting( 'magaznews_highlights_news_section_enable' )->value();
}
function magaznews_highlights_news_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_highlights_news_content_type' )->value();
	return magaznews_if_highlights_news_enabled( $control ) && ( 'post' === $content_type );
}
function magaznews_highlights_news_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'magaznews_highlights_news_content_type' )->value();
	return magaznews_if_highlights_news_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'magaznews_highlights_news_title_text_partial' ) ) :
	// Title.
	function magaznews_highlights_news_title_text_partial() {
		return esc_html( get_theme_mod( 'magaznews_highlights_news_title' ) );
	}
endif;
