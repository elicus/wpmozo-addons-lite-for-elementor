<?php
/**
 * Plugin Name: WPMozo Addons Lite for Elementor
 * Plugin URI: https://wpmozo.com
 * Description: WPMozo Addons Lite for Elementor is a premium multipurpose plugin that comes with multiple
 * exceptional widgets. Using these unique and powerful widgets, you'll be able to create different web
 * page elements that would increase your site's functionality as well as appearance.
 * Version: 1.0.0
 * Author: Elicus
 * Author URI: https://elicus.com/
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wpmozo-addons-lite-for-elementor
 * Domain Path: /languages
 * Requires at least: 5.3
 * Tested up to: 6.4.3
 * Elementor tested up to: 3.16.6
 * Elementor Pro tested up : 3.16.6
 *
 * WPMozo Addons Lite for Elementor - A plugin for WordPress and Elementor.
 * Copyright © 2024 Elicus Technologies Private Limited
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/.>
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_SLUG', 'wpmozo-addons-lite-for-elementor' );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION', '1.0.0' );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME', plugin_basename( __FILE__ ) );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION', 'wpmozo-addons-lite-for-elementor' );

/**
 * Admin notice
 *
 * Warning when the site doesn't have Elementor installed or activated.
 *
 * @since 1.0.0
 */
function wpmozo_addons_lite_for_elementor_admin_notice_missing_elementor() {
	echo wp_kses_post(
		'
        <div class="notice notice-warning is-dismissible">
            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>Elementor</strong> to be installed and activated.', 'wpmozo-addons-lite-for-elementor' ) . '
            </p>
        </div>'
	);

	deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
}

/**
 * Admin notice
 *
 * Warning when the site doesn't have a minimum required Elementor version.
 *
 * @since 1.0.0
 */
function wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version() {
	echo wp_kses_post(
		'
        <div class="notice notice-warning is-dismissible">
            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>Elementor</strong> version 2.0 or greater.', 'wpmozo-addons-lite-for-elementor' ) . '
            </p>
        </div>'
	);

	deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
}

/**
 * Admin notice
 *
 * Warning when the site doesn't have a minimum required PHP version.
 *
 * @since 1.0.0
 */
function wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version() {

	echo wp_kses_post(
		'
        <div class="notice notice-warning is-dismissible">
            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>PHP</strong> version 5.6 or greater.', 'wpmozo-addons-lite-for-elementor' ) . '
            </p>
        </div>'
	);

	deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
}

// Check for Elementor plugin.
if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_missing_elementor' );
	return;
}

// Check for required Elementor version.
if ( ! version_compare( ELEMENTOR_VERSION, '2.0', '>=' ) ) {
	add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version' );
	return;
}

// Check for required PHP version.
if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
	add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version' );
	return;
}

require_once WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH . 'includes/class-wpmozo-addons-lite-for-elementor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function wpmozo_addons_lite_for_elementor() {

	$plugin = new WPMOZO_Addons_Lite_For_Elementor();
	$plugin->run();

}
wpmozo_addons_lite_for_elementor();

