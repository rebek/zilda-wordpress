<?php
/**
 * Post Options
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


/*-----------------------------------------------------------------------------------*/
# Register The Meta Boxes
/*-----------------------------------------------------------------------------------*/
add_action( 'add_meta_boxes', 'tie_add_custom_meta_boxes' );
function tie_add_custom_meta_boxes(){

	add_meta_box(
		'tie_post_options',
		apply_filters( 'TieLabs/theme_name', 'TieLabs' ) .' - '. esc_html__( 'Settings', TIELABS_TEXTDOMAIN ),
		'tie_post_custom_options',
		apply_filters( 'TieLabs/settings_post_types', array( 'post', 'page' ) ),
		'normal',
		'high'
	);

	add_meta_box(
		'tie_frontpage_option',
		apply_filters( 'TieLabs/theme_name', 'TieLabs' ) .' - '. esc_html__( 'Front Page', TIELABS_TEXTDOMAIN ),
		'tie_custom_meta_frontpage',
		'page',
		'side',
		'low'
	);
}


/*-----------------------------------------------------------------------------------*/
# Secondry post title
/*-----------------------------------------------------------------------------------*/
add_action( 'edit_form_after_title', 'tie_secondry_post_title', 40 );
function tie_secondry_post_title( $value ){

	$post_id = get_the_id();

	if( ( ! empty( $post_id ) && get_post_type( $post_id ) != 'post' ) || get_current_screen()->post_type != 'post' ){
		return;
	}

	$current_sub_title = get_post_meta( $post_id, 'tie_post_sub_title', true ) ? get_post_meta( $post_id, 'tie_post_sub_title', true ) : '';

	?>

	<div id="subtitlediv">
		<div id="subtitlewrap">
			<label class="screen-reader-text" id="sub-title-prompt-text" for="tie-sub-title"><?php esc_html_e( 'Enter sub title here', TIELABS_TEXTDOMAIN ) ?></label>
			<input type="text" name="tie_post_sub_title" size="30" value="<?php echo esc_attr( $current_sub_title ) ?>" id="tie-sub-title" placeholder="<?php esc_html_e( 'Enter sub title here', TIELABS_TEXTDOMAIN ) ?>" spellcheck="true" autocomplete="off">
		</div>
	</div>

	<?php
}


/*-----------------------------------------------------------------------------------*/
# Set the page as a front page
/*-----------------------------------------------------------------------------------*/
function tie_custom_meta_frontpage(){

	$notice = $data  = '';

	if( get_option( 'show_on_front' ) == 'page' ){

		$current_page_id = get_the_id();
		$front_page_id   = get_option( 'page_on_front' );

		if( $current_page_id == $front_page_id ){
			$data = 'true';
		}
		else{

			$link = add_query_arg( array( 'post' => $front_page_id, 'action' => 'edit' ), admin_url( 'post.php' ) );
			$page = '<a href='. $link .' target="_blank">'. get_the_title( $front_page_id ) .'</a>';
			$notice = '
				<p>'. sprintf( esc_html__( 'Current Front Page: %s', TIELABS_TEXTDOMAIN ), $page ) .'</p>
			';
		}
	}


	$option = array(
		'name'   => esc_html__( 'Set as the site Front Page?', TIELABS_TEXTDOMAIN ),
		'id'     => 'tie-set-front-page',
		'type'   => 'checkbox',
	);

	tie_build_option( $option, 'page_on_front', $data  );

	echo $notice;
}


