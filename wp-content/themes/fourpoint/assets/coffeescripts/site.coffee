window.debug_enabled = true

$.CustomEvents =
  SITE_INITIALIZED: "site_initialized"
  PRIMARY_NAV_CLICKED: "primary_nav_clicked"
  PRIMARY_NAV_HOVERED: "primary_nav_hovered"
  PRIMARY_NAV_HOVERED_OFF: "primary_nav_hovered_off"
  TOUCH_START: "touchstart"
  SET_MAP_REGION: "set_map_region"

window.custom_defaults =
  mobileWidth: 480
  iPadWidth: 768
  default_fade_duration: .4
  drawer_speed: .7
  open_drawer_delay: .15

$ ->
  ###*
   * Main controller for the site
   * @param {string} objectName
   * @param {obj} @settings
  ###
  $.fn.Site = (objectName,@settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if @settings? then jQuery.extend(config, @settings)

    this.each (index) ->
      $me = $(this)
      _content = null
      _carousel = null

      _init = () ->
        register($.Events.RESIZE,config.myName,_resize)
        _resize()
        trigger($.Events.INITIALIZE_DATASCRIPTS)
        trigger($.Events.SITE_INITIALIZED)

        debug("Initiating: " + config.myName)
        debug("Defaults:")
        debug(config)

        _initialize_plugins()
        _initialize_skinnable_form_elements()

      _resize = () ->

      _onImagesLoaded = (instance) ->
        debug "IMAGES HAVE BEEN LOADED"
        announce _a.IMAGES_LOADED

      _initialize_skinnable_form_elements = () ->
        $(".gfield_checkbox li").SkinnableCheckbox("SkinnableCheckbox")
        $("#loginform .login-remember").SkinnableCheckbox("SkinnableCheckbox")

      _getGridSize = () ->
        Math.floor($('.carousel').width() / 440)
        # if window.innerWidth < 600
        #   2
        # else if window.innerWidth < 900
        #   3
        # else
        #   4

      _load_isotope = () ->
        if $('.blocks').length > 0
          post_isotope_options =
            itemSelector: '.block'
            layoutMode: 'packery'
            packery: {
              gutter: '.gutter-sizer'
            }
          $('.blocks').isotope(post_isotope_options)

      _initialize_plugins = () ->
        $(".reformat-phone-field input[type=text]").PhoneField("PhoneField",config)

        carousel_opts =
          minItems: _getGridSize()
          maxItems: _getGridSize()
          animation: "slide"
          animationLoop: false
          itemWidth: 420
          directionNav: true
          prevText: ""
          nextText: ""
          controlNav: false



        if $('.blocks').length > 0
          #load isotope after images have been loaded
          imagesLoaded($('.blocks'),_load_isotope)

        _selected_filter = "*";

        if $(".region-select") && $(".region-select select").val()
          _selected_filter = $(".region-select select").val()

        brewery_isotope_options =
          itemSelector: '.brewery-tile'
          layoutMode: 'fitRows'
          fitRows: {
            gutter: '.gutter-sizer'
          }
          filter: _selected_filter

        if $('.brewery-tiles').length > 0
          $('.brewery-tiles').isotope(brewery_isotope_options)

        event_isotope_options =
          itemSelector: '.event-tile'
          layoutMode: 'fitRows'
          fitRows: {
            gutter: '.gutter-sizer'
          }

        if $('.event-tiles').length > 0
          $('.event-tiles').isotope(event_isotope_options)

        try
          $('#brewery-map').imageMapResize();
        catch err
          debug "no image map to load"

        # Jquery Timline Load
        debug "loading timeline"

        _on_timeline_loaded = (evt) ->
          debug "_on_timeline_loaded"
          height = e.element.height()-60-e.element.find('h2').height()
          e.element.find('.timeline_open_content span').css('max-height', height).mCustomScrollbar({
              autoHideScrollbar:true,
              theme:"light-thin"
          })

        timeline_options =
          hideControles: true
          startItem : '1876'
          itemMargin: 28
          categories: false
          nuberOfSegments: 2
          yearsOn: true
        try
          $('.tl1').timeline(timeline_options)
        catch err
          debug "no timeline to load"
        # $('.tl1').on('ajaxLoaded.timeline', _on_timeline_loaded)
        # $('.tl1').on('ajaxLoaded.timeline', function(e){
        #     console.log(e.element.find('.timeline_open_content span'));

        #     var height = e.element.height()-60-e.element.find('h2').height();
        #     e.element.find('.timeline_open_content span').css('max-height', height).mCustomScrollbar({
        #         autoHideScrollbar:true,
        #         theme:"light-thin"
        #     });
        # });

        # Anchor Tag Behavior
        # $('.flexslider').flexslider({ animation: "fade", directionNav: true, prevText: "", nextText: "", controlNav: false })
        # $('.carousel').Carousel("carousel",config)
        # $('select').dropkick()

        # $("img.retina").retina()

        # _carousel = $('.carousel').data('flexslider')

        # imagesLoaded( $.Window, _onImagesLoaded)

      _init()

  $.fn.PhoneField = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _reformat_to_us_phone = () ->
        new_val = reformatUSPhone $me.val()
        $me.val new_val

      init = () ->
        register($.Events.BLUR,config.myName,_reformat_to_us_phone,$me)

      init()

  $.fn.SideBug = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)
      _flyout = $("."+$me.attr("rel"));

      _toggle_login_form = () ->
        if $I.hasClass("open")
          $I.removeClass("open")
          _flyout.removeClass("open")
        else
          $I.addClass("open")
          _flyout.addClass("open")

      init = () ->
        register($.Events.CLICK,config.myName,_toggle_login_form,$me)

      init()

  $.fn.PostCategorySelector = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _filter_posts = () ->
        if $me.val() != "*"
          _selected_filter = '.'+$me.val()
        else
          _selected_filter = $me.val()

        $(".blocks").isotope({filter: _selected_filter})

      init = () ->
        register($.Events.CHANGE,config.myName,_filter_posts,$me)

      init()

  $.fn.BreweryRegionSelector = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _filter_breweries = () ->
        if $me.val() != "*"
          _selected_filter = '.'+$me.val()
        else
          _selected_filter = $me.val()

        $(".brewery-tiles").isotope({filter: _selected_filter})
        # $grid.isotope({filter: _selected_filter})

      init = () ->
        register($.Events.CHANGE,config.myName,_filter_breweries,$me)
        setTimeout _filter_breweries, 2000

      init()

  $.fn.BreweryMapRegionSelector = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _filter_breweries = () ->
        announce $.Events.SET_MAP_REGION, $me.val()

      init = () ->
        register($.Events.CHANGE,config.myName,_filter_breweries,$me)
        setTimeout _filter_breweries, 2000

      init()

  $.fn.BreweryFilterButton = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _select_filter = () ->
        $(".filter-button-selected").removeClass("filter-button-selected");
        $me.addClass("filter-button-selected")
        my_target = $me.attr("rel")
        $(".shown").removeClass("shown");
        $("."+my_target).addClass("shown");

      init = () ->
        register($.Events.CLICK,config.myName,_select_filter,$me)

      init()

  $.fn.BreweryMapArea = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _highlight_region = (evt) ->
        region = $(this).attr("rel")
        $(".shown .map-region-"+region).addClass("selected");

      _unhighlight_region = (evt) ->
        region = $(this).attr("rel")
        $(".shown .map-region-"+region).removeClass("selected");

      init = () ->
        register($.Events.MOUSE_OVER,config.myName,_highlight_region,$me)
        register($.Events.MOUSE_OUT,config.myName,_unhighlight_region,$me)


      init()

  $.fn.MenuTrigger = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)

      _set_closed_class = () ->
        debug "setting closed class"
        $('body').addClass("menu-closed")

      _change_text = (evt) ->
        if $me.hasClass "menu-active"
          $me.find(".trigger-text").text('MENU')
          setTimeout _set_closed_class, 500
        else
          $me.find(".trigger-text").text('CLOSE')
          $('body').removeClass("menu-closed")

      _change_text_from_click = (evt) ->
        if $me.hasClass "menu-active"
          $me.find(".trigger-text").text('MENU')
          setTimeout _set_closed_class, 500

      init = () ->
        register($.Events.CLICK,config.myName,_change_text,$me)
        register($.Events.CLICK,config.myName,_change_text_from_click,$(document))
        $('body').addClass("menu-closed")
        $(".menu-trigger").jPushMenu(close:_change_text)

      init()

  $.fn.BreweryMap = (objectName,@settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if @settings? then jQuery.extend(config, @settings)

    this.each (index) ->
      $me = $I = $(this)
      _latitude = $me.data('latitude')
      _longitude = $me.data('longitude')
      _address = $me.data('address')
      _map = null
      MY_MAPTYPE_ID = ''
      _map_options =
        zoom: 14
        scrollwheel: false
        center: new google.maps.LatLng(_latitude, _longitude)
        mapTypeId: MY_MAPTYPE_ID

      _map_el = $me.find(".footer-map")
      _map_json = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"hue":"#ffd100"},{"saturation":"44"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"saturation":"-1"},{"hue":"#ff0000"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"saturation":"-16"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"hue":"#ffd100"},{"saturation":"44"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-30"},{"lightness":"12"},{"hue":"#ff8e00"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":"-26"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#c0b78d"},{"visibility":"on"},{"saturation":"4"},{"lightness":"40"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffe300"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"hue":"#ffe300"},{"saturation":"-3"},{"lightness":"-10"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#ff0000"},{"saturation":"-100"},{"lightness":"-5"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]}]

      _create_map = () ->
        _map_options.mapTypeControlOptions = {mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]}
        customMapType = new google.maps.StyledMapType(_map_json, {name:''})
        _map = new google.maps.Map(document.getElementById('brewery-map'),_map_options)
        _map.mapTypes.set(MY_MAPTYPE_ID, customMapType)
        _add_markers()

      _office_click = (evt) ->


      _add_markers = () ->
        marker_click = () ->
          debug "marker click"
          # map_link = 'http://www.google.com/maps/place/'+position.lat()+','+position.lng()
          map_link = 'http://www.google.com/maps/place/'+encodeURIComponent(_address)+'/@'+_latitude+','+_longitude+',15z'
          newWindow = window.open(map_link,'map-pin-location',"toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1")

        latlng = new google.maps.LatLng(_latitude, _longitude)
        map_icon = new google.maps.MarkerImage("/wp-content/themes/cbg/assets/images/brewery_pin@2x.png", null, null, null, new google.maps.Size(48,62));
        office_marker = new google.maps.Marker({
            position: latlng,
            map: _map,
            icon: map_icon
          })

        google.maps.event.addListener(office_marker, 'click', marker_click)

      _init = () ->
        google.maps.event.addDomListener(window, 'load', _create_map)


      _init()



  $.fn.BreweriesMap = (objectName,@settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if @settings? then jQuery.extend(config, @settings)

    this.each (index) ->
      $me = $I = $(this)
      _latitude = 39.423556
      _longitude = -105.333587
      _latlngbounds = new google.maps.LatLngBounds();
      _map = null
      MY_MAPTYPE_ID = ''
      _map_options =
        zoom: 8
        scrollwheel: false
        center: new google.maps.LatLng(_latitude, _longitude)
        mapTypeId: MY_MAPTYPE_ID

      _map_el = $me.find(".map-display")
      _map_json = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"hue":"#ffd100"},{"saturation":"44"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"saturation":"-1"},{"hue":"#ff0000"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"saturation":"-16"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"hue":"#ffd100"},{"saturation":"44"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-30"},{"lightness":"12"},{"hue":"#ff8e00"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":"-26"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#c0b78d"},{"visibility":"on"},{"saturation":"4"},{"lightness":"40"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffe300"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"hue":"#ffe300"},{"saturation":"-3"},{"lightness":"-10"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#ff0000"},{"saturation":"-100"},{"lightness":"-5"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]}]

      _center_map = () ->
        debug _latlngbounds
        _map.setCenter(_latlngbounds.getCenter());
        _map.fitBounds(_latlngbounds);

      _create_map = () ->
        _map_options.mapTypeControlOptions = {mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]}

        customMapType = new google.maps.StyledMapType(_map_json, {name:''})
        _map = new google.maps.Map(document.getElementById('brewery-map'),_map_options)
        debug document.getElementById('brewery-map')
        _map.mapTypes.set(MY_MAPTYPE_ID, customMapType)
        google.maps.event.addListener(_map, 'tilesloaded', _set_loaded)
        _add_markers()
        _center_map()

      _set_map_region = (evt,coords) ->
        debug "_set_map_region"
        debug evt
        debug coords

        coords_data = coords.split(',')
        latitude = coords_data[0]
        longitude = coords_data[1]
        zoom = coords_data[2]
        latlng = new google.maps.LatLng(latitude, longitude)
        _map.setCenter(latlng)
        _map.setZoom(parseInt(zoom))

      _add_marker = (index,marker_data) ->
        marker_click = () ->
          debug "marker click"
          marker_address = marker_data.name + ',+' + marker_data.address + ',+' + marker_data.city + ',+' + marker_data.state + ',+' + marker_data.zip
          marker_address = marker_data.address + ',+' + marker_data.city + ',+' + marker_data.state + ',+' + marker_data.zip
          # marker_address = marker_data.name
          map_link = 'http://www.google.com/maps/place/'+marker_address.replace(' ','+')+'/@'+marker_data.latitude+','+marker_data.longitude+',15z'
          map_link = marker_data.permalink
          # newWindow = window.open(map_link,'map-pin-location',"toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1")
          window.location = map_link

        latlng = new google.maps.LatLng(marker_data.latitude, marker_data.longitude)
        map_icon = new google.maps.MarkerImage("/wp-content/themes/cbg/assets/images/brewery_pin@2x.png", null, null, null, new google.maps.Size(48,62));
        brewery_marker = new google.maps.Marker({
          position: latlng,
          map: _map,
          icon: map_icon
        })
        _latlngbounds.extend(latlng)

        google.maps.event.addListener(brewery_marker, 'click', marker_click)

      _add_markers = () ->
        $.each(brewery_map_data,_add_marker);

      _set_loaded = () ->
        debug "loaded"
        $me.addClass("loaded")

      _init = () ->
        google.maps.event.addDomListener(window, 'load', _create_map)
        respond_to $.Events.SET_MAP_REGION, _set_map_region


      _init()

  $.fn.Carousel = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)
      _carousel = null
      _carousel_opts = null
      _getGridSize = () ->
        grid_size = Math.floor($('.carousel').width() / 440)
        if grid_size < 1
          grid_size = 1
        grid_size

      _resize = () ->
        _resize_the_carousel()
        setTimeout(500,_resize_the_carousel)

      _resize_the_carousel = () ->
        _carousel.vars.minItems = _getGridSize()
        _carousel.vars.maxItems = _getGridSize()
        debug "resizing the carousel:"+_getGridSize()
        # _carousel_opts.minItems = _getGridSize()
        # _carousel_opts.maxItems = _getGridSize()
        # _initialize_the_slider()
        # _carousel.resize()

      _initialize_the_slider = () ->
        $me.flexslider(_carousel_opts)
        _carousel = $me.data('flexslider')

      init = () ->
        _carousel_opts =
          minItems: _getGridSize()
          maxItems: _getGridSize()
          animation: "slide"
          animationLoop: false
          itemWidth: 420
          directionNav: true
          prevText: ""
          nextText: ""
          controlNav: false

        _initialize_the_slider()

        respond_to _a.RESIZE_COMPLETED, _resize

      init()

  $.fn.PrimaryNav = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)
      _menu_trigger = $me.find(".menu-text")
      # _menu_contents = $me.find(".menu-contents")

      open_menu = (evt) ->
        evt.preventDefault()
        $me.addClass("open")

      init = () ->
        _initialized = true
        respond_to _a.CLICK, open_menu, _menu_trigger

      init()

  $.fn.MobileMenuTrigger = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)
      unless _initialized
        _initialized = false

      open_menu = (evt) ->
        evt.preventDefault()
        $('body').addClass("mobile-nav-open")

      init = () ->
        _initialized = true
        $I.respond_to _a.CLICK, open_menu

      if !_initialized
        init()

  $.fn.MobileCloseButton = (objectName,settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if settings? then jQuery.extend(config, settings)

    this.each (index) ->
      $I = $me = $(this)
      unless _initialized
        _initialized = false

      close_menu = (evt) ->
        evt.preventDefault()
        $('body').removeClass("mobile-nav-open")

      init = () ->
        _initialized = true
        $I.respond_to _a.CLICK, close_menu

      if !_initialized
        init()

  ###*
   * Controls a Royal Slider area
   * @param {string} objectName
   * @param {obj} @settings
  ###
  $.fn.FeatureArea = (objectName,@settings) ->
    $parent = $(this)

    if not config? then config = {}
    config.myName = objectName
    if @settings? then jQuery.extend(config, @settings)

    this.each (index) ->
      $I = $me = $(this)
      _features = $me.find('.features')
      _feature = $me.find('.feature')

      _resize = (evt) ->
        if $me.data('offset')
          dist_from_bottom = $me.data('offset')
        else
          dist_from_bottom = 40
          if $.MobileSize
            dist_from_bottom = 100
        # debug "dist_from_bottom:"+dist_from_bottom
        _feature.height($(window).height() - $(".site-header").height() - dist_from_bottom)
        # debug "resized container"

      _images_loaded = () ->
        debug "RESIZING BECAUES IMAGES WERE LOADED"
        _resize()

      _set_resizable = (element) ->
        attachmentX = "center"
        attachmentY = "center"
        if($(this).data('attachment-x'))
          attachmentX = $(this).data('attachment-x')
        if($(this).data('attachment-y'))
          attachmentY = $(this).data('attachment-y')

        resizable_opts =
          useBackgroundDiv: false
          # attachmentX: attachmentX
          # attachmentY: attachmentY

        $(this).resizable(resizable_opts)

      _init = () ->
        respond_to _a.RESIZE, _resize
        _resize()
        $me.find(".resizable").each _set_resizable
        # Resize the feature after the images have been loaded
        respond_to _a.IMAGES_LOADED, _images_loaded

      _on_video_play = (event, type, userAction) ->
        debug "video playing"
        $("#main-header").fadeOut()

      _on_video_stop = (event, type, userAction) ->
        debug "video stopping"
        $("#main-header").fadeIn()

      _onSlideAboutToMove = (event, type, userAction) ->
        debug type
        switch type
          when "next" then _bg_featuresRS.next()
          when "prev" then _bg_featuresRS.prev()
          else _bg_featuresRS.goTo(type)

      _init()

_docReady = (evt) ->
  if $.CustomEvents? then jQuery.extend($.Events, $.CustomEvents)
  if $.CustomMessages? then jQuery.extend($.Messages, $.CustomMessages)
  if window.custom_defaults? then jQuery.extend(window.defaults, window.custom_defaults)

  framework = $('body').Framework("CBG",defaults)
  site = $('body').Site("CBG",defaults)

$(document).ready(_docReady)
