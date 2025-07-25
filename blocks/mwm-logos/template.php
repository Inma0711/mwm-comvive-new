<?php
/**
 * Block Name: MWM Logos
 */

$title = get_field('title');
$logos = get_field('logos');

?>

<section class="mwm-logos">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-logos__container">
                <?php if ($title) : ?>
                    <h2 class="mwm-logos__title">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($logos) : ?>
                    <div class="mwm-logos__logos">
                        <?php foreach ($logos as $logo) : ?>
                            <div class="mwm-logos__logo">
                                <?php if ($logo['image']) : ?>
                                    <?php echo wp_get_attachment_image($logo['image'], 'full'); ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> 