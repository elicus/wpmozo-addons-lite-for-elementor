<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="tile_scroll">
	<section class="tiles tiles--fixed">
		<div class="tiles__wrap">
			<?php 
				for ( $i = 0; $i < $repeat_count; $i++ ) : ?>
					<div class="tiles__line">
						<?php 
							$total_images = count( $images_items );
							$half         = ceil( $total_images / 2 ); // positive half, negative half
							$index        = 0;

							foreach ( $images_items as $item ) :
								// speed calculate for each image
								if ( $index < $half ) {
									$speed = $half - $index; // 3,2,1...
								} else {
									$speed = - ( $index - $half + 1 ); // -1,-2,-3...
								}
						?>
							<div class="tiles__line-img" 
								data-scroll 
								data-scroll-speed="<?php echo esc_attr( $speed ); ?>" 
								data-scroll-direction="horizontal"
								style="background-image:url(<?php echo esc_url( $item['url'] ); ?>)"></div>
						<?php 
							$index++;
							endforeach; 
						?>
					</div>
			<?php endfor; ?>
		</div>
	</section>
</div>



