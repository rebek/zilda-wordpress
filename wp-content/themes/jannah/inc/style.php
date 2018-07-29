<?php
/**
 * Theme Custom Styles
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


/*
 * Styles
 */
if( ! function_exists( 'jannah_get_custom_styling' )){

	add_filter( 'TieLabs/CSS/after_theme_color', 'jannah_get_custom_styling' );
	function jannah_get_custom_styling( $out = '' ){

		// Highlighted Color
		if( $color = tie_get_option( 'highlighted_color' )){

			$bright = TIELABS_STYLES::light_or_dark( $color );

			$out .="
				::-moz-selection{
					background-color: $color;
					color: $bright;
				}

				::selection{
					background-color: $color;
					color: $bright;
				}
			";
		}

		// Links Color
		if( $color = tie_get_option( 'links_color' )){
			$out .="
				a{
					color: $color;
				}
			";
		}

		// Links Color Hover
		if( $color = tie_get_option( 'links_color_hover' )){
			$out .="
				a:hover{
					color: $color;
				}
			";
		}

		// Links hover underline
		if( tie_get_option( 'underline_links_hover' )){
			$out .="
				#content a:hover{
					text-decoration: underline !important;
				}
			";
		}


		// Theme Main Borders
		if( $color = tie_get_option( 'borders_color' )){

			$out .="
				.container-wrapper,
				.the-global-title,
				.comment-reply-title,
				.tabs,
				.flex-tabs .flexMenu-popup,
				.magazine1 .tabs-vertical .tabs li a,
				.magazine1 .tabs-vertical:after,
				.mag-box .show-more-button,
				.white-bg .social-icons-item a,
				textarea, input, select,
				.toggle,
				.post-content-slideshow,
				.post-content-slideshow .slider-nav-wrapper,
				.post-footer-on-bottom,
				.pages-numbers a, .pages-nav-item, .first-last-pages .fa, .multiple-post-pages span,
				#story-highlights li,
				.review-item, .review-summary, .user-rate-wrap,
				.review-final-score,
				.tabs a{
					border-color: $color !important;
				}

				.magazine1 .tabs a{
					border-bottom-color: transparent !important;
				}

				.fullwidth-area .tagcloud a:not(:hover){
					background: transparent;
					box-shadow: inset 0 0 0 3px $color;
				}

				.subscribe-widget-content h4:after,
				.white-bg .social-icons-item:before{
					background-color: $color !important;
				}
			";

			if ( TIELABS_WOOCOMMERCE_IS_ACTIVE ){
				$out .="
					.related.products > h2,
					.up-sells > h2,
					.cross-sells > h2,
					.cart_totals > h2,
					.comment-text,
					.related.products,
					.up-sells,
					.cart_totals,
					.cross-sells,
					.woocommerce-product-details__short-description,
					.shop_table,
					form.cart,
					.checkout_coupon{
						border-color: $color !important;
					}
				";
			}

			if ( TIELABS_BUDDYPRESS_IS_ACTIVE ){
				$out .="
					.item-options a,
					.ac-textarea,
					.buddypress-header-outer,
					#groups-list > li,
					#member-list > li,
					#members-list > li,
					.generic-button a,
					#profile-edit-form .editfield,
					ul.button-nav,
					ul.button-nav li a{
						border-color: $color !important;
					}
				";
			}

			if ( TIELABS_BBPRESS_IS_ACTIVE ){
				$out .="
					.bbp-form legend,
					ul.topic,
					.bbp-header,
					.bbp-footer,
					.bbp-body .hentry,
					#wp-bbp_reply_content-editor-container{
						border-color: $color !important;
					}
				";
			}
		}


		// Secondry nav Background
		if( $color = tie_get_option( 'secondry_nav_background' )){
			$darker = TIELABS_STYLES::color_brightness( $color, -30 );
			$bright = TIELABS_STYLES::light_or_dark( $color, true );

			$out .="
			  #tie-wrapper #top-nav{
				  border-width: 0;
			  }

				#tie-wrapper #top-nav,
				#tie-wrapper #top-nav .top-menu ul,
				#tie-wrapper #top-nav .comp-sub-menu,
				#tie-wrapper #top-nav .ticker-content,
				#tie-wrapper #top-nav .ticker-swipe,
				.top-nav-boxed #top-nav .topbar-wrapper,
				.top-nav-dark.top-nav-boxed #top-nav .topbar-wrapper,
				.search-in-top-nav.autocomplete-suggestions{
					background-color : $color;
				}

				#tie-wrapper #top-nav *,
				#tie-wrapper #top-nav .components > li,
				#tie-wrapper #top-nav .comp-sub-menu,
				#tie-wrapper #top-nav .comp-sub-menu li{
					border-color: rgba( $bright, 0.1);
				}

				#tie-wrapper #top-nav .comp-sub-menu .button,
				#tie-wrapper #top-nav .comp-sub-menu .button.guest-btn{
					background-color: $darker;
				}

				#tie-wrapper #top-nav .comp-sub-menu .button,
				#tie-wrapper #top-nav .comp-sub-menu .button.guest-btn,
				.search-in-top-nav.autocomplete-suggestions{
					border-color: $darker;
				}

				#top-nav .weather-menu-item .icon-basecloud-bg:after{
					color: $color;
				}
			";
		}

		// Secondry nav links
		if( $color = tie_get_option( 'topbar_links_color' )){

			$out .="
				#tie-wrapper #top-nav a,
				#tie-wrapper #top-nav .breaking .ticker a,
				#tie-wrapper #top-nav input,
				#tie-wrapper #top-nav .components button#search-submit,
				#tie-wrapper #top-nav .components button#search-submit .fa-spinner,
				#tie-wrapper #top-nav .top-menu li a,
				#tie-wrapper #top-nav .dropdown-social-icons li a span,
				#tie-wrapper #top-nav .components a.button:hover,
				#tie-wrapper #top-nav .components > li > a,
				#tie-wrapper #top-nav .components > li.social-icons-item .social-link:not(:hover) span,
				#tie-wrapper #top-nav .comp-sub-menu .button:hover,
				#tie-wrapper #top-nav .comp-sub-menu .button.guest-btn:hover,
				#tie-body .search-in-top-nav.autocomplete-suggestions a:not(.button){
					color: $color;
				}

				#tie-wrapper #top-nav input::-moz-placeholder{
					color: $color;
				}

				#tie-wrapper #top-nav input:-moz-placeholder{
					color: $color;
				}

				#tie-wrapper #top-nav input:-ms-input-placeholder{
					color: $color;
				}

				#tie-wrapper #top-nav input::-webkit-input-placeholder{
					color: $color;
				}

				#tie-wrapper #top-nav .top-menu .menu li.menu-item-has-children > a:before{
					border-top-color: $color;
				}

				#tie-wrapper #top-nav .top-menu .menu li li.menu-item-has-children > a:before{
					border-top-color: transparent;
					border-left-color: $color;
				}

				.rtl #tie-wrapper #top-nav .top-menu .menu li li.menu-item-has-children > a:before{
					border-left-color: transparent;
					border-right-color: $color;
				}
			";
		}

		// Secondry nav links on hover
		if( $color = tie_get_option( 'topbar_links_color_hover' )){

			$darker = TIELABS_STYLES::color_brightness( $color, -30 );
			$bright = TIELABS_STYLES::light_or_dark( $color );

			$out .="
				#tie-wrapper #top-nav .comp-sub-menu .button:hover,
				#tie-wrapper #top-nav .comp-sub-menu .button.guest-btn:hover,
				#tie-wrapper #top-nav .comp-sub-menu .button.checkout-button,
				.search-in-top-nav.autocomplete-suggestions a.button{
					background-color: $color;
				}

				#tie-wrapper #top-nav a:hover,
				#tie-wrapper #top-nav .top-menu .menu a:hover,
				#tie-wrapper #top-nav .top-menu .menu li:hover > a,
				#tie-wrapper #top-nav .top-menu .menu > li.tie-current-menu > a,
				#tie-wrapper #top-nav .breaking .ticker a:hover,
				#tie-wrapper #top-nav .components > li > a:hover,
				#tie-wrapper #top-nav .components > li:hover > a,
				#tie-wrapper #top-nav .components button#search-submit:hover,
				.search-in-top-nav.autocomplete-suggestions a:not(.button):hover{
					color: $color;
				}

				#tie-wrapper #top-nav .comp-sub-menu .button:hover,
				#tie-wrapper #top-nav .comp-sub-menu .button.guest-btn:hover{
					border-color: $color;
				}

				#tie-wrapper #top-nav .top-menu .menu li.menu-item-has-children:hover > a:before{
					border-top-color: $color;
				}

				#tie-wrapper #top-nav .top-menu .menu li li.menu-item-has-children:hover > a:before{
					border-top-color: transparent;
					border-left-color: $color;
				}

				.rtl #tie-wrapper #top-nav .top-menu .menu li li.menu-item-has-children:hover > a:before{
					border-left-color: transparent;
					border-right-color: $color;
				}

				#tie-wrapper #top-nav .comp-sub-menu .button:hover,
				#tie-wrapper #top-nav .comp-sub-menu .button.guest-btn:hover,
				#tie-wrapper #top-nav .comp-sub-menu .button.checkout-button:hover,
				#tie-wrapper #top-nav .components a.button:hover,
				#tie-wrapper #top-nav .components a.button.guest-btn:hover,
				#tie-wrapper #top-nav .comp-sub-menu a.button.checkout-button,
				.search-in-top-nav.autocomplete-suggestions .widget-post-list a.button{
					color: $bright;
				}

				#tie-wrapper #theme-header #top-nav .comp-sub-menu .button.checkout-button:hover,
				#tie-body .search-in-top-nav.autocomplete-suggestions a.button:hover{
					background-color: $darker;
				}
			";
		}

		// Top-bar text
		if( $color = tie_get_option( 'topbar_text_color' )){

			$rgb = TIELABS_STYLES::rgb_color( $color );

			$out .="
				#tie-wrapper #top-nav,
				#tie-wrapper #top-nav .top-menu ul,
				#tie-wrapper #top-nav .comp-sub-menu,
				.search-in-top-nav.autocomplete-suggestions,
				#top-nav .weather-menu-item .tie-weather-widget{
					color: $color;
				}

				.search-in-top-nav.autocomplete-suggestions .post-meta,
				.search-in-top-nav.autocomplete-suggestions .post-meta a:not(:hover){
					color: rgba( $rgb, 0.7);
				}
			";
		}

		// Breaking News label
		if( $color = tie_get_option( 'breaking_title_bg' )){

			$bright = TIELABS_STYLES::light_or_dark( $color );

			$out .="
				#top-nav .breaking-title{
					color: $bright;
				}

				#top-nav .breaking-title:before{
					background-color: $color;
				}

				#top-nav .breaking-news-nav li:hover{
					background-color: $color;
					border-color: $color;
				}
			";
		}


		// Main nav Background
		if( $color = tie_get_option( 'main_nav_background' )){

			$bright = TIELABS_STYLES::light_or_dark( $color, true );
			$darker = TIELABS_STYLES::color_brightness( $color, -30 );
			$rgb    = TIELABS_STYLES::rgb_color( $color );

			$out .="
				#tie-wrapper #main-nav{
					background-color : $color;
					border-width: 0;
				}

				#tie-wrapper #main-nav.fixed-nav{
					background-color : rgba( $rgb , 0.95);
				}

				#main-nav .main-menu-wrapper,
				#tie-wrapper .main-nav-boxed #main-nav .main-menu-wrapper,
				#tie-wrapper #main-nav .main-menu .menu li > .sub-menu,
				#tie-wrapper #main-nav .main-menu .menu-sub-content,
				#tie-wrapper #main-nav .comp-sub-menu,
				#tie-body .search-in-main-nav.autocomplete-suggestions{
					background-color: $color;
				}

				#main-nav .weather-menu-item .icon-basecloud-bg:after{
					color: $color;
				}

				#tie-wrapper #main-nav .components > li,
				#tie-wrapper #main-nav .comp-sub-menu,
				#tie-wrapper #main-nav .comp-sub-menu li,
				#tie-wrapper #main-nav .main-menu .menu li > .sub-menu > li > a,
				#tie-wrapper #main-nav .main-menu .menu-sub-content > li > a,
				#tie-wrapper #main-nav .main-menu li.mega-link-column > ul > li > a,
				#tie-wrapper #main-nav .main-menu .mega-recent-featured-list a,
				#tie-wrapper #main-nav .main-menu .mega-cat .mega-cat-more-links > li a,
				#tie-wrapper #main-nav .main-menu .cats-horizontal li a,
				#tie-wrapper .main-menu .mega-cat.menu-item-has-children .mega-cat-wrapper{
					border-color: rgba($bright, 0.07);
				}

				#tie-wrapper #main-nav .comp-sub-menu .button,
        #tie-wrapper #main-nav .comp-sub-menu .button.guest-btn,
				.search-in-main-nav.autocomplete-suggestions{
            border-color: $darker;
        }

				#tie-wrapper #main-nav .comp-sub-menu .button,
				#tie-wrapper #main-nav .comp-sub-menu .button.guest-btn{
					background-color: $darker;
				}

				#tie-wrapper #theme-header.main-nav-boxed #main-nav:not(.fixed-nav){
					background-color: transparent;
				}

				.main-nav-boxed.main-nav-light #main-nav .main-menu-wrapper{
			    border-width: 0;
				}

				.main-nav-boxed.main-nav-below.top-nav-below #main-nav .main-menu-wrapper{
			    border-bottom-width: 1px;
				}
			";
		}

		// Main nav links
		if( $color = tie_get_option( 'main_nav_links_color' )){

			$out .= "
				#tie-wrapper #main-nav .menu li.menu-item-has-children > a:before,
				#tie-wrapper #main-nav .main-menu .mega-menu > a:before{
					border-top-color: $color;
				}

				#tie-wrapper #main-nav .menu li.menu-item-has-children .menu-item-has-children > a:before,
				#tie-wrapper #main-nav .main-menu .mega-menu .menu-item-has-children > a:before{
					border-top-color: transparent;
					border-left-color: $color;
				}

				.rtl #tie-wrapper #main-nav .menu li.menu-item-has-children .menu-item-has-children > a:before,
				.rtl #tie-wrapper #main-nav .main-menu .mega-menu .menu-item-has-children > a:before{
					border-left-color: transparent;
					border-right-color: $color;
				}

				#tie-wrapper #main-nav .menu > li > a,
				#tie-wrapper #main-nav .menu-sub-content a,
				#tie-wrapper #main-nav .comp-sub-menu a:not(:hover),
				#tie-wrapper #main-nav .dropdown-social-icons li a span,
				#tie-wrapper #main-nav .components a.button:hover,
				#tie-wrapper #main-nav .components > li > a,
				#tie-wrapper #main-nav .comp-sub-menu .button:hover,
				.search-in-main-nav.autocomplete-suggestions a:not(.button){
					color: $color;
				}
			";
		}

		// Main nav Borders
		if( tie_get_option( 'main_nav_border_top_color' ) || tie_get_option( 'main_nav_border_top_width' ) ||
			  tie_get_option( 'main_nav_border_bottom_color' ) || tie_get_option( 'main_nav_border_bottom_width' ) ){

			// Top
			$border_top_color = tie_get_option( 'main_nav_border_top_color' ) ? 'border-top-color:'. tie_get_option( 'main_nav_border_top_color' ) .' !important;'   : '';
			$border_top_width = tie_get_option( 'main_nav_border_top_width' ) ? 'border-top-width:'. tie_get_option( 'main_nav_border_top_width' ) .'px !important;' : '';

			// Bottom
			$border_bottom_color = tie_get_option( 'main_nav_border_bottom_color' ) ? 'border-bottom-color:'. tie_get_option( 'main_nav_border_bottom_color' ) .' !important;'   : '';
			$border_bottom_width = tie_get_option( 'main_nav_border_bottom_width' ) ? 'border-bottom-width:'. tie_get_option( 'main_nav_border_bottom_width' ) .'px !important;' : '';

			$out .= "
				#tie-wrapper #theme-header:not(.main-nav-boxed) #main-nav,
				#tie-wrapper .main-nav-boxed .main-menu-wrapper{
					$border_top_color
					$border_top_width
					$border_bottom_color
					$border_bottom_width
					border-right: 0 none;
					border-left : 0 none;
				}
			";

			if( tie_get_option( 'main_nav_border_bottom_color' ) || tie_get_option( 'main_nav_border_bottom_width' )){
				$out .= "
					#tie-wrapper .main-nav-boxed #main-nav.fixed-nav{
						box-shadow: none;
					}
				";
			}
		}

		// Main nav links on hover
		if( $color = tie_get_option( 'main_nav_links_color_hover' )){

			$darker = TIELABS_STYLES::color_brightness( $color, -30 );
			$bright = TIELABS_STYLES::light_or_dark( $color );

			$out .= "
				#tie-wrapper #main-nav .comp-sub-menu .button:hover,
				#tie-wrapper #main-nav .main-menu .menu > li.tie-current-menu,
				#tie-wrapper #main-nav .main-menu .menu > li > .sub-menu,
				#tie-wrapper #main-nav .main-menu .menu > li > .menu-sub-content,
				#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a.is-active,
				#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a:hover{
					border-color: $color;
				}

				#tie-wrapper #main-nav .main-menu .menu > li.tie-current-menu > a,
				#tie-wrapper #main-nav .main-menu .menu > li:hover > a,
				#tie-wrapper #main-nav .main-menu .menu > li > a:hover,
				#tie-wrapper #main-nav .main-menu ul li .mega-links-head:after,

				#tie-wrapper #theme-header #main-nav .comp-sub-menu .button:hover,
				#tie-wrapper #main-nav .comp-sub-menu .button.checkout-button,
				#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a.is-active,
				#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a:hover,
				.search-in-main-nav.autocomplete-suggestions a.button,
				#main-nav .spinner > div{
					background-color: $color;
				}

				#tie-wrapper #main-nav .components a:hover,
				#tie-wrapper #main-nav .components > li > a:hover,
				#tie-wrapper #main-nav .components > li:hover > a,
				#tie-wrapper #main-nav .components button#search-submit:hover,
				#tie-wrapper #main-nav .mega-cat-sub-categories.cats-vertical,
				#tie-wrapper #main-nav .cats-vertical li:hover a,
				#tie-wrapper #main-nav .cats-vertical li a.is-active,
				#tie-wrapper #main-nav .cats-vertical li a:hover,
				#tie-wrapper #main-nav .main-menu .mega-menu .post-meta a:hover,
				#tie-wrapper #main-nav .main-menu .menu .mega-cat-sub-categories.cats-vertical li a.is-active,
				#tie-wrapper #main-nav .main-menu .mega-menu .post-box-title a:hover,
				.search-in-main-nav.autocomplete-suggestions a:not(.button):hover,
				#tie-wrapper #main-nav .spinner-circle:after{
					color: $color;
				}

				#tie-wrapper #main-nav .main-menu .menu > li.tie-current-menu > a,
				#tie-wrapper #main-nav .main-menu .menu > li:hover > a,
				#tie-wrapper #main-nav .main-menu .menu > li > a:hover,
				#tie-wrapper #main-nav .components a.button:hover,
				#tie-wrapper #main-nav .comp-sub-menu a.button.checkout-button,
				#tie-wrapper #main-nav .components a.button.guest-btn:hover,
				#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a.is-active,
				#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a:hover,
				.search-in-main-nav.autocomplete-suggestions .widget-post-list a.button{
					color: $bright;
				}

				#tie-wrapper #main-nav .menu > li.tie-current-menu > a:before,
				#tie-wrapper #theme-header #main-nav .menu > li > a:hover:before,
				#tie-wrapper #theme-header #main-nav .menu > li:hover > a:before{
					border-top-color: $bright;
				}

				.search-in-main-nav.autocomplete-suggestions a.button:hover,
				#tie-wrapper #theme-header #main-nav .comp-sub-menu .button.checkout-button:hover{
					background-color: $darker;
				}
			";
		}

		// Main Nav text
		if( $color = tie_get_option( 'main_nav_text_color' )){

			$rgb = TIELABS_STYLES::rgb_color( $color );

			$out .="
				#tie-wrapper #main-nav,
				#tie-wrapper #main-nav input,
				#tie-wrapper #main-nav .components button#search-submit,
				#tie-wrapper #main-nav .components button#search-submit .fa-spinner,
				#tie-wrapper #main-nav .comp-sub-menu,
				.search-in-main-nav.autocomplete-suggestions,
				#main-nav .weather-menu-item .tie-weather-widget{
					color: $color;
				}

				#tie-wrapper #main-nav input::-moz-placeholder{
					color: $color;
				}

				#tie-wrapper #main-nav input:-moz-placeholder{
					color: $color;
				}

				#tie-wrapper #main-nav input:-ms-input-placeholder{
					color: $color;
				}

				#tie-wrapper #main-nav input::-webkit-input-placeholder{
					color: $color;
				}

				#tie-wrapper #main-nav .main-menu .mega-menu .post-meta,
				#tie-wrapper #main-nav .main-menu .mega-menu .post-meta a:not(:hover){
					color: rgba($rgb, 0.6);
				}

				.search-in-main-nav.autocomplete-suggestions .post-meta,
				.search-in-main-nav.autocomplete-suggestions .post-meta a:not(:hover){
						color: rgba($rgb, 0.7);
				}
			";
		}


		// In Post links
		if( tie_get_option( 'post_links_color' )){
			$out .='
			#the-post .entry-content a:not(.shortc-button){
				color: '. tie_get_option( 'post_links_color' ) .' !important;
			}';
		}

		if( tie_get_option( 'post_links_color_hover' )){
			$out .='
			#the-post .entry-content a:not(.shortc-button):hover{
				color: '. tie_get_option( 'post_links_color_hover' ) .' !important;
			}';
		}


		// Backgrounds
		$backround_areas = array(
			'header_background'    => '#tie-wrapper #theme-header',
			'main_content_bg'      => '#tie-container #tie-wrapper, .post-layout-8 #content', // in post-layout-8 tie-wrapper will be transparent so, the #content area,
			'footer_background'    => '#footer',
			'copyright_background' => '#site-info',
			'banner_bg'            => '#background-ad-cover',
		);

		foreach ( $backround_areas as $area => $elements ){

			if( tie_get_option( $area . '_color' ) || tie_get_option( $area . '_img' )){

				$background_code  = tie_get_option( $area . '_color' ) ? 'background-color: '. tie_get_option( $area . '_color' ) .';' : '';
				$background_image = tie_get_option( $area . '_img' );

				# Background Image
				$background_code .= TIELABS_STYLES::bg_image_css( $background_image );

				if( ! empty( $background_code ) ){

					$out .=
						$elements .'{
							'. $background_code .'
						}
					';

					# Header Mobile Related Colors
					if( $area == 'header_background' ){

						# Text Site Title color
						if( tie_get_option( $area . '_color' ) ){

							$out .='
								#logo.text-logo a,
								#logo.text-logo a:hover{
									color: '. TIELABS_STYLES::light_or_dark( tie_get_option( $area . '_color' ) ) .';
								}

								@media (max-width: 991px){
									#tie-wrapper #theme-header .logo-container.fixed-nav{
										background-color: rgba('. TIELABS_STYLES::rgb_color(tie_get_option( $area . '_color' )) .', 0.95);
									}
								}
							';
						}

						$out .='
							@media (max-width: 991px){
								#tie-wrapper #theme-header .logo-container{
									'. $background_code .'
								}
							}
						';
					} // Header Custom Colors

				}
			}
		}


		// Footer area
		if( tie_get_option( 'footer_margin_top' )  ){
			$out .='
				#footer{
					margin-top: '. tie_get_option( 'footer_margin_top' ) .'px;
				}
			';
		}

		if( tie_get_option( 'footer_padding_top' )  ){
			$out .='
				#footer .footer-widget-area:first-child{
					padding-top: '. tie_get_option( 'footer_padding_top' ) .'px;
				}
			';
		}

		if( tie_get_option( 'footer_padding_bottom' )  ){
			$out .='
				#footer-widgets-container{
					padding-bottom: '. tie_get_option( 'footer_padding_bottom' ) .'px;
				}
			';
		}


		if( $color = tie_get_option( 'footer_background_color' )){

			$rgb    = TIELABS_STYLES::rgb_color( $color );
			$darker = TIELABS_STYLES::color_brightness( $color, -30 );
			$bright = TIELABS_STYLES::light_or_dark( $color, true );

			$out .="
				#footer .posts-list-counter .posts-list-items li:before{
				  border-color: $color;
				}

				#footer .timeline-widget .date:before{
				  border-color: rgba($rgb, 0.8);
				}

				#footer-widgets-container .footer-boxed-widget-area,
				#footer-widgets-container textarea,
				#footer-widgets-container input:not([type=submit]),
				#footer-widgets-container select,
				#footer-widgets-container code,
				#footer-widgets-container kbd,
				#footer-widgets-container pre,
				#footer-widgets-container samp,
				#footer-widgets-container .latest-tweets-slider-widget .latest-tweets-slider .tie-slider-nav li a:not(:hover),
				#footer-widgets-container .show-more-button,
				#footer-widgets-container .latest-tweets-widget .slider-links .tie-slider-nav span,
				#footer .footer-boxed-widget-area{
				  border-color: rgba($bright, 0.1);
				}

				#footer.dark-skin .social-statistics-widget ul.white-bg li.social-icons-item a,
				#footer.dark-skin ul:not(.solid-social-icons) .social-icons-item a:not(:hover),
				#footer.dark-skin .widget_product_tag_cloud a,
				#footer.dark-skin .widget_tag_cloud .tagcloud a,
				#footer.dark-skin .post-tags a,
				#footer.dark-skin .widget_layered_nav_filters a{
					border-color: rgba($bright, 0.1) !important;
				}

				.dark-skin .social-statistics-widget ul.white-bg li.social-icons-item:before{
				  background: rgba($bright, 0.1);
				}

				#footer-widgets-container .widget-title,
				#footer.dark-skin .social-statistics-widget .white-bg .social-icons-item a span.followers span,
				.dark-skin .social-statistics-widget .circle-three-cols .social-icons-item a span{
				  color: rgba($bright, 0.8);
				}

				#footer-widgets-container .timeline-widget ul:before,
				#footer-widgets-container .timeline-widget .date:before,
				#footer.dark-skin .tabs-widget .tabs-wrapper .tabs-menu li a{
				  background-color: $darker;
				}
			";
		}

		if( tie_get_option( 'footer_title_color' )){
			$out .='
				#footer-widgets-container .widget-title,
				#footer-widgets-container .widget-title a:not(:hover){
					color: '. tie_get_option( 'footer_title_color' ) .';
				}
			';
		}

		if( $color = tie_get_option( 'footer_text_color' )){

			$out .="
				#footer-widgets-container,
				#footer-widgets-container textarea,
				#footer-widgets-container input,
				#footer-widgets-container select,
				#footer-widgets-container .widget_categories li a:before,
				#footer-widgets-container .widget_product_categories li a:before,
				#footer-widgets-container .widget_archive li a:before,
				#footer-widgets-container .wp-caption .wp-caption-text,
				#footer-widgets-container .post-meta,
				#footer-widgets-container .timeline-widget ul li .date,
				#footer-widgets-container .subscribe-widget .subscribe-widget-content h3,
				#footer-widgets-container .about-author .social-icons li.social-icons-item a:not(:hover) span{
					color: $color;
				}

				#footer-widgets-container .meta-item,
				#footer-widgets-container .timeline-widget ul li .date{
				  opacity: 0.8;
				}

				#footer-widgets-container input::-moz-placeholder{
				  color: $color;
				}

				#footer-widgets-container input:-moz-placeholder{
				  color: $color;
				}

				#footer-widgets-container input:-ms-input-placeholder{
				  color: $color;
				}

				#footer-widgets-container input::-webkit-input-placeholder{
				  color: $color;
				}
			";
		}

		if( tie_get_option( 'footer_links_color' )){
			$out .='
				#footer-widgets-container a:not(:hover){
					color: '. tie_get_option( 'footer_links_color' ) .';
				}
			';
		}

		if( $color = tie_get_option( 'footer_links_color_hover' )){

			$darker = TIELABS_STYLES::color_brightness( $color, -30 );
			$bright = TIELABS_STYLES::light_or_dark( $color );

			$out .="
				#footer-widgets-container a:hover,
				#footer-widgets-container .post-rating .stars-rating-active,
				#footer-widgets-container .latest-tweets-widget .twitter-icon-wrap span{
					color: $color;
				}

				#footer-widgets-container .digital-rating .pie-svg .circle_bar{
					stroke: $color;
				}

				#footer.dark-skin #instagram-link:before,
				#footer.dark-skin #instagram-link:after,
				#footer-widgets-container .widget.buddypress .item-options a.selected,
				#footer-widgets-container .widget.buddypress .item-options a.loading,
				#footer-widgets-container .tie-slider-nav li > span:hover{
					border-color: $color;
				}

				#footer.dark-skin .tabs-widget .tabs-wrapper .tabs-menu li.is-active a,
				#footer.dark-skin .tabs-widget .tabs-wrapper .tabs-menu li a:hover,
				#footer-widgets-container .digital-rating-static strong,
				#footer-widgets-container .timeline-widget li:hover .date:before,
				#footer-widgets-container #wp-calendar #today,
				#footer-widgets-container .basecloud-bg::before,
				#footer-widgets-container .posts-list-counter .posts-list-items li:before,
				#footer-widgets-container .cat-counter span,
				#footer-widgets-container .widget-title:after,
				#footer-widgets-container .button,
				#footer-widgets-container .slider-links a.button,
				#footer-widgets-container input[type='submit'],
				#footer-widgets-container .widget.buddypress .item-options a.selected,
				#footer-widgets-container .widget.buddypress .item-options a.loading,
				#footer-widgets-container .tie-slider-nav li > span:hover,
				#footer-widgets-container .fullwidth-area .widget_tag_cloud .tagcloud a:hover{
					background-color: $color;
					color: $bright;
				}

				#footer-widgets-container .widget.buddypress .item-options a.selected,
				#footer-widgets-container .widget.buddypress .item-options a.loading,
				#footer-widgets-container .tie-slider-nav li > span:hover{
					color: $bright !important;
				}

				#footer-widgets-container .button:hover,
				#footer-widgets-container input[type='submit']:hover{
					background-color: $darker;
				}
			";
		}


		// Copyright area
		if( tie_get_option( 'copyright_text_color' )){
			$out .='
			#site-info,
			#site-info ul.social-icons li a span{
				color: '. tie_get_option( 'copyright_text_color' ) .';
			}';
		}

		if( tie_get_option( 'copyright_links_color' )){
			$out .='
			#site-info a{
				color: '. tie_get_option( 'copyright_links_color' ) .';
			}';
		}

		if( tie_get_option( 'copyright_links_color_hover' )){
			$out .='
			#site-info a:hover{
				color: '. tie_get_option( 'copyright_links_color_hover' ) .';
			}';
		}


		// Go to Top Button
		if( tie_get_option( 'back_top_background_color' )){
			$out .='
			#go-to-top{
				background: '. tie_get_option( 'back_top_background_color' ) .';
			}';
		}

		if( tie_get_option( 'back_top_text_color' )){
			$out .='
			#go-to-top{
				color: '. tie_get_option( 'back_top_text_color' ) .';
			}';
		}


		// Custom Social Networks colors
		for( $i=1 ; $i<=5 ; $i++ ){
			if ( tie_get_option( "custom_social_title_$i" ) && tie_get_option( "custom_social_icon_$i" ) && tie_get_option( "custom_social_url_$i" ) && tie_get_option( "custom_social_color_$i" )){

				$color = tie_get_option( "custom_social_color_$i" );
				$title = tie_get_option( "custom_social_title_$i" );
				$title = sanitize_title( $title );

				$out .="
					.social-icons-item .custom-link-$i-social-icon{
						background: $color !important;
					}

					.social-icons-item .custom-link-$i-social-icon span{
						color: $color;
					}
				";
			}
		}


		// Colored Categories labels
		$cats_options = get_option( 'tie_cats_options' );

		if( ! empty( $cats_options ) && is_array( $cats_options )){
			foreach ( $cats_options as $cat => $options){
				if( ! empty( $options['cat_color'] )){

					$cat_custom_color = $options['cat_color'];
					$bright_color = TIELABS_STYLES::light_or_dark( $cat_custom_color);

					$out .='
						.tie-cat-'.$cat.', .tie-cat-item-'.$cat.' > span{
							background-color:'. $cat_custom_color .' !important;
							color:'. $bright_color .' !important;
						}

						.tie-cat-'.$cat.':after{
							border-top-color:'. $cat_custom_color .' !important;
						}
						.tie-cat-'.$cat.':hover{
							background-color:'. TIELABS_STYLES::color_brightness( $cat_custom_color ) .' !important;
						}

						.tie-cat-'.$cat.':hover:after{
							border-top-color:'. TIELABS_STYLES::color_brightness( $cat_custom_color ) .' !important;
						}
					';
				}
			}
		}


		// Arqam Plugin Custom colors
		if( TIELABS_ARQAM_IS_ACTIVE ){
			$arqam_options = get_option( 'arq_options' );
			if( ! empty( $arqam_options['color'] ) && is_array( $arqam_options['color'] )){
				foreach ( $arqam_options['color'] as $social => $color ){
					if( ! empty( $color )){
						if( $social == '500px' ){
							$social = 'px500';
						}
						$out .= "
							.social-statistics-widget .solid-social-icons .social-icons-item .$social-social-icon{
								background-color: $color !important;
								border-color: $color !important;
							}
							.social-statistics-widget .$social-social-icon span.counter-icon{
								background-color: $color !important;
							}
						";
					}
				}
			}
		}


		// Take Over Ad top margin
		if( tie_get_option( 'banner_bg' ) && tie_get_option( 'banner_bg_url' ) && tie_get_option( 'banner_bg_site_margin' ) ){
			$out .= '
				@media (min-width: 992px){
					#tie-wrapper{
						margin-top: '. tie_get_option( 'banner_bg_site_margin' ) .'px !important;
					}
				}
			';
		}


		// Site Width
		if( tie_get_option( 'site_width' ) && tie_get_option( 'site_width' ) != '1200px' ){
			$out .= '
				@media (min-width: 1200px){
				.container{
						width: auto;
					}
				}
			';

			if( strpos( tie_get_option( 'site_width' ), '%' ) !== false ){
				$out .= '
					@media (min-width: 992px){
						.container,
						.boxed-layout #tie-wrapper,
						.boxed-layout .fixed-nav,
						.wide-next-prev-slider-wrapper .slider-main-container{
							max-width: '.tie_get_option( 'site_width' ).';
						}
						.boxed-layout .container{
							max-width: 100%;
						}
					}
				';
			}
			else{
				$outer_width = str_replace( 'px', '', tie_get_option( 'site_width' ) ) + 30;
				$out .= '
					.boxed-layout #tie-wrapper,
					.boxed-layout .fixed-nav{
						max-width: '.  $outer_width .'px;
					}
					@media (min-width: '.tie_get_option( 'site_width' ).'){
						.container,
						.wide-next-prev-slider-wrapper .slider-main-container{
							max-width: '.tie_get_option( 'site_width' ).';
						}
					}
				';
			}
		}


		// Mobile Menu Background
		if( tie_get_option( 'mobile_menu_active' ) ){

			if( tie_get_option( 'mobile_menu_background_type' ) == 'color' ){
				if( tie_get_option( 'mobile_menu_background_color' ) ){
					$mobile_bg = 'background-color: '. tie_get_option( 'mobile_menu_background_color' ) .';';
					$out .='
						@media (max-width: 991px){
							.side-aside #mobile-menu .menu > li{
								border-color: rgba('.TIELABS_STYLES::light_or_dark( tie_get_option( 'mobile_menu_background_color' ), true ).',0.05);
							}
							.side-aside #mobile-search .search-field{
								background-color: rgba('. TIELABS_STYLES::light_or_dark( tie_get_option( 'mobile_menu_background_color' ), true).',0.05);
							}
						}
					';
				}
			}

			elseif( tie_get_option( 'mobile_menu_background_type' ) == 'gradient' ){
				if( tie_get_option( 'mobile_menu_background_gradient_color_1' ) &&  tie_get_option( 'mobile_menu_background_gradient_color_2' ) ){
					$color1 = tie_get_option( 'mobile_menu_background_gradient_color_1' );
					$color2 = tie_get_option( 'mobile_menu_background_gradient_color_2' );

					$mobile_bg = '
						background: '. $color1 .';
						background: -webkit-linear-gradient(135deg, '. $color1 .', '. $color2 .' );
						background:    -moz-linear-gradient(135deg, '. $color1 .', '. $color2 .' );
						background:      -o-linear-gradient(135deg, '. $color1 .', '. $color2 .' );
						background:         linear-gradient(135deg, '. $color1 .', '. $color2 .' );
					';
				}
			}

			elseif ( tie_get_option( 'mobile_menu_background_type' ) == 'image' ){
				if( tie_get_option( 'mobile_menu_background_image' ) ){
					$background_image = tie_get_option( 'mobile_menu_background_image' );
					$mobile_bg = TIELABS_STYLES::bg_image_css( $background_image );
				}
			}


			if( ! empty( $mobile_bg ) ){
				$out .='
					@media (max-width: 991px){
						.side-aside.dark-skin{
							'.$mobile_bg.'
						}
					}
				';
			}

			if( tie_get_option( 'mobile_menu_icon_color' ) ){
				$out .='
					#mobile-menu-icon .menu-text{
						color: '. tie_get_option( 'mobile_menu_icon_color' ) .'!important;
					}
					#mobile-menu-icon .nav-icon,
					#mobile-menu-icon .nav-icon:before,
					#mobile-menu-icon .nav-icon:after{
						background-color: '. tie_get_option( 'mobile_menu_icon_color' ) .'!important;
					}
				';
			}

			if( tie_get_option( 'mobile_menu_text_color' ) ){
				$out .='
					.side-aside #mobile-menu li a,
					.side-aside #mobile-menu .mobile-arrows,
					.side-aside #mobile-search .search-field{
						color: '. tie_get_option( 'mobile_menu_text_color' ) .';
					}

					#mobile-search .search-field::-moz-placeholder {
						color: '. tie_get_option( 'mobile_menu_text_color' ) .';
					}

					#mobile-search .search-field:-moz-placeholder {
						color: '. tie_get_option( 'mobile_menu_text_color' ) .';
					}

					#mobile-search .search-field:-ms-input-placeholder {
						color: '. tie_get_option( 'mobile_menu_text_color' ) .';
					}

					#mobile-search .search-field::-webkit-input-placeholder {
						color: '. tie_get_option( 'mobile_menu_text_color' ) .';
					}

					@media (max-width: 991px){
						.tie-btn-close span{
							color: '. tie_get_option( 'mobile_menu_text_color' ) .';
						}
					}
				';
			}

			if( tie_get_option( 'mobile_menu_social_color' ) ){
				$out .='
					#mobile-social-icons .social-icons-item a:not(:hover) span{
						color: '. tie_get_option( 'mobile_menu_social_color' ) .'!important;
					}
				';
			}

			if( tie_get_option( 'mobile_menu_search_color' ) ){
				$search_color = tie_get_option( 'mobile_menu_search_color' );
				$out .='
					#mobile-search .search-submit{
						background-color: '. $search_color .';
						color: '.TIELABS_STYLES::light_or_dark( $search_color ).';
					}

					#mobile-search .search-submit:hover{
						background-color: '. TIELABS_STYLES::color_brightness( $search_color ) .';
					}
				';
			}
		}

		return $out;

	}
}



