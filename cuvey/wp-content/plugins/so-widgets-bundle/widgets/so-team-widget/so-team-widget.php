<?php
/*
Widget Name: Team  widget
Description: Displays a team member with their designation and social media url.
Author: Rafin Karki
Author URI: http://andmine.com
*/
class SiteOrigin_Widget_Team_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-team',
			__( 'Cuvay:Team', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays a team members with their designation.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
				
				'number' => array(
					'type' => 'text',
					'label' => __('Number of team', 'siteorigin-widgets'),
					'defalut'=>'5'
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
				'new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open In New Window', 'siteorigin-widgets'),
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
siteorigin_widget_register('team', __FILE__);