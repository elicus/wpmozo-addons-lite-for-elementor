<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use \Elementor\Group_Control_Image_Size;
?>
<div class="wpmozo_horizontal_scrolling_posts_image_wrapper">
	<?php
	$current_post_id = get_the_ID();
	$thumbnail_id    = get_post_thumbnail_id( $current_post_id );
	$thumbnail_url   = wp_get_attachment_image_url( $thumbnail_id, $image_size );
	$srcset          = wp_get_attachment_image_srcset( $thumbnail_id );
	$image_alt       = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

	if ( empty( $image_alt ) ) {
		$image_alt = get_the_title( $current_post_id );
	}

	if ( has_post_thumbnail( $current_post_id ) && ! empty( $thumbnail_url ) ) {

		$size      = isset( $settings[ 'image_size_size' ] ) ? esc_attr( $settings[ 'image_size_size' ] ) : 'full';
		$img_url   = $thumbnail_url;
		$attach_id = $thumbnail_id ? $thumbnail_id : '';
		$img_url   = ! empty( $attach_id ) ? Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'image_size', $settings ) : $img_url;
		if ( empty( $img_url ) ) {
			$img_url = esc_url( $settings[ 'image_card_image' ][ 'url' ] );
		}
		$image_sizing = 'attachment-' . $size . ' size-' . $size;
		



		$this->add_render_attribute( 
			"post-image-{$current_post_id}",
			array( 
				'src'   => $img_url,
				'loading'=> 'lazy',
				'decoding' => 'async',
				'class' => array( 'wpmozo_horizontal_scrolling_posts_image', $image_sizing ),
				'alt'   => $image_alt,
			 )
		 );

		?>
	<a href="<?php echo esc_attr( get_the_permalink() ); ?>" target="_self">
		<img <?php $this->print_render_attribute_string( "post-image-{$current_post_id}" ); ?> />
	</a>	
	<?php } ?>
</div>
<div class="wpmozo_horizontal_scrolling_posts_content_wrapper">
	<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_horizontal_scrolling_posts_title">
		<?php echo esc_html( get_the_title() ); ?>
	</<?php echo esc_attr( $title_heading_level ); ?>>
	<?php
	if ( 'yes' === $settings['show_excerpt'] ) {
		$content = get_the_content();
		if ( ! empty( trim( wp_strip_all_tags( $content ) ) ) ) {
			?>
			<div class="wpmozo_horizontal_scrolling_posts_excerpt">
				<p><?php echo wp_kses_post( wp_trim_words( $content, $settings['excerpt_length'] ) ); ?></p>
			</div>
			<?php
		}
	}
	?>

	<?php
	if ( 'yes' === $show_button ) {
		?>
		<div class="wpmozo_readmore_button_wrapper">
			<a class="wpmozo_readmore_button" href="<?php echo esc_attr( get_the_permalink() ); ?>" target="<?php echo esc_attr( $settings['button_link_target'] ); ?>">
				<span class="wpmozo_button_text"><?php echo esc_html( $settings['button_text'] ); ?></span>
				<?php
				\Elementor\Icons_Manager::render_icon(
					$settings['button_icon'],
					array(
						'aria-hidden' => 'true',
						'class'       => 'wpmozo_button_icon',
					)
				);
				?>
			</a>
		</div>
	<?php } ?>
</div>
