<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$this->add_render_attribute( 'swiper_layout_item' . $index, array( 'class' => array( 'wpmozo_wrapper', 'wpmozo_swiper_layout_item_' . $index, 'swiper-slide', 'wpmozo_advanced_blog_post_slide' ) ) );

$categories       = get_the_category();
$category_classes = '';

if ( ! empty( $categories ) ) {
	foreach ( $categories as $category ) {
		// Generate category class.
		$category_classes .= 'category-' . sanitize_html_class( $category->slug ) . ' ';
	}
}
?>
<div <?php $this->print_render_attribute_string( 'swiper_layout_item' . $index ); ?>>
	<article id="post-<?php echo esc_attr( get_the_ID() ); ?>" class="wpmozo_advanced_blog_slider_post post-<?php echo esc_attr( get_the_ID() ); ?> <?php echo esc_attr( trim( $category_classes ) ); ?>">
	<?php if ( 'yes' === $settings['show_thumbnail'] ) : ?>
			<?php
			$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), $featured_image_size );
			$thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
			$srcset        = wp_get_attachment_image_srcset( $thumbnail_id );
			if ( false !== $thumbnail_url ) {
				?>
				<div class="wpmozo_advanced_blog_slider_image_wrapper">
					<a href="<?php echo esc_attr( get_the_permalink() ); ?>" class="wpmozo_advanced_blog_slider_image_link">
						<img loading="lazy" decoding="async" src="<?php echo esc_url( $thumbnail_url ); ?>" class="wpmozo_advanced_blog_slider_post_image attachment-<?php echo esc_attr( $featured_image_size ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" srcset="<?php echo esc_attr( $srcset ); ?>">
					</a>
				</div>
			<?php } ?>
		<?php endif; ?>
		<!-- wpmozo_advanced_blog_slider_image_wrapper -->
		<div class="wpmozo_advanced_blog_slider_content_wrapper icon_<?php echo esc_attr( $settings['button_icon_placement'] ); ?>">
			<p class="wpmozo_advanced_blog_slider_meta">
				
				<?php if ( 'yes' === $settings['show_date'] ) : ?>
				<span class="published">
					<?php
					if ( $settings['post_date'] ) :
						echo date_i18n( $settings['post_date'], get_the_time( 'U' ) );
endif;
					?>
				</span>
				<?php endif; ?> 
				
				<?php
				if ( 'yes' === $settings['show_categories'] ) :
					if ( 'yes' === $settings['show_date'] && 'yes' === $settings['show_categories'] ) {
						?>
/<?php } ?> <span class="wpmozo_advanced_blog_slider_post_categories"><?php the_category( '  ' ); ?></span><?php endif; ?>
				
				<?php
				if ( 'yes' === $settings['show_author'] ) :
					if ( ( 'yes' === $settings['show_date'] || 'yes' === $settings['show_categories'] ) && 'yes' === $settings['show_author'] ) {
						?>
/<?php } ?> <span class="author">By <?php the_author_posts_link(); ?></span><?php endif; ?>
				
				<?php
				if ( 'yes' === $settings['show_comments'] ) :
					if ( ( 'yes' === $settings['show_date'] || 'yes' === $settings['show_categories'] || 'yes' === $settings['show_author'] ) && 'yes' === $settings['show_comments'] ) {
						?>
/<?php } ?> <span class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span><?php endif; ?>
			</p>
			<<?php echo esc_attr( $settings['heading_level'] ); ?> class="wpmozo_advanced_blog_slider_post_title"><a href="<?php echo esc_attr( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></<?php echo esc_attr( $settings['heading_level'] ); ?>>
			<div class="wpmozo_advanced_blog_slider_content">
				<?php if ( 'excerpt' === $settings['show_content'] ) { ?>
					<p><?php echo esc_html( wp_trim_words( get_the_content(), $settings['excerpt_length'] ) ); ?></p>
					<?php
				} else {
					echo get_the_content();
				}
				?>
			</div>
		<?php
		if ( 'yes' === $enable_read_more ) {

			?>
			<div class="wpmozo_readmore_button_wrapper">
				<a class="wpmozo_readmore_button" href="<?php echo esc_attr( get_the_permalink() ); ?>">
					<span class="wpmozo_button_text"><?php echo esc_html( $settings['read_more_text'] ); ?></span>
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
		<!-- wpmozo_advanced_blog_slider_content_wrapper -->
	</article>
</div>
<?php
