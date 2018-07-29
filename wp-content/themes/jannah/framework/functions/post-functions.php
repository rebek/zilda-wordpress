<?php
/**
 * Post Template Functions.
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly


/**
 * Get the post time
 */
if( ! function_exists( 'tie_get_time' )){

	function tie_get_time( $return = false ){

		$post = get_post();

		// Date Type
		$modified_time = tie_get_option( 'time_type' ) == 'modified' ? true : false;

		// Date is disabled globally
		if( tie_get_option( 'time_format' ) == 'none' ){
			return false;
		}

		// Human Readable Post Dates
		elseif( tie_get_option( 'time_format' ) == 'modern' ){

			$time_now  = current_time( 'timestamp' );
			$post_time = $modified_time ? get_the_modified_time( 'U' ) : get_the_time( 'U' );

			if ( $post_time > ( $time_now - MONTH_IN_SECONDS ) ){
				$since = sprintf( esc_html__( '%s ago', TIELABS_TEXTDOMAIN ), human_time_diff( $post_time, $time_now ) );
			}
			else {
				$since = $modified_time ? get_the_modified_date() : get_the_date();
			}
		}

		// Default date format
		else{
			$since = $modified_time ? get_the_modified_date() : get_the_date();
		}

		$since = apply_filters( 'TieLabs/post_date', $since );

		// The date markup
		$post_time = '<span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span> <span>'. $since .'</span></span>';

		if( $return ){
			return $post_time;
		}

		echo ( $post_time );
	}
}


/**
 * Get score
 */
if( ! function_exists( 'tie_get_score' )){

	function tie_get_score( $size = 'small' ){

		if( ! TIELABS_TAQYEEM_IS_ACTIVE || ! tie_get_postdata( 'taq_review_position' ) ){
			return;
		}

		$style         = tie_get_postdata( 'taq_review_style' );
		$total_score   = tie_get_postdata( 'taq_review_score', 0 );
		$review_output = '';

		$image_style = taqyeem_get_option( 'rating_image' ) ? taqyeem_get_option( 'rating_image' ) : 'stars';

		# Show the stars
		if( $style == 'stars' ){

			# Small stars size
			if( $size != 'small' ){
				$review_output .= '
					<div data-rate-val="'. $total_score. '%" class="post-rating image-'. $image_style .'">
						<div class="stars-rating-bg"></div><!-- .stars-rating-bg -->
						<div class="stars-rating-active">
							<div class="stars-rating-active-inner">
							</div><!--.stars-rating-active-inner /-->
						</div><!--.stars-rating-active /-->
					</div><!-- .post-rating -->
				';
			}
		}

		# Percentage and point style
		else{

			$review_class = '';
			$percentage   = '';

			# Percentage
			if( $style == 'percentage' ){
				$review_class = ' review-percentage';
				$post_score   = round( $total_score, 0 );
				$percentage   = '%';
			}

			# Points
			else{
				$post_score = 0;
				if( $total_score != 0 ){
					$post_score = round( $total_score/10, 1 );
				}
			}


			if( $size != 'stars' ){

				if( $size == 'small' ){
					$review_output .= '<div class="digital-rating-static" data-rate-val="'. $total_score .'"><strong>'. $post_score . $percentage .'</strong></div>';
				}

				else{
					$review_output .= '
						<div class="digital-rating">
							<div data-score="'. $post_score .'" data-pct="'. $total_score .'" class="pie-wrap'. $review_class .'">
								<svg width="40" height="40" class="pie-svg">
									<circle r="19" cx="20" cy="20" fill="transparent" stroke-dasharray="119.38" stroke-dashoffset="0" class="circle_base"></circle>
									<circle r="19" cx="20" cy="20" fill="transparent" stroke-dasharray="119.38" stroke-dashoffset="0" class="circle_bar"></circle>
								</svg>
							</div>
						</div><!-- .digital-rating -->
					';
				}
			}
		}

		return $review_output;
	}
}


/**
 * Print the score
 */
if( ! function_exists( 'tie_the_score' )){

	function tie_the_score( $size = 'small' ){
		echo tie_get_score( $size );
	}
}


/*
 * Get the Primary category object
 */
