<?php
/**
 * Frontpage Recent Articles Section.
 *
 * @package Magaznews
 */

// Recent Articles Section.
$recent_articles_section = get_theme_mod( 'magaznews_recent_articles_section_enable', false );

if ( false === $recent_articles_section ) {
	return;
}

$content_ids                  = array();
$recent_articles_content_type = get_theme_mod( 'magaznews_recent_articles_content_type', 'recent' );

if ( $recent_articles_content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$content_ids[] = get_theme_mod( 'magaznews_recent_articles_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
	$section_title = get_theme_mod( 'magaznews_recent_articles_title', __( 'Recent Articles', 'magaznews' ) );
	$view_all_btn  = get_theme_mod( 'magaznews_recent_articles_view_all_button_label', __( 'View All', 'magaznews' ) );
	$view_all_url  = get_theme_mod( 'magaznews_recent_articles_view_all_button_url', '#' );
	?>
	<section id="magaznews_recent_articles_section" class="recent-articles section-divider recent-layout-2">
		<div class="site-container-width">
			<?php if ( ! empty( $section_title || $view_all_btn ) ) : ?>
				<div class="header-title">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<a href="<?php echo esc_url( $view_all_url ); ?>" class="view-all"><?php echo esc_html( $view_all_btn ); ?></a>
				</div>
			<?php endif; ?>
			<div class="container-wrap">
				<?php
				$i = 1;
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="single-card-container <?php echo esc_attr( $i === 1 ? 'tile-card' : 'list-card' ); ?>">
						<div class="single-card-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<div class="single-card-detail">
							<div class="card-categories">
								<?php magaznews_categories_list(); ?>
							</div>
							<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="card-meta">
								<span class="post-author">
									<?php magaznews_posted_by(); ?>
								</span>
								<span class="post-date">
									<?php magaznews_posted_on(); ?>
								</span>
							</div>
						</div>
					</div>
					<?php
					$i++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>

	<?php
}
