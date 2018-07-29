<?php
/**
 * Database updates
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

# Debug
//update_option( 'tie_ver_'. TIELABS_THEME_ID, '2.0.0' );


$current_version = get_option( 'tie_ver_'. TIELABS_THEME_ID ) ? get_option( 'tie_ver_'. TIELABS_THEME_ID ) : get_option( 'tie_jannah_ver' );


# Apply updates
if( $current_version ){

	if( version_compare( $current_version, TIELABS_DB_VERSION, '<' ) ){


		# ChangeLog
		$changelog = '';


	  # Custom Versions updates-------------------------------- */
	  $updated_options = $original_options = get_option( apply_filters( 'TieLabs/theme_options', '' ) );







	  /*
	   * Update to version 1.0.3
	   *
	   * New Option for the AMP
	   */
	  if( version_compare( $current_version, '1.0.3', '<' ) ){

			$updated_options['amp_active'] = 'true';
		}


		/*
	   * Update to version 1.1.0
	   *
	   * Store the total puplished posts number
	   */
	  if( version_compare( $current_version, '1.1.0', '<' ) ){

	  	# Store the posts number needed for th switcher-
	  	$count_posts     = wp_count_posts();
			$published_posts = ! empty( $count_posts->publish ) ? $count_posts->publish : 0;
			update_option( 'tie_published_posts_'. TIELABS_THEME_ID, $published_posts, false );

			# Delete the stored cache to re-update it needed for the switcher
			delete_transient( 'tie-data-'.TIELABS_THEME_SLUG );

			# Chnagelog
			$changelog .= '
				NEW: Introducing our Jannah Switcher Plugin now you can migrating your posts from 17 themes to Jannah.
				NEW: Option to set a custom RSS feed URL.
				NEW: Option to embed Audio code.
				NEW: Unlimited Source and Via options.
				NEW: Facebook Videos support.
				NEW: Twitter Videos support.
				NEW: Option to set the page as a front page directly from the edit page.
			';
		}


	  /*
	   * Update to version 1.2.0
	   *
	   * Update some options
	   */
	  if( version_compare( $current_version, '1.2.0', '<' ) ){

			$updated_options['schema_type']        = 'Article';
			$updated_options['responsive_tables']  = 'true';

			if( tie_get_option( 'header_layout' ) == 1 ){

				$updated_options['sticky_logo_type'] = 'true';
				unset( $updated_options['custom_logo_sticky'] );
			}

			# Chnagelog
			$changelog .= "
				New: 3 typography options to customize the posts titles in the sliders.
				NEW: LazyLoad for the Sliders images.
				NEW: LazyLoad for Videos images in the Videos Playlist.
				NEW: Show/Hide the Automatic Featured Image for the standard posts now works on the AMP pages.
				NEW: Added More texts to translations panel.
				NEW: Integration with the Jetpack Stats module.
				NEW: Integration with the WordPress Social Login plugin, now you can use the login social buttons with the theme's Login sections.
				NEW: Integration with the Google Captcha (reCAPTCHA) plugin, now you can add the reCAPTCHA to the theme's Login sections.
				NEW: Responsive in-post tables with an option to disable it in case you want to use a custom plugin.
				NEW: AMP WhatsApp share button.
				NEW: AMP Tumblr share button.
				NEW: AMP SMS share button.
				NEW: The new Audio, Video and Image widgets are now available in the TieLabs Page builder Widgets section.
				NEW: Export and Import module for the theme options.
				NEW: Logo in the Sticky menu for all headers layouts.
				NEW: Option to set a custom sticky logo image.
				NEW: Option to set the number of posts in the Check Also block.
				NEW: 7 Arabic fonts added from FontFace.me.
				NEW: Most viewed Posts for 7 days option in the posts widget.
				NEW: Most viewed Posts for 30 days option in the posts widget.
				NEW: Option to show/hide the MENU text for the mobile menu icon.
				NEW: Help links in the theme options.
				NEW: Add supports for the Private posts in the blocks.
				NEW: Now the theme highlights the primary category only in the main nav.
				NEW: Recommended Plugins section in the Install plugins page.
				NEW: Notice message when a new update is available for a bundled plugin.
				NEW: Add shortcode support for the featured image's caption.
				NEW: Page builder Blocks now shows the child categories posts.
				NEW: Now terms descriptions supports Shortcodes.
				IMPROVED: Changed the Schema default type value of the posts to Article.
				IMPROVED: Tabs Widget backend sortable function.
				IMPROVED: BuddyPress form styles.
				IMPROVED: WooCommerce styles.
				IMPROVED: The LazyLoad image feature of the Avatars.
				IMPROVED: BreadCrumbs support for the CPT.
				IMPROVED: Post views system excludes the bots visits.
			";

		}


	  /*
	   * Update to version 1.3.0
	   *
	   */
	  if( version_compare( $current_version, '1.3.0', '<' ) ){

			# Chnagelog
			$changelog .= "
				New: Automatic theme update feature.
				New: Edit Post link in the end of the post.
				New: Button to revoke the theme validation in order to use the license on another domain.
				New: Animated appearance for the Sticky Logo.
				IMPROVED: Lazy Load for in-post images.
				IMPROVED: Mega menu functions.
				IMPROVED: Mega menu and footer custom colors.
				IMPROVED: Sections custom margins in the responsive version.
				IMPROVED: Default Logo margins in the Header Layout 3.
			";

		}


	  /*
	   * Update to version 2.0.0
	   *
	   * Update the Post Views options
	   */
	  if( version_compare( $current_version, '2.0.0', '<' ) ){

	  	// Update Category options
			$categories_options = get_option( 'tie_cats_options' );
			$update_the_options = false;

			if( ! empty( $categories_options ) && is_array( $categories_options ) ){

				foreach ( $categories_options as $key => $value ){

					if( ! empty( $value['featured_posts_style'] ) && $value['featured_posts_style'] == 'videos_list' ){

						$categories_options[ $key ]['dark_skin'] = 'true';
						$update_the_options = true;
					}
				}

				if( $update_the_options ){
					update_option( 'tie_cats_options', $categories_options );
				}
			}


	  	// Update theme Options
	  	$updated_options['boxes_style']           = 1;
	  	$updated_options['sticky_featured_video'] = 'true';
	  	$updated_options['mobile_header']         = 'default';
	  	$updated_options['mobile_menu_layout']    = 'fullwidth';
	  	$updated_options['views_colored']         = 'true';
			$updated_options['views_warm_color']      = 500;
			$updated_options['views_hot_color']       = 2000;
			$updated_options['views_veryhot_color']   = 5000;
			$updated_options['related_position']      = 'post';


			# If the sticky menu active | enable the mobile Sticky Header
			if( tie_get_option( 'stick_nav' ) ){
				$updated_options['stick_mobile_nav'] = 'true';
			}

			# If the Copyright area has custom Styles apply them on the back to top button
			if( tie_get_option( 'copyright_background_color' ) ){
				$updated_options['back_top_background_color'] = tie_get_option( 'copyright_background_color' );
			}

			if( tie_get_option( 'copyright_text_color' ) ){
				$updated_options['back_top_text_color'] = tie_get_option( 'copyright_text_color' );
			}


			# Set all Weather widget to be animated
			$weather_widgets = get_option( 'widget_tie-weather-widget' );
			if( ! empty( $weather_widgets ) && is_array( $weather_widgets ) ){

				foreach ( $weather_widgets as $widget => $options ) {

					if( ! empty( $options ) && is_array( $options )){
						$weather_widgets[$widget]['animated'] = 'true';
					}
				}

				update_option( 'widget_tie-weather-widget', $weather_widgets );
			}




			# Chnagelog
			$changelog .= "
				NEW: Block Layout #16.
				NEW: 3 new Posts layouts for archives pages.
				New: Modern Sliders Loading method.
				New: Send Web Notifications for your posts directly from the post edit page.
				NEW: Options to show the Weather in the Main and Secondary Nav.
				NEW: Unboxed layout for the blocks and widgets.
				NEW: Option to sticky the Header on mobile.
				NEW: Centered Logo Mobile Header layout.
				NEW: Mobile Menu Layout.
				NEW: Option to enable/disable the animations of the weather icons.
				NEW: Post Views Settings tab on the theme options page.
				NEW: Option to enable/disable the colored post views.
				NEW: Option to set a starter views number for the new posts.
				NEW: Option to set the minimum views number for each color.
				NEW: Option to change post views to a fake number.
				NEW: Option in the Posts List widget to exclude current post in the single post page.
				NEW: Option to change the font settings for the archive title.
				NEW: Option to show the posts' Modified date instead of the Published date.
				NEW: Option to upload a default/fallback Open Graph image.
				NEW: Option to show the review rating in the sliders blocks.
				NEW: Option to show the review rating in the single category page sliders.
				NEW: Option to set the position of the related posts below comments.
				NEW: Option to set the position of the related posts above the footer.
				NEW: Send to friend option in the select and share feature.
				NEW: Option to set a title for the Ad spaces.
				NEW: Option to set a Link to the title of the Ad spaces.
				NEW: Ad space above the header.
				NEW: Ad space above the post content in the single post page.
				NEW: Ad space below the post content in the single post page.
				New: Option to hide the Above Header Ad on mobile.
				NEW: Options in the Post edit page to hide the above and below content ads.
				NEW: Options in the Post edit page to set a custom Ad for the above and below content spaces.
				New: 2 Ad Spaces to show Ads between the posts in the archives pages.
				NEW: Add support for the dark skin mode to the WordPress embedded posts cards.
				NEW: Primary Category label appears now in the blocks.
				NEW: Option to set specific posts as Trending posts.
				NEW: Option to set the speed of the sliders.
				NEW: Add the custom logo to the AMP structure data.
				NEW: Option to disable the custom theme's styles in the editor.
				NEW: Now you can set custom menu, logo, color, background, etc for the all shop pages.
				NEW: option to Use the BuddyPress Member Profile link instead of the default author page link in the post meta, author box, and the login sections.
				NEW: Add the comments list section titles to the translation panel.
				NEW: Option to exclude specific posts by IDs in the Blocks and the sliders.
				New: Option in the Posts List Widget to show the Related posts by categories.
				New: Option in the Posts List Widget to show the Related posts by tags.
				New: Option in the Posts List Widget to show the Related posts by author.
				New: Layout in the Posts List widget to show the Authors Posts.
				New: Share buttons layout.
				New: Save time and access any theme options' tab directly from the admin bar.
				New: Support Facebook Instant Articles.
				New: Syntax Highlighting for the codes fields.
				New: Option to set Custom background and arrow color for the Back To Top button.
				New: Option for the single category to show the Videos Playlist in Dark Skin.
				NEW: Sticky Videos options in the single post page.
				NEW: Options to disable the Author, Comments and View meta info in the archives.
				NEW: Options to disable the Author, Comments and View meta info in the page builder blocks.
				NEW: Vimeos videos now matches the color of the custom block/page/theme color.
				NEW: Google Fonts Support for the Gurmukhi, Arabic, Bengali, Devanagari, Gujarati, Hebrew, Kannada, Malayalam, Myanmar, Oriya, Sinhala, Tamil, Telugu, and Thai languages.
				NEW: Support for the shortcodes in the Footer text areas.
				IMPROVED: Removed padding shortcode from the AMP pages.
				IMPROVED: Numbers for non-latin languages.
				IMPROVED: RTL support for the Child Theme.
				IMPROVED: Sticky menu behavior.
				IMPROVED: Columns shortcodes contents in the post excerpt.
				IMPROVED: Columns shortcodes with the estimated reading time.
				IMPROVED: WooCommerce tabs layout.
				IMPROVED: Mobile menu Icon style.
				IMPROVED: Responsive Adsense Ads.
				IMPROVED: Posts Switcher notice appearance.
				IMPROVED: Post titles font size in the responsive version.
				IMPROVED: Content Index Panel on the small screens.
				IMPROVED: Slider 1 styling.
				IMPROVED: WooCommerce Archives pages title spacing.
				IMPROVED: The Breaking News Block style.
				IMPROVED: Add Comment form style.
				IMPROVED: Removed the latest current item from the Breadcrumb schema data.
				IMPROVED: Select and share feature.
				IMPROVED: WooCommerce functions.
				IMPROVED: Logos SVG support.
				Updated: Modernizr.js to the latest version.
				Updated: Jarallax.js to the latest version.
				Updated: iLightBox.js to the latest version.
			";

		}





	  /*
	   * Update to version 2.1.0
	   *
	   */
	  if( version_compare( $current_version, '2.1.0', '<' ) ){



	  	$options_to_update = array(
	  		'tie_jannah_installed_demo' => 'tie_installed_demo',
	  		'tie_jannah_installed_demo' => 'tie_installed_demo_'.  TIELABS_THEME_ID,
	  		'jannah_published_posts'    => 'tie_published_posts_'. TIELABS_THEME_ID,
	  		'tie_jannah_install_date'   => 'tie_install_date_'. TIELABS_THEME_ID ,
	  		'jannah_chnagelog'          => 'tie_chnagelog_'. TIELABS_THEME_ID,
	  		'jannah_foxpush_code'       => 'tie_foxpush_code_'. TIELABS_THEME_ID,
	  		'switch_to_jannah'          => 'tie_switch_to_'. TIELABS_THEME_ID,
	  		'tie_jannah_ver'            => 'tie_ver_'. TIELABS_THEME_ID,
	  	);

	  	foreach ( $options_to_update as $old => $new ) {
				update_option( $new, get_option( $old ) );
				delete_option( $old );
	  	}


	  	$new_translations  = array();
			$translation_texts = apply_filters( 'TieLabs/translation_texts', array() );

			if( ! empty( $translation_texts ) && is_array( $translation_texts ) ){

				foreach ( $translation_texts as $id => $text ){

					$id = sanitize_title( htmlspecialchars( $id  ) );

					if( ! empty( $updated_options[ $id ] ) ){
						$new_translations[ $id ] = $updated_options[ $id ];
					}

					unset( $updated_options[ $id ] );
				}
			}

			if( ! empty( $new_translations ) ){
				$updated_options['translations'] = $new_translations;
			}

			// Chnagelog
			$changelog .= "
				- NEW: Notice in the automatic theme update page if the theme folder doesn't match the original name.
				- NEW: Add support for shortcode in the head and footer codes sections.
				- NEW: Now you can set a featured image for the pages built with the page builder and it will be used in the OG meta.
				- NEW: Lazy Load for the Post Slider images.
				- IMPROVED: Facebook share in the 'Select & Share' feature.
				- IMPROVED: WooCommerce featured images sizes.
				- IMPROVED: WooCommerce columns bug.
				- IMPROVED: Removed all Ads shortcodes from the AMP pages.
				- IMPROVED: Responsive Adsense Ads.
				- IMPROVED: Built Translation system.
				- And Improvements and minor bug fixes.
			";
		}



		/*
	   * Update to version 2.1.1
	   *
	   */
	  if( version_compare( $current_version, '2.1.1', '<' ) ){

	  	if( get_option('switch_to_jannah') ){

	  		$theme_switched = get_option('switch_to_jannah');
	  		update_option( 'tie_switch_to_'. TIELABS_THEME_ID, $theme_switched );
	  		delete_option('switch_to_jannah');
	  	}
		}




		# Update if the Changelog has items-------------------- */
		if( ! empty( $changelog ) ){

			# Store the new data
			update_option( 'tie_chnagelog_'. TIELABS_THEME_ID, trim( $changelog ), false );

			# Remove the pointer from the dismissed array
			$dismissed = array_filter( explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) ) );
			$pointer   = 'tie_new_updates_'. TIELABS_THEME_ID;

			if ( in_array( $pointer, $dismissed ) ){
				unset( $dismissed[ array_search( $pointer, $dismissed )] );
			}
			$dismissed = implode( ',', $dismissed );

			update_user_meta( get_current_user_id(), 'dismissed_wp_pointers', $dismissed );
		}


		# Update the New options if it changed-------------------- */
		if( $updated_options != $original_options ){
			update_option( apply_filters( 'TieLabs/theme_options', '' ), $updated_options );
		}


		# Update the DB version number
	  update_option( 'tie_ver_'. TIELABS_THEME_ID, TIELABS_DB_VERSION );


		# Use this action to run functions after updating the theme version
	  do_action( 'TieLabs/after_db_update' );

	}
}

