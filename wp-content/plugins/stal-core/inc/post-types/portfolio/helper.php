<?php

if ( ! function_exists( 'stal_core_include_portfolio_media_fields' ) ) {
	function stal_core_include_portfolio_media_fields() {
		foreach ( glob( STAL_CORE_CPT_PATH . '/portfolio/dashboard/media/*.php' ) as $media ) {
			include_once $media;
		}
	}
	
	add_action( 'qode_framework_action_custom_media_fields', 'stal_core_include_portfolio_media_fields' );
}

if ( ! function_exists( 'stal_core_generate_portfolio_single_layout' ) ) {
	function stal_core_generate_portfolio_single_layout() {
		$portfolio_template = stal_core_get_post_value_through_levels( 'qodef_portfolio_single_layout' );
		$portfolio_template = ! empty( $portfolio_template ) ? $portfolio_template : '';
		
		return $portfolio_template;
	}
	
	add_filter( 'stal_core_filter_portfolio_single_layout', 'stal_core_generate_portfolio_single_layout' );
}

if ( ! function_exists( 'stal_core_get_portfolio_holder_classes' ) ) {
	/**
	 * Function that return classes for the main portfolio holder
	 *
	 * @return string
	 */
	function stal_core_get_portfolio_holder_classes() {
		$classes = array( 'qodef-portfolio-single' );
		
		$item_layout = stal_core_generate_portfolio_single_layout();
		if ( ! empty( $item_layout ) ) {
			$classes[] = 'qodef-item-layout--' . $item_layout;
		}
		
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'stal_core_set_portfolio_single_body_classes' ) ) {
	/**
	 * Function that return classes for the single custom post type
	 *
	 * @return array $classes
	 */
	function stal_core_set_portfolio_single_body_classes( $classes ) {
		$item_layout = stal_core_get_post_value_through_levels( 'qodef_portfolio_single_layout' );
		
		if ( is_singular( 'portfolio-item' ) && ! empty( $item_layout ) ) {
			$classes[] = 'qodef-porfolio-single-layout--' . $item_layout;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stal_core_set_portfolio_single_body_classes' );
}

if ( ! function_exists( 'stal_core_generate_portfolio_archive_with_shortcode' ) ) {
	/**
	 * Function that executes portfolio list shortcode with params on archive pages
	 *
	 * @param string $tax - type of taxonomy
	 * @param string $tax_slug - slug of taxonomy
	 *
	 */
	function stal_core_generate_portfolio_archive_with_shortcode( $tax, $tax_slug ) {
		$params = array();
		
		$params['additional_params']         = 'tax';
		$params['tax']                       = $tax;
		$params['tax_slug']                  = $tax_slug;
		$params['layout']                    = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_item_layout' );
		$params['behavior']                  = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_behavior' );
		$params['masonry_images_proportion'] = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_masonry_images_proportion' );
		$params['columns']                   = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns' );
		$params['space']                     = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_space' );
		$params['columns_responsive']        = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_responsive' );
		$params['columns_1440']              = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_1440' );
		$params['columns_1366']              = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_1366' );
		$params['columns_1024']              = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_1024' );
		$params['columns_768']               = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_768' );
		$params['columns_680']               = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_680' );
		$params['columns_480']               = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_columns_480' );
		$params['slider_loop']               = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_slider_loop' );
		$params['slider_autoplay']           = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_slider_autoplay' );
		$params['slider_speed']              = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_slider_speed' );
		$params['slider_navigation']         = stal_core_get_post_value_through_levels( 'navigation' );
		$params['slider_pagination']         = stal_core_get_post_value_through_levels( 'pagination' );
		$params['pagination_type']           = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_pagination_type' );
		
		echo StalCorePortfolioListShortcode::call_shortcode( $params );
	}
}

if ( ! function_exists( 'stal_core_is_portfolio_title_enabled' ) ) {
	function stal_core_is_portfolio_title_enabled( $is_enabled ) {

		if ( is_singular( 'portfolio-item' ) ) {
			$portfolio_title = stal_core_get_post_value_through_levels( 'qodef_enable_portfolio_title' );
			$is_enabled = $portfolio_title == '' ? $is_enabled : ($portfolio_title == 'no' ? false : true);
		}
		return $is_enabled;
	}
	
	add_filter( 'stal_core_filter_is_page_title_enabled', 'stal_core_is_portfolio_title_enabled');
}

if ( ! function_exists( 'stal_core_portfolio_title_grid' ) ) {
	function stal_core_portfolio_title_grid( $enable_title_grid ) {
		if ( is_singular( 'portfolio-item' ) ) {
			$portfolio_title_grid = stal_core_get_post_value_through_levels( 'qodef_set_portfolio_title_area_in_grid' );
			$enable_title_grid = $portfolio_title_grid == '' ? $enable_title_grid : ($portfolio_title_grid == 'no' ? false : true);
		}
		
		return $enable_title_grid;
	}
	
	add_filter( 'stal_core_filter_page_title_in_grid', 'stal_core_portfolio_title_grid' );
}

if ( ! function_exists( 'stal_core_portfolio_breadcrumbs_title' ) ) {
	function stal_core_portfolio_breadcrumbs_title( $wrap_child, $settings ) {
		if ( is_tax( 'portfolio-category' ) ) {
			$wrap_child = '';
			$category   = get_term( get_queried_object_id(), 'portfolio-category' );
			
			if ( isset( $category->parent ) && $category->parent !== 0 ) {
				$parent     = get_term( $category->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}
			
			$wrap_child .= sprintf( $settings['current_item'], single_cat_title( '', false ) );
		} else if ( is_singular( 'portfolio-item' ) ) {
			$wrap_child = '';
			$categories = wp_get_post_terms( get_the_ID(), 'portfolio-category' );
			
			if ( ! empty ( $categories ) ) {
				$category = $categories[0];
				if ( isset( $category->parent ) && $category->parent !== 0 ) {
					$parent     = get_term( $category->parent );
					$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
				}
				$wrap_child .= sprintf( $settings['link'], get_term_link( $category ), $category->name ) . $settings['separator'];
			}
			
			$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
		}
		
		return $wrap_child;
	}
	
	add_filter( 'stal_core_filter_breadcrumbs_content', 'stal_core_portfolio_breadcrumbs_title', 10, 2 );
}

if ( ! function_exists( 'stal_core_set_portfolio_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param $sidebar_name string
	 *
	 * @return string
	 */
	function stal_core_set_portfolio_custom_sidebar_name( $sidebar_name ) {
		
		if ( is_singular( 'portfolio-item' ) ) {
			$option = stal_core_get_post_value_through_levels( 'qodef_portfolio_single_custom_sidebar' );
		} else if ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'portfolio-item' );
			
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_custom_sidebar' );
				}
			}
		}
		
		if ( isset( $option ) && ! empty( $option ) ) {
			$sidebar_name = $option;
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'stal_filter_sidebar_name', 'stal_core_set_portfolio_custom_sidebar_name' );
}

if ( ! function_exists( 'stal_core_set_portfolio_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param $layout string
	 *
	 * @return string
	 */
	function stal_core_set_portfolio_sidebar_layout( $layout ) {
		
		if ( is_singular( 'portfolio-item' ) ) {
			$option = stal_core_get_post_value_through_levels( 'qodef_portfolio_single_sidebar_layout' );
		} else if ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'portfolio-item' );
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_sidebar_layout' );
				}
			}
		}
		
		if ( isset( $option ) && ! empty( $option ) ) {
			$layout = $option;
		}
		
		return $layout;
	}
	
	add_filter( 'stal_filter_sidebar_layout', 'stal_core_set_portfolio_sidebar_layout' );
}

