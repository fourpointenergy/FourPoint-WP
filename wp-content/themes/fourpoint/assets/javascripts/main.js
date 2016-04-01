
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

//nav js
$(document).ready(function() {
  var menu = $('#main_nav');
  var menuToggle = $('#mobile_menu');
  var navWrap = $('nav');
  var moreLink = $('.menu-item-has-children');
  var subMenu = $('.sub-menu');
  var subMenuExpanded = $('.show_submenu');

  $(menuToggle).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle(function(){
      if(menu.is(':hidden')) {
        menu.removeAttr('style');
      } else {
        menu.css('overflow', 'hidden');
      }
    });
  });

  $(window).on('resize', function() {
    if($(this).width() >= 1024) {
      menu.removeAttr('style');
    }
  });

  $(moreLink).on('click', function(evt) {
    var self = $(this).find(subMenu);
        currentOpen = navWrap.find(subMenuExpanded);

    // if nothing is open, open clicked, slide down nav
    if (!navWrap.hasClass('expand_down')) {
      self.toggleClass('show_submenu').prev().toggleClass('active');
      navWrap.toggleClass('expand_down');
    }

    // close the opened one if it's clicked while open
    else if (self.hasClass('show_submenu')) {
      self.toggleClass('show_submenu').prev().toggleClass('active');
      navWrap.toggleClass('expand_down');
    }

    // if one is open, then you click another one, close current and open new one.
    else if (navWrap.hasClass('expand_down') && $('.sub-menu').hasClass('show_submenu'))  {
      console.log('close all')
      // close everything
      $('.sub-menu').removeClass('show_submenu').prev().removeClass('active');
      currentOpen.removeClass('show_submenu');
      self.removeClass('show_submenu');
      navWrap.removeClass('expand_down');

      // open everything
      currentOpen.addClass('show_submenu');
      self.addClass('show_submenu').prev().addClass('active');
      navWrap.addClass('expand_down');
    }
  });

 // underline under the active nav item
  $(".nav .nav-link").click(function() {
    $(".nav .nav-link").each(function() {
      $(this).removeClass("active-nav-item");
    });
    $(this).addClass("active-nav-item");
    $(".nav .more").removeClass("active-nav-item");
  });

  // var slateNav = function() {
  //   $('nav').css({
  //     "background-image": "url('../images/nav_bg_160.jpg')",
  //     "background-size": "cover",
  //     "position": "relative"
  //   });
  // };

  // var slateNavMobile = function() {
  //   $('nav').css({
  //     "background-image": "url('../images/nav_bg_mobile_sm.jpg')",
  //     "background-size": "100%",
  //     "position": "relative"
  //   });
  // };

  // nav positioning on pages other than home.
  // if(!$('.hero-slider').length) {
  //   if($(window).width() >= 1024 ) {
  //     slateNav();
  //   } else {
  //     slateNavMobile();
  //   }
  // }

  // $(window).on('resize', function() {
  //   if(!$('.hero-slider').length) {
  //     if($(window).width() >= 1024 ) {
  //       slateNav();
  //     } else {
  //       // $('nav').css('background', '#2e2e2d');
  //       slateNavMobile();
  //     }
  //   }
  // });
});

// MAP IFRAME RESIZE PAGE

// var frame = $('#iframe');

// frame.load(resizeIframe);
// function resizeIframe() {
//     frame.height(frame.contents().height());
//     frame.height(frame.contents().height());
// }
