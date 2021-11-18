$(document).ready(function(){

  function e(e){e&&e.preventDefault(),modal_class=$(this).attr("rel"),$(".login-modal."+modal_class).addClass("open")}function s(e){e&&e.preventDefault(),$(".login-modal").removeClass("open")}$(".hero-slider").slick({dots:!0,slidesToShow:1,slidesToScroll:1,autoplay:!0,autoplaySpeed:6e3});$(".hero-slider button").on("click",function(){window.dataLayer.push({event:"button click",headline:"home page carousel",label:"change slide"})});$(".main_nav a").on("click",function(a){var e=$(a.target).text();window.dataLayer.push({event:"text link",headline:"header nav",label:e})});var n=$(window),a=n.width(),o=function(e){var s=$(".the-slide-mobile"),n=$(".the-slide");s.each(function(s,n){e<=800&&$(n).css({"background-image":"url("+$(n).data("img-sm")+")"})}),n.each(function(s,n){e>=801&&$(n).attr("src",$(n).data("img-lg"))}),setTimeout(function(){$("#page-loader").fadeOut(300).addClass("gone")},300)};o(a),$("#page-loader").hasClass("gone")&&setTimeout(function(){$("#page-loader").remove()},700),$(".fancybox").fancybox({padding:0,prevEffect:"none",nextEffect:"none",helpers:{title:{type:"outside"},media:{},thumbs:{width:80,height:50}}}),n.on("resize",function(e){e=$(window).width(),o(e)});var l=$("#flipper li");n.scroll(function(e){l.each(function(e,s){var s=$(s);Modernizr.touch?s.addClass("come-in"):s.visible(!0)&&s.addClass("come-in")})}),$(".login-modal .close-modal").click(s),$(".open-login").click(e),$(".google-map iframe").addClass("scrolloff"),$(".google-map").on("mousedown",function(){$(this).children("iframe").removeClass("scrolloff")}),$("#js-mobile-search-icon").on("click",function(){$(".secondary_search_wrap").slideToggle(250)});var i=$("#main_nav"),t=$("#mobile_menu"),d=$("nav"),c=$(".menu-item-has-children"),r=$(".sub-menu"),u=$(".show_submenu");$(t).on("click",function(e){e.preventDefault(),i.slideToggle(function(){i.is(":hidden")?i.removeAttr("style"):i.css("overflow","hidden")})}),$(window).on("resize",function(){$(this).width()>=1024&&i.removeAttr("style")}),$(c).on("click",function(e){var s=$(this).find(r);currentOpen=d.find(u),d.hasClass("expand_down")?s.hasClass("show_submenu")?(s.toggleClass("show_submenu").prev().toggleClass("active"),d.toggleClass("expand_down")):d.hasClass("expand_down")&&$(".sub-menu").hasClass("show_submenu")&&($(".sub-menu").removeClass("show_submenu").prev().removeClass("active"),currentOpen.removeClass("show_submenu"),s.removeClass("show_submenu"),d.removeClass("expand_down"),currentOpen.addClass("show_submenu"),s.addClass("show_submenu").prev().addClass("active"),d.addClass("expand_down")):(s.toggleClass("show_submenu").prev().toggleClass("active"),d.toggleClass("expand_down"))}),$(".nav .nav-link").click(function(){$(".nav .nav-link").each(function(){$(this).removeClass("active-nav-item")}),$(this).addClass("active-nav-item"),$(".nav .more").removeClass("active-nav-item")});$(".animsition").animsition({inClass:"fade-in",outClass:"fade-out",inDuration:350,outDuration:350,linkElement:".animsition-link",loading:!0,loadingParentElement:"body",loadingClass:"animsition-loading",loadingInner:"",timeout:!1,timeoutCountdown:5e3,onLoadEvent:!0,browser:["animation-duration","-webkit-animation-duration"],overlay:!1,transition:function(n){window.location.href=n}});


  // skip to content link
  var $skipLink = $(".page-skipLink");
  $(window).on("keydown", function(i) {
      if (9 === (i.keyCode || i.which)) {
        $skipLink.css({ top: 0 });
        setTimeout(function() {
          $skipLink.css({ top: "-4em" });
        }, 4000);
      }
  });

  // GDPR
  // create cookie, read cookie https://www.quirksmode.org/js/cookies.html
  function createCookie(e,n,o){var t;if(o){var r=new Date;r.setTime(r.getTime()+24*o*60*60*1e3),t="; expires="+r.toGMTString()}else t="";document.cookie=encodeURIComponent(e)+"="+encodeURIComponent(n)+t+"; path=/"}
  function readCookie(e){for(var n=encodeURIComponent(e)+"=",o=document.cookie.split(";"),t=0;t<o.length;t++){for(var r=o[t];" "===r.charAt(0);)r=r.substring(1,r.length);if(0===r.indexOf(n))return decodeURIComponent(r.substring(n.length,r.length))}return null}

  if (readCookie('gdpr') === null) {
    setTimeout(function(){
      var $warning = $('.cookie-warning');
      $('.cookie-accept').on('click', function(){
        $warning.animate({opacity:0}, function(){ $warning.css({display: 'none'}); });
      });
      $warning.css({display:'block'}).animate({opacity:1});
      createCookie('gdpr', true, 99999);
    }, 2500);
  }

  // View More History Button
  var $expandHistory = $('.expand-history');
  if ($expandHistory.length > 0) {
    var open = false;
    $expandHistory.on('click', function(){
      open = !open;
      if (open) {
        $('.collapsed').css('display', 'block');
        $('.expand-history-label').html('View Less <svg class="icon icon-plus open expand-history-icon"><use xlink:href="#icon-plus"></use></svg>');
      } else {
        $('.collapsed').css('display', 'none');
        $('.expand-history-label').html('View More <svg class="icon icon-plus expand-history-icon"><use xlink:href="#icon-plus"></use></svg>');
      }
    });
  }

  // Features page clamshells
  var $container = $('.feature-container');
  if ($container.length > 0) {
    $('.year').on('click', function(e){
      var $year = $(e.currentTarget);
      var $posts = $year.next();
      if ($posts.hasClass('open')) {
        $year.find('svg').removeClass('open');
        $posts.removeClass('open');
      } else {
        $year.find('svg').addClass('open');
        $posts.addClass('open');
      }
    });
  }

});
