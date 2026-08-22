<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yosemite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
            global $paged;

            // set the "paged" parameter (use 'page' if the query is on a static front page)
            $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
            $args = array(
                'post_type'=> 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged
            );
            $query = new WP_query($args);

			if( $paged == 1 ) : 
                the_content();
            ?>

			<?php else :
                echo '<div class="display-posts-listing">';
				/* Start the Loop */
				while ( $query->have_posts() ) : $query->the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
				echo '</div>';
            endif;
		?>

        <div class="nav-links">
            <div class="nav-previous">
                <?php next_posts_link( 'Nākamā lapa &raquo;', $query->max_num_pages ); ?>
            </div>
            <div class="nav-next">
                <?php previous_posts_link( '&laquo; Iepriekšējā lapa' ); ?>
            </div>
        </div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->