<?php
/**
 * Block Name: MWM Steps
 */

$title = get_field('title');
$description = get_field('description');
$steps = get_field('steps');
?>

<section class="mwm-steps">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-steps__container">
                <div class="mwm-steps__box">
                    <?php if ($title || $description) : ?>
                        <div class="mwm-steps__header">
                            <?php if ($title) : ?>
                                <h2 class="mwm-steps__title">
                                    <?php echo $title; ?>
                                </h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="mwm-steps__desc">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
    
                    <ul class="mwm-steps__list">
                        <?php foreach ($steps as $index => $step) : ?>
                            <li class="mwm-steps__item">
                                <span class="mwm-steps__item-number is-style-h300">0<?php echo $index + 1; ?>.</span>
                                <div class="mwm-steps__item-text">
                                    <?php echo $step['content']; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section> 