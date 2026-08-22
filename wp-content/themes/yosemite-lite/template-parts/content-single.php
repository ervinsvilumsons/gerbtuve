<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yosemite
 */

	$isMobile = wp_is_mobile();
	$page = $GLOBALS['page'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ($page === 1) { ?>
		<div class="entry-header">
			<div class="entry-header-inner animated zoomIn full-width">

				<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
				<div class="entry-meta">
					<div class="author">
						<div class="author-image">
							<?php the_author_avatar(get_the_author_ID()); ?>
						</div>
						<div class="author-name">
							<div class="author-name-inner">
								<?php the_author_posts_link(); ?>
							</div>
							<div class="author-name-inner">
								<?php the_content_posted_on(); ?>
							</div>
						</div>
					</div>
				</div>

			</div>

			<?php
				if (has_post_thumbnail()) {
					the_content_thumbnail(get_the_post_thumbnail_url(get_the_ID(), (!$isMobile ? 'full' : 'medium_large')), $isMobile);
				} 
			?>
		</div><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>

		<div class="entry-pagination">
			<?php wp_link_pages([
				'before'      => '<div class="page-links">' . __('Lapas:', 'yosemite-lite'),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			]); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
