<?php if ( $show_header_area ) { ?>
	<div id="qodef-top-area">
		<?php if($top_area_in_grid) { ?>
			<div class="qodef-content-grid">
		<?php } ?>
				<div class="qodef-top-area-left">
					<?php stal_core_get_header_widget_area( 'top-area-left' ); ?>
				</div>
				<div class="qodef-top-area-right">
					<?php stal_core_get_header_widget_area( 'top-area-right' ); ?>
				</div>
		<?php if($top_area_in_grid) { ?>
			</div>
		<?php } ?>
		<?php do_action( 'stal_core_action_after_top_area' ); ?>
	</div>
<?php } ?>