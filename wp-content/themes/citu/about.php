<?php
/*
Template Name: About
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-about.php');
			endif;
			?>

<?php get_footer();
