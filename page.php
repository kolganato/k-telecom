<?php

/*
 * Template Name: k-telecom
 * Template Post Type: page
 */

get_header();

?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <?php 
        get_template_part('template-parts/top'); 
        get_template_part('template-parts/tariffs');
        get_template_part('template-parts/form');           
    ?>

    <?php endwhile; endif; ?>
</main>


<?php get_footer(); ?>