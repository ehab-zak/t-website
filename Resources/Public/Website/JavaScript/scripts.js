var isMobile = -1;

/**
 * handling :hover on android devices
 * source: http://www.hnldesign.nl/work/code/mouseover-hover-on-touch-devices-using-jquery/
 */
function handleHoverOnAndroidDevices() {
	$('.touchclick').on('touchstart', function (e) {
		'use strict'; //satisfy code inspectors
		var link = $(this); //preselect the link
		if (link.parent().hasClass('hover')) {
			return true;
		} else {
			link.parent().addClass('hover');
//			$('.touchclick').not(this).parent().removeClass('hover'); // disabled here, enabling crashes menu as parents get also hidden
			e.preventDefault();
			return false; //extra, and to make sure the function has consistent return points
		}
	});
}


/**
 * open and close mobile navi
 */
function toggleMobileNavi() {

	if (isMobile == 1) {
		$('.touchclick').parent().removeClass('hover');
		$('.nav-primary').show();
		$('.hamburger').toggleClass('is-active');
		$('nav').toggleClass('on');
		$('#navi-lightbox').toggleClass('on');
	} else if (isMobile == 0) {
		toggleMainNavi();
	}
}

/**
* close mobile navi
*/
function closeMobileNavi() {
	$('.hamburger').removeClass('is-active');
	$('nav').removeClass('on');
	$('#navi-lightbox').removeClass('on');
}

/**
 * display and hide search box
 */
function toggleSearchBox() {

	if (isMobile == 0 || 1) {
		$('header').toggleClass('display-searchbox');
            
        if ( $('header').is(':visible')) {
                document.getElementById("textfield").focus();        
	}
    }
}

/**
 * hide searchbox
 */
function hideSearchBox() {
	$('header').removeClass('display-searchbox');
}
/**
 * expand main navi on root
 */
function expandMainNavi() {
	$('header').removeClass('reduced');
	$('nav').removeClass('reduced');

	/* menu.js */
	setMenuPosition();
}

/**
 * expand main navi on root
 */
function toggleMainNavi() {
	$('header').toggleClass('reduced');
	$('nav').toggleClass('reduced');

	/* menu.js */
	setMenuPosition();
}


/**
 * check for mobile features and enable/disable them
 */
function checkMobileFeatures() {

	if (window.innerWidth < 1024) {

		if (isMobile != 1) {
			closeMobileNavi();
			hideSearchBox();

			/* set min-height of submenu to 0 (done by menu.js) */
			nav_primary = $('nav .level-1 > li > a').next();
			nav_primary.css('min-height', '0px');
		}
		isMobile = 1;
	} else {
		if (isMobile == 1) {
			closeMobileNavi();
			hideSearchBox();
		}
		isMobile = 0;
	}
}

function setCustomerSliderMaxItems(slider){
	//var maxItems = Math.floor(window.innerWidth / 180);
	var maxItems = 1;
	if (window.innerWidth >= 768) {
		maxItems = 3;
	}
	if (window.innerWidth >= 1024) {
		maxItems = 4;
	}
	if (window.innerWidth >= 1440) {
		maxItems = 5;
	}
	if(slider) {
		slider.vars.maxItems = maxItems;
	}
	return maxItems;
}

function setTeaserSliderMaxItems(slider){
	var maxItems = 1;
	if (window.innerWidth >= 768) {
		maxItems = 2;
	}
	if (window.innerWidth >= 1024) {
		maxItems = 3;
	}
	if(slider) {
		slider.vars.maxItems = maxItems;
	}
	return maxItems;
}

function getParam(variable){
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++) {
		var pair = vars[i].split("=");
		if(pair[0] == variable){
			return pair[1];
		}
	}
	return(false);
}

