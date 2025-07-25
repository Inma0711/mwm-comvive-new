<?php
/**
 * Block Name: MWM Section Cards 3
 */

$title = get_field('title');
$cards = get_field('cards');
$footer_description = get_field('footer_description');
?>

<section class="mwm-section-cards-3">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-section-cards-3__container">
                <?php if ($title) : ?>
                    <h2 class="mwm-section-cards-3__title">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($cards) : ?>
                    <div class="mwm-section-cards-3__list">
                        <?php foreach ($cards as $card) : ?>
                            <div class="mwm-card-1" style="background-color: <?php echo $card['bg_color']; ?>; color: <?php echo $card['text_color']; ?>">
        
                                <?php if ($card['title']) : ?>
                                    <h3 class="mwm-card-1__title">
                                        <?php echo $card['title']; ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($card['price'] || $card['months']) : ?>
                                    <div class="mwm-card-1__price-container">
                                        <?php if ($card['price']) : ?>
                                            <div class="mwm-card-1__price">
                                                <?php echo $card['price']; ?>
                                            </div>
                                        <?php endif; ?>
        
                                        <?php if ($card['months']) : ?> 
                                            <div class="mwm-card-1__months">
                                                <?php echo $card['months']; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

        
                                <?php if ($card['description']) : ?>
                                    <div class="mwm-card-1__desc">
                                        <?php echo $card['description']; ?>
                                    </div>
                                <?php endif; ?>
        
                                <?php if ($card['btn_text']) : ?>
                                    <div class="mwm-card-1__btn" style="background-color: <?php echo $card['text_color']; ?>;">
                                        <a href="#" class="mwm-btn add-to-cart-btn" 
                                           data-product-title="<?php echo esc_attr($card['title']); ?>"
                                           data-product-price="<?php echo esc_attr($card['price']); ?>"
                                           data-product-months="<?php echo esc_attr($card['months']); ?>">
                                            <?php echo esc_html($card['btn_text']); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($footer_description) : ?>
                    <div class="mwm-section-cards-3__desc">
                        <?php echo $footer_description; ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    // Función para oscurecer un color
    function getDarkerColor(color) {
        // Convertir color RGB a valores numéricos
        var rgb = color.match(/\d+/g);
        if (rgb && rgb.length >= 3) {
            var r = parseInt(rgb[0]);
            var g = parseInt(rgb[1]);
            var b = parseInt(rgb[2]);
            
            // Oscurecer el color (reducir en un 30%)
            r = Math.max(0, Math.floor(r * 0.7));
            g = Math.max(0, Math.floor(g * 0.7));
            b = Math.max(0, Math.floor(b * 0.7));
            
            return 'rgb(' + r + ', ' + g + ', ' + b + ')';
        }
        return color; // Si no se puede procesar, devolver el color original
    }
    
    // Función para obtener product_id basado en el título
    function getProductIdFromTitle(title) {
        // Mapeo de títulos a product_ids (ajustar según tus productos)
        var productMap = {
            'Server Inicio': 1001,
            'Server Avanzado': 1002,
            'Server Profesional': 1003,
            'Server Agencia': 1004
        };
        return productMap[title] || 1001; // Default
    }
    
    // Función para obtener periodicity basado en los meses
    function getPeriodicityFromMonths(months) {
        // Extraer número de meses del texto
        var match = months.match(/(\d+)/);
        if (match) {
            var numMonths = parseInt(match[1]);
            // Validar periodicity según cart.php
            if ([1, 12, 24, 36].includes(numMonths)) {
                return numMonths;
            }
        }
        return 12; // Default
    }
    
    // Función para actualizar contador del carrito
    function updateCartCount() {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'get_cart_count',
                nonce: '<?php echo wp_create_nonce('get_cart_count_nonce'); ?>'
            },
            success: function(response) {
                if (response.success) {
                    console.log('🛒 Items en carrito:', response.count);
                    // Aquí puedes actualizar un contador visual en la página
                    // $('.cart-count').text(response.count);
                }
            }
        });
    }
    
    // Manejar clics en botones de "Añadir al carrito"
    $('.mwm-section-cards-3 .add-to-cart-btn').on('click', function(e) {
        e.preventDefault();
        
        var $button = $(this);
        var productTitle = $button.data('product-title');
        var productPrice = $button.data('product-price');
        var productMonths = $button.data('product-months');
        
        // Verificar si el enlace ya está añadido
        if ($button.hasClass('added-to-cart')) {
            return false;
        }
        
        // Cambiar estado del enlace
        $button.addClass('added-to-cart');
        $button.text('Añadiendo...');
        
        // Añadir al carrito real con SSID
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'add_to_cart_real',
                nonce: '<?php echo wp_create_nonce('add_to_cart_real_nonce'); ?>',
                product_id: getProductIdFromTitle(productTitle),
                concept: productTitle,
                detail: productPrice + ' - ' + productMonths,
                periodicity: getPeriodicityFromMonths(productMonths)
            },
            success: function(response) {
                if (response.success) {
                    // Cambiar a estado "añadido"
                    $button.text('¡Añadido!');
                    
                    // Obtener el color original del contenedor padre
                    var $parentBtn = $button.closest('.mwm-card-1__btn');
                    var originalColor = $parentBtn.css('background-color');
                    
                    // Crear una versión más oscura del color original
                    var darkerColor = getDarkerColor(originalColor);
                    
                    // Aplicar el color oscuro al contenedor padre
                    $parentBtn.css({
                        'background-color': darkerColor + ' !important'
                    });
                    
                    $button.css({
                        'color': 'white'
                    });
                    
                    // Log en consola para verificar
                    console.log('✅ Producto añadido al carrito real:', {
                        title: productTitle,
                        price: productPrice,
                        months: productMonths,
                        cart_data: response.data,
                        ssid: response.ssid,
                        num_items: response.data.num_items,
                        timestamp: new Date().toISOString()
                    });
                    
                    // Opcional: Actualizar contador del carrito en la página
                    updateCartCount();
                } else {
                    // Error al añadir al carrito
                    $button.text('Error');
                    $button.css('background-color', '#dc3545');
                    console.error('❌ Error al añadir al carrito:', response);
                }
            },
            error: function(xhr, status, error) {
                // Error de conexión
                $button.text('Error');
                $button.css('background-color', '#dc3545');
                console.error('❌ Error de conexión:', error);
            }
        });
    });
});
</script> 