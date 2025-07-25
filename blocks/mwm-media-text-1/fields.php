<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_media_text_1',
    'title' => 'MWM Media Text 1',
    'fields' => array(
        array(
            'key' => 'field_mwm_media_text_1_title',
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
            'key' => 'field_mwm_media_text_1_description',
            'label' => 'Descripción',
            'name' => 'description',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'rows' => 4,
        ),
        array(
            'key' => 'field_mwm_media_text_1_btn_text',
            'label' => 'Texto del botón',   
            'name' => 'btn_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_media_text_1_btn_link',
            'label' => 'Enlace del botón',
            'name' => 'btn_link',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_media_text_1_description_2',
            'label' => 'Descripción 2',
            'name' => 'description_2',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'rows' => 4,
        ),
        array(
            'key' => 'field_mwm_media_text_1_video',
            'label' => 'URL del Video',
            'name' => 'video_url',
            'type' => 'text',
            'instructions' => 'Ingrese la URL del video (YouTube, Vimeo, etc.)',
            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_mwm_media_text_1_image',
                        'operator' => '==empty',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_mwm_media_text_1_image',
            'label' => 'Imagen',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'return_format' => 'ID',
            'preview_size' => 'medium',
            'library' => 'all',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_mwm_media_text_1_video',
                        'operator' => '==empty',
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
                'value' => 'acf/mwm-media-text-1',
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