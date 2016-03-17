$(document).ready(function() {
	var $gallery = $('#fp-gallery');

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

	// Home page slider init
	$('.hero-slider').slick({
		dots: true,
		speed: 200
	});

	// change slider images depending on screen sizes
	var windowWidth = $(window).width();
	var changeSliderImages = function(windowWidth) {
		var $slides = $('.the-slide');

		$slides.each(function(index, el) {
			if(windowWidth >= 850) {
				$(el).css({
					'background-image': 'url(' + $(el).data('img-lg') + ')'
				});
			} else {
				$(el).css({
					'background-image': 'url(' + $(el).data('img-sm') + ')'
				});
			}
		});
	};

	changeSliderImages(windowWidth);

	$(window).on('resize', function(windowWidth) {
		windowWidth = $(window).width();
		changeSliderImages(windowWidth);
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

	// Trigger Investors login modal
	var loginModal = document.getElementById('login-modal');
	document.getElementById('investors-link').addEventListener('click', function() {
		loginModal.style.display = 'block';
	});

	// Close login modal
	var closeBtn = document.querySelector('.close-modal');
	closeBtn.addEventListener('click', function() {
		loginModal.style.display = 'none';
	});

	// fancybox init
	if($gallery.length) {
		$(".fancybox").fancybox({
			padding: 0,
			prevEffect: 'none',
			nextEffect: 'none',
			helpers: {
				title: {
					type: 'outside'
				},
				media: {},
				thumbs: {
					width: 80,
					height: 50
				}
			}
		});
	}

	// gallery filter
	var $filterBtn = $('.filter-btn');
	var $sortableItem = $('.sortable');
	// var itemType = $sortableItem.data('type');

	$filterBtn.on('click', function(e) {
		e.preventDefault();
		// console.log(itemType)
		var filterVal = $(this).data('category');
		var $target = $(e.target);
		;

		// add/remove classes to show active state
		$filterBtn.removeClass('btn-white').addClass('btn-blue');
		$target.toggleClass('btn-white');

		// loop through items, fade in/out based on type
		$sortableItem.each(function() {
			var itemType = $(this).data('type')
			if(filterVal === 'all') {
				$(this).fadeIn('fast');
			} else if(filterVal != itemType) {
				$(this).fadeOut('fast');
			} else {
				$(this).fadeIn('fast');
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
	