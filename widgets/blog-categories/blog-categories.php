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


		public function wpmozo_render_slider_script() {
			$settings             = $this->get_settings_for_display();
			$order_class          = 'elementor-element-' . $this->get_id();
			$loop                 = esc_attr( $settings['slider_loop'] );
			$swiper               = str_replace( '-', '_', $order_class );
			$autoplay             = esc_attr( $settings['autoplay'] );
			$show_arrow           = esc_attr( $settings['show_arrow'] );
			$slide_effect         = esc_attr( $settings['slide_effect'] );
			$autoplay_speed       = intval( $settings['autoplay_speed'] );
			$pause_on_hover       = esc_attr( $settings['pause_on_hover'] );
			$show_control_dot     = esc_attr( $settings['show_control_dot'] );
			$transition_duration  = intval( $settings['slide_transition_duration'] );
			$dynamic_bullets      = 'yes' === $settings['enable_dynamic_dots'] && in_array( $settings['control_dot_style'], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';
			$autoheight           = 'yes' === $settings['enable_auto_height'] ? 'true' : 'false';
			$autoplay_speed       = ( '' !== $autoplay_speed && 0 !== $autoplay_speed ) ? $autoplay_speed : 0;
			$transition_duration  = ( '' !== $transition_duration && 0 !== $transition_duration ) ? $transition_duration : 1000;
			$loop                 = 'yes' === $loop ? 'true' : 'false';
			$arrows               = 'false';
			$dots                 = 'false';
			$autoplaySlides       = 0;
			$cube                 = 'false';
			$coverflow            = 'false';
			$slidesPerGroup       = 1;
			$slidesPerGroupSkip   = 0;
			$slidesPerGroupIpad   = 1;
			$slidesPerGroupMobile = 1;

			if ( 'coverflow' === $slide_effect || 'slide' === $slide_effect ) {
				$posts_per_slide         = $settings['posts_per_slide'];
				$slides_per_group        = $settings['slides_per_group'];
				$space_between_slides    = $settings['space_between_slides']['size'];
				$enable_coverflow_shadow = 'yes' === $settings['enable_coverflow_shadow'] ? 'true' : 'false';
				$coverflow_rotate        = 'coverflow' === $slide_effect ? intval( $settings['coverflow_rotate']['size'] ) : '';
				$coverflow_depth         = 'coverflow' === $slide_effect ? intval( $settings['coverflow_depth']['size'] ) : '';
			}

			if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
				$cards_per_view      = $posts_per_slide;
				$cards_space_between = $space_between_slides;
				$slidesPerGroup      = $slides_per_group;

				if ( $cards_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
					$slidesPerGroupSkip = $cards_per_view - $slidesPerGroup;
				}
			} else {
				$cards_per_view      = 1;
				$cards_space_between = 0;
				$slides_per_group    = 1;
			}

			$posts_per_slide_tablet  = isset( $settings['posts_per_slide_tablet'] ) && ! empty( $settings['posts_per_slide_tablet'] ) ? $settings['posts_per_slide_tablet'] : $cards_per_view;
			$posts_per_slide_mobile  = isset( $settings['posts_per_slide_mobile'] ) && ! empty( $settings['posts_per_slide_mobile'] ) ? $settings['posts_per_slide_mobile'] : $cards_per_view;
			$slides_per_group_tablet = isset( $settings['slides_per_group_tablet'] ) && ! empty( $settings['slides_per_group_tablet'] ) ? $settings['slides_per_group_tablet'] : $slides_per_group;
			$slides_per_group_mobile = isset( $settings['slides_per_group_mobile'] ) && ! empty( $settings['slides_per_group_mobile'] ) ? $settings['slides_per_group_tablet'] : $slides_per_group;

			$space_between_slides_tablet = $cards_space_between;
			if ( isset( $settings['space_between_slides_tablet']['size'] ) ) {
				$space_between_slides_tablet = $settings['space_between_slides_tablet']['size'];
			}

			$space_between_slides_mobile = $cards_space_between;
			if ( isset( $settings['space_between_slides_mobile']['size'] ) ) {
				$space_between_slides_mobile = $settings['space_between_slides_mobile']['size'];
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
				$disableOnInteraction = 'yes' === $pause_on_hover ? 'true' : 'false';
				$autoplaySlides       = '{
					delay:' . $autoplay_speed . ',
					disableOnInteraction:' . $disableOnInteraction . ',
				}';
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
			?>
				<script type="text/javascript">
					jQuery(function($) {
						var <?php echo wp_kses_post( $swiper ); ?>_swiper = new Swiper( '.<?php echo wp_kses_post( $order_class ); ?> .swiper-container', {
							slidesPerView: <?php echo wp_kses_post( $cards_per_view ); ?>,
							autoplay: <?php echo wp_kses_post( $autoplaySlides ); ?>,
							spaceBetween: <?php echo intval( $cards_space_between ); ?>,
							slidesPerGroup: <?php echo wp_kses_post( $slidesPerGroup ); ?>,
							slidesPerGroupSkip: <?php echo wp_kses_post( $slidesPerGroupSkip ); ?>,
							effect: "<?php echo wp_kses_post( $slide_effect ); ?>",
							cubeEffect: <?php echo wp_kses_post( $cube ); ?>,
							coverflowEffect: <?php echo wp_kses_post( $coverflow ); ?>,
							speed: <?php echo wp_kses_post( $transition_duration ); ?>,
							pagination: <?php echo wp_kses_post( $dots ); ?>,
							navigation: <?php echo wp_kses_post( $arrows ); ?>,
							grabCursor: 'true',
							autoHeight: <?php echo wp_kses_post( $autoheight ); ?>,
							observer: true,
							observeParents: true,
							loop: <?php echo wp_kses_post( $loop ); ?>,
							breakpoints: {
								981: {
									slidesPerView: <?php echo wp_kses_post( $cards_per_view ); ?>,
									spaceBetween: <?php echo intval( $cards_space_between ); ?>,
									slidesPerGroup: <?php echo wp_kses_post( $slidesPerGroup ); ?>,
									slidesPerGroupSkip: <?php echo wp_kses_post( $slidesPerGroupSkip ); ?>,
								},
								768: {
									slidesPerView: <?php echo wp_kses_post( $posts_per_slide_tablet ); ?>,
									spaceBetween: <?php echo intval( $space_between_slides_tablet ); ?>,
									slidesPerGroup: <?php echo wp_kses_post( isset( $slides_per_group_tablet ) ? $slides_per_group_tablet : 1 ); ?>,
									slidesPerGroupSkip: <?php echo wp_kses_post( $slidesPerGroupSkip ); ?>,
								},
								0: {
									slidesPerView: <?php echo wp_kses_post( $posts_per_slide_mobile ); ?>,
									spaceBetween: <?php echo intval( $space_between_slides_mobile ); ?>,
									slidesPerGroup: <?php echo wp_kses_post( isset( $slides_per_group_mobile ) ? $slides_per_group_mobile : 1 ); ?>,
									slidesPerGroupSkip: <?php echo wp_kses_post( $slidesPerGroupSkip ); ?>,
								},
							},

						} );

						<?php
						if ( 'yes' === $pause_on_hover && 'yes' === $autoplay ) {
							?>
							jQuery(".<?php echo wp_kses_post( $order_class ); ?> .swiper-container").on("mouseenter", function(e) {
								if ( typeof <?php echo wp_kses_post( $swiper ); ?>_swiper.autoplay.stop === "function" ) {
									<?php echo wp_kses_post( $swiper ); ?>_swiper.autoplay.stop();
								}
							});

							jQuery(".<?php echo wp_kses_post( $order_class ); ?> .swiper-container").on("mouseleave", function(e) {
								if (typeof <?php echo wp_kses_post( $swiper ); ?>_swiper.autoplay.start === "function") {
									<?php echo wp_kses_post( $swiper ); ?>_swiper.autoplay.start();
								}
							});
							<?php
						}
						if ( 'true' !== $loop ) {
							?>
							<?php echo wp_kses_post( $swiper ); ?>_swiper.on('reachEnd', function() {
								<?php echo wp_kses_post( $swiper ); ?>_swiper.autoplay = false;
							});

							<?php
						}
						?>
					});
				</script>
			<?php
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

			$settings                = $this->get_settings_for_display();
			$swiper_layout_items     = array( 2, 3, 6, 3, 6 );
			$slide_effect            = $settings['slide_effect'];
			$posts_per_slide         = $settings['posts_per_slide'];
			$enable_coverflow_shadow = $settings['enable_coverflow_shadow'];
			$coverflow_rotate        = $settings['coverflow_rotate'];
			$coverflow_depth         = $settings['coverflow_depth'];
			$equalize_slides_height  = $settings['equalize_slides_height'];
			$equal_height            = ( 'equal_height' === $settings['equalize_slides_height'] ) ? ' equal-height' : '';
			$slider_loop             = $settings['slider_loop'];
			$autoplay                = $settings['autoplay'];
			$autoplay_speed          = $settings['autoplay_speed'];
			$pause_on_hover          = $settings['pause_on_hover'];
			$show_arrow              = $settings['show_arrow'];
			$show_arrow_on_hover     = $settings['show_arrow_on_hover'];
			$show_control_dot        = $settings['show_control_dot'];
			$control_dot_style       = $settings['control_dot_style'];
			$arrows_position         = $settings['arrows_position'];
			$order_class             = 'elementor-element-' . $this->get_id();
			$layout                  = esc_attr( $settings['layout'] );
			$layout                  = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_layout( $layout, array( 'layout1', 'layout2', 'layout3', 'layout4' ) );
			$number_of_posts         = intval( $settings['number_of_posts'] );
			$post_order              = esc_attr( $settings['post_order'] );
			$post_order_by           = esc_attr( $settings['post_order_by'] );
			$no_result_text          = esc_attr( $settings['no_result_text'] );
			$post_date               = $settings['post_date'];
			$show_date               = $settings['show_date'];
			$show_author             = $settings['show_author'];
			$show_categories         = $settings['show_categories'];
			$show_comments           = $settings['show_comments'];
			$show_thumbnail          = $settings['show_thumbnail'];
			$ignore_sticky_posts     = $settings['ignore_sticky_posts'];
			$offset                  = $settings['offset'];
			$heading_level           = $settings['heading_level'];
			$featured_image_size     = $settings['featured_image_size'];
			$enable_read_more        = $settings['show_more'];
			$number_of_posts         = isset( $number_of_posts ) && $number_of_posts > -1 ? $number_of_posts : -1;

			// Get the selected category IDs.
			$category_ids = isset( $settings['select_categories'] ) ? $settings['select_categories'] : array();

			if ( empty( $no_result_text ) ) {
				$no_result_text = 'No Posts Found!';
			}
			$this->add_render_attribute( 'wpmozo_swiper_layout_title', 'class', 'wpmozo_swiper_layout_title' );
			$this->add_render_attribute( 'wpmozo_swiper_layout_description', 'class', 'wpmozo_swiper_layout_description' );
			$this->add_render_attribute( 'button_text', 'class', 'wpmozo_button' );
			$this->add_render_attribute( 'button_wrapper', 'class', 'wpmozo_swiper_layout_button_wrapper' );
			$this->add_render_attribute( 'button_wrapper_inner', 'class', 'wpmozo_swiper_layout_button_inner_wrapper' );

			// Fetch sticky posts if not ignoring them.
			$sticky_posts = array();
			if ( 'yes' !== $ignore_sticky_posts ) {
				$sticky_posts = get_option( 'sticky_posts' );
			}
			if ( empty( $sticky_posts ) ) {
				$sticky_posts = array( 0 ); // Prevents query error if no sticky posts.
				$sticky_query = new WP_Query( array() );
			} else {
				// Fetch sticky posts.
				$sticky_args  = array(
					'post__in'            => $sticky_posts,
					'posts_per_page'      => $number_of_posts,
					'ignore_sticky_posts' => 1,
					'category__in'        => $category_ids,
					'orderby'             => $post_order_by,
					'order'               => $post_order,
				);
				$sticky_query = new WP_Query( $sticky_args );
			}
			if ( -1 !== $number_of_posts ) {
				// Calculate remaining posts to fetch.
				$remaining_posts_number = max( 0, $number_of_posts - $sticky_query->found_posts );
			} elseif ( -1 === $number_of_posts ) {
				$remaining_posts_number = -1;
			}

			if ( 0 !== $remaining_posts_number ) {
				$args  = array(
					'posts_per_page' => $remaining_posts_number,
					'post__not_in'   => 'yes' === $ignore_sticky_posts ? array() : $sticky_posts,
					'category__in'   => $category_ids,
					'orderby'        => $post_order_by,
					'order'          => $post_order,
					'offset'         => $offset,
				);
				$query = new WP_Query( $args );
			} elseif ( 0 === $remaining_posts_number ) {
				$query = new WP_Query( array() );
			}

			// Start rendering posts.
			if ( $sticky_query->have_posts() || ( $query->have_posts() ) ) {
				?>
					<div class="wpmozo_advanced_blog_slider">
						<div class="wpmozo_swiper_wrapper 
						<?php
						echo esc_attr( $layout );
						echo esc_attr( $equal_height );
						?>
						">
							<div class="wpmozo_swiper_layout wpmozo_swiper_inner_wrap">
								<div class="swiper-container">
									<div class="swiper-wrapper <?php echo esc_attr( $equal_height ); ?>">
				<?php
				// Output.
				$index = 0; // Initialize index counter.
				// Render sticky posts if not ignoring them.
				if ( 'yes' !== $ignore_sticky_posts ) {
					while ( $sticky_query->have_posts() ) {
						$sticky_query->the_post();
						if ( file_exists( plugin_dir_path( __DIR__ ) . "blog-categories/assets/layouts/$layout.php" ) ) {
							include plugin_dir_path( __DIR__ ) . "blog-categories/assets/layouts/$layout.php";
						}
					}
				}

				// Render non-sticky posts if ignoring sticky posts.
				while ( $query->have_posts() ) {
					$query->the_post();
					if ( file_exists( plugin_dir_path( __DIR__ ) . "blog-categories/assets/layouts/$layout.php" ) ) {
						include plugin_dir_path( __DIR__ ) . "blog-categories/assets/layouts/$layout.php";
					}
				}
				?>
									</div> <!-- swiper-wrapper -->
								</div> <!-- swiper-container -->

				<?php
				if ( 'yes' === $show_arrow ) {
					$this->add_render_attribute(
						'swiper_arrow_next',
						array(
							'class'                 => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
							'aria-hidden'           => 'true',
							'data-next_slide_arrow' => $settings['next_slide_arrow']['value'],
						)
					);

					$this->add_render_attribute(
						'swiper_arrow_prev',
						array(
							'class'                     => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
							'aria-hidden'               => 'true',
							'data-previous_slide_arrow' => $settings['previous_slide_arrow']['value'],
						)
					);

					if ( ! empty( $arrows_position ) ) {
						$this->add_render_attribute( 'data-arrow', 'data-arrows', $arrows_position );
						$arrows_position_data  = '';
						$arrows_position_data .= $this->get_render_attribute_string( 'data-arrow' );
					}
					?>
								<div class="wpmozo_swiper_navigation" <?php echo wp_kses_post( ! empty( $arrows_position ) ? $arrows_position_data : '' ); ?>>
					<?php
					if ( 'svg' !== $settings['next_slide_arrow']['library'] ) {
						Icons_Manager::render_icon(
							$settings['next_slide_arrow'],
							array(
								'aria-hidden'           => 'true',
								'class'                 => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
								'data-next_slide_arrow' => $settings['next_slide_arrow']['value'],
							),
							'i'
						);
					}
					if ( 'svg' === $settings['next_slide_arrow']['library'] ) {
						?>
									<div <?php $this->print_render_attribute_string( 'swiper_arrow_next' ); ?>>
						<?php
						Icons_Manager::render(
							$settings['next_slide_arrow'],
							array(
								'aria-hidden'           => 'true',
								'class'                 => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
								'data-next_slide_arrow' => $settings['next_slide_arrow']['value'],
							),
							'i'
						)
						?>
									</div>
						<?php
					}
					if ( 'svg' !== $settings['previous_slide_arrow']['library'] ) {
						Icons_Manager::render_icon(
							$settings['previous_slide_arrow'],
							array(
								'aria-hidden'           => 'true',
								'class'                 => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
								'data-next_slide_arrow' => $settings['previous_slide_arrow']['value'],
							),
							'i'
						);
					}
					if ( 'svg' === $settings['previous_slide_arrow']['library'] ) {
						?>
									<div <?php $this->print_render_attribute_string( 'swiper_arrow_prev' ); ?>>
									<?php
										Icons_Manager::render_icon(
											$settings['previous_slide_arrow'],
											array(
												'aria-hidden' => 'true',
												'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
												'data-previous_slide_arrow' => $settings['previous_slide_arrow']['value'],
											),
											'i'
										)
									?>
									</div>
						<?php
					}
					?>
								</div>
						<?php
						if ( 'yes' === $show_arrow_on_hover ) {
							?>
								<style>
									.<?php echo esc_html( $order_class ); ?> .wpmozo_swiper_navigation .swiper-button-prev { 
										visibility: hidden; 
										opacity: 0; 
									} .<?php echo esc_html( $order_class ); ?> .wpmozo_swiper_navigation .swiper-button-next {
										visibility: hidden; 
										opacity: 0; 
									} .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-prev, 
									.<?php echo esc_html( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-next {
										visibility: visible;
										opacity: 1;
									} .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-prev.swiper-button-disabled, .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-next.swiper-button-disabled {
										opacity: 0.35;
									} .<?php echo esc_html( $order_class ); ?> .wpmozo_arrows_outside .swiper-button-prev {
										left: 50px;
									} .<?php echo esc_html( $order_class ); ?> .wpmozo_arrows_outside .swiper-button-next {
										right: 50px;
									} .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_arrows_outside .swiper-button-prev {
										left: 0;
									} .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_arrows_outside .swiper-button-next {
										right: 0;
									} .<?php echo esc_html( $order_class ); ?> .wpmozo_arrows_inside .swiper-button-prev {
										left: -50px;
									} .<?php echo esc_html( $order_class ); ?> .wpmozo_arrows_inside .swiper-button-next {
										right: -50px;
									} .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_arrows_inside .swiper-button-prev {
										left: 0;
									} .<?php echo esc_html( $order_class ); ?>:hover .wpmozo_arrows_inside .swiper-button-next {
										right: 0;
									} .<?php echo esc_html( $order_class ); ?> .wpmozo_arrows_outside:before, .<?php echo esc_html( $order_class ); ?> .wpmozo_arrows_outside:after {
										content: '';
										position: absolute;
										top: 0;
										height: 100%;
									}
								</style>
							<?php
						}
				}
				?>
							</div> <!-- wpmozo_swiper_layout wpmozo_swiper_inner_wrap -->
				<?php

				if ( 'yes' === $show_control_dot ) {
					?>
							<div class="wpmozo_swiper_pagination">
								<div class="swiper-pagination <?php echo esc_attr( $control_dot_style ); ?>"></div>
							</div>
					<?php
				}
				?>
						</div> <!-- wpmozo_swiper_wrapper -->
					</div> <!-- wpmozo_advanced_blog_slider -->
				<?php

			} else {
				?>
					<div class="entry">
						<h1> <?php echo esc_html( $no_result_text ); ?> </h1>
						<p><?php echo esc_html__( 'Try changing your widget settings or add some new post.', 'wpmozo-addons-lite-for-elementor' ); ?></p>
					</div>
				<?php
			}
			wp_reset_postdata();
			$this->wpmozo_render_slider_script();
		}
	}
}
