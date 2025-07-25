<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_tabs_domains',
    'title' => 'MWM Tabs dominios',
    'fields' => array(
        array(
            'key' => 'field_mwm_tabs_domains_title',
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
            'key' => 'field_mwm_tabs_domains_tabs',
            'label' => 'Tabs',
            'name' => 'tabs',
            'type' => 'repeater',
            'instructions' => 'Agrega los tabs y sus tablas',
            'required' => 1,
            'min' => 1,
            'layout' => 'row',
            'button_label' => 'Agregar Tab',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_tabs_domains_tab_title',
                    'label' => 'Nombre del Tab',
                    'name' => 'tab_title',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_mwm_tabs_domains_tab_table',
                    'label' => 'Tabla',
                    'name' => 'tab_table',
                    'type' => 'repeater',
                    'instructions' => 'Filas de la tabla',
                    'required' => 1,
                    'min' => 1,
                    'layout' => 'block',
                    'button_label' => 'Agregar fila',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_mwm_tabs_domains_extension',
                            'label' => 'Extensión',
                            'name' => 'extension',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_mwm_tabs_domains_categoria',
                            'label' => 'Categoría',
                            'name' => 'categoria',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_mwm_tabs_domains_alta',
                            'label' => 'Alta',
                            'name' => 'alta',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_mwm_tabs_domains_renovacion',
                            'label' => 'Renovación',
                            'name' => 'renovacion',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_mwm_tabs_domains_transferencia',
                            'label' => 'Transferencia',
                            'name' => 'transferencia',
                            'type' => 'text',
                            'required' => 1,
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-tabs-domains',
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