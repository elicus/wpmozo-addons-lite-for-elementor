<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="wpmozo_horizontal_scrolling_card_inner" style="background-image: url( <?php echo esc_attr( $item['card_item_image']['url'] ); ?> );">
	<div class="wpmozo_horizontal_scrolling_card_content_wrapper">
		<div class="wpmozo_horizontal_scrolling_card_tag_wrapper">
		<?php if ( '' !== $item['card_item_tag'] ) { ?>
		<div class="wpmozo_horizontal_scrolling_card_tag_wrapper">
			<span class="wpmozo_horizontal_scrolling_card_tag"><?php echo esc_attr( $item['card_item_tag'] ); ?></span>
		</div>
	<?php } ?>
		</div>
	<?php if ( '' !== $item['item_title'] ) { ?>
		<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_horizontal_scrolling_card_title"><?php echo esc_attr( $item['item_title'] ); ?></<?php echo esc_attr( $title_heading_level ); ?>>
	<?php } ?>
	<?php if ( '' !== $item['card_item_description'] ) { ?>
		<div class="wpmozo_horizontal_scrolling_card_description"><?php echo esc_attr( $item['card_item_description'] ); ?></div>
	<?php } ?>
		<?php
		if ( 'yes' === $item['show_button'] ) {
			?>
			<div class="wpmozo_readmore_button_wrapper">
				<a class="wpmozo_readmore_button" href="<?php echo esc_attr( get_the_permalink() ); ?>" target="<?php echo esc_attr( $item['button_link_target'] ); ?>">
					<span class="wpmozo_button_text"><?php echo esc_html( $item['button_text'] ); ?></span>
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
