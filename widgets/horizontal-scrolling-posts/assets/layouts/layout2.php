<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
	$thumbnail_url = get_the_post_thumbnail_url( get_the_ID() );
?>
<div class="wpmozo_horizontal_scrolling_post_inner" style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );">
	<div class="wpmozo_horizontal_scrolling_posts_content_wrapper">
		<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_horizontal_scrolling_posts_title">
			<?php echo esc_html( get_the_title() ); ?>
		</<?php echo esc_attr( $title_heading_level ); ?>>
		<div class="wpmozo_horizontal_scrolling_posts_excerpt">
		<?php if ( 'yes' === $settings['show_excerpt'] ) { ?>
			<p><?php echo wp_kses_post( wp_trim_words( get_the_content(), $settings['excerpt_length'] ) ); ?></p>
		<?php } ?>
		</div>
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
</div>
