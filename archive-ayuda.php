<?php get_header(); ?>

<main class="mwm-main-container">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-ayuda">
                <div class="mwm-ayuda__header">
                    <h1 class="mwm-ayuda__title"><?php post_type_archive_title(); ?></h1>
                    
                    <div class="mwm-ayuda__search">
                        <form role="search" method="get" class="mwm-ayuda__search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="search" class="mwm-ayuda__search-input" placeholder="Buscar ayuda..." value="<?php echo get_search_query(); ?>" name="s" />
                            <input type="hidden" name="post_type" value="ayuda" />
                            <button type="submit" class="mwm-ayuda__search-submit">Buscar</button>
                        </form>
                    </div>
                </div>

                <div class="mwm-ayuda__categories-columns">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'categoria-ayuda',
                        'hide_empty' => true,
                    ));
                    if (!empty($categories) && !is_wp_error($categories)) :
                        echo '<div class="mwm-ayuda__categories-grid">';
                        foreach ($categories as $category) :
                            $posts = get_posts(array(
                                'post_type' => 'ayuda',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categoria-ayuda',
                                        'field' => 'term_id',
                                        'terms' => $category->term_id,
                                    ),
                                ),
                            ));
                            echo '<div class="mwm-ayuda__category-col">';
                            echo '<div class="mwm-ayuda__category-header">';
                            echo '<span class="mwm-ayuda__category-title">';
                            echo '<a href="' . esc_url(get_term_link($category)) . '" class="mwm-ayuda__category-link-to-cat" title="Ver solo esta categoría">' . esc_html($category->name) . '</a> (' . count($posts) . ')';
                            echo '</span>';
                            echo '</div>';
                            if ($posts) {
                                echo '<ul class="mwm-ayuda__category-list">';
                                foreach ($posts as $post) {
                                    echo '<li class="mwm-ayuda__category-item"><a href="' . get_permalink($post) . '" class="mwm-ayuda__category-item-link">' . esc_html(get_the_title($post)) . '</a></li>';
                                }
                                echo '</ul>';
                            }
                            echo '</div>';
                        endforeach;
                        echo '</div>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 