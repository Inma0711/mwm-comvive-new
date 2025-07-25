<?php

$title = get_field('title');
$desc = get_field('desc');
$btn_text = get_field('btn_text');
$btn_link = get_field('btn_link');
$color_alt = get_field('color_alt');

?>

<section class="mwm-section-cta <?php if ($color_alt) { echo 'is-color-alt'; } ?>">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-section-cta__wrapper">
				<div class="mwm-section-cta__box">
					<h2 class="mwm-section-cta__title"><?php echo $title; ?></h2>
					<div class="mwm-section-cta__desc">
						<p><?php echo $desc; ?></p>
					</div>
					<div class="mwm-section-cta__btn">
						<a class="mwm-btn <?php if ($color_alt) { echo 'is-yellow'; } else { echo 'is-white'; } ?>" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>