/*-----------------------------------------------------------------------------------*/
# Post & page Main Meta Boxes
/*-----------------------------------------------------------------------------------*/
function tie_post_custom_options(){


	$settings_tabs = array(

		'general' => array(
			'icon'  => 'admin-settings',
			'title' => esc_html__( 'General', TIELABS_TEXTDOMAIN ),
		),

		'layout' => array(
			'icon'	=> 'schedule',
			'title'	=> esc_html__( 'Layout', TIELABS_TEXTDOMAIN ),
		),

		'logo' => array(
			'icon'	=> 'lightbulb',
			'title'	=> esc_html__( 'Logo', TIELABS_TEXTDOMAIN ),
		),

		'sidebar' => array(
			'icon'  => 'slides',
			'title' => esc_html__( 'Sidebar', TIELABS_TEXTDOMAIN ),
		),

		'styles' => array(
			'icon'  => 'art',
			'title' => esc_html__( 'Styles', TIELABS_TEXTDOMAIN ),
		),

		'menu' => array(
			'icon'  => 'menu',
			'title' => esc_html__( 'Main Menu', TIELABS_TEXTDOMAIN ),
		),

		'e3lan' => array(
			'icon'  => 'megaphone',
			'title' => esc_html__( 'Advertisement', TIELABS_TEXTDOMAIN ),
		),

		'components' => array(
			'icon'  => 'admin-settings',
			'title' => esc_html__( 'Components', TIELABS_TEXTDOMAIN ),
		),
	);

	if( get_post_type() == 'post' ){

		$settings_tabs['highlights'] = array(
			'icon'  => 'editor-alignleft',
			'title' => esc_html__( 'Story Highlights', TIELABS_TEXTDOMAIN ),
		);

		$settings_tabs['source-via'] = array(
			'icon'  => 'share-alt2',
			'title' => esc_html__( 'Source and Via', TIELABS_TEXTDOMAIN ),
		);
	}

	?>

	<input type="hidden" name="tie_hidden_flag" value="true" />

	<div class="tie-panel">
		<div class="tie-panel-tabs">
			<ul>
				<?php
					foreach( $settings_tabs as $tab => $settings ){

						$icon  = $settings['icon'];
						$title = $settings['title'];

						echo "
							<li class=\"tie-tabs tie-options-tab-$tab\">
								<a href=\"#tie-options-tab-$tab\">
									<span class=\"dashicons-before dashicons-$icon tie-icon-menu\"></span>
									$title
								</a>
							</li>
						";
					}
				?>
			</ul>
			<div class="clear"></div>
		</div> <!-- .tie-panel-tabs -->

		<div class="tie-panel-content">

			<?php

				foreach( $settings_tabs as $tab => $settings ){
					echo "
					<!-- $tab Settings -->
					<div id=\"tie-options-tab-$tab\" class=\"tabs-wrap\">";
						TIELABS_HELPER::get_template_part( 'framework/admin/post-options/'. $tab );
					echo "</div>";
				}

			?>

		</div><!-- .tie-panel-content -->

		<div class="clear"></div>
	</div><!-- .tie-panel -->

	<div class="clear"></div>

  <?php
}


/*-----------------------------------------------------------------------------------*/
# Get The Post Options
/*-----------------------------------------------------------------------------------*/
function tie_build_post_option( $value ){

	if( empty( $value['id'] )){
		return;
	}

	$key  = $value['id'];
	$data = tie_get_postdata( $key );

	tie_build_option( $value, $key, $data );
}


