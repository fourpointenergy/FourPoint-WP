
jQuery(document).ready(function($){
	// Setup datalayer if not already set
	window.dataLayer = window.dataLayer || [];

	var $this,
		obj = {},
		url,
		mainMenu = '',
		subMenu = '';

	// Track page loads - via URL parsing
	url = window.location.pathname.split('/');
	mainMenu = url[1];
	subMenu = url[2];

	if( mainMenu != '' ){
		//console.log("Page load:", mainMenu, subMenu);
		dataLayer.push({
			event: 'page load',
			main_menu: mainMenu,
			sub_menu: subMenu
		});
	}
	//
	$('body').on('click', 'a, input.button', function(e){
		$this = $(this);
		obj = {};

		// External links
		if( $this.hasClass('logo') ){
			obj = {
				event: 'exit link',
				label: $this.attr('href')
			};

		// FAQ Page Clicks
		} else if( window.location.pathname == '/faqs/' ){
			obj = {
				event: 'FAQ',
				question: $this.closest('ul').prev('h2').text(),
				label: $this.text()
			};

		// Slider button
		} else if( $this.hasClass('slider-button') ){
			obj = {
				event: 'button click',
				label: $this.closest('.hero-slider-copy').find('h1').text(),
			};

		// Form submissions
		} else if( $(e.target).is('input') ){
			obj = {
				event: 'submit form',
				label: 'contact us'
			};

		// Buttons
		} else if( $this.hasClass('button') ){
			obj = {
				event: 'button click',
				label: $this.text()
			};

		// Social links
		} else if( $this.hasClass('social-link') ){
			obj = {
				event: 'social link',
				label: $this.find('img').attr('alt')
			};

		// Email addresses
		} else if( $this.attr('href').indexOf("mailto:") >= 0  ) {
			obj = {
				event: 'email',
				label: $this.attr('title') || $this.attr('href').replace('mailto:','')
			};

		// PDF downloads
		} else if( $this.attr('href').indexOf(".pdf") >= 0  ) {
			obj = {
				event: 'download',
				label: $this.attr('href').split('/').pop()
			};

		}

		if( !$.isEmptyObject(obj) ){
			dataLayer.push(obj);
			//console.log("Click:", obj);
		}
	});
});
