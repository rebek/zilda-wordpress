<?php

	$category_id = $GLOBALS['category_id'];

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Post Layout', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'id'      => 'cat_post_layout',
			'type'    => 'visual',
			'cat'     => $category_id,
			'columns' => 5,
			'toggle'  => array(
					'' => '',
					'4' => '#cat_featured_bg_title, #cat_featured_use_fea-item, #cat_featured_custom_bg-item',
					'5' => '#cat_featured_bg_title, #cat_featured_use_fea-item, #cat_featured_custom_bg-item',
					'8' => '#cat_featured_bg_title, #cat_featured_use_fea-item, #cat_featured_custom_bg-item, #cat_featured_bg_color-item',),
			'options' => array(
					''  => array( esc_html__( 'Default', TIELABS_TEXTDOMAIN ) => 'default.png' ),
					'1' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #1' => 'post-layouts/1.png' ),
					'2' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #2' => 'post-layouts/2.png' ),
					'3' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #3' => 'post-layouts/3.png' ),
					'4' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #4' => 'post-layouts/4.png' ),
					'5' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #5' => 'post-layouts/5.png' ),
					'6' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #6' => 'post-layouts/6.png' ),
					'7' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #7' => 'post-layouts/7.png' ),
					'8' => array( esc_html__( 'Layout', TIELABS_TEXTDOMAIN ).' #8' => 'post-layouts/8.png' ),
			)));

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Featured area background', TIELABS_TEXTDOMAIN ),
			'id'    => 'cat_featured_bg_title',
			'type'  => 'header',
			'class' => 'cat_post_layout',
		));

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Use the featured image', TIELABS_TEXTDOMAIN ),
			'id'    => 'cat_featured_use_fea',
			'type'  => 'select',
			'cat'   => $category_id,
			'class' => 'cat_post_layout',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
			)));

	tie_build_category_option(
		array(
			'name'     => esc_html__( 'Upload Custom Image', TIELABS_TEXTDOMAIN ),
			'id'       => 'cat_featured_custom_bg',
			'type'     => 'upload',
			'cat'      => $category_id,
			'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
			'class'    => 'cat_post_layout',
		));

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Background Color', TIELABS_TEXTDOMAIN ),
			'id'    => 'cat_featured_bg_color',
			'type'  => 'color',
			'cat'   => $category_id,
			'class' => 'cat_post_layout',
		));

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Post Format Settings', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Standard Post Format:', TIELABS_TEXTDOMAIN ) .' '. esc_html__( 'Show the featured image', TIELABS_TEXTDOMAIN ),
			'id'      => 'cat_post_featured',
			'type'    => 'select',
			'cat'     => $category_id,
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
		)));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Image Post Format:', TIELABS_TEXTDOMAIN ) .' '. esc_html__( 'Uncropped featured image', TIELABS_TEXTDOMAIN ),
			'id'      => 'cat_image_uncropped',
			'type'    => 'select',
			'cat'     => $category_id,
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
		)));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Image Post Format:', TIELABS_TEXTDOMAIN ) .' '. esc_html__( 'Featured image lightbox', TIELABS_TEXTDOMAIN ),
			'id'      => 'cat_image_lightbox',
			'type'    => 'select',
			'cat'     => $category_id,
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
			)));

