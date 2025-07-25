<article class="mwm-card-entry">
	<div class="mwm-card-entry__img">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="mwm-card-entry__info">
		<div class="mwm-card-entry__title-wrapper">
			<div class="mwm-card-entry__meta">
				<div class="mwm-card-entry__cat">
					<?php
					$categories = get_the_category();
					if (!empty($categories)) {
						$category_link = get_category_link($categories[0]->term_id);
						echo '<a href="' . esc_url($category_link) . '">' . esc_html($categories[0]->name) . '</a>';
					}
					?>
				</div>
				<div class="mwm-card-entry__meta-separator">
					<span>|</span>
				</div>
				<div class="mwm-card-entry__date">
					<?php echo date_i18n('j \d\e F \d\e Y', get_the_date('U')); ?>
				</div>
			</div>
			<h3 class="mwm-card-entry__title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<div class="mwm-card-entry__desc">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</article>