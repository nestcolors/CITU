<?php
/*
Template Name: Magazine-nl
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-magazine-nl.php');
			endif;
			?>

<?php get_footer();
