<?php get_header(); ?>

<main class="mwm-main-container">

	<div class="mwm-post">
		<div class="mwm-max">
			<div class="mwm-wrapper">
				<div class="mwm-post__header">
					<h1 class="mwm-post__title"><?php the_title(); ?></h1>
				</div>
				<div class="mwm-post__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>
