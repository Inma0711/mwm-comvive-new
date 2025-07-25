<?php
/**
 * Envolver todos los bloques de Gutenberg en divs mwm-max y mwm-wrapper
 */
function mwm_wrap_blocks($block_content, $block) {
    // Solo aplicar a bloques de Gutenberg (los que empiezan con 'core/')
    if (strpos($block['blockName'], 'core/') === 0) {
        // Verificar si el bloque ya está envuelto
        if (strpos($block_content, 'class="mwm-max"') === false) {
            // Verificar si es un bloque de nivel superior
            if (!isset($block['parentBlock']) && !in_array($block['blockName'], [
                'core/paragraph',
                'core/heading',
                'core/image',
                'core/list',
                'core/quote',
                'core/table',
                'core/button',
                'core/column'
            ])) {
                $block_content = '<div class="mwm-max"><div class="mwm-wrapper is-wp-block">' . $block_content . '</div></div>';
            }
        }
    }
    return $block_content;
}
add_filter('render_block', 'mwm_wrap_blocks', 10, 2); 