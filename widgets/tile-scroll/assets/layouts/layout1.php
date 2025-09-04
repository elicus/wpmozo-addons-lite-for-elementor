<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div id="tile_scroll" class="loading">
	<div data-scroll-container>
		<section class="tiles tiles--rotated" id="grid2">
			<div class="tiles__wrap">
				<?php 
				for ( $i = 0; $i < $repeat_count; $i++ ) :
					// even = 10, odd = -10
					$speed = ( $i % 2 === 0 ) ? $scroll_speed : -$scroll_speed;
				?>
					<div class="tiles__line" 
						data-scroll 
						data-scroll-speed="<?php echo esc_attr( $speed ); ?>" 
						data-scroll-target="#grid2" 
						data-scroll-direction="horizontal">

						<?php foreach ( $images_items as $item ) : ?>
							<div class="tiles__line-img" 
								style="background-image:url(<?php echo esc_url( $item['url'] ); ?>)">
							</div>
						<?php endforeach; ?>
					</div>
				<?php endfor; ?>
			</div>
		</section>
	</div>
</div>
