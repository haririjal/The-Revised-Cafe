<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theRevisedCafe
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info" style="text-align: center; ">
		<div class="mu-footer-social">
            <a href="https://www.facebook.com/therevisedcafe/"><span class="fa fa-facebook"></span></a>
            <a href="https://www.twitter.com/therevisedcafe/"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-google-plus"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-youtube"></span></a>
          </div>
		<b>
			<!-- <a href="<?php echo esc_url( __( 'https://vsic.com.np/', 'therevisedcafe' ) ); ?>"> -->
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Copyright © 2021 The Revised Cafe   %s', 'therevisedcafe' ), '' );
				?>
			</a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'https://vsic.com.np/', 'therevisedcafe' ) ); ?>">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'With Love and Care By VSIC.' ), 'therevisedcafe', '<a href="https://vsic.com.np/"></a>' );
				?>
				</b>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
