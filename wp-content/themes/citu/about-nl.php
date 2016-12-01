<?php
/*
Template Name: About-nl
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-about-nl.php');
			endif;
			?>

<?php get_footer();
