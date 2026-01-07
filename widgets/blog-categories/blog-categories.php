<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.2
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Blog_Categories' ) ) {
	class WPMOZO_AE_Blog_Categories extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.7.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_blog_categories';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.7.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Blog Categories', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz blog categories', 'blog categories', 'wpmozo Blog Categories' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.7.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-blog-categories  wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.7.0
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
		 * @since 1.7.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-blog-categories-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-blog-categories-style' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.7.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'blog-categories/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * (
		 *
		 * @since 1.7.0
		 * @access protected
		 */
		protected function render() {

			$settings             = $this->get_settings_for_display();
			$number               = ! empty( $settings['number_of_categories'] ) ? intval( $settings['number_of_categories'] ) : 10;
			$selected_cats        = ! empty( $settings['select_categories'] ) ? $settings['select_categories'] : array();
			$order                = ! empty( $settings['category_order'] ) ? $settings['category_order'] : 'desc';
			$order_by             = ! empty( $settings['category_order_by'] ) ? $settings['category_order_by'] : 'name';
			$hide_empty           = ( 'yes' === $settings['hide_empty'] );
			$columns              = ! empty( $settings['number_of_columns'] ) ? intval( $settings['number_of_columns'] ) : 3;
			$post_count_text      = ! empty( $settings['post_count_text'] ) ? $settings['post_count_text'] : 'Articles';
			$show_as_super_number = ( 'yes' === $settings['show_as_super_number'] );

			$layout = esc_attr( $settings['layout'] );
			$layout = wpmozo_addons_lite_for_elementor()::$public_instance
				->wpmozo_ae_validate_layout(
					$layout,
					array( 'layout1', 'layout2', 'layout3' )
				);

			$title_heading_level = wpmozo_addons_lite_for_elementor()::$public_instance
				->wpmozo_ae_validate_heading_level(
					$settings['heading_level'],
					array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' )
				);

			$args = array(
				'taxonomy'   => 'category',
				'number'     => $number,
				'orderby'    => $order_by,
				'order'      => $order,
				'hide_empty' => $hide_empty,
			);

			if ( ! empty( $selected_cats ) ) {
				$args['include'] = array_map( 'intval', $selected_cats );
			}

			$categories = get_terms( $args );

			if ( empty( $categories ) || is_wp_error( $categories ) ) {
				if ( ! empty( $settings['no_result_text'] ) ) {
					echo '<div class="wpmozo_no_result">' . esc_html( $settings['no_result_text'] ) . '</div>';
				}
				return;
			}

			?>
			<div class="wpmozo_blog_categories">
				<div class="wpmozo_blog_categories_wrapper <?php echo esc_attr( $layout ); ?>">
					<?php
					$layout_file = plugin_dir_path( __DIR__ ) . "blog-categories/assets/layouts/{$layout}.php";

					if ( file_exists( $layout_file ) ) {
						include $layout_file;
					}
					?>
				</div>
			</div>	
			<?php
		}
	}
}
