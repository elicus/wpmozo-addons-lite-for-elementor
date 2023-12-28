<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2023 Elicus Technologies Private Limited
 * @version     1.0.0
 */

/** If this file is called directly, abort. **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

class WPMOZO_AE_Fancy_Heading extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wpmozo_ae_fancy_heading';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Fancy Heading', 'wpmozo-addons-for-elementor-lite' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-heading';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'wpmozo' );
	}

	/**
	 * Define Dependencies.
	 *
	 * Define the CSS files required to run the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return style handle.
	 */
	public function get_style_depends() 
	{
		wp_register_style( 'wpmozo-ae-fancyheading-style', plugins_url( 'assets/css/style.min.css', __FILE__  ) );

		return array( 'wpmozo-ae-fancyheading-style' );
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//Seprate file containing all the code for registering controls.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'fancy-heading/assets/controls/controls.php';
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$pre_heading          = esc_attr( '' !== $settings[ 'pre_heading' ] ? $settings[ 'pre_heading' ] : '' );
		$heading              = esc_attr( '' !== $settings[ 'heading' ] ? $settings[ 'heading' ] : '' );
		$post_heading         = esc_attr( '' !== $settings[ 'post_heading' ] ? $settings[ 'post_heading' ] : '' );
		$display_inline       = esc_attr( $settings[ 'display_inline' ] );
		$global_heading_level = esc_attr( $settings[ 'global_heading_level' ] );
		$display_inline       = esc_attr( $settings[ 'display_inline' ] );

		$this->add_render_attribute( 'heading_wrapper', 'class', 'wpmozo_ae_text_wrapper' );
		$this->add_render_attribute( 'heading_wrapper_inner', 'class', 'wpmozo_ae_text_wrapper_inner' );
		$this->add_render_attribute( 'pre_text_wrapper', 'class', 'wpmozo_ae_pre_text_wrapper' );
		$this->add_render_attribute( 'main_text_wrapper', 'class', 'wpmozo_ae_main_text_wrapper' );
		$this->add_render_attribute( 'post_text_wrapper', 'class', 'wpmozo_ae_post_text_wrapper' );

		$this->add_inline_editing_attributes( 'pre_heading', 'none' );
		$this->add_render_attribute( 'pre_heading', 'class', 'wpmozo_ae_pre_text' );

		$this->add_inline_editing_attributes( 'heading', 'none' );
		$this->add_render_attribute( 'heading', 'class', 'wpmozo_ae_main_text' );

		$this->add_inline_editing_attributes( 'post_heading', 'none' );
		$this->add_render_attribute( 'post_heading', 'class', 'wpmozo_ae_post_text' );

		$this->add_render_attribute( 'text_wrapper', 'class', 'wpmozo_ae_global_text_wrapper' );

		if ( '' !== $pre_heading ) {
			$pre_heading = '<span ' . $this->get_render_attribute_string( 'pre_heading' ) . '>' . $pre_heading . '</span>';
		}

		if ( '' !== $heading ) {
			$heading = '<span ' . $this->get_render_attribute_string( 'heading' ) . '>' . $heading . '</span>';
		}

		if ( '' !== $post_heading ) {		
			$post_heading = '<span ' . $this->get_render_attribute_string( 'post_heading' ) . '>' . $post_heading . '</span>';
		}	

		?>
		<div <?php echo $this->get_render_attribute_string( 'heading_wrapper' ); ?> >
			<<?php echo ('' !== $global_heading_level ? $global_heading_level : 'h2'); ?> <?php echo $this->get_render_attribute_string( 'heading_wrapper_inner' ); ?> >
				<?php echo $pre_heading; ?>
				<?php echo $heading; ?>
				<?php echo $post_heading; ?>
			</<?php echo ('' !== $global_heading_level ? $global_heading_level : 'h2'); ?>>
		</div>
		<?php
	}
}