<?php

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Advertisement', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide Above Post Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_above',
			'type' => 'checkbox',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Custom Above Post Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_get_banner_above',
			'type' => 'textarea',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide Below Post Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_below',
			'type' => 'checkbox',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Custom Below Post Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_get_banner_below',
			'type' => 'textarea',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide Above Content Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_above_content',
			'type' => 'checkbox',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Custom Above Content Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_get_banner_above_content',
			'type' => 'textarea',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Hide Below Content Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_hide_below_content',
			'type' => 'checkbox',
	));

	tie_build_post_option(
		array(
			'name' => esc_html__( 'Custom Below Content Ad', TIELABS_TEXTDOMAIN ),
			'id'   => 'tie_get_banner_below_content',
			'type' => 'textarea',
	));
