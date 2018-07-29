<?php

	tie_build_theme_option(
		array(
			'title' => esc_html__( 'Story Highlights', TIELABS_TEXTDOMAIN ),
			'type'  => 'header',
		));
	?>

	<div class="option-item breaking_type-options" id="breaking_custom-item">

		<span class="tie-label"><?php esc_html_e( 'Add Custom Text', TIELABS_TEXTDOMAIN ) ?></span>
		<input id="custom_text" type="text" size="56" name="custom_text" placeholder="<?php esc_html_e( 'Custom Text', TIELABS_TEXTDOMAIN ) ?>" value="" />
		<input id="add_highlights_button"  class="button" type="button" value="<?php esc_html_e( 'Add', TIELABS_TEXTDOMAIN ) ?>" />

		<?php

			tie_build_theme_option(
				array(
					'text' => esc_html__( 'Text is required.', TIELABS_TEXTDOMAIN ),
					'id'   => 'highlights_custom_error',
					'type' => 'error',
				));
		?>

		<script>
			jQuery(function(){
				jQuery( "#customList" ).sortable({placeholder: "tie-state-highlight"});
			});
		</script>

		<div class="clear"></div>
		<ul id="customList">
			<?php
				$highlights_text = tie_get_postdata( 'tie_highlights_text' );
				$custom_count    = 0;

				if( ! empty( $highlights_text ) && is_array( $highlights_text )){
					foreach ( $highlights_text as $custom_text ){
						$custom_count++; ?>

						<li class="parent-item">
							<div class="tie-block-head">
								<?php echo esc_html( $custom_text ) ?>
								<input name="tie_highlights_text[<?php echo esc_attr( $custom_count ) ?>]" type="hidden" value="<?php echo esc_attr( $custom_text ) ?>" />
								<a class="del-item dashicons dashicons-trash"></a>
							</div>
						</li>
						<?php
					}
				}
			?>
		</ul>

		<script>
			var customnext = <?php echo esc_js( $custom_count+1 ); ?> ;
		</script>

	</div><!-- #breaking_custom-item /-->
