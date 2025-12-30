<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="dipl_blog_categories_inner">

	<?php foreach ( $categories as $category ) :

		$cat_id    = $category->term_id;
		$cat_name  = $category->name;
		$cat_slug  = $category->slug;
		$cat_link  = get_term_link( $category );
		$cat_count = $category->count;

		// Category Thumbnail
		$thumbnail_id = get_term_meta( $cat_id, 'wpmozo_category_thumbnail', true );
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
			id="dipl_blog_category_<?php echo esc_attr( $cat_id ); ?>"
			class="dipl_blog_category_item category_<?php echo esc_attr( $cat_slug ); ?>"
		>
			<div class="dipl_blog_category_item_inner">

				<?php if ( ! empty( $image_html ) ) : ?>
					<div class="dipl_category_image_wrapper">
						<?php echo $image_html; ?>
					</div>
				<?php endif; ?>

				<div class="dipl_blog_category_content">
					<<?php echo esc_html( $title_heading_level ); ?>
						class="dipl_blog_category_name"
						id="<?php echo esc_attr( $cat_slug ); ?>">
						<?php echo esc_html( $cat_name ); ?>
					</<?php echo esc_html( $title_heading_level ); ?>>
				</div>

				<?php if ( 'yes' === $settings['show_post_count'] ) : ?>
					<span class="dipl_blog_category_count">
						<?php echo esc_html( $cat_count ); ?>
					</span>
				<?php endif; ?>

			</div>

			<a href="<?php echo esc_url( $cat_link ); ?>" class="dipl_abs_link">
				<?php echo esc_html( $cat_name ); ?>
			</a>
		</div>

	<?php endforeach; ?>

</div>
