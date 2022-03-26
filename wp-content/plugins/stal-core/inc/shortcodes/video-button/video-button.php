<?php

if ( ! function_exists( 'stal_core_add_video_button_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function stal_core_add_video_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreVideoButton';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_video_button_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreVideoButton extends StalCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/video-button' );
			$this->set_base( 'stal_core_video_button' );
			$this->set_name( esc_html__( 'Video Button', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds video button element', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'stal-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'video_link',
				'title'      => esc_html__( 'Video Link', 'stal-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'video_image',
				'title'      => esc_html__( 'Image', 'stal-core' ),
				'description'=> esc_html__( 'Select image from media library', 'stal-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'play_button_color',
				'title'      => esc_html__( 'Play Button Color', 'stal-core' )
			) );
            $this->set_option( array(
                'field_type' => 'color',
                'name'       => 'play_button_bg_color',
                'title'      => esc_html__( 'Play Button Background Color', 'stal-core' )
            ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'play_button_size',
				'title'      => esc_html__( 'Play Button Size (px)', 'stal-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']	    = $this->get_holder_classes( $atts );
			$atts['play_button_styles'] = $this->get_play_button_styles( $atts );
			$atts['play_icon_color']    = $this->get_play_icon_color( $atts );

			return stal_core_get_template_part( 'shortcodes/video-button', 'templates/video-button', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-video-button';
			$holder_classes[] = ! empty( $atts['custom_class'] ) ? esc_attr( $atts['custom_class'] ) : '';
			$holder_classes[] = ! empty( $atts['video_image'] ) ? 'qodef-vb-has-img' : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_play_button_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['play_button_size'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['play_button_size'] ) ) {
					$styles[] = 'height: ' . $atts['play_button_size'];
					$styles[] = 'width: ' . $atts['play_button_size'];
				} else {
					$styles[] = 'width: ' . intval( $atts['play_button_size'] ) . 'px';
					$styles[] = 'height: ' . intval( $atts['play_button_size'] ) . 'px';
				}
			}

            if ( ! empty( $atts['play_button_bg_color'] ) ) {
                $styles[] = 'background-color: ' . $atts['play_button_bg_color'];
            }
			
			return implode( ';', $styles );
		}

        private function get_play_icon_color( $atts ) {
            $color = '';

            if ( ! empty( $atts['play_button_color'] ) ) {
                $color = $atts['play_button_color'];
            }

            return $color;
        }
	}
}