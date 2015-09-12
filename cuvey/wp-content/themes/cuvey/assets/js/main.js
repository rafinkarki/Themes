/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(jQuery) {
"use strict"

/*-----------------------------------------------------------------------------------*/
/*		STICKY NAVIGATION
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
    jQuery(".sticky").sticky({topSpacing:0});
});










/*-----------------------------------------------------------------------------------*/
/* 	LOADER
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function() {
	jQuery("#loader").delay(500).fadeOut("slow");
});




/*-----------------------------------------------------------------------------------*/
/* 		Back to Top
/*-----------------------------------------------------------------------------------*/
jQuery(window).scroll(function(){
 if(jQuery(window).scrollTop() > 1000){
      jQuery("#back-to-top");
    } else{
      jQuery("#back-to-top");
    }
});
jQuery('#back-to-top, .back-to-top').click(function() {
      jQuery('html, body').animate({ scrollTop:0 }, '1000');
      return false;
});











/*-----------------------------------------------------------------------------------*/
/*    HOME 100% Height
/*-----------------------------------------------------------------------------------*/
jQuery(function(){
    var windowH = jQuery(window).height();
    var wrapperH = jQuery('#home').height();
    if(windowH > wrapperH) {                            
        jQuery('#home').css({'height':(jQuery(window).height())+'px'});
    }                                                                               
    jQuery(window).resize(function(){
        var windowH = jQuery(window).height();
        var wrapperH = jQuery('#wrap').height();
        var differenceH = windowH - wrapperH;
        var newH = wrapperH + differenceH;
        var truecontentH = jQuery('#home').height();
        if(windowH > truecontentH) {
            jQuery('#home').css('height', (newH)+'px');
        }

    })          
});















/*-----------------------------------------------------------------------------------*/
/* 		NAVIGATION SMOOTH SCROLL
/*-----------------------------------------------------------------------------------*/
jQuery('.menu nav ul a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      var href = jQuery.attr(this, 'href');
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
         scrollTop: target.offset().top
        }, 1000, function () {
            window.location.hash = href;
        });
        return false;
      }
    }
});
var navLinkIDs = "";
 jQuery('.menu nav ul a[href*=#]:not([href=#])').each(function(index) {
     if(navLinkIDs != "") {
         navLinkIDs += ", ";
     }
     navLinkIDs += jQuery('.menu nav ul a[href*=#]:not([href=#])').eq(index).attr("href");
 });
if( navLinkIDs ) {
   jQuery(navLinkIDs).waypoint(function(direction) {
       if(direction=='down') {
           jQuery('.menu nav ul a').parent().removeClass("active");
           jQuery('.menu nav ul a[href="#'+jQuery(this).attr('id')+'"]').parent().addClass("active");
       }
   }, { offset: 70 });
    jQuery(navLinkIDs).waypoint(function(direction) {
       if(direction=='up') {
           jQuery('.menu nav ul a').parent().removeClass("active");
           jQuery('.menu nav ul a[href="#'+jQuery(this).attr('id')+'"]').parent().addClass("active");
       }
   }, {  offset: function() {
       return -jQuery(this).height() + 20;
   } });
}




/*-----------------------------------------------------------------------------------*/
/* 		Active Menu Item on Page Scroll
/*-----------------------------------------------------------------------------------*/
jQuery(window).scroll(function(event) {
		Scroll();
});	
jQuery('.scroll a').click(function() {  
		jQuery('html, body').animate({scrollTop: jQuery(this.hash).offset().top -10}, 1000);
		return false;
});
// User define function
function Scroll() {
var contentTop      =   [];
var contentBottom   =   [];
var winTop      =   jQuery(window).scrollTop();
var rangeTop    =   200;
var rangeBottom =   500;
jQuery('nav').find('.scroll a').each(function(){
	contentTop.push( jQuery( jQuery(this).attr('href') ).offset().top);
		contentBottom.push( jQuery( jQuery(this).attr('href') ).offset().top + jQuery( jQuery(this).attr('href') ).height() );
})
jQuery.each( contentTop, function(i){
	if ( winTop > contentTop[i] - rangeTop ){
		jQuery('nav li.scroll')
		  .removeClass('active')
			.eq(i).addClass('active');			
		}}
)};


/*-----------------------------------------------------------------------------------*/
/*    CONTACT FORM
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
      jQuery('#contactForm .error').remove();
      var form = jQuery('#contactForm'); // contact form
      var submit = jQuery('#contactForm_submit'); // submit button
      var alertx = jQuery('.successMsg'); // alertx div for show alert message
      // form submit event
      form.on('submit', function (e) {
      var hasError = false;
        jQuery('.required').each(function () {
            if (jQuery.trim(jQuery(this).val()) === '') {
                jQuery(this).parent().append('<span class="error"><i class="fa fa-exclamation-triangle"></i></span>');
                hasError = true;
            } else if (jQuery(this).hasClass('email')) {
                var emailReg = /^([\w-\.]+@([\w]+\.)+[\w]{2,4})?jQuery/;
                if (!emailReg.test(jQuery.trim(jQuery(this).val()))) {
                    jQuery(this).parent().append('<span class="error"><i class="fa fa-exclamation-triangle"></i></span>');
                    hasError = true;
                }
            }
        });
        if (!hasError) {
            e.preventDefault(); // prevent default form submit
          // sending ajax request through jQuery
          jQuery.ajax({
              url: 'js/inc/sendemail.php', // form action url
              type: 'POST', // form submit method get/post
              dataType: 'html', // request type html/json/xml
              data: form.serialize(), // serialize form data 
              beforeSend: function () {
                  alertx.fadeOut();
                  submit.html('Sending....'); // change submit button text
              },
              success: function (data) {
                  form.fadeOut(300);
                  alertx.html(data).fadeIn(1000); // fade in response data     
                  setTimeout(function() {
                    alertx.html(data).fadeOut(300);
                    jQuery('#formName, #formEmail,#phone,#web, #message').val('')
                    form.fadeIn(1800);
                }, 4000);
              },
              error: function (e) {
                  console.log(e)
              }
          });
          jQuery('.required').val('');
        }
        return false;    
      });
      
    jQuery('#contactForm input').focus(function () {
        jQuery('#contactForm .error').remove();
    });
    jQuery('#contactForm textarea').focus(function () {
        jQuery('#contactForm .error').remove();
    });
});





});