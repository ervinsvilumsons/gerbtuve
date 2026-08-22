<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Yosemite
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="entry-content">

				<h2>
					<?php
						/* translators: get the search query */
						printf( esc_html__( 'Meklēšanas rezultāti: %s', 'yosemite-lite' ), '<span>"' . get_search_query() . '"</span>' );
					?>
				</h2>
			</header><!-- .page-header -->
			<br>
			<?php
			echo '<div class="display-posts-listing">';
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			echo '</div>';

			the_posts_navigation( array(
				'prev_text' => esc_html__( 'Nākamā lapa &raquo;', 'yosemite-lite' ),
				'next_text' => esc_html__( '&laquo; Iepriekšējā lapa', 'yosemite-lite' ),
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
