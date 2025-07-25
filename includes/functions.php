<?php

/**
 * Requires
 */
require_once( get_template_directory() . '/includes/customizer.php' );

add_action( 'init', 'mwm_register_blocks' );

function mwm_register_blocks() {
    $blocks_directory = get_template_directory() . '/blocks';
    $blocks = scandir($blocks_directory);

    foreach ($blocks as $block) {
        if ($block !== '.' && $block !== '..') {
            $block_path = $blocks_directory . '/' . $block;
            if (is_dir($block_path)) {
                register_block_type($block_path, array(
                    'supports' => array(
                        'anchor' => true,
                    ),
                ));

                // Incluir el archivo de campos si existe
                $fields_file = $block_path . '/fields.php';
                if (file_exists($fields_file)) {
                    require_once $fields_file;
                }
            }
        }
    }
}
