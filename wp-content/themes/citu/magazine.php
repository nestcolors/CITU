<?php
/*
Template Name: Magazine
*/
 get_header(); ?>
			<?php
			if ( have_posts() ) :
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-magazine.php');
			endif;
			?>
<?php get_footer();
