<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2026 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;
use Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Post_Ticker' ) ) {
	class WPMOZO_AE_Post_Ticker extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_post_ticker';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Post Ticker', 'wpmozo-addons-for-elementor' );
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
			return array( 'wpmz post ticker', 'wpmozo post ticker' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-post-ticker wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.8.0
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
		 * @since 1.8.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-post-ticker-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-post-ticker-style', 'wpmozo-ae-swiper-style','wpmozo-ae-font-awesome-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-post-ticker-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-post-ticker-script', 'wpmozo-ae-swiper' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.8.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'post-ticker/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.8.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();

			$exclude_posts              = isset( $settings['exclude_posts'] ) ? $settings['exclude_posts'] : '';
			$exclude_password_protected = isset( $settings['exclude_password_protected'] ) ? $settings['exclude_password_protected'] : 'yes';
			$post_order_by              = isset( $settings['post_order_by'] ) ? $settings['post_order_by'] : 'date';
			$post_order                 = isset( $settings['post_order'] ) ? $settings['post_order'] : 'desc';
			$posts_number               = isset( $settings['posts_number'] ) && $settings['posts_number'] > 0 ? $settings['posts_number'] : -1;
			$ticker_label               = isset( $settings['ticker_label'] ) ? $settings['ticker_label'] : 'Breaking News';
			$ticker_effect              = isset( $settings['ticker_effect'] ) ? $settings['ticker_effect'] : 'scroll';
			$scroll_effect_speed        = isset( $settings['scroll_effect_speed'] ) ? $settings['scroll_effect_speed'] : '70';
			$slide_alignment            = isset( $settings['slide_alignment'] ) ? $settings['slide_alignment'] : 'horizontal';
			$effect_delay               = isset( $settings['effect_delay'] ) ? $settings['effect_delay'] : '2500';
			$transition_duration        = isset( $settings['transition_duration'] ) ? $settings['transition_duration'] : '700';
			$show_arrows                = 'yes' === $settings['show_arrows'] ? 'on' : 'off';
			$ignore_sticky_posts        = isset( $settings['ignore_sticky_posts'] ) ? $settings['ignore_sticky_posts'] : 'yes';
			$post_item_separator_type   = isset( $settings['post_item_separator_type'] ) ? $settings['post_item_separator_type'] : 'custom';
			$custom_separator = isset($settings['custom_separator']) ? $settings['custom_separator'] : '';

			if ( ! empty( $custom_separator ) ) {
				// Escape quotes and slashes properly for CSS
				$separator_safe = addslashes( $custom_separator );

				echo '<style>
					.elementor-'. get_the_ID().' .elementor-element.elementor-element-'.$this->get_id().' .wpmozo_ticker_effect_scroll .wpmozo_post_ticker_item::after {
						content: "' . $separator_safe . '" !important;
					}
				</style>';
			}

			$post_type = isset( $settings['post_type'] ) && ! empty( $settings['post_type'] ) ? sanitize_text_field( $settings['post_type'] ) : 'post';
			$exclude_posts_array = array();

			if ( ! empty( $exclude_posts ) ) {
				$exclude_posts_array = array_map( 'absint', explode( ',', $exclude_posts ) );
			}

			if ( 'yes' === $exclude_password_protected ) {
				$protected_posts = get_posts(
					array(
						'post_type'      => $post_type,
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

			$is_ignore_sticky = ( 'yes' === $ignore_sticky_posts );

			// Editor mode fix for sticky behavior.
			if ( ! $is_ignore_sticky && ! empty( $sticky_posts ) ) {
				// Remove excluded sticky posts.
				$valid_sticky_ids = array_diff( $sticky_posts, $exclude_posts_array );

				// Query sticky posts first.
				$sticky_query = get_posts(
					array(
						'post_type'      => $post_type,
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
						'post_type'           => $post_type,
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
					'post_type'      => $post_type,
					'post__in'       => $all_post_ids,
					'post_status'    => 'publish',
					'orderby'        => 'post__in',
					'posts_per_page' => count( $all_post_ids ),
				);
			} else {
				// Frontend or ignore_sticky = yes.
				$query_args = array(
					'post_type'           => $post_type,
					'post_status'         => 'publish',
					'posts_per_page'      => $posts_number,
					'orderby'             => $post_order_by,
					'order'               => $post_order,
					'post__not_in'        => $exclude_posts_array,
					'ignore_sticky_posts' => $is_ignore_sticky ? 1 : 0,
				);
			}

			$final_query = new WP_Query( $query_args );

			// Only render if there are posts (merged sticky + normal posts).
			if ( $final_query->have_posts() ) :
				// Add the outer wrapper class dynamically.
				$this->add_render_attribute( 'wpmozo_post_ticker', 'class', 'wpmozo_post_ticker wpmozo_post_ticker_0' );
				?>
				<div <?php $this->print_render_attribute_string( 'wpmozo_post_ticker' ); ?>>
					<?php if ( 'scroll' === $ticker_effect ) : ?>
						<!-- Scroll Effect -->
						<?php
						// Add dynamic attributes for the scroll effect wrapper as an array.
						$this->add_render_attribute(
							'wpmozo_post_ticker_wrap',
							array(
								'class'                    => 'wpmozo_post_ticker_wrap wpmozo_ticker_effect_' . esc_attr( $ticker_effect ),
								'data-scroll_effect_delay' => esc_attr( $scroll_effect_speed ),
								'data-ticker_effect'       => esc_attr( $ticker_effect ),
							)
						);
						?>
						<div <?php $this->print_render_attribute_string( 'wpmozo_post_ticker_wrap' ); ?>>
							<?php if ( $ticker_label ) : 
								$this->add_render_attribute( 'ticker_label','class', 'wpmozo_post_ticker_label' );
								$this->add_inline_editing_attributes( 'ticker_label','none');
								?>
								<div <?php $this->print_render_attribute_string( 'ticker_label' ); ?>><?php echo esc_html( $ticker_label ); ?></div>
							<?php endif; ?>
							<div class="wpmozo_post_ticker_items">
								<div class="wpmozo_post_ticker_bar">
									<?php
									// Loop through final query to render merged posts.
									while ( $final_query->have_posts() ) :
										$final_query->the_post();
										?>
										<div class="wpmozo_post_ticker_item">
											<a class="wpmozo_post_ticker_post_title" href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
											<?php if ( 'icon' === $post_item_separator_type ) : ?>
												<span class="wpmozo_ticker_icon_separator"><?php Icons_Manager::render_icon( $settings['icon_separator'], array( 'aria-hidden' => 'true' ) ); ?></span>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div> <!-- .wpmozo_post_ticker_wrap (scroll effect) -->
					<?php elseif ( 'fade' === $ticker_effect ) : ?>
						<!-- Fade Effect -->
						<?php
						// Add dynamic attributes for the fade effect wrapper as an array.
						$this->add_render_attribute(
							'wpmozo_post_ticker_wrap',
							array(
								'class'                  => 'wpmozo_post_ticker_wrap wpmozo_ticker_effect_' . esc_attr( $ticker_effect ),
								'data-ticker_effect'     => esc_attr( $ticker_effect ),
								'data-fade_effect_delay' => esc_attr( $effect_delay ),
								'data-fade_effect_transition' => esc_attr( $transition_duration ),
								'data-show_arrow'        => esc_attr( $show_arrows ),
							)
						);
						?>
						<div <?php $this->print_render_attribute_string( 'wpmozo_post_ticker_wrap' ); ?>>
							<?php if ( $ticker_label ) : ?>
								<div class="wpmozo_post_ticker_label"><?php echo esc_html( $ticker_label ); ?></div>
							<?php endif; ?>
							<div class="wpmozo_post_ticker_items">
								<div class="wpmozo_post_ticker_bar">
									<div class="swiper-container swiper-container-<?php echo esc_attr( $ticker_effect ); ?>">
										<div class="swiper-wrapper">
											<?php
											// Loop through final query to render merged posts.
											while ( $final_query->have_posts() ) :
												$final_query->the_post();
												?>
												<div class="wpmozo_post_ticker_item swiper-slide">
													<a class="wpmozo_post_ticker_post_title" href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
													<?php if ( 'icon' === $post_item_separator_type ) : ?>
														<span class="wpmozo_ticker_icon_separator"><?php Icons_Manager::render_icon( $settings['icon_separator'], array( 'aria-hidden' => 'true' ) ); ?></span>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</div>
									</div>
			
									<!-- Navigation Arrows -->
									<?php if ( 'on' === $show_arrows ) : 
										$this->add_render_attribute( 'swiper_arrow_next', 
											array( 
												'class' => array( 'wpmozo_swiper_icon_next', 'swiper-button-next' ),
												'aria-hidden' => 'true',
												'data-next_slide_arrow' => $settings[ 'next_arrow_icon' ][ 'value' ]
											 ) 
										 );				
										$this->add_render_attribute( 'swiper_arrow_prev', 
											array( 
												'class' => array( 'wpmozo_swiper_icon_prev', 'swiper-button-prev' ),
												'aria-hidden' => 'true',
												'data-previous_slide_arrow' => $settings[ 'previous_arrow_icon' ][ 'value' ]
											 ) 
										 );
										?>
										<div class="wpmozo_swiper_navigation wpmozo_arrows_position" >
											<?php 
												if( 'svg' !== $settings[ 'previous_arrow_icon' ][ 'library' ] ) {
													Icons_Manager::render_icon( 
														$settings[ 'previous_arrow_icon' ],
														array(
															'aria-hidden' => 'true',
															'class' => array( 'wpmozo_swiper_icon_prev', 'swiper-button-prev' ),
															'data-prev_slide_arrow' => $settings['previous_arrow_icon']['value'],
														),
														'i'
													 );
													
												}
												if( 'svg' === $settings[ 'previous_arrow_icon' ][ 'library' ] ) {	
													?><div <?php $this->print_render_attribute_string( 'swiper_arrow_prev' ) ?>><?php
															Icons_Manager::render_icon( 
																$settings[ 'previous_arrow_icon' ],
																array(
																	'aria-hidden' => 'true',
																	'class' => array( 'wpmozo_swiper_icon_prev', 'swiper-button-prev' ),
																	'data-prev_slide_arrow' => $settings['previous_arrow_icon']['value'],
																),
																'i'
															 )
													?></div><?php
												} ; ?> 
											<?php 
											if( 'svg' !== $settings[ 'next_arrow_icon' ][ 'library' ] ) {
												Icons_Manager::render_icon( 
													$settings[ 'next_arrow_icon' ],
													array(
														'aria-hidden' => 'true',
														'class' => array( 'wpmozo_swiper_icon_next', 'swiper-button-next' ),
														'data-next_slide_arrow' => $settings['next_arrow_icon']['value'],
													),
													'i'
												 );
												
											}
											if( 'svg' === $settings[ 'next_arrow_icon' ][ 'library' ] ) {	
												?><div <?php $this->print_render_attribute_string( 'swiper_arrow_next' )?> ><?php 
														Icons_Manager::render( 
															$settings[ 'next_arrow_icon' ],
															array(
																'aria-hidden' => 'true',
																'class' => array( 'wpmozo_swiper_icon_next', 'swiper-button-next' ),
																'data-next_slide_arrow' => $settings['next_arrow_icon']['value'],
															),
															'i'
														 )
													?></div><?php
											} ?>  
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div> <!-- .wpmozo_post_ticker_wrap (fade effect) -->
			
					<?php elseif ( 'slide' === $ticker_effect ) : ?>
						<!-- Slide Effect -->
						<?php
						// Add dynamic attributes for the slide effect wrapper as an array.
						$this->add_render_attribute(
							'wpmozo_post_ticker_wrap',
							array(
								'class'                  => 'wpmozo_post_ticker_wrap wpmozo_ticker_effect_' . esc_attr( $ticker_effect ),
								'data-ticker_effect'     => esc_attr( $ticker_effect ),
								'data-slide_align'       => esc_attr( $slide_alignment ),
								'data-fade_effect_delay' => esc_attr( $effect_delay ),
								'data-fade_effect_transition' => esc_attr( $transition_duration ),
								'data-show_arrow'        => esc_attr( $show_arrows ),
							)
						);
						?>
						<div <?php $this->print_render_attribute_string( 'wpmozo_post_ticker_wrap' ); ?>>
							<?php if ( $ticker_label ) : ?>
								<div class="wpmozo_post_ticker_label"><?php echo esc_html( $ticker_label ); ?></div>
							<?php endif; ?>
							<div class="wpmozo_post_ticker_items">
								<div class="wpmozo_post_ticker_bar">
									<div class="swiper-container swiper-container-<?php echo esc_attr( $ticker_effect ); ?>">
										<div class="swiper-wrapper">
											<?php
											// Loop through final query to render merged posts.
											while ( $final_query->have_posts() ) :
												$final_query->the_post();
												?>
												<div class="wpmozo_post_ticker_item swiper-slide">
													<a class="wpmozo_post_ticker_post_title" href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
													<?php if ( 'icon' === $post_item_separator_type ) : ?>
														<span class="wpmozo_ticker_icon_separator"><?php Icons_Manager::render_icon( $settings['icon_separator'], array( 'aria-hidden' => 'true' ) ); ?></span>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</div>
									</div>
									<!-- Navigation Arrows -->
									<?php if ( 'on' === $show_arrows ) : ?>
										<div class="wpmozo_swiper_navigation wpmozo_arrows_position">
											<?php
											Icons_Manager::render_icon(
												$settings['previous_arrow_icon'],
												array(
													'aria-hidden' => 'true',
													'class' => array( 'wpmozo_swiper_icon_prev', 'swiper-button-prev' ),
													'data-prev_slide_arrow' => $settings['previous_arrow_icon']['value'],
												),
												'i'
											);
											Icons_Manager::render_icon(
												$settings['next_arrow_icon'],
												array(
													'aria-hidden' => 'true',
													'class' => array( 'wpmozo_swiper_icon_next', 'swiper-button-next' ),
													'data-next_slide_arrow' => $settings['next_arrow_icon']['value'],
												),
												'i'
											);
											?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div> <!-- .wpmozo_post_ticker_wrap (slide effect) -->
					<?php endif; ?>
				</div>
				<?php wp_reset_postdata(); ?>
				<?php
			endif;
		}
	}
}
