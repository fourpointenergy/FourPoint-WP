window.debug_enabled = true

$.CustomEvents =
	SITE_INITIALIZED: "site_initialized"
	SELECT_INTERIOR_PHOTO: "select_interior_photo"
	TOUCH_START: "touchstart"
	OPEN_MAP: "open_map"
	CLOSE_MAP: "close_map"
	SLIDE_CHANGE: "slide_change"

window.custom_defaults =
	mobileWidth: 480
	iPadWidth: 768

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

			_scroll_to_section = (section) ->
				$('html,body').animate({scrollTop: _default_section.position().top},0);
			
			_init = () ->
				register($.Events.RESIZE,config.myName,_resize)
				_resize()
				trigger($.Events.INITIALIZE_DATASCRIPTS)
				trigger($.Events.SITE_INITIALIZED)

				debug("Initiating: " + config.myName)
				debug("Defaults:")
				if window.location.hash
					section = $(window.location.hash)

					if section.position()
						_default_section = section
						_scroll_to_section()
						setTimeout(_scroll_to_section,500);

				_initialize_plugins()
				_initialize_skinnable_form_elements();


			_initialize_plugins = () ->
				debug "_initialize_plugins"

			_initialize_skinnable_form_elements = () ->
		        skinnable_opts = 
		          unchecked_image_src: "/wp-content/themes/mollys/assets/images/checkbox_unchecked.png"
		          checked_image_src: "/wp-content/themes/mollys/assets/images/checkbox_checked.png"
		        $(".gfield_checkbox li").SkinnableCheckbox("SkinnableCheckbox")

			_resize = () ->
						
			_init()

	$.fn.InteriorButton = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)
			_my_interior_item = $me.attr("rel")

			_nav_item_click = (evt) ->
				evt.preventDefault()
				# Show/Hide Slider Photos
				$(".interiors-photos .photo.shown").removeClass("shown")
				$('#'+_my_interior_item).addClass("shown")
				# Show/Hide Slider Thumbnails
				$(".thumbnail-set.shown").removeClass("shown")
				$('#'+_my_interior_item+"-thumbnails").addClass("shown")
				$('.interior-buttons .button.selected').removeClass("selected")
				$me.addClass("selected")
				announce _a.SELECT_INTERIOR_PHOTO, _my_interior_item
			
			_init = () ->
				$I.respond_to _a.CLICK, _nav_item_click
				
			_init()

	$.fn.InteriorThumbnail = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)
			_my_interior_item = $me.attr("rel")
			_slider_number = $me.data("slider-number")

			_thumbnail_click = (evt) ->
				evt.preventDefault()
				announce _a.SLIDE_CHANGE, _my_interior_item, $("#interior-photos-slider-"+_slider_number)
			
			_init = () ->
				$I.respond_to _a.CLICK, _thumbnail_click
				
			_init()

	$.fn.InteriorPhoto = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)
			_my_id = $me.attr("id")

			_respond_to_selection = (evt,selected_photo) ->
				debug evt
				debug "responding to selection:"+selected_photo
				if selected_photo == _my_id
					$me.addClass("shown")
				else
					$me.removeClass("shown")
			
			_init = () ->
				debug "init InteriorPhoto"
				$I.respond_to _a.SELECT_INTERIOR_PHOTO, _respond_to_selection
				
			_init()

	$.fn.MapTrigger = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)

			_on_click = (evt) ->
				evt.preventDefault()
				announce _a.OPEN_MAP
			
			_init = () ->
				$I.respond_to(_a.CLICK,_on_click)
			_init()

	$.fn.MobileTrigger = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)

			_on_click = (evt) ->
				evt.preventDefault()
				$('.header-container').toggleClass("open")
			
			_init = () ->
				$I.respond_to(_a.CLICK,_on_click)
			_init()	

	$.fn.NavItem = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)
			_section_name = $me.attr("href").replace("#","")

			_on_click = (evt) ->
				evt.preventDefault()
				section = $("."+_section_name)
				$('html,body').animate({scrollTop: section.offset().top},'slow');
			
			_init = () ->
				$I.respond_to(_a.CLICK,_on_click)
			_init()

	$.fn.Slider = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $I = $(this)
			_slider_api = null

			_play_pause_slider = (evt,slider_name) ->
				if slider_name is $me.attr("rel")
					$me.find('.flexslider').flexslider("play")
				else
					$me.find('.flexslider').flexslider("pause")

			_go_to_slide = (evt,slide_number) ->
				debug "going to slide:"+slide_number
				debug _slider_api
				_slider_api.flexAnimate(slide_number)

			
			_init = () ->
				respond_to(_a.SECTION_CHANGE, _play_pause_slider)
				$I.respond_to(_a.SLIDE_CHANGE, _go_to_slide)

				slider_opts = 
					animation: "fade"
					animationLoop: true
					animationSpeed: 500
					slideshowSpeed: 4500
					itemWidth: '100%'
					itemMargin: 0
					controlNav: true
					prevText:""
					nextText:""
					slideshow:true
					directionNav: false

				debug $me.data('control-nav')

				if $me.data('namespace')
					slider_opts.namespace = $me.data('namespace')

				if $me.data('transition') == "slide"
					slider_opts.animation = "slide"

				if $me.data('control-nav') == false
					slider_opts.controlNav = false

				if $me.data('direction-nav') == true
					slider_opts.directionNav = true

				if $me.data('slideshow') == false
					slider_opts.slideshow = false

				debug slider_opts
				$me.find('.flexslider').flexslider(slider_opts);
				_slider_api = $me.find(".flexslider").data("flexslider")

				$I.respond_to _a.SELECT_INTERIOR_PHOTO, _play_pause_slider
			_init()

	$.fn.Header = (objectName,@settings) ->
		$parent = $(this)

		if not config? then config = {}
		config.myName = objectName
		if @settings? then jQuery.extend(config, @settings)

		this.each (index) ->
			$me = $(this)
			
			_init = () ->
				waypoint_handler = (direction) ->
					if direction == "down"
						$me.addClass("fixed");
					else
						$me.removeClass("fixed");

				unless $('body').hasClass("single-post")
					sticky = new Waypoint.Sticky({
					  element: $me[0]
					})

			_init()

_docReady = (evt) ->
	if $.CustomEvents? then jQuery.extend($.Events, $.CustomEvents)
	if $.CustomMessages? then jQuery.extend($.Messages, $.CustomMessages)
	if window.custom_defaults? then jQuery.extend(window.defaults, window.custom_defaults)

	framework = $('body').Framework("CCHGolden",defaults) 
	site = $('body').Site("CCHGolden",defaults)

$(document).ready(_docReady)