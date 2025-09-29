<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.2
 */

//if this file is called directly, abort.
if( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Testimonial_Slider' ) ) {
	class WPMOZO_AE_Testimonial_Slider extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		
		public function get_name() {
			return 'wpmozo_ae_testimonial_slider';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		
		public function get_title() {
			return esc_html__( 'Testimonial Slider', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz testimonial slider','wpmozo testimonial slider','wpmz testimonial carousel','wpmozo testimonial carousel','wpmz feedback slider','wpmozo feedback slider' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		
		public function get_icon() {
			return 'wpmozo-ae-icon-testimonial-slider  wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.3.0
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
		 * @since 1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-testimonial-slider-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );

			return array( 'wpmozo-ae-testimonial-slider-style', 'wpmozo-ae-swiper-style', 'wpmozo-ae-font-awesome-style' );
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
			wp_register_script( 'wpmozo-testimonial-slider-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-testimonial-slider-script', 'wpmozo-ae-swiper'  );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( dirname( __FILE__ ) ) . 'testimonial-slider/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings                           = $this->get_settings_for_display();
			$show_rating                        = $settings['show_rating'];
			$order_class                        = 'elementor-element-' . $this->get_id();
			$use_gravatar                       = $settings['use_gravatar'];
			$equal_height                       = ( 'equal_height' === $settings[ 'equalize_testimonials_height' ] ) ? ' equal-height' : '';
			$no_result_text                     = $settings['no_result_text'];
			$arrows_position                    = $settings[ 'arrows_position' ];
			$testimonial_order                  = $settings['testimonial_order'];
			$show_author_image                  = $settings['show_author_image'];
			$author_image_size                  = $settings['author_image_size'];
			$control_dot_style                  = $settings['control_dot_style'];
			$testimonial_layout                 = esc_attr( $settings[ 'testimonial_layout' ] );
			$testimonial_layout                 = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_layout( $testimonial_layout, array( 'layout1', 'layout2' ) );
			$testimonial_number                 = $settings['testimonial_number'];
			$include_categories                 = isset( $settings['include_categories'] ) && '' !== $settings['include_categories'] ? implode(',', $settings['include_categories'] ) : '';
			$testimonial_number                 = ( 0 === $testimonial_number ) ? -1 : (int) $testimonial_number;
			$show_arrow_on_hover                = $settings['show_arrow_on_hover'];
			$testimonial_order_by               = $settings['testimonial_order_by'];
			$show_author_designation            = $settings['show_author_designation'];
			$show_opening_quote_icon            = $settings['show_opening_quote_icon'];
			$show_closing_quote_icon            = $settings['show_closing_quote_icon'];
			$show_author_company_name           = $settings['show_author_company_name'];
			$opening_quote_icon_position        = $settings['opening_quote_icon_position'];
			$closing_quote_icon_position        = $settings['closing_quote_icon_position'];
			$equalize_testimonials_height       = $settings['equalize_testimonials_height'];
			$custom_position_closing_quote_icon = $settings['custom_position_closing_quote_icon'];
			$custom_position_opening_quote_icon = $settings['custom_position_opening_quote_icon'];

			extract($settings); // To make code more readable.

			$slide_effect             = isset( $slide_effect ) ? $slide_effect : 'slide';
			
			$cards_per_slide          = isset( $testimonial_per_slide ) && !empty( $testimonial_per_slide ) ? $testimonial_per_slide : 0;
			$cards_per_slide_tab      = isset( $testimonial_per_slide_tablet ) && !empty( $testimonial_per_slide_tablet ) ? $testimonial_per_slide_tablet : $cards_per_slide;
			$cards_per_slide_mob      = isset( $testimonial_per_slide_mobile ) && !empty( $testimonial_per_slide_mobile ) ? $testimonial_per_slide_mobile : $cards_per_slide_tab;
			
			$space_between_slides     = isset( $space_between_slides['size'] ) && !empty( $space_between_slides['size'] ) ? $space_between_slides['size'] : 0;
			$space_between_slides_tab = isset( $space_between_slides_tablet['size'] ) && !empty( $space_between_slides_tablet['size'] ) ? $space_between_slides_tablet['size'] : $space_between_slides;
			$space_between_slides_mob = isset( $space_between_slides_mobile['size'] ) && !empty( $space_between_slides_mobile['size'] ) ? $space_between_slides_mobile['size'] : $space_between_slides_tab;
			
			$slides_per_group         = isset( $slides_per_group ) && !empty( $slides_per_group ) ? $slides_per_group : 3;
			$slides_per_group_tab     = isset( $slides_per_group_tablet ) && !empty( $slides_per_group_tablet ) ? $slides_per_group_tablet : $slides_per_group;
			$slides_per_group_mob     = isset( $slides_per_group_mobile ) && !empty( $slides_per_group_mobile ) ? $slides_per_group_mobile : $slides_per_group_tab;
			
			$show_arrow               = isset( $show_arrow ) && 'yes' === $show_arrow ? true : false;
			$next_slide_arrow         = '.elementor-element-'.$this->get_id()." .swiper-button-next";
			$previous_slide_arrow     = '.elementor-element-'.$this->get_id()." .swiper-button-prev";
			
			$transition_duration      = isset( $slide_transition_duration ) && !empty( $slide_transition_duration ) ? $slide_transition_duration : 1000;
			
			
			$show_control_dot         = isset( $show_control_dot ) && 'yes' === $show_control_dot ? true : false;
			$dynamic_bullets          = isset( $enable_dynamic_dots ) && 'yes' === $enable_dynamic_dots ? true : false;
			
			$slider_loop              = isset( $slider_loop ) && 'yes' === $slider_loop ? true : false;
			$autoplay                 = isset( $autoplay ) && 'yes' === $autoplay ? true : false;
			$pause_on_hover           = isset( $pause_on_hover ) && 'yes' === $pause_on_hover ? true : false;
			$autoplay_speed           = isset( $autoplay_speed ) && !empty( $autoplay_speed ) ? $autoplay_speed : 3000;
			
			$enable_coverflow_shadow  = isset( $enable_coverflow_shadow ) && 'yes' === $enable_coverflow_shadow ? true : false;
			$coverflow_rotate         = isset( $coverflow_rotate['size'] ) && !empty ($coverflow_rotate['size'] ) ? $coverflow_rotate['size'] : 40;
			$coverflow_depth          = isset( $coverflow_depth['size'] ) && !empty( $coverflow_depth['size'] ) ? $coverflow_depth['size'] : 100;

			if ( ! in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
				$cards_per_slide      = 1;
				$space_between_slides = 0;
				$slides_per_group     = 1;

			}

			$data_atts = array(
				"effect"                => $slide_effect,

				"coverflowShadow"       => $enable_coverflow_shadow,
				"coverflowRotate"       => $coverflow_rotate,
				"coverflowDepth"        => $coverflow_depth,
				"cardsPerSlide"         => $cards_per_slide,
				"cardsPerSlideTab"      => $cards_per_slide_tab,
				"cardsPerSlideMob"      => $cards_per_slide_mob,
				
				"spaceBetweenSlides"    => $space_between_slides,
				"spaceBetweenSlidesTab" => $space_between_slides_tab,
				"spaceBetweenSlidesMob" => $space_between_slides_mob,
				
				"slidesPerGroup"        => $slides_per_group,
				"slidesPerGroupTab"     => $slides_per_group_tab,
				"slidesPerGroupMob"     => $slides_per_group_mob,
				
				"nextSlideArrow"        => $next_slide_arrow,
				"previousSlideArrow"    => $previous_slide_arrow,
				
				"sliderLoop"            => $slider_loop,
				
				"transitionDuration"    => $transition_duration,
				
				"showArrow"             => $show_arrow,
				"showControlDot"        => $show_control_dot,
				"dynamicBullets"        => $dynamic_bullets,
				
				"autoplay"              => $autoplay,
				"pauseOnHover"          => $pause_on_hover,
				"autoplaySpeed"         => $autoplay_speed,
				
				"clientId"              => "elementor-element-".$this->get_id()
			);


			$args = array(
				'post_type'      => 'wpmozoae-testimonial',
				'posts_per_page' => intval( $testimonial_number ),
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
			);

			if ( is_user_logged_in() ) {
				$args['post_status'] = array(
					'publish',
					'private',
				);
			}

			if ( '' !== $include_categories && !empty( $include_categories ) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'wpmozo-ae-testimonial-category',
						'field'    => 'term_id',
						'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
						'operator' => 'IN',
					),
				);
			}

			if ( '' !== $testimonial_order_by ) {
				$args['orderby'] = sanitize_text_field( $testimonial_order_by );
			}

			if ( '' !== $testimonial_order ) {
				$args['order'] = sanitize_text_field( $testimonial_order );
			}

			$equal_height_class = 'on' === $equalize_testimonials_height ? ' wpmozo_equal_testimonial_height' : '';

			global $wp_the_query;
			$query_backup = $wp_the_query;

			$query = new WP_Query( $args );

			// self::$rendering = true;

			if ( $query->have_posts() ) {

				$control_dot_class = ' ' . $control_dot_style;
				?> 
				<div class="wpmozo_swiper_wrapper <?php echo esc_attr( $equal_height ); ?>" data-attr="<?php echo esc_html( json_encode( $data_atts ) );?>">
				<div class="wpmozo_testimonial_layout wpmozo_swiper_inner_wrap <?php echo esc_attr( $testimonial_layout ); ?> <?php echo esc_attr( $equal_height_class ); ?>">
					<div class="swiper-container">
					<div class="swiper-wrapper">

				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					$testimonial_id = esc_attr( get_the_ID() );
					?><div class="wpmozo_testimonial_slide swiper-slide"><?php

					if ( file_exists( get_stylesheet_directory() . '/wpmozo-addons-lite-for-elementor/layouts/testimonial-slider/' . sanitize_file_name( $testimonial_layout ) . '.php' ) ) {
						include get_stylesheet_directory() . '/wpmozo-addons-lite-for-elementor/layouts/testimonial-slider/' . sanitize_file_name( $testimonial_layout ) . '.php';
					} elseif ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $testimonial_layout ) . '.php' ) ) {
						include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $testimonial_layout ) . '.php';
					}

					?></div><?php
				}

				wp_reset_postdata();

				//phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$wp_the_query = $query_backup;

				?>
				</div> <!-- swiper-wrapper -->
				</div> <!-- swiper-container -->
				<?php

				if ( true === $show_arrow ) {
					$this->add_render_attribute( 'swiper_arrow_next', 
						array( 
							'class' => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
							'aria-hidden' => 'true',
							'data-next_slide_arrow' => $settings[ 'next_slide_arrow' ][ 'value' ]
						) 
					);				
					
					$this->add_render_attribute( 'swiper_arrow_prev', 
						array( 
							'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
							'aria-hidden' => 'true',
							'data-previous_slide_arrow' => $settings[ 'previous_slide_arrow' ][ 'value' ]
						) 
					);
					if ( ! empty( $arrows_position ) ) {
						$this->add_render_attribute( 'data-arrow', 'data-arrows', $arrows_position );
						
						$arrows_position_data = '';
						$arrows_position_data .= $this->get_render_attribute_string( 'data-arrow' );
					}
					?>
					<div class="wpmozo_swiper_navigation wpmozo_arrows_<?php echo esc_html( $arrows_position ); ?>" <?php echo  esc_html( !empty( $arrows_position ) ? $arrows_position_data : '' ) ;  ?> >
						<?php 
						if( 'svg' !== $settings[ 'next_slide_arrow' ][ 'library' ] ) {
							Icons_Manager::render_icon( 
								$settings[ 'next_slide_arrow' ],
								array( 
									'aria-hidden' => 'true',
									'class' => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
									'data-next_slide_arrow' => $settings[ 'next_slide_arrow' ][ 'value' ]
								),
								'i'
							);
							
						}
						if( 'svg' === $settings[ 'next_slide_arrow' ][ 'library' ] ) {	
							?><div <?php $this->print_render_attribute_string( 'swiper_arrow_next' )?> ><?php 
									Icons_Manager::render( 
										$settings[ 'next_slide_arrow' ],
										array( 
											'aria-hidden' => 'true',
											'class' => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
											'data-next_slide_arrow' => $settings[ 'next_slide_arrow' ][ 'value' ]
										),
										'i'
									)
								?></div><?php
						} ?>  
						<?php 
							if( 'svg' !== $settings[ 'previous_slide_arrow' ][ 'library' ] ) {
								Icons_Manager::render_icon( 
									$settings[ 'previous_slide_arrow' ],
									array( 
										'aria-hidden' => 'true',
										'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
										'data-next_slide_arrow' => $settings[ 'previous_slide_arrow' ][ 'value' ]
									),
									'i'
								);
								
							}
							if( 'svg' === $settings[ 'previous_slide_arrow' ][ 'library' ] ) {	
								?><div <?php $this->print_render_attribute_string( 'swiper_arrow_prev' ) ?>><?php
										Icons_Manager::render_icon( 
											$settings[ 'previous_slide_arrow' ],
											array( 
												'aria-hidden' => 'true',
												'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
												'data-previous_slide_arrow' => $settings[ 'previous_slide_arrow' ][ 'value' ]
											),
											'i'
										)
								?></div><?php
							} ; ?> 
					</div>
					<style> 
						<?php
						if ( 'yes' === $show_arrow_on_hover ) {
							?>
								.<?php echo esc_attr( $order_class ); ?> .wpmozo_swiper_navigation .swiper-button-prev { 
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease; 
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_swiper_navigation .swiper-button-next {
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-prev, 
								.<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-next {
									visibility: visible;
									opacity: 1;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-prev.swiper-button-disabled, .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_swiper_navigation .swiper-button-next.swiper-button-disabled {
									opacity: 0.35;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_outside .swiper-button-prev {
									left: 50px;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_outside .swiper-button-next {
									right: 50px;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_outside .swiper-button-prev {
									left: 0;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_outside .swiper-button-next {
									right: 0;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_inside .swiper-button-prev {
									left: -50px;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_inside .swiper-button-next {
									right: -50px;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_inside .swiper-button-prev {
									left: 0;
								} .<?php echo esc_attr( $order_class ); ?>:hover .wpmozo_arrows_inside .swiper-button-next {
									right: 0;
								} .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_outside:before, .<?php echo esc_attr( $order_class ); ?> .wpmozo_arrows_outside:after {
									content: '';
									position: absolute;
									top: 0;
									height: 100%;
								}
							<?php
						}
						?>
						<?php
						if ( 'yes' === $custom_position_opening_quote_icon ) {
							
							?>

							.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_opening_quote_icon { 
								position: absolute;
							}
							<?php
							
							if ( 'left' === $opening_quote_icon_position ) {
								?>
								.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_opening_quote_icon { 
										left: 0 !important;
									}
								<?php
							}
							if ( 'right' === $opening_quote_icon_position ) {
								?>
								.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_opening_quote_icon { 
										right: 0 !important;
									}
								<?php
							}
							if ( 'center' === $opening_quote_icon_position ) {
								?>
								.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_opening_quote_icon { 
										left: 50% !important;
									}
								<?php
							}
						}
						if ( 'yes' === $custom_position_closing_quote_icon ) {
							?>
							.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_closing_quote_icon { 
								position: absolute;
							}
							<?php
							if ( 'left' === $closing_quote_icon_position ) {
								?>
								.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_closing_quote_icon { 
										left: 0 !important;
									}
								<?php
							}
							if ( 'right' === $closing_quote_icon_position ) {
								?>
								.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_closing_quote_icon { 
										right: 0 !important;
									}
								<?php
							}
							if ( 'center' === $closing_quote_icon_position ) {
								?>
								.<?php echo esc_html($order_class); ?> .wpmozo_testimonial_closing_quote_icon { 
										left: 50% !important;
										-webkit-transform: translateX(-50%); 
										transform: translateX(-50%);
									}
								<?php
							}
						}
						?>
					</style>
					<?php
						
				}

				?></div> <!-- wpmozo_testimonial_layout --><?php

				if ( true === $show_control_dot ) {
					?>
						<div class="wpmozo_swiper_pagination"><div class="swiper-pagination <?php echo esc_attr( $control_dot_style ); ?>"></div></div>
					<?php
				}

				?></div> <!-- wpmozo_swiper_wrapper --><?php
			}
		}

	}
}