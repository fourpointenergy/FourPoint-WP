$(document).ready(function() {
  var menu = $('#main_nav');
  var menuToggle = $('#mobile_menu');
  var navWrap = $('nav');
  var moreLink = $('.more');
  var subMenu = $('.submenu');
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
      console.log('stuff')
      // if(menu.is(':hidden')) {
        menu.removeAttr('style');
      // } else {
      //   menu.css('overflow', 'hidden');
      // }
    }
  });

  $(moreLink).on('click', function() {
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
    else if (navWrap.hasClass('expand_down') && $('.submenu').hasClass('show_submenu'))  {

      // close everything
      $('.submenu').removeClass('show_submenu').prev().removeClass('active');
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

  var slateNav = function() {
    $('nav').css({
      "background-image": "url('/assets/img/nav_bg_160.jpg')",
      "background-size": "cover",
      "position": "relative"
    });
  };

  var slateNavMobile = function() {
    $('nav').css({
      "background-image": "url('/assets/img/nav_bg_mobile_sm.jpg')",
      "background-size": "100%",
      "position": "relative"
    });
  };

  // nav positioning on pages other than home.
  if(!$('.hero-slider').length) {
    if($(window).width() >= 1024 ) {
      slateNav();
    } else {
      slateNavMobile();
    }
  }

  $(window).on('resize', function() {
    if(!$('.hero-slider').length) {
      if($(window).width() >= 1024 ) {
        slateNav();
      } else {
        // $('nav').css('background', '#2e2e2d');
        slateNavMobile();
      }
    }
  });



});