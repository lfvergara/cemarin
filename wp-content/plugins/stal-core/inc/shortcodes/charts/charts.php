<?php

if ( ! function_exists( 'stal_core_add_charts_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function stal_core_add_charts_shortcode( $shortcodes ) {
		$shortcodes[] = 'StalCoreChartsShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'stal_core_filter_register_shortcodes', 'stal_core_add_charts_shortcode' );
}

if ( class_exists( 'StalCoreShortcode' ) ) {
	class StalCoreChartsShortcode extends StalCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'stal_core_filter_charts_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'stal_core_filter_charts_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( STAL_CORE_SHORTCODES_URL_PATH . '/charts' );
			$this->set_base( 'stal_core_charts' );
			$this->set_name( esc_html__( 'Charts', 'stal-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds charts element', 'stal-core' ) );
			$this->set_category( esc_html__( 'Stal Core', 'stal-core' ) );
			
			$no_of_datasets = 3;
			$no_of_points = 12;

			$this->set_scripts(
				array(
					'chart' => array(
						'registered'	=> false,
						'url'           => STAL_CORE_INC_URL_PATH . '/shortcodes/charts/assets/js/plugins/Chart.min.js',
						'dependency'    => ( 'jquery')
					)
				)
			);
			
			// first point group w/o dependency
			$points_array[] = array(
				'field_type'    => 'select',
				'title'         => esc_html__('Use Point Group 1', 'stal-core'),
				'name'          => 'points_1',
				'options'       => stal_core_get_select_type_options_pool( 'yes_no' ),
				'group' => esc_html__('Points', 'stal-core'),
			);
			
			$points_array[] = array(
				'field_type' => 'color',
				'title'      => esc_html__('Point 1 Color', 'stal-core'),
				'name'       => 'point_1_color',
				'group' => esc_html__('Points', 'stal-core'),
			);
			
			$points_array[] = array(
				'field_type' => 'text',
				'title' => esc_html__('Point 1 Label', 'stal-core'),
				'name' => 'point_1_label',
				'group' => esc_html__('Points', 'stal-core'),
			);
			
			// from second to twelfth w/ dependency
			for ($i = 2; $i <= $no_of_points; $i++) {
				$points_array[] = array(
					'field_type'    => 'select',
					'title'         => esc_html__('Use Point Group ', 'stal-core') . $i,
					'name' => 'points_' . $i,
					'options'       => stal_core_get_select_type_options_pool( 'no_yes' ),
					'group' => esc_html__('Points', 'stal-core'),
				);
				
				$points_array[] = array(
					'field_type' => 'color',
					'title' => esc_html__('Point ', 'stal-core') . $i . esc_html__(' Color', 'stal-core'),
					'name' => 'point_' . $i . '_color',
					'group' => esc_html__('Points', 'stal-core'),
					'dependency'    => array(
						'show' => array(
							'points_' . $i => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				);
				
				$points_array[] = array(
					'field_type' => 'text',
					'title' => esc_html__('Point ', 'stal-core') . $i . esc_html__(' Label', 'stal-core'),
					'name' => 'point_' . $i . '_label',
					'group' => esc_html__('Points', 'stal-core'),
					'dependency'    => array(
						'show' => array(
							'points_' . $i => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				);
			}
			
			/*
	        * dataset tabs begin
		    */
			
			for ($i = 1; $i <= $no_of_datasets; $i++) { // no of datasets
				
				$dataset_array[] = array(
					'field_type' => 'text',
					'title' => esc_html__('Dataset ', 'stal-core') . $i . esc_html__(' Label', 'stal-core'),
					'name' => 'dataset_' . $i . '_label',
					'group' => esc_html__('Dataset ', 'stal-core') . $i,
				);
				
				$dataset_array[] = array(
					'field_type' => 'color',
					'title' => esc_html__('Dataset ', 'stal-core') . $i . esc_html__(' Color', 'stal-core'),
					'name' => 'dataset_' . $i . '_color',
					'group' => esc_html__('Dataset ', 'stal-core') . $i,
					'dependency'    => array(
						'show' => array(
							'color_scheme' => array(
								'values'        => 'dataset',
								'default_value' => ''
							)
						)
					)
				);
				
				for ($j = 1; $j <= $no_of_points; $j++) { // no of points in dataset
					$dataset_array[] = array(
						'field_type' => 'text',
						'title' => esc_html__('Point ', 'stal-core') . $j . esc_html__(' Value', 'stal-core'),
						'name' => 'point_' . $i . '_' . $j,
						'group' => esc_html__('Dataset ', 'stal-core') . $i,
						'dependency'    => array(
							'show' => array(
								'points_' . $j => array(
									'values'        => 'yes',
									'default_value' => ''
								)
							)
						)
					);
				}
			}
			
			$this->set_option(
				array(
					'field_type'    => 'select',
					'title'         => esc_html__('Type',	'stal-core'),
					'name'          => 'type',
					'options'       => array(
						'bar'   => esc_html__( 'Vertical Bars', 'stal-core' ),
						'horizontalBar' => esc_html__( 'Horizontal Bars', 'stal-core' ),
						'line'    => esc_html__( 'Line', 'stal-core' ),
					)
				)
			);
			
			$this->set_option(
				array(
					'field_type'    => 'select',
					'title'         => esc_html__('Legend Position','stal-core'),
					'name'          => 'legend_position',
					'options'       => array(
						'top'   => esc_html__( 'Top', 'stal-core' ),
						'right' => esc_html__( 'Right', 'stal-core' ),
						'bottom' => esc_html__( 'Bottom', 'stal-core' ),
						'left' => esc_html__( 'Left', 'stal-core' ),
					)
				)
			);
			
			$this->set_option(
				array(
					'field_type'    => 'select',
					'title'     => esc_html__('Color Scheme','stal-core'),
					'name'  => 'color_scheme',
					'options'       => array(
						'dataset'   => esc_html__( 'One Color per Dataset', 'stal-core' ),
						'point' => esc_html__( 'One Color per Point Group', 'stal-core' ),
					)
				)
			);
			
			foreach ($points_array as $value) {
				$this->set_option($value);
			}
			foreach ($dataset_array as $value) {
				$this->set_option($value);
			}
			
			$this->map_extra_options();
		}
		
		public function load_assets() {
			wp_enqueue_script( 'chart');
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$no_of_datasets = 3;
			$no_of_points = 12;
			
			$atts['this_shortcode'] = $this;
			for ($i = 1; $i <= $no_of_datasets; $i++) {
				$atts['dataset_' . $i . '_values'] = $this->get_dataset_values($atts, $i, $no_of_points);
			}

			$atts['no_of_used_datasets'] = $this->get_no_of_used_datasets($atts, $no_of_datasets);
			$atts['point_group_labels'] = $this->get_point_group_labels($atts, $no_of_points);
			$atts['point_group_colors'] = $this->get_point_group_colors($atts, $no_of_points);
			
			
			$html = '';
			$html .= '<div class="qodef-charts" ';
			
			// inline data begin
			$html .= ' '. $this->get_data_attribute('type', $atts['type']);
			$html .= ' '. $this->get_data_attribute('no_of_used_datasets', $atts['no_of_used_datasets']);
			for ($i = 1; $i <= $atts['no_of_used_datasets']; $i++) {
				$html .= ' '.$this->get_data_attribute('dataset_' . $i, $atts['dataset_' . $i . '_values']);
			}
			$html .= ' '. $this->get_data_attribute('point_group_labels', $atts['point_group_labels']);
			$html .= ' '. $this->get_data_attribute('point_group_colors', $atts['point_group_colors']);
			for ($i = 1; $i <= $atts['no_of_used_datasets']; $i++) {
				$html .= ' '. $this->get_data_attribute('dataset_' . $i . '_label', $atts['dataset_' . $i . '_label']);
				$html .= ' '. $this->get_data_attribute('dataset_' . $i . '_color', $atts['dataset_' . $i . '_color']);
			}
			$html .= ' '.$this->get_data_attribute('color_scheme', $atts['color_scheme']);
			$html .= ' '.$this->get_data_attribute('legend_position', $atts['legend_position']);
			
			// inline data end
			
			$html .= '>';
			$html .= stal_core_get_template_part('shortcodes/charts', 'templates/charts', '', $atts);
			$html .= '</div>';
			return $html;
		}
		
		/*
	 * convert dataset values from shortcode into usable string
	 *
	 * @params $params - mixed, shortcode params
	 * @params $dataset - integer, current dataset, since function is being called from loop
	 * @params $no_of_points - integer, total number of points
	 *
	 * @return string
	 */
		private function get_dataset_values($atts, $dataset, $no_of_points) {
			$dataset_values = array();
		
			for ($i = 1; $i <= $no_of_points; $i++) {
				
				if ($atts['point_' . $dataset . '_' . $i] != '') {
					$dataset_values[] = $atts['point_' . $dataset . '_' . $i];
				}
			}
			
			$dataset_values = implode(',', $dataset_values);
			
			return $dataset_values;
		}
		
		/*
		 * create data attribute for inline print in html
		 *
		 * @params $title - string, name of the data attribute
		 * @params $raw_attribute - string, value of the data attribute
		 *
		 * @return string
		 */
		private function get_data_attribute($title, $raw_attribute) {
			
			$data_attribute = 'data-' . $title . '="' . $raw_attribute . '"';
			
			return $data_attribute;
		}
		
		/*
		 * determine how many datasets are being used in shortcode
		 *
		 * @params $params - mixed, shortcode params
		 * @params $no_of_datasets - integer, total number of datasets available in shortcode interface
		 *
		 * @return integer
		 */
		private function get_no_of_used_datasets($atts, $no_of_datasets) {
			for ($i = $no_of_datasets; $i >= 1; $i--) {
				if ($atts['dataset_' . $i . '_values'] != '') {
					return $i;
				}
			}
		}
		
		/*
		 *
		 */
		private function get_point_group_labels($atts, $no_of_labels) {
			$point_group_labels = array();
			
			for ($i = 1; $i <= $no_of_labels; $i++) {
				
				if ($atts['point_' . $i . '_label'] != '')
					$point_group_labels[] = $atts['point_' . $i . '_label'];
			}
			
			$point_group_labels = implode(',', $point_group_labels);
			
			return $point_group_labels;
		}
		
		/*
		 *
		 */
		private function get_point_group_colors($atts, $no_of_labels) {
			$point_group_colors = array();
			
			for ($i = 1; $i <= $no_of_labels; $i++) {
				
				if ($atts['point_' . $i . '_color'] != '')
					$point_group_colors[] = $atts['point_' . $i . '_color'];
			}
			
			$point_group_colors = implode(',', $point_group_colors);
			
			return $point_group_colors;
		}
	}
}