/*
 * Custom Theme Color
 */
if( ! function_exists( 'jannah_theme_color_css' )){

	add_filter( 'TieLabs/CSS/custom_theme_color', 'jannah_theme_color_css', 1, 5 );
	function jannah_theme_color_css( $css_code, $color, $dark_color, $bright, $rgb_color ){

		/**
		 * Color
		 */
		$css_code .= "
			.brand-title,
			a:hover,
			#tie-popup-search-submit,
			.components button#search-submit:hover,
			#logo.text-logo a,
			#tie-wrapper #top-nav a:hover,
			#tie-wrapper #top-nav .breaking a:hover,
			#tie-wrapper #main-nav .components a:hover,
			#theme-header #top-nav .components > li > a:hover,
			#theme-header #top-nav .components > li:hover > a,
			#theme-header #main-nav .components > li > a:hover,
			#theme-header #main-nav .components > li:hover > a,
			#top-nav .top-menu .menu > li.tie-current-menu > a,
			#tie-wrapper #top-nav .top-menu .menu li:hover > a,
			#tie-wrapper #top-nav .top-menu .menu a:hover,
			#tie-wrapper #main-nav .main-menu .mega-menu .post-box-title a:hover,
			#tie-wrapper #main-nav .main-menu .menu .mega-cat-sub-categories.cats-vertical li:hover a,
			#tie-wrapper #main-nav .main-menu .menu .mega-cat-sub-categories.cats-vertical li a.is-active,
			div.mag-box .mag-box-options .mag-box-filter-links a.active,
			.mag-box-filter-links .flexMenu-viewMore:hover > a,
			.stars-rating-active,
			body .tabs.tabs .active > a,
			.video-play-icon,
			.spinner-circle:after,
			#go-to-content:hover,
			.comment-list .comment-author .fn,
			.commentlist .comment-author .fn,
			blockquote::before,
			blockquote cite,
			blockquote.quote-simple p,
			.multiple-post-pages a:hover,
			#story-index li .is-current,
			.latest-tweets-widget .twitter-icon-wrap span,
			.wide-next-prev-slider-wrapper .tie-slider-nav li:hover span,
			#instagram-link:hover,
			.review-final-score h3,
			#mobile-menu-icon:hover .menu-text,
			.entry a,
			.entry .post-bottom-meta a[href]:hover,
			#footer-widgets-container a:hover,
			#footer-widgets-container .stars-rating-active,
			#footer-widgets-container .latest-tweets-widget .twitter-icon-wrap span,
			#site-info a:hover,
			.widget.tie-weather-widget .icon-basecloud-bg:after,
			.wide-slider-nav-wrapper .slide{
				color: $color;
			}
		";

		/*
		 * To fix an overwrite issue
		 */
		if( $main_nav_color = tie_get_option( 'main_nav_links_color_hover' )){
			$css_code .="
				#theme-header #main-nav .spinner-circle:after{
					color: $color;
				}
			";
		}

		/*
		 * Background-color
		 */
		$css_code .="
			.button,
			#tie-wrapper #theme-header .comp-sub-menu .button:hover,
			#tie-wrapper #theme-header .comp-sub-menu .button.guest-btn:hover,
			#tie-wrapper #theme-header .comp-sub-menu .button.checkout-button,
			#tie-wrapper #theme-header #main-nav .comp-sub-menu .button:hover,
			input[type='submit'],
			.post-cat,
			.tie-slider-nav li > span:hover,
			.pages-nav .next-prev li.current span,
			.pages-nav .pages-numbers li.current span,
			#tie-wrapper .mejs-container .mejs-controls,
			.spinner > div,
			#mobile-menu-icon:hover .nav-icon,
			#mobile-menu-icon:hover .nav-icon:before,
			#mobile-menu-icon:hover .nav-icon:after,
			#theme-header #main-nav .main-menu .menu > li.tie-current-menu > a,
			#theme-header #main-nav .main-menu .menu > li:hover > a,
			#theme-header #main-nav .main-menu .menu > li > a:hover,
			#tie-wrapper #main-nav .main-menu ul li .mega-links-head:after,
			#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a.is-active,
			#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a:hover,
			.main-nav-dark .main-menu .menu > li > a:hover,
			#mobile-menu-icon:hover .nav-icon,
			#mobile-menu-icon:hover .nav-icon:before,
			#mobile-menu-icon:hover .nav-icon:after,
			.mag-box-filter-links a:hover,
			.slider-arrow-nav a:not(.pagination-disabled):hover,
			.comment-list .reply a:hover,
			.commentlist .reply a:hover,
			#reading-position-indicator,
			.multiple-post-pages > span,
			#story-index-icon,
			.posts-list-counter .posts-list-items li:before,
			.cat-counter span,
			.digital-rating-static strong,
			#wp-calendar #today,
			.basecloud-bg,
			.basecloud-bg::before,
			.basecloud-bg::after,
			.timeline-widget ul li a:hover .date:before,
			.cat-counter a + span,
			.videos-block .playlist-title,
			.review-percentage .review-item span span,
			.tie-slick-dots li.slick-active button,
			.tie-slick-dots li button:hover,

			/*the next 4 lines will be updted after the footer custom color code update*/

			#tie-body.magazine2:not(.block-head-4) .dark-widgetized-area .tabs a:hover,
			#tie-body.magazine2:not(.block-head-4) .dark-widgetized-area .tabs .active a,
			#tie-body.magazine1 .dark-widgetized-area .tabs a:hover,
			#tie-body.magazine1 .dark-widgetized-area .tabs .active a,

			#footer-widgets-container .digital-rating-static strong,
			#footer-widgets-container .timeline-widget li:hover .date:before,
			#footer-widgets-container #wp-calendar #today,
			#footer-widgets-container .basecloud-bg::before,
			#footer-widgets-container .posts-list-counter .posts-list-items li:before,
			#footer-widgets-container .cat-counter span,
			#footer-widgets-container .widget-title:after,
			#footer-widgets-container .button,
			#footer-widgets-container input[type='submit'],
			#footer-widgets-container .tie-slider-nav li > span:hover,
			#footer-widgets-container .fullwidth-area .widget_tag_cloud .tagcloud a:hover,
			.demo_store,
			.demo #logo:after,
			.widget.tie-weather-widget,
			span.video-close-btn:hover,
			#go-to-top{
				background-color: $color;
				color: $bright;
			}
		";

		/*
		 * border-color
		 */
		$css_code .="
			pre,
			code,
			.pages-nav .next-prev li.current span,
			.pages-nav .pages-numbers li.current span,
			#tie-wrapper #theme-header .comp-sub-menu .button:hover,
			#tie-wrapper #theme-header .comp-sub-menu .button.guest-btn:hover,
			.multiple-post-pages > span,
			.post-content-slideshow .tie-slider-nav li span:hover,
			.latest-tweets-widget .slider-links .tie-slider-nav li span:hover,
			.dark-skin .latest-tweets-widget .slider-links .tie-slider-nav span:hover,
			#instagram-link:before,
			#instagram-link:after,
			.slider-arrow-nav a:not(.pagination-disabled):hover,
			#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a.is-active,
			#theme-header #main-nav .menu .mega-cat-sub-categories.cats-horizontal li a:hover,
			#footer.dark-skin #instagram-link:before,
			#footer.dark-skin #instagram-link:after,
			#footer-widgets-container .tie-slider-nav li > span:hover,
			#theme-header #main-nav .main-menu .menu > li > .sub-menu,
			#theme-header #main-nav .main-menu .menu > li > .menu-sub-content{
				border-color: $color;
			}

			#tie-wrapper #top-nav .top-menu .menu li.menu-item-has-children:hover > a:before{
				border-top-color: $color;
			}

			#theme-header .main-menu .menu > li.tie-current-menu > a:before,
			#theme-header #main-nav .main-menu .menu > li > a:hover:before,
			#theme-header #main-nav .main-menu .menu > li:hover > a:before{
				border-top-color: $bright;
			}

			#tie-wrapper #top-nav .top-menu .menu li li.menu-item-has-children:hover > a:before{
				border-left-color: $color;
				border-top-color: transparent;
			}

			.rtl #tie-wrapper #top-nav .top-menu .menu li li.menu-item-has-children:hover > a:before{
				border-right-color: $color;
				border-top-color: transparent;
			}

			#tie-wrapper #main-nav .main-menu .menu > li.tie-current-menu{
				border-bottom-color: $color;
			}
		";

		/**
		 * Footer Border Top
		 */
		if( tie_get_option( 'footer_border_top' )){
			$css_code .="
				#footer-widgets-container{
					border-top: 8px solid $color;
					-webkit-box-shadow: 0 -5px 0 rgba(0,0,0,0.07);
					 -moz-box-shadow: 0 -8px 0 rgba(0,0,0,0.07);
					      box-shadow: 0 -8px 0 rgba(0,0,0,0.07);
				}
			";
		}

		/**
		 * Misc
		 */
		$css_code .="
			::-moz-selection{
				background-color: $color;
				color: $bright;
			}

			::selection{
				background-color: $color;
				color: $bright;
			}

			circle.circle_bar,
				#footer-widgets-container circle.circle_bar{
				stroke: $color;
			}

			#reading-position-indicator{
				box-shadow: 0 0 10px rgba( $rgb_color, 0.7);
			}
		";

		/**
		 * Dark Color
		 */
		$css_code .="
			#tie-popup-search-submit:hover,
			#logo.text-logo a:hover,
			.entry a:hover{
				color: $dark_color;
			}
		";

		/**
		 * Dark Background-color
		 */
		$css_code .="
			.button:hover,
			input[type='submit']:hover,
			a.post-cat:hover,
			#footer-widgets-container .button:hover,
			#footer-widgets-container input[type='submit']:hover{
				background-color: $dark_color;
				color: $bright;
			}

			.search-in-main-nav.autocomplete-suggestions a.button:hover,
			#tie-wrapper #theme-header #top-nav .comp-sub-menu .button.checkout-button:hover,
			#tie-wrapper #theme-header #main-nav .comp-sub-menu .button.checkout-button:hover{
				background-color: $dark_color;
				color: $bright;
			}

			#theme-header #main-nav .comp-sub-menu a.checkout-button:not(:hover),
			#theme-header #top-nav .comp-sub-menu a.checkout-button:not(:hover),
			.entry a.button{
				color: $bright;
			}

			#footer-widgets-container .tie-slider-nav li > span:hover{
				color: $bright !important;
			}

			@media (max-width: 1600px){
				#story-index ul{
					background-color: $color;
				}
				#story-index ul li a, #story-index ul li .is-current{
					color: $bright;
				}
			}
		";

		/**
		 * BuddyPress
		 */
		if ( TIELABS_BUDDYPRESS_IS_ACTIVE ){
			$css_code .="
				#buddypress .activity-list li.load-more a:hover,
				#buddypress .activity-list li.load-newest a:hover,
				#buddypress #item-header #item-meta #latest-update a,
				#buddypress .item-list-tabs ul li a:hover,
				#buddypress .item-list-tabs ul li.selected a,
				#buddypress .item-list-tabs ul li.current a,
				#buddypress .item-list-tabs#subnav ul li a:hover,
				#buddypress .item-list-tabs#subnav ul li.selected a,
				#buddypress a.unfav:after,
				#buddypress a.message-action-unstar:after,
				#buddypress .profile .profile-fields .label{
					color: $color;
				}

				#buddypress .activity-meta a.button:hover,
				#buddypress table.sitewide-notices tr td:last-child a:hover,
				#buddypress table.sitewide-notices tr.alt td:last-child a:hover
				#profile-edit-form ul.button-nav li a:hover,
				#profile-edit-form ul.button-nav li.current a{
					color: $color !important;
				}

				#buddypress input[type=submit],
				#buddypress input[type=button],
				#buddypress button[type=submit],
				#buddypress a.button,
				#buddypress a#bp-delete-cover-image,
				#buddypress input[type=submit]:focus,
				#buddypress input[type=button]:focus,
				#buddypress button[type=submit]:focus,
				#buddypress .item-list-tabs ul li a span,
				#buddypress .profile .profile-fields .label:before,
				.widget.buddypress .item-options a.selected,
				.widget.buddypress .item-options a.loading,
				#footer-widgets-container .widget.buddypress .item-options a.selected,
				#footer-widgets-container .widget.buddypress .item-options a.loading{
					background-color: $color;
					color: $bright;
				}

				#buddypress .activity-meta a.button:hover,
				#buddypress .item-list-tabs#subnav ul li.selected a,
				.widget.buddypress .item-options a.selected,
				.widget.buddypress .item-options a.loading,
				#footer-widgets-container .widget.buddypress .item-options a.selected,
				#footer-widgets-container .widget.buddypress .item-options a.loading{
					border-color: $color;
				}

				#buddypress #whats-new:focus{
					border-color: $color !important;
				}

				#buddypress input[type=submit]:hover,
				#buddypress input[type=button]:hover,
				#buddypress button[type=submit]:hover,
				#buddypress a.button:hover,
				#buddypress a#bp-delete-cover-image:hover{
					background-color: $dark_color;
				}

				#footer-widgets-container .widget.buddypress .item-options a.selected,
				#footer-widgets-container .widget.buddypress .item-options a.loading{
					color: $bright !important;
				}

				@-webkit-keyframes loader-pulsate {
					from {
						box-shadow: 0 0 0 4px rgba($rgb_color, 0.2);
					}
					to {
						box-shadow: 0 0 0 0 rgba($rgb_color, 0.2);
					}
				}

				@keyframes loader-pulsate {
					from {
						box-shadow: 0 0 0 4px rgba($rgb_color, 0.2);
					}
					to {
						box-shadow: 0 0 0 0 rgba($rgb_color, 0.2);
					}
				}
			";
		}

		/**
		 * WooCommerce
		 */
		if ( TIELABS_WOOCOMMERCE_IS_ACTIVE ){
			$css_code .="
				.woocommerce div.product span.price,
				.woocommerce div.product p.price,
				.woocommerce div.product div.summary .product_meta > span,
				.woocommerce div.product div.summary .product_meta > span a:hover,
				.woocommerce ul.products li.product .price ins,
				.woocommerce .woocommerce-pagination .page-numbers li a.current,
				.woocommerce .woocommerce-pagination .page-numbers li a:hover,
				.woocommerce .woocommerce-pagination .page-numbers li span.current,
				.woocommerce .woocommerce-pagination .page-numbers li span:hover,
				.woocommerce .widget_rating_filter ul li.chosen a,
				.woocommerce-MyAccount-navigation ul li.is-active a{
					color: $color;
				}

				.woocommerce span.new,
				.woocommerce a.button.alt,
				.woocommerce button.button.alt,
				.woocommerce input.button.alt,
				.woocommerce a.button.alt.disabled,
				.woocommerce a.button.alt:disabled,
				.woocommerce a.button.alt:disabled[disabled],
				.woocommerce a.button.alt.disabled:hover,
				.woocommerce a.button.alt:disabled:hover,
				.woocommerce a.button.alt:disabled[disabled]:hover,
				.woocommerce button.button.alt.disabled,
				.woocommerce button.button.alt:disabled,
				.woocommerce button.button.alt:disabled[disabled],
				.woocommerce button.button.alt.disabled:hover,
				.woocommerce button.button.alt:disabled:hover,
				.woocommerce button.button.alt:disabled[disabled]:hover,
				.woocommerce input.button.alt.disabled,
				.woocommerce input.button.alt:disabled,
				.woocommerce input.button.alt:disabled[disabled],
				.woocommerce input.button.alt.disabled:hover,
				.woocommerce input.button.alt:disabled:hover,
				.woocommerce input.button.alt:disabled[disabled]:hover,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-range{
					background-color: $color;
					color: $bright;
				}

				.woocommerce div.product #product-images-slider-nav .tie-slick-slider .slide.slick-current img{
					border-color: $color;
				}

				.woocommerce a.button:hover,
				.woocommerce button.button:hover,
				.woocommerce input.button:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce input.button.alt:hover{
					background-color: $dark_color;
				}
			";
		}

		return $css_code;
	}
}



