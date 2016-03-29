
$(document).ready(function() {

	// REPLACE SVG WITH PNG IF NO SUPPORT

	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}

	// Fade in images on load
	$('header').imagesLoaded( function() {
		var headerImg = $('header img, header svg'),
			loader = $('.loader');
			headerImg.css('opacity', 1);
			loader.css('opacity', 0);
	});


	// TEST FOR TOUCH AND CSS ANIMATION, LOAD GSAP ANIMATION IF NOT

	// Modernizr.load([
	//   {
	//     test : Modernizr.touch & Modernizr.cssanimations,
	//     nope : ['marketing_website_assets/js/animate.js']
	//   }
	// ]);

	// HOVER ANIMATION TRICKS


	// SHOW VIDEO ON POSTER CLICK

	$('body').on('click','.vid_poster',function(){
	  	$('.vid_poster').css('opacity', '0');
	  	setTimeout(function(){
	  		$('.vid_poster').hide();
			$('#main_vid').show();
			$('#main_vid').append('<iframe width="1280" height="720" src="//www.youtube.com/embed/videoseries?list=PLuEMtRDaKygzrBnNOk9Q_IL_LXnLtBnZa&autoplay=1&showinfo=0&modestbranding&rel=0" frameborder="0" allowfullscreen></iframe>');
			$('#main_vid').fitVids();
		},400);
	});

	// SMOOTH SCROLL TO FIRST SECTION ON EXPLORE BUTTON CLICK

	$( "#scrolldown" ).click(function( event ) {
  		event.preventDefault();
	    $('html,body').animate({ scrollTop: $('#first').offset().top }, 'slow');
	});

	// HISTORY SCROLL EFFECTS

	// stroll.bind( '#flipper' );

	var win = $(window);

	var allMods = $("#flipper li");

	allMods.each(function(i, el) {
	  var el = $(el);
	  if (el.visible(true)) {
	    el.addClass("already-visible");
	  }
	});

	win.scroll(function(event) {

	  allMods.each(function(i, el) {
	    var el = $(el);
	    if (el.visible(true)) {
	      el.addClass("come-in");
	    }
	  });

	});


});


// MAP IFRAME RESIZE PAGE

// var frame = $('#iframe');

// frame.load(resizeIframe);
// function resizeIframe() {
//     frame.height(frame.contents().height());
//     frame.height(frame.contents().height());
// }
	
