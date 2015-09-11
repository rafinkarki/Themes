<?php /*********************************************************************
 * Function to load all theme assets (scripts and styles) in header
 */
function cuvey_load_theme_assets() {

    global $cuvey_options;

    // Do not know any method to enqueue a script with conditional tags!
    echo '
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
   <![endif]-->
    
    <!--[if IE]>
        <link rel="stylesheet" href="'.get_template_directory_uri().'/assets/css/ie.css" media="screen" type="text/css" />
        <![endif]-->

    ';
   
   
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
    wp_enqueue_style('main-css', get_stylesheet_directory_uri().'/assets/css/main.css');
    wp_enqueue_style('style-css', get_stylesheet_directory_uri().'/assets/css/style.css');       
    wp_enqueue_style('responsive-css', get_stylesheet_directory_uri().'/assets/css/responsive.css');
    wp_enqueue_style('default-css', get_stylesheet_directory_uri().'/assets/css/default.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');   
   
   
    // Enqueue theme font
    wp_enqueue_style('SansPro', 'http://fonts.googleapis.com/css?family=Play:400,700'); 

    
    // Enqueue all the js files of theme

    wp_enqueue_script('jquery');
    wp_enqueue_script('wow-js', get_template_directory_uri().'/assets/js/wow.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('stellar-js', get_template_directory_uri().'/assets/js/jquery.stellar.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('sticky-js', get_template_directory_uri().'/assets/js/jquery.sticky.js', array(), FALSE, TRUE);
    wp_enqueue_script('isotope-js', get_template_directory_uri().'/assets/js/jquery.isotope.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('easing-js', get_template_directory_uri().'/assets/js/jquery.easing.1.3.js', array(), FALSE, TRUE);
    wp_enqueue_script('pkgd-js', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array(), FALSE, TRUE);    
    wp_enqueue_script('fitvid-js', get_template_directory_uri().'/assets/js/fitvid.js', array(), FALSE, TRUE); 
    wp_enqueue_script('modernizr-js', get_template_directory_uri().'/assets/js/modernizr.js', array(), FALSE, TRUE);
    wp_enqueue_script('flexslider-js', get_template_directory_uri().'/assets/js/jquery.flexslider-min.js', array(), FALSE, TRUE);    
    wp_enqueue_script('switcher-js', get_template_directory_uri().'/assets/js/color-switcher.js', array(), FALSE, TRUE);
    wp_enqueue_script('waypoints-js', get_template_directory_uri().'/assets/js/waypoints.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('counter-js', get_template_directory_uri().'/assets/js/counter.js', array(), FALSE, TRUE);
    wp_enqueue_script('owl.carousel-js', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('smooth-js', get_template_directory_uri().'/assets/js/smooth-scroll.js', array(), FALSE, TRUE);
    wp_enqueue_script('jcarousel-js', get_template_directory_uri().'/assets/js/jquery.jcarousel.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('superslides-js', get_template_directory_uri().'/assets/js/jquery.superslides.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('hover-js', get_template_directory_uri().'/assets/js/bootstrap-hover-dropdown.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.js', array(), FALSE, TRUE);  

    // custom css append code here
    $inline_css='';
    if(isset($cuvey_options['extra-css'])){
    $inline_css.=$cuvey_options['extra-css'];  
    }
    wp_add_inline_style( 'custom-style', $inline_css );

    // theme color variation code here
    $color_variation ='';
    if(isset($cuvey_options['custom_color_primary']) && $cuvey_options['custom_color_primary']!=''){
    $main_custom_color_primary= esc_attr($cuvey_options['custom_color_primary']);
    } else {
    $main_custom_color_primary= "#03ACDC";
    }
     $hex_primary = str_replace("#", "", esc_attr($main_custom_color_primary));
       if(strlen($hex_primary) == 3) {
          $r = hexdec(substr($hex_primary,0,1).substr($hex_primary,0,1));
          $g = hexdec(substr($hex_primary,1,1).substr($hex_primary,1,1));
          $b = hexdec(substr($hex_primary,2,1).substr($hex_primary,2,1));
       } else {
          $r = hexdec(substr($hex_primary,0,2));
          $g = hexdec(substr($hex_primary,2,2));
          $b = hexdec(substr($hex_primary,4,2));
       }
        $new_custom_color_primary= array($r, $g, $b);
    $color_variation='
        .tooltip.bottom .tooltip-arrow
        {
        border-bottom-color: '.$main_custom_color_primary.';
        }
        .owl-controls .owl-nav [class*="owl-"]:hover, .section-colorful, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, 
        .bf ul.items.bflayhover li .caption, .ImageWrapper .ImageOverlayLi:before, .ImageWrapper:hover .ImageOverlayLi:before, .ImageWrapper .ImageOverlayLi:after, .ImageWrapper:hover .ImageOverlayLi:after,
        .ImageWrapper.red-effect .ImageOverlayLi:before,
        .ImageWrapper.red-effect:hover .ImageOverlayLi:before,
        .ImageWrapper.red-effect .ImageOverlayLi:after,
        .ImageWrapper.red-effect:hover .ImageOverlayLi:after,
        .item figure
         {
            background: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',0.8) !important;
        }
        .widget.Latest.Post.featured-widget ul li a {
          color: '.$main_custom_color_primary.';
        }
        #preloader_1 span:nth-child(5){
        left:44px;
        animation-delay: .8s;
        }
        @keyframes preloader_1 {
            0% {height:5px;transform:translateY(0px);background:'.$main_custom_color_primary.';}
            25% {height:30px;transform:translateY(15px);background:#'.$main_custom_color_primary.';}
            50% {height:5px;transform:translateY(0px);background:#6f6a62;}
            100% {height:5px;transform:translateY(0px);background:#6f6a62;}
        }
        .border-blue {
          border-color: '.$main_custom_color_primary.' !important;
          color: '.$main_custom_color_primary.' !important;
        }
        .color-blue {
          background: '.$main_custom_color_primary.';
        }
        .service-icon.color-blue {
          background: '.$main_custom_color_primary.' !important;
        }
        .colorfulbg-blue,
        .progress-bar-blue {
            background:'.$main_custom_color_primary.';
        }
        .team-member .social-icons i,
        .label-green,
        mark,
        .items .bubble:hover,
            .custom_tabbed .nav-tabs > li.active > a, 
        .custom_tabbed .nav-tabs > li.active,
         #accordion-first .accordion-heading .accordion-toggle > em:hover, #accordion-first .accordion-heading .accordion-toggle > em.fa-minus,
        .background-blue,
        .tldate,
        .header.border-bg .navbar-nav > li:focus,
        .header.border-bg .navbar-nav > li:active,
        .header.border-bg .navbar-nav > li.active,
        .header.border-bg .navbar-nav > li:hover,
        .header.border-bg .navbar-nav > li > a:focus,
        .header.border-bg .navbar-nav > li > a:active,
        .header.border-bg .navbar-nav > li > a.active,
        .header.border-bg .navbar-nav > li > a:hover {
            background:'.$main_custom_color_primary.' !important;
        }
        .quote-post,
        .pagination li > a:hover, 
        .pagination li > span:hover,
        #style7 .navbar-nav > li:focus,
        #style7 .navbar-nav > li:active,
        #style7 .navbar-nav > li.active,
        #style7 .navbar-nav > li:hover,
        #style7 .navbar-nav > li > a:focus,
        #style7 .navbar-nav > li > a.active,
        #style7 .navbar-nav > li > a:active,
        #style7 .navbar-nav > li > a:hover,
        .items .bubble:hover,
        .pricing-box:hover,
        .pricing-box.active,
        .owl-theme .owl-controls .owl-nav [class*=\'owl-\']:hover,
        .team-member .social-icons i,
        .portfolio-filter li a.active,
        .portfolio-filter li a:active,
        .portfolio-filter li a:focus,
        .portfolio-filter li a:hover,
        #accordion-first .accordion-heading .accordion-toggle > em:hover,
        #accordion-first .accordion-heading .accordion-toggle > em.fa-minus,
        .bf ul.filter li a:hover,
        .bf ul.filter li a:focus,
        .bf ul.filter li a.active,
        .bf ul.filter li a:active,
        .service_vertical_box .service-icon,
        .btn-primary,
        .logos-section,
        .border-boxed:hover {
            border-color:'.$main_custom_color_primary.';
            background:'.$main_custom_color_primary.';
        }

        .pricing-box:hover .btn,
        .pricing-box.active .btn {
            background:'.$main_custom_color_primary.';
            color: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1) !important;
        }

        .tp-caption.btn-default,
        .btn-default,
        .caps-desc.restaurant p {
            color: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1) !important;
        }
        .sidebar-nav li a:hover,
        .sidebar-nav li a:focus,
        .sidebar-nav li a:active,
        .sidebar-nav li a.active,
        #style10.header .dropdown-menu li a.active,
        #style10.header .dropdown-menu li a:active,
        .dark-header .dropdown-menu li a.active,
        .dark-header .dropdown-menu li a:active,
        .testi-sidebar small,
        .cs4 .not-found h1,
        .color-gray i,
        .cs2 p.count-details,
        .cs2 .stat-count,
        .tp-caption.slider-title7 span,
        .slider-title7 span,
        .tp-caption.slider-title-baron2,
        .slider-title-baron2,
        .tp-caption.blue-color,
        .tp-caption.slider-title4 span,
        .slider-title4 span,
        #testimonial small,
        .section-title .baron,
        #accordion-first .accordion-heading .accordion-toggle > em,
        .tp-caption.slider-title span,
        .slider-title span,
        a,
        .bubble,
        .service-style-1 i,
        .mini-title h2 span,
        .service-hover i,
        .section-title h3 span,
        .callus .dropdown-menu > li > a:hover,
        .callus .dropdown-menu > li > a:focus,
        .dropdown-submenu>.dropdown-menu li a:hover,
        .dropdown-submenu>.dropdown-menu li a:focus,
        .yamm .dropdown-menu li a:hover,
        .yamm .dropdown-menu li a:focus,
        .yamm .box li a:hover,
        .yamm .box li a:focus,
        .callus .spanme i,
        #header-one .navbar-nav > li > a:focus,
        #header-one .navbar-nav > li > a:active,
        #header-one .navbar-nav > li > a.active,
        #header-one .navbar-nav > li > a:hover  {
            color: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1);
        }
        .shop-desc .rating,
        .bubble i,
        .bubble,
        .menu-res .price h4
        {
             color: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1) !important;
        }
        .tab-content h3 span{color: '.$main_custom_color_primary.' !important;}
        #accordion-first .accordion-heading .accordion-toggle > em, 
        {
            color: '.$main_custom_color_primary.' !important;  
        }
        .yamm .yamm-content,
        .dropdown-submenu>.dropdown-menu,
        .yamm .dropdown-menu {
            border-top:2px solid rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1);
        }
        a.checkout-button.button.wc-forward,
        a.button.wc-backward,
        a.button.wc-forward,
        .woocommerce #respond input#submit  {          
          background-color: '.$main_custom_color_primary.';
          border: 2px solid '.$main_custom_color_primary.';
         
        }
        .quote-post blockquote {
          background: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1) !important;
          border-color: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1) !important;
        }
        .shop-rating i:hover,
        .rating i {
            color: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1);
        }
        .table > thead > tr > th {
            background: rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].', 1);
            border-bottom: 2px solid rgba('.$new_custom_color_primary['0'].','.$new_custom_color_primary['1'].','.$new_custom_color_primary['2'].',1);
           
        }
        .tooltip-inner,
        .social-icons i:hover,
        .mycolor {
        background: '.$main_custom_color_primary.' !important;
        background: -moz-linear-gradient(top,  '.$main_custom_color_primary.' 7%, #6f6a62 100%) !important;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(7%,#'.$main_custom_color_primary.'), color-stop(100%,#6f6a62)) !important;
        background: -webkit-linear-gradient(top,  '.$main_custom_color_primary.' 7%,#6f6a62 100%) !important;
        background: -o-linear-gradient(top,  '.$main_custom_color_primary.' 7%,#6f6a62 100%) !important;
        background: -ms-linear-gradient(top,  '.$main_custom_color_primary.' 7%,#6f6a62 100%) !important;
        background: linear-gradient(to bottom,  '.$main_custom_color_primary.' 7%,#6f6a62 100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\''.$main_custom_color_primary.'\', endColorstr=\'#6f6a62\',GradientType=0 ) !important;

        }
        #features .nav-tabs > li.active > a,#features .nav-tabs > li.active > a:hover,#features .nav-tabs > li.active > a:focus {
        color:'.$main_custom_color_primary.'!important;
        }
        ';
    wp_add_inline_style( 'color-style', $color_variation );
    }  
add_action('wp_enqueue_scripts', 'cuvey_load_theme_assets');