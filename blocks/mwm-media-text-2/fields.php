<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_media_text_2',
    'title' => 'MWM Media Text 2',
    'fields' => array(
        array(
            'key' => 'field_mwm_media_text_2_title',
            'label' => 'Título',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_media_text_2_description',
            'label' => 'Descripción',
            'name' => 'description',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'rows' => 4,
        ),
        array(
            'key' => 'field_mwm_media_text_2_btn_text',
            'label' => 'Texto del botón',   
            'name' => 'btn_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_media_text_2_btn_link',
            'label' => 'Enlace del botón',
            'name' => 'btn_link',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
        ),
        array(
            'key' => 'field_mwm_media_text_2_description_2',
            'label' => 'Descripción 2',
            'name' => 'description_2',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array(
            'key' => 'field_mwm_media_text_2_video_1',
            'label' => 'URL del Video',
            'name' => 'video_url',
            'type' => 'text',
            'instructions' => 'Ingrese la URL del video (YouTube, Vimeo, etc.)',
            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_mwm_media_text_2_image_1',
                        'operator' => '==empty',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_mwm_media_text_2_video_2',
            'label' => 'URL del Video 2',
            'name' => 'video_url_2',
            'type' => 'text',
            'instructions' => 'Ingrese la URL del video (YouTube, Vimeo, etc.)',
            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_mwm_media_text_2_image_2',
                        'operator' => '==empty',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_mwm_media_text_2_image_1',
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
                        'field' => 'field_mwm_media_text_2_video_1',
                        'operator' => '==empty',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_mwm_media_text_2_image_2',
            'label' => 'Imagen 2',
            'name' => 'image_2',
            'type' => 'image',
            'instructions' => '',
            'return_format' => 'ID',
            'preview_size' => 'medium',
            'library' => 'all',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_mwm_media_text_2_video_2',
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
                'value' => 'acf/mwm-media-text-2',
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