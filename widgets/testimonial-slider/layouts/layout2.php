<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The Template for displaying Layout 2
 *
 * This template can be overridden by copying it to yourtheme/wpmozo-ae-for-elementor/layouts/testimonial-slider/layout2.php
 *
 * HOWEVER, on occasion wpmozo-ae-for-elementor will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen.
 *
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.0
 */
?>
<div id="wpmozo_single_testimonial_<?php echo esc_attr( $testimonial_id ); ?>" class="wpmozo_single_testimonial_card">
	<?php 
		/* Get Author Image */
		if ( 'yes' === $show_author_image ) {
			if ( has_post_thumbnail( $testimonial_id ) ) {
				?> 
					<div class="wpmozo_testimonial_author_image"> <?php echo get_the_post_thumbnail( $testimonial_id, $author_image_size ); ?> </div> 
				<?php
			} elseif ( 'yes' === $use_gravatar ) {
				$author_email = sanitize_email( get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_email', true ) );
				if ( '' !== $author_email ) {
					$image = get_avatar( $author_email, '100' );
					if ( ! $image ) {
						?> 
						<div class="wpmozo_testimonial_author_image"> <img src="<?php echo esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) ; ?> " class="wpmozo_testimonial_mystery_person" alt="Mystery Person" /></div>
						<?php
					}
				} else {
					?> 
						<div class="wpmozo_testimonial_author_image"> <img src="<?php echo esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) ; ?>" class="wpmozo_testimonial_mystery_person" alt="Mystery Person" /></div>
					<?php
				}
			} else {
				?> 
					<div class="wpmozo_testimonial_author_image"> <img src="<?php echo  esc_url( plugins_url( 'assets/mystery-person.jpg', dirname( __DIR__ ) ) ) ; ?>" class="wpmozo_testimonial_mystery_person" alt="Mystery Person" /></div>
				<?php
			}
		} 
	?>
	<div class="wpmozo_testimonial_desc">
		<?php if ( 'yes' === $show_opening_quote_icon ): ?>
			<span class="wpmozo_testimonial_quote_icon wpmozo_testimonial_opening_quote_icon eicon-editor-quote"></span>
		<?php endif; ?>
		<?php echo apply_filters( 'the_content', do_shortcode( get_the_content( null, false, $testimonial_id ) ) ); ?>
		<?php if ( 'yes' === $show_closing_quote_icon ): ?>
			<span class="wpmozo_testimonial_quote_icon wpmozo_testimonial_closing_quote_icon eicon-editor-quote"></span>
		<?php endif; ?>
	</div>
	<?php 
		$rating = floatval( get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_rating', true ) );
		if ( 'yes' === $show_rating && $rating > 0 ) {
			?>
			<div class="wpmozo_testimonial_rating">
				<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
				<span class="wpmozo_testimonial_rating_value" itemprop="ratingValue"><?php echo  esc_html( $rating ); ?></span>
					<?php
						for ( $i = 1; $i <= absint( $rating ); $i++ ) {
							?> <span class="wpmozo_testimonial_star wpmozo_testimonial_filled_star"></span> <?php
						}
						if ( $rating != absint( $rating ) ) {
							?> <span class="wpmozo_testimonial_star wpmozo_testimonial_half_filled_star"></span> <?php
							$unfilled_stars  = 5 - absint( $rating ) - 1;
						} else {
							$unfilled_stars  = 5 - absint( $rating );
						}
						for ( $i = 1; $i <= $unfilled_stars; $i++ ) {
							?> <span class="wpmozo_testimonial_star wpmozo_testimonial_empty_star"></span> <?php
						}
					?>
				</span>
			</div>
			<?php
		}
	?>
	<div class="wpmozo_testimonial_meta">
		<div class="wpmozo_testimonial_author_details">
			<?php
				/* Get Author Name */
				$name = get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_name', true );
				if ( '' !== $name ) {
					?><div class="wpmozo_testimonial_author_name"><?php echo esc_html( $name ) ; ?></div>
					<?php
				} 
			?>
			<?php
				/* Get Author Designation */
				if ( 'yes' === $show_author_designation ) {
					$designation = get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_designation', true );
					if ( '' !== $designation ) {
						?> <div class="wpmozo_testimonial_author_designation"><?php echo esc_html( $designation ) ;?></div>
						<?php
					}
				} 
			?>
			<?php
				/* Get Company Details */
				if ( 'yes' === $show_author_company_name ) {
					$company_name = get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_company', true );
					$company_url  = get_post_meta( $testimonial_id, 'wpmozo_ae_testimonial_author_company_url', true );
					if ( '' !== $company_url && '' !== $company_name ) { ?>
						<div class="wpmozo_testimonial_author_company">
							<a href="<?php echo esc_url( $company_url ) ; ?>" target="_blank" rel="nofollow"><?php echo esc_html( $company_name ); ?></a>
						</div>
					<?php } elseif ( '' !== $company_name ) {
						?>
							<div class="wpmozo_testimonial_author_company"><?php echo esc_html( $company_name ); ?></div>
						<?php
					}
				}
			?>
		</div>
	</div>
</div>
