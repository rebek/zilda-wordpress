<?php

	if( TIELABS_WOOCOMMERCE_IS_ACTIVE ){
		if( get_the_ID() == wc_get_page_id( 'shop' ) ){

			tie_build_theme_option(
				array(
					'text' =>  sprintf(
						esc_html__( 'Control WooCommerce sidebar settings from the theme options page &gt; %1$sWooCommerce settings%2$s.', TIELABS_TEXTDOMAIN ),
						'<a href="'. admin_url( 'admin.php?page=tie-theme-options#tie-options-tab-woocommerce-target' ) .'">',
						'</a>'
					),
					'type' => 'message',
				));

				return;
		}
	}

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Sidebar Position', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'id'      => 'tie_sidebar_pos',
			'type'    => 'visual',
			'columns' => 5,
			'options' => array(
				''           => array( esc_html__( 'Default', TIELABS_TEXTDOMAIN )         => 'default.png' ),
				'right'	     => array( esc_html__( 'Sidebar Right', TIELABS_TEXTDOMAIN )   => 'sidebars/sidebar-right.png' ),
				'left'	     => array( esc_html__( 'Sidebar Left', TIELABS_TEXTDOMAIN )    => 'sidebars/sidebar-left.png' ),
				'full'	     => array( esc_html__( 'Without Sidebar', TIELABS_TEXTDOMAIN ) => 'sidebars/sidebar-full-width.png' ),
				'one-column' => array( esc_html__( 'One Column', TIELABS_TEXTDOMAIN )      => 'sidebars/sidebar-one-column.png' ),
		)));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Sticky Sidebar', TIELABS_TEXTDOMAIN ),
			'id'     => 'tie_sticky_sidebar',
			'type'   => 'select',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Yes',     TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'No',      TIELABS_TEXTDOMAIN ),
		)));

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Custom Sidebar', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Choose Sidebar', TIELABS_TEXTDOMAIN ),
			'id'      => 'tie_sidebar_post',
			'type'    => 'select',
			'options' => tie_get_registered_sidebars(),
		));
