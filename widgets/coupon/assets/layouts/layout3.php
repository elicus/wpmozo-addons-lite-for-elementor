<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wpmozo_coupon_inner">

<?php if ( 'yes' === $show_offer_discount && ! empty( $offer_discount ) ) { ?>
	<div class="wpmozo_coupon_offer_wrapper wpmozo_offer_box">
		<?php if ( ! empty( $offer_discount ) ) { ?>
			<span class="wpmozo_coupon_offer_discount"><?php echo esc_html( $offer_discount ); ?></span>
		<?php } ?>
		<?php if ( ! empty( $offer_discount_label ) ) { ?>
			<span class="wpmozo_coupon_offer_label"><?php echo esc_html( $offer_discount_label ); ?></span>
		<?php } ?>
	</div>
<?php } ?>

<div class="wpmozo_coupon_content_wrapper">
	<?php if( '' !== $title ){ ?>
	<<?php echo esc_html( $title_heading_level ); ?> class="wpmozo_coupon_title">
		<?php echo esc_html( $title ); ?>
	</<?php echo esc_html( $title_heading_level ); ?>>
	<?php } ?>

	<?php if ( ! empty( $description ) ) { ?>
		<div class="wpmozo_coupon_description"><?php echo esc_html( $description ); ?></div>
	<?php } ?>

	<div class="wpmozo_coupon_code_wrapper">

		<?php if ( ! empty( $coupon_code ) ) { ?>
			<div class="wpmozo_coupon_code">
				<?php if ( 'yes' === ( $settings['copy_on_click'] ) ) { ?><span id="wpmozo_coupon_tooltip_<?php echo $this->get_id();?>">Copied!</span><?php } ?>
				<span class="wpmozo_coupon_code_text"><?php echo esc_html( $coupon_code ); ?></span>
			</div>
		<?php } ?>

		<?php if ( 'yes' === $show_expiry_date && ! empty( $expiry_text ) ) { ?>
			<div class="wpmozo_coupon_expiry_message <?php echo esc_attr( $expiry_class ); ?>">
				<?php echo esc_html( $expiry_text ); ?>
			</div>
		<?php } ?>

	</div>

</div>
</div>
<?php
