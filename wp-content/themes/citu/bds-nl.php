<?php
/*
Template Name: Bds-nl
*/
get_header(); ?>


<?php
if ( have_posts() ) :
        include('template-parts'.DIRECTORY_SEPARATOR.'citu-bds-nl.php');
endif;
?>

<?php get_footer();
