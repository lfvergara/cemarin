<?php if ( $query_result->have_posts() ) {  $i = 1; $j = 1; ?>
    <?php while ( $query_result->have_posts() ) : $query_result->the_post();
        $params['itemnum'] = $i;
        stal_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/image', '', $params ); ?>
        <?php
        $i++;

    endwhile; // End of the loop.

    wp_reset_postdata();
    ?>
    <div class="qodef-e-content qodef-m-testimonials-swiper" <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
        <div class="swiper-wrapper">
            <?php while ( $query_result->have_posts() ) : $query_result->the_post();
                $params['itemnum'] = $j;
                stal_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'layouts/' . $layout, '', $params );

                $j++;

            endwhile; // End of the loop.

            wp_reset_postdata(); ?>
        </div>
    </div>
<?php } else {
    // Include global posts not found
    stal_core_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/posts-not-found' );
}

wp_reset_postdata();