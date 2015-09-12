<?php
/*
Widget Name: Testimonials widget
Description: Displays testimonials with client image.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Testimonials_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-testimonials',
			__( 'Testimonials(Builder)', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays feedback from clients with their post and images.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
				'style' => array(
					'type' => 'checkbox',
					'label' => __('Builder style testimonials?', 'siteorigin-widgets')
				),
					
				'testimonials' => array(
					'type' => 'repeater',
					'label' => __('Testimonials', 'siteorigin-widgets'),
					'item_name' => __('Testimonial', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='testimonials-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => __('Name', 'siteorigin-widgets'),
						),
						'image' => array(
							'type' => 'media',
							'label' => __('Image', 'siteorigin-widgets'),
						),				

						'post' => array(
							'type' => 'text',
							'label' => __('Designation', 'siteorigin-widgets'),
						),

						'text' => array(
							'type' => 'textarea',
							'label' => __('Description', 'siteorigin-widgets')
						),
					
					),
				),

				'content' => array(
					'type' => 'checkbox',
					'label' => __('Content color white?', 'siteorigin-widgets'),
					'description' => __('Slider contents changes to white except value post in builder style.', 'siteorigin-widgets')
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

siteorigin_widget_register('testimonials', __FILE__);