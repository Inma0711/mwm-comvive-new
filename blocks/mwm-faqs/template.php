<?php
/**
 * Block Name: MWM FAQs
 */

$title = get_field('title');
$rows = get_field('rows');
?>

<section class="mwm-faqs">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-faqs__container">
				<?php if ($title) : ?>
					<h2 class="mwm-faqs__title"><?php echo $title; ?></h2>
				<?php endif; ?>
				<?php if ($rows) : ?>
					<?php foreach ($rows as $index => $row) : ?>
						<div class="mwm-faqs__row">
							<div class="mwm-faqs__row-header">
								<span class="mwm-faqs__row-number is-style-h300">0<?php echo $index + 1; ?></span>
								<h3 class="mwm-faqs__row-title is-style-h400"><?php echo $row['title']; ?></h3>
								<div class="mwm-faqs__row-icon">
									<?php get_template_part('assets/images/icons/icon-arrow-down'); ?>
								</div>
							</div>
							<div class="mwm-faqs__row-content">
								<?php echo $row['description']; ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section> 