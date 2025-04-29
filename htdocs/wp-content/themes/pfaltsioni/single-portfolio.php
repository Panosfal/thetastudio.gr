<?php
/**
 * Single Portfolio Project Template
 */
get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="project-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="project-content">
                <?php the_content(); ?>
            </div>
            
            <div class="project-meta">
                <?php 
                // Display Portfolio Categories
                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                if ( $terms && ! is_wp_error( $terms ) ) {
                    echo '<strong>Categories:</strong> ';
                    $term_links = array();
                    foreach ( $terms as $term ) {
                        $term_links[] = '<a href="' . esc_url( get_term_link($term) ) . '">' . esc_html( $term->name ) . '</a>';
                    }
                    echo join( ', ', $term_links );
                }
                ?>
            </div>
        </article>
    
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>