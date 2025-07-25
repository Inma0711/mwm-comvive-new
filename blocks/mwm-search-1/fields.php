<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_search_1',
    'title' => 'MWM Búsqueda de dominios',
    'fields' => array(
        array(
            'key' => 'field_mwm_search_1_title',
            'label' => 'Título',
            'name' => 'title',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array(
            'key' => 'field_mwm_search_1_description_1',
            'label' => 'Descripción 1',
            'name' => 'description_1',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'rows' => 4,
        ),
        array(
            'key' => 'field_mwm_search_1_description_2',
            'label' => 'Descripción 2',
            'name' => 'description_2',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-search-1',
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