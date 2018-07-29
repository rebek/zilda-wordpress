<?php
/**
 * Post Share
 *
 * This template can be overridden by copying it to your-child-theme/templates/single-post/share.php.
 *
 * HOWEVER, on occasion TieLabs will need to update template files and you
 * will need to copy the new files to your child theme to maintain compatibility.
 *
 * @author   TieLabs
 * @version  2.1.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


// Disable on bbPress pages
if( TIELABS_BBPRESS_IS_ACTIVE && is_bbpress() )	return;

// Check if the share buttons is hidden on mobiles
if( TIELABS_HELPER::is_mobile_and_hidden( 'share_post_'.$share_position )) return;


if( tie_get_postdata( 'tie_hide_share_'.$share_position ) == 'no' ||
	( get_post_type() == 'page' && tie_get_option( 'share_buttons_pages' ) && tie_get_option( 'share_post_'.$share_position ) && ! tie_get_postdata( 'tie_hide_share_'.$share_position ) ) ||
	( get_post_type() == 'post' && tie_get_option( 'share_post_'.$share_position ) && ! tie_get_postdata( 'tie_hide_share_'.$share_position ) )){

	$counter      = 0;
	$post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
	$share_class  = '';
	$share_style  = tie_get_option( 'share_style_'.$share_position );
	$button_class = '';
	$text_class   = '';

	// Share button on Mobile layout
	if( $share_position == 'mobile' ){
		$share_style = 'style_3';
	}

	// Post link
	$post_link = tie_get_option( 'share_shortlink' ) ? wp_get_shortlink() : get_permalink();

	// Centered buttons
	if( tie_get_option( 'share_center_'.$share_position ) ){
		$share_class .= ' share-centered';
	}

	// Share layout
	if( $share_style == 'style_2' ){
		$share_class .= ' icons-text';
		$button_class = ' large-share-button';
		$text_class   = 'social-text';
	}
	elseif( $share_style == 'style_3' ){
		$share_class .= ' icons-only';
		$button_class = '';
		$text_class   = 'screen-reader-text';
	}
	elseif( $share_style == 'style_4' ){
		$share_class .= ' icons-only';
		$button_class = ' equal-width';
		$text_class   = 'screen-reader-text';
	}

	// Twitter username
	$share_twitter_username = tie_get_option( 'share_twitter_username' ) ? ' via %40'.tie_get_option( 'share_twitter_username' ) : '';

	// Buttons array
	$share_buttons = array(

		'facebook' => array(
			'url'  => 'http://www.facebook.com/sharer.php?u='. $post_link,
			'text' => esc_html__( 'Facebook', TIELABS_TEXTDOMAIN ),
		),

		'twitter' => array(
			'url'   => 'https://twitter.com/intent/tweet?text='. $post_title . $share_twitter_username .'&amp;url='. $post_link,
			'text'  => esc_html__( 'Twitter', TIELABS_TEXTDOMAIN ),
		),

		'google' => array(
			'url'  => 'https://plusone.google.com/_/+1/confirm?hl=en&amp;url='. $post_link .'&amp;name='. $post_title,
			'text' => esc_html__( 'Google+', TIELABS_TEXTDOMAIN ),
		),

		'linkedin' => array(
			'url'  => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='. $post_link .'&amp;title='. $post_title,
			'text' => esc_html__( 'LinkedIn', TIELABS_TEXTDOMAIN ),
		),

		'stumbleupon' => array(
			'url'  => 'http://www.stumbleupon.com/submit?url='. $post_link .'&amp;title='. $post_title,
			'text' => esc_html__( 'StumbleUpon', TIELABS_TEXTDOMAIN ),
		),

		'tumblr' => array(
			'url'  => 'http://www.tumblr.com/share/link?url='. $post_link .'&amp;name='. $post_title,
			'text' => esc_html__( 'Tumblr', TIELABS_TEXTDOMAIN ),
		),

		'pinterest' => array(
			'url'  => 'http://pinterest.com/pin/create/button/?url='. $post_link .'&amp;description='. $post_title .'&amp;media='. tie_thumb_src( TIELABS_THEME_SLUG.'-image-post' ),
			'text' => esc_html__( 'Pinterest', TIELABS_TEXTDOMAIN ),
		),

		'reddit' => array(
			'url'  => 'http://reddit.com/submit?url='. $post_link .'&amp;title='. $post_title,
			'text' => esc_html__( 'Reddit', TIELABS_TEXTDOMAIN ),
		),

		'vk' => array(
			'url'  => 'http://vk.com/share.php?url='. $post_link,
			'text' => esc_html__( 'VKontakte', TIELABS_TEXTDOMAIN ),
		),

		'odnoklassniki' => array(
			'url'  => 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl='. $post_link .'&amp;description='. $post_title .'&amp;media='. tie_thumb_src( TIELABS_THEME_SLUG.'-image-post' ),
			'text' => esc_html__( 'Odnoklassniki', TIELABS_TEXTDOMAIN ),
		),

		'pocket' => array(
			'url'  => 'https://getpocket.com/save?title='. $post_title .'&amp;url='.$post_link,
			'text' => esc_html__( 'Pocket', TIELABS_TEXTDOMAIN ),
			'icon' => 'fa fa-get-pocket',
		),

		'whatsapp' => array(
			'url'   => 'whatsapp://send?text='. $post_title .' - '.$post_link,
			'text'  => esc_html__( 'WhatsApp', TIELABS_TEXTDOMAIN ),
			'avoid_esc' => true,
		),

		'telegram' => array(
			'url'   => 'tg://msg?text='. $post_title .' - '.$post_link,
			'text'  => esc_html__( 'Telegram', TIELABS_TEXTDOMAIN ),
			'icon'  => 'fa fa-paper-plane',
			'avoid_esc' => true,
		),

		'viber' => array(
			'url'   => 'viber://forward?text='. $post_title .' - '.$post_link,
			'text'  => esc_html__( 'Viber', TIELABS_TEXTDOMAIN ),
			'icon'  => 'fa fa-volume-control-phone',
			'avoid_esc' => true,
		),

		'email' => array(
			'url'  => 'mailto:?subject='. $post_title .'&amp;body='. $post_link,
			'text' => esc_html__( 'Share via Email', TIELABS_TEXTDOMAIN ),
			'icon' => 'fa fa-envelope',
		),

		'print' => array(
			'url'  => '#',
			'text' => esc_html__( 'Print', TIELABS_TEXTDOMAIN ),
		),
	);


	$share_buttons = apply_filters( 'TieLabs/share_buttons', $share_buttons );

	$button_position = ( $share_position == 'bottom' ) ? '' : '_'.$share_position;

	$active_share_buttons = array();


	foreach ( $share_buttons as $network => $button ){
		if( tie_get_option( 'share_'.$network.$button_position ) ){
			$counter ++;
			$icon = empty( $button['icon'] ) ? 'fa fa-'.$network : $button['icon'];

			// Buttons Style 1
			if( empty( $share_style )){
				$button_class = '';
				$text_class   = 'screen-reader-text';

				if( $counter <= 2 ){
					$button_class = ' large-share-button';
					$text_class   = 'social-text';
				}
			}

			if( ! isset( $button['avoid_esc'] )){
				$button['url'] = esc_url( $button['url'] );
			}


			$active_share_buttons[] = '<a href="'. $button['url'] .'" rel="external" target="_blank" class="'. $network.'-share-btn' . $button_class .'"><span class="'. $icon .'"></span> <span class="'. $text_class .'">'. $button['text'] .'</span></a>';
		}
	}

	if( is_array( $active_share_buttons ) && ! empty( $active_share_buttons ) ){ ?>

		<div class="post-footer post-footer-on-<?php echo esc_attr( $share_position ) ?>">
			<div class="share-links <?php echo esc_attr( $share_class ) ?>">
				<?php
					if( tie_get_option( 'share_title_'.$share_position ) ){ ?>
						<div class="share-title">
						<span class="fa fa-share-alt" aria-hidden="true"></span>
						<span> <?php esc_html_e( 'Share', TIELABS_TEXTDOMAIN ); ?></span>
						</div>
						<?php
					}

					echo implode( '', $active_share_buttons );

				?>
			</div><!-- .share-links /-->
		</div><!-- .post-footer-on-top /-->

		<?php

		// For mobile share buttons add a space below it
		if( $share_position == 'mobile' ){
			echo '<div class="mobile-share-buttons-spacer"></div>';
		}

	}

}
