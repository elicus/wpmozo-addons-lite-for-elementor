<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$this->add_render_attribute( 'swiper_layout_item' . $index, array( 'class' => array( 'wpmozo_wrapper', 'wpmozo_swiper_layout_item_' . $index, 'swiper-slide' ) ) );
		?>
		<div <?php $this->print_render_attribute_string( 'swiper_layout_item' . $index ); ?>>  
			<div class="wpmozo_ae_team_member_slide swiper-slide" role="group" >
				<div id="wpmozo_ae_team_member_<?php echo esc_attr( get_the_ID() ); ?>" class="wpmozo_ae_team_member_card" data-link="<?php echo esc_attr( get_the_permalink() ); ?>" data-link_target="<?php echo esc_attr( $link_target ); ?>">
					<div class="wpmozo_team_image_wrapper">
						<div class="wpmozo_ae_team_member_image">
							<?php the_post_thumbnail( 'full' ); ?>
						</div>
					</div>
					<div class="wpmozo_team_content_wrapper">
						<div class="wpmozo_ae_team_member_name">
							<<?php echo esc_attr( $name_text_heading_level ); ?> class="wpmozo_ae_team_member_name_heading" ><?php echo esc_html( get_the_title() ); ?></<?php echo esc_attr( $name_text_heading_level ); ?>>
						</div>
						<?php if ( 'yes' === $show_designation ) : ?>
						<div class="wpmozo_ae_team_member_designation">
							<<?php echo esc_attr( $designation_heading_level ); ?> class="wpmozo_ae_team_member_designation_heading"><?php echo esc_html( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_designation', true ) ); ?></<?php echo esc_attr( $designation_heading_level ); ?> class="wpmozo_ae_team_member_designation_heading">
						</div>
						<?php endif; ?>
						<?php if ( 'yes' === $show_description ) : ?>
						<div class="wpmozo_ae_team_member_short_desc">
							<p class="wpmozo_ae_team_member_short_desc_text"><?php echo esc_html( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_short_desc', true ) ); ?></p>
						</div>
						<?php endif; ?>
						<?php if ( 'yes' === $show_skills ) : ?>
						<div class="wpmozo_skill_bar_wrapper">
							<?php
								$skills           = get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_skills' );
								$skills_value     = get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_skills_value' );
								$skills_arr       = explode( ',', $skills[0] );
								$skills_value_arr = explode( ',', $skills_value[0] );
							foreach ( $skills_arr as $key => $value ) {
								?>
									<div class="wpmozo_skill_bar_wrapper_inner">
										<div class="wpmozo_skill_name"><?php echo esc_html( $skills_arr[ $key ] ); ?></div>
										<div class="wpmozo_empty_bar">
											<div class="wpmozo_filled_bar" data-skill="<?php echo esc_attr( $skills_value_arr[ $key ] ); ?>%" style="width: <?php echo esc_attr( $skills_value_arr[ $key ] ); ?>%"></div>
										</div>
									</div>
								<?php
							}
							?>
						</div>
						<?php endif; ?>
						<?php if ( 'yes' === $show_social_icon ) : ?>
						<div class="wpmozo_team_social_wrapper">
								<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_website', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">    
									<i class="wpmozo_ae_team_member_social_icon fa-solid fa-globe"></i> 
								</a>
								<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_facebook', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">    
									<i class="wpmozo_ae_team_member_social_icon fa-brands fa-facebook-f"></i>
								</a>
								<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_twitter', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<i class="wpmozo_ae_team_member_social_icon  fa-brands fa-x-twitter"></i>                                
								</a>
								<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_linkedin', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">                               
									<i class="wpmozo_ae_team_member_social_icon fa-brands fa-linkedin-in"></i>
								</a>
								<?php if ( '' !== $settings['icon_background_color'] || '' !== $settings['icon_color'] ) { ?>
									<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_instagram', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">                                
										<i class="wpmozo_ae_team_member_social_icon fa-brands fa-instagram with_bg"></i>
									</a>
								<?php } else { ?>
									<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_instagram', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">                                
										<i class="wpmozo_ae_team_member_social_icon fa-brands fa-instagram"></i>
									</a>
								<?php } ?>
								<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_youtube', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<i class="wpmozo_ae_team_member_social_icon fa-brands fa-youtube"></i>
								</a>
								<a href="mailto:<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_email', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<i class="wpmozo_ae_team_member_social_icon fa-solid fa-envelope"></i>
								</a>
								<a href="tel:<?php echo esc_url( get_post_meta( get_the_ID(), 'wpmozo_ae_team_member_phone', true ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<i class="wpmozo_ae_team_member_social_icon fa-solid fa-phone"></i>
								</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
