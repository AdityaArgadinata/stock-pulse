<?php

/**
 * Frontpage Highlights News Section.
 *
 * @package Magaznews
 */

// Highlights News Section.
$highlights_news_section = get_theme_mod('magaznews_highlights_news_section_enable', false);

if (false === $highlights_news_section) {
	return;
}

$content_ids                  = $section_content = array();
$highlights_news_content_type = get_theme_mod('magaznews_highlights_news_content_type', 'post');

if ($highlights_news_content_type === 'post') {

	for ($i = 1; $i <= 6; $i++) {
		$content_ids[] = get_theme_mod('magaznews_highlights_news_post_' . $i);
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint(6),
		'ignore_sticky_posts' => true,
	);
	if (! empty(array_filter($content_ids))) {
		$args['post__in'] = array_filter($content_ids);
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod('magaznews_highlights_news_category');
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint(6),
	);
}

$query = new WP_Query($args);
if ($query->have_posts()) :
	$section_title    = get_theme_mod('magaznews_highlights_news_title', __('Highlights News', 'magaznews'));
?>
	<div id="magaznews_highlights_news_section" class="news-highlights">
		<div class="tradingview-widget-">
			<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
				{
					"symbols": [{
							"proName": "IDX:COMPOSITE",
							"title": "IHSG"
						},
						{
							"proName": "NASDAQ:QQQ",
							"title": "NASDAQ QQQ"
						},
						{
							"proName": "AMEX:SPY",
							"title": "S&P 500"
						},
						{
							"proName": "AMEX:GLD",
							"title": "GOLD"
						},
						{
							"proName": "BINANCE:BTCUSDT",
							"title": "BITCOIN"
						}
					],
					"showSymbolLogo": true,
					"isTransparent": false,
					"displayMode": "adaptive",
					"colorTheme": "dark",
					"locale": "id"
				}
			</script>
		</div>
		<div class="site-container-width">
			<div class="news-highlights-container">
			</div>
		</div>
	</div>
<?php
endif;

