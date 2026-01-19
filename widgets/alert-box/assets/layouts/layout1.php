<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="dipl_alert_box_inner">
	<div class="dipl_alert_box_image_wrap <?php echo esc_attr( $use_alert_box_image ); ?>">
		<?php if ( ! empty( $settings['alert_box_image']['url'] ) ) { ?>
			<img decoding="async" src="<?php echo esc_url( $alert_box_image ); ?>" alt="<?php echo esc_attr( $alert_box_image_alt ); ?>">
		<?php } else { ?>
			<span class="wpmozo_alert_box_icon">
				<?php
				\Elementor\Icons_Manager::render_icon(
					$settings['alert_box_icon'],
					array(
						'aria-hidden' => 'true',
						'class'       => 'wpmozo_alert_icon',
					)
				);
				?>
			</span>
		<?php } ?>
	</div>
	<div class="dipl_alert_box_content">
		<<?php echo esc_html( $title_heading_level ); ?> class="dipl_alert_box_title"><?php echo esc_html( $alert_title ); ?></<?php echo esc_html( $title_heading_level ); ?>>
		<div class="dipl_alert_box_description"><?php echo esc_html( $alert_description ); ?></div>
	</div>
	<?php if ( 'yes' === $show_alert_button && '' !== $button_url ) { ?>
	<div class="wpmozo_button_wrapper">
		<a class="wpmozo_button" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_text ); ?>
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
	<?php if ( 'yes' === $show_close_button ) { ?>
		<a href="#" class="dipl-alert-box-close-btn">
		<span class="wpmozo_close_icon">x</span>
		</a>
	<?php } ?>	
</div>
<?php
