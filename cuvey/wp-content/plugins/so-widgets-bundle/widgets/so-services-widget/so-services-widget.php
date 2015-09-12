<?php
/*
Widget Name: Services widget
Description: Displays a block of services with icons.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Services_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-services',
			__( 'Services (Builder)', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays a list of services with icons.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
			
				
				'icon' => array(
					'type' => 'icon',
					'label' => __('Icon', 'siteorigin-widgets'),
				),
				'image' => array(
					'type' => 'media',
					'label' => __('Upload Image', 'siteorigin-widgets'),
					'description' => __('Upload your image instead of icon.', 'siteorigin-widgets'),
				),
				'color' => array(
					'type' => 'color',
					'label' => __('Icon Container Color', 'siteorigin-widgets'),
				),
				'number' => array(
					'type' => 'text',
					'label' => __('Icon Number', 'siteorigin-widgets'),
					'description' => __('Give numeric value as 1,2,3...', 'siteorigin-widgets'),
				),
				'title' => array(
					'type' => 'text',
					'label' => __('Title text', 'siteorigin-widgets'),
				),

				'text' => array(
					'type' => 'textarea',
					'label' => __('Description', 'siteorigin-widgets'),
				
				),
				'circular' => array(
					'type' => 'checkbox',
					'label' => __('Display Circular Icon Conatiner.', 'siteorigin-widgets'),
				
				),	


			),
			plugin_dir_path(__FILE__).'../'
		);
	}


	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}

	
}

siteorigin_widget_register('services', __FILE__);