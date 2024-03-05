<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 * @author     Elicus <hello@elicus.com>
 * @copyright  2024 Elicus Technologies Private Limited
 */
class WPMOZO_Addons_Lite_For_Elementor_Admin {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $plugin_version;

	/**
	 * Plugin Basename.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $plugin_basename;

	/**
	 * Plugin Option.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $plugin_option;

	/**
	 * Plugin option page hook.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $hook_suffix;

	/**
	 * Metadata Url.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $metadata_url;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->plugin_name     = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_SLUG;
		$this->plugin_version  = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION;
		$this->plugin_option   = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION;
		$this->plugin_basename = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME;
		$this->metadata_url    = 'https://cdn.wpmozo.com';
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $hook_suffix ) {

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/admin.min.css', array(), $this->plugin_version );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook_suffix ) {

			$nonce = wp_create_nonce( $this->plugin_name . '-admin-nonce' );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/admin.min.js', array( 'jquery' ), $this->plugin_version, false );
			wp_localize_script(
				$this->plugin_name,
				'admin_ajax_object',
				array(
					'ajaxurl'    => admin_url( 'admin-ajax.php' ),
					'ajax_nonce' => $nonce,
				)
			);

	}

	public function wpmozo_register_post_types() {

		$labels = array(
			'name'                  => esc_html__( 'WPMozo Team Members', 'wpmozo-addons-for-elementor' ),
			'singular_name'         => esc_html__( 'WPMozo Team Member', 'wpmozo-addons-for-elementor' ),
			'menu_name'             => esc_html__( 'WPMozo Team Members', 'wpmozo-addons-for-elementor' ),
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
			'description'       => esc_html__( 'WPMozo Team Members Custom Post', 'wpmozo-addons-for-elementor' ),
			'public'            => true,
			'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
			'taxonomies'        => array( 'wpmozo-ae-team-member-category' ),
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

		register_post_type( 'wpmozoae-team-member', $args );
	}
	public function wpmozo_register_taxonomies() {
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

		register_taxonomy( 'wpmozo-ae-team-member-category', array( 'wpmozoae-team-member' ), $args );

	}
	public function wpmozo_ae_team_member_metabox_callback( $post ) {
		$values       = get_post_custom( $post->ID );
		$short_desc   = isset( $values['wpmozo_ae_team_member_short_desc'] ) ? $values['wpmozo_ae_team_member_short_desc'][0] : '';
		$designation  = isset( $values['wpmozo_ae_team_member_designation'] ) ? $values['wpmozo_ae_team_member_designation'][0] : '';
		$website_url  = isset( $values['wpmozo_ae_team_member_website'] ) ? $values['wpmozo_ae_team_member_website'][0] : '';
		$linkedin     = isset( $values['wpmozo_ae_team_member_linkedin'] ) ? $values['wpmozo_ae_team_member_linkedin'][0] : '';
		$facebook     = isset( $values['wpmozo_ae_team_member_facebook'] ) ? $values['wpmozo_ae_team_member_facebook'][0] : '';
		$twitter      = isset( $values['wpmozo_ae_team_member_twitter'] ) ? $values['wpmozo_ae_team_member_twitter'][0] : '';
		$instagram    = isset( $values['wpmozo_ae_team_member_instagram'] ) ? $values['wpmozo_ae_team_member_instagram'][0] : '';
		$youtube      = isset( $values['wpmozo_ae_team_member_youtube'] ) ? $values['wpmozo_ae_team_member_youtube'][0] : '';
		$email        = isset( $values['wpmozo_ae_team_member_email'] ) ? $values['wpmozo_ae_team_member_email'][0] : '';
		$phone        = isset( $values['wpmozo_ae_team_member_phone'] ) ? $values['wpmozo_ae_team_member_phone'][0] : '';
		$skills       = isset( $values['wpmozo_ae_team_member_skills'] ) ? $values['wpmozo_ae_team_member_skills'][0] : '';
		$skills_value = isset( $values['wpmozo_ae_team_member_skills_value'] ) ? $values['wpmozo_ae_team_member_skills_value'][0] : '';

		wp_nonce_field( 'wpmozo_metaboxes_nonce', 'wpmozo_ae_team_member_metabox_nonce' );

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
			<label for="wpmozo_ae_team_member_short_desc">
				<?php esc_html_e( 'Short Description', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<textarea type="text" name="wpmozo_ae_team_member_short_desc" id="wpmozo_ae_team_member_short_desc"><?php echo wp_kses( $short_desc, $allowed_html ); ?></textarea>
			<span class="info"><?php echo esc_html__( 'Support for few HTML tags like h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,b,a,br', 'wpmozo-addons-for-elementor' ); ?></span>
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_designation">
				<?php esc_html_e( 'Designation', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="text" name="wpmozo_ae_team_member_designation" id="wpmozo_ae_team_member_designation" value="<?php echo esc_attr( $designation ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_email">
				<?php esc_html_e( 'Email Address', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="email" name="wpmozo_ae_team_member_email" id="wpmozo_ae_team_member_email" value="<?php echo esc_attr( $email ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_phone">
				<?php esc_html_e( 'Phone Number', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="tel" name="wpmozo_ae_team_member_phone" id="wpmozo_ae_team_member_phone" value="<?php echo esc_attr( $phone ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_website">
				<?php esc_html_e( 'Website Url', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="url" name="wpmozo_ae_team_member_website" id="wpmozo_ae_team_member_website" value="<?php echo esc_attr( $website_url ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_facebook">
				<?php esc_html_e( 'Facebook Url', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="url" name="wpmozo_ae_team_member_facebook" id="wpmozo_ae_team_member_facebook" value="<?php echo esc_attr( $facebook ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_twitter">
				<?php esc_html_e( 'Twitter Url', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="url" name="wpmozo_ae_team_member_twitter" id="wpmozo_ae_team_member_twitter" value="<?php echo esc_attr( $twitter ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_linkedin">
				<?php esc_html_e( 'Linkedin Url', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="url" name="wpmozo_ae_team_member_linkedin" id="wpmozo_ae_team_member_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_instagram">
				<?php esc_html_e( 'Instagram Url', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="url" name="wpmozo_ae_team_member_instagram" id="wpmozo_ae_team_member_instagram" value="<?php echo esc_attr( $instagram ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_youtube">
				<?php esc_html_e( 'Youtube Url', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<input type="url" name="wpmozo_ae_team_member_youtube" id="wpmozo_ae_team_member_youtube" value="<?php echo esc_attr( $youtube ); ?>" />
		</div>
		<div class="wpmozo_meta_fields">
			<label for="wpmozo_ae_team_member_youtube">
				<?php esc_html_e( 'Skills', 'wpmozo-addons-for-elementor' ); ?>
			</label>
			<div class="wpmozo_repeator_meta_fields">
				<input type="hidden" id="wpmozo_ae_team_member_skills" name="wpmozo_ae_team_member_skills" value="<?php echo esc_attr( $skills ); ?>" />
				<input type="hidden" id="wpmozo_ae_team_member_skills_value" name="wpmozo_ae_team_member_skills_value" value="<?php echo esc_attr( $skills_value ); ?>" />
				<?php
					$skills       = explode( ',', $skills );
					$skills_value = explode( ',', $skills_value );
				if ( is_array( $skills ) && ! empty( array_filter( $skills ) ) ) {
					if ( count( $skills ) > 1 ) {
						$row_control = '<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_remove_row">-</span>';
					} else {
						$row_control = '';
					}
					$count = count( $skills );
					for ( $i = 0; $i < $count; $i++ ) {
						$skill_value = array_key_exists( $i, $skills_value ) ? absint( $skills_value[ $i ] ) : 100;
						?>
						<div class="wpmozo_repeator_meta_field_row">
							<div class="wpmozo_repeator_meta_field">
								<input type="text" class="wpmozo_ae_team_member_skills" value="<?php echo esc_attr( $skills[ $i ] ); ?>" placeholder="Skill" />
								<input type="number" class="wpmozo_ae_team_member_skills_value" value="<?php echo esc_attr( $skill_value ); ?>" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100"/>
							</div>
							<p class="wpmozo_repeator_meta_field_row_controls">
								<?php echo wp_kses_post( $row_control ); ?>
								<?php
								if ( ( count( $skills ) - 1 ) === $i ) {
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
							<input type="text" class="wpmozo_ae_team_member_skills" placeholder="Skill" />
							<input type="number" class="wpmozo_ae_team_member_skills_value" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100" />
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

	public function wpmozo_save_team_member_meta_fields( $post_id ) {
		// doing an auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// verify nonce.
		if ( ! isset( $_POST['wpmozo_ae_team_member_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['wpmozo_ae_team_member_metabox_nonce'] ) ), 'wpmozo_metaboxes_nonce' ) ) {
			return;
		}

		// if current user can not edit the post.
		if ( ! current_user_can( 'edit_posts', $post_id ) ) {
			return;
		}

		$fields = array(
			'wpmozo_ae_team_member_short_desc',
			'wpmozo_ae_team_member_designation',
			'wpmozo_ae_team_member_website',
			'wpmozo_ae_team_member_linkedin',
			'wpmozo_ae_team_member_facebook',
			'wpmozo_ae_team_member_twitter',
			'wpmozo_ae_team_member_instagram',
			'wpmozo_ae_team_member_youtube',
			'wpmozo_ae_team_member_email',
			'wpmozo_ae_team_member_skills',
			'wpmozo_ae_team_member_skills_value',
			'wpmozo_ae_team_member_phone',
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
				if ( 'wpmozo_ae_team_member_short_desc' === $field ) {
					${$field} = wp_kses( wp_unslash( $_POST[ $field ] ), $allowed_html );
				} else {
					${$field} = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
				}
				update_post_meta( $post_id, $field, ${$field} );
			}
		}
	}
	/** Callback function to render the meta box **/
	public function wpmozo_add_team_member_metabox() {
		add_meta_box(
			'wpmozo_ae_team_member_metabox',
			'<img class="wpmozo_ae_meta_image" src="' . plugin_dir_url( __DIR__ ) . 'admin/assets/images/wpmozo-logo.png" />Team Member Information',
			array( $this, 'wpmozo_ae_team_member_metabox_callback' ),
			'wpmozoae-team-member', // Replace 'your_custom_post_type' with the actual name of your custom post type.
			'normal',
			'default'
		);
	}
}
