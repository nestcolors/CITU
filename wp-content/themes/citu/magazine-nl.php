<?php
/*
Template Name: Magazine-nl
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-magazine-nl.php');
				endwhile;
			endif;
			?>

<?php get_footer();