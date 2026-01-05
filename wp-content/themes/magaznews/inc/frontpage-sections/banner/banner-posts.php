<?php
$banner_posts_query = new WP_Query( $banner_posts_args );
if ( $banner_posts_query->have_posts() ) {
	while ( $banner_posts_query->have_posts() ) :
		$banner_posts_query->the_post();
		?>
		<div class="single-card-container tile-card">
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
	endwhile;
	wp_reset_postdata();
}
