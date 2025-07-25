<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_banner_announce',
    'title' => 'MWM Banner Announce',
    'fields' => array(
        array(
            'key' => 'field_mwm_banner_announce_bg_color',
            'label' => 'Color de fondo',
            'name' => 'bg_color',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_banner_announce_text_color',
            'label' => 'Color de texto',
            'name' => 'text_color',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_banner_announce_text',
            'label' => 'Texto',
            'name' => 'text',
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
                'value' => 'acf/mwm-banner-announce',
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