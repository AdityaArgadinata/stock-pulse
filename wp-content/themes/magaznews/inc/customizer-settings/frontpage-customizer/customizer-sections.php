<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'magaznews_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'magaznews' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'highlights-news', 'banner', 'recent-articles' );

foreach ( $customizer_settings as $customizer ) {

	require get_template_directory() . '/inc/customizer-settings/frontpage-customizer/' . $customizer . '.php';

}
