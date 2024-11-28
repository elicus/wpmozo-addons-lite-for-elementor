<?php

/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

if ( !class_exists( 'WPMOZO_AE_List' ) ) {
	class WPMOZO_AE_List extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_list';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'List', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-list wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.0.0
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
		 * @since 1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-list-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-list-style' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'list/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings           = $this->get_settings_for_display();
			$items_content      = isset($settings['wpmozo_items_content']) ? $settings['wpmozo_items_content'] : [];
			$layout             = isset($settings['wpmozo_layout']) ? $settings['wpmozo_layout'] : '';
			$icon_shape         = isset($settings['wpmozo_icon_shape']) ? $settings['wpmozo_icon_shape'] : '';
			$thumbnail_type     = isset($settings['wpmozo_thumbnail_type']) ? $settings['wpmozo_thumbnail_type'] : '';
			$item_thumbnail     = isset($settings['wpmozo_item_thumbnail']) ? $settings['wpmozo_item_thumbnail'] : '';
			$item_thumbnail_alt = isset($settings['wpmozo_item_thumbnail_alt']) ? $settings['wpmozo_item_thumbnail_alt'] : '';
			$hide_last_divider  = isset($settings['hide_last_divider']) ? $settings['hide_last_divider'] : '';

			?>
			<div class="wpmozo_list">
				<div class="wpmozo_list_wrapper">
					<div class="wpmozo_list_layout <?php echo esc_attr($layout); ?> <?php echo esc_attr($hide_last_divider); ?>">
						<?php foreach ($items_content as $index => $item) { ?>
							<div class="wpmozo_list_item">
								<div class="wpmozo_list_item_wrap">
									<div class="wpmozo_list_item_content_wrapper">
									<?php if ('use_image' === $item['wpmozo_thumbnail_type']) { ?>
										<img decoding="async" src="<?php echo esc_attr($item['wpmozo_item_thumbnail']['url']); ?>"
											alt="<?php echo esc_attr($item['wpmozo_item_thumbnail_alt']); ?>" class="wpmozo_list_img_icon">
									<?php } elseif ('use_icon' === $item['wpmozo_thumbnail_type']) { ?>
										<div
											class="wpmozo_list_icon <?php echo esc_attr($icon_shape); ?> <?php echo esc_html($item['wpmozo_thumbnail_type']); ?>">
											<?php if ('use_hexagon' === $icon_shape) { ?>
												<div class="hexagon_wrapper">
													<div class="hex">
														<div class="hexagon wpmozo_hexagon">
															<?php \Elementor\Icons_Manager::render_icon($item['wpmozo_thumbnail_icon'], ['aria-hidden' => 'true', 'class' => 'wpmozo_icon wpmozo_hex'], 'span'); ?>
														</div>
													</div>
												</div>
											<?php } else { ?>
												<?php \Elementor\Icons_Manager::render_icon($item['wpmozo_thumbnail_icon'], ['aria-hidden' => 'true', 'class' => 'wpmozo_icon'], 'span'); ?>
												
											<?php } ?>
										</div>
									<?php } ?>
									<div class="wpmozo_list_item_text"><?php echo esc_html($item['item_title']); ?></div>
									</div>
									<div class="wpmozo_list_divider"></div>
								</div>
							</div>

						<?php } ?>
					</div>
				</div>
			</div>
			<?php
		}
	}
}
