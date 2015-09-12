<?php
/*
Widget Name: Featured Project Slider widget
Description: Displays featured project slider.
Author: Rafin karki
Author URI: http://andmine.com
*/

class SiteOrigin_Widget_FeaturedSlider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-featuredslider',
			__( 'Cuvey:Featured Project Slider', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays simple slider of featured projects with text and button', 'siteorigin-widgets' ),
				
			),
			array(),
			array(					
				
				'title' => array(
					'type' => 'text',
					'label' => __('Slider title', 'siteorigin-widgets'),
					'description' => __('Slider title will be displayed in each slide.', 'siteorigin-widgets'),
				),
				'num' => array(
					'type' => 'text',
					'label' => __('# of featured item', 'siteorigin-widgets'),
					'default'=>2,
				),
				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window', 'siteorigin-widgets'),
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

siteorigin_widget_register('featuredslider', __FILE__);