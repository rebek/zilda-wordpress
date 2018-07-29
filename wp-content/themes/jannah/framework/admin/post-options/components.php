<?php

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Post Components', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));

	if( get_post_type() == 'post' ){

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Categories', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_categories',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Tags', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_tags',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Post Meta', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_meta',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Post Author box', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_author',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'	  => esc_html__( 'Next/Prev posts', TIELABS_TEXTDOMAIN ),
				'id'		  => 'tie_hide_nav',
				'type'	  => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Newsletter', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_newsletter',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Related Posts', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_related',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));

		tie_build_post_option(
			array(
				'name'    => esc_html__( 'Fly Check Also Box', TIELABS_TEXTDOMAIN ),
				'id'      => 'tie_hide_check_also',
				'type'    => 'select',
				'options' => array(
						''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
						'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
						'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
			)));
	} // if posts

	tie_build_post_option(
		array(
			'name'	  => esc_html__( 'Above Post share Buttons', TIELABS_TEXTDOMAIN ),
			'id'		  => 'tie_hide_share_top',
			'type'	  => 'select',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
		)));

	tie_build_post_option(
		array(
			'name'	  => esc_html__( 'Below Post Share Buttons', TIELABS_TEXTDOMAIN ),
			'id'		  => 'tie_hide_share_bottom',
			'type'	  => 'select',
			'options' => array(
					''    => esc_html__( 'Default', TIELABS_TEXTDOMAIN ),
					'yes' => esc_html__( 'Hide',    TIELABS_TEXTDOMAIN ),
					'no'  => esc_html__( 'Show',    TIELABS_TEXTDOMAIN ),
		)));
?>
