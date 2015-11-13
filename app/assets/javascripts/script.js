//parallax
$(window).stellar({
    horizontalScrolling: false,
    responsive: true/*,
     scrollProperty: 'scroll',
     parallaxElements: false,
     horizontalScrolling: false,
     horizontalOffset: 0,
     verticalOffset: 0*/
});


//owl carousel for screenshots
$(document).ready(function() {
 
  $("#owl-example").owlCarousel({
      // Most important owl features
    items : 4,
    itemsCustom : false,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,3],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    startDragging : true
  });
 
});


//owl carousel for testimonials
$(document).ready(function() {
 
  $("#testimonial-carousel").owlCarousel({
      // Most important owl features
    items : 1,
    itemsCustom : false,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [980,1],
    itemsTablet: [768,1],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    startDragging : true,
    autoPlay: true
  });
 
});



  // magnific popoup for single images
  $('.popup-link').magnificPopup({
  		type: 'image'
  	});
        
  // magnific popoup for video
   $('.popup-youtube, .popup-vimeo').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
  


    // magnific popoup for image gallery

 $('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});

//	Success Message on Form Registration

$('.registration-form').on('submit', function(e) {
    e.preventDefault(); //Prevents default submit
    var form = $(this); 
    var post_url = form.attr('action'); 
    var post_data = form.serialize(); //Serialized the form data for process.php
    $('#loader', form).html('<i class="icon-spinner icon-spin icon-large"></i> Please Wait...');
    $.ajax({
        type: 'POST',
        url: 'registration.php', // Your form script
        data: post_data,
        success: function(msg) {
            $(form).fadeOut(500, function(){
                form.html(msg).fadeIn();
            });
        }
    });
});

