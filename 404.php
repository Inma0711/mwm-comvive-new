<?php get_header(); ?>

<main class="mwm-main-container">

    <section class="mwm-404">
        <div class="mwm-max">
            <div class="mwm-404__wrapper">
                <h1 class="mwm-404__title"><?php mwm_echo_mod('mwm_404_title'); ?></h1>
                <p class="mwm-404__desc"><?php mwm_echo_mod('mwm_404_desc'); ?></p>
                <a class="mwm-btn mwm-404__btn"href="<?php echo home_url(); ?>"><?php mwm_echo_mod('mwm_404_btn_text'); ?></a>
                <div class="mwm-404__media">
                    <?php mwm_echo_mod_img('mwm_404_img'); ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
