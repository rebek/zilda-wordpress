<?php
/**
 * Block / Archives Layout - Overlay
 *
 * This template can be overridden by copying it to your-child-theme/templates/loops/loop-overlay.php.
 *
 * HOWEVER, on occasion TieLabs will need to update template files and you
 * will need to copy the new files to your child theme to maintain compatibility.
 *
 * @author   TieLabs
 * @version  2.1.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

?>

<div <?php tie_post_class( 'container-wrapper post-element' ); ?>>
	<div style="<?php echo tie_thumb_src_bg( TIELABS_THEME_SLUG.'-image-grid' ) ?>" class="slide">
		<a href="<?php the_permalink() ?>" class="all-over-thumb-link"></a>

		<div class="thumb-overlay">

			<?php

				# Get the Post Category
				if( $block['category_meta'] ){
					tie_the_category( '<h5 class="post-cat-wrap">', '</h5>');
				}

			?>

			<div class="thumb-content">

				<?php

					if( $block['post_meta'] ){
						tie_the_post_meta( array( 'author' => false, 'comments' => false, 'views' => false ), '<div class="thumb-meta">', '</div>' );
					}

				?>

				<h3 class="thumb-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

				<?php if( $block['excerpt'] ): ?>
					<div class="thumb-desc">
						<?php tie_the_excerpt( $block['excerpt_length'] ) ?>
					</div><!-- .thumb-desc -->
				<?php endif; ?>

			</div> <!-- .thumb-content /-->
		</div><!-- .thumb-overlay /-->
	</div><!-- .slide /-->
</div><!-- .container-wrapper /-->
