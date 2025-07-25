<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name=viewport content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

</head>
<body <?php body_class( ); ?>>

	<?php wp_body_open(); ?>

	<header class="mwm-header" id="mwm-header">
		<div class="mwm-max">
			<div class="mwm-header__wrapper mwm-wrapper">
				
				<a class="mwm-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
					<?php echo wp_get_attachment_image(get_theme_mod( 'custom_logo', '' ) , 'full' ); ?>
				</a>

				<div class="mwm-header__toggle">
					<?php get_template_part( 'assets/images/icons/icon-bars' ); ?>
				</div>

				<div class="mwm-header__menu-container">
					<div class="mwm-header__menu-header">
						<div class="mwm-header__logo">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<?php echo wp_get_attachment_image(get_theme_mod( 'custom_logo', '' ) , 'full' ); ?>
							</a>
						</div>
						<div class="mwm-header__toggle close">
							<?php get_template_part( 'assets/images/icons/icon-close' ) ?>
						</div>
					</div>
					<nav class="mwm-header__menu">
						<?php
							wp_nav_menu( array( 
								'theme_location' => 'SiteMenu',
								'container'       => false,
							));
						?>
						<a class="mwm-btn" href="#">
							<?php echo esc_html__('Área de clientes', 'comvive'); ?>
						</a>
					</nav>

				</div>

			</div>
		</div>

	</header>
