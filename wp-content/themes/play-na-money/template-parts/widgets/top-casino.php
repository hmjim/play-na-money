<?php
$count      = get_field( 'sidebar_casino_count', 'options' ) ? get_field( 'sidebar_casino_count', 'options' ) : -1;
$title      = get_field( 'sidebar_casino_title', 'options' );
$casino_top = get_field( 'casino_rating', 'options' );
if ( $casino_top ) : ?>
	<div class="custom-widget custom-widget__casino">
		<div class="custom-widget__title"><?= $title; ?></div>

		<div class="custom-widget__casino-list">
			<?php $i = 0; ?>
			<?php foreach ( $casino_top as $casino ) :
				$post = $casino['casino'];
				setup_postdata( $post );
				$casino_link  = get_post_permalink();
				$casino_thumb = get_post( get_field( 'logo' ) );
				$percent      = get_field( 'rating' );
				?>

				<div class="custom-widget__casino-item">
					<a href="<?= $casino_link; ?>" class="custom-widget__casino-img percent-bar">
						<svg>
							<circle cx="71" cy="71" r="71" style="stroke-dashoffset: calc(446 - (446 * <?= $percent; ?>) / 100)"></circle>
						</svg>
						<img src="<?= kama_thumb_src( 'w=120 &h=120', $casino_thumb->guid ); ?>" class="thumb"
						     title="<?= $casino_thumb->post_title; ?>"
						     alt="<?= get_post_meta( $casino_thumb->ID, '_wp_attachment_image_alt', true ); ?>">
					</a>

					<div class="custom-widget__casino-nav">
						<a href="<?= $casino_link; ?>" class="btn btn-border">Обзор</a>
						<a href="<?= get_field( 'link' ); ?>" class="btn btn-site" title="Играть в казино" target="_blank">Сайт</a>
					</div>
				</div>
				<?php
				if ( $i == $count - 1 ) {
					break;
				} else {
					$i ++;
				}
				?>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>
