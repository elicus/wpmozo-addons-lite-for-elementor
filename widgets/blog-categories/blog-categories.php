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
			wp_register_style( 'wpmozo-ae-blog-categories-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );

			return array( 'wpmozo-ae-blog-categories-style', 'wpmozo-ae-swiper-style', 'wpmozo-ae-font-awesome-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.7.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-blog-categories-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-blog-categories-script', 'wpmozo-ae-swiper' );
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

			$settings = $this->get_settings_for_display();
		
			/*------------------------------------
			 * Required Variables (From Controls)
			 *-----------------------------------*/
			$number        = ! empty( $settings['number_of_categories'] ) ? intval( $settings['number_of_categories'] ) : 10;
			$selected_cats = ! empty( $settings['select_categories'] ) ? $settings['select_categories'] : array();
			$order         = ! empty( $settings['category_order'] ) ? $settings['category_order'] : 'desc';
			$order_by      = ! empty( $settings['category_order_by'] ) ? $settings['category_order_by'] : 'name';
			$hide_empty    = ( 'yes' === $settings['hide_empty'] );
			$columns       = ! empty( $settings['number_of_columns'] ) ? intval( $settings['number_of_columns'] ) : 3;
		
			/*------------------------------------
			 * Layout & Heading Validation
			 *-----------------------------------*/
			$layout = esc_attr( $settings['layout'] );
			$layout = wpmozo_addons_lite_for_elementor()::$public_instance
				->wpmozo_ae_validate_layout(
					$layout,
					array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout5', 'layout6' )
				);
		
			$title_heading_level = wpmozo_addons_lite_for_elementor()::$public_instance
				->wpmozo_ae_validate_heading_level(
					$settings['title_heading_level'],
					array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' )
				);
		
			/*------------------------------------
			 * Category Query Args
			 *-----------------------------------*/
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
		
			/*------------------------------------
			 * No Result
			 *-----------------------------------*/
			if ( empty( $categories ) || is_wp_error( $categories ) ) {
				if ( ! empty( $settings['no_result_text'] ) ) {
					echo '<div class="dipl_no_result">' . esc_html( $settings['no_result_text'] ) . '</div>';
				}
				return;
			}
		
			/*------------------------------------
			 * Wrapper Attributes
			 *-----------------------------------*/
			$this->add_render_attribute( 'outer', 'class', 'dipl_blog_categories' );
			$this->add_render_attribute( 'wrapper', 'class', array(
				'dipl_blog_categories_wrapper',
				$layout, // layout1
			) );
			?>
		
			<div <?php echo $this->get_render_attribute_string( 'outer' ); ?>>
				<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
					<div class="dipl_blog_categories_inner">
		
						<?php foreach ( $categories as $category ) :
		
							$cat_id    = $category->term_id;
							$cat_name  = $category->name;
							$cat_slug  = $category->slug;
							$cat_count = intval( $category->count );
							$cat_link  = get_term_link( $category );
		
							if ( is_wp_error( $cat_link ) ) {
								continue;
							}
		
							/*------------------------------------
							 * Category Item Attributes
							 *-----------------------------------*/
							$this->add_render_attribute( 'cat_item', array(
								'id'    => 'dipl_blog_category_' . esc_attr( $cat_id ),
								'class' => array(
									'dipl_blog_category_item',
									'category_' . esc_attr( $cat_slug ),
								),
							) );
		
							/*------------------------------------
							 * Category Background Image (Optional)
							 *-----------------------------------*/
							$thumb_id = get_term_meta( $cat_id, 'thumbnail_id', true );
							if ( $thumb_id ) {
								$image_url = wp_get_attachment_image_url( $thumb_id, 'full' );
								if ( $image_url ) {
									$this->add_render_attribute(
										'cat_item',
										'style',
										'background-image:url(' . esc_url( $image_url ) . ');'
									);
								}
							}
							?>
		
							<div <?php echo $this->get_render_attribute_string( 'cat_item' ); ?>>
								<div class="dipl_blog_category_item_inner">
									<div class="dipl_blog_category_content">
		
										<<?php echo esc_attr( $title_heading_level ); ?>
											class="dipl_blog_category_name"
											id="<?php echo esc_attr( $cat_slug ); ?>">
											<?php echo esc_html( $cat_name ); ?>
										</<?php echo esc_attr( $title_heading_level ); ?>>
		
										<?php if ( 'yes' === $settings['show_post_count'] ) : ?>
											<div class="dipl_blog_category_count_wrap">
												<span class="dipl_blog_category_count">
													<?php
													printf(
														esc_html__( '%d Articles', 'wpmozo-addons-lite-for-elementor' ),
														$cat_count
													);
													?>
												</span>
											</div>
										<?php endif; ?>
		
									</div>
								</div>
		
								<a href="<?php echo esc_url( $cat_link ); ?>" class="dipl_abs_link">
									<?php echo esc_html( $cat_name ); ?>
								</a>
							</div>
		
							<?php
							$this->remove_render_attribute( 'cat_item' );
						endforeach; ?>
		
					</div>
				</div>
			</div>
		
			<?php
		}				
	}
}
