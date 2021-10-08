<?php
$count = get_field( 'sidebar_dev_count', 'options' ) ? get_field( 'sidebar_dev_count', 'options' ) : - 1;
$title = get_field( 'sidebar_dev_title', 'options' );
$terms = get_terms( [
	'taxonomy' => 'developer'
] );
if ( $terms ) : ?>
	<div class="custom-widget custom-widget__dev">
		<div class="custom-widget__title"><?= $title; ?></div>

		<div class="custom-widget__dev-list">
			<?php foreach ( $terms as $term ) :
				$term_logo = get_field( 'logo', $term );
				$term_logo_bg = get_field( 'logo_bg', $term );
				$term_link = get_term_link( $term->term_id, 'developer' );
				?>
				<a href="<?php echo get_term_link( $term->term_id ); ?>" class="custom-widget__dev-item">
					<span class="custom-widget__dev-img" style="background-color: <?= $term_logo_bg; ?>;">
						<img src="<?= kama_thumb_src( 'w=230 &nocrop=true', $term_logo['ID'] ); ?>" title="<?= $term_logo['title']; ?>" alt="<?= $term_logo['alt']; ?>">
					</span>
					<span class="custom-widget__dev-title"><?= $term->name; ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
