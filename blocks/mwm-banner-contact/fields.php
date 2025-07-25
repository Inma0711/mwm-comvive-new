<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_banner_contact',
    'title' => 'MWM Banner Contact',
    'fields' => array(
        array(
            'key' => 'field_mwm_banner_contact_title',
            'label' => 'Título',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array(
            'key' => 'field_mwm_banner_contact_description',
            'label' => 'Descripción',
            'name' => 'description',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_banner_contact_form_shortcode',
            'label' => 'Shortcode del formulario',
            'name' => 'form_shortcode',
            'type' => 'text',
            'instructions' => 'Ingrese el shortcode del formulario de contacto',
            'required' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-banner-contact',
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