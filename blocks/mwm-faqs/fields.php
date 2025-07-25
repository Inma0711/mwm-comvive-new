<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_faqs',
    'title' => 'MWM FAQs',
    'fields' => array(
        array(
            'key' => 'field_mwm_faqs_title',
            'label' => 'Título',
            'name' => 'title',
            'type' => 'wysiwyg',
            'instructions' => '',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array(
            'key' => 'field_mwm_faqs_rows',
            'label' => 'Filas',
            'name' => 'rows',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Añadir fila',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_faqs_row_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'text',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_mwm_faqs_row_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-faqs',
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