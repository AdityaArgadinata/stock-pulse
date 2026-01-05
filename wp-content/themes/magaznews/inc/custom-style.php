<?php

/**
 * Custom Style
 */
function magaznews_custom_style() {

	$site_tagline_hue      = get_theme_mod( 'magaznews_header_tagline', '#000000' );
	$site_title_font       = get_theme_mod( 'magaznews_site_title_font', '' );
	$site_description_font = get_theme_mod( 'magaznews_site_description_font', '' );
	$header_font           = get_theme_mod( 'magaznews_header_font', '' );
	$body_font             = get_theme_mod( 'magaznews_body_font', '' );

	$custom_style_css = '';

	$custom_style_css .= '

	/* Site title and tagline color css */
	:root {
		--site-title-hue: ' . esc_attr( '#' . get_header_textcolor() ) . ';
		--site-tagline-hue: ' . esc_attr( $site_tagline_hue ) . ';

		' . ( ! empty( $site_title_font ) ? '--site-title-font: "' . esc_attr( str_replace( '+', ' ', $site_title_font ) ) . '", serif;' : '' ) . '
		' . ( ! empty( $site_description_font ) ? '--site-tagline-font: "' . esc_attr( str_replace( '+', ' ', $site_description_font ) ) . '", serif;' : '' ) . '
		' . ( ! empty( $header_font ) ? '--heading-font: "' . esc_attr( str_replace( '+', ' ', $header_font ) ) . '", serif;' : '' ) . '
		' . ( ! empty( $body_font ) ? '--site-body-font: "' . esc_attr( str_replace( '+', ' ', $body_font ) ) . '", serif;' : '' ) . '
	}
	';

	wp_add_inline_style( 'magaznews-style', $custom_style_css );
}
add_action( 'wp_enqueue_scripts', 'magaznews_custom_style', 99 );
