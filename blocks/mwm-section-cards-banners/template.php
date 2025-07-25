<?php
/**
 * Block Name: MWM Section cards banners
 */


// Load values and assign defaults.
$banner_1 = get_field('banner_1');
$banner_2 = get_field('banner_2');
$banner_3 = get_field('banner_3');

?>

<section class="mwm-section-cards-banners">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-section-cards-banners__container">
                <?php if ($banner_1) : ?>
                    <div class="mwm-section-cards-banners__banner-1">
                        <div class="mwm-section-cards-banners__banner-1-media">
                            <?php echo wp_get_attachment_image($banner_1['image'], 'full'); ?>
                        </div>
                        <div class="mwm-section-cards-banners__banner-1-text">
                            <h2 class="mwm-section-cards-banners__banner-1-title">
                                <?php echo $banner_1['title']; ?>
                            </h2>
                            <div class="mwm-section-cards-banners__banner-1-desc">
                                <?php echo $banner_1['description']; ?>
                            </div>
                            <div class="mwm-section-cards-banners__banner-1-btn">
                                <a href="<?php echo $banner_1['btn_link']; ?>" class="mwm-btn">
                                    <?php echo $banner_1['btn_text']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($banner_2) : ?>
                    <div class="mwm-section-cards-banners__banner-2">
                        <div class="mwm-section-cards-banners__banner-2-text">
                            <h3 class="mwm-section-cards-banners__banner-2-title is-style-h400">
                                <?php echo $banner_2['title']; ?>
                            </h3>
                            <div class="mwm-section-cards-banners__banner-2-desc">
                                <?php echo $banner_2['description']; ?>
                            </div>
                            <div class="mwm-section-cards-banners__banner-2-btn">
                                <a href="<?php echo $banner_2['btn_link']; ?>" class="mwm-btn">
                                    <?php echo $banner_2['btn_text']; ?>    
                                </a>
                            </div>
                        </div>
                        <div class="mwm-section-cards-banners__banner-2-image">
                            <?php if ($banner_2['image_mobile']) : ?>
                                <div class="mwm-section-cards-banners__banner-2-image-mobile">
                                    <?php echo wp_get_attachment_image($banner_2['image_mobile'], 'full'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($banner_2['image_desktop']) : ?>
                                <div class="mwm-section-cards-banners__banner-2-image-desktop">
                                    <?php echo wp_get_attachment_image($banner_2['image_desktop'], 'full'); ?>
                                </div>
                            <?php endif; ?>
                        </div>  
                    </div>
                <?php endif; ?>
                <?php if ($banner_3) : ?>
                    <div class="mwm-section-cards-banners__banner-3">
                        <div class="mwm-section-cards-banners__banner-3-text">
                            <h3 class="mwm-section-cards-banners__banner-3-title is-style-h400">
                                <?php echo $banner_3['title']; ?>
                            </h3>
                            <div class="mwm-section-cards-banners__banner-3-btn">
                                <a href="<?php echo $banner_3['btn_link']; ?>">
                                    <?php get_template_part('assets/images/icons/icon-arrow-up-right'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="mwm-section-cards-banners__banner-3-figure">
                            <?php if ($banner_3['image']) : ?>
                                <?php echo wp_get_attachment_image($banner_3['image'], 'full'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>