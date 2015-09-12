/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(jQuery) {
"use strict"
/*-----------------------------------------------------------------------------------*/
/*    Flex Slider
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready()
jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "fade",
    controlNav: "thumbnails",
  slideshow: true
});





/*-----------------------------------------------------------------------------------*/
/*    Flex Slider
/*-----------------------------------------------------------------------------------*/
jQuery('.flex-blog').flexslider({
    animation: "fade",
  easing: "swing",               //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
  direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
  reverse: false,                 //{NEW} Boolean: Reverse the animation direction
  animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
  smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode  
  startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
  slideshow: true,                //Boolean: Animate slider automatically
  slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
  animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
  initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
  randomize: false, 
  });
});

/*-----------------------------------------------------------------------------------*/
/*  ISOTOPE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    var jQuerycontainer = jQuery('.portfolio-wrapper .items');
  jQuerycontainer.imagesLoaded(function () {
        jQuerycontainer.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
  });
    jQuery('.filter li a').click(function () {
        jQuery('.filter li a').removeClass('active');
        jQuery(this).addClass('active');
        var selector = jQuery(this).attr('data-filter');
        jQuerycontainer.isotope({
            filter: selector
        });
        return false;
    });
});
/*-----------------------------------------------------------------------------------*/
/*  ANIMATION
/*-----------------------------------------------------------------------------------*/
var wow = new WOW({
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       100,          // distance to the element when triggering the animation (default is 0)
    mobile:       false        // trigger animations on mobile devices (true is default)
});
wow.init();


/*-----------------------------------------------------------------------------------*/
/* 		Team Slider
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
  jQuery("#owl-team").owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
	  stopOnHover : true,
      navigation : true, // Show next and prev buttons
	  pagination : false,
	  navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  });
});




/*-----------------------------------------------------------------------------------*/
/* 		CLIENT Slider
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
  jQuery("#owl-client").owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
	  stopOnHover : true,
      navigation : true, // Show next and prev buttons
	  pagination : false,
	  navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  });
});





/*-----------------------------------------------------------------------------------*/
/* 		CLIENT Slider
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
  jQuery("#owl-sevices").owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 1,
      itemsDesktop : [1199,1],
	  singleItem : true,
      itemsDesktopSmall : [979,1],
	  stopOnHover : true,
      navigation : true, // Show next and prev buttons
	  pagination : false,
	  navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  });
});




/*-----------------------------------------------------------------------------------*/
/* 		 Slider
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
  jQuery(".owl-img").owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 1,
      itemsDesktop : [1199,1],
	  singleItem : true,
      itemsDesktopSmall : [979,1],
	  stopOnHover : true,
      navigation : true, // Show next and prev buttons
	  pagination : false,
	  navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  });
});

/*-----------------------------------------------------------------------------------*/
/*    HOME TEXT SLIDER VERTICAL
/*-----------------------------------------------------------------------------------*/
jQuery('#home-text').jcarousel({
     vertical: true,
     animation: 400    
});


jQuery('#slides').superslides({
    animation: 'fade',
    play: 10000,
    animation_speed: 1000,
    animation_easing: 'swing',
    inherit_width_from: window,
    inherit_height_from: window,
    pagination: true,
    hashchange: false,
    scrollable: true,
});

/*-----------------------------------------------------------------------------------*/
/*    Parallax
/*-----------------------------------------------------------------------------------*/

  jQuery.stellar({
    horizontalScrolling: false,
    scrollProperty: 'scroll',
    positionProperty: 'position',
  });
});
