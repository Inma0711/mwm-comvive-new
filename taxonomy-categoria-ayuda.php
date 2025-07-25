<?php get_header(); ?>

<main class="mwm-main-container">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-ayuda is-category">
                <div class="mwm-ayuda__header">
                    <?php
                    $term = get_queried_object();
                    ?>
                    <div class="mwm-ayuda-single__breadcrumb">
                        <a href="<?php echo home_url(); ?>" class="mwm-ayuda-single__breadcrumb-link">Comvive</a>
                        <span class="mwm-ayuda-single__breadcrumb-separator">»</span>
                        <a href="<?php echo get_post_type_archive_link('ayuda'); ?>" class="mwm-ayuda-single__breadcrumb-link">Ayuda</a>
                        <span class="mwm-ayuda-single__breadcrumb-separator">»</span>
                        <span class="mwm-ayuda-single__breadcrumb-current"><?php echo esc_html($term->name); ?></span>
                    </div>

                    <h1 class="mwm-ayuda__title">Categoría de ayuda: <?php echo esc_html($term->name); ?></h1>
                    <?php if ($term->description) : ?>
                        <div class="mwm-ayuda__category-desc"><?php echo esc_html($term->description); ?></div>
                    <?php endif; ?>
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
                    <?php else : ?>
                        <p>No hay artículos en esta categoría.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 