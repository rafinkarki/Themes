<?php global $cuvey_options;
$header=$cuvey_options['header-style'];
 // Navbar
if($header=='shop'):
	get_template_part('partials/headers/header_shop');
elseif($header=='nav-below' || $header=='nav-below2' || $header=='nav-below3' || $header=='nav-below4' || $header=='nav-color4'):
	get_template_part('partials/headers/header_nav-below');
elseif($cuvey_options['header_position']=='left'):
    get_template_part('partials/headers/header_left');
else:	
	get_template_part('partials/headers/header_1');
endif;