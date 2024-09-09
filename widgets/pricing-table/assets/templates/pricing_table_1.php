<?php
use \Elementor\Group_Control_Image_Size;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
if ( 'image' === $header_graphics ){
	$image  = array_map( 'esc_attr', $settings[ 'header_image' ] );
}

if ( ! empty( $image ) ) {
	$image = wp_get_attachment_image( $image[ 'id' ], 'full', '', array( 'loading' => 'eager' ) );
}

if ( '' !== $header_graphics && 'icon' === $header_graphics && ! empty( $settings[ 'header_icon' ][ 'value' ] ) ) {
	$header_icon = '';
}

if ( isset( $header_icon ) ) {
	?>
		<div class="wpmozo_ae_pricing_table_header_graphic">
			<div <?php $this->print_render_attribute_string( 'header_graphics_div' ); ?> > 
				<?php if ( '' !== $settings[ 'header_icon' ] ) {
					Icons_Manager::render_icon( 
						$settings[ 'header_icon' ],
						array( 
							'aria-hidden' => 'true',
							'class'       => 'wpmozo_ae_header_icon',
						 ),
						'span'
					 );
				} ?>
			</div>
		</div>
	<?php
} elseif ( ! empty( $settings[ 'header_image' ][ 'url' ] ) ) {
	?>
		<div class="wpmozo_ae_pricing_table_header_graphic">
			<div <?php $this->print_render_attribute_string( 'header_graphics_div' ); ?> > 
				<?php
					$img_url   = esc_url( $settings[ 'header_image' ][ 'url' ] );
					$attach_id = is_numeric( $settings[ 'header_image' ][ 'id' ] ) ? absint( $settings[ 'header_image' ][ 'id' ] ) : '';
					$img_url   = ! empty( $attach_id ) ? Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'header_image_size', $settings ) : $img_url;
					if ( empty( $img_url ) ) {
						$img_url = esc_url( $settings[ 'header_image' ][ 'url' ] );
					}
					$image_sizing = 'attachment-full size-full';
					// Set attributes for the image element.
					$this->add_render_attribute( 
						'image',
						array( 
							'src'   => $img_url,
							'class' => array( 'wpmozo_ae_header_image', $image_sizing ),
							'title' => Control_Media::get_image_title( $image ),
							'alt'   => Control_Media::get_image_alt( $image ),
						 )
					 );
				?>
				<img <?php $this->print_render_attribute_string( 'image' ); ?> />
			</div>
		</div>
	<?php
}

if ( '' !== $table_title ) {
	$this->add_render_attribute( 'wpmozo_ae_pricing_table_heading', 'class', 'wpmozo_ae_pricing_table_heading' );
	?>
		<div <?php $this->print_render_attribute_string( 'wpmozo_ae_pricing_table_heading' ); ?> >
			<<?php echo esc_html( $title_heading_level ); ?> <?php $this->print_render_attribute_string( 'table_title_text' ); ?> >
				<?php echo esc_html( $table_title ); ?>
			</<?php echo esc_html( $title_heading_level ); ?>>
			<?php
			if ( '' !== $table_subtitle ) {
				?>
						<span <?php $this->print_render_attribute_string( 'table_subtitle_text' ); ?> >
						<?php echo esc_html( $table_subtitle ); ?>
						</span>
						<span class="wpmozo_ae_bar_container">
							<hr class="wpmozo_ae_bar" />
						</span>
					<?php
			}
			?>
		</div>
	<?php
}

if ( '' !== $symbol ) {

	$symbol = '<span class="wpmozo_ae_pricing_table_currency_symbol"> ' . $symbol . ' </span>';
}

if ( '' !== $table_price ) {

	$table_price = '
        <span ' . $this->get_render_attribute_string( 'table_price' ) . ' >
            ' . $table_price . '
        </span>
    ';
}

if ( '' !== $pricing_period ) {

	$pricing_period = '
        <span class="wpmozo_ae_period_slash"> 
            /
        </span>
        <span ' . $this->get_render_attribute_string( 'pricing_period' ) . ' >
            ' . $pricing_period . '
        </span>
    ';
}

if ( '' !== $symbol || '' !== $table_price || '' !== $pricing_period ) {
	?>
		<div <?php $this->print_render_attribute_string( 'wpmozo_ae_pricing_table_pricing' ); ?> >
			<?php echo wp_kses_post( 'before' === $currency_position ? $symbol : $table_price ); ?>
			<?php echo wp_kses_post( 'before' === $currency_position ? $table_price : $symbol ); ?>
			<?php echo wp_kses_post( $pricing_period ); ?>   
		</div>
	<?php
}

if ( '' !== $features_list ) {
	?>
	<dl class="wpmozo_ae_pricing_table_features">
		<?php
		foreach ( $features_list as $index => $item ) {
			$tab_count = $index + 1;
			$pricing_table_features_setting_key = $this->get_repeater_setting_key( 'list_feature', 'features_list', $index );

			$this->add_render_attribute( $pricing_table_features_setting_key, 'class', 'wpmozo_ae_pricing_table_feature_text' );
			$this->add_inline_editing_attributes( $pricing_table_features_setting_key, 'none' );
			?>
			<dt class="wpmozo_ae_pricing_table_features_list elementor-repeater-item-<?php echo esc_attr( $item[ '_id' ] ); ?>">
				<?php if ( '' !== $item[ 'list_icon' ][ 'value' ] ) {
					Icons_Manager::render_icon( 
						$item[ 'list_icon' ],
						array( 
							'aria-hidden' => 'true',
							'class'       => 'wpmozo_ae_pricing_table_feature_icon',
						 ),
						'i'
					 );
				}else {
					echo '';
				}?>
				<span <?php $this->print_render_attribute_string( $pricing_table_features_setting_key ); ?>>
					<?php echo wp_kses_post( $item[ 'list_feature' ] ); ?>
				</span>
			</dt>
				<hr class="wpmozo_ae_divider" />
			<?php
		}
		?>
	</dl>
	<?php
}

if( '' !== $button_text ) {
	?>
		<div <?php $this->print_render_attribute_string( 'wpmozo_ae_button_wrapper' ); ?> >
			<a <?php $this->print_render_attribute_string( 'wpmozo_ae_button' ); ?> >
				<span <?php $this->print_render_attribute_string( 'button_text' ); ?> >
					<?php echo esc_html( $button_text ); ?>
				</span> 
			<?php 
			if( '' !== $settings[ 'button_icon' ] ) {
				Icons_Manager::render_icon( 
					$settings[ 'button_icon' ],
					array( 
						'aria-hidden' => 'true',
						'class'       => 'wpmozo_ae_button_icon',
					 )
				 );
			}else {
				echo esc_html( '' );
			} ?>
			</a>
		</div>
	<?php
}
