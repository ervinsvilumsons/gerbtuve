<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yosemite
 */

?>

	</div><!-- #content -->
	<aside id="secondary" class="sidebar-footer widget-area" role="complementary">
		<div class="container">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	</aside><!-- .sidebar-footer  -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="inner-footer">
				<span class="copyright">
					<?php echo 'Visas tiesības aizsargātas &copy ' . date('Y'); ?><br>
				</span>
				<div class="developer">
					<span><?php echo 'Izstrādāja'; ?></span>
					<a href="https://www.linkedin.com/in/ervins-vilumsons/" title="Ervins Vilumsons">
						<img itemprop="logo"
							src="<?php echo esc_url( get_theme_mod( 'logo', get_template_directory_uri() . '/images/developer-logo.png' ) ); ?>"
							alt="Ervins Vilumsons"/>
					</a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav class="mobile-navigation" role="navigation">
	<?php
	wp_nav_menu( array(
		'container_class' => 'mobile-menu',
		'menu_class'      => 'mobile-menu clearfix',
		'theme_location'  => 'menu-1',
		'items_wrap'      => '<ul>%3$s</ul>',
	) );
	?>
</nav>
<a href="#" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>