if ( ! function_exists( 'stal_core_set_portfolio_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function stal_core_set_portfolio_sidebar_grid_gutter_classes( $classes ) {
		
		if( is_singular( 'portfolio-item' ) ) {
			$option = stal_core_get_post_value_through_levels( 'qodef_portfolio_single_sidebar_grid_gutter' );
		} else if( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'portfolio-item' );
			foreach ( $taxonomies as $tax ) {
				if( is_tax( $tax ) ) {
					$option = stal_core_get_post_value_through_levels( 'qodef_portfolio_archive_sidebar_grid_gutter' );
				}
			}
		}
		if ( isset( $option ) && ! empty( $option ) ) {
			$classes = 'qodef-gutter--' . esc_attr( $option );
		}
		
		return $classes;
	}
	
	add_filter('stal_filter_grid_gutter_classes', 'stal_core_set_portfolio_sidebar_grid_gutter_classes');
}

if ( ! function_exists( 'stal_core_portfolio_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param $position int
	 * @param $map string
	 *
	 * @return int
	 */
	function stal_core_portfolio_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'portfolio' ) {
			$position = 50;
		}
		
		return $position;
	}
	
	add_filter( 'stal_core_filter_admin_options_map_position', 'stal_core_portfolio_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'stal_core_get_portfolio_single_related_posts' ) ) {
	/**
	 * Function for returning portfolio single related posts
	 *
	 * @param $post_id
	 *
	 * @return WP_Query
	 */
	function stal_core_get_portfolio_single_related_posts( $post_id ) {
		//Get tags
		$tags = wp_get_object_terms( $post_id, 'portfolio-tag' );
		
		//Get categories
		$categories = wp_get_object_terms( $post_id, 'portfolio-category' );
		
		$tag_ids = array();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				$tag_ids[] = $tag->term_id;
			}
		}
		
		$category_ids = array();
		if ( $categories ) {
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
		}
		
		$hasRelatedByTag = false;
		
		if ( $tag_ids ) {
			$related_by_tag = stal_core_get_portfolio_single_related_posts_by_param( $post_id, $tag_ids, 'portfolio-tag' );
			
			if ( ! empty( $related_by_tag->posts ) ) {
				$hasRelatedByTag = true;
				
				return $related_by_tag;
			}
		}
		
		if ( $categories && ! $hasRelatedByTag ) {
			$related_by_category = stal_core_get_portfolio_single_related_posts_by_param( $post_id, $category_ids, 'portfolio-category' );
			
			if ( ! empty( $related_by_category->posts ) ) {
				return $related_by_category;
			}
		}
	}
}

if ( ! function_exists( 'stal_core_get_portfolio_single_related_posts_by_param' ) ) {
	/**
	 * @param $post_id - Post ID
	 * @param $term_ids - Category or Tag IDs
	 * @param $taxonomy
	 *
	 * @return WP_Query
	 */
	function stal_core_get_portfolio_single_related_posts_by_param( $post_id, $term_ids, $taxonomy ) {
		
		$args = array(
			'post_status'    => 'publish',
			'post__not_in'   => array( $post_id ),
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => '4',
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $term_ids,
				),
			)
		);
		
		$related_by_taxonomy = new WP_Query( $args );
		
		return $related_by_taxonomy;
	}
}