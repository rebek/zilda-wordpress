<?php

	$category_id = $GLOBALS['category_id'];

	$sliders_list = tie_get_custom_sliders( true );

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'TieLabs Slider', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'name'   => esc_html__( 'Enable', TIELABS_TEXTDOMAIN ),
			'id'     => 'featured_posts',
			'toggle' => '#main-slider-options',
			'type'   => 'checkbox',
			'cat'     => $category_id,
		));


	$current_slider = tie_get_category_option( 'featured_posts_style', $category_id );
	$current_slider = ! empty( $current_slider ) ? $current_slider : 1 ;

?>

<div id="main-slider-options" style="display: none;" class="slider_<?php echo esc_attr( $current_slider )?>-container">

	<?php

		$main_slider_styles = array();

		$slider_path = 'blocks/block-';
		for( $slider = 1; $slider <= 16; $slider++ ){

			$slide_class 	= 'slider_'.$slider;
			$slide_img 		= $slider_path.'slider_'.$slider.'.png';

			$main_slider_styles[ $slider ] = array( sprintf( esc_html__( 'Slider #%s', TIELABS_TEXTDOMAIN ), $slider ) => array( $slide_class => $slide_img ) );
		}

		$main_slider_styles['videos_list'] = array( esc_html__( 'Videos Playlist', TIELABS_TEXTDOMAIN ) => array( 'video_play_list' => $slider_path. 'videos_list.png' ) );


		tie_build_category_option(
			array(
				'id'      => 'featured_posts_style',
				'type'    => 'visual',
				'cat'     => $category_id,
				'options' => $main_slider_styles,
			));

		tie_build_category_option(
			array(
				'name'    =>  esc_html__( 'Number of posts to show', TIELABS_TEXTDOMAIN ),
				'id'      => 'featured_posts_number',
				'class'   => 'featured-posts',
				'default' => 10,
				'type'    => 'number',
				'cat'     => $category_id,
			));

		tie_build_category_option(
			array(
				'name'   => esc_html__( 'Query Type', TIELABS_TEXTDOMAIN ),
				'id'     => 'featured_posts_query',
				'class'  => 'featured-posts',
				'type'   => 'radio',
				'cat'     => $category_id,
				'toggle' => array(
						'recent' => '',
						'random' => '',
						'custom' => '#featured_posts_custom-item' ),
				'options' => array(
						'recent' => esc_html__( 'Recent Posts', TIELABS_TEXTDOMAIN ),
						'random' => esc_html__( 'Random Posts', TIELABS_TEXTDOMAIN ),
						'custom' => esc_html__( 'Custom Slider', TIELABS_TEXTDOMAIN ),
				)));

		echo '<div class="featured-posts-options">';

		tie_build_category_option(
			array(
				'name'    => esc_html__( 'Custom Slider', TIELABS_TEXTDOMAIN ),
				'id'      => 'featured_posts_custom',
				'class'   => 'featured_posts_query',
				'type'    => 'select',
				'cat'     => $category_id,
				'options' => $sliders_list,
			));

		echo '</div>';

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Colored Mask', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_posts_colored_mask',
				'class' => 'featured-posts',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Media Icon Overlay', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_posts_media_overlay',
				'class' => 'featured-posts',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  =>  esc_html__( 'Animate Automatically', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_auto',
				'class' => 'featured-posts',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Title Length', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_posts_title_length',
				'class'	=> 'featured-posts',
				'type'  => 'number',
				'cat'   => $category_id,
			));


		echo '<div class="excerpt-options featured-posts-options">';
			tie_build_category_option(
				array(
					'name'   => esc_html__( 'Posts Excerpt', TIELABS_TEXTDOMAIN ),
					'id'     => 'featured_posts_excerpt',
					'type'   => 'checkbox',
					'toggle' => '#featured_posts_excerpt_length-item',
					'cat'    => $category_id,
				));

			tie_build_category_option(
				array(
					'name'  => esc_html__( 'Posts Excerpt Length', TIELABS_TEXTDOMAIN ),
					'id'    => 'featured_posts_excerpt_length',
					'type'  => 'number',
					'cat'   => $category_id,
				));
		echo '</div>';


		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Post Primary Category', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_posts_category',
				'class'	=> 'slider-category-option block-slider-categories-meta-options featured-posts',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Review Rating', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_posts_review',
				'class'	=> 'slider-review-option block-slider-review-meta-options featured-posts',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Post Meta', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_posts_date',
				'class'	=> 'featured-posts',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Playlist title', TIELABS_TEXTDOMAIN ),
				'id'    => 'featured_videos_list_title',
				'class' => 'featured-videos',
				'type'	=> 'text',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name'  => esc_html__( 'Videos List', TIELABS_TEXTDOMAIN ),
				'hint'  => esc_html__( 'Enter each video url in a seprated line.', TIELABS_TEXTDOMAIN ) . ' <strong>' . esc_html__( 'Supports: YouTube and Vimeo videos only.', TIELABS_TEXTDOMAIN ).'</strong>',
				'id'    => 'featured_videos_list',
				'class' => 'featured-videos',
				'type'  => 'textarea',
				'cat'   => $category_id,
			));

		tie_build_theme_option(
			array(
				'title' => esc_html__( 'Styling', TIELABS_TEXTDOMAIN ),
				'type'  => 'header',
			));

		tie_build_category_option(
			array(
				'name'   => esc_html__( 'Dark Skin', TIELABS_TEXTDOMAIN ),
				'id'    => 'dark_skin',
				'class' => 'featured-videos',
				'type'  => 'checkbox',
				'cat'   => $category_id,
			));

		tie_build_category_option(
			array(
				'name' => esc_html__( 'Background Color', TIELABS_TEXTDOMAIN ),
				'id'   => 'featured_posts_color',
				'type' => 'color',
				'cat'  => $category_id,
			));

		tie_build_category_option(
			array(
				'name' => esc_html__( 'Background Image', TIELABS_TEXTDOMAIN ),
				'id'   => 'featured_posts_bg',
				'type' => 'upload',
				'cat'  => $category_id,
			));

		tie_build_category_option(
			array(
				'name' => esc_html__( 'Background Video', TIELABS_TEXTDOMAIN ),
				'id'   => 'featured_posts_bg_video',
				'type' => 'text',
				'cat'  => $category_id,
			));

		tie_build_category_option(
			array(
				'name'   => esc_html__( 'Parallax', TIELABS_TEXTDOMAIN ),
				'id'     => 'featured_posts_parallax',
				'type'   => 'checkbox',
				'toggle' => '#featured_posts_parallax_effect-item',
				'cat'    => $category_id,
			));

		tie_build_category_option(
			array(
				'name' => esc_html__( 'Parallax Effect', TIELABS_TEXTDOMAIN ),
				'id'   => 'featured_posts_parallax_effect',
				'type' => 'select',
				'cat'  => $category_id,
				'options' => array(
					'scroll'         => esc_html__( 'Scroll', TIELABS_TEXTDOMAIN ),
					'scale'          => esc_html__( 'Scale', TIELABS_TEXTDOMAIN ),
					'opacity'        => esc_html__( 'Opacity', TIELABS_TEXTDOMAIN ),
					'scroll-opacity' => esc_html__( 'Scroll + Opacity', TIELABS_TEXTDOMAIN ),
					'scale-opacity'  => esc_html__( 'Scale + Opacity', TIELABS_TEXTDOMAIN ),
			)));
	?>
