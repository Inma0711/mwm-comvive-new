<?php
/**
 * Block Name: MWM Text Logos
 */

$title = get_field('title');
$description = get_field('description');
$btn_text = get_field('btn_text');
$btn_link = get_field('btn_link');
$logos = get_field('logos');
?>

<section class="mwm-text-logos">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-text-logos__container">
                <?php if ($title || $description) : ?>
                    <div class="mwm-text-logos__text">
                        <?php if ($title) : ?>
                            <h2 class="mwm-text-logos__title">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
        
                        <?php if ($description) : ?>
                            <p class="mwm-text-logos__desc">
                                <?php echo $description; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($btn_text) : ?>
                            <div class="mwm-text-logos__btn-desk">
                                <a href="<?php echo esc_url($btn_link); ?>" 
                                target="_blank"
                                class="mwm-btn is-white"><?php echo $btn_text; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
        
                <?php if ($logos) : ?>
                    <div class="mwm-text-logos__logos">
                        <?php foreach ($logos as $logo) : ?>
                            <div class="mwm-text-logos__logo">
                                <?php if ($logo['link']) : ?>
                                    <a href="<?php echo esc_url($logo['link']); ?>" 
                                    target="_blank"
                                    class="mwm-text-logos__logo-link">
                                <?php endif; ?>
        
                                <?php if ($logo['image']) : ?>
                                    <div class="mwm-text-logos__logo-image">
                                        <?php echo wp_get_attachment_image($logo['image'], 'full'); ?>
                                    </div>
                                <?php endif; ?>
        
                                <?php if ($logo['link']) : ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <div class="mwm-text-logos__btn-mob">
                            <a href="<?php echo esc_url($btn_link); ?>" 
                            target="_blank"
                            class="mwm-btn is-white"><?php echo $btn_text; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> 