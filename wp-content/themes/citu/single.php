<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package citu
 */

get_header(); ?>

		<?php
		while ( have_posts() ) : the_post();

			include('template-parts'.DIRECTORY_SEPARATOR.'citu-single.php');

			/*the_post_navigation();*/

			// If comments are open or we have at least one comment, load up the comment template.


		endwhile; // End of the loop.
		?>
<?php

get_footer();
