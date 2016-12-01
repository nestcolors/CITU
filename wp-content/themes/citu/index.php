<?php
/*
Template Name: Main
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				if ($wp_query->post_count === 1){
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-index.php');
				} else {
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-magazine.php');
				}

			endif;
			?>

<?php get_footer();
