<?php
/**
 * Funciones para manejo de dominios y precios
 */

// Función para obtener precios de dominios desde opciones de WordPress
function get_domain_prices_from_options() {
    $domain_prices = get_option('mwm_domain_prices', array());
    
    // Si no hay precios configurados, usar precios por defecto
    if (empty($domain_prices)) {
        $domain_prices = array(
            'com' => '14€',
            'es' => '20€',
            'net' => '14.00€',
            'com.es' => '12.00€',
            'io' => '25€',
            'org' => '14€',
            'ai' => '35€'
        );
        
        // Guardar precios por defecto
        update_option('mwm_domain_prices', $domain_prices);
    }
    
    // Convertir a formato esperado por los bloques
    $formatted_prices = array();
    foreach ($domain_prices as $tld => $price) {
        $formatted_prices[$tld] = array(
            'price' => $price,
            'status' => 'Disponible para registro',
            'product_id' => get_product_id_by_tld($tld)
        );
    }
    
    return $formatted_prices;
}



// Función auxiliar para obtener product_id por TLD
function get_product_id_by_tld($tld) {
    $product_ids = array(
        'com' => '40',
        'es' => '72',
        'io' => '101',
        'org' => '94',
        'net' => '93',
        'ai' => '102',
        'com.es' => '95'
    );
    
    return $product_ids[$tld] ?? '0';
} 