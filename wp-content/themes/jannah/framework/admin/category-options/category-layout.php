<?php

	$category_id = $GLOBALS['category_id'];

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Category Layout', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'id'      => 'category_layout',
			'type'    => 'visual',
			'cat'     => $category_id,
			'columns' => 8,
			'options' => array(
				''               => array( esc_html__( 'Default', TIELABS_TEXTDOMAIN ) => 'default.png' ),
				'excerpt'        => array( esc_html__( 'Classic', TIELABS_TEXTDOMAIN )          => 'archives/blog.png' ),
				'full_thumb'     => array( esc_html__( 'Large Thumbnail', TIELABS_TEXTDOMAIN )  => 'archives/full-thumb.png' ),
				'content'        => array( esc_html__( 'Content', TIELABS_TEXTDOMAIN )          => 'archives/content.png' ),
				'timeline'       => array( esc_html__( 'Timeline', TIELABS_TEXTDOMAIN )         => 'archives/timeline.png' ),
				'masonry'        => array( esc_html__( 'Masonry', TIELABS_TEXTDOMAIN ).' #1'    => 'archives/masonry.png' ),
				'overlay'        => array( esc_html__( 'Masonry', TIELABS_TEXTDOMAIN ).' #2'    => 'archives/overlay.png' ),
				'overlay-spaces' => array( esc_html__( 'Masonry', TIELABS_TEXTDOMAIN ).' #3'    => 'archives/overlay-spaces.png' ),
				'first_big'      => array( esc_html__( 'Large Post Above', TIELABS_TEXTDOMAIN ) => 'archives/first_big.png' ),
				'overlay-title'  => array( esc_html__( 'Overlay Title', TIELABS_TEXTDOMAIN )    => 'archives/overlay-title.png' ),
				'overlay-title-center' => array( esc_html__( 'Overlay Title Centered', TIELABS_TEXTDOMAIN ) => 'archives/overlay-title-center.png' ),
			)));

	tie_build_category_option(
		array(
			'name' => esc_html__( 'Excerpt Length', TIELABS_TEXTDOMAIN ),
			'id'   => 'category_excerpt_length',
			'type' => 'number',
			'cat'  => $category_id,
		));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Pagination', TIELABS_TEXTDOMAIN ),
			'id'      => 'category_pagination',
			'type'    => 'radio',
			'cat'     => $category_id,
			'options' => array(
				''          => esc_html__( 'Default',           TIELABS_TEXTDOMAIN ),
				'next-prev' => esc_html__( 'Next and Previous', TIELABS_TEXTDOMAIN ),
				'numeric'   => esc_html__( 'Numeric',           TIELABS_TEXTDOMAIN ),
				'load-more' => esc_html__( 'Load More',         TIELABS_TEXTDOMAIN ),
				'infinite'  => esc_html__( 'Infinite Scroll',   TIELABS_TEXTDOMAIN ),
			)));

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Media Icon Overlay', TIELABS_TEXTDOMAIN ),
			'id'    => 'category_media_overlay',
			'type'  => 'checkbox',
			'cat'   => $category_id,
		));

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Category Page Layout', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'id'      => 'cat_theme_layout',
			'type'    => 'visual',
			'cat'     => $category_id,
			'columns' => 5,
			'options' => array(
				''       => array( esc_html__( 'Default', TIELABS_TEXTDOMAIN ) => 'default.png' ),
				'full'   => array( esc_html__( 'Full-Width', TIELABS_TEXTDOMAIN ) => 'layouts/layout-full.png'   ),
				'boxed'  => array( esc_html__( 'Boxed', TIELABS_TEXTDOMAIN )      => 'layouts/layout-boxed.png'  ),
				'framed' => array( esc_html__( 'Framed', TIELABS_TEXTDOMAIN )     => 'layouts/layout-framed.png' ),
				'border' => array( esc_html__( 'Bordered', TIELABS_TEXTDOMAIN )   => 'layouts/layout-border.png' ),
			)));
