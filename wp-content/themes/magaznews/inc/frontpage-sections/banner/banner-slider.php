<?php
$banner_slider_query = new WP_Query( $banner_slider_args );
if ( $banner_slider_query->have_posts() ) {
	?>
	<div class="banner-slider-area">
		<div class="container-wrap banner-carousel">
			<?php
			while ( $banner_slider_query->have_posts() ) :
				$banner_slider_query->the_post();
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
			?>
		</div>
	</div>

	<?php
}