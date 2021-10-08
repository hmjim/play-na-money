<div class="casino">
	<div class="casino__inner">

		<?php
		$casino_link  = get_post_permalink();
		$casino_thumb = get_post( get_field( 'logo' ) );
		$percent      = get_field( 'rating' );
		?>
		<div class="casino__logo">
			<a href="<?= $casino_link; ?>" class="percent-bar">
				<svg>
					<circle cx="71" cy="71" r="71" style="stroke-dashoffset: calc(446 - (446 * <?= $percent; ?>) / 100)"></circle>
				</svg>
				<img src="<?= kama_thumb_src( 'w=120 &h=120', $casino_thumb->guid ); ?>" class="thumb"
				     title="<?= $casino_thumb->post_title; ?>"
				     alt="<?= get_post_meta( $casino_thumb->ID, '_wp_attachment_image_alt', true ); ?>">
				<span class="number"><?= $percent; ?>%</span>
			</a>
		</div>

		<?php $terms = get_field( 'devs' ); ?>
		<div class="casino__features">
			<?php if ( $terms ) : ?>
				<div class="casino__features-inner">
					<p class="casino__features-title">Разработчики</p>
					<ul class="casino__features-list">
						<?php foreach ( $terms as $term_id ): ?>
							<?php
							$term      = get_term( $term_id, 'developer' );
							$term_logo = get_field( 'logo', $term );
							$term_link = get_term_link( $term_id, 'developer' );
							?>
							<li>
								<a href="<?= $term_link; ?>">
									<img src="<?= kama_thumb_src( 'w=70 &nocrop=true', $term_logo['ID'] ); ?>" title="<?= $term_logo['title']; ?>" alt="<?= $term_logo['alt']; ?>">
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>

		<div class="casino__nav">
			<a href="<?php the_permalink(); ?>" class="btn btn-review">Обзор</a>
			<a href="<?php the_field( 'link' ); ?>" class="btn btn-site" title="Играть в казино" target="_blank">Сайт</a>
		</div>

	</div>
</div>
