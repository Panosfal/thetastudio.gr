<?php get_header(); ?>

<main class="portfolio-archive">
    <h1>Portfolio Categories</h1>

    <ul class="portfolio-categories">
        <?php
        $terms = get_terms([
            'taxonomy' => 'portfolio_category',
            'hide_empty' => true, // Only show categories that have projects
        ]);

        if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $term) :
                $term_link = get_term_link($term);
                ?>
                <li class="portfolio-category">
                    <a href="<?php echo esc_url($term_link); ?>">
                        <?php echo esc_html($term->name); ?>
                        <span class="portfolio-category-count">(<?php echo $term->count; ?>)</span>
                    </a>
                </li>
            <?php endforeach;
        else : ?>
            <li>No portfolio categories found.</li>
        <?php endif; ?>
    </ul>
</main>

<?php get_footer(); ?>