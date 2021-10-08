<?php get_header(); ?>

<?php get_template_part( 'template-parts/banner' ); ?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<div class="content__wrapper">
	<div class="content container">
		<div class="content__inner">
			<div class="content__main">

				<div class="section">
					<div class="row">

						<?php if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/loop-slot' );
							endwhile;
						else :
							get_template_part( 'template-parts/loop-none' );
						endif; ?>

					</div>

					<?php if ( function_exists( 'pagination' ) ) {
						pagination();
					} ?>
				</div>

				<?php $description = term_description(); ?>
				<?php if ( $description != null ) : ?>
					<div class="the_content the_content-bg"><?= $description; ?></div>
				<?php endif; ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
