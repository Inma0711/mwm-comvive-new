<?php
/**
 * Block Name: MWM Tabs domains
 */

$title = get_field('title');
$tabs = get_field('tabs');
?>

<section class="mwm-tabs-domains">
	<div class="mwm-max">
		<div class="mwm-wrapper">
			<div class="mwm-tabs-domains__container">
				<div class="mwm-tabs-domains__header">
					<h2 class="mwm-tabs-domains__title"><?php echo $title; ?></h2>
				</div>
				<?php if ($tabs): ?>
					<div class="mwm-tabs-domains__tabs">
						<?php foreach ($tabs as $i => $tab): ?>
							<button class="mwm-tabs-domains__tab<?php if($i === 0) echo ' active'; ?>" data-tab="tab-<?php echo $i; ?>"><?php echo esc_html($tab['tab_title']); ?></button>
						<?php endforeach; ?>
					</div>
					<div class="mwm-tabs-domains__contents">
						<?php foreach ($tabs as $i => $tab): ?>
							<div class="mwm-tabs-domains__content<?php if($i === 0) echo ' active'; ?>" data-tab-content="tab-<?php echo $i; ?>">
								<table class="mwm-tabs-domains__table">
									<thead>
										<tr>
											<th>Extensión</th>
											<th>Categoría</th>
											<th>Alta</th>
											<th>Renovación</th>
											<th>Transferencia</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($tab['tab_table'])): ?>
											<?php foreach ($tab['tab_table'] as $row): ?>
												<tr>
													<td><?php echo esc_html($row['extension']); ?></td>
													<td><?php echo esc_html($row['categoria']); ?></td>
													<td><?php echo esc_html($row['alta']); ?></td>
													<td><?php echo esc_html($row['renovacion']); ?></td>
													<td><?php echo esc_html($row['transferencia']); ?></td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($){
	$('.mwm-tabs-domains__tab').on('click', function(){
		var tab = $(this).data('tab');
		$('.mwm-tabs-domains__tab').removeClass('active');
		$(this).addClass('active');
		$('.mwm-tabs-domains__content').removeClass('active');
		$('.mwm-tabs-domains__content[data-tab-content="'+tab+'"').addClass('active');
	});
});
</script>