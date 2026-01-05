<?php

// Categories Widget.
require get_template_directory() . '/inc/custom-widgets/categories-widget.php';

// Mini List Widget.
require get_template_directory() . '/inc/custom-widgets/mini-list-widget.php';

// Grid List Posts Widget.
require get_template_directory() . '/inc/custom-widgets/grid-list-posts-widget.php';

// Grid Posts Widget.
require get_template_directory() . '/inc/custom-widgets/grid-posts-widget.php';

// List Posts Widget.
require get_template_directory() . '/inc/custom-widgets/list-posts-widget.php';

// Tile Posts Widget.
require get_template_directory() . '/inc/custom-widgets/tile-posts-widget.php';

/**
 * Register Widgets
 */
function magaznews_register_widgets() {

	register_widget( 'Magaznews_Categories_Widget' );

	register_widget( 'Magaznews_Mini_List_Widget' );

	register_widget( 'Magaznews_Grid_List_Posts_Widget' );

	register_widget( 'Magaznews_Grid_Posts_Widget' );

	register_widget( 'Magaznews_List_Posts_Widget' );

	register_widget( 'Magaznews_Tile_Posts_Widget' );

}
add_action( 'widgets_init', 'magaznews_register_widgets' );
