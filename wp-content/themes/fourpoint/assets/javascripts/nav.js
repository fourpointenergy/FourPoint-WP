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
      }
    });
  });

  $(moreLink).on('click', function() {
    // e.preventDefault();
    var self = $(this).find(subMenu);
        currentOpen = navWrap.find(subMenuExpanded);

    if (navWrap.hasClass('expand_down')) {
      currentOpen.removeClass('show_submenu');
      self.toggleClass('show_submenu');
      navWrap.toggleClass('expand_down');
    }

    else if (self.hasClass('show_submenu')) {
      self.toggleClass('show_submenu');
      navWrap.toggleClass('expand_down');
    }
    else  {
      self.toggleClass('show_submenu');
      navWrap.toggleClass('expand_down');
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
