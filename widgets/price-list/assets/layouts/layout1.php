<div class="wpmozo_price_list_layout wpmozo_price_list_<?php echo esc_attr( $layout ); ?> column_<?php echo esc_attr( $number_of_columns ); ?> wpmozo_currency_pos_<?php echo esc_attr( $currency_symbol_position ); ?>">
	<?php foreach ( $items_content as $index => $item ) { ?>
		<div class="wpmozo_price_list_item">
			<div class="wpmozo_price_list_item_wrap">
				<?php if ( 'use_image' === $item['item_thumbnail_type'] ) { ?>
					<div class="wpmozo_price_list_item_thumbnail">
						<?php if ( isset( $item['item_item_thumbnail']['url'] ) && ! empty( $item['item_item_thumbnail']['url'] ) ) { ?>
							<img decoding="async" src="<?php echo esc_attr( $item['item_item_thumbnail']['url'] ); ?>" alt="<?php echo esc_attr( $item['item_thumbnail_alt'] ); ?>">
						<?php } ?>
					</div>
				<?php } elseif ( 'use_icon' === $item['item_thumbnail_type'] ) { ?>
					<div class="wpmozo_price_list_item_icon wpmozo_list_icon <?php echo esc_attr( $icon_shape ); ?> <?php echo esc_html( $item['item_thumbnail_type'] ); ?>">
						<?php if ( 'use_hexagon' === $icon_shape ) { ?>
							<div class="hexagon_wrapper">
								<div class="hex">
									<div class="hexagon wpmozo_hexagon">
										<?php
										\Elementor\Icons_Manager::render_icon(
											$item['item_thumbnail_icon'],
											array(
												'aria-hidden' => 'true',
												'class' => 'wpmozo_price_list_icon wpmozo_icon wpmozo_hex',
											),
											'span'
										);
										?>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<?php
							\Elementor\Icons_Manager::render_icon(
								$item['item_thumbnail_icon'],
								array(
									'aria-hidden' => 'true',
									'class'       => 'wpmozo_price_list_icon wpmozo_icon',
								),
								'span'
							);
							?>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="wpmozo_price_list_item_details">
					<div class="wpmozo_price_list_item_title_wrap">
						<<?php echo esc_attr( $heading_level ); ?> class="wpmozo_price_list_item_title"><?php echo esc_html( $item['item_title'] ); ?></<?php echo esc_attr( $heading_level ); ?>>
						<div class="wpmozo_price_list_item_price_divider"></div>
						<div class="wpmozo_price_list_item_price_wrap"><span class="wpmozo_price_list_item_currency"><?php echo esc_html( $item['item_currency'] ); ?></span><span class="wpmozo_price_list_item_price"><?php echo esc_html( $item['item_price'] ); ?></span></div>
						<div class="wpmozo_price_list_item_price_period">
						<?php
						if ( '' !== $item['item_price_period'] ) {
							?>
							<span class="wpmozo_price_period_divider">/</span>
							<?php
							echo esc_html( $item['item_price_period'] );
						}
						?>
																																										</div>
					</div>
					<div class="wpmozo_price_list_item_description">
						<p><span><?php echo wp_kses_post( $item['item_content'] ); ?></p></span>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