/*
 * Blocks Head Colors
 */
if( ! function_exists( 'tie_blocks_head' )){

	add_filter( 'TieLabs/CSS/custom_theme_color', 'tie_blocks_head', 10, 5 );
	function tie_blocks_head( $css_code, $color, $dark_color, $bright, $rgb_color ){

		// Theme Blocks style
		$block_style = tie_get_option( 'blocks_style', 1 );

		//Style #1 / #2 / #3
		if( $block_style <= 3 ){
			$css_code .= "
				#tie-body .mag-box-title h3 a,
				#tie-body .block-more-button{
					color: $color;
				}

				#tie-body .mag-box-title h3 a:hover,
				#tie-body .block-more-button:hover{
					color: $dark_color;
				}
			";
		}

		// Style #1
		if( $block_style == 1 ){

			$css_code .= "
				#tie-body .mag-box-title{
					color: $color;
				}

				#tie-body .mag-box-title:before{
					border-top-color: $color;
				}

				#tie-body .mag-box-title:after,
				#tie-body #footer .widget-title:after{
					background-color: $color;
				}
			";
		}

		// Style #2
		elseif( $block_style == 2 ){

			$css_code .= "
				#tie-body .the-global-title,
				#tie-body .comment-reply-title,
				#tie-body .related.products > h2,
				#tie-body .up-sells > h2,
				#tie-body .cross-sells > h2,
				#tie-body .cart_totals > h2,
				#tie-body .bbp-form legend{
					border-color: $color;
					color: $color;
				}

				#tie-body #footer .widget-title:after{
					background-color: $color;
				}
			";
		}

		// Style #3
		elseif( $block_style == 3 ){

			$css_code .= "
				#tie-body .mag-box-title{
					color: $color;
				}

				#tie-body .mag-box-title:after,
				#tie-body #footer .widget-title:after{
					background-color: $color;
				}
			";
		}

		// Style #4 || #5 || #6
		elseif( $block_style <= 6 ){

			$css_code .= "
				#tie-body .has-block-head-4,
				#tie-body .mag-box-title h3,
				#tie-body .comment-reply-title,
				#tie-body .related.products > h2,
				#tie-body .up-sells > h2,
				#tie-body .cross-sells > h2,
				#tie-body .cart_totals > h2,
				#tie-body .bbp-form legend,
				#tie-body .mag-box-title h3 a,
				#tie-body .section-title-default a,
				#tie-body #cancel-comment-reply-link {
					color: $bright;
				}

				#tie-body .has-block-head-4:before,
				#tie-body .mag-box-title h3:before,
				#tie-body .comment-reply-title:before,
				#tie-body .related.products > h2:before,
				#tie-body .up-sells > h2:before,
				#tie-body .cross-sells > h2:before,
				#tie-body .cart_totals > h2:before,
				#tie-body .bbp-form legend:before {
					background-color: $color;
				}

				#tie-body .block-more-button{
					color: $color;
				}

				#tie-body .block-more-button:hover{
					color: $dark_color;
				}
			";

			if( $block_style == 6 ){
				$css_code .= "
					#tie-body .has-block-head-4:after,
					#tie-body .mag-box-title h3:after,
					#tie-body .comment-reply-title:after,
					#tie-body .related.products > h2:after,
					#tie-body .up-sells > h2:after,
					#tie-body .cross-sells > h2:after,
					#tie-body .cart_totals > h2:after,
					#tie-body .bbp-form legend:after{
						background-color: $color;
					}
				";
			}

			// Magazine 2
			if( tie_get_option( 'boxes_style' ) == 2 ){

				$css_code .= "
					#tie-body .tabs,
					#tie-body .tabs .flexMenu-popup{
						border-color: $color;
					}

					#tie-body .tabs li a{
						color: $color;
					}

					#tie-body .tabs li a:hover{
						color: $dark_color;
					}

					#tie-body .tabs li.active a{
						color: $bright;
						background-color: $color;
					}
				";

				if( $block_style == 5 || $block_style == 6 ){
					$css_code .="
						#tie-body .tabs > .active a:before,
						#tie-body .tabs > .active a:after{
							background-color: $color;
						}
					";
				}

			} // Magazine 2 if

		} // #4 || #5 || #6


		// Style #7
		elseif( $block_style == 7 ){

			// All heads except the widget-title head will be in the default black background.
			$css_code .= "
				#tie-body .section-title-default,
				#tie-body .mag-box-title,
				#tie-body #comments-title,
				#tie-body .review-box-header,
				#tie-body .comment-reply-title,
				#tie-body .comment-reply-title,
				#tie-body .related.products > h2,
				#tie-body .up-sells > h2,
				#tie-body .cross-sells > h2,
				#tie-body .cart_totals > h2,
				#tie-body .bbp-form legend{
					color: $bright;
					background-color: $color;
				}

				#tie-body .mag-box-filter-links > li > a,
				#tie-body .mag-box-title h3 a,
				#tie-body .block-more-button{
					color: $bright;
				}

				#tie-body .flexMenu-viewMore:hover > a{
					color: $color;
				}

				#tie-body .mag-box-filter-links > li > a:hover,
				#tie-body .mag-box-filter-links li > a.active{
					background-color: $bright;
					color: $color;
				}

				#tie-body .slider-arrow-nav a{
					border-color: rgba($bright ,0.2);
					color: $bright;
				}

				#tie-body .mag-box-title a.pagination-disabled,
				#tie-body .mag-box-title a.pagination-disabled:hover{
					color: $bright !important;
				}

				#tie-body .slider-arrow-nav a:not(.pagination-disabled):hover{
					background-color: $bright;
					border-color: $bright;
					color: $color;
				}
			";
		}

		// Style #8
		elseif( $block_style == 8 ){

			$css_code .="
				#tie-body .the-global-title:before,
				#tie-body .comment-reply-title:before,
				#tie-body .related.products > h2:before,
				#tie-body .up-sells > h2:before,
				#tie-body .cross-sells > h2:before,
				#tie-body .cart_totals > h2:before,
				#tie-body .bbp-form legend:before{
					background-color: $color;
				}
			";
		}

		return $css_code;
	}

}



