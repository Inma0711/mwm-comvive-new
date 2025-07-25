
	<footer class="mwm-footer">
		<div class="mwm-footer__border">
			<div class="mwm-max">
				<div class="mwm-wrapper">
					<div class="mwm-footer__top">
		
						<div class="mwm-footer__top-wrapper">
		
							<div class="mwm-footer__logo">
								<?php mwm_echo_mod_img('mwm_cus_section_footer_img'); ?>
							</div>
		
							<p class="mwm-footer__top-text">
								<?php mwm_echo_mod('mwm_cus_section_footer_address'); ?>
							</p>
							
							<div class="mwm-footer__top-text">
								<a href="mailto:<?php mwm_echo_mod('mwm_cus_section_footer_email'); ?>">
									<?php mwm_echo_mod('mwm_cus_section_footer_email'); ?>
								</a>
							</div>
		
							<div class="mwm-footer__top-text">
								<a href="tel:<?php mwm_echo_mod('mwm_cus_section_footer_phone'); ?>">
									<?php mwm_echo_mod('mwm_cus_section_footer_phone'); ?>
								</a>
							</div>
		
							<ul class="mwm-footer__socials">
								<li>
									<a target="_blank" href="<?php mwm_echo_mod('mwm_cus_section_footer_linkedin'); ?>">
										<?php get_template_part('assets/images/icons/icon-linkedin'); ?>
									</a>
								</li>
								<li>
									<a target="_blank" href="<?php mwm_echo_mod('mwm_cus_section_footer_instagram'); ?>">
										<?php get_template_part('assets/images/icons/icon-instagram'); ?>
									</a>
								</li>
							</ul>
		
						</div>
		
						<div class="mwm-footer__menu">
							<div class="mwm-footer__menu-title">
								<?php mwm_echo_mod('mwm_cus_section_footer_menu_title'); ?>
							</div>
							<?php
								wp_nav_menu( array( 
									'theme_location' => 'FooterMenu',
									'container'       => false,
								));
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="mwm-max">
			<div class="mwm-wrapper">
				<div class="mwm-footer__bottom">
					
					<div class="mwm-footer__legal">
						<ul class="menu">
							<?php
								wp_nav_menu( array( 
									'theme_location' => 'FooterMenu2',
									'container'       => false,
									'items_wrap' => '%3$s'
								));
							?>
							<li class="mwm-footer__copy"><?php echo esc_html('&copy; '); ?> <?php mwm_echo_mod('mwm_cus_section_footer_copy'); ?></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>

</html>