$(document).ready(function () {

	// initialize handling of hovers
	handleHoverOnAndroidDevices();

	// Main Navigation
	$('.toggle-main-navi').click(function() {
		toggleMobileNavi();
	});

	// check for mobile features
	checkMobileFeatures();

	// footer sitemap
	$('#sitemap-toggle').click(function (event) {
		event.preventDefault();
		$(this).closest('div').toggleClass('open');
		$('#sitemap-content').toggle();
	});

	// Main Navigation
	$('#search-button').click(function() {
		toggleSearchBox();
	});

	// activate accordeons
	$('.accordeon-headline').click(function () {
		$(this).parent().toggleClass('open');
	});

	var $window = $(window);
	// store the sliders in a local variable
	var imageSlider;
	var testimonialsSlider;
	var newsSlider;
	var teaserSlider;
	var customerSlider;


	// load image slider on root page
	if ($("#image-slider").length) {
		$window.load(function() {
			$('#image-slider').flexslider({
				animation: "fade",
				animationLoop: true,
				slideshow: true,
				controlNav: true,
				directionNav: false,
				keyboard: false,
				move: 1,
				start: function(slider) {
					imageSlider = slider;
				}
			});
		});
	}

	// load testimonials slider on root page
	if ($('#testimonials-slider').length) {
		$window.load(function() {
			$('#testimonials-slider').flexslider({
				animation: 'slide',
				animationLoop: true,
				slideshow: true,
				slideshowSpeed: 8000,
				animationSpeed: 1000,
				pauseOnAction: true,
				controlNav: true,
				directionNav: false,
				keyboard: false,
				move: 1,
				minItems: 1,
				maxItems: 1,
				start: function(slider) {
					testimonialsSlider = slider;
				}
			});
		});
	}

	// load news slider on root page
	if ($('#news-slider').length) {
		$window.load(function() {
			$('#news-slider').flexslider({
				animation: 'slide',
				animationLoop: true,
				slideshow: true,
				controlNav: true,
				directionNav: false,
				keyboard: false,
				move: 1,
				minItems: 1,
				maxItems: 1,
				start: function(slider) {
					newsSlider = slider;
				}
			});
		});
	}

	// load teaser slider on root page
	if ($('#teaser-slider').length) {
		$window.load(function() {
			$('#teaser-slider').flexslider({
				animation: 'slide',
				animationLoop: true,
				slideshow: true,
				controlNav: true,
				directionNav: false,
				keyboard: false,
				move: 1,
				minItems: setTeaserSliderMaxItems(),
				maxItems: setTeaserSliderMaxItems(),
				itemWidth: 366,
				start: function(slider) {
					teaserSlider = slider;
				}
			});
		});
	}
	// fix and recalculate teaser width
	//setTeaserSliderMaxItems(teaserSlider);

	// load customer slider on root page
	if ($('#customer-slider').length) {
		$window.load(function() {
			$('#customer-slider').flexslider({
				animation: 'slide',
				animationLoop: false,
				slideshow: false,
				controlNav: false,
				directionNav: true,
				keyboard: false,
				move:1,
				itemWidth:140,
				maxItems:setCustomerSliderMaxItems(),
				start: function(slider) {
					customerSlider = slider;
				}
			});
		});
	}

	// watch resizing
	$window.resize(function() {
		checkMobileFeatures();
		setCustomerSliderMaxItems(customerSlider);
		setTeaserSliderMaxItems(teaserSlider);
	});

	// menu behaviour when scrooling down; we have to use fixed value here, as on mobile resolution nav has a different position.
	var scrollPos = 45;
	$window.scroll(function() {
		hideSearchBox();
		if($(this).scrollTop() > scrollPos) {
			expandMainNavi();
			$('#page').addClass('scroll');
		} else {
			$('#page').removeClass('scroll');
		}
	});

	var scrollTo = getParam('pos');
	if (scrollTo) {
		$('html, body').animate({
			'scrollTop':   $('#contact').offset().top
		}, 2000);	}
});





/**
 * Check if it's an old Android Tablet (Version 2 or 3)
 */
