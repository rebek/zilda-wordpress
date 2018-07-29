<?php
/**
 * Jetpack
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly



if( ! class_exists( 'TIELABS_JETPACK' )){

	class TIELABS_JETPACK{

		public $count_key;


		/**
		 * __construct
		 *
		 * Class constructor where we will call our filter and action hooks.
		 */
		function __construct(){

			// Disable if the Jetpack plugin is not active or the Jetpack Views option is disabled
			if( ! TIELABS_JETPACK_IS_ACTIVE || ! Jetpack::is_module_active( 'stats' ) ){

				return false;
			}

			// Theme Meta Jetpack post views
			if( tie_get_option( 'tie_post_views' ) != 'jetpack' ){

				# Add Stats to REST API Post response
				if ( function_exists( 'register_rest_field' ) ) {
					add_action( 'rest_api_init',  array( $this, 'rest_register_post_views' ) );
				}

				$this->count_key = apply_filters( 'TieLabs/views_meta_field', 'tie_views' );
			}

			// Get Most Viewd Post for x days
			add_filter( 'TieLabs/posts_widget_query', array( $this, 'widget_query' ), 10, 1 );
		}


		/**
		 * widget_query
		 *
		 * Add related posts, ads, formats and share buttons to the post content
		 */
		public function widget_query( $query_args ){

			if( ! empty( $query_args['order'] ) && strpos( $query_args['order'], 'jetpack' ) !== false && function_exists( 'stats_get_csv' )){

				// Number of Days
				$days  = str_replace( 'jetpack-', '', $query_args['order'] );

				// Get the Posts via the API
				$post_views = stats_get_csv( 'postviews', array('days' => absint( $days ), 'limit' => 100 ));

				// If the Jetpack posts list has posts
				if( ! empty( $post_views ) && is_array( $post_views ) ){

					$post_ids = array_filter( wp_list_pluck( $post_views, 'post_id' ) );
					$query_args['posts'] = implode( ',', $post_ids );

					unset( $query_args['order'] );
				}

				// Jetpack request is empty > get most commented posts
				else{
					$query_args['order'] = 'popular';
				}
			}

			return $query_args;
		}


		/**
		 * _content_filters
		 *
		 * Add related posts, ads, formats and share buttons to the post content
		 */
		public function rest_register_post_views() {

			register_rest_field( 'post',
				'views',
				array(
					'get_callback'    => array( $this, 'rest_get_views' ),
					'update_callback' => array( $this, 'rest_update_views' ),
					'schema'          => null,
				)
			);
		}


		/**
		 * Get the Post views for the API.
		 *
		 * @since 1.0.0
		 *
		 * @param array           $object     Details of current post.
		 * @param string          $field_name Name of field.
		 * @param WP_REST_Request $request    Current request.
		 *
		 * @return array $views Array of views stored for that Post ID.
		 */
		public function rest_get_views( $object, $field_name, $request ) {

			return get_post_meta( $object['id'], $this->count_key, true );
		}


		/**
		 * Update post views from the API.
		 *
		 * Only accepts a string.
		 *
		 * @since 1.0.0
		 *
		 * @param string $view       New post view value.
		 * @param object $object     The object from the response.
		 * @param string $field_name Name of field.
		 *
		 * @return bool|int
		 */
		public function rest_update_views( $view, $object, $field_name ) {

			if ( empty( $view ) ) return false;

			return update_post_meta( $object->ID, $this->count_key, $view );
		}


		/**
		 * Retrieve Post Views for a post, using the WordPress.com Stats API.
		 */
		public static function post_views( $post_id ){

			$views = 0;

			// Return early if we use a too old version of Jetpack.
			if ( ! function_exists( 'stats_get_from_restapi' ) ) {
				return;
			}

			# Build our sub-endpoint to get stats for a specific post.
			$endpoint = sprintf( 'post/%d', $post_id );

			# Get the data
			$stats = stats_get_from_restapi( array( 'fields' => 'views' ), $endpoint );

			# Process that data
			if ( ! empty( $stats ) && isset( $stats->views ) ) {

				$count_key = apply_filters( 'TieLabs/views_meta_field', 'tie_views' );

				$views = $stats->views;
				update_post_meta( $post_id, $count_key, $views );
			}

			return $views;
		}

	}


	// Instantiate the class
	new TIELABS_JETPACK();
}
