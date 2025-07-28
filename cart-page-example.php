<?php
/**
 * Ejemplo de página de carrito profesional
 * Este archivo muestra cómo crear una página completa del carrito
 */

// Obtener items del carrito
function get_cart_items() {
    $ssid = get_cart_ssid();
    $cart_url = get_template_directory_uri() . '/cart.php';
    
    $post_data = array(
        'action' => 'get_items',
        'ssid' => $ssid
    );
    
    $response = wp_remote_post($cart_url, array(
        'body' => $post_data,
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        return array();
    }
    
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    
    return $data['items'] ?? array();
}

// Obtener total del carrito
function get_cart_total() {
    $items = get_cart_items();
    $total = 0;
    
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    
    return $total;
}

// Procesar checkout
function process_checkout() {
    // Aquí iría la lógica de checkout
    // Integración con pasarela de pago
    // Crear pedido en la base de datos
    // Enviar confirmación por email
}

get_header();
?>

<div class="cart-page">
    <div class="container">
        <h1>Tu Carrito</h1>
        
        <?php
        $cart_items = get_cart_items();
        $cart_total = get_cart_total();
        
        if (empty($cart_items)): ?>
            <div class="empty-cart">
                <p>Tu carrito está vacío</p>
                <a href="<?php echo home_url(); ?>" class="btn">Continuar Comprando</a>
            </div>
        <?php else: ?>
            
            <div class="cart-items">
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item" data-item-id="<?php echo $item['id']; ?>">
                        <div class="item-info">
                            <h3><?php echo esc_html($item['concept']); ?></h3>
                            <p><?php echo esc_html($item['detail']); ?></p>
                        </div>
                        
                        <div class="item-price">
                            <?php echo number_format($item['price'], 2); ?>€
                        </div>
                        
                        <div class="item-quantity">
                            <button class="qty-btn minus" data-item-id="<?php echo $item['id']; ?>">-</button>
                            <input type="number" value="<?php echo $item['quantity']; ?>" min="1" class="qty-input">
                            <button class="qty-btn plus" data-item-id="<?php echo $item['id']; ?>">+</button>
                        </div>
                        
                        <div class="item-total">
                            <?php echo number_format($item['price'] * $item['quantity'], 2); ?>€
                        </div>
                        
                        <button class="remove-item" data-item-id="<?php echo $item['id']; ?>">
                            Eliminar
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="cart-summary">
                <div class="subtotal">
                    <span>Subtotal:</span>
                    <span><?php echo number_format($cart_total, 2); ?>€</span>
                </div>
                
                <div class="taxes">
                    <span>IVA (21%):</span>
                    <span><?php echo number_format($cart_total * 0.21, 2); ?>€</span>
                </div>
                
                <div class="total">
                    <span>Total:</span>
                    <span><?php echo number_format($cart_total * 1.21, 2); ?>€</span>
                </div>
                
                <button class="checkout-btn" onclick="processCheckout()">
                    Proceder al Pago
                </button>
            </div>
            
        <?php endif; ?>
    </div>
</div>

<script>
// Funcionalidades del carrito
jQuery(document).ready(function($) {
    
    // Cambiar cantidad
    $('.qty-btn').click(function() {
        const itemId = $(this).data('item-id');
        const $input = $(this).siblings('.qty-input');
        let qty = parseInt($input.val());
        
        if ($(this).hasClass('plus')) {
            qty++;
        } else if ($(this).hasClass('minus') && qty > 1) {
            qty--;
        }
        
        $input.val(qty);
        updateItemQuantity(itemId, qty);
    });
    
    // Eliminar item
    $('.remove-item').click(function() {
        const itemId = $(this).data('item-id');
        removeCartItem(itemId);
    });
    
    // Actualizar cantidad en servidor
    function updateItemQuantity(itemId, quantity) {
        $.ajax({
            url: mwm_ajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'update_cart_item',
                nonce: mwm_ajax.add_to_cart_nonce,
                item_id: itemId,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Recargar para actualizar totales
                }
            }
        });
    }
    
    // Eliminar item del carrito
    function removeCartItem(itemId) {
        $.ajax({
            url: mwm_ajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'remove_cart_item',
                nonce: mwm_ajax.add_to_cart_nonce,
                item_id: itemId
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    }
});

// Procesar checkout
function processCheckout() {
    // Aquí iría la lógica de checkout
    // Redirigir a pasarela de pago o página de confirmación
    window.location.href = '<?php echo home_url("/checkout"); ?>';
}
</script>

<?php get_footer(); ?> 