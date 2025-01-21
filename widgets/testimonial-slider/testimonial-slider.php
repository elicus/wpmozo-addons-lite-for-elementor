<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'testimonial-slider/assets/controls/controls.php';
		}

		/**
		 * This function dynamically creates script parameters according to the user settings.
		 *
		 * @since 1.3.0
		 * @return string
		 * */
		public function wpmozo_render_testimonial_script() {
			
			$settings                 = $this->get_settings_for_display();
			$order_class              = 'elementor-element-'.$this->get_id();
			$loop                     = esc_attr( $settings[ 'slider_loop' ] );
			$swiper					  = str_replace( '-', '_', $order_class );
			$autoplay                 = esc_attr( $settings[ 'autoplay' ] );
			$show_arrow               = esc_attr( $settings[ 'show_arrow' ] );
			$slide_effect             = esc_attr( $settings[ 'slide_effect' ] );
			$autoplay_speed           = intval( $settings[ 'autoplay_speed' ] );
			$pause_on_hover           = esc_attr( $settings[ 'pause_on_hover' ] );
			$equalize_height          = esc_attr( $settings[ 'equalize_testimonials_height' ] );
			$show_control_dot         = esc_attr( $settings[ 'show_control_dot' ] );
			$transition_duration      = intval( $settings[ 'slide_transition_duration' ] );
			$dynamic_bullets          = 'yes' === $settings[ 'enable_dynamic_dots' ] && in_array( $settings[ 'control_dot_style' ], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';

			if( 'coverflow' === $slide_effect || 'slide' === $slide_effect ) {
				$cards_per_slide          = $settings[ 'testimonial_per_slide' ];
				$slides_per_group         = $settings[ 'slides_per_group' ];
				$space_between_slides     = $settings[ 'space_between_slides' ][ 'size' ];
				$enable_coverflow_shadow  = 'yes' === $settings[ 'enable_coverflow_shadow' ] ? 'true' : 'false';
				$coverflow_rotate         = 'coverflow' === $slide_effect ? intval( $settings[ 'coverflow_rotate' ][ 'size' ] ) : '';
				$coverflow_depth          = 'coverflow' === $slide_effect ? intval( $settings[ 'coverflow_depth' ][ 'size' ] ) : '' ;
			}

			$autoplay_speed           = '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
			$transition_duration      = '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
			$loop                     = 'yes' === $loop ? 'true' : 'false';
			$arrows                   = 'false';
			$dots                     = 'false';
			$autoplaySlides           = 0;
			$cube                     = 'false';
			$coverflow                = 'false';
			$slidesPerGroup           = 1;
			$slidesPerGroupSkip       = 0;
			$slidesPerGroupIpad       = 1;
			$slidesPerGroupMobile     = 1;

			if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
				$cards_per_view             = $cards_per_slide;
				$cards_space_between        = $space_between_slides;
				$slidesPerGroup             = $slides_per_group;

				if ( $cards_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
					$slidesPerGroupSkip = $cards_per_view - $slidesPerGroup;
				}
			} else {
				$cards_per_view             = 1;
				$cards_space_between        = 0;
				$slides_per_group            = 1;
			}
			
			$cards_per_slide_tablet = isset( $settings[ 'testimonial_per_slide_tablet' ] ) && !empty( $settings[ 'testimonial_per_slide_tablet' ] ) ? $settings[ 'testimonial_per_slide_tablet' ] : $cards_per_view;
			$cards_per_slide_mobile = isset( $settings[ 'testimonial_per_slide_mobile' ] ) && !empty( $settings[ 'testimonial_per_slide_mobile' ] ) ? $settings[ 'testimonial_per_slide_mobile' ] : $cards_per_view;
			$slides_per_group_tablet = isset( $settings[ 'slides_per_group_tablet' ] ) && !empty( $settings[ 'slides_per_group_tablet' ] ) ? $settings[ 'slides_per_group_tablet' ] : $slides_per_group;
			$slides_per_group_mobile = isset( $settings[ 'slides_per_group_mobile' ] )  && !empty( $settings[ 'slides_per_group_mobile' ] ) ? $settings[ 'slides_per_group_tablet' ] : $slides_per_group;	

			$space_between_slides_tablet = $cards_space_between;
			if( isset( $settings[ 'space_between_slides_tablet' ][ 'size' ] ) )
			{
				$space_between_slides_tablet = $settings[ 'space_between_slides_tablet' ][ 'size' ];
			}	

			$space_between_slides_mobile = $cards_space_between;
			if( isset( $settings[ 'space_between_slides_mobile' ][ 'size' ] ) )
			{
				$space_between_slides_mobile = $settings[ 'space_between_slides_mobile' ][ 'size' ];
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
	                        dynamicBullets: " . $dynamic_bullets . ",
	                        clickable: true,
	                    }";
			}

			if ( 'yes' === $autoplay ) {
				if ( 'yes' === $pause_on_hover ) {
					$autoplaySlides = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: true,
	                            }';
				} else {
					$autoplaySlides = '{
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
			?>
			<script type="text/javascript">
				jQuery( function( $ ) {
					var <?php echo esc_attr( $swiper ); ?>_swiper = new Swiper( '.<?php echo esc_attr( $order_class ); ?> .swiper-container',{
						slidesPerView: <?php echo $cards_per_view; ?>,
						autoplay: <?php echo $autoplaySlides; ?>,
						spaceBetween: <?php echo intval( $cards_space_between ); ?>,
						slidesPerGroup: <?php echo $slidesPerGroup; ?>,
						slidesPerGroupSkip: <?php echo $slidesPerGroupSkip; ?>,
						effect: "<?php echo $slide_effect; ?>",
						cubeEffect: <?php echo $cube; ?>,
						coverflowEffect: <?php echo $coverflow; ?>,
						speed: <?php echo $transition_duration; ?>,
						pagination: <?php echo $dots; ?>,
						navigation: <?php echo $arrows; ?>,
						grabCursor: 'true',
						autoHeight: <?php echo 'equal_height' === $equalize_height ? 0 : true; ?>,
						observer: true,
						observeParents: true,
						loop: <?php echo $loop; ?>,
						breakpoints: {
	                            	981: {
			                          	slidesPerView: <?php echo  $cards_per_view ; ?>,
			                          	spaceBetween: <?php echo  intval( $cards_space_between ) ; ?>,
	                            		slidesPerGroup: <?php echo  $slidesPerGroup ; ?>,
	                            		slidesPerGroupSkip: <?php echo  $slidesPerGroupSkip ; ?>,
			                        },
									768: {
										slidesPerView: <?php echo $cards_per_slide_tablet; ?>,
										spaceBetween: <?php echo intval( $space_between_slides_tablet ); ?>,
										slidesPerGroup: <?php echo isset( $slides_per_group_tablet ) ? $slides_per_group_tablet : 1; ?>,
										slidesPerGroupSkip: <?php echo $slidesPerGroupSkip; ?>,
									},
									0: {
										slidesPerView: <?php echo $cards_per_slide_mobile; ?>,
										spaceBetween:<?php echo intval( $space_between_slides_mobile ); ?>,
										slidesPerGroup: <?php echo isset( $slides_per_group_mobile ) ? $slides_per_group_mobile : 1; ?>,
										slidesPerGroupSkip: <?php echo $slidesPerGroupSkip; ?>,
									},
			                    },
					
					} );
			
					<?php
					if ( 'yes' === $pause_on_hover && 'yes' === $autoplay ) {
						?>					
							jQuery( ".<?php echo esc_attr( $order_class ); ?> .swiper-container" ).on( "mouseenter", function( e ) {
								if ( typeof <?php echo esc_attr( $swiper ); ?>_swiper.autoplay.stop === "function" ) {
									<?php echo esc_attr( $swiper ); ?>_swiper.autoplay.stop();
								}
							} );

							jQuery( ".<?php echo esc_attr( $order_class ); ?> .swiper-container" ).on( "mouseleave", function( e ) {
								if ( typeof <?php echo esc_attr( $swiper ); ?>_swiper.autoplay.start === "function" ) {
									<?php echo esc_attr( $swiper ); ?>_swiper.autoplay.start();
								}
							} );					
						<?php
					}
					if ( 'true' !== $loop ) {
						?>				
							<?php echo esc_attr( $swiper ); ?>_swiper.on( 'reachEnd', function() {
								<?php echo esc_attr( $swiper ); ?>_swiper.autoplay = false;
							} );
						
						<?php
					}
					?>
				} );
			</script>
			<?php
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
			$show_arrow                         = $settings[ 'show_arrow' ];
			$show_rating                        = $settings['show_rating'];
			$order_class                        = 'elementor-element-' . $this->get_id();
			$use_gravatar                       = $settings['use_gravatar'];
			$equal_height                       = ( 'equal_height' === $settings[ 'equalize_testimonials_height' ] ) ? ' equal-height' : '';
			$no_result_text                     = $settings['no_result_text'];
			$arrows_position                    = $settings[ 'arrows_position' ];
			$show_control_dot                   = $settings['show_control_dot'];
			$testimonial_order                  = $settings['testimonial_order'];
			$show_author_image                  = $settings['show_author_image'];
			$author_image_size                  = $settings['author_image_size'];
			$control_dot_style                  = $settings['control_dot_style'];
			$testimonial_layout                 = esc_attr( $settings[ 'testimonial_layout' ] );
			$testimonial_layout                 = wpmozo_ae_validate_layout( $testimonial_layout, array( 'layout1', 'layout2' ) );
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
				<div class="wpmozo_swiper_wrapper <?php echo $equal_height; ?>">
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

				if ( 'yes' === $show_arrow ) {
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
					<div class="wpmozo_swiper_navigation wpmozo_arrows_<?php echo $arrows_position; ?>" <?php echo  ( !empty( $arrows_position ) ? $arrows_position_data : '' ) ;  ?> >
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
								.<?php echo $order_class; ?> .wpmozo_swiper_navigation .swiper-button-prev { 
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease; 
								} .<?php echo $order_class; ?> .wpmozo_swiper_navigation .swiper-button-next {
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease;
								} .<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-prev, 
								.<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-next {
									visibility: visible;
									opacity: 1;
								} .<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-prev.swiper-button-disabled, .<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-next.swiper-button-disabled {
									opacity: 0.35;
								} .<?php echo $order_class; ?> .wpmozo_arrows_outside .swiper-button-prev {
									left: 50px;
								} .<?php echo $order_class; ?> .wpmozo_arrows_outside .swiper-button-next {
									right: 50px;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_outside .swiper-button-prev {
									left: 0;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_outside .swiper-button-next {
									right: 0;
								} .<?php echo $order_class; ?> .wpmozo_arrows_inside .swiper-button-prev {
									left: -50px;
								} .<?php echo $order_class; ?> .wpmozo_arrows_inside .swiper-button-next {
									right: -50px;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_inside .swiper-button-prev {
									left: 0;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_inside .swiper-button-next {
									right: 0;
								} .<?php echo $order_class; ?> .wpmozo_arrows_outside:before, .<?php echo $order_class; ?> .wpmozo_arrows_outside:after {
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

				if ( 'yes' === $show_control_dot ) {
					?>
						<div class="wpmozo_swiper_pagination"><div class="swiper-pagination <?php echo esc_attr( $control_dot_style ); ?>"></div></div>
					<?php
				}

				?></div> <!-- wpmozo_swiper_wrapper --><?php
			}
			$this->wpmozo_render_testimonial_script();
		}

	}
}