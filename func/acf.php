<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_team',
		'title' => 'Team',
		'fields' => array (
			array (
				'key' => 'field_57e18342c9482',
				'label' => 'Title',
				'name' => 'team_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cffe906ce296',
				'label' => 'Instagram Handle',
				'name' => 'team_instagram',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '@',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57e174a405a39',
				'label' => 'Specialty',
				'name' => 'team_specialty',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'training',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
