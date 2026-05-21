<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPMOZO_Addons_Lite_For_Elementor_Public' ) ) {
	class WPMOZO_Addons_Lite_For_Elementor_Public {

		/**
		 * Initialize required files and funcitons.
		 *
		 * @since    1.0.0
		 */
		public function init() {

			$this->include_files();
		}

		/**
		 * Include file with helper funcitons.
		 *
		 * @since    1.0.0
		 */
		public function include_files() {
			require_once plugin_dir_path( __DIR__ ) . 'includes/wpmozo-helper-functions.php';

		}

		/**
		 * Register the editor styles
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function wpmozo_ale_editor_enqueue_scripts() {

			wp_enqueue_style(
				'wpmozo-icons',
				plugins_url( 'assets/css/wpmozoicon/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ),
				false,
				WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION
			);
		}

		/**
		 * Register the styles
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function register_frontend_styles() {

			wp_register_style( 'wpmozo-ae-swiper-style', plugins_url( 'assets/css/swiper/swiper.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-animate-style', plugins_url( 'assets/css/animate/animate.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-font-awesome-style', plugins_url( 'assets/css/font-awesome/font-awesome.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-mfp-style', plugins_url( 'assets/css/magnificPopup/magnificPopup.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-icons', plugins_url( 'assets/css/wpmozoicon/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-justifiedGallery-style', plugins_url( 'assets/css/justifiedGallery/justifiedGallery.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_enqueue_style(
	            'wpmozo-ae-icons',
	            plugins_url( 'assets/css/wpmozoicon/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ),
	            false,
		        WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION
	        );
		}

		/**
		 * Register the scripts
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function register_frontend_scripts() {

			wp_register_script( 'wpmozo-ae-isotope', plugins_url( 'assets/js/isotope/isotope.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_register_script( 'wpmozo-ae-masonry', plugins_url( 'assets/js/masonry/masonry.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_register_script( 'wpmozo-ae-magnify', plugins_url( 'assets/js/magnify/magnify.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-popper', plugins_url( 'assets/js/popper/popper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-tippy', plugins_url( 'assets/js/tippyBundle/tippy-bundle.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-imagesloaded', plugins_url( 'assets/js/imagesLoaded/imagesloaded.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-move-event', plugins_url( 'assets/js/jqueryEventMove/jquery_event_move.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-twenty-twenty', plugins_url( 'assets/js/jqueryTwentyTwenty/jquery_twentytwenty.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-mfp', plugins_url( 'assets/js/magnificPopup/magnificPopup.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-swiper', plugins_url( 'assets/js/swiper/swiper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-waypoints', plugins_url( 'assets/js/waypoints/waypoints.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-lottie', plugins_url( 'assets/js/lottie/lottie.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-twbspagination', plugins_url( 'assets/js/twbsPagination/twbsPagination.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-justifiedGallery', plugins_url( 'assets/js/justifiedGallery/justifiedGallery.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		}

		/**
		 * Add category for widgets.
		 *
		 * @since    1.0.0
		 */
		public function add_elementor_widget_categories( $elements_manager ) {

			$elements_manager->add_category(
				'wpmozo',
				array(
					'title' => esc_html__( 'WPMozo', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'fa fa-plug',
				)
			);
		}

		/**
		 * Register Custom Control to Search Taxonomy
		 * get the searched taxonomies if present in database.
		 *
		 * @access public
		 * @return void
		 * @since  1.3.0
		 */
		public function register_custom_controls() {

			require_once plugin_dir_path( __DIR__ ) . 'includes/controls/select2.php';
			\Elementor\Plugin::instance()->controls_manager->register( new WPMOZO_AE_Select2() );
		}

		/**
		 * Fetch Testimonial Data
		 * Fetch and process testimonials dynamically based on user-defined settings, rendering them with the specified
		 * layout and returning paginated results or an error message via AJAX.
		 *
		 * @access public
		 * @return void
		 * @since  1.3.0
		 */
		public function wpmozo_get_testimonials() {
			
	        if ( ! isset( $_POST['wpmozo_get_testimonials_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['wpmozo_get_testimonials_nonce'] ) ), 'wpmozo-testimonial-grid-nonce' ) ) {
	            return;
	        }

	        if ( ! isset( $_POST['props'] ) || '' === $_POST['props'] ) {
	            return;
	        }
			ob_start();
	        $defaults = array(
	            'testimonial_layout'        => 'layout1',
	            'testimonial_number'        => '10',
	            'offset_number'             => '0',
	            'testimonial_order_by'      => 'date',
	            'testimonial_order'         => 'DESC',
	            'include_categories'        => '',
	            'show_author_image'         => 'yes',
	            'author_image_size'         => 'off',
	            'use_gravatar'              => 'off',
	            'show_author_designation'   => 'yes',
	            'show_author_company_name'  => 'yes',
	            'show_opening_quote_icon'   => 'yes',
	            'show_closing_quote_icon'   => 'off',
	            'show_rating'               => 'yes',
	            'page'                      => 1,
	            'total_pages'               => 1,
	        );

	        foreach ( $defaults as $key => $default ) {
	            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
	            ${$key} = trim( sanitize_text_field( wp_unslash( isset( $_POST['props'][$key] ) ? $_POST['props'][$key] : $default ) ) );
	        }
	        $offset_number      = absint( $offset_number );
	        $page               = absint( $page );
	        $offset_number      = ( $testimonial_number * ( $page - 1 ) ) + $offset_number;

	        $args = array(
	            'post_type'      => 'wpmozoae-testimonial',
	            'posts_per_page' => intval( $testimonial_number ),
	            'offset'         => intval( $offset_number ),
	            'post_status'    => 'publish',
	            'orderby'        => $testimonial_order_by,
	            'order'          => $testimonial_order,
	        );

	        if ( is_user_logged_in() ) {
	            $args['post_status'] = array(
	                'publish',
	                'private',
	            );
	        }

	        if ( '' !== $include_categories ) {
	            $include_categories = array_map( 'intval', explode( ',', $include_categories ) );
	            $args['tax_query'] = array(
	                array(
	                    'taxonomy' => 'wpmozo-ae-testimonial-category',
	                    'field'    => 'term_id',
	                    'terms'    => $include_categories,
	                    'operator' => 'IN',
	                ),
	            );
	        }

	        $query = new WP_Query( $args );

	        if ( $query->have_posts() ) {

	            while ( $query->have_posts() ) {
	                $query->the_post();
	                $testimonial_id = esc_attr( get_the_ID() );
	                $rating = floatval( get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_rating', true ) );

					?>
	                <div class="wpmozo_testimonial_isotope_item wpmozo_testimonial_isotope_item_page_<?php echo  esc_attr( $page ) ; ?> ">
						<?php
						if ( file_exists( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH.'widgets/testimonial-grid/layouts/' . sanitize_file_name( $testimonial_layout ) . '.php' ) ) {
							include WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH.'widgets/testimonial-grid/layouts/' . sanitize_file_name( $testimonial_layout ) . '.php';
						}

						?>
					</div>
					<?php
	            }

				$testimonials = ob_get_clean();

	            $data =  array(
	                'success'       => true,
	                'items'         => $testimonials,
	            );

	            if ( 1 === $page ) {
	                if ( '' !== $args['offset'] && ! empty( $args['offset'] ) ) {
	                    $data['total_pages'] = intval( ceil( ( $query->found_posts - $args['offset'] ) / $args['posts_per_page'] ) );
	                } else {
	                    $data['total_pages'] = intval( ceil( $query->found_posts / $args['posts_per_page'] ) );
	                }
	            }

	            wp_reset_postdata();

	            wp_send_json( $data );
	            
	        } else {
				?>
	         		<div class="entry">
	                        <h1><?php echo  esc_html__( 'No Results Found', 'wpmozo-addons-lite-for-elementor' ) ; ?></h1>
	                        <p><?php echo  esc_html__( 'The testimonials you requested could not be found. Try changing your module settings or create some new testimonials.', 'wpmozo-addons-lite-for-elementor' ) ?> </p>
					</div>
				<?php
	            exit;

	        }
	    }

		/**
		 * Register widgets.
		 *
		 * @since    1.0.0
		 */
		public function register_oembed_widget( $widgets_manager ) {

			$plugin_option = get_option( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION, array() );
			if ( defined( 'WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION' ) && isset( $plugin_option['wpmozo_inactive_widgets'] ) && '' !== $plugin_option['wpmozo_inactive_widgets'] ) {
				$inactive_widgets  	= explode( ',', $plugin_option['wpmozo_inactive_widgets'] );
				$active_widgets 	= array_diff( $this->get_all_widgets(), $inactive_widgets );
			} else {
				$active_widgets = $this->get_all_widgets();
			}
			$this->register_widgets( $active_widgets, $widgets_manager );
		}

		/**
		 * Get all widgets.
		 *
		 * @since    1.0.0
		 */
		private function get_all_widgets() {
			$widgets_path = plugin_dir_path( __DIR__ ) . '/widgets/';
			$widgets      = glob( $widgets_path . '*', GLOB_ONLYDIR );

			if ( ! empty( $widgets ) ) {
				$widgets = array_map( 'basename', $widgets );
				return $widgets;
			}
			return array();
		}

		/**
		 * Register widgets.
		 *
		 * @since    1.0.0
		 */
		private function register_widgets( $widgets, $widgets_manager ) {
			if ( ! empty( $widgets ) ) {
				$widgets_list = array();
				foreach ( $widgets as $widget ) {
					$mod                  = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $widget ) );
					$key                  = 'WPMOZO_AE_' . ucwords( strtolower( str_replace( '-', '_', $mod ) ) );
					$widgets_list[ $key ] = esc_html( $mod );
				}

				$this->include_widgets( $widgets_list );
				foreach ( $widgets_list as $key => $value ) {
					if ( class_exists( $key ) ) {
						$widgets_manager->register( new $key() );
					}
				}
			}
		}
		/**
		 * Include widget files.
		 *
		 * @since    1.0.0
		 */
		public function include_widgets( $widgets ) {
			foreach ( $widgets as $key => $value ) {
				$widget_path = plugin_dir_path( __DIR__ ) . '/widgets/' . $value . '/' . $value . '.php';
				if ( file_exists( $widget_path ) ) {
					require_once $widget_path;
				}
			}
		}
		/**
		 * Select2 Ajax Posts
		 * Fetch post/taxonomy data and render in select2 ajax search box
		 *
		 * @access public
		 * @return void
		 * @since  1.3.0
		 */
		public function wpmozo_ae_select2_ajax_posts() {
			/*if ( ! isset( $_POST['wpmozo_ae_select_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['wpmozo_ae_select_nonce'] ) ), 'wpmozo-select-nonce' ) ) {
				return;
			}*/

			$post_type   = 'post';
			$post_type   = ! empty( $_GET['post_type'] ) ? sanitize_text_field( wp_unslash( $_GET['post_type'] ) ) : '';
			$source_name = ! empty( $_GET['source_name'] ) ? sanitize_text_field( wp_unslash( $_GET['source_name'] ) ) : '';
			$search      = ! empty( $_GET['term'] ) ? sanitize_text_field( wp_unslash( $_GET['term'] ) ) : '';
			$results     = array();
			$post_list   = array();

			if ( 'taxonomy' === $source_name ) {
				$post_list = wp_list_pluck(
					get_terms(
						$post_type,
						array(
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
							'search'     => $search,
						)
					),
					'name',
					'term_id'
				);
			}

			if ( ! empty( $post_list ) ) {
				foreach ( $post_list as $key => $value ) {
					$results[] = array(
						'text' => $value,
						'id'   => $key,
					);
				}
			}
			wp_send_json( array( 'results' => $results ) );
		}
		/**
		 * Select2 Ajax Get Posts Value Titles
		 * get selected value to show elementor editor panel in select2 ajax search box
		 *
		 * @access public
		 * @return void
		 * @since  1.3.0
		 */
		public function wpmozo_ae_select2_ajax_get_title() {

			/*if ( ! isset( $_POST['wpmozo_ae_select_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['wpmozo_ae_select_nonce'] ) ), 'wpmozo-select-nonce' ) ) {
				return;
			}*/

			if ( empty( $_POST['id'] ) ) {
				wp_send_json_error( array() );
			}

			if ( empty( array_filter( sanitize_key( wp_unslash( $_POST['id'] ) ) ) ) ) {
				wp_send_json_error( array() );
			}

			$ids         = array_map( 'intval', $_POST['id'] );
			$post_type   = ! empty( $_POST['post_type'] ) ? sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) : '';
			$source_name = ! empty( $_POST['source_name'] ) ? sanitize_text_field( wp_unslash( $_POST['source_name'] ) ) : '';

			if ( 'taxonomy' === $source_name ) {
				$result = wp_list_pluck(
					get_terms(
						$post_type,
						array(
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
							'include'    => implode( ',', $ids ),
						)
					),
					'name',
					'term_id'
				);
			}

			if ( ! empty( $result ) ) {
				wp_send_json_success( array( 'results' => $result ) );
			} else {
				wp_send_json_error( array() );
			}

		}
	}
}
