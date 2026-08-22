<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yosemite
 */

?>

<section class="entry-content no-results not-found">
	
	<h2><?php esc_html_e( 'Nekas netika atrasts', 'yosemite-lite' ); ?></h2>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php
					/* translators: go to the post creating page */
					printf( wp_kses( __( 'Gatavs publicēt savu pirmo rakstu? <a href="%1$s">Sāc šeit</a>.', 'yosemite-lite' ), array(
						'a' => array(
						'href' => array(),
						),
					) ), esc_url( admin_url( 'post-new.php' ) ) );
				?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Diemžēl nekas neatbilda jūsu meklēšanas terminam. Lūdzu, mēģiniet vēlreiz, izmantojot kādu citu atslēgvārdu.', 'yosemite-lite' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'Šķiet, ka mēs nevaram atrast to, ko Jūs meklējat. Varbūt meklēšana var palīdzēt.', 'yosemite-lite' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
