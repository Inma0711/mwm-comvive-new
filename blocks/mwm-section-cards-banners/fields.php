<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_section_cards_banners',
    'title' => 'MWM Section Cards Banners',
    'fields' => array(
        array(
            'key' => 'field_mwm_section_cards_banners_banner_1',
            'label' => 'Banner 1',
            'name' => 'banner_1',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_1_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_1_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_1_btn_text',
                    'label' => 'Texto del botón',
                    'name' => 'btn_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_1_btn_link',
                    'label' => 'Enlace del botón',
                    'name' => 'btn_link',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_1_image',
                    'label' => 'Imagen',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'ID',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
            ),
        ),
        array(
            'key' => 'field_mwm_section_cards_banners_banner_2',
            'label' => 'Banner 2',
            'name' => 'banner_2',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_2_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_2_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_2_btn_text',
                    'label' => 'Texto del botón',
                    'name' => 'btn_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_2_btn_link',
                    'label' => 'Enlace del botón',
                    'name' => 'btn_link',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_2_image_mobile',
                    'label' => 'Imagen (móvil)',
                    'name' => 'image_mobile',
                    'type' => 'image',
                    'return_format' => 'ID',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_2_image_desktop',
                    'label' => 'Imagen (escritorio)',
                    'name' => 'image_desktop',
                    'type' => 'image',
                    'return_format' => 'ID',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
            ),
        ),
        array(
            'key' => 'field_mwm_section_cards_banners_banner_3',
            'label' => 'Banner 3',
            'name' => 'banner_3',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_3_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_3_btn_link',
                    'label' => 'Enlace del botón',
                    'name' => 'btn_link',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_mwm_section_cards_banners_banner_3_image',
                    'label' => 'Imagen',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'ID',
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
                'value' => 'acf/mwm-section-cards-banners',
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