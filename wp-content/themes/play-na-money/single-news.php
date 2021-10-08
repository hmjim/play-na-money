<?php if (0) : ?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<div class="content">
	<div class="container">
		<div class="row">
			<main class="main">

				<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
					<h1 class="page-title"><?php the_title(); ?></h1>

					<div class="post-content"><?php the_content(); ?></div>
				<?php endwhile; endif; ?>

			</main>

			<?php get_sidebar( 'slots' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
<?php endif; ?>
