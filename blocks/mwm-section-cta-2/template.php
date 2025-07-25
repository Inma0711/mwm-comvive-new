<?php

$title = get_field('title');
$desc = get_field('desc');
$btn_text = get_field('btn_text');
$btn_link = get_field('btn_link');

?>

<section class="mwm-section-cta-2">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-section-cta-2__container">
				<h2 class="mwm-section-cta-2__title"><?php echo $title; ?></h2>
				<div class="mwm-section-cta-2__desc">
					<p><?php echo $desc; ?></p>
				</div>
				<div class="mwm-section-cta-2__btn">
					<a class="mwm-btn" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>
				</div>
			</div>
		</div>
	</div>
</section>