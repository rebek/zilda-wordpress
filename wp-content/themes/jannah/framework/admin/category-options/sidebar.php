<?php

	$category_id = $GLOBALS['category_id'];

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Category Sidebar', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'id'      => 'cat_sidebar_pos',
			'type'    => 'visual',
			'cat'     => $category_id,
			'columns' => 5,
			'options' => array(
					''           => array( esc_html__( 'Default', TIELABS_TEXTDOMAIN ) => 'default.png' ),
					'right'	     => array( esc_html__( 'Sidebar Right', TIELABS_TEXTDOMAIN ) => 'sidebars/sidebar-right.png' ),
					'left'	     => array( esc_html__( 'Sidebar Left', TIELABS_TEXTDOMAIN ) => 'sidebars/sidebar-left.png' ),
					'full'	     => array( esc_html__( 'Without Sidebar', TIELABS_TEXTDOMAIN ) => 'sidebars/sidebar-full-width.png' ),
					'one-column' => array( esc_html__( 'One Column', TIELABS_TEXTDOMAIN ) => 'sidebars/sidebar-one-column.png' ),
		)));

	tie_build_category_option(
		array(
			'name'   => esc_html__( 'Sticky Sidebar', TIELABS_TEXTDOMAIN ),
			'id'     => 'cat_sticky_sidebar',
			'cat'    => $category_id,
			'type'   => 'select',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
		)));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Custom Sidebar', TIELABS_TEXTDOMAIN ),
			'id'      => 'cat_sidebar',
			'type'    => 'select',
			'cat'     => $category_id,
			'options' => tie_get_registered_sidebars(),
		));

