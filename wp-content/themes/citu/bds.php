<?php
/*
Template Name: Bds
*/
get_header(); ?>


<?php
if ( have_posts() ) :
        include('template-parts'.DIRECTORY_SEPARATOR.'citu-bds.php');
endif;
?>

<?php get_footer();
