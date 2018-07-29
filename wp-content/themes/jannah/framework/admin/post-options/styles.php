<?php

	# Extend the background of the first section to cover the Header
	echo '<div id="tie_header_extend_bg_option">';

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Header Background', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Extend the background of the first section to cover the Header', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_header_extend_bg',
			'type' => 'checkbox',
		));

	echo '</div>';


	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Primary Color', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Primary Color', TIELABS_TEXTDOMAIN ),
			'id'   => 'post_color',
			'type' => 'color',
	));

	tie_build_theme_option(
		array(
			'title' =>	esc_html__( 'Background', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_theme_option(
		array(
			'text'  => esc_html__( 'Bordered Layout supports plain background color only.', TIELABS_TEXTDOMAIN ),
			'type'  => 'message',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Background Color', TIELABS_TEXTDOMAIN ),
			'id'    => 'background_color',
			'type'  => 'color',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Background Color 2', TIELABS_TEXTDOMAIN ),
			'id'    => 'background_color_2',
			'type'  => 'color',
		));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Background Image type', TIELABS_TEXTDOMAIN ),
			'id'     => 'background_type',
			'type'   => 'radio',
			'toggle' => array(
				''        => '',
				'pattern' => '#background_pattern-item',
				'image'   => '#background_image-item',),
			'options' => array(
				''        => esc_html__( 'None', TIELABS_TEXTDOMAIN ),
				'pattern' => esc_html__( 'Pattern', TIELABS_TEXTDOMAIN ),
				'image'   => esc_html__( 'Image', TIELABS_TEXTDOMAIN ),
			)));

	$patterns = array();
	for( $i=1 ; $i<=47 ; $i++ ){
		$patterns['body-bg'.$i]	=	'patterns/'.$i.'.png';
	}

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Background Pattern', TIELABS_TEXTDOMAIN ),
			'id'      => 'background_pattern',
			'type'    => 'visual',
			'class'   => 'background_type',
			'options' => $patterns,
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Background Image', TIELABS_TEXTDOMAIN ),
			'id'    => 'background_image',
			'class' => 'background_type',
			'type'  => 'background',
		));

	tie_build_theme_option(
		array(
			'type'  => 'header',
			'title' => esc_html__( 'Background Settings', TIELABS_TEXTDOMAIN ),
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Dots overlay layer', TIELABS_TEXTDOMAIN ),
			'id'   => 'background_dots',
			'type' => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name'   => esc_html__( 'Background dimmer', TIELABS_TEXTDOMAIN ),
			'id'     => 'background_dimmer',
			'toggle' => '#background_dimmer_value-item, #background_dimmer_color-item',
			'type'   => 'checkbox',
		));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Background dimmer', TIELABS_TEXTDOMAIN ),
			'id'   => 'background_dimmer_value',
			'hint' => esc_html__( 'Value between 0 and 100 to dim background image. 0 - no dim, 100 - maximum dim.', TIELABS_TEXTDOMAIN ),
			'type' => 'number',
		));

	tie_build_post_option(
		array(
			'name'    => esc_html__( 'Background dimmer color', TIELABS_TEXTDOMAIN ),
			'id'      => 'background_dimmer_color',
			'type'    => 'radio',
			'options'	=> array(
				'black' => esc_html__( 'Black', TIELABS_TEXTDOMAIN ),
				'white' => esc_html__( 'White', TIELABS_TEXTDOMAIN ),
			)));

	tie_build_theme_option(
		array(
			'title' =>	esc_html__( 'Custom CSS', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_theme_option(
		array(
			'text' => esc_html__( 'Paste your CSS code, do not include any tags or HTML in the field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.', TIELABS_TEXTDOMAIN ),
			'type' => 'message',
		));

	tie_build_post_option(
		array(
			'name'  => esc_html__( 'Custom CSS', TIELABS_TEXTDOMAIN ),
			'id'    => 'tie_custom_css',
			'class' => 'tie-css',
			'type'  => 'textarea',
		));