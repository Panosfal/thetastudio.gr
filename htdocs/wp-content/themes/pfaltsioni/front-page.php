<?php
/*
Template Name: Front Page
*/

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="bg-secondary p-0 mb-5">
    <div class="container-fluid p-0">
        <!-- <img class="img-fluid overflow-x-hidden" src="<?php echo THEME_IMAGES; ?>/hero.webp" alt="placeholder"> -->
    </div>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>

