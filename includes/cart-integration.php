<?php
/**
 * Integración real con el sistema de carrito
 */

// Función para obtener o crear SSID del carrito
function get_cart_ssid() {
    // Intentar obtener SSID existente de la sesión
    if (!session_id()) {
        session_start();
    }
    
    $ssid = $_SESSION['cart_ssid'] ?? null;
    
    if (!$ssid) {
        // Crear nuevo SSID
        $ssid = 'cart_' . uniqid() . '_' . time();
        $_SESSION['cart_ssid'] = $ssid;
    }
    
    return $ssid;
}

// Función para añadir producto al carrito real
function add_to_cart_real($product_id, $concept = '', $detail = '', $periodicity = 12) {
    $ssid = get_cart_ssid();
    $cart_url = get_template_directory_uri() . '/cart.php';
    
    $post_data = array(
        'action' => 'insert_item',
        'product_id' => $product_id,
        'concept' => $concept,
        'detail' => $detail,
        'periodicity' => $periodicity,
        'ssid' => $ssid
    );
    
    $response = wp_remote_post($cart_url, array(
        'body' => $post_data,
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        return array(
            'success' => false,
            'error' => $response->get_error_message()
        );
    }
    
    $body = wp_remote_retrieve_body($response);
    $status_code = wp_remote_retrieve_response_code($response);
    
    $data = json_decode($body, true);
    
    // Si es exitoso, actualizar SSID si viene uno nuevo
    if ($status_code === 201 && isset($data['ssid'])) {
        $_SESSION['cart_ssid'] = $data['ssid'];
    }
    
    return array(
        'success' => $status_code === 201,
        'status_code' => $status_code,
        'data' => $data,
        'ssid' => $ssid
    );
}

// Función para obtener número de items en el carrito
function get_cart_items_count_real() {
    $ssid = get_cart_ssid();
    $cart_url = get_template_directory_uri() . '/cart.php';
    
    $post_data = array(
        'action' => 'num_items',
        'ssid' => $ssid
    );
    
    $response = wp_remote_post($cart_url, array(
        'body' => $post_data,
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        return 0;
    }
    
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    
    return $data['num_items'] ?? 0;
}

// Función para búsqueda de dominios
function search_domain_real($term) {
    $search_url = get_template_directory_uri() . '/domain_search.php?action=create_search';
    
    $response = wp_remote_post($search_url, array(
        'body' => array('term' => $term),
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        return array(
            'success' => false,
            'error' => $response->get_error_message()
        );
    }
    
    $body = wp_remote_retrieve_body($response);
    $status_code = wp_remote_retrieve_response_code($response);
    
    return array(
        'success' => $status_code === 201,
        'status_code' => $status_code,
        'data' => json_decode($body, true)
    );
}

// Función para verificar estado de búsqueda
function check_domain_search_real($reference) {
    $search_url = get_template_directory_uri() . '/domain_search.php?action=check_search&ref=' . urlencode($reference);
    
    $response = wp_remote_get($search_url, array(
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        return array(
            'success' => false,
            'error' => $response->get_error_message()
        );
    }
    
    $body = wp_remote_retrieve_body($response);
    $status_code = wp_remote_retrieve_response_code($response);
    
    return array(
        'success' => $status_code === 200,
        'status_code' => $status_code,
        'data' => json_decode($body, true)
    );
}

// AJAX handler para añadir al carrito real
function handle_add_to_cart_real_ajax() {
    check_ajax_referer('add_to_cart_real_nonce', 'nonce');
    
    $product_id = intval($_POST['product_id']);
    $concept = sanitize_text_field($_POST['concept'] ?? '');
    $detail = sanitize_text_field($_POST['detail'] ?? '');
    $periodicity = intval($_POST['periodicity'] ?? 12);
    
    $result = add_to_cart_real($product_id, $concept, $detail, $periodicity);
    
    wp_send_json($result);
}
add_action('wp_ajax_add_to_cart_real', 'handle_add_to_cart_real_ajax');
add_action('wp_ajax_nopriv_add_to_cart_real', 'handle_add_to_cart_real_ajax');

// AJAX handler para obtener número de items
function handle_get_cart_count_ajax() {
    check_ajax_referer('get_cart_count_nonce', 'nonce');
    
    $count = get_cart_items_count_real();
    
    wp_send_json(array(
        'success' => true,
        'count' => $count
    ));
}
add_action('wp_ajax_get_cart_count', 'handle_get_cart_count_ajax');
add_action('wp_ajax_nopriv_get_cart_count', 'handle_get_cart_count_ajax');

// AJAX handler para búsqueda de dominios
function handle_domain_search_real_ajax() {
    check_ajax_referer('domain_search_real_nonce', 'nonce');
    
    $term = sanitize_text_field($_POST['term'] ?? '');
    
    if (empty($term)) {
        wp_send_json_error('Término de búsqueda requerido');
    }
    
    $result = search_domain_real($term);
    
    wp_send_json($result);
}
add_action('wp_ajax_domain_search_real', 'handle_domain_search_real_ajax');
add_action('wp_ajax_nopriv_domain_search_real', 'handle_domain_search_real_ajax');

// Función para obtener product_id por TLD (para dominios)
function get_domain_product_id($tld) {
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

// Función para obtener product_id por título (para servidores)
function get_server_product_id($title) {
    $product_ids = array(
        'Server Inicio' => 1001,
        'Server Avanzado' => 1002,
        'Server Profesional' => 1003,
        'Server Agencia' => 1004
    );
    return $product_ids[$title] ?? 1001;
} 