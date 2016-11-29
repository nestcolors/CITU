<?php
/*
Template Name: Its
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-its.php');
				endwhile;
			endif;
			?>

<?php get_footer();
