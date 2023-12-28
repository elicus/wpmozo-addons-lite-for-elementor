<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2023 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

class WPMOZO_AE_Masonry_Gallery extends Widget_Base {

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
		return 'wpmozo_ae_masonry_gallery';
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
		return esc_html__( 'Masonry Gallery', 'wpmozo-addons-for-elementor-lite' );
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
		return 'eicon-gallery-masonry';
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

		wp_register_style( 'wpmozo-ae-masonrygallery-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );
		wp_register_style( 'magnific-popup-style', plugins_url( 'assets/css/magnificPopup.min.css', __FILE__ ) );
		return array( 'wpmozo-ae-masonrygallery-style', 'magnific-popup-style' );
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

		wp_register_script( 'wpmozo-ae-masonry-gallery-script', plugins_url( 'assets/js/masonryGallery.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_VERSION, false );

		return array( 'wpmozo-ae-mfp', 'wpmozo-ae-isotope', 'wpmozo-ae-imagesloaded', 'wpmozo-ae-masonry-gallery-script' );
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

		//Seprate file containing all the code for registering controls.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'masonry-gallery/assets/controls/controls.php';
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
		$settings = $this->get_settings_for_display();

		$enable_lightbox                  = $settings['lightbox_switcher'];
		$gallery_items                    = is_array( $settings['gallery'] ) ? $settings[ 'gallery' ] : array();
		$enable_overlay                   = $settings['overlay_on_hover_switcher'];
		$show_title                       = $settings['image_title_switcher'];
		$title_area                       = esc_attr( $settings['title_show_select'] );
		$show_caption                     = $settings['caption_switcher'];
		$caption_area                     = esc_attr( $settings['caption_show_select'] );
		$lightbox_title_and_caption_style = esc_attr( $settings['title_caption_style_select'] );
		$title_level                      = esc_attr( $settings['title_heading_level'] );
		$column_count                     = intval( $settings['select_number_of_column'] );
		$column_spacing                   = esc_attr( $settings ['column_spacing_slider']['size'] . $settings ['column_spacing_slider']['unit'] );
		$gallery_images                   = '';
		$overlay_output                   = '';
		$image_title                      = '';
		$image_caption                    = '';
		$title_caption_wrapper            = '';

		// Declaring classes and other attributes.
		$this->add_render_attribute( 'image_caption', 'class', array( 'wpmozo_ae_masonry_gallery_item_caption', $caption_area ) );
		$this->add_render_attribute( 'image_title', 'class', array( 'wpmozo_ae_masonry_gallery_item_title', $title_area ) );
		$this->add_render_attribute( 'image_wrapper', 'class', 'wpmozo_ae_masonry_gallery_image_wrapper' );
		$this->add_render_attribute( 'gallery_item_with_lightbox', 'class', array( 'wpmozo_ae_masonry_gallery_item', 'wpmozo_ae_masonry_gallery_item_with_lightbox' ) );
		$this->add_render_attribute( 'gallery_item_no_lightbox', 'class', 'wpmozo_ae_masonry_gallery_item' );
		$this->add_render_attribute( 'gallery_wrapper', 'class', 'wpmozo_ae_masonry_gallery_wrapper' );
		$this->add_render_attribute( 'gallery_item_gutter', 'class', 'wpmozo_ae_masonry_gallery_item_gutter' );
		$this->add_render_attribute( 'title_caption_wrapper', 'class', array( 'wpmozo_ae_masonry_gallery_title_caption_wrapper', $lightbox_title_and_caption_style ) );

		$gutter = esc_attr( $settings ['column_spacing_slider']['size'] );

		$item_width_percentage = 100 / $column_count;
		$item_width_spacing    = $gutter * ( $column_count - 1 ) / $column_count;

		// Massonry gallery item width.
		$item_width = 'calc( ' . $item_width_percentage . '%% - ' . $item_width_spacing . $column_spacing . ' )';

		// Masonry gallery overlay icon.
		if ( isset( $settings['overlay_icon_select']['value'] ) && 'yes' === $enable_overlay ) {
			$overlay_output = Icons_Manager::try_get_icon_html(
				$settings['overlay_icon_select'],
				array(
					'aria-hidden' => 'true',
					'class'       => 'wpmozo_ae_masonry_gallery_icon ',
				),
				'span'
			);
		}

		// Main output.
		?> <div <?php echo $this->get_render_attribute_string( 'gallery_wrapper' ); ?>  data-post_id="<?php echo intval( get_the_id() ); ?> ">
				<div <?php echo $this->get_render_attribute_string( 'gallery_item_gutter' ); ?> ></div>
					<?php 
						foreach ( $gallery_items as $items ) {
							// Masonry gallery image title
							if ( '' !== get_the_title( $items['id'] ) && 'yes' === $show_title && 'default-image-id' !== $items['id'] ) {
								$image_title = '<' . $title_level . ' ' . $this->get_render_attribute_string( 'image_title' ) . '>' . get_the_title( $items['id'] ) . '</' . $title_level . '>';
							} else {
								$image_title = '';
							}
							// Masonary gallery image catption
							if ( '' !== wp_get_attachment_caption( $items['id'] ) && 'yes' === $show_caption && 'default-image-id' !== $items['id'] ) {
								$image_caption = '<p ' . $this->get_render_attribute_string( 'image_caption' ) . '>' . wp_get_attachment_caption( $items['id'] ) . '</p>';
							} else {
								$image_caption = '';
							}

							// Masonry gallery images if lightbox is on
							if ( 'yes' === $enable_lightbox ) {
								?>
									<div <?php echo $this->get_render_attribute_string( 'gallery_item_with_lightbox' ); ?> data-mfp-src="<?php echo $items['url']; ?> ">
										<div <?php echo $this->get_render_attribute_string( 'image_wrapper' ); ?>  >
											<?php
											 if( 'default-image-id' === $items['id'] ){
											 	?>
											 		<img src="<?php echo Utils::get_placeholder_image_src(); ?>" >
											 	<?php
											 } else{
											 	echo wp_get_attachment_image( $items['id'], $settings['masonry_gallery_image_size_size'], false, array( 'loading' => 'eager' ) );
											 }
											?>  <?php echo $overlay_output; ?> 
										</div>
										<?php
										if ( '' !== $image_title || '' !== $image_caption ) {
											?>
												<div <?php echo $this->get_render_attribute_string( 'title_caption_wrapper' ); ?> >
													<?php echo $image_title; ?> 
													<?php echo $image_caption; ?> 
												</div>
											<?php
										} else {
											$title_caption_wrapper = '';
										}
										?> 
									</div>
								<?php
							} else {
								?>
									<div <?php echo $this->get_render_attribute_string( 'gallery_item_no_lightbox' ); ?> >
										<div <?php echo $this->get_render_attribute_string( 'image_wrapper' ); ?> >
										<?php
											if( 'default-image-id' === $items['id'] ){
											 	?>
											 		<img src=" <?php echo Utils::get_placeholder_image_src(); ?> " >
											 	<?php
											 } else{
											 	echo wp_get_attachment_image( $items['id'], $settings['masonry_gallery_image_size_size'], false, array( 'loading' => 'eager' ) );
											 } 
										?> 
											 <?php echo 'yes' === $enable_overlay ? $overlay_output : ''; ?>
										</div>
										<?php
										if ( '' !== $image_title || '' !== $image_caption ) {
											?>
												<div <?php echo $this->get_render_attribute_string( 'title_caption_wrapper' ); ?> >
													<?php echo $image_title; ?> 
													<?php echo $image_caption; ?> 
												</div>
											<?php
										} else {
											$title_caption_wrapper = '';
										}
										?>
									</div>
								<?php
							}
						} 
					?> 
				</div>
		<?php

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) { 
			?>
				<script type="text/javascript">
					// Masonry layout
					jQuery( '.wpmozo_ae_masonry_gallery_wrapper' ).isotope({
						// options
						itemSelector: '.wpmozo_ae_masonry_gallery_item',
						layoutMode: 'masonry',
						percentPosition: true,
						resize: true,
						masonry: {
							columnWidth: '.wpmozo_ae_masonry_gallery_item',
							gutter: '.wpmozo_ae_masonry_gallery_item_gutter'
						}
					});
					jQuery( '.wpmozo_ae_masonry_gallery_wrapper' ).imagesLoaded( { background: '.wpmozo_ae_masonry_gallery_image_wrapper' } ).progress( function() {
						jQuery( '.wpmozo_ae_masonry_gallery_wrapper ' ).isotope( 'layout' );
						jQuery( '.wpmozo_ae_masonry_gallery_wrapper ' ).isotope( 'reloadItems' );
					});
				</script>
			<?php
		}
	}
}