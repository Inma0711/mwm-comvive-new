<?php
/**
 * Block Name: MWM Media Text 1
 */

$title = get_field('title');
$description = get_field('description');
$description_2 = get_field('description_2');
$btn_text = get_field('btn_text');
$btn_link = get_field('btn_link');
$video_url = get_field('video_url');
$image = get_field('image');
?>

<section class="mwm-media-text-1">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-media-text-1__wrapper">
				<div class="mwm-media-text-1__text">
					<?php if ($title) : ?>
						<h2 class="mwm-media-text-1__title is-style-h100">
							<?php echo $title; ?>
						</h2>
					<?php endif; ?>

					<?php if ($description) : ?>	
						<div class="mwm-media-text-1__desc is-style-h400">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>

					<?php if ($btn_text) : ?>
						<div class="mwm-media-text-1__btn">
							<a href="<?php echo $btn_link; ?>" class="mwm-btn"><?php echo $btn_text; ?></a>
						</div>
					<?php endif; ?>

					<?php if ($description_2) : ?>
						<div class="mwm-media-text-1__desc-2">
							<?php echo $description_2; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="mwm-media-text-1__media">
					<?php if ($video_url) : ?>
						<video src="<?php echo $video_url; ?>" autoplay muted loop></video>
					<?php elseif ($image) : ?>
						<?php echo wp_get_attachment_image($image, 'full'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section> 