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
