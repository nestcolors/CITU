<?php
/*
Template Name: Its-nl
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-its-nl.php');
			endif;
			?>

<?php get_footer();
