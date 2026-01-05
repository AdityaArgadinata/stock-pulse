<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magaznews
 */

?>

</div>

<?php if ( ! is_front_page() || is_home() ) { ?>
</div>
</div><!-- #content -->

<?php

}

?>

<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="upper-footer">
		<div class="site-container-width">
			<div class="upper-footer-container">

				<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
					<div class="footer-widget-block">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
<?php endif; ?>

<?php
$magaznews_search  = array( '[the-year]', '[site-link]' );
$replace           = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'magaznews' ), '[the-year]', '[site-link]' );
$copyright_text    = get_theme_mod( 'magaznews_copyright_txt', $copyright_default );
$copyright_text    = str_replace( $magaznews_search, $replace, $copyright_text );
	?>
	<div class="lower-footer">
		<div class="site-container-width">
			<div class="lower-footer-info">
				<div class="site-info">
					<span>
						<?php echo wp_kses_post( $copyright_text ); ?>
					</span>	
				</div><!-- .site-info -->
			</div>
		</div>
	</div>

</footer><!-- #colophon -->

<a href="#" id="scroll-to-top" class="magaznews-scroll-to-top"><i class="fas fa-chevron-up"></i></a>		

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
