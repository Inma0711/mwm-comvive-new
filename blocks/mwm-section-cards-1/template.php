<?php
/**
 * Block Name: MWM Section Cards 1
 */

$title = get_field('title');
$description = get_field('description');
$cards = get_field('cards');
?>

<section class="mwm-section-cards-1">
    <div class="mwm-max">
        <div class="mwm-wrapper">
            <div class="mwm-section-cards-1__container">
                <?php if ($title) : ?>
                    <h2 class="mwm-section-cards-1__title">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($cards) : ?>
                    <div class="mwm-section-cards-1__list">
                        <?php foreach ($cards as $card) : ?>
                            <div class="mwm-card-1" style="background-color: <?php echo $card['bg_color']; ?>; color: <?php echo $card['text_color']; ?>">
        
                                <?php if ($card['title']) : ?>
                                    <h3 class="mwm-card-1__title">
                                        <?php echo $card['title']; ?>
                                    </h3>
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
                                           data-product-description="<?php echo esc_attr($card['description']); ?>">
                                            <?php echo esc_html($card['btn_text']); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
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
    
    // Manejar clics en botones de "Añadir al carrito" para mwm-section-cards-1
    $('.mwm-section-cards-1 .add-to-cart-btn').on('click', function(e) {
        e.preventDefault();
        
        var $button = $(this);
        var productTitle = $button.data('product-title');
        var productDescription = $button.data('product-description');
        
        // Verificar si el enlace ya está añadido
        if ($button.hasClass('added-to-cart')) {
            return false;
        }
        
        // Cambiar estado del enlace
        $button.addClass('added-to-cart');
        $button.text('Añadiendo...');
        
        // Simular proceso de añadir al carrito
        setTimeout(function() {
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
            console.log('Producto añadido al carrito:', {
                title: productTitle,
                description: productDescription,
                timestamp: new Date().toISOString()
            });
            
            // Opcional: Mostrar notificación
            console.log('✅ Producto "' + productTitle + '" añadido al carrito correctamente');
            
        }, 1000);
    });
});
</script> 