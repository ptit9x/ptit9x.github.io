(function($) {
	"use strict";
// Google Map
	$(document).ready(function() {
		var myMarkers = {
			"markers": [
				{
				<!-- find locations goes here : http://itouchmap.com/latlong.html --!>
				"latitude": "-37.809224",	
				"longitude":"144.960947",
				"icon": "images/pin.png"
				}
			]
			};
		$("#google_map").mapmarker({
			zoom : 12,						
			center: "-37.809224,144.960947",	
			type: "ROADMAP",				
			controls: "HORIZONTAL_BAR",			
			dragging:0,							
			mousewheel:1,				
			markers: myMarkers,
			styling: 0,				
			featureType:"all",
			visibility: "off",
			elementType:"geometry",
			hue:"#000000",
			saturation:-100,
			lightness:0,
			gamma:0,
			navigation_control:0
		});
	});
})(jQuery);

// Video Background
(function($) {
	"use strict";
	$(function(){
		$(".player").mb_YTPlayer();
	});
})(jQuery);

// DM Menu
(function($) {
	"use strict";
	jQuery('.nav').onePageNav();
	jQuery('#navigation-container').height($("#nav").height());
	jQuery('#nav').affix({
		offset: { top: $('#nav').offset().top }
	});
})(jQuery);
	
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);

// Thumbnail Effects
(function($) {
	"use strict";
	$(' #da-thumbs > .portfolio-item ').each( function() { $(this).hoverdir(); } );
})(jQuery);

// Sliders
(function($) {
	"use strict";
	$("#slides").superslides({
		play: 6000,
		animation: "fade",
		pagination: true
	});
})(jQuery);

// Chart Effects;
	$('.chart').easyPieChart({
		easing: 'easeOutBounce',
		size : 220,
		animate : 2000,
		lineWidth : 6,
		lineCap : 'square',
		lineWidth : 20,
		barColor : '#b32945',
		trackColor : '#ffffff',
		scaleColor : false,
		onStep: function(from, to, percent) {
		$(this.el).find('.percent').text(Math.round(percent)+'%');
		}
	});

// Back to Top
(function($) {
	"use strict"
 	jQuery(window).scroll(function(){
	if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({bottom:"25px"});
		} else {
			jQuery('.dmtop').css({bottom:"-100px"});
		}
	});
	jQuery('.dmtop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
})(jQuery);		

// Tooltip
(function($) {
	"use strict"
	$('.social').tooltip({
		selector: "a[data-toggle=tooltip]"
	})
	
	$('.social').tooltip()
})(jQuery);		

// Stats
(function($) {
	"use strict"
	function count($this){
		var current = parseInt($this.html(), 10);
		current = current + 1; /* Where 50 is increment */
	
		$this.html(++current);
		if(current > $this.data('count')){
			$this.html($this.data('count'));
		} else {    
			setTimeout(function(){count($this)}, 50);
		}
	}        
	
	$(".stat-count").each(function() {
	  $(this).data('count', parseInt($(this).html(), 10));
	  $(this).html('0');
	  count($(this));
	});
})(jQuery);		

// Preloader
(function($) {
	"use strict"
	$(window).load(function() {
		$('#status').delay(100).fadeOut('slow');
		$('#preloader').delay(100).fadeOut('slow');
		$('body').delay(100).css({'overflow':'visible'});
	})
})(jQuery);	

// PrettyPhoto
(function($) {
	"use strict"
	jQuery(document).ready(function(){
		jQuery('a[data-gal]').each(function() {
			jQuery(this).attr('rel', jQuery(this).data('gal'));
		});  	
		jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square',slideshow:false,overlay_gallery: false,social_tools:false,deeplinking:false});
	}); 
})(jQuery);