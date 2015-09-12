<?php
/*
Widget Name: Adress widget
Description: Displays a contact address.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Address_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-address',
			__( 'Address(Builder)', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays an contact address details', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
			    
			    'address' => array(
					'type' => 'section',
					'label' => __('Address', 'siteorigin-widgets'),
					'item_name' => __('Address', 'siteorigin-widgets'),
					
					'fields' => array(
							'title' => array(
								'type' => 'text',
								'label' => __('Title', 'siteorigin-widgets'),
							),
							'icon' => array(
								'type' => 'icon',
								'label' => __('Address Icon', 'siteorigin-widgets'),
							),
							'color' => array(
								'type' => 'color',
								'label' => __('Icon Color', 'siteorigin-widgets'),
							),
							'container_color' => array(
								'type' => 'color',
								'label' => __('Icon Container Color', 'siteorigin-widgets'),
							),
							'address' => array(
								'type' => 'textarea',
								'label' => __('Street Address', 'siteorigin-widgets'),
								'description' => __('Add multiple addresses in next paragraph', 'siteorigin-widgets'),
							),

						),
					),
			    'phone' => array(
					'type' => 'section',
					'label' => __('Contact Number', 'siteorigin-widgets'),
					'item_name' => __('Contact', 'siteorigin-widgets'),
					
					'fields' => array(
							'title' => array(
								'type' => 'text',
								'label' => __('Title', 'siteorigin-widgets'),
							),
							'icon' => array(
								'type' => 'icon',
								'label' => __('Contact Icon', 'siteorigin-widgets'),
							),
							'color' => array(
								'type' => 'color',
								'label' => __('Icon Color', 'siteorigin-widgets'),
							),
							'container_color' => array(
								'type' => 'color',
								'label' => __('Icon Container Color', 'siteorigin-widgets'),
							),
							'telephone' => array(
								'type' => 'textarea',
								'label' => __('Phone number', 'siteorigin-widgets'),
								'description' => __('Add multiple numbers in next paragraph', 'siteorigin-widgets'),
							),	

						),
					),
			    'email' => array(
					'type' => 'section',
					'label' => __('Email', 'siteorigin-widgets'),
					'item_name' => __('Email', 'siteorigin-widgets'),
					
					'fields' => array(
							'title' => array(
								'type' => 'text',
								'label' => __('Title', 'siteorigin-widgets'),
							),
							'icon' => array(
								'type' => 'icon',
								'label' => __('Email Icon', 'siteorigin-widgets'),
							),
							'color' => array(
								'type' => 'color',
								'label' => __('Icon Color', 'siteorigin-widgets'),
							),
							'container_color' => array(
								'type' => 'color',
								'label' => __('Icon Container Color', 'siteorigin-widgets'),
							),
							'email' => array(
								'type' => 'textarea',
								'label' => __('Email address', 'siteorigin-widgets'),
								'description' => __('Add multiple emails in next paragraph', 'siteorigin-widgets'),
							),

						),
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
								'zoomIn' => __('zoomin', 'siteorigin-widgets'),
								'fadeIn' => __('fadein', 'siteorigin-widgets'),
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
								'slideInDown' => __('slidedown', 'siteorigin-widgets'),
								'slideInUp' => __('slideup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slidefade' => __('slidefade', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								
							)
						),
				'layout' => array(
					'type' => 'select',
					'label' => __('Information Layout', 'siteorigin-widgets'),
					'options' => array(
						'horizontal' => __('Horizontal View', 'siteorigin-widgets'),
						'vertical' => __('Vertical View', 'siteorigin-widgets'),
					),
				),								

			)
		);	
	}


	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}

	
}
siteorigin_widget_register('address', __FILE__);