<?php

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Custom Logo', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Custom Logo', TIELABS_TEXTDOMAIN ),
			'id'     => 'custom_logo',
			'toggle' => '#tie-post-logo-item',
			'type'   => 'checkbox',
		));

	echo '<div id="tie-post-logo-item">';

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Logo Settings', TIELABS_TEXTDOMAIN ),
			'id'      => 'logo_setting',
			'type'    => 'radio',
			'toggle'  => array(
				'logo'  => '#logo-item, #logo_retina-item, #logo_retina_width-item, #logo_retina_height-item',
				'title' => '#logo_text-item'),
			'options'	=> array(
				'logo'  => esc_html__( 'Image', TIELABS_TEXTDOMAIN ),
				'title' => esc_html__( 'Site Title', TIELABS_TEXTDOMAIN ),
			)));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Logo Text', TIELABS_TEXTDOMAIN ),
			'id'      => 'logo_text',
			'type'    => 'text',
			'class'   => 'logo_setting',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Logo Image', TIELABS_TEXTDOMAIN ),
			'id'    => 'logo',
			'type'  => 'upload',
			'class' => 'logo_setting',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Logo Image (Retina Version @2x)', TIELABS_TEXTDOMAIN ),
			'id'    => 'logo_retina',
			'type'  => 'upload',
			'class' => 'logo_setting',
			'hint'	=> esc_html__( 'Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.', TIELABS_TEXTDOMAIN ),
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Standard Logo Width for Retina Logo', TIELABS_TEXTDOMAIN ),
			'id'    => 'logo_retina_width',
			'type'  => 'number',
			'class' => 'logo_setting',
			'hint'  => esc_html__( 'If retina logo is uploaded, please enter the standard logo (1x) version width, do not enter the retina logo width.', TIELABS_TEXTDOMAIN ),
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Standard Logo Height for Retina Logo', TIELABS_TEXTDOMAIN ),
			'id'    => 'logo_retina_height',
			'type'  => 'number',
			'class' => 'logo_setting',
			'hint'  => esc_html__( 'If retina logo is uploaded, please enter the standard logo (1x) version height, do not enter the retina logo height.', TIELABS_TEXTDOMAIN ),
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Logo Margin Top', TIELABS_TEXTDOMAIN ),
			'id'   => 'logo_margin',
			'type' => 'number',
			'hint' => esc_html__( 'Leave it empty to use the default value.', TIELABS_TEXTDOMAIN ) ));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Logo Margin Bottom', TIELABS_TEXTDOMAIN ),
			'id'   => 'logo_margin_bottom',
			'type' => 'number',
			'hint' => esc_html__( 'Leave it empty to use the default value.', TIELABS_TEXTDOMAIN ),
		));

	echo '</div>';
?>
