<?php

	$category_id = $GLOBALS['category_id'];

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Category Style', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	tie_build_category_option(
		array(
			'name' => esc_html__( 'Primary Color', TIELABS_TEXTDOMAIN ),
			'id'   => 'cat_color',
			'cat'  => $category_id,
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

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Background Color', TIELABS_TEXTDOMAIN ),
			'id'    => 'background_color',
			'type'  => 'color',
			'cat'   => $category_id,
		));

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Background Color 2', TIELABS_TEXTDOMAIN ),
			'id'    => 'background_color_2',
			'type'  => 'color',
			'cat'   => $category_id,
		));

	tie_build_category_option(
		array(
			'name'   => esc_html__( 'Background Image type', TIELABS_TEXTDOMAIN ),
			'id'     => 'background_type',
			'type'   => 'radio',
			'cat'    => $category_id,
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

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Background Pattern', TIELABS_TEXTDOMAIN ),
			'id'      => 'background_pattern',
			'type'    => 'visual',
			'class'   => 'background_type',
			'options' => $patterns,
			'cat'     => $category_id,
		));

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Background Image', TIELABS_TEXTDOMAIN ),
			'id'    => 'background_image',
			'class' => 'background_type',
			'type'  => 'background',
			'cat'   => $category_id,
		));

	tie_build_theme_option(
		array(
			'type'  => 'header',
			'title' => esc_html__( 'Background Settings', TIELABS_TEXTDOMAIN ),
		));

	tie_build_category_option(
		array(
			'name' => esc_html__( 'Dots overlay layer', TIELABS_TEXTDOMAIN ),
			'id'   => 'background_dots',
			'type' => 'checkbox',
			'cat'  => $category_id,
		));

	tie_build_category_option(
		array(
			'name'   => esc_html__( 'Background dimmer', TIELABS_TEXTDOMAIN ),
			'id'     => 'background_dimmer',
			'toggle' => '#background_dimmer_value-item, #background_dimmer_color-item',
			'type'   => 'checkbox',
			'cat'  => $category_id,
		));

	tie_build_category_option(
		array(
			'name' => esc_html__( 'Background dimmer', TIELABS_TEXTDOMAIN ),
			'id'   => 'background_dimmer_value',
			'hint' => esc_html__( 'Value between 0 and 100 to dim background image. 0 - no dim, 100 - maximum dim.', TIELABS_TEXTDOMAIN ),
			'type' => 'number',
			'cat'  => $category_id,
		));

	tie_build_category_option(
		array(
			'name'    => esc_html__( 'Background dimmer color', TIELABS_TEXTDOMAIN ),
			'id'      => 'background_dimmer_color',
			'type'    => 'radio',
			'cat'     => $category_id,
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

	tie_build_category_option(
		array(
			'name'  => esc_html__( 'Custom CSS', TIELABS_TEXTDOMAIN ),
			'id'    => 'cat_custom_css',
			'class' => 'tie-css',
			'type'  => 'textarea',
			'cat'   => $category_id,
		));
?>
