// JavaScript Document
//Author Name: jThemes Studio
//Author URI: http://www.jakjim.com
//Themeforest: http://themeforest.net/user/jThemes?ref=jThemes
//Creation Date: 10nd April, 2014

jQuery(document).ready(function() {
	
      //Preloader
		jQuery(window).load(function() {
			jQuery('#preloader').fadeOut();
			jQuery('.loading').delay(350).fadeOut('slow');  
			jQuery('body').delay(350).css({'overflow':'visible'});
		})
	  /// avatar class added
	  jQuery("img.avatar").addClass("media-object pull-left");
		jQuery('a.comment-reply-link').addClass("btn btn-primary");
		jQuery('a.comment-edit-link').addClass("btn btn-primary");
		jQuery('.wysija-submit').addClass("btn btn-primary");
		
	  // Fixed Top bar
	  jQuery(window).bind('scroll', function() {
	  var navHeight = jQuery( window ).height();
	  
		   if (jQuery(window).scrollTop() >= navHeight) {
			   jQuery('#home').addClass('fixed');
		   }
		   else {
			   jQuery('#home').removeClass('fixed');
		   }
	  });
	  
	  //jQuery('.para').parallax("50%", 0.3);
	
	  // WOW - animated content
	  new WOW().init();
	
	  // Top Arrow
	  jQuery(window).scroll(function() {
			  if (jQuery(window).scrollTop() > 1000) { 
				  jQuery('a.top').fadeIn('slow'); 
			  } else { 
				  jQuery('a.top').fadeOut('slow');
			  }
	  });
	
	  // SLIDER
	  jQuery('.slides').superslides({
		animation: 'fade',
		play:7000, // change value if you want to increase or decrese speed
		animation_speed:800 // change time interval during slide change
	  });
	
	  // Datepicker - Prefered contact
	  jQuery('#datetimepicker').datetimepicker({
	  format:'m.d.Y H:i', //date format
	  inline:false,
	  lang:'en' // language
	  });

        // Images carousel
        if (jQuery('.img-carousel').length) {
            jQuery('.img-carousel').owlCarousel({
                autoplay: false,
                loop: jQuery('.img-carousel > .item').size() > 1 ? true : false,
                margin: 0,
                dots: true,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsiveRefreshRate: 100,
                responsive: {
                    0: {items: 1},
                    479: {items: 1},
                    768: {items: 1},
                    991: {items: 1},
                    1024: {items: 1}
                }
            });
        }
	
	  // Gallery Overlay
	   jQuery('ul.galleryImg li a').append('<div></div>');
	
	  // smooth page Scroll nav.navbar a[href^=#],
	  jQuery('a.top[href^=#], a.read[href^=#]').click(function(event) {
			  event.preventDefault();
			  jQuery('html,body').animate({
			  scrollTop: jQuery(this.hash).offset().top},
			  1000);	
	  });
	  jQuery("ul.nav li a").click(function(event) {
        // check if window is small enough so dropdown is created
		jQuery(".navbar-collapse").removeClass("in").addClass("collapse");
		
    });
	  
	
	  // Services Carousel delay
	  jQuery('#serviceList').carousel({
		  interval:false // set value like 5000 for making auto and increase or decrease for delay
		  });
	
	  // Image Lightbox
	   jQuery("a[rel^='prettyPhoto']").prettyPhoto({overlay_gallery: true});
	   jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({overlay_gallery: true});

	  // Subscription Form Validation
		 jQuery("#subscribeForm input").focus(function() {
			jQuery(this).prev("label").hide();
			jQuery(this).prev().prev("label").hide();	 		 	
		});
		 
		/*jQuery("#subscribeForm").submit(function() {
			// validate and process form here
			var emailSubscribe = jQuery("#emailSubscribe").val();
			if (emailSubscribe == "") {
				  jQuery('#emailSubscribe').addClass('reqfld');
				  jQuery('<span class="error" style="display:none; color:#cc0000"><i class="fa fa-exclamation-circle"></i></span>').insertBefore('#emailSubscribe').fadeIn(400);
				  jQuery("#emailSubscribe").focus(function() {  jQuery('#emailSubscribe').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
				  return false;
			 } else if(emailSubscribe.indexOf('@') == -1 || emailSubscribe.indexOf('.') == -1) {
				  jQuery('#emailSubscribe').addClass('reqfld');
				  jQuery('<span class="error" style="display:none;  color:#cc0000">Invalid!</span>').insertBefore('#emailSubscribe').fadeIn(400);
				  jQuery("#emailSubscribe").focus(function() {  jQuery('#emailSubscribe').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
				  return false;
			}
		
			var sub_security = jQuery("#sub-security").val();
				
			var dataString = '&emailSubscribe=' + emailSubscribe + '&sub-security=' + sub_security;
			
			jQuery.ajax({
			  type: "POST",
			  url: "form/subscribe.php",
			  data: dataString,
			  success: function() {
				jQuery("#subscribeForm .form-row").hide();
				jQuery('#subscribeForm').append("<div id='subscribesuccess' class='alert alert-success' style='border:#"+sub_successBox_Border_Color+" 1px "+sub_successBoxBorderStyle+"; background:#"+sub_successBoxColor+";' ></div>");
				jQuery('#subscribesuccess').html("<h5 style='color:#"+sub_textColor+";'><i class='fa fa-check-circle'></i> "+sub_submitMessage+"</h5>")
				.hide().delay(300)
				.fadeIn(1500);
				
				jQuery('#subscribeForm .form-row').delay(6000).slideUp('fast');
				
			  }
			});
			return false;
	  });	*/
	
	  // Contact Form
	  jQuery('.loader').hide();
	  jQuery("input, textarea").focus(function() {
		  jQuery(this).prev("label").hide();
		  jQuery(this).prev().prev("label").hide();	 		 	
	  });
	   
/*	  jQuery("#contact_form").submit(function() {
				// validate and process form here
				var name = jQuery("#name").val();
					  if (name == "") {
					  jQuery('#name').addClass('reqfld');
					  jQuery('<span class="error" style="display:none; margin-top:0px;">Required!</span>').insertBefore('#name').fadeIn(400);
					  jQuery("#name").focus(function() {  jQuery('#name').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
					  return false;
				} 
				  
				var phone = jQuery("#phone").val();
					  if (phone == "") {
					  jQuery('#phone').addClass('reqfld');
					  jQuery('<span class="error" style="display:none;">Required!</span>').insertBefore('#phone').fadeIn(400);
					  jQuery("#phone").focus(function() {  jQuery('#phone').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
					  return false;
				}
				
				var email = jQuery("#email").val();
				if (email == "") {
					  jQuery('#email').addClass('reqfld');
					  jQuery('<span class="error" style="display:none;">Required!</span>').insertBefore('#email').fadeIn(400);
					  jQuery("#email").focus(function() {  jQuery('#email').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
					  return false;
				 } else if(email.indexOf('@') == -1 || email.indexOf('.') == -1) {
					  jQuery('#email').addClass('reqfld');
					  jQuery('<span class="error" style="display:none;">Invalid Email Address!</span>').insertBefore('#email').fadeIn(400);
					  jQuery("#email").focus(function() {  jQuery('#email').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
					  return false;
				}
				
				var datetimepicker = jQuery("#datetimepicker").val();
					  if (datetimepicker == "") {
					  jQuery('#datetimepicker').addClass('reqfld');
					  jQuery('<span class="error" style="display:none;">Required!</span>').insertBefore('#datetimepicker').fadeIn(400);
					  jQuery("#datetimepicker").focus(function() {  jQuery('#datetimepicker').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
					  return false;
				}
				
				var comment = jQuery("#comment").val();
					  if (comment == "") {
					  jQuery('#comment').addClass('reqfld');
					  jQuery('<span class="error" style="display:none;">Required!</span>').insertBefore('#comment').fadeIn(400);
					  jQuery("#comment").focus(function() {  jQuery('#comment').removeClass('reqfld');  jQuery(this).prev().fadeOut(400);});
					  return false;
				}
				
				jQuery('#contact_form').animate({opacity:'0.3'}, 500);
		  
		  		var security = jQuery("#security").val();
		  
		  		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&datetimepicker=' + datetimepicker + '&comment=' + comment + '&security=' + security;
				
				//alert (dataString);return false;
				jQuery.ajax({
				  type: "POST",
				  url: "form/contact.php",
				  data: dataString,
				  success: function() {
					jQuery("#contact_form").animate({opacity:'1'}, 500);
					jQuery('.loader').hide();
					jQuery("<div id='success' class='alert alert-success' style='border:#"+successBox_Border_Color+" 1px "+successBoxBorderStyle+"; background:#"+successBoxColor+";' ></div>").insertAfter('#contact_form');
					jQuery('#contact_form').slideUp(300);
					jQuery('#success').html("<h5 style='color:#"+textColor+";'>"+submitMessage+"</h5><p style='color:#"+textColor+";'>"+successParagraph+"</p>")
					.hide().delay(300)
					.fadeIn(1500);
				  }
				});
				return false;
	  });*/
});