/**
 * Set Sections Custom Styles
 */
if( ! function_exists( 'jannah_section_custom_styles' )){

	add_filter( 'TieLabs/CSS/Builder/section_style', 'jannah_section_custom_styles', 10, 3 );
	function jannah_section_custom_styles( $section_css, $section_id, $section_settings ){

		// Section Head Styles
		if( ! empty( $section_settings['section_title'] ) && ! empty( $section_settings['title'] ) && ! empty( $section_settings['title_color'] )){

			$block_style = tie_get_option( 'blocks_style', 1 );

			$color    = $section_settings['title_color'];
			$darker   = TIELABS_STYLES::color_brightness( $color );
			$bright   = TIELABS_STYLES::light_or_dark( $color );
			$selector = "#$section_id .section-title";

			// Centered Style
			if( ! empty( $section_settings['title_style'] ) && $section_settings['title_style'] == 'centered' ){

				$section_css .= "

					$selector,
					$selector a{
						color: $color;
					}

					$selector a:hover{
						color: $darker;
					}

					#$section_id .section-title-centered:before,
					#$section_id .section-title-centered:after{
						background-color: $color;
					}
				";
			}

			// Big Style
			elseif( ! empty( $section_settings['title_style'] ) && $section_settings['title_style'] == 'big' ){

				$section_css .= "

					$selector,
					$selector a{
						color: $color;
					}

					$selector a:hover{
						color: $darker;
					}
				";
			}

			// Default Style
			elseif( empty( $section_settings['title_style'] ) ){

				$selector = "#$section_id .section-title-default";

				/* Style #1 */
				if( $block_style == 1 ){

					$section_css .= "
						$selector,
						$selector a{
							color: $color;
						}

						$selector a:hover{
							color: $darker;
						}

						$selector:before{
							border-top-color: $color;
						}

						$selector:after{
							background-color: $color;
						}
					";
				}

				/* Style #2 */
				if( $block_style == 2 ){

					$section_css .= "
						$selector,
						$selector a{
							border-color: $color;
							color: $color;
						}

						$selector a:hover{
							color: $darker;
						}
					";
				}

				/* Style #3 */
				elseif( $block_style == 3 ){

					$section_css .= "
						$selector,
						$selector a{
							color: $color;
						}

						$selector a:hover{
							color: $darker;
						}

						$selector:after {
							background: $color;
						}
					";
				}

				/* Style #4 || #5 || #6 */
				elseif( $block_style == 4 || $block_style == 5 || $block_style == 6 ){

					$section_css .= "
						$selector,
						$selector a{
							color: $bright;
						}

						$selector:before{
							background-color: $color;
						}
					";

					/* Style #6 */
					if( $block_style == 6 ){

						$section_css .= "
							$selector:after{
								background-color: $color;
							}
						";
					}
				}

				/* Style #7 */
				elseif( $block_style == 7 ){

					$section_css .= "
						$selector{
							background-color: $color;
							color: $bright;
						}

						$selector a{
							color: $bright;
						}

						$selector:after{
							background-color: $bright;
						}
					";
				}

				/* Style #8 */
				elseif( $block_style == 8 ){

					$section_css .= "
						$selector:before{
							background-color: $color;
						}

						$selector a:hover{
							color: $color;
						}
					";
				}

			}
		}

		// Block 16 and 12 title section color
		if( tie_get_option( 'boxes_style' ) == 2 && ! empty( $section_settings['background_color'] ) ){

			$color  = $section_settings['background_color'];
			$bright = TIELABS_STYLES::light_or_dark( $color );

			$section_css .= "
				#$section_id .full-overlay-title li:not(.no-post-thumb) .block-title-overlay{
					background-color: $color;
				}

				#$section_id .full-overlay-title li:not(.no-post-thumb) .block-title-overlay .post-meta,
				#$section_id .full-overlay-title li:not(.no-post-thumb) .block-title-overlay a:not(:hover){
					color: $bright;
				}

				#$section_id .full-overlay-title li:not(.no-post-thumb) .block-title-overlay .post-meta{
					opacity: 0.80;
				}
			";
		}

		return $section_css;
	}
}



