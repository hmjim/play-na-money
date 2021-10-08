<?php
$count     = get_field( 'sidebar_related_slots_count', 'options' ) ? get_field( 'sidebar_related_slots_count', 'options' ) : -1;
$title     = get_field( 'sidebar_related_slots_title', 'options' );
$wins_nums = explode( ',', get_field( 'sidebar_related_slots_wins', 'options' ) );
$posts     = get_posts( array(
	'numberposts' => $count,
	'post_type'   => 'post',
	'orderby'     => 'rand',
	'exclude'     => array( get_the_ID() )
) );
if ( $posts ) : ?>
	<div class="custom-widget custom-widget__slot-related">
		<div class="custom-widget__title"><?= $title; ?></div>

		<div class="custom-widget__slot-related-list">
			<?php foreach ( $posts as $post ) {
				setup_postdata( $post );
				$thumb     = get_post( get_post_thumbnail_id() );
				$image_alt = get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true );
				$wins      = rand( (int) $wins_nums[0], (int) $wins_nums[1] );
				?>
				<a href="<?php the_permalink(); ?>" class="custom-widget__slot-related-item">
						<span class="custom-widget__slot-related-img">
							<img src="<?= kama_thumb_src( 'w=47 &h=47' ); ?>" title="<?= $thumb->post_title; ?>" alt="<?= $image_alt; ?>">
						</span>
					<span class="custom-widget__slot-related-text">
							<span class="custom-widget__slot-related-title"><?php the_title(); ?></span>
							<span class="custom-widget__slot-related-descr"><?= $wins; ?>% побед</span>
						</span>
				</a>
			<?php }
			wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>