</div><!-- #main-slider-options /-->

<?php


	# Revolution Slider
	if( TIELABS_REVSLIDER_IS_ACTIVE ){

		tie_build_theme_option(
			array(
				'title' => esc_html__( 'Revolution Slider', TIELABS_TEXTDOMAIN ),
				'type'  => 'header',
			));

		$rev_slider = new RevSlider();
		$rev_slider = $rev_slider->getArrSlidersShort();

		if( ! empty( $rev_slider ) && is_array( $rev_slider )){

			$arrSliders = array( '' => esc_html__( 'Disable', TIELABS_TEXTDOMAIN ) );

			foreach( $rev_slider as $id => $item ){
				$name = empty( $item ) ? esc_html__( 'Unnamed', TIELABS_TEXTDOMAIN ) : $item;
				$arrSliders[ $id ] = $name . ' | #' .$id;
			}

			tie_build_theme_option(
				array(
					'text' => esc_html__( 'Will override the sliders above.', TIELABS_TEXTDOMAIN ),
					'type' => 'message',
				));

			tie_build_category_option(
				array(
					'name'    => esc_html__( 'Choose Slider', TIELABS_TEXTDOMAIN ),
					'id'      => 'revslider',
					'type'    => 'select',
					'cat'     => $category_id,
					'options' => $arrSliders,
				));
		}
		else{

			tie_build_theme_option(
				array(
					'text' => esc_html__( 'No sliders found, Please create a slider.', TIELABS_TEXTDOMAIN ),
					'type' => 'error',
				));
		}
	}


	# LayerSlider
	if( TIELABS_LS_Sliders_IS_ACTIVE ){

		tie_build_theme_option(
			array(
				'title' => esc_html__( 'LayerSlider', TIELABS_TEXTDOMAIN ),
				'type'  => 'header',
			));

		$ls_sliders = LS_Sliders::find(array('limit' => 100));

		if( ! empty( $ls_sliders ) && is_array( $ls_sliders ) ){

			tie_build_theme_option(
				array(
					'text' => esc_html__( 'Will override the sliders above.', TIELABS_TEXTDOMAIN ),
					'type' => 'message',
				));

			$arrSliders = array( '' => esc_html__( 'Disable', TIELABS_TEXTDOMAIN ) );

			foreach( $ls_sliders as $item ){
				$name = empty( $item['name'] ) ? esc_html__( 'Unnamed', TIELABS_TEXTDOMAIN ) : $item['name'];
				$arrSliders[ $item['id'] ] = $name . ' | #' .$item['id'];
			}

			tie_build_category_option(
				array(
					'name'    => esc_html__( 'Choose Slider', TIELABS_TEXTDOMAIN ),
					'id'      => 'lsslider',
					'type'    => 'select',
					'cat'     => $category_id,
					'options' => $arrSliders,
				));

		}
		else{

			tie_build_theme_option(
				array(
					'text' => esc_html__( 'No sliders found, Please create a slider.', TIELABS_TEXTDOMAIN ),
					'type' => 'error',
				));
		}
	}

?>
