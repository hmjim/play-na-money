<?php if (0) : ?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="section">
	<div class="container">
		<div class="row">

			<div class="main">

				<h1 class="page-title"><?= ( get_field( 'news_title', 'options' ) ) ? get_field( 'slots_title', 'options' ) : 'Новости'; ?></h1>

				<div class="news">

					<?php if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/loop-news' );
						endwhile;
					else :
						get_template_part( 'template-parts/loop-none' );
					endif; ?>

				</div>

				<?php if ( function_exists( 'pagination' ) ) {
					pagination();
				} ?>
			</div>

			<?php get_sidebar( 'slots' ); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>
<?php endif; ?>
