<?php get_header(); ?>
<?php the_post(); ?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<div class="content__wrapper">
	<div class="content container">
		<div class="content__inner">

			<div class="content__main">

				<div class="section">
					<div class="the_content">
						<?php the_field( 'seo_text' ); ?>
					</div>

					<?php
					$home_link         = get_field( 'home_link' );
					$slot_rating_title = get_field( 'slot_rating_title', 'options' );
					$slot_btn_text     = get_field( 'slot_btn_text', 'options' );
					?>
					<div class="main-slot__wrapper">
						<div class="main-slot js-slot">
							<div class="main-slot__inner">
								<iframe src="<?php the_field( 'iframe' ) ?>" width="100%" height="477"></iframe>

								<div class="main-slot__nav">
									<a href="#popup" class="main-slot__nav-feedback open-popup"><i class="fas fa-exclamation-triangle"></i></a>

									<div class="main-slot__nav-rating">
										<div class="main-slot__nav-rating-title"><?= $slot_rating_title; ?></div>
										<?php if ( function_exists( 'the_ratings' ) ) the_ratings(); ?>
									</div>

									<div class="main-slot__nav-maximize btn-maximize"></div>
								</div>
							</div>
							<div class="main-slot__btn">
								<a href="/playmoney/slots" class="btn btn-blue btn-fullwidth" target="_blanc"><span><?= $slot_btn_text; ?></span></a>
							</div>
						</div>
					</div>
				</div>

				<div class="section the_content the_content-bg">
					<?php the_content(); ?>
				</div>

				<?php
				$casino_top   = get_field( 'casino_rating', 'options' );
				$casino_title = get_field( 'slot_single_casino_title', 'options' );
				$casino_descr = get_field( 'slot_single_casino_descr', 'options' );
				$casino_count = (int) get_field( 'slot_single_casino_count', 'options' );
				?>
				<?php if ( $casino_top ) : ?>
					<p class="page_title"><?= $casino_title; ?></p>
					<div class="page_descr the_content"><?= $casino_descr; ?></div>

					<div class="row casino__items">
						<?php
						$i = 0;
						foreach ( $casino_top as $casino ) :
							if ( $i === $casino_count ) {
								break;
							}
							$post = get_post( $casino['casino'] );
							setup_postdata( $post );
							get_template_part( 'template-parts/loop-casino' );
							$i ++;
						endforeach;
						wp_reset_postdata();
						?>
					</div>
				<?php endif; ?>
			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<div id="popup" class="popup mfp-hide">
	<?= do_shortcode( '[contact-form-7 id="142" title="Контактная форма"]' ); ?>
</div>

<?php get_footer(); ?>
