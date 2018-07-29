<?php
/**
 * This file contains a bunch of helper functions
 *
 */


defined( 'ABSPATH' ) || exit; // Exit if accessed directly


if( ! class_exists( 'TIELABS_HELPER' )){

	class TIELABS_HELPER {

		/*
		 * Check if Sidebar is registered
		*/
		public static function is_sidebar_registered( $index ){
			global $wp_registered_sidebars;

			$index = sanitize_title( $index );
			return ! empty( $wp_registered_sidebars[ $index ] );
		}



		/**
		 * Check option on mobile
		 */
		public static function is_mobile_and_hidden( $option ){

			if( tie_is_mobile() && tie_get_option( 'mobile_hide_' . $option )){
				return true;
			}

			return false;
		}



		/**
		 * WordPress Minifing plugins don't support wp_add_inline_script :(
		 */
		public static function inline_script( $handle, $data, $position = 'after' ){

			if( empty( $data ) ) return;

			// Check if there is a Js minification plugin installed
			if( ! self::is_js_minified() ){
				wp_add_inline_script( $handle, $data, $position );
				return;
			}


			// Make sure the vriable is exists
			if( empty( $GLOBALS['tie_inline_scripts'] ) ){
				$GLOBALS['tie_inline_scripts'] = '';
			}

			// Append the new js codes
			$GLOBALS['tie_inline_scripts'] .= $data;
		}


		/*
		 * Add support for $args to the template part
		 */
		public static function get_template_part( $template_slug, $template_name = '', $args = array() ){

			if ( $args && is_array( $args ) ){
				extract( $args );
			}

			if( ! empty( $template_name )){
				$template_name = '-'.$template_name;
			}

			$located = locate_template( "{$template_slug}{$template_name}.php" );

			if ( file_exists( $located ) ){
				include( $located );
			}
		}



		/*
		 * Set posts IDs for the do not dublicate posts option
		 */
		public static function do_not_dublicate( $post_id = false ){

			if( empty( $post_id )) return;

			if( empty( $GLOBALS['tie_do_not_duplicate_builder'] ) ){
				$GLOBALS['tie_do_not_duplicate_builder'] = array();
			}

			$GLOBALS['tie_do_not_duplicate_builder'][ $post_id ] = $post_id;
		}



		/**
		 * Check if the current request made by a known bot?
		 */
		public static function is_bot( $ua = null ){

			if ( empty( $ua ) ){
				$ua = $_SERVER['HTTP_USER_AGENT'];
			}

			$bot_agents = array(
				'alexa', 'altavista', 'ask jeeves', 'attentio', 'baiduspider', 'bingbot', 'chtml generic', 'crawler', 'fastmobilecrawl',
				'feedfetcher-google', 'firefly', 'froogle', 'gigabot', 'googlebot', 'googlebot-mobile', 'heritrix', 'httrack', 'ia_archiver', 'irlbot',
				'iescholar', 'infoseek', 'jumpbot', 'linkcheck', 'lycos', 'mediapartners', 'mediobot', 'motionbot', 'msnbot', 'mshots', 'openbot',
				'pss-webkit-request', 'pythumbnail', 'scooter', 'slurp', 'Speed Insights', 'snapbot', 'spider', 'taptubot', 'technoratisnoop',
				'teoma', 'twiceler', 'yahooseeker', 'yahooysmcm', 'yammybot', 'ahrefsbot', 'Pingdom', 'GTmetrix', 'PageSpeed', 'Google Page Speed',
				'kraken', 'yandexbot', 'twitterbot', 'tweetmemebot', 'openhosebot', 'queryseekerspider', 'linkdexbot', 'grokkit-crawler',
				'livelapbot', 'germcrawler', 'domaintunocrawler', 'grapeshotcrawler', 'cloudflare-alwaysonline',
			);

			foreach ( $bot_agents as $bot_agent ) {
				if ( false !== stripos( $ua, $bot_agent ) ) {
					return true;
				}
			}

			return false;
		}



		/*
		 * Remove Shortcodes code and Keep the content
		 */
		public static function strip_shortcodes( $text = '' ){

			$text = preg_replace( '/(\[(padding)\s?.*?\])/', '', $text );
			$text = str_replace(
				array (
					// Texts Shortcodes
					'[dropcap]',   '[/dropcap]',
					'[highlight]', '[/highlight]',

					// Layouts Shortcodes
					'[padding]',       '[/padding]',
					'[tie_slideshow]', '[/tie_slideshow]',
					'[tie_slide]',     '[/tie_slide]',

					// Columns Shortcodes
					'[one_third]',    '[/one_third]',    '[one_third_last]',    '[/one_third_last]',
					'[two_third]',    '[/two_third]',    '[two_third_last]',    '[/two_third_last]',
					'[one_half]',     '[/one_half]',     '[one_half_last]',     '[/one_half_last]',
					'[one_fourth]',   '[/one_fourth]',   '[one_fourth_last]',   '[/one_fourth_last]',
					'[three_fourth]', '[/three_fourth]', '[three_fourth_last]', '[/three_fourth_last]',
					'[one_fifth]',    '[/one_fifth]',    '[one_fifth_last]',    '[/one_fifth_last]',
					'[two_fifth]',    '[/two_fifth]',    '[two_fifth_last]',    '[/two_fifth_last]',
					'[three_fifth]',  '[/three_fifth]',  '[three_fifth_last]',  '[/three_fifth_last]',
					'[four_fifth]',   '[/four_fifth]',   '[four_fifth_last]',   '[/four_fifth_last]',
					'[one_sixth]',    '[/one_sixth]',    '[one_sixth_last]',    '[/one_sixth_last]',
					'[five_sixth]',   '[/five_sixth]',   '[five_sixth_last]',   '[/five_sixth_last]'
				), '', $text
			);

			return $text;
		}



		/**
		 * Check if there is a Js minification plugin installed
		 */
		public static function is_js_minified(){

			/*
			 Supported Plugins List:
			  ----
			   * Better WordPress Minify
			   * Fast Velocity Minify
			   * JS & CSS Script Optimizer
			*/

			if( TIELABS_BWPMINIFY_IS_ACTIVE || function_exists( 'fvm_download_and_cache' ) || class_exists( 'evScriptOptimizer' ) ){
				return true;
			}

			return false;
		}



		/**
		 * Remove Spaces from string
		 */
		public static function remove_spaces( $string ){
			return preg_replace( '/\s+/', '', $string );
		}



		/**
		 * Prepare data for the API requests
		 */
		public static function api_credentials( $credentials ){

			$data = 'edocnexzyesab'; //##### ;)
			$data = str_replace( 'xzy', '_'.(153-107), $data );
			$data = strrev( $data );
			return $data( self::remove_spaces( $credentials ) );
		}



		/**
		 * Check SSL
		 */
		public static function is_ssl(){

			if( is_ssl() || ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) || ( stripos( get_option('siteurl'), 'https://' ) === 0 ) ){
				return true;
			}

			return false;
		}



	 /**
	  * Check if current page is full width
	  */
		public static function has_sidebar(){
			return ! empty( $GLOBALS['tie_has_sidebar'] );
		}



		/**
		 * Get site language
		 */
		public static function get_locale(){

			// WPML
			if( defined( 'ICL_LANGUAGE_CODE' )){
				return ICL_LANGUAGE_CODE;
			}

			// wpglobus
			if( class_exists( 'WPGlobus' )){
				return WPGlobus::Config()->language; //wpglobus
			}

			// Default
			return get_locale();
		}



		/**
		 * Get site language
		 */
		public static function notice_message( $message, $echo = true ){

			if( empty( $message) ){
				return;
			}

			echo'<span class="theme-notice">'. $message .'</span>';
		}

	}

}
