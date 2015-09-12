<?php
/*
Widget Name:Image Slider widget
Description: A very simple image slider widget.
Author: Rafin karki
Author URI: http://andmine.com
*/

class SiteOrigin_Widget_Image_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-image_slider',
			__('Cuvey:Image Slider', 'siteorigin-widgets'),
			array(
				'description' => __('A simple image slider widget .', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(
				'images' => array(
					'type' => 'repeater',
					'label' => __('Images', 'siteorigin-widgets'),
					'item_name' => __('Image', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='images-alt']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'image' => array(
							'type' => 'media',
							'label' => __('Image file', 'siteorigin-widgets'),
						),
						'alt' => array(
							'type' => 'text',
							'label' => __('Image name', 'siteorigin-widgets'),
							'description' => __('This name will be displayed as alt value of a image.', 'siteorigin-widgets'),
						),
						'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'siteorigin-widgets'),
							'options' => array(
								'none' => __('none', 'siteorigin-widgets'),
								'bounce' => __('bounce', 'siteorigin-widgets'),
								'flash' => __('flash', 'siteorigin-widgets'),
								'pulse' => __('pulse', 'siteorigin-widgets'),
								'rubberBand' => __('rubberBand', 'siteorigin-widgets'),
								'shake' => __('shake', 'siteorigin-widgets'),
								'swing' => __('swing', 'siteorigin-widgets'),
								'tada' => __('tada', 'siteorigin-widgets'),
								'wobble' => __('wobble', 'siteorigin-widgets'),
								'bounceIn' => __('bounceIn', 'siteorigin-widgets'),
								'bounceInDown' => __('bounceInDown', 'siteorigin-widgets'),
								'bounceInLeft' => __('bounceInLeft', 'siteorigin-widgets'),
								'bounceInRight' => __('bounceInRight', 'siteorigin-widgets'),
								'bounceInUp' => __('bounceInUp', 'siteorigin-widgets'),								
								'fadeInDown' => __('fadeInDown', 'siteorigin-widgets'),
								'fadeInDownBig' => __('fadeInDownBig', 'siteorigin-widgets'),
								'fadeInLeft' => __('fadeInLeft', 'siteorigin-widgets'),
								'fadeInLeftBig' => __('fadeInLeftBig', 'siteorigin-widgets'),
								'fadeInRight' => __('fadeInRight', 'siteorigin-widgets'),
								'fadeInRightBig' => __('fadeInRightBig', 'siteorigin-widgets'),
								'fadeInUp' => __('fadeInUp', 'siteorigin-widgets'),
								'fadeInUpBig' => __('fadeInUpBig', 'siteorigin-widgets'),								
								'flipInX' => __('flipInX', 'siteorigin-widgets'),
								'flipInY' => __('flipInY', 'siteorigin-widgets'),
								'rotateIn' => __('rotateIn', 'siteorigin-widgets'),
								'rotateInDownLeft' => __('rotateInDownLeft', 'siteorigin-widgets'),
								'rotateInDownRight' => __('rotateInDownRight', 'siteorigin-widgets'),
								'rotateInUpLeft' => __('rotateInUpLeft', 'siteorigin-widgets'),
								'rotateInUpRight' => __('rotateInUpRight', 'siteorigin-widgets'),
								'slideInDown' => __('slideindown', 'siteorigin-widgets'),
								'slideInUp' => __('slideinup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slideInRight' => __('slideinright', 'siteorigin-widgets'),
								'slideInLeft' => __('slideinleft', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								'fadeIn' => __('fadein', 'siteorigin-widgets'),
							)
						),
						
					),
				),
				
			),

			plugin_dir_path(__FILE__).'../'
		);
	}

	
	
	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	
}

siteorigin_widget_register('image_slider', __FILE__);