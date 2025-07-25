<?php get_header(); ?>

<main class="mwm-main-container">

	<section class="mwm-archive-header">
		<div class="mwm-max">
			<div class="mwm-wrapper">
				<h1 class="mwm-archive-header__title"><?php mwm_echo_mod('mwm_archive_title'); ?></h1>
				<p class="mwm-archive-header__desc"><?php mwm_echo_mod('mwm_archive_desc'); ?></p>
			</div>
		</div>
	</section>

	<section class="mwm-section-cards-entries">
		<div class="mwm-max">
			<h2 class="mwm-section-cards-entries__title screen-reader-text">
				<?php echo esc_html__('Últimas noticias', 'comvive'); ?>
			</h2>
			<div class="mwm-wrapper">

				<div class="mwm-section-cards-entries__list">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/mwm-card-entry' );
						}
					}
					?>
				</div>

				<?php 
				ob_start(); 

				mwm_load_more('.mwm-section-cards-entries__list', 'template-parts/mwm-card-entry'); 

				$output = ob_get_clean(); 

				if ( ! empty( trim( $output ) ) ) : ?>
					<div class="mwm-section-cards-entries__btn">
						<?php echo $output; ?>
					</div>
				<?php endif; ?>


			</div>
		</div>
	</section>

	<?php echo mwm_get_reusable_block( 71 ); ?>
	<?php echo mwm_get_reusable_block( 73 ); ?>

</main>

<?php get_footer(); ?>
