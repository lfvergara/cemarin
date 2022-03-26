<?php if ( $icon_type == 'svg-image' && ! empty ( $svg_image_path ) ) { ?>
    <?php if ( ! empty( $link ) ) : ?>
        <a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
    <?php endif; ?>
        <?php echo wp_kses( $svg_image_path, array(
            'svg' => array(
                'version' => true,
                'xmlns' => true,
                'x' => true,
                'y' => true,
                'width' => true,
                'height' => true,
                'viewBox' => true,
                'enable-background' => true
            ),
            'rect' => array(
                'x' => true,
                'y' => true,
                'd' => true,
                'width' => true,
                'height' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-miterlimit' => true
            ),
            'line' => array(
                'x' => true,
                'y' => true,
                'd' => true,
                'width' => true,
                'height' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-miterlimit' => true
            ),
            'path' => array(
                'x' => true,
                'y' => true,
                'd' => true,
                'width' => true,
                'height' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-miterlimit' => true
            ),
            'polyline' => array(
                'x' => true,
                'y' => true,
                'd' => true,
                'width' => true,
                'height' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-miterlimit' => true
            ),
            'circle' => array(
                'cx' => true,
                'cy' => true,
                'd' => true,
                'r' => true,
                'width' => true,
                'height' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-miterlimit' => true
            )
        )); ?>
    <?php if ( ! empty( $link ) ) : ?>
        </a>
    <?php endif; ?>
<?php }