if( ! function_exists( 'tie_get_primary_category' )){

	function tie_get_primary_category(){

		if( get_post_type() != 'post' ) return;

		// Get the primary category
		$category = (int) tie_get_postdata( 'tie_primary_category' );

		if( ! empty( $category ) &&TIELABS_WP_HELPER::term_exists( $category, 'category' ) ){
			$get_the_category =TIELABS_WP_HELPER::get_term_by( 'id', $category, 'category' );
			$primary_category = array( $get_the_category );
		}

		// Get the first assigned category
		else{
			$get_the_category = get_the_category();

			if( ! empty( $get_the_category[0] ) ){
				$primary_category = array( $get_the_category[0] );
			}
		}

		if( ! empty( $primary_category[0] )){
			return $primary_category;
		}
	}
}


/**
 * Get the Primary category id
 */
if( ! function_exists( 'tie_get_primary_category_id' )){

	function tie_get_primary_category_id(){

		$primary_category = tie_get_primary_category();

		if( ! empty( $primary_category[0]->term_id )){
			return $primary_category[0]->term_id;
		}

		return false;
	}
}


/*
 * Get the Post Category HTML
 */
if( ! function_exists( 'tie_get_category' )){

	function tie_get_category( $before = false, $after = false, $primary = true, $plain = false ){

		if( get_post_type() != 'post' ) return;

		$output  = '';
		$output .= $before;

		// If the primary is true
		if( ! empty( $primary )){
			$categories = tie_get_primary_category();
		}

		// Show all post's categories
		else{
			$categories = get_the_category();
		}

		// Display the categories
		if( ! empty( $categories ) && is_array( $categories )){
			foreach ( $categories as $category ){

				if( $plain ){
					$output .= '<span class="post-cat tie-cat-'.$category->term_id.'">' . $category->name.'</span>';
				}
				else{
					$output .= '<a class="post-cat tie-cat-'.$category->term_id.'" href="' . esc_url(TIELABS_WP_HELPER::get_term_link( $category->term_id, 'category' )) . '">' . $category->name.'</a>';
				}
			}
		}

		return $output .= $after;
	}
}


/*
 * Print the post category HTML
 */
if( ! function_exists( 'tie_the_category' )){

	function tie_the_category( $before = false, $after = false, $primary = true, $plain = false ){
		echo tie_get_category( $before, $after, $primary, $plain );
	}
}


/**
 * Get Custom Excerpt
 */
if( ! function_exists( 'tie_get_excerpt' )){

	function tie_get_excerpt( $limit ){

		add_filter( 'excerpt_length', 'tie_excerpt_max_length', 999 );

		$excerpt   = get_the_excerpt();
		$trim_type = tie_get_option( 'trim_type' );
		$limit     = ! empty( $limit ) ? $limit : 20;

		// For Chinese Language
		if( $trim_type == 'chars' ){

			if ( function_exists( 'mb_substr' ) ) {
				return mb_substr( $excerpt, 0, $limit );
			}

			return substr( $excerpt, 0, $limit );
		}

		return wp_trim_words( $excerpt, $limit, '&hellip;' );
	}
}


if( ! function_exists( 'tie_excerpt_max_length' )){

	function tie_excerpt_max_length(){
		return 200;
	}
}


/**
 * Print the modified excerpt
 */
if( ! function_exists( 'tie_the_excerpt' )){

	function tie_the_excerpt( $limit ){
		echo tie_get_excerpt( $limit );
	}
}


/*
 * Change The Title Length
 */
if( ! function_exists( 'tie_get_title' )){

	function tie_get_title( $limit = false, $trim_type = false ){

		$title = get_the_title();

		// Check if the post has title-
		if( $title == '' ){
			 $title = esc_html__( '(no title)', TIELABS_TEXTDOMAIN );
		}

		// If no limit return the original title-
		if( empty( $limit )){
			return $title;
		}

		// Get the rim type-
		$trim_type = $trim_type ? $trim_type : tie_get_option( 'trim_type' );

		// For Chinese Language
		if( $trim_type == 'chars' ){

			if ( function_exists( 'mb_substr' ) ) {
				return mb_substr( $title, 0, $limit );
			}

			return substr( $title, 0, $limit );
		}

		return wp_trim_words( $title, $limit, '&hellip;' );
	}
}


/*
 * Print the modified title
 */
if( ! function_exists( 'tie_the_title' )){

	function tie_the_title( $limit = false, $trim_type = false ){
		echo tie_get_title( $limit, $trim_type );
	}
}


/*
 * Get Post info section
 */
