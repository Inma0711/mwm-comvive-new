<?php
/**
 * Block Name: MWM Banner Contact
 */

$title = get_field('title');
$description = get_field('description');
$form_shortcode = get_field('form_shortcode');

?>

<section class="mwm-banner-contact">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-banner-contact__container">
                <div class="mwm-banner-contact__box">
                    <div class="mwm-banner-contact__content">
                        <?php if ($title || $description) : ?>
                            <div class="mwm-banner-contact__header">
                                <?php if ($title) : ?>
                                    <h2 class="mwm-banner-contact__title">
                                        <?php echo $title; ?>
                                    </h2>
                                <?php endif; ?>
            
                                <?php if ($description) : ?>
                                    <div class="mwm-banner-contact__desc">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
            
                    <?php if ($form_shortcode) : ?>
                        <div class="mwm-banner-contact__form">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section> 