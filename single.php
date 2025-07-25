<?php get_header(); ?>

<main class="mwm-main-container">
	
	<section class="mwm-post">
		<div class="mwm-max">
			<div class="mwm-wrapper">
				<div class="mwm-post__header">
					<div class="mwm-post__meta">
						<div class="mwm-post__cat">
							<?php
							$categories = get_the_category();
							if (!empty($categories)) {
								$category_link = get_category_link($categories[0]->term_id);
								echo '<a href="' . esc_url($category_link) . '">' . esc_html($categories[0]->name) . '</a>';
							}
							?>
						</div>
						<div class="mwm-post__meta-separator">
							<span>|</span>
						</div>
						<div class="mwm-post__date">
							<?php echo date_i18n('j \d\e F \d\e Y', get_the_date('U')); ?>
						</div>
					</div>
					<h1 class="mwm-post__title"><?php the_title(); ?></h1>
				</div>
				<div class="mwm-post__media">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="mwm-post__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

	<?php echo mwm_get_reusable_block( 71 ); ?>

	<section class="mwm-section-cards-entries related-posts">
		<div class="mwm-max">
			<h2 class="mwm-section-cards-entries__title screen-reader-text">
				<?php echo esc_html__('Relacionados', 'comvive'); ?>
			</h2>
			<div class="mwm-wrapper">

				<div class="mwm-section-cards-entries__list">
					<?php
					// Get current post categories
					$categories = get_the_category();
					$category_ids = array();
					
					if (!empty($categories)) {
						foreach ($categories as $category) {
							$category_ids[] = $category->term_id;
						}
					}

					$related_posts = get_posts(array(
						'post_type' => 'post',
						'posts_per_page' => 2,
						'post__not_in' => array(get_the_ID()),
						'category__in' => $category_ids,
						'orderby' => 'date',
						'order' => 'DESC'
					));

					if ($related_posts) {
						foreach ($related_posts as $post) {
							setup_postdata($post);
							get_template_part('template-parts/mwm-card-entry');
						}
						wp_reset_postdata();
					}
					?>
				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