if( ! function_exists( 'tie_get_post_meta' )){

	function tie_get_post_meta( $args = '', $before = false, $after = false ){

		// For Posts only
		if ( get_post_type() != 'post' ) return;

		// Defaults
		$args = wp_parse_args( $args, array(
			'trending' => false,
			'author'	 => true,
			'date' 		 => true,
			'comments' => true,
			'views' 	 => true,
			'review' 	 => false,
			'avatar' 	 => false,
			'reading'  => false,
			'twitter'  => false,
			'email'    => false,
		));

		// If this is not a singular page -> Check the global disable meta options
		if( ! is_single() ){
			$meta_prefix_slug = ( is_archive() || is_search() ) ? 'archives' : 'blocks';
			$args['author']   = tie_get_option( $meta_prefix_slug .'_disable_author_meta' )   ? false : $args['author'];
			$args['comments'] = tie_get_option( $meta_prefix_slug .'_disable_comments_meta' ) ? false : $args['comments'];
			$args['views']    = tie_get_option( $meta_prefix_slug .'_disable_views_meta' )    ? false : $args['views'];
		}

		// Allow making changes on the $args
		$args = apply_filters( 'TieLabs/post_meta_args', $args );

		extract( $args );

		// Prepare the post info section
		$post_meta = $before.'<div class="post-meta">';

		// Trending
		if( ! empty( $trending ) ){
			$post_meta .= tie_get_trending_icon( 'trending-sm meta-item' );
		}

		// Review score
		if( ! empty( $review ) ){
			$post_meta .= tie_get_score( 'stars' );
		}

		// Author
		if( ! empty( $author ) ){

			$user_id = get_the_author_meta( 'ID' );

			# Show the author's avatar
			if( ! empty( $avatar ) && get_option( 'show_avatars' ) ){
				$author_icon = '';

				$post_meta .= '
					<span class="meta-author-avatar">
						<a href="'. tie_get_author_profile_url( $user_id ) .'">'.
							get_avatar( get_the_author_meta( 'user_email', $user_id ), 140 ).'
						</a>
					</span>
				';
			}

			// Show the author's default icon
			else{
				$author_icon = '<span class="fa fa-user" aria-hidden="true"></span> ';
			}

			$post_meta .= '
				<span class="meta-author meta-item">'.
					'<a href="'. tie_get_author_profile_url( $user_id ). '" class="author-name" title="'. get_the_author() .'">'. $author_icon . get_the_author() .'</a>
				</span>
			';

			// Twitter and Email Buttons
			$author_twitter = get_the_author_meta( 'twitter', $user_id );
			if( ! empty( $twitter ) && ! empty( $author_twitter )){
				$post_meta .= '
					<a href="'. esc_url( $author_twitter ) .'" class="author-twitter-link" target="_blank">
						<span class="fa fa-twitter" aria-hidden="true"></span>
						<span class="screen-reader-text"></span>
					</a>
				';
			}

			$author_email = get_the_author_meta( 'email', $user_id );
			if( ! empty( $email ) && ! empty( $author_email ) ){
				$post_meta .= '
					<a href="mailto:'. $author_email .'" class="author-email-link" target="_blank">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<span class="screen-reader-text"></span>
					</a>
				';
			}
		}

		// Date
		if( ! empty( $date ) ){
			$post_meta .= tie_get_time( true );
		}

		// Post info right area
		if( ! empty( $comments ) || ! empty( $views ) || ! empty( $reading ) ){

			$post_meta .= apply_filters( 'TieLabs/post_meta_before_extra_info', '<div class="tie-alignright">' );

			// Comments
			if( ! empty( $comments ) ){
				$post_meta .= '<span class="meta-comment meta-item"><a href="'.get_comments_link().'"><span class="fa fa-comments" aria-hidden="true"></span> '. get_comments_number_text( '0', '1', '%' ) .'</a></span>';
			}

			// Number of views
			if( ! empty( $views ) ){
				$post_meta .= TIELABS_POSTVIEWS::get_views();
			}

			// Reading Time
			if( ! empty( $reading ) ){
				$post_meta .= tie_reading_time();
			}

			$post_meta .= apply_filters( 'TieLabs/post_meta_after_extra_info', '</div>' );
		}

		$post_meta .= '<div class="clearfix"></div></div><!-- .post-meta -->'.$after;

		return $post_meta;
	}
}


/*
 * Print the Post info section
 */
if( ! function_exists( 'tie_the_post_meta' )){

	function tie_the_post_meta( $args = '', $before = false, $after = false ){
		echo tie_get_post_meta( $args, $before, $after );
	}
}


/*
 * Get the Trending Icon
 */