/*-----------------------------------------------------------------------------------*/
# Save Post Options
/*-----------------------------------------------------------------------------------*/
add_action('save_post', 'tie_save_post_options');
function tie_save_post_options( $post_id ){

	# Check if this is an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return $post_id;
	}


	# Begin to save ---------
	if ( isset( $_POST['tie_hidden_flag'] )){

		# Prevent setting the revision pages as frontpage
		if( ! wp_is_post_revision( $post_id ) ){

			# Update the Front Page option
			if( ! empty( $_POST['page_on_front'] ) ){

				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $post_id );
			}
			else{

				if( get_option( 'show_on_front' ) == 'page' && $post_id == get_option( 'page_on_front' ) ){
					update_option( 'show_on_front', 'posts' );
					update_option( 'page_on_front', 0 );
				}
			}
		}


		# Post / Page Options
		$custom_meta_fields = array(

			// Misc
			'tie_post_sub_title',
			'tie_primary_category',
			'tie_trending_post',
			'tie_hide_title',
			'tie_hide_header',
			'tie_hide_footer',
			'tie_do_not_dublicate',
			'tie_header_extend_bg',

			// Post Layout
			'tie_theme_layout',
			'tie_post_layout',
			'tie_featured_use_fea',
			'tie_featured_custom_bg',
			'tie_featured_bg_color',

			// Logo
			'custom_logo' => array(
				'logo_setting',
				'logo_text',
				'logo',
				'logo_retina',
				'logo_retina_width',
				'logo_retina_height',
				'logo_margin',
				'logo_margin_bottom',
			),

			// Post Components
			'tie_hide_meta',
			'tie_hide_tags',
			'tie_hide_categories',
			'tie_hide_author',
			'tie_hide_nav',
			'tie_hide_share_top',
			'tie_hide_share_bottom',
			'tie_hide_newsletter',
			'tie_hide_related',
			'tie_hide_check_also',

			// Post Sidebar
			'tie_sidebar_pos',
			'tie_sidebar_post',
			'tie_sticky_sidebar',

			// Post Format settings
			'tie_post_head',

			'tie_post_featured',
			'tie_image_uncropped',
			'tie_image_lightbox',

			'tie_post_slider',
			'tie_post_gallery',

			'tie_googlemap_url',

			'tie_video_url',
			'tie_video_self',
			'tie_embed_code',

			'tie_audio_m4a',
			'tie_audio_mp3',
			'tie_audio_oga',
			'tie_audio_soundcloud',
			'tie_audio_embed',

			// Custom Ads
			'tie_hide_above',
			'tie_get_banner_above',
			'tie_hide_below',
			'tie_get_banner_below',
			'tie_hide_above_content',
			'tie_get_banner_above_content',
			'tie_hide_below_content',
			'tie_get_banner_below_content',


			// Story Highlights
			'tie_highlights_text',

			// Source & Via
			'tie_source',
			'tie_via',

			// Post Color and background
			'post_color',
			'tie_custom_css',
			'background_color',
			'background_color_2',
			'background_type' => array(
				'background_pattern',
				'background_image',
			),
			'background_dots',
			'background_dimmer' => array(
				'background_dimmer_value',
				'background_dimmer_color',
			),

			// Custom Menu
			'tie_menu',
			'sticky_logo_type',
			'logo_sticky',
			'logo_retina_sticky',

			// Page templates
			'tie_blog_excerpt' => array(
				'tie_blog_length',
			),
			'tie_blog_uncropped_image',
			'tie_blog_category_meta',
			'tie_blog_meta',
			'tie_posts_num',
			'tie_blog_cats',
			'tie_blog_layout',
			'tie_authors',
			'tie_blog_pagination',

			// Post Views
			apply_filters( 'TieLabs/views_meta_field', 'tie_views' ),
		);

		$custom_meta_fields = apply_filters( 'TieLabs/post_options_meta', $custom_meta_fields );

		foreach( $custom_meta_fields as $key => $custom_meta_field ){

			// Dependency Options fields
			if( is_array( $custom_meta_field ) ){

				if( ! empty( $_POST[ $key ] )){

					update_post_meta( $post_id, $key, $_POST[ $key ] );

					foreach ( $custom_meta_field as $single_field ){
						if( ! empty( $_POST[ $single_field ] )){
							update_post_meta( $post_id, $single_field, $_POST[ $single_field ] );
						}
						else{
							delete_post_meta( $post_id, $single_field );
						}
					}
				}
				else{
					delete_post_meta( $post_id, $key );
				}
			}

			// Single Options fields
			else{
				if( ! empty( $_POST[ $custom_meta_field ] )){
					update_post_meta( $post_id, $custom_meta_field, $_POST[ $custom_meta_field ] );
				}
				else{
					delete_post_meta( $post_id, $custom_meta_field );
				}
			}
		}

	}

	# To prevent DEMO reset from removing the posts that have been modified
	delete_post_meta( $post_id, TIELABS_THEME_SLUG . '_demo_data' );

	# Update the cache
	wp_cache_flush();
}
