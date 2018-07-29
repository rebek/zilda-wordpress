<?php

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Page Layout', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'id'      => 'tie_theme_layout',
			'type'    => 'visual',
			'columns' => 5,
			'options' => array(
				''       => array( esc_html__( 'Default', TIELABS_TEXTDOMAIN ) => 'default.png' ),
				'full'   => array( esc_html__( 'Full-Width', TIELABS_TEXTDOMAIN ) => 'layouts/layout-full.png'   ),
				'boxed'  => array( esc_html__( 'Boxed', TIELABS_TEXTDOMAIN )      => 'layouts/layout-boxed.png'  ),
				'framed' => array( esc_html__( 'Framed', TIELABS_TEXTDOMAIN )     => 'layouts/layout-framed.png' ),
				'border' => array( esc_html__( 'Bordered', TIELABS_TEXTDOMAIN )   => 'layouts/layout-border.png' ),
			)));


	if( get_post_type() == 'post' ){

		tie_build_theme_option(
			array(
				'title' => esc_html__( 'Post Layout', TIELABS_TEXTDOMAIN ),
				'type'  => 'header',
			));

		tie_build_post_option(
			array(
				'id'      => 'tie_post_layout',
				'type'    => 'visual',
				'columns' => 5,
				'toggle'  => array(
					'' => '',
					'4' => '#tie_featured_bg_title, #tie_featured_use_fea-item, #tie_featured_custom_bg-item',
					'5' => '#tie_featured_bg_title, #tie_featured_use_fea-item, #tie_featured_custom_bg-item',
					'8' => '#tie_featured_bg_title, #tie_featured_use_fea-item, #tie_featured_custom_bg-item, #tie_featured_bg_color-item',),
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
				'id'    => 'tie_featured_bg_title',
				'type'  => 'header',
				'class' => 'tie_post_layout',
			));

		tie_build_post_option(
			array(
				'name'  => esc_html__( 'Use the featured image', TIELABS_TEXTDOMAIN ),
				'id'    => 'tie_featured_use_fea',
				'type'  => 'select',
				'class' => 'tie_post_layout',
				'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
				)));

		tie_build_post_option(
			array(
				'name'     => esc_html__( 'Upload Custom Image', TIELABS_TEXTDOMAIN ),
				'id'       => 'tie_featured_custom_bg',
				'type'     => 'upload',
				'pre_text' => esc_html__( '- OR -', TIELABS_TEXTDOMAIN ),
				'class'    => 'tie_post_layout',
			));

		tie_build_post_option(
			array(
				'name'  => esc_html__( 'Background Color', TIELABS_TEXTDOMAIN ),
				'id'    => 'tie_featured_bg_color',
				'type'  => 'color',
				'class' => 'tie_post_layout',
			));

	}
?>
