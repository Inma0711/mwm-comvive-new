<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_section_cards_1',
    'title' => 'MWM Section Cards 1',
    'fields' => array(
        array(
            'key' => 'field_mwm_section_cards_1_title',
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
            'key' => 'field_mwm_section_cards_1_cards',
            'label' => 'Tarjetas',
            'name' => 'cards',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'min' => 0,
            'max' => 0,
            'layout' => 'block',
            'button_label' => 'Añadir tarjeta',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_section_cards_1_card_text_color',
                    'label' => 'Color de texto',
                    'name' => 'text_color',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'default_value' => '#3D82F3',
                ),
                array(
                    'key' => 'field_mwm_section_cards_1_card_bg_color',
                    'label' => 'Color de fondo',
                    'name' => 'bg_color',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'default_value' => '#DAEBFB',
                ),
                array(
                    'key' => 'field_mwm_section_cards_1_card_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_mwm_section_cards_1_card_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_mwm_section_cards_1_btn_text',
                    'label' => 'Texto del botón',
                    'name' => 'btn_text',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'default_value' => 'Quiero mi hosting',
                ),
                array(
                    'key' => 'field_mwm_section_cards_1_btn_link',
                    'label' => 'Enlace del botón',
                    'name' => 'btn_link',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'default_value' => '/',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-section-cards-1',
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