<?php get_header(); ?>

<?php
if ( is_home() ) :
	get_template_part( 'template-parts/banner' );
else :
	get_template_part( 'template-parts/page-header' );
endif;
?>

<div class="content__wrapper">
	<div class="content container">
		<div class="content__inner">
			<div class="content__main">
				<h1><?php the_field( 'page_slots_title', 'options' ); ?></h1>

				<div class="page_descr the_content"><?php the_field( 'page_slots_text', 'options' ); ?></div>

				<?php get_template_part( 'template-parts/slots' ); ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/anchor-menu' ); ?>

<?php get_footer(); ?>
