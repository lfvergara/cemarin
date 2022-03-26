<?php if(is_array($features) && count($features)) : ?>
	<div <?php qode_framework_class_attribute($holder_classes); ?>>
		<div class="qodef-m-features qodef-m-table">
			<div class="qodef-m-features-title qodef-m-table-head">
				<div class="qodef-m-table-head-inner">
					<h4 class="qodef-m-title"><?php echo wp_kses_post(preg_replace('#^<\/p>|<p>$#', '', $title)); ?></h4>
				</div>
			</div>
			<div class="qodef-m-features-list qodef-m-content">
				<div class="qodef-m-list">
					<?php foreach($features as $feature) : ?>
						<div class="qodef-m-item qodef-m-features-item"><h6><?php echo esc_html($feature); ?></h6></div>
					<?php endforeach; ?>
				</div>
                <div class="qodef-m-footer">
                </div>
			</div>
		</div>
		<?php foreach ( $items as $item ) {?>
        <div class="qodef-m-table">
            <div class="qodef-m-table-holder-inner">
                <div class="qodef-m-table-head">
                    <div class="qodef-m-table-head-inner">
						<?php if ($item['item_title'] !== '') : ?>
                            <h5 class="qodef-m-title"><?php echo wp_kses_post($this_shortcode->get_modified_title($item)); ?></h5>
						<?php endif; ?>
                    </div>
                </div>
                <div class="qodef-m-content">
					<?php echo do_shortcode(preg_replace('#^<\/p>|<p>$#', '', $item['content'])); ?>
                </div>
				<?php if($item['show_button'] == 'yes') { ?>
                    <div class="qodef-m-footer">
						<?php echo StalCoreButtonShortcode::call_shortcode( $this_shortcode->get_button_params( $item ) ); ?>
                    </div>
				<?php } ?>
            </div>
        </div>
		<?php } ?>
	</div>
<?php endif; ?>