function wpmozo_ale_register_post_types() {

	$labels = array(
		'name'                  => esc_html__( 'WPMozo ALE Team Members', 'wpmozo-addons-for-elementor' ),
		'singular_name'         => esc_html__( 'WPMozo ALE Team Member', 'wpmozo-addons-for-elementor' ),
		'menu_name'             => esc_html__( 'WPMozo ALE Team Members', 'wpmozo-addons-for-elementor' ),
		'add_new'               => esc_html__( 'Add New', 'wpmozo-addons-for-elementor' ),
		'add_new_item'          => esc_html__( 'Add New Member', 'wpmozo-addons-for-elementor' ),
		'edit_item'             => esc_html__( 'Edit Member', 'wpmozo-addons-for-elementor' ),
		'new_item'              => esc_html__( 'New Member', 'wpmozo-addons-for-elementor' ),
		'view_item'             => esc_html__( 'View Member', 'wpmozo-addons-for-elementor' ),
		'all_items'             => esc_html__( 'All Members', 'wpmozo-addons-for-elementor' ),
		'search_items'          => esc_html__( 'Search Members', 'wpmozo-addons-for-elementor' ),
		'not_found'             => esc_html__( 'No member found', 'wpmozo-addons-for-elementor' ),
		'not_found_in_trash'    => esc_html__( 'No members found in Trash', 'wpmozo-addons-for-elementor' ),
		'featured_image'        => esc_html__( 'Team Member Image', 'wpmozo-addons-for-elementor' ),
		'set_featured_image'    => esc_html__( 'Set team member image', 'wpmozo-addons-for-elementor' ),
		'remove_featured_image' => esc_html__( 'Remove team member image', 'wpmozo-addons-for-elementor' ),
		'use_featured_image'    => esc_html__( 'Use as team member image', 'wpmozo-addons-for-elementor' ),
		'parent_item_colon'     => esc_html__( 'Parent Member:', 'wpmozo-addons-for-elementor' ),
	);

	$args = array(
		'labels'            => $labels,
		'description'       => esc_html__( 'WPMozo ALE Team Members Custom Post', 'wpmozo-addons-for-elementor' ),
		'public'            => true,
		'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
		'taxonomies'        => array( 'wpmozo-ale-team-member-category' ),
		'hierarchical'      => false,
		'menu_position'     => 20,
		'menu_icon'         => 'dashicons-admin-users',
		'show_ui'           => true,
		'show_in_menu'      => true,
		'show_in_nav_menus' => true,
		'has_archive'       => true,
		'query_var'         => true,
		'capability_type'   => 'post',
	);

	/*
	// Uncomment in future versions.
	if ( $this->wpmozo_is_team_enabled() ) {
	register_post_type( 'wpmozo-alteam-member', $args );
	}
	*/
	register_post_type( 'wpmozo-alteam-member', $args );

}

