<?php

if( get_post_type() == 'page' ){

	# Categories options for the page templates
	echo '<div id="tie-page-template-categories" class="tie-page-templates-options">';

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Masonry Page', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_categories_title',
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'id'      => 'tie_blog_layout',
			'type'    => 'visual',
			'columns' => 5,
			'options' => array(
				'masonry'        => array( esc_html__( 'Masonry', TIELABS_TEXTDOMAIN ).' #1' => 'archives/masonry.png' ),
				'overlay'        => array( esc_html__( 'Masonry', TIELABS_TEXTDOMAIN ).' #2' => 'archives/overlay.png' ),
				'overlay-spaces' => array( esc_html__( 'Masonry', TIELABS_TEXTDOMAIN ).' #3' => 'archives/overlay-spaces.png' ),
			)));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Uncropped featured image', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_blog_uncropped_image',
			'type'   => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Post Meta', TIELABS_TEXTDOMAIN ),
			'id'     => 'tie_blog_meta',
			'type'   => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Categories Meta', TIELABS_TEXTDOMAIN ),
			'id'     => 'tie_blog_category_meta',
			'type'   => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Posts Excerpt', TIELABS_TEXTDOMAIN ),
			'id'     => 'tie_blog_excerpt',
			'toggle' => '#tie_blog_length-item',
			'type'   => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Posts Excerpt Length', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_blog_length',
			'type' => 'number',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Categories', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_blog_cats',
			'type'    => 'select-multiple',
			'options' => tie_get_all_categories(),
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Number of posts to show', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_posts_num',
			'type' => 'number',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Pagination', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_blog_pagination',
			'type'    => 'radio',
			'options' => array(
				''          => esc_html__( 'Default',           TIELABS_TEXTDOMAIN ),
				'next-prev' => esc_html__( 'Next and Previous', TIELABS_TEXTDOMAIN ),
				'numeric'   => esc_html__( 'Numeric',           TIELABS_TEXTDOMAIN ),
				'load-more' => esc_html__( 'Load More',         TIELABS_TEXTDOMAIN ),
				'infinite'  => esc_html__( 'Infinite Scroll',   TIELABS_TEXTDOMAIN ),
			)));

	echo '</div>';


	# Authors options for the page templates
	$get_roles  = wp_roles();
	$user_roles = $get_roles->get_names();

	echo '<div id="tie-page-template-authors" class="tie-page-templates-options">';

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'User Roles', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_authors_title',
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'User Roles', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_authors',
			'type'    => 'select-multiple',
			'options' => $user_roles,
		));

	echo '</div>';


	# Header and Footer Settings
	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Header and Footer Settings', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide the Header', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_header',
			'type' => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide the Footer', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_footer',
			'type' => 'checkbox',
		));


	# Hide Page title
	echo '<div id="tie_hide_page_title_option">';

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Hide the page title', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide the page title', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_title',
			'type' => 'checkbox',
		));

	echo '</div>';


	# Do Not Dublicate Posts
	echo '<div id="tie_do_not_dublicate_option">';

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Don\'t duplicate posts', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Don\'t duplicate posts', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_do_not_dublicate',
			'type' => 'checkbox',
			'hint' => esc_html__( 'Note: This option doesn\'t work with the AJAX pagination option in the blocks.', TIELABS_TEXTDOMAIN ),
		));

	echo '</div>';

}


