<?php
/**
 * Block Name: MWM Search 2
 */

$title = get_field('title');
$description = get_field('description');
?>

<section class="mwm-search-2">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-search-2__container">
				<div class="mwm-search-2__header">
					<h2 class="mwm-search-2__title"><?php echo $title; ?></h2>
					<div class="mwm-search-2__desc"><?php echo $description; ?></div>
				</div>
				<div class="mwm-search-2__content">
					<form action="#" class="mwm-search-2__form">
						<div class="mwm-search-2__form-item">
							<input type="text" id="search-domains-2" placeholder="Encontrar un dominio">
							<button type="submit" id="search-domains-2-button"><?php esc_html_e('Buscar', 'comvive'); ?></button>
						</div>
						<ul class="mwm-search-2__domains-options">
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-1" value="com">
								<label for="search-domains-2-option-1">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.com', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-2" value="es">
								<label for="search-domains-2-option-2">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.es', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-3" value="io">
								<label for="search-domains-2-option-3">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.io', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-4" value="org">
								<label for="search-domains-2-option-4">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.org', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-5" value="net">
								<label for="search-domains-2-option-5">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.net', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-6" value="ai">
								<label for="search-domains-2-option-6">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.ai', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-7" value="info">
								<label for="search-domains-2-option-7">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.info', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-8" value="eu">
								<label for="search-domains-2-option-8">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.eu', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-9" value="me">
								<label for="search-domains-2-option-9">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.me', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-10" value="shop">
								<label for="search-domains-2-option-10">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.shop', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-11" value="art">
								<label for="search-domains-2-option-11">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.art', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-12" value="life">
								<label for="search-domains-2-option-12">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.life', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-13" value="club">
								<label for="search-domains-2-option-13">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.club', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-14" value="app">
								<label for="search-domains-2-option-14">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.app', 'comvive'); ?></span>
								</label>
							</li>
							<li class="mwm-search-2__domains-option">
								<input type="checkbox" id="search-domains-2-option-15" value="xyz">
								<label for="search-domains-2-option-15">
									<span class="mwm-search-2__domains-option-name"><?php esc_html_e('.xyz', 'comvive'); ?></span>
								</label>
							</li>
						</ul>
					</form>

					<div class="domain-results" id="domain_results_container-2" style="display: none;">
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
        'art': { price: '21 €', status: 'Disponible para registro', product_id: '396' },
        'life': { price: '11 €', status: 'Disponible para registro', product_id: '397' },
        'club': { price: '11 €', status: 'Disponible para registro', product_id: '398' },
        'app': { price: '11 €', status: 'Disponible para registro', product_id: '399' },
        'xyz': { price: '11 €', status: 'Disponible para registro', product_id: '396' }
    };

    // Manejar el envío del formulario
    $('.mwm-search-2__form').on('submit', function(e) {
        e.preventDefault();
        const domainName = $('#search-domains-2').val().trim();
        if (!domainName) return;

        const selectedTLDs = $('.mwm-search-2__domains-options input:checked').map(function() {
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

        $('#domain_results_container-2').show();
    });

    // Manejar el envío de los formularios de "Añadir al carrito"
    $(document).on('submit', '.domain-results form', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $button = $form.find('input[type="submit"]');
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
            // Mostrar mensaje de éxito
            $button.val('¡Añadido!').css('background-color', '#2ecc71');
            
            // Restaurar el botón después de 2 segundos
            setTimeout(function() {
                $button.val(originalText).prop('disabled', false).css('background-color', '');
            }, 2000);
            
            // Aquí puedes agregar la lógica real para añadir al carrito
            console.log('Dominio añadido al carrito:', formData);
            
        }, 1000);
    });
});
</script> 