<?php
/**
 * Block Name: MWM Contact
 */

$title = get_field('title');
$description = get_field('description');
$shortcode = get_field('shortcode');
$phone_info = get_field('phone_info');
$email_info = get_field('contact_info');
$map_info = get_field('map_info');
?>

<section class="mwm-contact">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-contact__wrapper-1">
				<?php if ($title || $description) : ?>
					<div class="mwm-contact__header">
						<?php if ($title) : ?>
							<h2 class="mwm-contact__title is-style-h100">
								<?php echo $title; ?>
							</h2>
						<?php endif; ?>
		
						<?php if ($description) : ?>
							<div class="mwm-contact__desc is-style-h400">
								<?php echo $description; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($shortcode) : ?>
					<div class="mwm-contact__form">
						<?php echo do_shortcode($shortcode); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="mwm-contact__wrapper-2">
				<?php if ($phone_info) : ?>
					<div class="mwm-contact__info">
						<?php if ($phone_info['icon']) : ?>
							<div class="mwm-contact__info-icon">
								<?php echo wp_get_attachment_image($phone_info['icon'], 'full'); ?>
							</div>
						<?php endif; ?>

						<?php if ($phone_info['title'] || $phone_info['phone']) : ?>
							<div class="mwm-contact__info-text">
								<?php if ($phone_info['title']) : ?>
									<div class="mwm-contact__info-title">
										<?php echo $phone_info['title']; ?>
									</div>
								<?php endif; ?>
			
								<?php if ($phone_info['phone']) : ?>
									<div class="mwm-contact__info-desc">
										<?php echo $phone_info['phone']; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
	
					</div>
				<?php endif; ?>
	
				<?php if ($email_info) : ?>
					<div class="mwm-contact__info">
						<?php if ($email_info['icon']) : ?>
							<div class="mwm-contact__info-icon">
								<?php echo wp_get_attachment_image($email_info['icon'], 'full'); ?>
							</div>
						<?php endif; ?>	
	
						<?php if ($email_info['title'] || $email_info['email']) : ?>
							<div class="mwm-contact__info-text">
								<?php if ($email_info['title']) : ?>
									<div class="mwm-contact__info-title">
										<?php echo $email_info['title']; ?>
									</div>
								<?php endif; ?>
			
								<?php if ($email_info['email']) : ?>
									<div class="mwm-contact__info-desc">
										<?php echo $email_info['email']; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
	
				<?php if ($map_info) : ?>
					<div class="mwm-contact__map">
						<?php if ($map_info['map_image']) : ?>
							<div class="mwm-contact__map-image">
								<?php if ($map_info['map_link']) : ?>
									<a href="<?php echo esc_url($map_info['map_link']); ?>" target="_blank" rel="noopener noreferrer">
								<?php endif; ?>
									<?php echo wp_get_attachment_image($map_info['map_image'], 'full'); ?>
								<?php if ($map_info['map_link']) : ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section> 