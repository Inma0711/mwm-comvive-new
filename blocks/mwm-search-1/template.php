<?php
/**
 * Block Name: MWM Search 1
 */

$title = get_field('title');
$description_1 = get_field('description_1');
$description_2 = get_field('description_2');

// Obtener los precios de dominios desde opciones de WordPress
$domain_prices_from_acf = get_domain_prices_from_options();



// Si no hay precios de ACF, usar los precios por defecto
if (empty($domain_prices_from_acf)) {
    $domain_prices_from_acf = array(
        'com' => array('price' => '14 €', 'status' => 'Registrado, traer a Comvive', 'product_id' => '40'),
        'es' => array('price' => '20 €', 'status' => 'Registrado, traer a Comvive', 'product_id' => '72'),
        'io' => array('price' => '25 €', 'status' => 'Disponible para registro', 'product_id' => '101'),
        'org' => array('price' => '14 €', 'status' => 'Registrado, traer a Comvive', 'product_id' => '94'),
        'net' => array('price' => '14.00 €', 'status' => 'Registrado, traer a Comvive', 'product_id' => '93'),
        'ai' => array('price' => '35 €', 'status' => 'Disponible para registro', 'product_id' => '102'),
        'com.es' => array('price' => '12.00 €', 'status' => 'Registrado, traer a Comvive', 'product_id' => '95')
    );
}
?>

<section class="mwm-search-1">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-search-1__header">
				<h2 class="mwm-search-1__title is-style-h100"><?php echo $title; ?></h2>
				<div class="mwm-search-1__desc is-style-h400"><?php echo $description_1; ?></div>
			</div>
			<div class="mwm-search-1__content">
				<form action="#" class="mwm-search-1__form">
					<div class="mwm-search-1__form-item">
						<input type="text" id="search-domains" placeholder="Encontrar un dominio">
						<button type="submit" id="search-domains-button"><?php esc_html_e('Buscar', 'comvive'); ?></button>
					</div>
					<ul class="mwm-search-1__domains-options">
						<?php 
						$option_counter = 1;
						$tlds_to_show = array('com', 'es', 'io', 'org', 'net', 'ai');
						
						foreach ($tlds_to_show as $tld) {
							// Obtener precio directamente de ACF
							$price = '14 €'; // Precio por defecto
							$price_old = '14 €'; // Precio tachado fijo
							
							// Buscar el precio en los datos de ACF
							if (isset($domain_prices_from_acf[$tld])) {
								$price = $domain_prices_from_acf[$tld]['price'];
							}
							

							?>
							<li class="mwm-search-1__domains-option">
								<input type="checkbox" id="search-domains-option-<?php echo $option_counter; ?>" value="<?php echo $tld; ?>">
								<label for="search-domains-option-<?php echo $option_counter; ?>">
									<span class="mwm-search-1__domains-option-name"><?php echo '.' . $tld; ?></span>
									<span class="mwm-search-1__domains-option-price-old"><?php echo $price_old; ?></span>
									<span class="mwm-search-1__domains-option-price"><?php echo $price; ?></span>
								</label>
							</li>
							<?php
							$option_counter++;
						}
						?>
					</ul>
				</form>

				<div class="domain-results" id="domain_results_container" style="display: none;">
					<table id="results">
						<thead>
							<tr>
								<th>Dominio</th>
								<th>Estado</th>
								<th>Precio</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<template id="template_row">
						<tr data-tld="">
							<td></td>
							<td></td>
							<td></td>
							<td>
								<form action="#" method="post">
									<input type="hidden" name="concept" value="">
									<input type="hidden" name="product_id" value="">
									<input type="submit" name="submit" value="Añadir al carrito" class="btn_producto">
								</form>
							</td>
						</tr>
					</template>
				</div>
			</div>
			<div class="mwm-search-1__footer">
				<?php echo $description_2; ?>
			</div>
		</div>
	</div>
</section>

<script>
jQuery(document).ready(function($) {
    // Datos de dominios desde ACF
                    const domainData = <?php echo json_encode($domain_prices_from_acf); ?>;


    // Manejar el envío del formulario
    $('.mwm-search-1__form').on('submit', function(e) {
        e.preventDefault();
        const domainName = $('#search-domains').val().trim();
        if (!domainName) return;

        // Obtener los TLDs seleccionados
        const selectedTLDs = $('.mwm-search-1__domains-options input:checked').map(function() {
            return $(this).val();
        }).get();

        console.log('TLDs seleccionados:', selectedTLDs);

        const tbody = $('#results tbody');
        tbody.empty();

        // Si no hay TLDs seleccionados, mostrar todos los disponibles
        const tldsToShow = selectedTLDs.length > 0 ? selectedTLDs : Object.keys(domainData);
        
        console.log('TLDs a mostrar:', tldsToShow);

        tldsToShow.forEach(function(tld) {
            // Verificar si el TLD existe en los datos
            if (!domainData[tld]) {
                console.warn('TLD no encontrado en datos:', tld);
                return;
            }

            const template = $('#template_row').html();
            const $row = $(template);
            $row.attr('data-tld', tld);

            const domain = `${domainName}.${tld}`;
            const data = domainData[tld];

            $row.find('td:first-child').html(`${domainName}<strong>.${tld}</strong>`);
            $row.find('td:nth-child(2)').text(data.status);
            $row.find('td:nth-child(3)').text(data.price);

            const $form = $row.find('form');
            $form.find('[name="concept"]').val(domain);
            $form.find('[name="product_id"]').val(data.product_id);

            tbody.append($row);
        });

        $('#domain_results_container').show();
    });
	
    // Manejar el envío de los formularios de "Añadir al carrito"
    $(document).off('submit', '.domain-results form').on('submit', '.domain-results form', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $button = $form.find('input[type="submit"]');
        
        // Verificar si ya está añadido al carrito
        if ($button.hasClass('added-to-cart')) {
            return false;
        }
        
        // Evitar múltiples envíos si ya está procesando
        if ($button.prop('disabled')) {
            return false;
        }
        
        const originalText = $button.val();
        
        // Cambiar el texto del botón para mostrar que se está procesando
        $button.val('Añadiendo...').prop('disabled', true);
        
        // Obtener los datos del formulario
        const formData = {
            concept: $form.find('[name="concept"]').val(),
            product_id: $form.find('[name="product_id"]').val(),
            action: 'add_to_cart'
        };
        
        // Simular el envío al carrito (aquí puedes integrar con tu sistema de carrito)
        setTimeout(function() {
            // Marcar como añadido al carrito
            $button.addClass('added-to-cart');
            
            // Cambiar el botón permanentemente
            $button.val('Ya añadido').prop('disabled', true).css({
                'background-color': '#95a5a6',
                'cursor': 'not-allowed'
            });
            
            // Aquí puedes agregar la lógica real para añadir al carrito
            console.log('Dominio añadido al carrito:', formData);
            
        }, 1000);
    });
});
</script> 