function wpmozo_ale_register_taxonomies() {
	$labels = array(
		'name'                       => esc_html_x( 'Categories', 'Taxonomy General Name', 'wpmozo-addons-for-elementor' ),
		'singular_name'              => esc_html_x( 'Category', 'Taxonomy Singular Name', 'wpmozo-addons-for-elementor' ),
		'menu_name'                  => esc_html__( 'Categories', 'wpmozo-addons-for-elementor' ),
		'all_items'                  => esc_html__( 'All Team Member Categories', 'wpmozo-addons-for-elementor' ),
		'parent_item'                => esc_html__( 'Parent Team Member Category', 'wpmozo-addons-for-elementor' ),
		'parent_item_colon'          => esc_html__( 'Parent Team Member Category:', 'wpmozo-addons-for-elementor' ),
		'new_item_name'              => esc_html__( 'New Team Member Category Name', 'wpmozo-addons-for-elementor' ),
		'add_new_item'               => esc_html__( 'Add New Team Member Category', 'wpmozo-addons-for-elementor' ),
		'edit_item'                  => esc_html__( 'Edit Team Member Category', 'wpmozo-addons-for-elementor' ),
		'update_item'                => esc_html__( 'Update Team Member Category', 'wpmozo-addons-for-elementor' ),
		'view_item'                  => esc_html__( 'View Team Member Category', 'wpmozo-addons-for-elementor' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'wpmozo-addons-for-elementor' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'wpmozo-addons-for-elementor' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'wpmozo-addons-for-elementor' ),
		'popular_items'              => esc_html__( 'Popular Team Member Categories', 'wpmozo-addons-for-elementor' ),
		'search_items'               => esc_html__( 'Search Team Member Categories', 'wpmozo-addons-for-elementor' ),
		'not_found'                  => esc_html__( 'Not Found', 'wpmozo-addons-for-elementor' ),
		'no_terms'                   => esc_html__( 'No Team Member Categories', 'wpmozo-addons-for-elementor' ),
		'items_list'                 => esc_html__( 'Team Member Categories list', 'wpmozo-addons-for-elementor' ),
		'items_list_navigation'      => esc_html__( 'Team Member Categories list navigation', 'wpmozo-addons-for-elementor' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);

	/*
	// Uncomment in future versions.
	if ( $this->wpmozo_is_team_enabled() ) {
	register_taxonomy( 'wpmozo-ale-team-member-category', array( 'wpmozo-alteam-member' ), $args );
	}
	*/

	register_taxonomy( 'wpmozo-ale-team-member-category', array( 'wpmozo-alteam-member' ), $args );

}




add_action( 'init', 'wpmozo_ale_register_post_types' );
add_action( 'init', 'wpmozo_ale_register_taxonomies' );




function wpmozo_ale_team_member_metabox_callback( $post ) {
	$values       = get_post_custom( $post->ID );
	$short_desc   = isset( $values['wpmozo_ale_team_member_short_desc'] ) ? $values['wpmozo_ale_team_member_short_desc'][0] : '';
	$designation  = isset( $values['wpmozo_ale_team_member_designation'] ) ? $values['wpmozo_ale_team_member_designation'][0] : '';
	$website_url  = isset( $values['wpmozo_ale_team_member_website'] ) ? $values['wpmozo_ale_team_member_website'][0] : '';
	$linkedin     = isset( $values['wpmozo_ale_team_member_linkedin'] ) ? $values['wpmozo_ale_team_member_linkedin'][0] : '';
	$facebook     = isset( $values['wpmozo_ale_team_member_facebook'] ) ? $values['wpmozo_ale_team_member_facebook'][0] : '';
	$twitter      = isset( $values['wpmozo_ale_team_member_twitter'] ) ? $values['wpmozo_ale_team_member_twitter'][0] : '';
	$instagram    = isset( $values['wpmozo_ale_team_member_instagram'] ) ? $values['wpmozo_ale_team_member_instagram'][0] : '';
	$youtube      = isset( $values['wpmozo_ale_team_member_youtube'] ) ? $values['wpmozo_ale_team_member_youtube'][0] : '';
	$email        = isset( $values['wpmozo_ale_team_member_email'] ) ? $values['wpmozo_ale_team_member_email'][0] : '';
	$phone        = isset( $values['wpmozo_ale_team_member_phone'] ) ? $values['wpmozo_ale_team_member_phone'][0] : '';
	$skills       = isset( $values['wpmozo_ale_team_member_skills'] ) ? $values['wpmozo_ale_team_member_skills'][0] : '';
	$skills_value = isset( $values['wpmozo_ale_team_member_skills_value'] ) ? $values['wpmozo_ale_team_member_skills_value'][0] : '';

	wp_nonce_field( 'wpmozo_metaboxes_nonce', 'wpmozo_ale_team_member_metabox_nonce' );

	$allowed_html = array(
		'p'      => array(
			'id'    => array(),
			'class' => array(),
		),
		'ul'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'ol'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'li'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'span'   => array(
			'id'    => array(),
			'class' => array(),
		),
		'strong' => array(
			'id'    => array(),
			'class' => array(),
		),
		'b'      => array(
			'id'    => array(),
			'class' => array(),
		),
		'a'      => array(
			'href'  => array(),
			'id'    => array(),
			'class' => array(),
		),
		'br'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h1'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h2'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h3'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h4'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h5'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h6'     => array(
			'id'    => array(),
			'class' => array(),
		),
	);

	?>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_short_desc">
			<?php esc_html_e( 'Short Description', 'divi-plus' ); ?>
		</label>
		<textarea type="text" name="wpmozo_ale_team_member_short_desc" id="wpmozo_ale_team_member_short_desc"><?php echo wp_kses( $short_desc, $allowed_html ); ?></textarea>
		<span class="info"><?php echo esc_html__( 'Support for few HTML tags like h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,b,a,br', 'divi-plus' ); ?></span>
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_designation">
			<?php esc_html_e( 'Designation', 'divi-plus' ); ?>
		</label>
		<input type="text" name="wpmozo_ale_team_member_designation" id="wpmozo_ale_team_member_designation" value="<?php echo esc_attr( $designation ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_email">
			<?php esc_html_e( 'Email Address', 'divi-plus' ); ?>
		</label>
		<input type="email" name="wpmozo_ale_team_member_email" id="wpmozo_ale_team_member_email" value="<?php echo esc_attr( $email ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_phone">
			<?php esc_html_e( 'Phone Number', 'divi-plus' ); ?>
		</label>
		<input type="tel" name="wpmozo_ale_team_member_phone" id="wpmozo_ale_team_member_phone" value="<?php echo esc_attr( $phone ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_website">
			<?php esc_html_e( 'Website Url', 'divi-plus' ); ?>
		</label>
		<input type="url" name="wpmozo_ale_team_member_website" id="wpmozo_ale_team_member_website" value="<?php echo esc_attr( $website_url ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_facebook">
			<?php esc_html_e( 'Facebook Url', 'divi-plus' ); ?>
		</label>
		<input type="url" name="wpmozo_ale_team_member_facebook" id="wpmozo_ale_team_member_facebook" value="<?php echo esc_attr( $facebook ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_twitter">
			<?php esc_html_e( 'Twitter Url', 'divi-plus' ); ?>
		</label>
		<input type="url" name="wpmozo_ale_team_member_twitter" id="wpmozo_ale_team_member_twitter" value="<?php echo esc_attr( $twitter ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_linkedin">
			<?php esc_html_e( 'Linkedin Url', 'divi-plus' ); ?>
		</label>
		<input type="url" name="wpmozo_ale_team_member_linkedin" id="wpmozo_ale_team_member_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_instagram">
			<?php esc_html_e( 'Instagram Url', 'divi-plus' ); ?>
		</label>
		<input type="url" name="wpmozo_ale_team_member_instagram" id="wpmozo_ale_team_member_instagram" value="<?php echo esc_attr( $instagram ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_youtube">
			<?php esc_html_e( 'Youtube Url', 'divi-plus' ); ?>
		</label>
		<input type="url" name="wpmozo_ale_team_member_youtube" id="wpmozo_ale_team_member_youtube" value="<?php echo esc_attr( $youtube ); ?>" />
	</div>
	<div class="wpmozo_meta_fields">
		<label for="wpmozo_ale_team_member_youtube">
			<?php esc_html_e( 'Skills', 'divi-plus' ); ?>
		</label>
		<div class="wpmozo_repeator_meta_fields">
			<input type="hidden" id="wpmozo_ale_team_member_skills" name="wpmozo_ale_team_member_skills" value="<?php echo esc_attr( $skills ); ?>" />
			<input type="hidden" id="wpmozo_ale_team_member_skills_value" name="wpmozo_ale_team_member_skills_value" value="<?php echo esc_attr( $skills_value ); ?>" />
			<?php
				$skills           = explode( ',', $skills );
				$skills_value     = explode( ',', $skills_value );
				$number_of_skills = count( $skills );
			if ( is_array( $skills ) && ! empty( array_filter( $skills ) ) ) {
				if ( $number_of_skills > 1 ) {
					$row_control = '<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_remove_row">-</span>';
				} else {
					$row_control = '';
				}
				for ( $i = 0; $i < $number_of_skills; $i++ ) {
					$skill_value = array_key_exists( $i, $skills_value ) ? absint( $skills_value[ $i ] ) : 100;
					?>
					<div class="wpmozo_repeator_meta_field_row">
						<div class="wpmozo_repeator_meta_field">
							<input type="text" class="wpmozo_ale_team_member_skills" value="<?php echo esc_attr( $skills[ $i ] ); ?>" placeholder="Skill" />
							<input type="number" class="wpmozo_ale_team_member_skills_value" value="<?php echo esc_attr( $skill_value ); ?>" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100"/>
						</div>
						<p class="wpmozo_repeator_meta_field_row_controls">
							<?php echo wp_kses_post( $row_control ); ?>
							<?php
							if ( ( $number_of_skills - 1 ) === $i ) {
								?>
								<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_add_row">+</span>
								<?php
							}
							?>
						</p>
					</div>
					<?php
				}
			} else {
				?>
				<div class="wpmozo_repeator_meta_field_row">
					<div class="wpmozo_repeator_meta_field">
						<input type="text" class="wpmozo_ale_team_member_skills" placeholder="Skill" />
						<input type="number" class="wpmozo_ale_team_member_skills_value" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100" />
					</div>
					<p class="wpmozo_repeator_meta_field_row_controls">
						<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_add_row">+</span>
					</p>
				</div>
				<?php
			}
			?>
		</div> 
	</div>
	<?php
}

function wpmozo_ale_save_team_member_meta_fields( $post_id ) {
	// doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// verify nonce.
	if ( ! isset( $_POST['wpmozo_ale_team_member_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['wpmozo_ale_team_member_metabox_nonce'] ) ), 'wpmozo_metaboxes_nonce' ) ) {
		return;
	}

	// if current user can not edit the post.
	if ( ! current_user_can( 'edit_posts', $post_id ) ) {
		return;
	}

	$fields = array(
		'wpmozo_ale_team_member_short_desc',
		'wpmozo_ale_team_member_designation',
		'wpmozo_ale_team_member_website',
		'wpmozo_ale_team_member_linkedin',
		'wpmozo_ale_team_member_facebook',
		'wpmozo_ale_team_member_twitter',
		'wpmozo_ale_team_member_instagram',
		'wpmozo_ale_team_member_youtube',
		'wpmozo_ale_team_member_email',
		'wpmozo_ale_team_member_skills',
		'wpmozo_ale_team_member_skills_value',
		'wpmozo_ale_team_member_phone',
	);

	$allowed_html = array(
		'p'      => array(
			'id'    => array(),
			'class' => array(),
		),
		'ul'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'ol'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'li'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'span'   => array(
			'id'    => array(),
			'class' => array(),
		),
		'strong' => array(
			'id'    => array(),
			'class' => array(),
		),
		'b'      => array(
			'id'    => array(),
			'class' => array(),
		),
		'a'      => array(
			'href'  => array(),
			'id'    => array(),
			'class' => array(),
		),
		'br'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h1'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h2'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h3'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h4'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h5'     => array(
			'id'    => array(),
			'class' => array(),
		),
		'h6'     => array(
			'id'    => array(),
			'class' => array(),
		),
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			if ( 'wpmozo_ale_team_member_short_desc' === $field ) {
				${$field} = wp_kses( wp_unslash( $_POST[ $field ] ), $allowed_html );
			} else {
				${$field} = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			}
			update_post_meta( $post_id, $field, ${$field} );
		}
	}
}




// Hook to add meta box.
add_action( 'add_meta_boxes', 'wpmozo_ale_add_team_member_metabox' );

/** Callback function to render the meta box. **/
function wpmozo_ale_add_team_member_metabox() {
	add_meta_box(
		'wpmozo_ale_team_member_metabox',
		'<img class="wpmozo_ale_meta_image" src="' . plugin_dir_url( __FILE__ ) . 'assets/images/wpmozo-logo.png" />Team Member Information',
		'wpmozo_ale_team_member_metabox_callback',
		'wpmozo-alteam-member', // Replace 'your_custom_post_type' with the actual name of your custom post type.
		'normal',
		'default'
	);
}
/*Hook to save meta box data.*/
add_action( 'save_post', 'wpmozo_ale_save_team_member_meta_fields' );

function wpmozo_ale_enqueue_custom_script_for_post_edit() {
	global $pagenow, $typenow;

	// Check if we are on the post edit or add screen for your custom post type.
	if ( 'wpmozo-alteam-member' == is_admin() && ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) && $typenow ) {
		/*
		// Uncomment in future versions.
		Enqueue your custom script
		wp_enqueue_script('my-admin-script', get_template_directory_uri() . '/js/my-admin.js', array('jquery'), '1.0', true);
		*/
		wp_enqueue_script( 'wpmozo-ale-team-slider-admin-js', plugin_dir_url( __FILE__ ) . 'assets/js/admin.min.js', array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
	}
}

add_action( 'admin_enqueue_scripts', 'wpmozo_ale_enqueue_custom_script_for_post_edit' );

function wpmozo_ale_enqueue_custom_style_for_post_edit() {
	global $pagenow, $typenow;

	// Check if we are on the post edit or add screen for your custom post type.
	if ( 'wpmozo-alteam-member' == is_admin() && ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) && $typenow ) {
		// Enqueue your custom style.
		wp_enqueue_style( 'wpmozo-ale-team-slider-admin-css', plugin_dir_url( __FILE__ ) . 'assets/css/admin.min.css', null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
	}
}

add_action( 'admin_enqueue_scripts', 'wpmozo_ale_enqueue_custom_style_for_post_edit' );
