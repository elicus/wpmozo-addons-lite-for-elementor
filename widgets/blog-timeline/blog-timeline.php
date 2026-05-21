<?php

/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.1.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Icons_Manager;
use \Elementor\Widget_Base;

if ( !class_exists( 'WPMOZO_AE_Blog_Timeline' )) {
	class WPMOZO_AE_Blog_Timeline extends Widget_Base {

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
			return 'wpmozo_ae_blog_timeline';
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
			return esc_html__( 'Blog Timeline', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-blog-timeline wpmozo-ae-brandicon';
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
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-blog-timeline-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-blog-timeline-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {

			wp_register_script( 'wpmozo-ae-blog-timeline-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			wp_localize_script(
				'wpmozo-ae-blog-timeline-script',
				'wpmozo_ae_blog_timeline_script',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'ajax_nonce' => wp_create_nonce( 'wpmozo-blog-timeline-nonce' ),
				)
			);

			return array( 'wpmozo-ae-blog-timeline-script', 'wpmozo-ae-isotope', 'wpmozo-ae-imagesloaded' );
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

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'blog-timeline/assets/controls/controls.php';
		}
		protected function printObjectWithPageBreak($obj) {
		    // Convert object properties to an array
		    $properties = get_object_vars($obj);

		    // Loop through each property
		    foreach ($properties as $key => $value) {
		        echo "<pre>";
		        echo "<strong>$key:</strong><br>";
		        print_r($value);
		        echo "</pre>";
		        echo "<hr style='page-break-after: always;'>"; // Adds a page break
		    }
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

			$posts_number           = intval($settings[ 'posts_number' ]);
			$ignore_sticky_posts    = $settings[ 'ignore_sticky_posts' ];
			$timeline_layout        = $settings[ 'timeline_layout' ];
			$timeline_layout_option = $settings[ 'timeline_layout_option' ];
			$no_results_text        = $settings[ 'no_results_text' ];
			$offset                 = $settings[ 'offset' ];
			$post_order_by          = $settings[ 'post_order_by' ];
			$post_order             = $settings[ 'post_order' ];

			$posts_number = isset( $posts_number ) && $posts_number > -1 ? $posts_number : -1;

			// Get the selected category IDs
			$category_ids = isset( $settings[ 'category_ids' ] ) ? $settings[ 'category_ids' ] : [];

			// Fetch sticky posts if not ignoring them
			$sticky_posts = [];
			if ('yes'  !== $ignore_sticky_posts ) {
				$sticky_posts = get_option( 'sticky_posts' );
			}
			if ( empty( $sticky_posts ) ) {
				$sticky_posts = [0]; // Prevents query error if no sticky posts
				$sticky_query = new WP_Query( [] );
			}else {
				// Fetch sticky posts
				$sticky_args = [
					'post__in'            => $sticky_posts,
					'posts_per_page'      => $posts_number,
					'ignore_sticky_posts' => 1,
					'category__in'        => $category_ids,
					'orderby'             => $post_order_by,
					'order'               => $post_order,
				];
				$sticky_query = new WP_Query( $sticky_args );
			}
			if( -1 !== $posts_number ){

				// Calculate remaining posts to fetch
				$remaining_posts_number = max( 0, $posts_number - $sticky_query->post_count );
			} else if ( -1 === $posts_number ){
				$remaining_posts_number = -1;
			}

			if( 0 !== $remaining_posts_number ) {

				// Fetch non-sticky posts
				$args = [
					'posts_per_page'  	=> $remaining_posts_number,
					'category__in' 		=> $category_ids,
					'orderby' 			=> $post_order_by,
					'order' 			=> $post_order,
					'offset'	 		=> $offset,
				];
				$query = new WP_Query( $args );
			} else if ( 0 === $remaining_posts_number ){
				$query = new WP_Query([]);
			}

			// Output
			if ( $sticky_query->have_posts() || $query->have_posts() ) : ?>
				<div class="wpmozo_blog_timeline">
					<div class="wpmozo_blog_timeline_wrapper <?php echo esc_attr( $timeline_layout ); ?> wpmozo_blog_timeline_<?php echo esc_attr( $timeline_layout_option ); ?> <?php echo esc_attr( $settings['icon_shape'] ); ?>">
						<?php
						// Render sticky posts first if not ignored
						if ( 'yes' !== $ignore_sticky_posts ) {
							while ( $sticky_query->have_posts() ) : $sticky_query->the_post();
								$this->render_post( $settings );
							endwhile;
						}

						// Render non-sticky posts
						while ( $query->have_posts() ) : $query->the_post();
							$this->render_post( $settings );
						endwhile;
						?>
						<div class="wpmozo_stem_wrapper wpmozo_blog_timeline_<?php echo esc_attr( $timeline_layout_option ); ?>_stem">
							<div class="wpmozo_blog_stem"></div>
						</div>
					</div> <!-- .wpmozo_blog_timeline_wrapper -->
				</div> <!-- .wpmozo_blog_timeline -->
			<?php else : ?>
				<p><?php echo esc_html( $no_results_text ); ?></p>
			<?php endif;

			wp_reset_postdata();
		}

		private function render_post( $settings ) {
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'wpmozo_blog_timeline_post' ); ?>>
				<div class="wpmozo_blog_timeline_stem_center">
					<?php \Elementor\Icons_Manager::render_icon( $settings[ 'timeline_icon' ], [ 'aria-hidden' => 'true', 'class' => 'timeline_icon' ], 'span' ); ?>
				</div>
				<div class="wpmozo_blog_timeline_post_content">
					<div class="wpmozo_blog_timeline_content_wrapper icon_<?php echo esc_attr( $settings[ 'button_icon_placement' ] ); ?>">
						<?php if ( 'layout1' === $settings[ 'timeline_layout' ] && 'yes' === $settings[ 'show_date' ] ) : ?>
							<div class="wpmozo_blog_timeline_meta_date">
								<span class="published"><?php if ( $settings[ 'meta_date' ] ) : echo date_i18n( $settings[ 'meta_date' ], get_the_time( 'U' ) );
														endif; ?></span>
							</div>
						<?php endif; ?>
						<?php if ( $settings[ 'show_thumbnail' ] && has_post_thumbnail() ) : ?>
							<div class="wpmozo_blog_timeline_image_wrapper">
								<a href="<?php the_permalink(); ?>" class="wpmozo_blog_timeline_image_link">
									<?php the_post_thumbnail( $settings[ 'featured_image_size' ], [ 'fetchpriority' => 'high', 'decoding' => 'async' ] ); ?>
								</a>
							</div>
						<?php endif; ?>
						<<?php echo esc_attr( wpmozo_ae_validate_heading_level( $settings[ 'heading_level' ] ) ); ?> class="wpmozo_blog_timeline_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo esc_attr( wpmozo_ae_validate_heading_level( $settings[ 'heading_level' ] ) ); ?>>
						<div class="wpmozo_blog_timeline_meta">
							<?php if ( $settings[ 'show_categories' ] ) : ?>
								<span class="wpmozo_blog_timeline_meta_icon"><i class="fas fa-th"></i></span>
								<span class="wpmozo_blog_timeline_post_categories"><?php the_category(', '); ?></span>
							<?php endif; ?>
							<?php if ( $settings[ 'show_author' ] ) : ?>
								<span class="wpmozo_blog_timeline_meta_icon"><i class="fas fa-user"></i></span>
								<span class="author"><?php the_author_posts_link(); ?></span>
							<?php endif; ?>
							<?php if ( $settings[ 'show_comments' ] ) : ?>
								<span class="wpmozo_blog_timeline_meta_icon"><i class="fas fa-comment"></i></span>
								<span class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
							<?php endif; ?>
						</div>
						<div class="wpmozo_blog_timeline_post_content_inner">
							<?php if ( 'excerpt' === $settings[ 'show_content' ] ) { ?>
								<p><?php echo wp_trim_words( get_the_content(), $settings[ 'excerpt_length' ] ); ?></p>
							<?php } else {
								echo get_the_content();
							} ?>
						</div>
						<?php if ( $settings[ 'show_more' ] ) : ?>
							<div class="wpmozo_readmore_button_wrapper">
								<a class="wpmozo_readmore_button" href="<?php the_permalink(); ?>">
									<span class="wpmozo_button_text"><?php echo esc_html( $settings[ 'read_more_text' ] ); ?></span>
									<?php \Elementor\Icons_Manager::render_icon( $settings[ 'button_icon' ], [ 'aria-hidden' => 'true', 'class' => 'wpmozo_button_icon' ] ); ?>
								</a>
							</div>
						<?php endif; ?>
						<span class="wpmozo_blog_timeline_triangle"></span>
					</div>
				</div>
				<div class="wpmozo_blog_timeline_outer_container">
					<?php if ( 'layout2' === $settings[ 'timeline_layout' ] && 'yes' === $settings[ 'show_date' ] ) : ?>
						<div class="wpmozo_blog_timeline_meta_date">
							<span class="published"><?php if ( $settings[ 'meta_date' ] ) : echo date_i18n( $settings[ 'meta_date' ], get_the_time( 'U' ) );
													endif; ?></span>
						</div>
					<?php endif; ?>
				</div>
			</article>
<?php
		}
	}
}
