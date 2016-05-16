
$(document).ready(function() {

  // Home page slider init
  $('.hero-slider').slick({
    dots: true,
    speed: 200
  });

  // change slider images depending on screen sizes
  var windowWidth = $(window).width();
  var changeSliderImages = function(windowWidth) {
    var $slidesMobile = $('.the-slide-mobile');
    var $slideDesktop = $('.the-slide');

    $slidesMobile.each(function(index, el) {
      if(windowWidth <= 800) {
        $(el).css({
          'background-image': 'url(' + $(el).data('img-sm') + ')'
        });
      }
    });

    $slideDesktop.each(function(index, el) {
      if(windowWidth >= 801) {
        $(el).attr('src', $(el).data('img-lg'));
      }
    });

    setTimeout(function() {
      $('#page-loader').fadeOut(300).addClass('gone');
    }, 300);
    
  };

  changeSliderImages(windowWidth);

  // failsafe
  if($('#page-loader').hasClass('gone')) {
    setTimeout(function() {
      $('#page-loader').remove();
    }, 700);
  }

  //init fancybox
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



  $(window).on('resize', function(windowWidth) {
    windowWidth = $(window).width();
    changeSliderImages(windowWidth);
  });

  // HOVER ANIMATION TRICKS

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

  //click handler for login modal close button
  $(".login-modal .close-modal").click(close_login_modal);

  function open_login_modal(evt) {
    if(evt) evt.preventDefault();
    modal_class = $(this).attr("rel");
    $(".login-modal."+modal_class).addClass("open");
  }

  function close_login_modal(evt) {
    if(evt) evt.preventDefault();
    $(".login-modal").removeClass("open");
  }

  $(".open-login").click(open_login_modal);

  // Trigger Investors login modal
  // var loginModal = document.getElementById('login-modal');
  // document.getElementsByClassName('investors-link')[0].addEventListener('click', function() {
  //   loginModal.style.display = 'block';
  // });

  // // Close login modal
  // var closeBtn = document.querySelector('.close-modal');
  // closeBtn.addEventListener('click', function() {
  //   loginModal.style.display = 'none';
  // });


  
  //nav js
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

});