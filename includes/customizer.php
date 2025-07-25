<?php

if ( ! function_exists( 'comvive_customize_register' ) ) {
	/**
	 * Registro de nuevos elementos en el customizer del tema
	 */
	function comvive_customize_register( $wp_customize ) {
		$wp_customize->add_panel( 'mwm_panel', array(
			'title' => __( 'Configuraciones del tema', 'comvive' ),
			'description' => __( 'Configuración de diferentes elementos de la web', 'comvive' ),
			'priority' => 0,
			'capability' => 'edit_theme_options',
		));
        mwm_cus_section_archive( $wp_customize, 'mwm_panel', 'archive' );
        mwm_cus_section_404( $wp_customize, 'mwm_panel', '404' );
        mwm_cus_section_footer( $wp_customize, 'mwm_panel', 'footer' );
	}
	add_action( 'customize_register', 'comvive_customize_register' );
}

function mwm_cus_section_archive($wp_customize, $panel, $section){
    $wp_customize->add_section( $section , array(
        'title' 		=> __( 'Archive noticias', 'comvive' ),
        'panel' 		=> $panel,
        'priority' => 3,
        'capability'	=> 'edit_theme_options',
    ));

    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_archive_title',
        'label' 	=> __( 'Título de la página', 'comvive' ),
        'type' 		=> 'textarea',
    ));

    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_archive_desc',
        'label' 	=> __( 'Descripción de la página', 'comvive' ),
        'type' 		=> 'textarea',
    ));
}

function mwm_cus_section_404($wp_customize, $panel, $section){
    $wp_customize->add_section( $section , array(
        'title' 		=> __( 'Página 404', 'comvive' ),
        'panel' 		=> $panel,
        'priority' => 3,
        'capability'	=> 'edit_theme_options',
    ));

    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_404_title',
        'label' 	=> __( 'Título de la página', 'comvive' ),
        'type' 		=> 'text',
    ));

    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_404_desc',
        'label' 	=> __( 'Descripción de la página', 'comvive' ),
        'type' 		=> 'textarea',
    ));

    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_404_btn_text',
        'label' 	=> __( 'Texto del botón', 'comvive' ),
        'type' 		=> 'text',
    ));

    mwm_cus_image( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_404_img',
        'label' 	=> __( 'Imagen de la página', 'comvive' ),
    ));
}

function mwm_cus_section_footer($wp_customize, $panel, $section){
    $wp_customize->add_section( $section , array(
        'title' 		=> __( 'Footer', 'comvive' ),
        'panel' 		=> $panel,
        'priority' => 3,
        'capability'	=> 'edit_theme_options',
    ));

    mwm_cus_image( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_img',
        'label' 	=> __( 'Imagen de logo', 'comvive' ),
    ));

    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_address',
        'label' 	=> __( 'Dirección', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_email',
        'label' 	=> __( 'Email', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_phone',
        'label' 	=> __( 'Teléfono', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_linkedin',
        'label' 	=> __( 'Linkedin', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_instagram',
        'label' 	=> __( 'Instagram', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_menu_title',
        'label' 	=> __( 'Título del menú', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    mwm_cus_input( $wp_customize, array(
        'section' 	=> $section,
        'settings'	=> 'mwm_cus_section_footer_copy',
        'label' 	=> __( 'Texto de copyright', 'comvive' ),
        'type' 		=> 'text',
    ));
    
    
}