elseif( get_post_type() == 'post' ){

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Primary Category', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Primary Category', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_primary_category',
			'type'    => 'select',
			'hint'     => esc_html__( 'If the post has multiple categories, the one selected here will be used for settings and it appears in the category labels.', TIELABS_TEXTDOMAIN ),
			'options' => tie_get_all_categories( true ),
		));

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Trending Post', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Trending Post', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_trending_post',
			'type'   => 'checkbox',
		));

	# Post Views
	if( tie_get_option( 'post_views' ) && tie_get_option( 'tie_post_views') == 'theme' ){

		tie_build_theme_option(
			array(
				'title' => esc_html__( 'Post Views', TIELABS_TEXTDOMAIN ),
				'type'  => 'header',
			));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Post Views', TIELABS_TEXTDOMAIN ),
				'id'      => apply_filters( 'TieLabs/views_meta_field', 'tie_views' ),
				'type'    => 'number',
				'default' => tie_get_option( 'views_starter_number', 0 )
			));
	}

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Post format', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'id'      => 'tie_post_head',
			'type'    => 'visual',
			'columns' => 6,
			'toggle'  => array(
					'standard' => '#tie_post_featured-item',
					'thumb'    => '#tie_image_uncropped-item, #tie_image_lightbox-item',
					'video'    => '#tie_embed_code-item, #tie_video_url-item, #tie_video_self-item',
					'audio'    => '#tie_audio_embed-item, #tie_audio_mp3-item, #tie_audio_m4a-item, #tie_audio_oga-item, #tie_audio_soundcloud-item, #tie_audio_soundcloud_play-item , #tie_audio_soundcloud_visual-item',
					'slider'   => '#tie_post_slider-item, #tie_gallery_format_options',
					'map'      => '#tie_googlemap_url-item',),
			'options' => array(
					'standard' => array( esc_html__( 'Standard', TIELABS_TEXTDOMAIN ) => 'formats/format-standard.png' ),
					'thumb'    => array( esc_html__( 'Image', TIELABS_TEXTDOMAIN ) => 'formats/format-img.png' ),
					'video'    => array( esc_html__( 'Video', TIELABS_TEXTDOMAIN ) => 'formats/format-video.png' ),
					'audio'    => array( esc_html__( 'Audio', TIELABS_TEXTDOMAIN ) => 'formats/format-audio.png' ),
					'slider'   => array( esc_html__( 'Slider', TIELABS_TEXTDOMAIN ) => 'formats/format-slider.png' ),
					'map'      => array( esc_html__( 'Map', TIELABS_TEXTDOMAIN ) => 'formats/format-map.png' ),
		)));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Show the featured image', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_post_featured',
			'type'    => 'select',
			'class'   => 'tie_post_head',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes', TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No', TIELABS_TEXTDOMAIN ),
		)));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Uncropped featured image', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_image_uncropped',
			'type'    => 'select',
			'class'   => 'tie_post_head',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes', TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No', TIELABS_TEXTDOMAIN ),
		)));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Featured image lightbox', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_image_lightbox',
			'type'    => 'select',
			'class'   => 'tie_post_head',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes', TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No', TIELABS_TEXTDOMAIN ),
		)));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Embed Code', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_embed_code',
			'type'  => 'textarea',
			'class' => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'     => esc_html__( 'Self Hosted Video', TIELABS_TEXTDOMAIN ),
			'id'       => 'tie_video_self',
			'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
			'type'     => 'text',
			'class'    => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'     => esc_html__( 'Video URL', TIELABS_TEXTDOMAIN ),
			'id'       => 'tie_video_url',
			'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
			'type'     => 'text',
			'hint'     => esc_html__( 'supports : YouTube, Vimeo, Viddler, Qik, Hulu, FunnyOrDie, DailyMotion, WordPress.tv and blip.tv', TIELABS_TEXTDOMAIN ),
			'class'    => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Embed Code', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_audio_embed',
			'type'  => 'textarea',
			'class' => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'     => esc_html__( 'MP3 file URL', TIELABS_TEXTDOMAIN ),
			'id'       => 'tie_audio_mp3',
			'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
			'type'     => 'text',
			'class'    => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'M4A file URL', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_audio_m4a',
			'type'  => 'text',
			'class' => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'OGA file URL', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_audio_oga',
			'type'  => 'text',
			'class' => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'     => esc_html__( 'SoundCloud URL', TIELABS_TEXTDOMAIN ),
			'id'       => 'tie_audio_soundcloud',
			'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
			'type'     => 'text',
			'class'    => 'tie_post_head',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Google Maps URL', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_googlemap_url',
			'type'  => 'text',
			'class' => 'tie_post_head',
		));

?>
	<div class="tie_post_head-options" id="tie_gallery_format_options">
		<input id="tie_upload_image" type="button" class="tie-primary-button button button-primary button-large" value="<?php esc_html_e( 'Add Image', TIELABS_TEXTDOMAIN ) ?>">

		<ul id="tie-gallery-items" class="option-item">
			<?php

				if( $gallery = tie_get_postdata( 'tie_post_gallery' )){
					$gallery = maybe_unserialize( $gallery );
				}

				$i=0;
				if( ! empty( $gallery ) && is_array( $gallery )){
					foreach( $gallery as $slide ){
						$i++; ?>

						<li id="listItem_<?php echo esc_attr( $i ) ?>"  class="ui-state-default">
							<div class="gallery-img img-preview"><?php echo wp_get_attachment_image( $slide['id'] , 'thumbnail' );  ?>
								<input id="tie_post_gallery[<?php echo esc_attr( $i ) ?>][id]" name="tie_post_gallery[<?php echo esc_attr( $i ) ?>][id]" value="<?php echo esc_attr( $slide['id'] ) ?>" type="hidden" />
								<a class="del-img-all"></a>
							</div>
						</li>

						<?php
					}
				}
			?>
		</ul>
	</div>

	<script>
		var nextImgCell = <?php echo esc_js( $i+1 ) ?>;

		jQuery(document).ready(function(){
			jQuery(function(){
				jQuery( "#tie-gallery-items" ).sortable({placeholder: "tie-state-highlight"});
			});

			// Uploading files
			var tie_slider_uploader;
			jQuery(document).on("click", "#tie_upload_image" , function( event ){
				event.preventDefault();
				tie_slider_uploader = wp.media.frames.tie_slider_uploader = wp.media({
					title: '<?php esc_html_e( 'Add Image', TIELABS_TEXTDOMAIN ) ?>',
					library: {type: 'image'},
					button: {text: '<?php esc_html_e( 'Select', TIELABS_TEXTDOMAIN ) ?>'},
					multiple: true,
				});

				tie_slider_uploader.on( 'select', function(){
					var selection = tie_slider_uploader.state().get('selection');
					selection.map( function( attachment ){
						attachment = attachment.toJSON();
						jQuery('#tie-gallery-items').append('\
							<li id="listItem_'+ nextImgCell +'" class="ui-state-default">\
								<div class="gallery-img img-preview">\
									<img src="'+attachment.url+'" alt=""><input id="tie_post_gallery['+ nextImgCell +'][id]" name="tie_post_gallery['+ nextImgCell +'][id]" value="'+attachment.id+'" type="hidden">\
									<a class="del-img-all"></a>\
								</div>\
							</li>\
						');

						nextImgCell ++;
					});
				});
				tie_slider_uploader.open();
			});
		});
	</script>
	<?php

	tie_build_post_option(
		array(
			'name'     => esc_html__( 'Custom Slider', TIELABS_TEXTDOMAIN ),
			'id'       => 'tie_post_slider',
			'type'     => 'select',
			'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
			'class'    => 'tie_post_head',
			'options'  => tie_get_custom_sliders( true ),
	));

} // is post
