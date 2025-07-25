<?php
/**
 * Template del bloque de configuración de precios de dominios
 */

// Obtener los datos del bloque
$domain_prices_config = get_field('domain_prices_config');

// Si hay datos, guardarlos en las opciones de WordPress
if ($domain_prices_config && is_array($domain_prices_config)) {
    $prices_to_save = array();
    
    foreach ($domain_prices_config as $domain_row) {
        $extension = $domain_row['extension'] ?? '';
        $price = $domain_row['price'] ?? '';
        
        if ($extension && $price) {
            $prices_to_save[$extension] = $price;
        }
    }
    
    // Guardar en las opciones de WordPress
    update_option('mwm_domain_prices', $prices_to_save);
    

}

// Mostrar la configuración actual
$current_prices = get_option('mwm_domain_prices', array());
?>

<div class="mwm-domain-prices-config">
    <div class="mwm-domain-prices-config__header">
        <h3>Configuración de Precios de Dominios</h3>
        <p>Los precios configurados aquí se usarán en los bloques de búsqueda de dominios.</p>
    </div>
    
    <?php if (!empty($current_prices)): ?>
        <div class="mwm-domain-prices-config__current">
            <h4>Precios Actuales:</h4>
            <table class="mwm-domain-prices-config__table">
                <thead>
                    <tr>
                        <th>Extensión</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($current_prices as $extension => $price): ?>
                        <tr>
                            <td><strong>.<?php echo esc_html($extension); ?></strong></td>
                            <td><?php echo esc_html($price); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="mwm-domain-prices-config__empty">
            <p>No hay precios configurados. Usa el formulario de arriba para añadir precios.</p>
        </div>
    <?php endif; ?>
    
    <div class="mwm-domain-prices-config__info">
        <p><strong>Nota:</strong> Los cambios se guardan automáticamente cuando actualizas la página.</p>
    </div>
</div>

<style>
.mwm-domain-prices-config {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.mwm-domain-prices-config__header h3 {
    margin: 0 0 10px 0;
    color: #333;
}

.mwm-domain-prices-config__header p {
    margin: 0 0 20px 0;
    color: #666;
}

.mwm-domain-prices-config__current h4 {
    margin: 0 0 15px 0;
    color: #333;
}

.mwm-domain-prices-config__table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 4px;
    overflow: hidden;
}

.mwm-domain-prices-config__table th,
.mwm-domain-prices-config__table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.mwm-domain-prices-config__table th {
    background: #0073aa;
    color: white;
    font-weight: 600;
}

.mwm-domain-prices-config__table tr:hover {
    background: #f5f5f5;
}

.mwm-domain-prices-config__empty {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    padding: 15px;
    border-radius: 4px;
    color: #856404;
}

.mwm-domain-prices-config__info {
    margin-top: 20px;
    padding: 15px;
    background: #d1ecf1;
    border: 1px solid #bee5eb;
    border-radius: 4px;
    color: #0c5460;
}
</style> 