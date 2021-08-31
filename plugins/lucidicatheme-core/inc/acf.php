<?php
function lucidicatheme_afc_metaboxes(){
    acf_add_local_field_group(array(
        'key' => 'acf_carsettings',
        'title' => 'Car Settings for AFC frome Code',
        'fields' => array(
            array(
                'key' => 'custom_price',
                'label' => 'Car Price',
                'name' => 'custom_price',
                'type' => 'text',
            ),
            array(
                'key' => 'custom_engine_type',
                'label' => 'Car Engine Type',
                'name' => 'custom_engine_type',
                'type' => 'select',
                'choices' => array(
                    'manual' => esc_html__('Manual','lucidicatheme' ),
                    'automatic' => 'Automatic'
                ),
                'allow_null' => 1,
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operatins' => '==',
                    'value' => 'car',
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_one_screen' => 'label'
    ));
}

add_action('acf/init', 'lucidicatheme_afc_metaboxes');