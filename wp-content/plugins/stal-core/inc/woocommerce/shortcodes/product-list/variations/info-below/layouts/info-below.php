<div <?php wc_product_class( $item_classes ); ?>>
    <div class="qodef-woo-product-inner">
		<?php if ( has_post_thumbnail() ) { ?>
            <div class="qodef-woo-product-image">
				<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/mark' ); ?>
				<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
                <div class="qodef-woo-product-image-inner">
					<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
                </div>
            </div>
		<?php } ?>
        <div class="qodef-woo-product-content">
			<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/category', '', $params ); ?>
			<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
			<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params ); ?>
			<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
        </div>
		<?php stal_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
    </div>
</div>