<?php
/*
Widget Name: Portfolio widget
Description: A simple portfolio widget to display project.
Author: Rafin karki
Author URI: http://andmine.com
*/

class SiteOrigin_Widget_Portfolio_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'sow-portfolio',
			__('Cuvey:Portfolio', 'siteorigin-widgets'),
			array(
				'description' => __('A customizable portfolio widget.', 'siteorigin-widgets'),
			),
			array(

			),
			array(
				'number' => array(
					'type' => 'text',
					'label' => __('Number of Portfolio Projects', 'siteorigin-widgets'),
					'default'=>'5',
				),

			),			
		
			plugin_dir_path(__FILE__)
		);

	}
	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance) {
	
		return 'base';
	}

}

siteorigin_widget_register('portfolio', __FILE__);