<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yosemite
 */

?>
<article id="post-<?php the_ID(); ?>" class="listing-item">

	<?php if ( has_post_thumbnail() || has_post_format( array( 'video', 'audio' ) ) || get_post_gallery() ) : 
		get_template_part( 'template-parts/content', 'media' );
	endif; ?>

	<?php the_title( '<a class="title" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?>
	<!-- .entry-header -->

</article><!-- #post-## -->
