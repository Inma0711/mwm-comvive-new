<?php
/**
 * Block Name: MWM Media Text 3
 */

$rows = get_field('rows');
?>

<section class="mwm-media-text-3">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-media-text-3__container">
				<?php if ($rows) : ?>
					<?php foreach ($rows as $row) : ?>
						<div class="mwm-media-text-3__row <?php echo $row['is_reverse'] ? 'is-reverse' : ''; ?>">
							<div class="mwm-media-text-3__row-text">
								<h2 class="mwm-media-text-3__row-title">
									<?php echo $row['title']; ?>
								</h2>
								<div class="mwm-media-text-3__row-desc">
									<?php echo $row['description']; ?>
								</div>
							</div>
							<div class="mwm-media-text-3__row-media">
								<?php if ($row['video_url']) : ?>
									<video src="<?php echo $row['video_url']; ?>" autoplay muted loop></video>
								<?php else: ?>
									<?php echo wp_get_attachment_image($row['image'], 'full'); ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section> 