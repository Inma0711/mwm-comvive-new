<?php
/**
 * Block Name: MWM Media Text 2
 */

$title = get_field('title');
$description = get_field('description');
$description_2 = get_field('description_2');
$btn_text = get_field('btn_text');
$btn_link = get_field('btn_link');
$video_url = get_field('video_url');
$video_url_2 = get_field('video_url_2');
$image = get_field('image');
$image_2 = get_field('image_2');
?>

<section class="mwm-media-text-2">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-media-text-2__wrapper">
				<div class="mwm-media-text-2__text">
					<?php if ($title) : ?>
						<h2 class="mwm-media-text-2__title is-style-h100">
							<?php echo $title; ?>
						</h2>
					<?php endif; ?>

					<?php if ($description) : ?>	
						<div class="mwm-media-text-2__desc is-style-h400">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>

					<?php if ($btn_text) : ?>
						<div class="mwm-media-text-2__btn">
							<a href="<?php echo $btn_link; ?>" class="mwm-btn"><?php echo $btn_text; ?></a>
						</div>
					<?php endif; ?>

					<?php if ($description_2) : ?>
						<div class="mwm-media-text-2__desc-2">
							<?php echo $description_2; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="mwm-media-text-2__media">
					<?php if ($video_url) : ?>
						<video src="<?php echo $video_url; ?>" autoplay muted loop></video>
					<?php elseif ($image) : ?>
						<?php echo wp_get_attachment_image($image, 'full'); ?>
					<?php endif; ?>
					<?php if ($video_url_2) : ?>
						<video src="<?php echo $video_url_2; ?>" autoplay muted loop></video>
					<?php elseif ($image_2) : ?>
						<?php echo wp_get_attachment_image($image_2, 'full'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section> 