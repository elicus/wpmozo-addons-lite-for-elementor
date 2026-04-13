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

	// Category Thumbnail (Featured Image).
	$thumbnail_id = get_term_meta( $term_id, 'wpmozo_category_thumbnail', true );
	$image_url    = '';

	if ( $thumbnail_id ) {
		$image_data = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		if ( ! empty( $image_data[0] ) ) {
			$image_url = $image_data[0];
		}
	}

	?>

	<div
		id="wpmozo_blog_category_<?php echo esc_attr( $term_id ); ?>"
		class="wpmozo_blog_category_item category_<?php echo esc_attr( $cat_slug ); ?>"
		<?php if ( ! empty( $image_url ) ) : ?>
			style="background-image: url('<?php echo esc_url( $image_url ); ?>');"
		<?php endif; ?>
	>
		<a href="<?php echo esc_url( $cat_link ); ?>" class="wpmozo_abs_link">
		<div class="wpmozo_blog_category_item_inner" href="<?php echo esc_url( $cat_link ); ?>">
			<div class="wpmozo_blog_category_content">

				<<?php echo esc_html( $title_heading_level ); ?>
					class="wpmozo_blog_category_name"
					id="<?php echo esc_attr( $cat_slug ); ?>">
					<?php echo esc_html( $cat_name ); ?>
					<?php
					if ( 'yes' === $settings['show_as_super_number'] ) {
						?>
						<span class="wpmozo_blog_category_count wpmozo_sup_number">(<?php echo esc_html( $cat_count ); ?>) </span><?php } ?>
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
