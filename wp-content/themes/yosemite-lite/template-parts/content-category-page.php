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

        <header class="entry-content">
            <h2><?php echo get_the_title() ?></h2>
        </header><!-- .page-header -->
        <br>

        <?php
            global $post;
            
            // set the "paged" parameter (use 'page' if the query is on a static front page)
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'category_name' => $post->post_name,
                'post_type'=> 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged
            );
            $query = new WP_query($args);

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