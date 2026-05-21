<?php
use Elementor\Group_Control_Image_Size;
use Elementor\Control_Media;
?>
<div class="wpmozo_promotion_bar_inner">
	<div class="wpmozo_promotion_bar_content">
		<?php
		if ( 'yes' === $settings['enable_image'] && '' !== $image ) {
				$size         = $settings['timer_image_size_size'];
				$image_sizing = 'attachment-' . $size . ' size-' . $size;
				$image        = $settings['timer_image'];
				$attach_id    = $image['id'];
				$img_url      = Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'timer_image_size', $settings );

				// To show placeholder image.
			if ( empty( $img_url ) ) {
				$img_url = $settings['timer_image']['url'];
			}

				$this->add_render_attribute(
					'image',
					array(
						'src'   => $img_url,
						'class' => array( 'wpmozo_ae_timer_image_image', $image_sizing ),
						'title' => Control_Media::get_image_title( $image ),
						'alt'   => Control_Media::get_image_alt( $image ),
					)
				);
			?>
		<div class="wpmozo_promotion_image_wrap" >
				<img <?php $this->print_render_attribute_string( 'image' ); ?> />
			</div>
			<?php
		}
		?>
		<div class="wpmozo_ae_promotion_bar_content_inner">
		<?php
		if ( '' !== $promotion_bar_title ) :
			?>
				<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_pb_title"><?php echo esc_html( $promotion_bar_title ); ?></<?php echo esc_attr( $title_heading_level ); ?>><?php endif; ?>
			<?php
			if ( '' !== $promotion_bar_description ) :
				?>
				<div class="wpmozo_pb_desc"><?php echo wp_kses_post( $promotion_bar_description ); ?></div>
			<?php endif; ?>
		</div>
		<?php if ( 'yes' === $show_button && '' !== $button_link_url ) : ?>
		<div class="wpmozo_promotion_bar_btn_wrap">
			<div class="wpmozo_sale_button_wrapper">
				<a class="wpmozo_sale_button" href="<?php echo esc_url( $button_link_url ); ?>">
					<span class="wpmozo_button_text"><?php echo esc_html( $button_text ); ?></span>
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
		</div>
	<?php endif; ?>
	</div>
	<div class="wpmozo_promotion_bar_timer">
	<?php if ( ! $hide_days ) : ?>
		<div class="wpmozo_pb_timer_box wpmozo_pb_days">
			<span class="wpmozo_pb_number"><?php echo esc_html( 10 > $days ? '0' . $days : $days ); ?></span>
			<?php if ( 'none' !== $display_label ) : ?>
				<span class="wpmozo_pb_label"><?php echo esc_html( $day_label ); ?></span>
			<?php endif; ?>
		</div>
		<span class="wpmozo_pb_separator"><?php echo esc_html( $separator_text ); ?></span>
	<?php endif; ?>
		<div class="wpmozo_pb_timer_box wpmozo_pb_hours">
			<span class="wpmozo_pb_number"><?php echo esc_html( 10 > $hours ? '0' . $hours : $hours ); ?></span>
			<span class="wpmozo_pb_label"><?php echo esc_html( $hour_label ); ?></span>
		</div>
		<span class="wpmozo_pb_separator"><?php echo esc_html( $separator_text ); ?></span>
		<div class="wpmozo_pb_timer_box wpmozo_pb_minutes">
			<span class="wpmozo_pb_number"><?php echo esc_html( 10 > $minutes ? '0' . $minutes : $minutes ); ?></span>
			<span class="wpmozo_pb_label"><?php echo esc_html( $minute_label ); ?></span>
		</div>
		<span class="wpmozo_pb_separator"><?php echo esc_html( $separator_text ); ?></span>
		<div class="wpmozo_pb_timer_box wpmozo_pb_seconds">
			<span class="wpmozo_pb_number"><?php echo esc_html( 10 > $seconds ? '0' . $seconds : $seconds ); ?></span>
			<span class="wpmozo_pb_label"><?php echo esc_html( $second_label ); ?></span>
		</div>
	</div>
</div>
