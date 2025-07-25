<?php
/**
 * Block Name: MWM Section Cards 4
 */

$title = get_field('title');
$description = get_field('description');
$cards = get_field('cards');
?>

<section class="mwm-section-cards-4">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-section-cards-4__container">
                <?php if ($title || $description) : ?>
                    <div class="mwm-section-cards-4__header">
                        <?php if ($title) : ?>
                            <h2 class="mwm-section-cards-4__title">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p class="mwm-section-cards-4__desc">
                                <?php echo $description; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="mwm-section-cards-4__list">
                    <?php foreach ($cards as $card) : ?>
                        <div class="mwm-card-1" style="background-color: <?php echo $card['bg_color']; ?>; color: <?php echo $card['text_color']; ?>">
                            <h3 class="mwm-card-1__title">
                                <?php echo $card['title']; ?>
                            </h3> 
                            <div class="mwm-card-1__desc">
                                <?php echo $card['description']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section> 