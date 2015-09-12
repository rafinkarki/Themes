<?php
/*
Widget Name: Title widget
Description: Displays Title product
Author: Rafin Karki
Author URI: http://andmine.com
*/
class SiteOrigin_Widget_Title_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-title',
			__('Cuvey:Title', 'siteorigin-widgets'),
			array(
				'description' => __('A simple title widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __('Title Text', 'siteorigin-widgets'),
				),
				
				'subtitle' => array(
					'type' => 'textarea',
					'label' => __('Sub-Title Text', 'siteorigin-widgets'),
				),			

				'size' => array(
					'type' => 'select',
					'label' => __('Title Size', 'siteorigin-widgets'),
					'options' => array(
						'1' => __('H1', 'siteorigin-widgets'),
						'2' => __('H2', 'siteorigin-widgets'),
						'3' => __('H3', 'siteorigin-widgets'),
						'4' => __('H4', 'siteorigin-widgets'),
						'5' => __('H5', 'siteorigin-widgets'),
						'6' => __('H6', 'siteorigin-widgets'),
						
					)
				),
				'align' => array(
					'type' => 'select',
					'label' => __('Alignment', 'siteorigin-widgets'),
					'description' => __('Alignments for title and subtitle only.', 'siteorigin-widgets'),
					'options' => array(
						'left' => __('Left', 'siteorigin-widgets'),
						'right' => __('Right', 'siteorigin-widgets'),				
						'center' => __('Center', 'siteorigin-widgets'),
					),
					'default'=>'center'
				),
				'animation' => array(
					'type' => 'select',
					'label' => __('Title Animation', 'siteorigin-widgets'),
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

				'line' => array(
					'type' => 'checkbox',
					'label' => __('Display divider below title', 'siteorigin-widgets'),
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
siteorigin_widget_register('title', __FILE__);