/*
 * Set Custom color for the blocks
 */
if( ! function_exists( 'jannah_block_custom_color' )){

	add_filter( 'TieLabs/CSS/Builder/block_style', 'jannah_block_custom_color', 10, 6 );
	function jannah_block_custom_color( $block_css, $id_css, $block, $color, $bright, $darker ){

		// Default Blocks Head Style
		$block_style = tie_get_option( 'blocks_style', 1 );

		// General Custom block CSS code
		$block_css = "
			$id_css .mag-box-filter-links a.active,
			$id_css .mag-box-filter-links .flexMenu-viewMore:hover > a,
			$id_css .stars-rating-active,
			$id_css .tabs.tabs .active > a,
			$id_css .spinner-circle:after,
			$id_css .video-play-icon,
			$id_css .pages-nav li a:hover,
			$id_css .show-more-button:hover,
			$id_css .entry a,
			$id_css.woocommerce ins{
				color: $color;
			}

			$id_css a:hover,
			$id_css .entry a:hover{
				color: $darker;
			}

			$id_css .digital-rating-static strong,
			$id_css .spinner > div,
			$id_css .tie-slick-dots li.slick-active button,
			$id_css .tie-slick-dots li button:hover,
			$id_css li.current span,
			$id_css .tie-slick-dots li.slick-active button
			$id_css .tie-slick-dots li button:hover{
				background-color: $color;
			}

			$id_css .mag-box-filter-links a:hover,
			$id_css .slider-arrow-nav a:not(.pagination-disabled):hover,
			$id_css .playlist-title,
			$id_css .breaking-title:before,
			$id_css .breaking-news-nav li:hover,
			$id_css .post-cat,
			$id_css .tie-slider-nav li > span:hover,
			$id_css .button{
				background-color: $color;
				color: $bright;
			}

			$id_css a.post-cat:hover,
			$id_css .button:hover{
				background-color: $darker;
				color: $bright;
			}

			$id_css .entry a.button{
			  color: $bright;
			}

			$id_css .circle_bar{
			  stroke: $color;
			}

			$id_css .slider-arrow-nav a:not(.pagination-disabled):hover,
			$id_css li.current span,
			$id_css .breaking-news-nav li:hover{
				border-color: $color;
			}
		";

		/* Style #1 OR 2 Or 3 */
		if( $block_style <= 3 ){

			$block_css .= "
				$id_css .mag-box-title h3 a,
				$id_css .block-more-button{
					color: $color;
				}

				$id_css .mag-box-title h3 a:hover,
				$id_css .block-more-button:hover{
					color: $darker;
				}
			";

			if( $block_style == 1 ){

				$block_css .= "
					$id_css .mag-box-title{
						color: $color;
					}

					$id_css .mag-box-title:before {
						border-top-color: $color;
					}

					$id_css .mag-box-title:after{
						background-color: $color;
					}
				";
			}

			/* Style #2 */
			elseif( $block_style == 2 ){

				$block_css .= "
					$id_css .mag-box-title{
						border-color: $color;
						color: $color;
					}
				";
			}

			/* Style #3 */
			elseif( $block_style == 3 ){

				$block_css .= "
					$id_css .mag-box-title{
						color: $color;
					}

					$id_css .mag-box-title:after{
						background-color: $color;
					}
				";
			}
		}

		/* Style #4 || #5 || #6 */
		elseif( $block_style == 4 || $block_style == 5 || $block_style == 6 ){

			$block_css .= "
				$id_css .mag-box-title h3,
				$id_css .mag-box-title h3 a{
					color: $bright;
				}

				$id_css .mag-box-title h3:before{
					background-color: $color;
				}

				$id_css .block-more-button{
					color: $color;
				}

				$id_css .block-more-button:hover{
					color: $darker;
				}
			";

			/* Style #4 || #5 || #6 && Magazine 2 && Block Style == Tabs */
			if( tie_get_option( 'boxes_style' ) == 2 && ( ! empty( $block['style'] ) && $block['style'] == 'tabs' )){

				$block_css .= "

					$id_css .tabs,
					$id_css .tabs .flexMenu-popup{
						border-color: $color;
					}

					$id_css .tabs li a{
						color: $color;
					}

					$id_css .tabs li a:hover{
						color: $darker;
					}

					$id_css .tabs.tabs li.active > a{
						color: $bright;
						background-color: $color;
					}
				";
			}

			/* Style #5 && Magazine 2 */
			if( ( $block_style == 5 || $block_style == 6 ) && tie_get_option( 'boxes_style' ) == 2 ){

				$block_css .= "
					$id_css .tabs > .active a:before,
					$id_css .tabs > .active a:after{
						background-color: $color;
					}
				";
			}

			/* Style #6 */
			if( $block_style == 6 ){
				$block_css .= "
					$id_css .mag-box-title h3:after{
						background-color: $color;
					}
				";
			} // #style 6

		} // #4 || #5 || #6


		/* Style #7 */
		elseif( $block_style == 7 ){

			$block_css .= "
				$id_css .mag-box-title{
					color: $bright;
					background-color: $color;
				}

				$id_css .mag-box-filter-links > li > a,
				$id_css .mag-box-title h3 a,
				$id_css .mag-box-title a.block-more-button{
					color: $bright;
				}

				$id_css .flexMenu-viewMore:hover > a{
					color: $color;
				}

				$id_css .mag-box-filter-links > li > a:hover,
				$id_css .mag-box-filter-links li > a.active{
					background-color: $bright;
					color: $color;
				}

				$id_css .slider-arrow-nav a{
					border-color: rgba($bright ,0.2);
					color: $bright;
				}

				$id_css .mag-box-title a.pagination-disabled,
				$id_css .mag-box-title a.pagination-disabled:hover{
					color: $bright !important;
				}

				$id_css .slider-arrow-nav a:not(.pagination-disabled):hover{
					background-color: $bright;
					border-color: $bright;
					color: $color;
				}
			";
		}

		/* Style #8 */
		elseif( $block_style == 8 ){
			$block_css .= "
				$id_css .mag-box-title:before{
					background-color: $color;
				}
			";
		}

		return $block_css;
	}
}



