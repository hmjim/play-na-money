<?php
$count = get_field( 'sidebar_top_slots_count', 'options' ) ? get_field( 'sidebar_top_slots_count', 'options' ) : -1;
$title = get_field( 'sidebar_top_slots_title', 'options' );
$posts = get_posts( array(
	'posts_per_page' => $count,
	'post_type'      => 'post',
	'meta_key'       => 'views',
	'order'          => 'DESC',
	'orderby'        => 'meta_value_num'
) );
if ( $posts ) : ?>
	<div class="custom-widget custom-widget__slot">
		<div class="custom-widget__title"><?= $title; ?></div>

		<div class="custom-widget__slot-list">
			<?php foreach ( $posts as $post ) :
				setup_postdata( $post );
				$thumb     = get_post( get_post_thumbnail_id() );
				$image_alt = get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true );
				?>
				<a href="<?php the_permalink(); ?>" class="custom-widget__slot-item">
					<img src="<?= kama_thumb_src( 'w=108 &h=66' ); ?>" class="custom-widget__slot-img" title="<?= $thumb->post_title; ?>" alt="<?= $image_alt; ?>">
					<span class="custom-widget__slot-title"><?php the_title(); ?></span>
				</a>
			<?php endforeach;
			wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>
