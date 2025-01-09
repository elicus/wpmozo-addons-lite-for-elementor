<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( !class_exists( 'WPMOZO_AE_Star_Rating' ) ) {
	class WPMOZO_AE_Star_Rating extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_star_rating';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Star Rating', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-star-rating wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.1.0
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
		 * @since 1.1.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-star-rating-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-star-rating-style' );
		}



		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'star-rating/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function render() {
			$settings            = $this->get_settings_for_display();
			$title_text          = $settings[ 'title_text' ];
			$image_class         = 'wpmozo_ae_star_rating_image';
			$rating_count        = $settings[ 'rating_count' ];
			$image_alt_text      = $settings[ 'image_alt_text' ];
			$description_text    = $settings[ 'description_text' ];
			$star_rating_scale   = $settings[ 'star_rating_scale' ];
			$show_rating_number  = $settings[ 'show_rating_number_switcher' ];
			$title_heading_level = wpmozo_ae_validate_heading_level( $settings[ 'title_heading_level' ] );
			if ( !empty( $settings[ 'image' ][ 'url' ] ) ) {
				$image = $settings[ 'image' ][ 'url' ];
			}
			
			?>
				<div class="wpmozo_ae_star_rating_wrapper">
					<div class="wpmozo_ae_star_rating_image_container">
						<img src="<?php echo esc_url( $image ); ?>" class="<?php echo esc_attr( $image_class ); ?>"
							alt="<?php echo esc_attr( $image_alt_text ); ?>" />
					</div>
					<div class="wpmozo_ae_star_rating_title_container">
						<div class="wpmozo_ae_star_rating_title"><<?php echo esc_html( $title_heading_level ); ?>>
							<?php echo esc_html( $title_text ); ?> </<?php echo esc_html( $title_heading_level ); ?>>
						</div>
						<div class="wpmozo_ae_star_rating_rating_wrapper">
							<span itemprop="starRating" itemtype="http://schema.org/Rating">
								<span class="wpmozo_ae_star_rating_stars">
									<?php
									$rating = ceil( floatval( $rating_count ) * 2 ) / 2; // Round up rating to the nearest 0.5 increment
									$rating_scale = intval( $star_rating_scale[ 'size' ] ); // Convert scale to integer
									// Loop through each star
									for ( $i = 1; $i <= $rating_scale; $i++ ) {
										if ( $rating >= $i ) {
											// Full filled star
											echo '<span class="wpmozo_ae_star_rating_star wpmozo_ae_star_rating_filled_star"></span>';
										} elseif ( $rating > $i - 1 && $rating < $i ) {
											// Half filled star
											echo '<span class="wpmozo_ae_star_rating_star wpmozo_ae_star_rating_half_filled_star"></span>';
										} else {
											// Empty star
											echo '<span class="wpmozo_ae_star_rating_star wpmozo_ae_star_rating_empty_star"></span>';
										}
									}
									?>
								</span>
								<?php if ( $show_rating_number === 'yes' ) { ?>
									<span class="wpmozo_ae_star_rating_number">
										( <?php echo esc_html( $rating ); ?>/<?php echo esc_html( $star_rating_scale[ 'size' ] ); ?> ) 
									</span>
								<?php } ?>
							</span>
						</div>
					</div>
					<div class="wpmozo_ae_star_rating_description">
						<?php echo wp_kses_post( $description_text ); ?>
					</div>
				</div>
			<?php
		}
	}
}