/**
 * Default Theme fonts sections
 */
if( ! function_exists( 'jannah_fonts_sections' )){

	add_filter( 'TieLabs/fonts_sections_array', 'jannah_fonts_sections' );
	function jannah_fonts_sections(){

		$fonts_sections = array(
			'body'         => 'body',
			'headings'     => '.logo-text, h1, h2, h3, h4, h5, h6',
			'menu'         => '#main-nav .main-menu > ul > li > a',
			'blockquote'   => 'blockquote p',
		);

		return apply_filters( 'Jannah/fonts_default_sections_array', $fonts_sections );
	}
}



/**
 * Default Theme Typography Elements
 */
if( ! function_exists( 'jannah_typography_elements' )){

	add_filter( 'TieLabs/typography_elements', 'jannah_typography_elements' );
	function jannah_typography_elements(){

		# Custom size, line height, weight, captelization
		$text_sections = array(
			'body'                 => 'body',
			'site_title'           => '#logo.text-logo .logo-text',
			'top_menu'             => '#top-nav .top-menu > ul > li > a',
			'top_menu_sub'         => '#top-nav .top-menu > ul ul li a',
			'main_nav'             => '#main-nav .main-menu > ul > li > a',
			'main_nav_sub'         => '#main-nav .main-menu > ul ul li a',
			'mobile_menu'          => '#mobile-menu li a',
			'breaking_news'        => '.breaking .breaking-title',
			'breaking_news_posts'  => '.ticker-wrapper .ticker-content',
			'buttons'              => '.button, [type="submit"]',
			'breadcrumbs'          => '#breadcrumb',
			'post_cat_label'       => '.post-cat',
			'single_post_title'    => '.entry-header h1.entry-title',
			'single_archive_title' => 'h1.page-title',
			'post_entry'           => '#the-post .entry-content, #the-post .entry-content p',
			'blockquote'           => '#the-post .entry-content blockquote, #the-post .entry-content blockquote p',
			'boxes_title'          => '#tie-wrapper .mag-box-title h3',
			'copyright'            => '#tie-wrapper .copyright-text',
			'footer_widgets_title' => '#footer .widget-title h4',
			'post_heading_h1'      => '.entry h1',
			'post_heading_h2'      => '.entry h2',
			'post_heading_h3'      => '.entry h3',
			'post_heading_h4'      => '.entry h4',
			'post_heading_h5'      => '.entry h5',
			'post_heading_h6'      => '.entry h6',
			'widgets_title'        => '
				#tie-wrapper .widget-title h4,
				#tie-wrapper #comments-title,
				#tie-wrapper .comment-reply-title,
				#tie-wrapper .woocommerce-tabs .panel h2,
				#tie-wrapper .related.products h2,
				#tie-wrapper #bbpress-forums #new-post > fieldset.bbp-form > legend,
				#tie-wrapper .entry-content .review-box-header',

			// Blocks Typography Options
			'post_title_blocks' => '
				#tie-wrapper .media-page-layout .thumb-title,
				#tie-wrapper .mag-box.full-width-img-news-box .posts-items>li .post-title,
				#tie-wrapper .miscellaneous-box .posts-items>li:first-child h3.post-title,
				#tie-wrapper .big-thumb-left-box .posts-items li:first-child .post-title',
			'post_medium_title_blocks' => '
				#tie-wrapper .mag-box.wide-post-box .posts-items>li:nth-child(n) .post-title,
				#tie-wrapper .mag-box.big-post-left-box li:first-child .post-title,
				#tie-wrapper .mag-box.big-post-top-box li:first-child .post-title,
				#tie-wrapper .mag-box.half-box li:first-child .post-title,
				#tie-wrapper .mag-box.big-posts-box .posts-items>li:nth-child(n) .post-title,
				#tie-wrapper .mag-box.mini-posts-box .posts-items>li:nth-child(n) .post-title,
				#tie-wrapper .mag-box.latest-poroducts-box .products .product h2',
			'post_small_title_blocks' => '
				#tie-wrapper .mag-box.big-post-left-box li:not(:first-child) .post-title,
				#tie-wrapper .mag-box.big-post-top-box li:not(:first-child) .post-title,
				#tie-wrapper .mag-box.half-box li:not(:first-child) .post-title,
				#tie-wrapper .mag-box.big-thumb-left-box li:not(:first-child) .post-title,
				#tie-wrapper .mag-box.scrolling-box .slide .post-title,
				#tie-wrapper .mag-box.miscellaneous-box li:not(:first-child) .post-title',

			// Sliders Typography Options
			'post_title_sliders' => array(
				'min-width: 992px' => '
					.full-width .fullwidth-slider-wrapper .thumb-overlay .thumb-content .thumb-title,
					.full-width .wide-next-prev-slider-wrapper .thumb-overlay .thumb-content .thumb-title,
					.full-width .wide-slider-with-navfor-wrapper .thumb-overlay .thumb-content .thumb-title,
					.full-width .boxed-slider-wrapper .thumb-overlay .thumb-title',
			),
			'post_medium_title_sliders' => array(
				'min-width: 992px' => '
					.has-sidebar .fullwidth-slider-wrapper .thumb-overlay .thumb-content .thumb-title,
					.has-sidebar .wide-next-prev-slider-wrapper .thumb-overlay .thumb-content .thumb-title,
					.has-sidebar .wide-slider-with-navfor-wrapper .thumb-overlay .thumb-content .thumb-title,
					.has-sidebar .boxed-slider-wrapper .thumb-overlay .thumb-title',
				'min-width: 768px' => '
					#tie-wrapper .main-slider.grid-3-slides .slide .grid-item:nth-child(1) .thumb-title,
					#tie-wrapper .main-slider.grid-5-first-big .slide .grid-item:nth-child(1) .thumb-title,
					#tie-wrapper .main-slider.grid-5-big-centerd .slide .grid-item:nth-child(1) .thumb-title,
					#tie-wrapper .main-slider.grid-4-big-first-half-second .slide .grid-item:nth-child(1) .thumb-title,
					#tie-wrapper .main-slider.grid-2-big .thumb-overlay .thumb-title,
					#tie-wrapper .wide-slider-three-slids-wrapper .thumb-title',
			),
			'post_small_title_sliders' => array(
				'min-width: 768px' => '
					#tie-wrapper .boxed-slider-three-slides-wrapper .slide .thumb-title,
					#tie-wrapper .grid-3-slides .slide .grid-item:nth-child(n+2) .thumb-title,
					#tie-wrapper .grid-5-first-big .slide .grid-item:nth-child(n+2) .thumb-title,
					#tie-wrapper .grid-5-big-centerd .slide .grid-item:nth-child(n+2) .thumb-title,
					#tie-wrapper .grid-4-big-first-half-second .slide .grid-item:nth-child(n+2) .thumb-title,
					#tie-wrapper .grid-5-in-rows .grid-item:nth-child(n) .thumb-overlay .thumb-title,
					#tie-wrapper .main-slider.grid-4-slides .thumb-overlay .thumb-title,
					#tie-wrapper .grid-6-slides .thumb-overlay .thumb-title,
					#tie-wrapper .boxed-four-taller-slider .slide .thumb-title',
			),
		);

		return apply_filters( 'Jannah/typography_default_elements_array', $text_sections );
	}
}