if( ! function_exists( 'tie_get_trending_icon' )){

	function tie_get_trending_icon( $class = false, $before = false, $after = false ){

		// Check if it is not trending
		if( ! tie_get_postdata( 'tie_trending_post' ) ) return;

		return $before . '<span class="trending-post fa fa-bolt '.$class.'" aria-hidden="true"></span>' . $after;
	}
}


/**
 * Dispaly the Trending Icon
 */
if( ! function_exists( 'tie_the_trending_icon' )){

	function tie_the_trending_icon( $class = false, $before = false, $after = false ){
		echo tie_get_trending_icon( $class, $before, $after );
	}
}


/*
 * Previous Post
 */
if( ! function_exists( 'tie_prev_post' )){

	function tie_prev_post( $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ){
		tie_adjacent_post( $in_same_term, $excluded_terms, $previous = true, $taxonomy );
	}
}


/*
 * Next Post
 */
if( ! function_exists( 'tie_next_post' )){

	function tie_next_post( $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ){
		tie_adjacent_post( $in_same_term, $excluded_terms, $previous = false, $taxonomy );
	}
}


/*
 * Custom Next and prev posts
 */
if( ! function_exists( 'tie_adjacent_post' )){

	function tie_adjacent_post( $in_same_term = false, $excluded_terms = '', $previous = true, $taxonomy = 'category' ){

		$adjacent_post = get_adjacent_post( $in_same_term, $excluded_terms, $previous, $taxonomy );

		if( ! empty( $adjacent_post ) ){

			$adjacent = $previous ? 'prev' : 'next';

			$image_path = '';
			$image_id   = get_post_thumbnail_id( $adjacent_post->ID );
			$image_data = wp_get_attachment_image_src( $image_id, TIELABS_THEME_SLUG.'-image-large' );

			if( ! empty( $image_data[0] )){
				$image_path = $image_data[0];
			} ?>

			<div class="tie-col-xs-6 <?php echo esc_attr( $adjacent ) ?>-post">
				<a href="<?php the_permalink( $adjacent_post->ID ); ?>" style="background-image: url(<?php echo esc_url( $image_path ) ?>)" class="post-thumb" rel="<?php echo esc_attr( $adjacent ) ?>">
					<div class="post-thumb-overlay-wrap">
						<div class="post-thumb-overlay">
							<span class="icon"></span>
						</div>
					</div>
				</a>

				<a href="<?php the_permalink( $adjacent_post->ID ); ?>" rel="<?php echo esc_attr( $adjacent ) ?>">
					<h3 class="post-title"><?php echo ( $adjacent_post->post_title ) ?></h3>
				</a>
			</div>

			<?php
		}
	}
}


/*
 * Get Post reading time
 */
if( ! function_exists( 'tie_reading_time' )){

	function tie_reading_time(){

		$post_content  = get_post()->post_content;;
		$post_content  = TIELABS_HELPER::strip_shortcodes( $post_content );
		$post_content  = strip_shortcodes( strip_tags( $post_content ) );
		$words_count   = count(preg_split('/\s+/u', $post_content, null, PREG_SPLIT_NO_EMPTY));
		$words_per_min = apply_filters( 'TieLabs/words_per_min', 250 );

		$reading_time = floor( $words_count / $words_per_min );

		if( $reading_time < 1){
			$result = esc_html__( 'Less than a minute', TIELABS_TEXTDOMAIN );
		}
		elseif( $reading_time > 60 ){
			$result = sprintf( esc_html__( '%s hours read', TIELABS_TEXTDOMAIN ), number_format_i18n( floor( $reading_time / 60 ) ) );
		}
		else if ( $reading_time == 1 ){
			$result = esc_html__( '1 minute read', TIELABS_TEXTDOMAIN );
		}
		else {
			$result = sprintf( esc_html__( '%s minutes read', TIELABS_TEXTDOMAIN ), number_format_i18n( $reading_time ) );
		}

		$result = apply_filters( 'TieLabs/reading_time', $result, $reading_time, $words_per_min, $words_count );

		return '<span class="meta-reading-time meta-item"><span class="fa fa-bookmark" aria-hidden="true"></span> '. $result .'</span> ';
	}
}


/*
 * Get terms as plain text seprated with commas
 */
function tie_get_plain_terms( $post_id, $term ){

	$post_terms = get_the_terms( $post_id, $term );

	$terms = array();

	if( ! empty( $post_terms ) && is_array( $post_terms ) ){
		foreach ( $post_terms as $term ) {
			$terms[] = $term->name;
		}

		$terms = implode( ',', $terms );
	}

	return $terms;
}
