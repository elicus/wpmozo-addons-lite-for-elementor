<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="wpmozo_blog_categories_inner">

	<?php
	foreach ( $categories as $category ) :

		$term_id   = $category->term_id;
		$cat_name  = $category->name;
		$cat_slug  = $category->slug;
		$cat_link  = get_term_link( $category );
		$cat_count = $category->count;

		// Category Thumbnail.
		$thumbnail_id = get_term_meta( $term_id, $term_key, true );
		$image_html   = '';

		if ( $thumbnail_id ) {
			$image_html = wp_get_attachment_image(
				$thumbnail_id,
				'full',
				false,
				array(
					'class' => 'attachment-full size-full',
					'alt'   => esc_attr( $cat_name ),
				)
			);
		}
		?>

		<div
			id="wpmozo_blog_category_<?php echo esc_attr( $term_id ); ?>"
			class="wpmozo_blog_category_item category_<?php echo esc_attr( $cat_slug ); ?>"
		>
			<a href="<?php echo esc_url( $cat_link ); ?>" class="wpmozo_abs_link">
			<div class="wpmozo_blog_category_item_inner">
				<div class="wpmozo_blog_category_content">

					<?php if ( ! empty( $image_html ) ) : ?>
						<div class="wpmozo_category_image_wrapper">
							<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo $image_html;
							?>
						</div>
					<?php endif; ?>

					<<?php echo esc_html( $title_heading_level ); ?>
						class="wpmozo_blog_category_name"
						id="<?php echo esc_attr( $cat_slug ); ?>">
						<?php echo esc_html( $cat_name ); ?>
						<?php if ( 'yes' === $settings['show_as_super_number'] ) { ?>
							<span class="wpmozo_blog_category_count wpmozo_sup_number">
								(<?php echo esc_html( $cat_count ); ?>)
							</span>
						<?php } ?>
					</<?php echo esc_html( $title_heading_level ); ?>>

					<?php if ( 'yes' === $settings['show_post_count'] ) : ?>
						<div class="wpmozo_blog_category_count_wrap">
						<?php
						if ( ! empty( $settings['post_count_text'] ) && 'yes' !== $settings['show_as_super_number'] ) {
							?>
								<span class="wpmozo_blog_category_count">
									<?php
									echo esc_html( $cat_count );
									echo ' ' . esc_html( $settings['post_count_text'] );
									?>
								</span>
							<?php } ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
			</a>

		</div>

	<?php endforeach; ?>

</div>
<?php