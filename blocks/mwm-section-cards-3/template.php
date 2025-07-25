<?php
/**
 * Block Name: MWM Section Cards 3
 */

$title = get_field('title');
$cards = get_field('cards');
$footer_description = get_field('footer_description');
?>

<section class="mwm-section-cards-3">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-section-cards-3__container">
                <?php if ($title) : ?>
                    <h2 class="mwm-section-cards-3__title">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($cards) : ?>
                    <div class="mwm-section-cards-3__list">
                        <?php foreach ($cards as $card) : ?>
                            <div class="mwm-card-1" style="background-color: <?php echo $card['bg_color']; ?>; color: <?php echo $card['text_color']; ?>">
        
                                <?php if ($card['title']) : ?>
                                    <h3 class="mwm-card-1__title">
                                        <?php echo $card['title']; ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($card['price'] || $card['months']) : ?>
                                    <div class="mwm-card-1__price-container">
                                        <?php if ($card['price']) : ?>
                                            <div class="mwm-card-1__price">
                                                <?php echo $card['price']; ?>
                                            </div>
                                        <?php endif; ?>
        
                                        <?php if ($card['months']) : ?> 
                                            <div class="mwm-card-1__months">
                                                <?php echo $card['months']; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

        
                                <?php if ($card['description']) : ?>
                                    <div class="mwm-card-1__desc">
                                        <?php echo $card['description']; ?>
                                    </div>
                                <?php endif; ?>
        
                                <?php if ($card['btn_text']) : ?>
                                    <div class="mwm-card-1__btn" style="background-color: <?php echo $card['text_color']; ?>;">
                                        <a href="<?php echo esc_url($card['btn_link']); ?>" class="mwm-btn"><?php echo esc_html($card['btn_text']); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($footer_description) : ?>
                    <div class="mwm-section-cards-3__desc">
                        <?php echo $footer_description; ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section> 