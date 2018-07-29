<?php
/**
 * Fly Box
 *
 * This template can be overridden by copying it to your-child-theme/templates/single-post/fly-box.php.
 *
 * HOWEVER, on occasion TieLabs will need to update template files and you
 * will need to copy the new files to your child theme to maintain compatibility.
 *
 * @author   TieLabs
 * @version  2.1.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

$post_id = get_the_id();

$tie_do_not_duplicate = ! empty( $GLOBALS['tie_do_not_duplicate'] ) ? $GLOBALS['tie_do_not_duplicate'] : array( $post_id );

// Post titles length
$title_length = tie_get_option( 'check_also_title_length' ) ? tie_get_option( 'check_also_title_length' ) : '';

// Check Also Position
$check_also_position = tie_get_option( 'check_also_position', 'right' );

// Prepare the query
$query_type   = tie_get_option( 'check_also_query' );
$posts_number = tie_get_option( 'check_also_number', 1 );

$args = array(
	'post__not_in'           => $tie_do_not_duplicate,
	'posts_per_page'         => $posts_number,
	'no_found_rows'          => true,
	'post_status'            => 'publish',
	'ignore_sticky_posts'    => true,
	'update_post_term_cache' => false,
);

// Check also Posts order
if( $order = tie_get_option( 'check_also_order' )){

	if( $order == 'rand' ){

		$args['orderby'] = 'rand';
	}
	elseif( $order == 'views' && tie_get_option( 'post_views' )){

		$args['orderby']  = 'meta_value_num';
		$args['meta_key'] = apply_filters( 'TieLabs/views_meta_field', 'tie_views' );
	}
	elseif( $order == 'popular' ){

		$args['orderby'] = 'comment_count';
	}
	elseif( $order == 'modified' ){

		$args['orderby'] = 'modified';
		$args['order']   = 'ASC';
	}
}

// Get Check also posts by author
if( $query_type == 'author' ){
	$args['author'] = get_the_author_meta( 'ID' );
}

// Get Check also posts by tags
elseif( $query_type == 'tag' ){
	$tags_ids  = array();
	$post_tags = get_the_terms( $post_id, 'post_tag' );

	if( ! empty( $post_tags ) ){
		foreach( $post_tags as $individual_tag ){
			$tags_ids[] = $individual_tag->term_id;
		}

		$args['tag__in'] = $tags_ids;
	}
}

// Get Check also posts by categories
else{
	$category_ids = array();
	$categories   = get_the_category( $post_id );

	foreach( $categories as $individual_category ){
		$category_ids[] = $individual_category->term_id;
	}

	$args['category__in'] = $category_ids;
}


$args = apply_filters( 'TieLabs/checkalso_query', $args );

// Get the posts
$check_also_query = new wp_query( $args );


if( $check_also_query->have_posts() ):

	$style_args  = array();
	$block_class = 'widget';

	if( $check_also_query->post_count == 1 ){

		$style_args['thumbnail_first'] = TIELABS_THEME_SLUG.'-image-large';
		$style_args['review_first']    = 'large';

		$block_class .= ' posts-list-big-first has-first-big-post';
	}

	?>

	<div id="check-also-box" class="container-wrapper check-also-<?php echo esc_attr( $check_also_position ) ?>">

		<div <?php tie_box_class( 'widget-title' ) ?>>
			<h4><?php esc_html_e( 'Check Also', TIELABS_TEXTDOMAIN ); ?></h4>

			<a href="#" id="check-also-close" class="remove">
				<span class="screen-reader-text"><?php esc_html_e( 'Close', TIELABS_TEXTDOMAIN ); ?></span>
			</a>
		</div>

		<div class="<?php echo $block_class; ?>">
			<ul class="posts-list-items">

			<?php

				$style_args = wp_parse_args( $style_args, array(
					'thumbnail'       => TIELABS_THEME_SLUG.'-image-small',
					'thumbnail_first' => '',
					'review'          => 'small',
					'review_first'    => '',
					'count'           => 0,
					'show_score'      => true,
					'title_length'    => $title_length,
				));

				while ( $check_also_query->have_posts() ){
					$style_args['count']++;

					$check_also_query->the_post();
					$do_not_duplicate[] = get_the_ID();

					TIELABS_HELPER::get_template_part( 'templates/loops/loop', 'widgets', $style_args );

				}
 			?>

			</ul><!-- .related-posts-list /-->
		</div>
	</div><!-- #related-posts /-->

	<?php
endif;

wp_reset_postdata();
