<a <?php qode_framework_class_attribute( $holder_classes ); ?> href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>" <?php qode_framework_inline_attrs( $data_attrs ); ?> <?php qode_framework_inline_style( $styles ); ?>>
    <span class="qodef-m-text">
        <?php echo esc_html( $text ); ?>
        <?php echo stal_get_svg_icon('qodef-m-arrowline'); ?>
    </span>
    <span class="qodef-m-split qodef-split--up"></span>
    <span class="qodef-m-split qodef-split--down"></span>
</a>
