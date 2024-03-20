<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2024 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Team_Slider' ) ) {
	class WPMOZO_AE_Team_Slider extends Widget_Base {

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
			return 'wpmozo_ae_team_slider';
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
			return esc_html__( 'Team Slider', 'wpmozo-addons-lite-for-elementor' );
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
			return 'eicon-slides  wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ale-team-slider-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ale-team-slider-style', 'wpmozo-ale-swiper-style', 'wpmozo-ale-font-awesome-style' );
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
			wp_register_script( 'wpmozo-ale-team-slider-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ale-swiper', 'wpmozo-ale-team-slider-script' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'team-slider/assets/controls/controls.php';
		}

		/**
		 * This function dynamically creates script parameters according to the user settings
		 *
		 * @return string
		 * */
		public function wpmozo_ae_render_slider_script() {
			$order_class         = 'elementor-element-' . $this->get_id();
			$swiper              = str_replace( '-', '_', $order_class );
			$settings            = $this->get_settings_for_display();
			$slide_effect        = $settings['slide_effect'];
			$show_arrow          = $settings['show_arrow'];
			$show_control_dot    = $settings['show_control_dot'];
			$loop                = $settings['slider_loop'];
			$autoplay            = $settings['autoplay'];
			$autoplay_speed      = absint( $settings['autoplay_speed'] );
			$transition_duration = absint( $settings['slide_transition_duration'] );
			$pause_on_hover      = $settings['pause_on_hover'];
			$dynamic_bullets     = 'yes' === $settings['enable_dynamic_dots'] && in_array( $settings['control_dot_style'], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';
			$autoheight          = 'yes' === $settings['enable_auto_height'] ? 'true' : 'false';

			if ( 'coverflow' === $slide_effect || 'slide' === $slide_effect ) {
				$cards_per_slide         = $settings['cards_per_slide'];
				$slides_per_group        = $settings['slides_per_group'];
				$space_between_slides    = $settings['space_between_slides']['size'];
				$enable_coverflow_shadow = 'yes' === $settings['enable_coverflow_shadow'] ? 'true' : 'false';
				$coverflow_rotate        = 'coverflow' === $slide_effect ? absint( $settings['coverflow_rotate']['size'] ) : '';
				$coverflow_depth         = 'coverflow' === $slide_effect ? absint( $settings['coverflow_depth']['size'] ) : '';
			}

			$autoplay_speed           = '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
			$transition_duration      = '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
			$loop                     = 'yes' === $loop ? 'true' : 'false';
			$arrows                   = 'false';
			$dots                     = 'false';
			$autoplay_slides          = 0;
			$cube                     = 'false';
			$coverflow                = 'false';
			$slides_each_group        = 1;
			$slides_each_group_skip   = 0;
			$slides_each_group        = 1;
			$slides_each_group_ipad   = 1;
			$slides_each_group_mobile = 1;
			$slides_each_group_skip   = 0;

			if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
				$cards_per_view      = $cards_per_slide;
				$cards_space_between = $space_between_slides;
				$slides_each_group   = $slides_per_group;

				if ( $cards_per_view > $slides_each_group && 1 !== $slides_each_group ) {
					$slides_each_group_skip = $cards_per_view - $slides_each_group;
				}
			} else {
				$cards_per_view      = 1;
				$cards_space_between = 0;
			}

			if ( 'yes' === $show_arrow ) {
				$arrows = "{    
	                            nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
	                            prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
	                    }";
			}

			if ( 'yes' === $show_control_dot ) {
				$dots = "{
	                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
	                        dynamicBullets: " . $dynamic_bullets . ',
	                        clickable: true,
	                    }';
			}

			if ( 'yes' === $autoplay ) {
				if ( 'yes' === $pause_on_hover ) {
					$autoplay_slides = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: true,
	                            }';
				} else {
					$autoplay_slides = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: false,
	                            }';
				}
			}

			if ( 'cube' === $slide_effect ) {
				$cube = '{
	                        shadow: false,
	                        slideShadows: false,
	                    }';
			}

			if ( 'coverflow' === $slide_effect ) {
				$coverflow = '{
	                            rotate: ' . $coverflow_rotate . ',
	                            stretch: 0,
	                            depth: ' . $coverflow_depth . ',
	                            modifier: 1,
	                            slideShadows : ' . $enable_coverflow_shadow . ',
	                        }';
			}

			$script  = '<script type="text/javascript">';
			$script .= 'jQuery(function($) {';
			$script .= 'var ' . esc_attr( $swiper ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
	                            effect: "' . $slide_effect . '",
	                            slidesPerView: ' . $cards_per_view . ',
	                            slidesPerGroup: ' . $slides_each_group . ',
	                            autoplay: ' . $autoplay_slides . ',
	                            autoHeight: ' . $autoheight. ',
	                            spaceBetween: ' . intval( $cards_space_between ) . ',
	                            cubeEffect: ' . $cube . ',
	                            coverflowEffect: ' . $coverflow . ',
	                            speed: ' . $transition_duration . ',
	                            loop: ' . $loop . ',
	                            pagination: ' . $dots . ',
	                            navigation: ' . $arrows . ',
	                            grabCursor: \'true\',
	                            breakpoints: {
	                            	981: {
			                          	slidesPerView: ' . $cards_per_view . ',
			                          	spaceBetween: ' . intval( $cards_space_between ) . ',
	                            		slidesPerGroup: ' . $slides_each_group . ',
			                        }
			                    },
	                    });';

			if ( 'yes' === $pause_on_hover && 'yes' === $autoplay ) {
				$script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseenter", function(e) {
								if ( typeof ' . esc_attr( $swiper ) . '_swiper.autoplay.stop === "function" ) {
									' . esc_attr( $swiper ) . '_swiper.autoplay.stop();
								}
	                        });';
				$script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseleave", function(e) {
	        					if ( typeof ' . esc_attr( $swiper ) . '_swiper.autoplay.start === "function" ) {
	                            	' . esc_attr( $swiper ) . '_swiper.autoplay.start();
	                            }
	                        });';
			}

			if ( 'true' !== $loop ) {
				$script .= esc_attr( $swiper ) . '_swiper.on(\'reachEnd\', function(){
	                            ' . esc_attr( $swiper ) . '_swiper.autoplay = false;
	                        });';
			}

			$script .= '});</script>';

			return $script;
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * (
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {

			$settings                            = $this->get_settings_for_display();
			$swiper_layout_items                 = array( 2, 3, 6, 3, 6 );
			$slide_effect                        = $settings['slide_effect'];
			$cards_per_slide                     = $settings['cards_per_slide'];
			$enable_coverflow_shadow             = $settings['enable_coverflow_shadow'];
			$coverflow_shadow_color              = $settings['coverflow_shadow_color'];
			$coverflow_rotate                    = $settings['coverflow_rotate'];
			$coverflow_depth                     = $settings['coverflow_depth'];
			$equalize_slides_height              = $settings['equalize_slides_height'];
			$equal_height                        = ( 'equal_height' === $settings['equalize_slides_height'] ) ? ' equal-height' : '';
			$slider_loop                         = $settings['slider_loop'];
			$autoplay                            = $settings['autoplay'];
			$autoplay_speed                      = $settings['autoplay_speed'];
			$pause_on_hover                      = $settings['pause_on_hover'];
			$show_arrow                          = $settings['show_arrow'];
			$show_arrow_on_hover                 = $settings['show_arrow_on_hover'];
			$show_control_dot                    = $settings['show_control_dot'];
			$control_dot_style                   = $settings['control_dot_style'];
			$coverflow_shadow_color              = $settings['coverflow_shadow_color'];
			$control_dot_active_color            = $settings['control_dot_active_color'];
			$control_dot_inactive_color          = $settings['control_dot_inactive_color'];
			$slide_transition_duration           = $settings['slide_transition_duration'];
			$arrow_color                         = $settings['arrows_color'];
			$arrow_background_color              = $settings['arrows_background_color'];
			$arrow_background_color_hover        = $settings['arrows_background_hover_color'];
			$arrow_background_border_size        = $settings['arrows_background_border_size'];
			$arrow_background_border_color       = $settings['arrows_background_border_color'];
			$arrow_background_border_color_hover = $settings['arrows_background_border_hover_color'];
			$arrows_position                     = $settings['arrows_position'];
			$order_class                         = 'elementor-element-' . $this->get_id();
			$swiper_layout_wrapper               = '';
			$icon_wrapper                        = '';
			$content_warpper                     = '';

			$layout                    = $settings['layout'];
			$number_of_members         = $settings['number_of_members'];
			$team_order                = $settings['team_order'];
			$team_order_by             = $settings['team_order_by'];
			$select_categories         = $settings['select_categories'];
			$no_result_text            = $settings['no_result_text'];
			$show_description          = $settings['show_description'];
			$show_designation          = $settings['show_designation'];
			$show_social_icon          = $settings['show_social_icon'];
			$link_target               = $settings['link_target'];
			$show_skills               = $settings['show_skills'];
			$name_text_heading_level   = $settings['name_text_heading_level'];
			$designation_heading_level = $settings['designation_heading_level'];

			if ( empty( $no_result_text ) ) {
				$no_result_text = 'No Team Member Found!';
			}
			$this->add_render_attribute( 'wpmozo_ae_swiper_layout_title', 'class', 'wpmozo_ae_swiper_layout_title' );
			$this->add_render_attribute( 'wpmozo_ae_swiper_layout_description', 'class', 'wpmozo_ae_swiper_layout_description' );
			$this->add_render_attribute( 'button_text', 'class', 'wpmozo_button' );
			$this->add_render_attribute( 'button_wrapper', 'class', 'wpmozo_ae_swiper_layout_button_wrapper' );
			$this->add_render_attribute( 'button_wrapper_inner', 'class', 'wpmozo_ae_swiper_layout_button_inner_wrapper' );

			$args = array(
				'post_type'      => 'wpmozoae-team-member',
				'posts_per_page' => $number_of_members,
				'orderby'        => $team_order_by,
				'order'          => $team_order,
			);
			if ( is_array( $select_categories ) && count( $select_categories ) >= 1 ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'wpmozo-ae-team-member-category',
						'field'    => 'term_id',
						'terms'    => $select_categories,
						'operator' => 'IN',
					),
				);
			}
			$query = new WP_Query( $args );
			if ( $query->found_posts > 0 ) {
				?>
				<div class="wpmozo_ae_swiper_wrapper 
				<?php
				echo esc_attr( $layout );
				echo esc_attr( $equal_height );
				?>
				">
					<div class="wpmozo_ae_swiper_layout wpmozo_ae_swiper_inner_wrap">
						<div class="swiper-container">
							<div class="swiper-wrapper<?php echo esc_attr( $equal_height ); ?>">						
								<?php
								if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . "team-slider/assets/layouts/$layout.php" ) ) {
									include plugin_dir_path( dirname( __FILE__ ) ) . "team-slider/assets/layouts/$layout.php";
								}

								?>
							</div> <!-- swiper-wrapper -->
				</div> <!-- swiper-container -->
				<?php
				if ( 'yes' === $show_arrow ) {
					$this->add_render_attribute(
						'swiper_arrow_next',
						array(
							'class'                 => array( 'wpmozo_ae_swiper_layout_icon_next', 'swiper-button-next' ),
							'aria-hidden'           => 'true',
							'data-next_slide_arrow' => $settings['next_slide_arrow']['value'],
						)
					);
					if ( 'svg' !== $settings['next_slide_arrow']['library'] ) {
						$next = Icons_Manager::try_get_icon_html(
							$settings['next_slide_arrow'],
							array(
								'aria-hidden'           => 'true',
								'class'                 => array( 'wpmozo_ae_swiper_layout_icon_next', 'swiper-button-next' ),
								'data-next_slide_arrow' => $settings['next_slide_arrow']['value'],
							),
							'span'
						);

					}
					if ( 'svg' === $settings['next_slide_arrow']['library'] ) {
						$next = '<div ' . $this->get_render_attribute_string( 'swiper_arrow_next' ) . '>'
								. Icons_Manager::try_get_icon_html(
									$settings['next_slide_arrow'],
									array(
										'aria-hidden' => 'true',
										'class'       => array( 'wpmozo_ae_swiper_layout_icon_next', 'swiper-button-next' ),
										'data-next_slide_arrow' => $settings['next_slide_arrow']['value'],
									),
									'span'
								)
								. '</div>';
					}
					$this->add_render_attribute(
						'swiper_arrow_prev',
						array(
							'class'                     => array( 'wpmozo_ae_swiper_layout_icon_prev', 'swiper-button-prev' ),
							'aria-hidden'               => 'true',
							'data-previous_slide_arrow' => $settings['previous_slide_arrow']['value'],
						)
					);
					if ( 'svg' !== $settings['previous_slide_arrow']['library'] ) {
						$prev = Icons_Manager::try_get_icon_html(
							$settings['previous_slide_arrow'],
							array(
								'aria-hidden'           => 'true',
								'class'                 => array( 'wpmozo_ae_swiper_layout_icon_prev', 'swiper-button-prev' ),
								'data-next_slide_arrow' => $settings['previous_slide_arrow']['value'],
							),
							'span'
						);

					}
					if ( 'svg' === $settings['previous_slide_arrow']['library'] ) {
						$prev = '<div ' . $this->get_render_attribute_string( 'swiper_arrow_prev' ) . '>'
								. Icons_Manager::try_get_icon_html(
									$settings['previous_slide_arrow'],
									array(
										'aria-hidden' => 'true',
										'class'       => array( 'wpmozo_ae_swiper_layout_icon_prev', 'swiper-button-prev' ),
										'data-previous_slide_arrow' => $settings['previous_slide_arrow']['value'],
									),
									'span'
								)
								. '</div>';
					}
					if ( ! empty( $arrows_position ) ) {
						$this->add_render_attribute( 'data-arrow', 'data-arrows', $arrows_position );
						$arrows_position_data      = '';
							$arrows_position_data .= $this->get_render_attribute_string( 'data-arrow' );
					}
					?>
					<div class="wpmozo_ae_swiper_navigation" <?php echo esc_html( ( ! empty( $arrows_position ) ? $arrows_position_data : '' ) ); ?> ><?php echo wp_kses_post( $next ); ?>  <?php echo wp_kses_post( $prev ); ?> </div>
					<?php
					if ( 'yes' === $show_arrow_on_hover ) {

						?>
							<style> 
								.<?php echo esc_attr( $order_class ); ?> .wpmozo_ae_swiper_navigation .swiper-button-prev { 
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease; 
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_ae_swiper_navigation .swiper-button-next {
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_ae_swiper_navigation .swiper-button-prev, 
								.<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_ae_swiper_navigation .swiper-button-next {
									visibility: visible;
									opacity: 1;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_ae_swiper_navigation .swiper-button-prev.swiper-button-disabled, .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_ae_swiper_navigation .swiper-button-next.swiper-button-disabled {
									opacity: 0.35;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_outside .swiper-button-prev {
									'declaration' = 'left: 50px;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_outside .swiper-button-next {
									right: 50px;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_outside .swiper-button-prev {
									'declaration' = 'left: 0;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_outside .swiper-button-next {
									right: 0;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_inside .swiper-button-prev{
									left: -50px;
								}
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_inside .swiper-button-next {
									right: -50px;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_inside .swiper-button-prev {
									left: 0;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_inside .swiper-button-next {
									right: 0;
								}
						</style>
						<?php
					}
				}
				?>
					</div> <!-- wpmozo_ae_swiper_layout_layout -->
				<?php

				if ( 'yes' === $show_control_dot ) {
					?>

						<div class="wpmozo_ae_swiper_pagination"><div class="swiper-pagination <?php echo esc_attr( $control_dot_style ); ?>"></div></div>
					<?php
				}
				?>
				</div> <!-- wpmozo_ae_swiper_wrapper -->
				<?php

			} else {
				?>
				<div class="entry">
					<h1> <?php echo esc_html( $no_result_text ); ?> </h1>
					<p><?php echo esc_html__( 'Try changing your widget settings or add some new team member.', 'wpmozo-addons-lite-for-elementor' ); ?></p>
				</div>
				<?php
			}
			echo( wp_kses( $this->wpmozo_ae_render_slider_script(), array( 'script' => true ) ) );
		}
	}
}
