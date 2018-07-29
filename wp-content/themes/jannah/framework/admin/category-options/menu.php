<?php

	$category_id = $GLOBALS['category_id'];

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Custom Menu', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Custom Menu', TIELABS_TEXTDOMAIN ),
			'id'      => 'cat_menu',
			'type'    => 'select',
			'options' => tie_get_all_menus( true ),
			'cat'     => $category_id,
		));

	/*
	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Logo in the Sticky Menu', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	if( ! tie_get_option('stick_nav') ){

		tie_build_theme_option(
			array(
				'text' => esc_html__( 'You need to enable The Sticky Menu option from the theme options page &gt; Header Settings &gt; Sticky Menu to use these options.', TIELABS_TEXTDOMAIN ),
				'type' => 'message',
			));
	}
	else{

		tie_build_category_option(
			array(
				'name'   => esc_html__( 'Sticky Menu Logo', TIELABS_TEXTDOMAIN ),
				'id'     => 'sticky_logo_type',
				'type'   => 'radio',
				'cat'     => $category_id,
				'toggle' => array(
					'none'    => '',
					'default' => '',
					'custom'  => '#sticky-logo-options',),
				'options' => array(
					''        => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'none'    => esc_html__( 'Disable', TIELABS_TEXTDOMAIN ),
					'default' => esc_html__( 'Use the default Logo', TIELABS_TEXTDOMAIN ),
					'custom'  => esc_html__( 'Custom Sticky Logo', TIELABS_TEXTDOMAIN ) . ' <small style="color: red;">'. esc_html__( ' - Requries a Custom Logo for the page, you cns set from the Logo tab.', TIELABS_TEXTDOMAIN ) .'</small>',
				)));

		echo '<div id="sticky-logo-options" class="sticky_logo_type-options">';

			tie_build_category_option(
				array(
					'name'  => esc_html__( 'Logo Image', TIELABS_TEXTDOMAIN ),
					'id'    => 'logo_sticky',
					'type'  => 'upload',
					'cat'   => $category_id,
				));

			tie_build_category_option(
				array(
					'name'  => esc_html__( 'Logo Image (Retina Version @2x)', TIELABS_TEXTDOMAIN ),
					'id'    => 'logo_retina_sticky',
					'type'  => 'upload',
					'cat'   => $category_id,
					'hint'	=> esc_html__( 'Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.', TIELABS_TEXTDOMAIN ),
				));

		echo'</div>';
	}
	*/
