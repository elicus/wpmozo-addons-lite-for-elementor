<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Horizontal_Scrolling_Posts' ) ) {
	class WPMOZO_AE_Horizontal_Scrolling_Posts extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_horizontal_scrolling_posts';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Horizontal Scrolling Posts', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz horizontal scrolling posts', 'wpmozo horizontal scrolling posts' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-horizontal-scrolling-posts wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-horizontal-scrolling-posts-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-horizontal-scrolling-posts-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-horizontal-scrolling-posts-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-horizontal-scrolling-posts-script', 'wpmozo-ae-gsap', 'wpmozo-ae-scrollTrigger' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.3.0
		 * @access protected
		 */
		protected function register_controls() {

			// Separate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'horizontal-scrolling-posts/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();

			$exclude_posts              = isset( $settings['exclude_posts'] ) ? $settings['exclude_posts'] : '';
			$exclude_password_protected = isset( $settings['exclude_password_protected'] ) ? $settings['exclude_password_protected'] : 'yes';
			$post_order_by              = isset( $settings['post_order_by'] ) ? $settings['post_order_by'] : 'date';
			$post_order                 = isset( $settings['post_order'] ) ? $settings['post_order'] : 'desc';
			$posts_number               = isset( $settings['posts_number'] ) && $settings['posts_number'] > 0 ? $settings['posts_number'] : -1;
			$ignore_sticky_posts        = isset( $settings['ignore_sticky_posts'] ) ? $settings['ignore_sticky_posts'] : 'yes';
			$layout                     = esc_attr( $settings['layout'] );
			$layout                     = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_layout( $layout, array( 'layout1', 'layout2' ) );
			$title_heading_level        = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$animation_start_element    = isset( $settings['animation_start_element']['size'] ) ? $settings['animation_start_element']['size'] : '';
			$animation_start_viewport   = isset( $settings['animation_start_viewport']['size'] ) ? $settings['animation_start_viewport']['size'] : '';
			$image_size                 = isset( $settings['image_size_size'] ) ? $settings['image_size_size'] : '';
			$show_button                = isset( $settings['show_button'] ) ? $settings['show_button'] : 'no';
			$excerpt_length             = isset( $settings['excerpt_length'] ) ? $settings['excerpt_length'] : '';
			$button_link_target         = isset( $settings['button_link_target'] ) ? $settings['button_link_target'] : '';

			$exclude_posts_array = array();
			if ( ! empty( $exclude_posts ) ) {
				$exclude_posts_array = array_map( 'absint', explode( ',', $exclude_posts ) );
			}

			if ( 'yes' === $exclude_password_protected ) {
				$protected_posts = get_posts(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'has_password'   => true,
						'fields'         => 'ids',
						'posts_per_page' => -1,
					)
				);

				if ( ! empty( $protected_posts ) ) {
					$exclude_posts_array = array_merge( $exclude_posts_array, $protected_posts );
				}
			}

			$exclude_posts_array = array_unique( $exclude_posts_array );
			$sticky_posts        = get_option( 'sticky_posts' );
			$sticky_posts        = is_array( $sticky_posts ) ? array_map( 'absint', $sticky_posts ) : array();

			$all_post_ids = array();

			$is_editor        = \Elementor\Plugin::$instance->editor->is_edit_mode();
			$is_ignore_sticky = ( 'yes' === $ignore_sticky_posts );

			// Editor mode fix for sticky behavior.
			if ( $is_editor && ! $is_ignore_sticky && ! empty( $sticky_posts ) ) {
				// Remove excluded sticky posts.
				$valid_sticky_ids = array_diff( $sticky_posts, $exclude_posts_array );

				// Query sticky posts first.
				$sticky_query = get_posts(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'post__in'       => $valid_sticky_ids,
						'orderby'        => $post_order_by,
						'order'          => $post_order,
						'fields'         => 'ids',
						'posts_per_page' => $posts_number,
					)
				);

				// Then query remaining normal posts.
				$normal_query = get_posts(
					array(
						'post_type'           => 'post',
						'post_status'         => 'publish',
						'post__not_in'        => array_merge( $exclude_posts_array, $sticky_posts ),
						'orderby'             => $post_order_by,
						'order'               => $post_order,
						'fields'              => 'ids',
						'ignore_sticky_posts' => 1,
						'posts_per_page'      => $posts_number,
					)
				);

				$all_post_ids = array_merge( $sticky_query, $normal_query );
				$all_post_ids = array_unique( $all_post_ids );

				if ( $posts_number > 0 ) {
					$all_post_ids = array_slice( $all_post_ids, 0, $posts_number );
				}

				$query_args = array(
					'post_type'      => 'post',
					'post__in'       => $all_post_ids,
					'post_status'    => 'publish',
					'orderby'        => 'post__in',
					'posts_per_page' => count( $all_post_ids ),
				);
			} else {
				// Frontend or ignore_sticky = yes.
				$query_args = array(
					'post_type'           => 'post',
					'post_status'         => 'publish',
					'posts_per_page'      => $posts_number,
					'orderby'             => $post_order_by,
					'order'               => $post_order,
					'post__not_in'        => $exclude_posts_array,
					'ignore_sticky_posts' => $is_ignore_sticky ? 1 : 0,
				);
			}

			$query = new WP_Query( $query_args );

			$this->add_render_attribute( 'wrapper', 'class', 'wpmozo_sticky_posts_wrapper ' . $layout );
			$this->add_render_attribute( 'wrapper', 'data-animation_start_element_pos', esc_attr( $animation_start_element ) . '%' );
			$this->add_render_attribute( 'wrapper', 'data-animation_start_viewport_pos', esc_attr( $animation_start_viewport ) . '%' );

			if ( $query->have_posts() ) :
				?>
				<div class="wpmozo_horizontal_scrolling_posts">
					<div class="pin-spacer">
						<div class="wpmozo_sticky_posts_scroller">
							<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
								<div class="wpmozo_sticky_posts_inner">
									<?php
									while ( $query->have_posts() ) :
										$query->the_post();
										?>
										<div class="wpmozo_horizontal_scrolling_posts_item item_<?php echo esc_attr( $layout ); ?> post_id-<?php echo esc_attr( get_the_ID() ); ?>">
											<div class="wpmozo_horizontal_scrolling_posts_wrapper icon_<?php echo esc_attr( $settings['button_icon_placement'] ); ?>">
												<?php
												if ( in_array( $layout, array( 'layout1', 'layout2' ), true ) ) {
													$layout_path = plugin_dir_path( __DIR__ ) . "horizontal-scrolling-posts/assets/layouts/$layout.php";
													if ( file_exists( $layout_path ) ) {
														include $layout_path;
													}
												}
												?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php wp_reset_postdata(); ?>
				<?php
			endif;
		}
	}
}