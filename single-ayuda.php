<?php get_header(); ?>

<main class="mwm-main-container">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <article id="post-<?php the_ID(); ?>" <?php post_class('mwm-ayuda-single'); ?>>
                <div class="mwm-ayuda-single__header">
                    <div class="mwm-ayuda-single__breadcrumb">
                        <a href="<?php echo home_url(); ?>" class="mwm-ayuda-single__breadcrumb-link">Comvive</a>
                        <span class="mwm-ayuda-single__breadcrumb-separator">»</span>
                        <a href="<?php echo get_post_type_archive_link('ayuda'); ?>" class="mwm-ayuda-single__breadcrumb-link">Ayuda</a>
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'categoria-ayuda');
                        if ($categories && !is_wp_error($categories)) :
                            $category = $categories[0]; // Get the first category
                        ?>
                            <span class="mwm-ayuda-single__breadcrumb-separator">»</span>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="mwm-ayuda-single__breadcrumb-link"><?php echo esc_html($category->name); ?></a>
                        <?php endif; ?>
                        <span class="mwm-ayuda-single__breadcrumb-separator">»</span>
                        <span class="mwm-ayuda-single__breadcrumb-current"><?php the_title(); ?></span>
                    </div>

                    <h1 class="mwm-ayuda-single__title"><?php the_title(); ?></h1>
                </div>

                <div class="mwm-ayuda-single__content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mwm-ayuda-single__image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mwm-ayuda-single__text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>

<?php get_footer(); ?> 