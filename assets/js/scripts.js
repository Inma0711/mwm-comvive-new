/*==================================================================
	TABLE OF CONTENTS
====================================================================
	# MWM HEADER
	# MWM GTRANSLATE
	# SWIPER
	# MWM FILTER
	# MWM POPUP
*/

/*	# MWM HEADER
=============================================== */

var opening;
jQuery(document).ready(function () {

	// OPEN MENU WHEN CLICK ON BARS
	jQuery('.mwm-header__toggle').click(function () {
		opening = false;
		jQuery('.mwm-header__menu-container').toggleClass('is-opened');
		jQuery('body').toggleClass('offcanvas-overlay');
		setTimeout(function() {
			opening = true;
		}, 500);
	});

	// CREATE ELEMENT TO OPEN MENU ON MOBILE (ARROW)
	jQuery('.menu-item-has-children > a, .page_item_has_children > a').append(
		`<svg class="menu-item__btn" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7 9.62422L11.375 5.24922L10.7625 4.63672L7 8.39922L3.2375 4.63672L2.625 5.24922L7 9.62422Z" fill="#2A2622"/>
		</svg>`
	);

	// TOGGLE CLASS ONCE, WHEN CLICKING THE ARROW
	jQuery(document).on('click', '.menu-item-has-children > a > svg', function (event) {
		event.stopPropagation();
		event.preventDefault();
		jQuery(this).parent().parent().toggleClass('is-open');
		jQuery(this).parent().parent().children('.sub-menu, .children').toggle();
		jQuery(this).parent().parent().children('.menu-item__btn').toggleClass('rotate');
	});

	// SET HEADER HEIGHT
	const headerHeight = () => {
		const doc = document.documentElement;
		let header = jQuery('.mwm-header').innerHeight();
		doc.style.setProperty('--header-height', `${header}px`);
	};

	window.addEventListener('resize', headerHeight);

	headerHeight();
});

/*	# SWIPER
=============================================== */

jQuery(document).ready(function() {

	jQuery('.mwm-slider-1').each(function() {
		var swiperId = jQuery(this).find('.swiper').attr('id');
		var swiperPrevId = swiperId + '-prev';
		var swiperNextId = swiperId + '-next';

		var swiper = new Swiper('#' + swiperId, {
			loop: true,
			slidesPerView: 1,
			spaceBetween: 20,
			autoplay: {
				delay: 4500,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '#' + swiperNextId,
				prevEl: '#' + swiperPrevId,
			},
			breakpoints: {
				1024: {
					slidesPerView: 2,
				},
			},
			on: {
				init: function(swiper) {
					updateCounter(swiper);
				},
				slideChange: function(swiper) {
					updateCounter(swiper);
				}
			}
		});
		function updateCounter(swiper) {
			var currentSlide = swiper.realIndex + 1; // Adjusting for the real index
	
			$this.find('.mwm-slider-1__current').text(currentSlide);
		}
	});

});

/*	# MWM FAQs
=============================================== */

jQuery(document).ready(function($){
	$('.mwm-faqs__row-header').click(function(){
		$(this).toggleClass('is-active');
		$(this).parent().find('.mwm-faqs__row-content').slideToggle(300);
	});
});