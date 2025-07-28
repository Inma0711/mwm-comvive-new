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

/*	# MWM CART
=============================================== */

jQuery(document).ready(function($){
	// Inicializar el contador del carrito en 0
	let cartCount = 0;
	updateCartCount(cartCount);
	
	// Función para actualizar el contador del carrito
	function updateCartCount(count) {
		const cartCountElement = $('#mwm-cart-count');
		if (cartCountElement.length) {
			cartCountElement.text(count);
			
			// Añadir animación si el contador cambia
			if (count > 0) {
				cartCountElement.addClass('has-items');
			} else {
				cartCountElement.removeClass('has-items');
			}
		}
	}
	
	// Función para incrementar el contador local
	function incrementCartCount() {
		cartCount++;
		localStorage.setItem('mwm_cart_count', cartCount);
		updateCartCount(cartCount);
		
		// Añadir animación al contador
		$('#mwm-cart-count').addClass('pulse');
		setTimeout(function() {
			$('#mwm-cart-count').removeClass('pulse');
		}, 300);
		
		console.log('🛒 Contador incrementado a:', cartCount);
	}
	
	// Función para añadir item al carrito (versión simple)
	window.addToCart = function() {
		let currentCount = parseInt(localStorage.getItem('mwm_cart_count') || 0);
		currentCount++;
		localStorage.setItem('mwm_cart_count', currentCount);
		updateCartCount(currentCount);
		
		// Añadir animación al contador
		$('#mwm-cart-count').addClass('pulse');
		setTimeout(function() {
			$('#mwm-cart-count').removeClass('pulse');
		}, 300);
		
		console.log('Item agregado al carrito. Total:', currentCount);
	}
	
	// Función para añadir dominio al carrito (integración con el sistema real)
	window.addDomainToCart = function(domainName, tld, productId) {
		// Llamar al sistema real de carrito
		$.ajax({
			url: mwm_ajax.ajaxurl,
			type: 'POST',
			data: {
				action: 'add_to_cart_real',
				nonce: mwm_ajax.add_to_cart_nonce,
				product_id: productId,
				concept: domainName + '.' + tld,
				detail: 'Registro de dominio',
				periodicity: 12
			},
			success: function(response) {
				if (response.success) {
					// Incrementar contador local
					incrementCartCount();
					
					console.log('✅ Dominio agregado al carrito real:', domainName + '.' + tld);
					console.log('SSID del carrito:', response.ssid);
				} else {
					console.error('❌ Error al agregar dominio al carrito:', response.error);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error en la petición AJAX:', error);
			}
		});
	}
	
	// Función para limpiar el carrito
	window.clearCart = function() {
		localStorage.removeItem('mwm_cart_count');
		updateCartCount(0);
		console.log('Carrito limpiado');
	}
	
	// Click en el ícono del carrito
	$('#mwm-cart-icon').click(function(e) {
		e.preventDefault();
		console.log('Carrito clickeado - Items:', cartCount);
	});
	
	// Interceptar clicks en botones de "Agregar dominio" o similares
	$(document).on('click', '[data-add-domain], .add-domain-btn, .domain-add-btn', function(e) {
		e.preventDefault();
		
		const $btn = $(this);
		const domainName = $btn.data('domain') || $btn.closest('[data-domain]').data('domain');
		const tld = $btn.data('tld') || $btn.closest('[data-tld]').data('tld');
		const productId = $btn.data('product-id') || $btn.closest('[data-product-id]').data('product-id');
		
		if (domainName && tld && productId) {
			addDomainToCart(domainName, tld, productId);
		} else {
			// Fallback: solo incrementar contador
			addToCart();
		}
	});
	
	// Interceptar directamente el submit de formularios de dominios
	$(document).on('submit', '.domain-results form', function(e) {
		const $form = $(this);
		const $button = $form.find('.btn_producto');
		const concept = $form.find('[name="concept"]').val();
		const productId = $form.find('[name="product_id"]').val();
		
		console.log('🔄 Formulario de dominio enviado:', concept);
		
		// No prevenir el comportamiento por defecto
		// Solo vamos a escuchar y actualizar nuestro contador
		
		// Esperar a que el sistema existente procese
		setTimeout(function() {
			// Verificar si el botón cambió de estado
			if ($button.hasClass('added-to-cart') || $button.val() === '¡Añadido!' || $button.val() === 'Ya añadido') {
				incrementCartCount();
				console.log('✅ Dominio agregado exitosamente:', concept);
			} else {
				console.log('❌ Dominio no se agregó:', concept);
			}
		}, 1000);
	});
	
	// También escuchar clicks directos en botones
	$(document).on('click', '.btn_producto', function() {
		const $button = $(this);
		const $form = $button.closest('form');
		
		if ($form.length && !$button.hasClass('added-to-cart')) {
			const concept = $form.find('[name="concept"]').val();
			console.log('🖱️ Click en botón de dominio:', concept);
			
			// Esperar a que se procese
			setTimeout(function() {
				if ($button.hasClass('added-to-cart') || $button.val() === '¡Añadido!' || $button.val() === 'Ya añadido') {
					incrementCartCount();
					console.log('✅ Dominio agregado por click:', concept);
				}
			}, 1000);
		}
	});
	
	// Interceptar todas las respuestas AJAX para detectar cuando se agrega un dominio
	$(document).ajaxSuccess(function(event, xhr, settings) {
		if (settings.url && settings.url.includes('admin-ajax.php')) {
			try {
				const response = JSON.parse(xhr.responseText);
				if (response.success && settings.data && settings.data.includes('add_to_cart_real')) {
					console.log('🎯 Respuesta AJAX detectada:', response);
					incrementCartCount();
					console.log('✅ Contador incrementado por respuesta AJAX');
				}
			} catch (e) {
				// No es JSON válido, ignorar
			}
		}
	});
	
	// El contador empieza en 0 y se incrementa según se agreguen dominios
	console.log('🛒 Carrito inicializado en 0');
});