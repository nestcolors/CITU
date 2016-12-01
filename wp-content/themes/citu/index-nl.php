<?php
/*
Template Name: Main-nl
*/
 get_header(); ?>


			<?php
			if ( have_posts() ) :
				if ($wp_query->post_count === 1){
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-index-nl.php');
				} else {
					include('template-parts'.DIRECTORY_SEPARATOR.'citu-magazine-nl.php');
				}
			endif;
			?>

<?php get_footer();
