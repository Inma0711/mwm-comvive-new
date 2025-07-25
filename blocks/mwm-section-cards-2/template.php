<?php
/**
 * Block Name: MWM Section Cards 2
 */

$title = get_field('title');
$cards = get_field('cards');
?>

<section class="mwm-section-cards-2">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-section-cards-2__container">
                <?php if ($title) : ?>
                    <h2 class="mwm-section-cards-2__title">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
        
                <?php if ($cards) : ?>
                    <div class="mwm-section-cards-2__list">
                        <?php foreach ($cards as $card) : ?>
                            <div class="mwm-card-2">
                                <?php if ($card['icon']) : ?>
                                    <div class="mwm-card-2__icon">
                                        <?php echo wp_get_attachment_image($card['icon'], 'full'); ?>
                                    </div>
                                <?php endif; ?>
        
                                <?php if ($card['title']) : ?>
                                    <h3 class="mwm-card-2__title">
                                        <?php echo $card['title']; ?>
                                    </h3>
                                <?php endif; ?>
        
        
                                <?php if ($card['description']) : ?>
                                    <div class="mwm-card-2__desc">
                                        <?php echo $card['description']; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($card['price'] || $card['btn_text']) : ?>
                                    <div class="mwm-card-2__footer">
                                        <?php if ($card['price']) : ?>
                                            <div class="mwm-card-2__price">
                                                <?php esc_html_e('Desde', 'comvive'); ?>
                                                <strong><?php echo $card['price']; ?></strong>
                                            </div>
                                        <?php endif; ?>
                
                                        <?php if ($card['btn_text']) : ?>
                                            <div class="mwm-card-2__btn">
                                                <a href="<?php echo esc_url($card['btn_link']); ?>" target="_blank" class="mwm-btn-link">
                                                    <?php echo $card['btn_text']; ?>
                                                    <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/icon-arrow-right.php'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
        
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> 