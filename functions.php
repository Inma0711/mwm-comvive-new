<?php

/*  INCLUDES
=============================================== */
require_once( get_template_directory() . '/theme_framework/mwm_framework.php' );
require_once( get_template_directory() . '/includes/functions.php' );
require_once( get_template_directory() . '/includes/blocks.php' );
require_once( get_template_directory() . '/includes/domain-functions.php' );
require_once( get_template_directory() . '/includes/cart-integration.php' );


/*  THEME SUPPORTS
=============================================== */

$supports = array(
	'align-wide',
	'custom-logo',
	'title-tag',
	'post_type_support' => array(
        'page' => 'excerpt',
    )
);

mwm_add_theme_support($supports);


/*  MENUS
=============================================== */

$menus = array (
	'SiteMenu' => 'Menú superior',
	'FooterMenu' => 'Menú footer',
	'FooterMenu2' => 'Menú footer 2',
);
mwm_add_menu($menus);

/*  STYLES AND SCRIPTS
=============================================== */

if ( ! function_exists( 'mwm_enqueue_scripts' ) ) {
	function mwm_enqueue_scripts() {
		$scripts = array(
			'mwm-scripts' => array(
				'path' => get_template_directory_uri() . '/assets/js/scripts.js',
				'deps' => array('jquery'),
				'ver' => '1.0.0',
				'in_footer' => true
			)
		);
		mwm_add_scripts($scripts);
		
		$styles = array(
			'mwm-normalize' => array(
				'path' => get_template_directory_uri() . '/assets/css/normalize.css',
				'deps' => array(),
				'ver' => '2.3.4',
				'media' => 'all'
			),
			'mwm-fonts' => array(
				'path' => get_template_directory_uri() . '/assets/fonts/fonts.css',
				'deps' => array(),
				'ver' => '1.0.0',
				'media' => 'all'
			),
			'mwm-styles' => array(
				'path' => get_template_directory_uri() . '/style.css',
				'deps' => array('mwm-normalize', 'mwm-fonts'),
				'ver' => '1.0.0',
				'media' => 'all'
			)
		);
		mwm_add_styles($styles);
	}
	add_action( 'wp_enqueue_scripts', 'mwm_enqueue_scripts' );
}

//Bloque reutilizable
function mwm_get_reusable_block( $block_id = '' ) { 
    if ( empty( $block_id ) || (int) $block_id !== $block_id ) {
        return;
    }
    $content = get_post_field( 'post_content', $block_id );
    return apply_filters( 'the_content', $content );
}

/**
 * Registrar Custom Post Type 'Ayuda'
 */
function mwm_register_ayuda_cpt() {
    $labels = array(
        'name'                  => _x('Ayuda', 'Post type general name', 'comvive'),
        'singular_name'         => _x('Ayuda', 'Post type singular name', 'comvive'),
        'menu_name'             => _x('Ayuda', 'Admin Menu text', 'comvive'),
        'name_admin_bar'        => _x('Ayuda', 'Add New on Toolbar', 'comvive'),
        'add_new'               => __('Añadir nuevo', 'comvive'),
        'add_new_item'          => __('Añadir nuevo artículo de ayuda', 'comvive'),
        'new_item'              => __('Nuevo artículo', 'comvive'),
        'edit_item'             => __('Editar artículo', 'comvive'),
        'view_item'             => __('Ver artículo', 'comvive'),
        'all_items'             => __('Todos los artículos de ayuda', 'comvive'),
        'search_items'          => __('Buscar artículos de ayuda', 'comvive'),
        'not_found'             => __('No se encontraron artículos de ayuda.', 'comvive'),
        'not_found_in_trash'    => __('No se encontraron artículos de ayuda en la papelera.', 'comvive'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'ayuda'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'          => 'dashicons-sos',
        'show_in_rest'       => true,
    );

    register_post_type('ayuda', $args);
}
add_action('init', 'mwm_register_ayuda_cpt');

/**
 * Registrar Taxonomía para Ayuda
 */
function mwm_register_ayuda_taxonomy() {
    $labels = array(
        'name'              => _x('Categorías de Ayuda', 'taxonomy general name', 'comvive'),
        'singular_name'     => _x('Categoría de Ayuda', 'taxonomy singular name', 'comvive'),
        'search_items'      => __('Buscar Categorías de Ayuda', 'comvive'),
        'all_items'         => __('Todas las Categorías de Ayuda', 'comvive'),
        'parent_item'       => __('Categoría Padre de Ayuda', 'comvive'),
        'parent_item_colon' => __('Categoría Padre de Ayuda:', 'comvive'),
        'edit_item'         => __('Editar Categoría de Ayuda', 'comvive'),
        'update_item'       => __('Actualizar Categoría de Ayuda', 'comvive'),
        'add_new_item'      => __('Añadir Nueva Categoría de Ayuda', 'comvive'),
        'new_item_name'     => __('Nueva Categoría de Ayuda', 'comvive'),
        'menu_name'         => __('Categorías', 'comvive'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-ayuda'),
        'show_in_rest'      => true,
        'rest_base'         => 'categoria-ayuda',
    );

    register_taxonomy('categoria-ayuda', array('ayuda'), $args);
}
add_action('init', 'mwm_register_ayuda_taxonomy');

/**
 * Modificar la búsqueda para que se mantenga dentro del post type 'ayuda'
 */
function mwm_modify_search_query($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        if (isset($_GET['post_type']) && $_GET['post_type'] === 'ayuda') {
            $query->set('post_type', 'ayuda');
        }
    }
    return $query;
}
add_filter('pre_get_posts', 'mwm_modify_search_query');

/**
 * Forzar el uso de search-ayuda.php para búsquedas en el post type 'ayuda'
 */
function mwm_template_include($template) {
    if (is_search() && isset($_GET['post_type']) && $_GET['post_type'] === 'ayuda') {
        $new_template = locate_template('search-ayuda.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'mwm_template_include');

/**
 * Añadir variables AJAX para el carrito
 */
function mwm_add_ajax_vars() {
    wp_localize_script('mwm-scripts', 'mwm_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'add_to_cart_nonce' => wp_create_nonce('add_to_cart_real_nonce'),
        'get_cart_count_nonce' => wp_create_nonce('get_cart_count_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'mwm_add_ajax_vars');