<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_section_cards_2',
    'title' => 'MWM Section Cards 2',
    'fields' => array(
        array(
            'key' => 'field_mwm_section_cards_2_title',
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
            'key' => 'field_mwm_section_cards_2_cards',
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
                    'key' => 'field_mwm_section_cards_2_card_icon',
                    'label' => 'Icono',
                    'name' => 'icon',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_mwm_section_cards_2_card_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_mwm_section_cards_2_card_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_mwm_section_cards_2_card_price',
                    'label' => 'Precio',
                    'name' => 'price',
                    'type' => 'text',
                    'instructions' => '',
                ),
                array(
                    'key' => 'field_mwm_section_cards_2_card_btn_text',
                    'label' => 'Texto del botón',
                    'name' => 'btn_text',
                    'type' => 'text',
                    'instructions' => '',
                ),
                array(
                    'key' => 'field_mwm_section_cards_2_card_btn_link',
                    'label' => 'Enlace del botón',
                    'name' => 'btn_link',
                    'type' => 'text',
                    'instructions' => '',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-section-cards-2',
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