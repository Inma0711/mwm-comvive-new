<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_mwm_cta_2',
        'title' => 'MWM call to action 2',
        'fields' => array(
            array(
                'key' => 'field_mwm_cta_2_title',
                'label' => 'Título',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
            ),
            array(
                'key' => 'field_mwm_cta_2_desc',
                'label' => 'Descripción',
                'name' => 'desc',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array(
                'key' => 'field_mwm_cta_2_btn_text',
                'label' => 'Texto botón',
                'name' => 'btn_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'default_value' => '',
            ),
            array(
                'key' => 'field_mwm_cta_2_btn_link',
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
                    'value' => 'acf/mwm-section-cta-2',
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