<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Justified_Gallery' ) ) {
	class WPMOZO_AE_Justified_Gallery extends Widget_Base {

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
			return 'wpmozo_ae_justified_gallery';
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
			return esc_html__( 'Justified Gallery', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-justified-gallery wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-justified-gallery-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array('wpmozo-ae-justifiedGallery-style', 'wpmozo-ae-justified-gallery-style', 'wpmozo-ae-mfp-style' );
			
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
			
			wp_register_script( 'wpmozo-ae-justified-gallery-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			wp_localize_script( 
				'wpmozo-ae-justified-gallery-script',
				'ajax_object',
				array( 
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'    => wp_create_nonce( 'wpmozo_ae_justified_gallery-script' ),
				 )
			 );
			
			return array( 'wpmozo-ae-justifiedGallery', 'wpmozo-ae-justified-gallery-script', 'wpmozo-ae-imagesloaded', 'wpmozo-ae-twbspagination','wpmozo-ae-mfp'  );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'justified-gallery/assets/controls/controls.php';
		}

		protected function wpmozo_process_font_icon( $icon_string ) {
			// Split the icon string by "||"
			$parts = explode( '||', $icon_string );
			
			// Check if the string is valid
			if ( count( $parts ) !== 3 ) {
				return '';
			}
		
			// Extract the Unicode, library, and weight
			list( $unicode, $library, $weight ) = $parts;
		
			// Prepare the output based on the library
			if ( $library === 'fa' ) {
				// Font Awesome
				$icon_class = 'fa' . ( (int) $weight >= 400 ? '-solid' : '' );
				return '<i class="' . esc_attr( $icon_class ) . '">' . $unicode . '</i>';
			}
		
			// You can add support for other libraries here
			return '';
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
			$settings 		= $this->get_settings_for_display();
			$all_image_ids 	= array_column($settings['image_ids'], 'id');
			$order_class    = 'elementor-element-' . $this->get_id();

			// If no image ids.
			if ( empty( $all_image_ids ) ) {
				return '';
			}
			$image_ids 		= $all_image_ids;
			$click_trigger 	= ! empty( $settings['click_trigger'] ) ? $settings['click_trigger'] : 'off';

			// Get the other props.
			$image_size       	= !empty( $settings['image_size'] ) ? $settings['image_size'] : 'large';
			$enable_load_more 	= !empty( $settings['enable_load_more'] ) ? $settings['enable_load_more'] : 'off';
			$images_per_page  	= !empty( $settings['images_per_page'] ) ? $settings['images_per_page'] : 8;
			$show_overlay 	  	= ! empty( $settings['enable_overlay'] ) ? $settings['enable_overlay'] : 'off';
			$pagination_type  	= ! empty( $settings['pagination_type'] ) ? $settings['pagination_type'] : 'load_more';
			$show_title	      	= ! empty( $settings['show_title'] ) ? $settings['show_title'] : 'off';
			$title_area	      	= ! empty( $settings['title_area'] ) ? $settings['title_area'] : 'lightbox';
			$show_caption     	= ! empty( $settings['show_caption'] ) ? $settings['show_caption'] : 'off';
			$caption_area     	= ! empty( $settings['caption_area'] ) ? $settings['caption_area'] : 'lightbox';
			$link_target      	= $settings['link_target'];
			$overlay_icon_font	= $settings['overlay_icon_size'];
			$overlay_icon_size 	= $overlay_icon_font['size'] ?? '20';
			$overlay_icon_unit 	= $overlay_icon_font['unit'] ?? 'px';
			$overlay_icon_font_size = $overlay_icon_size . $overlay_icon_unit;

			// Wrap settings to use on js.
			$wrap_settings = array(
				'column_spacing' => $settings['column_spacing']['size'] ?? '20',
				'row_height'	 => $settings['row_height']['size'] ?? '200',
				'lastrow_align'  => $settings['lastrow_align'],
				'show_title'	 => $show_title,
				'show_caption'	 => $show_caption,
				'click_trigger'	 => $click_trigger,
				'show_overlay'	 => $show_overlay,
				'item_icon'		 => $settings['overlay_icon'],
			);

			if ( 'lightbox' === $click_trigger || 'zoom_n_link' === $click_trigger ) {
				$wrap_settings['lightbox_effect']   			= $settings['lightbox_effect'];
				$wrap_settings['enable_navigation'] 			= $settings['enable_navigation'];
				$wrap_settings['lightbox_transition_duration'] 	= $settings['lightbox_transition_duration']['size'] ?? '200';
			}
			$this->add_render_attribute( 'wpmozo_justified_gallery_container', 'class', array('wpmozo-justified-gallery-container', 'justified-gallery') );
			$this->add_render_attribute( 'wpmozo_justified_gallery_filter', 'class', array('wpmozo-justified-gallery-filter') );
			$this->add_render_attribute( 'wpmozo_button_wrapper', 'class', array('wpmozo_button_wrapper', 'justified_gallery_pagination_wrapper'));
			$this->add_render_attribute( 'wpmozo_justified_gallery_item_overlay', 'class', 'wpmozo-justified-gallery-item-overlay');
			$this->add_render_attribute( 'wpmozo_icon_wrap', 'class', 'wpmozo-icon-wrap');
			$this->add_render_attribute( 'wpmozo_item_content', 'class', array('wpmozo-item-content', esc_html($settings['lightbox_title_and_caption_style'])));
			$this->add_render_attribute( 'wpmozo_item_title', 'class', 'wpmozo-item-title');
			$this->add_render_attribute( 'wpmozo_item_caption', 'class', 'wpmozo-item-caption');
			$this->add_render_attribute( 'wpmozo_overlay_lightbox', 'class', array('wpmozo-overlay-lightbox','wpmozo-icon'));
			$this->add_render_attribute( 'wpmozo_overlay_link', 'class', array('wpmozo-overlay-link','wpmozo-icon'));
			$this->add_render_attribute( 'wpmozo_overlay_icon_wrap', 'class', 'wpmozo-overlay-icon-wrap');
			$this->add_render_attribute(
				'wpmozo_justified_gallery_wrap',
				array(
					'class'       	=> 'wpmozo-justified-gallery-wrap',
					'data-settings'	=> _wp_specialchars( wp_json_encode( $wrap_settings ), ENT_QUOTES, 'UTF-8', true )
				)
			);
			// if ( 'yes' === $enable_load_more && 0 < $images_per_page ) {
			// 	// All image ids.
			// 	$image_ids = array_slice( $all_image_ids, 0, $images_per_page, true );
			// }
			?>
			<div  <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_wrap' ); ?>>
				<?php
				$filter_cats    = array();
				$gallery_filter = '';
				$enable_filter  = !empty( $settings['enable_filterable_gallery'] ) ? $settings['enable_filterable_gallery'] : 'off';
				if ( 'yes' === $enable_filter ): 
					// Get the terms, also get it on perticular order.
					$categories_args = array(
						'taxonomy'   => 'wpmozo-attachment-category',
						'object_ids' => $all_image_ids,
						'hide_empty' => false,
					);
					if ( ! empty( $settings['terms_orderby'] ) && 'none' !== $settings['terms_orderby'] ) {
						$categories_args['orderby'] = $settings['terms_orderby'];
						$categories_args['order']   = $settings['terms_order'];
					}
					$categories = get_terms( $categories_args );
					if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
						foreach ( $categories as $category ) {
							$filter_cats[ $category->slug ] = $category->name;
						}
					}
					?>
					<ul <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_filter' ); ?>>
						<?php
						$active_class = 'active';
						if ( ! empty( $settings['show_all_filter'] ) && 'yes' === $settings['show_all_filter'] ) {
							$this->add_render_attribute(
								'wpmozo_filter_item_all_anchor',
								array(
									'data-filter'       => '*',
									'href'				=> '#all',
									'class'				=> esc_attr( $active_class )
								)
							);
							$this->add_render_attribute( 'wpmozo_filter_item_all', 'class', array('wpmozo-filter-item', esc_attr($active_class)));
							?>
							<li <?php $this->print_render_attribute_string( 'wpmozo_filter_item_all' ); ?>>
								<a <?php $this->print_render_attribute_string( 'wpmozo_filter_item_all_anchor' ); ?>>
									<?php echo ! empty( $settings['all_images_text'] ) ? $settings['all_images_text'] : esc_html__( 'All', 'wpmozo-addons-lite-for-elementor' ); ?>
								</a>
							</li>
							<?php
							$active_class = '';
						}

						foreach ( $filter_cats as $filter_cat_slug => $filter_cat ) {
							$this->add_render_attribute( 'wpmozo_filter_item_'. esc_attr($filter_cat_slug), 'class', array('wpmozo-filter-item', esc_attr($active_class)));
							$this->add_render_attribute(
								'wpmozo_filter_item_anchor_'. esc_attr( $filter_cat_slug),
								array(
									'data-filter'       => '.'.esc_attr( $filter_cat_slug ),
									'href'				=> '#'.esc_attr( $filter_cat_slug ),
								)
							);
							?>
							<li <?php $this->print_render_attribute_string( 'wpmozo_filter_item_'. esc_attr($filter_cat_slug) ); ?>>
								<a <?php $this->print_render_attribute_string( 'wpmozo_filter_item_anchor_'. esc_attr( $filter_cat_slug) ); ?>>
									<?php echo esc_html( $filter_cat ); ?>
								</a>
							</li>
							<?php
							$active_class = '';
						}
						?>
					</ul>
				<?php endif; ?>

				<div  <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_container' ); ?>>
					<?php 
						foreach ( $image_ids as $img_index => $image_id ) {
							
							$image_link = get_post_meta( intval( $image_id ), 'wpmozo_ae_attachment_link', true );
							
							$this->add_render_attribute(
								'wpmozo_overlay_lightbox_'. esc_attr( $image_id),
								array(
									'class'			=> array('wpmozo-icon', 'wpmozo-overlay-lightbox'),
									'href'			=> esc_url( wp_get_attachment_url( intval( $image_id ) ) ),
									'data-mfp-src'	=> esc_url( wp_get_attachment_url( intval( $image_id ) ) ),
								)
							);
							$this->add_render_attribute(
								'wpmozo_overlay_link_'. esc_attr( $image_id),
								array(
									'class'			=> array('wpmozo-icon', 'wpmozo-overlay-link'),
									'href'			=> esc_url( $image_link ),
									'target'		=> 'yes' === $link_target ? ' target="_blank"' : '',
								)
							);
							$cat_classes = array();
							$categories = get_the_terms( $image_id, 'wpmozo-attachment-category' );
							
							if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
								foreach ( $categories as $category ) {
									// $filter_cats[ $category->slug ] = $category->name;
									$cat_classes[] = $category->slug;
								}
							}
							// Hide if pagination.	
							if ( 'yes' === $enable_load_more && 0 < $images_per_page && ($img_index + 1) > $images_per_page ) {
								$cat_classes[] = 'wpmozo-hidden-item';
							}
							$this->add_render_attribute( 'wpmozo_justified_gallery_item_' . $img_index, 'class', array('wpmozo-justified-gallery-item', esc_attr( implode( ' ', $cat_classes ) )) );
							$this->add_render_attribute(
								'wpmozo_item_figure_tag_' . $img_index,
								array(
									'data-mfp-src'		=> esc_url( wp_get_attachment_url( intval( $image_id ) ) ),
								)
							);
							$this->add_render_attribute(
								'wpmozo_item_anchor_tag_' . $img_index,
								array(
									'href'		=> esc_url($image_link),
									'target'	=> 'yes' === $link_target ? '_blank' : '',
								)
							);
							?>
							<?php if ( 'lightbox' === $click_trigger ): ?>
								<div  <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_item_' . $img_index ); ?>>
									<figure <?php $this->print_render_attribute_string( 'wpmozo_item_figure_tag_' . $img_index ); ?>>
										<?php 

										if ( 'default-image-id' === $image_id ) {
										?>
											<img src="<?php echo esc_url( Utils::get_placeholder_image_src() ); ?>" >
										<?php
										} else {
											echo wp_get_attachment_image( intval( $image_id ), sanitize_text_field( $image_size ), false );
										}
										?>
										<?php if ( 'yes' === $show_overlay ): ?>
											<figcaption  <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_item_overlay' ); ?>>
												<span <?php $this->print_render_attribute_string( 'wpmozo_icon_wrap' ); ?>> 
													<?php
													Icons_Manager::render_icon( 
														$settings[ 'overlay_icon' ],
														array( 
															'aria-hidden' => 'true',
															'class'       => 'wpmozo-icon',
															'height'		=> $overlay_icon_font_size,
															'width'			=> $overlay_icon_font_size
														)
													);
													?>
												</span>
												<?php
													if ( 'yes' === $show_overlay && 'zoom_n_link' === $click_trigger ) {
														?>
															<div <?php $this->print_render_attribute_string( 'wpmozo_overlay_icon_wrap' ); ?>>
																<a <?php $this->print_render_attribute_string( 'wpmozo_overlay_lightbox_'. esc_attr( $image_id) ); ?>>
																	<?php echo $this->wpmozo_process_font_icon( "&#xf00e;||fa||900" ); ?>
																</a>
																<?php
																if ( ! empty( $image_link ) ) {
																	?>
																		<a <?php $this->print_render_attribute_string( 'wpmozo_overlay_link_'. esc_attr( $image_id) ); ?>>
																			<?php echo $this->wpmozo_process_font_icon( "&#xf0c1;||fa||900" ); ?>
																		</a>
																	<?php
																}
																?>
															</div>
														<?php
													}
												?>
											</figcaption>
										<?php endif; ?>
									</figure>
									<div <?php $this->print_render_attribute_string( 'wpmozo_item_content' ); ?>>
										<?php if ( 'yes' === $show_title ): ?>
												<h4 <?php $this->print_render_attribute_string( 'wpmozo_item_title' ); ?>> 
													<?php echo  esc_html( wptexturize( get_the_title( $image_id ) ) ); ?>
												</h4>
										<?php endif; ?>
										<?php if ( 'yes' === $show_caption ): ?>
												<div <?php $this->print_render_attribute_string( 'wpmozo_item_caption' ); ?>> 
													<?php echo  esc_html( wp_get_attachment_caption( $image_id ) ) ; ?>
												</div>
										<?php endif; ?>
									</div>
								</div>
							<?php elseif( 'link' === $click_trigger && ! empty( $image_link )): ?>
								<div <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_item_' . $img_index ); ?>>
									<figure> 
										<a <?php $this->print_render_attribute_string( 'wpmozo_item_anchor_tag_' . $img_index ); ?>>
											<?php
											if ( 'default-image-id' === $image_id ) {
												?>
													<img src="<?php echo esc_url( Utils::get_placeholder_image_src() ); ?>" >
												<?php
											} else {
												echo wp_get_attachment_image( intval( $image_id ), sanitize_text_field( $image_size ), false );
											}
											?>
											<?php if ( 'yes' === $show_overlay): ?>
												<figcaption <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_item_overlay' ); ?>>
													<span <?php $this->print_render_attribute_string( 'wpmozo_icon_wrap' ); ?>> 
														<?php
														Icons_Manager::render_icon( 
															$settings[ 'overlay_icon' ],
															array( 
																'aria-hidden' 	=> 'true',
																'class'       	=> 'wpmozo-icon',
																'height'		=> $overlay_icon_font_size,
																'width'			=> $overlay_icon_font_size
															)
														);
														?>
													</span>
													<?php
														if ( 'yes' === $show_overlay && 'zoom_n_link' === $click_trigger ) {
															?>
																<div <?php $this->print_render_attribute_string( 'wpmozo_overlay_icon_wrap' ); ?>>
																	<a <?php $this->print_render_attribute_string( 'wpmozo_overlay_lightbox_'. esc_attr( $image_id) ); ?>>
																		<?php echo $this->wpmozo_process_font_icon( "&#xf00e;||fa||900" ); ?>
																	</a>
																	<?php
																	if ( ! empty( $image_link ) ) {
																		?>
																			<a <?php $this->print_render_attribute_string( 'wpmozo_overlay_link_'. esc_attr( $image_id) ); ?>>
																				<?php echo $this->wpmozo_process_font_icon( "&#xf0c1;||fa||900" ); ?>
																			</a>
																		<?php
																	}
																	?>
																</div>
															<?php
														}
													?>
												</figcaption>
											<?php endif; ?>
										</a>
									</figure>
									<div <?php $this->print_render_attribute_string( 'wpmozo_item_content' ); ?>>
										<?php if ( 'yes' === $show_title ): ?>
												<h4 <?php $this->print_render_attribute_string( 'wpmozo_item_title' ); ?>> 
													<?php echo  esc_html( wptexturize( get_the_title( $image_id ) ) ); ?>
												</h4>
										<?php endif; ?>
										<?php if ( 'yes' === $show_caption ): ?>
												<div <?php $this->print_render_attribute_string( 'wpmozo_item_caption' ); ?>> 
													<?php echo  esc_html( wp_get_attachment_caption( $image_id ) ) ; ?>
												</div>
										<?php endif; ?>
									</div>
								</div>
							<?php else: ?>
								<div <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_item_' . $img_index ); ?>>
									<figure>
										<?php
										if ( 'default-image-id' === $image_id ) {
												?>
													<img src="<?php echo esc_url( Utils::get_placeholder_image_src() ); ?>" >
												<?php
											} else {
												echo wp_get_attachment_image( intval( $image_id ), sanitize_text_field( $image_size ), false );
											}
										?>
										<?php if ( 'yes' === $show_overlay): ?>
											<figcaption <?php $this->print_render_attribute_string( 'wpmozo_justified_gallery_item_overlay' ); ?>>
												<span <?php $this->print_render_attribute_string( 'wpmozo_icon_wrap' ); ?>> 
													<?php
													Icons_Manager::render_icon( 
														$settings[ 'overlay_icon' ],
														array( 
															'aria-hidden' 	=> 'true',
															'class'       	=> 'wpmozo-icon',
															'height'		=> $overlay_icon_font_size,
															'width'			=> $overlay_icon_font_size
														)
													);

													?>
												</span>
												<?php
													if ( 'yes' === $show_overlay && 'zoom_n_link' === $click_trigger ) {
														?>
															<div <?php $this->print_render_attribute_string( 'wpmozo_overlay_icon_wrap' ); ?>>
															
																<a <?php $this->print_render_attribute_string( 'wpmozo_overlay_lightbox_'. esc_attr( $image_id) ); ?>>
																	<?php echo $this->wpmozo_process_font_icon( "&#xf00e;||fa||900" ); ?>
																</a>
																<?php
																if ( ! empty( $image_link ) ) {
																	?>
																		<a <?php $this->print_render_attribute_string( 'wpmozo_overlay_link_'. esc_attr( $image_id) ); ?>>
																			<?php echo $this->wpmozo_process_font_icon( "&#xf0c1;||fa||900" ); ?>
																		</a>
																	<?php
																}
																?>
															</div>
														<?php
													}
												?>
											</figcaption>
										<?php endif; ?>
									</figure>
									<div <?php $this->print_render_attribute_string( 'wpmozo_item_content' ); ?>>
										<?php if ( 'yes' === $show_title ): ?>
												<h4 <?php $this->print_render_attribute_string( 'wpmozo_item_title' ); ?>> 
													<?php echo  esc_html( wptexturize( get_the_title( $image_id ) ) ); ?>
												</h4>
										<?php endif; ?>
										<?php if ( 'yes' === $show_caption ): ?>
												<div <?php $this->print_render_attribute_string( 'wpmozo_item_caption' ); ?> > 
													<?php echo  esc_html( wp_get_attachment_caption( $image_id ) ); ?>
												</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php
						}
					?>
				</div>
				<?php
				// Load more button
				if ( 'yes' === $enable_load_more && 0 < $images_per_page ) {
					$button_atts = array(
						'images_per_page' => $images_per_page,
						'images'	      => implode( ',', $all_image_ids ),
						'page'			  => 2,
						'total_images'    => count( $all_image_ids )
					);
					if ( 'number' === $pagination_type ) {
						// Add pagination options.
						if ( 'yes' === $settings['show_prev_next'] ) {
							$button_atts['show_prev_next'] = $settings['show_prev_next'];
							$button_atts['prev_text']      = $settings['prev_text'];
							$button_atts['next_text']      = $settings['next_text'];
						}
						$this->add_render_attribute('wpmozo_button_wrapper',
							array(
								'data-options'	=> _wp_specialchars( wp_json_encode( $button_atts ), ENT_QUOTES, 'UTF-8', true )
							)
						);
						?>
						<div <?php $this->print_render_attribute_string( 'wpmozo_button_wrapper'); ?>>
							<ul>
							</ul>
						</div>
						<?php
					} else {

						// Load more button.
						$load_more_button = $this->add_render_attribute(
							'load_more_button',
							array(
							'button_text'			=> !empty( $settings['load_more_text'] ) ? esc_html( $settings['load_more_text'] ) : esc_html__( 'Load More', 'wpmozo-addons-lite-for-elementor' ),
							'button_text_escaped'	=> true,
							'button_url'			=> '#loadmore',
							'class'					=> array( 'wpmozo-justified-gallery-load-more', 'wpmozo-button' ),
						) );
						$this->add_render_attribute('wpmozo_button_wrapper',
							array(
								'data-options'	=> _wp_specialchars( wp_json_encode( $button_atts ), ENT_QUOTES, 'UTF-8', true )
							)
						);
						?>
							<div <?php $this->print_render_attribute_string( 'wpmozo_button_wrapper'); ?>>
								<a <?php $this->print_render_attribute_string( 'load_more_button'); ?>>
									<span>
										<?php echo !empty( $settings['load_more_text'] ) ? esc_html( $settings['load_more_text'] ) : esc_html__( 'Load More', 'wpmozo-addons-lite-for-elementor' ); ?>
									</span>
									<?php
										Icons_Manager::render_icon( 
											$settings[ 'button_icon' ],
											array( 
												'aria-hidden' => 'true',
												'class'       => 'wpmozo-icon',
												'height'		=> '20px',
												'width'			=> '20px'
											)
										);
									?>
								</a>
							</div>
						<?php
					}
				}
				?>
			</div>		
			<style>

				<?php
				
				// hide overlay if there is a lighbox.
				if ( '' === $show_overlay && 'lightbox' === $click_trigger ) {
					?> 	
					.<?php echo esc_html($order_class); ?> .wpmozo-justified-gallery-item .wpmozo-justified-gallery-item-overlay{
						display:none !important;
					}
					<?php
					
				} else {
					// overlay on, but title & caption not to show on overlay.
					if ( 'lightbox' === $title_area && 'lightbox' === $caption_area ) {
						
						?> 	
							.<?php echo esc_html($order_class); ?> .wpmozo-justified-gallery-item-overlay .wpmozo-item-content{
								display:none !important;
							}
						<?php
					} else {
						if ( 'lightbox' === $title_area ) {
							?> 	
							.<?php echo esc_html($order_class); ?> .wpmozo-justified-gallery-item-overlay .wpmozo-item-title{
								display:none !important;
							}
							<?php
						}
						if ( 'lightbox' === $caption_area ) {
							?> 	
							.<?php echo esc_html($order_class); ?> .wpmozo-justified-gallery-item-overlay .wpmozo-item-caption{
								display:none !important;
							}
							<?php
						}
					}
				}

				// hide/show on lightbox for title/caption.
				if ( 'lightbox' === $click_trigger || 'zoom_n_link' === $click_trigger ) {
					if ( 'overlay' === $title_area && 'overlay' === $caption_area ) {
						?> 	
							.wpmozo_justified_gallery_lightbox .mfp-title{
								display:none !important;
							}
						<?php
					} else {
						if ( 'overlay' === $title_area ) {
							?> 	
								.wpmozo_justified_gallery_lightbox .mfp-title .wpmozo-item-title{
									display:none !important;
								}
							<?php
						}
						if ( 'overlay' === $caption_area ) {
							?> 	
								.wpmozo_justified_gallery_lightbox .mfp-title .wpmozo-item-caption{
									display:none !important;
								}
							<?php
						}
					}
				}
				if ( in_array( $click_trigger, array( 'lightbox', 'zoom_n_link', 'link' ), true ) ) {
					?> 	
						.<?php echo esc_html($order_class); ?> .wpmozo-justified-gallery-item img{
							cursor:pointer;
						}
					<?php
				}
				
				?>
			</style>	
			<?php
		}	
	}
}