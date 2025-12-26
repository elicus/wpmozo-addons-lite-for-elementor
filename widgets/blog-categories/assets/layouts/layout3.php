<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div id="dipl_blog_category_<?php echo esc_attr( $cat_id ); ?>" class="dipl_blog_category_item category_<?php echo esc_attr( $cat_slug ); ?>" <?php echo $style_attr; ?> >
	<div class="dipl_blog_category_item_inner">
		<div class="dipl_blog_category_content">
			<h3 class="dipl_blog_category_name" id="<?php echo esc_attr( $cat_slug ); ?>">
				<?php echo esc_html( $cat_name ); ?>
			</h3>

			<div class="dipl_blog_category_count_wrap">
				<span class="dipl_blog_category_count">
					<?php echo esc_html( $cat_count ); ?> Articles
				</span>
			</div>
		</div>
	</div>

	<a href="<?php echo esc_url( $cat_link ); ?>" class="dipl_abs_link">
		<?php echo esc_html( $cat_name ); ?>
	</a>
</div>
<?php
