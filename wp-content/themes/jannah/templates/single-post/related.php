<?php
/**
 * Post Related
 *
 * This template can be overridden by copying it to your-child-theme/templates/single-post/related.php.
 *
 * HOWEVER, on occasion TieLabs will need to update template files and you
 * will need to copy the new files to your child theme to maintain compatibility.
 *
 * @author   TieLabs
 * @version  2.1.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


if( (( tie_get_option( 'related' ) && ! tie_get_postdata( 'tie_hide_related' )) || ( tie_get_postdata( 'tie_hide_related' ) == 'no' ) ) && is_singular( 'post' ) ):

	// Check if the newsletter is hidden on mobiles
	if( TIELABS_HELPER::is_mobile_and_hidden( 'related' )) return;

	$class   = 'container-wrapper';
	$post_id = get_the_id();

	// Don't show current post in the related posts
	$tie_do_not_duplicate = array( $post_id );

	// Post titles length
	$title_length = tie_get_option( 'related_title_length' ) ? tie_get_option( 'related_title_length' ) : '';

	// Above The Footer
	if( tie_get_option( 'related_position') == 'footer' ){

		$related_number = tie_get_option( 'related_number', 4 );
	}
	else{

		// Number of posts for the normal layout with sidebar
		$related_number = tie_get_option( 'related_number', 3 );

		// Number of posts for the Full width layout without sidebar
		if( tie_get_object_option( 'sidebar_pos', 'cat_sidebar_pos', 'tie_sidebar_pos' ) == 'full' ){
			$related_number = (int) tie_get_option( 'related_number_full', 4 );
		}
	}

	// For responsive layout add extra 1 post if the number is odd
	if ( $related_number % 2 != 0 ){
		$related_number++;
		$extra_post = true;
	}

	// Prepare the query
	$query_type = tie_get_option('related_query');

	$args = array(
		'post__not_in'           => $tie_do_not_duplicate,
		'posts_per_page'         => $related_number,
		'no_found_rows'          => true,
		'post_status'            => 'publish',
		'ignore_sticky_posts'    => true,
		'update_post_term_cache' => false,
	);


	// Related Posts order
	if( $order = tie_get_option( 'related_order' ) ){

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


	// Get related posts by author
	if( $query_type == 'author' ){
		$args['author'] = get_the_author_meta( 'ID' );
	}

	// Get related posts by tags
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

	// Get related posts by categories
	else{
		$category_ids = array();
		$categories   = get_the_category( $post_id );

		foreach( $categories as $individual_category ){
			$category_ids[] = $individual_category->term_id;
		}

		$args['category__in'] = $category_ids;
	}

	$args = apply_filters( 'TieLabs/related_posts_query', $args );

	// Get the posts
	$related_query = new wp_query( $args );

	// For responsive layout add extra custom class for the extra post
	if( ! empty( $extra_post ) && ! empty( $related_query->post_count ) && $related_query->post_count == $related_number ){
		$class .= ' has-extra-post';
	}

	if( $related_query->have_posts() ): ?>

	<?php if( tie_get_option( 'related_position') == 'footer' ){ ?>
		<div class="container full-width related-posts-full-width">
			<div class="tie-row">
				<div class="tie-col-md-12">
			<?php } ?>


				<div id="related-posts" class="<?php echo esc_attr( $class ) ?>">

					<div <?php tie_box_class( 'mag-box-title' ) ?>>
						<h3><?php esc_html_e( 'Related Articles', TIELABS_TEXTDOMAIN ); ?></h3>
					</div>

					<div class="related-posts-list">

					<?php
						while ( $related_query->have_posts() ):

							$related_query->the_post();

							$tie_do_not_duplicate[] = get_the_ID(); ?>

							<div <?php tie_post_class( 'related-item' ); ?>>

								<?php

									if ( has_post_thumbnail() ){
										tie_post_thumbnail( TIELABS_THEME_SLUG.'-image-large', false );
									}

									// Get the Post Meta info
									tie_the_post_meta( array( 'comments' => false, 'author' => false ) );
								?>

								<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php tie_the_title( $title_length ); ?></a></h3>

							</div><!-- .related-item /-->

						<?php endwhile;?>

					</div><!-- .related-posts-list /-->
				</div><!-- #related-posts /-->

			<?php if( tie_get_option( 'related_position') == 'footer' ){ ?>
			</div><!-- .tie-col-md-12 -->
		</div><!-- .tie-row -->
	</div><!-- .container -->
	<?php }

	endif;

	// Remove the Id of the extra post from the do not duplicate array
	if( ! empty( $extra_post ) && ! empty( $related_query->post_count ) && $related_query->post_count == $related_number ){
		$the_extra_post = array_pop( $tie_do_not_duplicate );
	}

	// Add the do not duplicate array to the GLOBALS to use it in the fly check also template file
	$GLOBALS['tie_do_not_duplicate'] = $tie_do_not_duplicate;

	wp_reset_postdata();

endif;
