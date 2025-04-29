<?php
/**
 * Taxonomy Template for Portfolio Categories
 */
get_header(); ?>

<div class="container">
    <h1><?php single_term_title(); ?></h1>
    <div class="portfolio-taxonomy">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p>No projects found in this category.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>