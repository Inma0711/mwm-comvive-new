<?php
/**
 * Campos ACF para el bloque de configuración de precios de dominios
 */

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_mwm_domain_prices_config',
        'title' => 'Configuración de Precios de Dominios',
        'fields' => array(
            array(
                'key' => 'field_mwm_domain_prices_repeater',
                'label' => 'Precios de Dominios',
                'name' => 'domain_prices_config',
                'type' => 'repeater',
                'instructions' => 'Configura las extensiones de dominio y sus precios. Estos precios se usarán en los bloques de búsqueda.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Añadir Dominio',
                'sub_fields' => array(
                    array(
                        'key' => 'field_mwm_domain_extension',
                        'label' => 'Extensión',
                        'name' => 'extension',
                        'type' => 'text',
                        'instructions' => 'Ejemplo: com, es, net (sin el punto)',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'com',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_mwm_domain_price',
                        'label' => 'Precio',
                        'name' => 'price',
                        'type' => 'text',
                        'instructions' => 'Ejemplo: 20€, 14.00€',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '20€',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/mwm-domain-prices-config',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Configuración de precios para dominios en los bloques de búsqueda',
    ));
} 