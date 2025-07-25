<?php
/**
 * Block Name: MWM Search 1
 */

$title = get_field('title');
$description_1 = get_field('description_1');
$description_2 = get_field('description_2');
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
						<li class="mwm-search-1__domains-option">
							<input type="checkbox" id="search-domains-option-1" value="com">
							<label for="search-domains-option-1">
								<span class="mwm-search-1__domains-option-name"><?php esc_html_e('.com', 'comvive'); ?></span>
								<span class="mwm-search-1__domains-option-price-old">14 €</span>
								<span class="mwm-search-1__domains-option-price">12 €</span>
							</label>
						</li>
						<li class="mwm-search-1__domains-option">
							<input type="checkbox" id="search-domains-option-2" value="es">
							<label for="search-domains-option-2">
								<span class="mwm-search-1__domains-option-name"><?php esc_html_e('.es', 'comvive'); ?></span>
								<span class="mwm-search-1__domains-option-price-old">14 €</span>
								<span class="mwm-search-1__domains-option-price">12 €</span>
							</label>
						</li>
						<li class="mwm-search-1__domains-option">
							<input type="checkbox" id="search-domains-option-3" value="io">
							<label for="search-domains-option-3">
								<span class="mwm-search-1__domains-option-name"><?php esc_html_e('.io', 'comvive'); ?></span>
								<span class="mwm-search-1__domains-option-price-old">14 €</span>
								<span class="mwm-search-1__domains-option-price">12 €</span>
							</label>
						</li>
						<li class="mwm-search-1__domains-option">
							<input type="checkbox" id="search-domains-option-4" value="org">
							<label for="search-domains-option-4">
								<span class="mwm-search-1__domains-option-name"><?php esc_html_e('.org', 'comvive'); ?></span>
								<span class="mwm-search-1__domains-option-price-old">14 €</span>
								<span class="mwm-search-1__domains-option-price">12 €</span>
							</label>
						</li>
						<li class="mwm-search-1__domains-option">
							<input type="checkbox" id="search-domains-option-5" value="net">
							<label for="search-domains-option-5">
								<span class="mwm-search-1__domains-option-name"><?php esc_html_e('.net', 'comvive'); ?></span>
								<span class="mwm-search-1__domains-option-price-old">14 €</span>
								<span class="mwm-search-1__domains-option-price">12 €</span>
							</label>
						</li>
						<li class="mwm-search-1__domains-option">
							<input type="checkbox" id="search-domains-option-6" value="ai">
							<label for="search-domains-option-6">
								<span class="mwm-search-1__domains-option-name"><?php esc_html_e('.ai', 'comvive'); ?></span>
								<span class="mwm-search-1__domains-option-price-old">14 €</span>
								<span class="mwm-search-1__domains-option-price">12 €</span>
							</label>
						</li>
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
    // Datos de ejemplo para los dominios
    const domainData = {
        'com': { price: '14 €', status: 'Registrado, traer a Comvive', product_id: '40' },
        'es': { price: '0 €', status: 'Registrado, traer a Comvive', product_id: '72' },
        'com.es': { price: '0 €', status: 'Registrado, traer a Comvive', product_id: '95' },
        'org': { price: '14 €', status: 'Registrado, traer a Comvive', product_id: '94' },
        'net': { price: '14 €', status: 'Registrado, traer a Comvive', product_id: '93' },
        'info': { price: '16 €', status: 'Registrado, traer a Comvive', product_id: '98' },
        'eu': { price: '11 €', status: 'Registrado, traer a Comvive', product_id: '97' },
        'me': { price: '17 €', status: 'Registrado, traer a Comvive', product_id: '159' },
        'shop': { price: '31 €', status: 'Registrado, traer a Comvive', product_id: '309' },
        'art': { price: '21 €', status: 'Disponible para registro', product_id: '396' }
    };

    // Manejar el envío del formulario
    $('.mwm-search-1__form').on('submit', function(e) {
        e.preventDefault();
        const domainName = $('#search-domains').val().trim();
        if (!domainName) return;

        const selectedTLDs = $('.mwm-search-1__domains-options input:checked').map(function() {
            return $(this).val();
        }).get();

        const tbody = $('#results tbody');
        tbody.empty();

        // Si no hay TLDs seleccionados, mostrar todos
        const tldsToShow = selectedTLDs.length > 0 ? selectedTLDs : Object.keys(domainData);

        tldsToShow.forEach(function(tld) {
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
});
</script> 