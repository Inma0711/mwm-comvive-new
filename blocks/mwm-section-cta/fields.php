<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_mwm_cta',
        'title' => 'MWM call to action',
        'fields' => array(
            array(
                'key' => 'field_mwm_cta_title',
                'label' => 'Título',
                'name' => 'title',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
            ),
            array(
                'key' => 'field_mwm_cta_desc',
                'label' => 'Descripción',
                'name' => 'desc',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
            ),
            array(
                'key' => 'field_mwm_cta_color_alt',
                'label' => 'Paleta de colores alternativa', 
                'name' => 'color_alt',
                'type' => 'true_false',
                'ui' => 1,
                'instructions' => 'Si se activa, se usara el color alternativo (gris, amarillo, etc.)',
                'required' => 0,
                'default_value' => 0,
            ),
            array(
                'key' => 'field_mwm_cta_btn_text',
                'label' => 'Texto botón',
                'name' => 'btn_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
            ),
            array(
                'key' => 'field_mwm_cta_btn_link',
                'label' => 'Enlace botón',
                'name' => 'btn_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/mwm-section-cta',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

endif; 