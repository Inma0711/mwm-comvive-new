<?php get_header(); ?>

<main class="mwm-main-container">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-ayuda is-search">
                <div class="mwm-ayuda__header">
    
                    <h1 class="mwm-ayuda__title">Resultados de búsqueda: <?php echo get_search_query(); ?></h1>
                    
                    <div class="mwm-ayuda__search">
                        <form role="search" method="get" class="mwm-ayuda__search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="search" class="mwm-ayuda__search-input" placeholder="Buscar ayuda..." value="<?php echo get_search_query(); ?>" name="s" />
                            <input type="hidden" name="post_type" value="ayuda" />
                            <input type="hidden" name="search_type" value="ayuda" />
                            <button type="submit" class="mwm-ayuda__search-submit">Buscar</button>
                        </form>
                    </div>
                </div>

                <div class="mwm-ayuda__category-listing">
                    <?php if (have_posts()) : ?>
                        <ul class="mwm-ayuda__category-list">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="mwm-ayuda__category-item">
                                    <h2 class="mwm-ayuda__category-item-title">
                                        <a href="<?php the_permalink(); ?>" class="mwm-ayuda__category-item-link"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="mwm-ayuda__category-item-content">
                                        <div class="mwm-ayuda__category-item-text">
                                            <?php 
                                            $content = get_the_content();
                                            // Remove shortcodes and HTML tags
                                            $content = strip_shortcodes($content);
                                            $content = wp_strip_all_tags($content);
                                            
                                            // Try to get the first paragraph
                                            if (preg_match('/^([^.!?]*[.!?]+)/', $content, $matches)) {
                                                echo wp_trim_words($matches[1], 30, '...');
                                            } else {
                                                // If no paragraph found, just trim the content
                                                echo wp_trim_words($content, 30, '...');
                                            }
                                            ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="mwm-ayuda__category-item-more">Seguir leyendo</a>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>

                        <?php
                        // Paginación
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => 'Anterior',
                            'next_text' => 'Siguiente',
                            'class' => 'mwm-ayuda__pagination'
                        ));
                        ?>

                    <?php else : ?>
                        <p>No se encontraron resultados para tu búsqueda.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 