function isOldAndroidTablet() {
	var ua = navigator.userAgent;
	if (ua.match(/(Android 2|Android 3)/)) {
		return true;
	}
	return false;
}
/**
 * hoverIntent is similar to jQuery's built-in "hover" function except that
 * instead of firing the onMouseOver event immediately, hoverIntent checks
 * to see if the user's mouse has slowed down (beneath the sensitivity
 * threshold) before firing the onMouseOver event.
 *
 * hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
 * <http://cherne.net/brian/resources/jquery.hoverIntent.html>
 *
 * hoverIntent is currently available for use in all personal or commercial
 * projects under both MIT and GPL licenses. This means that you can choose
 * the license that best suits your project, and use it accordingly.
 *
 * // basic usage (just like .hover) receives onMouseOver and onMouseOut functions
 * $("ul li").hoverIntent( showNav , hideNav );
 *
 * // advanced usage receives configuration object only
 * $("ul li").hoverIntent({
*	sensitivity: 7, // number = sensitivity threshold (must be 1 or higher)
*	interval: 100,   // number = milliseconds of polling interval
*	over: showNav,  // function = onMouseOver callback (required)
*	timeout: 0,   // number = milliseconds delay before onMouseOut function call
*	out: hideNav    // function = onMouseOut callback (required)
* });
 *
 * @param  f  onMouseOver function || An object with configuration options
 * @param  g  onMouseOut function  || Nothing (use configuration options object)
 * @author    Brian Cherne brian(at)cherne(dot)net
 */
(function($) {
	$.fn.hoverIntent = function(f,g) {
		// default configuration options
		var cfg = {
			sensitivity: 7,
			interval: 50,
			timeout: 0
		};
		// override configuration options with user supplied object
		cfg = $.extend(cfg, g ? { over: f, out: g } : f );

		// instantiate variables
		// cX, cY = current X and Y position of mouse, updated by mousemove event
		// pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
				$(ob).unbind("mousemove",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				return cfg.over.apply(ob,[ev]);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
			}
		};

		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			return cfg.out.apply(ob,[ev]);
		};

		// A private function for handling mouse 'hovering'
		var handleHover = function(e) {
			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			var ob = this;

			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// if e.type == "mouseenter"
			if (e.type == "mouseenter") {
				// set "previous" X and Y position based on initial entry point
				pX = ev.pageX; pY = ev.pageY;
				// update "current" X and Y position based on mousemove
				$(ob).bind("mousemove",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

				// else e.type == "mouseleave"
			} else {
				// unbind expensive mousemove event
				$(ob).unbind("mousemove",track);
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
			}
		};

		// bind the function to the two event listeners
		return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover);
	};
})(jQuery);
/**
 * jQuery Masonry v2.1.05
 * A dynamic layout plugin for jQuery
 * The flip-side of CSS Floats
 * http://masonry.desandro.com
 *
 * Licensed under the MIT license.
 * Copyright 2012 David DeSandro
 */
