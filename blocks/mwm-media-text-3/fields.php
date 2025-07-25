<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_mwm_media_text_3',
    'title' => 'MWM Media Text 3',
    'fields' => array(
        array(
            'key' => 'field_mwm_media_text_3_rows',
            'label' => 'Filas',
            'name' => 'rows',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Añadir fila',
            'sub_fields' => array(
                array(
                    'key' => 'field_mwm_media_text_3_row_is_reverse',
                    'label' => 'Invertir',
                    'name' => 'is_reverse',
                    'type' => 'true_false',
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_mwm_media_text_3_row_title',
                    'label' => 'Título',
                    'name' => 'title',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_mwm_media_text_3_row_description',
                    'label' => 'Descripción',
                    'name' => 'description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_mwm_media_text_3_row_video_url',
                    'label' => 'URL del video',
                    'name' => 'video_url',
                    'type' => 'text',
                    'instructions' => 'Si no se añade una imagen, se mostrará el video',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_mwm_media_text_3_row_image',
                                'operator' => '==empty',
                            ),
                        ),
                    ),
                ),
                array(  
                    'key' => 'field_mwm_media_text_3_row_image',
                    'label' => 'Imagen',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => 'Si no se añade un video, se mostrará la imagen',
                    'required' => 0,
                    'return_format' => 'ID',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_mwm_media_text_3_row_video_url',
                                'operator' => '==empty',
                            ),
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
                'value' => 'acf/mwm-media-text-3',
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