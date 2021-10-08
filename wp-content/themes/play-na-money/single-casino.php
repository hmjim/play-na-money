<?php get_header(); ?>
<?php the_post(); ?>

<?php
$casino_thumb        = get_post( get_post_thumbnail_id( get_the_ID() ) );
$casino_square_thumb = get_post( get_field( 'logo' ) );
$casino_pays         = get_the_terms( get_the_ID(), 'currency' );
$casino_soft         = get_field( 'devs' );
$casino_country      = get_the_terms( get_the_ID(), 'country' );
$casino_year         = get_field( 'year' );
$casino_rating       = get_field( 'rating' );
$casino_bonus        = get_field( 'bonus' );
$casino_site         = get_field( 'link' );
$casino_mirror       = get_field( 'mirror_link' );
?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<div class="content__wrapper">
	<div class="content container">
		<div class="content__inner">
			<div class="content__main no-sidebar">

				<div class="casino-box">

					<div class="casino-box__main">
						<div class="casino-box__logo">
							<div class="percent-bar">
								<svg>
									<circle cx="71" cy="71" r="71" style="stroke-dashoffset: calc(446 - (446 * <?= $casino_rating; ?>) / 100)"></circle>
								</svg>
								<img src="<?= kama_thumb_src( 'w=120 &h=120', $casino_square_thumb->guid ); ?>" class="thumb"
								     title="<?= $casino_square_thumb->post_title; ?>"
								     alt="<?= get_post_meta( $casino_square_thumb->ID, '_wp_attachment_image_alt', true ); ?>">
							</div>
						</div>

						<div class="casino-box__info">
							<div class="casino-box__info-rating"><?= $casino_rating; ?>%</div>
							<div class="casino-box__info-year"><span>основано</span> <?= $casino_year; ?> г</div>
							<div class="casino-box__info-btn"><a href="<?php echo $casino_site; ?>" class="btn btn-site">Играть в казино</a></div>
						</div>
					</div>

					<div class="casino-box__pays">
						<div class="casino__features">
							<?php if ( $casino_pays ) : ?>
								<div class="casino__features-inner">
									<p class="casino__features-title">Выплаты</p>
									<ul class="casino__features-list">
										<?php foreach ( $casino_pays as $term ): ?>
											<?php $term_logo = get_field( 'logo', $term ); ?>
											<li>
										<span>
											<img src="<?= kama_thumb_src( 'w=69 &nocrop=true', $term_logo['ID'] ); ?>" title="<?= $term_logo['title']; ?>"
											     alt="<?= $term_logo['alt']; ?>">
										</span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="casino-box__soft">
						<div class="casino__features">
							<?php if ( $casino_soft ) : ?>
								<div class="casino__features-inner">
									<p class="casino__features-title">Разработчики</p>
									<ul class="casino__features-list">
										<?php foreach ( $casino_soft as $term_id ): ?>
											<?php
											$term      = get_term( $term_id, 'developer' );
											$term_logo = get_field( 'logo', $term );
											$term_link = get_term_link( $term_id, 'developer' );
											?>
											<li>
												<a href="<?= $term_link; ?>">
													<img src="<?= kama_thumb_src( 'w=70 &nocrop=true', $term_logo['ID'] ); ?>" title="<?= $term_logo['title']; ?>"
													     alt="<?= $term_logo['alt']; ?>">
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="casino-box__country">
						<div class="casino__features">
							<?php if ( $casino_country ) : ?>
								<div class="casino__features-inner">
									<p class="casino__features-title">Игроки</p>
									<ul class="casino__features-list">
										<?php foreach ( $casino_country as $term ): ?>
											<?php $term_logo = get_field( 'logo', $term ); ?>
											<li>
										<span>
											<img src="<?= kama_thumb_src( 'w=69 &nocrop=true', $term_logo['ID'] ); ?>" title="<?= $term_logo['title']; ?>"
											     alt="<?= $term_logo['alt']; ?>">
										</span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>

				</div>


			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/anchor-menu' ); ?>

<div class="section container">
	<div class="the_content the_content-bg"><?php the_content(); ?></div>
</div>

<?php get_template_part( 'template-parts/casino-banner' ); ?>

<?php get_footer(); ?>

