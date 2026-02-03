<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="dipl_coupon_inner">
	<div class="dipl_coupon_offer_wrapper dipl_offer_box">
	<?php if ( 'yes' === $show_offer_discount ) { ?><span class="dipl_coupon_offer_discount"><?php echo esc_html( $offer_discount ); ?></span> <span class="dipl_coupon_offer_label"><?php echo esc_html( $offer_discount_label ); ?></span><?php } ?>
	</div>
	<div class="dipl_coupon_content_wrapper">
		<<?php echo esc_html( $title_heading_level ); ?> class="dipl_coupon_title" id="the-great-indian-festival"><?php echo esc_html( $title ); ?> </<?php echo esc_html( $title_heading_level ); ?>>
		<div class="dipl_coupon_description"><?php echo esc_html( $description ); ?></div>
	</div>
	<div class="dipl_coupon_code_wrapper">
	<?php if ( 'yes' === $coupon_code ) { ?><div class="dipl_coupon_code"><span class="dipl_coupon_code_text"><?php echo esc_html( $coupon_code ); ?></span></div><?php } ?>
		<?php if ( 'yes' === $show_expiry_date ) { ?><div class="dipl_coupon_expiry_message date-active">Expires On 5 Feb, 2026</div><?php } ?>
	</div>
</div>
<?php
