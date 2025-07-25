<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_reviews',
    'title' => 'MWM Reviews',
    'fields' => array(
        array(
            'key' => 'field_mwm_reviews_title',
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
            'key' => 'field_mwm_reviews_reviews',
            'label' => 'Reseñas',
            'name' => 'reviews',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'min' => 0,
            'max' => 0,
            'layout' => 'block',
            'button_label' => 'Añadir reseña',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_reviews_review_text',
                    'label' => 'Texto de la reseña',
                    'name' => 'text',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_mwm_reviews_review_company_image',
                    'label' => 'Imagen de la empresa',
                    'name' => 'company_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_mwm_reviews_review_name',
                    'label' => 'Nombre',
                    'name' => 'name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_mwm_reviews_review_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/mwm-reviews',
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