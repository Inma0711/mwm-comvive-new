<?php
/**
 * Block Name: MWM Reviews
 */

$title = get_field('title');
$reviews = get_field('reviews');
?>

<section class="mwm-reviews">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-reviews__container">
                <?php if ($title) : ?>
                    <h2 class="mwm-reviews__title">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
        
                <?php if ($reviews) : ?>
                    <div class="mwm-reviews__list">
                        <?php foreach ($reviews as $review) : ?>
                            <div class="mwm-reviews__review">
                                <?php if ($review['text']) : ?>
                                    <div class="mwm-reviews__review-text">
                                        <?php echo $review['text']; ?>
                                    </div>
                                <?php endif; ?>
        
        
                                <div class="mwm-reviews__review-info">
                                    <?php if ($review['company_image']) : ?>
                                        <div class="mwm-reviews__review-company">
                                            <?php echo wp_get_attachment_image($review['company_image'], 'full'); ?>
                                        </div>
                                    <?php endif; ?>
        
                                    <?php if ($review['name']) : ?>
                                        <div class="mwm-reviews__review-name">
                                            <?php echo $review['name']; ?>
                                        </div>
                                    <?php endif; ?>
        
                                    <?php if ($review['description']) : ?>
                                        <div class="mwm-reviews__review-desc">
                                            <?php echo $review['description']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> 