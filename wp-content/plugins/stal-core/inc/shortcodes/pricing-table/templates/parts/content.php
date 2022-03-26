<?php foreach ( $items as $item ) {?>
    <div class="qodef-m-content">
        <div class="qodef-m-table-holder-inner">
	        <?php if($item['show_icon'] == 'yes') { ?>
		        <span class="qodef-m-table-icon"></span>
            <?php } ?>
            <?php if ($item['item_title'] !== '') : ?>
                <span class="qodef-m-text"><?php esc_html_e($item['item_title']); ?></span>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>