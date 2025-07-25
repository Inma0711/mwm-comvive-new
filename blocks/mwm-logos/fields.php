<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_logos',
    'title' => 'MWM Logos',
    'fields' => array(
        array(
            'key' => 'field_mwm_logos_title',
            'label' => 'Título',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_logos_logos',
            'label' => 'Logos',
            'name' => 'logos',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'min' => 0,
            'max' => 0,
            'layout' => 'block',
            'button_label' => 'Añadir logo',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_logos_logo_image',
                    'label' => 'Logo',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-logos',
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