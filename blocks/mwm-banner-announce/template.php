<?php
/**
 * Block Name: MWM Banner Announce
 */

$bg_color = get_field('bg_color');
$text_color = get_field('text_color');
$text = get_field('text');

?>

<section class="mwm-banner-announce" style="background-color: <?php echo $bg_color; ?>; color: <?php echo $text_color; ?>">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-banner-announce__container">
                <div class="mwm-banner-announce__text">
                    <?php echo $text; ?>
                </div>
            </div>
        </div>
    </div>
</section> 