(function(a,b,c){"use strict";var d=b.event,e;d.special.smartresize={setup:function(){b(this).bind("resize",d.special.smartresize.handler)},teardown:function(){b(this).unbind("resize",d.special.smartresize.handler)},handler:function(a,c){var d=this,f=arguments;a.type="smartresize",e&&clearTimeout(e),e=setTimeout(function(){b.event.handle.apply(d,f)},c==="execAsap"?0:100)}},b.fn.smartresize=function(a){return a?this.bind("smartresize",a):this.trigger("smartresize",["execAsap"])},b.Mason=function(a,c){this.element=b(c),this._create(a),this._init()},b.Mason.settings={isResizable:!0,isAnimated:!1,animationOptions:{queue:!1,duration:500},gutterWidth:0,isRTL:!1,isFitWidth:!1,containerStyle:{position:"relative"}},b.Mason.prototype={_filterFindBricks:function(a){var b=this.options.itemSelector;return b?a.filter(b).add(a.find(b)):a},_getBricks:function(a){var b=this._filterFindBricks(a).css({position:"absolute"}).addClass("masonry-brick");return b},_create:function(c){this.options=b.extend(!0,{},b.Mason.settings,c),this.styleQueue=[];var d=this.element[0].style;this.originalStyle={height:d.height||""};var e=this.options.containerStyle;for(var f in e)this.originalStyle[f]=d[f]||"";this.element.css(e),this.horizontalDirection=this.options.isRTL?"right":"left",this.offset={x:parseInt(this.element.css("padding-"+this.horizontalDirection),10),y:parseInt(this.element.css("padding-top"),10)},this.isFluid=this.options.columnWidth&&typeof this.options.columnWidth=="function";var g=this;setTimeout(function(){g.element.addClass("masonry")},0),this.options.isResizable&&b(a).bind("smartresize.masonry",function(){g.resize()}),this.reloadItems()},_init:function(a){this._getColumns(),this._reLayout(a)},option:function(a,c){b.isPlainObject(a)&&(this.options=b.extend(!0,this.options,a))},layout:function(a,b){for(var c=0,d=a.length;c<d;c++)this._placeBrick(a[c]);var e={};e.height=Math.max.apply(Math,this.colYs);if(this.options.isFitWidth){var f=0;c=this.cols;while(--c){if(this.colYs[c]!==0)break;f++}e.width=(this.cols-f)*this.columnWidth-this.options.gutterWidth}this.styleQueue.push({$el:this.element,style:e});var g=this.isLaidOut?this.options.isAnimated?"animate":"css":"css",h=this.options.animationOptions,i;for(c=0,d=this.styleQueue.length;c<d;c++)i=this.styleQueue[c],i.$el[g](i.style,h);this.styleQueue=[],b&&b.call(a),this.isLaidOut=!0},_getColumns:function(){var a=this.options.isFitWidth?this.element.parent():this.element,b=a.width();this.columnWidth=this.isFluid?this.options.columnWidth(b):this.options.columnWidth||this.$bricks.outerWidth(!0)||b,this.columnWidth+=this.options.gutterWidth,this.cols=Math.floor((b+this.options.gutterWidth)/this.columnWidth),this.cols=Math.max(this.cols,1)},_placeBrick:function(a){var c=b(a),d,e,f,g,h;d=Math.ceil(c.outerWidth(!0)/this.columnWidth),d=Math.min(d,this.cols);if(d===1)f=this.colYs;else{e=this.cols+1-d,f=[];for(h=0;h<e;h++)g=this.colYs.slice(h,h+d),f[h]=Math.max.apply(Math,g)}var i=Math.min.apply(Math,f),j=0;for(var k=0,l=f.length;k<l;k++)if(f[k]===i){j=k;break}var m={top:i+this.offset.y};m[this.horizontalDirection]=this.columnWidth*j+this.offset.x,this.styleQueue.push({$el:c,style:m});var n=i+c.outerHeight(!0),o=this.cols+1-l;for(k=0;k<o;k++)this.colYs[j+k]=n},resize:function(){var a=this.cols;this._getColumns(),(this.isFluid||this.cols!==a)&&this._reLayout()},_reLayout:function(a){var b=this.cols;this.colYs=[];while(b--)this.colYs.push(0);this.layout(this.$bricks,a)},reloadItems:function(){this.$bricks=this._getBricks(this.element.children())},reload:function(a){this.reloadItems(),this._init(a)},appended:function(a,b,c){if(b){this._filterFindBricks(a).css({top:this.element.height()});var d=this;setTimeout(function(){d._appended(a,c)},1)}else this._appended(a,c)},_appended:function(a,b){var c=this._getBricks(a);this.$bricks=this.$bricks.add(c),this.layout(c,b)},remove:function(a){this.$bricks=this.$bricks.not(a),a.remove()},destroy:function(){this.$bricks.removeClass("masonry-brick").each(function(){this.style.position="",this.style.top="",this.style.left=""});var c=this.element[0].style;for(var d in this.originalStyle)c[d]=this.originalStyle[d];this.element.unbind(".masonry").removeClass("masonry").removeData("masonry"),b(a).unbind(".masonry")}},b.fn.imagesLoaded=function(a){function h(){a.call(c,d)}function i(a){var c=a.target;c.src!==f&&b.inArray(c,g)===-1&&(g.push(c),--e<=0&&(setTimeout(h),d.unbind(".imagesLoaded",i)))}var c=this,d=c.find("img").add(c.filter("img")),e=d.length,f="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",g=[];return e||h(),d.bind("load.imagesLoaded error.imagesLoaded",i).each(function(){var a=this.src;this.src=f,this.src=a}),c};var f=function(b){a.console&&a.console.error(b)};b.fn.masonry=function(a){if(typeof a=="string"){var c=Array.prototype.slice.call(arguments,1);this.each(function(){var d=b.data(this,"masonry");if(!d){f("cannot call methods on masonry prior to initialization; attempted to call method '"+a+"'");return}if(!b.isFunction(d[a])||a.charAt(0)==="_"){f("no such method '"+a+"' for masonry instance");return}d[a].apply(d,c)})}else this.each(function(){var c=b.data(this,"masonry");c?(c.option(a||{}),c._init()):b.data(this,"masonry",new b.Mason(a,this))});return this}})(window,jQuery);
(function ($) {

	/**
	 * Minimal Height in px of Main Menu (will be set if content is smaller than this)
	 *
	 * @type {String}
	 */
	initialHeight = '139';

	/**
	 * Set or Reset Navigation Height
	 *
	 * @param    int            Height (if 0 - reset)
	 * @return    void
	 */
	function setNavHeight(height) {
		if (!isMobile) {
			nav_primary = $('nav .level-1 > li > a').next();
			space = parseInt(nav_primary.css('padding-top')) + parseInt(nav_primary.css('padding-bottom'));
			if (height && height > initialHeight) {
				setHeight = parseInt(height) + space;
				nav_primary.css('min-height', setHeight + 'px');
				$('.navi-shadow').hide();
			} else {
				setHeight = parseInt(initialHeight) + space;
				nav_primary.css('min-height', setHeight + 'px');
				if (height) {
					$('.navi-shadow').hide();
				} else {
					$('.navi-shadow').show();
				}
			}
		}
	}

	/**
	 * Remove element with a defined class
	 *
	 * @param string	classname classname of elements to be cleaned
	 * @param string	outerElement the element in which the elements with "classname" are (must be with leading "." or "#" !)
	 * @return void
	 */
	function cleanClass(classname, outerElement) {
		if (classname == undefined) {
			return;
		} else if (!outerElement || outerElement == undefined) {
			$('.' + classname).removeClass(classname);
		} else {
			$(outerElement).find('.' + classname).removeClass(classname);
		}
	}

	/**
	 * get max height of subnavigation
	 *
	 * @param        object        DOM element
	 * @return        int            max length
	 */
	function maxHeightOfTree(element) {
		var height = element.outerHeight(true);
		element.children().each(function () {
			var curHeight = maxHeightOfTree($(this));
			if (curHeight > height) {
				height = curHeight;
			}
		});
		return height;
	}

	function navigation() {
		var speed = 250; // in ms

		/**
		 * level-1
		 */
		function level1(element) {
			var $this = element;

			// this part is only for desktop view
			if (!isMobile) {
				cleanClass('hover');
				cleanClass('activepage', 'nav');
				$('nav .level-1 > li > a').removeClass('active'); // remove class "active" from all menu tags
				$this.addClass('active');

				$('.nav-primary').css('z-index', 2); // clean z-index
				$('nav .act').removeClass('act');

				if ($this.parent().hasClass('hassub')) {
					$this.next().addClass('act').css('z-index', '50').fadeIn(speed);
				}

				$('.nav-primary').not('.act').children('.nav-primary-wrap').hide(); // first hide all content divs
				$('.nav-primary').not('.act').delay(speed).fadeOut(100, function () { // fade out white background
					if ($this.parent().hasClass('hassub')) {
						$(this).children('.nav-primary-wrap').show(); // show content divs again when ready with fadeout
					} else {
						$('.navi-shadow').show();
					}
				});

				if ($this.parent().hasClass('hassub')) {
					$this.parent().parent().find('li.subIsActive2').addClass('subIsActive');

					// read height
					var height = initialHeight;
					//if ($this.next().find('.level-2 > .isActive').length) {
					//	var height = maxHeightOfTree($this.next().find('.isActive').find('.level-3'));
					//}
					if ($this.next().find('.level-2 > .hassub').length) {
						var height = maxHeightOfTree($this.next().find('.level-3'));
					}
					setNavHeight(height);

					// reactivate third level if needed
					$('ul.level-3 > li.subIsActive2').addClass('subIsActive');
				}
			} else {
				// add class "active" to current - this is necessary for all menu types (smartphone, tablett, desktop)
				$this.addClass('active');
			}

		}

		// mouseover event with delay for desktop computers
		$('nav .level-1 > li > a').hoverIntent(function () {
			if (!isMobile) {
				level1($(this));
			}
		}, function () {
		});

		// clickevent for pads
		$('nav .level-1 > li > a').click(function (e) {
			if (!isMobile) {
				// not yet open
				if (!$(this).hasClass('active')) {
					e.preventDefault();
					level1($(this));
					// already open
				}
			}
		});

		/**
		 * level-2
		 */
		$('nav .level-2 > li > span > a').hoverIntent({
			sensitivity:10,
			interval:50,
			over:function () {
				if (!isMobile) {
					var $this = $(this).parent().parent();
					if ($this.hasClass('hassub')) {
						cleanClass('hover');
						cleanClass('hideExtraContent');
						cleanClass('subIsActive', 'nav');
						$this.addClass('hover');
						$this.parent().next().addClass('hideExtraContent');

						// get height
						var height = maxHeightOfTree($this.find('.level-3'));
						setNavHeight(height);
					} else {
						$this.siblings('.subIsActive').removeClass('subIsActive');
						cleanClass('hideExtraContent');
						cleanClass('hover');
						$this.addClass('hover');
					}
				}
			},
			out:function () {
			}
		});

		// workaround for old android browsers - set height of wrapping ul
		if (isOldAndroidTablet()) {
			if (!isMobile) {
				$('.nav .level-2').each(function () {
					$(this).css('min-height', '800px');
				});
			}
		}

		/**
		 * level-3
		 */
		$('nav .level-3 > li').hoverIntent({
			sensitivity:10,
			interval:50,
			over:function () {
				if (!isMobile) {
					$('nav .level-3 > li').removeClass('subIsActive');
					$(this).addClass('subIsActive');
				}
			},
			out:function () {
			}
		});

		$('nav .level-3 > li > span > a').hoverIntent(function (e) {
			if (!isMobile) {
				e.stopPropagation();
				$(this).parent().parent().siblings().removeClass('hover');
				$(this).parent().parent().addClass('hover');
			}
		}, function () {
		});

		// ipad show level 4
		if (!$('nav .level-3 li.hassub').find('.openlevel').length) { // if .openlevel is not yet there
			if (!isMobile) {
				$('nav .level-3 li.hassub').prepend('<span class="openlevel">*</span>'); // add openlevel span tag
			}
		}
		$('nav .level-3 .openlevel, nav .level-3 .closelevel').click(function () {
			if (!isMobile) {
				$(this).parent().toggleClass('level-active');
				$(this).toggleClass('closelevel');
			}
		});

		/**
		 * CLOSE : fade out all menus on leave
		 */
		$('nav').mouseleave(function () {
			if (!isMobile) {
				cleanClass('hover');
				cleanClass('hide');
				cleanClass('active', 'nav');
				$(this).find('.nav-primary').fadeOut(speed);
				$('.navi-shadow').show();
				$(this).find('li.isActive').addClass('activepage');
				setNavHeight(0);
			}
		});

	}

	// On DOM Ready
	$(function () {

		navigation();
		setMenuPosition();
		$(window).resize(function() {
			setMenuPosition();
		});


	});

})(jQuery);


function setMenuPosition() {
	if (!isMobile) {
		var menuPosition = $('.level-1 .main.first').offset().left;
		var menuPadding = $('.level-1 .main.first').css('padding-left');
		$('nav .subnav').css('padding-left', parseInt(menuPosition) + parseInt(menuPadding));
	} else {
		$('nav .subnav').css('padding-left', 0);
	}
}
